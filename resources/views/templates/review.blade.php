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
                            2013/03/15
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
