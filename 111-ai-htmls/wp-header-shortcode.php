<?php

if (!defined('ABSPATH')) exit;

// Runs in <head> before paint, whatever page/position the header shortcode sits at.
// Without it, theme toggle click works but a reload always starts light - no persistence.
function ithena_header_theme_preinit() { ?>
    <script>
        (function () {
            var KEY = 'ithena-theme';

            // Full theme API on window, not trapped inside this <script>'s own
            // closure or the header's - any script/widget anywhere on the page
            // (or the browser console) can read, apply, or toggle the theme.
            window.ithenaTheme = {
                get: function () { try { return localStorage.getItem(KEY); } catch (e) { return null; } },
                set: function (isDark) { try { localStorage.setItem(KEY, isDark ? 'dark' : 'light'); } catch (e) {} },
                isDark: function () { return document.documentElement.classList.contains('dark'); },
                apply: function (isDark) {
                    document.documentElement.classList.toggle('dark', isDark);
                    window.ithenaTheme.set(isDark);
                    window.ithenaTheme.sync();
                },
                toggle: function () {
                    var next = !window.ithenaTheme.isDark();
                    window.ithenaTheme.apply(next);
                    return next;
                },
                // Reflects current theme onto the toggle button + #main - never changes it.
                sync: function () {
                    var isDark = window.ithenaTheme.isDark();
                    var btn = document.getElementById('theme-toggle');
                    if (btn) {
                        btn.setAttribute('aria-label', isDark ? 'Switch to light theme' : 'Switch to dark theme');
                        btn.setAttribute('aria-checked', isDark ? 'true' : 'false');
                    }
                    // #main lives in the page template, not header markup - mirror its
                    // data-theme so page-level dark/light CSS follows the theme too.
                    var main = document.getElementById('main-section');
                    if (main) {
                        var value = isDark ? 'dark' : 'light';
                        console.log('[ithena-theme] #main data-theme ->', value); // verify attr + value on each switch
                        main.setAttribute('data-theme', value);
                    }
                }
            };

            var saved = window.ithenaTheme.get();
            var isDark = saved ? saved === 'dark' : window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (isDark) document.documentElement.classList.add('dark');
        })();
    </script>
    <?php
}
add_action('wp_head', 'ithena_header_theme_preinit', 1);

function ithena_custom_header_shortcode() {

    ob_start();

    $menu = wp_get_nav_menu_object('new-ithena-menu');
    if (!$menu) return ob_get_clean();

    $menu_items = wp_get_nav_menu_items($menu->term_id);
    if (!$menu_items) return ob_get_clean();

    /* ========= BUILD TREE ========= */

    $refs = [];
    $tree = [];

    foreach ($menu_items as $item) {
        $item->children = [];
        // Subtitles ("Production | After Market", "Plan -> Produce -> Improve") are
        // authored via the ACF field menu_subtitle on the menu item. Falls back to
        // the native WP description field when ACF is off or the field is empty.
        if (function_exists('get_field')) {
            $acf_subtitle = get_field('menu_subtitle', $item);
            $acf_menuicon = get_field('menu_icon', $item);
            if ($acf_subtitle) {
                $item->description = $acf_subtitle;
            }
            if ($acf_menuicon) {
                $item->menu_icon = $acf_menuicon;
            }else{
                $item->menu_icon = 'https://dev-website.ithena.app/wp-content/uploads/2026/08/cube-1.svg';
            }
        }
        $refs[$item->ID] = $item;
    }

    foreach ($menu_items as $item) {
        if ($item->menu_item_parent == 0) {
            $tree[$item->ID] = $item;
        } elseif (isset($refs[$item->menu_item_parent])) {
            $refs[$item->menu_item_parent]->children[$item->ID] = $item;
        }
    }

    /* ========= SMALL REUSABLE ICON/CHEVRON FRAGMENTS =========
       Plain WP menu items don't carry a per-item icon, so every item gets
       the same generic mark inside the existing color badge. */
    $ith_icon_16 = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="4"/><path d="M8 12h8M12 8v8"/></svg>';
    $ith_icon_20 = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="4"/><path d="M8 12h8M12 8v8"/></svg>';
    $ith_chev_trigger = '<svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>';
    $ith_chev_group   = '<svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>';
    $ith_chev_mobile  = '<svg width="13" height="13" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>';
    $ith_arrow        = '<svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>';

    ?>

        <style>

            /* Menu depth font-weight scale: parent boldest, each nested level
            steps down one notch. On :root (not header) since JS relocates
            header/mobile-panel/overlay to be direct body children - siblings,
            not descendants - so a header-scoped var would not reach them. */
            :root { --ith-fw-1: 700; --ith-fw-2: 600; --ith-fw-3: 500; --ith-fw-4: 400;}

            /* -- light (default) -- */
            .nav-link { display: inline-flex; align-items: center; transition: .3s cubic-bezier(.16, .8, .24, 1);}
            .nav-link svg { transition: transform .3s cubic-bezier(.16, .8, .24, 1);}
            header#site-header { display: block !important; position: fixed !important; top: 0 !important; left: 0 !important; right: 0 !important; z-index: 999995 !important; padding: 20px 0; transition: padding .4s cubic-bezier(.16, .8, .24, 1), background .4s cubic-bezier(.16, .8, .24, 1), box-shadow .4s cubic-bezier(.16, .8, .24, 1), border-color .4s cubic-bezier(.16, .8, .24, 1); background:transparent; border-bottom: 1px solid transparent;}
            header#site-header.scrolled { padding: 12px 0; background: #F6F8FA; box-shadow: 0 12px 30px -18px #14284629; border-bottom: 1px solid #0A192D1A;}
            /* Not-scrolled root nav-link text + svg (svg inherits via currentColor):
            light theme #000000, dark theme #FFFFFF - see dark block below. */
            header#site-header:not(.scrolled) .logo, header#site-header:not(.scrolled) .nav-link, header#site-header:not(.scrolled) .nav-item.open .nav-link svg { color: #4A5A6E;}
            header#site-header:not(.scrolled) .nav-link { color: #4A5A6E; transition: color .25s, background .25s;}
            header#site-header:not(.scrolled) .icon-btn, header#site-header:not(.scrolled) .mobile-toggle { background: #FFFFFF1A; border-color: #FFFFFF4C; color: #fff;}
            header#site-header:not(.scrolled) .mobile-toggle span { background: #fff;}
            header#site-header:not(.scrolled) .nav-link:hover, header#site-header:not(.scrolled) .nav-item.open .nav-link { color: #4A5A6E; background: #0000001A;}
            .nav-inner { display: flex; align-items: center; justify-content: space-between; gap: 24px;}

            header#site-header .wrap { max-width: 1280px; margin: 0 auto; padding: 15px 30px;}

            /* .logo { display: flex; align-items: center; gap: 10px; font-family: "Sora", sans-serif; font-weight: 800; font-size: 21px; letter-spacing: -0.01em;} */
            .nav-menu { display: flex; align-items: center; gap: 6px;}
            .nav-item { position: relative;}
            .nav-link { display: flex; align-items: center; gap: 5px; padding: 10px 15px; border-radius: 10px; font-size: 14px; font-weight: var(--ith-fw-1); color: #4A5A6E; transition: .25s;}
            .nav-link:hover, .nav-item.open .nav-link { color: #4A5A6E; background: #0A192D0F;}
            .nav-link svg { width: 12px; height: 12px; transition: transform .3s;}
            .nav-item.open .nav-link svg { transform: rotate(180deg);}
            .nav-actions { display: flex; align-items: center; gap: 14px;}
            .icon-btn { width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; background: #0A192D0D; border: 1px solid #0A192D1A; color: #4A5A6E;}
            .icon-btn:hover { color: #4A5A6E; border-color: #0A192D33;}
            .to-top { position: fixed; bottom: 28px; right: 28px; z-index: 9999; width: 46px; height: 46px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #0083C8; border: none; color: #fff; cursor: pointer; opacity: 0; visibility: hidden; transform: translateY(8px); transition: opacity .3s cubic-bezier(.16,.8,.24,1), transform .3s cubic-bezier(.16,.8,.24,1), visibility .3s, background .2s; box-shadow: 0 6px 20px -4px #0082C880;}
            .to-top.visible { opacity: 1; visibility: visible; transform: translateY(0);}
            .to-top:hover { background: #0067A0; color: #fff; box-shadow: 0 10px 24px -6px #0082C899; transform: translateY(-2px);}
            html.dark .to-top { background: #0083C8; border: none; color: #fff;}
            html.dark .to-top:hover { background: #0067A0; color: #fff;}
            @media (max-width:560px) { .to-top { bottom: 16px; right: 16px;}}
            .mega { position: fixed; top: 94px; left: 50%; width: min(calc(100vw - 40px), 1220px); background: #F6F8FAE0; -webkit-backdrop-filter: saturate(180%) blur(20px); backdrop-filter: saturate(180%) blur(20px); border: 1px solid #0A192D14; border-radius: 22px; box-shadow: 0 30px 60px -20px #14284638, 0 14px 28px -14px #14284624, inset 0 1px 0 #FFFFFFB2; opacity: 0; visibility: hidden; pointer-events: none; overflow: hidden; transform: translateX(-50%) translateY(-8px); transition: opacity .28s cubic-bezier(.16, .8, .24, 1), transform .28s cubic-bezier(.16, .8, .24, 1), visibility .28s; z-index: 150;}

            /* Browsers without backdrop-filter support (e.g. older Firefox) fall
            back to a near-solid panel so text stays legible. */
            @supports not ((backdrop-filter: blur(1px)) or (-webkit-backdrop-filter: blur(1px))) { .mega { background: #F6F8FAFA;}}
            .mega::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, transparent, #0083C8, #4FE0D0, #0083C8, transparent); opacity: .7;}
            .nav-item.open .mega { opacity: 1; visibility: visible; pointer-events: auto; transform: translateX(-50%) translateY(0);}
            .mega-wide { padding: 0;}
            .mega-inner { padding: 30px 34px 34px;}
            .mega-sol-cols { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0;}
            .mega-sol-col { padding: 0px 20px; border-right: 1px solid #0A192D1A;}
            .mega-sol-col:first-child { padding-left: 0;}
            .mega-sol-col:last-child { padding-right: 0; border-right: none;}
            .mega-sol-col-head { display: flex; align-items: center; gap: 12px; min-height: 56px; margin-bottom: 16px; padding-bottom: 16px; border-bottom: 2px solid #0083C8;}
            .mega-sol-col-icon { width: 40px; height: 40px; border-radius: 11px; flex-shrink: 0; background: linear-gradient(135deg, #0083C8, #4FE0D0); color: #fff; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 18px -8px #0082C88C;}
            .mega-sol-col-head h4 { font-size: 16px; font-weight: var(--ith-fw-2); color: #000000; margin-bottom: 2px; white-space: nowrap;}
            .mega-sol-col-head .mega-sol-col-sub { display: block; font-size: 12px; font-weight: 600; color: #76889C; white-space: nowrap;}
            .mega-sol-group { border-bottom: 1px solid #0A192D14;}
            .mega-sol-group:last-child { border-bottom: none;}
            .mega-sol-group summary { list-style: none; cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 12px 2px; font-family: "Manrope", sans-serif; font-size: 12px; font-weight: var(--ith-fw-3); text-transform: uppercase; letter-spacing: .04em; color: #4A5A6E; transition: color .2s;}
            .mega-sol-group summary::-webkit-details-marker { display: none;}
            .mega-sol-group summary::marker { content: "";}
            .mega-sol-group summary:hover { color: #0083C8;}
            .mega-sol-group summary .chev { flex-shrink: 0; color: #76889C; transition: transform .25s cubic-bezier(.16, .8, .24, 1);}
            .mega-sol-group[open] summary { color: #0083C8;}
            .mega-sol-group[open] summary .chev { transform: rotate(180deg); color: #0083C8;}
            .mega-sol-group-items { padding: 2px 2px 14px; display: flex; flex-direction: column; gap: 8px; overflow: hidden;}

            /* Smooth expand/collapse for mega-menu accordions (height is driven by JS;
            these rules just supply the easing and keep content clipped mid-animation). */
            .mega-sol-group-items.is-animating,
            .mega-ind-refs.is-animating { transition: height .3s cubic-bezier(.16, .8, .24, 1), opacity .3s cubic-bezier(.16, .8, .24, 1);}
            @media (prefers-reduced-motion: reduce) {
                .mega-sol-group-items.is-animating,
                .mega-ind-refs.is-animating { transition: none;}
            }
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
            .mega-sol-item .mega-sol-item-name { display: block; font-size: 14px; font-weight: var(--ith-fw-4); color: #000000; margin-bottom: 2px; white-space: nowrap; transition: color .2s;}
            .mega-sol-item:hover .mega-sol-item-name { color: #0083C8;}
            .mega-sol-item .mega-sol-item-sub { display: block; font-size: 12px; color: #76889C; line-height: 1.4;}
            .mega-sol-more-link { display: inline-flex; align-items: center; gap: 8px; margin-top: 12px; padding: 10px 16px; border-radius: 100px; color: #0083C8; font-family: "Manrope", sans-serif; font-size: 14px; font-weight: 700; transition: background .25s, color .25s, transform .2s;}
            .mega-sol-more-link:hover { background: #0083C8; color: #fff; transform: translateX(2px);}
            .mega-sol-more-link svg { transition: transform .25s cubic-bezier(.16, .8, .24, 1); flex-shrink: 0;}
            .mega-sol-more-link:hover svg { transform: translateX(3px);}
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
            .mega-feat-body h4 { font-size: 14px; color: #000000; margin-bottom: 4px; white-space: nowrap; font-weight: var(--ith-fw-2);}
            .mega-feat-body p { font-size: 12px; color: #76889C; line-height: 1.5; margin-bottom: 7px;}
            .mega-feat-explore { font-size: 12px; font-weight: 700; color: #0083C8; display: inline-flex; align-items: center; gap: 5px;}
            .mega-feat-explore svg { transition: transform .25s cubic-bezier(.16, .8, .24, 1);}
            .mega-feat:hover .mega-feat-explore svg { transform: translateX(3px);}

            /* ---- Industries mega menu (3 grouped columns) ---- */
            .mega-ind-cols { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0 40px;}
            .mega-ind-col { padding: 0;}
            .mega-ind-col-head { display: flex; align-items: center; gap: 11px; min-height: 46px; margin-bottom: 14px; padding-bottom: 12px; border-bottom: 2px solid #0083C8;}
            .mega-ind-col-icon { width: 34px; height: 34px; border-radius: 10px; flex-shrink: 0; background: linear-gradient(135deg, #0083C8, #4FE0D0); color: #fff; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 16px -8px #0082C88C;}
            .mega-ind-col-head h4 { font-size: 14px; color: #000000; white-space: nowrap;}
            .mega-ind-link, .mega-ind-group summary { display: flex; align-items: center; gap: 10px; list-style: none; cursor: pointer; padding: 9px 4px; border-radius: 8px; font-size: 14px; font-weight: 600; color: #000000; transition: background .2s, color .2s;}
            .mega-ind-link:hover, .mega-ind-group summary:hover { background: #0A192D0D; color: #0083C8;}
            .mega-ind-group summary::-webkit-details-marker { display: none;}
            .mega-ind-group summary::marker { content: "";}
            .mega-ind-item-icon { width: 26px; height: 26px; border-radius: 8px; flex-shrink: 0; display: flex; align-items: center; justify-content: center;}
            .mega-ind-item-icon.c1,
            .mega-ind-item-icon.c2,
            .mega-ind-item-icon.c3,
            .mega-ind-item-icon.c4,
            .mega-ind-item-icon.c5,
            .mega-ind-item-icon.c6 { background: #0082C826; color: #0083C8;}
            .mega-ind-item-name { flex: 1; min-width: 0; white-space: nowrap;}
            .mega-ind-group summary .chev { flex-shrink: 0; color: #76889C; transition: transform .25s cubic-bezier(.16, .8, .24, 1);}
            .mega-ind-group[open] summary .chev { transform: rotate(180deg); color: #0083C8;}
            .mega-ind-refs { display: block; flex-wrap: wrap; gap: 6px; padding: 4px 4px 12px 40px; overflow: hidden;}
            .mega-ind-ref { display: flex; padding: 4px 10px; border: 1px solid #0A192D14; font-size: 12px;}
            .mega-feat-grid.no-border { border-bottom: none; margin-bottom: 0; padding-bottom: 0;}
            .mobile-toggle { display: none; width: 40px; height: 40px; border-radius: 10px; background: #0A192D0F; border: 1px solid #0A192D1A; flex-direction: column; align-items: center; justify-content: center; gap: 4px;}
            .mobile-toggle span { display: block; width: 18px; height: 2px; background: #000000; border-radius: 2px; transition: background .2s;}
            /* Theme switch - pill toggle, no external library, pure CSS/SVG. */
            .theme-switch { position: relative; flex-shrink: 0; width: 50px; height: 27px; padding: 3px; border: none; border-radius: 999px; cursor: pointer; background: linear-gradient(100deg, #FFC24B, #FF9F43); transition: background .4s cubic-bezier(.16, .8, .24, 1), box-shadow .25s;}
            header#site-header:not(.scrolled) .theme-switch { box-shadow: 0 0 0 1px #FFFFFF4C;}
            html.dark .theme-switch { background: linear-gradient(100deg, #16233A, #0A1524);}
            .theme-switch-thumb { position: absolute; top: 3px; left: 3px; width: 21px; height: 21px; border-radius: 50%; background: #fff; box-shadow: 0 2px 6px -1px #0A192D4C; display: flex; align-items: center; justify-content: center; transition: transform .4s cubic-bezier(.34, 1.56, .64, 1);}
            html.dark .theme-switch-thumb { transform: translateX(23px); background: #0D1B2E;}
            .theme-switch-icon { position: absolute; width: 13px; height: 13px; transition: opacity .3s, transform .35s cubic-bezier(.16, .8, .24, 1);}
            .theme-switch-icon.ts-sun { color: #F5A623;}
            .theme-switch-icon.ts-moon { color: #A7C4FF; opacity: 0; transform: scale(.4) rotate(-45deg);}
            html.dark .theme-switch-icon.ts-sun { opacity: 0; transform: scale(.4) rotate(45deg);}
            html.dark .theme-switch-icon.ts-moon { opacity: 1; transform: scale(1) rotate(0);}
            
            .nav-actions a.btn.btn-primary { background: #0083c8 !important; color: #fff !important; border-radius: 50px; padding: 10px 30px;}

            .mobile-panel { position: fixed !important; z-index: 999997 !important; inset: 0 0 0 auto; width: min(360px, 86vw); top: 0; height: 110vh; background: #E4EAF1; transform: translateX(100%); transition: transform .4s cubic-bezier(.16, .8, .24, 1); padding: 26px; overflow-y: auto; border-left: 1px solid #0A192D1A;}
            .mobile-panel.open { transform: translateX(0);}
            .mobile-panel .m-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;}
            .mobile-panel a { display: block; padding: 14px 4px; font-size: 16px; font-weight: 600; color: #000000; border-bottom: 1px solid #0A192D1A;}
            .mobile-panel .btn { width: 100%; justify-content: center; margin-top: 22px;}
            .mobile-panel .m-item { border-bottom: 1px solid #0A192D1A;}
            .mobile-panel .m-toggle { width: 100%; display: flex; align-items: center; justify-content: space-between; gap: 10px; background: none; border: none; padding: 14px 4px; font-family: inherit; font-size: 16px; font-weight: var(--ith-fw-1); color: #000000; cursor: pointer; text-align: left;}
            .mobile-panel .m-toggle-sub { font-weight: var(--ith-fw-3);}
            .mobile-panel .m-toggle-sub-1 { font-weight: var(--ith-fw-2);}
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
            .mobile-panel .m-sub-text strong { font-weight: var(--ith-fw-4);}
            .mobile-panel .m-sub-text small { font-size: 12px; font-weight: 400; color: #76889C; line-height: 1.4;}
            .mobile-panel .m-sub-more { display: flex; align-items: center; justify-content: center; gap: 8px; margin: 10px 4px 4px; padding: 11px 14px; border-radius: 100px; background: #0082C81A; color: #0083C8; font-size: 14px; font-weight: 700; border-bottom: none;}
            .mobile-panel .m-sub-more:hover { background: #0083C8; color: #fff;}
            .scrim { position: fixed !important; z-index: 999996 !important; inset: 0; background: #00000080; opacity: 0; visibility: hidden; transition: .3s;}
            .scrim.open { opacity: 1; visibility: visible;}

            /* -- dark theme overrides -- */
            .mega-sol-row2 { margin-top: 18px; padding-top: 18px; border-top: 1px solid #0A192D1A;}
            html.dark .mega { background: #08101CE0; border-color: #FFFFFF1A; box-shadow: 0 30px 60px -20px #00000099, 0 14px 28px -14px #00000066, inset 0 1px 0 #FFFFFF14;}
            html.dark header#site-header.scrolled { background: #050A11; box-shadow: 0 12px 30px -18px #00000080; border-bottom-color: #FFFFFF14;}
            html.dark .nav-link { color: #ffffff;}
            html.dark .nav-link:hover, html.dark .nav-item.open .nav-link { color: #F4F8FB; background: #FFFFFF14;}
            /* Reclaim white over the light block's ID-scoped not-scrolled rules above
            (ID beats a plain .dark class, so this needs the same ID + :not(.scrolled)
            to win back the dark-theme color here). */
            html.dark header#site-header:not(.scrolled) .logo, html.dark header#site-header:not(.scrolled) .nav-link, html.dark header#site-header:not(.scrolled) .nav-item.open .nav-link svg { color: #FFFFFF;}
            html.dark header#site-header:not(.scrolled) .nav-link { color: #FFFFFFE0;}
            html.dark header#site-header:not(.scrolled) .nav-link:hover, html.dark header#site-header:not(.scrolled) .nav-item.open .nav-link { color: #FFFFFF; background: #FFFFFF24;}
            html.dark .icon-btn { background: #FFFFFF0F; border-color: #FFFFFF1F; color: #8FA0B5;}
            html.dark .icon-btn:hover { color: #F4F8FB; border-color: #FFFFFF47;}
            html.dark .mobile-toggle { background: #FFFFFF14; border-color: #FFFFFF24;}
            html.dark .mobile-toggle span { background: #F4F8FB;}
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
            html.dark .mega-sol-row2 { border-top-color: #FFFFFF14;}
            html.dark .mega-feat-body h4 { color: #F4F8FB;}
            html.dark .mega-feat-body p { color: #b3b3b3;}
            html.dark :is(.mega-sol-item-icon, .mega-feat-icon, .mega-ind-item-icon):is(.c1, .c2, .c3, .c4, .c5, .c6) { background: #0083C833; color: #4FA9E0;}
            html.dark .mega-ind-col-head h4 { color: #F4F8FB;}
            html.dark .mega-ind-link, html.dark .mega-ind-group summary { color: #F4F8FB;}
            html.dark .mega-ind-group summary .chev { color: #b3b3b3;}
            html.dark .mega-ind-ref { color: #8FA0B5;}
            html.dark .mega-ind-link:hover, html.dark .mega-ind-group summary:hover { background: #FFFFFF0F;}
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
            @media (max-width:1180px) { .mega-sol-cols { grid-template-columns: 1fr;} .mega-sol-col { padding: 18px 0; border-right: none; border-bottom: 1px solid #0A192D1A;} .mega-sol-col:first-child { padding-top: 0;} .mega-sol-col:last-child { padding-bottom: 0; border-bottom: none;} .mega-ind-cols { grid-template-columns: 1fr; max-height: 70vh; overflow-y: auto;} .mega-ind-col { padding: 16px 0; border-bottom: 1px solid #0A192D1A;} .mega-ind-col:first-child { padding-top: 0;} .mega-ind-col:last-child { padding-bottom: 0; border-bottom: none;}}
            @media (max-width:980px) { .mega, .nav-menu, .nav-actions .btn-ghost, .nav-actions .icon-btn, .nav-actions .btn-primary { display: none;} .mobile-toggle { display: flex;}}

        </style>

        <!-- ===================== HEADER ===================== -->
        <header id="site-header">
            <div class="wrap nav-inner">
                <a class="logo" href="https://dev-website.ithena.app/">
                <img fetchpriority="high" width="136" height="45" src="https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new.webp"
                    class="attachment-full size-full wp-image-71412" alt=""
                    srcset="https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new.webp 568w, https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new-300x99.webp 300w" sizes="(max-width: 568px) 100vw, 568px">
                </a>
                <nav class="nav-menu" id="nav-menu">
                    <?php foreach ($tree as $node):
                        $has_children = !empty($node->children);
                        $node_url = $node->url ? $node->url : '#';
                    ?>

                        <?php if (!$has_children): ?>
                            <a class="nav-link" href="<?= esc_url($node_url); ?>"><?= esc_html($node->title); ?></a>
                        <?php else:
                            $is_cards = true;
                            foreach ($node->children as $c) {
                                if (!empty($c->children)) { $is_cards = false; break; }
                            }
                            $slug = sanitize_title($node->title);
                        ?>

                        <div class="nav-item <?= esc_attr($slug); ?>-menu">
                            <a class="nav-link" href="<?= esc_url($node_url); ?>">
                                <?= esc_html($node->title); ?> <?= $ith_chev_trigger; ?>
                            </a>

                            <div class="mega mega-wide">
                                <div class="mega-inner">

                                    <?php if ($is_cards): ?>

                                        <div class="mega-feat-grid no-border">
                                            <?php $ci = 0; foreach ($node->children as $card): $ci++; ?>
                                            <div class="mega-feat">
                                                <div class="mega-feat-icon c<?= (($ci - 1) % 6) + 1; ?>">
                                                    <?php if ($card->menu_icon): ?>
                                                        <img src="<?= esc_url($card->menu_icon); ?>" alt="<?= esc_attr($card->title); ?>" />
                                                    <?php else: ?>
                                                        <?= $ith_icon_20; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="mega-feat-body">
                                                    <h4><?= esc_html($card->title); ?></h4>
                                                    <?php if ($card->description): ?><p><?= esc_html($card->description); ?></p><?php endif; ?>
                                                    <a href="<?= esc_url($card->url ? $card->url : '#'); ?>" class="mega-feat-explore">Explore <?= $ith_arrow; ?></a>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>

                                    <?php else:
                                        $rows = array_chunk(array_values($node->children), 3);
                                        foreach ($rows as $r => $row):
                                    ?>

                                        <div class="mega-sol-cols<?= $r > 0 ? ' mega-sol-row2' : ''; ?>">
                                            <?php foreach ($row as $column):
                                                $col_has_groups = false;
                                                foreach ($column->children as $cc) {
                                                    if (!empty($cc->children)) { $col_has_groups = true; break; }
                                                }
                                            ?>
                                            <div class="mega-sol-col">
                                                <div class="mega-sol-col-head">
                                                    <div class="mega-sol-col-icon">
                                                        <img src="<?= esc_url($column->menu_icon); ?>" alt="<?= esc_attr($column->title); ?>" />
                                                    </div>
                                                    <div>
                                                        <h4><?= esc_html($column->title); ?></h4>
                                                        <?php if ($column->description): ?><span class="mega-sol-col-sub"><?= esc_html($column->description); ?></span><?php endif; ?>
                                                    </div>
                                                </div>

                                                <?php if ($col_has_groups): ?>

                                                    <?php foreach ($column->children as $group): ?>
                                                    <details class="mega-sol-group">
                                                        <summary><?= esc_html($group->title); ?> <?= $ith_chev_group; ?></summary>
                                                        <div class="mega-sol-group-items">
                                                            <?php $gi = 0; foreach ($group->children as $leaf): $gi++; ?>
                                                            <a href="<?= esc_url($leaf->url ? $leaf->url : '#'); ?>" class="mega-sol-item">
                                                                <span class="mega-sol-item-icon c<?= (($gi - 1) % 6) + 1; ?>">
                                                                    <?php if ($leaf->menu_icon): 
                                                                        $leaf->menu_icon = "https://dev-website.ithena.app/wp-content/uploads/2026/08/cube-1.svg"; ?>
                                                                        <img src="<?= esc_url($leaf->menu_icon); ?>" alt="<?= esc_attr($leaf->title); ?>" />
                                                                    <?php endif; ?>
                                                                </span>
                                                                <span class="mega-sol-item-text">
                                                                    <span class="mega-sol-item-name"><?= esc_html($leaf->title); ?></span>
                                                                    <?php if ($leaf->description): ?><span class="mega-sol-item-sub"><?= esc_html($leaf->description); ?></span><?php endif; ?>
                                                                </span>
                                                            </a>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </details>
                                                    <?php endforeach; ?>

                                                <?php else: ?>

                                                    <div class="mega-sol-group-items">
                                                        <?php $ii = 0; foreach ($column->children as $leaf): $ii++; ?>
                                                        <a href="<?= esc_url($leaf->url ? $leaf->url : '#'); ?>" class="mega-sol-item">
                                                            <span class="mega-sol-item-icon c<?= (($ii - 1) % 6) + 1; ?>"><?= $ith_icon_16; ?></span>
                                                            <span class="mega-sol-item-text">
                                                                <span class="mega-sol-item-name"><?= esc_html($leaf->title); ?></span>
                                                                <?php if ($leaf->description): ?><span class="mega-sol-item-sub"><?= esc_html($leaf->description); ?></span><?php endif; ?>
                                                            </span>
                                                        </a>
                                                        <?php endforeach; ?>
                                                    </div>

                                                <?php endif; ?>
                                            </div>
                                            <?php endforeach; ?>
                                            <?php for ($pad = count($row); $pad < 3; $pad++): ?>
                                                <div class="mega-sol-col" aria-hidden="true"></div>
                                            <?php endfor; ?>
                                        </div>

                                    <?php endforeach; endif; ?>

                                </div>
                            </div>
                        </div>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </nav>
                <div class="nav-actions">
                    <button type="button" class="theme-switch" id="theme-toggle" role="switch" aria-checked="false" aria-label="Switch to dark theme">
                        <span class="theme-switch-thumb">
                            <svg class="theme-switch-icon ts-sun" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="4" stroke="currentColor" stroke-width="1.8"/><path d="M10 1.5v2M10 16.5v2M18.5 10h-2M3.5 10h-2M15.8 4.2l-1.4 1.4M5.6 14.4l-1.4 1.4M15.8 15.8l-1.4-1.4M5.6 5.6L4.2 4.2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            <svg class="theme-switch-icon ts-moon" viewBox="0 0 20 20" fill="none"><path d="M17 11.5A7.5 7.5 0 018.5 3 7.5 7.5 0 1017 11.5z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
                        </span>
                    </button>
                    <a href="/contact/" class="btn btn-primary">Contact Us</a>
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

            <?php foreach ($tree as $node):
                $has_children = !empty($node->children);
                $node_url = $node->url ? $node->url : '#';
            ?>

                <?php if (!$has_children): ?>

                    <a href="<?= esc_url($node_url); ?>"><?= esc_html($node->title); ?></a>

                <?php else:
                    $is_cards = true;
                    foreach ($node->children as $c) {
                        if (!empty($c->children)) { $is_cards = false; break; }
                    }
                    $root_id = 'm-' . $node->ID;
                ?>

                <div class="m-item">
                    <button class="m-toggle" data-target="<?= esc_attr($root_id); ?>">
                        <?= esc_html($node->title); ?> <?= $ith_chev_mobile; ?>
                    </button>
                    <div class="m-submenu" id="<?= esc_attr($root_id); ?>">

                        <?php if ($is_cards): ?>

                            <?php foreach ($node->children as $card): ?>
                            <a class="m-sub-link" href="<?= esc_url($card->url ? $card->url : '#'); ?>">
                                <span class="ic"><?= $ith_icon_16; ?></span><?= esc_html($card->title); ?>
                            </a>
                            <?php endforeach; ?>

                        <?php else: ?>

                            <?php foreach ($node->children as $column):
                                $col_id = 'm-' . $column->ID;
                                $col_has_groups = false;
                                foreach ($column->children as $cc) {
                                    if (!empty($cc->children)) { $col_has_groups = true; break; }
                                }
                            ?>
                            <div class="m-item m-item-nested">
                                <button class="m-toggle m-toggle-sub m-toggle-sub-1" data-target="<?= esc_attr($col_id); ?>">
                                    <span><?= esc_html($column->title); ?>
                                        <?php if ($column->description): ?><span class="m-toggle-tag"><?= esc_html($column->description); ?></span><?php endif; ?>
                                    </span>
                                    <?= $ith_chev_mobile; ?>
                                </button>
                                <div class="m-submenu" id="<?= esc_attr($col_id); ?>">

                                    <?php if ($col_has_groups): ?>

                                        <?php foreach ($column->children as $group):
                                            $group_id = 'm-' . $group->ID;
                                        ?>
                                        <div class="m-item m-item-nested">
                                            <button class="m-toggle m-toggle-sub" data-target="<?= esc_attr($group_id); ?>">
                                                <span><?= esc_html($group->title); ?></span>
                                                <?= $ith_chev_mobile; ?>
                                            </button>
                                            <div class="m-submenu" id="<?= esc_attr($group_id); ?>">
                                                <?php foreach ($group->children as $leaf): ?>
                                                <a class="m-sub-link" href="<?= esc_url($leaf->url ? $leaf->url : '#'); ?>">
                                                    <span class="ic"><?= $ith_icon_16; ?></span>
                                                    <span class="m-sub-text">
                                                        <strong><?= esc_html($leaf->title); ?></strong>
                                                        <?php if ($leaf->description): ?><small><?= esc_html($leaf->description); ?></small><?php endif; ?>
                                                    </span>
                                                </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>

                                    <?php else: ?>

                                        <?php foreach ($column->children as $leaf): ?>
                                        <a class="m-sub-link" href="<?= esc_url($leaf->url ? $leaf->url : '#'); ?>">
                                            <span class="ic"><?= $ith_icon_16; ?></span>
                                            <span class="m-sub-text">
                                                <strong><?= esc_html($leaf->title); ?></strong>
                                                <?php if ($leaf->description): ?><small><?= esc_html($leaf->description); ?></small><?php endif; ?>
                                            </span>
                                        </a>
                                        <?php endforeach; ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        <?php endif; ?>
                    </div>
                </div>

                <?php endif; ?>

            <?php endforeach; ?>

            <a href="/contact/">Contact</a>
        </div>

        <!-- ===================== HEADER JS (self-contained: scoped in its own IIFE, every DOM
                    lookup is null-guarded, so this block works whether or not body/footer markup
                    exists on the page) ===================== -->
        <script>
            (function () {

                // Elementor/page-builder sections often apply a `transform`, `filter`
                // or `will-change` to their wrapping container for motion-effect
                // animations. Any of those silently turns our position:fixed header,
                // scrim and mobile panel into position:absolute relative to that
                // wrapper instead of the viewport - which is why a fixed header can
                // render fine on most pages but go missing/mispositioned on a page
                // that has an animated section wrapping the shortcode. Moving these
                // elements to be direct children of <body> sidesteps that entirely,
                // regardless of where on the page the shortcode was placed.
                ['site-header', 'scrim', 'mobile-panel'].forEach(function (id) {
                    var el = document.getElementById(id);
                    if (el && el.parentElement !== document.body) {
                        document.body.appendChild(el);
                    }
                });

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

                // Theme logic itself lives on window.ithenaTheme (defined in <head>,
                // global) - this button is just one caller of it, not the owner.
                const themeToggle = document.getElementById('theme-toggle');
                if (themeToggle) {
                    // #main may not be parsed yet if the header renders above it in the
                    // page - defer only the initial sync; click-time DOM is always ready.
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', window.ithenaTheme.sync);
                    } else {
                        window.ithenaTheme.sync();
                    }
                    themeToggle.addEventListener('click', window.ithenaTheme.toggle);
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
                        // Accordion: collapse sibling sections at this same level only, so opening
                        // a nested submenu (e.g. OEM inside Solutions) never closes its parent section
                        // or any other level's open state - each level accordions independently.
                        const level = item.parentElement;
                        level.querySelectorAll(':scope > .m-item.open').forEach(sibling=>{
                            if (sibling !== item) sibling.classList.remove('open');
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
                    const GROUP = '.mega-sol-group, .mega-ind-group';
                    const groups = document.querySelectorAll(GROUP);
                    if (!groups.length) return;

                    const reduceMotion = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);

                    const DURATION = 300; // keep in sync with the .is-animating transition

                    function panelBody(details) {
                        return details.querySelector('.mega-sol-group-items, .mega-ind-refs');
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

    <?php
    return ob_get_clean();
}
add_shortcode('new_ithena_header', 'ithena_custom_header_shortcode');