(function () {
    "use strict";
    var KEY = 'fbb-theme';
    var root = document.querySelector('section#imenu-root');
    var themeToggle = document.getElementById('imenu-theme');
    if (!root) return;
    function get() { try { return localStorage.getItem(KEY) || localStorage.getItem('ithena-theme'); } catch (e) { return null; } }
    function setTheme(mode) {
        root.setAttribute('data-theme', mode);
        if (themeToggle) { themeToggle.setAttribute('aria-pressed', mode === 'dark' ? 'true' : 'false'); themeToggle.setAttribute('aria-label', mode === 'dark' ? 'Switch to light theme' : 'Switch to dark theme'); }
        try { localStorage.setItem(KEY, mode); } catch (e) {}
        t.sync();
    }
    var t = window.ithenaTheme = {
        get: get,
        isDark: function () { return root.getAttribute('data-theme') === 'dark'; },
        apply: function (isDark) { setTheme(isDark ? 'dark' : 'light'); },
        toggle: function () { setTheme(t.isDark() ? 'light' : 'dark'); },
        sync: function () {
            var main = document.getElementById('main-section'), mode = root.getAttribute('data-theme');
            if (main && main.getAttribute('data-theme') !== mode) main.setAttribute('data-theme', mode);
        }
    };
    setTheme(get() === 'light' ? 'light' : 'dark');
    if (themeToggle) themeToggle.addEventListener('click', t.toggle);
    function follow() {
        var main = document.getElementById('main-section');
        if (!main) return;
        t.sync();
        new MutationObserver(function () {
            var m = main.getAttribute('data-theme');
            if ((m === 'dark' || m === 'light') && m !== root.getAttribute('data-theme')) setTheme(m);
        }).observe(main, { attributes: true, attributeFilter: ['data-theme'] });
    }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', follow); else follow();
})();
(function () {
    var root = document.getElementById('imenu-root');
    if (!root) return;
    if (root.parentElement !== document.body) document.body.prepend(root);
    var bar = root.querySelector('#imenu-bar');
    function sync() {
        bar.classList.toggle('is-scrolled', scrollY > 40);
        root.style.setProperty('--imenu-header-h', bar.offsetHeight + 'px');
    }
    addEventListener('scroll', sync, { passive: true });
    addEventListener('resize', sync);
    bar.addEventListener('transitionend', sync);
    sync();
    var closeTimer = null;
    var items = root.querySelectorAll('.imenu-item');
    function setOpen(item, on) {
        item.classList.toggle('is-open', on);
        item.querySelector('.imenu-link').setAttribute('aria-expanded', on ? 'true' : 'false');
    }
    items.forEach(function (item) {
        function open() {
            clearTimeout(closeTimer);
            items.forEach(function (i) { if (i !== item) setOpen(i, false); });
            // desktop: a fresh open starts with every group collapsed; the mobile panel still expands all (see .imenu-mt below)
            if (!item.classList.contains('is-open')) item.querySelectorAll('.imenu-group').forEach(function (g) { var b = body(g); clearTimeout(b._t); settle(b); setGroup(g, false); });
            setOpen(item, true);
        }
        function close() { clearTimeout(closeTimer); closeTimer = setTimeout(function () { setOpen(item, false); }, 260); }
        item.addEventListener('mouseenter', open);
        item.addEventListener('mouseleave', close);
        item.addEventListener('focusin', open);
        item.addEventListener('focusout', function (e) { if (!item.contains(e.relatedTarget)) setOpen(item, false); });
    });
    addEventListener('keydown', function (e) {
        if (e.key !== 'Escape') return;
        var openItem = root.querySelector('.imenu-item.is-open');
        if (openItem) { setOpen(openItem, false); openItem.querySelector('.imenu-link').focus(); }
        closeMobile();
    });
    var mOpen = root.querySelector('#imenu-open'), panel = root.querySelector('#imenu-panel'), scrim = root.querySelector('#imenu-scrim');
    function openMobile() { panel.classList.add('is-open'); scrim.classList.add('is-open'); mOpen.setAttribute('aria-expanded', 'true'); }
    function closeMobile() { panel.classList.remove('is-open'); scrim.classList.remove('is-open'); mOpen.setAttribute('aria-expanded', 'false'); }
    mOpen.addEventListener('click', openMobile);
    root.querySelector('#imenu-close').addEventListener('click', closeMobile);
    scrim.addEventListener('click', closeMobile);
    panel.querySelectorAll('.imenu-a').forEach(function (a) { a.addEventListener('click', closeMobile); });
    panel.querySelectorAll('.imenu-mt').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var item = btn.parentElement, on = !item.classList.contains('is-open');
            item.parentElement.querySelectorAll(':scope > .imenu-mi.is-open').forEach(function (s) {
                if (s !== item) { s.classList.remove('is-open'); s.querySelector('.imenu-mt').setAttribute('aria-expanded', 'false'); }
            });
            item.classList.toggle('is-open', on);
            btn.setAttribute('aria-expanded', on ? 'true' : 'false');
            if (on) item.querySelectorAll('.imenu-mi').forEach(function (s) { s.classList.add('is-open'); s.querySelector('.imenu-mt').setAttribute('aria-expanded', 'true'); });
        });
    });
    var DURATION = 300, reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
    function body(g) { return g.querySelector('.imenu-gitems'); }
    function settle(b) { b.classList.remove('is-animating'); b.style.height = b.style.opacity = ''; }
    function setGroup(g, open) {
        g.classList.toggle('is-open', open);
        g.querySelector('.imenu-gsum').setAttribute('aria-expanded', open ? 'true' : 'false');
    }
    function animate(g, open) {
        var b = body(g);
        if (open) setGroup(g, true);
        if (reduce) { setGroup(g, open); return; }
        clearTimeout(b._t);
        var h = b.scrollHeight;
        b.classList.add('is-animating');
        b.style.height = (open ? 0 : h) + 'px';
        b.style.opacity = open ? '0' : '1';
        requestAnimationFrame(function () { b.style.height = (open ? h : 0) + 'px'; b.style.opacity = open ? '1' : '0'; });
        b._t = setTimeout(function () { settle(b); setGroup(g, open); }, DURATION + 40);
    }
    root.querySelectorAll('.imenu-group').forEach(function (g) {
        g.querySelector('.imenu-gsum').addEventListener('click', function () {
            var wasOpen = g.classList.contains('is-open');
            // one dropdown at a time: close any other open group in this menu item
            g.closest('.imenu-item').querySelectorAll('.imenu-group.is-open').forEach(function (o) { if (o !== g) animate(o, false); });
            animate(g, !wasOpen);
        });
    });
    var logo = root.querySelector('.imenu-logo-img');
    function show() { root.style.transition = 'opacity .3s'; root.style.removeProperty('visibility'); root.style.removeProperty('opacity'); }
    Promise.race([
        Promise.all([logo.decode ? logo.decode().catch(function () {}) : 0, document.fonts ? document.fonts.ready : 0]),
        new Promise(function (r) { setTimeout(r, 2500); })
    ]).then(show);
})();
