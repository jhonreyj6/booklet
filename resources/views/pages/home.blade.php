@extends('layouts.app')
@section('content')
    <div class="flex flex-row gap-4 px-4">
        @include('templates.aside')
        <div class="mt-20 w-full">
            {{-- Search --}}
            <div class="mb-4">
                <div class="relative">
                    <input type="text" id="hs-trailing-icon" name="hs-trailing-icon"
                        class="py-3 px-4 pe-11 block w-full border border-blue-500 bg-blue-50 shadow-sm rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                        placeholder="Search Book">
                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                        <i class="fa-solid fa-magnifying-glass text-blue-700"></i>
                    </div>
                </div>
            </div>

            {{-- book item loop --}}
            <div class="grid grid-cols-5 gap-4">
                <div class="border rounded-sm">
                    <img src="https://m.media-amazon.com/images/I/616BYPbOCyL._AC_UF1000,1000_QL80_.jpg" class="h-44 w-full"
                        alt="">
                    <div class="p-2">
                        <div class="text-center">
                            <h3 class="font-semibold text-lg">Millionaire Fastlane</h3>
                            <div class="text-sm text-gray-400">By:</div>
                            <h5 class="text-sm font-semibold">MJ De Marco</h5>
                            <div class="flex flex-row gap-1 justify-center items-center text-yellow-400">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <div>5</div>
                            </div>
                            <div class="text-gray-400 mb-4">
                                3946 reviews
                            </div>
                            <div class="mb-3">
                                <a href="#!" class="py-1.5 rounded bg-blue-700 text-white px-4">Buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
