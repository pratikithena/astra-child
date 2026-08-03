<?php
/**
 * Template Name: Application Overview Template
 */
    session_start();
    $sso_user = get_current_sso_user();
    $source = '';
    
    if ($sso_user) {
        $source = $sso_user['data']['source'];
    }

    // Get slug from query string
    $slug = isset($_GET['slug']) ? sanitize_title($_GET['slug']) : '';
    if(empty($slug)) {
        $slug = $source ? $source : '';
    }
?>

    <head>
        
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>App Selection Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <style>
            
            body {
                /* font-family: "Arial", Sans-serif; */
                background-color: #f8f9fa;
                margin: 0;
                padding: 0;
            }

            #cookie-notice, .progress-wrap{
                display: none;
            }

            /* Video Background Styles */
            .video-background {
                z-index: 0;
            }

            .banner {
                position: relative;
                min-height: 650px; /* Adjust as needed */
                display: flex;
                align-items: center;
                color: white;
            }

            /* Ensure video covers the entire space */
            .object-fit-cover {
                object-fit: cover;
            }

            /* Content positioning */
            .position-relative {
                position: relative;
            }

            .z-index-1 {
                z-index: 1;
            }

            /* Fallback if video doesn't load */
            .banner {
                background-color: #000; /* Fallback color */
                .app-overview-user{
                    font-size: 80px;
                }
                .app-overview-title{
                    font-size: 50px;
                }
            }

            /* .banner {
                position: relative;
                background-size: cover !important;
                padding: 80px 30px;
                color: white;
                height: 500px;
                z-index: 1;
                overflow: hidden;
                .app-overview-title{
                    font-size: 60px;
                }
            } 

            /*.banner::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgb(0 0 0 / 62%);
                z-index: 0;
            }

            .banner * {
                position: relative;
                z-index: 2;
            } */

            .other-apps .card {
                border-radius: 16px;
                overflow: hidden;
                background-size: cover;
                background-position: center;
                height: 200px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
                font-weight: 600;
                transition: transform 0.2s ease-in-out;
            }

            .card-link{
                text-decoration: none;
            }

            .other-apps .card:hover {
                transform: scale(1.02);
            }

            .section-title {
                font-weight: 600;
            }
        </style>
    
    </head>

    <body>

        <!-- Custom Navbar -->
        <?php echo child_theme_custom_headmenu(); ?>

        <?php
            // Fetch post using the slug
            $post = get_page_by_path($slug, OBJECT, 'application_overview');
            
            if ($post) {
                
                $post_id = $post->ID;

                // Get post title, content, and any meta
                $post_title = get_the_title($post_id);
                $post_content = apply_filters('the_content', $post->post_content);

                // Example: Fetch custom meta (adjust keys as needed)
                $main_title = get_post_meta($post_id, 'main_title', true);
                $sub_title = get_post_meta($post_id, 'sub_title', true);
                $feature_img = get_post_meta($post_id, 'feature_img', true);
                $banner_img = get_post_meta($post_id, 'banner_img', true);            
                $banner_overview_text = get_post_meta($post_id, 'banner_overview_text', true);

                if(!empty($banner_img)) {
                    $banner_img_url = wp_get_attachment_image_url($banner_img, 'full');
                }

            } else {
                // Handle missing post
                $post_title = 'Application Not Found';
                $post_content = '<p>The requested application could not be found.</p>';
                $app_synopsis = '';
                $banner_image = '';
            }
        
        ?>

        <!-- Banner Section with Video Background -->
        <div class="banner position-relative overflow-hidden" slug="<?= $slug ?>">
            
            <!-- Video Background -->
            <div class="video-background position-absolute top-0 start-0 w-100 h-100">
                <video autoplay muted loop playsinline class="w-100 h-100 object-fit-cover">
                <source src="https://dev.ithena.io/wp-content/uploads/2025/08/14180821_3840_2160_30fps-1.mp4" type="video/mp4">
                <!-- Fallback text if video can't load -->
                Your browser does not support the video tag.
                </video>
                <!-- Dark overlay for better text visibility -->
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
            </div>
            
            <div class="container position-relative z-index-1">
                <div class="row banner-content">
                    <div class="col-lg-8 text-white py-5">

                        <h1 class="fw-bold app-overview-user"> Welcome <?= $sso_user['data']['full_name'] ?></h1>

                        <h2 class="app-overview-title fw-bold mt-5">App: <?= esc_html($main_title) ?></h2>
                        <h3 class="fw-semibold app-overview-subtitle mb-4"><?= esc_html($sub_title) ?></h3>
                        <!-- CTA Button -->
                        <a href="#application-content" class="btn btn-primary btn-lg px-4 py-2">
                            Continue with <?= esc_html($main_title) ?> <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                    <div class="align-content-end col-lg-4 p-4 rounded text-white fs-5">
                        <?= wp_kses_post($banner_overview_text) ?>
                    </div>
                </div>
            </div>

        </div>

        <!-- Other Applications Section -->
        <?php 
            $other_apps = new WP_Query(array(
                'post_type' => 'application_overview',
                'posts_per_page' => -1, // Get all posts
                'post__not_in' => $post_id ? array($post_id) : array(),
                'orderby' => 'title',
                'order' => 'ASC'
            ));
            
            if ($other_apps->have_posts()) : 
            
        ?>
        <section class="py-5">
            <div class="container">
                <h2 class="mb-4 section-title"><?= esc_html__('Other Applications', 'textdomain') ?></h2>
                <div class="row g-4 other-apps">
                    <?php 
                        while ($other_apps->have_posts()) : 
                            $other_apps->the_post(); 
                            $app_main_title = get_post_meta(get_the_ID(), 'main_title', true) ?: get_the_title();
                            $feature_img_id = get_post_meta(get_the_ID(), 'feature_img', true);
                            $post_slug = $post->post_name;
                            $app_url = esc_url(site_url('/application-overview/?slug=' . $post_slug));
                            
                            // Try to get feature image from meta, fall back to featured image, then default
                            if ($feature_img_id) {
                                $feature_img_url = wp_get_attachment_image_url($feature_img_id, 'medium');
                            } else {
                                $feature_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                            }
                            
                            if (!$feature_img_url) {
                                $feature_img_url = 'https://source.unsplash.com/random/400x200?technology';
                            }
                        ?>
                        <div class="col-md-4">
                            <a href="<?= $app_url ?>" class="card-link" target="_blank">
                                <div class="card" 
                                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= esc_url($feature_img_url) ?>');">
                                    <h3 class="section-title"><?= esc_html($app_main_title) ?></h3>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; 
                        wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

    </body>
