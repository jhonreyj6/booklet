@extends('layouts.app')
@section('content')
    <div class="mt-24 max-w-5xl mx-auto">
        <div class="border p-4 rounded mb-4 shadow">
            <div class="flex flex-row gap-8">
                <div class="w-96">
                    <img src="https://m.media-amazon.com/images/I/616BYPbOCyL._AC_UF1000,1000_QL80_.jpg" class="w-full h-64"
                        alt="">
                </div>
                <div class="w-full">
                    <div class="flex flex-row gap-2 items-center mb-2">
                        <h3 class="text-lg font-semibold text-blue-500">
                            {{ $book->name }}
                        </h3>
                    </div>
                    <div class="flex flex-row gap-4 mb-2">
                        <div class="flex flex-row gap-0.5 items-center text-yellow-400">
                            @for ($i = 0; $i < $book->rating; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                            @for ($i = $book->rating; $i < 5; $i++)
                                <i class="fa-regular fa-star"></i>
                            @endfor
                            <div class="ml-0.5">{{ $book->rating }}</div>
                        </div>
                        <div class="font-semibold">
                            {{ $book->getAllReviews->count() }}
                            {{ $book->getAllReviews->count() > 1 ? 'reviews' : 'review' }}
                        </div>
                        <div class="font-semibold">

                        </div>
                    </div>
                    <div class="bg-blue-50 p-4 rounded text-xl text-blue-500 font-bold mb-4">
                        ₱ {{ $book->price }}
                    </div>

                    @if (!$book->authAdded)
                        <div class="mb-4">
                            <button type="button" data-id="{{ $book->id }}"
                                class="px-8 py-3 text-white font-semibold bg-blue-500 add-to-cart">Add to cart</button>
                        </div>
                    @else
                        <div class="mb-4">
                            <button type="button" data-id="{{ $book->id }}"
                                class="px-8 py-3 text-white font-semibold bg-blue-500 opacity-50" disabled>Added</button>
                        </div>
                    @endif

                    <hr>
                    <div class="flex flex-row mt-4 text-red-500">
                        <div class="w-full">
                            <i class="fa-solid fa-book"></i> New York's Best Time Seller
                        </div>

                        <div class="w-full">
                            <i class="fa-solid fa-tag"></i> 142 copies sold
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="border p-4 rounded mb-4 shadow">
            <h3 class="text-xl font-semibold mb-4">Book Details</h3>
            <div class="flex flex-row gap-8">
                <div class="w-40">
                    Description
                </div>
                <div>
                    {{ $book->description }}
                </div>
            </div>
            <div class="flex flex-row gap-8">
                <div class="w-40">
                    Author
                </div>
                <div>
                    <a href="/author?id=">{{ $book->author }}</a>
                </div>
            </div>
            <div class="flex flex-row gap-8">
                <div class="w-40">
                    Genre
                </div>
                <div>
                    {{ $book->genre }}
                </div>
            </div>
            <div class="flex flex-row gap-8">
                <div class="w-40">
                    File size
                </div>
                <div>
                    10.2 MB
                </div>
            </div>
            <div class="flex flex-row gap-8">
                <div class="w-40">
                    Pages
                </div>
                <div>
                    219
                </div>
            </div>
            <div class="flex flex-row gap-8">
                <div class="w-40">
                    Languages
                </div>
                <div>
                    {{ $book->language }}
                </div>
            </div>
        </div>

        <div class="border p-4 mb-4 shadow">
            <h3 class="text-xl font-semibold mb-4">
                Reviews
            </h3>
            <div class="flex flex-col md:flex-row items-center text-center text-blue-500 mb-4">
                <div class="w-full border">
                    <a href="#!" id="all-star" data-id="{{ $book->id }}"
                        class="block py-0.5 bg-blue-500 text-white active hover:bg-blue-500 hover:text-white">All
                        ({{ $book->getAllReviews->count() }})</a>
                </div>
                <div class="w-full border ">
                    <a href="#!" id="five-star" data-id="{{ $book->id }}" data-rating="5"
                        class="block review-star py-0.5 hover:bg-blue-500 hover:text-white">5 Star
                        ({{ $book->getAllReviews->where('rating', '=', 5)->count() }})</a>
                </div>
                <div class="w-full border">
                    <a href="#!" id="four-star" data-id="{{ $book->id }}" data-rating="4"
                        class="block review-star py-0.5 hover:bg-blue-500 hover:text-white">4 Star
                        ({{ $book->getAllReviews->where('rating', '=', 4)->count() }})</a>
                </div>
                <div class="w-full border">
                    <a href="#!" id="three-star" data-id="{{ $book->id }}" data-rating="3"
                        class="block review-star py-0.5 hover:bg-blue-500 hover:text-white">3 Star
                        ({{ $book->getAllReviews->where('rating', '=', 3)->count() }})</a>
                </div>
                <div class="w-full border">
                    <a href="#!" id="two-star" data-id="{{ $book->id }}" data-rating="2"
                        class="block review-star py-0.5 hover:bg-blue-500 hover:text-white">2 Star
                        ({{ $book->getAllReviews->where('rating', '=', 2)->count() }})</a>
                </div>
                <div class="w-full border">
                    <a href="#!" id="one-star" data-id="{{ $book->id }}" data-rating="1"
                        class="block review-star py-0.5 hover:bg-blue-500 hover:text-white">1 Star
                        ({{ $book->getAllReviews->where('rating', '=', 1)->count() }})</a>
                </div>
            </div>

            <div id="review-content" data-id="{{ $book->id }}">

            </div>
        </div>

    </div>
@endsection

