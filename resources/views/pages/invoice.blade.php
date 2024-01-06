@extends('layouts.app')
@section('content')
    <div class="mt-24 mx-auto max-w-5xl">
        <div class="mb-4">
            <button type="button" onclick="history.back()" id="go-back" class="px-4 py-0.5 bg-blue-500 text-white">Go back</button>
        </div>

        <div class="p-8 border border-blue-500">
            <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-gray-700">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">Invoice</h2>
                </div>
                <div class="inline-flex gap-x-2">
                    <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                        href="#">
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="7 10 12 15 17 10" />
                            <line x1="12" x2="12" y1="15" y2="3" />
                        </svg>
                        Invoice PDF
                    </a>
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="#">
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="6 9 6 2 18 2 18 9" />
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                            <rect width="12" height="8" x="6" y="14" />
                        </svg>
                        Print
                    </a>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-3">
                <div>
                    <div class="grid space-y-3">
                        <dl class="grid sm:flex gap-x-3 text-sm">
                            <dt class="min-w-[150px] max-w-[200px]">
                                Order number:
                            </dt>
                            <dd class="font-medium text-gray-800">
                                {{ $order->id }}
                            </dd>
                        </dl>
                        <dl class="grid sm:flex gap-x-3 text-sm">
                            <dt class="min-w-[150px] max-w-[200px]">
                                Due order:
                            </dt>
                            <dd class="font-medium text-gray-800">
                                {{ $order->created_at }}
                            </dd>
                        </dl>
                        <dl class="grid sm:flex gap-x-3 text-sm">
                            <dt class="min-w-[150px] max-w-[200px]">
                                Billing method:
                            </dt>
                            <dd class="font-medium text-gray-800">
                                Stripe
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="mt-6 border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700">
                <div class="hidden sm:grid sm:grid-cols-5">
                    <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">Item</div>
                    <div class="sm:col-span-3 text-end text-xs font-medium text-gray-500 uppercase">Amount</div>
                </div>
                <div class="hidden sm:block border-b border-gray-200 dark:border-gray-700"></div>
                @foreach ($order->getBookDetails as $book)
                    <div class="grid grid-cols-2 sm:grid-cols-5 gap-2">
                        <div class="col-span-1 sm:col-span-2">
                            <p class="font-medium text-gray-800">{{ $book->name }}</p>
                        </div>
                        <div class="sm:col-span-3">
                            <p class="sm:text-end text-gray-800">₱{{ $book->price }}</p>
                        </div>
                    </div>
                @endforeach
                <div class="grid grid-cols-2 sm:grid-cols-5 gap-2">
                    <div class="col-span-1 sm:col-span-2">
                        <p class="font-medium text-gray-800">Discount</p>
                    </div>
                    <div class="sm:col-span-3">
                        <p class="sm:text-end text-gray-800">₱0</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex sm:justify-end">
                <div class="w-full max-w-2xl sm:text-end space-y-2">
                    <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 font-bold">Subotal:</dt>
                            <dd class="col-span-2">₱{{ $order->getBookDetails->pluck('price')->sum() }}</dd>
                        </dl>
                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 font-bold">Total:</dt>
                            <dd class="col-span-2">₱{{ $order->getBookDetails->pluck('price')->sum() }}</dd>
                        </dl>
                    </div>
                    <!-- End Grid -->
                </div>
            </div>
            <!-- End Flex -->
        </div>
    </div>
@endsection
