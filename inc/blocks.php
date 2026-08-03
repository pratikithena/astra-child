<?php
/**
 * Custom Shortcode Blocks
 * File: /inc/blocks.php
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// =========================
// INDUSTRIES WE SERVE BLOCK
// =========================
add_shortcode('industries_we_serve', function() {
    
    // Check if block is enabled
    if (!get_field('enable_industries_we_serve')) return;

    // Section-level fields
    $industries_sectionclass       = get_field('industries_section_class');
    $industries_sectiontitle       = get_field('industries_section_title');
    $industries_sectiontitlemaroon   = get_field('industries_section_titlemaroon');
    $industries_sectiondescription = get_field('industries_section_description');

    // Get the parent ACF field (industries_block)
    $industries_block = get_field('industries_block');

    // Initialize empty array
    $industries = [];
    if ( $industries_block && is_array($industries_block) ) {
        // Determine total number of industry sets (based on number of icon fields)
        $total = 0;
        foreach ($industries_block as $key => $value) {
            if (strpos($key, '_icon') !== false) {
                $total++;
            }
        }
        // Loop through industries dynamically
        for ($i = 1; $i <= $total; $i++) {
            $industries[] = [
                'icon'        => $industries_block["industry_{$i}_icon"] ?? '',
                'title'       => $industries_block["industry_{$i}_title"] ?? '',
                'description' => $industries_block["industry_{$i}_description"] ?? '',
            ];
        }
    }

    ob_start(); ?>

     <section id="industries-we-serve-section-id" class="py-10 bg-gray-fade industries_we_serve_section <?= esc_attr($industries_sectionclass); ?>">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="section_title_fontsize pt-10 font-bold text-ithena-black mb-4">
                    <?= wp_kses_post($industries_sectiontitle); ?>
                    <?php if ($industries_sectiontitlemaroon): ?>
                        <span class="text-ithena-maroon">
                            <?= wp_kses_post($industries_sectiontitlemaroon); ?>
                        </span>
                    <?php endif; ?>
                </h2>
                <div class="section_desc_fontsize text-ithena-black mx-auto"><?= wp_kses_post( $industries_sectiondescription ); ?></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <?php 
                    $industries_title_fs = get_field('industries_section_title_fs');
                    $industries_desc_fs = get_field('industries_section_desc_fs');  

                    foreach ($industries as $industry): ?>
                    <div class="text-center">
                        
                        <div class="w-16 h-16 bg-ithena-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <?php if ( ! empty( $industry['icon'] ) ) : ?>
                                <img src="<?= esc_url( $industry['icon'] ); ?>" alt="<?= esc_attr( $industry['title']); ?>" 
                                    class="w-8 h-8 object-contain" />
                            <?php endif; ?>
                        </div>

                        <h3 class="<?= esc_attr($industries_title_fs); ?> font-semibold text-ithena-black mb-2"> <?= wp_kses_post($industry['title']); ?> </h3>
                        <div class="<?= esc_attr($industries_desc_fs); ?> text-ithena-black"> <?= wp_kses_post($industry['description']); ?> </div>

                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
});

// =========================
// METRICS SECTION BLOCK
// =========================
add_shortcode('metrics_section', function() {
    // Check if block is enabled
    if (!get_field('enable_metrics_section')) return;

    // Section-level fields
    $metrics_section_class       = get_field('metrics_section_class');
    $metrics_section_title       = get_field('metrics_section_title');
    $metrics_section_title_maroon = get_field('metrics_section_title_maroon');
    $metrics_section_description = get_field('metrics_section_description');

    // Get all metric fields from ACF
    $metrics_block = get_field('metrics_blocks');

    // Initialize array
    $metrics = [];

    if ( $metrics_block && is_array($metrics_block) ) {

        // Determine total number of metric sets based on icon fields
        $total = 0;
        foreach ($metrics_block as $key => $value) {
            if (strpos($key, '_icon') !== false) {
                $total++;
            }
        }

        // Loop through each metric dynamically
        for ($i = 1; $i <= $total; $i++) {
            $metrics[] = [
                'icon'  => $metrics_block["metric_{$i}_icon"] ?? '',
                'count' => $metrics_block["metric_{$i}_count"] ?? '',
                'countsign' => $metrics_block["metric_{$i}_countsign"] ?? '',
                'label' => $metrics_block["metric_{$i}_label"] ?? '',
            ];
        }
    }

    ob_start(); ?>
    
    <!-- Metrics Block --> 
     <section id="metrics-section-id" class="custom-section py-10 bg-white-fade metrics_section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="section_title_fontsize pt-10 font-bold text-ithena-black mb-4">
                    <?= wp_kses_post($metrics_section_title); ?>
                    <?php if ($metrics_section_title_maroon): ?>
                        <span class="text-ithena-maroon">
                            <?= wp_kses_post($metrics_section_title_maroon); ?>
                        </span>
                    <?php endif; ?>
                </h2>
                <div class="section_desc_fontsize text-ithena-black mx-auto"><?= wp_kses_post($metrics_section_description); ?></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php if (!empty($metrics)) : ?>
                    <?php foreach ($metrics as $metric) : ?>
                        <div class="text-center">
                            <?php if (!empty($metric['icon'])) : ?>
                                <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                    <!-- <i class="<?php //echo esc_attr($metric['icon']); ?> text-ithena-blue text-5xl"></i> -->
                                    <img src="<?= esc_url( $metric['icon'] ); ?>" 
                                        alt="<?= esc_attr( $metric['title']); ?>" 
                                        class="h-100 object-contain"
                                    />
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($metric['count'])) : ?>
                                <div class="text-36px font-bold text-ithena-black mb-2 flex justify-center items-baseline gap-1">
                                    <span class="metrics-counter" data-target="<?= esc_attr($metric['count']); ?>">0</span>
                                    <?php if (!empty($metric['countsign'])): ?>
                                        <span class="metrics-sign"><?= esc_html($metric['countsign']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($metric['label'])) : ?>
                                <h3 class="text-24px font-semibold text-ithena-black">
                                    <?= esc_html($metric['label']); ?>
                                </h3>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <script id="metrics-counter-animation">
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.metrics-counter');
            let animated = false;

            function animateCounters() {
                if (animated) return;
                animated = true;
                counters.forEach(counter => {
                    const target = parseInt(counter.dataset.target);
                    const increment = target / 100;
                    let current = 0;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        counter.textContent = Math.floor(current);
                    }, 20);
                });
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounters();
                    }
                });
            });

            counters.forEach(counter => {
                observer.observe(counter);
            });
        });
    </script>

    <?php
    return ob_get_clean();
});

// =========================
// applications_case_study_section block
// =========================
add_shortcode('applications_case_study_section', function() {

    // Check if section is enabled
    if (!get_field('enable_applications_case_study_section')) return;

    // Section-level fields
    $applications_case_study_section_class = get_field('applications_case_study_class');
    $applications_case_study_section_title = get_field('applications_case_study_title');
    $applications_case_study_section_title_maroon = get_field('applications_case_study_title_maroon');
    $applications_case_study_section_description = get_field('applications_case_study_description');

    // Application cards (max 5 items)
    $applications_block = get_field('applications_case_study_cards');
    $applications = [];

    if ($applications_block && is_array($applications_block)) {
        for ($i = 1; $i <= 5; $i++) {
            $image = $applications_block["applications_case_study_card_{$i}_image"] ?? '';
            $title = $applications_block["applications_case_study_card_{$i}_title"] ?? '';
            $desc  = $applications_block["applications_case_study_card_{$i}_description"] ?? '';
            if (!empty($title)) {
                $applications[] = [
                    'image' => $image,
                    'title' => $title,
                    'description' => $desc,
                ];
            }
        }
    }

    // Output
    ob_start(); ?>

     <section id="applications-case-study-section-id" class="py-10 bg-gray-fade applications_case_study_section <?= esc_attr($applications_case_study_section_class); ?>">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <div class="text-center mb-8">
                <h2 class="section_title_fontsize  pt-10  font-bold mb-4">
                    <?= wp_kses_post($applications_case_study_section_title); ?>
                    <?php if ($applications_case_study_section_title_maroon): ?>
                        <span class="text-ithena-maroon">
                            <?= wp_kses_post($applications_case_study_section_title_maroon); ?>
                        </span>
                    <?php endif; ?>
                </h2>
                <div class="section_desc_fontsize text-ithena-black"><?= wp_kses_post($applications_case_study_section_description); ?></div>
            </div>

            <?php if (!empty($applications)) : 
                $app_card_title_fs = get_field('app_card_title_fs');
                $app_card_desc_fs = get_field('app_card_desc_fs');
            ?>
                <div class="white-block grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
                    <?php foreach ($applications as $app) : ?>
                        <div class="application-card border-2 border-ithena-blue bg-ithena-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                            <div class="relative h-48 overflow-hidden">
                                <?php if (!empty($app['image'])) : ?>
                                    <img src="<?= esc_url($app['image']); ?>" alt="<?= esc_attr($app['title']); ?>" class="w-full h-full object-cover object-top">
                                <?php endif; ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                            <div class="text-content p-6">
                                <?php if (!empty($app['title'])) : ?>
                                    <h3 class="<?= esc_attr($app_card_title_fs) ?> font-semibold mb-3"><?= wp_kses_post($app['title']); ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($app['description'])) : ?>
                                    <div class="<?= esc_attr($app_card_desc_fs) ?> text-ithena-black"><?= wp_kses_post($app['description']); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <?php
    return ob_get_clean();
});

// =========================
// BLOCK - ROTATOR PARTNERS 2
// =========================
add_shortcode('block_rotator_partners_2', function() {
    if (!get_field('enable_block_rotator_partners_2')) return;

    $block_rotator_partners_2_class  = get_field('block_rotator_partners_2_class');
    $block_rotator_partners_2_title  = get_field('block_rotator_partners_2_title');
    $block_rotator_partners_2_title_maroon  = get_field('block_rotator_partners_2_title_maroon');
    $block_rotator_partners_2_desc   = get_field('block_rotator_partners_2_desc');

    // =========================
    // ROTATOR CARDS (ACF GROUP LOOP)
    // =========================
    $rotator_cards = [];
    $rotator_group = get_field('rotator_cards');
    if ($rotator_group && is_array($rotator_group)) {
        for ($i = 1; $i <= 11; $i++) {
            $image = $rotator_group["rotator_cards_{$i}_image"];
            $alt   = $rotator_group["rotator_cards_{$i}_alt"];
            
            if ($image) {
                $rotator_cards[] = [
                    'image' => $image,
                    'alt'   => esc_html($alt),
                ];
            }
        }
    }

    ob_start(); ?>
    
    <!-- Block Rotator Partners 2 Section -->
     <section id="partners-rotator-section-id" class="custom-section py-10 bg-gray-fade block_rotator_partners_2 <?= esc_attr($block_rotator_partners_2_class); ?>">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <?php if ($block_rotator_partners_2_title || $block_rotator_partners_2_desc): ?>
                <div class="text-center mb-16">
                    <?php if ($block_rotator_partners_2_title): ?>
                        <h2 class="section_title_fontsize  pt-10  font-bold text-ithena-black mb-4">
                            <?= nl2br(wp_kses_post($block_rotator_partners_2_title)); ?>
                            <?php if ($block_rotator_partners_2_title_maroon): ?>
                                <span class="text-ithena-maroon">
                                    <?php 
                                        echo nl2br(wp_kses_post($block_rotator_partners_2_title_maroon)); 
                                    ?>
                                </span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>
                    <?php if ($block_rotator_partners_2_desc): ?>
                        <div class="section_desc_fontsize text-ithena-black mx-auto"><?= wp_kses_post($block_rotator_partners_2_desc); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Rotator Cards -->
            <?php if (!empty($rotator_cards)): ?>
                <div class="product-showcase overflow-hidden">
                    <div class="product-track flex">
                        <?php foreach ($rotator_cards as $card): ?>
                            <div class="product-item flex-none mx-4 overflow-hidden">
                                <img src="<?= $card['image']; ?>" 
                                     alt="<?= esc_attr($card['alt']); ?>" 
                                     class="object-cover object-center product-img">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <script id="product-showcase">
        
        document.addEventListener('DOMContentLoaded', function() {

            const track = document.querySelector('.product-track');
            const items = document.querySelectorAll('.product-item');
            const showcase = document.querySelector('.product-showcase');

            if (!track || items.length === 0) return;

            /* ----------------------------
            SETTINGS
            ----------------------------- */
            const speed = 0.6;            // scroll speed
            const maxVisible = 11;        // limit to 11 items active at once

            /* ----------------------------
            LIMIT items to 11
            ----------------------------- */
            let activeItems = Array.from(items).slice(0, maxVisible);

            // Remove any extra items
            track.innerHTML = "";
            activeItems.forEach(item => track.appendChild(item));

            /* ----------------------------
            Clone items until track > screen width
            (Ensures 100% seamless infinite loop)
            ----------------------------- */
            function fillClones() {
                const containerWidth = showcase.offsetWidth;
                let trackWidth = track.scrollWidth;

                // Clone repeatedly until track is at least 2× container width
                while (trackWidth < containerWidth * 2) {
                    activeItems.forEach(item => {
                        track.appendChild(item.cloneNode(true));
                    });
                    trackWidth = track.scrollWidth;
                }
            }

            fillClones();

            /* ----------------------------
            Infinite Smooth Auto-Scroll
            ----------------------------- */
            let position = 0;
            let isAnimating = true;

            function animate() {
                if (isAnimating) {
                    position -= speed;

                    // When first batch fully scrolled → reset
                    const firstItem = track.children[0];
                    const firstWidth = firstItem.offsetWidth + parseFloat(getComputedStyle(firstItem).marginRight);

                    if (Math.abs(position) >= firstWidth) {
                        track.appendChild(firstItem);  // move first item to end
                        position += firstWidth;        // adjust position
                    }

                    track.style.transform = `translateX(${position}px)`;
                }

                requestAnimationFrame(animate);
            }

            /* ----------------------------
            Pause on Hover
            ----------------------------- */
            showcase.addEventListener('mouseenter', () => isAnimating = false);
            showcase.addEventListener('mouseleave', () => isAnimating = true);

            animate(); // start
        });

    </script>

    <?php
    return ob_get_clean();
});

// =========================
// DEMO VIDEO BLOCK
// =========================
add_shortcode('demo_video_block', function () {

    // Enable check
    if (!get_field('enable_demo_video_block')) {
        return;
    }

    // Section fields
    $demo_video_section_class        = get_field('demo_video_section_class');
    $demo_video_section_title        = get_field('demo_video_section_title');
    $demo_video_section_title_maroon = get_field('demo_video_section_title_maroon');
    $demo_video_section_subtitle     = get_field('demo_video_section_subtitle');

    // Content fields
    $demo_video_youtube_url = get_field('demo_video_embed_url');
    $demo_video_right_text  = get_field('demo_video_right_text');
    $demo_video_block_content_text_fs = get_field('demo_video_block_content_text_font_size');

    ob_start();
    ?>

    <section id="demo-video-section-id" class="py-10 bg-gray-fade demo_video_section <?= esc_attr($demo_video_section_class); ?>">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-8">
                <?php if ($demo_video_section_title): ?>
                    <h2 class="section_title_fontsize pt-10 font-bold text-ithena-black mb-4"> <?= wp_kses_post($demo_video_section_title); ?>
                        <?php if ($demo_video_section_title_maroon): ?>
                            <span class="text-ithena-maroon"> <?= wp_kses_post($demo_video_section_title_maroon); ?></span>
                        <?php endif; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($demo_video_section_subtitle): ?>
                    <div class="section_desc_fontsize text-ithena-black max-w-3xl mx-auto"><?= wp_kses_post($demo_video_section_subtitle); ?></div>
                <?php endif; ?>
            </div>                

            <div class="grid md:grid-cols-2 gap-16 items-center">

                <!-- Left : Video -->
                <div class="relative">
                    <div class="video-frame overflow-hidden"> <!-- bg-ithena-white rounded-2xl p-4 -->
                        <?php if (!empty($demo_video_youtube_url)) : ?>
                            <div class="aspect-w-16 aspect-h-9"> <?= $demo_video_youtube_url; ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Right : Content -->
                <?php 
                    $demo_video_text_section_title = get_field('demo_video_text_section_title');
                    $demo_video_text_section_title_fs = get_field('demo_video_text_section_title_fs');
                ?>
                <div class="space-y-6 demo_video_content">
                    <?php if ($demo_video_text_section_title) : ?>
                        <div class="<?= esc_attr($demo_video_text_section_title_fs); ?> font-semibold text-ithena-black">
                            <?= wp_kses_post($demo_video_text_section_title); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($demo_video_right_text)) : ?>
                        <div class="<?= esc_attr($demo_video_block_content_text_fs); ?> text-ithena-black leading-relaxed"> 
                            <?= wp_kses_post($demo_video_right_text); ?> 
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
});

// =========================
// SEMI SLIDER BLOCK
// =========================
add_shortcode("semislider_block", function () {
    
    // Enable check
    if (!get_field('enable_semislider_block')) {
        return;
    }

    $top_block_cards_count = 3; $panel_card_count = 4;

    ob_start();

    ?>

    <style>
        .block-transition {transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);}
        .block-overlay {background: #000000ad;}
        .block-active .block-overlay {background: #ffffff00}
        .rhs-img { animation: rhsZoomIn 0.75s ease-out both;}
        @keyframes rhsZoomIn {
            from { opacity: 0; transform: scale(0.8);}
            to { opacity: 1; transform: scale(1);}
        }
    </style>

    <section id="semislider-section-id" class="py-10 bg-gray-fade">
 
        <!-- Top Blocks -->
        <div class="flex h-96 max-w-7xl mt-5 mx-auto px-6" id="blockContainer">

            <?php 
            
            // slider block cards
            $semi_slider_block_cards = [];
            $block_cards = get_field('semi_slider_block_cards') ?? [];
            
            $block_card_title_fs = !empty(get_field('block_card_title_fs')) ? get_field('block_card_title_fs') : 'text-28px';
            $block_card_desc_fs = !empty(get_field('block_card_desc_fs')) ? get_field('block_card_desc_fs') : 'text-18px';

            if (is_array($block_cards)) {
                for ($i = 1; $i <= $top_block_cards_count; $i++) {
        
                    // Reset variables
                    $bg_image    = ''; $title       = ''; $description = '';

                    $bg_image = !empty($block_cards["blockcard_{$i}_bg_image"])
                        ? $block_cards["blockcard_{$i}_bg_image"]
                        : '/wp-content/uploads/2026/02/Screenshot-2026-02-02-153527.png';

                    $title = !empty($block_cards["blockcard_{$i}_title"])
                        ? $block_cards["blockcard_{$i}_title"]
                        : "(Def) Block Card Title - {$i}";

                    $description = !empty($block_cards["blockcard_{$i}_description"])
                        ? $block_cards["blockcard_{$i}_description"]
                        : "This is a sample description added for testing purposes only. It does not represent final or validated content.";

                    $title_color = !empty($block_cards["blockcard_{$i}_title_color"])
                        ? $block_cards["blockcard_{$i}_title_color"]
                        : '#ffffff';

                    $description_color = !empty($block_cards["blockcard_{$i}_description_color"])
                        ? $block_cards["blockcard_{$i}_description_color"]
                        : '#ffffff';

                    $semi_slider_block_cards[] = [
                        'bg_image'    => $bg_image,
                        'title'       => $title,
                        'title_color' => $title_color,
                        'description' => $description,
                        'description_color'  => $description_color,
                    ];
                }
            }

            foreach ($semi_slider_block_cards as $index => $card):
                $bg_imgg = $card['bg_image'];
                $title = $card['title'];
                $description = $card['description'];
                $i = $index + 1; // 1-based index for data-block attribute
            ?>

            <div class="block-item block-transition block-hover cursor-pointer relative overflow-hidden" data-block="<?= $i ?>" 
                style="background-position:center center; background-size:cover; background-image:url('<?= $bg_imgg ?>');">
                <div class="block-overlay absolute inset-0"></div>
                <div class="block-content relative z-10 h-full flex flex-col justify-center items-center text-center p-8">
                    <h2 class="<?= $block_card_title_fs ?> font-bold text-ithena-white mb-3" style="color: <?= $card['title_color'] ?>;"> <?= wp_kses_post($title) ?> </h2>
                    <div class="block_card_desc <?= $block_card_desc_fs ?> text-ithena-white" style="color: <?= $card['description_color'] ?>;"> <?= wp_kses_post($description) ?> </div>
                </div>
                <div class="absolute bottom-4 cursor-pointer right-4 scroll-down-arrow text-2xl text-ithena-white z-20"><i class="ri-arrow-down-s-line"></i></div>
            </div>

            <?php endforeach; ?>
        </div>

        <!-- Content Area -->
        <div class="w-full">
            <div class="content-fade" id="contentArea">

                <?php 
                $contentpanels = get_field('contentpanels');
                $content_panels_details = [];

                // content panels - cards 
                $contentpanel_cardtitle_fs = !empty(get_field("contentpanel_cardtitle_fs")) ? get_field("contentpanel_cardtitle_fs") : 'text-22px';
                $contentpanel_carddesc_fs = !empty(get_field("contentpanel_carddesc_fs")) ? get_field("contentpanel_carddesc_fs") : 'text-14px';
                
                for ($i = 1; $i <= $top_block_cards_count; $i++): // main for starts

                    $content_title = !empty($contentpanels["contentpanel_{$i}_title"]) ? $contentpanels["contentpanel_{$i}_title"] : 'This is Sample';
                    $content_title_maroon = !empty($contentpanels["contentpanel_{$i}_title_maroon"]) ? $contentpanels["contentpanel_{$i}_title_maroon"] : '';
                    $content_desc = !empty($contentpanels["contentpanel_{$i}_description"]) ? $contentpanels["contentpanel_{$i}_description"] : 'This is Sample - Content Panel description - '.$i;
                    $content_rhsimg = !empty($contentpanels["contentpanel_{$i}_rhs_img"]) ? $contentpanels["contentpanel_{$i}_rhs_img"] : '/wp-content/uploads/2026/02/Screenshot-2026-02-02-153544.png';
                    
                    $panel_fr = []; $panel_bk = [];
                    $content_panel_front_cards = $contentpanels["content_panel_{$i}_front_cards"] ?? [];
                    $content_panel_back_cards  = $contentpanels["content_panel_{$i}_back_cards"] ?? [];

                    for ($c = 1; $c <= $panel_card_count; $c++) {
                        $panel_fr[$c] = [
                            'front_title' => !empty($content_panel_front_cards["card_{$c}_title"]) ? $content_panel_front_cards["card_{$c}_title"] : "This is Sample - Panel-{$i} FCard Title-{$c}",
                            'front_desc'  => !empty($content_panel_front_cards["card_{$c}_description"]) ? $content_panel_front_cards["card_{$c}_description"] : "This is Sample - Panel-{$i} FCard Description-{$c}",
                            'front_color' => !empty($content_panel_front_cards["card_{$c}_color"]) ? $content_panel_front_cards["card_{$c}_color"] : '#ffffff',
                            'front_text_color' => !empty($content_panel_front_cards["card_{$c}_text_color"]) ? $content_panel_front_cards["card_{$c}_text_color"] : '#000000',
                        ];
                        $panel_bk[$c] = [
                            'back_title' => !empty($content_panel_back_cards["card_{$c}_title"]) ? $content_panel_back_cards["card_{$c}_title"] : "This is Sample - Panel-{$i} BCard Title-{$c}",
                            'back_desc'  => !empty($content_panel_back_cards["card_{$c}_description"]) ? $content_panel_back_cards["card_{$c}_description"] : "This is Sample - Panel-{$i} BCard Description-{$c}",
                            'back_color' => !empty($content_panel_back_cards["card_{$c}_color"]) ? $content_panel_back_cards["card_{$c}_color"] : '#0082c8',
                            'back_text_color' => !empty($content_panel_back_cards["card_{$c}_text_color"]) ? $content_panel_back_cards["card_{$c}_text_color"] : '#ffffff',
                        ];
                        
                    } 
                    
                    ?>

                    <div class="content-block <?= $i === 1 ? "active" : "hidden" ?>" id="content<?= $i ?>">
                        <div class="max-w-7xl mx-auto mt-5 px-4 sm:px-6 lg:px-8">

                            <div class="text-center mb-5">
                                <h3 class="section_title_fontsize font-bold text-ithena-black mb-6"> 
                                    <?= wp_kses_post($content_title) ?> 
                                    <span class="text-ithena-maroon"> <?= wp_kses_post($content_title_maroon); ?></span>
                                    <i class="scroll-up-arrow ri-arrow-up-s-line"></i>
                                </h3>
                                <div class="section_desc_fontsize text-ithena-black leading-relaxed max-w-3xl mx-auto">
                                    <?= wp_kses_post($content_desc) ?>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center panel-area">

                                <!-- Flip Panel -->
                                <div class="flip-container" style="perspective:1000px;">
                                    <div class="flip-panel" id="flipPanel<?= $i ?>" style="transform-style:preserve-3d;transition:transform 0.8s;cursor:pointer;height:500px;">

                                        <!-- FRONT -->
                                        <div class="flip-front" style="position:absolute;width:100%;height:100%;backface-visibility:hidden;">
                                            <div class="grid grid-cols-2 gap-4 h-full">
                                                <?php foreach ($panel_fr as $f => $panel):?>
                                                    <div class="p-6 rounded-lg shadow-sm flex flex-col justify-center" style="background-color: <?= $panel['front_color'] ?>;color: <?= $panel['front_text_color'] ?>;">
                                                        <h4 class="panel-front-title <?= $contentpanel_cardtitle_fs; ?> font-semibold mb-3"><?= esc_html($panel['front_title']) ?></h4>
                                                        <div class="panel-front-desc <?= $contentpanel_carddesc_fs ?>"><?= wp_kses_post($panel['front_desc']) ?></div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <!-- BACK -->
                                        <div class="flip-back" style="position:absolute;width:100%;height:100%; backface-visibility:hidden; transform:rotateY(180deg);">
                                            <div class="grid grid-cols-2 gap-4 h-full">
                                                <?php foreach ($panel_bk as $b => $panel): ?>
                                                    <div class="p-6 rounded-lg shadow-sm flex flex-col justify-center" style="background-color: <?= $panel['back_color'] ?>;color: <?= $panel['back_text_color'] ?>;">
                                                        <h4 class="panel-back-title <?= $contentpanel_cardtitle_fs; ?> font-semibold mb-3"><?= esc_html($panel['back_title']) ?></h4>
                                                        <div class="panel-back-desc <?= $contentpanel_carddesc_fs ?>"><?= wp_kses_post($panel['back_desc']) ?></div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="relative rhs-img">
                                    <img src="<?= esc_url($content_rhsimg) ?>" alt="<?= esc_attr($content_title) ?>" class="w-full h-96 object-cover object-top rounded-xl shadow-lg">
                                </div>

                            </div>

                        </div>
                    </div>

                <?php endfor //main for end ?>

            </div>
        </div>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const blocks         = document.querySelectorAll('.block-item');
            const contentBlocks  = document.querySelectorAll('.content-block');
            const contentArea    = document.getElementById('contentArea');
            const blockContainer = document.getElementById('blockContainer');
            const flipPanels     = document.querySelectorAll('.flip-panel');

            if (!blocks.length) return;

            let activeBlock = 1;

            // const WIDTH_ACTIVE   = '66.666667%';
            // const WIDTH_DEFAULT  = '33.333333%';
            // const WIDTH_INACTIVE = '16.666667%';

            const isMobile = window.innerWidth <= 768;
            const WIDTH_ACTIVE   = isMobile ? '46%' : '66.666667%';
            const WIDTH_DEFAULT  = isMobile ? '33%' : '33.333333%';
            const WIDTH_INACTIVE = isMobile ? '27%' : '16.666667%';

            const SCROLL_OFFSET  = -120;

            /* ---------------- INITIAL STATE ---------------- */

            const setInitialState = () => {
                blocks.forEach(block => {
                    block.style.width = WIDTH_DEFAULT;
                    block.classList.remove('block-active', 'content-shrinked');
                });

                blocks[0].classList.add('block-active');

                contentBlocks.forEach(c => c.classList.add('hidden'));
                document.getElementById('content1')?.classList.remove('hidden');
            };

            /* ---------------- SHRINK LOGIC ---------------- */

            const applyShrinkState = (block) => {

                block.classList.add('content-shrinked');

                const contentWrapper = block.querySelector('.block-content');
                const originalDesc   = block.querySelector('.block_card_desc');

                if (!contentWrapper || !originalDesc) return;

                // Hide original description
                originalDesc.style.display = 'none';

                // Avoid duplicate creation
                if (!contentWrapper.querySelector('.block_card_desc-shrinked')) {

                    const shrinkedDesc = document.createElement('div');
                    shrinkedDesc.className = 'block_card_desc-shrinked text-ithena-white';
                    shrinkedDesc.textContent = "Read more........";

                    contentWrapper.appendChild(shrinkedDesc);
                }
            };

            const removeShrinkState = (block) => {

                block.classList.remove('content-shrinked');

                const contentWrapper = block.querySelector('.block-content');
                const originalDesc   = block.querySelector('.block_card_desc');
                const shrinkedDesc   = block.querySelector('.block_card_desc-shrinked');

                if (originalDesc) {
                    originalDesc.style.display = '';
                }

                if (shrinkedDesc) {
                    shrinkedDesc.remove();
                }
            };

            /* ---------------- BLOCK UPDATE ---------------- */

            const updateBlocks = (index) => {

                if (activeBlock === index) return;
                activeBlock = index;

                blocks.forEach((block, i) => {

                    block.classList.remove('block-active');

                    if (i + 1 === index) {

                        block.style.width = WIDTH_ACTIVE;
                        block.classList.add('block-active');

                        removeShrinkState(block);

                    } else {

                        block.style.width = WIDTH_INACTIVE;
                        applyShrinkState(block);
                    }
                });

                contentBlocks.forEach(c => c.classList.add('hidden'));
                document.getElementById(`content${index}`)?.classList.remove('hidden');
            };

            /* ---------------- SMOOTH SCROLL ---------------- */

            const smoothScrollTo = (element) => {
                if (!element) return;

                const y = element.getBoundingClientRect().top + window.pageYOffset + SCROLL_OFFSET;

                window.scrollTo({
                    top: y,
                    behavior: 'smooth'
                });
            };

            /* ---------------- EVENTS ---------------- */

            blocks.forEach((block, i) => {
                block.addEventListener('click', () => updateBlocks(i + 1));
            });

            document.querySelectorAll('.scroll-down-arrow').forEach(arrow => {
                arrow.addEventListener('click', (e) => {
                    e.stopPropagation();
                    smoothScrollTo(contentArea);
                });
            });

            document.querySelectorAll('.scroll-up-arrow').forEach(arrow => {
                arrow.addEventListener('click', () => {
                    smoothScrollTo(blockContainer);
                });
            });

            flipPanels.forEach(panel => {
                let flipped = false;

                panel.addEventListener('click', () => {
                    panel.style.transform = flipped
                        ? 'rotateY(0deg)'
                        : 'rotateY(180deg)';
                    flipped = !flipped;
                });
            });

            setInitialState();

            const rhsImg = document.querySelector('.rhs-img');
            if (!rhsImg) return;

            // reset if needed
            rhsImg.classList.remove('rhs-zoom-animate');
            void rhsImg.offsetWidth;

            // trigger animation
            rhsImg.classList.add('rhs-zoom-animate');

        });
    </script>

<?php return ob_get_clean();
});

// =========================
// VERTICAL SLIDER BLOCK
// =========================
add_shortcode("verticalslider_block", function () {

    // Enable check
    if (!get_field('enable_verticalslider_block')) {return;}
    $top_vercards_count = 3; $sidepanel_count = 4;
    ob_start();
    ?>

    <style>
        .verticalblock-wrapper {
            display: flex;
            gap: 40px;
            margin-inline: auto;
        }

        .verticalblock-nav {
            flex: 0 0 30%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .verticalblock-contentArea {
            flex: 1; /* auto takes remaining 70% */
        }

        .verticalblock-navItem {
            position: relative;
            min-height: 180px;
            background: center / cover no-repeat;
            cursor: pointer;
            overflow: hidden;
            transition: transform 0.4s ease;
            will-change: transform;
        }

        .verticalblock-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.68);
            transition: background 0.4s ease;
        }

        .verticalblock-navItem--active .verticalblock-overlay {
            background: rgba(0, 0, 0, 0.25);
        }

        .verticalblock-navItem:hover {
            transform: translateX(6px);
        }

        @media (max-width: 1024px) {
            .verticalblock-wrapper {
                flex-direction: column;
            }

            .verticalblock-nav,
            .verticalblock-contentArea {
                flex: 1 1 100%;
            }
        }
    </style>

    <section id="verticalblock-section" class="py-10 bg-white-fade">

        <div class="max-w-7xl mt-5 mx-auto px-4 verticalblock-wrapper">

            <!-- LEFT NAVIGATION -->
            <div class="verticalblock-nav" id="verticalblock-navContainer">

                <?php 
                
                // slider block cards
                $vertical_cards_arr = [];
                $vertical_cards = get_field('   ') ?? [];
                
                $vertical_card_title_fs = !empty(get_field('vertical_cardstitle_fs')) ? get_field('vertical_cardstitle_fs') : 'text-28px';
                $vertical_card_desc_fs = !empty(get_field('vertical_cardsdesc_fs')) ? get_field('vertical_cardsdesc_fs') : 'text-18px';

                if (is_array($vertical_cards)) {
                    for ($i = 1; $i <= $top_vercards_count; $i++) {
            
                        // Reset variables
                        $bg_image    = ''; $title       = ''; $description = '';

                        $bg_image = !empty($vertical_cards["verticalcard_{$i}_bg_image"])
                            ? $vertical_cards["verticalcard_{$i}_bg_image"]
                            : '/wp-content/uploads/2026/02/Screenshot-2026-02-02-153527.png';

                        $title = !empty($vertical_cards["verticalcard_{$i}_title"])
                            ? $vertical_cards["verticalcard_{$i}_title"]
                            : "(Def) Vertical Card Title - {$i}";

                        $description = !empty($vertical_cards["verticalcard_{$i}_description"])
                            ? $vertical_cards["verticalcard_{$i}_description"]
                            : "This is a sample description added for testing purposes only. It does not represent final or validated content.";

                        $txtcolor = !empty($vertical_cards["verticalcard_{$i}_txtcolor"])
                            ? $vertical_cards["verticalcard_{$i}_txtcolor"]
                            : '#ffffff';

                        $vertical_cards_arr[] = [
                            'bg_image'    => $bg_image,
                            'title'       => $title,
                            'description' => $description,
                            'txtcolor' => $txtcolor,
                        ];
                    }
                }

                foreach ($vertical_cards_arr as $index => $card):
                    $bg_imgg = $card['bg_image'];
                    $title = $card['title'];
                    $description = $card['description'];
                    $txtcolor = $card['txtcolor'];
                    $i = $index + 1; // 1-based index for data-block attribute
                ?>

                    <div class="verticalblock-navItem h-100 verticalblock-navItem" data-verticalblock="<?= $i ?>"
                        style="background-image:url('<?= $bg_imgg ?>');">
                        <div class="verticalblock-overlay"></div>
                        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center p-8" style="color: <?= $txtcolor ?>">
                            <h2 class="text-28px font-bold mb-3"><?=  wp_kses_post($title) ?></h2>
                            <div class="opacity-90"><?= wp_kses_post($description) ?></div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

            <!-- RIGHT CONTENT -->
            <div class="verticalblock-contentArea">
                <div id="verticalblock-contentWrapper">
                    <?php 
                    $sidepanels = get_field('sidepanels');
                    $sidepanel_details = [];
                    // content panels - cards 
                    $sidepanelcard_titlefs = !empty(get_field("sidepanelcard_titlefs")) ? get_field("sidepanelcard_titlefs") : 'text-22px';
                    $sidepanelcard_descfs = !empty(get_field("sidepanelcard_descfs")) ? get_field("sidepanelcard_descfs") : 'text-14px';
                    
                    for ($i = 1; $i <= $top_vercards_count; $i++): // main for starts

                        $sidepanel_title = !empty($sidepanels["sidepanel_{$i}_title"]) ? $sidepanels["sidepanel_{$i}_title"] : 'This is Sample';
                        $sidepanel_title_maroon = !empty($sidepanels["sidepanel_{$i}_title_maroon"]) ? $sidepanels["sidepanel_{$i}_title_maroon"] : '';
                        $sidepanel_desc = !empty($sidepanels["sidepanel_{$i}_description"]) ? $sidepanels["sidepanel_{$i}_description"] : 'This is Sample - Content Panel description - '.$i;
                        
                        $sidepanel_fr = []; $sidepanel_bk = [];
                        $sidepanel_front_cards = $sidepanels["sidepanel_{$i}_front_cards"] ?? [];
                        $sidepanel_back_cards  = $sidepanels["sidepanel_{$i}_back_cards"] ?? [];

                        for ($c = 1; $c <= $sidepanel_count; $c++) {
                            $sidepanel_fr[$c] = [
                                'front_title' => !empty($sidepanel_front_cards["card_{$c}_title"]) ? $sidepanel_front_cards["card_{$c}_title"] : "This is Sample - Panel-{$i} FCard Title-{$c}",
                                'front_desc'  => !empty($sidepanel_front_cards["card_{$c}_description"]) ? $sidepanel_front_cards["card_{$c}_description"] : "This is Sample - Panel-{$i} FCard Description-{$c}",
                                'front_color' => !empty($sidepanel_front_cards["card_{$c}_color"]) ? $sidepanel_front_cards["card_{$c}_color"] : '#e7e6e6',
                                'front_text_color' => !empty($sidepanel_front_cards["card_{$c}_text_color"]) ? $sidepanel_front_cards["card_{$c}_text_color"] : '#000000',
                            ];
                            $sidepanel_bk[$c] = [
                                'back_title' => !empty($sidepanel_back_cards["card_{$c}_title"]) ? $sidepanel_back_cards["card_{$c}_title"] : "This is Sample - Panel-{$i} BCard Title-{$c}",
                                'back_desc'  => !empty($sidepanel_back_cards["card_{$c}_description"]) ? $sidepanel_back_cards["card_{$c}_description"] : "This is Sample - Panel-{$i} BCard Description-{$c}",
                                'back_color' => !empty($sidepanel_back_cards["card_{$c}_color"]) ? $sidepanel_back_cards["card_{$c}_color"] : '#0082c8',
                                'back_text_color' => !empty($sidepanel_back_cards["card_{$c}_text_color"]) ? $sidepanel_back_cards["card_{$c}_text_color"] : '#ffffff',
                            ];
                        } 
                        
                        ?>

                        <!-- PANELS -->
                        <div class="verticalblock-panel" id="verticalblock-panel-<?= $i ?>">

                            <div class="mb-8 panel-title-sec">
                                <h3 class="section_title_fontsize font-bold text-ithena-black mb-4"><?= wp_kses_post($sidepanel_title) ?></h3>
                                <div class="section_desc_fontsize text-ithena-black leading-relaxed"><?= wp_kses_post($sidepanel_desc) ?></div>
                            </div>

                            <div class="verticalblock-flipContainer" style="perspective:1000px;">
                                <div class="verticalblock-flipPanel" style="transform-style:preserve-3d;transition:transform 0.8s;cursor:pointer;height:500px;position:relative;">

                                    <!-- front side -->
                                    <div style="position:absolute;width:100%;height:100%;backface-visibility:hidden;">
                                        <div class="grid grid-cols-2 gap-4 h-full front-side-panels">
                                            <?php foreach ($sidepanel_fr as $f => $panel):?>
                                                <div class="p-6 rounded-lg shadow-sm flex flex-col justify-center" style="background-color:<?= $panel['front_color'] ?>; color:<?= $panel['front_text_color'] ?>">
                                                    <h4 class="<?= $sidepanelcard_titlefs ?>font-semibold mb-2"><?= $panel['front_title'] ?></h4>
                                                    <div class="<?= $sidepanelcard_descfs ?>"><?= $panel['front_desc'] ?></div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <!-- back side -->
                                    <div style="position:absolute;width:100%;height:100%;backface-visibility:hidden;transform:rotateY(180deg);">
                                        <div class="grid grid-cols-2 gap-4 h-full back-side-panels">
                                            <?php foreach ($sidepanel_bk as $b => $panel): ?>
                                            <div class="p-6 rounded-lg flex flex-col justify-center" style="background-color:<?= $panel['back_color'] ?>; color:<?= $panel['back_text_color'] ?>">
                                                <h4 class="<?= $sidepanelcard_titlefs ?>font-semibold mb-2"><?= $panel['back_title'] ?></h4>
                                                <div class="<?= $sidepanelcard_descfs ?>"><?= $panel['back_desc'] ?></div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    <?php endfor; // main for end?> 

                </div>
            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const navItems = document.querySelectorAll('.verticalblock-navItem');
            const panels = document.querySelectorAll('.verticalblock-panel');
            const flipPanels = document.querySelectorAll('.verticalblock-flipPanel');

            let activePanel = 1;

            function setInitialState() {
                navItems.forEach(item => item.classList.remove('verticalblock-navItem--active'));
                navItems[0].classList.add('verticalblock-navItem--active');

                panels.forEach(panel => panel.classList.add('hidden'));
                document.getElementById('verticalblock-panel-1').classList.remove('hidden');
            }

            function switchPanel(panelNumber) {
                if (activePanel === panelNumber) return;
                activePanel = panelNumber;

                navItems.forEach((item, index) => {
                    item.classList.remove('verticalblock-navItem--active');
                    if (index + 1 === panelNumber) {
                        item.classList.add('verticalblock-navItem--active');
                    }
                });

                panels.forEach(panel => panel.classList.add('hidden'));
                document.getElementById(`verticalblock-panel-${panelNumber}`).classList.remove('hidden');
            }

            navItems.forEach((item, index) => {
                item.addEventListener('click', () => {
                    switchPanel(index + 1);
                });
            });

            flipPanels.forEach(panel => {
                let flipped = false;
                panel.addEventListener('click', function () {
                    panel.style.transform = flipped ? 'rotateY(0deg)' : 'rotateY(180deg)';
                    flipped = !flipped;
                });
            });

            setInitialState();
        });
    </script>

<?php return ob_get_clean();
});