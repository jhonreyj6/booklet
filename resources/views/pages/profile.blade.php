@extends('layouts.app')
@section('title', 'My Profile')
@section('content')
    <div class="mt-20">
        <div class="max-w-6xl mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                <div class="col-span-4 sm:col-span-4">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            @if (Auth::user()->profile_img)
                                <img src="/storage/user/{{ Auth::id() }}/image/profile/{{ Auth::user()->profile_img }}"
                                    id="image-src" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">
                            @else
                                <img src="https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png"
                                    class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">
                            @endif
                            <h1 class="text-lg font-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
                            <p class="text-gray-700">Software Developer</p>
                            <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                <label for="profile-input"
                                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Upload Image</label>
                                <input type="file" accept="image/*" name="image" class="hidden" id="profile-input">
                            </div>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Skills</span>
                            <ul>
                                <li class="mb-2">JavaScript</li>
                                <li class="mb-2">React</li>
                                <li class="mb-2">Node.js</li>
                                <li class="mb-2">HTML/CSS</li>
                                <li class="mb-2">Tailwind Css</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 sm:col-span-8">
                    @if (session()->has('message'))
                        <div class="border p-4 rounded bg-green-400 text-white text-3xl mb-4 text-center">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form class="border rounded shadow p-4" action="/user/profile" method="POST">
                        @csrf
                        @method('patch')
                        <div class="flex flex-row justify-between items-center mb-4">
                            <h3 class="text-3xl font-semibold">My Profile</h3>
                        </div>

                        <div class="flex flex-row gap-4 mb-3">
                            <div class="w-full flex flex-col gap-2">
                                <label for="first_name" class="text-xl">First Name</label>
                                <input type="text" class="outline w-full outline-blue-500 px-4 py-2 rounded"
                                    name="first_name" id="first_name" value="{{ Auth::user()->first_name }}">
                                @error('first_name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full flex flex-col gap-2">
                                <label for="last_name" class="text-xl">Last Name</label>
                                <input type="text" class="outline w-full outline-blue-500 px-4 py-2 rounded"
                                    name="last_name" id="last_name" value="{{ Auth::user()->last_name }}">
                                @error('last_name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-4 mb-3">
                            <label for="email" class="text-xl">Email</label>
                            <input type="email" class="outline w-full outline-blue-500 px-4 py-2 rounded" disabled
                                id="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="w-full flex flex-col gap-4 mb-8">
                            <label for="address" class="text-xl">Address</label>
                            <input type="text" class="outline w-full outline-blue-500 px-4 py-2 rounded" id="address"
                                name="address" value="{{ Auth::user()->address }}">
                            @error('address')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center"><button type="submit"
                                class="px-4 py-2 text-lg bg-blue-500 text-white rounded">Update Profile</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
