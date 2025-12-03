<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}
    <title>Devcentric - Digital Transformation</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @wireUiScripts
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <meta name="robots" content="noimageindex">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JWJHF5L25Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-JWJHF5L25Q');
    </script>

    <style>
        :root {
            --primary: #517abd;
            --secondary: #f37321;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #0f172a;
        }
        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }

        /* Hero Animations */
        @keyframes float-slow {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(20px, -20px); }
        }
        @keyframes float-slower {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(-30px, 10px); }
        }
        @keyframes slow-zoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }
        @keyframes fade-in-up {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-float-slow { animation: float-slow 8s ease-in-out infinite; }
        .animate-float-slower { animation: float-slower 12s ease-in-out infinite; }
        .animate-slow-zoom { animation: slow-zoom 20s alternate infinite; }
        .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; opacity: 0; }
        .animate-bounce-slow { animation: bounce 3s infinite; }
    </style>
</head>

<body class="antialiased overflow-x-hidden bg-slate-50" x-data="{ scrolled: false, mobileMenuOpen: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 transition-all duration-500 ease-in-out" 
         :class="{ 'bg-slate-900/80 backdrop-blur-xl shadow-lg py-3 border-b border-white/5': scrolled, 'bg-transparent py-6': !scrolled }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="group relative z-50">
                        <div class="flex items-center gap-2">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 789.06 229.54" class="h-10 w-auto transition-transform duration-300 group-hover:scale-105">
                                <defs>
                                    <clipPath id="clip-path-nav"><path d="M66.26 114.77V38.26L33.13 57.38 0 76.51v76.52l132.52 76.51.01-76.51-66.27-38.26z" class="cls-1" /></clipPath>
                                    <clipPath id="clip-path-2-nav"><path d="M174.87 114.77v76.52L208 172.16l33.14-19.13V76.52L108.61 0v76.52l66.26 38.25z" class="cls-1" /></clipPath>
                                </defs>
                                <g>
                                    <g style="clip-path:url(#clip-path-nav)"><path d="M0 38.26h132.53v191.29H0z" style="fill:#f37321" /></g>
                                    <g style="clip-path:url(#clip-path-2-nav)"><path d="M108.61 0h132.53v191.29H108.61z" style="fill:#fff" /></g>
                                    <text style="font-size:110.72px;font-family:Roboto-Black,Roboto;font-weight:800;fill:#fff" transform="translate(271.51 153.67)">D<tspan x="72.34" y="0" style="letter-spacing:-.01em">e</tspan><tspan x="129.48" y="0" style="letter-spacing:0">v</tspan><tspan x="186.41" y="0" style="font-family:Roboto-Light,Roboto;font-weight:300;fill:#f37321">centric</tspan></text>
                                </g>
                            </svg>
                        </div>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    @foreach([
                        ['label' => 'Services', 'href' => '#services-section'],
                        ['label' => 'Portfolio', 'href' => '#success-stories-section'],
                        ['label' => 'About', 'href' => '#aboutus'],
                        ['label' => 'Why Us', 'href' => '#why-choose-us-section'],
                        ['label' => 'Approach', 'href' => '#approach-section'],
                        ['label' => 'Solutions', 'href' => '#industry-solutions-section'],
                    ] as $link)
                    <a href="{{ $link['href'] }}" 
                       class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-white rounded-full hover:bg-white/10 transition-all duration-300">
                        {{ $link['label'] }}
                    </a>
                    @endforeach
                    
                    <a href="#contact-form-section" 
                       class="ml-4 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white shadow-blue-500/25">
                        Contact Us
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-gray-200 hover:text-white focus:outline-none p-2 rounded-lg hover:bg-white/10 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" x-show="!mobileMenuOpen" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" x-show="mobileMenuOpen" style="display: none;" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden absolute top-full left-0 w-full bg-slate-900/95 backdrop-blur-xl border-t border-white/10 shadow-2xl" 
             x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             style="display: none;">
            <div class="px-4 py-6 space-y-2">
                @foreach([
                    ['label' => 'Services', 'href' => '#services-section'],
                    ['label' => 'Portfolio', 'href' => '#success-stories-section'],
                    ['label' => 'About Us', 'href' => '#aboutus'],
                    ['label' => 'Why Choose Us', 'href' => '#why-choose-us-section'],
                    ['label' => 'Our Approach', 'href' => '#approach-section'],
                    ['label' => 'Industry Solutions', 'href' => '#industry-solutions-section'],
                ] as $link)
                <a href="{{ $link['href'] }}" @click="mobileMenuOpen = false" class="block text-base font-medium text-gray-300 hover:text-white hover:bg-white/10 px-4 py-3 rounded-xl transition-colors">
                    {{ $link['label'] }}
                </a>
                @endforeach
                <a href="#contact-form-section" @click="mobileMenuOpen = false" class="block text-center w-full mt-6 px-5 py-4 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-500 transition-colors">
                    Get Started
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-[#020617] hero-section">
        <!-- Premium Background Layer -->
        <div class="absolute inset-0 z-0">
            <!-- Main Image with sophisticated blend -->
            <img src="{{ asset('img/hero_wallpaper_1.jpg') }}" class="hero-bg-img w-full h-full object-cover opacity-30 mix-blend-overlay scale-105" alt="Background">
            
            <!-- Gradient Overlays for Depth -->
            <div class="absolute inset-0 bg-gradient-to-b from-[#020617]/90 via-[#020617]/60 to-[#020617]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-blue-600/20 via-transparent to-transparent"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_left,_var(--tw-gradient-stops))] from-indigo-600/20 via-transparent to-transparent"></div>
            
            <!-- Animated Grid Pattern -->
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImEiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTTAgNDBMMDQwIDBoNDB2NDBIMHoiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2EpIi8+PC9zdmc+')] opacity-30"></div>
        </div>
        
        <!-- Floating Ambient Orbs -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="hero-orb hero-orb-1 absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-blue-600/20 rounded-full blur-[120px]"></div>
            <div class="hero-orb hero-orb-2 absolute bottom-[-10%] left-[-10%] w-[500px] h-[500px] bg-indigo-600/10 rounded-full blur-[100px]"></div>
            <div class="hero-orb hero-orb-3 absolute top-[40%] left-[50%] w-[300px] h-[300px] bg-purple-500/10 rounded-full blur-[80px]"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 pt-20">
            <div class="max-w-6xl mx-auto text-center">
                <!-- Badge/Pill -->
                <div class="hero-badge inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-md mb-10 shadow-lg shadow-blue-900/20 opacity-0 translate-y-4">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    <span class="text-sm font-medium text-blue-100 tracking-wide uppercase">Digital Transformation Partners</span>
                </div>

                <!-- Headlines Container -->
                <div class="relative h-48 sm:h-56 md:h-64 mb-8 perspective-1000">
                    @foreach ($hero->headlines as $index => $headline)
                    <div class="hero-headline-slide absolute inset-0 flex flex-col items-center justify-center {{ $index === 0 ? 'active' : 'opacity-0 invisible' }}">
                        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight text-white leading-tight drop-shadow-2xl">
                            <span class="hero-line-1 block mb-2">{{ $headline['line1'] }}</span>
                            <span class="hero-line-2 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-300 to-purple-400">
                                {{ $headline['line2'] }}
                            </span>
                        </h1>
                        <p class="hero-line-3 mt-4 text-xl sm:text-2xl md:text-3xl font-semibold text-slate-300">
                            {{ $headline['line3'] }}
                        </p>
                    </div>
                    @endforeach
                </div>

                <!-- Description -->
                <p id="hero-description" class="text-lg sm:text-xl md:text-2xl text-slate-300 max-w-3xl mx-auto leading-relaxed mb-12 font-light tracking-wide opacity-0 translate-y-4">
                    {{ $hero->description }}
                </p>

                <!-- CTAs -->
                <div class="hero-cta-group flex flex-col sm:flex-row items-center justify-center gap-6 opacity-0 translate-y-4">
                    <a href="{{ $hero->cta_link }}" class="group relative px-8 py-4 bg-blue-600 text-white rounded-full font-bold text-lg transition-all duration-300 hover:scale-105 hover:shadow-[0_0_40px_rgba(37,99,235,0.5)] overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-600 transition-all duration-300 group-hover:opacity-90"></div>
                        <span class="relative z-10 flex items-center gap-2">
                            {{ $hero->cta_text }}
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </span>
                    </a>
                    
                    <a href="#services-section" class="group relative px-8 py-4 bg-white/5 text-white rounded-full font-bold text-lg transition-all duration-300 hover:bg-white/10 hover:scale-105 border border-white/10 backdrop-blur-sm">
                        <span class="relative z-10 flex items-center gap-2">
                            Explore Services
                            <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Modern Scroll Indicator -->
        <div class="hero-scroll-indicator absolute bottom-10 left-1/2 transform -translate-x-1/2 flex flex-col items-center gap-2 opacity-0 cursor-pointer">
            <a href="#services-section" class="flex flex-col items-center gap-2">
                <span class="text-xs font-medium text-slate-400 uppercase tracking-widest">Scroll</span>
                <div class="w-[1px] h-12 bg-gradient-to-b from-blue-500 to-transparent"></div>
            </a>
        </div>
    </section>

    <!-- Hidden element to pass industry data to JavaScript -->
    <div id="industry-data" data-industries="{{ json_encode($industrySolutions->pluck('industry')) }}" style="display: none;"></div>

    <!-- Services Section -->
    <section id="services-section" class="py-32 bg-[#0B1120] relative overflow-hidden">
        <!-- Ambient Background -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-1/4 w-[800px] h-[800px] bg-blue-600/10 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 right-1/4 w-[600px] h-[600px] bg-purple-600/10 rounded-full blur-[100px]"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-900/30 border border-blue-500/30 text-blue-400 text-xs font-bold tracking-widest uppercase mb-6">
                    <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                    What We Do
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 font-heading tracking-tight">
                    Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Services</span>
                </h2>
                <p class="text-xl text-slate-300 leading-relaxed">
                    Comprehensive digital solutions tailored to elevate your business in the modern era.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services as $index => $service)
                <div class="service-card group relative p-[1px] rounded-3xl bg-gradient-to-b from-white/20 to-white/5 hover:from-blue-500 hover:to-purple-500 transition-colors duration-500">
                    <div class="relative h-full bg-slate-900 rounded-[23px] p-8 overflow-hidden transition-colors duration-500 group-hover:bg-slate-800">
                        <!-- Hover Glow Effect -->
                        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-32 h-32 bg-blue-500/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        
                        <div class="relative z-10">
                            <div class="w-16 h-16 rounded-2xl bg-slate-800 border border-slate-700 flex items-center justify-center mb-8 group-hover:scale-110 group-hover:bg-blue-600 group-hover:border-blue-500 group-hover:shadow-[0_0_20px_rgba(59,130,246,0.5)] transition-all duration-300">
                                <div class="w-8 h-8 text-blue-400 group-hover:text-white transition-colors duration-300">
                                    {!! $service->icon !!}
                                </div>
                            </div>
                            
                            <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-blue-300 transition-colors font-heading">{{ $service->title }}</h3>
                            <p class="text-slate-300 mb-8 leading-relaxed group-hover:text-slate-200 transition-colors">{{ $service->description }}</p>
                            
                            <div class="flex items-center">
                                <a href="#contact-form-section" class="text-sm font-bold text-blue-400 group-hover:text-blue-300 flex items-center gap-2 transition-all duration-300 group-hover:translate-x-2">
                                    Get a quote
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section id="why-choose-us-section" class="py-32 bg-white overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-20">
                <div class="w-full lg:w-1/2">
                    <h2 class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4">Why Choose Us</h2>
                    <h3 class="why-choose-us-title text-4xl md:text-5xl font-bold text-slate-900 mb-8 font-heading">{{ $whyChooseUs->title }}</h3>
                    <p class="why-choose-us-description text-xl text-slate-600 mb-10 leading-relaxed">
                        At Devcentric, we specialize in crafting unique solutions designed to boost your organization's productivity and foster growth.
                    </p>

                    <div class="space-y-6 why-choose-us-list">
                        @foreach (json_decode($whyChooseUs->items) as $index => $item)
                        <div class="why-choose-us-item flex items-start group">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center mt-1 group-hover:bg-green-200 transition-colors">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div class="ml-5">
                                <p class="text-slate-700 text-lg">
                                    {!! preg_replace('/^(.+?):/', '<span class="font-bold text-slate-900">$1:</span>', $item) !!}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="w-full lg:w-1/2 relative why-choose-us-diagram">
                    <div class="absolute inset-0 bg-gradient-to-tr from-blue-600/10 to-orange-500/10 rounded-[40px] transform rotate-3 scale-105"></div>
                    <div class="relative bg-white rounded-[32px] shadow-2xl p-8 border border-slate-100">
                        <img src="{{ asset('img/schema_EHR.png') }}" alt="EHR System Diagram" class="w-full h-auto rounded-2xl shadow-inner bg-slate-50">
                        <div class="mt-6 text-center">
                            <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Robust Architecture & Design</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Stories -->
    <section id="success-stories-section" class="py-32 bg-slate-900 text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(#fff 1px, transparent 1px), linear-gradient(90deg, #fff 1px, transparent 1px); background-size: 40px 40px;"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-transparent to-slate-900"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-24 success-stories-header">
                <h2 class="text-blue-400 font-bold tracking-widest uppercase text-sm mb-4">Portfolio</h2>
                <h3 class="text-4xl md:text-5xl font-bold text-white mb-8 font-heading">Our Success Stories</h3>
                <p class="text-xl text-slate-400 leading-relaxed">
                    Delivering innovative software that transforms business operations across various sectors.
                </p>
            </div>

            <div class="space-y-32">
                @foreach ($successStories as $index => $story)
                <div class="success-story flex flex-col {{ $index % 2 == 0 ? 'lg:flex-row' : 'lg:flex-row-reverse' }} items-center gap-16 lg:gap-24">
                    <div class="w-full lg:w-1/2 group perspective-1000">
                        <div class="success-story-image relative rounded-2xl overflow-hidden shadow-2xl border border-white/10 transform transition-transform duration-700 group-hover:rotate-y-2">
                            <div class="absolute inset-0 bg-blue-600/20 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                            <img src="{{ asset($story->image) }}" alt="{{ $story->title }}" class="w-full h-auto transform group-hover:scale-105 transition-transform duration-700">
                        </div>
                    </div>
                    
                    <div class="w-full lg:w-1/2 space-y-8">
                        <div class="success-story-subtitle inline-block px-4 py-1.5 rounded-full bg-blue-900/50 border border-blue-500/30 text-blue-300 text-sm font-bold tracking-wide uppercase">
                            {{ $story->subtitle }}
                        </div>
                        <h4 class="success-story-title text-3xl md:text-4xl font-bold text-white font-heading">{{ $story->title }}</h4>
                        <p class="success-story-description text-lg text-slate-400 leading-relaxed">
                            {{ $story->description }}
                        </p>
                        <a href="#contact-form-section" class="inline-flex items-center text-white font-bold hover:text-blue-400 transition-colors group">
                            Learn more about this project
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Approach Section -->
    <section id="approach-section" class="py-32 bg-slate-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 approach-header">
                <h2 class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4">How We Work</h2>
                <h3 class="text-4xl md:text-5xl font-bold text-slate-900 mb-8 font-heading">{{ $approach->title }}</h3>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">{{ $approach->description }}</p>
            </div>

            <div class="bg-white rounded-[40px] p-8 md:p-16 shadow-xl border border-slate-100">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                    <div class="approach-content space-y-10">
                        <h4 class="text-3xl font-bold text-slate-900 font-heading">Tailored Solutions Process</h4>
                        <div class="approach-text text-slate-600 text-lg">
                            Our step-by-step process ensures that we deliver solutions perfectly aligned with your organization's needs and goals.
                        </div>
                        <div class="space-y-8">
                            @foreach (json_decode($approach->steps) as $step)
                            <div class="approach-step flex gap-6">
                                <div class="flex-shrink-0 w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xl shadow-sm">
                                    {{ $loop->iteration }}
                                </div>
                                <div>
                                    <h5 class="text-xl font-bold text-slate-900 mb-2">{{ $step->title }}</h5>
                                    <p class="text-slate-600 leading-relaxed">{{ $step->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="approach-image relative flex justify-center">
                        <div class="absolute inset-0 bg-gradient-to-b from-blue-100/50 to-white/0 rounded-full filter blur-3xl opacity-60"></div>
                        <img src="{{ asset('img/smart_phone_mockup.png') }}" alt="Approach" class="relative z-10 max-w-xs md:max-w-md drop-shadow-2xl transform hover:scale-105 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Industry Solutions -->
    <section id="industry-solutions-section" class="py-32 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-20 industry-solutions-header">
                <h2 class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4">Industries</h2>
                <h3 class="text-4xl md:text-5xl font-bold text-slate-900 mb-8 font-heading">Tailored for Your Sector</h3>
                <p class="text-xl text-slate-600">Cutting-edge software solutions tailored to the unique needs of various industries.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($industrySolutions as $index => $solution)
                <a href="{{ route('industry.show', ['industry' => Str::slug($solution->industry)]) }}" class="group block h-full">
                    <div class="industry-solution-card h-full bg-white rounded-3xl p-10 shadow-lg border border-slate-100 hover:shadow-2xl hover:border-blue-100 transition-all duration-300 flex flex-col items-center text-center relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-400 to-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                        
                        <div class="industry-solution-icon w-20 h-20 rounded-2xl bg-{{ $solution->getColorClass() }}-50 text-{{ $solution->getColorClass() }}-600 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                            <div class="w-10 h-10 fill-current">
                                {!! $solution->icon !!}
                            </div>
                        </div>
                        <h4 class="text-2xl font-bold text-slate-900 mb-4 group-hover:text-blue-600 transition-colors font-heading">{{ $solution->industry }}</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">{{ $solution->description }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section id="aboutus" class="py-32 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div class="absolute -top-24 -left-24 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-orange-600/5 rounded-full blur-[100px]"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center about-us-header">
                <h2 class="text-orange-500 font-bold tracking-widest uppercase text-sm mb-4">About Devcentric</h2>
                <h3 class="text-4xl md:text-5xl font-bold text-white mb-10 font-heading">{{ $aboutUs->title }}</h3>
                
                <div class="about-us-content bg-white/5 backdrop-blur-lg rounded-[40px] p-10 md:p-16 border border-white/10 shadow-2xl">
                    <svg class="w-16 h-16 text-blue-400 mx-auto mb-8" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 13.1216 16 12.017 16H7.19922C6.09465 16 5.19922 16.8954 5.19922 18V21H14.017ZM16.017 21H19.017C19.5693 21 20.017 20.5523 20.017 20V4C20.017 3.44772 19.5693 3 19.017 3H4.19922C3.64693 3 3.19922 3.44772 3.19922 4V20C3.19922 20.5523 3.64694 21 4.19922 21H6.017C6.017 21.5523 6.46471 22 7.017 22H12.1992C12.7515 22 13.1992 21.5523 13.1992 21H16.017ZM16.017 17H18.017V19H16.017V17ZM16.017 13H18.017V15H16.017V13ZM16.017 9H18.017V11H16.017V9ZM16.017 5H18.017V7H16.017V5ZM12.017 5H14.017V7H12.017V5ZM8.017 5H10.017V7H8.017V5ZM4.19922 5H6.19922V7H4.19922V5ZM4.19922 9H6.19922V11H4.19922V9ZM8.017 9H10.017V11H8.017V9ZM12.017 9H14.017V11H12.017V9ZM4.19922 13H6.19922V15H4.19922V13ZM8.017 13H10.017V15H8.017V13ZM12.017 13H14.017V15H12.017V13Z"></path></svg>
                    
                    <p class="text-xl md:text-2xl text-slate-300 leading-relaxed mb-12 font-light">
                        {{ $aboutUs->content }}
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left max-w-3xl mx-auto">
                        @foreach (json_decode($aboutUs->expertise_areas) as $area)
                        <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-white/5 transition-colors">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="text-slate-200 text-lg">{{ $area }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission -->
    <section id="ourmission" class="py-32 bg-slate-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto text-center our-mission-header">
                <h2 class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4">Our Mission</h2>
                <h3 class="text-4xl md:text-5xl font-bold text-slate-900 mb-10 font-heading">{{ $ourMission->title }}</h3>
                
                <div class="our-mission-content prose prose-lg prose-slate mx-auto text-slate-600 mb-16">
                    <p class="text-xl leading-relaxed">{{ $ourMission->content }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                    @foreach (json_decode($ourMission->mission_points) as $point)
                    @php $parts = explode(':', $point); @endphp
                    <div class="bg-white p-8 rounded-3xl shadow-lg border-t-4 border-blue-500 hover:-translate-y-2 transition-transform duration-300">
                        <h4 class="font-bold text-xl text-slate-900 mb-3">{{ $parts[0] }}</h4>
                        <p class="text-slate-600">{{ $parts[1] ?? '' }}</p>
                    </div>
                    @endforeach
                </div>

                <div class="inline-block">
                    <div class="h-1.5 w-24 bg-blue-500 rounded-full mx-auto mb-6"></div>
                    <p class="font-bold text-slate-900 text-2xl mb-1 font-heading">{{ $ourMission->ceo_name }}</p>
                    <p class="text-orange-500 font-medium tracking-wide uppercase text-sm">{{ $ourMission->ceo_title }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section id="contact-form-section" class="py-32 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @livewire('contact-us-form')
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 text-slate-400 py-16 border-t border-slate-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="text-center md:text-left">
                    <a href="/" class="inline-block mb-6">
                        <img src="{{ asset('img/devcentric_logo_1.png') }}" alt="Devcentric" class="h-12 brightness-0 invert opacity-80 hover:opacity-100 transition-opacity">
                    </a>
                    <p class="text-sm">© {{ date('Y') }} Devcentric. Driving Digital Transformation.</p>
                </div>

                <div class="flex space-x-8">
                    <a href="{{ $profile->facebook }}" class="text-slate-500 hover:text-white transition-colors transform hover:scale-110"><span class="sr-only">Facebook</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
                    <a href="{{ $profile->linkedin }}" class="text-slate-500 hover:text-white transition-colors transform hover:scale-110"><span class="sr-only">LinkedIn</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" /></svg></a>
                    <a href="{{ $profile->twitter }}" class="text-slate-500 hover:text-white transition-colors transform hover:scale-110"><span class="sr-only">Twitter</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg></a>
                    <a href="{{ $profile->instagram }}" class="text-slate-500 hover:text-white transition-colors transform hover:scale-110"><span class="sr-only">Instagram</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg></a>
                </div>
            </div>
            
            <div class="mt-10 flex justify-center">
                <a href="{{ $profile->whatsapp }}" class="inline-flex items-center px-8 py-4 bg-[#25D366] hover:bg-[#128C7E] text-white rounded-full font-bold transition-all duration-300 shadow-lg hover:shadow-green-500/30 transform hover:-translate-y-1">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M20.448 3.538C18.18 1.27 15.17 0 12 0 5.438 0 0 5.438 0 12c0 2.11.551 4.165 1.601 5.983L0 24l6.208-1.63c1.765.97 3.749 1.48 5.792 1.48 6.562 0 12-5.438 12-12 0-3.17-1.27-6.18-3.552-8.462zm-8.448 18.46c-1.78 0-3.523-.453-5.067-1.311l-.363-.217-3.764 1.015 1.03-3.764-.237-.377C2.813 15.476 2.328 13.765 2.328 12c0-5.344 4.328-9.672 9.672-9.672 2.584 0 5.013 1.01 6.84 2.84 1.83 1.83 2.84 4.26 2.84 6.84 0 5.344-4.328 9.672-9.672 9.672zm5.321-7.219c-.292-.146-1.726-.852-1.994-.95-.267-.098-.462-.146-.657.146-.195.292-.755.95-.927 1.146-.172.195-.344.22-.636.072-.292-.146-1.236-.454-2.35-1.453-.87-.776-1.456-1.735-1.627-2.028-.17-.292-.018-.45.128-.596.132-.131.292-.344.439-.515.146-.172.196-.292.292-.487.097-.195.049-.365-.024-.512-.073-.146-.657-1.583-.9-2.167-.244-.585-.487-.487-.657-.487-.17 0-.366-.024-.56-.024-.196 0-.512.072-.78.366-.267.292-1.023 1-1.023 2.438 0 1.438 1.048 2.827 1.194 3.022.146.195 2.057 3.14 4.985 4.402.697.301 1.24.48 1.665.615.7.222 1.337.19 1.84.116.56-.084 1.726-.707 1.97-1.39.244-.684.244-1.267.17-1.39-.073-.126-.268-.2-.56-.347z" clip-rule="evenodd" /></svg>
                    Chat on WhatsApp
                </a>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
