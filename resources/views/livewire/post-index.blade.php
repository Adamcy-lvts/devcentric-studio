<div>
    <!-- post-index.blade.php -->

    <div class="md:px-24 sm:px-12 lg:px-48 mx-auto py-8">
        <a href="/" class="block text-primary ml-4 sm:ml-0 mb-2 ">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 sm:w-10 text-teal-600 sm:text-gray-500 hover:text-teal-600 gradient-fill" fill="currentColor"
                viewBox="0 0 495.398 495.398">
                <path
                    d="m487.083 225.514-75.08-75.08v-86.73c0-15.682-12.708-28.391-28.413-28.391-15.669 0-28.377 12.709-28.377 28.391v29.941L299.31 37.74c-27.639-27.624-75.694-27.575-103.27.05L8.312 225.514c-11.082 11.104-11.082 29.071 0 40.158 11.087 11.101 29.089 11.101 40.172 0l187.71-187.729c6.115-6.083 16.893-6.083 22.976-.018l187.742 187.747a28.337 28.337 0 0 0 20.081 8.312c7.271 0 14.541-2.764 20.091-8.312 11.086-11.086 11.086-29.053-.001-40.158z" />
                <path
                    d="M257.561 131.836c-5.454-5.451-14.285-5.451-19.723 0L72.712 296.913a13.977 13.977 0 0 0-4.085 9.877v120.401c0 28.253 22.908 51.16 51.16 51.16h81.754v-126.61h92.299v126.61h81.755c28.251 0 51.159-22.907 51.159-51.159V306.79c0-3.713-1.465-7.271-4.085-9.877L257.561 131.836z" />
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

                            <p class=" text-gray-600 text-sm md:text-lg mt-2">{{ $post->description }}</p>


                        </div>
                        <div class="flex justify-between">
                            <div class="hidden lg:block">
                                <x-button href="{{ route('post.show', $post->slug) }}" sm outline teal
                                    label="Read More" />
                            </div>
                            <div class="block lg:hidden">
                                <x-button href="{{ route('post.show', $post->slug) }}" xs outline teal
                                    label="Read More" />
                            </div>
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
