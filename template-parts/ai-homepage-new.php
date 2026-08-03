<?php
    /*
    Template Name: Homepage v2
    */
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ITHENA</title>
        <script src="https://cdn.tailwindcss.com/3.4.16"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">

        <script>
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

            body{ color: var(--color-black) !important; }

            :where([class^="ri-"])::before { content: "\f3c2"; }

            /* overlay should be semi-transparent black */
            .custom-slider-overlay {
                background-color: rgba(0, 0, 0, 0.45);
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

            .bg-gray-fade{
                background: linear-gradient(to top, #e7e6e6 50%, #e7e6e6 85%, #ffffff 100%);
            }
            .bg-white-fade{
                background: linear-gradient(to top, #ffffff 50%, #ffffff 85%, #e7e6e6 100%);
            }
            

        </style>

        <?php
            // Before </head>
            if ( is_user_logged_in() ) {
                wp_enqueue_style( 'admin-bar' );
                wp_enqueue_script( 'admin-bar' );
                do_action( 'wp_head' );
            }
        ?>

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
                                <p class="text-xl text-ithena-white mb-8">Combining the power of Human &  Artificial <br>Intelligence to provide improved outcomes<br> for our customers!</p>
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
                                <p class="text-xl text-ithena-white mb-8">Transforming Enterprises with Digital technology <br>capabilities across modern, engaging,<br> and data-driven engagement!</p>
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
                                <p class="text-xl text-ithena-white mb-8">From Engineering to Manufacturing to<br> Service, helping customers realize the value<br> of digital investments.</p>
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

        <!-- Choose Use Cases Section -->
        <section class="py-10 bg-ithena-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold text-ithena-black mb-4">Choose Your <span class="text-ithena-maroon">Use Case</span></h2>
                    <p class="text-xl text-ithena-black max-w-3xl mx-auto">Discover how our platform transforms social data into actionable business intelligence across various departments and functions</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-ithena-gray rounded-lg border-2 border-ithena-blue hover:shadow-xl transition-shadow p-6 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="mb-6">
                            <img src="https://dev.ithena.io/wp-content/uploads/2023/07/Frame-329.webp" alt="Build the factory" class="customer-img w-full h-48 rounded-lg">
                        </div>
                        <h3 class="text-xl font-bold text-ithena-black mb-3">Build the factory of the future?</h3>
                        <p class="text-ithena-black">Digitize processes, integrate shop floor assets, and transform user's service experience.  <a href="#" class="inline-block ml-2 text-ithena-blue hover:text-ithena-blue transition-colors">»</a></p>
                    </div>
                    <div class="bg-ithena-gray rounded-lg border-2 border-ithena-blue hover:shadow-xl transition-shadow p-6 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="mb-6">
                            <img src="https://dev.ithena.io/wp-content/uploads/2023/07/Frame-385.webp" alt="Make communities go greener" class="customer-img w-full h-48 rounded-lg">
                        </div>
                        <h3 class="text-xl font-bold text-ithena-black mb-3">Make communities go greener and smarter?</h3>
                        <p class="text-ithena-black">Transform communities with sustainable and energy-efficient solutions. <a href="#" class="inline-block ml-2 text-ithena-blue hover:text-ithena-blue transition-colors">»</a></p>
                    </div>
                    <div class="bg-ithena-gray rounded-lg border-2 border-ithena-blue hover:shadow-xl transition-shadow p-6 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="mb-6">
                            <img src="https://dev.ithena.io/wp-content/uploads/2023/07/Frame-379.webp" alt="Modernize legacy" class="customer-img w-full h-48 rounded-lg">
                        </div>
                        <h3 class="text-xl font-bold text-ithena-black mb-3">Modernize legacy business applications?</h3>
                        <p class="text-ithena-black">Modernize business applications and build experiences for customers.<a href="#" class="inline-block ml-2 text-ithena-blue hover:text-ithena-blue transition-colors">»</a></p>
                    </div>
                    <div class="bg-ithena-gray rounded-lg border-2 border-ithena-blue hover:shadow-xl transition-shadow p-6 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="mb-6">
                            <img src="https://dev.ithena.io/wp-content/uploads/2023/07/Frame-332.webp" alt="Harness the power" class="customer-img w-full h-48 rounded-lg">
                        </div>
                        <h3 class="text-xl font-bold text-ithena-black mb-3">Harness the power of organization's data?</h3>
                        <p class="text-ithena-black">Generate actionable business insights and optimize business output. <a href="#" class="inline-block ml-2 text-ithena-blue hover:text-ithena-blue transition-colors">»</a></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Industries We Serve Section -->
        <section class="py-20 bg-ithena-gray bg-gray-fade">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold text-ithena-black mb-4">Industries We Serve</h2>
                    <p class="text-xl text-ithena-black max-w-3xl mx-auto">Delivering specialized social intelligence solutions across diverse sectors to drive innovation and growth</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-ithena-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-tools-fill text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-ithena-black mb-3">INDUSTRIAL MANUFACTURING</h3>
                        <p class="text-ithena-black">Transforming manufacturing through digital technologies</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-ithena-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-car-line text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-ithena-black mb-3">AUTOMOTIVE & MOBILITY</h3>
                        <p class="text-ithena-black">Advancing the mobility ecosystem</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-ithena-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-health-book-line text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-ithena-black mb-3">HEALTHCARE & LIFE SCIENCES</h3>
                        <p class="text-ithena-black">Driving transformation to impact lives</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-ithena-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-flashlight-line text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-ithena-black mb-3">ENERGY, UTILITY & GOVERNMENT</h3>
                        <p class="text-ithena-black">Operational excellence for a cleaner future</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-ithena-blue rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-film-line text-ithena-white text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-ithena-black mb-3">MEDIA & ENTERTAINMENT</h3>
                        <p class="text-ithena-black">Optimising operations for audience acquisition</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Our Customers | Projects | People Section -->
        <section class="py-20 bg-ithena-white bg-white-fade">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Our <span class="text-ithena-maroon">Product Portfolio</span></h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Innovative solutions that drive digital transformation across industries</p>
                </div>
                <div class="product-showcase overflow-hidden">
                    <div class="product-track flex">
                        
                        <div class="product-item flex-none mx-4">
                            <img src="https://ithena.ai/wp-content/uploads/2023/07/Copy-of-Rectangle-131.png" alt="Analytics Dashboard" class="product-img object-cover object-top">
                        </div>
                        <div class="product-item flex-none mx-4">
                            <img src="https://ithena.ai/wp-content/uploads/2023/07/oracle-2.png" alt="AI Automation" class="product-img object-cover object-top">
                        </div>
                        <div class="product-item flex-none mx-4">
                            <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-950.png" alt="Integration Hub" class="product-img object-cover object-top">
                        </div>

                        <div class="product-item flex-none mx-4">
                            <img src="https://ithena.ai/wp-content/uploads/2023/07/Copy-of-Rectangle-131.png" alt="Analytics Dashboard" class="product-img object-cover object-top">
                        </div>
                        <div class="product-item flex-none mx-4">
                            <img src="https://ithena.ai/wp-content/uploads/2023/07/oracle-2.png" alt="AI Automation" class="product-img object-cover object-top">
                        </div>
                        <div class="product-item flex-none mx-4">
                            <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-950.png" alt="Integration Hub" class="product-img object-cover object-top">
                        </div>

                        <div class="product-item flex-none mx-4">
                            <img src="https://ithena.ai/wp-content/uploads/2023/07/Copy-of-Rectangle-131.png" alt="Analytics Dashboard" class="product-img object-cover object-top">
                        </div>
                        <div class="product-item flex-none mx-4">
                            <img src="https://ithena.ai/wp-content/uploads/2023/07/oracle-2.png" alt="AI Automation" class="product-img object-cover object-top">
                        </div>
                        <div class="product-item flex-none mx-4">
                            <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-950.png" alt="Integration Hub" class="product-img object-cover object-top">
                        </div>
                        

                    </div>
                </div>
            </div>
        </section>

        <!-- Counters and icons -->
        <section class="py-20 bg-ithena-gray bg-gray-fade">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold text-ithena-black mb-4">Trusted by <span class="text-ithena-maroon">Industry Leaders</span></h2>
                    <p class="text-xl text-ithena-black max-w-3xl mx-auto">Join thousands of companies worldwide who rely on our platform for social intelligence</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <i class="ri-group-line text-ithena-blue text-5xl"></i>
                        </div>
                        <div class="counter text-4xl font-bold text-ithena-black mb-2" data-target="250">0</div>
                        <h3 class="text-lg font-semibold text-ithena-black">Active Customers</h3>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <i class="ri-folder-line text-ithena-blue text-5xl"></i>
                        </div>
                        <div class="counter text-4xl font-bold text-ithena-black mb-2" data-target="1200">0</div>
                        <h3 class="text-lg font-semibold text-ithena-black">Projects Completed</h3>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <i class="ri-global-line text-ithena-blue text-5xl"></i>
                        </div>
                        <div class="counter text-4xl font-bold text-ithena-black mb-2" data-target="45">0</div>
                        <h3 class="text-lg font-semibold text-ithena-black">Countries Served</h3>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <i class="ri-team-line text-ithena-blue text-5xl"></i>
                        </div>
                        <div class="counter text-4xl font-bold text-ithena-black mb-2" data-target="500">0</div>
                        <h3 class="text-lg font-semibold text-ithena-black">Employees</h3>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Accordion Section -->
        <section class="py-20 bg-ithena-white bg-white-fade">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold mb-4">Frequently Asked Questions</h2>
                    <p class="text-xl max-w-3xl mx-auto">Get answers to the most common questions about our social intelligence platform</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                    <!-- Left Side - Accordions -->
                    <div class="space-y-4">
                        
                        <div class="accordion-items bg-ithena-gray rounded-lg shadow-sm">
                            <button class="accordion-header w-full px-6 py-6 text-left flex items-center justify-between hover:bg-ithena-gray transition-colors" data-accordion="platform">
                                <div>
                                    <h3 class="text-xl text-ithena-blue font-bold mb-2">What is Social Intelligence Platform?</h3>
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

                        <div class="accordion-items bg-ithena-gray rounded-lg shadow-sm">
                            <button class="accordion-header w-full px-6 py-6 text-left flex items-center justify-between hover:bg-ithena-gray transition-colors" data-accordion="features">
                                <div>
                                    <h3 class="text-xl text-ithena-blue font-bold mb-2">What features does the platform include?</h3>
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
                        
                        <div class="accordion-items bg-ithena-gray rounded-lg shadow-sm">
                            <button class="accordion-header w-full px-6 py-6 text-left flex items-center justify-between hover:bg-ithena-gray transition-colors" data-accordion="implementation">
                                <div>
                                    <h3 class="text-xl text-ithena-blue font-bold mb-2">How long does implementation take?</h3>
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
                        
                        <div class="accordion-items bg-ithena-gray rounded-lg shadow-sm">
                            <button class="accordion-header w-full px-6 py-6 text-left flex items-center justify-between hover:bg-ithena-gray transition-colors" data-accordion="support">
                                <div>
                                    <h3 class="text-xl text-ithena-blue font-bold mb-2">What support options are available?</h3>
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
                        <div class="bg-ithena-gray rounded-lg p-8">
                            <img id="accordion-image" src="https://readdy.ai/api/search-image?query=Social%20intelligence%20platform%20overview%20showing%20comprehensive%20dashboard%20with%20multiple%20social%20media%20monitoring%20tools%20analytics%20charts%20and%20real-time%20data%20streams%20in%20modern%20professional%20interface%20design&width=500&height=400&seq=faq1&orientation=landscape" alt="Platform Overview" class="w-full rounded-lg object-cover object-top">
                            <div class="mt-6">
                                <h4 id="accordion-image-title" class="text-xl font-bold mb-2">Platform Overview</h4>
                                <p id="accordion-image-description" class="text-ithena-black">Comprehensive social intelligence solution designed for modern businesses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Applications / case study Section -->
        <section class="py-20 bg-ithena-gray bg-gray-fade">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold  mb-4">Applications – <span class="text-ithena-maroon">Inbound & Outbound Tracking</span></h2>
                    <p class="text-xl text-ithena-black">Get value from both indoor and outdoor tracking.</p>
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
                            <h3 class="text-xl font-semibold  mb-3">Medical Labs & Hospitals</h3>
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
                            <h3 class="text-xl font-semibold mb-3">Warehouse and Storerooms</h3>
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
                            <h3 class="text-xl font-semibold  mb-3">Reefer Truck Tracking</h3>
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
                            <h3 class="text-xl font-semibold  mb-3">Tracking On Wheels</h3>
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
                            <h3 class="text-xl font-semibold  mb-3">Asset Tracking Inside Truck</h3>
                            <p class="text-ithena-black">Track your valuable assets inside the trucks; Example - Bank vehicles can use this solution for security purposes when delivering hard currency.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!-------------------- scripts  --------------------->

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

        <script id="product-showcase">
            document.addEventListener('DOMContentLoaded', function() {
                const productTrack = document.querySelector('.product-track');
                const productItems = document.querySelectorAll('.product-item');
                if (!productTrack || productItems.length === 0) return;

                const itemWidth = 256;
                const gap = 32;
                const totalWidth = (itemWidth + gap) * productItems.length;
                let currentPosition = 0;
                const speed = 1;

                function createInfiniteLoop() {
                    productItems.forEach(item => {
                        const clone = item.cloneNode(true);
                        productTrack.appendChild(clone);
                    });
                }
                createInfiniteLoop();

                function animate() {
                    currentPosition -= speed;
                    if (Math.abs(currentPosition) >= totalWidth) {
                        currentPosition = 0;
                    }
                    productTrack.style.transform = `translateX(${currentPosition}px)`;
                    requestAnimationFrame(animate);
                }

                const showcase = document.querySelector('.product-showcase');
                let isAnimating = true;

                showcase.addEventListener('mouseenter', function() {
                    isAnimating = false;
                });

                showcase.addEventListener('mouseleave', function() {
                    isAnimating = true;
                });

                function smoothAnimate() {
                    if (isAnimating) {
                        currentPosition -= speed;
                        if (Math.abs(currentPosition) >= totalWidth) {
                            currentPosition = 0;
                        }
                        productTrack.style.transform = `translateX(${currentPosition}px)`;
                    }
                    requestAnimationFrame(smoothAnimate);
                }
                smoothAnimate();
            });
        </script>

        <!-- Custom Navbar -->
        <?php echo child_theme_custom_footer(); ?>

    </div>

<?php
    if ( is_user_logged_in() ) {
        do_action( 'wp_footer' );
    }
?>