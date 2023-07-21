<div>
    <!-- post-index.blade.php -->

    <div class="md:px-24 sm:px-12 lg:px-48 mx-auto py-8">
        <a href="/" class="block text-primary font-semibold hover:underline">
            <svg
                class="w-8 sm:w-10 text-gray-500 hover:text-teal-600 gradient-fill"  fill="currentColor"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70.81 62.03">
                <path
                    d="M58.5 62a2.3 2.3 0 0 0 2.3-2.29V35.24h6a4 4 0 0 0 2.48-7.09l-7.75-6.75V10.16a2.38 2.38 0 0 0-2.38-2.38h-4.92a2.38 2.38 0 0 0-2.38 2.38V13L38 1a4 4 0 0 0-5.22 0L1.37 28.25a4 4 0 0 0 2.61 7h6v24.5A2.3 2.3 0 0 0 12.29 62h13.54V44.21a4.56 4.56 0 0 1 4.56-4.55h10A4.56 4.56 0 0 1 45 44.21V62Z"
                    data-name="Layer 2"  />
            </svg>
         
        </a>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center mb-6 px-5 sm:px-0">
            <h1 class="text-2xl font-bold">All Posts</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" placeholder="Search" wire:model="search"
                    class="border border-gray-300 rounded-lg px-4 py-2 mb-2 md:mr-4 md:mb-0 w-full md:w-auto transition duration-300 focus:ring-blue-500 focus:border-blue-500">
                <select wire:model="category"
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full md:w-auto transition duration-300 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="grid grid-cols-1 gap-6 px-5 sm:px-0">
            @foreach ($posts as $post)
                <div
                    class="border border-gray-300 shadow-lg flex flex-col md:flex-row flex-wrap transition duration-300 hover:shadow-xl">
                    <div class="relative md:w-1/3 flex-shrink-0">
                        <a href="{{ route('post.show', $post->slug) }}">
                            <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}"
                                class="w-full h-64 md:h-auto object-cover transition duration-300 transform hover:scale-105">
                        </a>
                    </div>
                    <div class="p-4 flex flex-col justify-between flex-grow md:w-2/3">
                        <div class="mb-3 md:mb-0">
                            <a href="{{ route('post.show', $post->slug) }}">
                                <h2 class="text-lg font-semibold">{{ $post->title }}</h2>
                            </a>
                            <div class="hidden xl:block">
                                <p class="text-gray-600 text-sm md:text-lg mt-2">{!! \Str::words($post->content, 60) !!}</p>
                            </div>

                            <div class="block lg:hidden">
                                <p class=" text-gray-600 text-sm md:text-lg mt-2">{!! \Str::words($post->content, 20) !!}</p>
                            </div>

                        </div>
                        <div class="flex justify-between">
                            <x-button href="{{ route('post.show', $post->slug) }}" sm outline teal label="Read More" />
                            <p class="text-gray-600 text-sm mt-2">
                                Published on {{ $post->created_at->format('M d, Y') }} by {{ $post->user->name }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>

       


</div>
