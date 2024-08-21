<div>
    <div>
        <!-- Hero Section -->
        <section class="relative w-full h-auto bg-bottom bg-no-repeat bg-cover"
            style="background-image: url('{{ $hero->image }}');">
            <div class="absolute inset-0 z-0 h-full bg-black opacity-70"></div>
            <div class="flex items-center justify-center h-auto py-32 mx-auto md:py-40 lg:py-48 xl:py-56 2xl:py-64">
                <div class="z-10 flex flex-col items-start px-8 md:items-center xl:px-0">
                    <h1
                        class="w-full mt-1 text-5xl font-black text-left text-white sm:w-auto md:text-6xl lg:text-7xl xl:text-8xl md:text-center">
                        {{ $hero->title }}
                    </h1>
                    <p
                        class="w-full max-w-xl my-6 text-xl font-normal text-left text-gray-200 lg:max-w-2xl md:text-center">
                        {{ $hero->description }}
                    </p>
                    <div class="flex flex-col justify-center w-full sm:flex-row md:mt-10 sm:w-auto">
                        <a href="{{ $hero->cta_link }}"
                            class="w-full px-8 py-2 m-2 text-center text-white bg-blue-600 border-2 border-blue-600 rounded-full sm:w-auto hover:bg-transparent">
                            {{ $hero->cta_text }}
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="w-full sm:p-8">
            <div class="grid grid-cols-1 mx-auto max-w-7xl lg:grid-cols-2 md:gap-8">
                @foreach ($services as $service)
                    <div class="overflow-hidden text-center bg-black p-8" data-rounded=""
                        data-rounded-max="rounded-full">
                        <div class="flex flex-col items-center justify-center h-full">
                            <div class="w-24 h-24 mb-6 flex items-center justify-center">
                                {!! $service->icon !!}
                            </div>
                            <p class="text-xl text-gray-100 mb-6">{{ $service->title }}</p>
                            <p class="text-gray-300">{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="w-full bg-white">
            <div class="flex flex-col px-12 py-20 mx-auto max-w-7xl lg:flex-row">
                <div class="relative w-full mb-10 lg:text-left sm:text-center lg:w-1/2 xl:w-7/12 lg:mb-0">
                    <h2 class="text-5xl font-bold sm:text-6xl mt-7">{{ $whyChooseUs->title }}</h2>
                    <p class="text-gray-600 lg:max-w-sm mt-9">{{ $whyChooseUs->description }}</p>
                    <ul class="relative max-w-md mx-auto lg:mx-0">
                        @foreach (json_decode($whyChooseUs->items) as $item)
                            <li class="flex pl-6 mt-5">
                                <svg class="absolute left-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-600">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <!-- Success Stories Section -->
        <section class="py-20 bg-white">
            <div class="flex flex-col px-8 mx-auto space-y-12 max-w-7xl xl:px-12">
                <div class="relative">
                    <h2 class="w-full text-3xl font-bold text-center sm:text-4xl md:text-5xl">Our Success Stories</h2>
                    <p class="w-full py-8 mx-auto -mt-2 text-lg text-center text-gray-700 intro sm:max-w-3xl">At
                        DevCentric Solutions, we deliver innovative software that transforms business operations,
                        enhances financial management, and streamlines processes for growing enterprises and
                        institutions across various sectors.</p>
                </div>
                @foreach ($successStories as $story)
                    <div class="flex flex-col mb-8 animated fadeIn sm:flex-row">
                        <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12 sm:order-last">
                            <img class="rounded-lg shadow-xl" src="{{ $story->image }}" alt="{{ $story->title }}">
                        </div>
                        <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pr-16">
                            <h3 class="mt-2 text-2xl sm:text-left md:text-4xl">{{ $story->title }}</h3>
                            <p class="mt-5 text-lg text-gray-700 text md:text-left">{{ $story->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Our Approach Section -->
        <section class="bg-white">
            <div
                class="items-center w-full px-0 py-10 sm:py-12 md:py-16 mx-auto md:px-12 lg:px-16 xl:px-32 max-w-7xl relative">
                <div class="lg:text-center md:px-0 px-10">
                    <h2 class="text-3xl font-extrabold text-black lg:text-7xl tracking-tighter">{{ $approach->title }}
                    </h2>
                    <p class="max-w-2xl lg:mx-auto mt-4 text-lg leading-7 tracking-tight text-neutral-600">
                        {{ $approach->description }}</p>
                </div>
                <div
                    class="grid items-start grid-cols-1 mt-10 lg:mt-12 gap-16 md:grid-cols-2 bg-neutral-50 md:rounded-2xl lg:rounded-[4rem] p-10 lg:p-20">
                    <div class="relative">
                        <ul class="list-none mt-6 space-y-4" role="list">
                            @foreach (json_decode($approach->steps) as $step)
                                <li>
                                    <div class="relative flex items-start">
                                        <svg class="text-blue-500 h-5 w-5 translate-y-0.5 shrink-0" fill="none"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                                            stroke-width="1.5">
                                            <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-neutral-500 text-sm leading-6 ml-2"><strong
                                                class="font-semibold text-neutral-900">{{ $step->title }}</strong> —
                                            {{ $step->description }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Industry Solutions Section -->
        <section class="bg-gray-100 py-24">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-extrabold text-gray-900 sm:text-5xl mb-4">Tailored Software Solutions for
                        Every Industry</h2>
                    <p class="max-w-3xl mx-auto text-xl text-gray-600">We craft cutting-edge software solutions tailored
                        to the unique needs of various industries. Explore how our expertise can transform your sector
                        and drive innovation.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($industrySolutions as $solution)
                        <div class="bg-white rounded-md shadow-lg transition duration-300 ease-in-out hover:shadow-2xl">
                            <div class="p-8 text-center">
                                <div
                                    class="w-24 h-24 mx-auto flex items-center justify-center bg-blue-100 text-blue-500 rounded-md mb-6">
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

        <!-- About Us Section -->
        <section id="aboutus" class="text-gray-600 body-font border-t border-gray-200 bg-white">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-20">
                    <h2 class="text-xs text-blue-600 tracking-widest font-medium title-font mb-1">DRIVING DIGITAL
                        TRANSFORMATION</h2>
                    <h1 class="sm:text-4xl text-3xl font-bold title-font text-gray-900">{{ $aboutUs->title }}</h1>
                </div>
                <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                    <p class="leading-relaxed text-lg mb-4">{{ $aboutUs->content }}</p>
                    <ul class="text-left list-disc pl-6 mt-4 space-y-2 mb-4">
                        @foreach (json_decode($aboutUs->expertise_areas) as $area)
                            <li>{{ $area }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <!-- Our Mission Section -->
        <section id="ourmission" class="text-gray-600 body-font border-t border-gray-200 bg-gray-50">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-20">
                    <h2 class="text-xs text-blue-600 tracking-widest font-medium title-font mb-1">INNOVATE • BUILD •
                        TRANSFORM</h2>
                    <h1 class="sm:text-4xl text-3xl font-bold title-font text-gray-900">{{ $ourMission->title }}</h1>
                </div>
                <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                    <p class="leading-relaxed text-lg">{{ $ourMission->content }}</p>
                    <ul class="text-left list-disc pl-6 mt-4 space-y-2">
                        @foreach (json_decode($ourMission->mission_points) as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                    <span class="inline-block h-1 w-10 rounded bg-blue-500 mt-8 mb-6"></span>
                    <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">{{ $ourMission->ceo_name }}
                    </h2>
                    <p class="text-gray-500">{{ $ourMission->ceo_title }}</p>
                </div>
            </div>
        </section>
    </div>
</div>
