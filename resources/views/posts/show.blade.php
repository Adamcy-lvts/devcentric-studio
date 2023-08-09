<x-guest-layout>

    <div>
        <div class="mt-10 flex justify-between p-5 sm:p-0 sm:w-7/12 sm:mx-auto">
            <a href="{{ route('posts') }}" class="block text-primary font-semibold hover:underline">Back
                to Posts</a>
            <a href="/" class="block text-primary font-semibold hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 sm:w-10 text-teal-600 sm:text-gray-500 hover:text-teal-600 gradient-fill" fill="currentColor"
                viewBox="0 0 495.398 495.398">
                <path
                    d="m487.083 225.514-75.08-75.08v-86.73c0-15.682-12.708-28.391-28.413-28.391-15.669 0-28.377 12.709-28.377 28.391v29.941L299.31 37.74c-27.639-27.624-75.694-27.575-103.27.05L8.312 225.514c-11.082 11.104-11.082 29.071 0 40.158 11.087 11.101 29.089 11.101 40.172 0l187.71-187.729c6.115-6.083 16.893-6.083 22.976-.018l187.742 187.747a28.337 28.337 0 0 0 20.081 8.312c7.271 0 14.541-2.764 20.091-8.312 11.086-11.086 11.086-29.053-.001-40.158z" />
                <path
                    d="M257.561 131.836c-5.454-5.451-14.285-5.451-19.723 0L72.712 296.913a13.977 13.977 0 0 0-4.085 9.877v120.401c0 28.253 22.908 51.16 51.16 51.16h81.754v-126.61h92.299v126.61h81.755c28.251 0 51.159-22.907 51.159-51.159V306.79c0-3.713-1.465-7.271-4.085-9.877L257.561 131.836z" />
            </svg>
             
            </a>
        </div>
        <div class="py-6 md:py-10">
            <div class="mx-auto max-w-4xl">
                <div class="">
                    <h1
                        class="pt-5 font-body pl-8 text-2xl font-semibold text-primary sm:text-4xl md:text-5xl xl:text-5xl">
                        {{ $post->title }}
                    </h1>
                    <div class="flex items-center pt-5 md:pt-10 ml-8">
                        <div>
                            <img src="{{ asset($post->user->profile_photo_path) }}"
                                class="h-16 w-16 rounded-full border-2 border-grey-70 shadow" alt="author image" />
                        </div>
                        <div class="pl-5">
                            <span class="block font-body text-sm font-bold text-grey-10">By
                                {{ $post->user->name }}</span>
                            <span
                                class="block pt-1 font-body text-sm font-bold text-grey-30">{{ $post->created_at->diffForHumans() }}</span>
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
                        <a href="{{ route('post.show', $previousPost->slug) }}" class="flex ">
                            <i class="bx bx-left-arrow-alt text-2xl text-primary"></i>
                            <span class="block ml-5 font-body text-sm font-bold uppercase text-primary md:pl-5">Previous
                                Post</span>
                        </a>
                    @endif
                    @if ($nextPost)
                        <a href="{{ route('post.show', $nextPost->slug) }}" class="flex ">
                            <span class="block ml-5 mr-5 font-body text-sm font-bold uppercase text-primary md:pr-5">Next
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
