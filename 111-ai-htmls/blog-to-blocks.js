// Converts an ACF-rendered blog-v2 post into Gutenberg blocks (same structure as post 84817).
// Run inside a wp-admin block editor page (needs wp.blocks + wp.apiFetch):
//   const r = await blConvert(84812);           // dry run: r.blocks, r.markup, r.old
//   await blSave(84812, r.markup);             // writes post_content (creates a revision)
//   await blCompare(r.old, 84812);             // missing words / images / links after the switch
// Source of truth is the live front end, so whatever the page shows today is what gets converted.
(function () {
  const B = (n, a, i) => wp.blocks.createBlock(n, a || {}, i || []);
  const raw = (h) => wp.blocks.rawHandler({ HTML: h });
  const P = (t, cls) => B('core/paragraph', { content: t, className: cls });
  const H = (t, level) => B('core/heading', { content: t, level: level || 2 });
  const G = (inner, cls) => B('core/group', { className: cls, layout: { type: 'constrained' } }, inner);

  // Airlift swaps <img src> for an SVG placeholder holding the real URL (sometimes its own webp copy).
  function realSrc(src) {
    if (src && src.startsWith('data:image/svg+xml;base64,')) {
      const m = atob(src.split(',')[1]).match(/bv-img-url="([^"]+)"/);
      if (m) src = m[1];
    }
    return (src || '').replace(/\/wp-content\/uploads\/al_opt_content\/IMAGE\/[^/]+\/wp-content\/uploads\//, '/wp-content/uploads/').replace(/\.bv\.webp$/, '');
  }

  async function page(id) {
    const post = await wp.apiFetch({ path: '/wp/v2/blog-post/' + id + '?_fields=link' });
    const html = await (await fetch(post.link + '?blcv=' + Date.now(), { credentials: 'same-origin' })).text();
    const art = new DOMParser().parseFromString(html, 'text/html').querySelector('section.bl-page article');
    art.querySelectorAll('img').forEach((im) => im.setAttribute('src', realSrc(im.getAttribute('data-src') || im.getAttribute('src'))));
    return art;
  }

  // Words, image URLs and link hrefs of the body (hero and side nav excluded).
  function facts(nodes) {
    const words = [], imgs = [], links = [];
    nodes.forEach((n) => {
      if (!n) return;
      const c = n.cloneNode(true);
      c.querySelectorAll('svg,script,style').forEach((e) => e.remove());
      c.querySelectorAll('*').forEach((e) => e.append(' ')); // "FAQ</div><h2>Questions" is two words, not one
      words.push(...c.textContent.replace(/[“”"’']/g, '').toLowerCase().split(/[^\p{L}\p{N}]+/u).filter(Boolean));
      c.querySelectorAll('img').forEach((i) => imgs.push(realSrc(i.getAttribute('src'))));
      c.querySelectorAll('video').forEach((v) => imgs.push(v.getAttribute('src')));
      c.querySelectorAll('a[href]').forEach((a) => links.push(a.getAttribute('href')));
    });
    return { words, imgs, links };
  }

  function head(col) {
    const out = [];
    if (!col) return out;
    const eb = col.querySelector(':scope > .eyebrow'), h2 = col.querySelector(':scope > h2'), lede = col.querySelector(':scope > p.lede');
    if (eb) out.push(P(eb.innerHTML, 'is-style-eyebrow'));
    if (h2) out.push(H(h2.innerHTML));
    if (lede) out.push(P(lede.innerHTML, 'is-style-lede'));
    return out;
  }

  window.blConvert = async function (id) {
    const art = await page(id);
    const blocks = [];
    for (const sec of art.querySelectorAll('.shell main > section.sec')) {
      const inner = [];
      if (sec.id === 'ia-faq') {
        inner.push(...head(sec.querySelector('.col')));
        inner.push(B('core/columns', {}, [...sec.querySelectorAll('.qa-col')].map((c) => B('core/column', {}, [...c.querySelectorAll('details.qa')].map((d) =>
          B('core/details', { summary: d.querySelector('summary span').innerHTML }, raw(d.querySelector('.qa-a').innerHTML)))))));
      } else if (sec.id === 'ia-summary') {
        const t = sec.querySelector('.tldr'), ti = [];
        const eb = t.querySelector('.eyebrow');
        if (eb) ti.push(P(eb.innerHTML, 'is-style-eyebrow'));
        ti.push(H(t.querySelector('h2').innerHTML));
        ti.push(B('core/list', { className: 'is-style-checklist' }, [...t.querySelectorAll('li > span')].map((s) => B('core/list-item', { content: s.innerHTML }))));
        inner.push(G(ti, 'is-style-takeaways'));
      } else if (sec.id === 'ia-about') {
        inner.push(...head(sec.querySelector('.col')));
        inner.push(B('core/columns', {}, [...sec.querySelectorAll('.about')].map((a) => {
          const c = [], h4 = a.querySelector('h4'), p = a.querySelector('p'), l = a.querySelector('a');
          if (h4) c.push(H(h4.innerHTML, 4));
          if (p) c.push(P(p.innerHTML));
          if (l) c.push(P('<a href="' + l.getAttribute('href') + '" target="_blank" rel="noreferrer noopener">' + l.innerHTML + '</a>'));
          return B('core/column', {}, [G(c, 'is-style-card')]);
        })));
      } else {
        // text sections (sec1-3, next): heading trio, rich text, pull quote, figure
        const col = sec.querySelector('.col');
        inner.push(...head(col));
        const prose = col && col.querySelector(':scope > .prose');
        if (prose) inner.push(...raw(prose.innerHTML));
        const bq = col && col.querySelector(':scope > blockquote');
        if (bq) inner.push(B('core/quote', { citation: bq.querySelector('cite') ? bq.querySelector('cite').innerHTML : '' }, [P(bq.querySelector('p').innerHTML)]));
        const fig = sec.querySelector('figure');
        if (fig) {
          const im = fig.querySelector('img'), cap = fig.querySelector('figcaption');
          inner.push(B('core/image', { url: im.getAttribute('src'), alt: im.getAttribute('alt') || '', caption: cap ? cap.innerHTML : '', sizeSlug: 'full', linkDestination: 'none' }));
        }
      }
      blocks.push(G(inner));
    }
    const cta = art.querySelector(':scope > section.cta-banner');
    if (cta) {
      const c = [], vid = cta.querySelector('video') && cta.querySelector('video').getAttribute('src');
      const eb = cta.querySelector('.eyebrow'), lede = cta.querySelector('p.lede');
      if (eb) c.push(P(eb.innerHTML, 'is-style-eyebrow'));
      c.push(H(cta.querySelector('h2').innerHTML));
      if (lede) c.push(P(lede.innerHTML));
      const btns = [...cta.querySelectorAll('.btns a')].map((a) => {
        const x = a.cloneNode(true);
        x.querySelectorAll('svg').forEach((s) => s.remove());
        return B('core/button', { text: x.innerHTML.trim(), url: a.getAttribute('href'), linkTarget: a.getAttribute('target') || undefined, rel: a.getAttribute('target') ? 'noreferrer noopener' : undefined, className: a.classList.contains('btn-g') ? 'is-style-outline' : undefined });
      });
      if (btns.length) c.push(B('core/buttons', {}, btns));
      blocks.push(B('core/cover', vid ? { url: vid, backgroundType: 'video', dimRatio: 50, className: 'is-style-cta-banner', layout: { type: 'constrained' } } : { dimRatio: 50, className: 'is-style-cta-banner', layout: { type: 'constrained' } }, c));
    }
    const markup = wp.blocks.serialize(blocks);
    const invalid = [];
    (function walk(bs) { bs.forEach((b) => { if (!b.isValid) invalid.push(b.name); walk(b.innerBlocks); }); })(wp.blocks.parse(markup));
    return { blocks, markup, invalid, sections: blocks.length, old: facts([art.querySelector('.shell main'), cta]) };
  };

  // Hero as a "Blog hero" Cover block, prepended to the existing content. Returns before/after hero facts.
  //   const r = await blHero(84812); r.before vs r.after (same keys, should be equal)
  const esc = (s) => s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
  async function heroFacts(id) {
    const h = (await page(id)).querySelector('header.hero');
    const t = (s) => { const e = h.querySelector(s); return e ? e.textContent.trim() : ''; };
    const img = h.querySelector('.hero-img img');
    const spans = [...h.querySelectorAll('.hero-meta > span:not(.dot)')];
    return {
      img: img ? img.getAttribute('src') : '', alt: img ? img.getAttribute('alt') || '' : '',
      eyebrow: t('.eyebrow'), title: t('h1'), deck: t('.deck'),
      author: t('.hero-meta b'), source: spans.slice(1, -1).map((s) => s.textContent.trim()).join(' '),
      meta: [...h.querySelectorAll('.hero-meta > :not(.dot)')].map((e) => e.textContent.trim()).join(' | '),
    };
  }
  window.blHero = async function (id) {
    const raw = (await wp.apiFetch({ path: '/wp/v2/blog-post/' + id + '?context=edit&_fields=content' })).content.raw;
    if (raw.includes('is-style-blog-hero')) return { skip: 'has hero block' };
    const f = await heroFacts(id), inner = [];
    if (f.eyebrow) inner.push(P(esc(f.eyebrow), 'is-style-eyebrow'));
    inner.push(H(esc(f.title), 1));
    if (f.deck) inner.push(P(esc(f.deck)));
    inner.push(P(esc(f.author + (f.source ? ' | ' + f.source : '')), 'is-style-hero-meta'));
    const attrs = { dimRatio: 70, className: 'is-style-blog-hero', layout: { type: 'constrained' } };
    if (f.img) Object.assign(attrs, { url: f.img, alt: f.alt });
    const cover = wp.blocks.serialize([B('core/cover', attrs, inner)]);
    const parsed = wp.blocks.parse(cover)[0];
    if (!parsed.isValid || parsed.innerBlocks.some((b) => !b.isValid)) return { skip: 'invalid hero block' };
    await window.blSave(id, cover + '\n\n' + raw);
    return { before: f, after: await heroFacts(id) };
  };

  window.blSave = (id, markup) => wp.apiFetch({ path: '/wp/v2/blog-post/' + id, method: 'POST', data: { content: markup } });

  // Multiset difference: what the old page had that the new one lacks.
  const missing = (a, b) => {
    const m = new Map();
    b.forEach((x) => m.set(x, (m.get(x) || 0) + 1));
    return a.filter((x) => { const n = m.get(x) || 0; if (n) { m.set(x, n - 1); return false; } return true; });
  };
  window.blCompare = async function (old, id) {
    const art = await page(id);
    const now = facts([art.querySelector('.bl-content'), art.querySelector('.is-style-cta-banner')]);
    return { gb: !!art.querySelector('.bl-content'), words: missing(old.words, now.words), imgs: missing(old.imgs, now.imgs), links: missing(old.links, now.links), extraWords: missing(now.words, old.words) };
  };
})();
