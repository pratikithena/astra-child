<?php
/**
 * ITHENA header - shortcode [new_ith_header cta_text="Contact Us" cta_url="/contact/" menu="new-ithena-menu"]
 * PHP port of includes/wp-header-sample.html: same CSS/JS/markup, menu items rendered by wp_nav_menu() + IHD_Walker.
 *
 * Menu: Appearance > Menus. The menu named by the shortcode's menu="" attribute (default new-ithena-menu, the same
 * menu as includes/wp-header-shortcode.php); if no menu has that name, the one assigned to the "ITHENA Header" location.
 *  Hierarchy (layout is inferred from it, not hardcoded):
 *     top item > column > group > item   (Solutions, Services: accordion groups)
 *     top item > column > item           (Industries, Company: flat lists)
 *     top item                           (Case Studies: plain link)
 *  Subtitle: ACF field menu_subtitle on the menu item, else its Description (enable it in Screen Options).
 *  Icon (top items + columns): ACF field menu_icon (image URL, or a key from ihd_icons()), else a CSS class
 *  "icon-<key>" on the menu item (e.g. icon-wrench), else the cube icon.
 *  Same ACF fields as includes/wp-header-shortcode.php, so one menu can feed both shortcodes.
 */
if (!defined('ABSPATH')) exit;

const IHD_LOCATION = 'new_ith_header';
add_action('after_setup_theme', function () { register_nav_menus([IHD_LOCATION => 'ITHENA Header']); });

/* line icons (24x24 stroke paths) - keys usable as menu_icon value or icon-<key> class */
function ihd_icons() {
    return [
        'layers'   => 'M12 3l9 5-9 5-9-5zM3 13l9 5 9-5M3 17l9 5 9-5',
        'compass'  => 'M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18zM15 9l-2 5-5 2 2-5z',
        'factory'  => 'M3 20V10l5 3v-3l5 3v-3l5 3v7zM7 20v-3M12 20v-3M17 20v-3M17 10V4h3v6',
        'chart'    => 'M4 20V4M4 20h16M8 16v-5M12 16V8M16 16v-3M20 16V6',
        'building' => 'M4 21V5l8-2v18M12 21h8V9h-8M8 8h1M8 12h1M8 16h1M16 12h1M16 16h1',
        'cube'     => 'M12 3l8 4v10l-8 4-8-4V7zM4 7l8 4 8-4M12 11v10',
        'users'    => 'M9 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM3 20a6 6 0 0 1 12 0M16 5a3 3 0 0 1 0 6M21 20a6 6 0 0 0-4-5.6',
        'db'       => 'M12 3c5 0 8 1.3 8 3s-3 3-8 3-8-1.3-8-3 3-3 8-3zM4 6v12c0 1.7 3 3 8 3s8-1.3 8-3V6M4 12c0 1.7 3 3 8 3s8-1.3 8-3',
        'cloud'    => 'M7 18a4 4 0 0 1-.5-8A6 6 0 0 1 18 9a4 4 0 0 1 0 9z',
        'bolt'     => 'M13 2L4 14h7l-1 8 9-12h-7z',
        'shield'   => 'M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6zM9 12l2 2 4-4',
        'wrench'   => 'M14.7 6.3a4 4 0 0 0-5.4 5.4L3 18l3 3 6.3-6.3a4 4 0 0 0 5.4-5.4l-2.7 2.7-2-2z',
    ];
}
/* '' / '#' / unsafe scheme (javascript: etc.) -> '#' */
function ihd_url($u) {
    $u = trim((string) $u);
    return $u !== '' && esc_url($u) !== '' ? $u : '#';
}
/* flat nav menu items -> tree of {t,d,u,icon,c}; children whose parent is missing are dropped */
function ihd_items_tree($items) {
    $acf = function_exists('get_field');
    $refs = [];
    $tree = [];
    foreach ($items as $it) {
        $icon = $acf ? get_field('menu_icon', $it) : '';
        if (is_array($icon)) $icon = $icon['url'] ?? '';                   // image field returning an array
        elseif (is_numeric($icon)) $icon = wp_get_attachment_url((int) $icon); // ... or an ID
        if (!$icon) foreach ((array) $it->classes as $c) if (strpos($c, 'icon-') === 0) $icon = substr($c, 5);
        $refs[$it->ID] = (object) [
            't'    => $it->title,
            'd'    => trim((string) (($acf ? get_field('menu_subtitle', $it) : '') ?: $it->description)),
            'u'    => ihd_url($it->url),
            'icon' => (string) $icon,
            'c'    => [],
        ];
    }
    foreach ($items as $it) {
        $p = (int) $it->menu_item_parent;
        if (!$p) $tree[] = $refs[$it->ID];
        elseif (isset($refs[$p])) $refs[$p]->c[] = $refs[$it->ID];
    }
    return $tree;
}
/* The mega-menu layout depends on the shape of each whole subtree (flat cards vs columns of groups, 3 columns
   per row), which start_el/end_el streaming cannot see - so walk() builds the tree and renders it in one go. */
class IHD_Walker extends Walker_Nav_Menu {
    public $count = 0;   // top-level items rendered (mobile CTA stagger index)
    private $mobile;
    public function __construct($mobile = false) { $this->mobile = $mobile; }
    public function walk($elements, $max_depth, ...$args) {
        $tree = ihd_items_tree($elements);
        $this->count = count($tree);
        $out = '';
        foreach ($tree as $k => $node) $out .= $this->mobile ? ihd_mobile($node, $k) : ihd_desktop($node);
        return $out;
    }
}
/* rendered items of the header menu ('' if there is no such menu) */
function ihd_nav($menu, $walker) {
    return (string) wp_nav_menu([
        'menu' => $menu, 'theme_location' => IHD_LOCATION, 'walker' => $walker,
        'container' => false, 'items_wrap' => '%3$s', 'fallback_cb' => false, 'echo' => false, 'depth' => 0,
    ]);
}
/* ---- builders (same markup as the sample's JS builders) ---- */
function ihd_svg($d, $cls = '') {
    return '<svg class="iw-i' . ($cls ? ' ' . $cls : '') . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="' . $d . '"/></svg>';
}
function ihd_icon($node, $cls = '') {
    $p = ihd_icons();
    if (isset($p[$node->icon])) return ihd_svg($p[$node->icon], $cls);
    if (preg_match('#^(https?:)?//|^/#', $node->icon)) return '<img class="iw-i' . ($cls ? ' ' . $cls : '') . '" src="' . esc_url($node->icon) . '" alt="" aria-hidden="true">';
    return ihd_svg($p['cube'], $cls);
}
function ihd_chev() { return ihd_svg('M6 9l6 6 6-6', 'iw-ch'); }
function ihd_arrow($cls = '') { return ihd_svg('M5 12h14M13 6l6 6-6 6', $cls); }
function ihd_kids($x) { return !empty($x->c); }
function ihd_is_cards($node) { return !array_filter($node->c, 'ihd_kids'); }
function ihd_sub($cls, $d) { return $d ? '<span class="' . $cls . '">' . esc_html($d) . '</span>' : ''; }
function ihd_st($i) { return ' style="--i:' . (int) $i . '"'; }   // stagger index for the entry animation
function ihd_it($leaf, $i) {
    return '<a href="' . esc_url($leaf->u) . '" class="iw-a iw-it"' . ihd_st($i) . '><span class="iw-it-t">' . esc_html($leaf->t) . '</span>' . ihd_sub('iw-it-d', $leaf->d) . ihd_arrow('iw-go') . '</a>';
}
function ihd_col($c, $ci) {
    $body = '';
    if (ihd_is_cards($c)) {
        $body = '<div class="iw-gitems">';
        foreach ($c->c as $i => $l) $body .= ihd_it($l, $i + 1);
        $body .= '</div>';
    } else {
        foreach ($c->c as $gi => $g) {
            $body .= '<div class="iw-group"' . ihd_st($gi + 1) . '><button type="button" class="iw-b iw-gsum" aria-expanded="false">' . esc_html($g->t) . ihd_chev() . '</button><div class="iw-gitems">';
            foreach ($g->c as $i => $l) $body .= ihd_it($l, $i);
            $body .= '</div></div>';
        }
    }
    $title = esc_html($c->t);
    if ($c->u !== '#') $title = '<a class="iw-a" href="' . esc_url($c->u) . '">' . $title . '</a>';
    return '<div class="iw-col" style="--c:' . (int) $ci . '"><div class="iw-col-head">' . ihd_icon($c) . '<div><span class="iw-col-t">' . $title . '</span>' . ihd_sub('iw-col-d', $c->d) . '</div></div>' . $body . '</div>';
}
function ihd_desktop($node) {
    if (!ihd_kids($node)) return '<a class="iw-a iw-link" href="' . esc_url($node->u) . '">' . ihd_icon($node, 'iw-ni-ic') . esc_html($node->t) . '</a>';
    $inner = '';
    if (ihd_is_cards($node)) {
        $inner = '<div class="iw-cards">';
        foreach ($node->c as $i => $c) {
            $inner .= '<div class="iw-card"' . ihd_st($i) . '><span class="iw-card-t">' . esc_html($c->t) . '</span>' . ihd_sub('iw-card-d', $c->d) .
                '<a href="' . esc_url($c->u) . '" class="iw-a iw-explore">Explore ' . ihd_arrow() . '</a></div>';
        }
        $inner .= '</div>';
    } else {
        foreach (array_chunk($node->c, 3) as $r => $row) {   // 3 columns per row, short rows padded
            $inner .= '<div class="iw-cols' . ($r ? ' iw-row2' : '') . '">';
            foreach ($row as $ci => $c) $inner .= ihd_col($c, $ci);
            $inner .= str_repeat('<div class="iw-col" aria-hidden="true"></div>', 3 - count($row)) . '</div>';
        }
    }
    return '<div class="iw-item"><a class="iw-a iw-link" href="' . esc_url($node->u) . '" aria-haspopup="true" aria-expanded="false">' . ihd_icon($node, 'iw-ni-ic') . esc_html($node->t) . ihd_chev() . '</a>' .
        '<div class="iw-mega"><div class="iw-mega-in">' . $inner . '</div></div></div>';
}
function ihd_mlink($leaf, $rich, $i) {
    return '<a class="iw-a iw-ml" href="' . esc_url($leaf->u) . '"' . ihd_st($i) . '>' .
        ($rich ? '<span class="iw-ml-text"><span>' . esc_html($leaf->t) . '</span>' . ihd_sub('iw-ml-d', $leaf->d) . '</span>' : esc_html($leaf->t)) . '</a>';
}
function ihd_mitem($cls, $btn_cls, $label, $body, $i) {
    static $uid = 0;
    $id = 'iw-m-' . (++$uid);
    return '<div class="' . $cls . '"' . ihd_st($i) . '><button type="button" class="iw-b ' . $btn_cls . '" aria-expanded="false" aria-controls="' . $id . '">' . $label . ihd_chev() . '</button><div class="iw-sub" id="' . $id . '">' . $body . '</div></div>';
}
function ihd_mobile($node, $k) {
    if (!ihd_kids($node)) return '<a class="iw-a iw-mflat" href="' . esc_url($node->u) . '"' . ihd_st($k) . '>' . esc_html($node->t) . '</a>';
    $body = '';
    if (ihd_is_cards($node)) {
        foreach ($node->c as $i => $c) $body .= ihd_mlink($c, false, $i);
    } else {
        foreach ($node->c as $ci => $c) {
            $inner = '';
            if (ihd_is_cards($c)) {
                foreach ($c->c as $i => $l) $inner .= ihd_mlink($l, true, $i);
            } else {
                foreach ($c->c as $gi => $g) {
                    $links = '';
                    foreach ($g->c as $i => $l) $links .= ihd_mlink($l, true, $i);
                    $inner .= ihd_mitem('iw-mi iw-mi-nested', 'iw-mt iw-mt-sub', '<span class="iw-mt-l">' . esc_html($g->t) . '</span>', $links, $gi);
                }
            }
            $body .= ihd_mitem('iw-mi iw-mi-nested', 'iw-mt iw-mt-sub iw-mt-sub1', '<span class="iw-mt-l">' . esc_html($c->t) . ihd_sub('iw-mt-tag', $c->d) . '</span>', $inner, $ci);
        }
    }
    return ihd_mitem('iw-mi', 'iw-mt', esc_html($node->t), $body, $k);
}

function ihd_header_shortcode($atts) {
    $a = shortcode_atts(['cta_text' => 'Contact Us', 'cta_url' => '/contact/', 'menu' => 'new-ithena-menu'], $atts, 'new_ith_header');
    $mobile = new IHD_Walker(true);
    $nav_desktop = ihd_nav($a['menu'], new IHD_Walker());
    $nav_mobile = ihd_nav($a['menu'], $mobile);
    $logo = 'https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new.webp';
    ob_start(); ?>

    <style>
        section#iw-root{--iw-panel:#FFFFFF!important;--iw-raise:#FFFFFF!important;--iw-ink:#1F2023!important;--iw-ink2:#4B5259!important;--iw-mute:#7A8289!important;--iw-line:#E6EAEE!important;--iw-blue:#0083C8!important;--iw-blue-deep:#006AA3!important;--iw-link:#0083C8!important;--iw-tint:#EAF5FB!important;--iw-head:rgba(255,255,255,.86)!important;--iw-sh1:0 1px 2px rgba(10,25,45,.06)!important;--iw-sh2:0 8px 24px -16px rgba(10,25,45,.35)!important;--iw-shadow:0 32px 80px -32px rgba(10,25,45,.35)!important;--iw-ease:cubic-bezier(.16,1,.3,1)!important;--iw-div:color-mix(in srgb,var(--iw-link) 45%,transparent)!important}
        section#iw-root[data-theme="dark"]{--iw-panel:#111113!important;--iw-raise:#17181B!important;--iw-ink:#F2F3F5!important;--iw-ink2:rgba(228,230,235,.8)!important;--iw-mute:#9A9FA8!important;--iw-line:rgba(255,255,255,.09)!important;--iw-link:#3FA9E0!important;--iw-tint:rgba(63,169,224,.12)!important;--iw-head:rgba(10,10,11,.86)!important;--iw-sh1:0 1px 2px rgba(0,0,0,.5)!important;--iw-sh2:0 18px 44px -24px rgba(0,0,0,.62)!important;--iw-shadow:0 44px 90px -34px rgba(0,0,0,.72)!important}
        section#iw-root{display:block!important;margin:0!important;padding:0!important;font-family:"Noto Sans",system-ui,sans-serif!important;font-size:14px!important;line-height:1.45!important;color:var(--iw-ink)!important;-webkit-font-smoothing:antialiased!important}
        section#iw-root,section#iw-root *,section#iw-root *::before,section#iw-root *::after{box-sizing:border-box!important}
        section#iw-root .iw-a{color:inherit!important;text-decoration:none!important}
        section#iw-root .iw-a:hover,section#iw-root .iw-a:focus,section#iw-root .iw-a:visited{color:inherit!important;text-decoration:none!important}
        section#iw-root .iw-b{margin:0!important;padding:0!important;font:inherit!important;color:inherit!important;letter-spacing:normal!important;text-transform:none!important;background:none!important;border:0!important;border-radius:0!important;box-shadow:none!important;cursor:pointer!important}
        section#iw-root .iw-b:hover,section#iw-root .iw-b:focus{color:inherit!important;background:none!important;border-color:transparent!important;box-shadow:none!important}
        section#iw-root .iw-i{display:block!important;flex:none!important;width:18px!important;height:18px!important}
        section#iw-root .iw-a:focus-visible,section#iw-root .iw-b:focus-visible{outline:2px solid var(--iw-blue)!important;outline-offset:2px!important;border-radius:8px!important}
        @keyframes iw-in{from{opacity:0;transform:translateY(10px)}}
        section#iw-root .iw-bar{position:fixed!important;inset:0 0 auto!important;z-index:999995!important;padding:14px 0!important;border-bottom:1px solid transparent!important;transition:padding .4s var(--iw-ease),background .4s var(--iw-ease),border-color .4s,box-shadow .4s!important}
        section#iw-root .iw-bar.is-scrolled{padding:6px 0!important;background:var(--iw-head)!important;-webkit-backdrop-filter:saturate(180%) blur(16px)!important;backdrop-filter:saturate(180%) blur(16px)!important;border-bottom-color:var(--iw-line)!important;box-shadow:var(--iw-sh1)!important}
        section#iw-root .iw-wrap{max-width:1280px!important;margin:0 auto!important;padding:10px 30px!important;display:flex!important;align-items:center!important;justify-content:space-between!important;gap:24px!important}
        section#iw-root .iw-logo-img{display:block!important;height:40px!important;width:auto!important;max-width:none!important}
        section#iw-root .iw-nav{display:flex!important;align-items:center!important;gap:4px!important}
        section#iw-root .iw-item{position:relative!important}
        section#iw-root .iw-link{display:inline-flex!important;align-items:center!important;gap:7px!important;height:40px!important;padding:0 14px!important;border-radius:999px!important;font-size:15px!important;font-weight:600!important;color:var(--iw-ink)!important;white-space:nowrap!important;transition:background .2s,color .2s!important}
        section#iw-root .iw-link .iw-ni-ic{color:var(--iw-link)!important}
        section#iw-root .iw-link .iw-ch{width:14px!important;height:14px!important;color:var(--iw-mute)!important;transition:transform .25s var(--iw-ease),color .2s!important}
        section#iw-root .iw-link:hover,section#iw-root .iw-item.is-open>.iw-link{background:var(--iw-tint)!important;color:var(--iw-link)!important}
        section#iw-root .iw-item.is-open>.iw-link .iw-ch{transform:rotate(180deg)!important;color:var(--iw-link)!important}
        section#iw-root .iw-actions{display:flex!important;align-items:center!important;gap:12px!important}
        section#iw-root .iw-btn,section#iw-root .iw-btn:hover,section#iw-root .iw-btn:focus{display:inline-flex!important;align-items:center!important;justify-content:center!important;gap:8px!important;height:40px!important;padding:0 18px!important;border-radius:999px!important;background:var(--iw-blue)!important;color:#fff!important;font-size:14px!important;font-weight:700!important;white-space:nowrap!important;transition:background .2s,transform .15s!important}
        section#iw-root .iw-btn:hover{background:var(--iw-blue-deep)!important}
        section#iw-root .iw-btn:active{transform:translateY(1px)!important}
        section#iw-root .iw-btn .iw-i{width:16px!important;height:16px!important;transition:transform .2s var(--iw-ease)!important}
        section#iw-root .iw-btn:hover .iw-i{transform:translateX(3px)!important}
        section#iw-root .iw-theme,section#iw-root .iw-theme:hover,section#iw-root .iw-theme:focus{position:relative!important;flex-shrink:0!important;width:48px!important;height:26px!important;border:1px solid var(--iw-line)!important;border-radius:999px!important;background:var(--iw-tint)!important}
        section#iw-root .iw-thumb{position:absolute!important;top:2px!important;left:2px!important;width:20px!important;height:20px!important;border-radius:50%!important;background:var(--iw-blue)!important;color:#fff!important;display:grid!important;place-items:center!important;box-shadow:var(--iw-sh1)!important;transition:transform .35s var(--iw-ease)!important}
        section#iw-root[data-theme="dark"] .iw-thumb{transform:translateX(22px)!important}
        section#iw-root .iw-thumb .iw-i{position:absolute!important;width:12px!important;height:12px!important;transition:opacity .25s,transform .3s var(--iw-ease)!important}
        section#iw-root .iw-moon,section#iw-root[data-theme="dark"] .iw-sun{opacity:0!important;transform:scale(.5)!important}
        section#iw-root[data-theme="dark"] .iw-moon{opacity:1!important;transform:none!important}
        section#iw-root .iw-icon-btn{width:44px!important;height:44px!important;display:flex!important;align-items:center!important;justify-content:center!important;border-radius:10px!important;color:var(--iw-ink)!important;transition:background .2s!important}
        section#iw-root .iw-icon-btn:hover{background:var(--iw-tint)!important}
        section#iw-root .iw-icon-btn .iw-i{width:22px!important;height:22px!important}
        section#iw-root .iw-burger{display:none!important}
        section#iw-root .iw-mega{position:fixed!important;top:calc(var(--iw-header-h,72px) + 8px)!important;left:50%!important;width:min(calc(100vw - 32px),1220px)!important;background:var(--iw-panel)!important;border:1px solid var(--iw-line)!important;border-radius:24px!important;overflow:hidden!important;box-shadow:var(--iw-shadow)!important;opacity:0!important;visibility:hidden!important;pointer-events:none!important;transform:translateX(-50%) translateY(-8px)!important;transition:opacity .22s,transform .28s var(--iw-ease),visibility .28s!important;z-index:150!important}
        section#iw-root .iw-item.is-open .iw-mega{opacity:1!important;visibility:visible!important;pointer-events:auto!important;transform:translateX(-50%)!important}
        section#iw-root .iw-mega-in{padding:10px!important}
        section#iw-root .iw-cols{position:relative!important;display:grid!important;grid-template-columns:repeat(3,minmax(0,1fr))!important;gap:10px!important}
        section#iw-root .iw-row2{margin-top:10px!important}
        section#iw-root .iw-row2::before{content:""!important;position:absolute!important;top:-6px!important;left:24px!important;right:24px!important;height:1px!important;background:linear-gradient(90deg,transparent,var(--iw-div),transparent)!important}
        section#iw-root .iw-col{position:relative!important;padding:16px 14px!important}
        section#iw-root .iw-col+.iw-col:not(:empty)::before{content:""!important;position:absolute!important;left:-6px!important;top:16px!important;bottom:16px!important;width:1px!important;background:linear-gradient(180deg,transparent,var(--iw-div),transparent)!important}
        section#iw-root .iw-col-head{display:flex!important;align-items:center!important;gap:12px!important;margin-bottom:8px!important;padding:0 10px 6px!important}
        section#iw-root .iw-col-head .iw-i{width:22px!important;height:22px!important;color:var(--iw-link)!important}
        section#iw-root .iw-col-t{display:block!important;margin:0 0 2px!important;font-size:16px!important;font-weight:700!important;letter-spacing:-.01em!important;color:var(--iw-ink)!important;white-space:nowrap!important}
        section#iw-root .iw-col-d{display:block!important;font-size:12.5px!important;color:var(--iw-mute)!important;white-space:nowrap!important}
        section#iw-root .iw-col>.iw-group,section#iw-root .iw-col>.iw-gitems{margin-left:34px!important}
        section#iw-root .iw-gsum{display:flex!important;align-items:center!important;justify-content:space-between!important;gap:10px!important;width:100%!important;margin:2px 0!important;padding:10px!important;border-radius:10px!important;font-size:11px!important;font-weight:700!important;text-transform:uppercase!important;letter-spacing:.12em!important;text-align:left!important;color:var(--iw-ink2)!important;transition:background .18s,color .18s!important}
        section#iw-root .iw-gsum:hover,section#iw-root .iw-group.is-open>.iw-gsum{color:var(--iw-link)!important;background:var(--iw-tint)!important}
        section#iw-root .iw-gsum .iw-ch{width:14px!important;height:14px!important;transition:transform .25s var(--iw-ease)!important}
        section#iw-root .iw-group.is-open>.iw-gsum .iw-ch{transform:rotate(180deg)!important}
        section#iw-root .iw-gitems{display:flex!important;flex-direction:column!important;gap:2px!important;padding:2px 0 8px!important;overflow:hidden!important}
        section#iw-root .iw-group:not(.is-open)>.iw-gitems{display:none!important}
        section#iw-root .iw-group .iw-gitems{padding-left:14px!important}
        section#iw-root .iw-gitems.is-animating{transition:height .3s var(--iw-ease),opacity .3s var(--iw-ease)!important}
        section#iw-root .iw-it{position:relative!important;display:block!important;padding:8px 30px 8px 10px!important;border-radius:10px!important;transition:background .18s,box-shadow .18s,transform .18s var(--iw-ease)!important}
        section#iw-root .iw-it:hover,section#iw-root .iw-it:focus-visible{background:var(--iw-raise)!important;box-shadow:var(--iw-sh2)!important}
        section#iw-root .iw-it:focus-visible{outline:0!important}
        section#iw-root .iw-it:active{transform:scale(.99)!important}
        section#iw-root .iw-it-t{display:block!important;font-size:14px!important;font-weight:500!important;line-height:1.3!important;color:var(--iw-ink2)!important;transition:color .18s!important}
        section#iw-root .iw-it:hover .iw-it-t,section#iw-root .iw-it:focus-visible .iw-it-t{color:var(--iw-link)!important}
        section#iw-root .iw-it-d{display:block!important;margin-top:2px!important;font-size:12.5px!important;color:var(--iw-mute)!important;line-height:1.35!important}
        section#iw-root .iw-it .iw-go{position:absolute!important;right:8px!important;top:50%!important;margin-top:-9px!important;color:var(--iw-link)!important;opacity:0!important;transform:translateX(-6px)!important;transition:opacity .18s,transform .18s var(--iw-ease)!important}
        section#iw-root .iw-it:hover .iw-go,section#iw-root .iw-it:focus-visible .iw-go{opacity:1!important;transform:none!important}
        section#iw-root .iw-cards{display:grid!important;grid-template-columns:repeat(3,minmax(0,1fr))!important;gap:10px!important}
        section#iw-root .iw-card{position:relative!important;padding:18px 20px!important;border-radius:14px!important;transition:background .18s,box-shadow .18s,transform .18s var(--iw-ease)!important}
        section#iw-root .iw-card:not(:nth-child(3n+1))::before{content:""!important;position:absolute!important;left:-6px!important;top:16px!important;bottom:16px!important;width:1px!important;background:linear-gradient(180deg,transparent,var(--iw-div),transparent)!important}
        section#iw-root .iw-card:nth-child(n+4)::after{content:""!important;position:absolute!important;top:-6px!important;left:20px!important;right:20px!important;height:1px!important;background:linear-gradient(90deg,transparent,var(--iw-div),transparent)!important}
        section#iw-root .iw-card:hover{background:var(--iw-raise)!important;box-shadow:var(--iw-sh2)!important}
        section#iw-root .iw-card:active{transform:scale(.99)!important}
        section#iw-root .iw-card-t{display:block!important;margin:0 0 4px!important;font-size:15px!important;font-weight:700!important;color:var(--iw-ink)!important;transition:color .18s!important}
        section#iw-root .iw-card:hover .iw-card-t{color:var(--iw-link)!important}
        section#iw-root .iw-card-d{display:block!important;margin:0 0 8px!important;font-size:12.5px!important;color:var(--iw-mute)!important;line-height:1.45!important}
        section#iw-root .iw-explore,section#iw-root .iw-explore:hover,section#iw-root .iw-explore:focus{display:inline-flex!important;align-items:center!important;gap:6px!important;font-size:12px!important;font-weight:700!important;color:var(--iw-link)!important}
        section#iw-root .iw-explore .iw-i{width:12px!important;height:12px!important;transition:transform .2s var(--iw-ease)!important}
        section#iw-root .iw-card:hover .iw-explore .iw-i{transform:translateX(3px)!important}
        section#iw-root .iw-item.is-open :is(.iw-col-head,.iw-gsum,.iw-card),section#iw-root .iw-item.is-open .iw-col>.iw-gitems>.iw-it{animation:iw-in .45s var(--iw-ease) backwards!important;animation-delay:calc(80ms + var(--c,0) * 70ms + var(--i,0) * 45ms)!important}
        section#iw-root .iw-item.is-open .iw-group.is-open .iw-it{animation:iw-in .4s var(--iw-ease) backwards!important;animation-delay:calc(var(--i,0) * 45ms)!important}
        section#iw-root .iw-scrim{position:fixed!important;z-index:999996!important;inset:0!important;background:rgba(10,10,11,.5)!important;opacity:0!important;visibility:hidden!important;transition:.3s!important}
        section#iw-root .iw-scrim.is-open{opacity:1!important;visibility:visible!important}
        section#iw-root .iw-panel{position:fixed!important;z-index:999997!important;inset:0!important;width:100%!important;height:100dvh!important;padding:10px 20px 28px!important;overflow-x:hidden!important;overflow-y:auto!important;overscroll-behavior:contain!important;background:var(--iw-panel)!important;transform:translateX(100%)!important;visibility:hidden!important;transition:transform .3s var(--iw-ease),visibility .3s!important}
        section#iw-root .iw-panel.is-open{transform:none!important;visibility:visible!important}
        html.iw-lock{overflow:hidden!important}
        section#iw-root .iw-mtop{display:flex!important;justify-content:space-between!important;align-items:center!important;margin:0 -20px 8px!important;padding:0 20px 10px!important;border-bottom:1px solid var(--iw-line)!important}
        section#iw-root .iw-mtop .iw-logo-img{height:36px!important}
        section#iw-root .iw-mt,section#iw-root .iw-mflat{display:flex!important;align-items:center!important;justify-content:space-between!important;gap:10px!important;width:100%!important;min-height:52px!important;padding:10px 8px!important;font-size:16px!important;font-weight:700!important;color:var(--iw-ink)!important;text-align:left!important}
        section#iw-root .iw-mt .iw-ch{color:var(--iw-mute)!important;transition:transform .25s var(--iw-ease)!important}
        section#iw-root .iw-mi.is-open>.iw-mt .iw-ch{transform:rotate(180deg)!important;color:var(--iw-link)!important}
        section#iw-root .iw-sub{max-height:0!important;overflow:hidden!important;transition:max-height .4s var(--iw-ease)!important}
        section#iw-root .iw-mi.is-open>.iw-sub{max-height:1200px!important;padding:0 0 14px 8px!important}
        section#iw-root .iw-mi-nested.is-open>.iw-sub{padding:0 0 6px 16px!important}
        section#iw-root .iw-panel>.iw-mi,section#iw-root .iw-panel>.iw-mflat{background:linear-gradient(90deg,var(--iw-div),transparent) bottom/100% 1px no-repeat!important}
        section#iw-root .iw-mt-sub1{min-height:44px!important;padding:8px!important;font-size:15px!important}
        section#iw-root .iw-mi.is-open>.iw-mt-sub1{color:var(--iw-link)!important}
        section#iw-root .iw-mt-sub:not(.iw-mt-sub1){min-height:40px!important;padding:12px 8px 4px!important;font-size:11px!important;font-weight:700!important;letter-spacing:.1em!important;text-transform:uppercase!important;color:var(--iw-link)!important}
        section#iw-root .iw-mt-l{display:flex!important;flex-direction:column!important;gap:2px!important}
        section#iw-root .iw-mt-tag{font-size:12.5px!important;font-weight:400!important;letter-spacing:0!important;text-transform:none!important;color:var(--iw-mute)!important}
        section#iw-root .iw-ml{display:flex!important;align-items:center!important;min-height:44px!important;padding:8px 8px 8px 12px!important;border-radius:10px!important;font-size:14px!important;font-weight:500!important;color:var(--iw-ink2)!important;transition:background .15s!important}
        section#iw-root .iw-ml:hover{color:var(--iw-link)!important}
        section#iw-root .iw-ml:active{background:var(--iw-tint)!important}
        section#iw-root .iw-ml-text{display:flex!important;flex-direction:column!important;gap:2px!important}
        section#iw-root .iw-ml-d{font-size:12.5px!important;color:var(--iw-mute)!important;line-height:1.35!important}
        section#iw-root .iw-mcta{width:100%!important;height:48px!important;margin-top:24px!important;font-size:15px!important}
        section#iw-root .iw-panel.is-open>:not(.iw-mtop),section#iw-root .iw-mi.is-open>.iw-sub>*{animation:iw-in .4s var(--iw-ease) backwards!important;animation-delay:calc(60ms + var(--i,0) * 45ms)!important}
        @media (max-width:1180px){
        section#iw-root .iw-cols{grid-template-columns:1fr!important}
        section#iw-root .iw-col:empty{display:none!important}
        section#iw-root .iw-col+.iw-col:not(:empty)::before{left:24px!important;right:24px!important;top:-6px!important;bottom:auto!important;width:auto!important;height:1px!important;background:linear-gradient(90deg,transparent,var(--iw-div),transparent)!important}
        section#iw-root .iw-mega-in{max-height:calc(100vh - var(--iw-header-h,72px) - 24px)!important;overflow-y:auto!important}
        }
        @media (max-width:980px){
        section#iw-root .iw-mega,section#iw-root .iw-nav,section#iw-root .iw-actions>.iw-btn{display:none!important}
        section#iw-root .iw-burger{display:flex!important}
        section#iw-root .iw-logo-img{height:36px!important}
        }
        @media (prefers-reduced-motion:reduce){
        section#iw-root#iw-root *,section#iw-root#iw-root *::before,section#iw-root#iw-root *::after{transition-duration:.01ms!important;animation:none!important}
        }
    </style>

    <section class="iw-root iw-header" id="iw-root" data-theme="dark" role="banner">
        <div class="iw-bar" id="iw-bar">
            <div class="iw-wrap">
                <a class="iw-a" href="<?= esc_url(home_url('/')); ?>"><img class="iw-logo-img" width="136" height="45" src="<?= esc_url($logo); ?>" alt="ITHENA home"></a>
                <div class="iw-nav" id="iw-nav" role="navigation" aria-label="Main"><?= $nav_desktop; ?></div>
                <div class="iw-actions">
                    <button type="button" class="iw-b iw-theme" id="iw-theme" aria-pressed="true" aria-label="Switch to light theme">
                        <span class="iw-thumb">
                            <svg class="iw-i iw-sun" viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="4" stroke="currentColor" stroke-width="1.8"/><path d="M10 1.5v2M10 16.5v2M18.5 10h-2M3.5 10h-2M15.8 4.2l-1.4 1.4M5.6 14.4l-1.4 1.4M15.8 15.8l-1.4-1.4M5.6 5.6L4.2 4.2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            <svg class="iw-i iw-moon" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M17 11.5A7.5 7.5 0 018.5 3 7.5 7.5 0 1017 11.5z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
                        </span>
                    </button>
                    <a href="<?= esc_url($a['cta_url']); ?>" class="iw-a iw-btn"><?= esc_html($a['cta_text']); ?> <?= ihd_arrow(); ?></a>
                    <button type="button" class="iw-b iw-icon-btn iw-burger" id="iw-open" aria-label="Open menu" aria-controls="iw-panel" aria-expanded="false"><?= ihd_svg('M4 7h16M4 12h16M4 17h16'); ?></button>
                </div>
            </div>
        </div>

        <div class="iw-scrim" id="iw-scrim"></div>

        <div class="iw-panel" id="iw-panel" role="navigation" aria-label="Menu">
            <div class="iw-mtop">
                <a class="iw-a" href="<?= esc_url(home_url('/')); ?>"><img class="iw-logo-img" width="136" height="45" src="<?= esc_url($logo); ?>" alt="ITHENA home"></a>
                <button type="button" class="iw-b iw-icon-btn" id="iw-close" aria-label="Close menu"><?= ihd_svg('M6 6l12 12M18 6L6 18'); ?></button>
            </div>
            <?= $nav_mobile; ?>
            <a href="<?= esc_url($a['cta_url']); ?>" class="iw-a iw-btn iw-mcta"<?= ihd_st($mobile->count); ?>><?= esc_html($a['cta_text']); ?></a>
        </div>
    </section>

    <script>
        (function () {
            "use strict";
            var KEY = 'fbb-theme';
            var root = document.querySelector('section#iw-root');
            var themeToggle = document.getElementById('iw-theme');
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
    </script>

    <script>
    (function () {
        var root = document.getElementById('iw-root');
        if (!root) return;
        var bar = root.querySelector('#iw-bar');
        function sync() {
            bar.classList.toggle('is-scrolled', scrollY > 40);
            root.style.setProperty('--iw-header-h', bar.offsetHeight + 'px');
        }
        addEventListener('scroll', sync, { passive: true });
        addEventListener('resize', sync);
        bar.addEventListener('transitionend', sync);
        sync();
        var closeTimer = null;
        var items = root.querySelectorAll('.iw-item');
        function setOpen(item, on) {
            item.classList.toggle('is-open', on);
            item.querySelector('.iw-link').setAttribute('aria-expanded', on ? 'true' : 'false');
        }
        items.forEach(function (item) {
            function open() {
                clearTimeout(closeTimer);
                items.forEach(function (i) { if (i !== item) setOpen(i, false); });
                // desktop: every fresh open starts with all groups collapsed (the mobile panel uses .iw-mi, untouched)
                if (!item.classList.contains('is-open')) item.querySelectorAll('.iw-group').forEach(function (g) { var b = body(g); clearTimeout(b._t); settle(b); setGroup(g, false); });
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
            var openItem = root.querySelector('.iw-item.is-open');
            if (openItem) { setOpen(openItem, false); openItem.querySelector('.iw-link').focus(); }
            closeMobile();
        });
        var mOpen = root.querySelector('#iw-open'), panel = root.querySelector('#iw-panel'), scrim = root.querySelector('#iw-scrim');
        function openMobile() {
            panel.classList.add('is-open'); scrim.classList.add('is-open'); mOpen.setAttribute('aria-expanded', 'true');
            document.documentElement.classList.add('iw-lock');
            root.querySelector('#iw-close').focus();
        }
        function closeMobile() {
            if (!panel.classList.contains('is-open')) return;
            panel.classList.remove('is-open'); scrim.classList.remove('is-open'); mOpen.setAttribute('aria-expanded', 'false');
            document.documentElement.classList.remove('iw-lock');
            mOpen.focus();
        }
        window.matchMedia('(min-width:981px)').addEventListener('change', function (e) { if (e.matches) closeMobile(); });
        mOpen.addEventListener('click', openMobile);
        root.querySelector('#iw-close').addEventListener('click', closeMobile);
        scrim.addEventListener('click', closeMobile);
        panel.querySelectorAll('.iw-a').forEach(function (a) { a.addEventListener('click', closeMobile); });
        panel.querySelectorAll('.iw-mt').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var item = btn.parentElement, on = !item.classList.contains('is-open');
                item.parentElement.querySelectorAll(':scope > .iw-mi.is-open').forEach(function (s) {
                    if (s !== item) { s.classList.remove('is-open'); s.querySelector('.iw-mt').setAttribute('aria-expanded', 'false'); }
                });
                item.classList.toggle('is-open', on);
                btn.setAttribute('aria-expanded', on ? 'true' : 'false');
            });
        });
        var DURATION = 300, reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
        function body(g) { return g.querySelector('.iw-gitems'); }
        function settle(b) { b.classList.remove('is-animating'); b.style.height = b.style.opacity = ''; }
        function setGroup(g, open) {
            g.classList.toggle('is-open', open);
            g.querySelector('.iw-gsum').setAttribute('aria-expanded', open ? 'true' : 'false');
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
        root.querySelectorAll('.iw-group').forEach(function (g) {
            g.querySelector('.iw-gsum').addEventListener('click', function () {
                var wasOpen = g.classList.contains('is-open');
                g.closest('.iw-mega').querySelectorAll('.iw-group.is-open').forEach(function (o) { if (o !== g) animate(o, false); });
                animate(g, !wasOpen);
            });
        });
    })();
    </script>

    <?php
    return ob_get_clean();
}
add_shortcode('new_ith_header', 'ihd_header_shortcode');