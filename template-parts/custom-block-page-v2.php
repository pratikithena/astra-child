<?php
    
    /*
    Template Name: Custom Block Page v2
    */

    // Include the file where all blocks are defined
    require_once get_stylesheet_directory() . '/inc/blocks.php';
    require_once get_stylesheet_directory() . '/inc/blocks-sliders-banner.php';
    require_once get_stylesheet_directory() . '/inc/blocks-animations.php';

    ?>
    
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>

        <head>
            <meta charset="<?php bloginfo('charset'); ?>">
            <?php $page_title = get_the_title(); ?>
            <title><?php echo esc_html( $page_title ? $page_title : get_bloginfo( 'name' ) ); ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.tailwindcss.com/3.4.16"></script>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">

            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

            <!-- Custom Navbar -->
            <?php  
                wp_head();
                // wp_enqueue_script('jquery');
                echo child_theme_custom_headmenu();  
            ?>

            <!-- Bootstrap CDN -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">

            <!-- Font Awesome CDN for icons -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

            <script name="tailwindinclusion">
                tailwind.config = {
                    theme: {
                        extend: {
                            colors: {
                                primary: '#0082C8',
                                secondary: '#006BA6'
                            },
                            borderRadius: {
                                'none': '0px',
                                'sm': '4px',
                                DEFAULT: '8px',
                                'md': '12px',
                                'lg': '16px',
                                'xl': '20px',
                                '2xl': '24px',
                                '3xl': '32px',
                                'full': '9999px',
                                'button': '8px'
                            }
                        }
                    }
                }
            </script>

            <?php
                $section_title_fs = get_post_meta(get_the_ID(), 'section_title_font', true) ?: '36';
                $section_desc_fs = get_post_meta(get_the_ID(), 'section_description_font', true) ?: '20';
            ?>

            <style name="custom-styles">
                
                /* .elementor-location-header, .elementor-location-footer,  */
                article.ast-article-single { display:none; }

                :root{
                    --color-black: #000;
                    --color-white: #fff;
                    --color-blue: #0082c8;
                    --color-blue-dark: #005b94;
                    --color-gray: #e7e6e6;
                    --color-speechred: #c00000;

                    /* aliases for convenience */
                    --cust-primary: var(--color-blue);
                    --cust-secondary: var(--color-blue-dark);
                    --cust-gray: var(--color-gray);
                }

                body{ 
                    color: var(--color-black) !important; 
                    ul {
                        list-style-type: disc;        /* disc, circle, square, decimal, etc. */
                        list-style-position: outside; /* outside (default) or inside */
                        margin-left: 1.5rem;          /* ensure there is space for the bullets */
                        padding-left: 0;             /* keep control via margin-left */
                    }
                    #custom-block-main a{ color: #ffffff !important; text-decoration: none; }
                }
            
                body .container::after{ background: none !important; }
                :where([class^="ri-"])::before { content: "\f3c2"; }

                /* overlay should be semi-transparent black */
                .custom-slider-overlay { background-color: rgba(0, 0, 0, 0.45);}
                .bg-gray-fade{ background: linear-gradient(to top, var(--color-gray) 85%, var(--color-white) 100%); }
                .bg-white-fade{ background: linear-gradient(to top, var(--color-white) 85%, var(--color-gray) 100%); }

                /* use CSS variables with var() */
                .bg-ithena-blue { background-color: var(--cust-primary); }
                .bg-ithena-gray { background-color: var(--cust-gray); } 
                .bg-ithena-white { background-color: var(--color-white); } 
                .bg-ithena-black { background-color: var(--color-black); } 
                .bg-ithena-maroon { background-color: #c00000; } 
                .border-ithena-blue { border-color: var(--cust-primary); }
                .text-ithena-white { color: var(--color-white); }
                .text-ithena-black { color: var(--color-black); }
                .text-ithena-blue { color: var(--cust-primary); }
                .text-ithena-maroon { color: #c00000; }

                .customer-card-bg { background-color: var(--color-blue); }
                .customer-card-bg-black { background-color: var(--color-black); }

                /* ensure images cover their area */
                .customer-img {width: 100%;height: 40%; object-fit: cover;}

                /* rotator block  */
                img.product-img { height: 80px; width: auto;}

                .custom-btn{text-decoration: none !important;}
                .custom-btn.active_link{cursor: pointer;}
                .custom-btn.inactive_link{cursor: not-allowed;}

                /* modal css - start */
                .modal {
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    justify-content: center;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.5);
                    z-index: 9999;
                    fieldset{
                        background-color: var(--color-white) !important;
                        .frm_primary_label{
                            color: var(--color-black);
                        }
                    }
                    
                    .custom-formm{
                        .frm_form_title{
                            text-align: center !important;
                            font-weight: 600;
                        }
                        .frm_message{
                            margin-top: 1.5rem !important;
                        }
                    }

                    .with_frm_style input[type=text], .with_frm_style input[type=password], .with_frm_style input[type=email], .with_frm_style input[type=number], .with_frm_style input[type=url], .with_frm_style input[type=tel], .with_frm_style input[type=phone], .with_frm_style input[type=search], .with_frm_style select, .with_frm_style textarea, .frm_form_fields_style, .with_frm_style .frm_scroll_box .frm_opt_container, .frm_form_fields_active_style, .frm_form_fields_error_style, .with_frm_style .frm-card-element.StripeElement, .with_frm_style .frm_slimselect.ss-main{
                        color: var(--color-black) !important;
                        background-color: var(--color-white) !important;
                        border-color: var(--color-black) !important;
                    }
                }
                .modal.active { display: flex; animation: fadeIn 0.3s ease-out; }
                .modal-overlay { backdrop-filter: blur(4px); }
                .modal-content { animation: slideIn 0.3s ease-out; }
                @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
                @keyframes slideIn {
                    from { transform: translateY(-20px); opacity: 0; }
                    to { transform: translateY(0); opacity: 1; }
                }
                /* modal css - end */

                /* Fullscreen overlay */
                .loader-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.55); /* adjustable overlay */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    z-index: 99999;
                    backdrop-filter: blur(3px); /* optional, looks premium */
                }

                /* Loader spinning circle */
                .loader {
                    border: 16px solid #f3f3f3;
                    border-radius: 50%;
                    border-top: 16px solid var(--color-blue);
                    width: 120px;
                    height: 120px;
                    animation: spin 1.2s linear infinite;
                }
                /* Spin animation */
                @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

                /* product banner fade styles - start */
                .product_banner { position: relative; overflow: hidden; }
                .product_banner::after, .custom-slider-slide::after {
                    content: "";
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    height: 40%; /* adjust fade height */
                    pointer-events: none;
                }    
                .product_banner_white::after, .slide_white_fade::after {
                    background: linear-gradient(
                        to top,
                        rgba(255, 255, 255, 1) 0%,      /* solid white at bottom */
                        rgba(255, 255, 255, 0.7) 30%,   /* soft fade */
                        rgba(255, 255, 255, 0.3) 60%,   /* smoother blend */
                        rgba(255, 255, 255, 0) 100%     /* fully transparent at top */
                    );
                }
                .product_banner_grey::after, .slide_grey_fade::after {
                    background: linear-gradient(
                        to top,
                        #e7e6e6 0%,               /* solid gray at very bottom */
                        rgba(231, 230, 230, 0.8) 30%,  /* soft fade */
                        rgba(231, 230, 230, 0.4) 60%,  /* mid fade */
                        rgba(231, 230, 230, 0) 100%    /* fully transparent at top */
                    );
                }
                /* product banner fade styles - end */
                 
                /* custom font sizes - global */
                .section_title_fontsize{   
                    <?php if (!empty($section_title_fs)) : ?>
                        font-size: <?php echo intval($section_title_fs); ?>px;
                    <?php endif; ?>
                }
                .section_desc_fontsize{  
                    <?php if (!empty($section_desc_fs)) : ?>
                        font-size: <?php echo intval($section_desc_fs); ?>px;
                    <?php endif; ?> 
                }  

                /* custom font sizes -local */    
                <?php
                    $font_sizes = [12,14,16,18,20,22,24,26,28,30,32,34,36,38,42,44,46,48,50,60,65,70,80];
                    foreach ($font_sizes as $size) {
                        echo ".text-{$size}px { font-size: {$size}px; }\n";
                    }
                ?>

            </style>

            <style name="global-dark-mode">
                /* Dark Mode Override */
                body.dark-mode{
                    --color-speechred: #c00000;
                    --color-blue: #0082c8;

                    --color-black: #ffffff; /* light text */
                    --color-white: #000000; /* dark bg */
                    --color-gray: #1A1A1A;
                    --cust-gray: #1A1A1A;

                    --text-ithena-white: #000000;
                    --text-ithena-black: #ffffff;
                }

                body.dark-mode footer{
                    --color-black: #000000; /* light text */
                    --color-white: #ffffff; /* dark bg */
                    --text-ithena-white: #ffffff;
                    --text-ithena-black: #000000;
                    --color-gray: #e7e6e6;
                }

                body.dark-mode .product_banner{
                    .text-ithena-white{ color: #ffffff; }
                    .text-ithena-black{ color: #000000; }
                }

                /* fade styles for dark mode - start */
                body.dark-mode .product_banner_white::after, 
                body.dark-mode .slide_white_fade::after {
                    background: linear-gradient(
                        to top,
                        rgba(0, 0, 0, 1) 0%,       /* solid black at bottom */
                        rgba(0, 0, 0, 0.7) 30%,    /* soft fade */
                        rgba(0, 0, 0, 0.3) 60%,    /* smoother blend */
                        rgba(0, 0, 0, 0) 100%      /* fully transparent at top */
                    );
                }

                body.dark-mode .product_banner_grey::after, 
                body.dark-mode .slide_grey_fade::after {
                    background: linear-gradient(
                        to top,
                        #1A1A1A 0%,                     /* solid dark grey at bottom */
                        rgba(26, 26, 26, 0.8) 30%,     /* soft fade */
                        rgba(26, 26, 26, 0.4) 60%,     /* mid fade */
                        rgba(26, 26, 26, 0) 100%       /* fully transparent at top */
                    );
                }
                /* fade styles for dark mode - end */

            </style>

        </head>

        <body <?php body_class('custom-block-page'); ?>>

            <main id="custom-block-main">
                
                <div class="loader-overlay" id="globalLoader" style="display:none;">
                    <div class="loader"></div>
                </div>
                
                <?php
                    // You can use Gutenberg blocks or your HTML directly
                    // the_content();
                    // Example: list of shortcodes to display in this page

                    // List all sections (name is for reference only)
                    $blockjson = '[
                        {
                            "name": "hero_sliderwcards",
                            "shortcode": "[hero_sliderwcards]",
                            "enable_key": "enable_hero_slider_w_cards",
                            "order_key": "hero_sliderwcards_order"
                        },
                        {
                            "name": "hero_slider",
                            "shortcode": "[hero_slider]",
                            "enable_key": "enable_hero_slider",
                            "order_key": "hero_slider_order"
                        },
                        {
                            "name": "product_banner",
                            "shortcode": "[product_banner]",
                            "enable_key": "enable_product_banner",
                            "order_key": "product_banner_order"
                        },
                        {
                            "name": "use_cases_section",
                            "shortcode": "[use_cases_section]",
                            "enable_key": "enable_use_cases_section",
                            "order_key": "use_cases_section_order"
                        },
                        {
                            "name": "industries_we_serve",
                            "shortcode": "[industries_we_serve]",
                            "enable_key": "enable_industries_we_serve",
                            "order_key": "industries_we_serve_order"
                        },
                        {
                            "name": "metrics_section",
                            "shortcode": "[metrics_section]",
                            "enable_key": "enable_metrics_section",
                            "order_key": "metrics_section_order"
                        },
                        {
                            "name": "feature_visual_section",
                            "shortcode": "[feature_visual_section]",
                            "enable_key": "enable_feature_visual_section",
                            "order_key": "feature_visual_section_order"
                        },
                        {
                            "name": "testimonials_section",
                            "shortcode": "[testimonials_section]",
                            "enable_key": "enable_testimonials_section",
                            "order_key": "testimonials_section_order"
                        },
                        {
                            "name": "applications_case_study_section",
                            "shortcode": "[applications_case_study_section]",
                            "enable_key": "enable_applications_case_study_section",
                            "order_key": "applications_case_study_section_order"
                        },
                        {
                            "name": "tab_panel_section",
                            "shortcode": "[tab_panel_section]",
                            "enable_key": "enable_tab_panel_section",
                            "order_key": "tab_panel_section_order"
                        },
                        {
                            "name": "custom_accordian_section",
                            "shortcode": "[custom_accordian_section]",
                            "enable_key": "enable_accordian",
                            "order_key": "accordian_order"
                        },
                        {
                            "name": "overview_section",
                            "shortcode": "[overview_section]",
                            "enable_key": "enable_overview_section",
                            "order_key": "overview_section_order"
                        },
                        {
                            "name": "block_rotator_partners_2",
                            "shortcode": "[block_rotator_partners_2]",
                            "enable_key": "enable_block_rotator_partners_2",
                            "order_key": "block_rotator_partners_2_order"
                        },
                        {
                            "name": "explore_block",
                            "shortcode": "[explore_block]",
                            "enable_key": "enable_explore_block",
                            "order_key": "explore_block_order"
                        },
                        {
                            "name": "success_story",
                            "shortcode": "[success_story_block]",
                            "enable_key": "enable_success_story",
                            "order_key": "success_story_order"
                        },
                        {
                            "name": "four_thumbanils_block",
                            "shortcode": "[four_thumbanils_block]",
                            "enable_key": "enable_four_thumbanils_block",
                            "order_key": "four_thumbanils_block_order"
                        },
                        {
                            "name": "demo_video_block",
                            "shortcode": "[demo_video_block]",
                            "enable_key": "enable_demo_video_block",
                            "order_key": "demo_video_block_order"
                        },
                        {
                            "name": "semislider_block",
                            "shortcode": "[semislider_block]",
                            "enable_key": "enable_semislider_block",
                            "order_key": "semi_slider_block_order"
                        },
                        {
                            "name": "verticalslider_block",
                            "shortcode": "[verticalslider_block]",
                            "enable_key": "enable_verticalslider_block",
                            "order_key": "verticalslider_block_order"
                        }
                    ]';

                    $blocksections = json_decode($blockjson, true);

                    $final_sections = [];

                    // Loop through sections
                    foreach ($blocksections as $sec) {
                        
                        // Check enable meta
                        $enabled = get_post_meta(get_the_ID(), $sec['enable_key'], true);

                        // echo "<pre>"; print_r($enabled); echo "</pre>";
                        
                        if (!empty($enabled) && strtolower(trim($enabled[0])) === 'yes') {
                            // Get order
                            $order = get_post_meta(get_the_ID(), $sec['order_key'], true);
                            // Default order = bottom if empty
                            $order = (!empty($order)) ? intval($order) : 999;
                            $final_sections[] = [
                                'order'     => $order,
                                'enabled'   => $enabled[0],
                                'shortcode' => $sec['shortcode']
                            ];
                        }
                    }

                    // Sort by order
                    usort($final_sections, function ($a, $b) {
                        return $a['order'] <=> $b['order'];
                    });

                    // echo "<pre>";  print_r($final_sections);  echo "</pre>";

                    // Output shortcodes in sorted order
                    foreach ($final_sections as $item) {
                        echo do_shortcode($item['shortcode']);
                    }

                ?>

                <script class="section-maintain-script">
                    document.addEventListener("DOMContentLoaded", function () {
                        const sections = document.querySelectorAll("section.product_banner_white, section.product_banner_grey, section.bg-gray-fade, section.bg-white-fade");

                        sections.forEach((section, index) => {
                            const prev = sections[index - 1];

                            // No previous section → skip
                            if (!prev) return;

                            // ============================
                            // CASE 1: current = bg-gray-fade
                            // ============================
                            if (section.classList.contains("bg-gray-fade")) {

                                // If previous is banner with gray fade
                                if (prev.classList.contains("product_banner_grey")) {
                                    section.classList.remove("bg-gray-fade");
                                    section.classList.add("bg-ithena-gray");
                                }

                                // If previous is also bg-gray-fade → convert to solid color
                                if (prev.classList.contains("bg-gray-fade")) {
                                    section.classList.remove("bg-gray-fade");
                                    section.classList.add("bg-ithena-gray");
                                }

                                // If previous is also bg-ithena-gray → convert to solid gray
                                if (prev.classList.contains("bg-ithena-gray")) {
                                    section.classList.remove("bg-gray-fade");
                                    section.classList.add("bg-ithena-gray");
                                }
                            }

                            // ============================
                            // CASE 2: current = bg-white-fade
                            // ============================
                            if (section.classList.contains("bg-white-fade")) {

                                // If previous is banner with white fade
                                if (prev.classList.contains("product_banner_white")) {
                                    section.classList.remove("bg-white-fade");
                                    section.classList.add("bg-ithena-white");
                                }

                                // If previous is bg-white-fade → convert to solid white
                                if (prev.classList.contains("bg-white-fade")) {
                                    section.classList.remove("bg-white-fade");
                                    section.classList.add("bg-ithena-white");
                                }
                                
                                // If previous is bg-gray-fade → ensure it stays fade white
                                if (prev.classList.contains("bg-gray-fade")) {
                                    section.classList.remove("bg-ithena-white");
                                    section.classList.add("bg-white-fade");
                                }

                                // If previous is bg-ithena-white → ensure it stays white
                                if (prev.classList.contains("bg-ithena-white")) {
                                    section.classList.remove("bg-white-fade");
                                    section.classList.add("bg-ithena-white");
                                }
                            }
                        });
                    });
                </script>

                <script>
                    (function () {
                        const toggleBtn = document.getElementById('themeToggle');
                        const header = document.querySelector('header');
                        const footer = document.querySelector('footer');

                        function applyTheme(isDark) {
                            document.body.classList.toggle('dark-mode', isDark);
                            if (header) {
                                header.classList.toggle('dark-mode', isDark);
                            }
                            localStorage.setItem('theme', isDark ? 'dark' : 'light');
                            if (toggleBtn) {
                                toggleBtn.innerHTML = isDark ? '☀️' : '🌙';
                            }
                        }
                        // Load saved theme
                        const savedTheme = localStorage.getItem('theme') === 'dark';
                        applyTheme(savedTheme);

                        // Toggle click
                        toggleBtn?.addEventListener('click', function () {
                            const isDarkbody = !document.body.classList.contains('dark-mode');
                            applyTheme(isDarkbody);
                        });

                    })();
                </script>

                <!-- form Modal -->
                <div id="customModal" class="items-justified-center modal">
                    <div class="modal-content bg-white w-full max-w-lg mx-4 rounded-xl shadow-xl relative p-6 m-auto">
                        <button class="absolute right-4 top-4 text-ithena-black" onclick="closeModal()">
                            <i class="ri-close-line text-2xl"></i>
                        </button>
                        <!-- <div class="text-center mb-6">
                            <h3 class="text-2xl font-bold">Get Started with Ithena</h3>
                            <p class="text-gray-600 mt-2">Fill out the form below and we'll be in touch shortly</p>
                        </div> -->
                        <div class="custom-formm">
                            <?php //echo do_shortcode('[formidable id=115]'); ?>
                        </div>
                    </div>
                </div>

                <script id="customModal">

                    function showLoader() {
                        const loader = document.getElementById("globalLoader");
                        if (loader) {
                            loader.style.display = "flex";
                        }
                    }

                    function hideLoader() {
                        const loader = document.getElementById("globalLoader");
                        if (loader) {
                            loader.style.display = "none";
                        }
                    }

                    document.addEventListener("click", function (e) {
                        const btn = e.target.closest(".custom-btn");
                        if (!btn) return;
                        // If href exists → exit
                        if (btn.hasAttribute("href")) {
                            return;
                        }
                        
                        let shortcode = btn.dataset.form_shortcode;
                        if (shortcode) {

                            showLoader();

                            // AJAX request to WP
                            let formData = new FormData();
                            formData.append("action", "load_form_shortcode");
                            formData.append("shortcode", shortcode);
                            fetch("<?php echo admin_url('admin-ajax.php'); ?>", {
                                method: "POST",
                                body: formData
                            })
                            .then(res => res.text())
                            .then(html => {
                                // Replace the container
                                document.querySelector(".custom-formm").outerHTML = html;
                                openModal();
                            });
                        }
                    });

                    // document.addEventListener('DOMContentLoaded', function() {
                    //     // select modal button and attach openModal
                    //     document.querySelectorAll('.custom-btn').forEach(button => {
                    //         button.addEventListener('click', function(e) {
                    //             //openModal();
                    //         });
                    //     });     
                    // });

                    function openModal() {
                        hideLoader();
                        document.getElementById('customModal').classList.add('active');
                        document.body.style.overflow = 'hidden';
                    }

                    function closeModal() {
                        hideLoader();
                        document.getElementById('customModal').classList.remove('active');
                        document.body.style.overflow = '';
                    }

                </script>

            </main>
            
            <?php  
                wp_footer(); 
                echo child_theme_custom_footer();  
            ?>

        </body>

    </html>
    
    <?php

    // Default WordPress structure (for non-custom pages)
    get_template_part('template-parts/content', 'page');