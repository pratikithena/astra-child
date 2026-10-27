<?php
/**
 * Site footer shortcode [new_ithena_footer] (from 111-ai-htmls/footer/ithena-footer-v4.html).
 * Links come from the WP menu "footer-menu-v2" (see ith_ftr_nav). CSS/JS printed inline, same reason as the header.
 * Theme follows the header: section#imenu-root[data-theme] / localStorage "fbb-theme" (CSS :has() + footer.js).
 */
if (!defined('ABSPATH')) exit;

/* ---- nav built from "footer-menu-v2" (same tree shape as the header menu) ----
   top-level item with children = section (first one is the wide Solutions row, the rest the trio);
   its children = columns/groups, their children = links. Top-level items without children = "->" links in the first section's heading.
   Wide-row links show the item's subtitle as a tag (iCRM, MES...); the trio's longer subtitles are left out. */
function ith_ftr_arrow() { return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>'; }
function ith_ftr_ico($node) {
    static $d = [
        'solutions'  => 'M12 3l9 5-9 5-9-5zM3 13l9 5 9-5M3 17l9 5 9-5',
        'services'   => 'M14.7 6.3a4 4 0 0 0-5.4 5.4L3 18l3 3 6.3-6.3a4 4 0 0 0 5.4-5.4l-2.5 2.5-2.4-.6-.6-2.4z',
        'industries' => 'M3 20V10l5 3v-3l5 3v-3l5 3v7zM17 10V4h3v6M3 20h18',
        'company'    => 'M4 21V5l8-2v18M12 21h8V9h-8M8 8h1M8 12h1M8 16h1M16 13h1M16 17h1',
    ];
    $k = strtolower(trim($node->t));
    return isset($d[$k]) ? '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="' . $d[$k] . '"/></svg>' : ith_hdr_icon($node);
}
function ith_ftr_ul($leaves, $tags) {
    $o = '<ul class="lk">';
    $flat = [];   // an item that still has children (Services > Transformation > Cloud & integration) lists its children instead
    foreach ($leaves as $l) foreach ($l->c ?: [$l] as $x) $flat[] = $x;
    foreach ($flat as $l) $o .= '<li><a href="' . esc_url($l->u) . '">' . esc_html($l->t) . ($tags && $l->d ? ' <span class="tag">' . esc_html($l->d) . '</span>' : '') . '</a></li>';
    return $o . '</ul>';
}
function ith_ftr_groups($nodes, $tags) {
    $o = '';
    $loose = [];
    foreach ($nodes as $n) {
        if (!$n->c) { $loose[] = $n; continue; }
        $o .= '<div class="grp"><span>' . esc_html($n->t) . '</span>' . ith_ftr_ul($n->c, $tags) . '</div>';
    }
    return ($loose ? '<div class="grp">' . ith_ftr_ul($loose, $tags) . '</div>' : '') . $o;
}
function ith_ftr_sec($node, $wide, $extra = '') {
    $o = '<details class="sec' . ($wide ? ' sol' : '') . '" open><summary><h3>' . ith_ftr_ico($node) . esc_html($node->t) . '</h3>' . $extra .
        '<svg class="chev" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg></summary>';
    if ($wide) {
        $o .= '<div class="row">';
        foreach ($node->c as $c) $o .= $c->c
            ? '<div class="aud"><b>' . esc_html($c->t) . '</b>' . ith_ftr_groups($c->c, true) . '</div>'
            : '<a class="aud" href="' . esc_url($c->u) . '"><b>' . esc_html($c->t) . ith_ftr_arrow() . '</b></a>';   // leaf (showcase page)
        $o .= '</div>';
    } else {
        $o .= '<div>' . ith_ftr_groups($node->c, false) . '</div>';
    }
    return $o . '</details>';
}
function ith_ftr_nav() {
    $tree = ith_hdr_menu_tree('footer-menu-v2');
    $secs = array_values(array_filter($tree, 'ith_hdr_kids'));
    if (!$secs) return '';
    $all = '';
    foreach ($tree as $n) if (!$n->c) $all .= '<a class="all" href="' . esc_url($n->u) . '">' . esc_html($n->t) . ' ' . ith_ftr_arrow() . '</a>';
    $o = '<nav aria-label="Footer">' . ith_ftr_sec($secs[0], true, $all) . '<div class="trio">';
    foreach (array_slice($secs, 1) as $n) $o .= ith_ftr_sec($n, false);
    return $o . '</div></nav>';
}

function ith_footer_shortcode() {
    ob_start(); ?>
<footer id="ithf4" class="ithf4" data-theme="dark" data-ith-footer="<?= ITH_HEADER_VER; ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Sans:wght@500;600;700;800&display=swap">
  <style id="ithf4-css" data-cfasync="false" data-no-optimize="1" data-no-defer="1" nowprocket><?= ith_hdr_asset('footer.css'); ?></style>
  <script data-cfasync="false" data-no-optimize="1" data-no-defer="1" nowprocket>(function (s) { if (s && s.type && s.type !== 'text/css') { var c = document.createElement('style'); c.textContent = s.textContent; s.parentNode.insertBefore(c, s.nextSibling); } })(document.getElementById('ithf4-css'));</script>

  <div class="split">
    <div class="brand">
      <div class="lead">
        <a class="logo" href="<?= esc_url(home_url('/')); ?>"><img src="<?= esc_url(content_url('/uploads/2023/03/Ithena-Logo-new.webp')); ?>" width="136" height="45" alt="ITHENA home" loading="lazy" decoding="async"></a>
        <p style="margin-top:20px">Practical AI and software for equipment builders, plants and enterprises.</p>
      </div>
      <div class="soc">
        <a href="https://www.linkedin.com/company/ithenaus" target="_blank" rel="noopener" aria-label="LinkedIn"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9.5h4V21H3zM9.5 9.5h3.8v1.6h.1c.5-1 1.8-2 3.8-2 4 0 4.8 2.6 4.8 6V21h-4v-5.1c0-1.2 0-2.8-1.7-2.8s-2 1.3-2 2.7V21h-4z"/></svg></a>
        <a href="https://www.youtube.com/@ithena1" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M23 7.2a3 3 0 0 0-2.1-2.1C19 4.6 12 4.6 12 4.6s-7 0-8.9.5A3 3 0 0 0 1 7.2 31 31 0 0 0 .5 12 31 31 0 0 0 1 16.8a3 3 0 0 0 2.1 2.1c1.9.5 8.9.5 8.9.5s7 0 8.9-.5a3 3 0 0 0 2.1-2.1 31 31 0 0 0 .5-4.8 31 31 0 0 0-.5-4.8zM9.7 15.1V8.9l5.8 3.1z"/></svg></a>
        <a href="https://www.facebook.com/people/ITHENA/100064033092851/" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 21v-7.5H16l.4-3h-2.9V8.6c0-.9.3-1.5 1.5-1.5h1.6V4.4c-.3 0-1.2-.1-2.3-.1-2.3 0-3.8 1.4-3.8 3.9v2.3H8v3h2.5V21z"/></svg></a>
        <a href="https://x.com/ITHENA1" target="_blank" rel="noopener" aria-label="X"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17.8 3h3.1l-6.8 7.8L22 21h-6.2l-4.9-6.4L5.3 21H2.2l7.3-8.3L2 3h6.3l4.4 5.8zm-1.1 16.2h1.7L7.4 4.7H5.6z"/></svg></a>
      </div>
      <div class="reach"><a class="mail" href="mailto:request@ithena.ai"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg>request@ithena.ai</a><a class="btn" href="/contact-us/">Contact us <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div>
      <div class="office"><b>United States</b><address>4470 Cox Rd, #275<br>Glen Allen, VA 23060, USA</address></div>
      <div class="office"><b>India</b><address>6th Floor, Amar Madhuban Tech Park<br>Pune, Maharashtra 411045</address></div>
    </div>

    <div class="main">
      <?= ith_ftr_nav(); ?>

    </div>
  </div>
  <div class="strip"><a href="/privacy-policy/">Privacy policy</a><span>&copy; <?= esc_html(wp_date('Y')); ?> ITHENA. All rights reserved.</span></div>

  <script data-cfasync="false" data-no-optimize="1" data-no-defer="1" nowprocket><?= ith_hdr_asset('footer.js'); ?></script>
</footer>
    <?php
    return ob_get_clean();
}
add_action('init', function () { add_shortcode('new_ithena_footer', 'ith_footer_shortcode'); }, 20);
