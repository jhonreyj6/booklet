@if ($reviews->count())
    @foreach ($reviews as $review)
        <div class="border p-4 mb-2 bg-blue-50">
            <div class="flex flex-row gap-8">
                <div class="w-16 h-16">
                    @if ($review->getUserDetails->profile_img)
                        <img class="w-full h-full"
                            src="/storage/user/{{ $review->getUserDetails->id }}/image/profile/{{ $review->getUserDetails->profile_img }}"
                            alt="user photo">
                    @else
                        <img class="w-full h-full"
                            src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png"
                            alt="user photo">
                    @endif
                </div>
                <div class="w-full">
                    <div class="flex flex-row justify-between mb-1 items-center">
                        <h3 class="text-semibold text-blue-500">{{ $review->getUserDetails->first_name }}
                            {{ $review->getUserDetails->last_name }}</h3>
                        <div class="text-gray-400">
                            {{ $review->created_at->format('Y-m-d') }}
                        </div>
                    </div>
                    <div class="mb-2">
                        {{ $review->message }}
                    </div>
                    <div class="flex flex-row gap-0.5 items-center text-yellow-400">
                        @for ($i = 0; $i < $review->rating; $i++)
                            <i class="fa-solid fa-star"></i>
                        @endfor
                        @for ($i = $review->rating; $i < 5; $i++)
                            <i class="fa-regular fa-star"></i>
                        @endfor
                        <div class="ml-0.5">{{ $review->rating }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

@if ($reviews->nextPageUrl() || $reviews->previousPageUrl())
    <div class="my-8">
        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
            @if ($reviews->previousPageUrl())
                <button type="button" data-prev-page="{{ $reviews->previousPageUrl() }}"
                    class="review-prev-page relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            @endif

            @for ($i = 1; $i <= $reviews->lastPage(); $i++)
                <button type="button" data-current-page="{{ URL::current() . '?page=' . $i }}"
                    @class([
                        'bg-blue-600 text-white' => $i == $reviews->currentPage(),
                        'review-current-page relative z-10 inline-flex items-center text-gray-400 border-gray-300 border px-4 py-2 text-sm font-semibold focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600',
                    ])>{{ $i }}</button>
            @endfor

            @if ($reviews->nextPageUrl())
                <button type="button" data-next-page="{{ $reviews->nextPageUrl() }}"
                    class="review-next-page relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            @endif
        </nav>
    </div>
@endif
