@extends('layouts.app')
@section('content')
    <div class="mt-24 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-2">Choose a Subscription</h2>
                <p class="text-sm">choose a plan tailored to your needs</p>
            </div>
            <div class="flex flex-row gap-8 mt-12">
                <div class="border rounded p-6">
                    <h3 class="text-2xl font-extrabold">Free</h3>
                    <p class="text-sm text-gray-500 mt-1">Ideal for individuals who need quick access to basic features.</p>
                    <div class="mt-6">
                        <h2 class="text-4xl font-bold">$0<span class="text-sm text-gray-500 ml-2">/ Month</span></h2>
                    </div>
                    <div class="mt-6">
                        <h4 class="text-base font-bold mb-4">Plan Includes</h4>
                        <ul class="space-y-4">
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i> 50 Image generations
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                500 Credits
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Monthly 100 Credits Free
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Customer Support
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Dedicated Server
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Priority Generations
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                50GB Cloud Storage
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="border bg-blue-600 rounded p-6 text-white">
                    @csrf
                    <h3 class="text-lg font-extrabold">Reader</h3>
                    <p class="text-sm text-gray-200 mt-1">Ideal for individuals who who need advanced features and tools for
                        client work.</p>
                    <div class="mt-6">
                        <h2 class="text-4xl font-bold">$25<span class="text-sm text-gray-200 ml-2">/ Month</span></h2>
                        <a href="/user/membership/reader"
                            class="block text-center mt-6 px-2 py-1.5 text-sm outline-none  border-2 border-white text-white font-semibold bg-transparent rounded">Subscribe now</a>
                    </div>
                    <div class="mt-6">
                        <h4 class="text-base font-bold mb-4">Plan Includes</h4>
                        <ul class="space-y-4">
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                500 Image generations
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                300 Credits
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Monthly 1000 Credits Free
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Customer Support
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Dedicated Server
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Priority Generations
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                500GB Cloud Storage
                            </li>
                        </ul>
                    </div>
                </div>
                <form class="border bg-green rounded p-6 text-white">
                    @csrf
                    <h3 class="text-lg font-extrabold">Hobbyist</h3>
                    <p class="text-sm mt-1">Ideal for businesses who need personalized services and security
                        for large teams.</p>
                    <div class="mt-6">
                        <h2 class="text-4xl font-bold">$35<span class="text-sm ml-2">/ Month</span></h2>
                        <a href="/user/membership/hobbyist"
                            class="block text-center mt-6 px-2 py-1.5 text-sm outline-none  border-2 border-white text-white font-semibold bg-transparent rounded">Subscribe now</a>
                    </div>
                    <div class="mt-6">
                        <h4 class="text-base font-bold mb-4">Plan Includes</h4>
                        <ul class="space-y-4">
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                5000 Image generations
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                10000 Credits
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Monthly 2000 Credits Free
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Customer Support
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Dedicated Server
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                Priority Generations
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-check mr-2 text-green-500"></i>
                                1000GB Cloud Storage
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
