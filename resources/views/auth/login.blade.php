@extends('layouts.app')
@section('content')
    <div class="mt-32">
        <div class="max-w-md mx-auto">
            <div class="mb-8">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account
                </h2>
            </div>
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-1 text-lg">
                        <a href="{{ route('redirect.provider', ['provider' => 'facebook']) }}" class="block text-center py-2 rounded font-semibold bg-blue-700 text-white"><i class="fa-brands fa-square-facebook"></i> Facebook</a>
                    </div>
                    <div class="col-span-1 text-lg">
                        <a href="{{ route('redirect.provider', ['provider' => 'google']) }}" class="text-center block py-2 rounded font-semibold bg-red-500 text-white"><i class="fa-brands fa-google"></i> Google</a>
                    </div>
                </div>
            </div>

            <div class="flex flex-row gap-4 mb-4 font-bold items-center">
                <div class="border border-blue-500 w-full"></div>
                <div class="">Or</div>
                <div class="border border-blue-500 w-full"></div>
            </div>

            <div class="">
                <form action="/login" method="POST">
                    <div class="mb-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                    password?</a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-red-500">
                            {{ $error }}
                        </div>
                        @endforeach
                    @endif
                    <div>
                        @csrf
                        <button type="submit"
                            class="flex w-full mt-8 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                            in</button>
                    </div>
                </form>
                <p class="mt-10 text-center text-sm text-gray-500">
                    Forgot Password?
                    <a href="/password/reset" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Reset here.</a>
                </p>
            </div>
        </div>
    </div>
@endsection
