<?php
    /*
    Template Name: iSIP (AI)Page
    */
?>
    
<head>
    <!-- <script src="https://static.readdy.ai/static/e.js"></script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Intelligence Platform (ISIP)</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#64748b'
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
        };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" rel="stylesheet">
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }
        body {
            font-family: 'Nato sans', sans-serif;
        }
        .bg-cust-primary{background-color: #0082C8;}
        .text-cust-primary{color: #0082C8;}
    </style>
</head>

<div class=" main section bg-white text-gray-900">
    
    <!-- Custom Navbar -->
    <?php echo child_theme_custom_headmenu(); ?>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url('https://static.readdy.ai/image/22fa5f9b56e5334603175d1ade65fd69/2f03bdd9264ff36ab8371751d08624ca.png');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-5xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                    Transform Data into<br>
                    <span class="text-cust-primary">Social Intelligence</span>
                </h1>
                <p class="text-xl lg:text-2xl text-gray-200 mb-12 max-w-4xl mx-auto leading-relaxed">
                    Drive innovation, understand customer patterns, and empower your teams with a unified social intelligence platform.
                </p>
            </div>
        </div>
    </section>

    <!-- Platform Overview Section -->
    <section class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Meet ITHENA's Social Intelligence Platform (iSIP)</h2>
                <div class="grid lg:grid-cols-2 gap-16 items-start">
                    <div>
                        <p class="text-xl text-gray-700 leading-relaxed mb-8">
                            ITHENA's Social Intelligence Platform (iSIP) is an AI-powered middleware application that interacts with social media platforms such as LinkedIn, Google, Facebook, and others.
                        </p>
                        <p class="text-xl text-gray-700 leading-relaxed mb-8">
                            It acts as a bridge between the backend and front end and helps in connecting different applications seamlessly, despite their heterogeneous nature. Essentially functioning as a hidden translation layer, the middleware ingests complex event streams of customer signals every sub-second and enables communication and data management for distributed applications.
                        </p>
                        <p class="text-xl text-gray-700 leading-relaxed mb-8">
                            iSIP provides an intuitive, self-explanatory user interface that helps organisations understand insights from their data, give further details on the root cause of sentiments on their social interactions, and provide an Agentic AI experience with actionable next steps for positive customer engagement.
                        </p>
                        <p class="text-xl text-gray-700 leading-relaxed">
                            Data from these sources is further used by organizations to analyze and generate business insights.
                        </p>
                    </div>
                    <div class="space-y-8">
                        <div class="bg-gray-50 p-8 rounded-2xl text-center">
                            <div class="w-16 h-16 mx-auto mb-6 bg-blue-100 rounded-2xl flex items-center justify-center">
                                <i class="ri-share-line ri-2x text-cust-primary"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Multi-Platform Integration</h3>
                            <p class="text-gray-600">Seamlessly connects with LinkedIn, Google, Facebook, and other major social platforms</p>
                        </div>
                        <div class="bg-gray-50 p-8 rounded-2xl text-center">
                            <div class="w-16 h-16 mx-auto mb-6 bg-green-100 rounded-2xl flex items-center justify-center">
                                <i class="ri-cpu-line ri-2x text-green-600"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">AI-Powered Processing</h3>
                            <p class="text-gray-600">Advanced AI middleware processes complex event streams in real-time</p>
                        </div>
                        <div class="bg-gray-50 p-8 rounded-2xl text-center">
                            <div class="w-16 h-16 mx-auto mb-6 bg-purple-100 rounded-2xl flex items-center justify-center">
                                <i class="ri-flashlight-line ri-2x text-purple-600"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Sub-Second Analysis</h3>
                            <p class="text-gray-600">Ingests and analyzes customer signals every sub-second for instant insights</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Powerful Features</h2>
                <p class="text-xl text-gray-600">Everything you need to transform your social intelligence</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-6 bg-cust-primary bg-opacity-10 rounded-2xl flex items-center justify-center group-hover:bg-opacity-20 transition-colors">
                        <i class="ri-global-line ri-3x text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Web Data Integration</h3>
                    <p class="text-gray-600">Seamlessly integrate data from multiple web sources and social platforms</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-6 bg-cust-primary bg-opacity-10 rounded-2xl flex items-center justify-center group-hover:bg-opacity-20 transition-colors">
                        <i class="ri-palette-line ri-3x text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Data Designer</h3>
                    <p class="text-gray-600">Intuitive interface for designing and customizing data workflows</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-6 bg-cust-primary bg-opacity-10 rounded-2xl flex items-center justify-center group-hover:bg-opacity-20 transition-colors">
                        <i class="ri-settings-3-line ri-3x text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Job Config & Runner</h3>
                    <p class="text-gray-600">Configure and execute automated data processing jobs efficiently</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-6 bg-cust-primary bg-opacity-10 rounded-2xl flex items-center justify-center group-hover:bg-opacity-20 transition-colors">
                        <i class="ri-team-line ri-3x text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">User Management</h3>
                    <p class="text-gray-600">Comprehensive user access control and permission management</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-6 bg-cust-primary bg-opacity-10 rounded-2xl flex items-center justify-center group-hover:bg-opacity-20 transition-colors">
                        <i class="ri-database-2-line ri-3x text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Standardised Data</h3>
                    <p class="text-gray-600">Unified data formats and structures across all integrated platforms</p>
                </div>
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto mb-6 bg-cust-primary bg-opacity-10 rounded-2xl flex items-center justify-center group-hover:bg-opacity-20 transition-colors">
                        <i class="ri-apps-2-line ri-3x text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Global Web Application</h3>
                    <p class="text-gray-600">Access your social intelligence platform from anywhere globally</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Customers Say Section -->
    <section class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Customers Say</h2>
                <p class="text-xl text-gray-600">See what industry leaders have to say about our platform</p>
            </div>
            
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-10">
                <div class="grid md:grid-cols-3 gap-12">
                    <div class="text-center group">
                        <div class="w-16 h-16 mx-auto mb-6 bg-cust-primary rounded-2xl flex items-center justify-center transition-colors">
                            <i class="ri-sound-module-line ri-2x text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Automated Insights</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Get AI-generated, audio and data insights on your brand's social and societal impact with real-time analysis and predictive modeling.
                        </p>
                    </div>
                    <div class="text-center group">
                        <div class="w-16 h-16 mx-auto mb-6 bg-cust-primary rounded-2xl flex items-center justify-center transition-colors">
                            <i class="ri-search-2-line ri-2x text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Deep Dive Analytics</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Click down to the next level of data. Understand social initiatives and energy across global markets with comprehensive reporting tools.
                        </p>
                    </div>
                    <div class="text-center group">
                        <div class="w-16 h-16 mx-auto mb-6 bg-cust-primary rounded-2xl flex items-center justify-center transition-colors">
                            <i class="ri-rocket-line ri-2x text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Agent-Driven Actions</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Take actionable steps recommended by our AI agents to achieve your career and business development goals with strategic precision.
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-10">
                <div class="bg-gray-50 p-8 rounded-2xl">
                    <div class="flex items-center mb-6">
                        <img src="https://readdy.ai/api/search-image?query=professional%20business%20woman%20headshot%20portrait%2C%20confident%20smile%2C%20modern%20corporate%20attire%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&width=80&height=80&seq=customer-001&orientation=squarish" alt="Sarah Johnson" class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Product Management, DJ</h4>
                            <!-- <p class="text-sm text-gray-600">Product Management, DJ</p> -->
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        "The easiest tool in the market to help determine our current social listening score, our competitive advantage, detailed intel on how we can improve our Customer Experience | Social Reach | Product Innovation to improve overall brand."
                    </p>
                </div>
                <div class="bg-gray-50 p-8 rounded-2xl">
                    <div class="flex items-center mb-6">
                        <img src="https://readdy.ai/api/search-image?query=professional%20business%20man%20headshot%20portrait%2C%20confident%20expression%2C%20modern%20suit%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&width=80&height=80&seq=customer-002&orientation=squarish" alt="Michael Chen" class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">VP Marketing</h4>
                            <!-- <p class="text-sm text-gray-600">Data Director, InnovateLabs</p> -->
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        "We had several members in the marketing team working on analytics from campaigns and our outreach. Now we have half a person 🙂 and iSIP."
                    </p>
                </div>
                <div class="bg-gray-50 p-8 rounded-2xl">
                    <div class="flex items-center mb-6">
                        <img src="https://readdy.ai/api/search-image?query=professional%20business%20woman%20headshot%20portrait%2C%20friendly%20smile%2C%20corporate%20blazer%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&width=80&height=80&seq=customer-003&orientation=squarish" alt="Emily Rodriguez" class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900"> Marketing Analyst, Management, Mary L</h4>
                            <!-- <p class="text-sm text-gray-600">VP of Strategy, GlobalBrand Inc.</p> -->
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        "We spent days in understanding patters of our various platforms. With iSIP we are able to get this information in seconds, and are able to take action within minutes!"
                    </p>
                </div>
                <div class="bg-gray-50 p-8 rounded-2xl">
                    <div class="flex items-center mb-6">
                        <img src="https://readdy.ai/api/search-image?query=professional%20business%20man%20headshot%20portrait%2C%20warm%20smile%2C%20business%20casual%20attire%2C%20clean%20white%20background%2C%20high%20quality%20professional%20photo&width=80&height=80&seq=customer-004&orientation=squarish" alt="David Park" class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Head of Product Management, Louis W</h4>
                            <!-- <p class="text-sm text-gray-600">CEO, StartupVentures</p> -->
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        "ITHENA's iSIP provides recommendations that we would have never thought of. It generates insights, correlates them to our prorgrams and suggests actions for us to incorporate across product improvements, market analysis and go-to-market strategy."
                    </p>                        
                </div>
            </div>

        </div>
    </section>

    <!-- Key Benefits Section -->
    <section class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Key Benefits</h2>
                <p class="text-xl text-gray-600">Drive success across your entire customer journey</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl text-center group hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-6 bg-blue-100 rounded-2xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                        <i class="ri-user-heart-line ri-2x text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">User Engagement</h3>
                    <p class="text-gray-600 leading-relaxed">Understand behaviors and design guided experiences</p>
                </div>
                <div class="bg-white p-8 rounded-2xl text-center group hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-6 bg-green-100 rounded-2xl flex items-center justify-center group-hover:bg-green-200 transition-colors">
                        <i class="ri-product-hunt-line ri-2x text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Product Engagement</h3>
                    <p class="text-gray-600 leading-relaxed">Improve adoption, increase stickiness, accelerate growth</p>
                </div>
                <div class="bg-white p-8 rounded-2xl text-center group hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-6 bg-purple-100 rounded-2xl flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                        <i class="ri-line-chart-line ri-2x text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Revenue Growth</h3>
                    <p class="text-gray-600 leading-relaxed">Attract, retain, and nurture customers</p>
                </div>
                <div class="bg-white p-8 rounded-2xl text-center group hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-6 bg-orange-100 rounded-2xl flex items-center justify-center group-hover:bg-orange-200 transition-colors">
                        <i class="ri-customer-service-2-line ri-2x text-orange-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Support & Self-Service</h3>
                    <p class="text-gray-600 leading-relaxed">Enable in-app support and serviceability</p>
                </div>
                <div class="bg-white p-8 rounded-2xl text-center group hover:shadow-lg transition-shadow md:col-span-2 lg:col-span-1">
                    <div class="w-16 h-16 mx-auto mb-6 bg-pink-100 rounded-2xl flex items-center justify-center group-hover:bg-pink-200 transition-colors">
                        <i class="ri-feedback-line ri-2x text-pink-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Feedback Collection</h3>
                    <p class="text-gray-600 leading-relaxed">Understand user sentiment continuously</p>
                </div>
                <div class="bg-white p-8 rounded-2xl text-center group hover:shadow-lg transition-shadow md:col-span-2 lg:col-span-1">
                    <div class="w-16 h-16 mx-auto mb-6 bg-pink-100 rounded-2xl flex items-center justify-center group-hover:bg-pink-200 transition-colors">
                        <i class="ri-database-line ri-2x text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Database management</h3>
                    <p class="text-gray-600 leading-relaxed">Understand data behaviors and usability</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Navbar -->
    <?php echo child_theme_custom_footer(); ?>

</div>

