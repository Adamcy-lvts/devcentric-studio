<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />

    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />

    <title>Homepage | Atom Template</title>

    <meta property="og:title" content="Homepage | Atom Template" />

    <meta property="og:locale" content="en_US" />

    <link rel="canonical" href="//" />

    <meta property="og:url" content="//" />

    <meta name="description"
        content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." />

    <link rel="icon" type="image/png" href="/img/favicon.png" />

    <meta name="theme-color" content="#5540af" />

    <meta property="og:site_name" content="Atom Template" />

    <meta property="og:image" content="/img/social.jpg" />

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:site" content="@tailwindmade" />

    <link crossorigin="crossorigin" href="https://fonts.gstatic.com" rel="preconnect" />

    <link as="style"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Raleway:wght@400;500;600;700&display=swap"
        rel="preload" />

    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Raleway:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    <link crossorigin="anonymous" href="/css/main.min.css" media="screen" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <!-- Scripts -->


    <script defer src="https://unpkg.com/@alpine-collective/toolkit@1.0.0/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


</head>


<body :class="{ 'overflow-hidden max-h-screen': mobileMenu }" class="relative" x-data="{ mobileMenu: false }">

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
                    <div>
                        <a href="/">

                            <h1 class="font-sans font-bold text-3xl md:text-5xl text-white mb-3 uppercase">DEVCENTRIC
                            </h1>
                            <h2 class=" studio text-white text-3xl md:text-5xl">Studio</h2>
                        </a>
                    </div>
                    {{-- Desktop Navigation Menu --}}
                    <div class="hidden lg:block">
                        <ul class="flex items-center">

                            <li class="group pl-6">

                                <span @click="triggerNavItem('#about')"
                                    class="cursor-pointer pt-0.5 font-header  font-light uppercase text-white">About</span>

                                <span class="block h-0.5 w-full bg-transparent group-hover:bg-white"></span>
                            </li>

                            <li class="group pl-6">

                                <span @click="triggerNavItem('#services')"
                                    class="cursor-pointer pt-0.5 font-header  font-light uppercase text-white">Services</span>

                                <span class="block h-0.5 w-full bg-transparent group-hover:bg-white"></span>
                            </li>

                            <li class="group pl-6">

                                <span @click="triggerNavItem('#portfolio')"
                                    class="cursor-pointer pt-0.5 font-header  font-light uppercase text-white">Portfolio</span>

                                <span class="block h-0.5 w-full bg-transparent group-hover:bg-white"></span>
                            </li>

                            <li class="group pl-6">

                                <span @click="triggerNavItem('#clients')"
                                    class="cursor-pointer pt-0.5 font-header  font-light uppercase text-white">Clients</span>

                                <span class="block h-0.5 w-full bg-transparent group-hover:bg-white"></span>
                            </li>

                            <li class="group pl-6">

                                <span @click="triggerNavItem('#work')"
                                    class="cursor-pointer pt-0.5 font-header  font-light uppercase text-white">Work</span>

                                <span class="block h-0.5 w-full bg-transparent group-hover:bg-white"></span>
                            </li>

                            <li class="group pl-6">

                                <span @click="triggerNavItem('#statistics')"
                                    class="cursor-pointer pt-0.5 font-header  font-light uppercase text-white">Statistics</span>

                                <span class="block h-0.5 w-full bg-transparent group-hover:bg-white"></span>
                            </li>

                            <li class="group pl-6">

                                <span @click="triggerNavItem('#blog')"
                                    class="cursor-pointer pt-0.5 font-header  font-light uppercase text-white">Blog</span>

                                <span class="block h-0.5 w-full bg-transparent group-hover:bg-white"></span>
                            </li>

                            <li class="group pl-6">

                                <span @click="triggerNavItem('#contact')"
                                    class="cursor-pointer pt-0.5 font-header  font-light uppercase text-white">Contact</span>

                                <span class="block h-0.5 w-full bg-transparent group-hover:bg-white"></span>
                            </li>

                        </ul>
                    </div>
                    <div class="block lg:hidden">
                        <button @click="mobileMenu = true">
                            <i class="bx bx-menu text-4xl text-white"></i>
                        </button>
                    </div>
                </div>
            </div>
            {{-- Mobile Navigation Menu --}}
            <div class="pointer-events-none fixed inset-0 z-70 min-h-screen bg-black bg-opacity-70 opacity-0 transition-opacity lg:hidden"
                :class="{ 'opacity-100 pointer-events-auto': mobileMenu }">
                <div class="absolute right-0 min-h-screen w-2/3 bg-primary py-4 px-8 shadow md:w-1/3">
                    <button class="absolute top-0 right-0 mt-4 mr-4" @click="mobileMenu = false">
                        <img src="/img/icon-close.svg" class="h-10 w-auto" alt="" />
                    </button>

                    <ul class="mt-8 flex flex-col">

                        <li class="py-2">

                            <span @click="triggerMobileNavItem('#about')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">About</span>

                        </li>

                        <li class="py-2">

                            <span @click="triggerMobileNavItem('#services')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">Services</span>

                        </li>

                        <li class="py-2">

                            <span @click="triggerMobileNavItem('#portfolio')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">Portfolio</span>

                        </li>

                        <li class="py-2">

                            <span @click="triggerMobileNavItem('#clients')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">Clients</span>

                        </li>

                        <li class="py-2">

                            <span @click="triggerMobileNavItem('#work')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">Work</span>

                        </li>

                        <li class="py-2">

                            <span @click="triggerMobileNavItem('#statistics')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">Statistics</span>

                        </li>

                        <li class="py-2">

                            <span @click="triggerMobileNavItem('#blog')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">Blog</span>

                        </li>

                        <li class="py-2">

                            <span @click="triggerMobileNavItem('#contact')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">Contact</span>

                        </li>

                    </ul>
                </div>
            </div>


            <div>
                <div class="relative bg-cover bg-center bg-no-repeat py-8"
                    style="background-image: url(/img/bg-hero.jpg)">
                    <div class="absolute inset-0 z-20 bg-black bg-opacity-90 bg-cover bg-center bg-no-repeat"></div>
                    {{-- Hero Secition  --}}
                    <div class="container relative z-30 pt-20 pb-12 sm:pt-56 sm:pb-48 lg:pt-64 lg:pb-48">
                        <div class="flex flex-col items-center justify-center lg:flex-row">
                            <div class="rounded-full border-8 border-white shadow-xl">
                                <img src="/img/blog-author-1.jpg" class="h-48 rounded-full sm:h-56" alt="author" />
                            </div>
                            <div class="pt-8 sm:pt-10 lg:pl-8 lg:pt-0">
                                <h1
                                    class="text-center font-header text-4xl text-white sm:text-left sm:text-5xl md:text-6xl">
                                    Hello I'm Adam Mohammed!
                                </h1>
                                <div class="flex flex-col justify-center pt-3 sm:flex-row sm:pt-5 lg:justify-start">
                                    <div class="flex items-center justify-center pl-0 sm:justify-start md:pl-1">
                                        <p class="font-body text-lg uppercase text-white">Let's connect</p>
                                        <div class="hidden sm:block">
                                            <i class="bx bx-chevron-right text-3xl text-gray-200"></i>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center pt-5 pl-2 sm:justify-start sm:pt-0">
                                        <a href="/">
                                            <i
                                                class="bx bxl-facebook-square text-2xl text-white hover:text-teal-400"></i>
                                        </a>
                                        <a href="/" class="pl-4">
                                            <i class="bx bxl-twitter text-2xl text-white hover:text-teal-400"></i>
                                        </a>
                                        <a href="/" class="pl-4">
                                            <i class="bx bxl-dribbble text-2xl text-white hover:text-teal-400"></i>
                                        </a>
                                        <a href="/" class="pl-4">
                                            <i class="bx bxl-linkedin text-2xl text-white hover:text-teal-400"></i>
                                        </a>
                                        <a href="/" class="pl-4">
                                            <i class="bx bxl-instagram text-2xl text-white hover:text-teal-400"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Intro Section  --}}
                <div class="bg-grey-50" id="about">
                    <div class="container flex flex-col items-center py-16 md:py-20 lg:flex-row">
                        <div class="w-full text-center sm:w-3/4 lg:w-3/5 lg:text-left">
                            <h2
                                class="font-header text-4xl font-semibold uppercase text-gray-900 sm:text-5xl lg:text-6xl">
                                Who am I?
                            </h2>
                            <h4 class="pt-6 font-header text-xl font-medium text-black sm:text-xl lg:text-2xl">
                                I'm Adam Mohammed, a Web Developer, Graphic Designer & Electrical and Electronics
                                Engineer
                            </h4>
                            <p class="pt-6 font-body leading-relaxed text-grey-20">
                                I am a web developer and graphic designer at DevCentric Studio.
                                With a background in Electrical and Electronics Engineering, I bring a unique blend of
                                technical expertise and creativity to every project.
                                As a tech enthusiast, I love coding and learning new things. I am passionate about
                                creating visually stunning websites, designing captivating graphics,
                                and continuously expanding my knowledge in the ever-evolving field of web development
                                and design.
                                Join me and the talented team at DevCentric Studio to bring your ideas to life.
                                Together, we can make a lasting impact in the digital world.
                            </p>
                            <div class="flex flex-col justify-center pt-6 sm:flex-row lg:justify-start">
                                <div class="flex items-center justify-center sm:justify-start">
                                    <p class="font-body text-lg font-semibold uppercase text-grey-20">
                                        Connect with me
                                    </p>
                                    <div class="hidden sm:block">
                                        <i class="bx bx-chevron-right text-2xl text-gray-500"></i>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center pt-5 pl-2 sm:justify-start sm:pt-0">
                                    <a href="/">
                                        <i
                                            class="bx bxl-facebook-square text-2xl text-gray-500 hover:text-gray-900"></i>
                                    </a>
                                    <a href="/" class="pl-4">
                                        <i class="bx bxl-twitter text-2xl text-gray-500 hover:text-gray-900"></i>
                                    </a>
                                    <a href="/" class="pl-4">
                                        <i class="bx bxl-dribbble text-2xl text-gray-500 hover:text-gray-900"></i>
                                    </a>
                                    <a href="/" class="pl-4">
                                        <i class="bx bxl-linkedin text-2xl text-gray-500 hover:text-gray-900"></i>
                                    </a>
                                    <a href="/" class="pl-4">
                                        <i class="bx bxl-instagram text-2xl text-gray-500 hover:text-gray-900"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full pl-0 pt-10 sm:w-3/4 lg:w-2/5 lg:pl-12 lg:pt-0">
                            <div>
                                <div class="flex items-end justify-between">
                                    <h4 class="font-body font-semibold uppercase text-black">
                                        HTML & CSS
                                    </h4>
                                    <h3 class="font-body text-3xl font-bold text-primary">90%</h3>
                                </div>
                                <div class="mt-2 h-3 w-full rounded-full bg-lila">
                                    <div class="h-3 rounded-full bg-primary" style="width: 90%"></div>
                                </div>
                            </div>
                            <div class="pt-6">
                                <div class="flex items-end justify-between">
                                    <h4 class="font-body font-semibold uppercase text-black">Javascript</h4>
                                    <h3 class="font-body text-3xl font-bold text-primary">70%</h3>
                                </div>
                                <div class="mt-2 h-3 w-full rounded-full bg-lila">
                                    <div class="h-3 rounded-full bg-primary" style="width: 70%"></div>
                                </div>
                            </div>
                            <div class="pt-6">
                                <div class="flex items-end justify-between">
                                    <h4 class="font-body font-semibold uppercase text-black">
                                        PHP
                                    </h4>
                                    <h3 class="font-body text-3xl font-bold text-primary">75%</h3>
                                </div>
                                <div class="mt-2 h-3 w-full rounded-full bg-lila">
                                    <div class="h-3 rounded-full bg-primary" style="width: 75%"></div>
                                </div>
                            </div>
                            <div class="pt-6">
                                <div class="flex items-end justify-between">
                                    <h4 class="font-body font-semibold uppercase text-black">Laravel</h4>
                                    <h3 class="font-body text-3xl font-bold text-primary">90%</h3>
                                </div>
                                <div class="mt-2 h-3 w-full rounded-full bg-lila">
                                    <div class="h-3 rounded-full bg-primary" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- My Services Section  --}}
                <div class="container py-16 md:py-20" id="services">
                    <h2
                        class="text-center font-header text-4xl font-semibold uppercase text-gray-900 sm:text-5xl lg:text-6xl">
                        Here's what I'm good at
                    </h2>
                    <h3 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                        These are the services I offer
                    </h3>

                    <div class="grid grid-cols-1 gap-6 pt-10 sm:grid-cols-2 md:gap-10 md:pt-12 lg:grid-cols-3">


                        <div
                            class="group rounded px-8 py-12 shadow cursor-pointer hover:text-gray-200 text-gray-900  hover:bg-gray-900">

                            <div class="text-center">
                                <div class="flex justify-center mb-5">
                                    <svg class="w-32 h-32 hover:text-gray-200  text-gray-400" fill="currentColor"
                                        viewBox="-8 0 464 464" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m304 432h-160v16h-32v16h224v-16h-32z" />
                                        <path d="m175.06 368-6 48h109.88l-6-48z" />
                                        <path
                                            d="m72 256h304c4.418 0 8-3.582 8-8v-200h-320v200c0 4.418 3.582 8 8 8zm152-48h-32v-16h32zm-64-32v-16h48v16zm16 16v16h-32v-16zm90.344-106.34 11.312-11.312 24 24c3.1211 3.125 3.1211 8.1875 0 11.312l-24 24-11.312-11.312 18.344-18.344zm-33.777-24.633 14.867 5.9531-32 80-14.867-5.9531zm-86.223 37.32 24-24 11.312 11.312-18.344 18.344 18.344 18.344-11.312 11.312-24-24c-3.1211-3.125-3.1211-8.1875 0-11.312zm-18.344 61.656h16v16h-16zm-16 64h96v16h-96z" />
                                        <path
                                            d="m0 328c0 13.254 10.746 24 24 24h400c13.254 0 24-10.746 24-24v-24h-448zm408-8h16v16h-16z" />
                                        <path
                                            d="m424 64h-24v184c0 13.254-10.746 24-24 24h-304c-13.254 0-24-10.746-24-24v-184h-24c-13.254 0-24 10.746-24 24v200h448v-200c0-13.254-10.746-24-24-24z" />
                                        <path
                                            d="m384 8c0-4.418-3.582-8-8-8h-304c-4.418 0-8 3.582-8 8v24h320zm-288 16h-16v-16h16zm32 0h-16v-16h16zm32 0h-16v-16h16z" />
                                    </svg>
                                </div>
                                <h3 class=" text-lg font-semibold uppercase  lg:text-xl">
                                    WEB DEVELOPMENT
                                </h3>
                                <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                                    Empower your business with custom web development solutions that go beyond websites.
                                    From dynamic e-commerce platforms to interactive web portals, we bring your ideas to
                                    life using cutting-edge technologies.
                                </p>
                            </div>
                        </div>
                        <div
                            class="group rounded px-8 py-12 shadow cursor-pointer hover:text-gray-200 text-gray-900  hover:bg-gray-900">
                            <div class="flex justify-center mb-5">
                                <svg class="w-32 h-32 hover:text-gray-200 text-gray-400" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                    viewBox="0 0 316.59 375.69">
                                    <switch>
                                        <g>
                                            <path
                                                d="M153.61 128.21c0 22.62-.06 45.24.06 67.87.02 3.51-.94 5.72-4.21 7.47-7.12 3.82-10.34 11.92-8.29 19.5 4 16.96 29.54 17.13 33.67.13 2.12-7.56-1.05-15.7-8.13-19.56-3.19-1.74-4.34-3.82-4.33-7.41.1-45.62.07-91.24.07-136.86-.88-7.29 7.8-8.27 9.64-1.3 26.69 53.37 53.33 106.75 80.11 160.07 5.68 9.09-24.1 53.14-28.62 67.03-1.32 2.68-2.82 3.45-5.7 3.44-40-.1-80-.1-120 0-2.8.01-4.13-.91-5.35-3.37-9.56-19.36-19.22-38.66-28.99-57.92-1.5-2.95-1.59-5.39-.07-8.41 27.04-53.87 53.98-107.79 80.98-161.69 1.71-5.38 9-6.31 9.13.89.06 10.5.02 21 .02 31.5.01 12.87.01 25.75.01 38.62z" />
                                            <path
                                                d="M303.44 152.77c4.49.39 12.85-1.99 12.76 4.9-1.33 6.43 4.12 31.69-5.32 30.02-6.31-1.42-30.91 4.04-29.73-5.01-.01-8.25.02-16.5-.01-24.75-.26-7.03 7.93-4.84 12.51-5.16.84-59.97-48.92-122.33-118.03-129.39-.27 4.3 1.66 11.67-4.84 11.45-8.43.01-16.86.01-25.29 0-6.7.04-4.51-6.96-4.86-11.82-65.47 7.46-117.2 63.91-118.6 129.75 5.11.42 13.1-2.1 13.07 5.13-1.44 6.41 4.14 31.11-5.18 29.78-6.25-1.37-30.94 3.99-29.87-4.85-.05-8.38-.03-16.75-.02-25.13-.12-6.92 8.24-4.54 12.75-4.93 4.83-62.22 35.78-105.62 93.3-130.63H34.55c-2.75 8.78-11.89 14.5-20.99 12.37C-4.11 31.01-4.35 4.13 13.46.49c7.89-1.91 16.31 2.01 19.8 9.47.92 1.97 1.63 3.17 4.2 3.16 34.4-.31 68.75.33 103.15-.3.39-4.75-2.04-13.18 5.21-12.73 8.18-.07 16.36-.06 24.54 0 7.32-.34 4.86 7.69 5.26 12.73 34.12.61 68.22.01 102.35.27 2.51 0 3.89-.51 5.03-3.08 3.34-7.54 11.84-11.43 19.73-9.54 17.84 3.63 17.62 30.51-.01 34.03-8.02 1.81-16.42-2.06-19.73-9.58-1.13-2.56-2.49-3.09-5-3.08-22.52.08-45.04.05-68.41.05 57.92 25.09 88.87 68.43 93.86 130.88zM157.69 332.13H85.72c-5.38 0-6.67-1.25-6.69-6.55-.02-7.5-.04-14.99.01-22.49.03-4.39 1.47-5.87 5.87-5.87 48.48-.03 96.95-.03 145.43 0 4.57 0 5.91 1.46 5.94 6.19.04 7.5.04 14.99 0 22.49-.02 4.85-1.41 6.23-6.25 6.23-24.12.01-48.23 0-72.34 0zM223.04 341.14c-1.22 6.49 3.46 35.06-3.95 34.46-39.85.2-79.71 0-119.57.07-6.56 0-7.26-.72-7.27-7.35v-27.18h130.79z" />
                                        </g>
                                    </switch>
                                </svg>
                            </div>
                            <div class="text-center">
                                <h3 class=" text-lg font-semibold uppercase  lg:text-xl">
                                    Graphic Design
                                </h3>
                                <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                                    From captivating logos and eye-catching marketing materials to engaging social media
                                    visuals, we ensure your brand stands out in a crowded digital landscape.
                                    Trust us to bring your ideas to life with compelling visuals that leave a lasting
                                    impact.
                                </p>
                            </div>
                        </div>
                        <div
                            class="group rounded px-8 py-12 shadow cursor-pointer hover:text-gray-200 text-gray-900  hover:bg-gray-900">

                            <div class="text-center">
                                <div class="flex justify-center mb-5">
                                    <svg class="w-32 h-32 hover:text-gray-200 text-gray-400" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                        viewBox="0 0 596.85 650.15">
                                        <switch>
                                            <g>
                                                <path
                                                    d="M386.72 297.2c-2.48 4.51-5.1 8.95-7.43 13.54-7.3 14.43-18.67 25.68-29.97 36.7-11.05 10.76-25.4 16.28-40.27 19.74-29.31 6.83-57.7 3.88-84.31-10.42-21.63-11.62-38.02-29.04-50.45-50.07-10.5-17.75-17.97-36.77-21.75-57.11-.47-2.52-1.39-3.77-4.08-3.72-6.86.13-13.72.02-20.58.18-10.16.25-17.97-4.28-23.41-12.38-2.22-3.31-3.61-7.84-3.68-11.85-.36-22.62-.18-45.24-.22-67.87-.01-5.07 1.95-9.61 5.56-12.68 5.39-4.58 7.31-10.47 8.69-16.91 2.94-13.72 6.75-27.18 13.55-39.55 9.04-16.45 20.84-30.56 35.04-43.01 22.43-19.67 48.52-31.26 77.2-37.77 20.43-4.64 41.13-5.16 61.77-2.13 34.98 5.14 66.04 19.12 92.19 43.17 17.1 15.73 29.8 34.64 37.91 56.4 3.25 8.71 5.35 17.87 7.56 26.93 1.08 4.42 2.71 8.29 6.19 11.21 4.39 3.7 6.67 8.6 6.94 14.08.69 13.96 1.01 27.94 1.27 41.92.13 6.99-.02 14-.35 20.99-.32 6.93-1.68 13.66-5.86 19.45-5.35 7.42-13.34 9.34-21.74 9.83-6.6.39-13.25.25-19.86.01-3.16-.11-5.02.95-6.62 3.64-14.55 24.51-36.55 39.59-63.02 48.45-6.98 2.34-14.67 2.62-22.07 3.54-1.46.18-3.42-.7-4.59-1.72-3.39-2.94-7.15-4.42-11.62-4.36-5.5.08-11-.04-16.5.03-8.32.1-15.06 6.38-16.2 14.84-.88 6.56 3.05 16.24 11.65 18.2 9.08 2.07 18.06 2.04 27.08.19 1.61-.33 3.36-1.33 4.46-2.56 3.1-3.46 7.03-4.3 11.38-4.76 17.93-1.89 35.18-6.16 50.89-15.38 4.94-2.9 9.68-6.13 14.51-9.21.26.16.5.29.74.42zM276.09 30.48c-7.59.46-15.28.32-22.77 1.48-26.69 4.11-50.21 15.36-70.68 32.9-19.08 16.35-31.17 37.13-37.84 61.18-1.68 6.04-.28 8.24 5.54 9.87 1.98.56 3.13.29 3.86-2.02 5.53-17.61 15.86-32.21 29.39-44.45 23.49-21.25 52.01-30 82.94-31.81 20.45-1.2 40.58 1.16 60.29 7.19 28.09 8.59 49.19 26 64.45 50.68 3.57 5.77 5.61 12.48 8.55 18.67.55 1.16 2.26 2.84 3.03 2.64 5.22-1.3 7.5-5.25 6.27-10.48-5.83-24.7-19.07-45.12-37.97-61.47-27.13-23.47-58.88-35.2-95.06-34.38zM440.11 431.62c-40.02 19.25-65.63 49.49-74.42 92.64-8.88 43.63 5.46 80.67 34.98 113.86-2.31.19-3.45.36-4.59.36-130.61.01-261.23 0-391.84.07-3.29 0-4.5-.94-4.19-4.27.9-9.68 1.59-19.39 2.42-29.07.92-10.69 1.65-21.4 2.91-32.04 3-25.28 5.81-50.66 13.67-75.01 2.78-8.61 6.95-16.82 10.98-24.97 3.41-6.89 9.5-11.23 16.46-14.11 15.69-6.49 31.45-12.81 47.21-19.12 25.5-10.21 51.11-20.17 76.48-30.69 5.4-2.24 10.19-6.18 14.9-9.82 7.9-6.1 15.48-12.63 23.26-18.89 6.08-4.89 12.63-4.51 19.38-1.49 7.83 3.5 13.9 9.25 19.66 15.36 6.16 6.55 12.1 13.32 18.25 19.88 2.21 2.36 4.87 4.31 7.12 6.64 2.85 2.95 5.41 2.93 8.24-.01 5.88-6.12 11.98-12.03 17.74-18.25 7.39-7.98 14.28-16.54 23.99-21.84 12.4-6.76 16.91-4.86 25.74 1.81 5.87 4.44 11.71 9.02 16.98 14.14 6.9 6.7 15.09 11.1 23.77 14.63 15.95 6.51 32.06 12.62 48.1 18.9.64.24 1.27.57 2.8 1.29z" />
                                                <path
                                                    d="M596.78 545.37c1.03 29.36-9.1 53.03-27.36 72.84-20.95 22.71-48.09 32.09-78.65 31.94-53.41-.25-96.66-47.41-98.08-101.2-1.38-52.43 45.16-102.59 100.32-102.76 58.93-.19 104.09 46.18 103.77 99.18zm-116.79 35.28c0-1.28-.15-3.17.05-5.03.14-1.29.4-2.87 1.22-3.73 4.23-4.41 8.62-8.67 13.05-12.88.71-.67 2.04-1.41 2.81-1.19 3.51 1.04 4.75 5.62 2.45 8.53-1.24 1.56-2.73 2.93-3.89 4.54-.6.84-1.1 2.06-1 3.04.39 3.78 6.32 8.73 10.06 9.51 2.78.58 5.9 1.64 7.88 3.53 6.39 6.12 12.25 12.8 18.48 19.09 2.71 2.73 5.61 5.44 8.89 7.36 1.62.95 5.08.98 6.38-.12 5.21-4.45 9.96-9.44 14.73-14.38 2.01-2.08 2.03-4.41-.16-6.62-9.02-9.15-18.02-18.31-26.95-27.55-.95-.99-2.14-2.7-1.88-3.75 1.71-6.94-3.71-9.43-7.67-12.76-2.19-1.84-4.6-1.57-6.82.29-1.53 1.28-3.11 2.5-4.68 3.73-2.89 2.27-4.59-.15-6.37-1.75-2.11-1.88-.48-3.36.83-4.7 3.24-3.29 6.67-6.4 9.78-9.81 2.06-2.26 4.32-2.63 7.08-2.02 15.62 3.47 30.69-8.54 30.81-24.58.01-1.26-.56-2.53-.87-3.79-1.37.46-2.75.88-4.09 1.41-.44.17-.85.57-1.12.97-3.12 4.56-6.96 4.83-12.08 3.21-9.34-2.97-9.18-2.72-11.83-11.71-1.32-4.48-1.09-7.85 2.86-10.65.76-.54 1.4-1.5 1.7-2.4.48-1.46 1.19-3.23.73-4.47-.28-.76-2.58-1.16-3.93-1.08-15.15.83-26.13 14.33-24.42 29.02.45 3.87.09 7.05-3.02 9.78-2.32 2.04-4.03 4.77-6.37 6.76-5.99 5.11-4.52 5.26-9.5.03-1.03-1.09-2.08-2.17-3.18-3.18-8.82-8.15-17.42-16.42-23.16-27.25-1.39-2.62-4.06-4.75-6.53-6.59-6.52-4.84-10.48-4.46-15.61 1.44-.91 1.05-1.42 3.37-.9 4.58 2.65 6.11 6.32 11.33 12.14 15.22 7.03 4.69 13.59 10.13 20.05 15.6 3.87 3.28 7.03 7.39 10.77 10.84 1.87 1.73 1.89 2.85.16 4.53-2.14 2.08-4.28 4.22-6.11 6.57-3.98 5.11-8.11 9.63-15.55 7.57-.7-.19-1.49-.05-2.24-.04-13.06.07-24.18 9.52-25.96 22.4-.27 1.96.87 4.12 1.35 6.18 2.1-.7 4.72-.84 6.22-2.2 7.03-6.41 18.89-3.37 21.76 5.61 2.1 6.56 2.95 12.5-3.73 17.07-.82.56-1.65 2.47-1.29 3.08.56.96 2.3 2.1 3.2 1.87 4.75-1.23 10.01-1.96 13.96-4.56 8.38-5.46 12.59-13.65 11.51-24.57z" />
                                                <path fill="#FFF"
                                                    d="M276.09 30.48c36.18-.81 67.92 10.92 95.04 34.37 18.91 16.35 32.14 36.78 37.97 61.47 1.23 5.23-1.05 9.18-6.27 10.48-.77.19-2.48-1.49-3.03-2.64-2.94-6.19-4.98-12.9-8.55-18.67-15.25-24.68-36.34-42.1-64.43-50.68-19.7-6.03-39.83-8.39-60.29-7.19-30.93 1.82-59.46 10.57-82.94 31.81-13.54 12.25-23.86 26.84-29.39 44.45-.73 2.32-1.88 2.58-3.86 2.02-5.82-1.63-7.22-3.83-5.54-9.87 6.68-24.05 18.76-44.82 37.84-61.18 20.47-17.54 43.99-28.79 70.68-32.9 7.49-1.15 15.18-1.02 22.77-1.47zM479.99 580.65c1.08 10.93-3.13 19.12-11.48 24.62-3.96 2.61-9.21 3.33-13.96 4.56-.9.23-2.65-.9-3.2-1.87-.35-.61.47-2.52 1.29-3.08 6.69-4.57 5.84-10.51 3.73-17.07-2.88-8.97-14.74-12.02-21.76-5.61-1.5 1.37-4.12 1.5-6.22 2.2-.49-2.07-1.62-4.22-1.35-6.18 1.78-12.88 12.89-22.33 25.96-22.4.75 0 1.54-.15 2.24.04 7.44 2.06 11.57-2.46 15.55-7.57 1.83-2.35 3.97-4.48 6.11-6.57 1.73-1.68 1.72-2.8-.16-4.53-3.74-3.46-6.9-7.56-10.77-10.84-6.46-5.47-13.02-10.92-20.05-15.6-5.83-3.89-9.49-9.11-12.14-15.22-.52-1.21-.01-3.53.9-4.58 5.13-5.9 9.08-6.28 15.61-1.44 2.47 1.83 5.14 3.96 6.53 6.59 5.74 10.83 14.34 19.1 23.16 27.25 1.1 1.02 2.15 2.1 3.18 3.18 4.98 5.23 3.51 5.08 9.5-.03 2.34-2 4.06-4.73 6.37-6.76 3.11-2.74 3.47-5.92 3.02-9.78-1.71-14.7 9.27-28.19 24.42-29.02 1.36-.07 3.66.32 3.93 1.08.46 1.24-.24 3.01-.73 4.47-.3.9-.94 1.86-1.7 2.4-3.95 2.8-4.18 6.17-2.86 10.65 2.65 8.99 2.48 8.74 11.83 11.71 5.12 1.63 8.96 1.35 12.08-3.21.27-.4.69-.8 1.12-.97 1.34-.53 2.72-.95 4.09-1.41.3 1.26.88 2.53.87 3.79-.12 16.04-15.19 28.05-30.81 24.58-2.76-.61-5.02-.24-7.08 2.02-3.11 3.41-6.54 6.52-9.78 9.81-1.31 1.33-2.94 2.81-.83 4.7 1.79 1.59 3.48 4.01 6.37 1.75 1.57-1.23 3.15-2.45 4.68-3.73 2.22-1.86 4.62-2.13 6.82-.29 3.96 3.33 9.38 5.82 7.67 12.76-.26 1.05.93 2.76 1.88 3.75 8.92 9.24 17.93 18.4 26.95 27.55 2.19 2.22 2.17 4.54.16 6.62-4.77 4.93-9.53 9.93-14.73 14.38-1.3 1.11-4.76 1.07-6.38.12-3.28-1.92-6.18-4.63-8.89-7.36-6.24-6.29-12.09-12.97-18.48-19.09-1.97-1.89-5.1-2.96-7.88-3.53-3.75-.78-9.68-5.72-10.06-9.51-.1-.98.4-2.2 1-3.04 1.16-1.61 2.65-2.98 3.89-4.54 2.31-2.91 1.06-7.49-2.45-8.53-.76-.23-2.1.51-2.81 1.19-4.43 4.21-8.82 8.47-13.05 12.88-.82.86-1.08 2.44-1.22 3.73-.23 1.8-.08 3.69-.08 4.98z" />
                                            </g>
                                        </switch>
                                    </svg>
                                </div>
                                <h3 class="pt-8 text-lg font-semibold uppercase  lg:text-xl">
                                    Maintenance and Support
                                </h3>
                                <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                                    We provide reliable and prompt assistance to ensure your systems and websites stay
                                    up and running smoothly.
                                    Our timely updates and technical support keep your digital presence at its best.
                                </p>
                            </div>
                        </div>
                        <div
                            class="group rounded px-8 py-12 shadow cursor-pointer hover:text-gray-200 text-gray-900  hover:bg-gray-900">


                            <div class="text-center">

                                <div class="flex justify-center mb-5">
                                    <svg class="w-32 h-32 hover:text-gray-200 text-gray-400" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                        viewBox="0 0 494.29 475.6">
                                        <switch>
                                            <g>
                                                <path
                                                    d="M270.35 0c10.78 1.62 21.64 2.89 32.34 4.92 29.8 5.66 56.71 18.18 81.23 35.78 41.5 29.79 69.31 69.39 83.67 118.41 5.68 19.39 8.26 39.21 8.07 59.85H256.34V0h14.01z" />
                                                <path
                                                    d="M219.68 37.08v6.73c0 68.34.03 136.67-.08 205.01-.01 3.82 1.14 6.48 3.82 9.15 49.33 49.2 98.58 98.48 147.86 147.73 1.4 1.4 3.02 2.58 4.5 3.82-57.23 62.38-164.03 88.97-254.9 42.66C23.65 402.61-19.87 295.65 8.58 195.65 38.95 88.93 137.42 34.33 219.68 37.08z" />
                                                <path
                                                    d="M494.29 256.28c-1.09 60.81-22.69 112.47-64.55 155.24-52.05-51.78-103.88-103.35-156.03-155.24h220.58z" />
                                            </g>
                                        </switch>
                                    </svg>
                                </div>
                                <h3 class=" text-lg font-semibold uppercase  lg:text-xl">
                                    Digital Marketing
                                </h3>
                                <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                                    Boost your online presence and reach your target audience effectively with our
                                    comprehensive digital marketing solutions.
                                    From strategic planning to execution, we help businesses drive brand awareness,
                                    generate leads,
                                    and increase conversions through data-driven strategies, engaging content, and
                                    targeted advertising campaigns.
                                </p>
                            </div>
                        </div>
                        <div
                            class="group rounded px-8 py-12 shadow cursor-pointer hover:text-gray-200 text-gray-900  hover:bg-gray-900">

                            <div class="text-center">
                                <div class="flex justify-center mb-5">
                                    <svg class="w-32 h-32 hover:text-gray-200 text-gray-400" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                        viewBox="0 0 792.41 749.58">
                                        <switch>
                                            <g>
                                                <g fill-rule="evenodd" clip-rule="evenodd">
                                                    <path
                                                        d="M395.85 639.53H36.03C13.19 639.53 0 626.36 0 603.55V150.68c0-16.59 8.91-28.82 23.85-33.05 2.91-.85 5.86-.92 8.79-.92h448.42c1.61 0 3.64-.71 4.61.87 1.09 1.7-.78 2.98-1.68 4.28-8.79 12.6-17.92 24.96-26.45 37.71-3.1 4.49-6.62 5.86-11.91 5.86-129.19-.14-258.36-.07-387.55-.07-9.41 0-9.41 0-9.41 9.36v359.8c0 1.87.02 3.64.07 5.51.05 2.22 1.18 3.28 3.4 3.28 1.63.07 3.28.07 4.94.07h683.5c2.46 0 3.69-1.21 3.59-3.64 0-1.37.05-2.65.05-4.02V172.49c0-1.35-.05-2.65-.05-4 0-2.72-1.23-3.59-4-3.59-32.01.24-63.95.8-95.88 0-7.26-.19-14.51.28-21.77.38-1.3 0-2.91.29-3.59-1.09-.73-1.56.76-2.44 1.61-3.28 10.87-11.94 22.31-23.38 32.6-35.84 5.72-7.02 11.99-8.72 20.45-8.51 28.39.43 56.76.71 85.13-.07 18.48-.57 33.73 15.6 33.69 33.54-.43 151.79-.43 303.58-.05 455.38.05 19.15-14.73 34.25-34.21 34.18-60.42-.21-120.77-.07-181.2-.07-60.37.01-120.72.01-181.1.01z" />
                                                    <path
                                                        d="M676.57 46.98c-.57 16.67-7.38 32.69-19.91 46.36-24.92 27.23-49.88 54.42-74.89 81.6-16.36 17.82-32.88 35.62-49.27 53.43-25.11 27.33-50.16 54.65-75.27 81.98-12.72 13.88-25.53 27.61-38.23 41.42-11.7 12.72-23.78 25.18-34.33 38.98-8.2 10.59-11.16 10.66-21.49 1.8-5.89-5.08-11.98-9.81-18.01-14.75-5.67-4.56-6.45-8.02-1.96-13.88 9.48-12.44 19.1-24.82 28.11-37.61 26.26-37.63 52.72-75.03 79.12-112.52 31.3-44.35 62.55-88.7 93.85-133.04 11.59-16.45 23.03-32.98 34.73-49.36C590.6 15.24 605.73 4.09 625.68.78c29.24-4.94 51.34 14.35 50.89 46.2zm-41.63-33.76c-16.67-.28-30.31 3.85-41.04 15.51-4.78 5.15-4.54 5.37.59 10.02 1.46 1.35 2.93 2.65 4.28 4.09 2.44 2.41 4.12 2.55 6.01-.87 3.97-7.07 9.48-13.03 15.96-17.94 4.39-3.36 8.79-6.74 14.2-10.81zM396.56 749.53c-36.76 0-73.54 0-110.3-.05-3.66 0-8.46.99-10.07-3.24-1.51-4.07 3-6.15 5.39-8.65 2.03-2.06 4.4-3.99 6.88-5.58 13.19-8.44 20.09-20.38 21.37-35.98.57-7 2.15-14.02 3.12-21.01.5-3.59 2.18-5.01 5.91-5.01 51.6.07 103.21.07 154.84 0 4.04 0 5.51 1.66 6.05 5.37 1.23 8.79 2.93 17.59 4.02 26.38 1.46 12.39 8.25 21.25 17.97 28.34 4.28 3.12 8.53 6.15 12.17 10.07 1.68 1.8 3.62 3.78 2.39 6.52-1.06 2.41-3.59 2.55-5.96 2.69-2.79.14-5.58.14-8.37.14-35.18.01-70.26.01-105.41.01zM257.67 475.35c-16.95.45-33.21-.57-49.24-4.06-2.46-.5-6.5-.57-6.33-3.43.21-2.93 4.23-2.44 6.67-2.44 8.77-.21 17.45-.28 26.15-1.8 14.16-2.51 23.24-10.88 29.01-23.59 4.04-8.89 7-18.11 10.21-27.33 4.44-12.81 12.1-22.88 25.79-26.48 10.8-2.86 21.61-1.7 32.01 2.44 14.16 5.65 25.98 14.25 34.06 27.47 10.9 17.8 2.2 33.19-12.13 40.64-16.36 8.44-33.95 12.58-51.89 15.6-14.85 2.42-29.84 3.5-44.31 2.98z" />
                                                </g>
                                            </g>
                                        </switch>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold uppercase  lg:text-xl">
                                    UX/Ui Design
                                </h3>
                                <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                                    Elevate user experiences and captivate your audience with our exceptional UX/UI
                                    Design services.
                                    Our skilled designers combine user-centric approaches and innovative design
                                    principles to create intuitive and visually striking interfaces.
                                    From wireframing and prototyping to pixel-perfect designs, we craft seamless and
                                    delightful digital experiences across platforms.

                                </p>
                            </div>
                        </div>

                        <div
                            class="group rounded px-8 py-12 shadow cursor-pointer hover:text-gray-200 text-gray-900  hover:bg-gray-900">
                            <div class="text-center">
                                <div class="flex justify-center mb-5">
                                    <svg class="w-32 h-32 hover:text-gray-200 text-gray-400" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                        viewBox="0 0 116.22 116">
                                        <switch>
                                            <g>
                                                <path
                                                    d="M88.52 44.81c1.04 3.02 1.88 5.42 2.82 8.13-3.28.99-4.67 2.64-4.29 6.4.32 3.2-.2 5.99 4.41 6.11-1.08 3.11-1.95 5.63-2.81 8.13-1.8-.15-3.84-.92-4.57-.26-1.9 1.71-3.27 4.02-4.74 6.17-.26.38-.01 1.16.1 1.74.24 1.2 1.17 3.01.71 3.48-1.54 1.55-3.56 2.65-5.44 3.85-.22.14-.9.01-1.02-.2-2.93-4.93-6.28-.55-9.42-.39-.56.03-1.58.88-1.54 1.27.49 4.83-2.91 3.9-5.65 3.91-.98 0-1.95-.1-2.86-.16-.52-1.67-.55-3.87-1.54-4.47-2.17-1.32-4.83-1.84-7.31-2.64-.29-.09-.73.08-1.04.24-4.52 2.38-4.92 2.29-9.15-2.19 1.53-3.41.33-7.85-2.88-10.4-.42-.33-1.1-.42-1.67-.48-1.23-.13-3.26.23-3.55-.33-1-1.95-1.44-4.19-1.97-6.36-.08-.32.4-1.06.74-1.15 5.78-1.55 1.99-6.26 3.06-9.34.12-.34-.52-1.05-.94-1.44-.92-.83-2.81-1.67-2.73-2.33.25-2.17 1.16-4.28 1.93-6.38.11-.3.99-.65 1.26-.5 3.69 2 4.62-1.21 6.15-3.23 2.43-3.21 2.41-3.22.59-7.03 4.82-5.34 5.98-5.57 9.91-1.73 2.79-2.57 9.35-.1 8.75-7.24h5.34c-1.22 3.97-2.23 7.8-3.65 11.47-.37.97-1.91 1.75-3.06 2.12-9.08 2.87-14.98 10.49-15.04 19.63-.06 9.22 5.64 16.91 14.7 19.84 11.92 3.85 25.04-4.59 26.23-17.25.3-3.23 1.42-5.63 3.31-8 2.2-2.79 4.32-5.67 6.86-8.99z" />
                                                <path
                                                    d="M93.51 101.77 96.91 90c1.13.83 1.98 1.46 3.12 2.3 5.21-5.84 8.72-12.64 10.54-20.17 5.24-21.63.06-40.62-16.88-55.07C73.93.23 52-.28 29.26 11.71c-.34-.45-.73-.92-1.05-1.44-.25-.41-.42-.87-.61-1.29C47.13-4.33 77.86-3.51 98.32 15.96c19.76 18.8 25.73 52.38 4.68 79.17.77 1 1.57 2.04 2.59 3.36-1.06.37-1.83.69-2.63.9-2.87.74-5.74 1.45-9.45 2.38zM13.48 20.51c-.78-.95-1.61-1.97-2.76-3.37 3.97-1.01 7.52-1.92 11.82-3.02-.96 4.17-1.79 7.82-2.72 11.87l-3.09-2.25C3.16 37.67-1.62 65.83 12.88 87.79c14.62 22.15 45.75 32.87 74.19 16.31.61.82 1.24 1.66 2.05 2.74-5.54 3.92-11.54 6.15-17.82 7.64-22.39 5.3-46.71-3.41-59.77-22.34-16.59-24.05-14.69-48.06 1.95-71.63z" />
                                                <path
                                                    d="M67.22 65.56c2.44-7.4 4.89-14.8 7.5-22.7H58c2.23-7.43 4.25-14.28 6.36-21.1 2.02-6.52 2.07-6.51 9-6.51h7.75c-2.79 6.35-5.39 12.31-8.22 18.76h18.93c-8.34 11.13-16.1 21.49-23.86 31.86-.25-.1-.5-.2-.74-.31z" />
                                            </g>
                                        </switch>
                                    </svg>
                                </div>
                                <h3 class="pt-8 text-lg font-semibold uppercase  lg:text-xl">
                                    Digital Transformation Consulting
                                </h3>
                                <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                                    Embark on a transformative journey with our comprehensive Digital Transformation
                                    Consulting services.
                                    We empower businesses to adapt, innovate, and thrive in the digital era. Our team of
                                    experts combines strategic insights, technological expertise,
                                    and IT infrastructure optimization to help you leverage the power of digital
                                    technologies.
                                </p>
                            </div>
                        </div>
                    </div>
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
                            <img src="/img/portfolio-apple.jpeg" class="w-full shadow" alt="portfolio image" />
                        </a>
                        <a href="/" class="mx-auto transform transition-all hover:scale-105 md:mx-0">
                            <img src="/img/portfolio-stripe.jpeg" class="w-full shadow" alt="portfolio image" />
                        </a>
                        <a href="/" class="mx-auto transform transition-all hover:scale-105 md:mx-0">
                            <img src="/img/portfolio-fedex.jpeg" class="w-full shadow" alt="portfolio image" />
                        </a>
                        <a href="/" class="mx-auto transform transition-all hover:scale-105 md:mx-0">
                            <img src="/img/portfolio-microsoft.jpeg" class="w-full shadow" alt="portfolio image" />
                        </a>
                    </div>
                </div>

                {{-- Client Section  --}}
                <div class="bg-grey-50" id="clients">
                    <div class="container py-16 md:py-20">
                        <div class="mx-auto w-full sm:w-3/4 lg:w-full">
                            <h2
                                class="text-center font-header text-4xl font-semibold uppercase text-gray-900 sm:text-5xl lg:text-6xl">
                                My latest clients
                            </h2>
                            <div class="flex flex-wrap items-center justify-center pt-4 sm:pt-4">
                                <span class="m-8 block">
                                    <img src="/img/logo-coca-cola.svg" alt="client logo"
                                        class="mx-auto block h-12 w-auto" />
                                </span>
                                <span class="m-8 block">
                                    <img src="/img/logo-apple.svg" alt="client logo"
                                        class="mx-auto block h-12 w-auto" />
                                </span>

                                <span class="m-8 block">
                                    <img src="/img/logo-netflix.svg" alt="client logo"
                                        class="mx-auto block h-12 w-auto" />
                                </span>

                                <span class="m-8 block">
                                    <img src="/img/logo-amazon.svg" alt="client logo"
                                        class="mx-auto block h-12 w-auto" />
                                </span>

                                <span class="m-8 block">
                                    <img src="/img/logo-stripe.svg" alt="client logo"
                                        class="mx-auto block h-12 w-auto" />
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Work Experience Section  --}}
                <div class="container py-16 md:py-20" id="work">
                    <h2
                        class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
                        My work experience
                    </h2>
                    <h3 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                        Here's what I did before freelancing
                    </h3>

                    <div class="relative mx-auto mt-12 flex w-full flex-col lg:w-2/3">
                        <span class="left-2/5 absolute inset-y-0 ml-10 hidden w-0.5 bg-grey-40 md:block"></span>

                        <div class="mt-8 flex flex-col text-center md:flex-row md:text-left">
                            <div class="md:w-2/5">
                                <div class="flex justify-center md:justify-start">
                                    <span class="shrink-0">
                                        <img src="/img/logo-spotify.svg" class="h-auto w-32" alt="company logo" />
                                    </span>
                                    <div class="relative ml-3 hidden w-full md:block">
                                        <span
                                            class="absolute inset-x-0 top-1/2 h-0.5 -translate-y-1/2 transform bg-grey-70"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-3/5">
                                <div class="relative flex md:pl-18">
                                    <span
                                        class="absolute left-8 top-1 hidden h-4 w-4 rounded-full border-2 border-grey-40 bg-white md:block"></span>

                                    <div class="mt-1 flex">
                                        <i class="bx bxs-right-arrow hidden text-primary md:block"></i>
                                        <div class="md:-mt-1 md:pl-8">
                                            <span class="block font-body font-bold text-grey-40">Apr 2015 - Mar
                                                2018</span>
                                            <span
                                                class="block pt-2 font-header text-xl font-bold uppercase text-primary">Frontend
                                                Developer</span>
                                            <div class="pt-2">
                                                <span class="block font-body text-black">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit.
                                                    Vestibulum mattis felis vitae risus pulvinar tincidunt. Nam ac
                                                    venenatis enim.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 flex flex-col text-center md:flex-row md:text-left">
                            <div class="md:w-2/5">
                                <div class="flex justify-center md:justify-start">
                                    <span class="shrink-0">
                                        <img src="/img/logo-microsoft.svg" class="h-auto w-32" alt="company logo" />
                                    </span>
                                    <div class="relative ml-3 hidden w-full md:block">
                                        <span
                                            class="absolute inset-x-0 top-1/2 h-0.5 -translate-y-1/2 transform bg-grey-70"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-3/5">
                                <div class="relative flex md:pl-18">
                                    <span
                                        class="absolute left-8 top-1 hidden h-4 w-4 rounded-full border-2 border-grey-40 bg-white md:block"></span>

                                    <div class="mt-1 flex">
                                        <i class="bx bxs-right-arrow hidden text-primary md:block"></i>
                                        <div class="md:-mt-1 md:pl-8">
                                            <span class="block font-body font-bold text-grey-40">Mar 2018 - September
                                                2019</span>
                                            <span
                                                class="block pt-2 font-header text-xl font-bold uppercase text-primary">Software
                                                Engineer</span>
                                            <div class="pt-2">
                                                <span class="block font-body text-black">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit.
                                                    Vestibulum mattis felis vitae risus pulvinar tincidunt. Nam ac
                                                    venenatis enim.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 flex flex-col text-center md:flex-row md:text-left">
                            <div class="md:w-2/5">
                                <div class="flex justify-center md:justify-start">
                                    <span class="shrink-0">
                                        <img src="/img/logo-fedex.svg" class="h-auto w-32" alt="company logo" />
                                    </span>
                                    <div class="relative ml-3 hidden w-full md:block">
                                        <span
                                            class="absolute inset-x-0 top-1/2 h-0.5 -translate-y-1/2 transform bg-grey-70"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-3/5">
                                <div class="relative flex md:pl-18">
                                    <span
                                        class="absolute left-8 top-1 hidden h-4 w-4 rounded-full border-2 border-grey-40 bg-white md:block"></span>

                                    <div class="mt-1 flex">
                                        <i class="bx bxs-right-arrow hidden text-primary md:block"></i>
                                        <div class="md:-mt-1 md:pl-8">
                                            <span class="block font-body font-bold text-grey-40">October 2019 - Feb
                                                2021</span>
                                            <span
                                                class="block pt-2 font-header text-xl font-bold uppercase text-primary">DevOps
                                                Engineer</span>
                                            <div class="pt-2">
                                                <span class="block font-body text-black">Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit.
                                                    Vestibulum mattis felis vitae risus pulvinar tincidunt. Nam ac
                                                    venenatis enim.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Statistics Section  --}}
                <div class="bg-cover bg-top bg-no-repeat pb-16 md:py-16 lg:py-24"
                    style="background-image: url(/img/experience-figure.png)" id="statistics">
                    <div class="container">
                        <div class="mx-auto w-5/6 bg-white py-16 shadow md:w-11/12 lg:py-20 xl:py-24 2xl:w-full">
                            <div class="grid grid-cols-2 gap-5 md:gap-8 xl:grid-cols-4 xl:gap-5">
                                <div
                                    class="flex flex-col items-center justify-center text-center md:flex-row md:text-left">
                                    <div>
                                        <img src="/img/icon-project.svg" class="mx-auto h-12 w-auto md:h-20"
                                            alt="icon project" />
                                    </div>
                                    <div class="pt-5 md:pl-5 md:pt-0">
                                        <h1 class="font-body text-2xl font-bold text-primary md:text-4xl">
                                            12
                                        </h1>
                                        <h4
                                            class="text-grey-dark font-header text-base font-medium leading-loose md:text-xl">
                                            Finished Projects
                                        </h4>
                                    </div>
                                </div>

                                <div
                                    class="flex flex-col items-center justify-center text-center md:flex-row md:text-left">
                                    <div>
                                        <img src="/img/icon-award.svg" class="mx-auto h-12 w-auto md:h-20"
                                            alt="icon award" />
                                    </div>
                                    <div class="pt-5 md:pl-5 md:pt-0">
                                        <h1 class="font-body text-2xl font-bold text-primary md:text-4xl">
                                            3
                                        </h1>
                                        <h4
                                            class="text-grey-dark font-header text-base font-medium leading-loose md:text-xl">
                                            Awards Won
                                        </h4>
                                    </div>
                                </div>

                                <div
                                    class="mt-6 flex flex-col items-center justify-center text-center md:mt-10 md:flex-row md:text-left lg:mt-0">
                                    <div>
                                        <img src="/img/icon-happy.svg" class="mx-auto h-12 w-auto md:h-20"
                                            alt="icon happy clients" />
                                    </div>
                                    <div class="pt-5 md:pl-5 md:pt-0">
                                        <h1 class="font-body text-2xl font-bold text-primary md:text-4xl">
                                            8
                                        </h1>
                                        <h4
                                            class="text-grey-dark font-header text-base font-medium leading-loose md:text-xl">
                                            Happy Clients
                                        </h4>
                                    </div>
                                </div>

                                <div
                                    class="mt-6 flex flex-col items-center justify-center text-center md:mt-10 md:flex-row md:text-left lg:mt-0">
                                    <div>
                                        <img src="/img/icon-puzzle.svg" class="mx-auto h-12 w-auto md:h-20"
                                            alt="icon puzzle" />
                                    </div>
                                    <div class="pt-5 md:pl-5 md:pt-0">
                                        <h1 class="font-body text-2xl font-bold text-primary md:text-4xl">
                                            99
                                        </h1>
                                        <h4
                                            class="text-grey-dark font-header text-base font-medium leading-loose md:text-xl">
                                            Bugs Fixed
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Blog Section  --}}
                <div class="bg-grey-50" id="blog">
                    <div class="container py-16 md:py-20">
                        <h2
                            class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
                            I also like to write
                        </h2>
                        <h4
                            class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                            Check out my latest posts!
                        </h4>
                        <div
                            class="mx-auto grid w-full grid-cols-1 gap-6 pt-12 sm:w-3/4 lg:w-full lg:grid-cols-3 xl:gap-10">
                            <a href="/post" class="shadow">
                                <div style="background-image: url(/img/post-01.png)"
                                    class="group relative h-72 bg-cover bg-center bg-no-repeat sm:h-84 lg:h-64 xl:h-72">
                                    <span
                                        class="absolute inset-0 block bg-gradient-to-b from-blog-gradient-from to-blog-gradient-to bg-cover bg-center bg-no-repeat opacity-10 transition-opacity group-hover:opacity-50"></span>
                                    <span
                                        class="absolute right-0 bottom-0 mr-4 mb-4 block rounded-full border-2 border-white px-6 py-2 text-center font-body text-sm font-bold uppercase text-white md:text-base">Read
                                        More</span>
                                </div>
                                <div class="bg-white py-6 px-5 xl:py-8">
                                    <span class="block font-body text-lg font-semibold text-black">How to become a
                                        frontend developer</span>
                                    <span class="block pt-2 font-body text-grey-20">Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                                </div>
                            </a>
                            <a href="/post" class="shadow">
                                <div style="background-image: url(/img/post-02.png)"
                                    class="group relative h-72 bg-cover bg-center bg-no-repeat sm:h-84 lg:h-64 xl:h-72">
                                    <span
                                        class="absolute inset-0 block bg-gradient-to-b from-blog-gradient-from to-blog-gradient-to bg-cover bg-center bg-no-repeat opacity-10 transition-opacity group-hover:opacity-50"></span>
                                    <span
                                        class="absolute right-0 bottom-0 mr-4 mb-4 block rounded-full border-2 border-white px-6 py-2 text-center font-body text-sm font-bold uppercase text-white md:text-base">Read
                                        More</span>
                                </div>
                                <div class="bg-white py-6 px-5 xl:py-8">
                                    <span class="block font-body text-lg font-semibold text-black">My personal
                                        productivity system</span>
                                    <span class="block pt-2 font-body text-grey-20">Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                                </div>
                            </a>
                            <a href="/post" class="shadow">
                                <div style="background-image: url(/img/post-03.png)"
                                    class="group relative h-72 bg-cover bg-center bg-no-repeat sm:h-84 lg:h-64 xl:h-72">
                                    <span
                                        class="absolute inset-0 block bg-gradient-to-b from-blog-gradient-from to-blog-gradient-to bg-cover bg-center bg-no-repeat opacity-10 transition-opacity group-hover:opacity-50"></span>
                                    <span
                                        class="absolute right-0 bottom-0 mr-4 mb-4 block rounded-full border-2 border-white px-6 py-2 text-center font-body text-sm font-bold uppercase text-white md:text-base">Read
                                        More</span>
                                </div>
                                <div class="bg-white py-6 px-5 xl:py-8">
                                    <span class="block font-body text-lg font-semibold text-black">My year in review
                                        2020</span>
                                    <span class="block pt-2 font-body text-grey-20">Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Contact Form Section  --}}
                <div class="container py-16 md:py-20" id="contact">
                    <h2
                        class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
                        Here's a contact form
                    </h2>
                    <h4 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                        Have Any Questions?
                    </h4>
                    <div class="mx-auto w-full pt-5 text-center sm:w-2/3 lg:pt-6">
                        <p class="font-body text-grey-10">
                            Lorem ipsum dolor sit amet consectetur adipiscing elit hendrerit
                            condimentum turpis nisl sem, viverra habitasse urna ante lobortis
                            fermentum accumsan. Viverra habitasse urna ante lobortis fermentum
                            accumsan.
                        </p>
                    </div>
                    <form class="mx-auto w-full pt-10 sm:w-3/4">
                        <div class="flex flex-col md:flex-row">
                            <input
                                class="mr-3 w-full rounded border-grey-50 px-4 py-3 font-body text-black md:w-1/2 lg:mr-5"
                                placeholder="Name" type="text" id="name" />
                            <input
                                class="mt-6 w-full rounded border-grey-50 px-4 py-3 font-body text-black md:mt-0 md:ml-3 md:w-1/2 lg:ml-5"
                                placeholder="Email" type="text" id="email" />
                        </div>
                        <textarea class="mt-6 w-full rounded border-grey-50 px-4 py-3 font-body text-black md:mt-8" placeholder="Message"
                            id="message" cols="30" rows="10"></textarea>
                        <button
                            class="mt-6 flex items-center justify-center rounded bg-primary px-8 py-3 font-header text-lg font-bold uppercase text-white hover:bg-grey-20">
                            Send
                            <i class="bx bx-chevron-right relative -right-2 text-3xl"></i>
                        </button>
                    </form>
                    <div class="flex flex-col pt-16 lg:flex-row">
                        <div
                            class="w-full border-l-2 border-t-2 border-r-2 border-b-2 border-grey-60 px-6 py-6 sm:py-8 lg:w-1/3">
                            <div class="flex items-center">
                                <i class="bx bx-phone text-2xl text-grey-40"></i>
                                <p class="pl-2 font-body font-bold uppercase text-grey-40 lg:text-lg">
                                    My Phone
                                </p>
                            </div>
                            <p class="pt-2 text-left font-body font-bold text-primary lg:text-lg">
                                (+881) 111 222 333
                            </p>
                        </div>
                        <div
                            class="w-full border-l-2 border-t-0 border-r-2 border-b-2 border-grey-60 px-6 py-6 sm:py-8 lg:w-1/3 lg:border-l-0 lg:border-t-2">
                            <div class="flex items-center">
                                <i class="bx bx-envelope text-2xl text-grey-40"></i>
                                <p class="pl-2 font-body font-bold uppercase text-grey-40 lg:text-lg">
                                    My Email
                                </p>
                            </div>
                            <p class="pt-2 text-left font-body font-bold text-primary lg:text-lg">
                                name@mydomain.com
                            </p>
                        </div>
                        <div
                            class="w-full border-l-2 border-t-0 border-r-2 border-b-2 border-grey-60 px-6 py-6 sm:py-8 lg:w-1/3 lg:border-l-0 lg:border-t-2">
                            <div class="flex items-center">
                                <i class="bx bx-map text-2xl text-grey-40"></i>
                                <p class="pl-2 font-body font-bold uppercase text-grey-40 lg:text-lg">
                                    My Address
                                </p>
                            </div>
                            <p class="pt-2 text-left font-body font-bold text-primary lg:text-lg">
                                123 New York D Block 1100, 2011 USA
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Map Section  --}}
                <div class="h-72 bg-cover bg-center bg-no-repeat sm:h-64 md:h-72 lg:h-96"
                    style="background-image: url(/img/map.png)"></div>

                {{-- Email Subsrciption Section --}}
                <div class="relative bg-primary bg-cover bg-center bg-no-repeat py-16 bg-blend-multiply lg:py-24"
                    style="background-image: url(/img/bg-cta.jpg)">
                    <div class="container relative z-30">
                        <h3
                            class="text-center font-header text-3xl uppercase leading-tight tracking-wide text-white sm:text-4xl lg:text-5xl">
                            Keep <span class="font-bold">up-to-date</span> <br />
                            with what I'm up to
                        </h3>
                        <form class="mt-6 flex flex-col justify-center sm:flex-row">
                            <input class="w-full rounded px-4 py-3 font-body text-black sm:w-2/5 sm:py-4 lg:w-1/3"
                                type="text" id="email" placeholder="Give me your Email" />
                            <button
                                class="mt-2 rounded bg-yellow px-8 py-3 font-body text-base font-bold uppercase text-primary transition-colors hover:bg-gray-900 hover:text-white focus:border-transparent focus:outline-none focus:ring focus:ring-yellow sm:ml-2 sm:mt-0 sm:py-4 md:text-lg">
                                Join the club
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-primary">
                <div class="container flex flex-col justify-between py-6 sm:flex-row">
                    <p class="text-center font-body text-white md:text-left">
                        © Copyright 2022. All right reserved, ATOM.
                    </p>
                    <div class="flex items-center justify-center pt-5 sm:justify-start sm:pt-0">
                        <a href="/">
                            <i class="bx bxl-facebook-square text-2xl text-white hover:text-yellow"></i>
                        </a>
                        <a href="/" class="pl-4">
                            <i class="bx bxl-twitter text-2xl text-white hover:text-yellow"></i>
                        </a>
                        <a href="/" class="pl-4">
                            <i class="bx bxl-dribbble text-2xl text-white hover:text-yellow"></i>
                        </a>
                        <a href="/" class="pl-4">
                            <i class="bx bxl-linkedin text-2xl text-white hover:text-yellow"></i>
                        </a>
                        <a href="/" class="pl-4">
                            <i class="bx bxl-instagram text-2xl text-white hover:text-yellow"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="/js/main.js"></script>


</body>

</html>
