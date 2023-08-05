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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="https://unpkg.com/@alpine-collective/toolkit@1.0.0/dist/cdn.min.js"></script> --}}
    <script src="{{ asset('js/alpinetoolkit.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" media="screen" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link crossorigin="anonymous" href="{{ asset('css/main.min.css') }}" media="screen" rel="stylesheet" />
    <link href="{{ asset('css/skillbar.css') }}" media="screen" rel="stylesheet" />


    @livewireStyles
</head>

<body>


    <div id="main" class="relative">
        <div x-data="{
            triggerNavItem(id) {
                    $scroll(id)
                },
                triggerMobileNavItem(id) {
                    mobileMenu = false;
                    this.triggerNavItem(id)
                }
        }">
            <div class="w-full z-50 top-0 py-3 sm:py-5  absolute">
                <div class="container flex items-center justify-between">
                    <div class="hidden sm:block">
                        <a href="/">

                            <h1 class="font-sans font-bold text-3xl md:text-5xl text-white mb-3 uppercase">DEVCENTRIC
                            </h1>
                            <h2 class=" studio text-white text-3xl md:text-5xl">Studio</h2>
                        </a>
                    </div>
                    {{-- Desktop Navigation Menu --}}
                    <div>
                        @include('partials.desktop-navigation')
                    </div>

                </div>
                <div>
                    @include('partials.mobile-navigation')
                </div>
            </div>


            <div>
                <div class="relative bg-cover bg-center bg-no-repeat py-8"
                    style="background-image: url('{{ asset('img/bg-hero-2.jpg') }}')">
                    <div class="absolute inset-0 z-20 bg-black opacity-80 bg-cover bg-center bg-no-repeat"></div>
                    {{-- Hero Secition  --}}
                    <div class="container relative z-30 pt-20 pb-12 sm:pt-56 sm:pb-48 lg:pt-64 lg:pb-48">
                        <div class="flex flex-col items-center justify-center lg:flex-row">
                            <div class="rounded-full border-4 border-white animate__animated animate__bounceIn">
                                <img src="{{ asset('storage/' . $profile->user->profile_photo_path) }}"
                                    class="h-48 rounded-full sm:h-56" alt="author" />

                            </div>
                            <div class="pt-8 sm:pt-10 lg:pl-8 lg:pt-0">
                                <h1
                                    class="text-center font-header text-4xl md:text-center sm:text-center text-white sm:text-left sm:text-5xl md:text-6xl animate__animated animate__backInDown">
                                    Hello I'm {{ $profile->name ?? '' }}!
                                </h1>
                                <div
                                    class="flex flex-col justify-center pt-3 sm:flex-row sm:pt-5 lg:justify-start animate__animated animate__backInUp">
                                    <div class="flex items-center justify-center pl-0 sm:justify-start md:pl-1">
                                        <p class="font-body text-lg uppercase text-white">Let's connect</p>
                                        <div class="hidden sm:block">
                                            <i class="bx bx-chevron-right text-3xl text-gray-200"></i>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center pt-5 pl-2 sm:justify-start sm:pt-0">
                                        <a href="{{ $profile->facebook ?? '' }}" target="_blank">
                                            <i
                                                class="bx bxl-facebook-square text-2xl text-white hover:text-teal-400"></i>
                                        </a>
                                        <a href="{{ $profile->twitter ?? '' }}" target="_blank" class="pl-4">
                                            <i class="bx bxl-twitter text-2xl text-white hover:text-teal-400"></i>
                                        </a>
                                        <a href="{{ $profile->whatsapp ?? '' }}" target="_blank" class="pl-4">
                                            <i class="bx bxl-whatsapp text-2xl text-white hover:text-teal-400"></i>
                                        </a>
                                        <a href="{{ $profile->linkedin ?? '' }}" target="_blank" class="pl-4">
                                            <i class="bx bxl-linkedin text-2xl text-white hover:text-teal-400"></i>
                                        </a>
                                        <a href="{{ $profile->instagram ?? '' }}" target="_blank" class="pl-4">
                                            <i class="bx bxl-instagram text-2xl text-white hover:text-teal-400"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Intro Section  --}}
                @include('profile-section', ['profile' => $profile])
            </div>
            {{-- My Services Section  --}}
            <div class="mx-auto sm:w-10/12 px-5 py-16 md:py-20" id="services">
                <h2
                    class="text-center font-header text-4xl font-semibold uppercase text-gray-900 sm:text-5xl lg:text-6xl">
                    Here's what I'm good at
                </h2>
                <h3 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                    These are the services I offer
                </h3>


                @livewire('webdev-modal')


            </div>

            {{-- Portfolio Section  --}}
            <div class="container py-16 md:py-20" id="portfolio">
                <h2
                    class="text-center font-header text-4xl font-semibold uppercase text-gray-900 sm:text-5xl lg:text-6xl">
                    Check out my Portfolio
                </h2>
                <h3 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                    Here's what I have done with the past
                </h3>

                <div
                    class="mx-auto grid w-full grid-cols-1 gap-8 pt-12 sm:w-3/4 md:gap-10 lg:w-full lg:grid-cols-2">
                    <a href="/" class="mx-auto transform transition-all hover:scale-105 md:mx-0">
                        <img src="/img/fegocomosa.png" class="w-full shadow" alt="portfolio image" />
                    </a>
                    <a href="/" class="mx-auto transform transition-all hover:scale-105 md:mx-0">
                        <img src="/img/sms.png" class="w-full shadow" alt="portfolio image" />
                    </a>
                    <a href="/" class="mx-auto transform transition-all hover:scale-105 md:mx-0">
                        <img src="/img/dashboard.png" class="w-full shadow" alt="portfolio image" />
                    </a>
                    <a href="/" class="mx-auto transform transition-all hover:scale-105 md:mx-0">
                        <img src="/img/portfolio-microsoft.jpeg" class="w-full shadow" alt="portfolio image" />
                    </a>
                </div>
            </div>

            @include('sections.blog-section', ['posts' => $posts])

            @livewire('contact-us-form')

            @include('components.footer', ['profile' => $profile])

        </div>
    </div>

    @stack('modals')
    @stack('tooltipscript')

    @livewireScripts




</body>

</html>
