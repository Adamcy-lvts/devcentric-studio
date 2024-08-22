<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,400">

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

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-JWJHF5L25Q');
    </script>


    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Montserrat', sans-serif;
        }

        .subtitle,
        .nav-item {
            font-family: 'Raleway', sans-serif;
        }

        :root {
            --devcentric-blue: #517abd;
            --devcentric-orange: #f37321;
        }

        .hero-section {
            background-image: url('img/hero_wallpaper_1.jpg');
        }

        @media (max-width: 767px) {
            .hero-section {
                background-image: url('img/hero_wallpaper_1_mobile.jpg');
            }
        }
    </style>

    @livewireStyles
</head>

<body>


    <section class="hero-section relative h-full bg-bottom bg-no-repeat bg-cover" x-data="{ showMenu: false }">
        <div class="absolute inset-0 z-0 h-full bg-black opacity-80"></div>

        <!-- Insert the new transparent navigation here -->
        <nav class="relative w-full z-10" x-data="{ showMenu: false }">
            <!-- Right Light Blue Background -->

            <div
                class="flex items-center w-full h-full px-4 mx-auto leading-10 text-center md:h-24 md:px-4 lg:px-6 max-w-7xl">
                <div class="flex flex-col items-center justify-between w-full h-full text-orange-500 md:flex-row">

                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="/" class="inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 789.06 229.54" class="h-12 w-auto">
                                <defs>
                                    <clipPath id="clip-path">
                                        <path
                                            d="M66.26 114.77V38.26L33.13 57.38 0 76.51v76.52l132.52 76.51.01-76.51-66.27-38.26z"
                                            class="cls-1" />
                                    </clipPath>
                                    <clipPath id="clip-path-2">
                                        <path
                                            d="M174.87 114.77v76.52L208 172.16l33.14-19.13V76.52L108.61 0v76.52l66.26 38.25z"
                                            class="cls-1" />
                                    </clipPath>
                                    <style>
                                        .cls-1 {
                                            fill: none;
                                            clip-rule: evenodd
                                        }
                                    </style>
                                </defs>
                                <g id="Layer_2" data-name="Layer 2">
                                    <g id="Layer_1-2" data-name="Layer 1">
                                        <g style="clip-path:url(#clip-path)">
                                            <path d="M0 38.26h132.53v191.29H0z" style="fill:#f37321" />
                                        </g>
                                        <g style="clip-path:url(#clip-path-2)">
                                            <path d="M108.61 0h132.53v191.29H108.61z" style="fill:#517abd" />
                                        </g>
                                        <text
                                            style="font-size:110.72px;font-family:Roboto-Black,Roboto;font-weight:800;fill:#517abd"
                                            transform="translate(271.51 153.67)">D<tspan x="72.34" y="0"
                                                style="letter-spacing:-.01em">e</tspan>
                                            <tspan x="129.48" y="0" style="letter-spacing:0">v</tspan>
                                            <tspan x="186.41" y="0"
                                                style="font-family:Roboto-Light,Roboto;font-weight:300;fill:#f37321">
                                                centric</tspan>
                                        </text>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div
                        class="hidden md:flex relative z-10 items-center justify-center w-full px-4 space-x-6 text-sm text-orange-500 lg:text-base">
                        <a href="#services-section" class="relative inline-block font-medium hover:text-blue-600"
                            x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">

                            <span class="block">Services</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span x-show="hover"
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-out duration-300"
                                    x-transition:leave-start="translate-x-0"
                                    x-transition:leave-end="translate-x-full"></span>
                            </span>
                        </a>
                        <a href="#success-stories-section" class="relative inline-block font-medium hover:text-blue-600"
                            x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                            <span class="block">Portfolio</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span x-show="hover"
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-out duration-300"
                                    x-transition:leave-start="translate-x-0"
                                    x-transition:leave-end="translate-x-full"></span>
                            </span>
                        </a>
                        <a href="#aboutus" class="relative inline-block font-medium hover:text-blue-600"
                            x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                            <span class="block">About Us</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span x-show="hover"
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-out duration-300"
                                    x-transition:leave-start="translate-x-0"
                                    x-transition:leave-end="translate-x-full"></span>
                            </span>
                        </a>
                        <a href="#why-choose-us-section" class="relative inline-block font-medium hover:text-blue-600"
                            x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                            <span class="block">Why Choose Us</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span x-show="hover"
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-out duration-300"
                                    x-transition:leave-start="translate-x-0"
                                    x-transition:leave-end="translate-x-full"></span>
                            </span>
                        </a>
                        {{-- <a href="#_" class="relative inline-block font-medium hover:text-blue-600"
                            x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                            <span class="block">Blog</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span x-show="hover"
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-out duration-300"
                                    x-transition:leave-start="translate-x-0"
                                    x-transition:leave-end="translate-x-full"></span>
                            </span>
                        </a> --}}
                        <a href="#approach-section" class="relative inline-block font-medium hover:text-blue-600"
                            x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                            <span class="block">Our Approach</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span x-show="hover"
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full"
                                    x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-out duration-300"
                                    x-transition:leave-start="translate-x-0"
                                    x-transition:leave-end="translate-x-full"></span>
                            </span>
                        </a>
                        <a href="#industry-solutions-section"
                            class="relative inline-block font-medium hover:text-blue-600" x-data="{ hover: false }"
                            @mouseenter="hover = true" @mouseleave="hover = false">
                            <span class="block">Industry Solutions</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span x-show="hover"
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full"
                                    x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-out duration-300"
                                    x-transition:leave-start="translate-x-0"
                                    x-transition:leave-end="translate-x-full"></span>
                            </span>
                        </a>
                        <a href="#contact-form-section" class="relative inline-block font-medium hover:text-blue-600"
                            x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                            <span class="block">Contact</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span x-show="hover"
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full"
                                    x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-out duration-300"
                                    x-transition:leave-start="translate-x-0"
                                    x-transition:leave-end="translate-x-full"></span>
                            </span>
                        </a>
                    </div>

                    <!-- Login Link -->
                    <div class="hidden md:block">
                        <a href="{{ route('filament.admin.auth.login') }}"
                            class="text-white hover:text-blue-400 transition duration-300">Login</a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button @click="showMenu = !showMenu" type="button"
                            class="text-white hover:text-blue-400 focus:outline-none">
                            <svg class="h-6 w-6" x-show="!showMenu" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="h-6 w-6" x-show="showMenu" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>


                </div>
            </div>

            <!-- Mobile menu -->
            <div class="md:hidden" x-show="showMenu" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95" style="display: none;">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-black bg-opacity-75">
                    <a href="#services-section"
                        class="block px-3 py-2 text-base font-medium text-white hover:text-blue-400 transition duration-300">Services</a>
                    <a href="#success-stories-section"
                        class="block px-3 py-2 text-base font-medium text-white hover:text-blue-400 transition duration-300">Portfolio</a>
                    <a href="#aboutus"
                        class="block px-3 py-2 text-base font-medium text-white hover:text-blue-400 transition duration-300">About
                        Us</a>
                    <a href="#why-choose-us-section"
                        class="block px-3 py-2 text-base font-medium text-white hover:text-blue-400 transition duration-300">Why
                        Choose uUs
                        Us</a>
                    <a href="#approach-section"
                        class="block px-3 py-2 text-base font-medium text-white hover:text-blue-400 transition duration-300">Our
                        Approach
                        Us</a>
                    <a href="#industry-solutions-section"
                        class="block px-3 py-2 text-base font-medium text-white hover:text-blue-400 transition duration-300">Industry
                        Solutions
                        Us</a>
                    {{-- <a href="#"
                        class="block px-3 py-2 text-base font-medium text-white hover:text-blue-400 transition duration-300">Blog</a> --}}
                    <a href="#contact-form-section"
                        class="block px-3 py-2 text-base font-medium text-white hover:text-blue-400 transition duration-300">Contact</a>
                    <a href="{{ route('filament.admin.auth.login') }}"
                        class="block px-3 py-2 text-base font-medium text-white hover:text-blue-400 transition duration-300">Login
                    </a>
                </div>
            </div>
        </nav>

        <div class="flex items-center justify-center h-auto py-32 mx-auto md:py-40 lg:py-48 xl:py-56 2xl:py-64">
            <div class="z-10 flex flex-col items-start px-8 md:items-center xl:px-0">
                <div class="headline-container relative w-full overflow-hidden" style="height: 200px;">
                    <!-- Adjust height as needed -->
                    @foreach ($hero->headlines as $index => $headline)
                        <h1
                            class="headline absolute w-full mt-1 text-5xl font-black text-left text-white sm:w-auto md:text-6xl lg:text-7xl xl:text-8xl md:text-center">
                            <span class="block" id="h1-line1-{{ $index + 1 }}">{{ $headline['line1'] }}</span>
                            <span class="block" id="h1-line2-{{ $index + 1 }}">{{ $headline['line2'] }}</span>
                            <span class="block text-3xl md:text-4xl lg:text-5xl mt-4"
                                id="h1-line3-{{ $index + 1 }}">{{ $headline['line3'] }}</span>
                        </h1>
                    @endforeach
                </div>

                <p id="hero-description"
                    class="w-full max-w-xl my-6 text-xl font-normal text-left text-gray-200 lg:max-w-2xl md:text-center">
                    {{ $hero->description }}
                </p>
                <div class="flex flex-col justify-center w-full sm:flex-row md:mt-10 sm:w-auto">
                    <a href=" {{ $hero->cta_link }}"
                        class="w-full px-8 py-2 m-2 text-center text-white bg-blue-600 border-2 border-blue-600 rounded-full sm:w-auto hover:bg-transparent">
                        {{ $hero->cta_text }}</a>

                </div>
            </div>
        </div>
    </section>

    <!-- Hidden element to pass industry data to JavaScript -->
    <div id="industry-data" data-industries="{{ json_encode($industrySolutions->pluck('industry')) }}"
        style="display: none;"></div>

    {{-- 
    <section class="w-full sm:p-8" id="services-section">
        <div class="grid grid-cols-1 mx-auto max-w-7xl lg:grid-cols-2 md:gap-8">
            @foreach ($services as $index => $service)
                <div class="service-card overflow-hidden text-center {{ $index % 2 == 0 ? 'bg-black' : 'bg-gray-100' }} p-8"
                    data-rounded="" data-rounded-max="rounded-full">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="w-24 h-24 mb-6 flex items-center justify-center service-icon">
                            {!! $service->icon !!}
                        </div>
                        <p
                            class="text-xl {{ $index % 2 == 0 ? 'text-gray-100' : 'text-gray-800' }} mb-6 service-title">
                            {!! nl2br(e($service->title)) !!}
                        </p>
                        <div class="flex flex-col sm:flex-row items-center justify-center sm:space-x-5 service-links">
                            <a href="#_"
                                class="flex items-center w-auto mx-auto text-xl leading-tight text-center {{ $index % 2 == 0 ? 'text-blue-500' : 'text-purple-500' }} hover:underline sm:mx-0 mb-3 sm:mb-0">
                                <span>Get a quote</span>
                                <svg class="w-4 transform -rotate-45 h-4 ml-0.5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#_"
                                class="flex items-center w-auto mx-auto text-xl leading-tight text-center {{ $index % 2 == 0 ? 'text-blue-500' : 'text-purple-500' }} hover:underline sm:mx-0">
                                <span>Learn more</span>
                                <svg class="w-4 h-4 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section> --}}

    <section class="w-full p-4 sm:p-8" id="services-section">
        <div class="grid grid-cols-1 mx-auto max-w-7xl lg:grid-cols-2 gap-4 md:gap-8">
            @foreach ($services as $index => $service)
                <div class="service-card overflow-hidden text-center {{ $index % 2 == 0 ? 'bg-gray-900' : 'bg-gray-100' }} p-4 sm:p-8 rounded-3xl transition-all duration-300 hover:rounded-4xl"
                    data-rounded="" data-rounded-max="rounded-full">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div
                            class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 mb-4 sm:mb-6 flex items-center justify-center service-icon">
                            {!! $service->icon !!}
                        </div>
                        <p
                            class="text-lg sm:text-xl md:text-2xl {{ $index % 2 == 0 ? 'text-gray-100' : 'text-gray-800' }} mb-4 sm:mb-6 service-title">
                            {!! nl2br(e($service->title)) !!}
                        </p>
                        <div class="flex flex-col sm:flex-row items-center justify-center sm:space-x-5 service-links">
                            <a href="#_"
                                class="flex items-center w-auto mx-auto text-base sm:text-lg md:text-xl leading-tight text-center {{ $index % 2 == 0 ? 'text-blue-300' : 'text-blue-600' }} hover:underline sm:mx-0 mb-3 sm:mb-0">
                                <span>Get a quote</span>
                                <svg class="w-3 sm:w-4 transform -rotate-45 h-3 sm:h-4 ml-0.5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#_"
                                class="flex items-center w-auto mx-auto text-base sm:text-lg md:text-xl leading-tight text-center {{ $index % 2 == 0 ? 'text-purple-300' : 'text-purple-600' }} hover:underline sm:mx-0">
                                <span>Learn more</span>
                                <svg class="w-3 sm:w-4 h-3 sm:h-4 ml-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="w-full bg-white" id="why-choose-us-section">
        <div class="flex flex-col px-12 py-20 mx-auto max-w-7xl lg:flex-row">
            <div class="relative w-full mb-10 lg:text-left sm:text-center lg:w-1/2 xl:w-7/12 lg:mb-0">
                <h2 class="text-5xl font-bold sm:text-6xl mt-7 why-choose-us-title">{{ $whyChooseUs->title }}</h2>
                <div class="text-gray-600 lg:max-w-sm mt-9 why-choose-us-description">At Devcentric, we specialize in
                    crafting unique solutions designed to boost your organization's productivity and foster growth.
                </div>

                <ul class="relative max-w-md mx-auto lg:mx-0 why-choose-us-list">
                    @foreach (json_decode($whyChooseUs->items) as $index => $item)
                        <li class="flex pl-6 mt-5 why-choose-us-item" data-index="{{ $index }}">
                            <svg class="absolute left-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm text-gray-600">
                                {!! preg_replace('/^(.+?):/', '<span class="font-bold text-gray-900">$1:</span>', $item) !!}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex flex-col rounded-3xl items-center p-4 bg-gray-100 why-choose-us-diagram">
                <h2 class="text-xl font-bold mb-4">EHR System Entity-Relationship Diagram</h2>
                <img src="{{ asset('img/schema_EHR.png') }}" alt="EHR System Entity-Relationship Diagram"
                    class="max-w-full h-auto rounded-2xl shadow-lg">
                <p class="mt-4 text-sm text-gray-600">Entity-Relationship Diagram showing the database structure of the
                    EHR system</p>
            </div>
        </div>
    </section>


    <section class="py-20 bg-white" id="success-stories-section">
        <div class="flex flex-col px-8 mx-auto space-y-12 max-w-7xl xl:px-12">
            <div class="relative success-stories-header">
                <h2 class="w-full text-3xl font-bold text-center sm:text-4xl md:text-5xl">Our Success Stories</h2>
                <p class="w-full py-8 mx-auto -mt-2 text-lg text-center text-gray-700 intro sm:max-w-3xl">
                    At Devcentric, we deliver innovative software that transforms business operations,
                    enhances financial management, and streamlines processes for growing enterprises and institutions
                    across various sectors.
                </p>
            </div>

            @foreach ($successStories as $index => $story)
                <div class="flex flex-col mb-8 animated fadeIn sm:flex-row success-story"
                    data-index="{{ $index }}">
                    <div
                        class="flex items-center mb-8 sm:w-1/2 md:w-5/12 {{ $index % 2 != 0 ? '' : 'sm:order-last' }}">
                        <img class="rounded-lg shadow-xl success-story-image" src="{{ asset($story->image) }}"
                            alt="{{ $story->title }} Dashboard" data-rounded="rounded-lg"
                            data-rounded-max="rounded-full">
                    </div>
                    <div
                        class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 {{ $index % 2 != 0 ? 'sm:pl-16' : 'sm:pr-16' }}">
                        <p class="mb-2 text-sm font-semibold leading-none text-left text-indigo-600 uppercase success-story-subtitle"
                            data-primary="indigo-600">{{ $story->subtitle }}</p>
                        <h3 class="mt-2 text-2xl sm:text-left md:text-4xl success-story-title">{{ $story->title }}
                        </h3>
                        <p class="mt-5 text-lg text-gray-700 text md:text-left success-story-description">
                            {{ $story->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="bg-white" id="approach-section">
        <div
            class="items-center w-full px-0 py-10 sm:py-12 md:py-16 mx-auto md:px-12 lg:px-16 xl:px-32 max-w-7xl relative">
            <div class="lg:text-center md:px-0 px-10 approach-header">
                <h2 class="text-3xl font-extrabold text-black lg:text-7xl tracking-tighter">{{ $approach->title }}
                </h2>
                <div
                    class="approach-description max-w-2xl lg:mx-auto mt-4 text-lg leading-7 tracking-tight text-neutral-600">
                    {{ $approach->description }}
                </div>
            </div>
            <div
                class="grid items-start grid-cols-1 mt-10 lg:mt-12 gap-16 md:grid-cols-2 bg-neutral-50 md:rounded-2xl lg:rounded-[4rem] p-10 lg:p-20">
                <div class="relative approach-content">
                    <h3 class="text-3xl font-extrabold text-black lg:text-5xl tracking-tighter">Tailored <br />
                        Solutions</h3>
                    <div class="approach-text text-neutral-500 text-lg max-w-2xl mt-4">Our step-by-step process ensures
                        that we deliver
                        solutions perfectly aligned with your organization's needs and goals, regardless of your
                        industry or sector.</div>
                    <ul class="list-none mt-6 space-y-4" role="list">
                        @foreach (json_decode($approach->steps) as $step)
                            <li class="approach-step" data-index="{{ $loop->index }}">
                                <div class="relative flex items-start">
                                    <svg class="text-blue-500 h-5 w-5 translate-y-0.5 shrink-0" fill="none"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-neutral-500 text-sm leading-6 ml-2">
                                        <strong class="font-semibold text-neutral-900">{{ $step->title }}</strong> —
                                        {{ $step->description }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="h-auto mt-12 lg:mt-0 md:max-w-full max-w-sm mx-auto relative approach-image">
                    <img alt="Approach Illustration" class="relative z-20"
                        src="{{ asset('img/smart_phone_mockup.png') }}" />
                    <div class="absolute inset-0 w-full p-3 h-full z-10">
                        <div
                            class="relative w-full h-full bg-gradient-to-b from-blue-400 via-blue-500 to-blue-600 rounded-[2rem] lg:rounded-[3rem]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-gray-100 py-24" id="industry-solutions-section">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 industry-solutions-header">
                <h2 class="text-4xl font-extrabold text-gray-900 sm:text-5xl mb-4">Tailored Software Solutions for
                    Every Industry</h2>
                <p class="max-w-3xl mx-auto text-xl text-gray-600">We craft cutting-edge software solutions tailored to
                    the unique needs of various industries. Explore how our expertise can transform your sector and
                    drive innovation.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($industrySolutions as $index => $solution)
                    <div class="bg-white rounded-md shadow-lg transition duration-300 ease-in-out hover:shadow-2xl industry-solution-card"
                        data-index="{{ $index }}">
                        <div class="p-8 text-center">
                            <div
                                class="w-24 h-24 mx-auto flex items-center justify-center bg-{{ $solution->getColorClass() }}-100 text-{{ $solution->getColorClass() }}-500 rounded-md mb-6 industry-solution-icon">
                                {!! $solution->icon !!}
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-900 mb-3">{{ $solution->industry }}</h3>
                            <p class="text-gray-600">{{ $solution->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="aboutus" class="text-gray-600 body-font border-t border-gray-200 bg-white">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20 about-us-header">
                <h2 class="text-xs text-orange-600 tracking-widest font-medium title-font mb-1">DRIVING DIGITAL
                    TRANSFORMATION</h2>
                <h1 class="sm:text-4xl text-3xl font-bold title-font text-gray-900">{{ $aboutUs->title }}</h1>
            </div>
            <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center about-us-content">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="inline-block w-8 h-8 text-blue-400 mb-8" viewBox="0 0 975.036 975.036">
                    <path
                        d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                    </path>
                </svg>
                <p class="leading-relaxed text-lg mb-4">{{ $aboutUs->content }}</p>
                <ul class="text-left list-disc pl-6 mt-4 space-y-2 mb-4">
                    @foreach (json_decode($aboutUs->expertise_areas) as $area)
                        <li>{{ $area }}</li>
                    @endforeach
                </ul>
                <span class="inline-block h-1 w-10 rounded bg-blue-500 mt-8 mb-6"></span>
                <h2 class="text-blue-900 font-medium title-font tracking-wider text-sm">The Devcentric Team</h2>
                <p class="text-orange-500">Innovating for a Digital Future</p>
            </div>
        </div>
    </section>

    <section id="ourmission" class="text-gray-600 body-font border-t border-gray-200 bg-gray-50">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20 our-mission-header">
                <h2 class="text-xs text-orange-600 tracking-widest font-medium title-font mb-1">INNOVATE • BUILD •
                    TRANSFORM</h2>
                <h1 class="sm:text-4xl text-3xl font-bold title-font text-gray-900">{{ $ourMission->title }}</h1>
            </div>
            <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center our-mission-content">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="inline-block w-8 h-8 text-blue-400 mb-8" viewBox="0 0 975.036 975.036">
                    <path
                        d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                    </path>
                </svg>
                <p class="leading-relaxed text-lg">{{ $ourMission->content }}</p>
                <ul class="text-left list-disc pl-6 mt-4 space-y-2">
                    @foreach (json_decode($ourMission->mission_points) as $point)
                        <li><strong>{{ explode(':', $point)[0] }}</strong>: {{ explode(':', $point)[1] ?? '' }}</li>
                    @endforeach
                </ul>
                <span class="inline-block h-1 w-10 rounded bg-blue-500 mt-8 mb-6"></span>
                <h2 class="text-blue-900 font-medium title-font tracking-wider text-sm">{{ $ourMission->ceo_name }}
                </h2>
                <p class="text-orange-500">{{ $ourMission->ceo_title }}</p>
            </div>
        </div>
    </section>


    @livewire('contact-us-form')




    <footer class="text-gray-700 bg-white body-font">
        <div class="container flex flex-col items-center px-8 py-8 mx-auto max-w-7xl sm:flex-row">
            <a href="/" class="text-xl font-black leading-none text-gray-900 select-none logo">
                <img src="{{ asset('img/devcentric_logo_1.png') }}" alt="EHR System Entity-Relationship Diagram"
                    class=" h-12">
            </a>
            <p class="mt-4 text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-200 sm:mt-0">
                © 2024 Devcentric - Driving Digital Transformation
            </p>
            <span class="inline-flex justify-center mt-4 space-x-5 sm:ml-auto sm:mt-0 sm:justify-start">
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Facebook</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">LinkedIn</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">GitHub</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </span>
        </div>
    </footer>




    @livewireScripts


</body>

</html>
