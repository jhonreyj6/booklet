@extends('layouts.app')

@section('content')
    <div class="mt-32">
        <!-- component -->
        <div class="h-screen">
            <div class="p-6  md:mx-auto">
                <div class="mx-auto my-6 text-center">
                    <i class="fa-regular fa-circle-xmark text-red-600 text-7xl"></i>
                </div>
                <div class="text-center">
                    <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Payment Cancel!</h3>
                    <p class="text-gray-600 my-2">
                        @error('message')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </p>
                    <p> Have a great day! </p>
                    <div class="py-10 text-center">
                        <a href="/" class="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3">
                            Go Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
