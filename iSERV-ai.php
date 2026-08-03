<?php
    /*
    Template Name: iSER (AI)Page
    */
?>

<head>
    <meta charSet="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="preload" href="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/media/1b3800ed4c918892-s.p.woff2" as="font" crossorigin="" type="font/woff2"/>
    <link rel="preload" href="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/media/569ce4b8f30dc480-s.p.woff2" as="font" crossorigin="" type="font/woff2"/>
    <link rel="preload" href="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/media/93f479601ee12b01-s.p.woff2" as="font" crossorigin="" type="font/woff2"/>
    <link rel="preload" as="image" href="https://ithena.ai/wp-content/uploads/2023/03/Ithena-Logo.png"/>
    <link rel="preload" as="image" href="https://readdy.ai/api/search-image?query=Modern%20predictive%20maintenance%20analytics%20dashboard%20showing%20equipment%20health%20monitoring%2C%20maintenance%20schedules%2C%20condition%20indicators%2C%20and%20predictive%20insights%20with%20clean%20professional%20interface%20design%20and%20blue%20color%20scheme%2C%20transparent%20background%2C%20no%20background%2C%20clean%20cutout%20style%2C%20no%20white%20background%2C%20clean%20transparent%20cutout&amp;width=500&amp;height=350&amp;seq=maintenance_dashboard_transparent&amp;orientation=landscape"/>
    <link rel="preload" as="image" href="https://ithena.ai/wp-content/uploads/2023/05/Screenshot_2023-05-04_145815-removebg-preview.png"/>
    <link rel="preload" as="image" href="https://ithena.ai/wp-content/uploads/2024/05/both-mockups.png"/>
    <link rel="preload" as="image" href="https://readdy.ai/api/search-image?query=Modern%20industrial%20metal%20forging%20facility%20with%20advanced%20machinery%20and%20equipment%2C%20real-time%20monitoring%20dashboards%20displaying%20equipment%20parameters%20and%20performance%20metrics%2C%20professional%20manufacturing%20environment%20with%20digital%20displays%2C%20predictive%20maintenance%20interface%2C%20transparent%20background%2C%20no%20background%2C%20clean%20cutout%20style%2C%20industrial%20blue%20color%20scheme%2C%20no%20white%20background%2C%20clean%20transparent%20cutout&amp;width=350&amp;height=250&amp;seq=testimonial1_forging_transparent&amp;orientation=landscape"/>
    
    <!-- <link rel="stylesheet" href="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/css/c96cfc451c570f3c.css" data-precedence="next"/> -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ai-iserv.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ai-our-platform.css">

    <link rel="preload" as="script" fetchPriority="low" href="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/chunks/webpack-1956b89b686621a8.js"/>

    <!-- <script src="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/chunks/4bd1b696-18452535c1c4862d.js" async=""></script>
    <script src="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/chunks/684-7557f4574fedf9b0.js" async=""></script>
    <script src="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/chunks/main-app-51da44ce6a48658f.js" async=""></script>
    <script src="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/chunks/874-337b4094b64e0ad0.js" async=""></script>
    <script src="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/chunks/app/page-0739b247c822e403.js" async=""></script> -->
    
    <meta name="next-size-adjust" content=""/>
    <title>iSERV</title>
    
    <script>document.querySelectorAll('body link[rel="icon"], body link[rel="apple-touch-icon"]').forEach(el => document.head.appendChild(el))</script>
    <script src="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/chunks/polyfills-42372ed130431b0a.js" noModule=""></script>

    <style>
        /* Custom CSS for the iSERV AI page */
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Noto Sans', sans-serif !important;
            padding-top: var(--header-height);
        }

        /* Base transition class - applies to the element between sections */
        .section-transition {
            position: relative;
            height: 50px; /* Adjust this to control transition height */
            margin: 0;
            padding: 0;
            z-index: 1; /* Ensures content stays above the gradient */
        }

        /* Gradient transition - top to bottom */
        .section-transition--down {
            background: linear-gradient(
                to bottom,
                var(--prev-bg-color, #f8f9fa),  /* Previous section color */
                var(--next-bg-color, #ffffff)    /* Next section color */
            );
        }

        /* Gradient transition - bottom to top (for alternating patterns) */
        .section-transition--up {
            background: linear-gradient(
                to top,
                var(--prev-bg-color, #f8f9fa),  /* Previous section color */
                var(--next-bg-color, #ffffff)    /* Next section color */
            );
        }

        /* Curved transition variant (more decorative) */
        .section-transition--curve {
            height: 120px;
            background: var(--prev-bg-color, #f8f9fa);
            -webkit-mask-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%23ffffff"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%23ffffff"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%23ffffff"></path></svg>');
            mask-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%23ffffff"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%23ffffff"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%23ffffff"></path></svg>');
            -webkit-mask-size: cover;
            mask-size: cover;
            -webkit-mask-repeat: no-repeat;
            mask-repeat: no-repeat;
            -webkit-mask-position: center;
            mask-position: center;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .section-transition {
                height: 60px; /* Shorter transition on mobile */
            }
            
            .section-transition--curve {
                height: 80px;
            }
        }
    </style>

</head>

<body class="__variable_47ee0f __variable_37cd34 __variable_22e107 antialiased">
    
    <!-- Custom Navbar -->
    <?php echo child_theme_custom_headmenu(); ?>

    <div class="min-h-screen transition-colors duration-300 bg-white text-gray-900">
        
        <!-- <header class="fixed top-0 w-full z-50 transition-all duration-300 bg-white/95 backdrop-blur-sm border-b border-gray-200">
            <div class="container mx-auto px-6">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <a class="flex items-center space-x-2" href="https://dev.ithena.io/" target="_blank">
                            <img src="https://ithena.ai/wp-content/uploads/2023/03/Ithena-Logo.png" alt="ithena" class="h-8 w-auto"/>
                        </a>
                    </div>
                    <div class="flex items-center space-x-8">
                        <a class="text-gray-700 hover:text-[#0082C8] transition-colors font-semibold" href="https://dev.ithena.io/our-platform-ai/" target="_blank">Our Platform</a>
                        <a class="text-gray-700 hover:text-[#0082C8] transition-colors font-semibold" href="https://dev.ithena.io/aether-ai/" target="_blank">Aether AI</a>
                        <a class="text-gray-700 hover:text-[#0082C8] transition-colors font-semibold" href="https://dev.ithena.io/digital-shopfloor-igemba/" target="_blank">Digital Shopfloor</a>
                        <a class="text-gray-700 hover:text-[#0082C8] transition-colors font-semibold" href="https://dev.ithena.io/about-us/" target="_blank">About Us</a>
                        <a class="bg-[#0082C8] text-white px-4 py-2 hover:bg-blue-700 transition-colors font-semibold" href="https://dev.ithena.io/contact-us/" target="_blank">Contact Us</a>
                        <button class="p-2 rounded-lg hover:bg-gray-100 transition-colors"><i class="text-xl ri-moon-line"></i></button>
                    </div>
                </div>
            </div>
        </header> -->

        <section class="relative min-h-screen bg-cover bg-center bg-no-repeat pt-16" 
            style="background-image:linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url('https://readdy.ai/api/search-image?query=Modern%20futuristic%20data%20visualization%20dashboard%20with%20flowing%20digital%20connections%2C%20neural%20networks%2C%20and%20AI%20technology%20elements%20in%20a%20clean%20minimalist%20office%20environment%20with%20soft%20blue%20and%20white%20tones%2C%20professional%20business%20setting%20with%20floating%20holographic%20data%20streams%20and%20interconnected%20nodes%20representing%20integrated%20systems%2C%20bright%20and%20airy%20atmosphere%20with%20natural%20lighting&width=1920&height=1080&seq=hero1&orientation=landscape')">
            <div class="container mx-auto px-6 py-16">
                <div class="flex  lg:flex-row items-center justify-between min-h-screen">
                    <div class="lg:w-full text-white space-y-6">
                        <h1 class="font-bold leading-tight text-6xl text-black">Smart Service<br/><span class="text-[#0082C8]">iSERV</span></h1>
                        <p class="font-bold text-2xl text-dark">Self-Servicing at your fingertips.</p>
                        <button class="bg-[#0082C8] hover:bg-blue-700 text-white px-8 py-3 text-xl font-semibold transition-colors whitespace-nowrap cursor-pointer trigger-button rounded-lg" data-bs-toggle="modal" data-bs-target="#signupLoginModal">Start Free Trial</button>
                        <div class="mt-8">
                        <p class="leading-relaxed max-w-2xl text-gray-600" style="font-size:18px">Transform your enterprise operations with cutting-edge digital service enablement, seamless remote support capabilities, advanced predictive maintenance algorithms, comprehensive analytics dashboards, and robust OEM connectivity solutions that drive operational excellence and maximize equipment effectiveness.</p>
                        </div>
                    </div> 
                </div>
            </div>
        </section>

        <!-- Transition element (set colors to match adjacent sections) -->
        <div class="section-transition section-transition--down" 
            style="--prev-bg-color: #f9f9f9; --next-bg-color: #efefef;">
        </div>

        <section class="py-5 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4 text-gray-900">OEM Benefits</h2>
                    <p class="text-xl text-gray-600">Comprehensive solutions for original equipment manufacturers</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="rounded-lg p-6 shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer bg-white">
                        <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-4"><i class="ri-dashboard-line text-3xl text-[#0082C8]" style="font-size:30px"></i></div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900">Performance Monitoring</h3>
                        <p class="text-lg leading-relaxed text-gray-600" style="font-size:14px">Real-time tracking of equipment performance with comprehensive analytics and instant alerts for optimal operational efficiency.</p>
                    </div>
                    <div class="rounded-lg p-6 shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer bg-white">
                        <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-4"><i class="ri-tools-line text-3xl text-[#0082C8]" style="font-size:30px"></i></div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900">Predictive Maintenance</h3>
                        <p class="text-lg leading-relaxed text-gray-600" style="font-size:14px">Advanced algorithms predict maintenance needs before failures occur, reducing downtime and extending equipment lifespan.</p>
                    </div>
                    <div class="rounded-lg p-6 shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer bg-white">
                        <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-4"><i class="ri-shield-check-line text-3xl text-[#0082C8]" style="font-size:30px"></i></div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900">Quality Assurance</h3>
                        <p class="text-lg leading-relaxed text-gray-600" style="font-size:14px">Continuous quality monitoring with automated compliance checks and detailed reporting for regulatory requirements.</p>
                    </div>
                    <div class="rounded-lg p-6 shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer bg-white">
                        <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-4"><i class="ri-line-chart-line text-3xl text-[#0082C8]" style="font-size:30px"></i></div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900">Analytics &amp; Insights</h3>
                        <p class="text-lg leading-relaxed text-gray-600" style="font-size:14px">Deep operational insights through advanced data analytics, helping optimize processes and improve decision-making.</p>
                    </div>
                    <div class="rounded-lg p-6 shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer bg-white">
                        <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-4"><i class="ri-wifi-line text-3xl text-[#0082C8]" style="font-size:30px"></i></div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900">Remote Connectivity</h3>
                        <p class="text-lg leading-relaxed text-gray-600" style="font-size:14px">Seamless remote access and control capabilities enabling efficient troubleshooting and support operations.</p>
                    </div>
                    <div class="rounded-lg p-6 shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer bg-white">
                        <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-4"><i class="ri-settings-3-line text-3xl text-[#0082C8]" style="font-size:30px"></i></div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900">System Integration</h3>
                        <p class="text-lg leading-relaxed text-gray-600" style="font-size:14px">Flexible integration with existing enterprise systems and third-party applications for streamlined operations.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Transition element (set colors to match adjacent sections) -->
        <div class="section-transition section-transition--down" 
            style="--prev-bg-color: #efefef; --next-bg-color: #ffffff;">
        </div>

        <section class="py-5 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4 text-gray-900">Dashboard Features</h2>
                    <p class="text-xl text-gray-600">Comprehensive monitoring and analytics at your fingertips</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer">
                        <div class="w-16 h-16 bg-[#0082C8] rounded-lg flex items-center justify-center mb-4"><i class="ri-pie-chart-line text-3xl text-white" style="font-size:30px"></i></div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">OEE Dashboard</h3>
                        <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start"><i class="ri-check-line text-green-500 mr-3 mt-1 text-xl" style="font-size:16px"></i><span class="text-lg" style="font-size:14px">Asset connectivity monitoring with real-time status updates</span></li>
                        <li class="flex items-start"><i class="ri-check-line text-green-500 mr-3 mt-1 text-xl" style="font-size:16px"></i><span class="text-lg" style="font-size:14px">Real-time equipment health assessment and diagnostics</span></li>
                        <li class="flex items-start"><i class="ri-check-line text-green-500 mr-3 mt-1 text-xl" style="font-size:16px"></i><span class="text-lg" style="font-size:14px">Quality metrics tracking with automated reporting</span></li>
                        </ul>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer">
                        <div class="w-16 h-16 bg-green-600 rounded-lg flex items-center justify-center mb-4"><i class="ri-time-line text-3xl text-white" style="font-size:30px"></i></div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Machine Uptime Analytics</h3>
                        <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start"><i class="ri-check-line text-green-500 mr-3 mt-1 text-xl" style="font-size:16px"></i><span class="text-lg" style="font-size:14px">Comprehensive downtime analysis with root cause identification</span></li>
                        <li class="flex items-start"><i class="ri-check-line text-green-500 mr-3 mt-1 text-xl" style="font-size:16px"></i><span class="text-lg" style="font-size:14px">Predictive insights for maintenance scheduling optimization</span></li>
                        <li class="flex items-start"><i class="ri-check-line text-green-500 mr-3 mt-1 text-xl" style="font-size:16px"></i><span class="text-lg" style="font-size:14px">Performance trend analysis and improvement recommendations</span></li>
                        </ul>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer">
                        <div class="w-16 h-16 bg-purple-600 rounded-lg flex items-center justify-center mb-4"><i class="ri-bar-chart-line text-3xl text-white" style="font-size:30px"></i></div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Performance Insights</h3>
                        <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start"><i class="ri-check-line text-green-500 mr-3 mt-1 text-xl" style="font-size:16px"></i><span class="text-lg" style="font-size:14px">Key performance indicators with customizable dashboards</span></li>
                        <li class="flex items-start"><i class="ri-check-line text-green-500 mr-3 mt-1 text-xl" style="font-size:16px"></i><span class="text-lg" style="font-size:14px">Advanced visualizations for complex data interpretation</span></li>
                        <li class="flex items-start"><i class="ri-check-line text-green-500 mr-3 mt-1 text-xl" style="font-size:16px"></i><span class="text-lg" style="font-size:14px">Industry benchmarking and competitive analysis tools</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Transition element (set colors to match adjacent sections) -->
        <div class="section-transition section-transition--down" 
            style="--prev-bg-color: #ffffff; --next-bg-color: #efefef;">
        </div>

        <section class="py-5 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="flex lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2">
                        <h2 class="text-4xl font-bold mb-6 text-gray-900">Predictive Maintenance</h2>
                        <p class="text-xl mb-6 leading-relaxed text-gray-700" style="font-size:16px">Transform your maintenance operations with intelligent digital solutions that revolutionize equipment management. Our advanced platform integrates comprehensive digital logging systems, intelligent checklist automation, sophisticated work order scheduling, and condition-based maintenance protocols to maximize equipment reliability and operational efficiency.</p>
                        <div class="space-y-3">
                        <div class="flex items-start"><i class="ri-file-list-3-line text-[#0082C8] mr-3 mt-1 text-2xl" style="font-size:30px"></i><span class="text-lg text-gray-700" style="font-size:14px">Digital maintenance logs with automated data capture and historical tracking</span></div>
                        <div class="flex items-start"><i class="ri-checkbox-line text-[#0082C8] mr-3 mt-1 text-2xl" style="font-size:30px"></i><span class="text-lg text-gray-700" style="font-size:14px">Intelligent checklist management with customizable templates and workflows</span></div>
                        <div class="flex items-start"><i class="ri-calendar-schedule-line text-[#0082C8] mr-3 mt-1 text-2xl" style="font-size:30px"></i><span class="text-lg text-gray-700" style="font-size:14px">Advanced work order scheduling with resource optimization and priority management</span></div>
                        <div class="flex items-start"><i class="ri-pulse-line text-[#0082C8] mr-3 mt-1 text-2xl" style="font-size:30px"></i><span class="text-lg text-gray-700" style="font-size:14px">Condition-based maintenance protocols with real-time monitoring and alerts</span></div>
                        </div>
                    </div>
                    <div class="lg:w-1/2"><img src="https://readdy.ai/api/search-image?query=Modern%20predictive%20maintenance%20analytics%20dashboard%20showing%20equipment%20health%20monitoring%2C%20maintenance%20schedules%2C%20condition%20indicators%2C%20and%20predictive%20insights%20with%20clean%20professional%20interface%20design%20and%20blue%20color%20scheme%2C%20transparent%20background%2C%20no%20background%2C%20clean%20cutout%20style%2C%20no%20white%20background%2C%20clean%20transparent%20cutout&amp;width=500&amp;height=350&amp;seq=maintenance_dashboard_transparent&amp;orientation=landscape" alt="Predictive Maintenance Dashboard" class="w-full h-auto rounded-lg shadow-xl object-cover"/></div>
                </div>
            </div>
        </section>

        <!-- Transition element (set colors to match adjacent sections) -->
        <div class="section-transition section-transition--down" 
            style="--prev-bg-color: #efefef; --next-bg-color: #ffffff;">
        </div>

        <section class="py-5 bg-white">
            <div class="container mx-auto px-6">
                <div class="flex  lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2">
                        <div class="max-w-xs mx-auto"><img src="https://ithena.ai/wp-content/uploads/2023/05/Screenshot_2023-05-04_145815-removebg-preview.png" alt="Smart Service Mobile App" class="w-full h-auto rounded-2xl shadow-2xl object-cover"/></div>
                    </div>
                    <div class="lg:w-1/2">
                        <h2 class="text-4xl font-bold mb-6 text-gray-900">Smart Service Application</h2>
                        <p class="text-xl mb-6 leading-relaxed text-gray-700" style="font-size:16px">Empower your service teams with our comprehensive mobile application designed for field technicians and service professionals. Streamline operations from service requests to completion with integrated tools that enhance productivity and customer satisfaction.</p>
                        <div class="space-y-3">
                        <div class="flex items-start"><i class="ri-user-add-line text-[#0082C8] mr-3 mt-1 text-2xl" style="font-size:30px"></i><span class="text-lg text-gray-700" style="font-size:14px">Streamlined service onboarding with automated customer data integration</span></div>
                        <div class="flex items-start"><i class="ri-calendar-line text-[#0082C8] mr-3 mt-1 text-2xl" style="font-size:30px"></i><span class="text-lg text-gray-700" style="font-size:14px">Intelligent technician scheduling with skill-based routing and optimization</span></div>
                        <div class="flex items-start"><i class="ri-phone-line text-[#0082C8] mr-3 mt-1 text-2xl" style="font-size:30px"></i><span class="text-lg text-gray-700" style="font-size:14px">Advanced remote diagnostics with augmented reality support capabilities</span></div>
                        <div class="flex items-start"><i class="ri-star-line text-[#0082C8] mr-3 mt-1 text-2xl" style="font-size:30px"></i><span class="text-lg text-gray-700" style="font-size:14px">Enhanced service experience with real-time updates and customer feedback</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Transition element (set colors to match adjacent sections) -->
        <div class="section-transition section-transition--down" 
            style="--prev-bg-color: #ffffff; --next-bg-color: #efefef;">
        </div>

        <section class="py-5 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="flex lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2">
                        <h2 class="text-4xl font-bold mb-6 text-gray-900">Knowledge Portal</h2>
                        <p class="text-xl mb-6 leading-relaxed text-gray-700" style="font-size:16px">Access comprehensive knowledge resources through our centralized portal designed to enhance operational efficiency and support continuous learning across your organization.</p>
                        <div class="space-y-3">
                        <div class="flex items-start"><i class="ri-file-text-line text-[#0082C8] mr-3 mt-1 text-2xl" style="font-size:30px"></i><span class="text-lg text-gray-700" style="font-size:14px">Comprehensive SOPs with step-by-step guidance, interactive workflows, and version control for consistent operations</span></div>
                        <div class="flex items-start"><i class="ri-graduation-cap-line text-[#0082C8] mr-3 mt-1 text-2xl" style="font-size:30px"></i><span class="text-lg text-gray-700" style="font-size:14px">Interactive training modules, video tutorials, and certification programs for continuous skill development</span></div>
                        <div class="flex items-start"><i class="ri-global-line text-[#0082C8] mr-3 mt-1 text-2xl" style="font-size:30px"></i><span class="text-lg text-gray-700" style="font-size:14px">Global accessibility with multilingual documentation and real-time translation capabilities</span></div>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <div class="max-w-md mx-auto"><img src="https://ithena.ai/wp-content/uploads/2024/05/both-mockups.png" alt="Knowledge Portal Mobile Interface" class="w-full h-auto rounded-lg shadow-xl object-cover"/></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Transition element (set colors to match adjacent sections) -->
        <div class="section-transition section-transition--down" 
            style="--prev-bg-color: #efefef; --next-bg-color: #ffffff;">
        </div>

        <section class="py-5 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4 text-gray-900">E-commerce Solutions</h2>
                    <p class="text-xl text-gray-600">Comprehensive digital commerce platform for seamless business operations</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer">
                        <div class="w-16 h-16 bg-[#0082C8] rounded-lg flex items-center justify-center mb-4"><i class="ri-database-line text-3xl text-white" style="font-size:30px"></i></div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Unified Info Hub</h3>
                        <p class="text-gray-700 text-lg leading-relaxed" style="font-size:14px">Centralized product data management system with comprehensive catalog organization, real-time inventory tracking, and automated synchronization across all sales channels for consistent customer experience.</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer">
                        <div class="w-16 h-16 bg-green-600 rounded-lg flex items-center justify-center mb-4"><i class="ri-shuffle-line text-3xl text-white" style="font-size:30px"></i></div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">System Integration</h3>
                        <p class="text-gray-700 text-lg leading-relaxed" style="font-size:14px">Seamless ERP compatibility with robust API connections, automated data workflows, and real-time synchronization ensuring smooth operations between all business systems and maintaining data integrity.</p>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer">
                        <div class="w-16 h-16 bg-purple-600 rounded-lg flex items-center justify-center mb-4"><i class="ri-shopping-cart-line text-3xl text-white" style="font-size:30px"></i></div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Shopping Experience</h3>
                        <p class="text-gray-700 text-lg leading-relaxed" style="font-size:14px">Optimized cart-to-order flow with intelligent recommendations, automated email notifications, order tracking, and personalized customer journey management for enhanced conversion rates and satisfaction.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Transition element (set colors to match adjacent sections) -->
        <div class="section-transition section-transition--down" 
            style="--prev-bg-color: #ffffff; --next-bg-color: #efefef;">
        </div>

        <section class="py-5 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Discover iSERV Success Stories</h2>
                    <p class="text-xl text-gray-600">Real results from industry leaders who trust iSERV</p>
                </div>
                <div class="relative">
                    <div class="bg-gray-800 rounded-lg p-8 lg:p-10">
                        <div class="flex  lg:flex-row items-center gap-10">
                        <div class="lg:w-1/2">
                            <div class="mb-6">
                                <h3 class="text-2xl font-semibold text-white mb-4">Deploying ITHENA&#x27;s iSERV to enhance operations at the leading metal-forming and forging company</h3>
                                <p class="text-xl text-gray-300 leading-relaxed mb-4" style="font-size:16px">
                                    &quot;<!-- -->The client, a frontrunner in the metal forging sector, aimed to embrace data-driven manufacturing to enhance plant efficiency. Implementing iSERV in their machinery facilitated real-time access to critical equipment parameters via personalized dashboards, empowering users to conduct predictive maintenance activities. Additionally, iSERV enabled users to access a knowledge repository and provided self-help videos and manuals for enhanced operational effectiveness.<!-- -->&quot;
                                </p>
                                <div class="text-[#0082C8] mb-2"><span class="text-4xl font-bold">18%</span><span class="text-xl italic ml-2">enhanced efficiency</span></div>
                            </div>
                            <div class="flex space-x-4"><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-white transition-colors cursor-pointer"><i class="ri-arrow-left-line text-xl"></i></button><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-white transition-colors cursor-pointer"><i class="ri-arrow-right-line text-xl"></i></button></div>
                        </div>
                        <div class="lg:w-1/2"><img src="https://readdy.ai/api/search-image?query=Modern%20industrial%20metal%20forging%20facility%20with%20advanced%20machinery%20and%20equipment%2C%20real-time%20monitoring%20dashboards%20displaying%20equipment%20parameters%20and%20performance%20metrics%2C%20professional%20manufacturing%20environment%20with%20digital%20displays%2C%20predictive%20maintenance%20interface%2C%20transparent%20background%2C%20no%20background%2C%20clean%20cutout%20style%2C%20industrial%20blue%20color%20scheme%2C%20no%20white%20background%2C%20clean%20transparent%20cutout&amp;width=350&amp;height=250&amp;seq=testimonial1_forging_transparent&amp;orientation=landscape" alt="Deploying ITHENA&#x27;s iSERV to enhance operations at the leading metal-forming and forging company Dashboard" class="w-full h-auto rounded-lg shadow-xl object-cover"/></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Transition element (set colors to match adjacent sections) -->
        <div class="section-transition section-transition--down" 
            style="--prev-bg-color: #efefef; --next-bg-color: #ffffff;">
        </div>

        <section class="py-5 bg-white">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-4xl font-bold text-grey-900 mb-6">Ready to Transform Your Operations?</h2>
                <p class="text-xl text-grey-600 mb-8 max-w-2xl mx-auto">Join thousands of enterprises already benefiting from iSERV&#x27;s comprehensive smart service solutions.</p>
                <div class="flex justify-center">
                    <a class="bg-[#0082C8] font-semibold hover:bg-blue-700 px-8 py-3 rounded-lg text-decoration-none text-white" href="https://ithena.ai/solutions/#smg">
                        View our other Smart Manufacturing Solutions</a>
                </div>
            </div>
        </section>

    </div>
    
    <!--$--><!--/$--><!--$--><!--/$-->
    <script src="https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/chunks/webpack-1956b89b686621a8.js" async=""></script>
    <script>(self.__next_f=self.__next_f||[]).push([0])</script>
    <script>self.__next_f.push([1,"1:\"$Sreact.fragment\"\n2:I[7555,[],\"\"]\n3:I[1295,[],\"\"]\n4:I[894,[],\"ClientPageRoot\"]\n5:I[5665,[\"874\",\"static/chunks/874-337b4094b64e0ad0.js\",\"974\",\"static/chunks/app/page-0739b247c822e403.js\"],\"default\"]\n8:I[9665,[],\"MetadataBoundary\"]\na:I[9665,[],\"OutletBoundary\"]\nd:I[4911,[],\"AsyncMetadataOutlet\"]\nf:I[9665,[],\"ViewportBoundary\"]\n11:I[6614,[],\"\"]\n:HL[\"https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/media/1b3800ed4c918892-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/media/569ce4b8f30dc480-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/media/93f479601ee12b01-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/css/c96cfc451c570f3c.css\",\"style\"]\n0:{\"P\":null,\"b\":\"gCHhvik03N9VEguok0T3H\",\"p\":\"https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674\",\"c\":[\"\",\"\"],\"i\":false,\"f\":[[[\"\",{\"children\":[\"__PAGE__\",{}]},\"$undefined\",\"$undefined\",true],[\"\",[\"$\",\"$1\",\"c\",{\"children\":[[[\"$\",\"link\",\"0\",{\"rel\":\"stylesheet\",\"href\":\"https://readdy.link/preview/51cc821b-6e8a-411c-bf33-659f3e18ead0/1303674/_next/static/css/c96cfc451c570f3c.css\",\"precedence\":\"next\",\"crossOrigin\":\"$undefined\",\"nonce\":\"$undefined\"}]],[\"$\",\"html\",null,{\"lang\":\"en\",\"suppressHydrationWarning\":true,\"children\":[\"$\",\"body\",null,{\"className\":\"__variable_47ee0f __variable_37cd34 __variable_22e107 antialiased\",\"suppressHydrationWarning\":true,\"children\":[\"$\",\"$L2\",null,{\"parallelRouterKey\":\"children\",\"error\":\"$undefined\",\"errorStyles\":\"$undefined\",\"errorScripts\":\"$undefined\",\"template\":[\"$\",\"$L3\",null,{}],\"templateStyles\":\"$undefined\",\"templateScripts\":\"$undefined\",\"notFound\":[[\"$\",\"div\",null,{\"className\":\"flex  items-center justify-center h-screen text-center px-4\",\"children\":[[\"$\",\"h1\",null,{\"className\":\"text-5xl md:text-5xl font-semibold text-gray-100\",\"children\":\"404\"}],[\"$\",\"h1\",null,{\"className\":\"text-2xl md:text-3xl f"])</script><script>self.__next_f.push([1,"ont-semibold mt-6\",\"children\":\"This page has not been generated\"}],[\"$\",\"p\",null,{\"className\":\"mt-4 text-xl md:text-2xl text-gray-500\",\"children\":\"Tell me what you would like on this page\"}]]}],[]],\"forbidden\":\"$undefined\",\"unauthorized\":\"$undefined\"}]}]}]]}],{\"children\":[\"__PAGE__\",[\"$\",\"$1\",\"c\",{\"children\":[[\"$\",\"$L4\",null,{\"Component\":\"$5\",\"searchParams\":{},\"params\":{},\"promises\":[\"$@6\",\"$@7\"]}],[\"$\",\"$L8\",null,{\"children\":\"$L9\"}],null,[\"$\",\"$La\",null,{\"children\":[\"$Lb\",\"$Lc\",[\"$\",\"$Ld\",null,{\"promise\":\"$@e\"}]]}]]}],{},null,false]},null,false],[\"$\",\"$1\",\"h\",{\"children\":[null,[\"$\",\"$1\",\"DiAcm_sGxyZfxiCtGYSKr\",{\"children\":[[\"$\",\"$Lf\",null,{\"children\":\"$L10\"}],[\"$\",\"meta\",null,{\"name\":\"next-size-adjust\",\"content\":\"\"}]]}],null]}],false]],\"m\":\"$undefined\",\"G\":[\"$11\",\"$undefined\"],\"s\":false,\"S\":true}\n"])</script>
    <script>self.__next_f.push([1,"12:\"$Sreact.suspense\"\n13:I[4911,[],\"AsyncMetadata\"]\n6:{}\n7:{}\n9:[\"$\",\"$12\",null,{\"fallback\":null,\"children\":[\"$\",\"$L13\",null,{\"promise\":\"$@14\"}]}]\n"])</script><script>self.__next_f.push([1,"c:null\n"])</script><script>self.__next_f.push([1,"10:[[\"$\",\"meta\",\"0\",{\"charSet\":\"utf-8\"}],[\"$\",\"meta\",\"1\",{\"name\":\"viewport\",\"content\":\"width=device-width, initial-scale=1\"}]]\nb:null\n"])</script><script>self.__next_f.push([1,"14:{\"metadata\":[[\"$\",\"title\",\"0\",{\"children\":\"iSERV\"}],[\"$\",\"meta\",\"1\",{\"name\":\"description\",\"content\":\"Generated by Readdy\"}]],\"error\":null,\"digest\":\"$undefined\"}\ne:{\"metadata\":\"$14:metadata\",\"error\":null,\"digest\":\"$undefined\"}\n"])</script>
    
    <!-- Custom Navbar -->
    <?php echo child_theme_custom_footer(); ?>
    
</body>