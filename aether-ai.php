<?php
	/*
		Template Name: Aether AI Page
	*/
?>

	<head>
		
		<meta charSet="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		
		<link rel="preload" href="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/media/1b3800ed4c918892-s.p.woff2" as="font" crossorigin="" type="font/woff2"/>
		<link rel="preload" href="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/media/569ce4b8f30dc480-s.p.woff2" as="font" crossorigin="" type="font/woff2"/>
		<link rel="preload" href="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/media/93f479601ee12b01-s.p.woff2" as="font" crossorigin="" type="font/woff2"/>
		<link rel="stylesheet" href="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/css/0c3fe2bfcc74025b.css" data-precedence="next"/>
		<link rel="preload" as="script" fetchPriority="low" href="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/chunks/webpack-3449df841f0f0d90.js"/>

		<!-- custom css -->
		<!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ai-iserv.css" /> -->
		<!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ai-our-platform.css"> -->

		<!-- <script src="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/chunks/4bd1b696-18452535c1c4862d.js" async=""></script>
		<script src="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/chunks/684-58fa9a978537036e.js" async=""></script>
		<script src="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/chunks/main-app-992ab3cdc08501de.js" async=""></script>
		<script src="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/chunks/874-28e09647ed7299c2.js" async=""></script>
		<script src="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/chunks/app/page-4410c39f4b704a57.js" async=""></script> -->
		
		<meta name="next-size-adjust" content=""/>
		<title>Aether AI</title>

		<script>document.querySelectorAll('body link[rel="icon"], body link[rel="apple-touch-icon"]').forEach(el => document.head.appendChild(el))</script>
		<script src="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/chunks/polyfills-42372ed130431b0a.js" noModule=""></script>
		
		<style>
			/* .popup { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); display: flex; align-items: center; justify-content: center; }
			.popup.hidden { display: none; }
			.popup-content { background: #fff; padding: 30px; border-radius: 10px; position: relative; width: 400px; }
			.close { position: absolute; top: 10px; right: 15px; cursor: pointer; font-size: 24px; } */
			
			/* Popup Overlay */
			/* Base overlay */
			#popup {
				position: fixed;
				inset: 0;
				background: rgba(0, 0, 0, 0.4);
				display: flex;
				align-items: center;
				justify-content: center;
				z-index: 9999;
				transition: opacity 0.3s ease;
			}

			/* Hide it */
			.hide-it {
				opacity: 0;
				visibility: hidden;
				pointer-events: none;
			}

			/* Popup box */
			.popup-content {
				background: #ffffff;
				width: 90%;
				max-width: 400px;
				border-radius: 16px;
				padding: 2rem;
				box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
				position: relative;
				animation: fadeIn 0.4s ease;
				font-family: "Segoe UI", sans-serif;
			}

			@keyframes fadeIn {
				from {
					opacity: 0;
					transform: translateY(-30px);
				}

				to {
					opacity: 1;
					transform: translateY(0);
				}
			}

			/* Close button */
			.close {
				position: absolute;
				top: 14px;
				right: 18px;
				font-size: 24px;
				color: #888;
				cursor: pointer;
			}

			.close:hover {
				color: #e00;
			}

			/* Headings */
			.popup-content h2 {
				margin-top: 0;
				margin-bottom: 8px;
				color: #002f6c;
				font-size: 1.5rem;
				font-weight: bold;
				text-align: center;
			}

			.subtitle {
				text-align: center;
				font-size: 0.95rem;
				color: #555;
				margin-bottom: 1.5rem;
			}

			/* Social buttons */
			.social-btn {
				display: flex;
				align-items: center;
				justify-content: center;
				width: 100%;
				margin-bottom: 0.75rem;
				padding: 10px 16px;
				font-size: 0.95rem;
				border-radius: 8px;
				border: 1px solid #ccc;
				cursor: not-allowed;
				background-color: #f9f9f9;
			}

			.google .g-icon {
				font-weight: bold;
				color: #db4437;
				margin-right: 10px;
			}

			.facebook .f-icon {
				font-weight: bold;
				color: #1877f2;
				margin-right: 10px;
			}

			/* Divider */
			.divider {
				display: flex;
				align-items: center;
				margin: 1.2rem 0;
				color: #888;
				font-size: 0.85rem;
			}

			.divider::before,
			.divider::after {
				content: '';
				flex: 1;
				height: 1px;
				background: #ddd;
				margin: 0 8px;
			}

			/* Form styling */
			form input {
				width: 100%;
				padding: 10px 14px;
				margin-bottom: 12px;
				border: 1px solid #dcdcdc;
				border-radius: 6px;
				font-size: 0.95rem;
				background-color: #f8faff;
			}

			form input:focus {
				outline: none;
				border-color: #0b5ed7;
				background-color: #fff;
			}

			form button[type="submit"] {
				width: 100%;
				padding: 12px;
				background-color: #0b5ed7;
				color: white;
				border: none;
				border-radius: 8px;
				font-size: 1rem;
				cursor: pointer;
				transition: background 0.3s ease;
			}

			form button[type="submit"]:hover {
				background-color: #004bbd;
			}

			/* Footer note */
			.note {
				font-size: 0.75rem;
				color: #999;
				margin-top: 1rem;
			}

			.terms {
				text-align: center;
				font-size: 0.75rem;
				margin-top: 1rem;
				color: #666;
			}

			.terms a {
				color: #0b5ed7;
				text-decoration: none;
			}

			.terms a:hover {
				text-decoration: underline;
			}
		</style>	

	</head>

	<div class="main-section min-h-screen bg-white"> 
		
		<!-- Custom Navbar -->
    	<?php echo child_theme_custom_headmenu(); ?>

		<section class="relative min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat pt-8" style="background-image:linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url(&#x27;https://readdy.ai/api/search-image?query=Modern%20futuristic%20data%20visualization%20dashboard%20with%20flowing%20digital%20connections%2C%20neural%20networks%2C%20and%20AI%20technology%20elements%20in%20a%20clean%20minimalist%20office%20environment%20with%20soft%20blue%20and%20white%20tones%2C%20professional%20business%20setting%20with%20floating%20holographic%20data%20streams%20and%20interconnected%20nodes%20representing%20integrated%20systems%2C%20bright%20and%20airy%20atmosphere%20with%20natural%20lighting&amp;width=1920&amp;height=1080&amp;seq=hero1&amp;orientation=landscape&#x27;)">
			<div class="w-full max-w-7xl mx-auto px-6 py-16 lg:px-8">
				<div class="grid lg:grid-cols-2 gap-12 items-center">
					<div class="space-y-8">
						<div class="space-y-6">
							<div class="bg-[#0082c8] font-medium inline-flex items-center px-4 py-2 rounded-full text-sm text-white">Powered by Aether</div>
							<h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">Transform Your Data Into<span class="text-blue-600"> Intelligent Action</span></h1>
							<p class="text-xl text-gray-600 leading-relaxed">The only integrated platform that connects to your ERP systems, IoT data, and Big Data sources in minutes. Get automated AI insights, chat with your data, and receive next-best-action recommendations.</p>
						</div>
						<!-- <div class="flex sm:flex-row gap-4">
							<a class="bg-[#0082C8] hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold text-lg transition-colors whitespace-nowrap cursor-pointer free-trial-btn" onclick="showPopup('free')">Start Free Trial</a>
							<a class="border-2 border-gray-300 hover:border-gray-400 text-gray-700 px-8 py-4 rounded-lg font-semibold text-lg transition-colors whitespace-nowrap cursor-pointer">Watch Demo</a>
						</div> -->
						<div class="flex items-center space-x-8 pt-4">
							<div class="text-center">
								<div class="text-2xl font-bold text-gray-900">99%</div>
								<div class="text-sm text-gray-600">Data Accuracy</div>
							</div>
							<div class="text-center">
								<div class="text-2xl font-bold text-gray-900">5min</div>
								<div class="text-sm text-gray-600">Setup Time</div>
							</div>
							<div class="text-center">
								<div class="text-2xl font-bold text-gray-900">24/7</div>
								<div class="text-sm text-gray-600">AI Monitoring</div>
							</div>
						</div>
					</div>
					<div class="relative">
						<div class="bg-white rounded-2xl shadow-2xl p-6 border border-gray-100">
							<div class="space-y-4">
								<div class="flex items-center justify-between">
									<h3 class="font-semibold text-gray-900">AI Insights Dashboard</h3>
									<div class="flex space-x-2">
										<div class="w-3 h-3 bg-red-400 rounded-full"></div>
										<div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
										<div class="w-3 h-3 bg-green-400 rounded-full"></div>
									</div>
								</div>
								<div class="bg-gray-50 rounded-lg p-4">
									<div class="flex items-center space-x-3 mb-3"><i class="ri-robot-line w-6 h-6 flex items-center justify-center text-blue-600"></i><span class="font-medium text-gray-900">AI Assistant</span></div>
									<div class="space-y-2">
										<div class="bg-blue-100 rounded-lg p-3 text-sm">&quot;Show me sales trends for Q4 across all regions&quot;</div>
										<div class="bg-white rounded-lg p-3 text-sm border "><span class="text-gray-900">Based on your ERP data, Q4 sales increased 23% with highest growth in North America. I recommend increasing inventory for Product A by 15%.</span></div>
									</div>
								</div>
								<div class="grid grid-cols-2 gap-4">
									<div class="bg-green-50 rounded-lg p-3 text-center">
										<div class="text-lg font-bold text-green-600">+34%</div>
										<div class="text-xs text-gray-600">Revenue Growth</div>
									</div>
									<div class="bg-blue-50 rounded-lg p-3 text-center">
										<div class="text-lg font-bold text-blue-600">847</div>
										<div class="text-xs text-gray-600">Active Insights</div>
									</div>
								</div>
							</div>
						</div>
						<div class="absolute -top-4 -right-4 bg-[#0082C8] text-white px-3 py-1 rounded-full text-xs font-medium">Live Demo</div>
					</div>
				</div>
			</div>
		</section>

		<section class="mt-6 bg-white features">
			<div class="max-w-7xl mx-auto px-6 lg:px-8">
				<div class="text-center mb-16">
					<h2 class="text-4xl font-bold text-gray-900 mb-4">Powerful Features for Intelligent Data Analysis</h2>
					<p class="text-xl text-gray-600 max-w-3xl mx-auto">Transform your data into actionable insights with our comprehensive AI-powered platform</p>
				</div>
				<div class="grid lg:grid-cols-3 gap-8">
					<div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow">
						<div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6"><i class="ri-brain-line w-6 h-6 flex items-center justify-center blue-600"></i></div>
						<h3 class="text-xl font-bold text-gray-900 mb-4">AI-Powered Insights</h3>
						<p class="text-gray-600 leading-relaxed">Leverage advanced machine learning algorithms to automatically discover patterns, trends, and anomalies in your data that humans might miss.</p>
					</div>
					<div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow">
						<div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6"><i class="ri-chat-3-line w-6 h-6 flex items-center justify-center green-600"></i></div>
						<h3 class="text-xl font-bold text-gray-900 mb-4">Natural Language Processing</h3>
						<p class="text-gray-600 leading-relaxed">Ask questions about your data in plain English and get instant, accurate answers. No need to learn complex query languages or formulas.</p>
					</div>
					<div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow">
						<div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6"><i class="ri-database-2-line w-6 h-6 flex items-center justify-center purple-600"></i></div>
						<h3 class="text-xl font-bold text-gray-900 mb-4">Multi-Source Integration</h3>
						<p class="text-gray-600 leading-relaxed">Connect and unify data from ERP systems, IoT devices, databases, and cloud services in minutes, not months.</p>
					</div>
					<div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow">
						<div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-6"><i class="ri-lightbulb-line w-6 h-6 flex items-center justify-center orange-600"></i></div>
						<h3 class="text-xl font-bold text-gray-900 mb-4">Smart Recommendations</h3>
						<p class="text-gray-600 leading-relaxed">Receive intelligent, context-aware recommendations for next-best actions based on your business goals and historical performance.</p>
					</div>
					<div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow">
						<div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-6"><i class="ri-speed-line w-6 h-6 flex items-center justify-center red-600"></i></div>
						<h3 class="text-xl font-bold text-gray-900 mb-4">Real-Time Processing</h3>
						<p class="text-gray-600 leading-relaxed">Process and analyze streaming data in real-time, enabling immediate responses to critical business events and opportunities.</p>
					</div>
					<div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow">
						<div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-6"><i class="ri-dashboard-3-line w-6 h-6 flex items-center justify-center indigo-600"></i></div>
						<h3 class="text-xl font-bold text-gray-900 mb-4">Custom Dashboards</h3>
						<p class="text-gray-600 leading-relaxed">Create personalized dashboards with drag-and-drop simplicity. Visualize KPIs and metrics that matter most to your role and department.</p>
					</div>
				</div>
			</div>
		</section>
	
		<section class="mt-6 py-5 bg-gray-50 data-source">
			<div class="max-w-7xl mx-auto px-6 lg:px-8">
				<div class="text-center mb-16">
					<h2 class="text-4xl font-bold text-gray-900 mb-4">Connect Any Data Source in Minutes</h2>
					<p class="text-xl text-gray-600 max-w-3xl mx-auto">Our platform integrates seamlessly with 200+ data sources, from enterprise systems to modern cloud applications</p>
				</div>
				<div class="grid grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-6 mb-16">
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-building-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">SAP</h3>
						<p class="text-xs text-gray-500">ERP</p>
					</div>
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-database-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">Oracle</h3>
						<p class="text-xs text-gray-500">Database</p>
					</div>
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-customer-service-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">Salesforce</h3>
						<p class="text-xs text-gray-500">CRM</p>
					</div>
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-cloud-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">AWS</h3>
						<p class="text-xs text-gray-500">Cloud</p>
					</div>
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-bar-chart-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">Google Analytics</h3>
						<p class="text-xs text-gray-500">Analytics</p>
					</div>
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-shopping-cart-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">Shopify</h3>
						<p class="text-xs text-gray-500">E-commerce</p>
					</div>
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-rocket-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">HubSpot</h3>
						<p class="text-xs text-gray-500">Marketing</p>
					</div>
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-chat-4-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">Slack</h3>
						<p class="text-xs text-gray-500">Communication</p>
					</div>
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-bug-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">Jira</h3>
						<p class="text-xs text-gray-500">Project Management</p>
					</div>
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-database-2-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">PostgreSQL</h3>
						<p class="text-xs text-gray-500">Database</p>
					</div>
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-leaf-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">MongoDB</h3>
						<p class="text-xs text-gray-500">NoSQL</p>
					</div>
					<div class="bg-white border-gray-200 border rounded-xl p-6 text-center hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
						<div class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center"><i class="ri-bank-card-line w-6 h-6 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="font-semibold text-gray-900 mb-1">Stripe</h3>
						<p class="text-xs text-gray-500">Payments</p>
					</div>
				</div>
				<div class="grid lg:grid-cols-3 gap-12">
					<div class="text-center">
						<div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6"><i class="ri-plug-line w-8 h-8 flex items-center justify-center text-blue-600"></i></div>
						<h3 class="text-xl font-bold text-gray-900 mb-4">One-Click Setup</h3>
						<p class="text-gray-600">Connect your data sources with pre-built connectors that require minimal configuration</p>
					</div>
					<div class="text-center">
						<div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6"><i class="ri-shield-check-line w-8 h-8 flex items-center justify-center text-green-600"></i></div>
						<h3 class="text-xl font-bold text-gray-900 mb-4">Secure &amp; Compliant</h3>
						<p class="text-gray-600">Enterprise-grade security with SOC 2, GDPR, and HIPAA compliance built-in</p>
					</div>
					<div class="text-center">
						<div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6"><i class="ri-refresh-line w-8 h-8 flex items-center justify-center text-purple-600"></i></div>
						<h3 class="text-xl font-bold text-gray-900 mb-4">Real-Time Sync</h3>
						<p class="text-gray-600">Automatic data synchronization ensures your insights are always based on the latest information</p>
					</div>
				</div>
			</div>
		</section>

		<section class="mt-6 bg-white platform">
			<div class="max-w-7xl mx-auto px-6 py-16 lg:px-8">
				<div class="text-center mb-16">
					<h2 class="text-gray-900 text-4xl font-bold mb-4">Experience the Platform in Action</h2>
					<p class="text-gray-600 text-xl max-w-3xl mx-auto">See how our AI-powered platform transforms raw data into actionable insights with natural language interaction and intelligent recommendations.</p>
				</div>
				<div class="space-y-16">
					<div class="grid lg:grid-cols-2 gap-12 items-center">
						<div>
							<div class="inline-flex items-center px-4 py-2 bg-blue-100 rounded-full text-blue-700 text-sm font-medium mb-6"><i class="ri-brain-line w-4 h-4 flex items-center justify-center mr-2"></i>GenAI Insights</div>
							<h3 class="text-gray-900 text-3xl font-bold mb-6">Automated Pattern Discovery</h3>
							<p class="text-gray-600 text-lg mb-8">Our AI continuously analyzes your data streams to identify trends, anomalies, and opportunities you might miss. Get predictive insights that drive strategic decisions.</p>
							<div class="space-y-4">
								<div class="flex items-start space-x-4">
									<i class="ri-line-chart-line w-6 h-6 flex items-center justify-center text-blue-600 mt-1"></i>
									<div>
										<h4 class="font-semibold text-gray-900">Predictive Analytics</h4>
										<p class="text-gray-600">Forecast trends and outcomes with 95% accuracy</p>
									</div>
								</div>
								<div class="flex items-start space-x-4">
									<i class="ri-alarm-warning-line w-6 h-6 flex items-center justify-center text-orange-600 mt-1"></i>
									<div>
										<h4 class="font-semibold text-gray-900">Anomaly Detection</h4>
										<p class="text-gray-600">Instantly identify outliers and unusual patterns</p>
									</div>
								</div>
								<div class="flex items-start space-x-4">
									<i class="ri-target-line w-6 h-6 flex items-center justify-center text-green-600 mt-1"></i>
									<div>
										<h4 class="font-semibold text-gray-900">Opportunity Mining</h4>
										<p class="text-gray-600">Discover hidden revenue and efficiency opportunities</p>
									</div>
								</div>
							</div>
						</div>
						<div class="relative">
							<div class="bg-gray-50 border-gray-100 rounded-2xl p-6 border">
								<div class="space-y-4">
									<div class="flex items-center justify-between mb-4">
										<h4 class="font-semibold text-gray-900">AI Insights Dashboard</h4>
										<span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">Live</span>
									</div>
									<div class="bg-white rounded-lg p-4 border">
										<div class="flex items-center space-x-3 mb-3"><i class="ri-alert-line w-5 h-5 flex items-center justify-center text-orange-600"></i><span class="font-medium text-gray-900">Critical Insight Detected</span></div>
										<p class="text-gray-700 text-sm mb-3">Inventory levels for Product X will deplete 40% faster than expected based on current sales velocity.</p>
										<div class="bg-blue-50 rounded-lg p-3">
											<p class="text-sm text-blue-800 font-medium">Recommended Action:</p>
											<p class="text-blue-700 text-sm">Increase order quantity by 60% for next shipment</p>
										</div>
									</div>
									<div class="grid grid-cols-3 gap-3">
										<div class="bg-white rounded-lg p-3 text-center border">
											<div class="text-lg font-bold text-green-600">+23%</div>
											<div class="text-gray-600 text-xs">Sales Growth</div>
										</div>
										<div class="bg-white rounded-lg p-3 text-center border">
											<div class="text-lg font-bold text-red-600">-15%</div>
											<div class="text-gray-600 text-xs">Cost Reduction</div>
										</div>
										<div class="bg-white rounded-lg p-3 text-center border">
											<div class="text-lg font-bold text-blue-600">98.5%</div>
											<div class="text-gray-600 text-xs">Accuracy</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="grid lg:grid-cols-2 gap-12 items-center">
						<div class="order-2 lg:order-1">
							<div class="bg-gray-50 rounded-2xl p-6 border">
								<div class="space-y-4">
									<div class="flex items-center justify-between mb-4">
										<h4 class="font-semibold text-gray-900">Data Chat Interface</h4>
										<i class="ri-chat-3-line w-5 h-5 flex items-center justify-center text-green-600"></i>
									</div>
									<div class="space-y-3">
										<div class="bg-blue-100 rounded-lg p-3 ml-8">
											<p class="text-sm text-gray-900">&quot;What were our top performing products last month?&quot;</p>
										</div>
										<div class="bg-white rounded-lg p-3 mr-8 border">
											<p class="text-gray-700 text-sm">Based on your sales data, here are the top 3 performing products in March:</p>
											<div class="mt-2 space-y-1">
												<div class="flex justify-between text-sm"><span class="text-gray-900">Product Alpha</span><span class="font-medium text-gray-900">$127K revenue</span></div>
												<div class="flex justify-between text-sm"><span class="text-gray-900">Product Beta</span><span class="font-medium text-gray-900">$98K revenue</span></div>
												<div class="flex justify-between text-sm"><span class="text-gray-900">Product Gamma</span><span class="font-medium text-gray-900">$87K revenue</span></div>
											</div>
										</div>
										<div class="bg-blue-100 rounded-lg p-3 ml-8">
											<p class="text-sm text-gray-900">&quot;Show me the customer satisfaction trends&quot;</p>
										</div>
										<div class="bg-white rounded-lg p-3 mr-8 border">
											<p class="text-gray-700 text-sm">Customer satisfaction has improved by 12% over the last quarter, with support response time being the key driver.</p>
										</div>
										<div class="flex items-center space-x-2 pt-2"><input type="text" placeholder="Ask anything about your data..." class="flex-1 px-3 py-2 border-gray-200 rounded-lg text-sm"/><a class="bg-blue-600 text-white px-4 py-2 rounded-lg cursor-pointer"><i class="ri-send-plane-line w-4 h-4 flex items-center justify-center"></i></a></div>
									</div>
								</div>
							</div>
						</div>
						<div class="order-1 lg:order-2">
							<div class="inline-flex items-center px-4 py-2 bg-green-100 rounded-full text-green-700 text-sm font-medium mb-6"><i class="ri-chat-3-line w-4 h-4 flex items-center justify-center mr-2"></i>Conversational NLP</div>
							<h3 class="text-gray-900 text-3xl font-bold mb-6">Chat Naturally With Your Data</h3>
							<p class="text-gray-600 text-lg mb-8">Ask questions in plain English and get instant, accurate answers from all your connected data sources. No SQL knowledge required.</p>
							<div class="space-y-4">
								<div class="flex items-start space-x-4">
									<i class="ri-mic-line w-6 h-6 flex items-center justify-center text-green-600 mt-1"></i>
									<div>
										<h4 class="font-semibold text-gray-900">Natural Language Queries</h4>
										<p class="text-gray-600">Ask complex questions in everyday language</p>
									</div>
								</div>
								<div class="flex items-start space-x-4">
									<i class="ri-speed-line w-6 h-6 flex items-center justify-center text-blue-600 mt-1"></i>
									<div>
										<h4 class="font-semibold text-gray-900">Instant Responses</h4>
										<p class="text-gray-600">Get answers in seconds across all data sources</p>
									</div>
								</div>
								<div class="flex items-start space-x-4">
									<i class="ri-bar-chart-box-line w-6 h-6 flex items-center justify-center text-purple-600 mt-1"></i>
									<div>
										<h4 class="font-semibold text-gray-900">Visual Insights</h4>
										<p class="text-gray-600">Automatic charts and graphs for complex data</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="grid lg:grid-cols-2 gap-12 items-center">
						<div>
							<div class="inline-flex items-center px-4 py-2 bg-purple-100 rounded-full text-purple-700 text-sm font-medium mb-6"><i class="ri-lightbulb-line w-4 h-4 flex items-center justify-center mr-2"></i>Agentic AI</div>
							<h3 class="text-gray-900 text-3xl font-bold mb-6">Intelligent Next-Best Actions</h3>
							<p class="text-gray-600 text-lg mb-8">Our AI agents understand your business context and automatically recommend the most impactful actions to take based on your data insights.</p>
							<div class="space-y-4">
								<div class="flex items-start space-x-4">
									<i class="ri-robot-line w-6 h-6 flex items-center justify-center text-purple-600 mt-1"></i>
									<div>
										<h4 class="font-semibold text-gray-900">Contextual AI Agents</h4>
										<p class="text-gray-600">Understand your business goals and constraints</p>
									</div>
								</div>
								<div class="flex items-start space-x-4">
									<i class="ri-route-line w-6 h-6 flex items-center justify-center text-orange-600 mt-1"></i>
									<div>
										<h4 class="font-semibold text-gray-900">Prioritized Actions</h4>
										<p class="text-gray-600">Ranked recommendations by impact and feasibility</p>
									</div>
								</div>
								<div class="flex items-start space-x-4">
									<i class="ri-loop-right-line w-6 h-6 flex items-center justify-center text-green-600 mt-1"></i>
									<div>
										<h4 class="font-semibold text-gray-900">Continuous Learning</h4>
										<p class="text-gray-600">Improves recommendations based on outcomes</p>
									</div>
								</div>
							</div>
						</div>
						<div class="relative">
							<div class="bg-gray-50 border-gray-100 rounded-2xl p-6 border">
								<div class="space-y-4">
									<div class="flex items-center justify-between mb-4">
										<h4 class="font-semibold text-gray-900">AI Recommendations</h4>
										<span class="text-xs bg-purple-100 text-purple-700 px-2 py-1 rounded-full">Active</span>
									</div>
									<div class="space-y-3">
										<div class="bg-white rounded-lg p-4 border border-green-200">
											<div class="flex items-center justify-between mb-2"><span class="text-sm font-medium text-gray-900">High Priority</span><span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">92% Impact</span></div>
											<p class="text-gray-700 text-sm mb-3">Optimize inventory allocation for Q2 based on regional demand patterns</p>
											<div class="flex space-x-2"><a class="text-xs bg-green-600 text-white px-3 py-1 rounded-lg cursor-pointer whitespace-nowrap">Implement</a><a class="text-xs border-gray-300 text-gray-600 px-3 py-1 rounded-lg cursor-pointer whitespace-nowrap">Learn More</a></div>
										</div>
										<div class="bg-white rounded-lg p-4 border border-blue-200">
											<div class="flex items-center justify-between mb-2"><span class="text-sm font-medium text-gray-900">Medium Priority</span><span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full">67% Impact</span></div>
											<p class="text-gray-700 text-sm mb-3">Adjust pricing strategy for underperforming product categories</p>
											<div class="flex space-x-2"><a class="text-xs bg-blue-600 text-white px-3 py-1 rounded-lg cursor-pointer whitespace-nowrap">Review</a><a class="text-xs border-gray-300 text-gray-600 px-3 py-1 rounded-lg cursor-pointer whitespace-nowrap">Schedule</a></div>
										</div>
										<div class="bg-white rounded-lg p-4 border border-orange-200">
											<div class="flex items-center justify-between mb-2"><span class="text-sm font-medium text-gray-900">Opportunity</span><span class="text-xs bg-orange-100 text-orange-700 px-2 py-1 rounded-full">45% Impact</span></div>
											<p class="text-gray-700 text-sm mb-3">Expand marketing in high-conversion geographic regions</p>
											<div class="flex space-x-2"><a class="text-xs bg-orange-600 text-white px-3 py-1 rounded-lg cursor-pointer whitespace-nowrap">Explore</a><a class="text-xs border-gray-300 text-gray-600 px-3 py-1 rounded-lg cursor-pointer whitespace-nowrap">Dismiss</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="mt-6 py-5 bg-gray-50 pricing">
			<div class="max-w-7xl mx-auto px-6 lg:px-8">
				<div class="text-center mb-16">
					<h2 class="text-4xl font-bold text-gray-900 mb-4">Simple, Transparent Pricing</h2>
					<p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">Start with a free trial and scale as you grow. No hidden fees, no surprises.</p>
					
					<!-- <div class="flex items-center justify-center space-x-4 mb-12">
						<span class="text-sm font-medium text-blue-600">Monthly</span>
						<a class="relative w-14 h-7 rounded-full transition-colors cursor-pointer bg-gray-300">
							<div class="absolute top-1 w-5 h-5 bg-white rounded-full transition-transform translate-x-1"></div>
						</a>
						<span class="text-sm font-medium text-gray-500">Yearly<span class="ml-1 text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full">Save 20%</span></span>
					</div> -->

				</div>
				<div class="grid lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
					
					<div class="bg-white border-gray-200 rounded-2xl border p-8 relative pro-plan">
						<div class="text-center mb-8">
							<h3 class="text-2xl font-bold text-gray-900 mb-2">Professional</h3>
							<div class="text-4xl font-bold text-blue-600 mb-2">
								$<!-- -->49
							</div>
							<div class="text-sm text-gray-500">per user per month</div>
						</div>
						<div class="space-y-4 mb-8">
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Everything in Free Trial</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Unlimited data sources</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Advanced AI analytics</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Custom dashboards</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">API access</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Priority support</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Team collaboration</span></div>
						</div>
						<a class="bg-blue-600 cursor-pointer font-semibold hover:bg-blue-700 p-3 rounded-lg text-decoration-none text-white transition-colors w-full whitespace-nowrap" onclick="showPopup('pro')">Pay and Start</a>
					</div>

					<div class="bg-white border-blue-500 rounded-2xl border-2 p-8 relative free-plan">
						<div class="absolute -top-4 left-1/2 transform -translate-x-1/2"><span class="bg-blue-600 text-white px-4 py-1 rounded-full text-sm font-medium">Most Popular</span></div>
						<div class="text-center mb-8">
							<h3 class="text-2xl font-bold text-gray-900 mb-2">Free Trial</h3>
							<div class="text-4xl font-bold text-blue-600 mb-2">$0</div>
							<div class="text-sm text-gray-500">14 days free</div>
						</div>
						<div class="space-y-4 mb-8">
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Full platform access</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Up to 3 data sources</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">AI insights &amp; recommendations</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Natural language chat</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Email support</span></div>
						</div>
						<a class="bg-blue-600 cursor-pointer font-semibold hover:bg-blue-700 p-3 rounded-lg text-decoration-none text-white transition-colors w-full whitespace-nowrap" onclick="showPopup('free')">Start Free Trial</a>
					</div>

					<div class="bg-white border-gray-200 rounded-2xl border p-8 relative enterprise-plan">
						<div class="text-center mb-8">
							<h3 class="text-2xl font-bold text-gray-900 mb-2">Enterprise</h3>
							<div class="text-4xl font-bold text-blue-600 mb-2">Custom</div>
							<div class="text-sm text-gray-500">Contact us</div>
						</div>
						<div class="space-y-4 mb-8">
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Everything in Professional</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">On-premise deployment</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Custom integrations</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Dedicated support</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">SLA guarantees</span></div>
							<div class="flex items-center space-x-3"><i class="ri-check-line w-5 h-5 flex items-center justify-center text-green-600"></i><span class="text-sm text-gray-600">Training &amp; onboarding</span></div>
						</div>
						<a class="w-full border-2 border-gray-300 text-gray-700 hover:border-gray-400 py-3 px-4 rounded-lg font-semibold transition-colors cursor-pointer whitespace-nowrap">Contact Sales</a>
						<p class="note">* Custom plan is currently under the work, will be here soon!</p>
					</div>

				</div>
				<div class="mt-24">
					<h3 class="text-2xl font-bold text-gray-900 text-center mb-12">Frequently Asked Questions</h3>
					<div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
						<div>
							<h4 class="font-semibold text-gray-900 mb-2">What happens after the 14-day free trial?</h4>
							<p class="text-sm text-gray-600">After your trial ends, you&#x27;ll be automatically enrolled in the Professional plan at $49/month per user. You can cancel anytime before the trial ends with no charges.</p>
						</div>
						<div>
							<h4 class="font-semibold text-gray-900 mb-2">Can I change plans later?</h4>
							<p class="text-sm text-gray-600">Yes, you can upgrade or downgrade your plan at any time. Changes take effect immediately and billing is prorated.</p>
						</div>
						<div>
							<h4 class="font-semibold text-gray-900 mb-2">Is there a setup fee?</h4>
							<p class="text-sm text-gray-600">No setup fees, no hidden costs. You only pay the monthly subscription fee per user.</p>
						</div>
						<div>
							<h4 class="font-semibold text-gray-900 mb-2">What support is included?</h4>
							<p class="text-sm text-gray-600">All plans include email support. Professional and Enterprise plans get priority support with faster response times.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="py-5 bg-gradient-to-br from-blue-600 to-purple-700">
			<div class="max-w-7xl mx-auto px-6 lg:px-8">
				<div class="text-center">
					<h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">Ready to Transform Your Business Intelligence?</h2>
					<p class="text-xl text-blue-100 mb-12 max-w-3xl mx-auto">Join thousands of companies already using ITHENA to unlock the power of their data with AI-driven insights, natural language analytics, and intelligent recommendations.</p>
					<div class="flex sm:flex-row gap-6 justify-center mb-16"><a class="bg-white text-blue-600 hover:bg-gray-50 px-8 py-4 rounded-lg font-semibold text-lg transition-colors cursor-pointer whitespace-nowrap" onclick="showPopup('free')">Start Free 14-Day Trial</a><a class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-lg font-semibold text-lg transition-colors cursor-pointer whitespace-nowrap">Schedule Demo</a></div>
					<div class="grid md:grid-cols-3 gap-8 text-center">
						<div class="text-white">
							<div class="text-3xl font-bold mb-2">5 minutes</div>
							<div class="text-blue-100">Setup time</div>
						</div>
						<div class="text-white">
							<div class="text-3xl font-bold mb-2">200+</div>
							<div class="text-blue-100">Data connectors</div>
						</div>
						<div class="text-white">
							<div class="text-3xl font-bold mb-2">99.9%</div>
							<div class="text-blue-100">Uptime SLA</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Custom Navbar -->
		<?php echo child_theme_custom_footer(); ?>

	</div>

	<div id="popup" class="popup hide-it">
		<div class="popup-content">
			<span class="close" onclick="closePopup()">&times;</span>
			<h2>Start Free Trial</h2>
			<p class="subtitle">Create your account to start your 14-day free trial</p>
			<p class="note">* Google sign-in is currently under the work</p>

			<button class="social-btn google" disabled>
				<span class="g-icon">G</span> Continue with Google
			</button>
			<button class="social-btn facebook" disabled>
				<span class="f-icon">f</span> Continue with Facebook
			</button>

			<div class="divider">Or continue with email</div>

			<form id="subscription-form">
				<input type="text" name="name" placeholder="Full Name" required>
				<input type="email" name="email" placeholder="Work Email" required>
				<input type="text" name="company" placeholder="Company" required>
				<input type="hidden" name="plan" id="plan-input">
				<button type="submit">Continue to Payment</button>
			</form>

			<p class="terms">By continuing, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></p>
		</div>
	</div>
	
	<script>
		function showPopup(plann) {
			document.getElementById('popup').classList.remove('hide-it');
			if (plann) {
				document.getElementById('plan-input').value = plann;
			}
		}
		function closePopup() {
			document.getElementById('popup').classList.add('hide-it');
		}

		// Optional: Escape key to close
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape') closePopup();
		});

		document.getElementById('subscription-form').addEventListener('submit', async function (e) {
			e.preventDefault();
			const formData = new FormData(this);

			const response = await fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
				method: 'POST',
				body: new URLSearchParams({
					action: 'create_stripe_session',
					plan: formData.get('plan'),
					name: formData.get('name'),
					email: formData.get('email'),
					company: formData.get('company')
				})
			});

			const result = await response.json();
			
			if (result.data.url) {
				console.log(result.data);
				window.location.href = result.data.url;
			} else {
				console.log(result.data);
				alert("Error initiating payment");
			}
		});
	</script>

	<!--$--><!--/$--><!--$--><!--/$-->
	<script src="https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/chunks/webpack-3449df841f0f0d90.js" async=""></script>
	<script>(self.__next_f=self.__next_f||[]).push([0])</script>
	<script>self.__next_f.push([1,"1:\"$Sreact.fragment\"\n2:I[7555,[],\"\"]\n3:I[1295,[],\"\"]\n4:I[894,[],\"ClientPageRoot\"]\n5:I[6015,[\"874\",\"static/chunks/874-28e09647ed7299c2.js\",\"974\",\"static/chunks/app/page-4410c39f4b704a57.js\"],\"default\"]\n8:I[9665,[],\"MetadataBoundary\"]\na:I[9665,[],\"OutletBoundary\"]\nd:I[4911,[],\"AsyncMetadataOutlet\"]\nf:I[9665,[],\"ViewportBoundary\"]\n11:I[6614,[],\"\"]\n:HL[\"https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/media/1b3800ed4c918892-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/media/569ce4b8f30dc480-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/media/93f479601ee12b01-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/css/0c3fe2bfcc74025b.css\",\"style\"]\n0:{\"P\":null,\"b\":\"a0IX9LRFiKVNpCj5nqgGU\",\"p\":\"https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514\",\"c\":[\"\",\"\"],\"i\":false,\"f\":[[[\"\",{\"children\":[\"__PAGE__\",{}]},\"$undefined\",\"$undefined\",true],[\"\",[\"$\",\"$1\",\"c\",{\"children\":[[[\"$\",\"link\",\"0\",{\"rel\":\"stylesheet\",\"href\":\"https://readdy.link/preview/c6379422-24d3-4efa-8e00-6c79a3cfb726/1143514/_next/static/css/0c3fe2bfcc74025b.css\",\"precedence\":\"next\",\"crossOrigin\":\"$undefined\",\"nonce\":\"$undefined\"}]],[\"$\",\"html\",null,{\"lang\":\"en\",\"suppressHydrationWarning\":true,\"children\":[\"$\",\"body\",null,{\"className\":\"__variable_28b9e6 __variable_31a09f __variable_b0aeb0 antialiased\",\"suppressHydrationWarning\":true,\"children\":[\"$\",\"$L2\",null,{\"parallelRouterKey\":\"children\",\"error\":\"$undefined\",\"errorStyles\":\"$undefined\",\"errorScripts\":\"$undefined\",\"template\":[\"$\",\"$L3\",null,{}],\"templateStyles\":\"$undefined\",\"templateScripts\":\"$undefined\",\"notFound\":[[\"$\",\"div\",null,{\"className\":\"flex flex-col items-center justify-center h-screen text-center px-4\",\"children\":[[\"$\",\"h1\",null,{\"className\":\"text-5xl md:text-5xl font-semibold text-gray-100\",\"children\":\"404\"}],[\"$\",\"h1\",null,{\"className\":\"text-2xl md:text-3xl f"])</script>
	<script>self.__next_f.push([1,"ont-semibold mt-6\",\"children\":\"This page has not been generated\"}],[\"$\",\"p\",null,{\"className\":\"mt-4 text-xl md:text-2xl text-gray-500\",\"children\":\"Tell me what you would like on this page\"}]]}],[]],\"forbidden\":\"$undefined\",\"unauthorized\":\"$undefined\"}]}]}]]}],{\"children\":[\"__PAGE__\",[\"$\",\"$1\",\"c\",{\"children\":[[\"$\",\"$L4\",null,{\"Component\":\"$5\",\"searchParams\":{},\"params\":{},\"promises\":[\"$@6\",\"$@7\"]}],[\"$\",\"$L8\",null,{\"children\":\"$L9\"}],null,[\"$\",\"$La\",null,{\"children\":[\"$Lb\",\"$Lc\",[\"$\",\"$Ld\",null,{\"promise\":\"$@e\"}]]}]]}],{},null,false]},null,false],[\"$\",\"$1\",\"h\",{\"children\":[null,[\"$\",\"$1\",\"k9YBDGZsRaFMjYVN8KbAc\",{\"children\":[[\"$\",\"$Lf\",null,{\"children\":\"$L10\"}],[\"$\",\"meta\",null,{\"name\":\"next-size-adjust\",\"content\":\"\"}]]}],null]}],false]],\"m\":\"$undefined\",\"G\":[\"$11\",\"$undefined\"],\"s\":false,\"S\":true}\n"])</script>
	<script>self.__next_f.push([1,"12:\"$Sreact.suspense\"\n13:I[4911,[],\"AsyncMetadata\"]\n6:{}\n7:{}\n9:[\"$\",\"$12\",null,{\"fallback\":null,\"children\":[\"$\",\"$L13\",null,{\"promise\":\"$@14\"}]}]\n"])</script>
	<script>self.__next_f.push([1,"c:null\n"])</script>
	<script>self.__next_f.push([1,"10:[[\"$\",\"meta\",\"0\",{\"charSet\":\"utf-8\"}],[\"$\",\"meta\",\"1\",{\"name\":\"viewport\",\"content\":\"width=device-width, initial-scale=1\"}]]\nb:null\n"])</script>
	<script>self.__next_f.push([1,"14:{\"metadata\":[[\"$\",\"title\",\"0\",{\"children\":\"Aether AI\"}],[\"$\",\"meta\",\"1\",{\"name\":\"description\",\"content\":\"Generated by Readdy\"}]],\"error\":null,\"digest\":\"$undefined\"}\ne:{\"metadata\":\"$14:metadata\",\"error\":null,\"digest\":\"$undefined\"}\n"])</script>