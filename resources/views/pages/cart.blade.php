@extends('layouts.app')
@section('title', 'Cart')
@section('content')
    <form class="container mx-auto mt-24" action="/order" method="POST">
        @csrf
        <div class="flex flex-col md:flex-row shadow-md border my-10">
            <div class="w-full md:w-3/4 bg-white px-10 py-10">
                <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                    <h2 class="font-semibold text-2xl">{{ $carts->count() }} Items</h2>
                </div>
                <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/4">Product Details</h3>
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/4 text-center">Price</h3>
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/4 text-center">Discount</h3>
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/4 text-center">Total</h3>
                </div>
                @foreach ($carts as $item)
                    <div id="div-{{$item->id}}">
                        <div class="flex items-center">
                            <input id="checkbox-{{ $item->id }}" type="checkbox" value="{{ $item->id }}"
                                name="cart_items_id[]"
                                data-price="{{ $item->getBookDetails->price }}"
                                class="w-5 h-5 ml-10 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="flex items-center py-5 mb-2">
                            <div class="flex flex-row gap-4 w-2/4"> <!-- product -->
                                <div class="w-24">
                                    <label for="checkbox-{{ $item->id }}">
                                        <img class="h-24 w-24"
                                            src="{{ $item->getBookDetails->image ? '/assets/img/' . $item->getBookDetails->image : '/assets/img/empty_book.jpg' }}"
                                            alt="">
                                    </label>
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <span class="font-bold text-sm">{{ $item->getBookDetails->name }}</span>
                                    <span>by:</span>
                                    <span class="text-blue-500">{{ $item->getBookDetails->author }}</span>
                                    <a href="#"
                                        class="font-semibold hover:text-red-500 text-gray-500 text-xs remove-cart-item" data-id="{{$item->id}}">Remove</a>
                                </div>
                            </div>
                            <span class="text-center w-1/4 font-semibold text-sm">₱{{ $item->getBookDetails->price }}</span>
                            <span class="text-center w-1/4 font-semibold text-sm">N/A</span>
                            <span
                                class="text-center w-1/4 font-semibold text-sm">₱{{ $item->getBookDetails->price * $item->quantity }}</span>
                        </div>
                    </div>
                @endforeach

            </div>

            <div id="summary" class="w-full md:w-1/4 px-8 py-10">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">
                        <span id="items_selected_count"></span>
                        <span>Items</span>
                    </span>
                    <span class="font-semibold text-sm" id="subtotal">₱0</span>
                </div>

                <div class="py-10">
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo Code</label>
                    <input type="text" id="promo" placeholder="Enter your code" class="p-2 text-sm w-full">
                </div>
                <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">Apply</button>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span id="total">₱0</span>
                    </div>
                    <button type="submit"
                        class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</button>
                </div>
            </div>

        </div>
    </form>
@endsection


