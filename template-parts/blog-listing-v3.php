<?php
/*
Template Name: Blog Listing v3
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Filterable index for one post type - blog-post by default, see $ith_cfg below.
 *
 * Filtering, searching and paging all happen in WP_Query, not in the browser.
 * The HTML prototype filtered the cards it already had in the DOM, which cannot
 * work once there is a second page - it would only ever filter the current six.
 * All state lives in the query string, so a filter survives paging, bookmarking,
 * sharing and the back button, and the page needs no JavaScript to work.
 */

$ith_per_page = 6;

// Everything post-type specific. Another listing template sets $ith_cfg (any subset)
// and includes this file - see case-study-listing-v3.php.
$ith_cfg = array_merge( array(
	'post_type' => 'blog-post',
	'eyebrow'   => 'ITHENA &middot; Blog',
	'h1_b'      => 'Field notes',
	'h1'        => 'from the connected factory',
	'lede'      => 'What agentic AI, automation and service look like once they reach the plant floor - written by the people building ITHENA&rsquo;s platforms.',
	'video'     => 'https://dev-website.ithena.app/wp-content/uploads/2026/09/ecommerce-hero-parts-video.mp4',
	'latest'    => 'Latest blog',
	'one'       => 'article',
	'many'      => 'articles',
	'read'      => 'Read article',
	'pages'     => 'Blog pages',
), isset( $ith_cfg ) ? (array) $ith_cfg : array() );

/* ---------- request state, every bit of it untrusted ---------- */

// "pg", not "paged": WordPress owns "paged" on a singular request and
// redirect_canonical will bounce ?paged=2 off a page URL.
$ith_pg = isset( $_GET['pg'] ) ? max( 1, (int) $_GET['pg'] ) : 1;
$ith_q  = isset( $_GET['q'] ) ? sanitize_text_field( wp_unslash( $_GET['q'] ) ) : '';

// Only the taxonomies actually attached to this post type can be filtered on.
$ith_taxes = array();
foreach ( get_object_taxonomies( $ith_cfg['post_type'], 'objects' ) as $ith_t ) {
	if ( $ith_t->public && $ith_t->show_ui ) $ith_taxes[ $ith_t->name ] = $ith_t;
}

// A taxonomy can be shared with other post types, and hide_empty counts those too.
// Scoping get_terms to this type's published IDs lists only terms these posts carry.
// ponytail: loads every published ID of the type; fine into the low thousands.
$ith_ids = get_posts( array(
	'post_type'   => $ith_cfg['post_type'],
	'post_status' => 'publish',
	'numberposts' => -1,
	'fields'      => 'ids',
) );
if ( ! $ith_ids ) $ith_taxes = array(); // an empty object_ids would mean "any post"

// Checked terms arrive as tax_<taxonomy>[]=slug. The prefix keeps the parameter clear
// of the taxonomy's own query var - ?category[]=x would confuse WordPress itself.
$ith_sel = array();
foreach ( array_keys( $ith_taxes ) as $ith_tname ) {
	$ith_raw = isset( $_GET[ 'tax_' . $ith_tname ] ) ? (array) wp_unslash( $_GET[ 'tax_' . $ith_tname ] ) : array();
	$ith_raw = array_filter( array_map( function ( $v ) {
		return is_scalar( $v ) ? sanitize_title( (string) $v ) : '';
	}, $ith_raw ) );
	if ( $ith_raw ) $ith_sel[ $ith_tname ] = array_values( array_unique( $ith_raw ) );
}

/* ---------- the query ---------- */

$ith_args = array(
	'post_type'           => $ith_cfg['post_type'],
	'post_status'         => 'publish',
	'posts_per_page'      => $ith_per_page,
	'paged'               => $ith_pg,
	'ignore_sticky_posts' => true,
);
if ( $ith_sel ) {
	// OR throughout: a post carrying any checked term, in any taxonomy, is a hit.
	$ith_args['tax_query'] = array( 'relation' => 'OR' );
	foreach ( $ith_sel as $ith_tname => $ith_slugs ) {
		$ith_args['tax_query'][] = array(
			'taxonomy' => $ith_tname,
			'field'    => 'slug',
			'terms'    => $ith_slugs,
		);
	}
}
if ( $ith_q !== '' ) $ith_args['s'] = $ith_q;

$ith_loop     = new WP_Query( $ith_args );
$ith_filtered = ( $ith_sel || $ith_q !== '' );
$ith_self     = get_permalink();
// ?customers unlocks the Customers filter; keep it on every link and form submit back to this page.
if ( isset( $_GET['customers'] ) ) $ith_self = add_query_arg( 'customers', '1', $ith_self );

// The filter state as query args, for the pager base and anything else that must keep it.
$ith_state = array();
foreach ( $ith_sel as $ith_tname => $ith_slugs ) $ith_state[ 'tax_' . $ith_tname ] = $ith_slugs;
if ( $ith_q !== '' ) $ith_state['q'] = $ith_q;

if ( ! function_exists( 'ith_v3_url' ) ) {
	/** This page's URL with the given filter state, always back at page 1. */
	function ith_v3_url( $args, $base ) {
		$args = array_filter( $args, function ( $v ) { return $v !== '' && $v !== null && $v !== array(); } );
		return add_query_arg( $args, $base );
	}
	/** One inline sprite icon. */
	function ith_v3_svg( $id, $w = '1.8', $class = '' ) {
		return '<svg class="' . esc_attr( $class ) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="' . esc_attr( $w )
			. '" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="' . esc_attr( $id ) . '"/></svg>';
	}
}

// Astra renders #content > .ast-container boxed by default; 'page-builder' is Astra's own
// full-bleed content layout (max-width:100%; padding:0) - no CSS override needed.
add_filter('astra_get_content_layout', function () { return 'page-builder'; });
add_filter('astra_page_layout', function () { return 'no-sidebar'; });
// A transparent header sits on top of the content; force it opaque so the page starts below it.
add_filter('astra_is_transparent_header', '__return_false');

get_header();

?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Noto+Sans:wght@400;700&display=swap');
  .site-content .ast-container{display:block!important}
  section#main-section,section#main-section *:not(svg):not(svg *){all:revert}
  section#main-section,section#main-section *,section#main-section *::before,section#main-section *::after{box-sizing:border-box!important;margin:0!important;padding:0!important}
  section#main-section{--blue:#0083C8!important;--blue-d:#006AA3!important;--blue-l:#4FB0E0!important;--acc-t:#006AA3!important;--acc:#BFE5F8!important;--red:#C00000!important;--sa:#FFFFFF!important;--tint:#E7F3FB!important;--head:#0A1B29!important;--body:#3A4A57!important;--muted:#657787!important;--line:rgba(10,27,41,.10)!important;--line-2:rgba(10,27,41,.18)!important;--plate:#E7F1F8!important;--sh:0 20px 46px -22px rgba(0,50,85,.34)!important;--card:#FFFFFF!important;--sh-lg:0 30px 60px -24px rgba(0,60,100,.42)!important;--ez:cubic-bezier(.2,0,0,1)!important;--wrap:1440px!important;--hdr-off:124px;--pad:clamp(20px,4vw,44px)!important;--font-head:"Noto Sans",sans-serif!important;--font-body:"Inter",sans-serif!important;--fs-label:12px!important;--fs-small:14px!important;--fs-body:16.5px!important;--fs-lede:19px!important;--fs-h3:22px!important;--fs-h2:34px!important;--fs-display:clamp(36px,5.2vw,50px)!important;display:block!important;font-family:var(--font-body)!important;color:var(--body)!important;background:var(--sa)!important;font-size:var(--fs-body)!important;line-height:1.6!important;font-weight:400!important;-webkit-font-smoothing:antialiased!important;transition:background-color .3s ease,color .3s ease!important}
  section#main-section[data-theme="dark"]{--acc-t:#3FA9E0!important;--red:#FF8A8A!important;--sa:#0A0A0B!important;--tint:#111113!important;--head:#F2F3F5!important;--body:rgba(228,230,235,.8)!important;--muted:#9A9FA8!important;--line:rgba(255,255,255,.09)!important;--line-2:rgba(255,255,255,.16)!important;--plate:#17181B!important;--card:#17181B!important;--sh:0 18px 44px -24px rgba(0,0,0,.62)!important;--sh-lg:0 44px 90px -34px rgba(0,0,0,.72)!important;color-scheme:dark!important}
  section#main-section *{font-family:inherit!important;font-style:normal!important}
  section#main-section ul{list-style:none!important}
  section#main-section a{color:inherit!important;text-decoration:none!important}
  section#main-section button{font:inherit!important;color:inherit!important;background:none!important;border:0!important;border-radius:0!important;padding:0!important;cursor:pointer!important}
  section#main-section input{font:inherit!important;color:inherit!important}
  section#main-section img,section#main-section svg{display:block!important;max-width:100%!important}
  section#main-section :focus-visible{outline:2px solid var(--blue)!important;outline-offset:3px!important;border-radius:8px!important}
  section#main-section .ithv3-sprite{position:absolute!important;width:0!important;height:0!important}
  section#main-section .wrap{max-width:var(--wrap)!important;margin:0 auto!important;padding-left:var(--pad)!important;padding-right:var(--pad)!important}
  section#main-section h1,section#main-section h2,section#main-section h3,section#main-section h4{font-family:var(--font-head)!important}
  section#main-section h1{font-size:var(--fs-display)!important;font-weight:700!important;line-height:1.05!important;color:var(--head)!important;letter-spacing:-.025em!important}
  section#main-section h2{font-size:clamp(26px,3.2vw,var(--fs-h2))!important;font-weight:700!important;line-height:1.15!important;color:var(--head)!important;letter-spacing:-.015em!important}
  section#main-section h3{font-size:var(--fs-h3)!important;font-weight:700!important;line-height:1.25!important;color:var(--head)!important;letter-spacing:-.01em!important}
  section#main-section h4{font-size:var(--fs-lede)!important;font-weight:700!important;line-height:1.3!important;color:var(--head)!important}
  section#main-section .lede{font-size:var(--fs-lede)!important;line-height:1.6!important;max-width:52ch!important;color:var(--body)!important;font-weight:300!important}
  section#main-section .eyebrow{display:inline-flex!important;align-items:center!important;gap:10px!important;font-size:var(--fs-label)!important;font-weight:700!important;text-transform:uppercase!important;letter-spacing:.16em!important;color:var(--acc-t)!important}
  section#main-section .eyebrow::before{content:""!important;width:22px!important;height:2px!important;background:var(--acc-t)!important;border-radius:2px!important}
  section#main-section .btn{display:inline-flex!important;align-items:center!important;justify-content:center!important;gap:10px!important;border-radius:999px!important;padding:14px 26px!important;font-size:var(--fs-body)!important;font-weight:700!important;line-height:1!important;white-space:nowrap!important;transition:background-color .2s,border-color .2s,transform .2s!important}
  section#main-section .btn:hover{transform:translateY(-2px)!important;text-decoration:none!important}
  section#main-section .btn-primary,section#main-section .btn-p{background:var(--blue)!important;color:#fff!important}
  section#main-section .btn-primary:hover,section#main-section .btn-p:hover{background:var(--blue-d)!important}
  section#main-section .readlink{display:inline-flex!important;align-items:center!important;gap:8px!important;font-weight:700!important;color:var(--acc-t)!important;font-size:var(--fs-small)!important}
  section#main-section .readlink svg{width:17px!important;height:17px!important;transition:transform .3s var(--ez)!important}
  section#main-section .ithv3-sec{display:block!important;position:relative!important}
  section#main-section .ithv3-sec--hero{position:relative!important;overflow:hidden!important;isolation:isolate!important;background:#061A2A!important;padding:clamp(64px,7vw,116px) 0 clamp(56px,6vw,92px)!important;min-height:80vh!important}
  section#main-section .hero-bg{position:absolute!important;inset:0!important;z-index:-2!important}
  section#main-section .hero-bg video{width:100%!important;height:100%!important;object-fit:cover!important;display:block!important}
  section#main-section .hero-bg::after{content:""!important;position:absolute!important;inset:0!important;background:linear-gradient(100deg,rgba(6,26,42,.95) 0%,rgba(6,26,42,.86) 44%,rgba(6,26,42,.55) 100%)!important}
  section#main-section .hero-in{position:relative!important;max-width:680px!important;top:15vh!important}
  section#main-section .ithv3-sec--hero .eyebrow{color:var(--blue-l)!important}
  section#main-section .ithv3-sec--hero .eyebrow::before{background:var(--blue-l)!important}
  section#main-section .ithv3-sec--hero h1{margin:18px 0 18px!important;max-width:25ch!important;color:#fff!important}
  section#main-section .ithv3-sec--hero h1 .b{color:var(--blue-l)!important;display:block!important}
  section#main-section .ithv3-sec--hero .lede{margin-bottom:clamp(24px,3vw,34px)!important;color:rgba(235,245,251,.86)!important}
  section#main-section .hsearch{display:flex!important;align-items:center!important;gap:8px!important;background:var(--card)!important;border:1px solid var(--line-2)!important;border-radius:999px!important;padding:7px 7px 7px 20px!important;max-width:520px!important;margin:0 auto!important;box-shadow:0 10px 30px -18px rgba(0,50,85,.4)!important}
  section#main-section .hsearch svg{width:19px!important;height:19px!important;color:var(--muted)!important;flex:none!important}
  section#main-section .hsearch input{flex:1!important;border:0!important;background:none!important;outline:none!important;min-width:0!important;color:var(--head)!important;font-weight:500!important}
  section#main-section .hsearch input::placeholder{color:var(--muted)!important}
  section#main-section .hsearch .btn{padding:12px 24px!important;font-size:var(--fs-small)!important}
  section#main-section .hsearch:focus-within{border-color:var(--blue)!important}
  section#main-section .index-layout{display:grid!important;grid-template-columns:272px minmax(0,1fr)!important;gap:clamp(22px,3vw,44px)!important;align-items:start!important}
  /* fixed site header is ~96px; offset clears it plus a gap, +32px for the WP admin bar */
  body.admin-bar section#main-section{--hdr-off:156px}
  section#main-section .fbar{position:sticky!important;top:var(--hdr-off)!important;max-height:calc(100vh - var(--hdr-off) - 24px)!important;overflow:auto!important;scrollbar-width:thin!important;scrollbar-color:var(--line-2) transparent!important;padding-right:6px!important}
  section#main-section .fform{display:flex!important;flex-direction:column!important;gap:10px!important}
  section#main-section .fbar .hsearch{max-width:none!important;margin:0!important;padding:6px 8px 6px 15px!important;box-shadow:none!important}
  section#main-section .fbar-h{font-family:var(--font-head)!important;font-size:var(--fs-label)!important;font-weight:700!important;letter-spacing:.14em!important;text-transform:uppercase!important;color:var(--muted)!important;margin:4px 0 0 2px!important}
  section#main-section .fgroup{display:block!important;height:auto!important;min-height:0!important;max-height:none!important;margin:0!important;padding:0!important;border:0!important;border-bottom:1px solid var(--line-2)!important;border-radius:0!important;background:none!important}
  section#main-section .fgroup>summary{display:flex!important;align-items:center!important;gap:10px!important;min-height:0!important;padding:11px 2px!important;cursor:pointer!important;list-style:none!important;font-family:var(--font-head)!important;font-weight:700!important;font-size:15px!important;color:var(--head)!important}
  section#main-section .fgroup>summary::-webkit-details-marker{display:none!important}
  section#main-section .fg-n{min-width:20px!important;height:20px!important;padding:0 6px!important;display:inline-grid!important;place-items:center!important;border-radius:999px!important;background:var(--blue)!important;color:#fff!important;font-family:var(--font-body)!important;font-size:11px!important;font-weight:700!important}
  section#main-section .fg-n[hidden]{display:none!important}
  section#main-section .fg-chev{width:17px!important;height:17px!important;flex:none!important;margin-left:auto!important;color:var(--muted)!important;transition:transform .25s var(--ez)!important}
  section#main-section .fgroup[open]>summary .fg-chev{transform:rotate(180deg)!important}
  section#main-section .fterms{margin:0!important;padding:0 0 8px!important;list-style:none!important;max-height:300px!important;overflow:auto!important;scrollbar-width:thin!important;scrollbar-color:var(--line-2) transparent!important}
  section#main-section .fterm{position:relative!important;display:flex!important;align-items:center!important;gap:10px!important;min-height:0!important;padding:5px 2px!important;line-height:1.35!important;border-radius:0!important;cursor:pointer!important;font-size:var(--fs-small)!important;color:var(--body)!important}
  section#main-section .fterms>li{margin:0!important;padding:0!important}
  @media (pointer:coarse){section#main-section .fgroup>summary,section#main-section .fterm{min-height:44px!important}}
  section#main-section .fterm:hover{color:var(--head)!important;background:var(--sa)!important}
  section#main-section .fterm{border-radius:6px!important;padding-inline:6px!important;transition:background-color .18s var(--ez)!important}
  section#main-section .fterm input{position:absolute!important;width:1px!important;height:1px!important;opacity:0!important;margin:0!important}
  section#main-section .fbox{width:18px!important;height:18px!important;flex:none!important;display:grid!important;place-items:center!important;border:1.5px solid var(--line-2)!important;border-radius:5px!important;background:var(--sa)!important;color:transparent!important;transition:background-color .18s var(--ez),border-color .18s var(--ez)!important}
  section#main-section .fbox svg{width:12px!important;height:12px!important}
  section#main-section .fterm input:checked+.fbox{background:var(--blue)!important;border-color:var(--blue)!important;color:#fff!important}
  section#main-section .fterm input:focus-visible+.fbox{outline:2px solid var(--blue)!important;outline-offset:2px!important}
  section#main-section .fterm input:checked~.fname{color:var(--head)!important;font-weight:700!important}
  section#main-section .fname{min-width:0!important}
  section#main-section .fn{flex:none!important;margin-left:auto!important;font-size:var(--fs-label)!important;font-weight:700!important;color:var(--muted)!important}
  section#main-section .factions{display:flex!important;align-items:center!important;gap:14px!important;flex-wrap:wrap!important;margin-top:2px!important}
  section#main-section .factions .btn{flex:1!important;padding:13px 20px!important;font-size:var(--fs-small)!important}
  section#main-section .fclear[hidden]{display:none!important}
  section#main-section .fclear{font-size:var(--fs-small)!important;font-weight:700!important;color:var(--red)!important;text-decoration:underline!important}
  section#main-section .cat{display:flex!important;align-items:center!important;gap:13px!important;text-align:left!important;position:relative!important;padding:14px 16px 17px!important;border-radius:12px!important}
  section#main-section .ithv3-sec--index{padding:clamp(36px,5vw,64px) 0 clamp(56px,7vw,96px)!important;scroll-margin-top:var(--hdr-off)!important}
  section#main-section .index-head{display:flex!important;flex-wrap:wrap!important;align-items:center!important;justify-content:space-between!important;gap:12px 24px!important;margin-bottom:clamp(22px,3vw,34px)!important}
  section#main-section .results{font-size:var(--fs-small)!important;color:var(--muted)!important}
  section#main-section .results b{color:var(--head)!important;font-weight:700!important}
  section#main-section .clearbtn{font-size:var(--fs-small)!important;font-weight:700!important;color:var(--red)!important;margin-left:14px!important}
  section#main-section .clearbtn[hidden]{display:none!important}
  section#main-section .grid{display:grid!important;grid-template-columns:repeat(auto-fill,minmax(min(100%,290px),1fr))!important;gap:clamp(18px,2vw,32px)!important}
  section#main-section .card{position:relative!important;z-index:1!important;display:flex!important;flex-direction:column!important;background:var(--card)!important;border:1px solid var(--line)!important;border-radius:15px!important;overflow:hidden!important;isolation:isolate!important;box-shadow:var(--sh)!important;min-width:0!important}
  section#main-section .card[hidden]{display:none!important}
  section#main-section .card-media{display:block!important;border-radius:14px 14px 0 0!important;aspect-ratio:16/10!important;overflow:hidden!important;background:var(--plate)!important;position:relative!important;z-index:2!important}
  section#main-section .card-media img{width:100%!important;height:100%!important;object-fit:cover!important;display:block!important}
  section#main-section .card-body{display:flex!important;flex-direction:column!important;flex:1!important;padding:20px 22px 22px!important}
  section#main-section .card-meta{display:flex!important;align-items:center!important;flex-wrap:wrap!important;gap:10px!important;font-size:var(--fs-label)!important;font-weight:700!important;letter-spacing:.06em!important;text-transform:uppercase!important;color:var(--muted)!important}
  section#main-section .card-meta .cat-tag{color:var(--acc-t)!important}
  section#main-section .card-meta .date{display:inline-flex!important;align-items:center!important;gap:6px!important;color:var(--muted)!important;letter-spacing:.02em!important}
  section#main-section .card-meta .date svg{width:14px!important;height:14px!important}
  section#main-section .card-meta .sep{width:1px!important;height:12px!important;background:var(--line-2)!important}
  section#main-section .card h3{margin-top:12px!important;font-weight:500!important}
  section#main-section .card-dek{margin-top:10px!important;font-size:var(--fs-small)!important;color:var(--body)!important;line-height:1.55!important;display:-webkit-box!important;-webkit-line-clamp:2!important;-webkit-box-orient:vertical!important;overflow:hidden!important}
  section#main-section .card-foot{display:flex!important;align-items:center!important;justify-content:space-between!important;gap:12px!important;margin-top:auto!important;padding-top:18px!important}
  section#main-section .card-foot .readlink{position:relative!important;z-index:2!important}
  section#main-section .card-title{background-image:linear-gradient(var(--blue),var(--blue))!important;background-size:0% 2px!important;background-position:0 100%!important;background-repeat:no-repeat!important;transition:background-size .3s var(--ez)!important;font-weight:500!important;}
  section#main-section .card-title::after{content:""!important;position:absolute!important;inset:0!important;z-index:1!important}
  section#main-section .empty{grid-column:1/-1!important;padding:48px 0!important;max-width:46ch!important}
  section#main-section .empty h4{margin-bottom:8px!important}
  section#main-section .empty[hidden]{display:none!important}
  section#main-section .empty-act{margin-top:16px!important}
  section#main-section .pager{display:flex!important;align-items:center!important;justify-content:center!important;flex-wrap:wrap!important;gap:8px!important;margin-top:clamp(32px,4vw,52px)!important}
  section#main-section .pager[hidden]{display:none!important}
  section#main-section .pg{min-width:44px!important;height:44px!important;padding:0 12px!important;display:inline-flex!important;align-items:center!important;justify-content:center!important;border-radius:8px!important;border:0!important;background:none!important;color:var(--body)!important;font-size:var(--fs-small)!important;font-weight:700!important;line-height:1!important}
  section#main-section .pg:hover:not(:disabled){color:var(--acc-t)!important}
  section#main-section .pg[aria-current="page"]{color:var(--blue)!important;font-size:19px!important}
  section#main-section .pg:disabled{opacity:.4!important;cursor:not-allowed!important}
  section#main-section .pg svg{width:18px!important;height:18px!important}
  section#main-section .pg-prev svg{transform:scaleX(-1)!important}
  section#main-section .pg-gap{min-width:26px!important;text-align:center!important;color:var(--muted)!important;font-weight:700!important}
  section#main-section[data-theme="dark"] .ithv3-sec--hero{background:#050506!important}
  section#main-section[data-theme="dark"] .hero-bg::after{background:linear-gradient(100deg,rgba(5,5,6,.95) 0%,rgba(5,5,6,.86) 44%,rgba(5,5,6,.55) 100%)!important}
  /* small laptops (1280-1440): tighter type + sidebar so cards breathe */
  @media (max-width:1440px){
  section#main-section{--fs-body:15.5px!important;--fs-lede:17px!important;--fs-h3:19px!important;--fs-small:13.5px!important;--fs-label:11.5px!important}
  section#main-section .index-layout{grid-template-columns:240px minmax(0,1fr)!important}
  section#main-section .card-body{padding:18px 18px 20px!important}
  section#main-section .card-foot{padding-top:14px!important}
  }
  @media (max-width:1024px){
  section#main-section .index-layout{grid-template-columns:1fr!important}
  section#main-section .fbar{position:static!important;max-height:none!important;overflow:visible!important}
  section#main-section .fform{display:grid!important;grid-template-columns:repeat(auto-fit,minmax(220px,1fr))!important;align-items:start!important}
  section#main-section .fbar .hsearch,section#main-section .fbar-h,section#main-section .factions{grid-column:1/-1!important}
  }
  @media (max-width:540px){
  section#main-section{--fs-h3:18px!important}
  }
  @media (max-width:640px){
  section#main-section .hero-in{top:0!important}
  }
  @media not (prefers-reduced-motion:reduce){
  section#main-section .card,section#main-section .card-media img,section#main-section .btn,section#main-section .pg{transition:transform .3s var(--ez),box-shadow .3s var(--ez),background-color .2s var(--ez),border-color .2s var(--ez),color .2s var(--ez)!important}
  section#main-section .btn:hover{transform:translateY(-2px)!important}
  section#main-section .card:hover,section#main-section .card:focus-within{box-shadow:var(--sh-lg)!important;border-color:var(--blue)!important;z-index:3!important;transform:translateY(-10px) scale(1.02)!important}
  section#main-section .card::before{content:""!important;position:absolute!important;inset:0 0 auto!important;height:3px!important;z-index:3!important;background:linear-gradient(90deg,var(--blue),var(--acc))!important;transform:scaleX(0)!important;transform-origin:left!important;transition:transform .4s var(--ez)!important}
  section#main-section .card:hover::before,section#main-section .card:focus-within::before{transform:none!important}
  section#main-section .card-media::after{content:""!important;position:absolute!important;inset:0!important;background:linear-gradient(180deg,transparent 52%,rgba(0,131,200,.3))!important;opacity:0!important;transition:opacity .35s var(--ez)!important}
  section#main-section .card:hover .card-media::after,section#main-section .card:focus-within .card-media::after{opacity:1!important}
  section#main-section .card:hover .card-media img,section#main-section .card:focus-within .card-media img{transform:scale(1.06)!important}
  section#main-section .card:hover .card-title,section#main-section .card:focus-within .card-title{background-size:100% 2px!important}
  section#main-section .card:hover .readlink svg,section#main-section .card:focus-within .readlink svg{transform:translateX(4px)!important}
  section#main-section .ld{opacity:0;transform:translateY(14px);animation:ith3-ld .6s var(--ez) forwards!important}
  section#main-section .ld2{animation-delay:.08s!important}
  section#main-section .ld3{animation-delay:.16s!important}
  @keyframes ith3-ld{to{opacity:1;transform:none}}
  section#main-section .rv{opacity:0!important;transform:translateY(20px)!important;transition:opacity .6s var(--ez),transform .6s var(--ez)!important}
  section#main-section .rv.in{opacity:1!important;transform:none!important}
  section#main-section .grid .rv{transition-delay:calc(var(--i,0) * 55ms)!important}
  section#main-section .grid.swap .card{opacity:.25!important;transition:opacity .18s var(--ez)!important}
  }
  /* --- server-rendered variants of two prototype components --- */
  section#main-section .pager .page-numbers{min-width:44px!important;height:44px!important;padding:0 12px!important;display:inline-flex!important;align-items:center!important;justify-content:center!important;border-radius:8px!important;border:0!important;background:none!important;color:var(--body)!important;font-size:var(--fs-small)!important;font-weight:700!important;line-height:1!important;transition:border-color .2s var(--ez),color .2s var(--ez)!important}
  section#main-section .pager a.page-numbers:hover{color:var(--acc-t)!important}
  section#main-section .pager .page-numbers.current{color:var(--blue)!important;font-size:19px!important}
  section#main-section .pager .page-numbers.dots{min-width:26px!important;border:0!important;background:none!important;color:var(--muted)!important}
  section#main-section .pager .page-numbers svg{width:18px!important;height:18px!important}
  section#main-section .pager .prev svg{transform:scaleX(-1)!important}
</style>

<section id="main-section" class="ithv3-listing" data-theme="dark">

  <svg class="ithv3-sprite" width="0" height="0" aria-hidden="true" focusable="false">
    <defs>
      <g id="v3-aether"><path d="M2 12h3.4l2.6-7.4L11.6 19l2.8-9.2L16.6 14H22"/></g>
      <g id="v3-arrow"><path d="M4.5 12h14.2M12.8 6l6 6-6 6"/></g>
      <g id="v3-search"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></g>
      <g id="v3-chev"><path d="M6 9.5l6 6 6-6"/></g>
      <g id="v3-check"><path d="M5 12.5l4.5 4.5L19 7"/></g>
      <g id="v3-cal"><rect x="3.5" y="5" width="17" height="15" rx="2.5"/><path d="M8 3v4M16 3v4M3.5 10h17"/></g>
      <g id="v3-factory"><path d="M3 21V10l6 4V10l6 4V6l6 4v11z"/><path d="M3 21h18"/></g>
      <g id="v3-erp"><path d="M4 7l8-4 8 4-8 4z"/><path d="M4 12l8 4 8-4M4 17l8 4 8-4"/></g>
      <g id="v3-plane"><path d="M10.2 2.5c.5-.5 1.3-.5 1.6.2l2.4 6 5.4 1.9c.8.3.9 1.4.1 1.8L14 15l-1 6-2-1-.5-4-3.5 1.5-1 2-1.4-.6.7-3.2-2.4-2.1 1.3-.9 3 .7z"/></g>
    </defs>
  </svg>

  <section class="ithv3-sec ithv3-sec--hero">
    <div class="hero-bg" aria-hidden="true">
      <video autoplay muted loop playsinline preload="metadata" tabindex="-1">
        <source src="<?php echo esc_url( $ith_cfg['video'] ); ?>" type="video/mp4">
      </video>
    </div>
    <div class="wrap">
      <div class="hero-in">
        <div class="hero-txt">
          <p class="eyebrow ld"><?php echo wp_kses_post( $ith_cfg['eyebrow'] ); ?></p>
          <h1 class="ld ld2"><span class="b"><?php echo wp_kses_post( $ith_cfg['h1_b'] ); ?></span><?php echo wp_kses_post( $ith_cfg['h1'] ); ?></h1>
          <p class="lede ld ld3">What agentic AI, automation and service look like once they reach the plant floor - written by the people building ITHENA&rsquo;s platforms.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="ithv3-sec ithv3-sec--index">
    <div class="wrap">
      <div class="index-layout">
        <aside class="fbar rv" aria-label="Filter <?php echo esc_attr( $ith_cfg['many'] ); ?>">
          <?php // GET, so every filter state is a plain bookmarkable URL and needs no JS. ?>
          <form class="fform" role="search" method="get" action="<?php echo esc_url( $ith_self ); ?>">
            <div class="hsearch">
              <?php echo ith_v3_svg( '#v3-search', '1.9' ); ?>
<?php if ( isset( $_GET['customers'] ) ) : ?><input type="hidden" name="customers" value="1"><?php endif; ?>
              <input type="search" name="q" value="<?php echo esc_attr( $ith_q ); ?>" placeholder="Search <?php echo esc_attr( $ith_cfg['many'] ); ?>" aria-label="Search <?php echo esc_attr( $ith_cfg['many'] ); ?> by title or topic" autocomplete="off">
            </div>
<?php if ( $ith_taxes ) : ?>
            <p class="fbar-h">Filter by</p>
<?php endif;
foreach ( $ith_taxes as $ith_tname => $ith_tobj ) :
	// The Customers filter is only offered on ?customers, or once a customer is already ticked.
	if ( 'customers' === $ith_tname && ! isset( $_GET['customers'] ) && empty( $ith_sel['customers'] ) ) continue;
	// ponytail: top 24 terms per taxonomy, by post count. Add a term search box inside
	// the dropdown if a taxonomy ever outgrows that.
	$ith_terms = get_terms( array(
		'taxonomy'   => $ith_tname,
		'object_ids' => $ith_ids,
		'orderby'    => 'count',
		'order'      => 'DESC',
		'number'     => 24,
	) );
	if ( is_wp_error( $ith_terms ) || ! $ith_terms ) continue;
	// Pick the busiest terms above, then list them A-Z.
	usort( $ith_terms, function ( $a, $b ) { return strnatcasecmp( $a->name, $b->name ); } );
	$ith_picked = isset( $ith_sel[ $ith_tname ] ) ? $ith_sel[ $ith_tname ] : array(); ?>
            <details class="fgroup fg-<?php echo esc_attr( $ith_tname ); ?>"<?php echo $ith_picked ? ' open' : ''; ?>>
              <summary><span class="fg-name"><?php echo esc_html( $ith_tobj->labels->name ); ?></span><span class="fg-n"<?php echo $ith_picked ? '' : ' hidden'; ?>><?php echo count( $ith_picked ); ?></span><?php echo ith_v3_svg( '#v3-chev', '2', 'fg-chev' ); ?></summary>
              <ul class="fterms">
<?php foreach ( $ith_terms as $ith_ti ) : ?>
                <li><label class="fterm"><input type="checkbox" name="tax_<?php echo esc_attr( $ith_tname ); ?>[]" value="<?php echo esc_attr( $ith_ti->slug ); ?>"<?php checked( in_array( $ith_ti->slug, $ith_picked, true ) ); ?>><span class="fbox"><?php echo ith_v3_svg( '#v3-check', '3' ); ?></span><span class="fname"><?php echo esc_html( $ith_ti->name ); ?></span><span class="fn"><?php echo esc_html( number_format_i18n( $ith_ti->count ) ); ?></span></label></li>
<?php endforeach; ?>
              </ul>
            </details>
<?php endforeach; ?>
            <div class="factions">
              <button class="btn btn-primary" type="submit">Apply filters</button>
<?php if ( $ith_filtered ) : ?>
              <a class="fclear" href="<?php echo esc_url( $ith_self ); ?>">Clear all</a>
<?php endif; ?>
            </div>
          </form>
        </aside>

        <div class="findex">
      <div class="index-head">
        <p class="eyebrow rv"><?php echo $ith_filtered ? 'Filtered' : esc_html( $ith_cfg['latest'] ); ?></p>
        <p class="results rv" role="status" aria-live="polite"><b><?php echo esc_html( number_format_i18n( $ith_loop->found_posts ) ); ?></b> <?php
			echo esc_html( 1 === (int) $ith_loop->found_posts ? $ith_cfg['one'] : $ith_cfg['many'] );
			if ( $ith_filtered ) : ?><a class="clearbtn" href="<?php echo esc_url( $ith_self ); ?>">Clear filter</a><?php endif; ?></p>
      </div>

      <div class="grid">
<?php if ( $ith_loop->have_posts() ) : $ith_i = 0; while ( $ith_loop->have_posts() ) : $ith_loop->the_post();
	$ith_link  = get_permalink();
	$ith_names = array();
	foreach ( array_keys( $ith_taxes ) as $ith_tn ) {
		foreach ( (array) get_the_terms( get_the_ID(), $ith_tn ) as $ith_pt ) {
			if ( $ith_pt instanceof WP_Term ) $ith_names[$ith_pt->taxonomy] = $ith_pt->name;
		}
	}
	$ith_dek = wp_trim_words( get_the_excerpt(), 26, '&hellip;' ); ?>
        <article class="card rv" style="--i:<?php echo (int) $ith_i++; ?>">
          <a class="card-media" href="<?php echo esc_url( $ith_link ); ?>" tabindex="-1" aria-hidden="true"><?php
			if ( has_post_thumbnail() ) the_post_thumbnail( 'medium_large', array( 'alt' => '', 'loading' => 'lazy', 'decoding' => 'async' ) );
          ?></a>
          <div class="card-body">
            <div class="card-meta">
              <?php if ( !empty( $ith_names['services'] ) || !empty( $ith_names['blog-solution'] ) ) : 
                echo '<span class="cat-tag">' . esc_html( !empty( $ith_names['services'] ) ? $ith_names['services'] : $ith_names['blog-solution'] ) . '</span><span class="sep"></span>';
              endif;
              ?>
              <span class="date"><?php echo ith_v3_svg( '#v3-cal', '1.7' ); ?><time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'd M Y' ) ); ?></time></span>
            </div>
            <h3><a class="card-title" href="<?php echo esc_url( $ith_link ); ?>"><?php the_title(); ?></a></h3>
            <?php if ( $ith_dek !== '' ) : ?><p class="card-dek"><?php echo esc_html( $ith_dek ); ?></p><?php endif; ?>
            <div class="card-foot">
              <a class="readlink" href="<?php echo esc_url( $ith_link ); ?>"><?php echo esc_html( $ith_cfg['read'] ); ?> <?php echo ith_v3_svg( '#v3-arrow' ); ?></a>
            </div>
          </div>
        </article>
<?php endwhile; wp_reset_postdata(); else : ?>
        <div class="empty">
          <h4>No <?php echo esc_html( $ith_cfg['many'] ); ?> match that yet</h4>
          <p>Try a different topic or search term, or show every <?php echo esc_html( $ith_cfg['one'] ); ?>.</p>
          <p class="empty-act"><a class="btn btn-primary" href="<?php echo esc_url( $ith_self ); ?>">Show all <?php echo esc_html( $ith_cfg['many'] ); ?></a></p>
        </div>
<?php endif; ?>
      </div>

<?php if ( $ith_loop->max_num_pages > 1 ) :
	// Built by hand rather than with add_query_arg, which would percent-encode the
	// %#% placeholder paginate_links needs. The active filter rides along in $base.
	$ith_base  = ith_v3_url( $ith_state, $ith_self );
	$ith_base .= ( strpos( $ith_base, '?' ) === false ? '?' : '&' ) . 'pg=%#%'; ?>
      <nav class="pager rv" aria-label="<?php echo esc_attr( $ith_cfg['pages'] ); ?>">
        <?php echo paginate_links( array(
			'base'      => $ith_base,
			'format'    => '',
			'current'   => $ith_pg,
			'total'     => (int) $ith_loop->max_num_pages,
			'mid_size'  => 1,
			'end_size'  => 1,
			'prev_text' => ith_v3_svg( '#v3-arrow' ),
			'next_text' => ith_v3_svg( '#v3-arrow' ),
        ) ); ?>
      </nav>
<?php endif; ?>
        </div>
      </div>
    </div>
  </section>

</section>

<script>
  (function(){
    "use strict";
    var root=document.querySelector('section.ithv3-listing');
    if(!root||root.hasAttribute("data-ith-ready")) return;
    root.setAttribute("data-ith-ready","");

    // The site header owns the theme when it is on the page; this is the standalone fallback.
    if(window.ithenaTheme){
      window.ithenaTheme.sync();
    }else{
      var themeToggle=document.getElementById('themeToggle');
      var stored=null; try{ stored=localStorage.getItem('ithena-theme'); }catch(e){}
      var setTheme=function(mode,persist){
        root.setAttribute('data-theme',mode);
        if(themeToggle) themeToggle.setAttribute('aria-pressed',mode==='dark'?'true':'false');
        if(persist){ try{ localStorage.setItem('ithena-theme',mode); }catch(e){} }
      };
      setTheme(stored==='light'?'light':'dark');
      if(themeToggle){
        themeToggle.addEventListener('click',function(){
          setTheme(root.getAttribute('data-theme')==='dark'?'light':'dark',true);
        });
      }
    }

    // Filtering, search and paging are server-side now - all that is left is the reveal.
    var $=function(s,c){return Array.prototype.slice.call((c||root).querySelectorAll(s));};
    var reduced=window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if(reduced){ $("video").forEach(function(v){ try{ v.pause(); v.removeAttribute("autoplay"); }catch(e){} }); }

    var targets=$(".rv");
    function reveal(el){ el.classList.add("in"); }
    if(!("IntersectionObserver" in window)||reduced){
      targets.forEach(reveal);
    }else{
      var io=new IntersectionObserver(function(es){
        es.forEach(function(e){ if(e.isIntersecting){ reveal(e.target); io.unobserve(e.target); } });
      },{rootMargin:"0px 0px -12% 0px",threshold:.12});
      targets.forEach(function(el){io.observe(el);});
      var sweep=function(){
        var pending=false;
        targets.forEach(function(el){
          if(el.classList.contains("in")) return;
          if(el.getBoundingClientRect().top < window.innerHeight){ reveal(el); io.unobserve(el); }
          else pending=true;
        });
        if(!pending) window.removeEventListener("scroll",sweep);
      };
      window.addEventListener("scroll",sweep,{passive:true});
    }
  })();
</script>

<?php get_footer(); ?>
