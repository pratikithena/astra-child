<?php
/**
 * Plugin Name: ITH Header
 * Description: Site header shortcode [new_ithena_header], built from the WP menu "new-ithena-menu" (ACF menu_subtitle / menu_icon per item).
 * Version: 1.0.2
 * Author: ITHENA
 */
if (!defined('ABSPATH')) exit;

define('ITH_HEADER_VER', '1.0.2');

/* assets are printed inline (optimizers delay external/inline CSS; header must paint styled) */
function ith_hdr_asset($f) {
    static $c = [];
    if (!isset($c[$f])) $c[$f] = (string) file_get_contents(__DIR__ . '/assets/' . $f);
    return $c[$f];
}

function ith_hdr_url($u) {
    $u = trim((string) $u);
    return $u !== '' && esc_url($u) !== '' ? $u : '#';
}


/* ---- builders (same markup as the sample's JS builders) ---- */
function ith_hdr_svg($d, $cls = '') {
    return '<svg class="imenu-i' . ($cls ? ' ' . $cls : '') . '" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="' . $d . '"/></svg>';
}
function ith_hdr_icon($node, $cls = '') {
    return $node->icon ? '<img class="imenu-i imenu-ico' . ($cls ? ' ' . $cls : '') . '" src="' . esc_url($node->icon) . '" width="18" height="18" alt="" aria-hidden="true">' : '';
}
function ith_hdr_chev() { return ith_hdr_svg('M6 9l6 6 6-6', 'imenu-ch'); }
function ith_hdr_arrow($cls = '') { return ith_hdr_svg('M5 12h14M13 6l6 6-6 6', $cls); }
function ith_hdr_kids($x) { return !empty($x->c); }
function ith_hdr_is_cards($node) { return !array_filter($node->c, 'ith_hdr_kids'); }
function ith_hdr_sub($cls, $d) { return $d ? '<span class="' . $cls . '">' . esc_html($d) . '</span>' : ''; }
function ith_hdr_st($i) { return ' style="--i:' . (int) $i . '"'; }   // stagger index for the entry animation

function ith_hdr_it($leaf, $i) {
    return '<a href="' . esc_url($leaf->u) . '" class="imenu-a imenu-it"' . ith_hdr_st($i) . '><span class="imenu-it-t">' . esc_html($leaf->t) . '</span>' . ith_hdr_sub('imenu-it-d', $leaf->d) . ith_hdr_arrow('imenu-go') . '</a>';
}
function ith_hdr_col($c, $ci) {
    $body = '';
    if (ith_hdr_is_cards($c)) {
        $body = '<div class="imenu-gitems">';
        foreach ($c->c as $i => $l) $body .= ith_hdr_it($l, $i + 1);
        $body .= '</div>';
    } else {
        foreach ($c->c as $gi => $g) {
            $body .= '<div class="imenu-group"' . ith_hdr_st($gi + 1) . '><button type="button" class="imenu-b imenu-gsum" aria-expanded="false">' . esc_html($g->t) . ith_hdr_chev() . '</button><div class="imenu-gitems">';
            foreach ($g->c as $i => $l) $body .= ith_hdr_it($l, $i);
            $body .= '</div></div>';
        }
    }
    $title = esc_html($c->t);
    if ($c->u !== '#') $title = '<a class="imenu-a" href="' . esc_url($c->u) . '">' . $title . '</a>';
    return '<div class="imenu-col" style="--c:' . (int) $ci . '"><div class="imenu-col-head">' . ith_hdr_icon($c) . '<div><span class="imenu-col-t">' . $title . '</span>' . ith_hdr_sub('imenu-col-d', $c->d) . '</div></div>' . $body . '</div>';
}
function ith_hdr_desktop($node) {
    if (!ith_hdr_kids($node)) return '<a class="imenu-a imenu-link" href="' . esc_url($node->u) . '">' . ith_hdr_icon($node) . esc_html($node->t) . '</a>';
    $inner = '';
    if (ith_hdr_is_cards($node)) {
        $inner = '<div class="imenu-cards">';
        foreach ($node->c as $i => $c) {
            $inner .= '<div class="imenu-card"' . ith_hdr_st($i) . '><span class="imenu-card-t">' . esc_html($c->t) . '</span>' . ith_hdr_sub('imenu-card-d', $c->d) .
                '<a href="' . esc_url($c->u) . '" class="imenu-a imenu-explore">Explore ' . ith_hdr_arrow() . '</a></div>';
        }
        $inner .= '</div>';
    } else {
        foreach (array_chunk($node->c, 4) as $r => $row) {   // 2-4 columns share the full panel width; 5+ wrap to a new row
            $inner .= '<div class="imenu-cols' . ($r ? ' imenu-row2' : '') . '" style="--n:' . count($row) . '">';
            foreach ($row as $ci => $c) $inner .= ith_hdr_col($c, $ci);
            $inner .= '</div>';
        }
    }
    return '<div class="imenu-item"><a class="imenu-a imenu-link" href="' . esc_url($node->u) . '" aria-haspopup="true" aria-expanded="false">' . ith_hdr_icon($node) . esc_html($node->t) . ith_hdr_chev() . '</a>' .
        '<div class="imenu-mega"><div class="imenu-mega-in">' . $inner . '</div></div></div>';
}
function ith_hdr_mlink($leaf, $rich, $i) {
    return '<a class="imenu-a imenu-ml" href="' . esc_url($leaf->u) . '"' . ith_hdr_st($i) . '>' .
        ($rich ? '<span class="imenu-ml-text"><span>' . esc_html($leaf->t) . '</span>' . ith_hdr_sub('imenu-ml-d', $leaf->d) . '</span>' : esc_html($leaf->t)) . '</a>';
}
function ith_hdr_mitem($cls, $btn_cls, $label, $body, $i) {
    static $uid = 0;
    $id = 'imenu-m-' . (++$uid);
    return '<div class="' . $cls . '"' . ith_hdr_st($i) . '><button type="button" class="imenu-b ' . $btn_cls . '" aria-expanded="false" aria-controls="' . $id . '">' . $label . ith_hdr_chev() . '</button><div class="imenu-sub" id="' . $id . '">' . $body . '</div></div>';
}
function ith_hdr_mobile($node, $k) {
    if (!ith_hdr_kids($node)) return '<a class="imenu-a imenu-mflat" href="' . esc_url($node->u) . '"' . ith_hdr_st($k) . '>' . esc_html($node->t) . '</a>';
    $body = '';
    if (ith_hdr_is_cards($node)) {
        foreach ($node->c as $i => $c) $body .= ith_hdr_mlink($c, false, $i);
    } else {
        foreach ($node->c as $ci => $c) {
            $inner = '';
            if (ith_hdr_is_cards($c)) {
                foreach ($c->c as $i => $l) $inner .= ith_hdr_mlink($l, true, $i);
            } else {
                foreach ($c->c as $gi => $g) {
                    $links = '';
                    foreach ($g->c as $i => $l) $links .= ith_hdr_mlink($l, true, $i);
                    $inner .= ith_hdr_mitem('imenu-mi imenu-mi-nested', 'imenu-mt imenu-mt-sub', '<span class="imenu-mt-l">' . esc_html($g->t) . '</span>', $links, $gi);
                }
            }
            $body .= ith_hdr_mitem('imenu-mi imenu-mi-nested', 'imenu-mt imenu-mt-sub imenu-mt-sub1', '<span class="imenu-mt-l">' . esc_html($c->t) . ith_hdr_sub('imenu-mt-tag', $c->d) . '</span>', $inner, $ci);
        }
    }
    return ith_hdr_mitem('imenu-mi', 'imenu-mt', esc_html($node->t), $body, $k);
}


/* "new-ithena-menu" items -> tree of {t,d,u,c}; children whose parent is missing are dropped */
function ith_hdr_menu_tree() {
    $menu = wp_get_nav_menu_object('new-ithena-menu');
    $items = $menu ? wp_get_nav_menu_items($menu->term_id) : [];
    if (!$items) return [];
    $acf = function_exists('get_field');
    $refs = [];
    $tree = [];
    foreach ($items as $it) {
        $icon = $acf ? get_field('menu_icon', $it) : '';
        if (is_array($icon)) $icon = $icon['url'] ?? '';
        elseif (is_numeric($icon)) $icon = wp_get_attachment_url((int) $icon);
        $refs[$it->ID] = (object) [
            't'    => $it->title,
            'd'    => trim((string) (($acf ? get_field('menu_subtitle', $it) : '') ?: $it->description)),
            'u'    => ith_hdr_url($it->url),
            'icon' => preg_match('#^(https?:)?//|^/#', (string) $icon) ? (string) $icon : '',
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

function ith_header_shortcode() {
    $tree = ith_hdr_menu_tree();
    if (!$tree) return '';
    ob_start(); ?>
        <style id="imenu-css" data-cfasync="false" data-no-optimize="1" data-no-defer="1" nowprocket><?= ith_hdr_asset('header.css'); ?></style>
        <script data-cfasync="false" data-no-optimize="1" data-no-defer="1" nowprocket>/* optimizers (Airlift etc.) retype inline <style> until first interaction - re-activate ours now */(function (s) { if (s && s.type && s.type !== 'text/css') { var c = document.createElement('style'); c.textContent = s.textContent; s.parentNode.insertBefore(c, s.nextSibling); } })(document.getElementById('imenu-css'));</script>

        <noscript><style>section#imenu-root{opacity:1!important;visibility:visible!important}</style></noscript>
        <section class="imenu-root imenu-header" id="imenu-root" data-ith-header="<?= ITH_HEADER_VER; ?>" data-theme="dark" role="banner" style="opacity:0;visibility:hidden">
            <div class="imenu-bar" id="imenu-bar">
                <div class="imenu-wrap">
                    <a class="imenu-a" href="<?= esc_url(home_url('/')); ?>"><img class="imenu-logo-img" width="136" height="45" 
                        src="<?= esc_url(content_url('/uploads/2023/03/Ithena-Logo-new.webp')); ?>" alt="ITHENA home"></a>
                    <div class="imenu-nav" id="imenu-nav" role="navigation" aria-label="Main"><?php foreach ($tree as $node) echo ith_hdr_desktop($node); ?></div>
                    <div class="imenu-actions">
                        <button type="button" class="imenu-b imenu-theme" id="imenu-theme" aria-pressed="true" aria-label="Switch to light theme">
                            <span class="imenu-thumb">
                                <svg class="imenu-i imenu-sun" width="12" height="12" viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="4" stroke="currentColor" stroke-width="1.8"/><path d="M10 1.5v2M10 16.5v2M18.5 10h-2M3.5 10h-2M15.8 4.2l-1.4 1.4M5.6 14.4l-1.4 1.4M15.8 15.8l-1.4-1.4M5.6 5.6L4.2 4.2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                                <svg class="imenu-i imenu-moon" width="12" height="12" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M17 11.5A7.5 7.5 0 018.5 3 7.5 7.5 0 1017 11.5z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
                            </span>
                        </button>
                        <a href="/contact-us/" class="imenu-a imenu-btn">Contact Us <svg class="imenu-i" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
                        <button type="button" class="imenu-b imenu-icon-btn imenu-burger" id="imenu-open" aria-label="Open menu" aria-controls="imenu-panel" aria-expanded="false"><svg class="imenu-i" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg></button>
                    </div>
                </div>
            </div>

            <div class="imenu-scrim" id="imenu-scrim"></div>

            <div class="imenu-panel" id="imenu-panel" role="navigation" aria-label="Menu">
                <div class="imenu-mtop">
                    <a class="imenu-a" href="<?= esc_url(home_url('/')); ?>"><img class="imenu-logo-img" width="136" height="45" src="<?= esc_url(content_url('/uploads/2023/03/Ithena-Logo-new.webp')); ?>" alt="ITHENA home"></a>
                    <button type="button" class="imenu-b imenu-icon-btn" id="imenu-close" aria-label="Close menu"><svg class="imenu-i" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg></button>
                </div>
                <?php foreach ($tree as $k => $node) echo ith_hdr_mobile($node, $k); ?>
                <a href="/contact-us/" class="imenu-a imenu-btn imenu-mcta"<?= ith_hdr_st(count($tree)); ?>>Contact Us</a>
            </div>
        </section>
        <script data-cfasync="false" data-no-optimize="1" data-no-defer="1" nowprocket><?= ith_hdr_asset('header.js'); ?></script>
    <?php
    return ob_get_clean();
}
/* priority 20: replaces any theme-registered [new_ithena_header] */
add_action('init', function () { add_shortcode('new_ithena_header', 'ith_header_shortcode'); }, 20);
