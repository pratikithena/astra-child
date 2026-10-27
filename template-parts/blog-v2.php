<?php
/*
Template Name: Blog v2 (Gutenberg or ACF, default header/footer)
Template Post Type: page, post, blog-post
*/

if (!defined('ABSPATH')) exit;

// Sample content (from 111-ai-htmls/ithena-singleblog-v2.html) shown for any empty field.
// Keep in sync with the default_value entries in blog-v2-acf.json.
// Assigned via $GLOBALS: WP includes templates inside load_template(), so a plain $var would be local.
$GLOBALS['bl_sample'] = array(
    'blog_name' => 'In the press',
    'blog_sub_heading' => 'A second consecutive feature, and a closer look at how Aether closes the distance between enterprise data, the decision it should inform, and the action that follows.',
    'blog_heading_banner_image' => array('url' => 'https://dev-website.ithena.app/wp-content/uploads/2026/07/ent-wrld-aether-blog-bannerv2.webp', 'alt' => ''),
    'blog_author' => 'ITHENA',
    'blog_source' => 'The Enterprise World',
    'faq_eyebrow' => 'FAQ',
    'faq_heading' => 'Questions people ask about Aether',
    'faq_lede' => 'Short answers to the questions that come up most often about the platform and the feature.',
    'faq_q_1' => 'What is Aether?',
    'faq_a_1' => 'Aether is ITHENA’s Agentic AI-powered advanced analytics platform. It combines Enterprise AI, Generative AI, Agentic AI and Intelligent Automation in one platform, so teams can move from a question to a decision, and from a decision to an action, without crossing a tool boundary.',
    'faq_q_2' => 'How is Aether different from a traditional BI dashboard?',
    'faq_a_2' => 'A traditional dashboard is built to describe what happened and stops there. Aether interprets the data, recommends what to do next, and can initiate the workflow, notification or operational action itself.',
    'faq_q_3' => 'Can you ask Aether questions in plain English?',
    'faq_a_3' => 'Yes. Questions asked in natural language return instant, contextual answers drawn from enterprise data - no query language, no report request and no queue - and where the answer implies an action, Aether can trigger it.',
    'faq_q_4' => 'Which industries is Aether built for?',
    'faq_a_4' => 'Aether is designed for data-intensive, time-sensitive operations, including manufacturing, supply chain, healthcare and finance.',
    'faq_q_5' => 'Where was Aether featured?',
    'faq_a_5' => 'In The Enterprise World, July 2026 edition, under the title “Talking to Your Data: How Aether Turns Enterprise Chaos into Clarity” - its second consecutive feature in the magazine.',
    'faq_q_6' => 'What does Agentic AI mean in Aether?',
    'faq_a_6' => 'Agentic AI recommends and initiates business actions from AI-generated insight, rather than leaving the follow-through to someone’s inbox.',
    'takeaways_heading' => 'The short version',
    'takeaway_1' => 'Aether unifies Enterprise, Generative and Agentic AI in one platform, so teams move from a question to a decision to an action without switching tools.',
    'takeaway_2' => 'Unlike a dashboard that only describes what happened, Aether recommends the next step and can execute it.',
    'takeaway_3' => 'Featured for a second consecutive time in The Enterprise World (July 2026), with the focus on closing the data-to-action gap.',
    'sec1_eyebrow' => 'The feature',
    'sec1_heading' => 'Aether returns to The Enterprise World',
    'sec1_lede' => 'ITHENA’s Agentic AI-powered advanced analytics platform appears in the July 2026 edition, following its June appearance with a deeper look at the product itself.',
    'first_content_text_' => '<p>The June issue introduced Aether. July goes further, under the title <em>Talking to Your Data: How Aether Turns Enterprise Chaos into Clarity</em>, and takes up the question that decides whether an analytics investment pays back: not whether the data exists, but how quickly an organisation can move from that data to a decision, and from the decision to an action.</p>
<p>The Enterprise World is a global business magazine covering the organisations, leaders and technologies shaping how businesses operate. The feature runs across a full spread in the July edition.</p>',
    'blog_middle_img' => array('url' => 'https://ithena.ai/wp-content/uploads/2026/08/front.webp', 'alt' => 'The July 2026 Enterprise World spread, headlined Talking to Your Data: How Aether Turns Enterprise Chaos into Clarity', 'width' => 4800, 'height' => 3150),
    'sec1_caption' => 'The opening spread of the July 2026 feature.',
    'sec2_eyebrow' => 'The problem',
    'sec2_heading' => 'The data exists. The decision still waits.',
    'sec2_lede' => 'Enterprises are not short of dashboards, reports or real-time feeds. What is missing sits between the chart and the thing somebody does about it.',
    'second_content_text' => '<p>Conventional analytics platforms deliver a view and stop there. Interpreting that view, deciding what it means for the shift, the plant or the quarter, and then initiating something - all of it stays manual, and all of it stays with whoever happens to be looking at the screen.</p>
<p>That gap is where the July feature places the real cost of analytics. Every hour spent crossing it is an hour of operational efficiency, productivity and margin that the reporting layer has already been paid for and has not delivered.</p>
<p>It is also a gap most tools have by design. A dashboard is built to describe. Nothing inside it is responsible for the next step.</p>',
    'sec2_image' => array('url' => 'https://dev-website.ithena.app/wp-content/uploads/2026/07/analysiss.webp', 'alt' => 'A conventional analytics dashboard showing user totals, a revenue trend line and conversion figures', 'width' => 1254, 'height' => 1254),
    'sec2_caption' => 'A conventional dashboard answers what happened. Reading it, deciding what it means and acting on it all remain someone’s job.',
    'sec3_eyebrow' => 'Beyond analytics',
    'sec3_heading' => 'Built to act, not only to explain',
    'sec3_lede' => 'Aether combines Enterprise AI, Generative AI, Agentic AI and Intelligent Automation in one platform, so the path from question to action does not cross a tool boundary.',
    'sec3_body' => '<p>A user asks in natural language. The platform answers with context drawn from enterprise data rather than a static report, and where the answer implies something should happen, it can trigger the workflow, the notification or the operational action itself.</p>
<p>That is the difference the July feature draws out. Traditional business intelligence describes what is happening. Aether is built to help an organisation determine what to do next, and then to do it.</p>',
    'sec3_image' => array('url' => 'https://ithena.ai/wp-content/uploads/2026/08/aether-chatbot.webp', 'alt' => 'Aether answering a plain-English question about plant effluent totals, with a suggested action and an Execute control', 'width' => 824, 'height' => 852),
    'sec3_caption' => 'A question in plain English, a contextual answer, and a suggested action with one control to run it.',
    'hightlight_quote_para' => 'The companies pulling ahead are not the ones with the most data. They are the ones who move fastest from data to decision, and from decision to action.',
    'pull_quote_cite' => 'The Enterprise World, July 2026 edition',
    'next_eyebrow' => 'What comes next',
    'next_heading' => 'From reporting to intelligent execution',
    'next_lede' => 'The July feature restates the direction ITHENA is building towards: AI that does not stop at the insight.',
    'next_body' => '<p>As enterprises adopt Agentic AI, the useful question stops being how much can be measured and becomes how much can be acted on without a person carrying the result from one system to the next. Aether is ITHENA’s answer to that, and the platform continues to develop against it.</p>
<p>ITHENA values its continued association with The Enterprise World, and remains focused on practical AI that accelerates digital transformation and produces measurable business outcomes rather than another layer of reporting.</p>',
    'about_eyebrow' => 'About',
    'about_heading' => 'The publication and the company',
    'about1_name' => 'The Enterprise World',
    'about1_text' => 'A global business magazine covering the organisations, industry leaders and technologies shaping the future of business through leadership, strategy and digital transformation.',
    'about1_url' => 'https://theenterpriseworld.com/',
    'about2_name' => 'ITHENA',
    'about2_text' => 'A nimble technology company delivering persona-based AI solutions for manufacturing, life sciences, services and government organisations, combining AI, IoT, cloud and modern enterprise technologies to turn data into intelligent action.',
    'about2_url' => 'https://ithena.ai/',
    'cta_eyebrow' => 'Get started',
    'bottom_banner_text' => 'Bring one system. Ask the questions. Get answers and take action in the same session.',
    'cta_lede' => 'A working session on your own data rather than a slide deck. Pick the questions that currently take a day to answer, and we will put Aether’s answers next to what the report said.',
    'bottom_banner_cta_text' => 'See Aether in Action',
    'bottom_banner_cta_url' => 'https://dev-website.ithena.app/ithenas-aether/',
    'cta2_text' => 'Read the July edition',
    'cta2_url' => 'https://theenterpriseworld.com/',
    'cta_video' => 'https://dev-website.ithena.app/wp-content/uploads/2026/09/aether-hero.mp4',
);

if (!function_exists('bl_f')) {
    function bl_f($k) {
        $v = function_exists('get_field') ? get_field($k) : get_post_meta(get_the_ID(), $k, true);
        if (is_string($v)) $v = trim($v);
        if ($v === null || $v === false || $v === '' || $v === array()) $v = isset($GLOBALS['bl_sample'][$k]) ? $GLOBALS['bl_sample'][$k] : '';
        return $v;
    }
    function bl_e($k) {
        echo esc_html(trim(wp_strip_all_tags((string) bl_f($k))));
    }
    // Image fields work with any ACF return format (array, ID or URL).
    function bl_imgv($k) {
        $v = bl_f($k);
        if (is_numeric($v)) $v = array('url' => wp_get_attachment_url($v), 'alt' => get_post_meta($v, '_wp_attachment_image_alt', true));
        if (is_string($v)) $v = array('url' => $v);
        return empty($v['url']) ? null : $v;
    }
    function bl_img($k, $eager = false) {
        $v = bl_imgv($k);
        if (!$v) return;
        echo '<img src="' . esc_url($v['url']) . '" alt="' . esc_attr(isset($v['alt']) ? $v['alt'] : '') . '"'
            . (!empty($v['width']) ? ' width="' . (int) $v['width'] . '" height="' . (int) $v['height'] . '"' : '')
            . ($eager ? ' fetchpriority="high"' : ' loading="lazy"') . ' decoding="async">';
    }
    // WYSIWYG or plain textarea; every <h2> gets an id so the sub nav can link to it.
    function bl_prose($k, &$nav) {
        $h = (string) bl_f($k);
        if ($h === '') return '';
        if (!preg_match('/<(p|h[1-6]|ul|ol|div|figure|blockquote)\b/i', $h)) $h = wpautop($h);
        return preg_replace_callback('/<h2(?![^>]*\bid=)([^>]*)>(.*?)<\/h2>/is', function ($m) use (&$nav) {
            $label = trim(wp_strip_all_tags($m[2]));
            $id = sanitize_title($label);
            if ($id === '' || isset($nav[$id])) $id .= '-' . (count($nav) + 1);
            $nav[$id] = $label;
            return '<h2 id="' . esc_attr($id) . '"' . $m[1] . '>' . $m[2] . '</h2>';
        }, wp_kses_post($h));
    }
    // Eyebrow + H2 + lede from "{prefix}_eyebrow / _heading / _lede".
    function bl_head($p, $eyebrow = '') {
        $eb = bl_f($p . '_eyebrow') ? bl_f($p . '_eyebrow') : $eyebrow;
        if ($eb) echo '<div class="eyebrow">' . esc_html($eb) . '</div>';
        if (bl_f($p . '_heading')) echo '<h2>' . esc_html(bl_f($p . '_heading')) . '</h2>';
        if (bl_f($p . '_lede')) echo '<p class="lede">' . esc_html(bl_f($p . '_lede')) . '</p>';
    }
}

if (have_posts()) the_post();

// Gutenberg mode: once the post content has blocks, the sections come from the editor and the
// ACF section fields are ignored. The hero comes from a "Blog hero" Cover block; without one it reads the
// ACF hero fields, falling back to native ones.
$bl_gb = has_blocks();
if ($bl_gb) $GLOBALS['bl_sample'] = array();

$bl_title = bl_f('blog_heading') ? bl_f('blog_heading') : get_the_title();
$bl_deck = bl_f('blog_sub_heading') ? bl_f('blog_sub_heading') : ($bl_gb && has_excerpt() ? get_the_excerpt() : '');
$bl_eyebrow = bl_f('blog_name');
$bl_author = bl_f('blog_author') ? bl_f('blog_author') : 'ITHENA';
$bl_source = bl_f('blog_source');
$bl_himg = bl_imgv('blog_heading_banner_image');

if ($bl_gb) {
    // Each top-level block is a section. Top-level blocks with the class "bl-hidden" are not rendered;
    // a Cover block with the "CTA banner" style is pulled out below the article column.
    $bl_main = $bl_after = '';
    $bl_toc = $bl_faq = $bl_kept = array();
    foreach (parse_blocks(get_post()->post_content) as $b) {
        $cls = isset($b['attrs']['className']) ? ' ' . $b['attrs']['className'] . ' ' : '';
        if (strpos($cls, ' bl-hidden ') !== false) continue;
        // Hero: a Cover block with the "Blog hero" style. Its image, Eyebrow, H1, deck and "Hero meta"
        // ("Author | Source") fill the hero markup below; date and read time stay automatic.
        if ($b['blockName'] === 'core/cover' && strpos($cls, ' is-style-blog-hero ') !== false) {
            if (!empty($b['attrs']['url'])) $bl_himg = array('url' => $b['attrs']['url'], 'alt' => isset($b['attrs']['alt']) ? $b['attrs']['alt'] : '');
            foreach ($b['innerBlocks'] as $ib) {
                $t = trim(wp_strip_all_tags(render_block($ib)));
                $ic = isset($ib['attrs']['className']) ? $ib['attrs']['className'] : '';
                if ($t === '') continue;
                if ($ib['blockName'] === 'core/heading') $bl_title = $t;
                elseif (strpos($ic, 'is-style-eyebrow') !== false) $bl_eyebrow = $t;
                elseif (strpos($ic, 'is-style-hero-meta') !== false) {
                    $parts = array_map('trim', explode('|', $t, 2));
                    $bl_author = $parts[0];
                    $bl_source = isset($parts[1]) ? $parts[1] : '';
                } elseif ($ib['blockName'] === 'core/paragraph') $bl_deck = $t;
            }
            continue;
        }
        $h = do_shortcode(render_block($b));
        if (trim($h) === '') continue;
        $bl_kept[] = $b;
        if ($b['blockName'] === 'core/cover' && strpos($cls, ' is-style-cta-banner ') !== false) { $bl_after .= $h; continue; }
        // Sub nav entry: the section's eyebrow, else its first H2. The block's HTML anchor wins as the id.
        if (preg_match('/<p[^>]*is-style-eyebrow[^>]*>(.*?)<\/p>/is', $h, $m) || preg_match('/<h2[^>]*>(.*?)<\/h2>/is', $h, $m)) {
            $label = trim(wp_strip_all_tags($m[1]));
            if (preg_match('/^\s*<\w+[^>]*?\sid="([^"]+)"/', $h, $mi)) $id = $mi[1];
            else {
                $id = 'ia-' . sanitize_title($label);
                if (isset($bl_toc[$id])) $id .= '-' . (count($bl_toc) + 1);
                $h = preg_replace('/^(\s*<\w+)/', '$1 id="' . esc_attr($id) . '"', $h, 1);
            }
            if ($label !== '') $bl_toc[$id] = $label;
        }
        $bl_main .= $h;
    }
    $bl_main = wp_filter_content_tags($bl_main);
    $bl_after = wp_filter_content_tags($bl_after);
    // FAQ schema from Details blocks anywhere in the rendered content.
    $bl_walk = function ($bs) use (&$bl_walk, &$bl_faq) {
        foreach ($bs as $b) {
            if ($b['blockName'] === 'core/details' && preg_match('/<summary[^>]*>(.*?)<\/summary>/is', $b['innerHTML'], $m)) {
                $bl_faq[] = array($m[1], implode('', array_map('render_block', $b['innerBlocks'])));
            }
            if (!empty($b['innerBlocks'])) $bl_walk($b['innerBlocks']);
        }
    };
    $bl_walk($bl_kept);
    $bl_mins = max(1, (int) ceil(str_word_count(wp_strip_all_tags($bl_main)) / 220));
} else {

$bl_faq = array();
for ($i = 1; $i <= 6; $i++) if (bl_f("faq_q_$i") && bl_f("faq_a_$i")) $bl_faq[] = array(bl_f("faq_q_$i"), bl_f("faq_a_$i"));
$bl_tldr = array_filter(array(bl_f('takeaway_1'), bl_f('takeaway_2'), bl_f('takeaway_3')));
$bl_splits = array_values(array_filter(array(1, 2, 3), function ($n) { return bl_f("sec{$n}_heading") !== ''; }));
$bl_last_split = $bl_splits ? end($bl_splits) : 0;
// Body + image key per section: the original blog fields drive sections 1 and 2.
$bl_keys = array(1 => array('first_content_text_', 'blog_middle_img'), 2 => array('second_content_text', 'sec2_image'), 3 => array('sec3_body', 'sec3_image'));
$bl_abouts = array_values(array_filter(array(1, 2), function ($n) { return bl_f("about{$n}_name") !== ''; }));

// Sub nav: one entry per rendered section, in page order.
$bl_toc = array();
if ($bl_faq) $bl_toc['ia-faq'] = bl_f('faq_eyebrow') ? bl_f('faq_eyebrow') : 'FAQ';
if ($bl_tldr) $bl_toc['ia-summary'] = 'Key takeaways';
foreach ($bl_splits as $n) $bl_toc["ia-sec$n"] = bl_f("sec{$n}_eyebrow") ? bl_f("sec{$n}_eyebrow") : bl_f("sec{$n}_heading");
if (bl_f('next_heading')) $bl_toc['ia-next'] = bl_f('next_eyebrow') ? bl_f('next_eyebrow') : 'What comes next';
if ($bl_abouts) $bl_toc['ia-about'] = bl_f('about_eyebrow') ? bl_f('about_eyebrow') : 'About';

$bl_txt = '';
foreach (array('first_content_text_', 'second_content_text', 'sec3_body', 'hightlight_quote_para', 'next_body') as $k) $bl_txt .= ' ' . bl_f($k);
$bl_mins = max(1, (int) ceil(str_word_count(wp_strip_all_tags($bl_txt)) / 220));
}

$bl_ico = array(
    'check' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>',
    'chev' => '<svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>',
    'arrow' => '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4"/></svg>',
);

add_filter('astra_get_content_layout', function () { return 'page-builder'; });
add_filter('astra_page_layout', function () { return 'no-sidebar'; });
add_filter('astra_is_transparent_header', '__return_false');

get_header();

?>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Noto+Sans:wght@400;600;700;800&display=swap');
      .site-content .ast-container{display:block!important}
      section#main-section{--fh:"Noto Sans",sans-serif!important;--fb:"Inter",sans-serif!important;--fs-xs:12px!important;--fs-sm:13px!important;--fs-md:14px!important;--fs-base:15px!important;--fs-body:16px!important;--fs-lg:17px!important;--fs-h3:clamp(17px,1.9vw,21px)!important;--fs-h2s:clamp(21px,2.4vw,27px)!important;--fs-h2:clamp(27px,3.6vw,44px)!important;--fs-h1:clamp(30px,4.4vw,46px)!important;--bg:#FFFFFF!important;--bg-2:#F6FAFD!important;--soft-a:#FFFFFF!important;--soft-b:#D7ECF6!important;--card:#FFFFFF!important;--ink:#0A192D!important;--ink-2:#4A5A6E!important;--ink-3:#76889C!important;--line:rgba(10,25,45,.12)!important;--line-2:rgba(10,25,45,.22)!important;--brand:#0083C8!important;--brand-deep:#0067A0!important;--brand-ink:#0067A0!important;--brand-glow:#00A8E8!important;--teal:#4FE0D0!important;--red:#C00000!important;--chip:rgba(0,131,200,.09)!important;--ease:cubic-bezier(.16,.8,.24,1)!important;--sh-facts:rgba(10,25,45,.5)!important;--sh-facts-2:rgba(10,25,45,.06)!important;--cta-a:#04101F!important;--cta-b:#0A2C46!important;--cta-c:#083048!important;--cta-line:rgba(0,168,232,.35)!important;--scrim-1:rgba(4,16,31,.82)!important;--scrim-2:rgba(4,16,31,.56)!important;--scrim-3:rgba(4,16,31,.30)!important;color-scheme:light!important}
      section#main-section[data-theme="dark"]{--bg:#0A0A0B!important;--bg-2:#111113!important;--soft-a:#07080A!important;--soft-b:#111113!important;--card:#17181B!important;--ink:#F2F3F5!important;--ink-2:rgba(228,230,235,.8)!important;--ink-3:#9A9FA8!important;--line:rgba(255,255,255,.09)!important;--line-2:rgba(255,255,255,.16)!important;--brand-ink:#3FA9E0!important;--chip:rgba(0,131,200,.2)!important;--sh-facts:rgba(0,0,0,.75)!important;--sh-facts-2:rgba(0,0,0,.4)!important;--cta-a:#07080A!important;--cta-b:#16171A!important;--cta-c:#111113!important;--cta-line:rgba(255,255,255,.16)!important;--scrim-1:rgba(6,6,8,.84)!important;--scrim-2:rgba(6,6,8,.6)!important;--scrim-3:rgba(6,6,8,.34)!important;--deep:linear-gradient(155deg,#16171A 0%,#0C0C0E 52%,#050506 100%)!important;color-scheme:dark!important;background:linear-gradient(rgba(255,255,255,.028) 1px,transparent 1px) 0 0/56px 56px,linear-gradient(90deg,rgba(255,255,255,.028) 1px,transparent 1px) 0 0/56px 56px,radial-gradient(55% 70% at 100% 0%,rgba(0,131,200,.11),transparent 70%),var(--deep)!important}
      section#main-section,section#main-section *,section#main-section *::before,section#main-section *::after{box-sizing:border-box!important}
      section#main-section [id]{scroll-margin-top:calc(max(var(--cs-hdr,0px),100px) + 24px)!important}
      section#main-section{display:block!important;margin:0!important;padding:0!important;background:var(--bg)!important;color:var(--ink-2)!important;font-family:var(--fb)!important;font-size:var(--fs-body)!important;line-height:1.68!important;-webkit-font-smoothing:antialiased!important;transition:background .35s var(--ease),color .35s var(--ease)!important}
      section#main-section ::selection{background:rgba(0,168,232,.35)!important}
      section#main-section h1,section#main-section h2,section#main-section h3,section#main-section h4{font-family:var(--fh)!important;font-weight:700!important;letter-spacing:-.02em!important;line-height:1.2!important;color:var(--ink)!important;margin:0!important;text-wrap:balance!important}
      section#main-section p,section#main-section figure,section#main-section blockquote{margin:0!important}
      section#main-section ul,section#main-section ol{list-style:none!important;margin:0!important;padding:0!important}
      section#main-section a{color:var(--brand-ink)!important;text-decoration:none!important}
      section#main-section a:hover{text-decoration:underline!important}
      section#main-section img,section#main-section svg{display:block!important;max-width:100%!important}
      section#main-section img{height:auto!important}
      section#main-section button{font:inherit!important;color:inherit!important;background:none!important;border:0!important;padding:0!important;cursor:pointer!important}
      section#main-section :focus-visible{outline:2px solid var(--brand-glow)!important;outline-offset:3px!important;border-radius:6px!important}
      section#main-section .wrap{max-width:1240px!important;margin:0 auto!important;padding:0 clamp(18px,3vw,40px)!important}
      section#main-section .col{max-width:none!important}
      section#main-section .col > p + p{margin-top:18px!important}
      section#main-section .sec{position:relative!important;padding:clamp(40px,4.4vw,64px) 0!important}
      section#main-section .eyebrow{display:flex!important;align-items:center!important;gap:10px!important;margin-bottom:14px!important;font-family:var(--fh)!important;font-size:var(--fs-xs)!important;font-weight:700!important;letter-spacing:.14em!important;text-transform:uppercase!important;color:var(--brand-ink)!important}
      section#main-section .eyebrow::before{content:""!important;width:22px!important;height:2px!important;border-radius:2px!important;flex:none!important;background:linear-gradient(90deg,var(--brand),var(--teal))!important;transform-origin:left!important;transition:transform .6s var(--ease) .1s!important}
      section#main-section h2{font-size:clamp(26px,3.4vw,32px)!important;font-weight:800!important;margin-bottom:14px!important}
      section#main-section h4{font-size:18px!important;margin-bottom:6px!important}
      section#main-section .lede{font-size:18px!important;line-height:1.6!important;color:var(--ink-2)!important;margin-bottom:20px!important}
      /* rich text from the WYSIWYG fields */
      section#main-section .prose{line-height:1.75!important}
      section#main-section .prose > * + *{margin-top:16px!important}
      section#main-section .prose h2{font-size:var(--fs-h2s)!important;margin:40px 0 0!important;padding-top:28px!important;border-top:1px solid var(--line)!important}
      section#main-section .prose h3{font-size:var(--fs-h3)!important;margin-top:28px!important}
      section#main-section .prose h2 + *,section#main-section .prose h3 + *{margin-top:12px!important}
      section#main-section .prose strong,section#main-section .prose b{color:var(--ink)!important;font-weight:700!important}
      section#main-section .prose a{text-decoration:underline!important;text-underline-offset:3px!important;text-decoration-thickness:1px!important}
      section#main-section .prose ul{list-style:disc!important;padding-left:22px!important}
      section#main-section .prose ol{list-style:decimal!important;padding-left:22px!important}
      section#main-section .prose li + li{margin-top:10px!important}
      section#main-section .prose li::marker{color:var(--brand)!important}
      section#main-section .prose img{border-radius:12px!important}
      /* hero: full-bleed banner image, headline bottom-left over a scrim */
      section#main-section .hero{position:relative!important;overflow:hidden!important;isolation:isolate!important;display:flex!important;align-items:flex-end!important;min-height:clamp(420px,52vw,600px)!important;background:radial-gradient(900px 520px at 12% 20%,rgba(0,131,200,.32),transparent 62%),radial-gradient(700px 420px at 90% 110%,rgba(79,224,208,.12),transparent 60%),var(--cta-a)!important}
      section#main-section .hero::before{content:""!important;position:absolute!important;inset:-10%!important;pointer-events:none!important;background:radial-gradient(42% 55% at 20% 30%,rgba(0,131,200,.6),transparent 70%),radial-gradient(38% 48% at 6% 85%,rgba(79,224,208,.28),transparent 72%)!important;mix-blend-mode:screen!important;filter:blur(8px)!important;opacity:.9!important;animation:blAurora 24s ease-in-out infinite alternate!important}
      section#main-section .hero .grain{position:absolute!important;inset:0!important;pointer-events:none!important;opacity:.08!important;mix-blend-mode:overlay!important;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E")!important;background-size:140px 140px!important}
      section#main-section .hero-img{position:absolute!important;inset:0!important;z-index:-1!important}
      section#main-section .hero-img img{width:100%!important;height:100%!important;max-width:none!important;object-fit:cover!important;object-position:70% 50%!important;animation:blKb 28s ease-in-out infinite alternate!important}
      section#main-section .hero-img::after{content:""!important;position:absolute!important;inset:0!important;background:linear-gradient(90deg,var(--cta-a) 8%,var(--scrim-1) 42%,var(--scrim-3) 72%,transparent)!important}
      section#main-section .hero-in{position:relative!important;z-index:1!important;width:100%!important;padding-top:calc(var(--cs-hdr,0px) + clamp(48px,6.5vw,88px))!important;padding-bottom:clamp(36px,4vw,54px)!important}
      section#main-section .hero .eyebrow{color:var(--teal)!important;margin-bottom:0!important}
      section#main-section .hero h1{font-size:clamp(30px,4.6vw,50px)!important;font-weight:800!important;line-height:1.1!important;letter-spacing:-.01em!important;margin:20px 0 18px!important;max-width:19ch!important;color:#fff!important;overflow:hidden!important;padding-bottom:.08em!important}
      section#main-section .hero h1 .rise{display:block!important;animation:blRise 1s var(--ease) .14s both!important}
      section#main-section .hero .deck{font-size:20px!important;line-height:1.55!important;max-width:56ch!important;color:rgba(255,255,255,.84)!important}
      section#main-section .hero-meta{display:flex!important;flex-wrap:wrap!important;align-items:center!important;gap:8px 16px!important;margin-top:26px!important;font-size:var(--fs-md)!important;color:rgba(255,255,255,.7)!important}
      section#main-section .hero-meta .dot{width:4px!important;height:4px!important;border-radius:50%!important;background:currentColor!important;opacity:.6!important}
      section#main-section .hero-meta b{color:#fff!important;font-weight:700!important}
      section#main-section .hero .eyebrow,section#main-section .hero .deck,section#main-section .hero-meta{animation:blUp .7s both var(--ease)!important}
      section#main-section .hero .eyebrow{animation-delay:.28s!important}
      section#main-section .hero .deck{animation-delay:.42s!important}
      section#main-section .hero-meta{animation-delay:.5s!important}
      @keyframes blUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:none}}
      @keyframes blRise{from{transform:translateY(115%)}to{transform:none}}
      @keyframes blKb{from{transform:scale(1.03)}to{transform:scale(1.13)}}
      @keyframes blAurora{0%{transform:translate3d(-3%,-2%,0) scale(1)}50%{transform:translate3d(4%,3%,0) scale(1.14)}100%{transform:translate3d(-2%,5%,0) scale(1.06)}}
      @keyframes blQa{from{opacity:0;transform:translateY(-7px)}to{opacity:1;transform:none}}
      @keyframes blSheen{to{left:150%}}
      /* "On this page" rail + article column (same as case-study-template.html) */
      section#main-section .shell{display:grid!important;grid-template-columns:210px minmax(0,1fr)!important;gap:64px!important;max-width:1240px!important;margin:0 auto!important;padding:0 28px!important;align-items:start!important}
      section#main-section .rail{position:sticky!important;top:calc(max(var(--cs-hdr,0px),100px) + 24px)!important;padding:52px 0 40px!important}
      section#main-section .rail-cap{font-family:var(--fh)!important;font-weight:700!important;font-size:var(--fs-xs)!important;letter-spacing:.13em!important;text-transform:uppercase!important;color:var(--ink-3)!important;display:block!important;margin-bottom:14px!important}
      section#main-section .rail-track{position:relative!important}
      section#main-section .rail-track::before{content:""!important;position:absolute!important;left:0!important;top:6px!important;bottom:6px!important;width:1px!important;background:var(--line-2)!important}
      section#main-section .rail-thumb{position:absolute!important;left:-1px!important;width:3px!important;border-radius:2px!important;top:0!important;height:0!important;background:linear-gradient(180deg,var(--brand),var(--teal))!important;transition:transform .35s var(--ease),height .35s var(--ease)!important}
      section#main-section .rail ol{list-style:none!important;margin:0!important;padding:0!important}
      section#main-section .rail ol a{display:grid!important;grid-template-columns:24px 1fr!important;gap:6px!important;align-items:baseline!important;padding:8px 0 8px 15px!important;font-size:var(--fs-sm)!important;color:var(--ink-3)!important;line-height:1.4!important;font-family:var(--fb)!important;font-weight:600!important;transition:color .22s!important}
      section#main-section .rail ol a i{font-style:normal!important;font-size:var(--fs-xs)!important;color:var(--line-2)!important;letter-spacing:.04em!important}
      section#main-section .rail ol a:hover{color:var(--ink-2)!important}
      section#main-section .rail ol a.on{color:var(--ink)!important}
      section#main-section .rail ol a.on i{color:var(--brand)!important}
      @media(max-width:1080px){section#main-section .shell{grid-template-columns:minmax(0,1fr)!important;gap:0!important}section#main-section .rail{display:none!important}}
      section#main-section main{min-width:0!important;padding:52px 0 clamp(56px,6vw,88px)!important}
      section#main-section article{display:flow-root!important;padding-bottom:clamp(44px,5vw,64px)!important}
      section#main-section main .sec{padding:46px 0!important;border-top:1px solid var(--line)!important}
      section#main-section main .wrap{max-width:none!important;padding:0!important}
      /* key takeaways */
      section#main-section .tldr{padding-left:clamp(18px,2vw,26px)!important;border-left:3px solid var(--brand)!important}
      section#main-section .tldr h2{font-size:24px!important;margin-bottom:4px!important}
      section#main-section .tldr ul{display:grid!important;gap:14px!important;margin-top:18px!important}
      section#main-section .tldr li{display:flex!important;gap:13px!important;font-size:18px!important;line-height:1.5!important;color:var(--ink)!important}
      section#main-section .tldr li svg{flex:none!important;width:22px!important;height:22px!important;color:var(--brand)!important;margin-top:3px!important}
      /* figures */
      section#main-section .fig-frame{position:relative!important;display:block!important;max-width:640px!important;aspect-ratio:4/3!important;border-radius:12px!important;overflow:hidden!important;border:1px solid var(--line)!important;box-shadow:0 14px 34px -14px var(--sh-facts)!important}
      section#main-section .fig-frame img{width:100%!important;height:100%!important;object-fit:cover!important}
      section#main-section figcaption{margin-top:12px!important;font-size:var(--fs-md)!important;color:var(--ink-3)!important}
      /* text then full-width media */
      section#main-section .split{display:grid!important;grid-template-columns:minmax(0,1fr)!important;gap:clamp(24px,2.6vw,40px)!important}
      section#main-section blockquote{position:relative!important;margin-top:28px!important;padding:0 0 0 26px!important;border:0!important;border-left:3px solid var(--brand)!important;font-style:normal!important}
      section#main-section blockquote::before{content:"\201C"!important;position:absolute!important;left:20px!important;top:-.42em!important;font:800 90px/1 var(--fh)!important;color:var(--brand)!important;opacity:.14!important;pointer-events:none!important}
      section#main-section blockquote p{position:relative!important;font-family:var(--fh)!important;font-size:24px!important;font-weight:700!important;line-height:1.35!important;color:var(--ink)!important}
      section#main-section blockquote cite{display:block!important;margin-top:12px!important;font-style:normal!important;font-size:var(--fs-md)!important;color:var(--ink-3)!important}
      /* FAQ */
      section#main-section .faq{margin-top:30px!important;display:grid!important;grid-template-columns:1fr 1fr!important;gap:0 clamp(28px,4vw,56px)!important}
      section#main-section .qa-col{border-top:1px solid var(--line)!important}
      section#main-section .qa{border-bottom:1px solid var(--line)!important}
      section#main-section .qa summary{display:flex!important;align-items:center!important;justify-content:space-between!important;gap:20px!important;padding:20px 0!important;cursor:pointer!important;list-style:none!important;font-family:var(--fh)!important;font-weight:700!important;font-size:20px!important;line-height:1.35!important;color:var(--ink)!important;transition:color .2s!important}
      section#main-section .qa summary::-webkit-details-marker{display:none!important}
      section#main-section .qa summary:hover{color:var(--brand-ink)!important}
      section#main-section .qa .chev{flex:none!important;width:22px!important;height:22px!important;color:var(--brand)!important;transition:transform .3s var(--ease)!important}
      section#main-section .qa[open] .chev{transform:rotate(180deg)!important}
      section#main-section .qa-a{padding:0 0 22px!important}
      section#main-section .qa-a p{max-width:64ch!important}
      section#main-section .qa[open] .qa-a{animation:blQa .32s ease!important}
      /* about */
      section#main-section .abouts{display:grid!important;grid-template-columns:1fr 1fr!important;gap:clamp(28px,4vw,56px)!important;margin-top:28px!important}
      section#main-section .about{padding-top:20px!important;border-top:2px solid var(--brand)!important}
      section#main-section .about h4{font-size:var(--fs-body)!important}
      section#main-section .about p{font-size:var(--fs-md)!important;max-width:46ch!important;margin-top:8px!important}
      section#main-section .about a{display:inline-block!important;margin-top:12px!important;font-size:var(--fs-md)!important;font-weight:700!important}
      /* closing CTA: centered banner over looping video (matches case-study-v2) */
      section#main-section .cta-banner{margin:0 auto!important;max-width:1184px!important;width:calc(100% - 32px)!important;border-radius:28px!important;padding:64px 44px!important;text-align:center!important;position:relative!important;overflow:hidden!important;color:#fff!important;background:linear-gradient(120deg,var(--cta-a),var(--cta-b),var(--cta-a),var(--cta-c))!important;border:1px solid var(--cta-line)!important}
      section#main-section .cta-banner::after{content:""!important;position:absolute!important;inset:0!important;pointer-events:none!important;z-index:1!important;background:radial-gradient(600px 260px at 50% -25%,rgba(0,168,232,.30),transparent 70%),radial-gradient(115% 135% at 50% 50%,var(--scrim-1),var(--scrim-2) 55%,var(--scrim-3) 100%)!important}
      section#main-section .cta-video{position:absolute!important;inset:0!important;width:100%!important;height:100%!important;object-fit:cover!important;z-index:0!important;filter:saturate(.95) contrast(1.04)!important}
      section#main-section .cta-banner > .rev{position:relative!important;z-index:2!important}
      section#main-section .cta-banner .eyebrow{color:var(--teal)!important;justify-content:center!important}
      section#main-section .cta-banner h2{color:#fff!important;font-size:var(--fs-h2)!important}
      section#main-section .cta-banner .lede{color:#D3E6F4!important;max-width:52ch!important;margin:16px auto 0!important}
      section#main-section .cta-banner .btns{justify-content:center!important;margin-top:28px!important}
      section#main-section .btns{display:flex!important;flex-wrap:wrap!important;gap:12px!important;margin-top:30px!important}
      section#main-section .btn{position:relative!important;overflow:hidden!important;isolation:isolate!important;display:inline-flex!important;align-items:center!important;justify-content:center!important;gap:9px!important;min-height:46px!important;padding:12px 26px!important;border-radius:999px!important;border:1px solid transparent!important;font-family:var(--fb)!important;font-size:15px!important;font-weight:700!important;transition:transform .2s,box-shadow .3s var(--ease),border-color .2s!important}
      section#main-section .btn:hover{transform:translateY(-2px)!important;text-decoration:none!important}
      section#main-section .btn::after{content:""!important;position:absolute!important;top:0!important;bottom:0!important;left:-130%;width:55%!important;z-index:-1!important;transform:skewX(-18deg)!important;background:linear-gradient(100deg,transparent,rgba(255,255,255,.38),transparent)!important}
      section#main-section .btn:hover::after{animation:blSheen .75s var(--ease)!important}
      section#main-section .btn svg{width:15px!important;height:15px!important;flex:none!important}
      section#main-section .btn-red{background:var(--red)!important;color:#fff!important}
      section#main-section .btn-red:hover{box-shadow:0 14px 28px -12px rgba(192,0,0,.7)!important}
      section#main-section .btn-g{background:transparent!important;border-color:rgba(255,255,255,.28)!important;color:#fff!important}
      section#main-section .btn-g:hover{border-color:var(--teal)!important}
      section#main-section .totop{position:fixed!important;right:22px!important;bottom:22px!important;z-index:20!important;width:46px!important;height:46px!important;border-radius:50%!important;background:var(--brand)!important;color:#fff!important;display:inline-flex!important;align-items:center!important;justify-content:center!important;box-shadow:0 14px 34px -14px var(--sh-facts)!important;opacity:0!important;pointer-events:none!important;transform:translateY(10px)!important;transition:opacity .28s,transform .28s,background-color .2s!important}
      section#main-section .totop.show{opacity:1!important;pointer-events:auto!important;transform:none!important}
      section#main-section .totop:hover{background:var(--brand-deep)!important}
      section#main-section .totop svg{width:22px!important;height:22px!important}
      /* Gutenberg mode: one rule set for every block, so all sections share the same title / subtitle / text / image / list styles.
         Block styles (Eyebrow, Lede, Checklist, Takeaways, Card, CTA banner) are registered in functions.php. */
      section#main-section .bl-content{line-height:1.75!important}
      section#main-section .bl-content * + *{margin-top:16px!important}
      section#main-section .bl-content > *{padding:46px 0!important;margin:0!important;border-top:1px solid var(--line)!important}
      section#main-section .bl-content .is-layout-constrained > *,section#main-section .bl-content .is-layout-flow > *{max-width:none!important;margin-left:0!important;margin-right:0!important}
      section#main-section .bl-content li + li{margin-top:10px!important}
      section#main-section .bl-content .is-style-eyebrow{display:flex!important;align-items:center!important;gap:10px!important;font-family:var(--fh)!important;font-size:var(--fs-xs)!important;font-weight:700!important;letter-spacing:.14em!important;text-transform:uppercase!important;line-height:1.4!important;color:var(--brand-ink)!important}
      section#main-section .bl-content .is-style-eyebrow::before{content:""!important;width:22px!important;height:2px!important;border-radius:2px!important;flex:none!important;background:linear-gradient(90deg,var(--brand),var(--teal))!important;transform-origin:left!important;transition:transform .6s var(--ease) .1s!important}
      section#main-section .bl-content .is-style-eyebrow + *{margin-top:14px!important}
      section#main-section .bl-content h2{font-size:clamp(26px,3.4vw,32px)!important;font-weight:800!important;margin-bottom:0!important}
      section#main-section .bl-content h3{font-size:var(--fs-h3)!important}
      section#main-section .bl-content * + h3{margin-top:28px!important}
      section#main-section .bl-content h4{font-size:18px!important;margin-bottom:0!important}
      section#main-section .bl-content h2 + *,section#main-section .bl-content h3 + *{margin-top:12px!important}
      section#main-section .bl-content .is-style-lede{font-size:18px!important;line-height:1.6!important;color:var(--ink-2)!important}
      section#main-section .bl-content .is-style-lede + *{margin-top:20px!important}
      section#main-section .bl-content strong,section#main-section .bl-content b{color:var(--ink)!important;font-weight:700!important}
      section#main-section .bl-content p a,section#main-section .bl-content li a{text-decoration:underline!important;text-underline-offset:3px!important;text-decoration-thickness:1px!important}
      section#main-section .bl-content ul{list-style:disc!important;padding-left:22px!important}
      section#main-section .bl-content ol{list-style:decimal!important;padding-left:22px!important}
      section#main-section .bl-content li::marker{color:var(--brand)!important}
      section#main-section .bl-content .is-style-checklist{list-style:none!important;padding:0!important;display:grid!important;gap:14px!important;margin-top:18px!important}
      section#main-section .bl-content .is-style-checklist li{display:flex!important;gap:13px!important;margin:0!important;font-size:18px!important;line-height:1.5!important;color:var(--ink)!important}
      section#main-section .bl-content .is-style-checklist li::before{content:""!important;flex:none!important;width:22px!important;height:22px!important;margin-top:3px!important;background:var(--brand)!important;-webkit-mask:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M20 6 9 17l-5-5'/%3E%3C/svg%3E") center/contain no-repeat!important;mask:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M20 6 9 17l-5-5'/%3E%3C/svg%3E") center/contain no-repeat!important}
      section#main-section .bl-content .is-style-takeaways{padding-left:clamp(18px,2vw,26px)!important;border-left:3px solid var(--brand)!important}
      section#main-section .bl-content .is-style-takeaways h2{font-size:24px!important}
      section#main-section .bl-content .wp-block-image{max-width:640px!important}
      section#main-section .bl-content .wp-block-image img{width:100%!important;border-radius:12px!important;border:1px solid var(--line)!important;box-shadow:0 14px 34px -14px var(--sh-facts)!important}
      section#main-section .bl-content figcaption{margin:12px 0 0!important;font-size:var(--fs-md)!important;color:var(--ink-3)!important;text-align:left!important}
      section#main-section .bl-content .wp-block-quote{margin-top:28px!important}
      section#main-section .bl-content .wp-block-columns{display:grid!important;grid-template-columns:repeat(auto-fit,minmax(min(100%,300px),1fr))!important;gap:0 clamp(28px,4vw,56px)!important;margin-top:28px!important}
      section#main-section .bl-content .wp-block-column{margin:0!important}
      section#main-section .bl-content .wp-block-details{margin:0!important;border-bottom:1px solid var(--line)!important}
      section#main-section .bl-content .wp-block-details:first-child,section#main-section .bl-content :not(.wp-block-details) + .wp-block-details{border-top:1px solid var(--line)!important}
      section#main-section .bl-content .wp-block-details summary{display:flex!important;align-items:center!important;justify-content:space-between!important;gap:20px!important;padding:20px 0!important;cursor:pointer!important;list-style:none!important;font-family:var(--fh)!important;font-weight:700!important;font-size:20px!important;line-height:1.35!important;color:var(--ink)!important;transition:color .2s!important}
      section#main-section .bl-content .wp-block-details summary::-webkit-details-marker{display:none!important}
      section#main-section .bl-content .wp-block-details summary:hover{color:var(--brand-ink)!important}
      section#main-section .bl-content .wp-block-details summary::after{content:""!important;flex:none!important;width:22px!important;height:22px!important;background:var(--brand)!important;transition:transform .3s var(--ease)!important;-webkit-mask:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E") center/contain no-repeat!important;mask:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E") center/contain no-repeat!important}
      section#main-section .bl-content .wp-block-details[open] summary::after{transform:rotate(180deg)!important}
      section#main-section .bl-content .wp-block-details > summary + *{margin-top:0!important}
      section#main-section .bl-content .wp-block-details > :not(summary){max-width:64ch!important}
      section#main-section .bl-content .wp-block-details > :last-child:not(summary){padding-bottom:22px!important}
      section#main-section .bl-content .wp-block-details[open] > :not(summary){animation:blQa .32s ease!important}
      section#main-section .bl-content .is-style-card{padding-top:20px!important;border-top:2px solid var(--brand)!important}
      section#main-section .bl-content .is-style-card h4{font-size:var(--fs-body)!important}
      section#main-section .bl-content .is-style-card p{font-size:var(--fs-md)!important;max-width:46ch!important;margin-top:8px!important}
      section#main-section .bl-content .is-style-card p a{text-decoration:none!important;font-weight:700!important}
      section#main-section .bl-hidden{display:none!important}
      /* buttons (any Buttons block): fill = red, Outline style = ghost */
      section#main-section .wp-block-buttons{display:flex!important;flex-wrap:wrap!important;gap:12px!important;margin-top:30px!important}
      section#main-section .wp-block-button{margin:0!important}
      section#main-section .wp-block-button__link{display:inline-flex!important;align-items:center!important;justify-content:center!important;gap:9px!important;min-height:46px!important;padding:12px 26px!important;border-radius:999px!important;border:1px solid transparent!important;background:var(--red)!important;color:#fff!important;font-family:var(--fb)!important;font-size:15px!important;font-weight:700!important;line-height:1.2!important;text-decoration:none!important;transition:transform .2s,box-shadow .3s var(--ease),border-color .2s!important}
      section#main-section .wp-block-button__link:hover{transform:translateY(-2px)!important;box-shadow:0 14px 28px -12px rgba(192,0,0,.7)!important;text-decoration:none!important}
      section#main-section .is-style-outline > .wp-block-button__link{background:transparent!important;border-color:var(--line-2)!important;color:var(--ink)!important}
      section#main-section .is-style-outline > .wp-block-button__link:hover{border-color:var(--teal)!important;box-shadow:none!important}
      /* closing CTA: Cover block (video background) with the "CTA banner" style */
      section#main-section .wp-block-cover.is-style-cta-banner{display:block!important;min-height:0!important;margin:0 auto!important;max-width:1184px!important;width:calc(100% - 32px)!important;border-radius:28px!important;padding:64px 44px!important;text-align:center!important;position:relative!important;overflow:hidden!important;color:#fff!important;background:linear-gradient(120deg,var(--cta-a),var(--cta-b),var(--cta-a),var(--cta-c))!important;border:1px solid var(--cta-line)!important}
      section#main-section .is-style-cta-banner::after{content:""!important;position:absolute!important;inset:0!important;pointer-events:none!important;z-index:1!important;background:radial-gradient(600px 260px at 50% -25%,rgba(0,168,232,.30),transparent 70%),radial-gradient(115% 135% at 50% 50%,var(--scrim-1),var(--scrim-2) 55%,var(--scrim-3) 100%)!important}
      section#main-section .is-style-cta-banner .wp-block-cover__background{display:none!important}
      section#main-section .is-style-cta-banner .wp-block-cover__video-background,section#main-section .is-style-cta-banner .wp-block-cover__image-background{position:absolute!important;inset:0!important;width:100%!important;height:100%!important;max-width:none!important;object-fit:cover!important;z-index:0!important;filter:saturate(.95) contrast(1.04)!important}
      section#main-section .is-style-cta-banner .wp-block-cover__inner-container{position:relative!important;z-index:2!important;width:100%!important;color:#fff!important}
      section#main-section .is-style-cta-banner .wp-block-cover__inner-container > * + *{margin-top:16px!important}
      section#main-section .is-style-cta-banner .is-style-eyebrow{display:flex!important;align-items:center!important;justify-content:center!important;gap:10px!important;font-family:var(--fh)!important;font-size:var(--fs-xs)!important;font-weight:700!important;letter-spacing:.14em!important;text-transform:uppercase!important;color:var(--teal)!important}
      section#main-section .is-style-cta-banner .is-style-eyebrow::before{content:""!important;width:22px!important;height:2px!important;border-radius:2px!important;background:linear-gradient(90deg,var(--brand),var(--teal))!important}
      section#main-section .is-style-cta-banner h2{color:#fff!important;font-size:var(--fs-h2)!important;font-weight:800!important;margin:14px auto 0!important}
      section#main-section .is-style-cta-banner p:not(.is-style-eyebrow){color:#D3E6F4!important;font-size:18px!important;line-height:1.6!important;max-width:52ch!important;margin:16px auto 0!important}
      section#main-section .is-style-cta-banner .wp-block-buttons{justify-content:center!important;margin-top:28px!important}
      section#main-section .is-style-cta-banner .is-style-outline > .wp-block-button__link{border-color:rgba(255,255,255,.28)!important;color:#fff!important}
      @media(max-width:640px){section#main-section .wp-block-cover.is-style-cta-banner{padding:40px 22px!important;border-radius:20px!important}}
      @media(max-width:480px){section#main-section .wp-block-button,section#main-section .wp-block-button__link{width:100%!important}}
      section#main-section[data-anim="on"] .bl-content .rev.is-style-eyebrow::before{transform:scaleX(0)!important}
      section#main-section[data-anim="on"] .bl-content .rev.in.is-style-eyebrow::before{transform:scaleX(1)!important}
      section#main-section[data-anim="on"] .bl-content .is-style-checklist li{opacity:0!important;transform:translateY(12px)!important;transition:opacity .5s var(--ease),transform .5s var(--ease)!important}
      section#main-section[data-anim="on"] .bl-content .in .is-style-checklist li,section#main-section[data-anim="on"] .bl-content .is-style-checklist.in li{opacity:1!important;transform:none!important}
      section#main-section[data-anim="on"] .bl-content .is-style-checklist li:nth-child(2){transition-delay:.12s!important}
      section#main-section[data-anim="on"] .bl-content .is-style-checklist li:nth-child(3){transition-delay:.24s!important}
      /* scroll reveals: only when JS is running (data-anim), so content never stays hidden */
      section#main-section[data-anim="on"] .rev{opacity:0!important;transform:translateY(14px)!important;transition:opacity .42s ease-out,transform .42s ease-out!important}
      section#main-section[data-anim="on"] .rev.in{opacity:1!important;transform:none!important}
      section#main-section[data-anim="on"] .sec .rev .eyebrow::before{transform:scaleX(0)!important}
      section#main-section[data-anim="on"] .sec .rev.in .eyebrow::before{transform:scaleX(1)!important}
      section#main-section[data-anim="on"] .col.rev > h2{clip-path:inset(0 100% 0 0)!important;transition:clip-path .85s var(--ease) .1s!important}
      section#main-section[data-anim="on"] .col.rev.in > h2{clip-path:inset(0 0 0 0)!important}
      section#main-section[data-anim="on"] figure.rev .fig-frame{clip-path:inset(0 0 100% 0)!important;transition:clip-path .9s var(--ease)!important}
      section#main-section[data-anim="on"] figure.rev.in .fig-frame{clip-path:inset(0 0 0 0)!important}
      section#main-section[data-anim="on"] figure.rev .fig-frame img{transform:scale(1.09)!important;transition:transform 1.2s var(--ease)!important}
      section#main-section[data-anim="on"] figure.rev.in .fig-frame img{transform:none!important}
      section#main-section[data-anim="on"] .tldr li{opacity:0!important;transform:translateY(12px)!important;transition:opacity .5s var(--ease),transform .5s var(--ease)!important}
      section#main-section[data-anim="on"] .tldr.in li{opacity:1!important;transform:none!important}
      section#main-section[data-anim="on"] .tldr.in li:nth-child(2){transition-delay:.12s!important}
      section#main-section[data-anim="on"] .tldr.in li:nth-child(3){transition-delay:.24s!important}
      section#main-section[data-anim="on"] .tldr li svg path{stroke-dasharray:220!important;stroke-dashoffset:220!important;transition:stroke-dashoffset 1s var(--ease) .2s!important}
      section#main-section[data-anim="on"] .tldr.in li svg path{stroke-dashoffset:0!important}
      @media(max-width:900px){
        section#main-section .faq,section#main-section .abouts{grid-template-columns:1fr!important}
        section#main-section .hero-img::after{background:linear-gradient(180deg,var(--scrim-3),var(--scrim-1) 56%,var(--cta-a) 88%)!important}
        section#main-section .hero-img img{object-position:72% 42%!important}
      }
      @media(max-width:640px){section#main-section .cta-banner{padding:40px 22px!important;border-radius:20px!important}}
      @media(max-width:480px){
        section#main-section .btn{width:100%!important}
          section#main-section .totop{right:16px!important;bottom:16px!important}
      }
      @media(prefers-reduced-motion:reduce){section#main-section,section#main-section *,section#main-section *::before,section#main-section *::after{animation:none!important;transition:none!important;scroll-behavior:auto!important}section#main-section .hero-img img{transform:none!important}}
    </style>

    <section id="main-section" class="fbb-landing bl-page" data-theme="dark">

      <?php if ($bl_faq) : ?>
      <script type="application/ld+json"><?php echo wp_json_encode(array(
          '@context' => 'https://schema.org',
          '@type' => 'FAQPage',
          'mainEntity' => array_map(function ($qa) {
              return array('@type' => 'Question', 'name' => wp_strip_all_tags($qa[0]), 'acceptedAnswer' => array('@type' => 'Answer', 'text' => wp_strip_all_tags($qa[1])));
          }, $bl_faq),
      )); ?></script>
      <?php endif; ?>

      <article>

        <header class="hero">
          <?php if ($bl_himg) : ?><div class="hero-img" aria-hidden="true"><img src="<?php echo esc_url($bl_himg['url']); ?>" alt="<?php echo esc_attr(isset($bl_himg['alt']) ? $bl_himg['alt'] : ''); ?>"<?php if (!empty($bl_himg['width'])) echo ' width="' . (int) $bl_himg['width'] . '" height="' . (int) $bl_himg['height'] . '"'; ?> fetchpriority="high" decoding="async"></div>
          <?php elseif ($bl_gb && has_post_thumbnail()) : ?><div class="hero-img" aria-hidden="true"><?php the_post_thumbnail('full', array('alt' => '', 'fetchpriority' => 'high', 'loading' => false)); ?></div><?php endif; ?>
          <div class="grain" aria-hidden="true"></div>
          <div class="wrap hero-in">
            <div class="col">
              <?php if ($bl_eyebrow) : ?><div class="eyebrow"><?php echo esc_html(trim(wp_strip_all_tags($bl_eyebrow))); ?></div><?php endif; ?>
              <h1><span class="rise"><?php echo esc_html($bl_title); ?></span></h1>
              <?php if ($bl_deck) : ?><p class="deck"><?php echo esc_html(trim(wp_strip_all_tags($bl_deck))); ?></p><?php endif; ?>
              <div class="hero-meta">
                <span>By <b><?php echo esc_html($bl_author); ?></b></span><span class="dot" aria-hidden="true"></span>
                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('F Y')); ?></time><span class="dot" aria-hidden="true"></span>
                <?php if ($bl_source) : ?><span><?php echo esc_html(trim(wp_strip_all_tags($bl_source))); ?></span><span class="dot" aria-hidden="true"></span><?php endif; ?>
                <span><?php echo (int) $bl_mins; ?> min read</span>
              </div>
            </div>
          </div>
        </header>

        <div class="shell">
          <aside class="rail" aria-label="On this page">
            <?php if (count($bl_toc) > 1) : ?>
            <span class="rail-cap">On this page</span>
            <div class="rail-track">
              <span class="rail-thumb" id="railThumb" aria-hidden="true"></span>
              <ol id="rail">
                <?php $n = 0; foreach ($bl_toc as $bl_id => $bl_label) : ?><li><a href="#<?php echo esc_attr($bl_id); ?>"><i><?php printf('%02d', ++$n); ?></i><span><?php echo esc_html($bl_label); ?></span></a></li><?php endforeach; ?>
              </ol>
            </div>
            <?php endif; ?>
          </aside>
          <main>

        <?php if ($bl_gb) : ?>
        <div class="bl-content"><?php echo $bl_main; ?></div>
        <?php else : ?>

        <?php if ($bl_faq) : ?>
        <section class="sec" id="ia-faq">
          <div class="wrap">
            <div class="col rev"><?php bl_head('faq', 'FAQ'); ?></div>
            <div class="faq rev">
              <?php foreach (array_chunk($bl_faq, (int) ceil(count($bl_faq) / 2)) as $bl_col) : ?>
              <div class="qa-col">
                <?php foreach ($bl_col as $bl_qa) : ?>
                <details class="qa" name="ia-faq-group">
                  <summary><span><?php echo esc_html($bl_qa[0]); ?></span><?php echo $bl_ico['chev']; ?></summary>
                  <div class="qa-a"><?php echo wp_kses_post(wpautop($bl_qa[1])); ?></div>
                </details>
                <?php endforeach; ?>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </section>
        <?php endif; ?>

        <?php if ($bl_tldr) : ?>
        <section class="sec" id="ia-summary">
          <div class="wrap">
            <div class="tldr rev">
              <div class="eyebrow">Key takeaways</div>
              <h2><?php echo esc_html(bl_f('takeaways_heading') ? bl_f('takeaways_heading') : 'The short version'); ?></h2>
              <ul>
                <?php foreach ($bl_tldr as $bl_t) : ?><li><?php echo $bl_ico['check']; ?><span><?php echo esc_html($bl_t); ?></span></li><?php endforeach; ?>
              </ul>
            </div>
          </div>
        </section>
        <?php endif; ?>


        <?php $bl_figs = 0; // max 2 section images per blog
        foreach ($bl_splits as $n) : $p = "sec$n"; $bl_imk = $bl_keys[$n][1]; $bl_im = bl_imgv($bl_imk); $bl_x = array(); $bl_body = bl_prose($bl_keys[$n][0], $bl_x); ?>
        <section class="sec" id="ia-<?php echo $p; ?>">
          <div class="wrap">
            <div class="split">
              <div class="col rev">
                <?php bl_head($p); ?>
                <?php if ($bl_body !== '') : ?><div class="prose"><?php echo $bl_body; ?></div><?php endif; ?>
                <?php if ($n === $bl_last_split && bl_f('hightlight_quote_para')) : ?>
                <blockquote>
                  <p><?php bl_e('hightlight_quote_para'); ?></p>
                  <?php if (bl_f('pull_quote_cite')) : ?><cite><?php bl_e('pull_quote_cite'); ?></cite><?php endif; ?>
                </blockquote>
                <?php endif; ?>
              </div>
              <?php if ($bl_im && $bl_figs++ < 2) : ?>
              <figure class="rev">
                <span class="fig-frame"><?php bl_img($bl_imk); ?></span>
                <?php if (bl_f("{$p}_caption")) : ?><figcaption><?php bl_e("{$p}_caption"); ?></figcaption><?php endif; ?>
              </figure>
              <?php endif; ?>
            </div>
          </div>
        </section>
        <?php endforeach; ?>



        <?php if (bl_f('next_heading')) : $bl_x = array(); $bl_body = bl_prose('next_body', $bl_x); ?>
        <section class="sec" id="ia-next">
          <div class="wrap">
            <div class="col rev">
              <?php bl_head('next', 'What comes next'); ?>
              <?php if ($bl_body !== '') : ?><div class="prose"><?php echo $bl_body; ?></div><?php endif; ?>
            </div>
          </div>
        </section>
        <?php endif; ?>

        <?php if ($bl_abouts) : ?>
        <section class="sec" id="ia-about">
          <div class="wrap">
            <div class="col rev"><?php bl_head('about', 'About'); ?></div>
            <div class="abouts rev">
              <?php foreach ($bl_abouts as $n) : $bl_u = bl_f("about{$n}_url"); ?>
              <div class="about">
                <h4><?php bl_e("about{$n}_name"); ?></h4>
                <?php if (bl_f("about{$n}_text")) : ?><p><?php bl_e("about{$n}_text"); ?></p><?php endif; ?>
                <?php if ($bl_u) : ?><a href="<?php echo esc_url($bl_u); ?>" target="_blank" rel="noopener"><?php echo esc_html(rtrim(preg_replace('#^https?://(www\.)?#i', '', $bl_u), '/')); ?></a><?php endif; ?>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </section>
        <?php endif; ?>

        <?php endif; // $bl_gb ?>

          </main>
        </div>

        <?php if ($bl_gb) : echo $bl_after; elseif (bl_f('bottom_banner_text')) : $bl_vid = bl_f('cta_video'); ?>
        <section class="cta-banner">
          <?php if ($bl_vid) : ?><video class="cta-video" src="<?php echo esc_url($bl_vid); ?>" autoplay muted loop playsinline preload="metadata" disablepictureinpicture aria-hidden="true" tabindex="-1"></video><?php endif; ?>
          <div class="rev">
            <?php if (bl_f('cta_eyebrow')) : ?><div class="eyebrow"><?php bl_e('cta_eyebrow'); ?></div><?php endif; ?>
            <h2><?php bl_e('bottom_banner_text'); ?></h2>
            <?php if (bl_f('cta_lede')) : ?><p class="lede"><?php bl_e('cta_lede'); ?></p><?php endif; ?>
          </div>
          <?php if ((bl_f('bottom_banner_cta_text') && bl_f('bottom_banner_cta_url')) || (bl_f('cta2_text') && bl_f('cta2_url'))) : ?>
          <div class="btns rev">
            <?php if (bl_f('bottom_banner_cta_text') && bl_f('bottom_banner_cta_url')) : ?><a class="btn btn-red" href="<?php echo esc_url(bl_f('bottom_banner_cta_url')); ?>"><?php bl_e('bottom_banner_cta_text'); ?><?php echo $bl_ico['arrow']; ?></a><?php endif; ?>
            <?php if (bl_f('cta2_text') && bl_f('cta2_url')) : ?><a class="btn btn-g" href="<?php echo esc_url(bl_f('cta2_url')); ?>" target="_blank" rel="noopener"><?php bl_e('cta2_text'); ?></a><?php endif; ?>
          </div>
          <?php endif; ?>
        </section>
        <?php endif; ?>

      </article>

      <button type="button" class="totop" id="ia-totop" aria-label="Back to top">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 15 6-6 6 6"/></svg>
      </button>

    </section>

    <script>
      (function () {
        "use strict";
        var root = document.querySelector("section.bl-page");
        if (!root || root.dataset.bound) return;
        root.dataset.bound = "1";
        var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        if (window.ithenaTheme) {
          window.ithenaTheme.sync();
        } else {
          var themeToggle = document.getElementById("themeToggle");
          var stored = null; try { stored = localStorage.getItem("fbb-theme"); } catch (e) {}
          var setTheme = function (mode) {
            root.setAttribute("data-theme", mode);
            if (themeToggle) themeToggle.setAttribute("aria-pressed", mode === "dark" ? "true" : "false");
            try { localStorage.setItem("fbb-theme", mode); } catch (e) {}
          };
          setTheme(stored || "dark");
          if (themeToggle) themeToggle.addEventListener("click", function () { setTheme(root.getAttribute("data-theme") === "dark" ? "light" : "dark"); });
        }
        function css(el, k, v) { el.style.setProperty(k, v, "important"); }
        // Fixed/sticky site header height, so the sub nav and anchors sit below it.
        var hdr = document.getElementById("site-header") || document.querySelector("header:not(.hero)");
        function syncHdr() {
          var h = 0;
          if (hdr && /fixed|sticky|absolute/.test(getComputedStyle(hdr).position)) h = Math.max(0, Math.round(hdr.getBoundingClientRect().bottom));
          css(root, "--cs-hdr", h + "px");
        }
        syncHdr();
        window.addEventListener("load", syncHdr);
        window.addEventListener("resize", syncHdr);
        // Gutenberg mode: reveal each block inside a section, and keep one FAQ answer open at a time.
        root.querySelectorAll(".bl-content > * > *, .is-style-cta-banner .wp-block-cover__inner-container").forEach(function (el) { el.classList.add("rev"); });
        root.querySelectorAll(".bl-content .wp-block-details").forEach(function (d) { d.setAttribute("name", "ia-faq-group"); });
        if (!reduce && "IntersectionObserver" in window) {
          root.setAttribute("data-anim", "on");
          var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
              if (!e.isIntersecting) return;
              e.target.classList.add("in");
              io.unobserve(e.target);
            });
          }, { threshold: 0.12, rootMargin: "0px 0px -40px 0px" });
          root.querySelectorAll(".rev").forEach(function (el) {
            var sibs = [].filter.call(el.parentNode.children, function (c) { return c.classList.contains("rev"); });
            el.style.transitionDelay = Math.min(sibs.indexOf(el), 3) * 0.07 + "s";
            io.observe(el);
          });
        }
        var links = [].slice.call(root.querySelectorAll("#rail a"));
        var thumb = document.getElementById("railThumb");
        var secs = links.map(function (a) { return document.getElementById(a.getAttribute("href").slice(1)); });
        var top = document.getElementById("ia-totop");
        function tick() {
          var best = 0;
          for (var i = 0; i < secs.length; i++) if (secs[i] && secs[i].getBoundingClientRect().top - 220 <= 0) best = i;
          links.forEach(function (a, i) {
            a.classList.toggle("on", i === best);
            if (i === best) a.setAttribute("aria-current", "true"); else a.removeAttribute("aria-current");
          });
          var link = links[best];
          if (thumb && link) {
            css(thumb, "height", link.offsetHeight + "px");
            css(thumb, "transform", "translateY(" + link.offsetTop + "px)");
          }
          if (top) top.classList.toggle("show", pageYOffset > innerHeight * 0.9);
        }
        var ticking = false;
        window.addEventListener("scroll", function () {
          if (ticking) return;
          ticking = true;
          requestAnimationFrame(function () { tick(); ticking = false; });
        }, { passive: true });
        window.addEventListener("resize", tick);
        tick();
        if (top) top.addEventListener("click", function () { scrollTo({ top: 0, behavior: reduce ? "auto" : "smooth" }); });
        var vid = root.querySelector(".cta-video");
        if (vid && reduce) { vid.removeAttribute("autoplay"); vid.pause(); }
      })();
    </script>

<?php get_footer(); ?>
