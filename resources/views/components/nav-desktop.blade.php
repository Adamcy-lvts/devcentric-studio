                    {{-- Desktop Navigation Menu --}}

                    <nav class="bg-gray-900 p-16" x-data="{ open: false }">

                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link
                                class="  font-light uppercase text-white hover:text-teal-400 hover:border-teal-300 focus:text-teal-700 focus:border-teal-300"
                                @click="triggerNavItem('#about')" >
                                {{ __('About') }}
                            </x-jet-nav-link>

                            <x-jet-nav-link
                                class="  font-light uppercase text-white hover:text-teal-400 hover:border-teal-300 focus:text-teal-700 focus:border-teal-300"
                                @click="triggerNavItem('#services')" >
                                {{ __('Services') }}
                            </x-jet-nav-link>

                            <x-jet-nav-link
                                class="  font-light uppercase text-white hover:text-teal-400 hover:border-teal-300 focus:text-teal-700 focus:border-teal-300"
                                @click="triggerNavItem('#portfolio')" >
                                {{ __('Portfolio') }}
                            </x-jet-nav-link>

                            <x-jet-nav-link
                                class="  font-light uppercase text-white hover:text-teal-400 hover:border-teal-300 focus:text-teal-700 focus:border-teal-300"
                                @click="triggerNavItem('#contact')" >
                                {{ __('Contact') }}
                            </x-jet-nav-link>

                            <x-jet-nav-link
                                class=" font-light uppercase text-white hover:text-teal-400 hover:border-teal-300 focus:text-teal-700 focus:border-teal-300"
                                @click="triggerNavItem('#blog')" >
                                {{ __('Blog') }}
                            </x-jet-nav-link>
                        </div>
                  
                    </nav>
