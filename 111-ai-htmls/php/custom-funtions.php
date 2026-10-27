<?php
/**
 * ITHENA redirects:
 *  - /upcoming-event/ and /past-event/ (and anything under them) -> /announcements/
 *  - every other 404 -> homepage
 * Paste into the child theme's functions.php, or require_once it from there.
 */
add_action( 'template_redirect', function () {
	$path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );

	// Compare from the site root even if WordPress lives in a subfolder.
	$base = trim( (string) wp_parse_url( home_url(), PHP_URL_PATH ), '/' );
	if ( $base !== '' && strpos( $path . '/', $base . '/' ) === 0 ) {
		$path = ltrim( substr( $path, strlen( $base ) ), '/' );
	}

	if ( preg_match( '#^(upcoming-event|past-event)(/|$)#i', $path ) ) {
		wp_safe_redirect( home_url( '/announcements/' ), 301 );
		exit;
	}

	// 302, not 301: a catch-all should not be cached forever by browsers for URLs that may exist later.
	if ( is_404() ) {
		wp_safe_redirect( home_url( '/' ), 302 );
		exit;
	}
} );
