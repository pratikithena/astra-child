<?php
    /*
    Template Name: iSAT (AI)Page
    */
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Asset Tracking (iSAT) - ITHENA</title>
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
                        secondary: '#1E40AF'
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
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        :root{
            --color-black: #000;
            --color-white: #fff;
            --color-blue: #0082c8;
            --color-blue-dark: #005b94;
            --color-gray: #515962;
            --color-red: #c00000;
            --color-cyan-bluish-gray: #abb8c3;

            /* aliases for convenience */
            --cust-primary: var(--color-blue);
            --cust-secondary: var(--color-blue-dark);
            --cust-gray: var(--color-gray);
        }
        :where([class^="ri-"])::before { content: "\f3c2"; }

        /* Soft gradient blend: white → cyan-bluish-gray */
        .blend-whitetogray {
            background: linear-gradient(
                to bottom,
                #ffffffff 0%,   /* solid white */
                #ffffffe6 20%,  /* slightly transparent white */
                #abb8c333 80%,  /* faint gray tint */
                #abb8c3ff 100%  /* solid cyan-bluish-gray */
            );
            height: 120px; /* adjust for smoother transition */
            width: 100%;
        }

        /* Reverse blend: cyan-bluish-gray → white */
        .blend-graytowhite {
            background: linear-gradient(
                to bottom,
                #abb8c3ff 0%,   /* solid cyan-bluish-gray */
                #abb8c3cc 30%,  /* lighter gray */
                #ffffff4d 80%,  /* near-white tint */
                #ffffffff 100%  /* solid white */
            );
            height: 120px;
            width: 100%;
        }

        .blend-whitetogray,
        .blend-graytowhite {
            filter: blur(0.5px);
        }

        /* overlay should be semi-transparent black */
        .custom-slider-overlay {
            background-color: rgba(0, 0, 0, 0.45);
        }

        /* use CSS variables with var() */
        .bg-cust-primary { background-color: var(--cust-primary); }
        .bg-cust-primary { background-color: var(--cust-primary); }
        .bg-darkgray { background-color: var(--color-gray); }
        .bg-cyan-bluish-gray { background-color: var(--color-cyan-bluish-gray); }
        .border-custprimary { border-color: var(--cust-primary); }
        .text-cust-primary { color: var(--cust-primary); }
        .customer-card-bg { background-color: var(--color-blue-dark); }

        /* ensure images cover their area */
        .customer-img {
            width: 100%;
            height: 40%;
            object-fit: cover;
        }

        .feature-card {
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.15);
        }
        .feature-card:hover .feature-glow {
            opacity: 1;
        }
        .feature-glow {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(59, 130, 246, 0.02));
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
    </style>
    
</head>

<div class="main-section bg-gray-50">

    <!-- Custom Navbar -->
    <?php echo child_theme_custom_headmenu(); ?>

    <!-- Hero Section -->
    <section class="relative min-h-screen w-full overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/80 z-10"></div>
        <div class="absolute inset-0" style="background-image: url('https://readdy.ai/api/search-image?query=Modern%20fleet%20of%20commercial%20vehicles%20trucks%20and%20delivery%20vans%20parked%20in%20organized%20rows%20at%20a%20logistics%20facility%20during%20golden%20hour%20with%20clean%20industrial%20background%20and%20professional%20lighting%20showcasing%20transportation%20and%20logistics%20industry&width=1920&height=1080&seq=hero-fleet&orientation=landscape'); background-size: cover; background-position: center;"></div>
        <div class="relative z-20 w-full min-h-screen flex items-center">
            <div class="w-full max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h1 class="text-5xl lg:text-7xl font-bold text-white mb-4 leading-tight">
                            Smart Asset<br>Tracking
                        </h1>
                        <p class="text-2xl lg:text-3xl text-gray-300 font-light">iSAT</p>
                        <p class="text-lg text-gray-200 mt-6 max-w-lg">
                            Advanced real-time tracking solutions for your valuable business assets with precision and reliability.
                        </p>
                    </div>
                    <div class="hidden lg:flex items-center justify-center">
                        <div class="w-32 h-32 flex items-center justify-center text-white/80">
                            <i class="ri-map-pin-2-line ri-8x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="bg-white py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Asset Tracking</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Get real-time location information for your valuable business assets, on-site consignments, and warehouse inventory. Get both indoor and outdoor monitoring with ITHENA Asset Tracking.
                    </p>
                </div>
                <div class="relative">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="https://readdy.ai/api/search-image?query=Modern%20smart%20city%20skyline%20with%20digital%20tracking%20overlay%20icons%20and%20GPS%20markers%20floating%20above%20buildings%20showing%20connected%20IoT%20devices%20and%20asset%20tracking%20technology%20with%20clean%20futuristic%20aesthetic%20and%20blue%20accent%20lighting&width=600&height=400&seq=city-tracking&orientation=landscape"
                            alt="City tracking visualization"
                            class="w-full h-80 object-cover object-top">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-cust-primary/90 rounded-full flex items-center justify-center animate-pulse">
                                <i class="ri-radar-line ri-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Benefits Section -->
    <section class="bg-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Benefits</h2>
                <p class="text-xl text-gray-600">Track, trace, and be assured of your asset safety with ITHENA Asset Tracking.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center bg-white p-8 rounded-xl shadow-sm">
                    <div class="w-20 h-20 bg-cust-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ri-radar-line ri-3x text-white"></i>
                    </div>
                    <!-- <h3 class="text-3xl font-bold text-white mb-2">100%</h3> -->
                    <div class="counter text-4xl font-bold mb-2" data-target="250">0</div>
                    <p class="text-gray-700">Tracking Accuracy</p>
                </div>
                <div class="text-center bg-white p-8 rounded-xl shadow-sm">
                    <div class="w-20 h-20 bg-cust-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ri-settings-3-line ri-3x text-white"></i>
                    </div>
                    <!-- <h3 class="text-3xl font-bold text-white mb-2">30%</h3> -->
                    <div class="counter text-4xl font-bold mb-2" data-target="30">0</div>
                    <p class="text-gray-700">Increase in Maintenance Productivity</p>
                </div>
                <div class="text-center bg-white p-8 rounded-xl shadow-sm">
                    <div class="w-20 h-20 bg-cust-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ri-bar-chart-line ri-3x text-white"></i>
                    </div>
                    <!-- <h3 class="text-3xl font-bold text-white mb-2">45%</h3> -->
                    <div class="counter text-4xl font-bold mb-2" data-target="45">0</div>
                    <p class="text-gray-700">Increase in Asset Utilization</p>
                </div>
            </div>
        </div>
        <!-- Extended Benefits List -->
        <div class="max-w-7xl mx-auto px-6 lg:px-8 mt-8">
            <div class="text-center">
                <p class="text-xl mb-8">
                    ITHENA's Asset Tracking helps track asset movement and provides the following benefits:
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="space-y-4">
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Extended asset lifetime</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Reduced maintenance expenses</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Streamlined audits and operations</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Real-time asset management</span>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Scheduling & tracking maintenance</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Increased productivity</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Enhanced asset recovery with GPS</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Improved customer service</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section - blue and white -->
    <section class="bg-white py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-cust-primary mb-4">Benefits</h2>
                <p class="text-xl text-gray-600">Track, trace, and be assured of your asset safety with ITHENA Asset Tracking.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center bg-cust-primary p-8 rounded-xl shadow-sm">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ri-radar-line ri-3x"></i>
                    </div>
                    <!-- <h3 class="text-3xl font-bold text-white mb-2">100%</h3> -->
                    <div class="counter text-4xl font-bold text-white mb-2" data-target="250">0</div>
                    <p class="text-white">Tracking Accuracy</p>
                </div>
                <div class="text-center bg-cust-primary p-8 rounded-xl shadow-sm">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ri-settings-3-line ri-3x"></i>
                    </div>
                    <!-- <h3 class="text-3xl font-bold text-white mb-2">30%</h3> -->
                    <div class="counter text-4xl font-bold text-white mb-2" data-target="30">0</div>
                    <p class="text-white">Increase in Maintenance Productivity</p>
                </div>
                <div class="text-center bg-cust-primary p-8 rounded-xl shadow-sm">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ri-bar-chart-line ri-3x"></i>
                    </div>
                    <!-- <h3 class="text-3xl font-bold text-white mb-2">45%</h3> -->
                    <div class="counter text-4xl font-bold text-white mb-2" data-target="45">0</div>
                    <p class="text-white">Increase in Asset Utilization</p>
                </div>
            </div>
        </div>
        <!-- Extended Benefits List -->
        <div class="max-w-7xl mx-auto px-6 lg:px-8 mt-8">
            <div class="text-center">
                <p class="text-xl mb-8">
                    ITHENA's Asset Tracking helps track asset movement and provides the following benefits:
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="space-y-4">
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Extended asset lifetime</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Reduced maintenance expenses</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Streamlined audits and operations</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Real-time asset management</span>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Scheduling & tracking maintenance</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Increased productivity</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Enhanced asset recovery with GPS</span>
                    </div>
                    <div class="flex items-center text-gray-700">
                        <div class="w-2 h-2 bg-cust-primary rounded-full mr-4"></div>
                        <span>Improved customer service</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Solution Drivers Section -->
    <section class="bg-gray-50 py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Solution Drivers</h2>
                <p class="text-xl text-gray-600">For a safer, secure, and brighter community.</p>
            </div>
            <div class="flex justify-center items-center gap-12 lg:gap-20">
                <div class="technology-icon group cursor-pointer">
                    <div class="w-20 h-20 border-2 border-gray-300 rounded-full flex items-center justify-center group-hover:border-custprimary group-hover:shadow-lg group-hover:shadow-primary/20 transition-all duration-300 bg-white">
                        <i class="ri-gps-line ri-3x text-cust-primary"></i>
                    </div>
                    <p class="text-gray-700 text-center mt-4 font-medium">GPS</p>
                </div>
                <div class="technology-icon group cursor-pointer">
                    <div class="w-20 h-20 border-2 border-gray-300 rounded-full flex items-center justify-center group-hover:border-custprimary group-hover:shadow-lg group-hover:shadow-primary/20 transition-all duration-300 bg-white">
                        <i class="ri-rfid-line ri-3x text-cust-primary"></i>
                    </div>
                    <p class="text-gray-700 text-center mt-4 font-medium">RFID</p>
                </div>
                <div class="technology-icon group cursor-pointer">
                    <div class="w-20 h-20 border-2 border-gray-300 rounded-full flex items-center justify-center group-hover:border-custprimary group-hover:shadow-lg group-hover:shadow-primary/20 transition-all duration-300 bg-white">
                        <i class="ri-nfc-line ri-3x text-cust-primary"></i>
                    </div>
                    <p class="text-gray-700 text-center mt-4 font-medium">NFC</p>
                </div>
                <div class="technology-icon group cursor-pointer">
                    <div class="w-20 h-20 border-2 border-gray-300 rounded-full flex items-center justify-center group-hover:border-custprimary group-hover:shadow-lg group-hover:shadow-primary/20 transition-all duration-300 bg-white">
                        <i class="ri-bluetooth-line ri-3x text-cust-primary"></i>
                    </div>
                    <p class="text-gray-700 text-center mt-4 font-medium">Bluetooth</p>
                </div>
                <div class="technology-icon group cursor-pointer">
                    <div class="w-20 h-20 border-2 border-gray-300 rounded-full flex items-center justify-center group-hover:border-custprimary group-hover:shadow-lg group-hover:shadow-primary/20 transition-all duration-300 bg-white">
                        <i class="ri-wireless-charging-line ri-3x text-cust-primary"></i>
                    </div>
                    <p class="text-gray-700 text-center mt-4 font-medium">LoRa</p>
                </div>
            </div>
        </div>
    </section>
   
    <!-- Features Section -->
    <section class="bg-white py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Features</h2>
                <p class="text-xl text-gray-600">Along with accurate asset tracking and monitoring, you also get personalized features.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="feature-card relative p-8 rounded-xl cursor-pointer bg-gray-50 border-2 border-custprimary hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="feature-glow"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-cust-primary rounded-full flex items-center justify-center mb-6">
                            <i class="ri-settings-4-line ri-3x text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Device Management</h3>
                        <p class="text-gray-600">Manage devices and profiles easily with intuitive controls and streamlined workflows.</p>
                    </div>
                </div>
                <div class="feature-card relative p-8 rounded-xl cursor-pointer bg-gray-50 border-2 border-custprimary hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="feature-glow"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-cust-primary rounded-full flex items-center justify-center mb-6">
                            <i class="ri-car-line ri-3x text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Tracking on Wheels</h3>
                        <p class="text-gray-600">Real-time vehicle tracking with geofencing alerts for complete fleet visibility.</p>
                    </div>
                </div>
                <div class="feature-card relative p-8 rounded-xl cursor-pointer bg-gray-50 border-2 border-custprimary hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="feature-glow"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-cust-primary rounded-full flex items-center justify-center mb-6">
                            <i class="ri-pulse-line ri-3x text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Condition Monitoring</h3>
                        <p class="text-gray-600">Detect problems before they occur with advanced predictive analytics.</p>
                    </div>
                </div>
                <div class="feature-card relative p-8 rounded-xl cursor-pointer bg-gray-50 border-2 border-custprimary hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="feature-glow"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-cust-primary rounded-full flex items-center justify-center mb-6">
                            <i class="ri-alarm-warning-line ri-3x text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Alarms & Alerts</h3>
                        <p class="text-gray-600">SMS or email notifications for misplaced assets with customizable alert parameters.</p>
                    </div>
                </div>
                <div class="feature-card relative p-8 rounded-xl cursor-pointer bg-gray-50 border-2 border-custprimary hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="feature-glow"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-cust-primary rounded-full flex items-center justify-center mb-6">
                            <i class="ri-global-line ri-3x text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Real-time Tracking</h3>
                        <p class="text-gray-600">Live location and monitoring from anywhere with 24/7 accessibility.</p>
                    </div>
                </div>
                <div class="feature-card relative p-8 rounded-xl cursor-pointer bg-gray-50 border-2 border-custprimary hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="feature-glow"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-cust-primary rounded-full flex items-center justify-center mb-6">
                            <i class="ri-dashboard-3-line ri-3x text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Smart Dashboards</h3>
                        <p class="text-gray-600">Workflow-driven analytics with customizable views and reporting capabilities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Industries Solutions Section -->
    <section class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">ITHENA’s Asset Tracking</h2>
                    <p class="text-lg text-gray-600 mb-8">Monitor, manage, and optimize asset movement with real-time visibility. ITHENA’s Asset Tracking solution enhances productivity, minimizes maintenance costs, and ensures seamless operational efficiency!</p>
                    <button class="!rounded-button bg-cust-primary px-8 py-3 text-lg text-white">CTA Button</button>
                </div>
                <!-- Right Grid -->
                <div class="grid grid-cols-2 gap-8">
                    <div class="text-center">
                        <div class="mb-4">
                            <img src="https://readdy.ai/api/search-image?query=Precision%20scheduling%20calendar%20icon%20with%20automated%20workflow%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution2&orientation=squarish" alt="Accurate Scheduling" class="w-16 h-16 mx-auto">                            
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Smarter Maintenance Scheduling</h3>
                        <p class="text-gray-600 text-sm">Automate and track maintenance tasks efficiently, improving uptime and ensuring continuous performance.</p>
                    </div>
                    <div class="text-center">
                        <div class="mb-4">
                            <img src="https://readdy.ai/api/search-image?query=Digital%20analytics%20dashboard%20icon%20with%20trending%20charts%20and%20growth%20metrics%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution1&orientation=squarish" alt="Reduced Response Times" class="w-16 h-16 mx-auto">
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Enhanced Operational Control</h3>
                        <p class="text-gray-600 text-sm">Gain real-time insights into asset location, movement, and utilization for streamlined daily operations.</p>
                    </div>
                    <div class="text-center">
                        <div class="mb-4">
                            <img src="https://readdy.ai/api/search-image?query=Centralized%20platform%20hub%20icon%20with%20connected%20data%20nodes%20and%20integration%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution3&orientation=squarish" alt="Single Centralized Platform" class="w-16 h-16 mx-auto">
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Single Centralized Platform</h3>
                        <p class="text-gray-600 text-sm">Our platform can integrate with other enterprise systems, such as ERP systems, to ensure seamless data flow between different parts of the organization.</p>
                    </div>
                    <div class="text-center">
                        <div class="mb-4">
                            <img src="https://readdy.ai/api/search-image?query=Operations%20integration%20icon%20with%20synchronized%20gears%20and%20data%20exchange%20symbols%20in%20modern%20blue%20and%20teal%20color%20scheme%20on%20clean%20white%20background&width=80&height=80&seq=solution4&orientation=squarish" alt="Integrated with Operations" class="w-16 h-16 mx-auto">
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Improved Productivity & Service</h3>
                        <p class="text-gray-600 text-sm">Boost workforce efficiency and customer satisfaction with faster response times and accurate asset data!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Platform Overview Section -->
    <!-- <section class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="content-2-cards">
                <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Section Title</h2>
                <div class="grid lg:grid-cols-2 gap-16 items-start">
                    <div class="space-y-8 cards">
                        <div class="bg-gray-50 p-8 rounded-2xl text-center border border-gray-200 hover:shadow-lg transition-shadow">
                            <div class="relative h-48 overflow-hidden">
                                <img src="https://readdy.ai/api/search-image?query=Modern%20medical%20laboratory%20with%20advanced%20equipment%20monitoring%20systems%20digital%20displays%20showing%20asset%20tracking%20technology%20clean%20sterile%20environment%20with%20medical%20devices%20and%20compliance%20monitoring%20screens%20professional%20healthcare%20setting&width=400&height=300&seq=medical-lab&orientation=landscape"
                                    alt="Medical Labs & Hospitals"
                                    class="w-full h-full object-cover object-top">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                            <h3 class="font-semibold m-4 text-gray-900 text-xl">Block Title 1</h3>
                            <p class="text-gray-600">Seamlessly connects with LinkedIn, Google, Facebook, and other major social platforms</p>
                        </div>
                        <div class="bg-gray-50 p-8 rounded-2xl text-center border border-gray-200 hover:shadow-lg transition-shadow">
                            <div class="relative h-48 overflow-hidden">
                                <img src="https://readdy.ai/api/search-image?query=Modern%20medical%20laboratory%20with%20advanced%20equipment%20monitoring%20systems%20digital%20displays%20showing%20asset%20tracking%20technology%20clean%20sterile%20environment%20with%20medical%20devices%20and%20compliance%20monitoring%20screens%20professional%20healthcare%20setting&width=400&height=300&seq=medical-lab&orientation=landscape"
                                    alt="Medical Labs & Hospitals"
                                    class="w-full h-full object-cover object-top">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                            <h3 class="font-semibold m-4 text-gray-900 text-xl">Block Title 1</h3>
                            <p class="text-gray-600">Advanced AI middleware processes complex event streams in real-time</p>
                        </div>
                    </div>
                    <div class="text-content">
                        <p class="text-xl text-gray-700 leading-relaxed mb-8">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

     <!-- Case Studies Section -->
    <section class="py-10 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Discover iSAT Success Stories</h2>
                <p class="text-xl text-gray-600">Real results from industry leaders who trust iSAT</p>
            </div>
            <div class="relative">
                <div class="bg-gray-50 border-2 border-custprimary lg:p-10 p-8 rounded-lg hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="flex lg:flex-row items-center gap-10">
                    <div class="lg:w-1/2">
                        <div class="mb-6">
                            <h3 class="text-2xl font-semibold mb-4">Story Title</h3>
                            <p class="text-xl leading-relaxed mb-4" style="font-size:16px">
                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            <div class="text-cust-primary mb-2"><span class="text-4xl font-bold">18%</span><span class="text-xl italic ml-2">enhanced efficiency</span></div>
                        </div>
                        <!-- <div class="flex space-x-4"><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-white transition-colors cursor-pointer"><i class="ri-arrow-left-line text-xl"></i></button><button class="w-12 h-12 bg-[#0082C8] hover:bg-blue-700 rounded-full flex items-center justify-center text-white transition-colors cursor-pointer"><i class="ri-arrow-right-line text-xl"></i></button></div> -->
                    </div>
                    <div class="lg:w-1/2">
                        <img src="https://readdy.ai/api/search-image?query=Modern%20industrial%20metal%20forging%20facility%20with%20advanced%20machinery%20and%20equipment%2C%20real-time%20monitoring%20dashboards%20displaying%20equipment%20parameters%20and%20performance%20metrics%2C%20professional%20manufacturing%20environment%20with%20digital%20displays%2C%20predictive%20maintenance%20interface%2C%20transparent%20background%2C%20no%20background%2C%20clean%20cutout%20style%2C%20industrial%20blue%20color%20scheme%2C%20no%20white%20background%2C%20clean%20transparent%20cutout&amp;width=350&amp;height=250&amp;seq=testimonial1_forging_transparent&amp;orientation=landscape" 
                            alt="Deploying ITHENAs iSERV to enhance operations at the leading metal-forming and forging company Dashboard" class="w-full h-auto rounded-lg shadow-xl object-cover"/></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Applications Section -->
    <section class="bg-gray-50 py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Applications – Inbound & Outbound Tracking</h2>
                <p class="text-xl text-gray-600">Get value from both indoor and outdoor tracking.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
                <div class="application-card border-2 border-custprimary bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=Modern%20medical%20laboratory%20with%20advanced%20equipment%20monitoring%20systems%20digital%20displays%20showing%20asset%20tracking%20technology%20clean%20sterile%20environment%20with%20medical%20devices%20and%20compliance%20monitoring%20screens%20professional%20healthcare%20setting&width=400&height=300&seq=medical-lab&orientation=landscape"
                            alt="Medical Labs & Hospitals"
                            class="w-full h-full object-cover object-top">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Medical Labs & Hospitals</h3>
                        <p class="text-gray-600">For asset compliance and traceability with comprehensive monitoring of critical medical equipment and inventory.</p>
                    </div>
                </div>  
                <div class="application-card border-2 border-custprimary bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=Modern%20warehouse%20interior%20with%20organized%20shelving%20systems%20digital%20asset%20tracking%20displays%20automated%20inventory%20management%20technology%20clean%20industrial%20environment%20with%20tracking%20sensors%20and%20optimization%20screens&width=400&height=300&seq=warehouse&orientation=landscape"
                            alt="Warehouse and Storerooms"
                            class="w-full h-full object-cover object-top">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Warehouse and Storerooms</h3>
                        <p class="text-gray-600">For optimising asset use and reducing errors through intelligent inventory tracking and management systems.</p>
                    </div>
                </div>
                <div class="application-card border-2 border-custprimary bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=Refrigerated%20truck%20with%20advanced%20monitoring%20dashboard%20showing%20temperature%20tracking%20systems%20GPS%20location%20real-time%20data%20displays%20cold%20chain%20logistics%20technology%20professional%20transportation%20setting%20with%20tracking%20interfaces&width=400&height=300&seq=reefer-truck&orientation=landscape"
                            alt="Reefer Truck Tracking"
                            class="w-full h-full object-cover object-top">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Reefer Truck Tracking</h3>
                        <p class="text-gray-600">For real-time monitoring of refrigerated trucks ensuring temperature compliance and cargo safety throughout delivery.</p>
                    </div>
                </div>
                <div class="application-card border-2 border-custprimary bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=Commercial%20delivery%20truck%20on%20highway%20with%20GPS%20tracking%20interface%20overlay%20showing%20real-time%20location%20monitoring%20system%20and%20route%20optimization%20technology%20modern%20fleet%20management%20dashboard%20with%20navigation%20markers&width=400&height=300&seq=tracking-wheels&orientation=landscape"
                            alt="Tracking On Wheels"
                            class="w-full h-full object-cover object-top">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Tracking On Wheels</h3>
                        <p class="text-gray-600">GPS integration which allows us to locate asset carrying vehicles on the road so that they can be tracked and traced.</p>
                    </div>
                </div>
                <div class="application-card border-2 border-custprimary bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://readdy.ai/api/search-image?query=Armored%20bank%20security%20truck%20interior%20with%20high-tech%20asset%20tracking%20monitoring%20systems%20displaying%20cargo%20surveillance%20screens%20and%20secure%20transport%20technology%20professional%20security%20vehicle%20with%20digital%20tracking%20interfaces&width=400&height=300&seq=truck-interior&orientation=landscape"
                            alt="Asset Tracking Inside Truck"
                            class="w-full h-full object-cover object-top">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Asset Tracking Inside Truck</h3>
                        <p class="text-gray-600">Track your valuable assets inside the trucks; Example - Bank vehicles can use this solution for security purposes when delivering hard currency.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script id="hero-animations">
        document.addEventListener('DOMContentLoaded', function() {
        const heroTitle = document.querySelector('h1');
        const heroSubtitle = document.querySelector('h1').nextElementSibling;
        setTimeout(() => {
        heroTitle.style.opacity = '1';
        heroTitle.style.transform = 'translateY(0)';
        }, 500);
        setTimeout(() => {
        heroSubtitle.style.opacity = '1';
        heroSubtitle.style.transform = 'translateY(0)';
        }, 800);
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
                        counter.textContent = Math.floor(current) + '%';
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

    <script id="technology-hover-effects">
        document.addEventListener('DOMContentLoaded', function() {
        const techIcons = document.querySelectorAll('.technology-icon');
        techIcons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.1)';
        });
        icon.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1)';
        });
        });
        });
    </script>

    <script id="feature-card-animations">
        document.addEventListener('DOMContentLoaded', function() {
        const featureCards = document.querySelectorAll('.feature-card');
        featureCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        setTimeout(() => {
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
        card.style.transition = 'all 0.6s ease';
        }, index * 200);
        });
        });
    </script>

    <!-- Custom Navbar -->
    <?php echo child_theme_custom_footer(); ?>

</div>