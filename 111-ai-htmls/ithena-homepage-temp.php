<?php
/**
 * Template Name: New Ithena Homepage
 */

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- ===================== PAGE INIT JS (pre-paint, applies to header + body) ===================== -->
        <script>
            // Apply saved/system theme before first paint to avoid a light/dark flash.
            (function () {
                try {
                    var saved = localStorage.getItem('ithena-theme');
                    var isDark = saved ? saved === 'dark' : window.matchMedia('(prefers-color-scheme: dark)').matches;
                    if (isDark) document.documentElement.classList.add('dark');
                } catch (e) {}
            })();
        </script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ITHENA - AI-Driven Digital Transformation for Manufacturing &amp; Enterprise</title>
        <meta name="description" content="ITHENA helps manufacturers and enterprises modernize with AI, Industrial ERP, IoT, Cloud and Analytics - reducing cost, raising throughput, and shortening time-to-value.">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&family=Manrope:wght@500;600;700&display=swap" rel="stylesheet">
        
        <style>
            /*
            * Stylesheet split into HEADER / BODY / FOOTER sections, each further split into
            * light (default) and dark (html.dark) sub-sections so the light/dark rules for a
            * given area sit next to each other instead of living in one large trailing block.
            * All var(--token) custom-property references have been resolved to their
            * literal computed values (light-theme default; html.dark rules use the
            * dark-theme values; .hero-scoped rules use its local light-on-dark override).
            */
            html { color-scheme: light; scroll-behavior: smooth;}
            html.dark { color-scheme: dark;}

            /* ======================================================================
            HEADER
            ====================================================================== */

            /* -- light (default) -- */
            header { position: fixed; top: 0; left: 0; right: 0; z-index: 200; padding: 20px 0; transition: padding .4s cubic-bezier(.16, .8, .24, 1), background .4s cubic-bezier(.16, .8, .24, 1), box-shadow .4s cubic-bezier(.16, .8, .24, 1), border-color .4s cubic-bezier(.16, .8, .24, 1); background: transparent; border-bottom: 1px solid transparent;}
            header.scrolled { padding: 12px 0; background: #F6F8FA; box-shadow: 0 12px 30px -18px #14284629; border-bottom: 1px solid #0A192D1A;}
            header:not(.scrolled) .logo, header:not(.scrolled) .nav-link, header:not(.scrolled) .nav-item.open .nav-link svg { color: #fff;}
            header:not(.scrolled) .nav-link { color: #FFFFFFE0; transition: color .25s, background .25s;}
            header:not(.scrolled) .icon-btn, header:not(.scrolled) .mobile-toggle { background: #FFFFFF1A; border-color: #FFFFFF4C; color: #fff;}
            header:not(.scrolled) .mobile-toggle span { background: #fff;}
            header:not(.scrolled) .nav-link:hover, header:not(.scrolled) .nav-item.open .nav-link { color: #fff; background: #FFFFFF24;}
            .nav-inner { display: flex; align-items: center; justify-content: space-between; gap: 24px;}
            /* .logo { display: flex; align-items: center; gap: 10px; font-family: "Sora", sans-serif; font-weight: 800; font-size: 21px; letter-spacing: -0.01em;} */
            .nav-menu { display: flex; align-items: center; gap: 6px;}
            .nav-item { position: relative;}
            .nav-link { display: flex; align-items: center; gap: 5px; padding: 10px 15px; border-radius: 10px; font-size: 14px; font-weight: 600; color: #4A5A6E; transition: .25s;}
            .nav-link:hover, .nav-item.open .nav-link { color: #0A1626; background: #0A192D0F;}
            .nav-link svg { width: 12px; height: 12px; transition: transform .3s;}
            .nav-item.open .nav-link svg { transform: rotate(180deg);}
            .nav-actions { display: flex; align-items: center; gap: 14px;}
            .icon-btn { width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; background: #0A192D0D; border: 1px solid #0A192D1A; color: #4A5A6E;}
            .icon-btn:hover { color: #0A1626; border-color: #0A192D33;}
            .mega { position: fixed; top: 94px; left: 50%; width: min(calc(100vw - 40px), 1220px); background: #F6F8FAE0; -webkit-backdrop-filter: saturate(180%) blur(20px); backdrop-filter: saturate(180%) blur(20px); border: 1px solid #0A192D14; border-radius: 22px; box-shadow: 0 30px 60px -20px #14284638, 0 14px 28px -14px #14284624, inset 0 1px 0 #FFFFFFB2; opacity: 0; visibility: hidden; pointer-events: none; overflow: hidden; transform: translateX(-50%) translateY(-8px); transition: opacity .28s cubic-bezier(.16, .8, .24, 1), transform .28s cubic-bezier(.16, .8, .24, 1), visibility .28s; z-index: 150;}

            /* Browsers without backdrop-filter support (e.g. older Firefox) fall
            back to a near-solid panel so text stays legible. */
            @supports not ((backdrop-filter: blur(1px)) or (-webkit-backdrop-filter: blur(1px))) { .mega { background: #F6F8FAFA;}}
            .mega::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, transparent, #0083C8, #4FE0D0, #0083C8, transparent); opacity: .7;}
            .nav-item.open .mega { opacity: 1; visibility: visible; pointer-events: auto; transform: translateX(-50%) translateY(0);}
            .mega-wide { padding: 0;}
            .mega-inner { padding: 30px 34px 34px;}
            .mega-sol-cols { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0;}
            .mega-sol-col { padding: 0 30px; border-right: 1px solid #0A192D1A;}
            .mega-sol-col:first-child { padding-left: 0;}
            .mega-sol-col:last-child { padding-right: 0; border-right: none;}
            .mega-sol-col-head { display: flex; align-items: center; gap: 12px; min-height: 56px; margin-bottom: 16px; padding-bottom: 16px; border-bottom: 2px solid #0083C8;}
            .mega-sol-col-icon { width: 40px; height: 40px; border-radius: 11px; flex-shrink: 0; background: linear-gradient(135deg, #0083C8, #4FE0D0); color: #fff; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 18px -8px #0082C88C;}
            .mega-sol-col-head h4 { font-size: 16px; color: #0A1626; margin-bottom: 2px; white-space: nowrap;}
            .mega-sol-col-head .mega-sol-col-sub { display: block; font-size: 12px; font-weight: 600; color: #76889C; white-space: nowrap;}
            .mega-sol-group { border-bottom: 1px solid #0A192D14;}
            .mega-sol-group:last-child { border-bottom: none;}
            .mega-sol-group summary { list-style: none; cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 12px 2px; font-family: "Manrope", sans-serif; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: .04em; color: #4A5A6E; transition: color .2s;}
            .mega-sol-group summary::-webkit-details-marker { display: none;}
            .mega-sol-group summary::marker { content: "";}
            .mega-sol-group summary:hover { color: #0083C8;}
            .mega-sol-group summary .chev { flex-shrink: 0; color: #76889C; transition: transform .25s cubic-bezier(.16, .8, .24, 1);}
            .mega-sol-group[open] summary { color: #0083C8;}
            .mega-sol-group[open] summary .chev { transform: rotate(180deg); color: #0083C8;}
            .mega-sol-group-items { padding: 2px 2px 14px; display: flex; flex-direction: column; gap: 8px; overflow: hidden;}

            /* Smooth expand/collapse for mega-menu accordions (height is driven by JS;
               these rules just supply the easing and keep content clipped mid-animation). */
            .mega-sol-group-items.is-animating { transition: height .3s cubic-bezier(.16, .8, .24, 1), opacity .3s cubic-bezier(.16, .8, .24, 1);}
            .mega-sol-item { display: flex; align-items: flex-start; gap: 10px; padding: 7px 8px; border-radius: 8px; transition: background .2s;}
            .mega-sol-item:hover { background: #0A192D0D;}
            .mega-sol-item-icon { width: 30px; height: 30px; border-radius: 9px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; transition: transform .25s cubic-bezier(.16, .8, .24, 1);}
            .mega-sol-item:hover .mega-sol-item-icon { transform: scale(1.1) rotate(-5deg);}
            .mega-sol-item-icon.c1,
            .mega-sol-item-icon.c2,
            .mega-sol-item-icon.c3,
            .mega-sol-item-icon.c4,
            .mega-sol-item-icon.c5,
            .mega-sol-item-icon.c6 { background: #0082C826; color: #0083C8;}
            .mega-sol-item-text { min-width: 0;}
            .mega-sol-item .mega-sol-item-name { display: block; font-size: 14px; font-weight: 500; color: #0A1626; margin-bottom: 2px; white-space: nowrap; transition: color .2s;}
            .mega-sol-item:hover .mega-sol-item-name { color: #0083C8;}
            .mega-sol-item .mega-sol-item-sub { display: block; font-size: 12px; color: #76889C; line-height: 1.4;}
            .mega-feat-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 26px 40px; padding-bottom: 22px; margin-bottom: 20px; border-bottom: 1px solid #0A192D1A;}
            .mega-feat { display: flex; gap: 13px; align-items: flex-start; opacity: 0; transform: translateY(10px); transition: opacity .4s cubic-bezier(.16, .8, .24, 1), transform .4s cubic-bezier(.16, .8, .24, 1);}
            .nav-item.open .mega-feat { opacity: 1; transform: translateY(0);}
            .mega-feat-grid .mega-feat:nth-child(1) { transition-delay: .06s;}
            .mega-feat-grid .mega-feat:nth-child(2) { transition-delay: .11s;}
            .mega-feat-grid .mega-feat:nth-child(3) { transition-delay: .16s;}
            .mega-feat-grid .mega-feat:nth-child(4) { transition-delay: .21s;}
            .mega-feat-grid .mega-feat:nth-child(5) { transition-delay: .26s;}
            .mega-feat-grid .mega-feat:nth-child(6) { transition-delay: .31s;}
            .mega-feat-grid .mega-feat:nth-child(7) { transition-delay: .36s;}
            .mega-feat-grid .mega-feat:nth-child(8) { transition-delay: .41s;}
            .mega-feat-grid .mega-feat:nth-child(9) { transition-delay: .46s;}
            .mega-feat-icon { width: 42px; height: 42px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0; transition: transform .3s cubic-bezier(.16, .8, .24, 1);}
            .mega-feat:hover .mega-feat-icon { transform: scale(1.1) rotate(-5deg);}
            .mega-feat-icon.c1,
            .mega-feat-icon.c2,
            .mega-feat-icon.c3,
            .mega-feat-icon.c4,
            .mega-feat-icon.c5,
            .mega-feat-icon.c6 { background: #0082C826; color: #0083C8;}
            .mega-feat-body h4 { font-size: 14px; color: #0A1626; margin-bottom: 4px; white-space: nowrap;}
            .mega-feat-body p { font-size: 12px; color: #76889C; line-height: 1.5; margin-bottom: 7px;}
            .mega-feat-explore { font-size: 12px; font-weight: 700; color: #0083C8; display: inline-flex; align-items: center; gap: 5px;}
            .mega-feat-explore svg { transition: transform .25s cubic-bezier(.16, .8, .24, 1);}
            .mega-feat:hover .mega-feat-explore svg { transform: translateX(3px);}

            .mega-feat-grid.no-border { border-bottom: none; margin-bottom: 0; padding-bottom: 0;}
            .mobile-toggle { display: none; width: 40px; height: 40px; border-radius: 10px; background: #0A192D0F; border: 1px solid #0A192D1A; flex-direction: column; align-items: center; justify-content: center; gap: 4px;}
            .mobile-toggle span { display: block; width: 18px; height: 2px; background: #0A1626; border-radius: 2px; transition: background .2s;}
            .theme-toggle svg { transition: opacity .2s, transform .3s cubic-bezier(.16, .8, .24, 1);}
            .mobile-panel { position: fixed; inset: 0 0 0 auto; width: min(360px, 86vw); top: 0; height: 110vh; background: #E4EAF1; transform: translateX(100%); transition: transform .4s cubic-bezier(.16, .8, .24, 1); z-index: 300; padding: 26px; overflow-y: auto; border-left: 1px solid #0A192D1A;}
            .mobile-panel.open { transform: translateX(0);}
            .mobile-panel .m-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;}
            .mobile-panel a { display: block; padding: 14px 4px; font-size: 16px; font-weight: 600; color: #0A1626; border-bottom: 1px solid #0A192D1A;}
            .mobile-panel .btn { width: 100%; justify-content: center; margin-top: 22px;}
            .mobile-panel .m-item { border-bottom: 1px solid #0A192D1A;}
            .mobile-panel .m-toggle { width: 100%; display: flex; align-items: center; justify-content: space-between; gap: 10px; background: none; border: none; padding: 14px 4px; font-family: inherit; font-size: 16px; font-weight: 600; color: #0A1626; cursor: pointer; text-align: left;}
            .mobile-panel .m-toggle svg { flex-shrink: 0; color: #76889C; transition: transform .3s cubic-bezier(.16, .8, .24, 1);}
            .mobile-panel .m-item.open > .m-toggle svg { transform: rotate(180deg); color: #0083C8;}
            .mobile-panel .m-submenu { max-height: 0; overflow: hidden; transition: max-height .4s cubic-bezier(.16, .8, .24, 1);}
            .mobile-panel .m-item.open > .m-submenu { max-height: 900px; padding-bottom: 8px;}
            .mobile-panel .m-sub-label { display: block; padding: 12px 4px 6px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: .07em; color: #76889C;}
            .mobile-panel .m-sub-link { display: flex; align-items: center; gap: 10px; padding: 11px 4px 11px 6px; font-size: 14px; font-weight: 500; color: #4A5A6E; border-bottom: 1px solid #0A192D1A;}
            .mobile-panel .m-sub-link:last-child { border-bottom: none;}
            .mobile-panel .m-sub-link .ic { width: 22px; height: 22px; border-radius: 6px; background: #0082C826; color: #0083C8; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 12px;}
            .mobile-panel .m-sub-link:hover { color: #0083C8;}
            .mobile-panel .m-item-nested { border-bottom: none; padding-left: 4px; border-left: 2px solid #0A192D1A;}
            .mobile-panel .m-item-nested .m-toggle-sub { padding: 12px 4px; font-size: 14px;}
            .mobile-panel .m-toggle-sub > span:first-child { display: flex; flex-direction: column; gap: 2px;}
            .mobile-panel .m-toggle-tag { font-size: 12px; font-weight: 500; text-transform: none; letter-spacing: 0; color: #76889C;}
            .mobile-panel .m-item-nested .m-submenu { padding-left: 10px;}
            #m-solutions .m-sub-link { align-items: flex-start;}
            .mobile-panel .m-sub-text { display: flex; flex-direction: column; gap: 2px;}
            .mobile-panel .m-sub-text small { font-size: 12px; font-weight: 400; color: #76889C; line-height: 1.4;}
            .mobile-panel .m-sub-more { display: flex; align-items: center; justify-content: center; gap: 8px; margin: 10px 4px 4px; padding: 11px 14px; border-radius: 100px; background: #0082C81A; color: #0083C8; font-size: 14px; font-weight: 700; border-bottom: none;}
            .mobile-panel .m-sub-more:hover { background: #0083C8; color: #fff;}
            .scrim { position: fixed; inset: 0; background: #00000080; z-index: 250; opacity: 0; visibility: hidden; transition: .3s;}
            .scrim.open { opacity: 1; visibility: visible;}

            /* -- dark theme overrides -- */
            html.dark .mega { background: #08101CE0; border-color: #FFFFFF1A; box-shadow: 0 30px 60px -20px #00000099, 0 14px 28px -14px #00000066, inset 0 1px 0 #FFFFFF14;}
            html.dark header.scrolled { background: #050A11; box-shadow: 0 12px 30px -18px #00000080; border-bottom-color: #FFFFFF14;}
            html.dark .nav-link { color: #ffffff;}
            html.dark .nav-link:hover, html.dark .nav-item.open .nav-link { color: #F4F8FB; background: #FFFFFF14;}
            html.dark .icon-btn { background: #FFFFFF0F; border-color: #FFFFFF1F; color: #8FA0B5;}
            html.dark .icon-btn:hover { color: #F4F8FB; border-color: #FFFFFF47;}
            html.dark .mobile-toggle { background: #FFFFFF14; border-color: #FFFFFF24;}
            html.dark .mobile-toggle span { background: #F4F8FB;}
            html.dark .theme-toggle .ic-moon { display: inline-block !important;}
            html.dark .theme-toggle .ic-sun { display: none !important;}
            html.dark .mega-sol-col { border-right-color: #FFFFFF1A;}
            @media (max-width:1180px) { html.dark .mega-sol-col { border-bottom-color: #FFFFFF1A;}}
            html.dark .mega-sol-col-head h4 { color: #F4F8FB;}
            html.dark .mega-sol-col-head .mega-sol-col-sub { color: #b3b3b3;}
            html.dark .mega-sol-group { border-bottom-color: #FFFFFF14;}
            html.dark .mega-sol-group summary { color: #8FA0B5;}
            html.dark .mega-sol-group summary .chev { color: #b3b3b3;}
            html.dark .mega-sol-item:hover { background: #FFFFFF0F;}
            html.dark .mega-sol-item .mega-sol-item-name { color: #F4F8FB;}
            html.dark .mega-sol-item .mega-sol-item-sub { color: #b3b3b3;}
            html.dark .mega-feat-grid { border-bottom-color: #FFFFFF1A;}
            html.dark .mega-feat-body h4 { color: #F4F8FB;}
            html.dark .mega-feat-body p { color: #b3b3b3;}
            html.dark :is(.mega-sol-item-icon, .mega-feat-icon):is(.c1, .c2, .c3, .c4, .c5, .c6) { background: #0083C833; color: #4FA9E0;}
            html.dark .mobile-panel { background: #0F2036; border-left-color: #FFFFFF1A;}
            html.dark .mobile-panel a { color: #F4F8FB; border-bottom-color: #FFFFFF1A;}
            html.dark .mobile-panel .m-item { border-bottom-color: #FFFFFF1A;}
            html.dark .mobile-panel .m-toggle { color: #F4F8FB;}
            html.dark .mobile-panel .m-toggle svg { color: #8FA0B5;}
            html.dark .mobile-panel .m-sub-label { color: #b3b3b3;}
            html.dark .mobile-panel .m-sub-link { color: #8FA0B5; border-bottom-color: #FFFFFF14;}
            html.dark .mobile-panel .m-item-nested { border-left-color: #FFFFFF1F;}
            html.dark .mobile-panel .m-toggle-tag { color: #b3b3b3;}
            html.dark .mobile-panel .m-sub-text small { color: #b3b3b3;}

            /* -- media queries -- */
            @media (max-width:520px) { .demo-modal { padding: 30px 22px 26px;}}
            @media (max-width:1180px) { .mega-sol-cols { grid-template-columns: 1fr;} .mega-sol-col { padding: 18px 0; border-right: none; border-bottom: 1px solid #0A192D1A;} .mega-sol-col:first-child { padding-top: 0;} .mega-sol-col:last-child { padding-bottom: 0; border-bottom: none;}}
            @media (max-width:980px) { .mega, .nav-menu, .nav-actions .btn-ghost, .nav-actions .icon-btn:not(.theme-toggle), .nav-actions .btn-primary { display: none;} .mobile-toggle { display: flex;}}

            /* ======================================================================
            BODY
            ====================================================================== */

            /* -- light (default) -- */
            * { box-sizing: border-box; margin: 0; padding: 0;}
            body { background: #F6F8FA; color: #0A1626; font-family: "Inter", sans-serif; line-height: 1.6; overflow-x: hidden; -webkit-font-smoothing: antialiased;}
            img { max-width: 100%; display: block;}
            a { color: inherit; text-decoration: none;}
            button { font-family: inherit; cursor: pointer;}
            ul { list-style: none;}
            .wrap { max-width: 1280px; margin: 0 auto; padding: 15px 30px;}
            body::before { content: ""; position: fixed; inset: 0; background: radial-gradient(1100px 620px at 82% -10%, #0082C81A, transparent 60%), radial-gradient(900px 500px at -10% 20%, #4FE0D014, transparent 55%), linear-gradient(180deg, #F6F8FA 0%, #EEF2F6 40%, #F6F8FA 100%); z-index: -2;}
            .noise { position: fixed; inset: 0; z-index: -1; opacity: .02; pointer-events: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");}
            h1, h2, h3, h4 { font-family: "Sora", sans-serif; font-weight: 700; letter-spacing: -0.02em; line-height: 1.08;}
            .eyebrow { font-family: "Manrope", sans-serif; font-weight: 700; font-size: 16px; letter-spacing: 0.14em; text-transform: uppercase; color: #0083C8; display: flex; align-items: center; gap: 10px; margin-bottom: 16px;}
            .eyebrow::before { content: ""; width: 22px; height: 2px; background: linear-gradient(90deg, #0083C8, #4FE0D0); border-radius: 2px; animation: eyebrowPulse 2.6s ease-in-out infinite;}
            .section-head { max-width: 750px; margin-bottom: 56px;}
            .section-head h2 { font-size: clamp(30px, 4vw, 46px); color: #0A1626; margin-bottom: 16px;}
            .section-head p { color: #4A5A6E; font-size: 18px; max-width: 600px;}
            .grad-text { background: #0083c8; -webkit-background-clip: text; background-clip: text; color: transparent;}
            section { position: relative; padding: 50px 0;}
            .bg-white { background: #FFFFFF;}
            .bg-black { background: #F6F8FA;}
            .bg-soft { background: linear-gradient(180deg, #FFFFFF 0%, #D7ECF6 14%, #D7ECF6 86%, #FFFFFF 100%);}
            .btn { display: inline-flex; align-items: center; gap: 9px; font-family: "Manrope", sans-serif; font-weight: 700; font-size: 14px; padding: 14px 26px; border-radius: 100px; border: 1px solid transparent; transition: all .35s cubic-bezier(.16, .8, .24, 1); white-space: nowrap;}
            .btn-primary, .btn-white { box-shadow: 0 8px 24px -8px #0082C899;}
            .btn-primary { position: relative; overflow: hidden; background: linear-gradient(100deg, #0083C8, #0067A0); color: #fff;}
            .btn-white { background: linear-gradient(100deg, #ceeeff, #ffffff); color: #0083c8;}
            .btn-primary:hover, .btn-white:hover { transform: translateY(-2px); box-shadow: 0 14px 32px -8px #00A8E8B2;}
            .btn-ghost { background: #c00000; color: #fff; border-color: #0A192D1A; backdrop-filter: blur(6px);}
            .btn-ghost:hover { background: #0A192D17; border-color: #0A192D33;}
            .btn-text { display: inline-flex; align-items: center; gap: 6px; color: #0083C8; font-weight: 700; font-size: 14px; transition: .3s cubic-bezier(.16, .8, .24, 1);}
            .btn-text svg, .impact-card .num { transition: transform .3s cubic-bezier(.16, .8, .24, 1);}
            .btn-text:hover svg { transform: translateX(4px);}
            .hero { padding: 190px 0 100px; position: relative; overflow: hidden; isolation: isolate; background: #050A11;}
            .hero-bg-video { position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0; overflow: hidden;}
            .hero-bg-video video { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;}

            /* Fades the bottom of the hero video/background into the white
            background of the section that follows (#trusted), so the two
            sections melt into each other instead of showing a hard edge. */
            .hero::after { content: ''; position: absolute; left: 0; right: 0; bottom: 0; height: 260px; background: linear-gradient(180deg, #00000000 0%, #ADADAD8C 50%, #FFFFFF 96%); z-index: 1; pointer-events: none;}
            .hero-grid { position: relative; z-index: 2; display: grid; grid-template-columns: 1.05fr 0.95fr; gap: 56px; align-items: center;}
            .hero h1 { font-size: clamp(38px, 5.2vw, 64px); margin-bottom: 22px; color: #fff;}
            .hero p.lead { font-size: 18px; color: #FFFFFFD9; max-width: 520px; margin-bottom: 34px;}
            .hero-ctas { display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 30px;}
            .impact-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;}
            .impact-card, .ind-card, .sol-card, .tm-card, .why-card, .zz-card, .zz-illustration { border: 1px solid #0A192D1A; border-bottom: 3px solid #0083C8;}
            .impact-card { padding: 0; border-radius: 16px; background: #fff; overflow: hidden; transition: .35s cubic-bezier(.16, .8, .24, 1);}
            .impact-card:hover { transform: translateY(-6px); border-color: #00A8E859; box-shadow: 0 20px 40px -20px #0082C866;}
            .impact-visual { height: 120px; position: relative; overflow: hidden;}
            .impact-visual::before { content: ""; position: absolute; inset: 0; background-image: radial-gradient(#FFFFFF2E 1px, transparent 1px); background-size: 16px 16px;}
            .impact-visual.v1 { background: linear-gradient(135deg, #0A1626, #113A63 60%, #0083C8);}
            .impact-visual.v2 { background: linear-gradient(135deg, #4A3B10, #8A6D1E 55%, #F5A623);}
            .impact-visual.v3 { background: linear-gradient(135deg, #0A1626, #0B4A78 55%, #4FE0D0);}
            .impact-visual.v4 { background: linear-gradient(135deg, #0A1626, #1C2C42 60%, #3ED598);}
            .impact-body { padding: 0 24px 26px; text-align: center;}
            .impact-card .ic { width: 52px; height: 52px; border-radius: 50%; background: #fff; box-shadow: 0 10px 22px -8px #0A192D4C; color: #0083C8; display: flex; align-items: center; justify-content: center; margin: -26px auto 18px; position: relative; z-index: 2;}
            .impact-card .num { font-family: "Sora", sans-serif; font-size: 38px; font-weight: 800; color: #0A1626; margin-bottom: 6px;}
            .impact-card .num span { color: #c00000;}
            .impact-card h4 { font-size: 14px; font-weight: 700; color: #0A1626; margin-bottom: 8px; text-align: center;}
            .impact-card h4::after { content: ""; display: block; width: 26px; height: 2px; background: #0083C8; margin: 8px auto 0;}
            .impact-card p { font-size: 14px; color: #76889C; text-align: center;}
            .sol-grid, .tm-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px;}
            .sol-card { border-radius: 16px; background: #fff; padding: 0; overflow: hidden; transition: .4s cubic-bezier(.16, .8, .24, 1); display: flex; flex-direction: column;}
            .sol-card:hover { transform: translateY(-6px); border-color: #00A8E866; box-shadow: 0 24px 50px -22px #0083C8;}
            .sol-visual { height: 168px; position: relative; overflow: hidden;}
            .sol-visual::before { content: ""; position: absolute; inset: 0; background-image: radial-gradient(circle at 18% 20%, #FFFFFF29 0, transparent 40%), radial-gradient(#FFFFFF29 1px, transparent 1px); background-size: auto, 18px 18px;}
            .sol-visual.v1 { background: linear-gradient(150deg, #0A2540, #0083C8 65%, #4FE0D0);}
            .sol-visual.v2 { background: linear-gradient(150deg, #0A1626, #1C4E8A 60%, #0083C8);}
            .sol-visual.v3 { background: linear-gradient(150deg, #14213D, #0083C8 55%, #2FB6C4);}
            .sol-visual.v4 { background: linear-gradient(150deg, #0A1626, #0E5C8C 55%, #F5A623);}
            .sol-visual.v5 { background: linear-gradient(150deg, #10192B, #3A3D8C 55%, #4FE0D0);}
            .sol-visual.v6 { background: linear-gradient(150deg, #0A1626, #0083C8 55%, #7C3AED);}
            .sol-icon-badge { position: relative; width: 48px; height: 48px; margin: -24px 0 0 22px; border-radius: 14px; background: #fff; box-shadow: 0 10px 22px -8px #0A192D47; display: flex; align-items: center; justify-content: center; color: #0083C8; z-index: 2; flex-shrink: 0;}
            .sol-body { padding: 16px 22px 24px; display: flex; flex-direction: column; gap: 12px; flex: 1;}
            .sol-body h3 { font-size: 18px;}
            .sol-body p { font-size: 14px; color: #4A5A6E;}
            .sol-body ul { display: flex; flex-direction: column; gap: 6px; margin: 4px 0 8px;}
            .sol-body li { font-size: 12px; color: #76889C; display: flex; gap: 8px; align-items: flex-start;}
            .sol-body li::before { content: "✓"; color: #3ED598; font-weight: 700; flex-shrink: 0;}
            .ind-grid, .why-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;}
            .ind-card { border-radius: 16px; padding: 26px 22px; background: #fff; transition: .35s cubic-bezier(.16, .8, .24, 1); position: relative;}
            .ind-card:hover, .why-card:hover, .tm-card:hover { border-color: #00A8E866; box-shadow: 0 24px 50px -22px #0083C8;}
            .ind-card .ic { width: 48px; height: 48px; border-radius: 13px; background: linear-gradient(135deg, #0082C84C, #4FE0D026); color: #4FE0D0; display: flex; align-items: center; justify-content: center; font-size: 22px; margin-bottom: 18px;}
            .ind-card h4 { font-size: 16px; margin-bottom: 8px;}
            .ind-card p { font-size: 14px; color: #76889C; margin-bottom: 14px;}
            .ind-card .stat { font-family: "Manrope", sans-serif; font-size: 12px; font-weight: 700; color: #0083C8; margin-bottom: 14px;}
            .why-card { padding: 0; border-radius: 16px; border: 1px solid #0A192D1A; border-bottom: 3px solid #0083C8; background: #fff; overflow: hidden; display: flex; align-items: stretch; transition: .3s;}
            .why-card-text { flex: 1 1 56%; min-width: 0; padding: 24px 18px 14px 24px; display: flex; flex-direction: column;}
            .why-card .ic { width: 42px; height: 42px; border-radius: 11px; background: #0082C81F; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 16px;}
            .why-card h4 { font-size: 16px; margin-bottom: 8px;}
            .why-card p, .zz-card p { font-size: 14px; color: #76889C; line-height: 1.5;}
            .why-card-visual { flex: 0 0 40%; position: relative; min-height: 150px; overflow: hidden;}
            .zigzag { position: relative; display: flex; flex-direction: column; overflow-x: hidden;}
            .zigzag::before { content: ""; position: absolute; left: 50%; top: 6px; bottom: 6px; width: 2px; transform: translateX(-50%); background: linear-gradient(180deg, #c00000, #4FE0D0, #c00000); opacity: .35;}
            .zz-item { position: relative; display: grid; grid-template-columns: 1fr 64px 1fr; align-items: center; gap: 0 32px; padding: 26px 0;}
            .zz-card { flex: 0 1 320px; max-width: 320px; opacity: 0; transition: opacity 1s cubic-bezier(.16, .8, .2, 1), transform 1s cubic-bezier(.16, .8, .2, 1); will-change: transform, opacity; background: #FFFFFF; border-radius: 16px; padding: 22px 24px; box-shadow: 0 18px 40px -24px #14284629;}
            .zz-illustration { width: 150px; height: auto; border-radius: 18px; overflow: hidden; box-shadow: 0 16px 30px -18px #0A192D59;}
            .zz-card .zz-ic { width: 36px; height: 36px; border-radius: 10px; background: #0082C81F; color: #0083C8; display: flex; align-items: center; justify-content: center; font-size: 18px; margin-bottom: 12px;}
            .zz-card h4 { font-size: 18px; margin-bottom: 6px;}
            .zz-item.reveal-left .zz-card, .zz-item.reveal-left .zz-illustration { transform: translateX(min(-45vw, -420px));}
            .zz-item.reveal-right .zz-card, .zz-item.reveal-right .zz-illustration { transform: translateX(min(45vw, 420px));}
            .zz-item.in .zz-card, .zz-item.in .zz-illustration, .line-anim.in .eyebrow, .line-anim.in h2 { opacity: 1; transform: translateX(0);}
            .zz-num { position: relative; width: 52px; height: 52px; border-radius: 50%; background: #E4EAF1; border: 2px solid #c00000; display: flex; align-items: center; justify-content: center; font-family: "Sora", sans-serif; font-weight: 800; font-size: 18px; color: #0A1626; z-index: 2; justify-self: center; box-shadow: 0 0 0 6px #D7ECF6;}
            .zz-item .zz-side-l { grid-column: 1; display: flex; align-items: center; justify-content: flex-end; gap: 18px;}
            .zz-item .zz-side-r { grid-column: 3; display: flex; align-items: center; justify-content: flex-start; gap: 18px;}
            .counter-band { border-radius: 24px; border: 1px solid #0A192D1A; background: #0083c8; padding: 56px 40px; display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; text-align: center;}
            .counter-band .cnum { font-family: "Sora", sans-serif; font-size: clamp(30px, 3.4vw, 42px); font-weight: 800; color: #fff; margin-bottom: 6px;}
            .counter-band .clabel { font-size: 12px; color: #fff; font-weight: 600;}
            .tm-card { border-radius: 16px; padding: 26px; background: #fff;}
            .tm-stars { color: #FFC24B; font-size: 14px; margin-bottom: 14px; letter-spacing: 2px;}
            .tm-card p { font-size: 14px; color: #4A5A6E; margin-bottom: 20px; font-style: italic;}
            .tm-person { display: flex; align-items: center; gap: 12px;}
            .tm-person strong { display: block; font-size: 14px; color: #0A1626;}
            .tm-person span { font-size: 12px; color: #76889C;}
            .trusted-label { font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; color: #76889C; text-align: center; margin-bottom: 30px;}
            .trusted-marquee { overflow: hidden; position: relative; width: 100%; -webkit-mask-image: linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent); mask-image: linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent);}
            .trusted-track { display: flex; width: max-content; animation: trusted-scroll 34s linear infinite;}
            .trusted-marquee:hover .trusted-track { animation-play-state: paused;}
            .trusted-img { width: auto; height: 60px; display: flex; align-items: center; justify-content: center; padding: 0 30px; font-family: "Sora", sans-serif; font-weight: 700; font-size: 26px; color: #0083C8; white-space: nowrap; transition: opacity .3s, color .3s;}
            .line-anim.in p { opacity: 1;}
            .cta-banner { border-radius: 28px; padding: 70px 50px; text-align: center; position: relative; overflow: hidden; border: 1px solid #00A8E84C; background: #0083C8;}
            .cta-banner h2 { font-size: clamp(28px, 4vw, 42px); margin-bottom: 16px; color: #fff;}
            .cta-banner p { color: #fff; max-width: 520px; margin: 0 auto 34px; font-size: 16px;}
            .cta-row { display: flex; justify-content: center; gap: 14px; flex-wrap: wrap;}
            .reveal { opacity: 0; transform: translateY(28px); transition: opacity .8s cubic-bezier(.16, .8, .24, 1), transform .8s cubic-bezier(.16, .8, .24, 1);}
            .reveal.in { opacity: 1; transform: translateY(0);}
            .sol-card.reveal { transform: translateY(-36px);}
            .sol-card.reveal.in { transform: translateY(0);}
            .line-anim .eyebrow { opacity: 0; transform: translateX(-70px); transition: opacity .7s cubic-bezier(.16, .8, .24, 1), transform .7s cubic-bezier(.16, .8, .24, 1);}
            .line-anim h2 { opacity: 0; transform: translateX(70px); transition: opacity .7s cubic-bezier(.16, .8, .24, 1) .12s, transform .7s cubic-bezier(.16, .8, .24, 1) .12s;}
            .line-anim p { opacity: 0; transition: opacity .6s cubic-bezier(.16, .8, .24, 1) .32s;}
            :is(.impact-card, .sol-card, .ind-card, .why-card, .tm-card):nth-child(1) { transition-delay: 0s;}
            :is(.impact-card, .sol-card, .ind-card, .why-card, .tm-card):nth-child(2) { transition-delay: .07s;}
            :is(.impact-card, .sol-card, .ind-card, .why-card, .tm-card):nth-child(3) { transition-delay: .14s;}
            :is(.impact-card, .sol-card, .ind-card, .why-card, .tm-card):nth-child(4) { transition-delay: .21s;}
            :is(.sol-card, .ind-card, .why-card):nth-child(5) { transition-delay: .28s;}
            :is(.sol-card, .ind-card, .why-card):nth-child(6) { transition-delay: .35s;}
            :is(.ind-card):nth-child(7) { transition-delay: .42s;}
            :is(.ind-card):nth-child(8) { transition-delay: .49s;}
            .impact-card .ic, .ind-card .ic, .why-card .ic { transition: transform .4s cubic-bezier(.16, .8, .24, 1), background .3s, color .3s;}
            .impact-card:hover .ic, .why-card:hover .ic { transform: scale(1.12) rotate(-6deg); background: #0083C8; color: #c00000;}
            .ind-card:hover .ic { transform: scale(1.12) rotate(6deg);}
            .impact-card:hover .num { transform: scale(1.05);}
            .btn-primary::after { content: ""; position: absolute; top: 0; left: -60%; width: 40%; height: 100%; background: linear-gradient(115deg, transparent, #FFFFFF59, transparent); transform: skewX(-20deg); transition: left .6s cubic-bezier(.16, .8, .24, 1);}
            .btn-primary:hover::after { left: 130%;}
            .counter-band > div { transition: transform .35s cubic-bezier(.16, .8, .24, 1);}
            .counter-band > div:hover { transform: translateY(-4px);}
            @keyframes trusted-scroll { from { transform: translateX(0);} to { transform: translateX(-50%);}}
            @keyframes eyebrowPulse { 0%, 100% { opacity: 1; transform: scaleX(1);} 50% { opacity: .55; transform: scaleX(1.3);}}
            .to-top { position: fixed; right: 24px; bottom: 24px; z-index: 260; width: 46px; height: 46px; border-radius: 50%; border: 1px solid #0A192D1A; background: #FFFFFF; color: #0083C8; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 26px -10px #14284659; cursor: pointer; opacity: 0; visibility: hidden; transform: translateY(12px); transition: opacity .3s cubic-bezier(.16, .8, .24, 1), transform .3s cubic-bezier(.16, .8, .24, 1), visibility .3s, background .25s, color .25s;}
            .to-top.show { opacity: 1; visibility: visible; transform: translateY(0);}
            .to-top:hover { background: #0083C8; color: #fff; transform: translateY(-3px); box-shadow: 0 16px 30px -10px #0082C899;}
            .to-top:focus-visible { outline: 2px solid #0083C8; outline-offset: 3px;}
            .demo-overlay { position: fixed; inset: 0; z-index: 400; display: flex; align-items: center; justify-content: center; padding: 24px; background: #0A192D8C; -webkit-backdrop-filter: blur(6px); backdrop-filter: blur(6px); opacity: 0; visibility: hidden; transition: opacity .3s cubic-bezier(.16, .8, .24, 1), visibility .3s;}
            .demo-overlay.open { opacity: 1; visibility: visible;}
            .demo-modal { position: relative; width: 100%; max-width: 480px; max-height: 90vh; overflow-y: auto; background: #fff; border-radius: 20px; padding: 36px 32px 32px; box-shadow: 0 40px 80px -20px #0A192D73; transform: translateY(18px) scale(.97); opacity: 0; transition: transform .35s cubic-bezier(.16, .8, .24, 1), opacity .35s cubic-bezier(.16, .8, .24, 1);}
            .demo-overlay.open .demo-modal { transform: translateY(0) scale(1); opacity: 1;}
            .demo-modal-close { position: absolute; top: 16px; right: 16px; width: 34px; height: 34px; border-radius: 10px; border: 1px solid #0A192D1A; background: #0A192D0A; color: #4A5A6E; display: flex; align-items: center; justify-content: center; font-size: 16px; line-height: 1; cursor: pointer; transition: .2s;}
            .demo-modal-close:hover { background: #0A192D14; color: #0A1626;}
            .demo-modal-head { margin-bottom: 22px; padding-right: 30px;}
            .demo-modal-head .eyebrow { margin-bottom: 10px;}
            .demo-modal-head h3 { font-family: "Sora", sans-serif; font-weight: 700; font-size: 22px; color: #0A1626; margin-bottom: 8px; letter-spacing: -0.02em;}
            .demo-modal-head p { font-size: 14px; color: #76889C; line-height: 1.5;}

            /* -- dark theme overrides -- */
            html.dark body::before { background: radial-gradient(1100px 620px at 82% -10%, #0082C838, transparent 60%), radial-gradient(900px 500px at -10% 20%, #4FE0D01A, transparent 55%), linear-gradient(180deg, #050A11 0%, #0A1626 40%, #050A11 100%);}
            html.dark .noise { opacity: .035;}
            html.dark .cta-banner { background: linear-gradient(120deg, #04101F, #0A2C46, #04101F, #083048); border-color: #00A8E84C;}
            html.dark::selection { background: #00A8E859;}
            html.dark body { background: #050A11; color: #F4F8FB;}
            html.dark .bg-white { background: #0D1B2E;}
            html.dark .bg-black { background: #050A11;}
            html.dark .bg-soft { background: linear-gradient(180deg, #0D1B2E 0%, #123049 14%, #123049 86%, #0D1B2E 100%);}
            html.dark .hero::after { background: linear-gradient(180deg, #00000000 0%, #0000008C 50%, #0D1B2E 96%);}
            html.dark .section-head h2 { color: #F4F8FB;}
            html.dark .section-head p { color: #8FA0B5;}
            html.dark .btn-ghost { border-color: #FFFFFF24;}
            html.dark .btn-ghost:hover { background: #FFFFFF1F; border-color: #FFFFFF47;}
            html.dark .impact-card, html.dark .ind-card, html.dark .sol-card, html.dark .tm-card, html.dark .why-card, html.dark .zz-card { background: #0D1B2E; border-color:#0083c8;}
            html.dark .impact-card .ic { background: #ffffff;}
            html.dark .impact-card .num { color: #F4F8FB;}
            html.dark .impact-card h4 { color: #F4F8FB;}
            html.dark .impact-card p { color: #b3b3b3;}
            html.dark .sol-icon-badge { background: #fff;}
            html.dark .sol-body p { color: #8FA0B5;}
            html.dark .sol-body li { color: #b3b3b3;}
            html.dark .ind-card p { color: #b3b3b3;}
            html.dark .why-card p, html.dark .zz-card p { color: #b3b3b3;}
            html.dark .zz-card { box-shadow: 0 18px 40px -24px #00000080;}
            html.dark .zz-illustration { box-shadow: 0 16px 30px -18px #0000008C;}
            html.dark .zz-num { background: #0F2036; color: #F4F8FB; box-shadow: 0 0 0 6px #0D1B2E;}
            html.dark .tm-card p { color: #8FA0B5;}
            html.dark .tm-person strong { color: #F4F8FB;}
            html.dark .tm-person span { color: #b3b3b3;}
            html.dark .trusted-label { color: #b3b3b3;}
            html.dark .to-top { background: #0D1B2E; border-color: #FFFFFF24; color: #4FA9E0; box-shadow: 0 10px 26px -10px #000000A6;}
            html.dark .to-top:hover { background: #0083C8; color: #fff;}
            html.dark .demo-modal { background: #0D1B2E; box-shadow: 0 40px 80px -20px #000000A6;}
            html.dark .demo-modal-close { background: #FFFFFF0F; border-color: #FFFFFF24; color: #8FA0B5;}
            html.dark .demo-modal-close:hover { background: #FFFFFF1F; color: #F4F8FB;}
            html.dark .demo-modal-head h3 { color: #F4F8FB;}
            html.dark .demo-modal-head p { color: #b3b3b3;}

            /* -- media queries -- */
            @media (max-width:980px) { .hero { padding: 150px 0 60px;} .hero::after { height: 140px;} .hero-grid { grid-template-columns: 1fr;} .impact-grid { grid-template-columns: repeat(2, 1fr);} .sol-grid, .ind-grid, .tm-grid { grid-template-columns: 1fr 1fr;}}
            @media (max-width:900px) { section { padding: 76px 0;} .why-grid { grid-template-columns: 1fr 1fr;} .why-card-visual { min-height: 120px;} .counter-band { grid-template-columns: repeat(2, 1fr);}}
            @media (max-width:760px) { .zigzag::before { left: 24px;} .zz-item { grid-template-columns: 48px 1fr; gap: 0 18px; padding: 16px 0;} .zz-num { width: 40px; height: 40px; font-size: 14px; grid-column: 1; justify-self: start;} .zz-item .zz-side-l, .zz-item .zz-side-r { grid-column: 2; grid-row: 1; display: block; text-align: left;} .zz-illustration { display: none;} .zz-card { max-width: none;} .zz-item .zz-side-l, .zz-item.zz-odd .zz-side-r, .zz-item.zz-even .zz-side-l { display: none;} .zz-item.zz-even .zz-side-r, .zz-item.zz-odd .zz-side-l { display: block;}}
            @media (max-width:640px) { .wrap { padding: 0 20px;} .sol-grid, .tm-grid { grid-template-columns: 1fr;}}
            @media (max-width:560px) { .impact-grid, .ind-grid, .why-grid, .counter-band { grid-template-columns: 1fr;} .to-top { right: 16px; bottom: 16px; width: 42px; height: 42px;}}
            @media (prefers-reduced-motion:reduce) { * { animation-duration: 0.001ms !important; animation-iteration-count: 1 !important; transition-duration: 0.001ms !important; scroll-behavior: auto !important;} .mega-sol-group-items.is-animating { transition: none;}}

            /* ======================================================================
            FOOTER
            ====================================================================== */

            /* -- light (default) -- */
            footer { padding: 80px 0 30px;}
            .foot-top { display: grid; grid-template-columns: 1.3fr repeat(4, 1fr); gap: 30px; margin-bottom: 56px;}
            .foot-brand p { color: #76889C; font-size: 14px; margin: 16px 0 22px; max-width: 280px;}
            .foot-social { display: flex; gap: 10px;}
            .foot-col h5 { font-size: 14px; font-weight: 700; text-transform: uppercase; color: #0083C8; margin-bottom: 18px;}
            .foot-col a { display: block; font-size: 14px; color: #4A5A6E; margin-bottom: 12px; transition: .2s;}
            .foot-col a:hover { color: #0A1626;}
            .foot-bottom { display: flex; justify-content: space-between; align-items: center; padding-top: 26px; border-top: 1px solid #0A192D1A; font-size: 12px; color: #76889C; flex-wrap: wrap; gap: 12px;}
            .foot-bottom .legal { display: flex; gap: 20px;}

            /* footer accordion (same click-to-expand mechanism as the header's mobile menu,
            reused here so each footer column can collapse); static/always-open on desktop,
            collapsible below the 560px breakpoint where .foot-top drops to a single column. */
            .foot-toggle { width: 100%; display: flex; align-items: center; justify-content: space-between; gap: 10px; background: none; border: none; padding: 0; font-family: inherit; cursor: pointer; text-align: left;}
            .foot-toggle h5 { margin-bottom: 0;}
            .foot-toggle svg { display: none; flex-shrink: 0; color: #76889C; transition: transform .3s cubic-bezier(.16, .8, .24, 1);}
            .foot-submenu { display: flex; flex-direction: column; margin: 15px 0 0;}

            /* -- dark theme overrides -- */
            html.dark .foot-brand p { color: #b3b3b3;}
            html.dark .foot-col a { color: #8FA0B5;}
            html.dark .foot-col a:hover { color: #F4F8FB;}
            html.dark .foot-bottom { border-top-color: #FFFFFF1A; color: #b3b3b3;}
            html.dark .foot-toggle svg { color: #8FA0B5;}
            html.dark .foot-col.open .foot-toggle svg { color: #0083C8;}

            /* -- media queries -- */
            @media (max-width:900px) { .foot-top { grid-template-columns: 1fr 1fr;}}
            @media (max-width:560px) { .foot-top { grid-template-columns: 1fr; padding: 0 30px; margin-bottom: 20px;} .foot-brand { text-align: -webkit-center;} .logo{display: block;} .foot-social{display: inline-flex;} .foot-toggle svg { display: block;} .foot-col.open .foot-toggle svg { transform: rotate(180deg); color: #0083C8;} .foot-submenu { max-height: 0; overflow: hidden;} .foot-bottom{display: grid; justify-content: center;} .foot-col.open .foot-submenu { max-height: 500px; padding: 15px 10px 0;} .foot-col:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0;} html.dark .foot-col { border-bottom-color: #FFFFFF1A;}}

        </style>

    </head>
   
    <body>
        <div class="noise"></div>

        <!-- ===================== HEADER ===================== -->
        <header id="site-header">
            <div class="wrap nav-inner">
                <a class="logo" href="https://dev-website.ithena.app/">
                <img fetchpriority="high" width="136" height="45" src="https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new.webp" 
                    class="attachment-full size-full wp-image-71412" alt="" 
                    srcset="https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new.webp 568w, https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new-300x99.webp 300w" sizes="(max-width: 568px) 100vw, 568px">								
                </a>
                <nav class="nav-menu" id="nav-menu">
                    
                    <div class="nav-item solutions-menu">
                        <a class="nav-link" href="#solutions">
                            Solutions 
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            </svg>
                        </a>

                        <div class="mega mega-wide">
                            <div class="mega-inner">
                                <div class="mega-sol-cols">

                                    <!-- ============ 1. OEM | Distributors ============ -->
                                    <div class="mega-sol-col">
                                        <div class="mega-sol-col-head">
                                            <div class="mega-sol-col-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3z"/><path d="M4 7.5L12 12l8-4.5M12 12v9"/></svg></div>
                                            <div>
                                                <h4>OEM | Distributors</h4>
                                                <span class="mega-sol-col-sub">Production | After Market</span>
                                            </div>
                                        </div>

                                        <details class="mega-sol-group">
                                            <summary>
                                                Front Office Ops
                                                <svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </summary>
                                            <div class="mega-sol-group-items">
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c1"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3"/><path d="M3 20v-1a5 5 0 015-5h2a5 5 0 015 5v1"/><circle cx="17.5" cy="9.5" r="2.2"/><path d="M16 20v-.8a4 4 0 013-3.8"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">iCRM</span>
                                                        <span class="mega-sol-item-sub">Customer relationship management for distributors and OEMs.</span>
                                                    </span>
                                                </a>
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="3" width="14" height="18" rx="2"/><rect x="8" y="6" width="8" height="3" rx="1"/><path d="M8.5 13h.01M12 13h.01M15.5 13h.01M8.5 17h.01M12 17h.01M15.5 17h.01"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">iCPQ</span>
                                                        <span class="mega-sol-item-sub">Configure, price, and quote workflows.</span>
                                                    </span>
                                                </a>
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c3"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="7" cy="6" r="2.5"/><circle cx="7" cy="18" r="2.5"/><circle cx="17" cy="12" r="2.5"/><path d="M7 8.5v7M9.3 7.2l5.5 3.5M9.3 16.8l5.5-3.5"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">iERP</span>
                                                        <span class="mega-sol-item-sub">ERP integrations and operational workflows.</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </details>

                                        <details class="mega-sol-group">
                                            <summary>
                                                After Market Services
                                                <svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </summary>
                                            <div class="mega-sol-group-items">
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c4"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h3l2.5-6 3 12 2.5-6h3"/><circle cx="20" cy="12" r="1.4"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">Performance Monitoring</span>
                                                        <span class="mega-sol-item-sub">Real-time connectivity into asset performance with proactive alerts and alarms.</span>
                                                    </span>
                                                </a>
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c5"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M4.9 4.9l2.1 2.1M17 17l2.1 2.1M19.1 4.9L17 7M7 17l-2.1 2.1"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">Service Portal</span>
                                                        <span class="mega-sol-item-sub">Support your service operations with real-time visibility and workflows.</span>
                                                    </span>
                                                </a>
                                                <a href="/b2b-ecommerce-solution/" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c6"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="20" r="1.4"/><circle cx="17" cy="20" r="1.4"/><path d="M2 3h2l2.4 12.2a2 2 0 002 1.8h8.2a2 2 0 002-1.6L21 8H6"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">B2B eCommerce</span>
                                                        <span class="mega-sol-item-sub">Commerce experience for parts, services, and customer self-service.</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </details>
                                    </div>

                                    <!-- ============ 2. Manufacturer ============ -->
                                    <div class="mega-sol-col">
                                        <div class="mega-sol-col-head">
                                            <div class="mega-sol-col-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V12l5 3v-3l5 3V9l5 3v9H3z"/><path d="M7 21v-3M12 21v-3"/><circle cx="18.5" cy="5.5" r="2.5"/><path d="M18.5 2v1M18.5 8v1M15 5.5h1M21 5.5h1M16.4 3.4l.7.7M19.9 6.9l.7.7M16.4 7.6l.7-.7M19.9 4.1l.7-.7"/></svg></div>
                                            <div>
                                                <h4>Manufacturer</h4>
                                                <span class="mega-sol-col-sub">Plan &rarr; Produce &rarr; Improve</span>
                                            </div>
                                        </div>

                                        <details class="mega-sol-group">
                                            <summary>
                                                Planning
                                                <svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </summary>
                                            <div class="mega-sol-group-items">
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c5"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">iPLAN</span>
                                                        <span class="mega-sol-item-sub">Planning workflows and decision support to improve throughput.</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </details>

                                        <details class="mega-sol-group">
                                            <summary>
                                                Production
                                                <svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </summary>
                                            <div class="mega-sol-group-items">
                                                <a href="/digital-shopfloor-igemba/" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c6"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V11l6 4v-4l6 4V7l6 4v10H3z"/><path d="M7 21v-4M13 21v-4"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">iGEMBA</span>
                                                        <span class="mega-sol-item-sub">Digitize Gemba walks to maximize shop floor productivity and resolve issues fast.</span>
                                                    </span>
                                                </a>
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c1"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V10M12 20V4M20 20v-7"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">Performance Monitoring</span>
                                                        <span class="mega-sol-item-sub">Real-time performance visibility with alerts and alarms.</span>
                                                    </span>
                                                </a>
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="8" height="8" rx="1"/><rect x="13" y="3" width="8" height="8" rx="1"/><rect x="3" y="13" width="8" height="8" rx="1"/><rect x="13" y="13" width="8" height="8" rx="1"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">MES</span>
                                                        <span class="mega-sol-item-sub">Smarter shop-floor view: standardize, measure, improve quality and scale operations.</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </details>

                                        <details class="mega-sol-group">
                                            <summary>
                                                Quality
                                                <svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </summary>
                                            <div class="mega-sol-group-items">
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c3"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v6c0 5-3.5 8-7 9-3.5-1-7-4-7-9V6l7-3z"/><path d="M9 12l2 2 4-4"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">QMS</span>
                                                        <span class="mega-sol-item-sub">Quality management workflows to prevent defects and improve compliance.</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </details>

                                        <details class="mega-sol-group">
                                            <summary>
                                                Maintenance
                                                <svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </summary>
                                            <div class="mega-sol-group-items">
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c4"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 00-5.4 5.4L3 18v3h3l6.3-6.3a4 4 0 005.4-5.4l-2.8 2.8-2-2z"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">CMMS</span>
                                                        <span class="mega-sol-item-sub">Single view of critical KPIs with standardized checklists to resolve issues faster.</span>
                                                    </span>
                                                </a>
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c5"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.5 5.5l2 2M16.5 16.5l2 2M18.5 5.5l-2 2M7.5 16.5l-2 2"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">iSEM</span>
                                                        <span class="mega-sol-item-sub">Service + equipment management workflows and integrations.</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </details>
                                    </div>

                                    <!-- ============ 3. Enterprise ============ -->
                                    <div class="mega-sol-col">
                                        <div class="mega-sol-col-head">
                                            <div class="mega-sol-col-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 21V5a1 1 0 011-1h6a1 1 0 011 1v16"/><path d="M13 21V10a1 1 0 011-1h4a1 1 0 011 1v11"/><path d="M8 7h1M11 7h1M8 10.5h1M11 10.5h1M8 14h1M11 14h1M8 17.5h1M11 17.5h1M16.5 12.5h1M16.5 16h1"/></svg></div>
                                            <div>
                                                <h4>Enterprise</h4>
                                                <span class="mega-sol-col-sub">Analytics | CX | SCM</span>
                                            </div>
                                        </div>

                                        <details class="mega-sol-group">
                                            <summary>
                                                Supply Chain
                                                <svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </summary>
                                            <div class="mega-sol-group-items">
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c6"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="7" width="13" height="9" rx="1"/><path d="M14 10h4l3 3v3h-7z"/><circle cx="6" cy="18" r="1.6"/><circle cx="17.5" cy="18" r="1.6"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">iTMS</span>
                                                        <span class="mega-sol-item-sub">Transportation management and logistics workflows.</span>
                                                    </span>
                                                </a>
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c1"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">iPLAN</span>
                                                        <span class="mega-sol-item-sub">Planning workflows and decision support.</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </details>

                                        <details class="mega-sol-group">
                                            <summary>
                                                Data Analytics
                                                <svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </summary>
                                            <div class="mega-sol-group-items">
                                                <a href="/aether-ai-platform/" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l1.6 5.4L19 9l-5.4 1.6L12 16l-1.6-5.4L5 9l5.4-1.6L12 2z"/><path d="M19 15l.7 2.3L22 18l-2.3.7L19 21l-.7-2.3L16 18l2.3-.7L19 15z"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">Aether</span>
                                                        <span class="mega-sol-item-sub">Practical AI.</span>
                                                    </span>
                                                </a>
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c3"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V10M12 20V4M20 20v-7"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">Analytics</span>
                                                        <span class="mega-sol-item-sub">Enterprise data analytics.</span>
                                                    </span>
                                                </a>
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c4"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="2"/><path d="M8.5 8.5a5 5 0 000 7M15.5 8.5a5 5 0 010 7M5.5 5.5a9 9 0 000 13M18.5 5.5a9 9 0 010 13"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">iHub</span>
                                                        <span class="mega-sol-item-sub">Enterprise data hub and insights.</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </details>

                                        <details class="mega-sol-group">
                                            <summary>
                                                Apps
                                                <svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </summary>
                                            <div class="mega-sol-group-items">
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c5"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5h16v10H8l-4 4V5z"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">iSIP</span>
                                                        <span class="mega-sol-item-sub">Integrated service experience platform.</span>
                                                    </span>
                                                </a>
                                                <a href="#" class="mega-sol-item">
                                                    <span class="mega-sol-item-icon c6"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="3" width="14" height="18" rx="1"/><path d="M9 7h1M14 7h1M9 11h1M14 11h1M9 15h1M14 15h1M10 21v-4h4v4"/></svg></span>
                                                    <span class="mega-sol-item-text">
                                                        <span class="mega-sol-item-name">CRM</span>
                                                        <span class="mega-sol-item-sub">Customer relationship management.</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </details>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="nav-item services-menu">
                        <a class="nav-link" href="#process">
                            Services 
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            </svg>
                        </a>
                        <div class="mega mega-wide">
                            <div class="mega-inner">
                                <div class="mega-feat-grid no-border">
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>AI Strategy</h4>
                                            <p>Define a clear, ROI-driven roadmap for enterprise AI adoption.</p>
                                            <a href="#process" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c2"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V10M12 20V4M20 20v-7"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Big Data &amp; Analytics</h4>
                                            <p>Turn scattered operational data into a single trusted source of truth.</p>
                                            <a href="#process" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c3"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.5 5.5l2 2M16.5 16.5l2 2M18.5 5.5l-2 2M7.5 16.5l-2 2"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>AI/ML | Data Science</h4>
                                            <p>Custom models that predict, optimize, and automate plant decisions.</p>
                                            <a href="#process" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c4"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 18h10a4 4 0 000-8 5.5 5.5 0 00-10.6 1.6A3.5 3.5 0 007 18z"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Cloud Adoption</h4>
                                            <p>Migrate and modernize workloads on a secure, scalable cloud foundation.</p>
                                            <a href="#process" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c5"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 15l6-6"/><path d="M11 6l1-1a3.5 3.5 0 015 5l-1 1M13 18l-1 1a3.5 3.5 0 01-5-5l1-1"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Process Integration</h4>
                                            <p>Connect ERP, MES, PLCs, and SCADA into one seamless data flow.</p>
                                            <a href="#process" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c6"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="12" rx="1.5"/><path d="M8 20h8M12 16v4"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Systems of Engagement</h4>
                                            <p>Modern interfaces that put real-time data in front of the right people.</p>
                                            <a href="#process" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5h16v10H8l-4 4V5z"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Customer Experience</h4>
                                            <p>Design digital journeys that keep customers connected to your business.</p>
                                            <a href="#process" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c2"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V11l6 4v-4l6 4V7l6 4v10H3z"/><path d="M7 21v-4M13 21v-4"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Manufacturing Execution</h4>
                                            <a href="#process" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c3"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="2"/><path d="M8.5 8.5a5 5 0 000 7M15.5 8.5a5 5 0 010 7M5.5 5.5a9 9 0 000 13M18.5 5.5a9 9 0 010 13"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Industrial IoT</h4>
                                            <a href="#process" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nav-item industries-menu">
                        <a class="nav-link" href="#industries">
                            Industries 
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            </svg>
                        </a>

                        <div class="mega mega-wide">
                            <div class="mega-inner">
                                <div class="mega-sol-cols">

                                    <!-- ============ 1. OEM ============ -->
                                    <div class="mega-sol-col">
                                        <div class="mega-sol-col-head">
                                            <div class="mega-sol-col-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3z"/><path d="M4 7.5L12 12l8-4.5M12 12v9"/></svg></div>
                                            <div>
                                                <h4>OEM</h4>
                                                <span class="mega-sol-col-sub">Equipment &amp; machine builders</span>
                                            </div>
                                        </div>

                                        <div class="mega-sol-group-items">
                                            <a href="/industries/packaging/" class="mega-sol-item">
                                                <span class="mega-sol-item-icon c1"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7l9-4 9 4-9 4-9-4z"/><path d="M3 7v10l9 4 9-4V7"/><path d="M12 11v10"/></svg></span>
                                                <span class="mega-sol-item-text">
                                                    <span class="mega-sol-item-name">Packaging</span>
                                                </span>
                                            </a>
                                            <a href="/industries/food-beverage/" class="mega-sol-item">
                                                <span class="mega-sol-item-icon c2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 2h6v4l1.5 2v12a2 2 0 01-2 2h-5a2 2 0 01-2-2V8L9 6V2z"/></svg></span>
                                                <span class="mega-sol-item-text">
                                                    <span class="mega-sol-item-name">Food &amp; Beverage</span>
                                                </span>
                                            </a>
                                            <a href="/industries/compressed-air/" class="mega-sol-item">
                                                <span class="mega-sol-item-icon c3"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 12l4-3"/><path d="M12 7v1M12 17v1M7 12h1M16 12h1"/></svg></span>
                                                <span class="mega-sol-item-text">
                                                    <span class="mega-sol-item-name">Compressed Air</span>
                                                </span>
                                            </a>
                                            <a href="/industries/custom-tool-builder/" class="mega-sol-item">
                                                <span class="mega-sol-item-icon c4"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 00-5.4 5.4L3 18v3h3l6.3-6.3a4 4 0 005.4-5.4l-2.8 2.8-2-2z"/></svg></span>
                                                <span class="mega-sol-item-text">
                                                    <span class="mega-sol-item-name">Custom Tool Builder</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- ============ 2. Manufacturing ============ -->
                                    <div class="mega-sol-col">
                                        <div class="mega-sol-col-head">
                                            <div class="mega-sol-col-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V12l5 3v-3l5 3V9l5 3v9H3z"/><path d="M7 21v-3M12 21v-3"/><circle cx="18.5" cy="5.5" r="2.5"/><path d="M18.5 2v1M18.5 8v1M15 5.5h1M21 5.5h1M16.4 3.4l.7.7M19.9 6.9l.7.7M16.4 7.6l.7-.7M19.9 4.1l.7-.7"/></svg></div>
                                            <div>
                                                <h4>Manufacturing</h4>
                                                <span class="mega-sol-col-sub">Plants &amp; production operations</span>
                                            </div>
                                        </div>

                                        <div class="mega-sol-group-items">
                                            <a href="/industries/industrial/" class="mega-sol-item">
                                                <span class="mega-sol-item-icon c5"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.5 5.5l2 2M16.5 16.5l2 2M18.5 5.5l-2 2M7.5 16.5l-2 2"/></svg></span>
                                                <span class="mega-sol-item-text">
                                                    <span class="mega-sol-item-name">Industrial</span>
                                                </span>
                                            </a>
                                            <a href="/industries/discrete-automotive/" class="mega-sol-item">
                                                <span class="mega-sol-item-icon c6"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13l2-5a2 2 0 012-1h10a2 2 0 012 1l2 5"/><rect x="2" y="13" width="20" height="6" rx="2"/><circle cx="7" cy="19" r="1.6"/><circle cx="17" cy="19" r="1.6"/></svg></span>
                                                <span class="mega-sol-item-text">
                                                    <span class="mega-sol-item-name">Discrete / Automotive</span>
                                                </span>
                                            </a>
                                            <a href="/industries/pharma/" class="mega-sol-item">
                                                <span class="mega-sol-item-icon c1"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="9" width="18" height="6" rx="3"/><path d="M12 9v6"/></svg></span>
                                                <span class="mega-sol-item-text">
                                                    <span class="mega-sol-item-name">Pharma</span>
                                                </span>
                                            </a>
                                            <a href="/industries/energy-utility/" class="mega-sol-item">
                                                <span class="mega-sol-item-icon c2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M13 3L4 14h6l-1 7 9-11h-6z"/></svg></span>
                                                <span class="mega-sol-item-text">
                                                    <span class="mega-sol-item-name">Energy &amp; Utility</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- ============ 3. Strategic Industries ============ -->
                                    <div class="mega-sol-col">
                                        <div class="mega-sol-col-head">
                                            <div class="mega-sol-col-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 010 18M12 3a14 14 0 000 18"/></svg></div>
                                            <div>
                                                <h4>Strategic Industries</h4>
                                                <span class="mega-sol-col-sub">Commerce | Finance | Public</span>
                                            </div>
                                        </div>

                                        <div class="mega-sol-group-items">
                                            <a href="/industries/retail-cpg/" class="mega-sol-item">
                                                <span class="mega-sol-item-icon c3"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8h12l-1 12a2 2 0 01-2 2H9a2 2 0 01-2-2L6 8z"/><path d="M9 8V6a3 3 0 016 0v2"/></svg></span>
                                                <span class="mega-sol-item-text">
                                                    <span class="mega-sol-item-name">Retail / CPG</span>
                                                </span>
                                            </a>
                                            <a href="/industries/fintech/" class="mega-sol-item">
                                                <span class="mega-sol-item-icon c4"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 10l9-6 9 6"/><path d="M5 10v9M9 10v9M15 10v9M19 10v9"/><path d="M3 19h18"/></svg></span>
                                                <span class="mega-sol-item-text">
                                                    <span class="mega-sol-item-name">FinTech</span>
                                                </span>
                                            </a>
                                            <a href="/industries/government/" class="mega-sol-item">
                                                <span class="mega-sol-item-icon c5"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 10h16L12 4z"/><path d="M5 10v9M9 10v9M15 10v9M19 10v9"/><path d="M3 19h18"/></svg></span>
                                                <span class="mega-sol-item-text">
                                                    <span class="mega-sol-item-name">Government</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="nav-link" href="/case-studies/">Case Studies</a>
                    
                    <div class="nav-item company-menu">
                        <a class="nav-link" href="#company">
                            Company 
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            </svg>
                        </a>
                        <div class="mega mega-wide">
                            <div class="mega-inner">
                                <div class="mega-feat-grid no-border">
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="3" width="14" height="18" rx="1"/><path d="M9 7h1M14 7h1M9 11h1M14 11h1M9 15h1M14 15h1M10 21v-4h4v4"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Who We Are</h4>
                                            <p>Our mission, values, and the team building ITHENA.</p>
                                            <a href="https://dev-website.ithena.app/ithena-homepage-test/#" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none">
                                                    <path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c2"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2h9l5 5v15H6z"/><path d="M15 2v5h5M9 13h6M9 17h6M9 9h2"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Blogs</h4>
                                            <p>Insights on industrial AI and digital transformation.</p>
                                            <a href="https://dev-website.ithena.app/ithena-homepage-test/#" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none">
                                                    <path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c3"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11v2a2 2 0 002 2h1l3 5V4l-3 5H5a2 2 0 00-2 2z"/><path d="M14 8a4 4 0 010 8M18 5a8 8 0 010 14"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Announcements</h4>
                                            <p>Product launches, releases, and company news.</p>
                                            <a href="https://dev-website.ithena.app/ithena-homepage-test/#" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none">
                                                    <path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c4"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="12" r="6"/><circle cx="15" cy="12" r="6"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Partnerships</h4>
                                            <p>Our technology and channel partner ecosystem.</p>
                                            <a href="https://dev-website.ithena.app/ithena-homepage-test/#" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none">
                                                    <path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mega-feat">
                                        <div class="mega-feat-icon c5"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="18" height="12" rx="1.5"/><path d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2M3 12h18"/></svg></div>
                                        <div class="mega-feat-body">
                                            <h4>Careers</h4>
                                            <p>Open roles and life at ITHENA.</p>
                                            <a href="https://dev-website.ithena.app/ithena-homepage-test/#" class="mega-feat-explore">
                                                Explore 
                                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none">
                                                    <path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </nav>
                <div class="nav-actions">
                    <button class="icon-btn theme-toggle" id="theme-toggle" aria-label="Switch to dark theme">
                        <svg class="ic-moon" width="17" height="17" viewBox="0 0 20 20" fill="none" style="display:none"><path d="M17 11.5A7.5 7.5 0 018.5 3 7.5 7.5 0 1017 11.5z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
                        <svg class="ic-sun" width="17" height="17" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="4" stroke="currentColor" stroke-width="1.6"/><path d="M10 1.5v2M10 16.5v2M18.5 10h-2M3.5 10h-2M15.8 4.2l-1.4 1.4M5.6 14.4l-1.4 1.4M15.8 15.8l-1.4-1.4M5.6 5.6L4.2 4.2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                    </button>
                    <a href="/contact/" class="btn btn-primary js-demo-trigger">Contact Us</a>
                    <button class="mobile-toggle" id="mobile-open" aria-label="Open menu"><span></span><span></span><span></span></button>
                </div>
            </div>
        </header>
        
        <div class="scrim" id="scrim"></div>
        
        <div class="mobile-panel" id="mobile-panel">
            <div class="m-top">
                <a class="logo" href="https://dev-website.ithena.app/">
                <img fetchpriority="high" width="136" height="45" src="https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new.webp" 
                    class="attachment-full size-full wp-image-71412" alt="" 
                    srcset="https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new.webp 568w, https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new-300x99.webp 300w" sizes="(max-width: 568px) 100vw, 568px">								
                </a>
                <button class="icon-btn" id="mobile-close" aria-label="Close menu">✕</button>
            </div>
            <div class="m-item">
                <button class="m-toggle" data-target="m-solutions">
                    Solutions 
                    <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                        <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                </button>
                <div class="m-submenu" id="m-solutions">

                    <div class="m-item m-item-nested">
                        <button class="m-toggle m-toggle-sub" data-target="m-sol-oem">
                            <span>OEM | Distributors<span class="m-toggle-tag">Production | After Market</span></span>
                            <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                                <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            </svg>
                        </button>
                        <div class="m-submenu" id="m-sol-oem">
                            <a class="m-sub-link" href="/packaging-machinery/"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7l9-4 9 4-9 4-9-4z"/><path d="M3 7v10l9 4 9-4V7"/><path d="M12 11v10"/></svg></span><span class="m-sub-text"><strong>Packaging Machinery</strong></span></a>
                            <a class="m-sub-link" href="/food-processing-bakery-custom-machine/"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12a8 4 0 0116 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4z"/><path d="M8 12v6M12 12v6M16 12v6"/></svg></span><span class="m-sub-text"><strong>Food Processing &amp; Bakery Custom Machine</strong></span></a>
                            <a class="m-sub-link" href="/tool-builders/"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 00-5.4 5.4L3 18v3h3l6.3-6.3a4 4 0 005.4-5.4l-2.8 2.8-2-2z"/></svg></span><span class="m-sub-text"><strong>Tool Builders</strong></span></a>
                            <a class="m-sub-link" href="/compressed-air-hvac-building-equipment/"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1.6"/><path d="M12 12c1.2-3.4 4.4-4.6 6.4-2.4M12 12c-1.2-3.4-4.4-4.6-6.4-2.4M12 12c-3.4-1.2-4.6-4.4-2.4-6.4M12 12c-3.4 1.2-4.6 4.4-2.4 6.4"/></svg></span><span class="m-sub-text"><strong>Compressed Air | HVAC | Building Equipment</strong></span></a>
                            <a class="m-sub-more" href="/other-industries-we-serve/">
                                Other Industries We Serve
                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                            </a>
                        </div>
                    </div>

                    <div class="m-item m-item-nested">
                        <button class="m-toggle m-toggle-sub" data-target="m-sol-mfg">
                            <span>Manufacturer<span class="m-toggle-tag">Plan &rarr; Produce &rarr; Improve</span></span>
                            <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                                <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            </svg>
                        </button>
                        <div class="m-submenu" id="m-sol-mfg">

                            <div class="m-item m-item-nested">
                                <button class="m-toggle m-toggle-sub" data-target="m-sol-mfg-planning">
                                    <span>Planning</span>
                                    <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                                        <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                </button>
                                <div class="m-submenu" id="m-sol-mfg-planning">
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3"/></svg></span><span class="m-sub-text"><strong>iPLAN</strong><small>Planning workflows and decision support to improve throughput.</small></span></a>
                                </div>
                            </div>

                            <div class="m-item m-item-nested">
                                <button class="m-toggle m-toggle-sub" data-target="m-sol-mfg-production">
                                    <span>Production</span>
                                    <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                                        <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                </button>
                                <div class="m-submenu" id="m-sol-mfg-production">
                                    <a class="m-sub-link" href="/digital-shopfloor-igemba/"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V11l6 4v-4l6 4V7l6 4v10H3z"/><path d="M7 21v-4M13 21v-4"/></svg></span><span class="m-sub-text"><strong>iGEMBA</strong><small>Digitize Gemba walks to maximize shop floor productivity and resolve issues fast.</small></span></a>
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V10M12 20V4M20 20v-7"/></svg></span><span class="m-sub-text"><strong>Performance Monitoring</strong><small>Real-time performance visibility with alerts and alarms.</small></span></a>
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="8" height="8" rx="1"/><rect x="13" y="3" width="8" height="8" rx="1"/><rect x="3" y="13" width="8" height="8" rx="1"/><rect x="13" y="13" width="8" height="8" rx="1"/></svg></span><span class="m-sub-text"><strong>MES</strong><small>Smarter shop-floor view: standardize, measure, improve quality and scale operations.</small></span></a>
                                </div>
                            </div>

                            <div class="m-item m-item-nested">
                                <button class="m-toggle m-toggle-sub" data-target="m-sol-mfg-quality">
                                    <span>Quality</span>
                                    <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                                        <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                </button>
                                <div class="m-submenu" id="m-sol-mfg-quality">
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v6c0 5-3.5 8-7 9-3.5-1-7-4-7-9V6l7-3z"/><path d="M9 12l2 2 4-4"/></svg></span><span class="m-sub-text"><strong>QMS</strong><small>Quality management workflows to prevent defects and improve compliance.</small></span></a>
                                </div>
                            </div>

                            <div class="m-item m-item-nested">
                                <button class="m-toggle m-toggle-sub" data-target="m-sol-mfg-maintenance">
                                    <span>Maintenance</span>
                                    <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                                        <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                </button>
                                <div class="m-submenu" id="m-sol-mfg-maintenance">
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 00-5.4 5.4L3 18v3h3l6.3-6.3a4 4 0 005.4-5.4l-2.8 2.8-2-2z"/></svg></span><span class="m-sub-text"><strong>CMMS</strong><small>Single view of critical KPIs with standardized checklists to resolve issues faster.</small></span></a>
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.5 5.5l2 2M16.5 16.5l2 2M18.5 5.5l-2 2M7.5 16.5l-2 2"/></svg></span><span class="m-sub-text"><strong>iSEM</strong><small>Service + equipment management workflows and integrations.</small></span></a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="m-item m-item-nested">
                        <button class="m-toggle m-toggle-sub" data-target="m-sol-ent">
                            <span>Enterprise<span class="m-toggle-tag">Analytics | CX | SCM</span></span>
                            <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                                <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            </svg>
                        </button>
                        <div class="m-submenu" id="m-sol-ent">

                            <div class="m-item m-item-nested">
                                <button class="m-toggle m-toggle-sub" data-target="m-sol-ent-supply">
                                    <span>Supply Chain</span>
                                    <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                                        <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                </button>
                                <div class="m-submenu" id="m-sol-ent-supply">
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="7" width="13" height="9" rx="1"/><path d="M14 10h4l3 3v3h-7z"/><circle cx="6" cy="18" r="1.6"/><circle cx="17.5" cy="18" r="1.6"/></svg></span><span class="m-sub-text"><strong>iTMS</strong><small>Transportation management and logistics workflows.</small></span></a>
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3"/></svg></span><span class="m-sub-text"><strong>iPLAN</strong><small>Planning workflows and decision support.</small></span></a>
                                </div>
                            </div>

                            <div class="m-item m-item-nested">
                                <button class="m-toggle m-toggle-sub" data-target="m-sol-ent-data">
                                    <span>Data Analytics</span>
                                    <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                                        <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                </button>
                                <div class="m-submenu" id="m-sol-ent-data">
                                    <a class="m-sub-link" href="/aether-ai-platform/"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l1.6 5.4L19 9l-5.4 1.6L12 16l-1.6-5.4L5 9l5.4-1.6L12 2z"/><path d="M19 15l.7 2.3L22 18l-2.3.7L19 21l-.7-2.3L16 18l2.3-.7L19 15z"/></svg></span><span class="m-sub-text"><strong>Aether</strong><small>Practical AI.</small></span></a>
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V10M12 20V4M20 20v-7"/></svg></span><span class="m-sub-text"><strong>Analytics</strong><small>Enterprise data analytics.</small></span></a>
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="2"/><path d="M8.5 8.5a5 5 0 000 7M15.5 8.5a5 5 0 010 7M5.5 5.5a9 9 0 000 13M18.5 5.5a9 9 0 010 13"/></svg></span><span class="m-sub-text"><strong>iHub</strong><small>Enterprise data hub and insights.</small></span></a>
                                </div>
                            </div>

                            <div class="m-item m-item-nested">
                                <button class="m-toggle m-toggle-sub" data-target="m-sol-ent-apps">
                                    <span>Apps</span>
                                    <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                                        <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                </button>
                                <div class="m-submenu" id="m-sol-ent-apps">
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5h16v10H8l-4 4V5z"/></svg></span><span class="m-sub-text"><strong>iSIP</strong><small>Integrated service experience platform.</small></span></a>
                                    <a class="m-sub-link" href="#"><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="3" width="14" height="18" rx="1"/><path d="M9 7h1M14 7h1M9 11h1M14 11h1M9 15h1M14 15h1M10 21v-4h4v4"/></svg></span><span class="m-sub-text"><strong>CRM</strong><small>Customer relationship management.</small></span></a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="m-item">
                <button class="m-toggle" data-target="m-services">
                    Services 
                    <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                        <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                </button>
                <div class="m-submenu" id="m-services">
                    <span class="m-sub-label">Advisory Consulting</span>
                    <a class="m-sub-link" href="#process"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3"/></svg></span>AI Strategy</a>
                    <span class="m-sub-label">Data Management</span>
                    <a class="m-sub-link" href="#process"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V10M12 20V4M20 20v-7"/></svg></span>Big Data &amp; Analytics</a>
                    <a class="m-sub-link" href="#process"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.5 5.5l2 2M16.5 16.5l2 2M18.5 5.5l-2 2M7.5 16.5l-2 2"/></svg></span>AI/ML | Data Science</a>
                    <span class="m-sub-label">Cloud Modernization</span>
                    <a class="m-sub-link" href="#process"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M7 18h10a4 4 0 000-8 5.5 5.5 0 00-10.6 1.6A3.5 3.5 0 007 18z"/></svg></span>Cloud Adoption</a>
                    <a class="m-sub-link" href="#process"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 15l6-6"/><path d="M11 6l1-1a3.5 3.5 0 015 5l-1 1M13 18l-1 1a3.5 3.5 0 01-5-5l1-1"/></svg></span>Process Integration</a>
                    <span class="m-sub-label">Business Transformation</span>
                    <a class="m-sub-link" href="#process"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="12" rx="1.5"/><path d="M8 20h8M12 16v4"/></svg></span>Systems of Engagement</a>
                    <a class="m-sub-link" href="#process"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5h16v10H8l-4 4V5z"/></svg></span>Customer Experience</a>
                    <span class="m-sub-label">Manufacturing Integration</span>
                    <a class="m-sub-link" href="#process"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V11l6 4v-4l6 4V7l6 4v10H3z"/><path d="M7 21v-4M13 21v-4"/></svg></span>Manufacturing Execution</a>
                    <a class="m-sub-link" href="#process"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="2"/><path d="M8.5 8.5a5 5 0 000 7M15.5 8.5a5 5 0 010 7M5.5 5.5a9 9 0 000 13M18.5 5.5a9 9 0 010 13"/></svg></span>Industrial IoT</a>
                </div>
            </div>
            <div class="m-item">
                <button class="m-toggle" data-target="m-industries">
                    Industries 
                    <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                        <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                </button>
                <div class="m-submenu" id="m-industries">
                    <span class="m-sub-label">OEM</span>
                    <a class="m-sub-link" href="/industries/packaging/"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7l9-4 9 4-9 4-9-4z"/><path d="M3 7v10l9 4 9-4V7"/><path d="M12 11v10"/></svg></span>Packaging</a>
                    <a class="m-sub-link" href="/industries/food-beverage/"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 2h6v4l1.5 2v12a2 2 0 01-2 2h-5a2 2 0 01-2-2V8L9 6V2z"/></svg></span>Food &amp; Beverage</a>
                    <a class="m-sub-link" href="/industries/compressed-air/"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 12l4-3"/><path d="M12 7v1M12 17v1M7 12h1M16 12h1"/></svg></span>Compressed Air</a>
                    <a class="m-sub-link" href="/industries/custom-tool-builder/"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 00-5.4 5.4L3 18v3h3l6.3-6.3a4 4 0 005.4-5.4l-2.8 2.8-2-2z"/></svg></span>Custom Tool Builder</a>
                    <span class="m-sub-label">Manufacturing</span>
                    <a class="m-sub-link" href="/industries/industrial/"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.5 5.5l2 2M16.5 16.5l2 2M18.5 5.5l-2 2M7.5 16.5l-2 2"/></svg></span>Industrial</a>
                    <a class="m-sub-link" href="/industries/discrete-automotive/"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13l2-5a2 2 0 012-1h10a2 2 0 012 1l2 5"/><rect x="2" y="13" width="20" height="6" rx="2"/><circle cx="7" cy="19" r="1.6"/><circle cx="17" cy="19" r="1.6"/></svg></span>Discrete / Automotive</a>
                    <a class="m-sub-link" href="/industries/pharma/"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="9" width="18" height="6" rx="3"/><path d="M12 9v6"/></svg></span>Pharma</a>
                    <a class="m-sub-link" href="/industries/energy-utility/"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M13 3L4 14h6l-1 7 9-11h-6z"/></svg></span>Energy &amp; Utility</a>
                    <span class="m-sub-label">Strategic Industries</span>
                    <a class="m-sub-link" href="/industries/retail-cpg/"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8h12l-1 12a2 2 0 01-2 2H9a2 2 0 01-2-2L6 8z"/><path d="M9 8V6a3 3 0 016 0v2"/></svg></span>Retail / CPG</a>
                    <a class="m-sub-link" href="/industries/fintech/"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 10l9-6 9 6"/><path d="M5 10v9M9 10v9M15 10v9M19 10v9"/><path d="M3 19h18"/></svg></span>FinTech</a>
                    <a class="m-sub-link" href="/industries/government/"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 10h16L12 4z"/><path d="M5 10v9M9 10v9M15 10v9M19 10v9"/><path d="M3 19h18"/></svg></span>Government</a>
                </div>
            </div>
            <a href="#testimonials">Case Studies</a>
            <div class="m-item">
                <button class="m-toggle" data-target="m-company">
                    Company 
                    <svg width="13" height="13" viewBox="0 0 12 12" fill="none">
                        <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                </button>
                <div class="m-submenu" id="m-company">
                    <a class="m-sub-link" href="https://dev-website.ithena.app/ithena-homepage-test/#"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="3" width="14" height="18" rx="1"/><path d="M9 7h1M14 7h1M9 11h1M14 11h1M9 15h1M14 15h1M10 21v-4h4v4"/></svg></span>Who We Are</a>
                    <a class="m-sub-link" href="https://dev-website.ithena.app/ithena-homepage-test/#"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2h9l5 5v15H6z"/><path d="M15 2v5h5M9 13h6M9 17h6M9 9h2"/></svg></span>Blogs</a>
                    <a class="m-sub-link" href="https://dev-website.ithena.app/ithena-homepage-test/#"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11v2a2 2 0 002 2h1l3 5V4l-3 5H5a2 2 0 00-2 2z"/><path d="M14 8a4 4 0 010 8M18 5a8 8 0 010 14"/></svg></span>Announcements</a>
                    <a class="m-sub-link" href="https://dev-website.ithena.app/ithena-homepage-test/#"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="12" r="6"/><circle cx="15" cy="12" r="6"/></svg></span>Partnerships</a>
                    <a class="m-sub-link" href="https://dev-website.ithena.app/ithena-homepage-test/#"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="18" height="12" rx="1.5"/><path d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2M3 12h18"/></svg></span>Careers</a>
                </div>
            </div>
            <a href="#contact">Contact</a>
        </div>

        <!-- ===================== BODY ===================== -->
        <!-- ===================== HERO ===================== -->
        <section class="hero" id="top">
            <div class="hero-bg-video" aria-hidden="true">
                <video autoplay muted loop playsinline preload="auto">
                    <source src="https://dev-website.ithena.app/wp-content/uploads/2026/07/website%20banner%20final.mp4" type="video/mp4">
                </video>
            </div>
            <div class="wrap hero-grid">
                <div>
                    <div class="eyebrow">AI-Driven Digital Transformation</div>
                    <h1>Transform Manufacturing with <span class="grad-text">AI-Powered</span> Digital Solutions</h1>
                    <p class="lead">ITHENA helps manufacturers and enterprises modernize operations with AI, Industrial ERP, IoT, Cloud and Analytics - cutting cost, lifting throughput, and shortening time-to-value across every plant.</p>
                    <div class="hero-ctas">
                        <a href="/contact/" class="btn btn-primary js-demo-trigger">Schedule a Demo</a>
                        <a href="#solutions" class="btn btn-ghost">Explore Solutions</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===================== TRUSTED BY ===================== -->
        <section id="trusted" class="bg-white">
            <div class="wrap">
                <div class="trusted-label">Trusted by manufacturers &amp; enterprises worldwide - Partnered by leading technology partners</div>
                <div class="trusted-marquee">
                    <div class="trusted-track" id="trusted-track">
                        <img class="trusted-img" src="https://dev-website.ithena.app/wp-content/uploads/2026/07/RA-Partner-Logo_System-Integrator_GOLD_rgb.png" alt="Brightcove Logo"  loading="lazy">
                        <img class="trusted-img" src="https://dev-website.ithena.app/wp-content/uploads/2026/07/google-cloud-3-scaled.webp" alt="Google Cloud Logo"  loading="lazy">
                        <img class="trusted-img" src="https://dev-website.ithena.app/wp-content/uploads/2026/07/aws-2-scaled.webp" alt="AWS Logo"  loading="lazy">
                        <img class="trusted-img" src="https://ithena.ai/wp-content/uploads/2024/08/Rectangle-948-2.png" alt="Incorta Logo"  loading="lazy">
                        <img class="trusted-img" src="https://ithena.ai/wp-content/uploads/2023/07/Group-467-1.png" alt="Infor Logo"  loading="lazy">
                        <img class="trusted-img" src="https://dev-website.ithena.app/wp-content/uploads/2026/07/microsoft-6-scaled.webp" alt="Microsoft Logo"  loading="lazy">
                        <img class="trusted-img" src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-950.png" alt="Dassault Systèmes Logo"  loading="lazy">
                        <img class="trusted-img" src="https://dev-website.ithena.app/wp-content/uploads/2026/07/ptc-log.webp" alt="PTC Logo"  loading="lazy">
                        <img class="trusted-img" src="https://ithena.ai/wp-content/uploads/2023/07/oracle-2.png" alt="Oracle Logo"  loading="lazy">
                        <img class="trusted-img" src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-954-1.png" alt="pozyx Logo"  loading="lazy">
                        <img class="trusted-img" src="https://dev-website.ithena.app/wp-content/uploads/2026/07/bc-logo.webp" alt="Brightcove Logo"  loading="lazy">
                    </div>
                </div>
            </div>
        </section>

        <!-- ===================== INDUSTRIES ===================== -->
        <section id="industries" class="bg-soft">
            <div class="wrap">
                <div class="section-head line-anim">
                    <div class="eyebrow">Industries We Serve</div>
                    <h2>Built for the sectors that run the world</h2>
                    <p>Deep domain expertise across manufacturing-adjacent industries, not generic horizontal tooling.</p>
                </div>
                <div class="ind-grid">
                    <div class="ind-card reveal">
                        <div class="ic">🏗</div>
                        <h4>Industrial Manufacturing</h4>
                        <p>Transforming manufacturing through connected digital technologies.</p>
                        <div class="stat">↑ 42% faster changeovers</div>
                    </div>
                    <div class="ind-card reveal">
                        <div class="ic">🩺</div>
                        <h4>Healthcare &amp; Life Sciences</h4>
                        <p>Driving transformation that meaningfully impacts patient outcomes.</p>
                        <div class="stat">↓ 29% compliance overhead</div>
                    </div>
                    <div class="ind-card reveal">
                        <div class="ic">🏦</div>
                        <h4>Financial Services &amp; Fintech</h4>
                        <p>Unified data and AI-driven analytics for banking and InsureTech.</p>
                        <div class="stat">↑ 51% faster reporting</div>
                    </div>
                    <div class="ind-card reveal">
                        <div class="ic">🔋</div>
                        <h4>Energy &amp; Utilities</h4>
                        <p>Optimizing grids and plants with AI-driven demand forecasting.</p>
                        <div class="stat">↓ 18% energy waste</div>
                    </div>
                    <div class="ind-card reveal">
                        <div class="ic">🛍</div>
                        <h4>Retail &amp; B2B Commerce</h4>
                        <p>Connecting supply chain and storefront on a single data layer.</p>
                        <div class="stat">↑ 22% order accuracy</div>
                    </div>
                    <div class="ind-card reveal">
                        <div class="ic">📡</div>
                        <h4>Media &amp; Entertainment</h4>
                        <p>Optimizing operations to improve audience acquisition and retention.</p>
                        <div class="stat">↑ 2.1x engagement</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===================== SOLUTIONS ===================== -->
        <section id="solutions" class="bg-white">
            <div class="wrap">
                <div class="section-head reveal">
                    <div class="eyebrow">Solutions</div>
                    <h2>One platform, every layer of the enterprise</h2>
                    <p>From the plant floor to the boardroom - modular solutions that connect data, people, and machines.</p>
                </div>
                <div class="sol-grid">
                    
                    <div class="sol-card reveal">
                        <div class="sol-visual v1">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/digital-shopfloor.webp" alt="Digital Shopfloor" loading="lazy">
                        </div>
                        <div class="sol-body">
                            <div class="sol-icon-badge"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="12" rx="1.5"/><path d="M8 20h8M12 16v4"/></svg></div>
                            <h3>Digital Shopfloor</h3>
                            <p>A browser-based digital twin of every line, machine, and shift.</p>
                            <ul>
                                <li>Real-time line visibility</li>
                                <li>Andon &amp; alerting</li>
                                <li>Mobile-ready for operators</li>
                            </ul>
                            <a href="https://dev-website.ithena.app/digital-shopfloor-igemba/" class="btn-text">
                                Explore Digital Shopfloor 
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="sol-card reveal">
                        <div class="sol-visual v2">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/smart-service.webp" alt="Smart Service" loading="lazy">
                        </div>
                        <div class="sol-body">
                            <div class="sol-icon-badge"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4 4 0 00-5.4 5.4L3 18v3h3l6.3-6.3a4 4 0 005.4-5.4l-2.8 2.8-2-2z"/></svg></div>
                            <h3>Smart Service</h3>
                            <p>Predictive field service that fixes issues before customers notice.</p>
                            <ul>
                                <li>Predictive maintenance</li>
                                <li>Technician scheduling</li>
                                <li>Parts &amp; inventory sync</li>
                            </ul>
                            <a href="https://dev-website.ithena.app/smart-service-iserv/" class="btn-text">
                                Explore Smart Service 
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="sol-card reveal">
                        <div class="sol-visual v3">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/manu-excellence.webp" alt="Manufacturing Excellence" loading="lazy">
                        </div>
                        <div class="sol-body">
                            <div class="sol-icon-badge"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="9" width="3" height="11" rx="1.5"/><rect x="10.5" y="5" width="3" height="15" rx="1.5"/><rect x="17" y="12" width="3" height="8" rx="1.5"/></svg></div>
                            <h3>Manufacturing Excellence</h3>
                            <p>Close the loop between quality, OEE, and continuous improvement.</p>
                            <ul>
                                <li>Live OEE dashboards</li>
                                <li>Root-cause analytics</li>
                                <li>SPC &amp; quality gates</li>
                            </ul>
                            <a href="https://dev-website.ithena.app/manufacturing-excellence-imex/" class="btn-text">
                                Explore Manufacturing Excellence 
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="sol-card reveal">
                        <div class="sol-visual v4">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/energy-mgmt.webp" alt="Energy Management" loading="lazy">
                        </div>
                        <div class="sol-body">
                            <div class="sol-icon-badge"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M13 3L4 14h6l-1 7 9-11h-6z"/></svg></div>
                            <h3>Energy Management</h3>
                            <p>Monitor and reduce consumption across every site, in real time.</p>
                            <ul>
                                <li>Site-level energy dashboards</li>
                                <li>Carbon reporting</li>
                                <li>AI load forecasting</li>
                            </ul>
                            <a href="https://dev-website.ithena.app/smart-energy-management-isems/" class="btn-text">
                                Explore Energy Management 
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="sol-card reveal">
                        <div class="sol-visual v5">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/agentic-oem.webp" alt="The Agentic OEM" loading="lazy">
                        </div>
                        <div class="sol-body">
                            <div class="sol-icon-badge"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="8" width="14" height="10" rx="3"/><circle cx="9" cy="13" r="1.3"/><circle cx="15" cy="13" r="1.3"/><path d="M12 8V5M9 5h6M3 12h2M19 12h2"/></svg></div>
                            <h3>The Agentic OEM</h3>
                            <p>Autonomous agents that support machine builders across the equipment lifecycle.</p>
                            <ul>
                                <li>Real-time context from across OEM ecosystem </li>
                                <li>First-Line Customer Support</li>
                                <li>Proactive Service Operations</li>
                            </ul>
                            <a href="https://dev-website.ithena.app/oem-ai-agents/" class="btn-text">
                                Explore The Agentic OEM 
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="sol-card reveal">
                        <div class="sol-visual v6">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/aether.webp" alt="Analytics AI Platform" loading="lazy">
                        </div>
                        <div class="sol-body">
                            <div class="sol-icon-badge"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3a3 3 0 00-3 3c-1.1 0-2 .9-2 2s.9 2 2 2c-.6.5-1 1.2-1 2 0 1.1.9 2 2 2 0 1.7 1.3 3 3 3s3-1.3 3-3V6a3 3 0 00-3-3z"/><path d="M15 3a3 3 0 013 3c1.1 0 2 .9 2 2s-.9 2-2 2c.6.5 1 1.2 1 2 0 1.1-.9 2-2 2 0 1.7-1.3 3-3 3"/></svg></div>
                            <h3>Analytics AI Platform</h3>
                            <p>Autonomous agents that monitor, decide, and act across operations.</p>
                            <ul>
                                <li>Anomaly detection</li>
                                <li>Natural-language shift reports</li>
                                <li>Human-in-the-loop controls</li>
                            </ul>
                            <a href="https://dev-website.ithena.app/aether-ai-platform/" class="btn-text">
                                Explore Analytics AI Platform 
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

        <!-- ===================== BUSINESS IMPACT ===================== -->
        <section id="impact" class="bg-soft">
            <div class="wrap">
                <div class="section-head reveal">
                    <div class="eyebrow">Business Impact</div>
                    <h2>Outcomes our customers actually feel</h2>
                    <p>Every ITHENA engagement is measured against operational KPIs, not vanity metrics - here's the impact across our portfolio.</p>
                </div>
                <div class="impact-grid">
                    <div class="impact-card reveal">
                        <div class="impact-visual v1">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/fast-operation.webp" alt="Faster Operations" loading="lazy">
                        </div>
                        <div class="impact-body">
                            <div class="ic">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13 3L4 14h6l-1 7 9-11h-6z"/></svg></div>
                            <div class="num" data-count="42">0<span>%</span></div>
                            <h4>Faster Operations</h4>
                            <p>Average cycle-time reduction after digital shopfloor rollout.</p>
                        </div>
                    </div>
                    <div class="impact-card reveal">
                        <div class="impact-visual v2">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/reduced-cost.webp" alt="Reduced Costs" loading="lazy">  
                        </div>
                        <div class="impact-body">
                            <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 6.5c0-1.9-2.2-3.5-5-3.5s-5 1.4-5 3.5S9.2 10 12 10s5 1.4 5 3.5-2.2 3.5-5 3.5-5-1.6-5-3.5"/></svg></div>
                            <div class="num" data-count="31">0<span>%</span></div>
                            <h4>Reduced Costs</h4>
                            <p>Lower operating cost from AI-driven energy &amp; maintenance planning.</p>
                        </div>
                    </div>
                    <div class="impact-card reveal">
                        <div class="impact-visual v3">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/incresed-prod.webp" alt="Increased Productivity" loading="lazy">
                        </div>
                        <div class="impact-body">
                            <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 17l6-6 4 4 8-8M21 11V7h-4"/></svg></div>
                            <div class="num" data-count="27">0<span>%</span></div>
                            <h4>Increased Productivity</h4>
                            <p>Output per shift gained through predictive scheduling.</p>
                        </div>
                    </div>
                    <div class="impact-card reveal">
                        <div class="impact-visual v4">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/system-reliability.webp" alt="System Reliability" loading="lazy">
                        </div>
                        <div class="impact-body">
                            <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v6c0 5-3.5 8-7 9-3.5-1-7-4-7-9V6l7-3z"/><path d="M9 12l2 2 4-4"/></svg></div>
                            <div class="num" data-count="99.6">0<span>%</span></div>
                            <h4>System Reliability</h4>
                            <p>Platform uptime across all managed ITHENA Cloud deployments.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===================== WHY ITHENA ===================== -->
        <section id="why" class="bg-white">
            <div class="wrap">
                <div class="section-head reveal">
                    <div class="eyebrow">Why ITHENA</div>
                    <h2>What makes ITHENA different</h2>
                    <p>We're not a systems integrator that added "AI" to a slide deck - we build AI-first, manufacturing-native software.</p>
                </div>
                <div class="why-grid">
                    <div class="why-card reveal">
                        <div class="why-card-text">
                            <div class="ic">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3a3 3 0 00-3 3c-1.1 0-2 .9-2 2s.9 2 2 2c-.6.5-1 1.2-1 2 0 1.1.9 2 2 2 0 1.7 1.3 3 3 3s3-1.3 3-3V6a3 3 0 00-3-3z"/><path d="M15 3a3 3 0 013 3c1.1 0 2 .9 2 2s-.9 2-2 2c.6.5 1 1.2 1 2 0 1.1-.9 2-2 2 0 1.7-1.3 3-3 3"/></svg>
                            </div>
                            <h4>AI-First Approach</h4>
                            <p>Every module is designed around agentic AI from day one, not bolted on afterward.</p>
                        </div>
                        <div class="why-card-visual wv1">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/ai-first.webp" alt="AI-First Approach" loading="lazy">
                        </div>
                    </div>
                    <div class="why-card reveal">
                        <div class="why-card-text">
                            <div class="ic"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="7" r="3"/><path d="M2 21v-1a6 6 0 016-6h2a6 6 0 016 6v1"/><circle cx="18" cy="8" r="2.2"/><path d="M15.5 21v-.8a4 4 0 013.2-3.9"/></svg></div>
                            <h4>Manufacturing Expertise</h4>
                            <p>100+ specialists who've worked the shopfloor, not just the software stack.</p>
                        </div>
                        <div class="why-card-visual wv2">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/manufacturing-expertise.webp" alt="Manufacturing Expertise" loading="lazy">  
                        </div>
                    </div>
                    <div class="why-card reveal">
                        <div class="why-card-text">
                            <div class="ic"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="1.5"/><path d="M8 8h8M8 12h8M8 16h5"/></svg></div>
                            <h4>Enterprise-Ready Architecture</h4>
                            <p>Built to scale across sites, subsidiaries, and legacy systems without rip-and-replace.</p>
                        </div>
                        <div class="why-card-visual wv3">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/entr-ready.webp" alt="Enterprise-Ready Architecture" loading="lazy">    
                        </div>
                    </div>
                    <div class="why-card reveal">
                        <div class="why-card-text">
                            <div class="ic"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 018 0v3"/></svg></div>
                            <h4>Security by Design</h4>
                            <p>SOC 2-aligned controls, encrypted by default, with granular role-based access.</p>
                        </div>
                        <div class="why-card-visual wv4">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/security-design.webp" alt="Security by Design" loading="lazy">    
                        </div>
                    </div>
                    <div class="why-card reveal">
                        <div class="why-card-text">
                            <div class="ic"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M13 3L4 14h6l-1 7 9-11h-6z"/></svg></div>
                            <h4>Rapid Deployment</h4>
                            <p>Pre-built accelerators cut typical go-live time by more than half.</p>
                        </div>
                        <div class="why-card-visual wv5">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/rapid.webp" alt="Security by Design" loading="lazy">    
                        </div>
                    </div>
                    <div class="why-card reveal">
                        <div class="why-card-text">
                            <div class="ic"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 010 18M12 3a14 14 0 000 18"/></svg></div>
                            <h4>Global Support</h4>
                            <p>Follow-the-sun support across time zones, with dedicated customer success teams.</p>
                        </div>
                        <div class="why-card-visual wv6">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/global-support.webp" alt="Global Support" loading="lazy">    
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===================== PROCESS ===================== -->
        <section id="process" class="bg-soft">
            <div class="wrap">
                <div class="section-head reveal">
                    <div class="eyebrow">Implementation</div>
                    <h2>How a transformation with ITHENA works</h2>
                    <p>A proven six-stage journey, run by people who've done this before - not a generic PMO template.</p>
                </div>
                <div class="zigzag">
                    <div class="zz-item zz-odd reveal-left">
                        <div class="zz-side-l">
                            <div class="zz-illustration">
                                <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/discover.webp" alt="Discovery" loading="lazy">
                            </div>
                            <div class="zz-card">
                                <div class="zz-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="10" r="6"/><path d="M15 15l5 5"/></svg></div>
                                <h4>Discovery</h4>
                                <p>We map your current systems, data flows, and biggest operational pain points on-site.</p>
                            </div>
                        </div>
                        <div class="zz-num">1</div>
                        <div class="zz-side-r"></div>
                    </div>
                    <div class="zz-item zz-even reveal-right">
                        <div class="zz-side-l"></div>
                        <div class="zz-num">2</div>
                        <div class="zz-side-r">
                            <div class="zz-card">
                                <div class="zz-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V10M12 20V4M20 20v-7"/></svg></div>
                                <h4>Analysis</h4>
                                <p>Our team benchmarks your KPIs against industry peers and identifies opportunities.</p>
                            </div>
                            <div class="zz-illustration">
                                <img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/analysiss.webp" alt="Analysis" loading="lazy">
                            </div>
                        </div>
                    </div>
                    <div class="zz-item zz-odd reveal-left">
                        <div class="zz-side-l">
                            <div class="zz-illustration"><img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/planing.webp" alt="Planning" loading="lazy"></div>
                            <div class="zz-card">
                                <div class="zz-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-7.5 7-12a7 7 0 10-14 0c0 4.5 7 12 7 12z"/><circle cx="12" cy="9" r="2.3"/></svg></div>
                                <h4>Planning</h4>
                                <p>A phased roadmap with clear milestones, ROI targets, and change-management plan.</p>
                            </div>
                        </div>
                        <div class="zz-num">3</div>
                        <div class="zz-side-r"></div>
                    </div>
                    <div class="zz-item zz-even reveal-right">
                        <div class="zz-side-l"></div>
                        <div class="zz-num">4</div>
                        <div class="zz-side-r">
                            <div class="zz-card">
                                <div class="zz-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.5 5.5l2 2M16.5 16.5l2 2M18.5 5.5l-2 2M7.5 16.5l-2 2"/></svg></div>
                                <h4>Implementation</h4>
                                <p>Modular rollout using pre-built accelerators, with weekly stakeholder checkpoints.</p>
                            </div>
                            <div class="zz-illustration"><img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/implementn.webp" alt="Implementation" loading="lazy"></div>
                        </div>
                    </div>
                    <div class="zz-item zz-odd reveal-left">
                        <div class="zz-side-l">
                            <div class="zz-illustration"><img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/optimisee.webp" alt="Optimization" loading="lazy"></div>
                            <div class="zz-card">
                                <div class="zz-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8 12l3 3 5-6"/></svg></div>
                                <h4>Optimization</h4>
                                <p>We tune models, dashboards, and workflows against real production data.</p>
                            </div>
                        </div>
                        <div class="zz-num">5</div>
                        <div class="zz-side-r"></div>
                    </div>
                    <div class="zz-item zz-even reveal-right">
                        <div class="zz-side-l"></div>
                        <div class="zz-num">6</div>
                        <div class="zz-side-r">
                            <div class="zz-card">
                                <div class="zz-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 010 18M12 3a14 14 0 000 18"/></svg></div>
                                <h4>Continuous Support</h4>
                                <p>Follow-the-sun support and a dedicated customer success, for the life of account.</p>
                            </div>
                            <div class="zz-illustration"><img src="https://dev-website.ithena.app/wp-content/uploads/2026/07/global-support-1.webp" alt="Continuous Support" loading="lazy"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===================== COUNTER STATS ===================== -->
        <section id="stats" class="bg-white">
            <div class="wrap">
                <div class="section-head center reveal">
                    <div class="eyebrow">By the Numbers</div>
                    <h2>A track record built plant by plant</h2>
                </div>
                <div class="counter-band reveal">
                    <div>
                        <div class="cnum" data-count="50">0<span>+</span></div>
                        <div class="clabel">Enterprise Clients</div>
                    </div>
                    <div>
                        <div class="cnum" data-count="70">0<span>+</span></div>
                        <div class="clabel">Projects Delivered</div>
                    </div>
                    <div>
                        <div class="cnum" data-count="8">0<span>+</span></div>
                        <div class="clabel">Industrial Solutions</div>
                    </div>
                    <div>
                        <div class="cnum" data-count="100">0<span>+</span></div>
                        <div class="clabel">Team Members</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===================== TESTIMONIALS ===================== -->
        <section id="testimonials" class="bg-soft">
            <div class="wrap">
                <div class="section-head reveal">
                    <div class="eyebrow">Testimonials</div>
                    <h2>What operations leaders say</h2>
                </div>
                <div class="tm-grid">
                    <div class="tm-card reveal">
                        <div class="tm-stars">★★★★★</div>
                        <p>"Consistency across our legacy and next-generation kiln assets was essential to scaling efficiently. ITHENA delivered exactly that. Their expertise helped us seamlessly unify our SCADA experience within Ignition, transforming a patchwork of old and new systems into a single, intuitive interface. "</p>
                        <div class="tm-person">
                            <div>
                                <span>Automation Controls Systems Specialist, SELEE Corporation</span>
                            </div>
                        </div>
                    </div>
                    <div class="tm-card reveal">
                        <div class="tm-stars">★★★★★</div>
                        <p>"The 360-degree equipment view, combined with 3D spare parts visualization and BOM (Bill of Materials) integration, has streamlined the ordering process, making it simple and highly efficient. Seamless ERP integration with real-time insights has optimized our spare parts delivery processes, minimizing downtime and improving efficiency for our customers."</p>
                        <div class="tm-person">
                            <div>
                                <span>Vice President, Service and Aftermarket – Americas, BPA (Blueprint Automation)</span>
                            </div>
                        </div>
                    </div>
                    <div class="tm-card reveal">
                        <div class="tm-stars">★★★★★</div>
                        <p>"Identifying the right and reliable tech partner is a big challenge. Team Angel feels proud to be associated with ITHENA, who understood our requirement and worked accordingly.  Highly recommended, to my fellow companies too. Looking forward to work on new development and further product enhancement."</p>
                        <div class="tm-person">
                            <div>
                                <span>Director, Angel Digital</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===================== CTA BANNER ===================== -->
        <section id="contact" class="bg-white">
            <div class="wrap">
                <div class="cta-banner reveal">
                    <h2>Ready to transform your enterprise?</h2>
                    <p>Talk to an ITHENA specialist about your plants, your systems, and where AI can move the needle fastest.</p>
                    <div class="cta-row">
                        <a href="/contact/" class="btn btn-white js-demo-trigger">Schedule a Demo</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===================== FOOTER ===================== -->
        <footer id="company" class="bg-black">
            <div class="wrap">
                <div class="foot-top">
                    <div class="foot-brand">
                        <a class="logo" href="https://dev-website.ithena.app/">
                        <img fetchpriority="high" width="136" height="45" src="https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new.webp" 
                            class="attachment-full size-full wp-image-71412" alt="" 
                            srcset="https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new.webp 568w, https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new-300x99.webp 300w" sizes="(max-width: 568px) 100vw, 568px">								
                        </a>
                        <p>AI-driven digital transformation for manufacturing and enterprise - ERP, AI, IoT, Cloud, and Analytics on one platform.</p>
                        <div class="foot-social">
                            <a class="icon-btn" href="#" aria-label="LinkedIn">in</a>
                            <a class="icon-btn" href="#" aria-label="YouTube">▶</a>
                            <a class="icon-btn" href="#" aria-label="Facebook">f</a>
                            <a class="icon-btn" href="#" aria-label="X">𝕏</a>
                        </div>
                    </div>
                    <div class="foot-col">
                        <button class="foot-toggle" data-target="foot-solutions" aria-expanded="false">
                            <h5>Solutions</h5>
                            <svg width="13" height="13" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </button>
                        <div class="foot-submenu" id="foot-solutions">
                            <a href="#">Packaging Machinery</a>
                            <a href="#">Food Processing and Bakery Custom Machine</a>
                            <a href="#">Tool Builders</a>
                            <a href="#">Compressed Air | HVAC | Building Equipment</a>
                            <a href="#">Other Industries We Serve</a>
                        </div>
                    </div>
                    <div class="foot-col">
                        <button class="foot-toggle" data-target="foot-services" aria-expanded="false">
                            <h5>Services</h5>
                            <svg width="13" height="13" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </button>
                        <div class="foot-submenu" id="foot-services">
                            <a href="#">AI Strategy</a><a href="#">Data Management</a><a href="#">Cloud Modernization</a><a href="#">Business Transformation</a><a href="#">Manufacturing Integration</a>
                        </div>
                    </div>
                    <div class="foot-col">
                        <button class="foot-toggle" data-target="foot-case-studies" aria-expanded="false">
                            <h5>Case Studies</h5>
                            <svg width="13" height="13" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </button>
                        <div class="foot-submenu" id="foot-case-studies">
                            <a href="#">Technology</a><a href="#">Industries / Vertical</a><a href="#">Solutions</a><a href="#">Use Cases</a>
                        </div>
                    </div>
                    <div class="foot-col">
                        <button class="foot-toggle" data-target="foot-about" aria-expanded="false">
                            <h5>About Us</h5>
                            <svg width="13" height="13" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </button>
                        <div class="foot-submenu" id="foot-about">
                            <a href="#">Who We Are</a><a href="#">Blogs</a><a href="#">Announcements</a><a href="#">Partnerships</a><a href="#">Careers</a>
                        </div>
                    </div>
                </div>
                <div class="foot-bottom">
                    <span>Copyright © 2026 ITHENA. All Rights Reserved.</span>
                    <div class="legal"><a href="https://dev-website.ithena.app/privacy-policy/">Privacy Policy</a>
                        <a href="https://ithena.ai/terms-of-service/">Terms of Service</a>
                        <a href="https://ithena.ai/cookie-settings/">Cookie Settings</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- ===================== BACK TO TOP ===================== -->
        <button class="to-top" id="to-top" type="button" aria-label="Back to top">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
        </button>

        <!-- ===================== DEMO REQUEST MODAL ===================== -->
        <div class="demo-overlay" id="demo-overlay" aria-hidden="true">
            <div class="demo-modal" role="dialog" aria-modal="true" aria-labelledby="demo-modal-title">
                <button class="demo-modal-close" id="demo-modal-close" aria-label="Close">✕</button>

                <div class="demo-modal-head">
                    <div class="eyebrow">Get Started</div>
                    <h3 id="demo-modal-title">Request a Demo</h3>
                    <p>Tell us a bit about your business and an ITHENA specialist will reach out shortly.</p>
                </div>

                <?php echo do_shortcode('[formidable id=119]'); ?>
            </div>
        </div>

        <!-- ===================== HEADER JS (self-contained: scoped in its own IIFE, every DOM
             lookup is null-guarded, so this block works whether or not body/footer markup
             exists on the page) ===================== -->
        <script>
        (function () {

            // header scroll state - only activates if #site-header is present;
            // #top (body's hero section) is optional and only used to compute a nicer
            // scroll threshold, falling back to a fixed value when absent.
            const header = document.getElementById('site-header');
            const heroEl = document.getElementById('top');
            function syncHeaderHeight(){
              if (!header) return;
              document.documentElement.style.setProperty('--header-h', header.offsetHeight + 'px');
            }
            function updateHeaderState(){
              if (!header) return;
              const threshold = heroEl ? heroEl.offsetHeight / 8 : 40;
              header.classList.toggle('scrolled', window.scrollY > threshold);
            }
            window.addEventListener('scroll', () => {
              updateHeaderState();
              syncHeaderHeight();
            }, {passive:true});
            window.addEventListener('resize', () => { updateHeaderState(); syncHeaderHeight(); });
            updateHeaderState();
            syncHeaderHeight();

            // mega menu open/close (desktop) - no-ops safely if no .nav-item elements exist
            let megaCloseTimer = null;
            document.querySelectorAll('.nav-item').forEach(item=>{
              const mega = item.querySelector('.mega');
              function openItem(){
                clearTimeout(megaCloseTimer);
                document.querySelectorAll('.nav-item.open').forEach(i=>{ if(i!==item) i.classList.remove('open'); });
                syncHeaderHeight();
                item.classList.add('open');
              }
              function scheduleClose(){
                clearTimeout(megaCloseTimer);
                megaCloseTimer = setTimeout(()=> item.classList.remove('open'), 260);
              }
              item.addEventListener('mouseenter', openItem);
              item.addEventListener('mouseleave', scheduleClose);
              if(mega){
                mega.addEventListener('mouseenter', ()=> clearTimeout(megaCloseTimer));
                mega.addEventListener('mouseleave', scheduleClose);
              }
            });

            // light / dark theme toggle (light is default, saved to localStorage)
            const themeToggle = document.getElementById('theme-toggle');
            if (themeToggle) {
                function setToggleLabel() {
                    const isDark = document.documentElement.classList.contains('dark');
                    themeToggle.setAttribute('aria-label', isDark ? 'Switch to light theme' : 'Switch to dark theme');
                }
                setToggleLabel();
                themeToggle.addEventListener('click', () => {
                    const isDark = document.documentElement.classList.toggle('dark');
                    try { localStorage.setItem('ithena-theme', isDark ? 'dark' : 'light'); } catch (e) {}
                    setToggleLabel();
                });
            }

            // mobile menu - each element is guarded independently so partial markup still works
            const mobileOpen = document.getElementById('mobile-open');
            const mobileClose = document.getElementById('mobile-close');
            const mobilePanel = document.getElementById('mobile-panel');
            const scrim = document.getElementById('scrim');
            function openMobile(){ if (mobilePanel) mobilePanel.classList.add('open'); if (scrim) scrim.classList.add('open'); }
            function closeMobile(){ if (mobilePanel) mobilePanel.classList.remove('open'); if (scrim) scrim.classList.remove('open'); }
            if (mobileOpen) mobileOpen.addEventListener('click', openMobile);
            if (mobileClose) mobileClose.addEventListener('click', closeMobile);
            if (scrim) scrim.addEventListener('click', closeMobile);
            if (mobilePanel) {
                mobilePanel.querySelectorAll('a').forEach(a=>a.addEventListener('click', closeMobile));
                mobilePanel.querySelectorAll('.m-toggle').forEach(btn=>{
                  btn.addEventListener('click', ()=>{
                    const item = btn.closest('.m-item');
                    const wasOpen = item.classList.contains('open');
                    // Accordion: collapse every other section first, so only one stays open.
                    mobilePanel.querySelectorAll('.m-item.open').forEach(other=>{
                      if (other !== item) other.classList.remove('open');
                    });
                    item.classList.toggle('open', !wasOpen);
                  });
                });
            }

            /* ---------------------------------------------------------------
               Mega-menu accordion: only one details group open at a time
               within a given menu panel, with a smooth height transition.
               --------------------------------------------------------------- */
            (function () {
                const GROUP = '.mega-sol-group';
                const groups = document.querySelectorAll(GROUP);
                if (!groups.length) return;

                const reduceMotion = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);

                const DURATION = 300; // keep in sync with the .is-animating transition

                function panelBody(details) {
                    return details.querySelector('.mega-sol-group-items');
                }

                function settle(body) {
                    body.classList.remove('is-animating');
                    body.style.height = '';
                    body.style.opacity = '';
                }

                function expand(details) {
                    const body = panelBody(details);
                    details.open = true;
                    if (!body || reduceMotion) return;
                    clearTimeout(body._animTimer);
                    const target = body.scrollHeight;
                    body.classList.add('is-animating');
                    body.style.height = '0px';
                    body.style.opacity = '0';
                    requestAnimationFrame(() => {
                        body.style.height = target + 'px';
                        body.style.opacity = '1';
                    });
                    // Timeout rather than transitionend: guaranteed to run even if the
                    // transition is interrupted, so a panel can never get stuck mid-animation.
                    body._animTimer = setTimeout(() => settle(body), DURATION + 40);
                }

                function collapse(details) {
                    const body = panelBody(details);
                    if (!body || reduceMotion) { details.open = false; return; }
                    clearTimeout(body._animTimer);
                    const start = body.scrollHeight;
                    body.classList.add('is-animating');
                    body.style.height = start + 'px';
                    body.style.opacity = '1';
                    requestAnimationFrame(() => {
                        body.style.height = '0px';
                        body.style.opacity = '0';
                    });
                    body._animTimer = setTimeout(() => {
                        settle(body);
                        details.open = false;
                    }, DURATION + 40);
                }

                groups.forEach(details => {
                    const summary = details.querySelector('summary');
                    if (!summary) return;
                    summary.addEventListener('click', (e) => {
                        // Take over from the browser's instant open/close so we can animate.
                        e.preventDefault();
                        const isOpen = details.open;

                        // Close sibling groups inside the same mega panel (accordion).
                        const scope = details.closest('.mega') || document;
                        scope.querySelectorAll(GROUP).forEach(other => {
                            if (other !== details && other.open) collapse(other);
                        });

                        if (isOpen) collapse(details); else expand(details);
                    });
                });

                // When a mega panel closes, reset its groups so it reopens in a clean state.
                document.querySelectorAll('.nav-item').forEach(item => {
                    item.addEventListener('mouseleave', () => {
                        setTimeout(() => {
                            if (item.classList.contains('open')) return;
                            item.querySelectorAll(GROUP).forEach(d => {
                                const body = panelBody(d);
                                if (body) {
                                    body.classList.remove('is-animating');
                                    body.style.height = '';
                                    body.style.opacity = '';
                                }
                                d.open = false;
                            });
                        }, 400);
                    });
                });
            })();

        })();
        </script>

        <!-- ===================== BODY JS (self-contained: each feature below is its own IIFE,
             guarded on its own elements, so body works standalone without header/footer, and
             no single missing element in body can break the other body features) ===================== -->
        <script>
            // Demo request modal - shared by every .js-demo-trigger CTA.
            // Body is the Formidable form (rendered via shortcode); this only handles open/close,
            // submission is left entirely to Formidable.
            (function () {
                const overlay = document.getElementById('demo-overlay');
                const closeBtn = document.getElementById('demo-modal-close');
                if (!overlay || !closeBtn) return;
                // Guard against double-binding if the markup is ever rendered twice (Elementor widgets).
                if (overlay.dataset.demoInit === '1') return;
                overlay.dataset.demoInit = '1';

                const triggers = document.querySelectorAll('.js-demo-trigger');
                let lastFocused = null;

                function openModal(e) {
                    if (e) e.preventDefault();   // don't follow the CTA's href fallback
                    lastFocused = document.activeElement;
                    overlay.classList.add('open');
                    overlay.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                    const firstField = overlay.querySelector('input:not([type=hidden]), textarea, select');
                    if (firstField) setTimeout(() => firstField.focus(), 200);
                }

                function closeModal() {
                    overlay.classList.remove('open');
                    overlay.setAttribute('aria-hidden', 'true');
                    document.body.style.overflow = '';
                    if (lastFocused) lastFocused.focus();
                }

                triggers.forEach(btn => btn.addEventListener('click', openModal));
                closeBtn.addEventListener('click', closeModal);
                overlay.addEventListener('click', (e) => { if (e.target === overlay) closeModal(); });
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && overlay.classList.contains('open')) closeModal();
                });
            })();

            // back-to-top button: reveals past one viewport of scroll, returns to top smoothly
            (function () {
                const btn = document.getElementById('to-top');
                if (!btn) return;
                let ticking = false;
                function sync() {
                    btn.classList.toggle('show', window.scrollY > window.innerHeight * 0.6);
                    ticking = false;
                }
                window.addEventListener('scroll', () => {
                    // rAF-throttled so the handler runs at most once per frame
                    if (!ticking) { ticking = true; requestAnimationFrame(sync); }
                }, { passive: true });
                btn.addEventListener('click', () => {
                    const reduce = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);
                    window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' });
                });
                sync();
            })();

            // trusted-by marquee: duplicate logos for a seamless infinite loop
            (function () {
                const trustedTrack = document.getElementById('trusted-track');
                if (!trustedTrack) return;
                const originalLogos = Array.from(trustedTrack.children);
                originalLogos.forEach(logo => {
                    const clone = logo.cloneNode(true);
                    clone.setAttribute('aria-hidden', 'true');
                    trustedTrack.appendChild(clone);
                });
            })();

            // scroll reveal
            (function () {
                const revealEls = document.querySelectorAll('.reveal, .zz-item, .line-anim');
                if (!revealEls.length) return;
                const io = new IntersectionObserver((entries)=>{
                  entries.forEach(e=>{
                    if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); }
                  });
                },{threshold:0.15});
                revealEls.forEach(el=>io.observe(el));
            })();

            // count-up animation
            (function () {
                const counters = document.querySelectorAll('[data-count]');
                if (!counters.length) return;
                function animateCount(el){
                  const target = parseFloat(el.dataset.count);
                  const isDecimal = target % 1 !== 0;
                  const suffixEl = el.querySelector('span');
                  const suffix = suffixEl ? suffixEl.outerHTML : '';
                  let start = 0;
                  const dur = 1400;
                  const t0 = performance.now();
                  function tick(t){
                    const p = Math.min((t - t0)/dur, 1);
                    const eased = 1 - Math.pow(1-p, 3);
                    const val = start + (target-start)*eased;
                    el.innerHTML = (isDecimal ? val.toFixed(1) : Math.round(val)) + suffix;
                    if(p < 1) requestAnimationFrame(tick);
                  }
                  requestAnimationFrame(tick);
                }
                const cio = new IntersectionObserver((entries)=>{
                  entries.forEach(e=>{
                    if(e.isIntersecting){ animateCount(e.target); cio.unobserve(e.target); }
                  });
                },{threshold:0.4});
                counters.forEach(c=>cio.observe(c));
            })();
        </script>

        <!-- ===================== FOOTER JS (self-contained: same click-to-expand mechanism
             as the header's mobile accordion, guarded and a no-op if no .foot-toggle elements
             exist; visually inert above the 560px breakpoint where columns stay static) ===================== -->
        <script>
        (function () {
            document.querySelectorAll('.foot-toggle').forEach(btn => {
                btn.addEventListener('click', () => {
                    const col = btn.closest('.foot-col');
                    if (!col) return;
                    const isOpen = col.classList.toggle('open');
                    btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                });
            });
        })();
        </script>

    </body>
</html>