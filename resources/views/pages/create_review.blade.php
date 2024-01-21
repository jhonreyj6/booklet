@extends('layouts.app')
@section('content')
    <div class="mt-20 max-w-2xl mx-auto">
        <div class="border p-4 rounded">
            <h3 class="text-xl font-semibold mb-4">Write a Review</h3>
            <hr>

            @foreach ($items as $item)
                @if ($item->getAuthReviews)
                    <form method="POST" id="form-id-{{ $item->id }}"
                        action="{{ route('create.review', ['id' => $item->id]) }}"
                        class="border-b border-blue-500 pb-4 mb-4 hidden">
                        @csrf
                        <div class="flex flex-row gap-2 mt-4 mb-4">
                            <div>
                                <img src="" alt="" class="w-10 h-10">
                            </div>
                            <div class="mb-4 -mt-1">
                                <h4>{{ $item->getBookDetails->name }}</h4>
                                <h5 class="text-sm text-gray-500">by: {{ $item->getBookDetails->author }}</h5>
                            </div>
                        </div>
                        <div class="mb-2">
                            <textarea name="message" id="textarea-{{ $item->id }}" cols="30" rows="4"
                                class="w-full overflow-y-auto border border-blue-500 outline-none rounded p-2" placeholder="Write a review..."></textarea>
                        </div>
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-row gap-12 items-center">
                                <h4 class="text-lg text-blue-500 font-semibold">Rating:</h4>
                                <div class="rating-star flex flex-row text-yellow-400" data-item-id="{{ $item->id }}">
                                    @for ($i = 0; $i < $item->getAuthReviews->rating; $i++)
                                        <i class="fa-solid fa-star cursor-pointer" data-value="{{ $i+1 }}"></i>
                                    @endfor
                                    @for ($i = $item->getAuthReviews->rating; $i < 5; $i++)
                                        <i class="fa-regular fa-star cursor-pointer" data-value="{{ $i+1 }}"></i>
                                    @endfor
                                </div>
                                <input type="hidden" name="rating" id="input-{{ $item->id }}">
                            </div>
                            <div class="">
                                <button type="submit" data-form-id="{{ $item->id }}"
                                    class="py-1 px-4 rounded text-white bg-blue-500 form-review-btn">Submit</button>
                                <button type="button" data-form-id="{{ $item->id }}"
                                    class="py-1 px-4 rounded text-white bg-red-500 cancel-edit-review">Cancel</button>
                            </div>
                        </div>
                    </form>
                    <article class="border-b pb-4 border-blue-500" id="article-{{ $item->id }}">
                        <div class="flex items-center mt-4 mb-2">
                            <img class="w-10 h-10 me-4" src="https://www.w3schools.com/howto/img_avatar.png" alt="">
                            <div class="font-medium text-blue-500">
                                <h3>{{ $item->getBookDetails->name }}
                                </h3>
                                <div class="flex flex-row items-center text-yellow-400">
                                    @for ($i = 0; $i < $item->getAuthReviews->rating; $i++)
                                        <i class="fa-solid fa-star"></i>
                                    @endfor
                                    @for ($i = $item->getAuthReviews->rating; $i < 5; $i++)
                                        <i class="fa-regular fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="mb-2 text-gray-500 dark:text-gray-400" id="review-message-{{ $item->id }}">
                            {{ $item->getAuthReviews->message }}
                        </p>
                        <aside class="flex flex-row justify-between items-center">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">19 people found this helpful</p>
                            <button type="button" class="edit-review px-4 py-0.5 bg-blue-500 text-white rounded"
                                data-id="{{ $item->id }}">Edit
                                Review</button>
                        </aside>
                    </article>
                @else
                    <form method="POST" id="form-id-{{ $item->id }}"
                        action="{{ route('create.review', ['id' => $item->id]) }}"
                        class="border-b border-blue-500 pb-4 mb-4">
                        @csrf
                        <div class="flex flex-row gap-2 mt-4 mb-4">
                            <div>
                                <img src="" alt="" class="w-10 h-10">
                            </div>
                            <div class="mb-4 -mt-1">
                                <h4>{{ $item->getBookDetails->name }}</h4>
                                <h5 class="text-sm text-gray-500">by: {{ $item->getBookDetails->author }}</h5>
                            </div>
                        </div>
                        <div class="mb-2">
                            <textarea name="message" id="textarea-{{ $item->id }}" cols="30" rows="4"
                                class="w-full overflow-y-auto border border-blue-500 outline-none rounded p-2" placeholder="Write a review..."></textarea>
                        </div>
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-row gap-12 items-center">
                                <h4 class="text-lg text-blue-500 font-semibold">Rating:</h4>
                                <div class="rating-star flex flex-row" data-item-id="{{ $item->id }}">
                                    <i class="fa-regular fa-star hover:cursor-pointer" data-value="1"></i>
                                    <i class="fa-regular fa-star hover:cursor-pointer" data-value="2"></i>
                                    <i class="fa-regular fa-star hover:cursor-pointer" data-value="3"></i>
                                    <i class="fa-regular fa-star hover:cursor-pointer" data-value="4"></i>
                                    <i class="fa-regular fa-star hover:cursor-pointer" data-value="5"></i>
                                </div>
                                <input type="hidden" name="rating" id="input-{{ $item->id }}">
                            </div>
                            <div class="">
                                <button type="submit" data-form-id="{{ $item->id }}"
                                    class="py-1 px-4 rounded text-white bg-blue-500 gradient form-review-btn">Submit</button>
                            </div>
                        </div>
                    </form>
                @endif
            @endforeach
        </div>
    </div>
@endsection
