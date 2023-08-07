<nav x-data="{ open: false }" class="block sm:hidden px-5">
    {{-- Mobile Navigation Menu --}}
    <div class="flex justify-between h-16">
        <!-- Logo -->
        <div class="">
            <a href="/">

                <h1 class="font-sans font-bold text-3xl md:text-5xl text-white mb-3 uppercase">DEVCENTRIC
                </h1>
                <h2 class=" studio text-white text-3xl md:text-5xl">Studio</h2>
            </a>
        </div>

        <!-- Hamburger -->
        <div class="-mr-2 flex items-center ">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-transparent focus:outline-none focus:bg-transparent focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6 bg-transparent" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden w-full mt-5">
        <div class="">
            <x-jet-responsive-nav-link @click="triggerNavItem('#about')"
                class="font-light hover:bg-white hover:bg-opacity-50 uppercase text-white cursor-pointer hover:text-teal-400 hover:border-teal-300 focus:bg-gray-50 focus:opacity-50 focus:text-teal-700 focus:border-teal-300 hover:bg-transparent"
                >
                {{ __('About') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link @click="triggerNavItem('#services')"
                class="font-light hover:bg-white hover:bg-opacity-50 uppercase text-white cursor-pointer hover:text-teal-400 hover:border-teal-300 focus:bg-gray-50 focus:opacity-50 focus:text-teal-700 focus:border-teal-300 hover:bg-transparent"
                >
                {{ __('Services') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link @click="triggerNavItem('#portfolio')"
            class="font-light hover:bg-white hover:bg-opacity-50 uppercase text-white cursor-pointer hover:text-teal-400 hover:border-teal-300 focus:bg-gray-50 focus:opacity-50 focus:text-teal-700 focus:border-teal-300 hover:bg-transparent"
            >
            {{ __('Portfolio') }}
        </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link @click="triggerNavItem('#contact')"
                class="font-light hover:bg-white hover:bg-opacity-50 uppercase text-white cursor-pointer hover:text-teal-400 hover:border-teal-300 focus:bg-gray-50 focus:opacity-50 focus:text-teal-700 focus:border-teal-300 hover:bg-transparent"
                >
                {{ __('Contact') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link @click="triggerNavItem('#blog')"
                class="font-light hover:bg-white hover:bg-opacity-50 uppercase text-white cursor-pointer hover:text-teal-400 hover:border-teal-300 focus:bg-gray-50 focus:opacity-50 focus:text-teal-700 focus:border-teal-300 hover:bg-transparent"
                >
                {{ __('Blog') }}
            </x-jet-responsive-nav-link>
        </div>

    </div>
</nav>
