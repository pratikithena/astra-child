<?php
/**
 * ITHENA - event post types are data, not pages.
 *
 * past-event and upcoming-event are read by the Announcements page. They have no
 * single or archive template of their own, so they get no public URL: the routing
 * is removed where the types are registered, and anything still pointing at one
 * (an indexed old permalink, a ?post_type= query, a feed) goes to /announcements/.
 */

defined( 'ABSPATH' ) || exit;

/**
 * The post types with no public face.
 */
function ith_private_event_types() {
	return array( 'past-event', 'upcoming-event' );
}

/**
 * Take the public routing off both types wherever they are registered - CPT UI,
 * a plugin, another theme file. Filtering the registration args is the root fix;
 * the alternative is chasing each URL shape one redirect at a time.
 *
 * public=false is what actually stops WordPress minting permalinks for them, so
 * show_ui and show_in_menu are pinned back on or the admin screens disappear with it.
 */
add_filter( 'register_post_type_args', 'ith_unpublish_event_types', 10, 2 );
function ith_unpublish_event_types( $args, $post_type ) {
	if ( ! in_array( $post_type, ith_private_event_types(), true ) ) {
		return $args;
	}

	$args['public']              = false;
	$args['publicly_queryable']  = false;  // no ?post_type= / ?p= front-end query
	$args['exclude_from_search'] = true;   // out of site search results
	$args['has_archive']         = false;  // no /past-event/ listing
	$args['rewrite']             = false;  // no pretty permalink rule
	$args['query_var']           = false;
	$args['show_in_nav_menus']   = false;  // out of Appearance > Menus
	$args['show_ui']             = true;   // but keep editing them
	$args['show_in_menu']        = true;

	return $args;
}

/**
 * Catch anything that still resolves to one of them and send it to Announcements.
 *
 * Needed as well as the filter above, because rewrite rules cached before this
 * file existed keep routing old pretty URLs, and search engines keep requesting
 * them for a long time after.
 *
 * Users who can edit posts are let through so the admin Preview button still
 * works - they are not "the public".
 */
add_action( 'template_redirect', 'ith_redirect_event_permalinks' );
function ith_redirect_event_permalinks() {
	$types = ith_private_event_types();

	$hit = is_singular( $types ) || is_post_type_archive( $types );
	if ( ! $hit ) {
		// covers ?post_type=past-event, feeds, and any stale rewrite rule
		$hit = (bool) array_intersect( (array) get_query_var( 'post_type' ), $types );
	}

	if ( ! $hit || current_user_can( 'edit_posts' ) ) {
		return;
	}

	// home_url, not site_url: site_url points at the WordPress install, which is
	// not where a visitor-facing page lives if WP ever moves into a subdirectory.
	wp_safe_redirect( home_url( '/announcements/' ), 301 );
	exit;
}
