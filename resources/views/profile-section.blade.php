<div class="bg-grey-50" id="about" style="background-image: url('{{ asset('img/bg_triangles_pattern.webp') }}')">
    <div class=" sm:w-10/12 mx-auto flex flex-col items-center py-16 md:py-20 lg:flex-row">
        <div class="w-full text-center sm:w-3/4 lg:w-3/5 lg:text-left">
            <h2 class="font-header text-4xl font-semibold uppercase text-gray-900 sm:text-5xl lg:text-6xl">
                Who am I?
            </h2>
            <h4 class="pt-6 font-header text-xl font-medium text-black sm:text-xl lg:text-2xl">
                I'm {{ $profile->name }}, a {{ $profile->title }}
            </h4>
            <p class="pt-6 font-body leading-relaxed text-grey-20 px-4 md:px-0">
                {!! $profile->about_me  !!}
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
                    <a href="{{$profile->facebook ?? ''}}" target="_blank">
                        <i class="bx bxl-facebook-square text-2xl text-gray-500 hover:text-gray-900"></i>
                    </a>
                    <a href="{{$profile->twitter ?? ''}}" target="_blank" class="pl-4">
                        <i class="bx bxl-twitter text-2xl text-gray-500 hover:text-gray-900"></i>
                    </a>
                    <a href="{{$profile->whatsapp ?? ''}}" target="_blank" class="pl-4">
                        <i class="bx bxl-whatsapp text-2xl text-gray-500 hover:text-gray-900"></i>
                    </a>
                    <a href="{{$profile->linkedin ?? ''}}" target="_blank" class="pl-4">
                        <i class="bx bxl-linkedin text-2xl text-gray-500 hover:text-gray-900"></i>
                    </a>
                    <a href="{{$profile->instagram ?? ''}}" target="_blank" class="pl-4">
                        <i class="bx bxl-instagram text-2xl text-gray-500 hover:text-gray-900"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="w-full pl-0 pt-10 sm:w-3/4 lg:w-2/5 lg:pl-12 lg:pt-0">
      

            @foreach ($profile->skills as $skill)
                <div class="candidatos">
                    <div
                        class="flex items-centre absolute top-0 left-1 w-12 h-12 rounded-full border-2 border-gray-300 p-1">
                        {!! $skill->svg_code !!}
                    </div>
                    <div class="parcial">
                        <div class="info">
                            <div class="nome">{{ $skill->name }}</div>
                            <div class="percentagem-num">{{ $skill->rating }}%</div>
                        </div>
                        <div class="progressBar">
                         {{-- {{dd($skill->bg_color)}} --}}
                            <div class="percentagem {{ $skill->bg_color }}" style="width: {{ $skill->rating }}%;"></div>
                        </div>
                        <div class="partidas"></div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>
</div>
