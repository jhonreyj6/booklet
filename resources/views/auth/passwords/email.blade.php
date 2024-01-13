@extends('layouts.app')

@section('content')
    <div class="max-w-96 mt-20 mx-auto">
        <div class="border py-4 px-8 rounded border-blue-500">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <h3 class="text-2xl text-center text-blue-500 mb-2">Reset Password</h3>
                <div class="mb-2">
                    <label for="email" class="block mb-2 text-sm font-medium">Email Address</label>
                    <input type="email" name="email"
                        class="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full py-2 p-2 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('email') }}" required>
                </div>
                <button type="submit"
                    class="border border-blue-500 mb-2 bg-blue-500 px-4 py-1 text-white rounded w-full">Reset
                    Password</button>
            </form>
            @if (session('status'))
                <div class="text-green-500">
                    {{ session('status') }}
                </div>
            @endif
            @error('email')
                <span class="text-red-500">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
@endsection
