<?php
    /*
    Template Name: Custom Case Study Template
    */
?>

    <!DOCTYPE html>

    <html lang="en">
        
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
            
            <style>
                
                :where([class^="ri-"])::before { content: "\f3c2"; }
                
                .ast-article-single, .post-navigation{
                    display: none;
                }

                :root{
                    --color-black: #000;
                    --color-white: #fff;
                    --color-blue: #0082c8;
                    --color-blue-dark: #005b94;
                    --color-gray: #e7e6e6;
                    --color-maroon: #c00000;

                    /* aliases for convenience */
                    --cust-primary: var(--color-blue);
                    --cust-secondary: var(--color-blue-dark);
                    --cust-gray: var(--color-gray);
                }

                .bg-ithena-blue { background-color: var(--cust-primary); }
                .bg-ithena-gray { background-color: var(--cust-gray); } 
                .bg-ithena-white { background-color: var(--color-white); } 
                .bg-ithena-black { background-color: var(--color-black); } 
                .bg-ithena-maroon { background-color: var(--color-maroon); } 
                
                .text-ithena-white { color: var(--color-white); }
                .text-ithena-black { color: var(--color-black); }
                .text-ithena-blue { color: var(--cust-primary); }
                .text-ithena-maroon { color: var(--color-maroon); }

                .bg-gray-fade{background: linear-gradient(to top,#e7e6e6 85%,#fff 100%);}
                .bg-white-fade{background: linear-gradient(to top,#fff 85%,#e7e6e6 100%);}

                .border-gray{
                    border-color: var(--cust-gray);
                }
                
                /* product banner fade styles - start */
                .case-study-banner{
                    position: relative;
                    overflow: hidden;
                }

                .case-study-banner::after{
                    content: ""; position: absolute; bottom: 0; left: 0;
                    width: 100%; height: 40%; /* adjust fade height */
                    pointer-events: none;
                    background: linear-gradient(
                        to top, rgb(255 255 255) 0%, /* solid white at bottom */ 
                        rgb(255 255 255 / 70%) 30%, /* soft fade */ 
                        rgb(255 255 255 / 40%) 60%, /* smoother blend */ 
                        rgb(255 255 255 / 0%) 100% /* fully transparent at top */
                    );
                }

                /* .bottom-cta::before{
                    content: ""; position: absolute; bottom: 0; left: 0;
                    width: 100%; height: 100%;
                    pointer-events: none;
                    background: linear-gradient(
                        to bottom,
                        rgba(255, 255, 255, 1) 0%,      
                        rgba(255, 255, 255, 0.7) 30%,   
                        rgba(255, 255, 255, 0.3) 60%,   
                        rgba(255, 255, 255, 0) 100%     
                    );
                } */

                .custom-btn{text-decoration: none !important;}
                .custom-btn:hover{
                    color: var(--color-black) !important;
                }
                .custom-btn.active_link{cursor: pointer;}
                .custom-btn.inactive_link{cursor: not-allowed;}

                .key_challenges{
                    ul{
                        list-style: initial;
                        line-height: 2;
                    }
                }

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
                .modal.active {
                    display: flex;
                    animation: fadeIn 0.3s ease-out;
                }
                .modal-overlay {
                    backdrop-filter: blur(4px);
                }
                @keyframes fadeIn {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
                .modal-content {
                    animation: slideIn 0.3s ease-out;
                }
                @keyframes slideIn {
                    from {
                        transform: translateY(-20px);
                        opacity: 0;
                    }
                    to {
                        transform: translateY(0);
                        opacity: 1;
                    }
                }
                /* modal css - end */

            </style>

        </head>
        
        <body <?php body_class('custom-block-page'); ?>>
            
            <main id="main-content" class="w-full">

                <div class="loader-overlay" id="globalLoader" style="display:none;">
                    <div class="loader"></div>
                </div>

                <?php

                    // $post_id = get_the_ID();
                    $post_id = 68772; // Test Case Study Post ID

                    $case_study_name                  = !empty(get_field('case_study_name', $post_id)) ? get_field('case_study_name', $post_id) : '';
                    $case_study_heading               = !empty(get_field('case_study_heading', $post_id)) ? get_field('case_study_heading', $post_id) : '';
                    $heading_banner_image             = !empty(get_field('heading_banner_image_', $post_id)) ? get_field('heading_banner_image_', $post_id) : '';
                    $about_client                     = !empty(get_field('about_client', $post_id)) ? get_field('about_client', $post_id) : '';
                    $about_us_counter_value           = !empty(get_field('about_us_counter_value_', $post_id)) ? get_field('about_us_counter_value_', $post_id) : '';
                    $about_client_image               = !empty(get_field('about_client_image_impact_value', $post_id)) ? get_field('about_client_image_impact_value', $post_id) : '';
                    $about_client_impact_text         = !empty(get_field('about_client_impact_text', $post_id)) ? get_field('about_client_impact_text', $post_id) : '';
                    $quote                            = !empty(get_field('quote', $post_id)) ? get_field('quote', $post_id) : '';
                    $key_challenges                   = !empty(get_field('key_challenges', $post_id)) ? get_field('key_challenges', $post_id) : '';
                    $key_challenges_image             = !empty(get_field('key_challenges_image', $post_id)) ? get_field('key_challenges_image', $post_id) : '';
                    $solution_description             = !empty(get_field('solution_description', $post_id)) ? get_field('solution_description', $post_id) : '';
                    $solution_image                   = !empty(get_field('solution_image', $post_id)) ? get_field('solution_image', $post_id) : '';
                    $case_study_pdf                   = !empty(get_field('case_study_pdf', $post_id)) ? get_field('case_study_pdf', $post_id) : '';

                    $solutions = [];
                    for ($i = 1; $i <= 5; $i++) {
                        $headingg = get_field("solution_{$i}_heading", $post_id);
                        $icon = get_field("solution_{$i}_icon", $post_id);
                        if(!empty($icon['url'])){$icon = $icon['url'];}
                        if(!empty($headingg)){
                            $solutions[] = [
                                'heading'     => $headingg,
                                'description' => get_field("solution_{$i}_description", $post_id),
                                'icon'        => $icon,
                            ];
                        }
                    }

                    $impacts = [];
                    for ($i = 1; $i <= 3; $i++) {
                        $impact_value  = get_field("impact_value_{$i}", $post_id);
                        $impact_symbol = get_field("impact_symbol_{$i}", $post_id);
                        $impact_text   = get_field("impact_text_{$i}", $post_id);

                        if ( ! empty( $impact_value ) || ! empty( $impact_symbol ) || ! empty( $impact_text ) ) {
                            $impacts[] = [
                                'value'  => $impact_value,
                                'symbol' => $impact_symbol,
                                'text'   => $impact_text,
                            ];
                        }
                    }
                ?>

                <!-- Hero Section -->
                <section class="case-study-banner relative min-h-screen w-full flex items-center justify-center overflow-hidden" 
                    style="background-image: url('<?php echo esc_url($heading_banner_image); ?>'); background-size: cover; background-position: center;">
                    <!-- <div class="absolute inset-0 bg-gradient-to-r from-white via-white/90 to-transparent"></div> -->
                    <div class="max-w-7xl px-4 relative w-full z-10">
                        <div class="max-w-2xl">
                            <div class="mb-6">
                                <span class="text-sm font-semibold text-ithena-blue uppercase tracking-wider">CASE STUDY</span>
                            </div>
                            <h1 class="text-5xl font-bold text-ithena-white mb-8 leading-tight">
                                <?php echo esc_html($case_study_heading); ?>
                            </h1>
                            <a data-btn_id="casestudy" class="bg-ithena-blue text-ithena-white px-8 py-3 !rounded-button font-semibold custom-btn">
                                Download Case Study
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Client Info and Statistics -->
                <section class="py-10 bg-ithena-white">
                    <div class="max-w-7xl mx-auto px-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                            
                            <!-- Statistics Card -->
                            <div class="bg-ithena-grey rounded-lg shadow-lg p-8 relative">
                                <div class="flex items-center justify-between mb-6">
                                    <div>
                                        <div class="text-6xl font-bold text-ithena-blue mb-2 about_us_counter_value">
                                            <span class="counter" data-suffix="%"
                                                data-target="<?php echo esc_attr($about_us_counter_value); ?>">
                                            0</span>
                                        </div>
                                        <div class="text-ithena-black font-medium about_client_impact_text">
                                            <?php echo esc_html($about_client_impact_text); ?>
                                        </div>
                                    </div>
                                    <div class="w-12 h-12 flex items-center justify-center text-ithena-blue">
                                        <i class="ri-arrow-right-line ri-2x"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- About Client -->
                            <div class="bg-ithena-blue text-ithena-white rounded-lg p-8">
                                <h3 class="text-2xl font-bold mb-6">About the Client</h3>
                                <p class="text-blue-100 about_client leading-relaxed mb-4">
                                    <?php echo esc_html($about_client); ?>
                                </p>
                            </div>

                        </div>
                    </div>
                </section>

                <!-- quote Section -->
                <section class="py-10 bg-ithena-white">
                    <div class="max-w-7xl mx-auto text-center">
                        <div class="relative">
                            <div class="text-6xl text-ithena-blue">"</div>
                            <blockquote class="text-2xl text-ithena-black italic leading-relaxed m-0">
                                <?php echo wp_kses_post($quote); ?>
                            </blockquote>
                            <div class="text-6xl text-ithena-blue transform rotate-180">"</div>
                        </div>
                    </div>
                </section>

                <!-- Opportunity for Impact -->
                <section class="py-10 bg-ithena-white">
                    <div class="max-w-7xl mx-auto px-8">
                        <div class="text-center mb-12">
                            <h2 class="text-4xl font-bold text-ithena-black mb-4">Opportunity for Impact</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            
                            <div class="text-center">
                                <div class="text-5xl font-bold text-ithena-blue mb-4">
                                    <span class="counter" data-suffix="<?php echo esc_attr($impacts[0]['symbol']); ?>" 
                                        data-target="<?php echo esc_attr($impacts[0]['value']); ?>">0</span>
                                </div>
                                <div class="text-ithena-black font-medium"><?php echo esc_html($impacts[0]['text']); ?></div>
                            </div>
                            
                            <div class="text-center border-l border-r border-gray md:px-8">
                                <div class="text-5xl font-bold text-ithena-blue mb-4">
                                    <span class="counter" data-suffix="<?php echo esc_attr($impacts[1]['symbol']); ?>" 
                                        data-target="<?php echo esc_attr($impacts[1]['value']); ?>">0</span>
                                </div>
                                <div class="text-ithena-black font-medium"><?php echo esc_html($impacts[1]['text']); ?></div>
                            </div>
                            
                            <div class="text-center">
                                <div class="text-5xl font-bold text-ithena-blue mb-4">
                                    <span class="counter" data-suffix="<?php echo esc_attr($impacts[2]['symbol']); ?>"
                                        data-target="<?php echo esc_attr($impacts[2]['value']); ?>">0</span>
                                </div>
                                <div class="text-ithena-black font-medium"><?php echo esc_html($impacts[2]['text']); ?></div>
                            </div>
                        
                        </div>
                    </div>
                </section>

                <!-- Key Challenges -->
                <section class="py-10 bg-ithena-white key_challenges">
                    <div class="max-w-7xl mx-auto px-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 items-center">
                            <div class="bg-ithena-blue text-ithena-white rounded-lg p-8">
                                <h3 class="text-2xl font-bold mb-6">Key Challenges Faced</h3>
                                <?php echo wp_kses_post($key_challenges); ?>
                            </div>
                            <div class="rounded-lg overflow-hidden shadow-lg"> 
                                <img src="<?php echo esc_url($key_challenges_image); ?>" class="w-full object-cover object-top" alt="Key Challenges Image">
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Our Solution -->
                <section class="py-10 bg-ithena-white">
                    <div class="max-w-7xl mx-auto px-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 items-center">
                            <div class="rounded-lg overflow-hidden shadow-lg">
                                <img src="<?php echo esc_url($solution_image); ?>" alt="Solution Image" class="w-full object-cover object-top">
                            </div>
                            <div class="bg-ithena-blue text-ithena-white rounded-lg p-8">
                                <h3 class="text-2xl font-bold mb-6">Our Solution</h3>
                                <p class="text-blue-100 mb-6">
                                    <?php echo esc_html($solution_description); ?>
                                </p>
                                <div class="mb-4 space-y-6">
                                    <?php foreach ($solutions as $solution): 
                                        // echo '<pre>';
                                        //     print_r($solution);
                                        // echo '</pre>';
                                    ?>
                                    <div class="flex items-start">
                                        <div class="w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">
                                            <img src="<?php echo esc_url($solution['icon']); ?>" alt="<?php echo esc_attr($solution['heading']); ?> Icon" class="w-6 h-6 object-contain">
                                        </div>
                                        <div>
                                            <h4 class="font-semibold mb-1"><?php echo esc_html($solution['heading']); ?></h4>
                                            <p class="text-blue-100 text-sm"><?php echo esc_html($solution['description']); ?></p>
                                        </div>
                                    </div>
                                    <?php 
                                        endforeach; ?>
                                </div>

                                <a data-btn_id="casestudy" class="bg-ithena-white custom-btn font-semibold px-6 py-3 text-ithena-blue">
                                    Download Case Study
                                </a>

                            </div>
                        </div>
                    </div>
                </section>

                <!-- Bottom CTA -->
                <?php   
                    $bgimg = "https://dev-website.ithena.app/wp-content/uploads/2024/10/footer-2.jpg";
                ?>
                <section class="py-10 relative overflow-hidden bottom-cta" 
                    style="background-image: url('<?php echo esc_url($bgimg); ?>'); background-size: cover; background-position: top;height:570px">
                    <div class="relative z-10 max-w-7xl mx-auto px-8 py-20">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                            <div>
                                <h2 class="text-4xl font-bold text-ithena-white mb-6">
                                    Learn more about ITHENA's Smart Offerings
                                </h2>
                                <p class="text-ithena-white text-lg mb-8 leading-relaxed">
                                    Discover how our IoT solutions can transform your telecommunications infrastructure with predictive monitoring, automated maintenance, and real-time insights.
                                </p>
                                <a data-btn_id="talktoexpert" class="bg-ithena-blue text-ithena-white px-8 py-3 !rounded-button font-semibold custom-btn">
                                    Talk to an Expert
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Counter Animation Script -->
                <script id="counter-animation">
                    document.addEventListener('DOMContentLoaded', function() { 
                        function animateCounter(counter) {
                            const target = parseInt(counter.getAttribute('data-target'));
                            const prefix = counter.getAttribute('data-prefix') || '';
                            const suffix = counter.getAttribute('data-suffix') || '';
                            const duration = 2000;
                            const step = target / (duration / 50);
                            let current = 0;
                            const timer = setInterval(() => {
                                current += step;
                                if (current >= target) {
                                current = target;
                                clearInterval(timer);
                                }
                                counter.textContent = prefix + Math.round(current) + suffix;
                            }, 50);
                        }
                        function handleIntersection(entries, observer) {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    const counter = entry.target;
                                    animateCounter(counter);
                                    observer.unobserve(counter);
                                }
                            });
                        }
                        const observer = new IntersectionObserver(handleIntersection, {
                            threshold: 0.5
                        });
                        const counters = document.querySelectorAll('.counter');
                        counters.forEach(counter => {
                            observer.observe(counter);
                        });

                    });
                </script>

                <!-- form Modal -->
                <div id="customModal" class="items-justified-center modal">
                    <div class="modal-content bg-white w-full max-w-lg mx-4 rounded-xl shadow-xl relative p-6 m-auto">
                        <button class="absolute right-4 top-4 text-ithena-black" onclick="closeModal()"><i class="ri-close-line text-2xl"></i></button>
                        <div class="text-center mb-6">
                            <h3 class="text-2xl font-bold">Please fill in the details below:</h3>
                            <!-- <p class="text-gray-600 mt-2">Fill out the form below and we'll be in touch shortly</p> -->
                        </div>
                        <div class="custom-formm"><?php echo do_shortcode('[formidable id=98]'); ?></div>
                    </div>
                </div>

                <!-- talk to expert - Modal -->
                <div id="talktoexpertModal" class="items-justified-center modal">
                    <div class="modal-content bg-white w-full max-w-lg mx-4 rounded-xl shadow-xl relative p-6 m-auto">
                        <button class="absolute right-4 top-4 text-ithena-black" onclick="closeModal()"><i class="ri-close-line text-2xl"></i></button>
                        <div class="text-center mb-6">
                            <h3 class="text-2xl font-bold">Please fill in the details below:</h3>
                            <!-- <p class="text-gray-600 mt-2">Fill out the form below and we'll be in touch shortly</p> -->
                        </div>
                        <div class="custom-formm"> <?php echo do_shortcode('[formidable id=100]'); ?></div>
                    </div>
                </div>

                <!-- Modal Script -->
                <script id="customModal">

                    (function() {
                        const MODALS = {
                            casestudy: 'customModal',
                            talktoexpert: 'talktoexpertModal'
                        };

                        document.addEventListener('click', (e) => {
                            const btn = e.target.closest('.custom-btn');
                            if (!btn) return;
                            const key = btn.dataset.btnId || btn.getAttribute('data-btn_id') || '';
                            const modalId = MODALS[key];
                            if (modalId) {
                                const modal = document.getElementById(modalId);
                                if (modal) modal.classList.add('active');
                                document.body.style.overflow = 'hidden';
                            }
                        });

                        window.closeModal = function() {
                            Object.values(MODALS).forEach(id => {
                                const m = document.getElementById(id);
                                if (m) m.classList.remove('active');
                            });
                            document.body.style.overflow = '';
                        };

                        // close when clicking outside modal content or pressing Escape
                        document.addEventListener('click', (e) => {
                            const active = e.target.closest('.modal.active');
                            if (active && !e.target.closest('.modal-content')) closeModal();
                        });

                        document.addEventListener('keydown', (e) => {
                            if (e.key === 'Escape') closeModal();
                        });
                    })();

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