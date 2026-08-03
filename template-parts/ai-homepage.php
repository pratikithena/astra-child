<?php
    /*
    Template Name: ithena ai-homepage
    */
?>
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

        <style name="custom-styles">
            
            /* .elementor-location-header, .elementor-location-footer,  */
            article.ast-article-single {
                display:none;
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

            body{ 
                color: var(--color-black) !important; 
                ul {
                    list-style-type: disc;        /* disc, circle, square, decimal, etc. */
                    list-style-position: outside; /* outside (default) or inside */
                    margin-left: 1.5rem;          /* ensure there is space for the bullets */
                    padding-left: 0;             /* keep control via margin-left */
                }
            }

            :where([class^="ri-"])::before { content: "\f3c2"; }

            /* overlay should be semi-transparent black */
            .custom-slider-overlay {
                background-color: rgba(0, 0, 0, 0.45);
            }

            .bg-gray-fade{
                background: linear-gradient(to top,#e7e6e6 85%,#fff 100%);
            }
            .bg-ithena-white-fade{
                background: linear-gradient(to top,#fff 85%,#e7e6e6 100%);
            }

            /* use CSS variables with var() */
            .bg-ithena-blue { background-color: var(--cust-primary); }
            .bg-ithena-gray { background-color: var(--cust-gray); } 
            .bg-ithena-white { background-color: var(--color-white); } 
            .bg-ithena-black { background-color: var(--color-black); } 
            .bg-ithena-maroon { background-color: var(--color-maroon); } 
            .border-ithena-blue { border-color: var(--cust-primary); }
            .text-ithena-white { color: var(--color-white); }
            .text-ithena-black { color: var(--color-black); }
            .text-ithena-blue { color: var(--cust-primary); }
            .text-ithena-maroon { color: var(--color-maroon); }

            .customer-card-bg { background-color: var(--color-blue); }
            .customer-card-bg-black { background-color: var(--color-black); }

            /* ensure images cover their area */
            .customer-img {width: 100%;height: 40%;object-fit: cover;}

            /* rotator block  */
            img.product-img { height: 80px; width: auto;}

            .custom-btn{
                text-decoration: none !important;
                cursor: default;
            }

            /* modal css */
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
        </style>

    </head>

    <body class="main-content bg-ithena-white">

        <!-- Custom Navbar -->
        <?php echo child_theme_custom_headmenu(); ?>
        
        <!-- Hero Slider -->
        <section class="relative h-screen overflow-hidden">
            <div class="slider-container relative w-full h-full">
                <!-- Slide 1 -->
                <div class="slide absolute inset-0 transition-transform duration-1000 translate-x-0" style="background-image: url('https://readdy.ai/api/search-image?query=Modern%20digital%20workspace%20with%20holographic%20data%20visualization%20and%20social%20media%20analytics%20dashboard%20floating%20in%20a%20bright%20minimalist%20office%20environment%20with%20clean%20white%20surfaces%20and%20soft%20blue%20lighting%20creating%20a%20futuristic%20technology%20atmosphere&width=1920&height=1080&seq=hero1&orientation=landscape'); background-size: cover; background-position: center;">
                    <div class="absolute inset-0 custom-slider-overlay"></div>
                    <div class="relative z-10 h-full flex items-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                            <div class="max-w-2xl">
                                <h1 class="text-5xl lg:text-6xl font-bold text-ithena-white mb-6">Persona-Based<br>Solutions</h1>
                                <p class="text-30px text-ithena-white mb-8">Combining the power of Human &  Artificial <br>Intelligence to provide improved outcomes<br> for our customers!</p>
                                <button class="bg-ithena-blue text-ithena-white p-3 !rounded-button ">Know More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="slide absolute inset-0 transition-transform duration-1000 translate-x-full" style="background-image: url('https://readdy.ai/api/search-image?query=Artificial%20intelligence%20brain%20network%20with%20glowing%20neural%20connections%20and%20automated%20data%20streams%20flowing%20through%20a%20sophisticated%20control%20center%20with%20multiple%20screens%20displaying%20growth%20metrics%20and%20analytics%20in%20a%20sleek%20modern%20environment&width=1920&height=1080&seq=hero2&orientation=landscape'); background-size: cover; background-position: center;">
                    <div class="absolute inset-0 custom-slider-overlay"></div>
                    <div class="relative z-10 h-full flex items-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                            <div class="max-w-2xl">
                                <h1 class="text-5xl lg:text-6xl font-bold text-ithena-white mb-6">Enterprise<br>Services</h1>
                                <p class="text-30px text-ithena-white mb-8">Transforming Enterprises with Digital technology <br>capabilities across modern, engaging,<br> and data-driven engagement!</p>
                                <button class="bg-ithena-blue text-ithena-white p-3 !rounded-button ">Know More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="slide absolute inset-0 transition-transform duration-1000 translate-x-full" style="background-image: url('https://readdy.ai/api/search-image?query=Global%20network%20visualization%20with%20interconnected%20nodes%20spanning%20across%20continents%20on%20a%20world%20map%20with%20social%20media%20icons%20and%20data%20points%20flowing%20between%20major%20cities%20in%20a%20sophisticated%20command%20center%20environment&width=1920&height=1080&seq=hero3&orientation=landscape'); background-size: cover; background-position: center;">
                    <div class="absolute inset-0 custom-slider-overlay"></div>
                    <div class="relative z-10 h-full flex items-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                            <div class="max-w-2xl">
                                <h1 class="text-5xl lg:text-6xl font-bold text-ithena-white mb-6">Use Cases</h1>
                                <p class="text-30px text-ithena-white mb-8">From Engineering to Manufacturing to<br> Service, helping customers realize the value<br> of digital investments.</p>
                                <button class="bg-ithena-blue text-ithena-white p-3 !rounded-button ">Know More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Navigation Dots -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3">
                <button class="dot w-3 h-3 rounded-full bg-ithena-white opacity-100 transition-opacity" data-slide="0"></button>
                <button class="dot w-3 h-3 rounded-full bg-ithena-white opacity-50 transition-opacity" data-slide="1"></button>
                <button class="dot w-3 h-3 rounded-full bg-ithena-white opacity-50 transition-opacity" data-slide="2"></button>
            </div>
        </section>
        
        <!-- Hero Section banner -->
        <section class="mt-20 relative min-h-screen w-full overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/80 z-10"></div>
            <div class="absolute inset-0" style="background-image: url('https://readdy.ai/api/search-image?query=Modern%20fleet%20of%20commercial%20vehicles%20trucks%20and%20delivery%20vans%20parked%20in%20organized%20rows%20at%20a%20logistics%20facility%20during%20golden%20hour%20with%20clean%20industrial%20background%20and%20professional%20lighting%20showcasing%20transportation%20and%20logistics%20industry&width=1920&height=1080&seq=hero-fleet&orientation=landscape'); background-size: cover; background-position: center;"></div>
            <div class="relative z-20 w-full min-h-screen flex items-center">
                <div class="w-full max-w-7xl mx-auto px-6 lg:px-8">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h1 class="text-5xl lg:text-7xl font-bold text-ithena-white mb-4 leading-tight">
                                Smart Asset<br>Tracking
                            </h1>
                            <p class="text-2xl lg:text-30px text-gray-300 font-light">iSAT</p>
                            <p class="text-18px text-gray-200 mt-6 max-w-lg">
                                Advanced real-time tracking solutions for your valuable business assets with precision and reliability.
                            </p>
                            
                            <button class="bg-ithena-blue text-ithena-white p-3 !rounded-button">Know More</button>

                        </div>
                        <div class="hidden lg:flex items-center justify-center">
                            <div class="w-32 h-32 flex items-center justify-center text-ithena-white/80">
                                <i class="ri-map-pin-2-line ri-8x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-20 relative min-h-screen w-full overflow-hidden">
            <div class="absolute inset-0 z-10" style="background:#ffffffcc;"></div>
            <div class="absolute inset-0" style="background-image: url('https://readdy.ai/api/search-image?query=Modern%20fleet%20of%20commercial%20vehicles%20trucks%20and%20delivery%20vans%20parked%20in%20organized%20rows%20at%20a%20logistics%20facility%20during%20golden%20hour%20with%20clean%20industrial%20background%20and%20professional%20lighting%20showcasing%20transportation%20and%20logistics%20industry&width=1920&height=1080&seq=hero-fleet&orientation=landscape'); background-size: cover; background-position: center;"></div>
            <div class="relative z-20 w-full min-h-screen flex items-center">
                <div class="w-full max-w-7xl mx-auto px-6 lg:px-8">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <h1 class="text-5xl lg:text-7xl font-bold text-ithena-black mb-4 leading-tight">
                                Smart Asset<br>Tracking
                            </h1>
                            <p class="text-2xl lg:text-30px text-ithena-black font-light">iSAT</p>
                            <p class="text-18px text-ithena-black mt-6 max-w-lg">
                                Advanced real-time tracking solutions for your valuable business assets with precision and reliability.
                            </p>
                            
                            <button class="bg-ithena-maroon text-ithena-white p-3 !rounded-button">Know More</button>

                        </div>
                        <div class="hidden lg:flex items-center justify-center">
                            <div class="w-32 h-32 flex items-center justify-center text-ithena-white/80">
                                <i class="ri-map-pin-2-line ri-8x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Use Cases Section - primary color -->
        <section id="use-cases-section-id" class="custom-section py-10 bg-ithena-white-fade use_cases_section ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-8">
                    <h2 class="section_title_fontsize pt-10 font-bold text-ithena-black mb-4">
                        Choose Your                                                    <span class="text-ithena-maroon">
                        Use Case                            </span>
                    </h2>
                    <div class="section_desc_fontsize text-ithena-black mx-auto">
                        <p>Discover how our platform transforms social data into actionable business intelligence across various departments and functions</p>
                    </div>
                </div>
                <!-- Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="use-case-card bg-ithena-gray border-2 border-ithena-blue p-6 rounded-lg
                        transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <div class="mb-6">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2025/11/cs-block5.jpg" alt="Build the factory of the future?" class="w-full h-48 rounded-lg object-cover">
                        </div>
                        <h3 class="text-20px font-bold text-ithena-black mb-3">
                            Build the factory of the future?                                    
                        </h3>
                        <div class="text-16px text-ithena-black">
                            Digitize processes, integrate shop floor assets, and transform user's service experience.                                                                            
                        </div>
                    </div>
                    <div class="use-case-card bg-ithena-gray border-2 border-ithena-blue p-6 rounded-lg
                        transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <div class="mb-6">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2025/11/cs-block1.jpg" alt="Make communities go greener and smarter?" class="w-full h-48 rounded-lg object-cover">
                        </div>
                        <h3 class="text-20px font-bold text-ithena-black mb-3">
                            Make communities go greener and smarter?                                    
                        </h3>
                        <div class="text-16px text-ithena-black">
                            <p>Transform communities with sustainable and energy-efficient solutions.</p>
                        </div>
                    </div>
                    <div class="use-case-card bg-ithena-gray border-2 border-ithena-blue p-6 rounded-lg
                        transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <div class="mb-6">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2025/11/cs-block2.jpg" alt="Modernize legacy business applications?" class="w-full h-48 rounded-lg object-cover">
                        </div>
                        <h3 class="text-20px font-bold text-ithena-black mb-3">
                            Modernize legacy business applications?                                    
                        </h3>
                        <div class="text-16px text-ithena-black">
                            <p>Modernize business applications and build experiences for customers.</p>
                        </div>
                    </div>
                    <div class="use-case-card bg-ithena-gray border-2 border-ithena-blue p-6 rounded-lg
                        transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <div class="mb-6">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2025/11/cs-block3.jpg" alt="Harness the power of organization's data?" class="w-full h-48 rounded-lg object-cover">
                        </div>
                        <h3 class="text-20px font-bold text-ithena-black mb-3">
                            Harness the power of organization's data?                                    
                        </h3>
                        <div class="text-16px text-ithena-black">
                            <p>Generate actionable business insights and optimize business output.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Industries Section -->
        <section class="custom-blocks py-10 bg-ithena-gray bg-gray-fade">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-32px font-bold text-ithena-black mb-4">Industries We Serve</h2>
                    <p class="text-30px text-ithena-black max-w-3xl mx-auto">Delivering specialized social intelligence solutions across diverse sectors to drive innovation and growth</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-ithena-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-tools-fill text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-18px font-bold text-ithena-black mb-3">INDUSTRIAL MANUFACTURING</h3>
                        <p class="text-ithena-black">Transforming manufacturing through digital technologies</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-ithena-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-car-line text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-18px font-bold text-ithena-black mb-3">AUTOMOTIVE & MOBILITY</h3>
                        <p class="text-ithena-black">Advancing the mobility ecosystem</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-ithena-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-health-book-line text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-18px font-bold text-ithena-black mb-3">HEALTHCARE & LIFE SCIENCES</h3>
                        <p class="text-ithena-black">Driving transformation to impact lives</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-ithena-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-flashlight-line text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-18px font-bold text-ithena-black mb-3">ENERGY, UTILITY & GOVERNMENT</h3>
                        <p class="text-ithena-black">Operational excellence for a cleaner future</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-ithena-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-film-line text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-18px font-bold text-ithena-black mb-3">MEDIA & ENTERTAINMENT</h3>
                        <p class="text-ithena-black">Optimising operations for audience acquisition</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Metrics Section -->
        <section class="custom-blocks py-10 bg-ithena-white bg-ithena-white-fade">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-32px font-bold text-ithena-black mb-4">Trusted by <span class="text-ithena-maroon">Industry Leaders</span></h2>
                    <p class="text-30px text-ithena-black max-w-3xl mx-auto">Join thousands of companies worldwide who rely on our platform for social intelligence</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <i class="ri-group-line text-ithena-blue text-5xl"></i>
                        </div>
                        <div class="counter text-32px font-bold text-ithena-black mb-2" data-target="250">0</div>
                        <h3 class="text-18px font-semibold text-ithena-black">Active Customers</h3>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <i class="ri-folder-line text-ithena-blue text-5xl"></i>
                        </div>
                        <div class="counter text-32px font-bold text-ithena-black mb-2" data-target="1200">0</div>
                        <h3 class="text-18px font-semibold text-ithena-black">Projects Completed</h3>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <i class="ri-global-line text-ithena-blue text-5xl"></i>
                        </div>
                        <div class="counter text-32px font-bold text-ithena-black mb-2" data-target="45">0</div>
                        <h3 class="text-18px font-semibold text-ithena-black">Countries Served</h3>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <i class="ri-team-line text-ithena-blue text-5xl"></i>
                        </div>
                        <div class="counter text-32px font-bold text-ithena-black mb-2" data-target="500">0</div>
                        <h3 class="text-18px font-semibold text-ithena-black">Employees</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- Introduction Section -->
        <section class="custom-blocks py-10 bg-ithena-gray bg-gray-fade">
            <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <h2 class="text-32px font-bold text-ithena-black mb-6">
                        <span class="text-ithena-maroon">Next-Generation</span> AI Platform
                    </h2>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                        <div class="w-6 h-6 flex items-center justify-center bg-ithena-blue/10 rounded-full flex-shrink-0 mt-1">
                            <i class="ri-check-line text-ithena-blue text-30px"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-ithena-black mb-2">User-Friendly & Ready-to-Use</h3>
                            <p class="text-ithena-black">Generative AI that's intuitive and unified, designed for enterprise adoption without complex setup.</p>
                        </div>
                        </div>
                        <div class="flex items-start space-x-4">
                        <div class="w-6 h-6 flex items-center justify-center bg-ithena-blue/10 rounded-full flex-shrink-0 mt-1">
                            <i class="ri-time-line text-ithena-blue text-30px"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-ithena-black mb-2">Fast Results Within Weeks</h3>
                            <p class="text-ithena-black">Accelerate your digital transformation with rapid deployment and immediate value realization.</p>
                        </div>
                        </div>
                        <div class="flex items-start space-x-4">
                        <div class="w-6 h-6 flex items-center justify-center bg-ithena-blue/10 rounded-full flex-shrink-0 mt-1">
                            <i class="ri-database-2-line text-ithena-blue text-30px"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-ithena-black mb-2">Complete Data Management</h3>
                            <p class="text-ithena-black">Comprehensive data connectivity, collection, classification, and management in one platform.</p>
                        </div>
                        </div>
                        <div class="flex items-start space-x-4">
                        <div class="w-6 h-6 flex items-center justify-center bg-ithena-blue/10 rounded-full flex-shrink-0 mt-1">
                            <i class="ri-settings-3-line text-ithena-blue text-30px"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-ithena-black mb-2">Enterprise Use Cases</h3>
                            <p class="text-ithena-black">Optimized for Production, Service, and Supply Chain operations across industries.</p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-ithena-white from-primary/5 to-blue-100 rounded-2xl p-8">
                        <img src="https://readdy.ai/api/search-image?query=modern%20enterprise%20dashboard%20interface%20showing%20AI%20analytics%2C%20data%20visualization%20charts%2C%20connected%20devices%20network%2C%20blue%20color%20scheme%2C%20clean%20professional%20design%2C%20futuristic%20technology%20interface%2C%20business%20intelligence%20platform%2C%20holographic%20data%20displays&width=600&height=400&seq=intro001&orientation=landscape"
                        alt="AI Platform Interface"
                        class="w-full h-auto rounded-lg shadow-lg object-cover">
                    </div>
                    <!-- Floating Stats -->
                    <div class="absolute -top-4 -right-4 bg-ithena-white rounded-lg shadow-lg p-4 border border-gray-200">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="text-sm font-medium text-ithena-black">99.9% Uptime</span>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-ithena-white rounded-lg shadow-lg p-4 border border-gray-200">
                        <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-ithena-blue rounded-full"></div>
                        <span class="text-sm font-medium text-ithena-black">Real-time Processing</span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <!-- Explore Section : white gray-->
        <section class="custom-blocks py-10 bg-ithena-white bg-ithena-white-fade">
            
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-8">
                    <h2 class="text-32px font-bold text-ithena-black mb-4">Explore</h2>
                    <p class="text-30px text-ithena-black max-w-3xl mx-auto">See how our solutions utilize the value of our platform</p>
                </div>
                <div class="grid md:grid-cols-3 gap-6">

                    <div class="explore-card group bg-ithena-gray rounded-2xl p-6 border border-gray-200 hover:shadow-xl transition-shadow hover:-translate-y-2 hover:bg-[#0082C8] transition-all duration-300 cursor-pointer">
                        <div class="w-16 h-16 flex items-center justify-center bg-ithena-white rounded-2xl mb-4 mx-auto">
                            <i class="ri-file-text-line text-ithena-blue text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-ithena-black mb-3 text-center group-hover:text-ithena-white transition-colors">Case Studies</h3>
                        <p class="text-ithena-black mb-4 text-center group-hover:text-ithena-white transition-colors">Discover real-world implementations across various technologies, industries, and use cases.</p>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-code-line text-ithena-blue group-hover:text-ithena-white transition-colors"></i>
                                </div>
                                <span class="text-sm group-hover:text-ithena-white transition-colors">Technology Solutions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-building-line text-ithena-blue group-hover:text-ithena-white transition-colors"></i>
                                </div>
                                <span class="text-sm group-hover:text-ithena-white transition-colors">Industry Applications</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-briefcase-line text-ithena-blue group-hover:text-ithena-white transition-colors"></i>
                                </div>
                                <span class="text-sm group-hover:text-ithena-white transition-colors">Business Solutions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-focus-line text-ithena-blue group-hover:text-ithena-white transition-colors"></i>
                                </div>
                                <span class="text-sm group-hover:text-ithena-white transition-colors">Use Case Examples</span>
                            </div>
                        </div>
                    </div>

                    <div class="explore-card group bg-ithena-gray rounded-2xl p-6 border border-gray-200 hover:shadow-xl transition-shadow hover:-translate-y-2 hover:bg-[#0082C8] transition-all duration-300 cursor-pointer">
                        <div class="w-16 h-16 flex items-center justify-center bg-ithena-white rounded-2xl mb-4 mx-auto">
                            <i class="ri-settings-2-line text-ithena-blue text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-ithena-black mb-3 text-center">Solutions</h3>
                        <p class="text-ithena-black mb-4 text-center">Comprehensive solutions for modern enterprise operations and management.</p>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-dashboard-line text-ithena-blue"></i>
                                </div>
                                <span class="text-sm ">Shopfloor Management</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-charging-pile-line text-ithena-blue"></i>
                                </div>
                                <span class="text-sm ">Charging Infrastructure</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-battery-line text-ithena-blue"></i>
                                </div>
                                <span class="text-sm ">Energy Management</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-radar-line text-ithena-blue"></i>
                                </div>
                                <span class="text-sm ">Asset Tracking</span>
                            </div>
                        </div>
                    </div>

                    <div class="explore-card group bg-ithena-gray rounded-2xl p-6 border border-gray-200 hover:shadow-xl transition-shadow hover:-translate-y-2 hover:bg-[#0082C8] transition-all duration-300 cursor-pointer">
                        <div class="w-16 h-16 flex items-center justify-center bg-ithena-white rounded-2xl mb-4 mx-auto">
                            <i class="ri-customer-service-line text-ithena-blue text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-ithena-black mb-3 text-center">Services</h3>
                        <p class="text-ithena-black mb-4 text-center">Expert services to accelerate your digital transformation journey.</p>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-base-station-line text-ithena-blue"></i>
                                </div>
                                <span class="text-sm ">IoT Implementation</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-database-2-line text-ithena-blue"></i>
                                </div>
                                <span class="text-sm ">Big Data Analytics</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-brain-line text-ithena-blue"></i>
                                </div>
                                <span class="text-sm ">AI/ML Development</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-flask-line text-ithena-blue"></i>
                                </div>
                                <span class="text-sm ">Data Science Consulting</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-6 mt-20">
                <div class="text-center mb-8">
                    <h2 class="text-32px font-bold mb-4">Explore</h2>
                    <p class="text-30px max-w-3xl mx-auto">See how our solutions utilize the value of our platform</p>
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    
                    <div class="explore-card bg-ithena-blue rounded-2xl p-6 border border-gray-200 hover:shadow-xl transition-shadow hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-16 h-16 flex items-center justify-center bg-ithena-white rounded-2xl mb-4 mx-auto">
                            <i class="ri-file-text-line text-ithena-blue text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-ithena-white mb-3 text-center">Case Studies</h3>
                        <p class="text-ithena-white mb-4 text-center">Discover real-world implementations across various technologies, industries, and use cases.</p>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-code-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">Technology Solutions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-building-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">Industry Applications</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-briefcase-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">Business Solutions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-focus-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">Use Case Examples</span>
                            </div>
                        </div>
                    </div>

                    <div class="explore-card bg-ithena-blue rounded-2xl p-6 border border-gray-200 hover:shadow-xl transition-shadow hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-16 h-16 flex items-center justify-center bg-ithena-white rounded-2xl mb-4 mx-auto">
                            <i class="ri-settings-2-line text-ithena-blue text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-ithena-white mb-3 text-center">Solutions</h3>
                        <p class="text-ithena-white mb-4 text-center">Comprehensive solutions for modern enterprise operations and management.</p>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-dashboard-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">Shopfloor Management</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-charging-pile-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">Charging Infrastructure</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-battery-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">Energy Management</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-radar-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">Asset Tracking</span>
                            </div>
                        </div>
                    </div>

                    <div class="explore-card bg-ithena-blue rounded-2xl p-6 border border-gray-200 hover:shadow-xl transition-shadow  hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-16 h-16 flex items-center justify-center bg-ithena-white rounded-2xl mb-4 mx-auto">
                            <i class="ri-customer-service-line text-ithena-blue text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-ithena-white mb-3 text-center">Services</h3>
                        <p class="text-ithena-white mb-4 text-center">Expert services to accelerate your digital transformation journey.</p>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-base-station-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">IoT Implementation</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-database-2-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">Big Data Analytics</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-brain-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">AI/ML Development</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-flask-line text-ithena-white"></i>
                                </div>
                                <span class="text-sm text-ithena-white">Data Science Consulting</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>  

        </section>

        <!-- Explore Section : white blue-->
        <section class="custom-blocks py-10 bg-ithena-gray">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-8">
                    <h2 class="text-32px font-bold mb-4">Explore</h2>
                    <p class="text-30px max-w-3xl mx-auto">See how our solutions utilize the value of our platform</p>
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    
                    <div class="explore-card bg-ithena-white rounded-2xl p-6 border-2 border-ithena-blue hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-16 h-16 flex items-center justify-center bg-ithena-blue rounded-2xl mb-4 mx-auto">
                            <i class="ri-file-text-line text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold mb-4 text-ithena-black text-center">Case Studies</h3>
                        <p class="mb-4 text-center">Discover real-world implementations across various technologies, industries, and use cases.</p>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-code-line "></i>
                                </div>
                                <span class="text-sm">Technology Solutions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-building-line "></i>
                                </div>
                                <span class="text-sm">Industry Applications</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-briefcase-line "></i>
                                </div>
                                <span class="text-sm">Business Solutions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-focus-line "></i>
                                </div>
                                <span class="text-sm">Use Case Examples</span>
                            </div>
                        </div>
                    </div>

                    <div class="explore-card bg-ithena-white rounded-2xl p-6 border-2 border-ithena-blue hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-16 h-16 flex items-center justify-center bg-ithena-blue rounded-2xl mb-4 mx-auto">
                            <i class="ri-settings-2-line text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold mb-3 text-center">Solutions</h3>
                        <p class="mb-4 text-center">Comprehensive solutions for modern enterprise operations and management.</p>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-dashboard-line "></i>
                                </div>
                                <span class="text-sm">Shopfloor Management</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-charging-pile-line "></i>
                                </div>
                                <span class="text-sm">Charging Infrastructure</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-battery-line "></i>
                                </div>
                                <span class="text-sm">Energy Management</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-radar-line "></i>
                                </div>
                                <span class="text-sm">Asset Tracking</span>
                            </div>
                        </div>
                    </div>

                    <div class="explore-card bg-ithena-white rounded-2xl p-6 border-2 border-ithena-blue hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="w-16 h-16 flex items-center justify-center bg-ithena-blue rounded-2xl mb-4 mx-auto">
                            <i class="ri-customer-service-line text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold mb-4 text-ithena-black text-center">Services</h3>
                        <p class="mb-4 text-center">Expert services to accelerate your digital transformation journey.</p>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-base-station-line "></i>
                                </div>
                                <span class="text-sm">IoT Implementation</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-database-2-line "></i>
                                </div>
                                <span class="text-sm">Big Data Analytics</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-brain-line "></i>
                                </div>
                                <span class="text-sm">AI/ML Development</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-flask-line "></i>
                                </div>
                                <span class="text-sm">Data Science Consulting</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>  
        </section>
        
        <!-- Platform Overview Section -->
        <section class="custom-blocks py-10 bg-ithena-white">
            
            <div class="blue-version max-w-7xl mx-auto px-6 lg:px-8">
                <div class="content-2-cards">
                    <h2 class="text-32px font-bold mb-12 text-center">Platform Overview</h2>
                    <div class="grid lg:grid-cols-2 gap-16 items-start">
                        <div class="space-y-8 cards">
                            <div class="bg-ithena-blue p-8 rounded-2xl text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                                <div class="w-16 h-16 mx-auto mb-6 bg-ithena-white rounded-2xl flex items-center justify-center">
                                    <i class="ri-share-line ri-2x text-ithena-blue"></i>
                                </div>
                                <h3 class="text-30px font-semibold text-ithena-white mb-4">Multi-Platform Integration</h3>
                                <p class="text-ithena-white">Seamlessly connects with LinkedIn, Google, Facebook, and other major social platforms</p>
                            </div>
                            <div class="bg-ithena-blue p-8 rounded-2xl text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                                <div class="w-16 h-16 mx-auto mb-6 bg-ithena-white rounded-2xl flex items-center justify-center">
                                    <i class="ri-cpu-line ri-2x text-ithena-blue"></i>
                                </div>
                                <h3 class="text-30px font-semibold text-ithena-white mb-4">AI-Powered Processing</h3>
                                <p class="text-ithena-white">Advanced AI middleware processes complex event streams in real-time</p>
                            </div>
                        </div>
                        <div class="text-content">
                            <p class="text-30px leading-relaxed mb-8">
                                ITHENA's Social Intelligence Platform (iSIP) is an AI-powered middleware application that interacts with social media platforms such as LinkedIn, Google, Facebook, and others.
                            </p>
                            <p class="text-30px leading-relaxed mb-8">
                                It acts as a bridge between the backend and front end and helps in connecting different applications seamlessly, despite their heterogeneous nature. Essentially functioning as a hidden translation layer, the middleware ingests complex event streams of customer signals every sub-second and enables communication and data management for distributed applications.
                            </p>
                            <p class="text-30px leading-relaxed mb-8">
                                iSIP provides an intuitive, self-explanatory user interface that helps organisations understand insights from their data, give further details on the root cause of sentiments on their social interactions, and provide an Agentic AI experience with actionable next steps for positive customer engagement.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 gray-version mt-20">
                <div class="content-2-cards">
                    <div class="grid lg:grid-cols-2 gap-16 items-start">                        
                        <div class="text-content">
                            <p class="text-30px leading-relaxed mb-8">
                                ITHENA's Social Intelligence Platform (iSIP) is an AI-powered middleware application that interacts with social media platforms such as LinkedIn, Google, Facebook, and others.
                            </p>
                            <p class="text-30px leading-relaxed mb-8">
                                It acts as a bridge between the backend and front end and helps in connecting different applications seamlessly, despite their heterogeneous nature. Essentially functioning as a hidden translation layer, the middleware ingests complex event streams of customer signals every sub-second and enables communication and data management for distributed applications.
                            </p>
                            <p class="text-30px leading-relaxed mb-8">
                                iSIP provides an intuitive, self-explanatory user interface that helps organisations understand insights from their data, give further details on the root cause of sentiments on their social interactions, and provide an Agentic AI experience with actionable next steps for positive customer engagement.
                            </p>
                        </div>
                        <div class="space-y-8 cards">
                            <div class="bg-ithena-gray p-8 rounded-2xl text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                                <div class="w-16 h-16 mx-auto mb-6 bg-ithena-white rounded-2xl flex items-center justify-center">
                                    <i class="ri-share-line ri-2x text-ithena-blue"></i>
                                </div>
                                <h3 class="text-30px font-semibold text-ithena-black mb-4">Multi-Platform Integration</h3>
                                <p class="text-ithena-black">Seamlessly connects with LinkedIn, Google, Facebook, and other major social platforms</p>
                            </div>
                            <div class="bg-ithena-gray p-8 rounded-2xl text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                                <div class="w-16 h-16 mx-auto mb-6 bg-ithena-white rounded-2xl flex items-center justify-center">
                                    <i class="ri-cpu-line ri-2x text-ithena-blue"></i>
                                </div>
                                <h3 class="text-30px font-semibold text-ithena-black mb-4">AI-Powered Processing</h3>
                                <p class="text-ithena-black">Advanced AI middleware processes complex event streams in real-time</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- Our Customers Say Section -->
        <section class="custom-blocks py-10 bg-ithena-gray" >
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-32px font-bold text-ithena-black mb-4">Our <span class="text-ithena-maroon">Customers</span> Say</h2>
                    <p class="text-30px text-ithena-black">See what industry leaders have to say about our platform</p>
                </div>
                <div class="max-w-7xl mx-auto px-6 lg:px-8 py-10">
                    <div class="grid md:grid-cols-3 gap-12">
                        <div class="text-center group">
                            <div class="w-16 h-16 mx-auto mb-6 bg-ithena-blue rounded-2xl flex items-center justify-center transition-colors">
                                <i class="ri-sound-module-line ri-2x text-ithena-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-ithena-black mb-4">Automated Insights</h3>
                            <p class="text-ithena-black leading-relaxed">
                                Get AI-generated, audio and data insights on your brand's social and societal impact with real-time analysis and predictive modeling.
                            </p>
                        </div>
                        <div class="text-center group">
                            <div class="w-16 h-16 mx-auto mb-6 bg-ithena-blue rounded-2xl flex items-center justify-center transition-colors">
                                <i class="ri-search-2-line ri-2x text-ithena-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-ithena-black mb-4">Deep Dive Analytics</h3>
                            <p class="text-ithena-black leading-relaxed">
                                Click down to the next level of data. Understand social initiatives and energy across global markets with comprehensive reporting tools.
                            </p>
                        </div>
                        <div class="text-center group">
                            <div class="w-16 h-16 mx-auto mb-6 bg-ithena-blue rounded-2xl flex items-center justify-center transition-colors">
                                <i class="ri-rocket-line ri-2x text-ithena-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-ithena-black mb-4">Agent-Driven Actions</h3>
                            <p class="text-ithena-black leading-relaxed">
                                Take actionable steps recommended by our AI agents to achieve your career and business development goals with strategic precision.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-8 mb-10">
                    
                    <!-- <div class="bg-ithena-white hover:shadow-xl p-8 rounded-2xl transition-all">
                        <div class="flex items-center mb-6">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20woman%20headshot%20portrait%2C%20confident%20smile%2C%20modern%20corporate%20attire%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&width=80&height=80&seq=customer-001&orientation=squarish" alt="Sarah Johnson" class="w-16 h-16 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-semibold text-ithena-black">Product Management, DJ</h4>
                            </div>
                        </div>
                        <p class=" leading-relaxed">
                            "The easiest tool in the market to help determine our current social listening score, our competitive advantage, detailed intel on how we can improve our Customer Experience | Social Reach | Product Innovation to improve overall brand."
                        </p>
                    </div>

                    <div class="bg-ithena-black p-8 rounded-2xl">
                        <div class="flex items-center mb-6">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20man%20headshot%20portrait%2C%20confident%20expression%2C%20modern%20suit%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&amp;width=80&amp;height=80&amp;seq=customer-002&amp;orientation=squarish" alt="Michael Chen" class="w-16 h-16 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-semibold text-ithena-white">VP Marketing</h4>
                            </div>
                        </div>
                        <p class="leading-relaxed text-ithena-white">
                            "We had several members in the marketing team working on analytics from campaigns and our outreach. Now we have half a person 🙂 and iSIP."
                        </p>
                    </div>
                    
                    <div class="bg-ithena-blue p-8 rounded-2xl">
                        <div class="flex items-center mb-6">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20woman%20headshot%20portrait%2C%20friendly%20smile%2C%20corporate%20blazer%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&amp;width=80&amp;height=80&amp;seq=customer-003&amp;orientation=squarish" alt="Emily Rodriguez" class="w-16 h-16 rounded-full object-cover mr-4 border-2 border-ithena-white">
                            <div>
                                <h4 class="font-semibold text-ithena-white"> Marketing Analyst, Management, Mary L</h4>
                            </div>
                        </div>
                        <p class="leading-relaxed text-ithena-white">
                            "We spent days in understanding patters of our various platforms. With iSIP we are able to get this information in seconds, and are able to take action within minutes!"
                        </p>
                    </div> -->

                    <div class="bg-ithena-white border-2 border-ithena-blue p-8 rounded-2xl">
                        <div class="flex items-center mb-6">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20man%20headshot%20portrait%2C%20warm%20smile%2C%20business%20casual%20attire%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&amp;width=80&amp;height=80&amp;seq=customer-004&amp;orientation=squarish" alt="David Park" class="border-2 border-ithena-blue h-16 mr-4 object-cover rounded-full w-16">
                            <div>
                                <h4 class="font-semibold text-ithena-black">Louis W, Head of Product Management</h4>
                            </div>
                        </div>
                        <p class=" leading-relaxed">
                            "ITHENA's iSIP provides recommendations that we would have never thought of. It generates insights, correlates them to our prorgrams and suggests actions for us to incorporate across product improvements, market analysis and go-to-market strategy."
                        </p>                        
                    </div>

                    <div class="bg-ithena-white border-2 border-ithena-blue p-8 rounded-2xl">
                        <div class="flex items-center mb-6">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20man%20headshot%20portrait%2C%20warm%20smile%2C%20business%20casual%20attire%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&amp;width=80&amp;height=80&amp;seq=customer-004&amp;orientation=squarish" alt="David Park" class="border-2 border-ithena-blue h-16 mr-4 object-cover rounded-full w-16">
                            <div>
                                <h4 class="font-semibold text-ithena-black">Louis W, Head of Product Management</h4>
                            </div>
                        </div>
                        <p class=" leading-relaxed">
                            "ITHENA's iSIP provides recommendations that we would have never thought of. It generates insights, correlates them to our prorgrams and suggests actions for us to incorporate across product improvements, market analysis and go-to-market strategy."
                        </p>                        
                    </div>

                    <div class="bg-ithena-white border-2 border-ithena-blue p-8 rounded-2xl">
                        <div class="flex items-center mb-6">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20man%20headshot%20portrait%2C%20warm%20smile%2C%20business%20casual%20attire%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&amp;width=80&amp;height=80&amp;seq=customer-004&amp;orientation=squarish" alt="David Park" class="border-2 border-ithena-blue h-16 mr-4 object-cover rounded-full w-16">
                            <div>
                                <h4 class="font-semibold text-ithena-black">Louis W, Head of Product Management</h4>
                            </div>
                        </div>
                        <p class=" leading-relaxed">
                            "ITHENA's iSIP provides recommendations that we would have never thought of. It generates insights, correlates them to our prorgrams and suggests actions for us to incorporate across product improvements, market analysis and go-to-market strategy."
                        </p>                        
                    </div>

                    <div class="bg-ithena-white border-2 border-ithena-blue p-8 rounded-2xl">
                        <div class="flex items-center mb-6">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20man%20headshot%20portrait%2C%20warm%20smile%2C%20business%20casual%20attire%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&amp;width=80&amp;height=80&amp;seq=customer-004&amp;orientation=squarish" alt="David Park" class="border-2 border-ithena-blue h-16 mr-4 object-cover rounded-full w-16">
                            <div>
                                <h4 class="font-semibold text-ithena-black">Louis W, Head of Product Management</h4>
                            </div>
                        </div>
                        <p class=" leading-relaxed">
                            "ITHENA's iSIP provides recommendations that we would have never thought of. It generates insights, correlates them to our prorgrams and suggests actions for us to incorporate across product improvements, market analysis and go-to-market strategy."
                        </p>                        
                    </div>

                </div>

            </div>
        </section>

        <!-- Our Customers | Projects | People Section -->
        <section class="custom-blocks py-10 bg-ithena-white" >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-32px font-bold mb-4">Our Customers | Projects | People</h2>
                    <p class="text-30px text-ithena-black max-w-3xl mx-auto">Discover the stories behind our successful partnerships and innovative solutions</p>
                </div>
                <div class="customers-slider relative">
                    <button class="customers-prev absolute left-0 top-1/2 transform -translate-y-1/2 bg-ithena-blue rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow z-10">
                        <i class="ri-arrow-left-line text-30px text-ithena-white"></i>
                    </button>
                    <button class="customers-next absolute right-0 top-1/2 transform -translate-y-1/2 bg-ithena-blue rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow z-10">
                        <i class="ri-arrow-right-line text-30px text-ithena-white"></i>
                    </button>
                    <div class="customers-container overflow-hidden mx-12">
                        <div class="customers-slides flex transition-transform duration-500">
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-950.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Equipment Efficiency</h3> -->
                                        <p class="text-ithena-white text-sm">Enhancing equipment efficiency, leading to cost savings in manufacturing, transportation and storage.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Group-697.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">OTT Streaming Analytics</h3> -->
                                        <p class="text-ithena-white text-sm">Identifying high-performing content and creating successful strategies for OTT streaming services.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Frame-31.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Google Cloud Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Transforming businesses with the best infrastructure, platform, industry solutions and expertise with Google Cloud.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-953.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">IT Asset Transformation</h3> -->
                                        <p class="text-ithena-white text-sm">Seamless transformation of all IT assets, regardless of complexity or synchronicity at super-optimized costs.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2024/08/Rectangle-948-2.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Incorta Data Platform</h3> -->
                                        <p class="text-ithena-white text-sm">Empowering businesses to make data-driven decisions with unmatched speed with Incorta's Direct Data Platform.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Group-467-1.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Infor Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Implementing pre-existing Infor solutions with customised maintenance, optimization and debugging services.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Copy-of-Rectangle-131.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Data Environment Optimization</h3> -->
                                        <p class="text-ithena-white text-sm">Reducing infrastructure cost and increase productivity through unified and reliable data environment.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-952.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">PTC Digital Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Accelerating the deployment of PTC Thingworx and Vuforia platform for digital agility and smart industry solutions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/oracle-2.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Oracle Modernization</h3> -->
                                        <p class="text-ithena-white text-sm">Modernizing businesses with EBS upgrades and reducing the total cost of ownership with Oracle Fusion Apps.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-948.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Microsoft Power BI</h3> -->
                                        <p class="text-ithena-white text-sm">Microsoft Power BI's data visualisation tools help businesses modernize apps and make better decisions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-954-1.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Asset Localization</h3> -->
                                        <p class="text-ithena-white text-sm">Offering a dependable asset localization solution for manufacturing, industrial, and commercial sectors.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
                <div class="text-center mb-8">
                    <h2 class="text-32px font-bold mb-4">Our Customers | Projects | People</h2>
                    <p class="text-30px text-ithena-black max-w-3xl mx-auto">Discover the stories behind our successful partnerships and innovative solutions</p>
                </div>
                <div class="customers-slider-2 relative">
                    
                    <button class="customers-prev-2 absolute left-0 top-1/2 transform -translate-y-1/2 bg-ithena-black rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow z-10">
                        <i class="ri-arrow-left-line text-30px text-ithena-white"></i>
                    </button>
                    <button class="customers-next-2 absolute right-0 top-1/2 transform -translate-y-1/2 bg-ithena-black rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow z-10">
                        <i class="ri-arrow-right-line text-30px text-ithena-white"></i>
                    </button>
                    
                    <div class="customers-container overflow-hidden mx-12">
                        <div class="customers-slides-2 flex transition-transform duration-500">
                            
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-950.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Equipment Efficiency</h3> -->
                                        <p class="text-ithena-white text-sm">Enhancing equipment efficiency, leading to cost savings in manufacturing, transportation and storage.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Group-697.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">OTT Streaming Analytics</h3> -->
                                        <p class="text-ithena-white text-sm">Identifying high-performing content and creating successful strategies for OTT streaming services.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Frame-31.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Google Cloud Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Transforming businesses with the best infrastructure, platform, industry solutions and expertise with Google Cloud.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-953.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">IT Asset Transformation</h3> -->
                                        <p class="text-ithena-white text-sm">Seamless transformation of all IT assets, regardless of complexity or synchronicity at super-optimized costs.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2024/08/Rectangle-948-2.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Incorta Data Platform</h3> -->
                                        <p class="text-ithena-white text-sm">Empowering businesses to make data-driven decisions with unmatched speed with Incorta's Direct Data Platform.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Group-467-1.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Infor Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Implementing pre-existing Infor solutions with customised maintenance, optimization and debugging services.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Copy-of-Rectangle-131.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Data Environment Optimization</h3> -->
                                        <p class="text-ithena-white text-sm">Reducing infrastructure cost and increase productivity through unified and reliable data environment.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-952.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">PTC Digital Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Accelerating the deployment of PTC Thingworx and Vuforia platform for digital agility and smart industry solutions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/oracle-2.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Oracle Modernization</h3> -->
                                        <p class="text-ithena-white text-sm">Modernizing businesses with EBS upgrades and reducing the total cost of ownership with Oracle Fusion Apps.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-948.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Microsoft Power BI</h3> -->
                                        <p class="text-ithena-white text-sm">Microsoft Power BI's data visualisation tools help businesses modernize apps and make better decisions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-954-1.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-18px font-bold text-ithena-black mb-2">Asset Localization</h3> -->
                                        <p class="text-ithena-white text-sm">Offering a dependable asset localization solution for manufacturing, industrial, and commercial sectors.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
        
        <!-- Discover Success Stories Section -->
        <section class="custom-blocks py-10 bg-ithena-gray" >
            <div class="container mx-auto px-6">
                
                <div class="text-center mb-5">
                    <h2 class="text-32px font-bold text-ithena-black mb-4">Discover <span class="text-ithena-maroon">iSERV Success Stories</span></h2>
                    <p class="text-30px text-ithena-black">Real results from industry leaders who trust iSERV</p>
                </div>

                <div class="relative white-block">
                    <div class="bg-ithena-white rounded-lg p-8 lg:p-10 hover:shadow-xl transition-all duration-300 cursor-pointer">
                        <div class="flex  lg:flex-row items-center gap-10">
                        <div class="lg:w-1/2">
                            <div class="mb-6">
                                <h3 class="text-2xl font-semibold mb-4 text-ithena-black">Deploying ITHENA&#x27;s iSERV to enhance operations at the leading metal-forming and forging company</h3>
                                <p class="text-30px leading-relaxed mb-4" style="font-size:16px">
                                    &quot;<!-- -->The client, a frontrunner in the metal forging sector, aimed to embrace data-driven manufacturing to enhance plant efficiency. Implementing iSERV in their machinery facilitated real-time access to critical equipment parameters via personalized dashboards, empowering users to conduct predictive maintenance activities. Additionally, iSERV enabled users to access a knowledge repository and provided self-help videos and manuals for enhanced operational effectiveness.<!-- -->&quot;
                                </p>
                                <div class="keyvalue-text mb-2">
                                    <span class="text-32px font-bold text-ithena-maroon">18%</span>
                                    <span class="text-l italic ml-2 text-ithena-maroon">enhanced efficiency</span>
                                </div>
                            </div>
                            <!-- <div class="flex space-x-4"><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-ithena-white transition-colors cursor-pointer"><i class="ri-arrow-left-line text-30px"></i></button><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-ithena-white transition-colors cursor-pointer"><i class="ri-arrow-right-line text-30px"></i></button></div> -->
                        </div>
                        <div class="lg:w-1/2">
                            <img src="https://readdy.ai/api/search-image?query=Modern%20industrial%20metal%20forging%20facility%20with%20advanced%20machinery%20and%20equipment%2C%20real-time%20monitoring%20dashboards%20displaying%20equipment%20parameters%20and%20performance%20metrics%2C%20professional%20manufacturing%20environment%20with%20digital%20displays%2C%20predictive%20maintenance%20interface%2C%20transparent%20background%2C%20no%20background%2C%20clean%20cutout%20style%2C%20industrial%20blue%20color%20scheme%2C%20no%20white%20background%2C%20clean%20transparent%20cutout&amp;width=350&amp;height=250&amp;seq=testimonial1_forging_transparent&amp;orientation=landscape" 
                                alt="Deploying ITHENAs iSERV to enhance operations at the leading metal-forming and forging company Dashboard" class="w-full h-auto rounded-lg shadow-xl object-cover"/></div>
                        </div>
                    </div>
                </div>

                <div class="relative blue-block mt-10">
                    <div class="bg-ithena-blue rounded-lg p-8 lg:p-10 hover:shadow-xl transition-all duration-300 cursor-pointer">
                        <div class="flex  lg:flex-row items-center gap-10">
                        <div class="lg:w-1/2">
                            <div class="mb-6">
                                <h3 class="text-2xl font-semibold mb-4 text-ithena-white">Deploying ITHENA&#x27;s iSERV to enhance operations at the leading metal-forming and forging company</h3>
                                <p class="text-l leading-relaxed mb-4 text-ithena-white">
                                    The client, a frontrunner in the metal forging sector, aimed to embrace data-driven manufacturing to enhance plant efficiency. Implementing iSERV in their machinery facilitated real-time access to critical equipment parameters via personalized dashboards, empowering users to conduct predictive maintenance activities. Additionally, iSERV enabled users to access a knowledge repository and provided self-help videos and manuals for enhanced operational effectiveness.<!-- -->&quot;
                                </p>
                                <div class="keyvalue-text mb-2">
                                    <span class="text-32px font-bold text-ithena-white">18%</span>
                                    <span class="text-30px italic ml-2 text-ithena-white">enhanced efficiency</span>
                                </div>
                            </div>
                            <!-- <div class="flex space-x-4"><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-ithena-white transition-colors cursor-pointer"><i class="ri-arrow-left-line text-30px"></i></button><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-ithena-white transition-colors cursor-pointer"><i class="ri-arrow-right-line text-30px"></i></button></div> -->
                        </div>
                        <div class="lg:w-1/2">
                            <img src="https://readdy.ai/api/search-image?query=Modern%20industrial%20metal%20forging%20facility%20with%20advanced%20machinery%20and%20equipment%2C%20real-time%20monitoring%20dashboards%20displaying%20equipment%20parameters%20and%20performance%20metrics%2C%20professional%20manufacturing%20environment%20with%20digital%20displays%2C%20predictive%20maintenance%20interface%2C%20transparent%20background%2C%20no%20background%2C%20clean%20cutout%20style%2C%20industrial%20blue%20color%20scheme%2C%20no%20white%20background%2C%20clean%20transparent%20cutout&amp;width=350&amp;height=250&amp;seq=testimonial1_forging_transparent&amp;orientation=landscape" 
                                alt="Deploying ITHENAs iSERV to enhance operations at the leading metal-forming and forging company Dashboard" class="w-full h-auto rounded-lg shadow-xl object-cover"/></div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        
        <!-- FAQ Section -->
        <section class="custom-blocks py-10 bg-ithena-white" >
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <h2 class="font-bold mb-12 text-32px text-center text-ithena-maroon">Frequently Asked Questions</h2>
                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <div>
                        <h4 class="font-semibold text-ithena-black mb-2">What happens after the 14-day free trial?</h4>
                        <p class="text-sm text-ithena-black">After your trial ends, you&#x27;ll be automatically enrolled in the Professional plan at $49/month per user. You can cancel anytime before the trial ends with no charges.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-ithena-black mb-2">Can I change plans later?</h4>
                        <p class="text-sm text-ithena-black">Yes, you can upgrade or downgrade your plan at any time. Changes take effect immediately and billing is prorated.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-ithena-black mb-2">Is there a setup fee?</h4>
                        <p class="text-sm text-ithena-black">No setup fees, no hidden costs. You only pay the monthly subscription fee per user.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-ithena-black mb-2">What support is included?</h4>
                        <p class="text-sm text-ithena-black">All plans include email support. Professional and Enterprise plans get priority support with faster response times.</p>
                    </div>
                </div>
            </div>
        </section>               
        
        <!-- Applications / case study Section -->
        <section class="custom-blocks py-10 bg-ithena-gray">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                
                <div class="text-center mb-8">
                    <h2 class="text-32px font-bold  mb-4">Applications – <span class="text-ithena-maroon">Inbound & Outbound Tracking</span></h2>
                    <p class="text-30px text-ithena-black">Get value from both indoor and outdoor tracking.</p>
                </div>

                <div class="white-block grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
                    <div class="application-card border-2 border-ithena-blue bg-ithena-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://readdy.ai/api/search-image?query=Modern%20medical%20laboratory%20with%20advanced%20equipment%20monitoring%20systems%20digital%20displays%20showing%20asset%20tracking%20technology%20clean%20sterile%20environment%20with%20medical%20devices%20and%20compliance%20monitoring%20screens%20professional%20healthcare%20setting&width=400&height=300&seq=medical-lab&orientation=landscape"
                                alt="Medical Labs & Hospitals"
                                class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-30px font-semibold  mb-3">Medical Labs & Hospitals</h3>
                            <p class="text-ithena-black">For asset compliance and traceability with comprehensive monitoring of critical medical equipment and inventory.</p>
                        </div>
                    </div>
                    <div class="application-card border-2 border-ithena-blue bg-ithena-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://readdy.ai/api/search-image?query=Modern%20warehouse%20interior%20with%20organized%20shelving%20systems%20digital%20asset%20tracking%20displays%20automated%20inventory%20management%20technology%20clean%20industrial%20environment%20with%20tracking%20sensors%20and%20optimization%20screens&width=400&height=300&seq=warehouse&orientation=landscape"
                                alt="Warehouse and Storerooms"
                                class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-30px font-semibold mb-3">Warehouse and Storerooms</h3>
                            <p class="text-ithena-black">For optimising asset use and reducing errors through intelligent inventory tracking and management systems.</p>
                        </div>
                    </div>
                    <div class="application-card border-2 border-ithena-blue bg-ithena-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://readdy.ai/api/search-image?query=Refrigerated%20truck%20with%20advanced%20monitoring%20dashboard%20showing%20temperature%20tracking%20systems%20GPS%20location%20real-time%20data%20displays%20cold%20chain%20logistics%20technology%20professional%20transportation%20setting%20with%20tracking%20interfaces&width=400&height=300&seq=reefer-truck&orientation=landscape"
                                alt="Reefer Truck Tracking"
                                class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-30px font-semibold  mb-3">Reefer Truck Tracking</h3>
                            <p class="text-ithena-black">For real-time monitoring of refrigerated trucks ensuring temperature compliance and cargo safety throughout delivery.</p>
                        </div>
                    </div>
                    <div class="application-card border-2 border-ithena-blue bg-ithena-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://readdy.ai/api/search-image?query=Commercial%20delivery%20truck%20on%20highway%20with%20GPS%20tracking%20interface%20overlay%20showing%20real-time%20location%20monitoring%20system%20and%20route%20optimization%20technology%20modern%20fleet%20management%20dashboard%20with%20navigation%20markers&width=400&height=300&seq=tracking-wheels&orientation=landscape"
                                alt="Tracking On Wheels"
                                class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-30px font-semibold  mb-3">Tracking On Wheels</h3>
                            <p class="text-ithena-black">GPS integration which allows us to locate asset carrying vehicles on the road so that they can be tracked and traced.</p>
                        </div>
                    </div>
                    <div class="application-card border-2 border-ithena-blue bg-ithena-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://readdy.ai/api/search-image?query=Armored%20bank%20security%20truck%20interior%20with%20high-tech%20asset%20tracking%20monitoring%20systems%20displaying%20cargo%20surveillance%20screens%20and%20secure%20transport%20technology%20professional%20security%20vehicle%20with%20digital%20tracking%20interfaces&width=400&height=300&seq=truck-interior&orientation=landscape"
                                alt="Asset Tracking Inside Truck"
                                class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-30px font-semibold  mb-3">Asset Tracking Inside Truck</h3>
                            <p class="text-ithena-black">Track your valuable assets inside the trucks; Example - Bank vehicles can use this solution for security purposes when delivering hard currency.</p>
                        </div>
                    </div>
                </div>

                <div class="blue-block grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8 mt-10">
                    <div class="application-card bg-ithena-blue rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://readdy.ai/api/search-image?query=Modern%20medical%20laboratory%20with%20advanced%20equipment%20monitoring%20systems%20digital%20displays%20showing%20asset%20tracking%20technology%20clean%20sterile%20environment%20with%20medical%20devices%20and%20compliance%20monitoring%20screens%20professional%20healthcare%20setting&width=400&height=300&seq=medical-lab&orientation=landscape"
                                alt="Medical Labs & Hospitals"
                                class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-30px font-semibold text-ithena-white mb-3">Medical Labs & Hospitals</h3>
                            <p class="text-ithena-white">For asset compliance and traceability with comprehensive monitoring of critical medical equipment and inventory.</p>
                        </div>
                    </div>
                    <div class="application-card bg-ithena-blue rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://readdy.ai/api/search-image?query=Modern%20warehouse%20interior%20with%20organized%20shelving%20systems%20digital%20asset%20tracking%20displays%20automated%20inventory%20management%20technology%20clean%20industrial%20environment%20with%20tracking%20sensors%20and%20optimization%20screens&width=400&height=300&seq=warehouse&orientation=landscape"
                                alt="Warehouse and Storerooms"
                                class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-30px font-semibold text-ithena-white mb-3">Warehouse and Storerooms</h3>
                            <p class="text-ithena-white">For optimising asset use and reducing errors through intelligent inventory tracking and management systems.</p>
                        </div>
                    </div>
                    <div class="application-card bg-ithena-blue rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://readdy.ai/api/search-image?query=Refrigerated%20truck%20with%20advanced%20monitoring%20dashboard%20showing%20temperature%20tracking%20systems%20GPS%20location%20real-time%20data%20displays%20cold%20chain%20logistics%20technology%20professional%20transportation%20setting%20with%20tracking%20interfaces&width=400&height=300&seq=reefer-truck&orientation=landscape"
                                alt="Reefer Truck Tracking"
                                class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-30px font-semibold text-ithena-white mb-3">Reefer Truck Tracking</h3>
                            <p class="text-ithena-white">For real-time monitoring of refrigerated trucks ensuring temperature compliance and cargo safety throughout delivery.</p>
                        </div>
                    </div>
                    <div class="application-card bg-ithena-blue rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://readdy.ai/api/search-image?query=Commercial%20delivery%20truck%20on%20highway%20with%20GPS%20tracking%20interface%20overlay%20showing%20real-time%20location%20monitoring%20system%20and%20route%20optimization%20technology%20modern%20fleet%20management%20dashboard%20with%20navigation%20markers&width=400&height=300&seq=tracking-wheels&orientation=landscape"
                                alt="Tracking On Wheels"
                                class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-30px font-semibold text-ithena-white mb-3">Tracking On Wheels</h3>
                            <p class="text-ithena-white">GPS integration which allows us to locate asset carrying vehicles on the road so that they can be tracked and traced.</p>
                        </div>
                    </div>
                    <div class="application-card bg-ithena-blue rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://readdy.ai/api/search-image?query=Armored%20bank%20security%20truck%20interior%20with%20high-tech%20asset%20tracking%20monitoring%20systems%20displaying%20cargo%20surveillance%20screens%20and%20secure%20transport%20technology%20professional%20security%20vehicle%20with%20digital%20tracking%20interfaces&width=400&height=300&seq=truck-interior&orientation=landscape"
                                alt="Asset Tracking Inside Truck"
                                class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-30px font-semibold text-ithena-white mb-3">Asset Tracking Inside Truck</h3>
                            <p class="text-ithena-white">Track your valuable assets inside the trucks; Example - Bank vehicles can use this solution for security purposes when delivering hard currency.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Tabs and Panel Section -->
        <style>
            .panel-img img {opacity: 0; transform: translateX(80px);}
            .panel-img img.slide-in {animation: panelImgSlideIn 0.6s ease-out forwards;}
            @keyframes panelImgSlideIn { from {opacity: 0;transform: translateX(80px);} to { opacity: 1; transform: translateX(0); }}
        </style>

        <section id="tab-panel-section-id" class="custom-section py-10 tab_panel_section bg-ithena-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="section_title_fontsize  pt-10 font-bold text-ithena-black mb-4">
                        Optimize Spare Parts Ordering | Enhance Customer Service |                                                     <span class="text-ithena-maroon">
                        Drive Business Growth                            </span>
                    </h2>
                </div>
                <!-- Tab Navigation -->
                <div class="flex justify-center mb-12">
                    <div class="flex flex-col md:flex-row gap-8 md:gap-12">
                        <button class="tab-btn flex flex-col items-center px-6 py-6 border-b-4 border-transparent active" data-tab="seamless_erp_integration" style="border-bottom-color: rgb(0, 130, 200);">
                        <img src="https://dev-website.ithena.app/wp-content/uploads/2025/11/erp.png" alt="Seamless ERP Integration" class="h-20 mb-4">
                        <span class="text-18px font-bold">Seamless ERP Integration</span>
                        <span class="text-14px text-sm font-semibold">with Accurate, Real-time Data</span>
                        </button>
                        <button class="tab-btn flex flex-col items-center px-6 py-6 border-b-4 border-transparent" data-tab="immersive_customer_experiences" style="border-bottom-color: transparent;">
                        <img src="https://dev-website.ithena.app/wp-content/uploads/2025/11/3d-model-1.png" alt="Immersive Customer Experiences" class="h-20 mb-4">
                        <span class="text-18px font-bold">Immersive Customer Experiences</span>
                        <span class="text-14px text-sm font-semibold">with Virtual Showrooms</span>
                        </button>
                        <button class="tab-btn flex flex-col items-center px-6 py-6 border-b-4 border-transparent" data-tab="self-servicing_tools" style="border-bottom-color: transparent;">
                        <img src="https://dev-website.ithena.app/wp-content/uploads/2025/11/self-service-1.png" alt="Self-Servicing Tools" class="h-20 mb-4">
                        <span class="text-18px font-bold">Self-Servicing Tools</span>
                        <span class="text-14px text-sm font-semibold">Empowering Customers</span>
                        </button>
                        <button class="tab-btn flex flex-col items-center px-6 py-6 border-b-4 border-transparent" data-tab="unified_data_hub" style="border-bottom-color: transparent;">
                        <img src="https://dev-website.ithena.app/wp-content/uploads/2025/11/technology.png" alt="Unified Data Hub" class="h-20 mb-4">
                        <span class="text-18px font-bold">Unified Data Hub</span>
                        <span class="text-14px text-sm font-semibold">for Total Visibility</span>
                        </button>
                        <button class="tab-btn flex flex-col items-center px-6 py-6 border-b-4 border-transparent" data-tab="24/7_global_support" style="border-bottom-color: transparent;">
                        <img src="https://dev-website.ithena.app/wp-content/uploads/2025/11/services.png" alt="24/7 Global Support" class="h-20 mb-4">
                        <span class="text-18px font-bold">24/7 Global Support</span>
                        <span class="text-14px text-sm font-semibold">with Closed-loop System</span>
                        </button>
                    </div>
                </div>
                <!-- Panels -->
                <div class="tab-panels">
                    <div class="tab-panel" id="seamless_erp_integration-panel">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <div class="panel-text">
                                <h3 class="text-30px font-bold text-ithena-maroon mb-6"><b> ERP Integration </b></h3>
                                <div class="text-16px mb-6">
                                    <p>This is the panel one description for testing purposes. This is the panel one description for testing purposes. This is panel one description for testing purposes.</p>
                                    <p><strong>This is the panel one description for testing purposes. This is the panel one description for testing purposes.</strong> This is the panel one description for testing purposes. This is the panel one description for testing purposes.</p>
                                </div>
                                <ul class="space-y-4">
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Bill of materials (BOM) visualization for smarter, faster decisions.</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Stock availability with real-time stock updates to reduce downtime.</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Dynamic, customer-specific pricing with real-time parts availability and estimated shipping details for a seamless purchasing experience</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-img">
                                <img src="https://dev-website.ithena.app/wp-content/uploads/2025/06/ignition-webpage-banner.jpg" alt="&lt;b&gt; ERP Integration &lt;/b&gt;" class="h-[338px] w-full object-cover rounded-lg shadow-lg slide-in" style="opacity: 0;">
                            </div>
                        </div>
                    </div>
                    <div class="tab-panel hidden" id="immersive_customer_experiences-panel">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <div class="panel-text">
                                <h3 class="text-30px font-bold text-ithena-maroon mb-6">Virtual Showrooms for Immersive Customer Experience</h3>
                                <div class="text-16px mb-6"></div>
                                <ul class="space-y-4">
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">End-to-end e-commerce capabilities for efficient order management and improved operational efficiency</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Fast access to recommended spare parts lists (RSPL), distinguishing critical and maintenance parts, along with wishlist management for quick reordering.</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Automated email notifications and real-time order tracking for a smooth buying experience</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-img">
                                <img src="https://dev-website.ithena.app/wp-content/uploads/2024/12/1-banner-1-1.jpg" alt="Virtual Showrooms for Immersive Customer Experience" class="h-[338px] w-full object-cover rounded-lg shadow-lg" style="opacity: 0;">
                            </div>
                        </div>
                    </div>
                    <div class="tab-panel hidden" id="self-servicing_tools-panel">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <div class="panel-text">
                                <h3 class="text-30px font-bold text-ithena-maroon mb-6">Empower Customers with Self-Service</h3>
                                <div class="text-16px mb-6"></div>
                                <ul class="space-y-4">
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Panel 3 - Content - List item 1</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Panel 3 - Content - List item 2</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Panel 3 - Content - List item 3</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Panel 3 - Content - List item 4</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-img">
                                <img src="https://dev-website.ithena.app/wp-content/uploads/2025/08/iSERV-2.jpg" alt="Empower Customers with Self-Service" class="h-[338px] w-full object-cover rounded-lg shadow-lg" style="opacity: 0;">
                            </div>
                        </div>
                    </div>
                    <div class="tab-panel hidden" id="unified_data_hub-panel">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <div class="panel-text">
                                <h3 class="text-30px font-bold text-ithena-maroon mb-6">Unified Data Hub for Total Visibility</h3>
                                <div class="text-16px mb-6"></div>
                                <ul class="space-y-4">
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Panel 4 - Content - List item 1</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Panel 4 - Content - List item 2</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Panel 4 - Content - List item 3</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Panel 4 - Content - List item 4</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-img">
                                <img src="https://dev-website.ithena.app/wp-content/uploads/2024/10/4-SOLUTION-4-scaled.webp" alt="Unified Data Hub for Total Visibility" class="h-[338px] w-full object-cover rounded-lg shadow-lg" style="opacity: 0;">
                            </div>
                        </div>
                    </div>
                    <div class="tab-panel hidden" id="24/7_global_support-panel">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <div class="panel-text">
                                <h3 class="text-30px font-bold text-ithena-maroon mb-6">24/7 Global Support with CLose-Loop System</h3>
                                <div class="text-16px mb-6"></div>
                                <ul class="space-y-4">
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Around-the-clock global support for issue resolution</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">AI-powered chatbot for immediate assistance anytime, anywhere</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Direct access to customer care representatives for personalized support</p>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line mr-3"></i>
                                        <p class="text-16px m-0">Seamless issue management with efficient case logging and tracking</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Accordion Section -->
        <section class="custom-blocks py-10 bg-ithena-gray">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-32px font-bold mb-4">Frequently Asked Questions</h2>
                    <p class="text-30px max-w-3xl mx-auto">Get answers to the most common questions about our social intelligence platform</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                    <!-- Left Side - Accordions -->
                    <div class="space-y-4">
                        
                        <div class="active accordion-items bg-ithena-white rounded-lg shadow-sm">
                            <button class="accordion-header w-full px-6 py-6 text-left flex items-center justify-between hover:bg-ithena-gray transition-colors" data-accordion="platform">
                                <div>
                                    <h3 class="text-30px text-ithena-blue font-bold mb-2">What is Social Intelligence Platform?</h3>
                                    <!-- <p class="text-ithena-black">Learn about our comprehensive social data analysis solution</p> -->
                                </div>
                                <i class="ri-arrow-down-s-line text-2xl transition-transform duration-300 text-ithena-blue"></i>
                            </button>
                            <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                                <div class="px-6 pb-6">
                                    <p class="">Our Social Intelligence Platform is an advanced AI-powered solution that transforms social media data into actionable business insights. It monitors conversations across multiple platforms, analyzes sentiment, identifies trends, and provides real-time analytics to help businesses make informed decisions and improve their social media strategy.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-items bg-ithena-white rounded-lg shadow-sm">
                            <button class="accordion-header w-full px-6 py-6 text-left flex items-center justify-between hover:bg-ithena-gray transition-colors" data-accordion="features">
                                <div>
                                    <h3 class="text-30px text-ithena-blue font-bold mb-2">What features does the platform include?</h3>
                                    <!-- <p class="text-ithena-black">Discover our comprehensive feature set and capabilities</p> -->
                                </div>
                                <i class="ri-arrow-down-s-line text-2xl transition-transform duration-300 text-ithena-blue"></i>
                            </button>
                            <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                                <div class="px-6 pb-6">
                                    <p class="">The platform includes real-time social monitoring, sentiment analysis, trend identification, competitor analysis, automated reporting, custom dashboards, API integrations, multi-language support, and advanced analytics. We also provide AI-powered insights, predictive analytics, and workflow automation to streamline your social intelligence operations.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-items bg-ithena-white rounded-lg shadow-sm">
                            <button class="accordion-header w-full px-6 py-6 text-left flex items-center justify-between hover:bg-ithena-gray transition-colors" data-accordion="implementation">
                                <div>
                                    <h3 class="text-30px text-ithena-blue font-bold mb-2">How long does implementation take?</h3>
                                    <!-- <p class="text-ithena-black">Timeline and process for getting started with our platform</p> -->
                                </div>
                                <i class="ri-arrow-down-s-line text-2xl transition-transform duration-300 text-ithena-blue"></i>
                            </button>
                            <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                                <div class="px-6 pb-6">
                                    <p class="">Implementation typically takes 2-4 weeks depending on your specific requirements and integrations needed. Our process includes initial consultation, system configuration, data source integration, team training, and go-live support. We provide dedicated implementation specialists and ongoing support to ensure smooth deployment.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-items bg-ithena-white rounded-lg shadow-sm">
                            <button class="accordion-header w-full px-6 py-6 text-left flex items-center justify-between hover:bg-ithena-gray transition-colors" data-accordion="support">
                                <div>
                                    <h3 class="text-30px text-ithena-blue font-bold mb-2">What support options are available?</h3>
                                    <!-- <p class="text-ithena-black">Comprehensive support and training resources for users</p> -->
                                </div>
                                <i class="ri-arrow-down-s-line text-2xl transition-transform duration-300 text-ithena-blue"></i>
                            </button>
                            <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                                <div class="px-6 pb-6">
                                    <p class="">We offer 24/7 technical support, comprehensive documentation, video tutorials, live training sessions, and dedicated customer success managers. Our support includes email, chat, and phone assistance, along with regular platform updates and feature enhancements based on user feedback.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Right Side - Dynamic Image -->
                    <div class="lg:sticky lg:top-8">
                        <div class="bg-ithena-white rounded-lg shadow-lg p-8">
                            <img id="accordion-image" src="https://readdy.ai/api/search-image?query=Social%20intelligence%20platform%20overview%20showing%20comprehensive%20dashboard%20with%20multiple%20social%20media%20monitoring%20tools%20analytics%20charts%20and%20real-time%20data%20streams%20in%20modern%20professional%20interface%20design&width=500&height=400&seq=faq1&orientation=landscape" alt="Platform Overview" class="w-full rounded-lg object-cover object-top">
                            <div class="mt-6">
                                <h4 id="accordion-image-title" class="text-30px font-bold mb-2">Platform Overview</h4>
                                <p id="accordion-image-description" class="text-ithena-black">Comprehensive social intelligence solution designed for modern businesses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <!-- Industries Solutions Section -->
        <section class="custom-blocks py-10 bg-ithena-white">
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 blue-version">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <!-- Left Content -->
                    <div>
                        <h2 class="text-32px font-bold text-ithena-black mb-6"><span class="text-ithena-maroon">Streamline Social Intelligence</span> Advanced Analytics</h2>
                        <p class="text-18px text-ithena-black mb-8">Built on cutting-edge AI technology, our platform is the leading social intelligence solution integrated with your business execution software!</p>
                        <button class="!rounded-button bg-ithena-blue px-8 py-3 text-18px text-ithena-white">CTA Button</button>
                    </div>
                    <!-- Right Grid -->
                    <div class="grid grid-cols-2 gap-8">
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Digital%20analytics%20dashboard%20icon%20with%20trending%20charts%20and%20growth%20metrics%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution1&orientation=squarish" alt="Reduced Response Times" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-18px font-bold text-ithena-black mb-3">Reduced Response Times</h3>
                            <p class="text-ithena-black text-sm">By streamlining social monitoring and scheduling, our platform helps to reduce response times, enabling organizations to respond more quickly to customer demands and market changes.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Precision%20scheduling%20calendar%20icon%20with%20automated%20workflow%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution2&orientation=squarish" alt="Accurate Scheduling" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-18px font-bold text-ithena-black mb-3">Accurate Scheduling</h3>
                            <p class="text-ithena-black text-sm">The software's ability to create accurate and realistic schedules contributes to improving on-time delivery performance. It's crucial for maintaining customer satisfaction and meeting contractual commitments.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Centralized%20platform%20hub%20icon%20with%20connected%20data%20nodes%20and%20integration%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution3&orientation=squarish" alt="Single Centralized Platform" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-18px font-bold text-ithena-black mb-3">Single Centralized Platform</h3>
                            <p class="text-ithena-black text-sm">Our platform can integrate with other enterprise systems, such as ERP systems, to ensure seamless data flow between different parts of the organization.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Operations%20integration%20icon%20with%20synchronized%20gears%20and%20data%20exchange%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution4&orientation=squarish" alt="Integrated with Operations" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-18px font-bold text-ithena-black mb-3">Integrated with Operations</h3>
                            <p class="text-ithena-black text-sm">MPS and MES all in one with in-sync data exchange!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 maroon-version mt-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    
                    <!-- Left Content -->
                    <div class="grid grid-cols-2 gap-8 img-text-cards">
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Digital%20analytics%20dashboard%20icon%20with%20trending%20charts%20and%20growth%20metrics%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution1&orientation=squarish" alt="Reduced Response Times" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-18px font-bold text-ithena-maroon mb-3">Reduced Response Times</h3>
                            <p class="text-ithena-black text-sm">By streamlining social monitoring and scheduling, our platform helps to reduce response times, enabling organizations to respond more quickly to customer demands and market changes.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Precision%20scheduling%20calendar%20icon%20with%20automated%20workflow%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution2&orientation=squarish" alt="Accurate Scheduling" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-18px font-bold text-ithena-maroon mb-3">Accurate Scheduling</h3>
                            <p class="text-ithena-black text-sm">The software's ability to create accurate and realistic schedules contributes to improving on-time delivery performance. It's crucial for maintaining customer satisfaction and meeting contractual commitments.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Centralized%20platform%20hub%20icon%20with%20connected%20data%20nodes%20and%20integration%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution3&orientation=squarish" alt="Single Centralized Platform" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-18px font-bold text-ithena-maroon mb-3">Single Centralized Platform</h3>
                            <p class="text-ithena-black text-sm">Our platform can integrate with other enterprise systems, such as ERP systems, to ensure seamless data flow between different parts of the organization.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Operations%20integration%20icon%20with%20synchronized%20gears%20and%20data%20exchange%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution4&orientation=squarish" alt="Integrated with Operations" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-18px font-bold text-ithena-maroon mb-3">Integrated with Operations</h3>
                            <p class="text-ithena-black text-sm">MPS and MES all in one with in-sync data exchange!</p>
                        </div>
                    </div>

                    <!-- Right Grid -->
                    <div class="text-and-cta">
                        <h2 class="text-32px font-bold text-ithena-black mb-6"><span class="text-ithena-maroon">Streamline Social Intelligence</span> Advanced Analytics</h2>
                        <p class="text-18px text-ithena-black mb-8">Built on cutting-edge AI technology, our platform is the leading social intelligence solution integrated with your business execution software!</p>
                        <button class="!rounded-button bg-ithena-maroon px-8 py-3 text-18px text-ithena-white">CTA Button</button>
                    </div>
                    

                </div>
            </div>

        </section>

        <section id="demo-video-section-id" class="py-10 demo_video_section bg-ithena-gray">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-8">
                    <h2 class="section_title_fontsize  pt-10 font-bold text-ithena-black mb-4"> AI That Delivers <span class="text-ithena-maroon"> Value at Every Step</span></h2>
                </div>                
                <div class="grid md:grid-cols-2 gap-16 items-center">
                    <!-- Left : Video -->
                    <div class="relative">
                        <div class="video-frame overflow-hidden"> <!-- bg-ithena-white rounded-2xl p-4 -->
                            <div class="aspect-w-16 aspect-h-9"> 
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/qUxoaYBeHLM?si=lMxcIvVQEvuuD8JM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Right : Content -->
                    <div class="space-y-6 demo_video_content">
                        <div class="text-28px font-semibold text-ithena-black">Get All the Tools You Need In a Single Platform</div>
                        <div class=" text-ithena-black leading-relaxed"> 
                            <p>AI built for how you work, connecting to multiple sources without added complexity. It plugs seamlessly into existing applications, deploys instantly across any dataset, and transforms information into clear, actionable insights—generated in seconds to support faster, smarter decisions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <style>
            .block-transition {transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);}
            .block-overlay {background: #000000ad;}
            .block-active .block-overlay {background: #ffffff00;}

            .rhs-img { animation: rhsZoomIn 1s ease-out both;}
            @keyframes rhsZoomIn {
                from { opacity: 0; transform: scale(0.92);}
                to { opacity: 1; transform: scale(1);}
            }
        </style>

        <section id="semislider-section-id" class="py-10 bg-ithena-gray">
            
            <div class="flex h-96 max-w-7xl mt-5 mx-auto px-6" id="blockContainer">
                <div class="block-item block-transition block-hover cursor-pointer relative overflow-hidden"
                    data-block="1"
                    style="background-position:center center;background-image: url('https://dev-website.ithena.app/wp-content/uploads/2025/10/isat-banner.jpg');">
                    <div class="block-overlay absolute inset-0"></div>
                    <div class="relative z-10 h-full flex flex-col justify-center items-center text-center p-8">
                        <h2 class="text-30px font-bold text-ithena-white mb-3">Digital Solutions</h2>
                        <p class="text-20px text-ithena-white opacity-90">Transform your business with cutting-edge technology</p>
                    </div>
                    <div class="absolute bottom-4 cursor-pointer right-4 scroll-down-arrow text-2xl text-ithena-white z-20"><i class="ri-arrow-down-s-line"></i></div>
                </div>
                <div class="block-item block-transition block-hover cursor-pointer relative overflow-hidden"
                    data-block="2"
                    style="background-position:center center;background-image: url('https://dev-website.ithena.app/wp-content/uploads/2025/10/isat-banner.jpg');">
                    <div class="block-overlay absolute inset-0"></div>
                    <div class="relative z-10 h-full flex flex-col justify-center items-center text-center p-8">
                        <h2 class="text-30px font-bold text-ithena-white mb-3">Creative Design</h2>
                        <p class="text-20px text-ithena-white opacity-90">Bring your vision to life with innovative design</p>
                    </div>
                    <div class="absolute bottom-4 cursor-pointer right-4 scroll-down-arrow text-2xl text-ithena-white z-20"><i class="ri-arrow-down-s-line"></i></div>
                </div>
                <div class="block-item block-transition block-hover cursor-pointer relative overflow-hidden"
                    data-block="3"
                    style="background-position:center center;background-image: url('https://dev-website.ithena.app/wp-content/uploads/2025/10/isat-banner.jpg');">
                    <div class="block-overlay absolute inset-0"></div>
                    <div class="relative z-10 h-full flex flex-col justify-center items-center text-center p-8">
                        <h2 class="text-30px font-bold text-ithena-white mb-3">Business Strategy</h2>
                        <p class="text-20px text-ithena-white opacity-90">Drive growth with strategic planning and execution</p>
                    </div>
                    <div class="absolute bottom-4 cursor-pointer right-4 scroll-down-arrow text-2xl text-ithena-white z-20"><i class="ri-arrow-down-s-line"></i></div>
                </div>
            </div>

            <div class="w-full h-auto mt-10 relative">
                <div class="content-fade" id="contentArea">

                    <div class="content-block active" id="content1">
                        <div class="max-w-7xl mx-auto mt-5">
                            <div class="text-center mb-5">
                                <h3 class="text-32px font-bold text-ithena-black mb-6 content-block-titlee">
                                    Digital Solutions for Modern Business <i class="scroll-up-arrow ri-arrow-up-s-line"></i>
                                </h3>
                                <p class="text-20px text-ithena-black leading-relaxed max-w-3xl mx-auto">
                                    Leverage the power of digital transformation to streamline operations, enhance customer experiences, and drive sustainable growth. Our comprehensive digital solutions encompass cloud computing, artificial intelligence, and data analytics.
                                </p>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                                <div class="flip-container" style="perspective: 1000px;">
                                    <div class="flip-panel" id="flipPanel1" style="transform-style: preserve-3d; transition: transform 0.8s; cursor: pointer; height: 500px;">
                                        <div class="flip-front" style="position: absolute; width: 100%; height: 100%; backface-visibility: hidden;">
                                            <div class="grid grid-cols-2 gap-4 h-full">
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">Cloud Infrastructure</h4>
                                                    <p class="text-ithena-black">Scalable and secure cloud solutions that grow with your business needs.</p>
                                                </div>
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">AI Integration</h4>
                                                    <p class="text-ithena-black">Smart automation and machine learning capabilities for enhanced efficiency.</p>
                                                </div>
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">Data Analytics</h4>
                                                    <p class="text-ithena-black">Transform raw data into actionable insights for informed decision-making.</p>
                                                </div>
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">Cybersecurity</h4>
                                                    <p class="text-ithena-black">Comprehensive security measures to protect your digital assets.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flip-back" style="position: absolute; width: 100%; height: 100%; backface-visibility: hidden; transform: rotateY(180deg);">
                                            <div class="grid grid-cols-2 gap-4 h-full">
                                                <div class="bg-primary p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">DevOps</h4>
                                                    <p class="opacity-90">Streamlined development and deployment processes for faster delivery.</p>
                                                </div>
                                                <div class="bg-secondary p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">API Management</h4>
                                                    <p class="opacity-90">Robust API solutions for seamless system integration and connectivity.</p>
                                                </div>
                                                <div class="bg-green-600 p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">Mobile Apps</h4>
                                                    <p class="opacity-90">Native and cross-platform mobile applications for enhanced user engagement.</p>
                                                </div>
                                                <div class="bg-orange-600 p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">IoT Solutions</h4>
                                                    <p class="opacity-90">Connected device ecosystems for intelligent automation and monitoring.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative rhs-img">
                                    <img src="https://dev-website.ithena.app/wp-content/uploads/2025/10/isat-banner.jpg"
                                        alt="Digital Solutions" class="w-full h-96 object-cover object-top rounded-xl shadow-lg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-block hidden" id="content2">
                        <div class="max-w-7xl mx-auto mt-5">
                            <div class="text-center mb-5">
                                <h3 class="text-32px font-bold text-ithena-black mb-6">Creative Design Excellence<i class="scroll-up-arrow ri-arrow-up-s-line"></i></h3>
                                <p class="text-20px text-ithena-black leading-relaxed max-w-3xl mx-auto">
                                    Craft compelling visual experiences that resonate with your audience. Our creative design services span brand identity, user experience design, and digital marketing materials that drive engagement and conversion.
                                </p>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                                <div class="flip-container" style="perspective: 1000px;">
                                    <div class="flip-panel" id="flipPanel2" style="transform-style: preserve-3d; transition: transform 0.8s; cursor: pointer; height: 500px;">
                                        <div class="flip-front" style="position: absolute; width: 100%; height: 100%; backface-visibility: hidden;">
                                            <div class="grid grid-cols-2 gap-4 h-full">
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">Brand Identity</h4>
                                                    <p class="text-ithena-black">Distinctive visual identity that captures your brand essence and values.</p>
                                                </div>
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">UX/UI Design</h4>
                                                    <p class="text-ithena-black">Intuitive user experiences that delight and convert visitors into customers.</p>
                                                </div>
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">Print Design</h4>
                                                    <p class="text-ithena-black">Professional print materials that maintain brand consistency across all touchpoints.</p>
                                                </div>
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">Digital Assets</h4>
                                                    <p class="text-ithena-black">Engaging digital content optimized for web and social media platforms.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flip-back" style="position: absolute; width: 100%; height: 100%; backface-visibility: hidden; transform: rotateY(180deg);">
                                            <div class="grid grid-cols-2 gap-4 h-full">
                                                <div class="bg-pink-600 p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">Motion Graphics</h4>
                                                    <p class="opacity-90">Dynamic animations and video content that capture attention and tell stories.</p>
                                                </div>
                                                <div class="bg-indigo-600 p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">Web Design</h4>
                                                    <p class="opacity-90">Responsive websites that provide exceptional user experiences across devices.</p>
                                                </div>
                                                <div class="bg-teal-600 p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">Illustration</h4>
                                                    <p class="opacity-90">Custom illustrations that communicate complex ideas with visual clarity.</p>
                                                </div>
                                                <div class="bg-red-600 p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">Photography</h4>
                                                    <p class="opacity-90">Professional photography services for product, corporate, and marketing needs.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative rhs-img">
                                    <img src="https://dev-website.ithena.app/wp-content/uploads/2025/10/isat-banner.jpg"
                                        alt="Creative Design" class="w-full h-96 object-cover object-top rounded-xl shadow-lg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-block hidden" id="content3">
                        <div class="max-w-7xl mx-auto mt-5">
                            <div class="text-center mb-5">
                                <h3 class="text-32px font-bold text-ithena-black mb-6">Strategic Business Growth<i class="scroll-up-arrow ri-arrow-up-s-line"></i></h3>
                                <p class="text-20px text-ithena-black leading-relaxed max-w-3xl mx-auto">
                                    Navigate complex business challenges with strategic planning and execution excellence. Our business strategy services help organizations identify opportunities, optimize operations, and achieve sustainable competitive advantages.
                                </p>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                                <div class="flip-container" style="perspective: 1000px;">
                                    <div class="flip-panel" id="flipPanel3" style="transform-style: preserve-3d; transition: transform 0.8s; cursor: pointer; height: 500px;">
                                        <div class="flip-front" style="position: absolute; width: 100%; height: 100%; backface-visibility: hidden;">
                                            <div class="grid grid-cols-2 gap-4 h-full">
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">Market Analysis</h4>
                                                    <p class="text-ithena-black">Comprehensive market research and competitive intelligence for informed strategies.</p>
                                                </div>
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">Process Optimization</h4>
                                                    <p class="text-ithena-black">Streamline operations and eliminate inefficiencies for maximum productivity.</p>
                                                </div>
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">Growth Planning</h4>
                                                    <p class="text-ithena-black">Strategic roadmaps that align resources with long-term business objectives.</p>
                                                </div>
                                                <div class="bg-ithena-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                    <h4 class="text-20px font-semibold text-ithena-black mb-3">Change Management</h4>
                                                    <p class="text-ithena-black">Smooth organizational transitions with minimal disruption to operations.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flip-back" style="position: absolute; width: 100%; height: 100%; backface-visibility: hidden; transform: rotateY(180deg);">
                                            <div class="grid grid-cols-2 gap-4 h-full">
                                                <div class="bg-blue-600 p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">Financial Planning</h4>
                                                    <p class="opacity-90">Strategic financial management and investment planning for sustainable growth.</p>
                                                </div>
                                                <div class="bg-purple-600 p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">Risk Management</h4>
                                                    <p class="opacity-90">Comprehensive risk assessment and mitigation strategies for business continuity.</p>
                                                </div>
                                                <div class="bg-yellow-600 p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">Leadership Development</h4>
                                                    <p class="opacity-90">Executive coaching and leadership training programs for organizational excellence.</p>
                                                </div>
                                                <div class="bg-gray-700 p-6 rounded-lg shadow-sm flex flex-col justify-center text-ithena-white">
                                                    <h4 class="text-20px font-semibold mb-3">Digital Transformation</h4>
                                                    <p class="opacity-90">Strategic technology adoption roadmaps for competitive advantage.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative rhs-img">
                                    <img src="https://dev-website.ithena.app/wp-content/uploads/2025/10/isat-banner.jpg" alt="Business Strategy"
                                        class="w-full h-96 object-cover object-top rounded-xl shadow-lg">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <script id="block-interaction">    
            document.addEventListener('DOMContentLoaded', function () {
                const blocks = document.querySelectorAll('.block-item');
                const contentBlocks = document.querySelectorAll('.content-block');
                let activeBlock = 1;

                function setInitialState() {
                    blocks.forEach(block => {
                        block.style.width = '33.333333%';
                        block.classList.remove('block-active');
                    });
                    blocks[0].classList.add('block-active');
                    contentBlocks.forEach(content => content.classList.add('hidden'));
                    document.getElementById('content1').classList.remove('hidden');
                }

                function updateBlocks(clickedBlockNumber) {
                    if (activeBlock === clickedBlockNumber) return;
                    activeBlock = clickedBlockNumber;
                    blocks.forEach((block, index) => {
                        const blockNumber = index + 1;
                        block.classList.remove('block-active');
                        if (blockNumber === clickedBlockNumber) {
                            block.style.width = '66.666667%';
                            block.classList.add('block-active');
                        } else {
                            block.style.width = '16.666667%';
                        }
                    });
                    contentBlocks.forEach(content => content.classList.add('hidden'));
                    document.getElementById(`content${clickedBlockNumber}`).classList.remove('hidden');
                }
                blocks.forEach((block, index) => {
                    block.addEventListener('click', () => {
                        updateBlocks(index + 1);
                    });
                });
                setInitialState();

                // Smooth scroll function
                function smoothScrollTo(element) {
                    const yOffset = -120; // adjust if you have sticky header
                    const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;
                    window.scrollTo({
                        top: y,
                        behavior: 'smooth'
                    });
                }

                // Down arrow scroll
                document.querySelectorAll('.scroll-down-arrow').forEach(arrow => {
                    arrow.addEventListener('click', function (e) {
                        e.stopPropagation(); // prevent triggering block click
                        const contentArea = document.getElementById('contentArea');
                        smoothScrollTo(contentArea);
                    });
                });

                // Up arrow scroll
                document.querySelectorAll('.scroll-up-arrow').forEach(arrow => {
                    arrow.addEventListener('click', function () {
                        const blockContainer = document.getElementById('blockContainer');
                        smoothScrollTo(blockContainer);
                    });
                });

            }); 

            // flip-interaction
            document.addEventListener('DOMContentLoaded', function () {
                const flipPanels = document.querySelectorAll('.flip-panel');
                flipPanels.forEach(panel => {
                    let isFlipped = false;
                    panel.addEventListener('click', function () {
                        if (!isFlipped) {
                            panel.style.transform = 'rotateY(180deg)';
                            isFlipped = true;
                        } else {
                            panel.style.transform = 'rotateY(0deg)';
                            isFlipped = false;
                        }
                    });
                });
            }); 

            document.addEventListener('DOMContentLoaded', function () {
                const rhsImg = document.querySelector('.rhs-img');
                if (!rhsImg) return;

                // reset if needed
                rhsImg.classList.remove('rhs-zoom-animate');
                void rhsImg.offsetWidth;

                // trigger animation
                rhsImg.classList.add('rhs-zoom-animate');
            });

        </script>

        <!-- vertical semi slider -->
        <style>
            .ithenaSemi-wrapper {
                display: flex;
                max-width: 1400px;
                margin: 0 auto;
                gap: 40px;
                padding: 40px 24px;
            }

            .ithenaSemi-nav {
                width: 30%;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .ithenaSemi-contentArea {
                width: 70%;
            }

            .ithenaSemi-navItem {
                position: relative;
                min-height: 180px;
                background-size: cover;
                background-position: center;
                cursor: pointer;
                overflow: hidden;
                transition: all 0.4s ease;
            }

            .ithenaSemi-overlay {
                position: absolute;
                inset: 0;
                background: #000000ad;
                transition: 0.4s ease;
            }

            .ithenaSemi-navItem--active .ithenaSemi-overlay {
                background: #00000040;
            }

            .ithenaSemi-navItem:hover {
                transform: translateX(6px);
            }

            @media (max-width: 1024px) {
                .ithenaSemi-wrapper {
                    flex-direction: column;
                }
                .ithenaSemi-nav,
                .ithenaSemi-contentArea {
                    width: 100%;
                }
            }
        </style>

        <section id="ithenaSemi-section" class="py-10 bg-ithena-gray">

            <div class="ithenaSemi-wrapper">

                <!-- LEFT NAVIGATION -->
                <div class="ithenaSemi-nav" id="ithenaSemi-navContainer">

                    <div class="ithenaSemi-navItem h-100 ithenaSemi-navItem--active" data-ithenaSemi="1"
                        style="background-image:url('https://dev-website.ithena.app/wp-content/uploads/2025/10/isat-banner.jpg');">
                        <div class="ithenaSemi-overlay"></div>
                        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center p-8 text-white">
                            <h2 class="text-28px font-bold mb-3">Digital Solutions</h2>
                            <p class="opacity-90">Transform your business with cutting-edge technology</p>
                        </div>
                    </div>

                    <div class="ithenaSemi-navItem h-100" data-ithenaSemi="2"
                        style="background-image:url('https://dev-website.ithena.app/wp-content/uploads/2025/10/isat-banner.jpg');">
                        <div class="ithenaSemi-overlay"></div>
                        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center p-8 text-white">
                            <h2 class="text-28px font-bold mb-3">Creative Design</h2>
                            <p class="opacity-90">Bring your vision to life with innovative design</p>
                        </div>
                    </div>

                    <div class="ithenaSemi-navItem h-100" data-ithenaSemi="3"
                        style="background-image:url('https://dev-website.ithena.app/wp-content/uploads/2025/10/isat-banner.jpg');">
                        <div class="ithenaSemi-overlay"></div>
                        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center p-8 text-white">
                            <h2 class="text-28px font-bold mb-3">Business Strategy</h2>
                            <p class="opacity-90">Drive growth with strategic planning and execution</p>
                        </div>
                    </div>

                </div>

                <!-- RIGHT CONTENT -->
                <div class="ithenaSemi-contentArea">
                    <div id="ithenaSemi-contentWrapper">

                        <!-- PANEL 1 -->
                        <div class="ithenaSemi-panel" id="ithenaSemi-panel-1">
                            <div class="mb-8 panel-title-sec">
                                <h3 class="text-32px font-bold text-ithena-black mb-4">
                                    Digital Solutions for Modern Business
                                </h3>
                                <p class="text-18px text-ithena-black leading-relaxed">
                                    Leverage digital transformation to streamline operations and drive growth.
                                </p>
                            </div>

                            <div class="ithenaSemi-flipContainer" style="perspective:1000px;">
                                <div class="ithenaSemi-flipPanel"
                                    style="transform-style:preserve-3d;transition:transform 0.8s;cursor:pointer;height:500px;position:relative;">

                                    <div style="position:absolute;width:100%;height:100%;backface-visibility:hidden;">
                                        <div class="grid grid-cols-2 gap-4 h-full">
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Cloud Infrastructure</h4>
                                                <p>Scalable solutions.</p>
                                            </div>
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">AI Integration</h4>
                                                <p>Smart automation.</p>
                                            </div>
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Data Analytics</h4>
                                                <p>Actionable insights.</p>
                                            </div>
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Cybersecurity</h4>
                                                <p>Digital protection.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="position:absolute;width:100%;height:100%;backface-visibility:hidden;transform:rotateY(180deg);">
                                        <div class="grid grid-cols-2 gap-4 h-full text-white">
                                            <div class="bg-blue-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">DevOps</h4>
                                                <p>Faster delivery.</p>
                                            </div>
                                            <div class="bg-purple-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">API Management</h4>
                                                <p>Seamless integration.</p>
                                            </div>
                                            <div class="bg-green-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Mobile Apps</h4>
                                                <p>User engagement.</p>
                                            </div>
                                            <div class="bg-orange-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">IoT</h4>
                                                <p>Connected systems.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- PANEL 2 -->
                        <div class="ithenaSemi-panel hidden" id="ithenaSemi-panel-2">
                            <div class="mb-8 panel-title-sec">
                                <h3 class="text-32px font-bold mb-4">Creative Design Excellence</h3>
                                <p class="text-18px leading-relaxed">
                                    Craft compelling visual experiences that resonate.
                                </p>
                            </div>
                            
                            <div class="ithenaSemi-flipContainer" style="perspective:1000px;">
                                <div class="ithenaSemi-flipPanel"
                                    style="transform-style:preserve-3d;transition:transform 0.8s;cursor:pointer;height:500px;position:relative;">

                                    <div style="position:absolute;width:100%;height:100%;backface-visibility:hidden;">
                                        <div class="grid grid-cols-2 gap-4 h-full">
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Cloud Infrastructure - 2</h4>
                                                <p>Scalable solutions.</p>
                                            </div>
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">AI Integration - 2</h4>
                                                <p>Smart automation.</p>
                                            </div>
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Data Analytics - 2</h4>
                                                <p>Actionable insights.</p>
                                            </div>
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Cybersecurity - 2</h4>
                                                <p>Digital protection.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="position:absolute;width:100%;height:100%;backface-visibility:hidden;transform:rotateY(180deg);">
                                        <div class="grid grid-cols-2 gap-4 h-full text-white">
                                            <div class="bg-blue-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">DevOps - 2</h4>
                                                <p>Faster delivery.</p>
                                            </div>
                                            <div class="bg-purple-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">API Management - 2</h4>
                                                <p>Seamless integration.</p>
                                            </div>
                                            <div class="bg-green-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Mobile Apps - 2</h4>
                                                <p>User engagement.</p>
                                            </div>
                                            <div class="bg-orange-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">IoT - 2</h4>
                                                <p>Connected systems.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- PANEL 3 -->
                        <div class="ithenaSemi-panel hidden" id="ithenaSemi-panel-3">
                            <div class="mb-8 panel-title-sec">
                                <h3 class="text-32px font-bold mb-4">Strategic Business Growth</h3>
                                <p class="text-18px leading-relaxed">
                                    Navigate complex challenges with strategic execution.
                                </p>
                            </div>
                            
                            <div class="ithenaSemi-flipContainer" style="perspective:1000px;">
                                <div class="ithenaSemi-flipPanel"
                                    style="transform-style:preserve-3d;transition:transform 0.8s;cursor:pointer;height:500px;position:relative;">

                                    <div style="position:absolute;width:100%;height:100%;backface-visibility:hidden;">
                                        <div class="grid grid-cols-2 gap-4 h-full">
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Cloud Infrastructure - 3</h4>
                                                <p>Scalable solutions.</p>
                                            </div>
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">AI Integration - 3</h4>
                                                <p>Smart automation.</p>
                                            </div>
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Data Analytics - 3</h4>
                                                <p>Actionable insights.</p>
                                            </div>
                                            <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Cybersecurity - 3</h4>
                                                <p>Digital protection.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="position:absolute;width:100%;height:100%;backface-visibility:hidden;transform:rotateY(180deg);">
                                        <div class="grid grid-cols-2 gap-4 h-full text-white">
                                            <div class="bg-blue-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">DevOps - 3</h4>
                                                <p>Faster delivery.</p>
                                            </div>
                                            <div class="bg-purple-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">API Management - 3</h4>
                                                <p>Seamless integration.</p>
                                            </div>
                                            <div class="bg-green-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">Mobile Apps - 3</h4>
                                                <p>User engagement.</p>
                                            </div>
                                            <div class="bg-orange-600 p-6 rounded-lg flex flex-col justify-center">
                                                <h4 class="font-semibold mb-2">IoT - 3</h4>
                                                <p>Connected systems.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function () {

                const navItems = document.querySelectorAll('.ithenaSemi-navItem');
                const panels = document.querySelectorAll('.ithenaSemi-panel');
                const flipPanels = document.querySelectorAll('.ithenaSemi-flipPanel');

                let activePanel = 1;

                function setInitialState() {
                    navItems.forEach(item => item.classList.remove('ithenaSemi-navItem--active'));
                    navItems[0].classList.add('ithenaSemi-navItem--active');

                    panels.forEach(panel => panel.classList.add('hidden'));
                    document.getElementById('ithenaSemi-panel-1').classList.remove('hidden');
                }

                function switchPanel(panelNumber) {
                    if (activePanel === panelNumber) return;
                    activePanel = panelNumber;

                    navItems.forEach((item, index) => {
                        item.classList.remove('ithenaSemi-navItem--active');
                        if (index + 1 === panelNumber) {
                            item.classList.add('ithenaSemi-navItem--active');
                        }
                    });

                    panels.forEach(panel => panel.classList.add('hidden'));
                    document.getElementById(`ithenaSemi-panel-${panelNumber}`).classList.remove('hidden');
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


        <!-- scripts  -->
        <!-- Tabs and Panel Section script -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const buttons = document.querySelectorAll('.tab-btn');
                const panels  = document.querySelectorAll('.tab-panel');
                
                function resetImages() {
                    document.querySelectorAll('.panel-img img').forEach(img => {
                        img.classList.remove('slide-in');
                                                img.style.opacity = '0';
                                        });
                }

                function showTab(slug) {
                    buttons.forEach(btn => {
                        btn.classList.remove('active');
                        btn.style.borderBottomColor = 'transparent';
                    });
                    panels.forEach(panel => {
                        panel.classList.add('hidden');
                    });
                    resetImages();
                    const btn = document.querySelector(`[data-tab="${slug}"]`);
                    const panel = document.getElementById(`${slug}-panel`);

                    if (!btn || !panel) return;

                    btn.classList.add('active');
                    btn.style.borderBottomColor = '#0082C8';
                    panel.classList.remove('hidden');
                    
                    const img = panel.querySelector('.panel-img img');
                    if (img) {
                        void img.offsetWidth;
                        img.classList.add('slide-in');
                    }
                }

                buttons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        showTab(btn.dataset.tab);
                    });
                });

                // Activate FIRST tab on load
                            showTab('seamless_erp_integration');
            });
        </script>
        
        <!-- Accordion Section script -->
        <script id="accordion-functionality">
            document.addEventListener('DOMContentLoaded', function() {
                const accordionHeaders = document.querySelectorAll('.accordion-header');
                const accordionImage = document.getElementById('accordion-image');
                const imageTitle = document.getElementById('accordion-image-title');
                const imageDescription = document.getElementById('accordion-image-description');
                const imageData = {
                    platform: {
                        src: 'https://readdy.ai/api/search-image?query=Social%20intelligence%20platform%20overview%20showing%20comprehensive%20dashboard%20with%20multiple%20social%20media%20monitoring%20tools%20analytics%20charts%20and%20real-time%20data%20streams%20in%20modern%20professional%20interface%20design&width=500&height=400&seq=faq1&orientation=landscape',
                        title: 'Platform Overview',
                        description: 'Comprehensive social intelligence solution designed for modern businesses'
                    },
                    features: {
                        src: 'https://readdy.ai/api/search-image?query=Feature%20showcase%20displaying%20advanced%20analytics%20tools%20sentiment%20analysis%20monitoring%20dashboards%20and%20AI-powered%20insights%20with%20interactive%20elements%20and%20data%20visualization%20components&width=500&height=400&seq=faq2&orientation=landscape',
                        title: 'Advanced Features',
                        description: 'Powerful tools for social media monitoring and analysis'
                    },
                    implementation: {
                        src: 'https://readdy.ai/api/search-image?query=Implementation%20process%20timeline%20showing%20step-by-step%20deployment%20phases%20training%20sessions%20and%20system%20integration%20with%20professional%20team%20collaboration%20in%20modern%20office%20environment&width=500&height=400&seq=faq3&orientation=landscape',
                        title: 'Implementation Process',
                        description: 'Streamlined deployment with dedicated support team'
                    },
                    support: {
                        src: 'https://readdy.ai/api/search-image?query=Customer%20support%20center%20with%2024%2F7%20assistance%20multiple%20communication%20channels%20help%20desk%20and%20training%20resources%20showing%20professional%20support%20team%20in%20action&width=500&height=400&seq=faq4&orientation=landscape',
                        title: 'Support Services',
                        description: 'Comprehensive support and training resources available'
                    }
                };

                function updateImage(accordionType) {
                    const data = imageData[accordionType];
                    if (data) {
                        accordionImage.src = data.src;
                        accordionImage.alt = data.title;
                        imageTitle.textContent = data.title;
                        imageDescription.textContent = data.description;
                    }
                }

                function toggleAccordion(header) {
                    const content = header.nextElementSibling;
                    const icon = header.querySelector('i');
                    const isActive = content.style.maxHeight && content.style.maxHeight !== '0px';

                    accordionHeaders.forEach(otherHeader => {
                        const otherContent = otherHeader.nextElementSibling;
                        const otherIcon = otherHeader.querySelector('i');
                        otherContent.style.maxHeight = '0px';
                        otherIcon.style.transform = 'rotate(0deg)';
                        otherIcon.classList.remove('ri-arrow-up-s-line');
                        otherIcon.classList.add('ri-arrow-down-s-line');
                    });

                    if (!isActive) {
                        content.style.maxHeight = content.scrollHeight + 'px';
                        icon.style.transform = 'rotate(180deg)';
                        icon.classList.remove('ri-arrow-down-s-line');
                        icon.classList.add('ri-arrow-up-s-line');
                        const accordionType = header.dataset.accordion;
                        updateImage(accordionType);
                    }
                }

                accordionHeaders.forEach(header => {
                    header.addEventListener('click', function() {
                        toggleAccordion(this);
                    });
                });

                updateImage('platform');
            });
        </script>

        <script id="hero-slider">
            document.addEventListener('DOMContentLoaded', function() {
                const slides = document.querySelectorAll('.slide');
                const dots = document.querySelectorAll('.dot');
                const sliderContainer = document.querySelector('.slider-container');
                let currentSlide = 0;
                let slideInterval;
                let touchStartX = 0;
                let touchEndX = 0;

                function showSlide(index) {
                    slides.forEach((slide, i) => {
                        if (i === index) {
                            slide.style.transform = 'translateX(0)';
                        } else if (i < index) {
                            slide.style.transform = 'translateX(-100%)';
                        } else {
                            slide.style.transform = 'translateX(100%)';
                        }
                    });
                    dots.forEach((dot, i) => {
                        dot.style.opacity = i === index ? '1' : '0.5';
                    });
                    currentSlide = index;
                }

                function nextSlide() {
                    currentSlide = (currentSlide + 1) % slides.length;
                    showSlide(currentSlide);
                }

                function prevSlide() {
                    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                    showSlide(currentSlide);
                }

                function startSlideshow() {
                    slideInterval = setInterval(nextSlide, 5000);
                }

                function stopSlideshow() {
                    clearInterval(slideInterval);
                }

                function handleSwipe() {
                    const swipeThreshold = 50;
                    const diff = touchStartX - touchEndX;
                    if (Math.abs(diff) > swipeThreshold) {
                        if (diff > 0) {
                            nextSlide();
                        } else {
                            prevSlide();
                        }
                        stopSlideshow();
                        startSlideshow();
                    }
                }

                sliderContainer.addEventListener('touchstart', function(e) {
                    touchStartX = e.changedTouches[0].screenX;
                });

                sliderContainer.addEventListener('touchend', function(e) {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                });

                sliderContainer.addEventListener('mousedown', function(e) {
                    touchStartX = e.screenX;
                });

                sliderContainer.addEventListener('mouseup', function(e) {
                    touchEndX = e.screenX;
                    handleSwipe();
                });

                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        showSlide(index);
                        stopSlideshow();
                        startSlideshow();
                    });
                });

                startSlideshow();
            });
        </script>

        <script id="counter-animation">
            document.addEventListener('DOMContentLoaded', function() {
                const counters = document.querySelectorAll('.counter');
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
                            counter.textContent = Math.floor(current) + '+';
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

        <script id="customers-slider">
            document.addEventListener('DOMContentLoaded', function() {
                const container = document.querySelector('.customers-slides');
                const slides = document.querySelectorAll('.customer-slide');
                const prevBtn = document.querySelector('.customers-prev');
                const nextBtn = document.querySelector('.customers-next');
                let currentIndex = 0;
                const totalSlides = slides.length;
                let slidesToShow = 4;
                let maxIndex = Math.max(0, totalSlides - slidesToShow);
                let autoScrollInterval;

                function getSlidesToShow() {
                    if (window.innerWidth < 768) {
                        return 1;
                    } else if (window.innerWidth < 1024) {
                        return 2;
                    } else {
                        return 4;
                    }
                }

                function updateSliderLayout() {
                    slidesToShow = getSlidesToShow();
                    maxIndex = Math.max(0, totalSlides - slidesToShow);

                    // Update slide widths
                    slides.forEach(slide => {
                        if (slidesToShow === 1) {
                            slide.className = slide.className.replace(/w-1\/\d+/, 'w-full');
                        } else if (slidesToShow === 2) {
                            slide.className = slide.className.replace(/w-1\/\d+|w-full/, 'w-1/2');
                        } else {
                            slide.className = slide.className.replace(/w-1\/\d+|w-full/, 'w-1/4');
                        }
                    });

                    // Reset to valid index
                    if (currentIndex > maxIndex) {
                        currentIndex = maxIndex;
                    }
                    showCustomers(currentIndex);
                }

                function showCustomers(index) {
                    if (index < 0) index = 0;
                    if (index > maxIndex) index = maxIndex;
                    const translateX = -index * (100 / slidesToShow);
                    container.style.transform = `translateX(${translateX}%)`;
                    currentIndex = index;
                }

                function nextCustomers() {
                    if (currentIndex >= maxIndex) {
                        currentIndex = 0;
                    } else {
                        currentIndex++;
                    }
                    showCustomers(currentIndex);
                }

                function prevCustomers() {
                    if (currentIndex <= 0) {
                        currentIndex = maxIndex;
                    } else {
                        currentIndex--;
                    }
                    showCustomers(currentIndex);
                }

                function startAutoScroll() {
                    autoScrollInterval = setInterval(nextCustomers, 4000);
                }

                function stopAutoScroll() {
                    clearInterval(autoScrollInterval);
                }

                function resetAutoScroll() {
                    stopAutoScroll();
                    startAutoScroll();
                }

                nextBtn.addEventListener('click', function() {
                    nextCustomers();
                    resetAutoScroll();
                });

                prevBtn.addEventListener('click', function() {
                    prevCustomers();
                    resetAutoScroll();
                });

                const sliderElement = document.querySelector('.customers-slider');
                sliderElement.addEventListener('mouseenter', stopAutoScroll);
                sliderElement.addEventListener('mouseleave', startAutoScroll);

                window.addEventListener('resize', function() {
                    updateSliderLayout();
                    resetAutoScroll();
                });

                updateSliderLayout();
                startAutoScroll();
            });
        </script>

        <script id="customers-slider-2">
            document.addEventListener('DOMContentLoaded', function() {
                const container = document.querySelector('.customers-slides-2');
                const slides = document.querySelectorAll('.customer-slide-2');
                const prevBtn = document.querySelector('.customers-prev-2');
                const nextBtn = document.querySelector('.customers-next-2');
                let currentIndex = 0;
                const totalSlides = slides.length;
                let slidesToShow = 4;
                let maxIndex = Math.max(0, totalSlides - slidesToShow);
                let autoScrollInterval;

                function getSlidesToShow() {
                    if (window.innerWidth < 768) {
                        return 1;
                    } else if (window.innerWidth < 1024) {
                        return 2;
                    } else {
                        return 4;
                    }
                }

                function updateSliderLayout() {
                    slidesToShow = getSlidesToShow();
                    maxIndex = Math.max(0, totalSlides - slidesToShow);

                    // Update slide widths
                    slides.forEach(slide => {
                        if (slidesToShow === 1) {
                            slide.className = slide.className.replace(/w-1\/\d+/, 'w-full');
                        } else if (slidesToShow === 2) {
                            slide.className = slide.className.replace(/w-1\/\d+|w-full/, 'w-1/2');
                        } else {
                            slide.className = slide.className.replace(/w-1\/\d+|w-full/, 'w-1/4');
                        }
                    });

                    // Reset to valid index
                    if (currentIndex > maxIndex) {
                        currentIndex = maxIndex;
                    }
                    showCustomers(currentIndex);
                }

                function showCustomers(index) {
                    if (index < 0) index = 0;
                    if (index > maxIndex) index = maxIndex;
                    const translateX = -index * (100 / slidesToShow);
                    container.style.transform = `translateX(${translateX}%)`;
                    currentIndex = index;
                }

                function nextCustomers() {
                    if (currentIndex >= maxIndex) {
                        currentIndex = 0;
                    } else {
                        currentIndex++;
                    }
                    showCustomers(currentIndex);
                }

                function prevCustomers() {
                    if (currentIndex <= 0) {
                        currentIndex = maxIndex;
                    } else {
                        currentIndex--;
                    }
                    showCustomers(currentIndex);
                }

                function startAutoScroll() {
                    autoScrollInterval = setInterval(nextCustomers, 4000);
                }

                function stopAutoScroll() {
                    clearInterval(autoScrollInterval);
                }

                function resetAutoScroll() {
                    stopAutoScroll();
                    startAutoScroll();
                }

                nextBtn.addEventListener('click', function() {
                    nextCustomers();
                    resetAutoScroll();
                });

                prevBtn.addEventListener('click', function() {
                    prevCustomers();
                    resetAutoScroll();
                });

                const sliderElement = document.querySelector('.customers-slider-2');
                sliderElement.addEventListener('mouseenter', stopAutoScroll);
                sliderElement.addEventListener('mouseleave', startAutoScroll);

                window.addEventListener('resize', function() {
                    updateSliderLayout();
                    resetAutoScroll();
                });

                updateSliderLayout();
                startAutoScroll();
            });
        </script>

        <!-- Custom Navbar -->
        <?php echo child_theme_custom_footer(); ?>

    </div>