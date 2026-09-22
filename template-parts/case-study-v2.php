<?php
/*
Template Name: Case Study v2 (ACF)
Template Post Type: page, case-study-test
*/

if (!defined('ABSPATH')) exit;

if (!function_exists('cs_f')) {
    function cs_raw($k) {
        $v = function_exists('get_field') ? get_field($k) : get_post_meta(get_the_ID(), $k, true);
        if (is_string($v)) $v = trim($v);
        return ($v === null || $v === false || $v === array()) ? '' : $v;
    }
    // Falls back to the old case-study field group so existing posts render without re-entry.
    function cs_legacy($k) {
        // cs_btn/cs_video compose their keys ($k.'_url', $k.'_poster'), so the renamed
        // hero fields are only reachable through the alias map.
        static $map = array(
            'cs_fact_1_text' => 'case_study_name',
            'cs_hero_btn1_url' => 'case_study_pdf',
            'cs_hero_poster' => 'heading_banner_image_',
        );
        return isset($map[$k]) ? cs_f($map[$k]) : '';
    }
    function cs_f($k) {
        $v = cs_raw($k);
        if ($v === '') $v = cs_legacy($k);
        if ($v === '') $v = isset($GLOBALS['cs_demo'][$k]) ? $GLOBALS['cs_demo'][$k] : '';
        return $v;
    }
    function cs_e($k) {
        echo esc_html(trim(wp_strip_all_tags((string) cs_f($k))));
    }
    // Off unless the editor explicitly ticks the box.
    function cs_on($k) {
        return (bool) cs_raw($k);
    }
    function cs_url($k) {
        $v = cs_f($k);
        if (is_array($v)) return isset($v['url']) ? $v['url'] : '';
        if (is_numeric($v)) return (string) wp_get_attachment_url($v);
        return (string) $v;
    }
    function cs_btn($k, $class, $icon = '', $modal = '') {
        $label = (string) cs_f($k . '_label');
        $url = esc_url(cs_url($k . '_url'));
        if ($label === '' || ($url === '' && $modal === '')) return;
        echo '<a' . ($class ? ' class="' . esc_attr($class) . '"' : '') . ' href="' . ($url !== '' ? $url : '#') . '"' . ($modal ? ' data-cs-modal="' . esc_attr($modal) . '" aria-haspopup="dialog"' : '') . '>' . $icon . esc_html($label) . '</a>';
    }
    function cs_paras($k, $class) {
        foreach (preg_split('/\R\s*\R/', (string) cs_f($k)) as $p) {
            if (trim($p) !== '') echo '<p class="' . esc_attr($class) . '">' . esc_html(trim($p)) . '</p>';
        }
    }
    function cs_video($k, $class) {
        $src = cs_url($k . '_video');
        if ($src === '') return;
        $poster = cs_url($k . '_poster');
        $type = wp_check_filetype($src);
        echo '<video class="' . esc_attr($class) . '" autoplay muted loop playsinline preload="metadata"' . ($poster ? ' poster="' . esc_url($poster) . '"' : '') . ' aria-hidden="true" tabindex="-1"><source src="' . esc_url($src) . '" type="' . esc_attr($type['type'] ? $type['type'] : 'video/mp4') . '"></video>';
    }
}

$cs_assets = get_stylesheet_directory_uri() . '/assets/case-study/';
$GLOBALS['cs_demo'] = array(
    'cs_hero_eyebrow' => 'Case Study',
    'case_study_heading' => 'Enabling 24/7 service coverage and faster resolution with Agentic AI agents',
    'cs_hero_deck' => 'A leading heavy-duty forklift OEM moved first contact onto AI agents. Coverage went round the clock, urgent work was separated from routine at the door, and the simple calls stopped reaching technicians at all.',
    'cs_hero_btn1_label' => 'Download case study',
    'case_study_pdf' => '/case-study/agentic-ai-oem-service-case-study/',
    'cs_hero_btn2_label' => 'Talk to an expert',
    'cs_hero_btn2_url' => '/contact-us/',
    'cs_hero_video' => $cs_assets . 'hero.mp4',
    'heading_banner_image_' => $cs_assets . 'hero-poster.jpg',
    'cs_hero_credit' => 'Warehouse & service footage · Pexels',
    'cs_facts_caption' => 'Engagement at a glance',
    'cs_fact_1_label' => 'Client',
    'cs_fact_1_text' => 'Heavy-duty forklift & material handling OEM.',
    'cs_fact_2_label' => 'Footprint',
    'cs_fact_2_text' => 'Nationwide dealer & parts network.',
    'cs_fact_3_label' => 'Solution',
    'cs_fact_3_text' => 'ITHENA Agentic OEM AI Agents.',
    'cs_fact_4_label' => 'Coverage',
    'cs_fact_4_text' => '24 / 7, including after hours.',
    'cs_fact_5_label' => 'Parts catalogue',
    'cs_fact_5_text' => '35,000 lines, checked live on the call.',
    'cs_rail_caption' => 'On this page',
    'cs_rail_foot_text' => 'Running a similar service desk?',
    'cs_rail_foot_label' => 'Book a walkthrough →',
    'cs_impact_nav' => 'Impact',
    'cs_impact_eyebrow' => 'Opportunity for impact',
    'cs_impact_title' => 'Three numbers the service desk moved.',
    'cs_impact_lede' => 'Measured against the client\'s own pre-deployment baseline across the nationwide dealer and parts network.',
    'impact_value_1' => 70,
    'impact_symbol_1' => '%',
    'impact_text_1' => 'Reduction in live call volume.',
    'cs_stat_1_text' => 'Routine fault and parts questions closed by the agent, never entering the human queue.',
    'impact_value_2' => 3,
    'impact_symbol_2' => '×',
    'impact_text_2' => 'Faster issue resolution.',
    'cs_stat_2_text' => 'Guided diagnostics run at the moment of the call instead of waiting on technician availability.',
    'impact_value_3' => 40,
    'impact_symbol_3' => '%',
    'impact_text_3' => 'Reduction in missed appointments.',
    'cs_stat_3_text' => 'Visits booked against real technician availability, then confirmed automatically.',
    'cs_client_nav' => 'About the client',
    'cs_client_eyebrow' => 'About the client',
    'cs_client_title' => 'A nationwide service network running out of hours in the day.',
    'about_client' => 'A global heavy-duty forklift and material handling equipment manufacturer, supporting a nationwide network of dealers, parts centers and factory-trained technicians.

The organization struggled to keep pace with call volume, after-hours requests and missed service appointments. Partnering with ITHENA, it put Agentic AI agents on first contact, sorting what arrives, working the fault through with the caller, closing the loop on bookings without a coordinator, and reaching out ahead of due service intervals and safety campaigns.

What followed was a quicker turnaround, appointments that hold, and a desk that is never closed.',
    'cs_challenge_nav' => 'The challenge',
    'cs_challenge_eyebrow' => 'Key challenges faced',
    'cs_challenge_title' => 'Gaps between a breakdown and an answer.',
    'cs_challenge_lede' => 'Recurring failures in the service desk, each one costing hours before anybody could act on the call.',
    'key_challenges' => '<ul><li>Limited after-hours coverage, leaving customers without support when equipment failures happen outside business hours.</li><li>Difficulty triaging incoming calls quickly, with simple fault and parts questions competing for the same queue as urgent breakdowns.</li><li>Delayed appointment confirmations, leading to missed service windows and wasted technician trips.</li><li>Limited visibility into parts and warranty status during calls, slowing first-contact resolution.</li><li>Inconsistent outreach for preventive maintenance and safety retrofits, leaving gaps in fleet-wide compliance.</li></ul>',
    'cs_routing_nav' => 'Call routing',
    'cs_routing_eyebrow' => 'How a call is handled',
    'cs_routing_title' => 'Every call answered. Only the hard ones escalated.',
    'cs_routing_lede' => 'The agent takes first contact on every inbound call, then routes on what it finds. Equipment history, fault codes, parts availability and warranty status are all read live during the conversation.',
    'cs_solution_nav' => 'The solution',
    'cs_solution_eyebrow' => 'Our solution',
    'cs_solution_title' => 'ITHENA empowered the client with:',
    'solution_1_heading' => 'First-level call support.',
    'solution_1_description' => 'Every inbound call is met inside a ring or two, at any hour, so nothing is left sitting in a queue for the morning.',
    'solution_2_heading' => 'Troubleshooting and diagnostics.',
    'solution_2_description' => 'The caller is walked through the checks one at a time, with the machine\'s own record open alongside; only genuine complexity travels further.',
    'solution_3_heading' => 'Appointment scheduling and confirmations.',
    'solution_3_description' => 'Bookings are placed where the route already has room, and the confirmation that follows is generated rather than typed by a coordinator.',
    'solution_4_heading' => 'Inventory and warranty lookups.',
    'solution_4_description' => 'Stock and cover are read straight out of the 35,000-line catalogue while the conversation is still open, in place of a manual search.',
    'cs_console_nav' => 'Live console',
    'cs_console_eyebrow' => 'Inside the console',
    'cs_console_title' => 'A night shift, as the coordinators now see it.',
    'cs_console_lede' => 'One screen carries the queue, the conversation in progress and the shape of the day\'s volume, so an overnight window is supervised rather than merely survived.',
    'cs_shift_nav' => 'What changed',
    'cs_shift_eyebrow' => 'What changed',
    'cs_shift_title' => 'The same network, a different service desk.',
    'cs_words_nav' => 'In their words',
    'cs_words_eyebrow' => 'In their words',
    'quote' => 'Our dealers and technicians can\'t be on the phone and on a forklift at the same time. The agents pick up every call, sort out what\'s urgent, and get the simple stuff handled before it ever reaches a person. That\'s given our team hours back every week and our customers an answer at two in the morning instead of a voicemail.',
    'cs_modal_download_title' => 'Please fill in the details below:',
    'cs_modal_expert_title' => 'Please fill in the details below:',
    'cs_cta_title' => 'Put agents on your service desk.',
    'cs_cta_text' => 'Tell us your call volume, your after-hours gap and the systems your technicians already work in, and we\'ll show you what the first 90 days look like.',
    'cs_cta_btn1_label' => 'Book a service-desk review',
    'cs_cta_btn2_label' => 'Explore More Case Studies',
    'cs_cta_btn2_url' => '/case-studies/',
    'cs_cta_video' => $cs_assets . 'cta.mp4',
    'cs_cta_poster' => $cs_assets . 'cta-poster.jpg',
);
if (have_posts()) the_post();

$cs_svg = '<svg %s viewBox="0 0 %d %d" fill="none" stroke="currentColor" stroke-width="%s" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%s</svg>';
$cs_fact_icons = array(
    '<path d="M3.2 17h13.6M5.4 17V8.2L10 5.4l4.6 2.8V17M8.6 17v-3.6h2.8V17"/>',
    '<circle cx="10" cy="10" r="7"/><path d="M3 10h14M10 3c1.9 2.3 1.9 11.7 0 14M10 3C8.1 5.3 8.1 14.7 10 17"/>',
    '<path d="M11 2.6L4.4 11H9l-1 6.4L15.6 9H11z"/>',
    '<circle cx="10" cy="10" r="6.9"/><path d="M10 5.9V10l2.7 1.7"/>',
    '<path d="M10 2.9l6.6 3.4-6.6 3.4-6.6-3.4zM3.4 10l6.6 3.4L16.6 10M3.4 13.6l6.6 3.4 6.6-3.4"/>',
);


$cs_nav = array();
foreach (array('impact' => 'impact', 'client' => 'client', 'words' => 'words', 'challenge' => 'challenge', 'howitworks' => 'routing', 'solution' => 'solution', 'console' => 'console', 'shift' => 'shift') as $cs_id => $cs_k) {
    if (in_array($cs_k, array('routing', 'console', 'shift'), true)) {
        if (cs_on("cs_{$cs_k}_enable")) $cs_nav[$cs_id] = $cs_k;
    } elseif (cs_f($cs_k === 'words' ? 'quote' : "cs_{$cs_k}_title")) {
        $cs_nav[$cs_id] = $cs_k;
    }
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php
    wp_body_open();
    
    if (shortcode_exists('new_ithena_header')) echo do_shortcode('[new_ithena_header]');
    elseif (function_exists('child_theme_custom_headmenu')) echo child_theme_custom_headmenu();
    
    ?>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Noto+Sans:wght@400;600;700&display=swap');
      section#main-section{--fh:"Noto Sans",sans-serif!important;--fb:"Inter",sans-serif!important;--fs-xs:12px!important;--fs-sm:13px!important;--fs-md:14px!important;--fs-base:15px!important;--fs-body:16px!important;--fs-lg:17px!important;--fs-h3:clamp(17px,1.9vw,21px)!important;--fs-h2s:clamp(21px,2.4vw,27px)!important;--fs-h2:clamp(27px,3.6vw,44px)!important;--fs-h1:clamp(32px,5vw,50px)!important;--bg:#FFFFFF!important;--bg-2:#F6FAFD!important;--soft-a:#FFFFFF!important;--soft-b:#D7ECF6!important;--card:#FFFFFF!important;--ink:#0A192D!important;--ink-2:#4A5A6E!important;--ink-3:#76889C!important;--line:rgba(10,25,45,.12)!important;--line-2:rgba(10,25,45,.22)!important;--brand:#0083C8!important;--brand-deep:#0067A0!important;--brand-ink:#0067A0!important;--brand-glow:#00A8E8!important;--teal:#4FE0D0!important;--red:#C00000!important;--chip:rgba(0,131,200,.09)!important;--shadow-card:0 1px 2px rgba(10,25,45,.05)!important;--ease:cubic-bezier(.16,.8,.24,1)!important;--sh-facts:rgba(10,25,45,.5)!important;--sh-facts-2:rgba(10,25,45,.06)!important;--sh-cons:rgba(10,25,45,.55)!important;--bk-ink:#0B7C70!important;--cta-a:#04101F!important;--cta-b:#0A2C46!important;--cta-c:#083048!important;--cta-line:rgba(0,168,232,.35)!important;--scrim-1:rgba(4,16,31,.82)!important;--scrim-2:rgba(4,16,31,.56)!important;--scrim-3:rgba(4,16,31,.30)!important;color-scheme:light!important}
      section#main-section[data-theme="dark"]{--bg:#0A0A0B!important;--bg-2:#111113!important;--soft-a:#07080A!important;--soft-b:#111113!important;--card:#17181B!important;--ink:#F2F3F5!important;--ink-2:rgba(228,230,235,.8)!important;--ink-3:#9A9FA8!important;--line:rgba(255,255,255,.09)!important;--line-2:rgba(255,255,255,.16)!important;--brand-ink:#3FA9E0!important;--chip:rgba(0,131,200,.2)!important;--shadow-card:0 1px 2px rgba(0,0,0,.5)!important;--sh-facts:rgba(0,0,0,.75)!important;--sh-facts-2:rgba(0,0,0,.4)!important;--sh-cons:rgba(0,0,0,.72)!important;--bk-ink:#4FE0D0!important;--cta-a:#07080A!important;--cta-b:#16171A!important;--cta-c:#111113!important;--cta-line:rgba(255,255,255,.16)!important;--scrim-1:rgba(6,6,8,.84)!important;--scrim-2:rgba(6,6,8,.6)!important;--scrim-3:rgba(6,6,8,.34)!important;--deep:linear-gradient(155deg,#16171A 0%,#0C0C0E 52%,#050506 100%)!important;color-scheme:dark!important;background:linear-gradient(rgba(255,255,255,.028) 1px,transparent 1px) 0 0/56px 56px,linear-gradient(90deg,rgba(255,255,255,.028) 1px,transparent 1px) 0 0/56px 56px,radial-gradient(55% 70% at 100% 0%,rgba(0,131,200,.11),transparent 70%),var(--deep)!important}
      section#main-section[data-theme="dark"] .cs-sec{box-shadow:inset 0 1px 0 rgba(255,255,255,.06)!important}
      section#main-section[data-theme="dark"] .cons-embed,section#main-section[data-theme="dark"] .fact,section#main-section[data-theme="dark"] .kpi{background:rgba(255,255,255,.035)!important}
      section#main-section,section#main-section *,section#main-section *::before,section#main-section *::after{box-sizing:border-box!important}
      section#main-section li{margin:0!important}
      section#main-section .sec{scroll-margin-top:calc(var(--cs-hdr,0px) + 24px)!important}
      section#main-section{margin:0!important; padding-bottom: 50px !important; background:var(--bg)!important;color:var(--ink-2)!important;font-family:var(--fb)!important;font-size:var(--fs-body)!important;line-height:1.68!important;-webkit-font-smoothing:antialiased!important;transition:background .35s var(--ease),color .35s var(--ease)!important}
      section#main-section ::selection{background:rgba(0,168,232,.35)!important}
      section#main-section h1,section#main-section h2,section#main-section h3,section#main-section h4{font-family:var(--fh)!important;font-weight:700!important;letter-spacing:-.02em!important;line-height:1.1!important;color:var(--ink)!important;margin:0!important;text-wrap:balance!important}
      section#main-section p,section#main-section li,section#main-section dt,section#main-section dd,section#main-section blockquote,section#main-section figcaption{line-height:inherit!important}
      section#main-section p{margin:0!important}
      section#main-section a{color:var(--brand-ink)!important;text-decoration:none!important}
      section#main-section img,section#main-section svg{max-width:100%!important}
      section#main-section :focus-visible{outline:2px solid var(--brand-glow)!important;outline-offset:3px!important;border-radius:6px!important}
      section#main-section .wrap{max-width:1240px!important;margin:0 auto!important;padding:0 28px!important}
      @media(max-width:640px){section#main-section .wrap{padding:0 18px!important}}
      section#main-section .eyebrow{font-family:var(--fh)!important;font-weight:700!important;font-size:var(--fs-sm)!important;letter-spacing:.14em!important;text-transform:uppercase!important;color:var(--brand-ink)!important;display:inline-flex!important;align-items:center!important;gap:10px!important}
      section#main-section .eyebrow::before{content:""!important;width:22px!important;height:2px!important;border-radius:2px!important;flex:none!important;background:linear-gradient(90deg,var(--brand),var(--teal))!important;animation:eyebrowPulse 3.2s var(--ease) infinite!important}
      @keyframes eyebrowPulse{0%,100%{opacity:1;transform:scaleX(1)}50%{opacity:.55;transform:scaleX(1.3)}}
      section#main-section .btn{display:inline-flex!important;align-items:center!important;justify-content:center!important;gap:9px!important;height:42px!important;padding:0 22px!important;border-radius:999px!important;border:1px solid transparent!important;font-family:var(--fb)!important;font-weight:700!important;font-size:var(--fs-md)!important;cursor:pointer!important;position:relative!important;overflow:hidden!important;transition:transform .3s var(--ease),box-shadow .3s var(--ease),background .3s,border-color .3s,color .3s!important}
      section#main-section .btn-primary{background:linear-gradient(100deg,var(--brand),var(--brand-deep))!important;color:#fff!important}
      section#main-section .btn-primary::after{content:""!important;position:absolute!important;top:0!important;left:-60%!important;width:40%!important;height:100%!important;background:linear-gradient(115deg,transparent,rgba(255,255,255,.35),transparent)!important;transform:skewX(-20deg)!important;transition:left .6s var(--ease)!important}
      section#main-section .btn-primary:hover::after{left:130%!important}
      section#main-section .btn-primary:hover{transform:translateY(-2px)!important;box-shadow:0 14px 28px -12px rgba(0,131,200,.8)!important}
      section#main-section .btn-red{background:var(--red)!important;color:#fff!important}
      section#main-section .btn-red:hover{transform:translateY(-2px)!important;box-shadow:0 14px 28px -12px rgba(192,0,0,.7)!important}
      section#main-section .btn-ghost{background:transparent!important;border-color:var(--line-2)!important;color:var(--ink)!important}
      section#main-section .btn-ghost:hover{border-color:var(--brand)!important;color:var(--brand-ink)!important;transform:translateY(-2px)!important}
      section#main-section .btn svg{width:15px!important;height:15px!important;flex:none!important}
      section#main-section .hero{position:relative!important;overflow:hidden!important;isolation:isolate!important;background:radial-gradient(1100px 620px at 82% -20%,rgba(0,131,200,.20),transparent 62%),radial-gradient(900px 520px at -12% 12%,rgba(79,224,208,.13),transparent 58%),linear-gradient(180deg,var(--soft-a),var(--soft-b) 62%,var(--bg))!important;border-bottom:1px solid var(--line)!important}
      section#main-section .hero-video{position:absolute!important;inset:0!important;width:100%!important;height:100%!important;object-fit:cover!important;z-index:0!important;opacity:.46!important;filter:saturate(.6) contrast(1.02)!important}
      section#main-section .hero-veil{position:absolute!important;inset:0!important;z-index:1!important;pointer-events:none!important;background:linear-gradient(100deg,color-mix(in srgb,var(--soft-a) 93%,transparent) 0%,color-mix(in srgb,var(--soft-a) 86%,transparent) 34%,color-mix(in srgb,var(--soft-b) 64%,transparent) 68%,color-mix(in srgb,var(--soft-b) 72%,transparent) 100%),linear-gradient(180deg,transparent 62%,var(--bg) 100%)!important}
      section#main-section .hero > .wrap{position:relative!important;z-index:2!important}
      section#main-section .hero-credit{position:absolute!important;right:22px!important;bottom:12px!important;z-index:2!important;font-family:var(--fb)!important;font-size:var(--fs-xs)!important;letter-spacing:.08em!important;text-transform:uppercase!important;color:var(--ink-3)!important;opacity:.75!important;pointer-events:none!important}
      section#main-section .hero-in{padding-top:calc(var(--cs-hdr,0px) + 40px)!important;padding-bottom:26px!important;display:grid!important;grid-template-columns:minmax(0,1.35fr) minmax(280px,.85fr)!important;gap:56px!important;align-items:center!important}
      section#main-section .hero h1{font-size:var(--fs-h1)!important;margin:18px 0 0!important;letter-spacing:-.028em!important}
      section#main-section .hero .deck{margin-top:20px!important;max-width:60ch!important;font-size:var(--fs-lg)!important;color:var(--ink-2)!important}
      section#main-section .hero-actions{display:flex!important;flex-wrap:wrap!important;gap:12px!important;margin-top:28px!important}
      section#main-section .hero-pad{height:56px!important}
      @media(max-width:960px){section#main-section .hero-in{grid-template-columns:minmax(0,1fr)!important;gap:34px!important;align-items:start!important;padding-top:calc(var(--cs-hdr,0px) + 28px)!important}}
      section#main-section .facts-float{perspective:1200px!important}
      section#main-section[data-anim="on"] .facts-float{animation:panelFloat 7.5s ease-in-out infinite!important}
      @keyframes panelFloat{0%,100%{transform:translate3d(0,0,0)}50%{transform:translate3d(0,-10px,0)}}
      section#main-section .facts-float:hover,section#main-section .facts-float:focus-within{animation-play-state:paused!important}
      section#main-section .hero-facts{position:relative!important;display:grid!important;border:1px solid var(--line)!important;border-radius:16px!important;background:var(--card)!important;overflow:hidden!important;box-shadow:0 30px 56px -34px var(--sh-facts),0 2px 8px var(--sh-facts-2)!important;transform-style:preserve-3d!important;will-change:transform!important;transition:transform .55s var(--ease),box-shadow .55s var(--ease)!important}
      section#main-section .facts-float:hover .hero-facts{box-shadow:0 38px 66px -34px rgba(0,131,200,.55),0 2px 8px rgba(10,25,45,.08)!important}
      section#main-section .hero-facts dl{margin:0!important}
      section#main-section .hero-facts::after{content:""!important;position:absolute!important;left:0!important;right:0!important;bottom:0!important;height:3px!important;background:linear-gradient(90deg,var(--brand),var(--teal))!important;transform-origin:left!important;transition:transform .7s var(--ease) .3s!important}
      section#main-section[data-anim="on"] .hero-facts:not(.in)::after{transform:scaleX(0)!important}
      section#main-section .facts-head{display:flex!important;align-items:center!important;justify-content:space-between!important;gap:12px!important;padding:12px 18px!important;border-bottom:1px solid var(--line)!important;background:var(--bg-2)!important}
      section#main-section .facts-cap{font-family:var(--fb)!important;font-weight:700!important;font-size:var(--fs-xs)!important;letter-spacing:.13em!important;text-transform:uppercase!important;color:var(--ink-3)!important}
      section#main-section .facts-rule{flex:none!important;width:34px!important;height:2px!important;border-radius:2px!important;background:linear-gradient(90deg,var(--brand),var(--teal))!important;transform-origin:right!important;transition:transform .8s var(--ease) .5s!important}
      section#main-section[data-anim="on"] .hero-facts:not(.in) .facts-rule{transform:scaleX(0)!important}
      section#main-section .fact{display:grid!important;grid-template-columns:168px minmax(0,1fr)!important;border-bottom:1px solid var(--line)!important;position:relative!important;overflow:hidden!important}
      section#main-section .fact:last-child{border-bottom:0!important}
      section#main-section .fact::before{content:""!important;position:absolute!important;left:0!important;top:0!important;bottom:0!important;width:2px!important;background:linear-gradient(180deg,var(--brand),var(--teal))!important;transform:scaleY(0)!important;transform-origin:top!important;transition:transform .5s var(--ease)!important}
      section#main-section .fact:hover::before{transform:scaleY(1)!important}
      section#main-section .fact:hover{background:var(--bg-2)!important}
      section#main-section .fact dt,section#main-section .fact dd{margin:0!important;padding:13px 18px!important;font-size:var(--fs-sm)!important}
      section#main-section .fact dt{font-family:var(--fb)!important;font-weight:700!important;color:var(--ink-3)!important;letter-spacing:.05em!important;text-transform:uppercase!important;font-size:var(--fs-xs)!important;border-right:1px solid var(--line)!important;display:flex!important;align-items:center!important;gap:9px!important;white-space:nowrap!important}
      section#main-section .fact .fi{width:14px!important;height:14px!important;flex:none!important;color:var(--ink-3)!important;transition:color .35s var(--ease)!important}
      section#main-section .fact:hover .fi{color:var(--brand-ink)!important}
      section#main-section .fact dd{color:var(--ink)!important;font-weight:600!important;transition:transform .35s var(--ease)!important}
      section#main-section .fact:hover dd{transform:translateX(3px)!important}
      section#main-section[data-anim="on"] .fact{opacity:.28!important;transform:translateX(-9px)!important;transition:opacity .45s var(--ease),transform .45s var(--ease),background .3s!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact{opacity:1!important;transform:none!important;animation:factRead 1.5s var(--ease) both!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact::before{animation:factSweep 1.5s var(--ease) both!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact .fi{animation:factGlyph 1.5s var(--ease) both!important}
      @keyframes factRead{0%,10%{background:transparent}30%{background:var(--chip)}70%,100%{background:transparent}}
      @keyframes factSweep{0%,10%{transform:scaleY(0)}34%{transform:scaleY(1)}72%,100%{transform:scaleY(0)}}
      @keyframes factGlyph{0%,10%{color:var(--ink-3)}30%{color:var(--brand)}72%,100%{color:var(--ink-3)}}
      section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(1){transition-delay:.04s!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(2){transition-delay:.11s!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(3){transition-delay:.18s!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(4){transition-delay:.25s!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(5){transition-delay:.32s!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(1),section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(1)::before,section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(1) .fi{animation-delay:.46s!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(2),section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(2)::before,section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(2) .fi{animation-delay:.62s!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(3),section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(3)::before,section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(3) .fi{animation-delay:.78s!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(4),section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(4)::before,section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(4) .fi{animation-delay:.94s!important}
      section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(5),section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(5)::before,section#main-section[data-anim="on"] .hero-facts.in .fact:nth-child(5) .fi{animation-delay:1.10s!important}
      section#main-section .shell{display:grid!important;grid-template-columns:210px minmax(0,1fr)!important;gap:64px!important;max-width:1240px!important;margin:0 auto!important;padding:0 28px!important;align-items:start!important}
      section#main-section .rail{position:sticky!important;top:calc(var(--cs-hdr,0px) + 24px)!important;padding:52px 0 40px!important}
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
      section#main-section .rail-foot{margin-top:24px!important;padding-top:16px!important;border-top:1px solid var(--line)!important;font-size:var(--fs-sm)!important;color:var(--ink-3)!important}
      section#main-section .rail-foot a{font-weight:700!important;white-space:nowrap!important}
      @media(max-width:1080px){section#main-section .shell{grid-template-columns:minmax(0,1fr)!important;gap:0!important}section#main-section .rail{display:none!important}}
      section#main-section main{min-width:0!important;padding:52px 0 72px!important}
      section#main-section .sec{padding:46px 0!important;border-top:1px solid var(--line)!important}
      section#main-section .sec:first-of-type{border-top:0!important;padding-top:6px!important}
      section#main-section .sec > .eyebrow{margin-bottom:14px!important}
      section#main-section .sec h2{font-size:var(--fs-h2)!important}
      section#main-section .sec .lede{margin-top:16px!important;max-width:68ch!important;font-size:var(--fs-body)!important}
      section#main-section .sec p + p{margin-top:14px!important}
      section#main-section .stats{display:grid!important;grid-template-columns:repeat(3,minmax(0,1fr))!important;margin:32px 0 6px!important}
      section#main-section .stat{padding:4px 36px 2px!important;position:relative!important;min-width:0!important}
      section#main-section .stat:first-child{padding-left:0!important}
      section#main-section .stat:last-child{padding-right:0!important}
      section#main-section .stat + .stat::before{content:""!important;position:absolute!important;left:0!important;top:4px!important;bottom:12px!important;width:1px!important;background:var(--line)!important}
      @media(max-width:820px){section#main-section .stats{grid-template-columns:minmax(0,1fr)!important;margin-top:26px!important}section#main-section .stat{padding:24px 0 20px!important}section#main-section .stat:first-child{padding-top:4px!important}section#main-section .stat + .stat::before{left:0!important;right:0!important;top:0!important;bottom:auto!important;width:auto!important;height:1px!important}}
      section#main-section .stat .num{font-family:var(--fh)!important;font-weight:700!important;font-size:var(--fs-h1)!important;line-height:.95!important;letter-spacing:-.045em!important;color:var(--ink)!important;display:flex!important;align-items:flex-start!important;gap:2px!important;font-variant-numeric:tabular-nums!important;transition:color .4s var(--ease)!important}
      section#main-section .stat .num em{font-style:normal!important;font-variant-numeric:tabular-nums!important}
      section#main-section .stat .num span{color:var(--red)!important;font-size:.44em!important;line-height:1.4!important;font-weight:700!important;transition:transform .5s var(--ease),opacity .4s!important}
      section#main-section .stat.counting .num span{transform:translateY(5px) scale(.86)!important;opacity:.5!important}
      section#main-section .stat:hover .num{color:var(--brand-ink)!important}
      section#main-section .stat .rule{display:block!important;height:2px!important;width:100%!important;margin:18px 0 15px!important;border-radius:2px!important;background:linear-gradient(90deg,var(--brand),var(--teal))!important;transform-origin:left!important}
      section#main-section[data-anim="on"] .stat .rule{transform:scaleX(0)!important;transition:transform .95s var(--ease) .18s!important}
      section#main-section[data-anim="on"] .stat.in .rule{transform:scaleX(1)!important}
      section#main-section .stat h4{font-family:var(--fh)!important;font-size:var(--fs-xs)!important;font-weight:700!important;letter-spacing:.13em!important;text-transform:uppercase!important;color:var(--ink)!important}
      section#main-section .stat p{font-size:var(--fs-md)!important;color:var(--ink-3)!important;margin-top:11px!important;line-height:1.62!important;max-width:36ch!important}
      section#main-section[data-anim="on"] .stat{opacity:0!important;transform:translateY(14px)!important;transition:opacity .6s var(--ease),transform .6s var(--ease)!important}
      section#main-section[data-anim="on"] .stat.in{opacity:1!important;transform:none!important}
      section#main-section .gaps{list-style:none!important;margin:30px 0 6px!important;padding:0!important;position:relative!important;counter-reset:g!important}
      section#main-section .gaps ul,section#main-section .gaps ol{list-style:none!important;margin:0!important;padding:0!important}
      section#main-section .gaps>p{font-size:var(--fs-base)!important;line-height:1.7!important;color:var(--ink-2)!important;max-width:74ch!important}
      section#main-section .gaps::before{content:""!important;position:absolute!important;left:19px!important;top:10px!important;bottom:18px!important;width:1px!important;transform-origin:top!important;background:linear-gradient(180deg,var(--red),var(--line-2) 62%,transparent)!important}
      section#main-section[data-anim="on"] .gaps::before{transform:scaleY(0)!important;transition:transform 1.15s var(--ease) .08s!important}
      section#main-section[data-anim="on"] .gaps.in::before{transform:scaleY(1)!important}
      section#main-section .gaps li{display:grid!important;grid-template-columns:39px minmax(0,1fr)!important;gap:24px!important;align-items:start!important;padding:15px 0!important;position:relative!important;font-size:var(--fs-base)!important;line-height:1.7!important;color:var(--ink-2)!important;max-width:56ch!important;transition:color .3s var(--ease),transform .5s var(--ease),background-color .5s var(--ease)!important}
      section#main-section .gaps li.pop{transform:scale(1.3)!important;transform-origin:left center!important;z-index:2!important;background:var(--bg)!important;color:var(--ink)!important}
      section#main-section .gaps li.pop::before{color:var(--red)!important}
      @media(prefers-reduced-motion:reduce){section#main-section .gaps li{transition:none!important}section#main-section .gaps li.pop{transform:none!important}}
      section#main-section .gaps li::before{counter-increment:g!important;content:counter(g,decimal-leading-zero)!important;position:relative!important;z-index:1!important;text-align:center!important;font-family:var(--fh)!important;font-weight:700!important;font-size:var(--fs-md)!important;line-height:1.7!important;color:var(--ink-3)!important;letter-spacing:.03em!important;background:var(--bg)!important;padding:3px 0!important;transition:color .3s var(--ease),transform .35s var(--ease)!important}
      section#main-section .gaps li:hover::before{color:var(--red)!important;transform:scale(1.14)!important}
      section#main-section .gaps li:hover{color:var(--ink)!important}
      @media(max-width:640px){section#main-section .gaps li{grid-template-columns:32px minmax(0,1fr)!important;gap:16px!important}section#main-section .gaps::before{left:15.5px!important}}
      section#main-section[data-anim="on"] .gaps li{opacity:0!important;transform:translateY(11px)!important;transition:opacity .55s var(--ease),transform .55s var(--ease)!important}
      section#main-section[data-anim="on"] .gaps.in li{opacity:1!important;transform:none!important}
      section#main-section[data-anim="on"] .gaps.in li:nth-child(1){transition-delay:.14s!important}
      section#main-section[data-anim="on"] .gaps.in li:nth-child(2){transition-delay:.26s!important}
      section#main-section[data-anim="on"] .gaps.in li:nth-child(3){transition-delay:.38s!important}
      section#main-section[data-anim="on"] .gaps.in li:nth-child(4){transition-delay:.50s!important}
      section#main-section[data-anim="on"] .gaps.in li:nth-child(5){transition-delay:.62s!important}
      section#main-section[data-anim="on"] .gaps.in li:hover::before{transform:scale(1.14)!important}
      @keyframes ping{0%{box-shadow:0 0 0 0 rgba(0,131,200,.55)}70%{box-shadow:0 0 0 10px rgba(0,131,200,0)}100%{box-shadow:0 0 0 0 rgba(0,131,200,0)}}
      section#main-section .capx{margin-top:28px!important;display:grid!important}
      section#main-section .cx{display:grid!important;grid-template-columns:minmax(0,250px) minmax(0,1fr)!important;gap:24px!important;align-items:start!important;padding:26px 0!important;position:relative!important}
      section#main-section .cx::before{content:""!important;position:absolute!important;left:0!important;right:0!important;top:0!important;height:1px!important;background:var(--line)!important;transform-origin:left!important}
      section#main-section[data-anim="on"] .cx::before{transform:scaleX(0)!important;transition:transform .9s var(--ease)!important}
      section#main-section[data-anim="on"] .capx.in .cx::before{transform:scaleX(1)!important}
      section#main-section .cx::after{content:""!important;position:absolute!important;left:-20px!important;top:18px!important;bottom:18px!important;width:2px!important;border-radius:2px!important;background:linear-gradient(180deg,var(--brand),var(--teal))!important;transform:scaleY(0)!important;transition:transform .4s var(--ease)!important}
      section#main-section .cx:hover::after{transform:scaleY(1)!important}
      section#main-section .client-img{display:block!important;margin-top:28px!important;width:100%!important;max-width:520px!important;height:auto!important;border-radius:14px!important}
      section#main-section .cx h3{font-size:var(--fs-h3)!important;letter-spacing:-.018em!important;transition:color .3s!important}
      section#main-section .cx p{font-size:var(--fs-base)!important;line-height:1.68!important;color:var(--ink-2)!important;max-width:58ch!important}
      section#main-section .cx:hover h3{color:var(--brand-ink)!important}
      @media(max-width:880px){section#main-section .cx{grid-template-columns:minmax(0,1fr)!important;gap:4px!important;padding:22px 0!important}section#main-section .cx::after{left:-10px!important}}
      section#main-section[data-anim="on"] .cx h3,section#main-section[data-anim="on"] .cx p{opacity:0!important;transform:translateY(9px)!important;transition:opacity .55s var(--ease),transform .55s var(--ease),color .3s!important}
      section#main-section[data-anim="on"] .capx.in .cx h3,section#main-section[data-anim="on"] .capx.in .cx p{opacity:1!important;transform:none!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(1)::before{transition-delay:.02s!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(2)::before{transition-delay:.16s!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(3)::before{transition-delay:.30s!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(4)::before{transition-delay:.44s!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(1) h3{transition-delay:.24s!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(2) h3{transition-delay:.38s!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(3) h3{transition-delay:.52s!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(4) h3{transition-delay:.66s!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(1) p{transition-delay:.32s!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(2) p{transition-delay:.46s!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(3) p{transition-delay:.60s!important}
      section#main-section[data-anim="on"] .capx.in .cx:nth-child(4) p{transition-delay:.74s!important}
      section#main-section .quote{margin:30px 0 6px!important;position:relative!important;padding:8px 0 0 34px!important}
      section#main-section .quote::before{content:""!important;position:absolute!important;left:0!important;top:8px!important;bottom:6px!important;width:3px!important;border-radius:3px!important;background:linear-gradient(180deg,var(--brand),var(--teal))!important;transform-origin:top!important}
      section#main-section[data-anim="on"] .quote::before{transform:scaleY(0)!important;transition:transform .85s var(--ease) .05s!important}
      section#main-section[data-anim="on"] .quote.in::before{transform:scaleY(1)!important}
      section#main-section[data-anim="on"] .quote blockquote{opacity:0!important;transform:translateY(16px)!important;transition:opacity .75s var(--ease) .18s,transform .75s var(--ease) .18s!important}
      section#main-section[data-anim="on"] .quote.in blockquote{opacity:1!important;transform:none!important}
      section#main-section .quote blockquote{margin:0!important;padding:0!important;border:0!important;font-style:normal!important;font-family:var(--fh)!important;font-weight:400!important;font-size:16px!important;line-height:1.7!important;color:var(--ink)!important;letter-spacing:-.005em!important;max-width:68ch!important}
      section#main-section .quote blockquote p{margin:0 0 12px!important}
      section#main-section .quote blockquote p:last-child{margin-bottom:0!important}
      @media(max-width:640px){section#main-section .quote{padding-left:22px!important}}
      section#main-section .cons-embed{margin-top:28px!important}
      section#main-section .cons{margin-top:28px!important;border:1px solid var(--line-2)!important;border-radius:14px!important;overflow:hidden!important;background:var(--card)!important;box-shadow:0 34px 64px -44px var(--sh-cons)!important;transition:box-shadow .5s var(--ease),border-color .4s!important}
      section#main-section .cons:hover{border-color:rgba(0,131,200,.45)!important}
      section#main-section[data-anim="on"] .cons{opacity:0!important;transform:translateY(20px) scale(.985)!important;transform-origin:50% 0!important;transition:opacity .8s var(--ease),transform .8s var(--ease),box-shadow .5s var(--ease),border-color .4s!important}
      section#main-section[data-anim="on"] .cons.in{opacity:1!important;transform:none!important}
      section#main-section .cons-bar{display:flex!important;align-items:center!important;gap:12px!important;padding:10px 16px!important;border-bottom:1px solid var(--line)!important;background:linear-gradient(180deg,var(--bg-2),var(--card))!important}
      section#main-section .cons-bar .logo{display:inline-flex!important;align-items:center!important;flex:none!important;line-height:0!important}
      section#main-section .cons-bar .logo img{display:block!important;height:19px!important;width:auto!important}
      section#main-section .cons-sep{width:1px!important;height:17px!important;background:var(--line-2)!important;flex:none!important}
      section#main-section .cons-title{font-family:var(--fb)!important;font-size:var(--fs-sm)!important;font-weight:700!important;color:var(--ink-2)!important}
      section#main-section .cons-live{margin-left:auto!important;display:inline-flex!important;align-items:center!important;gap:7px!important;flex:none!important;font-family:var(--fb)!important;font-size:var(--fs-xs)!important;font-weight:700!important;letter-spacing:.1em!important;text-transform:uppercase!important;color:var(--brand-ink)!important;background:var(--chip)!important;border:1px solid rgba(0,131,200,.3)!important;padding:4px 11px!important;border-radius:999px!important}
      section#main-section .cons-live i{width:6px!important;height:6px!important;border-radius:50%!important;background:var(--teal)!important;flex:none!important}
      section#main-section[data-anim="on"] .cons-live i{animation:consPulse 2s ease-in-out infinite!important}
      @keyframes consPulse{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(79,224,208,.6)}50%{opacity:.5;box-shadow:0 0 0 6px rgba(79,224,208,0)}}
      section#main-section .cons-clock{font-family:var(--fh)!important;font-size:var(--fs-xs)!important;font-weight:700!important;color:var(--ink-3)!important;font-variant-numeric:tabular-nums!important;flex:none!important}
      @media(max-width:640px){section#main-section .cons-title{display:none!important}}
      section#main-section .cons-kpis{display:grid!important;grid-template-columns:repeat(4,minmax(0,1fr))!important;border-bottom:1px solid var(--line)!important}
      section#main-section .kpi{padding:14px 16px 13px!important;border-left:1px solid var(--line)!important;min-width:0!important}
      section#main-section .kpi:first-child{border-left:0!important}
      section#main-section .kpi .kl{display:block!important;font-family:var(--fb)!important;font-size:var(--fs-xs)!important;font-weight:700!important;letter-spacing:.12em!important;text-transform:uppercase!important;color:var(--ink-3)!important}
      section#main-section .kpi .kv{display:flex!important;align-items:baseline!important;gap:1px!important;margin-top:7px!important;font-family:var(--fh)!important;font-weight:700!important;font-size:var(--fs-h2s)!important;letter-spacing:-.03em!important;color:var(--ink)!important;font-variant-numeric:tabular-nums!important;line-height:1!important}
      section#main-section .kpi .kt{display:block!important;margin-top:7px!important;font-size:var(--fs-xs)!important;line-height:1.5!important;color:var(--ink-3)!important}
      @media(max-width:760px){section#main-section .cons-kpis{grid-template-columns:repeat(2,minmax(0,1fr))!important}section#main-section .kpi:nth-child(3){border-left:0!important}section#main-section .kpi:nth-child(3),section#main-section .kpi:nth-child(4){border-top:1px solid var(--line)!important}}
      section#main-section .cons-main{display:grid!important;grid-template-columns:minmax(0,1.32fr) minmax(0,1fr)!important}
      section#main-section .cons-q{padding:14px 0 8px!important;border-right:1px solid var(--line)!important;min-width:0!important}
      @media(max-width:880px){section#main-section .cons-main{grid-template-columns:minmax(0,1fr)!important}section#main-section .cons-q{border-right:0!important;border-bottom:1px solid var(--line)!important}}
      section#main-section .cons-h{display:flex!important;align-items:center!important;gap:10px!important;padding:0 16px 10px!important;font-family:var(--fb)!important;font-size:var(--fs-xs)!important;font-weight:700!important;letter-spacing:.12em!important;text-transform:uppercase!important;color:var(--ink-3)!important}
      section#main-section .cons-h b{margin-left:auto!important;color:var(--brand-ink)!important;letter-spacing:.08em!important}
      section#main-section .qrows{list-style:none!important;margin:0!important;padding:0!important;min-height:230px!important;overflow:hidden!important}
      section#main-section .qrow{display:grid!important;grid-template-columns:minmax(0,1fr) auto!important;gap:12px!important;align-items:center!important;padding:10px 16px!important;border-top:1px solid var(--line)!important}
      section#main-section .qrow .qm{display:block!important;font-family:var(--fh)!important;font-size:var(--fs-xs)!important;font-weight:700!important;color:var(--ink)!important;letter-spacing:-.01em!important}
      section#main-section .qrow .qd{display:block!important;font-size:var(--fs-xs)!important;color:var(--ink-3)!important;margin-top:2px!important;overflow:hidden!important;text-overflow:ellipsis!important;white-space:nowrap!important}
      section#main-section .qs{font-family:var(--fb)!important;font-size:var(--fs-xs)!important;font-weight:700!important;letter-spacing:.08em!important;text-transform:uppercase!important;padding:4px 10px!important;border-radius:999px!important;white-space:nowrap!important;border:1px solid transparent!important;flex:none!important}
      section#main-section .qs.ok{color:var(--brand-ink)!important;background:var(--chip)!important;border-color:rgba(0,131,200,.28)!important}
      section#main-section .qs.bk{color:var(--bk-ink)!important;background:rgba(79,224,208,.16)!important;border-color:rgba(79,224,208,.45)!important}
      section#main-section .qs.es{color:var(--red)!important;background:rgba(192,0,0,.08)!important;border-color:rgba(192,0,0,.28)!important}
      section#main-section .qs.wk{color:var(--ink-3)!important;background:var(--bg-2)!important;border-color:var(--line)!important}
      section#main-section[data-anim="on"] .qrows.sliding{transition:transform .5s var(--ease)!important;will-change:transform!important}
      section#main-section[data-anim="on"] .qrows:not(.sliding) .qrow.fresh > *{opacity:0!important}
      section#main-section[data-anim="on"] .qrow.fresh > *{transition:opacity .42s var(--ease) .12s!important}
      section#main-section .cons-call{padding:14px 16px 16px!important;min-width:0!important}
      section#main-section .cons-unit{display:flex!important;align-items:center!important;gap:11px!important;padding-bottom:12px!important;border-bottom:1px solid var(--line)!important}
      section#main-section .cons-unit .av{width:31px!important;height:31px!important;border-radius:9px!important;flex:none!important;display:flex!important;align-items:center!important;justify-content:center!important;background:var(--chip)!important;color:var(--brand-ink)!important}
      section#main-section .cons-unit .av svg{width:16px!important;height:16px!important}
      section#main-section .cons-unit b{display:block!important;font-family:var(--fh)!important;font-size:var(--fs-sm)!important;color:var(--ink)!important;font-weight:700!important}
      section#main-section .cons-unit em{display:block!important;font-style:normal!important;font-size:var(--fs-xs)!important;color:var(--ink-3)!important;margin-top:1px!important}
      section#main-section .tape{list-style:none!important;margin:13px 0 0!important;padding:0!important;display:grid!important;gap:10px!important;min-height:168px!important;align-content:start!important}
      section#main-section .tape li{font-size:var(--fs-sm)!important;line-height:1.58!important;color:var(--ink-2)!important;display:grid!important;grid-template-columns:52px minmax(0,1fr)!important;gap:10px!important;align-items:start!important}
      section#main-section .tape li i{font-style:normal!important;font-family:var(--fb)!important;font-size:var(--fs-xs)!important;font-weight:700!important;letter-spacing:.1em!important;text-transform:uppercase!important;color:var(--ink-3)!important;padding-top:3px!important}
      section#main-section .tape li.ag i{color:var(--brand-ink)!important}
      section#main-section .tape li.ag span{color:var(--ink)!important}
      section#main-section[data-anim="on"] .tape li{opacity:0!important;transform:translateY(8px)!important;transition:opacity .5s var(--ease),transform .5s var(--ease)!important}
      section#main-section[data-anim="on"] .tape li.said{opacity:1!important;transform:none!important}
      section#main-section .caret{display:inline-block!important;width:6px!important;height:12px!important;vertical-align:-2px!important;margin-left:4px!important;background:var(--brand)!important;border-radius:1px!important}
      section#main-section[data-anim="on"] .caret{animation:caretBlink 1.05s steps(1,end) infinite!important}
      @keyframes caretBlink{0%,49%{opacity:1}50%,100%{opacity:0}}
      section#main-section .cons-chart{border-top:1px solid var(--line)!important;padding:14px 16px 15px!important}
      section#main-section .chead{display:flex!important;align-items:center!important;gap:14px!important;flex-wrap:wrap!important;font-family:var(--fb)!important;font-size:var(--fs-xs)!important;font-weight:700!important;letter-spacing:.12em!important;text-transform:uppercase!important;color:var(--ink-3)!important}
      section#main-section .blegend{margin-left:auto!important;display:flex!important;gap:14px!important;align-items:center!important}
      section#main-section .blegend s{text-decoration:none!important;display:inline-flex!important;align-items:center!important;gap:6px!important}
      section#main-section .blegend s::before{content:""!important;width:9px!important;height:9px!important;border-radius:3px!important;background:var(--brand)!important}
      section#main-section .blegend s.n::before{background:var(--teal)!important}
      section#main-section .bars{display:grid!important;grid-template-columns:repeat(24,minmax(0,1fr))!important;gap:3px!important;align-items:end!important;height:82px!important;margin-top:12px!important}
      section#main-section .bars b{display:block!important;width:100%!important;border-radius:3px 3px 1px 1px!important;transform-origin:bottom!important;background:linear-gradient(180deg,var(--brand-glow),var(--brand-deep))!important;transition:filter .3s!important}
      section#main-section .bars b.n{background:linear-gradient(180deg,var(--teal),#1E9E96)!important}
      section#main-section .bars:hover b{filter:saturate(.55) opacity(.55)!important}
      section#main-section .bars b:hover{filter:none!important}
      section#main-section[data-anim="on"] .bars b{transform:scaleY(0)!important;transition:transform .75s var(--ease),filter .3s!important}
      section#main-section[data-anim="on"] .bars.drawn b{transform:scaleY(1)!important}
      section#main-section .bax{display:flex!important;justify-content:space-between!important;margin-top:8px!important;font-family:var(--fb)!important;font-size:var(--fs-xs)!important;font-weight:700!important;letter-spacing:.1em!important;color:var(--ink-3)!important}
      @media(max-width:640px){section#main-section .bars{gap:2px!important;height:66px!important}section#main-section .blegend{margin-left:0!important;width:100%!important}}
      section#main-section .cons-note{margin-top:14px!important;font-size:var(--fs-sm)!important;line-height:1.6!important;color:var(--ink-3)!important;max-width:74ch!important}
      section#main-section .cta-banner{margin:64px auto 0!important;max-width:1184px!important;border-radius:28px!important;padding:64px 44px!important;text-align:center!important;position:relative!important;overflow:hidden!important;color:#fff!important;background:linear-gradient(120deg,var(--cta-a),var(--cta-b),var(--cta-a),var(--cta-c))!important;border:1px solid var(--cta-line)!important}
      section#main-section .cta-banner::after{content:""!important;position:absolute!important;inset:0!important;pointer-events:none!important;z-index:1!important;background:radial-gradient(600px 260px at 50% -25%,rgba(0,168,232,.30),transparent 70%),radial-gradient(115% 135% at 50% 50%,var(--scrim-1),var(--scrim-2) 55%,var(--scrim-3) 100%)!important}
      section#main-section .cta-video{position:absolute!important;inset:0!important;width:100%!important;height:100%!important;object-fit:cover!important;z-index:0!important;filter:saturate(.95) contrast(1.04)!important}
      section#main-section .cta-banner h2{color:#fff!important;font-size:var(--fs-h2)!important;position:relative!important;z-index:2!important}
      section#main-section .cta-banner p{color:#D3E6F4!important;max-width:52ch!important;margin:16px auto 28px!important;position:relative!important;z-index:2!important}
      section#main-section .cta-actions{display:flex!important;gap:12px!important;justify-content:center!important;flex-wrap:wrap!important;position:relative!important;z-index:2!important}
      section#main-section .cta-banner .btn-ghost{border-color:rgba(255,255,255,.35)!important;color:#fff!important}
      section#main-section .cta-banner .btn-ghost:hover{border-color:#fff!important;color:#fff!important;background:rgba(255,255,255,.12)!important}
      section#main-section[data-anim="on"] .cta-banner h2,section#main-section[data-anim="on"] .cta-banner > p,section#main-section[data-anim="on"] .cta-actions{opacity:0!important;transform:translateY(18px)!important;transition:opacity .8s var(--ease),transform .8s var(--ease)!important}
      section#main-section[data-anim="on"] .cta-banner.in h2{opacity:1!important;transform:none!important}
      section#main-section[data-anim="on"] .cta-banner.in > p{opacity:1!important;transform:none!important;transition-delay:.13s!important}
      section#main-section[data-anim="on"] .cta-banner.in .cta-actions{opacity:1!important;transform:none!important;transition-delay:.26s!important}
      @media(max-width:640px){section#main-section .cta-banner{padding:40px 22px!important;border-radius:20px!important;margin-top:44px!important}}
      section#main-section[data-anim="on"] .reveal{opacity:.25!important;transform:translateY(22px)!important;transition:opacity .7s var(--ease),transform .7s var(--ease)!important}
      section#main-section[data-anim="on"] .reveal.in{opacity:1!important;transform:none!important}
      @media(prefers-reduced-motion:reduce){section#main-section,section#main-section *,section#main-section *::before,section#main-section *::after{animation:none!important;transition:none!important;scroll-behavior:auto!important}section#main-section .hero-video{opacity:.34!important}section#main-section .cta-video{opacity:.92!important}section#main-section .hero-facts{transform:none!important}section#main-section[data-anim="on"] .reveal{opacity:1!important;transform:none!important}}
      section#main-section .cs-modal{width:min(560px,calc(100vw - 32px))!important;max-width:none!important;max-height:calc(100vh - 32px)!important;max-height:calc(100dvh - 32px)!important;margin:auto!important;padding:0!important;border:1px solid var(--line-2)!important;border-radius:18px!important;background:var(--card)!important;color:var(--ink)!important;box-shadow:0 30px 80px -20px rgba(0,0,0,.55)!important;overflow:hidden!important}
      section#main-section .cs-modal::backdrop{background:rgba(6,10,18,.64);-webkit-backdrop-filter:blur(4px);backdrop-filter:blur(4px)}
      section#main-section .cs-modal-in{position:relative!important;max-height:calc(100vh - 34px)!important;max-height:calc(100dvh - 34px)!important;overflow-y:auto!important;overscroll-behavior:contain!important;padding:30px 28px 26px!important}
      section#main-section .cs-modal-x{position:absolute!important;top:10px!important;right:10px!important;width:44px!important;height:44px!important;display:grid!important;place-items:center!important;padding:0!important;border:0!important;border-radius:50%!important;background:transparent!important;color:var(--ink-2)!important;cursor:pointer!important;transition:background .2s,color .2s!important}
      section#main-section .cs-modal-x:hover,section#main-section .cs-modal-x:focus-visible{background:var(--chip)!important;color:var(--ink)!important}
      section#main-section .cs-modal-x svg{width:20px!important;height:20px!important}
      section#main-section .cs-modal h2{font-family:var(--fh)!important;font-size:var(--fs-h3)!important;font-weight:700!important;line-height:1.25!important;letter-spacing:-.01em!important;margin:0 48px 20px 0!important;color:var(--ink)!important}
      section#main-section .cs-modal-form{font-family:var(--fb)!important;font-size:var(--fs-base)!important;color:var(--ink-2)!important}
      section#main-section .cs-modal-form .frm_forms,section#main-section .cs-modal-form form,section#main-section .cs-modal-form fieldset,section#main-section .cs-modal-form .frm_form_fields,section#main-section .cs-modal-form .frm_fields_container{max-width:100%!important;margin:0!important;background:transparent!important;background-image:none!important;box-shadow:none!important}
      section#main-section .cs-modal-form label,section#main-section .cs-modal-form .frm_primary_label,section#main-section .cs-modal-form .frm_description{color:var(--ink-2)!important}
      section#main-section .cs-modal-form input:not([type=submit]):not([type=checkbox]):not([type=radio]):not([type=hidden]),section#main-section .cs-modal-form select,section#main-section .cs-modal-form textarea{width:100%!important;max-width:100%!important;box-sizing:border-box!important}
      section#main-section .cs-modal-form input:not([type=submit]):not([type=checkbox]):not([type=radio]):not([type=hidden]):not([type=button]),section#main-section .cs-modal-form select,section#main-section .cs-modal-form textarea{background:var(--bg-2)!important;background-image:none!important;color:var(--ink)!important;border:1px solid var(--line-2)!important;border-radius:10px!important;box-shadow:none!important;font-family:var(--fb)!important;font-size:var(--fs-base)!important;transition:border-color .2s,box-shadow .2s,background-color .3s,color .3s!important}
      section#main-section .cs-modal-form input:not([type=submit]):not([type=checkbox]):not([type=radio]):not([type=hidden]):not([type=button]):focus,section#main-section .cs-modal-form select:focus,section#main-section .cs-modal-form textarea:focus{outline:none!important;border-color:var(--brand)!important;box-shadow:0 0 0 3px var(--chip)!important}
      section#main-section .cs-modal-form input::placeholder,section#main-section .cs-modal-form textarea::placeholder{color:var(--ink-3)!important;opacity:1!important}
      section#main-section .cs-modal-form input:-webkit-autofill,section#main-section .cs-modal-form textarea:-webkit-autofill,section#main-section .cs-modal-form select:-webkit-autofill{-webkit-text-fill-color:var(--ink)!important;box-shadow:0 0 0 1000px var(--bg-2) inset!important;caret-color:var(--ink)!important}
      section#main-section .cs-modal-form select option{background:var(--card)!important;color:var(--ink)!important}
      section#main-section .cs-modal-form input[type=checkbox],section#main-section .cs-modal-form input[type=radio]{accent-color:var(--brand)!important}
      section#main-section .cs-modal-form .frm_required{color:var(--red)!important}
      section#main-section .cs-modal-form .frm_error,section#main-section .cs-modal-form .frm_error_style{color:var(--red)!important;background:transparent!important;border-color:transparent!important}
      section#main-section .cs-modal-form .frm_blank_field input,section#main-section .cs-modal-form .frm_blank_field select,section#main-section .cs-modal-form .frm_blank_field textarea{border-color:var(--red)!important}
      section#main-section .cs-modal-form .frm_message{background:var(--chip)!important;color:var(--ink)!important;border:1px solid var(--line-2)!important;border-radius:10px!important;padding:14px 16px!important}
      section#main-section .cs-modal-form .frm_button_submit,section#main-section .cs-modal-form [type=submit]{background:var(--brand)!important;color:#fff!important;border:0!important;border-radius:10px!important;font-family:var(--fb)!important;font-weight:600!important;cursor:pointer!important;transition:background-color .2s,box-shadow .2s!important}
      section#main-section .cs-modal-form .frm_button_submit:hover,section#main-section .cs-modal-form [type=submit]:hover,section#main-section .cs-modal-form .frm_button_submit:focus-visible,section#main-section .cs-modal-form [type=submit]:focus-visible{background:var(--brand-deep)!important;box-shadow:0 0 0 3px var(--chip)!important}
      section#main-section[data-theme="dark"] .cs-modal-form .frm_error,section#main-section[data-theme="dark"] .cs-modal-form .frm_error_style,section#main-section[data-theme="dark"] .cs-modal-form .frm_required{color:#FF8A8A!important}
      section#main-section[data-theme="dark"] .cs-modal-form .frm_blank_field input,section#main-section[data-theme="dark"] .cs-modal-form .frm_blank_field select,section#main-section[data-theme="dark"] .cs-modal-form .frm_blank_field textarea{border-color:#FF8A8A!important}
      @media(max-width:640px){section#main-section .cs-modal{width:calc(100vw - 20px)!important;max-height:calc(100vh - 20px)!important;max-height:calc(100dvh - 20px)!important;border-radius:16px!important}section#main-section .cs-modal-in{max-height:calc(100vh - 22px)!important;max-height:calc(100dvh - 22px)!important;padding:24px 18px 20px!important}section#main-section .cs-modal h2{margin-bottom:16px!important}}
    </style>

    <section id="main-section" class="fbb-landing cs-page" data-theme="dark">
      
      <section class="cs-sec cs-hero hero">
        <?php cs_video('cs_hero', 'hero-video'); ?>
        <div class="hero-veil" aria-hidden="true"></div>
        <?php if (cs_f('cs_hero_credit')) : ?><span class="hero-credit"><?php cs_e('cs_hero_credit'); ?></span><?php endif; ?>
        <div class="wrap hero-in">
          <div>
            <?php if (cs_f('cs_hero_eyebrow')) : ?><span class="eyebrow"><?php cs_e('cs_hero_eyebrow'); ?></span><?php endif; ?>
            <h1><?php echo esc_html(cs_f('case_study_heading') ? cs_f('case_study_heading') : get_the_title()); ?></h1>
            <?php if (cs_f('cs_hero_deck')) : ?><p class="deck"><?php cs_e('cs_hero_deck'); ?></p><?php endif; ?>
            <div class="hero-actions">
              <?php cs_btn('cs_hero_btn1', 'btn btn-primary', '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 1.8v8.4M4.6 7l3.4 3.4L11.4 7M2.2 13.2h11.6"/></svg>', 'csModalDownload'); ?>
              <?php cs_btn('cs_hero_btn2', 'btn btn-red', '', 'csModalExpert'); ?>
            </div>
          </div>
          <div class="facts-float">
          <div class="hero-facts">
            <div class="facts-head">
              <span class="facts-cap"><?php cs_e('cs_facts_caption'); ?></span>
              <span class="facts-rule" aria-hidden="true"></span>
            </div>
            <dl>
              <?php for ($n = 1; $n <= 5; $n++) : if (!cs_f("cs_fact_{$n}_label")) continue; ?>
              <div class="fact"><dt><?php printf($cs_svg, 'class="fi"', 20, 20, '1.5', $cs_fact_icons[$n - 1]); cs_e("cs_fact_{$n}_label"); ?></dt><dd><?php cs_e("cs_fact_{$n}_text"); ?></dd></div>
              <?php endfor; ?>
            </dl>
          </div>
          </div>
        </div>
        <div class="wrap"><div class="hero-pad"></div></div>
      </section>

      <div class="shell">
        
        <aside class="rail" aria-label="<?php echo esc_attr(cs_f('cs_rail_caption')); ?>">
          <span class="rail-cap"><?php cs_e('cs_rail_caption'); ?></span>
          <div class="rail-track">
            <span class="rail-thumb" id="railThumb" aria-hidden="true"></span>
            <ol id="rail">
              <?php $n = 0; foreach ($cs_nav as $cs_id => $cs_k) : ?>
              <li><a href="#<?php echo esc_attr($cs_id); ?>"><i><?php printf('%02d', ++$n); ?></i><span><?php echo esc_html(cs_f("cs_{$cs_k}_nav") ? cs_f("cs_{$cs_k}_nav") : cs_f("cs_{$cs_k}_eyebrow")); ?></span></a></li>
              <?php endforeach; ?>
            </ol>
          </div>
          <?php if (cs_f('cs_rail_foot_text') || cs_f('cs_rail_foot_label')) : ?>
          <p class="rail-foot"><?php cs_e('cs_rail_foot_text'); ?><br><?php cs_btn('cs_rail_foot', '', '', 'csModalExpert'); ?></p>
          <?php endif; ?>
        </aside>
        
        <main>
          <?php if (isset($cs_nav['impact'])) : ?>
          <section class="cs-sec cs-impact sec" id="impact">
            <span class="eyebrow"><?php cs_e('cs_impact_eyebrow'); ?></span>
            <h2><?php cs_e('cs_impact_title'); ?></h2>
            <?php if (cs_f('cs_impact_lede')) : ?><p class="lede"><?php cs_e('cs_impact_lede'); ?></p><?php endif; ?>
            <div class="stats">
              <?php for ($n = 1; $n <= 3; $n++) : $v = cs_f("impact_value_{$n}"); if ($v === null || $v === false || $v === '') continue; ?>
              <div class="stat reveal">
                <div class="num"><em data-count="<?php echo (int) $v; ?>"><?php echo (int) $v; ?></em><span><?php cs_e("impact_symbol_{$n}"); ?></span></div>
                <i class="rule" aria-hidden="true"></i>
                <h4><?php cs_e("impact_text_{$n}"); ?></h4>
                <p><?php cs_e("cs_stat_{$n}_text"); ?></p>
              </div>
              <?php endfor; ?>
            </div>
          </section>
          <?php endif; ?>
          <?php if (isset($cs_nav['client'])) : ?>
          <section class="cs-sec cs-client sec" id="client">
            <span class="eyebrow"><?php cs_e('cs_client_eyebrow'); ?></span>
            <h2><?php cs_e('cs_client_title'); ?></h2>
            <?php cs_paras('about_client', 'lede'); ?>
            <?php $cs_ci = cs_url('about_client_image_impact_value'); if ($cs_ci !== '') : ?><img class="client-img" src="<?php echo esc_url($cs_ci); ?>" alt="" loading="lazy"><?php endif; ?>
          </section>
          <?php endif; ?>
          <?php if (isset($cs_nav['words'])) : ?>
          <section class="cs-sec cs-words sec" id="words">
            <span class="eyebrow"><?php cs_e('cs_words_eyebrow'); ?></span>
            <figure class="quote">
              <blockquote><?php echo wp_kses_post(cs_f('quote')); ?></blockquote>
            </figure>
          </section>
          <?php endif; ?>
          <?php if (isset($cs_nav['challenge'])) : ?>
          <section class="cs-sec cs-challenge sec" id="challenge">
            <span class="eyebrow"><?php cs_e('cs_challenge_eyebrow'); ?></span>
            <h2><?php cs_e('cs_challenge_title'); ?></h2>
            <?php if (cs_f('cs_challenge_lede')) : ?><p class="lede"><?php cs_e('cs_challenge_lede'); ?></p><?php endif; ?>
            <div class="gaps"><?php echo wp_kses_post(cs_f('key_challenges')); ?></div>
          </section>
          <?php endif; ?>
          <?php if (isset($cs_nav['howitworks'])) : ?>
          <section class="cs-sec cs-routing sec" id="howitworks">
            <span class="eyebrow"><?php cs_e('cs_routing_eyebrow'); ?></span>
            <h2><?php cs_e('cs_routing_title'); ?></h2>
            <?php if (cs_f('cs_routing_lede')) : ?><p class="lede"><?php cs_e('cs_routing_lede'); ?></p><?php endif; ?>
            <?php $cs_routing_html = (string) cs_f('cs_routing_html'); if ($cs_routing_html !== '') : ?>
            <div class="cons-embed"><?php echo $cs_routing_html; ?></div>
            <?php endif; ?>
          </section>
          <?php endif; ?>
          <?php if (isset($cs_nav['solution'])) : ?>
          <section class="cs-sec cs-solution sec" id="solution">
            <span class="eyebrow"><?php cs_e('cs_solution_eyebrow'); ?></span>
            <h2><?php cs_e('cs_solution_title'); ?></h2>
            <?php if (cs_f('solution_description')) : ?><p class="lede"><?php cs_e('solution_description'); ?></p><?php endif; ?>
            <div class="capx">
              <?php for ($n = 1; $n <= 5; $n++) : if (!cs_f("solution_{$n}_heading")) continue; ?>
              <div class="cx">
                <h3><?php cs_e("solution_{$n}_heading"); ?></h3>
                <p><?php cs_e("solution_{$n}_description"); ?></p>
              </div>
              <?php endfor; ?>
            </div>
          </section>
          <?php endif; ?>
          <?php if (isset($cs_nav['console'])) : ?>
          <section class="cs-sec cs-console sec" id="console">
            <span class="eyebrow"><?php cs_e('cs_console_eyebrow'); ?></span>
            <h2><?php cs_e('cs_console_title'); ?></h2>
            <?php if (cs_f('cs_console_lede')) : ?><p class="lede"><?php cs_e('cs_console_lede'); ?></p><?php endif; ?>
            <?php $cs_console_html = (string) cs_f('cs_console_html'); if ($cs_console_html !== '') : ?>
            <div class="cons-embed"><?php echo $cs_console_html; ?></div>
            <?php endif; ?>
          </section>
          <?php endif; ?>
          <?php if (isset($cs_nav['shift'])) : ?>
          <section class="cs-sec cs-shift sec" id="shift">
            <span class="eyebrow"><?php cs_e('cs_shift_eyebrow'); ?></span>
            <h2><?php cs_e('cs_shift_title'); ?></h2>
            <?php if (cs_f('cs_shift_lede')) : ?><p class="lede"><?php cs_e('cs_shift_lede'); ?></p><?php endif; ?>
            <?php $cs_shift_html = (string) cs_f('cs_shift_html'); if ($cs_shift_html !== '') : ?>
            <div class="cons-embed"><?php echo $cs_shift_html; ?></div>
            <?php endif; ?>
          </section>
          <?php endif; ?>
        </main>

      </div>

      <?php if (cs_f('cs_cta_title')) : ?>
        <section class="cs-sec cs-cta cta-banner">
          <?php cs_video('cs_cta', 'cta-video'); ?>
          <h2><?php cs_e('cs_cta_title'); ?></h2>
          <?php if (cs_f('cs_cta_text')) : ?><p><?php cs_e('cs_cta_text'); ?></p><?php endif; ?>
          <div class="cta-actions">
            <?php cs_btn('cs_cta_btn1', 'btn btn-red', '', 'csModalExpert'); ?>
            <?php cs_btn('cs_cta_btn2', 'btn btn-ghost'); ?>
          </div>
        </section>
      <?php endif; ?>
      
      <?php foreach (array('csModalDownload' => array('cs_modal_download_title', 98), 'csModalExpert' => array('cs_modal_expert_title', 100)) as $cs_mid => $cs_m) : ?>
      <dialog class="cs-modal" id="<?php echo $cs_mid; ?>" aria-labelledby="<?php echo $cs_mid; ?>Title">
        <div class="cs-modal-in">
          <button class="cs-modal-x" type="button" data-cs-close aria-label="Close"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg></button>
          <h2 id="<?php echo $cs_mid; ?>Title"><?php cs_e($cs_m[0]); ?></h2>
          <div class="cs-modal-form"><?php echo do_shortcode('[formidable id=' . (int) $cs_m[1] . ']'); ?></div>
        </div>
      </dialog>
      <?php endforeach; ?>
    
    </section>

    <script>
      (function () {
        "use strict";
        var root = document.querySelector("section.fbb-landing");
        if (!root) return;
        var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        var canAnimate = !reduce && "IntersectionObserver" in window;
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
        function css(el, k, v) { if (v === "") el.style.removeProperty(k); else el.style.setProperty(k, v, "important"); }
        var hdr = document.getElementById("site-header") || document.querySelector("header");
        function syncHdr() {
          var h = 0;
          if (hdr && /fixed|sticky/.test(getComputedStyle(hdr).position)) h = Math.max(0, Math.round(hdr.getBoundingClientRect().bottom - (root.getBoundingClientRect().top + window.pageYOffset)));
          css(root, "--cs-hdr", h + "px");
        }
        syncHdr();
        window.addEventListener("load", syncHdr);
        window.addEventListener("resize", syncHdr);
        var links = Array.prototype.slice.call(document.querySelectorAll("#rail a"));
        var thumb = document.getElementById("railThumb");
        var secs = links.map(function (a) { return document.getElementById(a.getAttribute("href").slice(1)); });
        function syncRail() {
          var best = 0;
          for (var i = 0; i < secs.length; i++) if (secs[i] && secs[i].getBoundingClientRect().top - 220 <= 0) best = i;
          links.forEach(function (a, i) { a.classList.toggle("on", i === best); });
          var link = links[best];
          if (thumb && link) {
            css(thumb, "height", link.offsetHeight + "px");
            css(thumb, "transform", "translateY(" + link.offsetTop + "px)");
          }
        }
        var ticking = false;
        window.addEventListener("scroll", function () {
          if (ticking) return;
          ticking = true;
          requestAnimationFrame(function () { syncRail(); ticking = false; });
        }, { passive: true });
        window.addEventListener("resize", syncRail);
        syncRail();
        if (canAnimate) {
          root.setAttribute("data-anim", "on");
          var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
              if (!e.isIntersecting) return;
              e.target.classList.add("in");
              io.unobserve(e.target);
            });
          }, { threshold: 0.12, rootMargin: "0px 0px -40px 0px" });
          root.querySelectorAll(".stats").forEach(function (grid) {
            Array.prototype.forEach.call(grid.children, function (el, i) { css(el, "transition-delay", i * 105 + "ms"); });
          });
          root.querySelectorAll(".reveal, .hero-facts, .gaps, .capx, .cons, .quote, .cta-banner")
            .forEach(function (el) { io.observe(el); });
        }
        function runCounter(card) {
          var el = card.querySelector("[data-count]");
          if (!el) { card.classList.add("done"); return; }
          var target = parseInt(el.getAttribute("data-count"), 10);
          function finish() {
            if (card.classList.contains("done")) return;
            el.textContent = target;
            card.classList.remove("counting");
            card.classList.add("done");
            document.removeEventListener("visibilitychange", onHide);
          }
          function onHide() { if (document.hidden) finish(); }
          if (reduce || !isFinite(target)) { finish(); return; }
          if (document.hidden) {
            var onShow = function () {
              if (document.hidden) return;
              document.removeEventListener("visibilitychange", onShow);
              runCounter(card);
            };
            document.addEventListener("visibilitychange", onShow);
            return;
          }
          var start = null, dur = 1100;
          card.classList.add("counting");
          document.addEventListener("visibilitychange", onHide);
          setTimeout(finish, dur + 220);
          function step(now) {
            if (card.classList.contains("done")) return;
            if (start === null) start = now;
            var p = Math.min(1, (now - start) / dur);
            el.textContent = Math.round(target * (1 - Math.pow(1 - p, 4)));
            if (p < 1) requestAnimationFrame(step); else finish();
          }
          requestAnimationFrame(step);
        }

        var cards = Array.prototype.slice.call(root.querySelectorAll(".stat"));
        if (canAnimate) {
          var cio = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
              if (!e.isIntersecting) return;
              cio.unobserve(e.target);
              runCounter(e.target);
            });
          }, { threshold: 0.5 });
          cards.forEach(function (c) { cio.observe(c); });
        } else {
          cards.forEach(function (c) { c.classList.add("done"); });
        }
        var panel = document.querySelector(".facts-float .hero-facts");
        var heroEl = document.querySelector(".hero");
        if (panel && heroEl && !reduce && window.matchMedia("(hover: hover) and (pointer: fine)").matches) {
          var tilting = false;
          heroEl.addEventListener("mousemove", function (ev) {
            if (tilting) return;
            tilting = true;
            requestAnimationFrame(function () {
              var b = heroEl.getBoundingClientRect();
              var nx = Math.max(-1, Math.min(1, ((ev.clientX - b.left) / b.width - 0.5) * 2));
              var ny = Math.max(-1, Math.min(1, ((ev.clientY - b.top) / b.height - 0.5) * 2));
              css(panel, "transform", "rotateX(" + (-ny * 3).toFixed(2) + "deg) rotateY(" + (nx * 3).toFixed(2) + "deg)");
              tilting = false;
            });
          });
          heroEl.addEventListener("mouseleave", function () { css(panel, "transform", ""); });
          document.addEventListener("visibilitychange", function () { if (document.hidden) css(panel, "transform", ""); });
        }
        var gapsEl = root.querySelector(".gaps");
        if (gapsEl && canAnimate) {
          var gapItems = Array.prototype.slice.call(gapsEl.querySelectorAll("li")), gapAt = 0, gapTimer = null;
          function gapStep() {
            gapItems.forEach(function (el) { el.classList.remove("pop"); });
            gapItems[gapAt++ % gapItems.length].classList.add("pop");
          }
          function gapStop() { clearInterval(gapTimer); gapTimer = null; gapItems.forEach(function (el) { el.classList.remove("pop"); }); }
          if (gapItems.length) {
            new IntersectionObserver(function (entries) {
              entries.forEach(function (e) {
                if (e.isIntersecting && !gapTimer) { gapStep(); gapTimer = setInterval(gapStep, 3000); }
                else if (!e.isIntersecting) gapStop();
              });
            }, { threshold: 0.25 }).observe(gapsEl);
            document.addEventListener("visibilitychange", function () { if (document.hidden) gapStop(); });
          }
        }
        var cons = document.getElementById("cons");
        if (cons) {
          var consClock = document.getElementById("consClock");
          var qrows = document.getElementById("qrows");
          var tape = Array.prototype.slice.call(document.querySelectorAll("#tape li"));
          var bars = document.getElementById("bars");
          var kpis = Array.prototype.slice.call(cons.querySelectorAll(".kpi"));
          var INBOX = [];
          try { INBOX = JSON.parse(document.getElementById("consInbox").textContent) || []; } catch (e) {}
          var inboxAt = 0, tapeAt = 0, rowH = 0, sliding = false, started = false;
          var qTimer = null, clockTimer = null, tapeTimer = null, slideTimer = null;
          var hm = consClock ? /^(\d{1,2}):(\d{2})$/.exec(consClock.textContent.trim()) : null;
          var minutes = hm ? (+hm[1] * 60 + +hm[2]) % 1440 : 0;

          function paintClock() {
            var h = Math.floor(minutes / 60) % 24, m = minutes % 60;
            if (consClock) consClock.textContent = (h < 10 ? "0" : "") + h + ":" + (m < 10 ? "0" : "") + m;
          }
          function measureQueue() {
            var first = qrows.querySelector(".qrow");
            var h = first ? first.getBoundingClientRect().height : 0;
            if (h < 8) return;
            rowH = h;
            css(qrows, "min-height", "0px");
            css(qrows, "height", (h * 5) + "px");
          }
          function trimQueue(n) { while (qrows.children.length > n) qrows.removeChild(qrows.lastElementChild); }
          function endSlide() {
            clearTimeout(slideTimer); slideTimer = null;
            if (!sliding) return;
            sliding = false;
            qrows.classList.remove("sliding");
            css(qrows, "transform", "");
            var f = qrows.querySelector(".qrow.fresh");
            if (f) f.classList.remove("fresh");
            trimQueue(5);
          }
          function pushCall() {
            endSlide();
            if (!INBOX.length) return;
            var c = INBOX[inboxAt++ % INBOX.length];
            var li = document.createElement("li");
            li.className = "qrow fresh";
            li.innerHTML = '<span><span class="qm"></span><span class="qd"></span></span><span class="qs"></span>';
            li.querySelector(".qm").textContent = c.m;
            li.querySelector(".qd").textContent = c.d;
            li.querySelector(".qs").className = "qs " + c.s;
            li.querySelector(".qs").textContent = c.t;
            qrows.insertBefore(li, qrows.firstChild);
            trimQueue(6);
            if (!rowH) measureQueue();
            if (!rowH || reduce) { trimQueue(5); li.classList.remove("fresh"); return; }
            sliding = true;
            css(qrows, "transform", "translateY(-" + rowH + "px)");
            void qrows.offsetHeight;
            qrows.classList.add("sliding");
            css(qrows, "transform", "translateY(0)");
            slideTimer = setTimeout(endSlide, 640);
          }
          function tapeStep() {
            if (tapeAt < tape.length) {
              tape[tapeAt++].classList.add("said");
              tapeTimer = setTimeout(tapeStep, 1500);
            } else {
              tapeTimer = setTimeout(function () {
                tape.forEach(function (li) { li.classList.remove("said"); });
                tapeAt = 0;
                tapeTimer = setTimeout(tapeStep, 720);
              }, 5200);
            }
          }
          function startConsole() {
            if (!started) {
              started = true;
              kpis.forEach(runCounter);
              if (bars) bars.classList.add("drawn");
            }
            if (!rowH) measureQueue();
            if (!qTimer) qTimer = setInterval(pushCall, 2700);
            if (!clockTimer) clockTimer = setInterval(function () { minutes = (minutes + 1) % 1440; paintClock(); }, 3400);
            if (!tapeTimer) tapeStep();
          }
          function stopConsole() {
            endSlide();
            clearInterval(qTimer); qTimer = null;
            clearInterval(clockTimer); clockTimer = null;
            clearTimeout(tapeTimer); tapeTimer = null;
          }

          paintClock();
          measureQueue();
          if (document.fonts && document.fonts.ready) document.fonts.ready.then(measureQueue);
          var qrt = null;
          window.addEventListener("resize", function () {
            clearTimeout(qrt);
            qrt = setTimeout(function () { endSlide(); rowH = 0; measureQueue(); }, 180);
          });

          if (!canAnimate) {
            kpis.forEach(function (k) { k.classList.add("done"); });
            tape.forEach(function (li) { li.classList.add("said"); });
            if (bars) bars.classList.add("drawn");
          } else {
            if (bars) Array.prototype.forEach.call(bars.children, function (b, i) { css(b, "transition-delay", (i * 26) + "ms"); });
            new IntersectionObserver(function (entries) {
              entries.forEach(function (e) { if (e.isIntersecting) startConsole(); else stopConsole(); });
            }, { threshold: 0.2 }).observe(cons);
            document.addEventListener("visibilitychange", function () { if (document.hidden) stopConsole(); });
          }
        }
        root.querySelectorAll(".cs-modal").forEach(function (d) {
          if (typeof d.showModal !== "function") return;
          function open() { if (!d.open) { d.showModal(); document.documentElement.style.overflow = "hidden"; } }
          d.addEventListener("close", function () { if (!root.querySelector(".cs-modal[open]")) document.documentElement.style.overflow = ""; });
          d.addEventListener("click", function (e) { if (e.target === d) d.close(); });
          var x = d.querySelector("[data-cs-close]");
          if (x) x.addEventListener("click", function () { d.close(); });
          root.querySelectorAll('[data-cs-modal="' + d.id + '"]').forEach(function (a) {
            a.addEventListener("click", function (e) { e.preventDefault(); open(); });
          });
          if (d.querySelector(".frm_message, .frm_error_style, .frm_blank_field")) open();
        });
        var clips = Array.prototype.slice.call(root.querySelectorAll("video"));
        if (reduce) {
          clips.forEach(function (v) { v.removeAttribute("autoplay"); v.pause(); });
        } else if (clips.length) {
          var vio = "IntersectionObserver" in window ? new IntersectionObserver(function (entries) {
            entries.forEach(function (e) { if (e.isIntersecting) e.target.play().catch(function () {}); else e.target.pause(); });
          }, { threshold: 0.05 }) : null;
          clips.forEach(function (v) {
            var play = v.play();
            if (play && play.catch) play.catch(function () {});
            if (vio) vio.observe(v);
          });
          document.addEventListener("visibilitychange", function () { if (document.hidden) clips.forEach(function (v) { v.pause(); }); });
        }
      })();
    </script>

    <?php
    if (function_exists('child_theme_custom_footer')) echo child_theme_custom_footer();
    wp_footer();
    ?>
  </body>

</html>