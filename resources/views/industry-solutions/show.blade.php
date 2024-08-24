@extends('layouts.guest')

@section('content')
    <section class="pt-24 bg-gradient-to-b from-white to-gray-100">
        <div class="px-12 mx-auto max-w-7xl">
            <div class="w-full mx-auto text-left md:w-11/12 xl:w-9/12 md:text-center">
                <h1
                    class="mb-8 text-4xl font-extrabold leading-none tracking-normal text-gray-900 md:text-6xl md:tracking-tight">
                    <span>{{ $solution->industry }}</span>
                    <span
                        class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">Software
                        Solutions</span>
                </h1>
                <p class="px-0 mb-8 text-lg text-gray-600 md:text-xl lg:px-24">
                    {{ $solution->description }}
                </p>
                <div class="mb-4 space-x-0 md:space-x-2 md:mb-8">
                    <a href="#features"
                        class="inline-flex items-center justify-center w-full px-6 py-3 mb-2 text-lg text-white bg-green-400 rounded-full hover:bg-green-500 transition-all duration-300 ease-in-out sm:w-auto sm:mb-0">
                        Explore Features
                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#contact"
                        class="inline-flex items-center justify-center w-full px-6 py-3 mb-2 text-lg bg-gray-100 rounded-full hover:bg-gray-200 transition-all duration-300 ease-in-out sm:w-auto sm:mb-0">
                        Request Demo
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
        <div class="w-full mx-auto mt-20 text-center mx-auto md:px-48 ">
            <div class="relative z-0 w-full mt-8">
                <div class="relative overflow-hidden shadow-2xl">

                    <img class="object-cover w-full h-auto rounded-xl md:rounded-3xl" src="{{ asset('img/' . $solution->sample_image) }}"
                        alt="{{ $solution->industry }} Dashboard">
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-20 bg-white">
        <div class="px-12 mx-auto max-w-7xl">
            <h2 class="mb-4 text-3xl font-extrabold text-center">Key Features</h2>
            <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach (json_decode($solution->features, true) as $feature)
                    <div
                        class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-1">
                        <div class="flex items-center mb-4">
                            {!! $feature['icon'] !!}
                            <h3 class="ml-3 text-xl font-semibold">{{ $feature['name'] }}</h3>
                        </div>
                        <p class="text-gray-600 mb-4">{{ $feature['description'] }}</p>
                        <ul class="space-y-2">
                            @foreach ($feature['benefits'] as $benefit)
                                <li class="flex items-center text-sm text-gray-600">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    {{ $benefit }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="px-12 mx-auto max-w-7xl">
            <h2 class="mb-4 text-3xl font-extrabold text-center">Why Choose Our {{ $solution->industry }} Solution?</h2>
            <p class="mb-8 text-lg text-center text-gray-600">
                {{ $solution->why_choose_us }}
            </p>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <div class="p-6 bg-white rounded-xl shadow-md">
                    <h3 class="mb-4 text-xl font-semibold">Key Benefits</h3>
                    <ul class="space-y-2">
                        @foreach (json_decode($solution->key_benefits, true) as $benefit)
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ $benefit }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="p-6 bg-white rounded-xl shadow-md">
                    <h3 class="mb-4 text-xl font-semibold">Our Offerings</h3>
                    <ul class="space-y-2">
                        @foreach (json_decode($solution->our_offerings, true) as $offering)
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $offering }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-20 bg-white">
        <div class="px-12 mx-auto max-w-7xl">
            <h2 class="mb-4 text-3xl font-extrabold text-center">Ready to Transform Your {{ $solution->industry }}
                Operations?</h2>
            <p class="mb-8 text-lg text-center text-gray-600">
                {{ $solution->call_to_action }}
            </p>
            <div class="text-center">
                <a href="#"
                    class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white bg-green-500 rounded-full hover:bg-green-600 transition-all duration-300 ease-in-out">
                    Request a Demo
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
