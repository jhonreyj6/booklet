@extends('layouts.app')
@section('content')
    <div class="mt-24 mx-auto max-w-6xl px-4">
        <div class="p-8 rounded-lg border-2 border-black bg-gray-700">
            <div class="md:flex">
                <ul
                    class="flex-column min-w-40 space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
                    <li>
                        <a href="/order"
                            class="inline-flex items-center px-4 py-3 rounded-lg w-full {{ request()->path() == 'order' ? 'bg-blue-500 text-white' : 'bg-gray-800' }}"
                            aria-current="page">
                            <i class="fa-solid fa-list text-xl mr-2"></i>
                            All
                        </a>
                    </li>
                    <li>
                        <a href="/order/pending"
                            class="inline-flex items-center px-4 py-3 rounded-lg w-full {{ request()->path() == 'order/pending' ? 'bg-blue-500 text-white' : 'bg-gray-800' }}"
                            aria-current="page">
                            <i class="fa-solid fa-clipboard-list text-xl mr-2"></i>
                            Pending
                        </a>
                    </li>
                    <li>
                        <a href="/order/completed"
                            class="inline-flex items-center px-4 py-3 rounded-lg w-full {{ request()->path() == 'order/completed' ? 'bg-blue-500 text-white' : 'bg-gray-800' }}">
                            <i class="fa-solid fa-square-check mr-2 text-lg"></i>
                            Completed
                        </a>
                    </li>
                    <li>
                        <a href="/order/cancelled"
                        class="inline-flex items-center px-4 py-3 rounded-lg w-full {{ request()->path() == 'order/cancelled' ? 'bg-blue-500 text-white' : 'bg-gray-800' }}">
                            <i class="fa-regular fa-circle-xmark mr-2 text-lg"></i>
                            Cancelled
                        </a>
                    </li>
                    <li>
                        <a href="/order/refund"
                        class="inline-flex items-center px-4 py-3 rounded-lg w-full {{ request()->path() == 'order/refund' ? 'bg-blue-500 text-white' : 'bg-gray-800' }}">
                        <i class="fa-solid fa-hand-holding-dollar mr-2 text-lg"></i>
                            Refund
                        </a>
                    </li>
                </ul>

                <div class="w-full">
                    <form method="GET" action="{{ url()->current() }}" autocomplete="on" class="mb-4">
                        <div class="relative">
                            <input type="text" name="query"
                                class="py-3 px-4 pe-11 block w-full border border-blue-500 bg-blue-50 shadow-sm rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                value="{{ request()->query('query') }}" placeholder="Search order...">

                            <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-4">
                                <i class="fa-solid fa-magnifying-glass text-blue-700"></i>
                            </div>
                        </div>
                    </form>

                    <div class="p-4 min-h-96 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 rounded-lg w-full">
                        @if ($orders->count())
                            <div class="border px-4 py-2 flex flex-col gap-2">
                                @foreach ($orders as $order)
                                    <div class="border px-4 pt-2 pb-2 mb-4 rounded bg-blue-50 border-gray-400 shadow">
                                        <div
                                            class="flex border-b border-b-gray-400 mb-2 flex-row justify-end text-blue-500 pb-2">
                                            Order ID: {{ $order->id }}
                                        </div>

                                        <div class="flex flex-row gap-4 mb-4">
                                            <div class="w-28 h-20 border">
                                                <img src="https://down-ph.img.susercontent.com/file/ph-11134201-7r98o-lkkwmlu6o5z556_tn"
                                                    alt="" class="w-full h-full">
                                            </div>
                                            <div class="w-full">
                                                <h3 class="text-lg font-semibold text-blue-500">
                                                    {{ $order->displayItem['name'] }}</h3>
                                                <h4 class="text-sm">by: {{ $order->displayItem['author'] }}</h4>
                                                <h5>{{ count(json_decode($order->order_items_id)) }} Items</h5>
                                            </div>
                                            <div class="text-lg flex flex-col items-center my-auto text-blue-500">
                                                ₱{{ $order->total }}
                                            </div>
                                        </div>

                                        <div class="flex flex-row justify-end gap-2 mb-4">
                                            @if(request()->path() != 'order/pending' && $order->status != 0)
                                            <a href="/order/invoice?id={{ $order->id }}"
                                                class="px-8 py-1 bg-blue-500 text-white rounded">Invoice</a>
                                            <button type="button"
                                                class="px-8 py-1 bg-red-500 text-white rounded">Refund</button>
                                            @else
                                            <a href="/order/payment/{{ $order->id }}"
                                                class="px-8 py-1 bg-blue-500 text-white rounded">Pay now</a>
                                            <button type="button"
                                                class="px-8 py-1 bg-red-500 text-white rounded">Cancel</button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-gray-50 ">
                                <div class="rounded-lg bg-white p-8 text-center border border-blue-500 shadow-xl">
                                    <h1 class="mb-4 text-4xl font-bold">404</h1>
                                    <p class="text-gray-600">Oops! No result found.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
