<?php
/*
Template Name: Partner (Gutenberg)
Template Post Type: page
*/

if (!defined('ABSPATH')) exit;

// One template for every partner page; each page's content is plain Gutenberg blocks.
// Every top-level block is a full-width section. The block styles (registered in functions.php) give the look:
//   Cover "Partner hero"   full-bleed dark hero: Image (partner logo) + Eyebrow + H1 + paragraph + Buttons
//   Group "Tinted section" section on the tinted background (any other top-level block sits on the page background)
//   Group "Partner about"  dark band: Image (white partner logo) + paragraph
//   Columns "Icon cards"   flat hairline grid; give a Column the class ic-<name> for an icon (list: ith_pv_icons())
//   Media & Text           product block: image beside Eyebrow, H2, text, Checklist, Buttons
//   Media & Text "CTA split" full-width closing band: copy left, video right (the video autoplays muted on a loop)
// Headings follow the theme (light/dark); the hero and Partner about stay dark in both.

add_filter('astra_get_content_layout', function () { return 'page-builder'; });
add_filter('astra_page_layout', function () { return 'no-sidebar'; });

get_header();
?>
<style>.site-content .ast-container{display:block!important}</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Noto+Sans:wght@400;600;700&display=swap">
<style>
section#main-section.pv{--blue:#0083C8;--blue-d:#006AA3;--bg:#FFFFFF;--srf:#F4F8FB;--card:#FFFFFF;--ink:#0A192D;--ink2:#46586A;--line:rgba(10,25,45,.10);--line2:rgba(10,25,45,.26);--chip:rgba(0,131,200,.09);--shi:drop-shadow(0 28px 34px rgba(0,45,80,.22)) drop-shadow(0 6px 10px rgba(0,45,80,.10));--sh:0 24px 48px -30px rgba(0,45,80,.35);--ez:cubic-bezier(.2,0,0,1);--ff:Inter,system-ui,-apple-system,"Segoe UI",Roboto,sans-serif;--fh:"Noto Sans",system-ui,-apple-system,"Segoe UI",Roboto,sans-serif;--wrap:min(1200px,calc(100% - 2*clamp(16px,4vw,64px)));--pad:clamp(64px,8vw,112px);color-scheme:light;display:block;margin:0;font-family:var(--ff);font-size:16px;line-height:1.65;color:var(--ink2);background:var(--bg);-webkit-font-smoothing:antialiased;overflow-x:clip}
section#main-section.pv[data-theme="dark"]{--blue:#39A8DE;--blue-d:#6FC6EE;--bg:#0A0A0B;--srf:#111113;--card:#17181B;--ink:#F2F3F5;--ink2:rgba(228,230,235,.8);--line:rgba(255,255,255,.09);--line2:rgba(255,255,255,.16);--chip:rgba(57,168,222,.14);--shi:drop-shadow(0 28px 40px rgba(0,0,0,.75)) drop-shadow(0 0 28px rgba(57,168,222,.16));--sh:0 24px 48px -30px rgba(0,0,0,.85);color-scheme:dark}
.pv *,.pv *::before,.pv *::after{box-sizing:border-box}
.pv :where(h1,h2,h3,h4,p,ul,ol,figure){margin:0;padding:0}
.pv :where(img){display:block;max-width:100%;height:auto}
.pv :is(h1,h2,h3,h4){font-family:var(--fh)!important;font-weight:700!important;letter-spacing:-.02em;line-height:1.15;color:var(--ink)!important;text-wrap:balance}
.pv h1{font-size:clamp(34px,4.6vw,50px)}
.pv h2{font-size:clamp(28px,3.4vw,40px)}
.pv h3{font-size:20px;line-height:1.3}
.pv h4{font-size:18px;line-height:1.35}
.pv :is(h1,h2) em{font-style:normal;color:#0083C8}
.pv[data-theme="dark"] :is(h1,h2) em{color:var(--blue)}
.pv a{color:var(--blue);text-decoration:none}
.pv strong{color:var(--ink)}
.pv :focus-visible{outline:2px solid var(--blue);outline-offset:3px;border-radius:6px}

/* sections and vertical rhythm */
.pv-sec{padding:var(--pad) 0;background:var(--bg)}
.pv-sec.tint{background:radial-gradient(60% 70% at 100% 0%,rgba(0,131,200,.07),transparent 70%),var(--srf)}
.pv-sec+.pv-sec:not(.tint){border-top:1px solid var(--line)}
.pv .wrap{width:var(--wrap);margin:0 auto}
.pv :is(.wrap,.wp-block-group,.wp-block-group__inner-container,.wp-block-column,.wp-block-media-text__content,.wp-block-cover__inner-container)>*+*{margin-top:16px}
.pv :is(.wrap,.wp-block-group,.wp-block-group__inner-container,.wp-block-cover__inner-container)>*+:is(.wp-block-columns,.wp-block-media-text,.wp-block-group){margin-top:clamp(36px,4vw,56px)}
.pv :is(.wrap,.wp-block-group,.wp-block-group__inner-container)>.wp-block-media-text+.wp-block-media-text{margin-top:clamp(56px,7vw,96px)}
.pv .is-layout-constrained>*{margin-left:0!important;margin-right:0!important}
.pv .is-layout-constrained>.has-text-align-center{margin-left:auto!important;margin-right:auto!important}
.pv .is-style-eyebrow{display:flex;align-items:center;gap:10px;font-family:var(--fh);font-size:12px!important;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--blue)!important}
.pv .is-style-eyebrow::before{content:"";width:22px;height:2px;border-radius:2px;background:linear-gradient(90deg,#0083C8,#4FE0D0);flex:none}
.pv .is-style-eyebrow.has-text-align-center{justify-content:center}
.pv .is-style-eyebrow+:is(h1,h2){margin-top:12px}
.pv .is-style-lede{font-size:18px;line-height:1.6;max-width:68ch}
.pv .has-text-align-center.is-style-lede,.pv .has-text-align-center{margin-left:auto;margin-right:auto}
.pv p.has-text-align-center{max-width:72ch}
.pv h2.has-text-align-center{max-width:30ch}

/* lists */
.pv :is(ul,ol).wp-block-list{padding-left:1.2em}
.pv .wp-block-list li+li{margin-top:8px}
.pv .wp-block-list li::marker{color:var(--blue)}
.pv .is-style-checklist{list-style:none;padding:0!important;display:grid;gap:12px}
.pv .is-style-checklist li{position:relative;padding-left:34px;margin:0!important}
.pv .is-style-checklist li::before{content:"";position:absolute;left:0;top:2px;width:22px;height:22px;border-radius:50%;background:var(--chip)}
.pv .is-style-checklist li::after{content:"";position:absolute;left:8px;top:7px;width:6px;height:10px;border:solid var(--blue);border-width:0 2px 2px 0;transform:rotate(45deg)}
.pv .is-style-checklist ul{margin-top:10px;padding-left:0;list-style:none}
.pv .is-style-checklist ul li{padding-left:18px}
.pv .is-style-checklist ul li::before{width:6px;height:6px;top:10px;background:var(--blue)}
.pv .is-style-checklist ul li::after{content:none}

/* buttons */
.pv .wp-block-buttons{display:flex;flex-wrap:wrap;gap:12px}
.pv .wp-block-buttons.is-content-justification-center{justify-content:center}
.pv .wp-block-button__link{display:inline-flex;align-items:center;gap:8px;min-height:48px;padding:0 24px;border-radius:999px;background:#0083C8;color:#fff!important;font-size:15px;font-weight:600;border:1px solid transparent;transition:background-color .2s var(--ez),transform .2s var(--ez)}
.pv .wp-block-button__link:hover{background:#006AA3;transform:translateY(-1px)}
.pv .wp-block-button__link::after{content:"\2192";font-size:16px;transition:transform .2s var(--ez)}
.pv .wp-block-button__link:hover::after{transform:translateX(3px)}
.pv .is-style-outline .wp-block-button__link{background:transparent;color:var(--ink)!important;border-color:var(--line2)}
.pv .is-style-outline .wp-block-button__link:hover{background:var(--chip)}
.pv .is-style-outline .wp-block-button__link::after{content:none}

/* hero (Cover "Partner hero") */
.pv .is-style-partner-hero{position:relative;display:flex;align-items:center;min-height:clamp(560px,78vh,760px);padding:clamp(140px,14vw,180px) 0 clamp(72px,8vw,112px);overflow:hidden;background:#04101F;color:rgba(255,255,255,.82)}
.pv .is-style-partner-hero .wp-block-cover__image-background{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;max-width:none}
.pv .is-style-partner-hero .wp-block-cover__background{position:absolute;inset:0;z-index:1;opacity:1!important;background:linear-gradient(90deg,rgba(4,16,31,.94) 0%,rgba(4,16,31,.82) 42%,rgba(4,16,31,.35) 100%),linear-gradient(0deg,rgba(4,16,31,.7),transparent 45%)!important}
.pv .is-style-partner-hero::after{content:"";position:absolute;inset:0;z-index:1;pointer-events:none;background:linear-gradient(rgba(255,255,255,.035) 1px,transparent 1px) 0 0/56px 56px,linear-gradient(90deg,rgba(255,255,255,.035) 1px,transparent 1px) 0 0/56px 56px;-webkit-mask:linear-gradient(90deg,#000,transparent 70%);mask:linear-gradient(90deg,#000,transparent 70%)}
.pv .is-style-partner-hero .wp-block-cover__inner-container{position:relative;z-index:2;width:var(--wrap);margin:0 auto;max-width:none}
.pv .is-style-partner-hero .wp-block-cover__inner-container>*{max-width:720px}
.pv .is-style-partner-hero h1{color:#fff!important}
.pv .is-style-partner-hero h1 em{color:#4FC3F7}
.pv .is-style-partner-hero p{font-size:18px;color:rgba(255,255,255,.8)}
.pv .is-style-partner-hero .is-style-eyebrow{color:#4FE0D0!important}
.pv .is-style-partner-hero .wp-block-image img{max-height:72px;width:auto}
.pv .is-style-partner-hero .wp-block-image{margin-bottom:28px}
.pv .is-style-partner-hero .wp-block-buttons{margin-top:32px}
.pv .is-style-partner-hero .is-style-outline .wp-block-button__link{color:#fff!important;border-color:rgba(255,255,255,.35)}
.pv .is-style-partner-hero .is-style-outline .wp-block-button__link:hover{background:rgba(255,255,255,.1)}

/* icon cards (Columns "Icon cards"): flat, hairline-framed, brand gradient fades in from the top-left on hover */
.pv .is-style-icon-cards{display:grid!important;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:0}
.pv .is-style-icon-cards>.wp-block-column{position:relative;margin:0!important;padding:28px;background:linear-gradient(135deg,rgba(0,131,200,.18),rgba(0,131,200,.04) 45%,transparent 75%) no-repeat 0 0/0 0;transition:background-size .45s var(--ez)}
/* ponytail: a wrapped row starts with a divider at the grid edge; per-count columns if that bothers */
.pv .is-style-icon-cards>.wp-block-column+.wp-block-column::before{content:"";position:absolute;left:0;top:14%;bottom:14%;width:1px;background:linear-gradient(transparent,var(--line2) 30%,var(--line2) 70%,transparent)}
.pv .is-style-icon-cards>.wp-block-column:is(:hover,:focus-within){background-size:100% 100%}
.pv .is-style-icon-cards>.wp-block-column>*+*{margin-top:10px}
.pv .is-style-icon-cards p{font-size:15px}
.pv .is-style-icon-cards p:has(>a:only-child) a{font-weight:600;font-size:14px}
.pv .is-style-icon-cards p:has(>a:only-child) a::after{content:" \2192"}
.pv .is-style-icon-cards p:has(>a:only-child) a::before{content:"";position:absolute;inset:0}
.pv .wp-block-column[class*=" ic-"]>:first-child{margin-top:48px!important}
.pv .wp-block-column[class*=" ic-"]::after{content:"";position:absolute;top:28px;left:28px;width:28px;height:28px;background:var(--blue);-webkit-mask:var(--ic) center/contain no-repeat;mask:var(--ic) center/contain no-repeat}
<?php echo ith_pv_icon_css('.pv '); ?>

/* product blocks (Media & Text) */
.pv .wp-block-media-text{display:grid!important;grid-template-columns:minmax(0,1fr) minmax(0,1fr)!important;gap:clamp(32px,5vw,72px);align-items:center}
.pv .wp-block-media-text.has-media-on-the-right .wp-block-media-text__media{order:2}
.pv .wp-block-media-text__content{padding:0!important}
.pv .wp-block-media-text__media img{width:100%;height:auto;filter:var(--shi)}
.pv .wp-block-media-text__content h2{font-size:clamp(26px,2.6vw,32px)}
.pv .wp-block-media-text__content>.wp-block-buttons{margin-top:28px}
.pv .wp-block-media-text__content .wp-block-image img{max-height:44px;width:auto}

/* closing band (Media & Text "CTA split", full width: copy left, video right) and partner card (Group "Partner about") */
.pv .wp-block-media-text.is-style-cta-split{gap:0;align-items:stretch;min-height:clamp(520px,46vw,680px);background:radial-gradient(80% 100% at 0% 0%,rgba(255,255,255,.16),transparent 60%),linear-gradient(135deg,#0083C8 0%,#006AA3 55%,#004E7A 100%);color:rgba(255,255,255,.86)}
.pv .is-style-cta-split h2{color:#fff!important}
.pv .is-style-cta-split h2 em,.pv .is-style-cta-split .is-style-eyebrow{color:#BFE5F8!important}
.pv .is-style-cta-split .is-style-eyebrow::before{background:#BFE5F8}
.pv .is-style-cta-split p{color:rgba(255,255,255,.86)}
.pv .is-style-cta-split .wp-block-button__link{background:#fff;color:#0067A0!important}
.pv .is-style-cta-split .wp-block-button__link:hover{background:#EAF6FD}
.pv .is-style-cta-split .is-style-outline .wp-block-button__link{background:transparent;color:#fff!important;border-color:rgba(255,255,255,.5)}
.pv .is-style-cta-split .is-style-outline .wp-block-button__link:hover{background:rgba(255,255,255,.12)}
.pv .is-style-cta-split .wp-block-media-text__content{display:flex;flex-direction:column;justify-content:center;padding:var(--pad) clamp(28px,6vw,96px)!important}
.pv .is-style-cta-split h2 em{display:block}
.pv .is-style-cta-split .wp-block-media-text__media{position:relative;align-self:stretch;min-height:320px;overflow:hidden;background:#004E7A}
.pv .is-style-cta-split .wp-block-media-text__media :is(video,img){position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.pv .is-style-partner-about{display:grid!important;grid-template-columns:minmax(140px,220px) 1fr;gap:clamp(24px,4vw,56px);align-items:center;padding:clamp(28px,4vw,44px)!important;background:linear-gradient(135deg,#0B1A2C,#04101F);color:rgba(255,255,255,.78)}
.pv .is-style-partner-about>*{margin:0!important}
.pv .is-style-partner-about>.wp-block-group__inner-container{display:contents}
.pv .is-style-partner-about .wp-block-image img{max-height:80px;width:auto}
.pv .is-style-partner-about :is(h2,h3,h4){color:#fff!important}
.pv .is-style-partner-about strong{color:#fff}

/* CTA buttons: Button block class ith-cta-btn (Advanced > Additional CSS class), red in every section and theme */
.pv .ith-cta-btn .wp-block-button__link{background:#C00000;color:#fff!important;border-color:transparent}
.pv .ith-cta-btn .wp-block-button__link:hover{background:#A00000}
/* hero + closing band buttons: ith-btn-brand (brand blue) and ith-btn-inverse (white, blue text) */
.pv .ith-btn-brand .wp-block-button__link{background:#0083C8;color:#fff!important;border-color:transparent}
.pv .ith-btn-brand .wp-block-button__link:hover{background:#006AA3}
.pv .is-style-cta-split .ith-btn-brand .wp-block-button__link{box-shadow:inset 0 0 0 1px rgba(255,255,255,.55)}
.pv .ith-btn-inverse .wp-block-button__link{background:#fff;color:#0083C8!important;border-color:transparent}
.pv .ith-btn-inverse .wp-block-button__link:hover{background:#EAF6FD}
/* a card's leading Eyebrow sits on the icon line as its title (no dash; same 12px text, same 28px icon) */
.pv .wp-block-column[class*=" ic-"]>.is-style-eyebrow:first-child{margin-top:0!important;min-height:28px;padding-left:40px;line-height:1.3}
.pv .wp-block-column[class*=" ic-"]>.is-style-eyebrow:first-child::before{content:none}
.pv .wp-block-column[class*=" ic-"]>.is-style-eyebrow:first-child+*{margin-top:18px}
@media (max-width:860px){
  .pv .wp-block-media-text{grid-template-columns:minmax(0,1fr)!important}
  .pv .wp-block-media-text .wp-block-media-text__media{order:0!important}
  .pv .is-style-cta-split .wp-block-media-text__media{order:2!important;aspect-ratio:16/10;min-height:0}
  .pv .is-style-partner-about{grid-template-columns:minmax(0,1fr)}
  .pv .is-style-partner-hero .wp-block-cover__background{background:linear-gradient(0deg,rgba(4,16,31,.95) 20%,rgba(4,16,31,.7))!important}
}
@media (max-width:520px){
  .pv .is-style-icon-cards>.wp-block-column+.wp-block-column::before{top:0;bottom:auto;left:10%;right:10%;width:auto;height:1px;background:linear-gradient(90deg,transparent,var(--line2) 30%,var(--line2) 70%,transparent)}
}
@media (prefers-reduced-motion:reduce){.pv *{transition:none!important}}
</style>
<section id="main-section" class="pv" data-theme="light">
<?php
foreach (parse_blocks(get_post()->post_content) as $b) {
    if (!$b['blockName'] && trim($b['innerHTML']) === '') continue;
    $cls = isset($b['attrs']['className']) ? $b['attrs']['className'] : '';
    $html = wp_filter_content_tags(do_shortcode(render_block($b)));
    if (strpos($cls, 'is-style-partner-hero') !== false) { echo $html; continue; }
    if (strpos($cls, 'is-style-cta-split') !== false) { echo str_replace('<video controls', '<video muted loop playsinline autoplay preload="metadata" aria-hidden="true"', $html); continue; }
    echo '<div class="pv-sec' . (strpos($cls, 'is-style-tinted') !== false ? ' tint' : '') . '"><div class="wrap">' . $html . '</div></div>';
}
?>
</section>
<script>
(function(){var R=document.getElementById("main-section");function saved(){try{return localStorage.getItem("fbb-theme")||localStorage.getItem("ithena-theme")}catch(e){return null}}
if(window.ithenaTheme){if(!saved())window.ithenaTheme.apply(false);else window.ithenaTheme.sync();return}
R.setAttribute("data-theme",saved()==="dark"?"dark":"light")})();
</script>
<?php get_footer(); ?>
