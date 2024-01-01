@extends('layouts.app')
@section('content')
    <div class="mt-24 max-w-5xl mx-auto">
        <div class="border p-4 rounded mb-4 shadow">
            <div class="flex flex-row gap-8">
                <div class="w-96">
                    <img src="https://down-ph.img.susercontent.com/file/fbfd144031b361a216adfedbef79f325" class="w-full h-64"
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
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <div class="ml-0.5">{{ $book->rating }}</div>
                        </div>
                        <div class="font-semibold">
                            96 reviews
                        </div>
                        <div class="font-semibold">

                        </div>
                    </div>
                    <div class="bg-blue-50 p-4 rounded text-xl text-blue-500 font-bold mb-4">
                        ₱ {{ $book->price }}
                    </div>
                    <div class="mb-4">
                        <button type="button" data-id="{{$book->id}}" class="px-8 py-3 text-white font-semibold bg-blue-500 add-to-cart">Add to cart</button>
                    </div>
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
        </div>

        <div class="border p-4 mb-4 shadow">
            <h3 class="text-xl font-semibold mb-4">
                Reviews
            </h3>
            <div class="flex flex-row items-center text-center text-blue-500 mb-4">
                <div class="w-full border">
                    <a href="" class="block py-0.5 bg-blue-500 text-white">All (24)</a>
                </div>
                <div class="w-full border ">
                    <a href="" class="block py-0.5 hover:bg-blue-500 hover:text-white">5 Star (0)</a>
                </div>
                <div class="w-full border">
                    <a href="" class="block py-0.5 hover:bg-blue-500 hover:text-white">4 Star (4)</a>
                </div>
                <div class="w-full border py-0.5">
                    <a href="" class="block py-0.5 hover:bg-blue-500 hover:text-white">3 Star (3)</a>
                </div>
                <div class="w-full border py-0.5">
                    <a href="" class="block py-0.5 hover:bg-blue-500 hover:text-white">2 Star (6)</a>
                </div>
                <div class="w-full border py-0.5">
                    <a href="" class="block py-0.5 hover:bg-blue-500 hover:text-white">1 Star (11)</a>
                </div>
            </div>
            <div class="border p-4 mb-2">
                <div class="flex flex-row gap-8">
                    <div class="w-16 h-16">
                        <img src="https://down-ph.img.susercontent.com/file/fbfd144031b361a216adfedbef79f325" class="w-full h-full" alt="">
                    </div>
                    <div class="w-full">
                        <div class="flex flex-row justify-between mb-1 items-center">
                            <h3 class="text-semibold text-blue-500">Jhon Rey Repuela</h3>
                            <div class="text-gray-400">
                                2013/03/15
                            </div>
                        </div>
                        <div class="mb-2">
                            Mollit amet et adipisicing veniam quis adipisicing fugiat. Dolore pariatur magna labore proident fugiat. Duis deserunt in eiusmod sint. Proident Lorem velit excepteur laborum. Mollit esse irure nisi laborum quis. Ex non quis deserunt eiusmod labore ullamco amet sit. Aliquip ipsum sit officia ea nisi proident proident id do.

Aute occaecat anim esse ut consequat labore id reprehenderit excepteur id labore. Sint minim magna proident ut eiusmod eu do fugiat. Do sit in ipsum amet aliquip in voluptate occaecat qui amet sint ea. Sit mollit irure nostrud cillum ipsum et proident. Excepteur id nisi ea dolore reprehenderit eiusmod labore Lorem elit officia anim. Ea pariatur laboris irure mollit duis. Aliqua laboris magna cillum esse.
                        </div>
                        <div class="flex flex-row gap-0.5 items-center text-yellow-400">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <div class="ml-0.5">{{ $book->rating }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
