<?php
/*
Template Name: Case Study Listing v3
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// Same page as the blog index, pointed at case studies. Filters are every public
// taxonomy registered on case-study-test, listing only terms those posts carry.
$ith_cfg = array(
	'post_type' => 'case-study-test',
	'eyebrow'   => 'ITHENA &middot; Case studies',
	'h1_b'      => 'Proof from the floor',
	'h1'        => 'how manufacturers put ITHENA to work',
	'lede'      => 'Real deployments across manufacturing, service and commerce - the problem, what we built, and the results it delivered.',
	'latest'    => 'Latest case studies',
	'one'       => 'case study',
	'many'      => 'case studies',
	'read'      => 'Read case study',
	'pages'     => 'Case study pages',
);

require __DIR__ . '/blog-listing-v3.php';
