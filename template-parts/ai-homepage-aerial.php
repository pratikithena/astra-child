<?php
    /*
    Template Name: master structure - AI Homepage Aerial
    */
?>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Master Structure - Aerial</title>
        
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

            body{ 
                
                color: var(--color-black) !important; 
                
                /* Apply Arial to all headings */
                h1, h2, h3, h4, h5, h6 {
                    font-family: "Arial", sans-serif !important;
                }

                /* Apply Noto Sans to all paragraphs and divs */
                p, div {
                    font-family: "Noto Sans", sans-serif !important;
                }
                
            }

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
                                <button class="bg-ithena-blue text-ithena-white px-8 py-4 text-lg !rounded-button">Know More</button>
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
                                <button class="bg-ithena-blue text-ithena-white px-8 py-4 text-lg !rounded-button">Know More</button>
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
                                <button class="bg-ithena-blue text-ithena-white px-8 py-4 text-lg !rounded-button">Know More</button>
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
        
        <!-- Use Cases Section - primary color -->
        <section class="py-10 bg-ithena-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold text-ithena-black mb-4">Choose Your <span class="text-ithena-maroon">Use Case</span></h2>
                    <p class="text-xl text-ithena-black max-w-3xl mx-auto">Discover how our platform transforms social data into actionable business intelligence across various departments and functions</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-ithena-blue rounded-lg hover:shadow-xl transition-shadow p-6 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="mb-6">
                            <img src="https://dev.ithena.io/wp-content/uploads/2023/07/Frame-329.webp" alt="Build the factory" class="customer-img w-full h-48 rounded-lg">
                        </div>
                        <h3 class="text-xl font-bold text-ithena-white mb-3">Build the factory of the future?</h3>
                        <p class="text-ithena-white">Digitize processes, integrate shop floor assets, and transform user's service experience.  <a href="#" class="inline-block ml-2 text-ithena-blue hover:text-ithena-blue transition-colors">»</a></p>
                    </div>
                    <div class="bg-ithena-blue rounded-lg hover:shadow-xl transition-shadow p-6 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="mb-6">
                            <img src="https://dev.ithena.io/wp-content/uploads/2023/07/Frame-385.webp" alt="Make communities go greener" class="customer-img w-full h-48 rounded-lg">
                        </div>
                        <h3 class="text-xl font-bold text-ithena-white mb-3">Make communities go greener and smarter?</h3>
                        <p class="text-ithena-white">Transform communities with sustainable and energy-efficient solutions. <a href="#" class="inline-block ml-2 text-ithena-blue hover:text-ithena-blue transition-colors">»</a></p>
                    </div>
                    <div class="bg-ithena-blue rounded-lg hover:shadow-xl transition-shadow p-6 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="mb-6">
                            <img src="https://dev.ithena.io/wp-content/uploads/2023/07/Frame-379.webp" alt="Modernize legacy" class="customer-img w-full h-48 rounded-lg">
                        </div>
                        <h3 class="text-xl font-bold text-ithena-white mb-3">Modernize legacy business applications?</h3>
                        <p class="text-ithena-white">Modernize business applications and build experiences for customers.<a href="#" class="inline-block ml-2 text-ithena-blue hover:text-ithena-blue transition-colors">»</a></p>
                    </div>
                    <div class="bg-ithena-blue rounded-lg hover:shadow-xl transition-shadow p-6 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="mb-6">
                            <img src="https://dev.ithena.io/wp-content/uploads/2023/07/Frame-332.webp" alt="Harness the power" class="customer-img w-full h-48 rounded-lg">
                        </div>
                        <h3 class="text-xl font-bold text-ithena-white mb-3">Harness the power of organization's data?</h3>
                        <p class="text-ithena-white">Generate actionable business insights and optimize business output. <a href="#" class="inline-block ml-2 text-ithena-blue hover:text-ithena-blue transition-colors">»</a></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Industries Section -->
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

        <!-- Metrics Section -->
        <section class="py-20 bg-ithena-white bg-white-fade">
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

        <!-- Introduction Section -->
        <section class="py-20 bg-ithena-gray bg-gray-fade">
            <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl font-bold text-ithena-black mb-6">
                        <span class="text-ithena-maroon">Next-Generation</span> AI Platform
                    </h2>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                        <div class="w-6 h-6 flex items-center justify-center bg-ithena-blue/10 rounded-full flex-shrink-0 mt-1">
                            <i class="ri-check-line text-ithena-blue text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-ithena-black mb-2">User-Friendly & Ready-to-Use</h3>
                            <p class="text-ithena-black">Generative AI that's intuitive and unified, designed for enterprise adoption without complex setup.</p>
                        </div>
                        </div>
                        <div class="flex items-start space-x-4">
                        <div class="w-6 h-6 flex items-center justify-center bg-ithena-blue/10 rounded-full flex-shrink-0 mt-1">
                            <i class="ri-time-line text-ithena-blue text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-ithena-black mb-2">Fast Results Within Weeks</h3>
                            <p class="text-ithena-black">Accelerate your digital transformation with rapid deployment and immediate value realization.</p>
                        </div>
                        </div>
                        <div class="flex items-start space-x-4">
                        <div class="w-6 h-6 flex items-center justify-center bg-ithena-blue/10 rounded-full flex-shrink-0 mt-1">
                            <i class="ri-database-2-line text-ithena-blue text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-ithena-black mb-2">Complete Data Management</h3>
                            <p class="text-ithena-black">Comprehensive data connectivity, collection, classification, and management in one platform.</p>
                        </div>
                        </div>
                        <div class="flex items-start space-x-4">
                        <div class="w-6 h-6 flex items-center justify-center bg-ithena-blue/10 rounded-full flex-shrink-0 mt-1">
                            <i class="ri-settings-3-line text-ithena-blue text-xl"></i>
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
        <section class="py-20 bg-ithena-white bg-white-fade">
            
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold text-ithena-black mb-4">Explore</h2>
                    <p class="text-xl text-ithena-black max-w-3xl mx-auto">See how our solutions utilize the value of our platform</p>
                </div>
                <div class="grid md:grid-cols-3 gap-6">

                    <div class="explore-card group bg-ithena-gray rounded-2xl p-6 border border-gray-200 hover:shadow-xl transition-shadow hover:-translate-y-2 hover:bg-[#0082C8] transition-all duration-300 cursor-pointer">
                        <div class="w-16 h-16 flex items-center justify-center bg-ithena-white rounded-2xl mb-4 mx-auto">
                            <i class="ri-file-text-line text-ithena-blue text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-ithena-black mb-3 text-center group-hover:text-white transition-colors">Case Studies</h3>
                        <p class="text-ithena-black mb-4 text-center group-hover:text-white transition-colors">Discover real-world implementations across various technologies, industries, and use cases.</p>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-code-line text-ithena-blue group-hover:text-white transition-colors"></i>
                                </div>
                                <span class="text-sm group-hover:text-white transition-colors">Technology Solutions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-building-line text-ithena-blue group-hover:text-white transition-colors"></i>
                                </div>
                                <span class="text-sm group-hover:text-white transition-colors">Industry Applications</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-briefcase-line text-ithena-blue group-hover:text-white transition-colors"></i>
                                </div>
                                <span class="text-sm group-hover:text-white transition-colors">Business Solutions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <i class="ri-focus-line text-ithena-blue group-hover:text-white transition-colors"></i>
                                </div>
                                <span class="text-sm group-hover:text-white transition-colors">Use Case Examples</span>
                            </div>
                        </div>
                    </div>

                    <div class="explore-card bg-ithena-gray rounded-2xl p-6 border border-gray-200 hover:shadow-xl transition-shadow hover:-translate-y-2 transition-all duration-300 cursor-pointer">
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

                    <div class="explore-card bg-ithena-gray rounded-2xl p-6 border border-gray-200 hover:shadow-xl transition-shadow  hover:-translate-y-2 transition-all duration-300 cursor-pointer">
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
                    <h2 class="text-4xl font-bold mb-4">Explore</h2>
                    <p class="text-xl max-w-3xl mx-auto">See how our solutions utilize the value of our platform</p>
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
        <section class="py-10 bg-ithena-gray">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold mb-4">Explore</h2>
                    <p class="text-xl max-w-3xl mx-auto">See how our solutions utilize the value of our platform</p>
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
        <section class="py-10 bg-ithena-white">
            
            <div class="blue-version max-w-7xl mx-auto px-6 lg:px-8">
                <div class="content-2-cards">
                    <h2 class="text-4xl font-bold mb-12 text-center">Platform Overview</h2>
                    <div class="grid lg:grid-cols-2 gap-16 items-start">
                        <div class="space-y-8 cards">
                            <div class="bg-ithena-blue p-8 rounded-2xl text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                                <div class="w-16 h-16 mx-auto mb-6 bg-ithena-white rounded-2xl flex items-center justify-center">
                                    <i class="ri-share-line ri-2x text-ithena-blue"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-ithena-white mb-4">Multi-Platform Integration</h3>
                                <p class="text-ithena-white">Seamlessly connects with LinkedIn, Google, Facebook, and other major social platforms</p>
                            </div>
                            <div class="bg-ithena-blue p-8 rounded-2xl text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                                <div class="w-16 h-16 mx-auto mb-6 bg-ithena-white rounded-2xl flex items-center justify-center">
                                    <i class="ri-cpu-line ri-2x text-ithena-blue"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-ithena-white mb-4">AI-Powered Processing</h3>
                                <p class="text-ithena-white">Advanced AI middleware processes complex event streams in real-time</p>
                            </div>
                        </div>
                        <div class="text-content">
                            <p class="text-xl leading-relaxed mb-8">
                                ITHENA's Social Intelligence Platform (iSIP) is an AI-powered middleware application that interacts with social media platforms such as LinkedIn, Google, Facebook, and others.
                            </p>
                            <p class="text-xl leading-relaxed mb-8">
                                It acts as a bridge between the backend and front end and helps in connecting different applications seamlessly, despite their heterogeneous nature. Essentially functioning as a hidden translation layer, the middleware ingests complex event streams of customer signals every sub-second and enables communication and data management for distributed applications.
                            </p>
                            <p class="text-xl leading-relaxed mb-8">
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
                            <p class="text-xl leading-relaxed mb-8">
                                ITHENA's Social Intelligence Platform (iSIP) is an AI-powered middleware application that interacts with social media platforms such as LinkedIn, Google, Facebook, and others.
                            </p>
                            <p class="text-xl leading-relaxed mb-8">
                                It acts as a bridge between the backend and front end and helps in connecting different applications seamlessly, despite their heterogeneous nature. Essentially functioning as a hidden translation layer, the middleware ingests complex event streams of customer signals every sub-second and enables communication and data management for distributed applications.
                            </p>
                            <p class="text-xl leading-relaxed mb-8">
                                iSIP provides an intuitive, self-explanatory user interface that helps organisations understand insights from their data, give further details on the root cause of sentiments on their social interactions, and provide an Agentic AI experience with actionable next steps for positive customer engagement.
                            </p>
                        </div>
                        <div class="space-y-8 cards">
                            <div class="bg-ithena-gray p-8 rounded-2xl text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                                <div class="w-16 h-16 mx-auto mb-6 bg-ithena-white rounded-2xl flex items-center justify-center">
                                    <i class="ri-share-line ri-2x text-ithena-blue"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-ithena-black mb-4">Multi-Platform Integration</h3>
                                <p class="text-ithena-black">Seamlessly connects with LinkedIn, Google, Facebook, and other major social platforms</p>
                            </div>
                            <div class="bg-ithena-gray p-8 rounded-2xl text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                                <div class="w-16 h-16 mx-auto mb-6 bg-ithena-white rounded-2xl flex items-center justify-center">
                                    <i class="ri-cpu-line ri-2x text-ithena-blue"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-ithena-black mb-4">AI-Powered Processing</h3>
                                <p class="text-ithena-black">Advanced AI middleware processes complex event streams in real-time</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- Our Customers Say Section -->
        <section class="py-10 bg-ithena-gray" >
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-ithena-black mb-4">Our <span class="text-ithena-maroon">Customers</span> Say</h2>
                    <p class="text-xl text-ithena-black">See what industry leaders have to say about our platform</p>
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
                    
                    <div class="bg-ithena-white hover:shadow-xl p-8 rounded-2xl transition-all">
                        <div class="flex items-center mb-6">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20woman%20headshot%20portrait%2C%20confident%20smile%2C%20modern%20corporate%20attire%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&width=80&height=80&seq=customer-001&orientation=squarish" alt="Sarah Johnson" class="w-16 h-16 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-semibold text-ithena-black">Product Management, DJ</h4>
                                <!-- <p class="text-sm text-ithena-black">Product Management, DJ</p> -->
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
                                <!-- <p class="text-sm text-ithena-black">Data Director, InnovateLabs</p> -->
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
                                <!-- <p class="text-sm text-ithena-black">VP of Strategy, GlobalBrand Inc.</p> -->
                            </div>
                        </div>
                        <p class="leading-relaxed text-ithena-white">
                            "We spent days in understanding patters of our various platforms. With iSIP we are able to get this information in seconds, and are able to take action within minutes!"
                        </p>
                    </div>

                    <div class="bg-ithena-white border-2 border-ithena-blue p-8 rounded-2xl">
                        <div class="flex items-center mb-6">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20man%20headshot%20portrait%2C%20warm%20smile%2C%20business%20casual%20attire%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&amp;width=80&amp;height=80&amp;seq=customer-004&amp;orientation=squarish" alt="David Park" class="border-2 border-ithena-blue h-16 mr-4 object-cover rounded-full w-16">
                            <div>
                                <h4 class="font-semibold text-ithena-black">Head of Product Management, Louis W</h4>
                                <!-- <p class="text-sm text-ithena-black">CEO, StartupVentures</p> -->
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
        <section class="py-10 bg-ithena-white" >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold mb-4">Our Customers | Projects | People</h2>
                    <p class="text-xl text-ithena-black max-w-3xl mx-auto">Discover the stories behind our successful partnerships and innovative solutions</p>
                </div>
                <div class="customers-slider relative">
                    <button class="customers-prev absolute left-0 top-1/2 transform -translate-y-1/2 bg-ithena-blue rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow z-10">
                        <i class="ri-arrow-left-line text-xl text-ithena-white"></i>
                    </button>
                    <button class="customers-next absolute right-0 top-1/2 transform -translate-y-1/2 bg-ithena-blue rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow z-10">
                        <i class="ri-arrow-right-line text-xl text-ithena-white"></i>
                    </button>
                    <div class="customers-container overflow-hidden mx-12">
                        <div class="customers-slides flex transition-transform duration-500">
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-950.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Equipment Efficiency</h3> -->
                                        <p class="text-ithena-white text-sm">Enhancing equipment efficiency, leading to cost savings in manufacturing, transportation and storage.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Group-697.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">OTT Streaming Analytics</h3> -->
                                        <p class="text-ithena-white text-sm">Identifying high-performing content and creating successful strategies for OTT streaming services.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Frame-31.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Google Cloud Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Transforming businesses with the best infrastructure, platform, industry solutions and expertise with Google Cloud.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-953.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">IT Asset Transformation</h3> -->
                                        <p class="text-ithena-white text-sm">Seamless transformation of all IT assets, regardless of complexity or synchronicity at super-optimized costs.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2024/08/Rectangle-948-2.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Incorta Data Platform</h3> -->
                                        <p class="text-ithena-white text-sm">Empowering businesses to make data-driven decisions with unmatched speed with Incorta's Direct Data Platform.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Group-467-1.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Infor Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Implementing pre-existing Infor solutions with customised maintenance, optimization and debugging services.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Copy-of-Rectangle-131.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Data Environment Optimization</h3> -->
                                        <p class="text-ithena-white text-sm">Reducing infrastructure cost and increase productivity through unified and reliable data environment.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-952.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">PTC Digital Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Accelerating the deployment of PTC Thingworx and Vuforia platform for digital agility and smart industry solutions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/oracle-2.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Oracle Modernization</h3> -->
                                        <p class="text-ithena-white text-sm">Modernizing businesses with EBS upgrades and reducing the total cost of ownership with Oracle Fusion Apps.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-948.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Microsoft Power BI</h3> -->
                                        <p class="text-ithena-white text-sm">Microsoft Power BI's data visualisation tools help businesses modernize apps and make better decisions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide flex-none w-1/4 px-4">
                                <div class="customer-card-bg rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-954-1.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Asset Localization</h3> -->
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
                    <h2 class="text-4xl font-bold mb-4">Our Customers | Projects | People</h2>
                    <p class="text-xl text-ithena-black max-w-3xl mx-auto">Discover the stories behind our successful partnerships and innovative solutions</p>
                </div>
                <div class="customers-slider-2 relative">
                    
                    <button class="customers-prev-2 absolute left-0 top-1/2 transform -translate-y-1/2 bg-ithena-black rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow z-10">
                        <i class="ri-arrow-left-line text-xl text-ithena-white"></i>
                    </button>
                    <button class="customers-next-2 absolute right-0 top-1/2 transform -translate-y-1/2 bg-ithena-black rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow z-10">
                        <i class="ri-arrow-right-line text-xl text-ithena-white"></i>
                    </button>
                    
                    <div class="customers-container overflow-hidden mx-12">
                        <div class="customers-slides-2 flex transition-transform duration-500">
                            
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-950.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Equipment Efficiency</h3> -->
                                        <p class="text-ithena-white text-sm">Enhancing equipment efficiency, leading to cost savings in manufacturing, transportation and storage.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Group-697.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">OTT Streaming Analytics</h3> -->
                                        <p class="text-ithena-white text-sm">Identifying high-performing content and creating successful strategies for OTT streaming services.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Frame-31.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Google Cloud Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Transforming businesses with the best infrastructure, platform, industry solutions and expertise with Google Cloud.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-953.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">IT Asset Transformation</h3> -->
                                        <p class="text-ithena-white text-sm">Seamless transformation of all IT assets, regardless of complexity or synchronicity at super-optimized costs.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2024/08/Rectangle-948-2.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Incorta Data Platform</h3> -->
                                        <p class="text-ithena-white text-sm">Empowering businesses to make data-driven decisions with unmatched speed with Incorta's Direct Data Platform.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Group-467-1.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Infor Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Implementing pre-existing Infor solutions with customised maintenance, optimization and debugging services.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Copy-of-Rectangle-131.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Data Environment Optimization</h3> -->
                                        <p class="text-ithena-white text-sm">Reducing infrastructure cost and increase productivity through unified and reliable data environment.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-952.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">PTC Digital Solutions</h3> -->
                                        <p class="text-ithena-white text-sm">Accelerating the deployment of PTC Thingworx and Vuforia platform for digital agility and smart industry solutions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/oracle-2.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Oracle Modernization</h3> -->
                                        <p class="text-ithena-white text-sm">Modernizing businesses with EBS upgrades and reducing the total cost of ownership with Oracle Fusion Apps.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-948.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Microsoft Power BI</h3> -->
                                        <p class="text-ithena-white text-sm">Microsoft Power BI's data visualisation tools help businesses modernize apps and make better decisions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-slide-2 flex-none w-1/4 px-4">
                                <div class="customer-card-bg-black rounded-lg overflow-hidden h-full p-3">
                                    <img src="https://ithena.ai/wp-content/uploads/2023/07/Rectangle-954-1.png" class="customer-img ">
                                    <div class="customer-descp">
                                        <!-- <h3 class="text-lg font-bold text-ithena-black mb-2">Asset Localization</h3> -->
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
        <section class="py-10 bg-ithena-gray" >
            <div class="container mx-auto px-6">
                
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-ithena-black mb-4">Discover <span class="text-ithena-maroon">iSERV Success Stories</span></h2>
                    <p class="text-xl text-ithena-black">Real results from industry leaders who trust iSERV</p>
                </div>

                <div class="relative white-block">
                    <div class="bg-ithena-white rounded-lg p-8 lg:p-10 hover:shadow-xl transition-all duration-300 cursor-pointer">
                        <div class="flex  lg:flex-row items-center gap-10">
                        <div class="lg:w-1/2">
                            <div class="mb-6">
                                <h3 class="text-2xl font-semibold mb-4 text-ithena-black">Deploying ITHENA&#x27;s iSERV to enhance operations at the leading metal-forming and forging company</h3>
                                <p class="text-xl leading-relaxed mb-4" style="font-size:16px">
                                    &quot;<!-- -->The client, a frontrunner in the metal forging sector, aimed to embrace data-driven manufacturing to enhance plant efficiency. Implementing iSERV in their machinery facilitated real-time access to critical equipment parameters via personalized dashboards, empowering users to conduct predictive maintenance activities. Additionally, iSERV enabled users to access a knowledge repository and provided self-help videos and manuals for enhanced operational effectiveness.<!-- -->&quot;
                                </p>
                                <div class="keyvalue-text mb-2">
                                    <span class="text-4xl font-bold text-ithena-maroon">18%</span>
                                    <span class="text-l italic ml-2 text-ithena-maroon">enhanced efficiency</span>
                                </div>
                            </div>
                            <!-- <div class="flex space-x-4"><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-ithena-white transition-colors cursor-pointer"><i class="ri-arrow-left-line text-xl"></i></button><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-ithena-white transition-colors cursor-pointer"><i class="ri-arrow-right-line text-xl"></i></button></div> -->
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
                                    <span class="text-4xl font-bold text-ithena-white">18%</span>
                                    <span class="text-xl italic ml-2 text-ithena-white">enhanced efficiency</span>
                                </div>
                            </div>
                            <!-- <div class="flex space-x-4"><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-ithena-white transition-colors cursor-pointer"><i class="ri-arrow-left-line text-xl"></i></button><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-ithena-white transition-colors cursor-pointer"><i class="ri-arrow-right-line text-xl"></i></button></div> -->
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
        <section class="py-10 bg-ithena-white" >
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <h2 class="font-bold mb-12 text-4xl text-center text-ithena-maroon">Frequently Asked Questions</h2>
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
        <section class="py-10 bg-ithena-gray">
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

                <div class="blue-block grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8 mt-10">
                    <div class="application-card bg-ithena-blue rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://readdy.ai/api/search-image?query=Modern%20medical%20laboratory%20with%20advanced%20equipment%20monitoring%20systems%20digital%20displays%20showing%20asset%20tracking%20technology%20clean%20sterile%20environment%20with%20medical%20devices%20and%20compliance%20monitoring%20screens%20professional%20healthcare%20setting&width=400&height=300&seq=medical-lab&orientation=landscape"
                                alt="Medical Labs & Hospitals"
                                class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-ithena-white mb-3">Medical Labs & Hospitals</h3>
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
                            <h3 class="text-xl font-semibold text-ithena-white mb-3">Warehouse and Storerooms</h3>
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
                            <h3 class="text-xl font-semibold text-ithena-white mb-3">Reefer Truck Tracking</h3>
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
                            <h3 class="text-xl font-semibold text-ithena-white mb-3">Tracking On Wheels</h3>
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
                            <h3 class="text-xl font-semibold text-ithena-white mb-3">Asset Tracking Inside Truck</h3>
                            <p class="text-ithena-white">Track your valuable assets inside the trucks; Example - Bank vehicles can use this solution for security purposes when delivering hard currency.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Tabs and Panel Section -->
        <section class="py-10 bg-ithena-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold mb-4">Our Solutions in Action</h2>
                    <p class="text-xl max-w-3xl mx-auto text-ithena-black">Explore how our platform delivers results across different business functions</p>
                </div>
                <!-- Tab Navigation -->
                <div class="flex justify-center mb-12">
                    <div class="bg-ithena-gray rounded-lg p-1 inline-flex">
                        <button class="tab-btn active px-6 py-3 rounded-md text-lg font-semibold transition-all duration-300 whitespace-nowrap !rounded-button" data-tab="analytics">Analytics Dashboard</button>
                        <button class="tab-btn px-6 py-3 rounded-md text-lg font-semibold transition-all duration-300 whitespace-nowrap !rounded-button" data-tab="automation">AI Automation</button>
                        <button class="tab-btn px-6 py-3 rounded-md text-lg font-semibold transition-all duration-300 whitespace-nowrap !rounded-button" data-tab="integration">System Integration</button>
                    </div>
                </div>
                <!-- Tab Panels -->
                <div class="tab-panels">
                    <!-- Analytics Panel -->
                    <div class="tab-panel block" id="analytics-panel">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <div class="order-2 lg:order-1">
                                <img src="https://readdy.ai/api/search-image?query=Modern%20analytics%20dashboard%20displaying%20social%20media%20metrics%20engagement%20rates%20sentiment%20analysis%20charts%20and%20real-time%20data%20visualization%20on%20multiple%20screens%20in%20professional%20workspace%20with%20clean%20interface%20design&width=600&height=400&seq=tab1&orientation=landscape" alt="Analytics Dashboard" class="w-full rounded-lg  object-cover object-top">
                            </div>
                            <div class="order-1 lg:order-2">
                                <h3 class="text-3xl font-bold mb-6 text-ithena-maroon">Real-Time Analytics Dashboard</h3>
                                <p class="text-lg mb-6">Transform raw social data into actionable insights with our comprehensive analytics platform. Monitor trends, track performance metrics, and make data-driven decisions with confidence.</p>
                                <ul class="space-y-4 mb-8">
                                    <li class="flex items-start">
                                        <i class="ri-check-line text-ithena-blue text-xl mt-1 mr-3"></i>
                                        <span class="">Real-time sentiment analysis across all social platforms</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line text-ithena-blue text-xl mt-1 mr-3"></i>
                                        <span class="">Customizable dashboards with drag-and-drop widgets</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line text-ithena-blue text-xl mt-1 mr-3"></i>
                                        <span class="">Advanced filtering and segmentation capabilities</span>
                                    </li>
                                </ul>
                                <button class="bg-ithena-blue text-white p-3 text-lg !rounded-button">Explore Analytics</button>
                            </div>
                        </div>
                    </div>
                    <!-- Automation Panel -->
                    <div class="tab-panel hidden" id="automation-panel">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <div class="order-2 lg:order-1">
                                <img src="https://readdy.ai/api/search-image?query=AI%20automation%20interface%20showing%20intelligent%20workflow%20processes%20machine%20learning%20algorithms%20and%20automated%20social%20media%20management%20tools%20with%20robotic%20process%20automation%20elements%20in%20futuristic%20design&width=600&height=400&seq=tab2&orientation=landscape" alt="AI Automation" class="w-full rounded-lg  object-cover object-top">
                            </div>
                            <div class="order-1 lg:order-2">
                                <h3 class="text-3xl font-bold mb-6 text-ithena-maroon">Intelligent AI Automation</h3>
                                <p class="text-lg mb-6">Streamline your social intelligence operations with AI-powered automation. From content scheduling to response generation, let our smart algorithms handle repetitive tasks while you focus on strategy.</p>
                                <ul class="space-y-4 mb-8">
                                    <li class="flex items-start">
                                        <i class="ri-check-line text-ithena-blue text-xl mt-1 mr-3"></i>
                                        <span class="">Automated content curation and scheduling</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line text-ithena-blue text-xl mt-1 mr-3"></i>
                                        <span class="">Smart alert system for critical mentions</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line text-ithena-blue text-xl mt-1 mr-3"></i>
                                        <span class="">Predictive trend analysis and recommendations</span>
                                    </li>
                                </ul>
                                <button class="bg-ithena-blue text-white p-3 text-lg !rounded-button">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <!-- Integration Panel -->
                    <div class="tab-panel hidden" id="integration-panel">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <div class="order-2 lg:order-1">
                                <img src="https://readdy.ai/api/search-image?query=System%20integration%20architecture%20diagram%20showing%20connected%20enterprise%20software%20platforms%20APIs%20data%20flow%20and%20seamless%20connectivity%20between%20different%20business%20applications%20in%20modern%20tech%20environment&width=600&height=400&seq=tab3&orientation=landscape" alt="System Integration" class="w-full rounded-lg  object-cover object-top">
                            </div>
                            <div class="order-1 lg:order-2">
                                <h3 class="text-3xl font-bold mb-6 text-ithena-maroon">Seamless System Integration</h3>
                                <p class="text-lg mb-6">Connect your existing business tools and platforms with our robust integration capabilities. Ensure smooth data flow and maintain operational continuity across your entire tech stack.</p>
                                <ul class="space-y-4 mb-8">
                                    <li class="flex items-start">
                                        <i class="ri-check-line text-ithena-blue text-xl mt-1 mr-3"></i>
                                        <span class="">Pre-built connectors for popular CRM and ERP systems</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line text-ithena-blue text-xl mt-1 mr-3"></i>
                                        <span class="">RESTful APIs for custom integrations</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="ri-check-line text-ithena-blue text-xl mt-1 mr-3"></i>
                                        <span class="">Real-time data synchronization across platforms</span>
                                    </li>
                                </ul>
                                <button class="bg-ithena-blue text-white p-3 text-lg !rounded-button">View Integrations</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Accordion Section -->
        <section class="py-10 bg-ithena-gray">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold mb-4">Frequently Asked Questions</h2>
                    <p class="text-xl max-w-3xl mx-auto">Get answers to the most common questions about our social intelligence platform</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                    <!-- Left Side - Accordions -->
                    <div class="space-y-4">
                        
                        <div class="active accordion-items bg-ithena-white rounded-lg shadow-sm">
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

                        <div class="accordion-items bg-ithena-white rounded-lg shadow-sm">
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
                        
                        <div class="accordion-items bg-ithena-white rounded-lg shadow-sm">
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
                        
                        <div class="accordion-items bg-ithena-white rounded-lg shadow-sm">
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
                        <div class="bg-ithena-white rounded-lg shadow-lg p-8">
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

         <!-- Industries Solutions Section -->
        <section class="py-10 bg-ithena-white">
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 blue-version">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <!-- Left Content -->
                    <div>
                        <h2 class="text-4xl font-bold text-ithena-black mb-6"><span class="text-ithena-maroon">Streamline Social Intelligence</span> Advanced Analytics</h2>
                        <p class="text-lg text-ithena-black mb-8">Built on cutting-edge AI technology, our platform is the leading social intelligence solution integrated with your business execution software!</p>
                        <button class="!rounded-button bg-ithena-blue px-8 py-3 text-lg text-ithena-white">CTA Button</button>
                    </div>
                    <!-- Right Grid -->
                    <div class="grid grid-cols-2 gap-8">
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Digital%20analytics%20dashboard%20icon%20with%20trending%20charts%20and%20growth%20metrics%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution1&orientation=squarish" alt="Reduced Response Times" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-lg font-bold text-ithena-black mb-3">Reduced Response Times</h3>
                            <p class="text-ithena-black text-sm">By streamlining social monitoring and scheduling, our platform helps to reduce response times, enabling organizations to respond more quickly to customer demands and market changes.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Precision%20scheduling%20calendar%20icon%20with%20automated%20workflow%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution2&orientation=squarish" alt="Accurate Scheduling" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-lg font-bold text-ithena-black mb-3">Accurate Scheduling</h3>
                            <p class="text-ithena-black text-sm">The software's ability to create accurate and realistic schedules contributes to improving on-time delivery performance. It's crucial for maintaining customer satisfaction and meeting contractual commitments.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Centralized%20platform%20hub%20icon%20with%20connected%20data%20nodes%20and%20integration%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution3&orientation=squarish" alt="Single Centralized Platform" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-lg font-bold text-ithena-black mb-3">Single Centralized Platform</h3>
                            <p class="text-ithena-black text-sm">Our platform can integrate with other enterprise systems, such as ERP systems, to ensure seamless data flow between different parts of the organization.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Operations%20integration%20icon%20with%20synchronized%20gears%20and%20data%20exchange%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution4&orientation=squarish" alt="Integrated with Operations" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-lg font-bold text-ithena-black mb-3">Integrated with Operations</h3>
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
                            <h3 class="text-lg font-bold text-ithena-maroon mb-3">Reduced Response Times</h3>
                            <p class="text-ithena-black text-sm">By streamlining social monitoring and scheduling, our platform helps to reduce response times, enabling organizations to respond more quickly to customer demands and market changes.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Precision%20scheduling%20calendar%20icon%20with%20automated%20workflow%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution2&orientation=squarish" alt="Accurate Scheduling" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-lg font-bold text-ithena-maroon mb-3">Accurate Scheduling</h3>
                            <p class="text-ithena-black text-sm">The software's ability to create accurate and realistic schedules contributes to improving on-time delivery performance. It's crucial for maintaining customer satisfaction and meeting contractual commitments.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Centralized%20platform%20hub%20icon%20with%20connected%20data%20nodes%20and%20integration%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution3&orientation=squarish" alt="Single Centralized Platform" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-lg font-bold text-ithena-maroon mb-3">Single Centralized Platform</h3>
                            <p class="text-ithena-black text-sm">Our platform can integrate with other enterprise systems, such as ERP systems, to ensure seamless data flow between different parts of the organization.</p>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Operations%20integration%20icon%20with%20synchronized%20gears%20and%20data%20exchange%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution4&orientation=squarish" alt="Integrated with Operations" class="w-16 h-16 mx-auto">
                            </div>
                            <h3 class="text-lg font-bold text-ithena-maroon mb-3">Integrated with Operations</h3>
                            <p class="text-ithena-black text-sm">MPS and MES all in one with in-sync data exchange!</p>
                        </div>
                    </div>

                    <!-- Right Grid -->
                    <div class="text-and-cta">
                        <h2 class="text-4xl font-bold text-ithena-black mb-6"><span class="text-ithena-maroon">Streamline Social Intelligence</span> Advanced Analytics</h2>
                        <p class="text-lg text-ithena-black mb-8">Built on cutting-edge AI technology, our platform is the leading social intelligence solution integrated with your business execution software!</p>
                        <button class="!rounded-button bg-ithena-maroon px-8 py-3 text-lg text-ithena-white">CTA Button</button>
                    </div>
                    

                </div>
            </div>

        </section>


        
        <!-- scripts  -->
        <!-- Tabs and Panel Section script -->
        <script id="tabs-functionality">
            document.addEventListener('DOMContentLoaded', function() {
                const tabButtons = document.querySelectorAll('.tab-btn');
                const tabPanels = document.querySelectorAll('.tab-panel');

                function showTab(targetTab) {
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active', 'bg-ithena-blue', 'text-ithena-white');
                        btn.classList.add('text-ithena-black');
                    });

                    tabPanels.forEach(panel => {
                        panel.classList.remove('block');
                        panel.classList.add('hidden');
                    });

                    const activeButton = document.querySelector(`[data-tab="${targetTab}"]`);
                    const activePanel = document.getElementById(`${targetTab}-panel`);

                    if (activeButton && activePanel) {
                        activeButton.classList.add('active', 'bg-ithena-blue', 'text-ithena-white');
                        activeButton.classList.remove('text-ithena-black');
                        activePanel.classList.remove('hidden');
                        activePanel.classList.add('block');
                    }
                }

                tabButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const targetTab = this.dataset.tab;
                        showTab(targetTab);
                    });
                });

                showTab('analytics');
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

<?php
    if ( is_user_logged_in() ) {
        do_action( 'wp_footer' );
    }
?>