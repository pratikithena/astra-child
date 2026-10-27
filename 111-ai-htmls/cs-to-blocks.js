// Converts a case study (template-parts/case-study-v2.php, ACF) into Gutenberg blocks.
// Run inside a wp-admin block editor page (needs wp.blocks + wp.apiFetch):
//   const r = await csConvert(67631);   // dry run: r.markup, r.invalid
//   await csSave(67631, r);              // writes post_content (creates a revision), returns the render diff
// Source is the editor-only ?cs_nodemo=1 view: the post's real content plus generic labels, no demo copy.
// Old post_content (never shown by the template) is kept inside a hidden "bl-hidden" group.
(function () {
  const B = (n, a, i) => wp.blocks.createBlock(n, a || {}, i || []);
  const raw = (h) => wp.blocks.rawHandler({ HTML: h });
  const esc = (s) => s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
  const P = (t, cls) => B('core/paragraph', { content: t, className: cls });
  const H = (t, level) => B('core/heading', { content: t, level: level || 2 });
  const txt = (e) => (e ? e.textContent.replace(/\s+/g, ' ').trim() : '');
  const realSrc = (src) => {
    if (src && src.startsWith('data:image/svg+xml;base64,')) {
      const m = atob(src.split(',')[1]).match(/bv-img-url="([^"]+)"/);
      if (m) src = m[1];
    }
    return (src || '').replace(/\/wp-content\/uploads\/al_opt_content\/IMAGE\/[^/]+\/wp-content\/uploads\//, '/wp-content/uploads/').replace(/\.bv\.webp$/, '');
  };

  async function page(id, nodemo) {
    const p = await wp.apiFetch({ path: '/wp/v2/case-study-test/' + id + '?context=edit&_fields=link,status,content' });
    const q = (p.status === 'publish' ? '' : 'preview=true&') + (nodemo ? 'cs_nodemo=1&' : '') + 'q=' + Date.now();
    const html = await (await fetch(p.link + (p.link.includes('?') ? '&' : '?') + q, { credentials: 'same-origin' })).text();
    const root = new DOMParser().parseFromString(html, 'text/html').querySelector('section.cs-page');
    if (root) root.querySelectorAll('img').forEach((im) => im.setAttribute('src', realSrc(im.getAttribute('data-src') || im.getAttribute('src'))));
    return { root, raw: p.content.raw };
  }

  const buttons = (as) => B('core/buttons', {}, [...as].map((a) => {
    const x = a.cloneNode(true);
    x.querySelectorAll('svg').forEach((s) => s.remove());
    const href = a.getAttribute('href');
    return B('core/button', { text: esc(txt(x)), url: href && href !== '#' ? href : undefined });
  }));
  const video = (sec, cls) => {
    const v = sec.querySelector('video.' + cls);
    return v ? { src: (v.querySelector('source') || v).getAttribute('src'), poster: v.getAttribute('poster') } : {};
  };
  const cover = (style, v, inner) => {
    const a = { dimRatio: 70, className: style, layout: { type: 'constrained' } };
    if (v.src) Object.assign(a, { url: v.src, backgroundType: 'video' });
    if (v.poster) inner.push(B('core/image', { url: v.poster, alt: '' }));
    return B('core/cover', a, inner);
  };

  function hero(sec) {
    const inner = [];
    if (sec.querySelector('.hero-credit')) inner.push(P(esc(txt(sec.querySelector('.hero-credit'))), 'is-style-hero-meta'));
    if (sec.querySelector('.hero-in .eyebrow')) inner.push(P(esc(txt(sec.querySelector('.hero-in .eyebrow'))), 'is-style-eyebrow'));
    inner.push(H(esc(txt(sec.querySelector('h1'))), 1));
    if (sec.querySelector('.deck')) inner.push(P(esc(txt(sec.querySelector('.deck')))));
    const as = sec.querySelectorAll('.hero-actions a');
    if (as.length) inner.push(buttons(as));
    const facts = [...sec.querySelectorAll('.fact')];
    inner.push(B('core/table', {
      caption: esc(txt(sec.querySelector('.facts-cap'))),
      body: facts.map((f) => ({ cells: [{ content: esc(txt(f.querySelector('dt'))), tag: 'td' }, { content: esc(txt(f.querySelector('dd'))), tag: 'td' }] })),
    }));
    return cover('is-style-cs-hero', video(sec, 'hero-video'), inner);
  }

  function section(sec, label) {
    const inner = [], unknown = [];
    for (const el of sec.children) {
      const c = el.classList;
      if (el.matches('span.eyebrow')) inner.push(P(esc(txt(el)), 'is-style-eyebrow'));
      else if (el.tagName === 'H2') inner.push(H(esc(txt(el))));
      else if (el.matches('p.lede')) inner.push(P(esc(txt(el)), 'is-style-lede'));
      else if (c.contains('stats')) {
        if (el.children.length) inner.push(B('core/columns', {}, [...el.querySelectorAll('.stat')].map((s) => B('core/column', {}, [
          P(esc(txt(s.querySelector('.num em')) + txt(s.querySelector('.num span')))), H(esc(txt(s.querySelector('h4'))), 4), P(esc(txt(s.querySelector('p')))),
        ]))));
      } else if (c.contains('capx')) {
        if (el.children.length) inner.push(B('core/columns', {}, [...el.querySelectorAll('.cx')].map((x) => B('core/column', {}, [H(esc(txt(x.querySelector('h3'))), 3), P(esc(txt(x.querySelector('p'))))]))));
      } else if (el.matches('img.client-img')) inner.push(B('core/image', { url: el.getAttribute('src'), alt: '' }));
      else if (el.matches('figure.quote')) {
        // Rich text turns raw newlines into <br>; in HTML they are just spaces.
        const q = el.querySelector('blockquote').innerHTML.replace(/\s+/g, ' ').trim();
        inner.push(B('core/quote', {}, /<(p|ul|ol|h\d|div)\b/i.test(q) ? raw(q) : [P(q)]));
      } else if (c.contains('gaps')) inner.push(B('core/group', { className: 'cs-gaps', layout: { type: 'constrained' } }, raw(el.innerHTML)));
      else if (c.contains('cons-embed')) { htmlQ.push(el.innerHTML); inner.push(B('core/html', { content: el.innerHTML })); }
      else unknown.push(el.outerHTML.slice(0, 80));
    }
    return { block: B('core/group', { anchor: sec.id, metadata: { name: label }, layout: { type: 'constrained' } }, inner), unknown };
  }

  // core/html saves as null here (content is role "local"), so wp.blocks.serialize() writes an empty
  // <!-- wp:html /-->. The editor's own serializer is fine; fill those in by hand, in order.
  let htmlQ = [];
  window.csConvert = async function (id) {
    htmlQ = [];
    const { root, raw: old } = await page(id, true);
    if (!root) return { error: 'no cs-page' };
    const blocks = [hero(root.querySelector('section.cs-hero'))], unknown = [];
    const labels = {};
    root.querySelectorAll('#rail a').forEach((a) => { labels[a.getAttribute('href').slice(1)] = txt(a.querySelector('span')); });
    root.querySelectorAll('.shell main > section').forEach((s) => { const r = section(s, labels[s.id] || ''); blocks.push(r.block); unknown.push(...r.unknown); });
    const cta = root.querySelector('section.cs-cta');
    if (cta) {
      const inner = [];
      if (cta.querySelector(':scope > h2')) inner.push(H(esc(txt(cta.querySelector(':scope > h2')))));
      if (cta.querySelector(':scope > p')) inner.push(P(esc(txt(cta.querySelector(':scope > p')))));
      const as = cta.querySelectorAll('.cta-actions a');
      if (as.length) inner.push(buttons(as));
      blocks.push(cover('is-style-cta-banner', video(cta, 'cta-video'), inner));
    }
    if (old.trim()) blocks.push(B('core/group', { className: 'bl-hidden', metadata: { name: 'Old post content (hidden)' }, layout: { type: 'constrained' } }, wp.blocks.parse(old)));
    let k = 0;
    const markup = wp.blocks.serialize(blocks).replace(/<!-- wp:html \/-->/g, () => '<!-- wp:html -->\n' + htmlQ[k++] + '\n<!-- /wp:html -->');
    if (k !== htmlQ.length) return { error: 'html block count mismatch' };
    const invalid = [];
    (function walk(bs) { bs.forEach((b) => { if (!b.isValid && b.name !== 'core/missing') invalid.push(b.name); walk(b.innerBlocks); }); })(wp.blocks.parse(markup));
    return { id, markup, invalid, unknown, before: norm(root), sections: blocks.length };
  };

  // Comparable form of the page: hero, sub nav, sections and CTA, whitespace-insensitive.
  function norm(root) {
    const c = root.cloneNode(true);
    c.querySelectorAll('script,style,dialog').forEach((e) => e.remove());
    c.querySelectorAll('.stats,.capx,.gaps').forEach((e) => { if (!e.children.length && !e.textContent.trim()) e.remove(); });
    return c.innerHTML.replace(/>\s+</g, '><').replace(/\s+/g, ' ').trim();
  }

  window.csSave = async function (id, r) {
    await wp.apiFetch({ path: '/wp/v2/case-study-test/' + id, method: 'POST', data: { content: r.markup } });
    const after = norm((await page(id, false)).root);
    let i = 0;
    while (i < after.length && after[i] === r.before[i]) i++;
    return { same: after === r.before, at: i, before: r.before.slice(Math.max(0, i - 80), i + 120), after: after.slice(Math.max(0, i - 80), i + 120) };
  };
})();
