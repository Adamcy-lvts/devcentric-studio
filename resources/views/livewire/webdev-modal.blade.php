<div>

    {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($services as $service)
            <div wire:click="servicesInfo({{ $service->id }})"
                class="rounded px-8 py-12 shadow cursor-pointer  bg-gray-900 md:bg-gray-50 md:hover:bg-gray-900 text-gray-200 md:text-gray-900 md:hover:text-gray-200 transition-colors duration-300">
                <div class="text-center">
                    <div class="flex justify-center mb-5">
                        {!! $service->svg_code !!}
                    </div>
                    <h3 class="text-lg font-semibold  uppercase lg:text-xl">
                        {{ $service->name }}
                    </h3>
                    <p class=" pt-4 text-sm group-hover:text-white md:text-base">
                        {{ $service->details }}
                    </p>
                </div>
            </div>
        @endforeach
    </div> --}}


<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($services as $service)
        <div wire:click="servicesInfo({{ $service->id }})"
            class="relative rounded px-8 py-12 shadow cursor-pointer bg-gray-900 md:bg-gray-50 md:hover:bg-gray-900 text-gray-200 md:text-gray-900 md:hover:text-gray-200 transition-colors duration-300 glow"
            x-data="{ tooltip: false }" x-on:mouseenter="tooltip = true" x-on:mouseleave="tooltip = false">
            <div class="text-center">
                <div class="flex justify-center mb-5">
                    {!! $service->svg_code !!}
                </div>
                <h3 class="text-lg font-semibold uppercase lg:text-xl">
                    {{ $service->name }}
                </h3>
                <p class="pt-4 text-sm group-hover:text-white md:text-base">
                    {{ $service->details }}
                </p>
            </div>
            <template x-if="tooltip">
                <div x-cloak class="absolute z-10 inline-block px-3 py-2 text-xs font-medium text-gray-00 bg-gray-900 rounded-lg shadow-sm tooltip dark:bg-gray-700"
                    x-ref="tooltip"
                    x-bind:style="`bottom: calc(100% + 10px); left: 50%; transform: translateX(-50%);`">
                    <div>
                        Click me for more info on this service
                    </div>
                    <div class="tooltip-arrow"></div>
                </div>
            </template>
        </div>
    @endforeach
</div>





    <x-modal.card title="{{ $moreInfo->name ?? '' }}" max-width="6xl" wire:model="webdevServ">
        <style>
            .modal-content h1 {
                font-size: 28px;
                font-weight: bold;
                margin-bottom: 20px;
            }
    
            .modal-content h2 {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 15px;
            }
    
            .modal-content h3 {
                font-size: 20px;
                font-weight: bold;
                margin-bottom: 10px;
            }
    
            .modal-content ul {
                list-style-type: disc;
                margin-left: 20px;
                margin-bottom: 15px;
            }
    
            .modal-content li {
                font-weight: 600;
                margin-bottom: 5px;
            }
    
            .modal-content p {
                font-size: 16px;
                font-weight: normal;
                margin-bottom: 15px;
            }
    
            @media (max-width: 768px) {
                .modal-content h1 {
                    font-size: 24px;
                }
    
                .modal-content h2 {
                    font-size: 20px;
                }
    
                .modal-content h3 {
                    font-size: 18px;
                }
    
                .modal-content ul {
                    margin-left: 15px;
                }
            }
        </style>
    
        <div class="p-3 modal-content">
            {!! $moreInfo->detail_info ?? '' !!}
        </div>



        <x-slot name="footer">
            <x-button flat label="Close" x-on:click="close" />
        </x-slot>

    </x-modal.card>

</div>
