<?php
/*
Template Name: Our Platform (AI)Page
*/
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Platform</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
        theme: {
            extend: {
            colors: {
                primary: "#0082C8",
                secondary: "#1a1a2e",
            },
            borderRadius: {
                none: "0px",
                sm: "4px",
                DEFAULT: "8px",
                md: "12px",
                lg: "16px",
                xl: "20px",
                "2xl": "24px",
                "3xl": "32px",
                full: "9999px",
                button: "8px",
            },
            },
        },
        };
    </script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    
    <!-- custom css -->
    <link rel="stylesheet" self="stylesheet" href="../css/ai-our-platform.css">

    <style>
        :where([class^="ri-"])::before {content: "\f3c2";}
        body {font-family: 'Noto Sans', sans-serif;}
        .text-cust-primary{color:#0082C8 !important;}
        .hero-bg {
            background: linear-gradient(
                135deg,
                rgba(26, 26, 46, 0.8) 0%,
                rgba(0, 130, 200, 0.3) 50%,
                rgba(255, 255, 255, 0.9) 100%
            );
        }

        .layer-card {
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .layer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 130, 200, 0.2);
        }

        .explore-card {
            transition: all 0.3s ease;
        }

        .explore-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .flow-line {
            background: linear-gradient(90deg, transparent 0%, #0082C8 50%, transparent 100%);
            animation: flow 3s linear infinite;
        }

        @keyframes flow {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #0082C8;
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0;
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 1;
            }
        }

        .theme-toggle {
            transition: all 0.3s ease;
        }

        .dark-theme {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: white;
        }

        .light-theme {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #1a1a2e;
        }
    </style>

</head>
<body class="font-['Noto Sans'] bg-white">
    
    <!-- Navigation -->
    <!-- <nav class="fixed top-0 w-full bg-white/90 backdrop-blur-md z-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <a href="https://ithena.ai" class="hover:opacity-90 transition-opacity">
            <img src="https://ithena.ai/wp-content/uploads/2023/03/Ithena-Logo.png" alt="Ithena Logo" class="h-10 w-auto">
            </a>
            <div class="flex items-center space-x-8">
                <a href="#about" class="text-gray-700 hover:text-cust-primary transition-colors">About Us</a>
                <a href="#contact" class="text-gray-700 hover:text-cust-primary transition-colors">Contact Us</a>
            </div>
        </div>
        </div>
    </nav> -->

    <!-- Custom Navbar -->
    <?php echo child_theme_custom_headmenu(); ?>

    <!-- Hero Section -->
    <section class="relative min-vh-100 flex items-center overflow-hidden mb-12" style="background-image: url('https://readdy.ai/api/search-image?query=modern%20futuristic%20technology%20interface%20with%20glowing%20blue%20circuits%20and%20neural%20networks%2C%20abstract%20digital%20landscape%20with%20flowing%20data%20streams%2C%20enterprise%20AI%20visualization%2C%20clean%20professional%20aesthetic%20with%20dark%20overlay%2C%20high%20contrast%20lighting%20effects%2C%20corporate%20technology%20concept&width=1920&height=1080&seq=hero002&orientation=landscape'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative z-10 w-full max-w-7xl mx-auto px-6">
        <div class="max-w-3xl">
            <h1 class="font-['Noto Sans'] text-[55px] md:text-[65px] font-bold mb-6 text-white">
                <span class="text-white">Human Intelligence</span><br>
                <span class="text-cust-primary">meets</span><br>
                <span class="text-white">Artificial Intelligence</span>
            </h1>
            <p class="font-['Noto Sans'] text-lg md:text-xl text-gray-100 mb-4 max-w-2xl">
                Build your smart connected enterprise with ITHENA's
            </p>
            <h2 class="font-['Noto Sans'] text-3xl md:text-4xl font-semibold text-cust-primary mb-6">
                Generative AI Persona Platform
            </h2>
            <p class="font-['Noto Sans'] text-base text-gray-200 max-w-xl">
                Engage in the best connected experience
            </p>
        </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <h2 class="font-['Noto Sans'] text-4xl font-bold text-gray-900 mb-6">
                    Next-Generation AI Platform
                </h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                    <div class="w-6 h-6 flex items-center justify-center bg-primary/10 rounded-full flex-shrink-0 mt-1">
                        <i class="ri-check-line text-cust-primary text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">User-Friendly & Ready-to-Use</h3>
                        <p class="text-gray-600">Generative AI that's intuitive and unified, designed for enterprise adoption without complex setup.</p>
                    </div>
                    </div>
                    <div class="flex items-start space-x-4">
                    <div class="w-6 h-6 flex items-center justify-center bg-primary/10 rounded-full flex-shrink-0 mt-1">
                        <i class="ri-time-line text-cust-primary text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Fast Results Within Weeks</h3>
                        <p class="text-gray-600">Accelerate your digital transformation with rapid deployment and immediate value realization.</p>
                    </div>
                    </div>
                    <div class="flex items-start space-x-4">
                    <div class="w-6 h-6 flex items-center justify-center bg-primary/10 rounded-full flex-shrink-0 mt-1">
                        <i class="ri-database-2-line text-cust-primary text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Complete Data Management</h3>
                        <p class="text-gray-600">Comprehensive data connectivity, collection, classification, and management in one platform.</p>
                    </div>
                    </div>
                    <div class="flex items-start space-x-4">
                    <div class="w-6 h-6 flex items-center justify-center bg-primary/10 rounded-full flex-shrink-0 mt-1">
                        <i class="ri-settings-3-line text-cust-primary text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Enterprise Use Cases</h3>
                        <p class="text-gray-600">Optimized for Production, Service, and Supply Chain operations across industries.</p>
                    </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="bg-gradient-to-br from-primary/5 to-blue-100 rounded-2xl p-8">
                    <img src="https://readdy.ai/api/search-image?query=modern%20enterprise%20dashboard%20interface%20showing%20AI%20analytics%2C%20data%20visualization%20charts%2C%20connected%20devices%20network%2C%20blue%20color%20scheme%2C%20clean%20professional%20design%2C%20futuristic%20technology%20interface%2C%20business%20intelligence%20platform%2C%20holographic%20data%20displays&width=600&height=400&seq=intro001&orientation=landscape"
                    alt="AI Platform Interface"
                    class="w-full h-auto rounded-lg shadow-lg object-cover">
                </div>
                <!-- Floating Stats -->
                <div class="absolute -top-4 -right-4 bg-white rounded-lg shadow-lg p-4 border border-gray-200">
                    <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    <span class="text-sm font-medium text-gray-900">99.9% Uptime</span>
                    </div>
                </div>
                <div class="absolute -bottom-4 -left-4 bg-white rounded-lg shadow-lg p-4 border border-gray-200">
                    <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-primary rounded-full"></div>
                    <span class="text-sm font-medium text-gray-900">Real-time Processing</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Platform Architecture -->
    <section id="platform" class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-8">
            <h2 class="font-['Noto Sans'] text-4xl font-bold text-gray-900 mb-4">Platform Architecture</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Four intelligent layers working together to deliver comprehensive AI-powered solutions</p>
        </div>
        <div class="space-y-8">
            
            <!-- Experience Layer -->
            <div class="layer-card bg-white rounded-2xl p-8 border border-gray-200 light-theme my-16">
                <div class="grid md:grid-cols-2 gap-16 items-center">
                    <div class="space-y-8">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 flex items-center justify-center bg-primary/10 rounded-xl">
                            <i class="ri-user-3-line text-cust-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-['Noto Sans'] text-2xl font-semibold text-gray-900">Experience Layer</h3>
                            <p class="text-gray-600">Role-centric application workflow</p>
                        </div>
                    </div>
                    <p class="text-gray-600 font-['Noto Sans'] leading-relaxed">One of the distinguishing features of the ITHENA platform is its persona or role-centricity. Driven by a combination of human and artificial intelligence, we provide analytical outcomes to the relevant persona—not just art-of-the-possible scenarios.</p>
                    <p class="text-gray-600 font-['Noto Sans'] leading-relaxed">Bringing in data across multiple domains including Complex Event Streams, Telemetry Data, Enterprise Systems of Record, and Big Data — our applications are designed to deliver the best user experience tailored specifically to each role.</p>
                    <p class="text-gray-600 font-['Noto Sans'] leading-relaxed">Experience Analytics are powered by actionable workflows, driven by machine-learned and artificially derived intelligence.</p>
                    </div>
                    <div class="flex items-center justify-center">
                    <img src="https://ithena.ai/wp-content/uploads/2023/09/Group-1014-1024x667.webp" 
                        alt="Experience Layer Visualization" class="w-full h-auto shadow-lg">
                    </div>
                </div>
            </div>

            <!-- Intelligent Processing Layer -->
            <div class="layer-card bg-secondary rounded-2xl p-8 border border-gray-200 dark-theme my-16">
                <div class="grid md:grid-cols-2 gap-16 items-center">
                    <div class="flex items-center justify-center">
                    <img src="https://ithena.ai/wp-content/uploads/2023/09/Group-1007-1024x578.webp" 
                        alt="Intelligent Processing Layer" class="w-full h-auto shadow-lg">
                    </div>
                    <div class="space-y-8">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 flex items-center justify-center bg-primary/10 rounded-xl">
                            <i class="ri-brain-line text-cust-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-['Noto Sans'] text-2xl font-semibold text-white">Intelligent Processing Layer</h3>
                            <p class="text-gray-300">Driven by Human & Artificial Intelligence</p>
                        </div>
                    </div>
                    <p class="text-gray-300 font-['Noto Sans'] leading-relaxed">The Intelligent Processing Layer (IPL) serves as the conduit between the varied data sources housed in the Data Layer.  This layer  enhances the value of data that is brought in through connected machines, TAGs, people and other sub-systems – for eventually providing to the Experience Layer for intelligent industrial outcomes.</p>
                    <p class="text-gray-300 font-['Noto Sans'] leading-relaxed">Driving transformational change to user behavior is only possible when the ability to access the data is incredibly easy. Behind the scenes, the IPL achieves this ease by modeling, aggregating, deriving, and correlating numerous factors of disparate data.</p>
                    <p class="text-gray-300 font-['Noto Sans'] leading-relaxed">One of the biggest differentiators in our approach is the co-relation of NORA – Non Obvious Relationship Attributes. ITHENA’s IPL derives intelligence beyond what’s provided by human interactions, especially when things are obvious.</p>
                    </div>
                </div>
            </div>

            <!-- Data Ingestion Layer -->
            <div class="layer-card bg-white rounded-2xl p-8 border border-gray-200 light-theme my-16">
                <div class="grid md:grid-cols-2 gap-16 items-center">
                    <div class="space-y-8">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 flex items-center justify-center bg-primary/10 rounded-xl">
                            <i class="ri-database-line text-cust-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-['Noto Sans'] text-2xl font-semibold text-gray-900">Data Ingestion Layer</h3>
                            <p class="text-gray-600">Velocity | Volume | Variety of Data in one place</p>
                        </div>
                    </div>
                    <p class="text-gray-600 font-['Noto Sans'] leading-relaxed">One of the key distinguishing features in the ITHENA platform is the persona or role centricity.  Driven by a combination of human and artificial intelligence, we provide Analytical outcomes to the relevant role, and not just the art-of-the-possible scenarios!</p>
                    <p class="text-gray-600 font-['Noto Sans'] leading-relaxed">Bringing in data across multiple domains including Complex Event Streams | Telemetry Data | Enterprise Systems of Records | Big Data – our applications bring the best user experience for THAT role.</p>
                    </div>
                    <div class="flex items-center justify-center">
                    <img src="https://ithena.ai/wp-content/uploads/2023/09/Data-Ingestion-Layer-1024x628.webp" 
                        alt="Data Ingestion Layer Visualization" class="w-full h-auto shadow-lg">
                    </div>
                </div>
            </div>

            <!-- Edge Connectivity Layer -->
            <div class="layer-card bg-secondary rounded-2xl p-8 border border-gray-200 dark-theme my-16">
                <div class="grid md:grid-cols-2 gap-16 items-center">
                    <div class="flex items-center justify-center">
                    <img src="https://ithena.ai/wp-content/uploads/2023/09/Group-1008-1024x705.webp" 
                        alt="Edge Connectivity Layer Visualization" class="w-full h-auto rounded-xl shadow-lg">
                    </div>
                    <div class="space-y-8">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 flex items-center justify-center bg-primary/10 rounded-xl">
                            <i class="ri-global-line text-cust-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-['Noto Sans'] text-2xl font-semibold text-white">Edge Connectivity Layer</h3>
                            <p class="text-gray-300">The perceptron layer!</p>
                        </div>
                    </div>
                    <p class="text-gray-300 font-['Noto Sans'] leading-relaxed">ITHENA’s Smart Insights platform empowers users to delve deep into understanding their workforce, processes, and content, thereby facilitating business transformation. Through this platform, you obtain a real-time glimpse into your process performance and the content that propels them.</p>
                    <p class="text-gray-300 font-['Noto Sans'] leading-relaxed">Consequently, this equips you to enhance customer experiences, fortify competitive standing, amplify visibility, and ensure compliance..</p>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>

    <!-- Explore Section -->
    <section id="solutions" class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-8">
        <h2 class="font-['Noto Sans'] text-4xl font-bold text-gray-900 mb-4">Explore</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">See how our solutions utilize the value of our platform</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
        <!-- Case Studies Card -->
        <div class="explore-card bg-white rounded-2xl p-6 border border-gray-200 shadow-lg">
            <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-2xl mb-4 mx-auto">
                <i class="ri-file-text-line text-cust-primary text-2xl"></i>
            </div>
            <h3 class="font-['Noto Sans'] text-2xl font-semibold text-gray-900 mb-3 text-center">Case Studies</h3>
            <p class="text-gray-600 mb-4 text-center">Discover real-world implementations across various technologies, industries, and use cases.</p>
            <div class="space-y-2">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-code-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">Technology Solutions</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-building-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">Industry Applications</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-briefcase-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">Business Solutions</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-focus-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">Use Case Examples</span>
                </div>
            </div>
        </div>
        <!-- Solutions Card -->
        <div class="explore-card bg-white rounded-2xl p-6 border border-gray-200 shadow-lg">
            <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-2xl mb-4 mx-auto">
                <i class="ri-settings-2-line text-cust-primary text-2xl"></i>
            </div>
            <h3 class="font-['Noto Sans'] text-2xl font-semibold text-gray-900 mb-3 text-center">Solutions</h3>
            <p class="text-gray-600 mb-4 text-center">Comprehensive solutions for modern enterprise operations and management.</p>
            <div class="space-y-2">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-dashboard-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">Shopfloor Management</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-charging-pile-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">Charging Infrastructure</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-battery-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">Energy Management</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-radar-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">Asset Tracking</span>
                </div>
            </div>
        </div>
        <!-- Services Card -->
        <div class="explore-card bg-white rounded-2xl p-6 border border-gray-200 shadow-lg">
            <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-2xl mb-4 mx-auto">
                <i class="ri-customer-service-line text-cust-primary text-2xl"></i>
            </div>
            <h3 class="font-['Noto Sans'] text-2xl font-semibold text-gray-900 mb-3 text-center">Services</h3>
            <p class="text-gray-600 mb-4 text-center">Expert services to accelerate your digital transformation journey.</p>
            <div class="space-y-2">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-base-station-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">IoT Implementation</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-database-2-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">Big Data Analytics</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-brain-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">AI/ML Development</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-flask-line text-cust-primary"></i>
                    </div>
                    <span class="text-sm text-gray-700">Data Science Consulting</span>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Custom Navbar -->
    <?php echo child_theme_custom_footer(); ?>

    <script id="smooth-scroll">
        document.addEventListener("DOMContentLoaded", function () {
        const links = document.querySelectorAll('a[href^="#"]');
        links.forEach((link) => {
            link.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                behavior: "smooth",
                block: "start",
                });
            }
            });
        });
        });
    </script>
    
    <script id="scroll-animations">
        document.addEventListener("DOMContentLoaded", function () {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: "0px 0px -50px 0px",
        };
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
            }
            });
        }, observerOptions);
        const animatedElements = document.querySelectorAll(
            ".layer-card, .explore-card",
        );
        animatedElements.forEach((el) => {
            el.style.opacity = "0";
            el.style.transform = "translateY(30px)";
            el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
            observer.observe(el);
        });
        });
    </script>

</body>