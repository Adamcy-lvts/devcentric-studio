     {{-- Blog Section  --}}
     {{-- <div class="bg-grey-50" id="blog">
        <div class="mx-auto sm:w-10/12 px-5 py-16 md:py-20">
            <h2
                class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
                I also like to write
            </h2>
            <h4
                class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                Check out my latest posts!
            </h4>
            <div
                class="mx-auto grid w-full grid-cols-1 gap-6 pt-12 sm:w-3/4 lg:w-full lg:grid-cols-3 xl:gap-10 mb-5">
                @foreach ($posts as $post)
                <a href="{{route('post.show', $post->slug)}}" class="shadow">
                    <div style="background-image: url({{asset('storage/'.$post->cover_image)}})"
                        class="group relative h-72 bg-cover bg-center bg-no-repeat sm:h-84 lg:h-64 xl:h-72">
                        <span
                            class="absolute inset-0 block bg-gradient-to-b from-blog-gradient-from to-blog-gradient-to bg-cover bg-center bg-no-repeat opacity-10 transition-opacity group-hover:opacity-50"></span>
                        <span
                            class="absolute right-0 bottom-0 mr-4 mb-4 block rounded-full border-2 border-white px-6 py-2 text-center font-body text-sm font-bold uppercase text-white md:text-base">Read
                            More</span>
                    </div>
                    <div class="bg-white py-6 px-5 xl:py-8">
                        <span class="block font-body text-md font-semibold text-black">{{$post->title}}</span>
                        <span class="block pt-2 font-body text-grey-20">{!! \Str::words($post->content, 10) !!}</span>
                    </div>
                </a>
                @endforeach
                
            </div>
            <div class="flex justify-center">
                <a href="{{route('posts')}}">
                <h2 class="text-center text-xs text-teal-600 tracking-widest font-medium title-font mb-1">Check Out All Posts</h2>
            </a>
            </div>
        </div>
    </div> --}}

     <div class="bg-gray-50" id="blog">
         <div class="mx-auto sm:w-10/12 px-5 py-16 md:py-20">
             <h2 class="text-center font-header text-3xl font-semibold uppercase text-primary sm:text-4xl lg:text-5xl">
                 I also like to write
             </h2>
             <h4 class="pt-6 text-center font-header text-xl font-medium text-black hover:text-teal-600 sm:text-2xl lg:text-3xl">
                <a href="{{route('posts')}}">
                 Check out my latest posts!
                </a>
             </h4>
             <div class="mx-auto grid w-full grid-cols-1 gap-6 pt-12 sm:w-3/4 lg:w-full lg:grid-cols-3 xl:gap-10 mb-5">
                 @foreach ($posts as $post)
                     <a href="{{ route('post.show', $post->slug) }}"
                         class="shadow hover:shadow-lg transition-shadow duration-300">
                         <div style="background-image: url({{ asset('storage/' . $post->cover_image) }})"
                             class="group relative h-72 bg-cover bg-center bg-no-repeat sm:h-84 lg:h-64 xl:h-72 overflow-hidden transform transition-transform hover:scale-110">
                             <span
                                 class="absolute inset-0 block bg-gradient-to-b from-blog-gradient-from to-blog-gradient-to bg-cover bg-center bg-no-repeat opacity-10 transition-opacity group-hover:opacity-50"></span>

                                 
                         </div>
                         <div class="bg-white py-6 px-5 xl:py-8">
                             <span class="block font-body text-md font-semibold text-black">{{ $post->title }}</span>
                             {{-- <span class="block pt-2 font-body text-gray-500">{{ $post->description }}</span> --}}
                         </div>
                     </a>
                 @endforeach
             </div>
             <div class="flex justify-center">
                <a href="{{route('posts')}}">
                <h2 class="text-center text-xs text-teal-600 tracking-widest font-medium title-font mb-1">Check Out All Posts</h2>
            </a>
            </div>
         </div>

     </div>
