<x-guest-layout>

    {{-- <div>
        <div class="py-6 md:py-10">
            <div class="mx-auto max-w-4xl">
                <div class="">
                    <h1
                        class="pt-5 font-body pl-8 text-3xl font-semibold text-primary sm:text-4xl md:text-5xl xl:text-5xl">
                        {{ $post->title }}
                    </h1>
                    <div class="flex items-center pt-5 md:pt-10 ml-8">
                        <div>
                            <img src="{{ asset('storage/' . $post->user->profile_photo_path) }}"
                                class="h-20 w-20 rounded-full border-2 border-grey-70 shadow" alt="author image" />
                        </div>
                        <div class="pl-5">
                            <span class="block font-body text-xl font-bold text-grey-10">By
                                {{ $post->user->name }}</span>
                            <span
                                class="block pt-1 font-body text-xl font-bold text-grey-30">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                <div class="prose max-w-none p-8">
                    {!! $post->content !!}
                </div>
                <div class="flex pt-10">
                    <a href="/"
                        class="rounded-xl bg-primary px-4 py-1 font-body font-bold text-white hover:bg-grey-20">Frontend</a>
                    <a href="/"
                        class="ml-2 block rounded-xl bg-primary px-4 py-1 font-body font-bold text-white hover:bg-grey-20">Design</a>
                </div>
                <div class="mt-10 flex justify-between border-t border-lila py-12">
                    @if ($previousPost)
                        <a href="{{ route('post.show', $previousPost->slug) }}" class="flex items-center">
                            <i class="bx bx-left-arrow-alt text-2xl text-primary"></i>
                            <span class="block pl-2 font-body text-lg font-bold uppercase text-primary md:pl-5">Previous
                                Post</span>
                        </a>
                    @endif
                    @if ($nextPost)
                        <a href="{{ route('post.show', $nextPost->slug) }}" class="flex items-center">
                            <span class="block pr-2 font-body text-lg font-bold uppercase text-primary md:pr-5">Next
                                Post</span>
                            <i class="bx bx-right-arrow-alt text-2xl text-primary"></i>
                        </a>
                    @endif
                </div>
                <div>
                    <h2
                        class="pt-10 font-body pl-2 text-2xl font-semibold text-primary sm:text-3xl md:text-4xl xl:text-4xl ">
                        Similar Posts</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8 px-4 sm:px-0">
                        @foreach ($similarPosts as $similarPost)
                            <div class="bg-white rounded-lg shadow-lg">
                                <img src="{{ asset('storage/' . $similarPost->cover_image) }}"
                                    alt="{{ $similarPost->title }}" class="h-64 w-full object-cover">
                                <div class="p-6">
                                    <h3 class="sm:text-md font-semibold text-primary">{{ $similarPost->title }}</h3>
                                    <p class="text-gray-500">{{ $similarPost->created_at->format('M d, Y') }}</p>
                                    <a href="{{ route('post.show', $similarPost->slug) }}"
                                        class="mt-4 block text-primary font-semibold hover:underline">Read
                                        More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div>
        <div class="mt-10 flex justify-around">
            <a href="{{ route('posts') }}" class="block text-primary font-semibold hover:underline">Back
                to Posts</a>
            <a href="/" class="block text-primary font-semibold hover:underline">
                <svg
                    class="w-8 sm:w-10 text-gray-500 hover:text-teal-600 gradient-fill"  fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70.81 62.03">
                    <path
                        d="M58.5 62a2.3 2.3 0 0 0 2.3-2.29V35.24h6a4 4 0 0 0 2.48-7.09l-7.75-6.75V10.16a2.38 2.38 0 0 0-2.38-2.38h-4.92a2.38 2.38 0 0 0-2.38 2.38V13L38 1a4 4 0 0 0-5.22 0L1.37 28.25a4 4 0 0 0 2.61 7h6v24.5A2.3 2.3 0 0 0 12.29 62h13.54V44.21a4.56 4.56 0 0 1 4.56-4.55h10A4.56 4.56 0 0 1 45 44.21V62Z"
                        data-name="Layer 2"  />
                </svg>
             
            </a>
        </div>
        <div class="py-6 md:py-10">
            <div class="mx-auto max-w-4xl">
                <div class="">
                    <h1
                        class="pt-5 font-body pl-8 text-3xl font-semibold text-primary sm:text-4xl md:text-5xl xl:text-5xl">
                        {{ $post->title }}
                    </h1>
                    <div class="flex items-center pt-5 md:pt-10 ml-8">
                        <div>
                            <img src="{{ asset('storage/' . $post->user->profile_photo_path) }}"
                                class="h-20 w-20 rounded-full border-2 border-grey-70 shadow" alt="author image" />
                        </div>
                        <div class="pl-5">
                            <span class="block font-body text-xl font-bold text-grey-10">By
                                {{ $post->user->name }}</span>
                            <span
                                class="block pt-1 font-body text-xl font-bold text-grey-30">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                <div class="prose max-w-none p-8">
                    {!! $post->content !!}
                </div>
                <div class="flex pt-10">
                    <a href="/"
                        class="rounded-xl bg-primary px-4 py-1 font-body font-bold text-white hover:bg-grey-20">Frontend</a>
                    <a href="/"
                        class="ml-2 block rounded-xl bg-primary px-4 py-1 font-body font-bold text-white hover:bg-grey-20">Design</a>
                </div>
                <div class="mt-10 flex justify-between border-t border-lila py-12">
                    @if ($previousPost)
                        <a href="{{ route('post.show', $previousPost->slug) }}" class="flex items-center">
                            <i class="bx bx-left-arrow-alt text-2xl text-primary"></i>
                            <span class="block pl-2 font-body text-lg font-bold uppercase text-primary md:pl-5">Previous
                                Post</span>
                        </a>
                    @endif
                    @if ($nextPost)
                        <a href="{{ route('post.show', $nextPost->slug) }}" class="flex items-center">
                            <span class="block pr-2 font-body text-lg font-bold uppercase text-primary md:pr-5">Next
                                Post</span>
                            <i class="bx bx-right-arrow-alt text-2xl text-primary"></i>
                        </a>
                    @endif
                </div>
                <div>
                    <h2
                        class="pt-10 font-body pl-2 text-2xl font-semibold text-primary sm:text-3xl md:text-4xl xl:text-4xl ">
                        Similar Posts</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8 px-4 sm:px-0">
                        @foreach ($similarPosts as $similarPost)
                            <div class="bg-white rounded-lg shadow-lg">
                                <img src="{{ asset('storage/' . $similarPost->cover_image) }}"
                                    alt="{{ $similarPost->title }}" class="h-64 w-full object-cover">
                                <div class="p-6">
                                    <h3 class="sm:text-md font-semibold text-primary">{{ $similarPost->title }}</h3>
                                    <p class="text-gray-500">{{ $similarPost->created_at->format('M d, Y') }}</p>
                                    <a href="{{ route('post.show', $similarPost->slug) }}"
                                        class="mt-4 block text-primary font-semibold hover:underline">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>


    @push('duration')
        <script>
            var duration = 0;
            var timer = setInterval(function() {
                duration++;
            }, 60000); // Increment duration every minute (60000 milliseconds)
        </script>

        <script>
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            window.addEventListener("beforeunload", function() {
                // Make an AJAX request to store the duration
                var postID = "{{ $post->id }}"; // Replace with your actual post ID
                var url = "/store-duration"; // Replace with the endpoint URL to store the duration

                var data = {
                    post_id: postID,
                    duration: duration,
                };


                // Make the AJAX request
                fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken
                    },
                    body: JSON.stringify(data),
                });
            });
        </script>
    @endpush
</x-guest-layout>
