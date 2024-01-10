@extends('layouts.app')

@section('content')
    <div class="max-w-96 mt-20 mx-auto">
        <div class="border py-4 px-8 rounded border-blue-500">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <h3 class="text-2xl text-center text-blue-500 mb-2">Reset Password</h3>
                <div class="mb-2">
                    <label for="email" class="block mb-2 text-sm font-medium">Email Address</label>
                    <input type="email" name="email" class="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full py-2 p-2 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('email') }}" required>
                </div>

                @if (session('status'))
                    <div class="text-lg text-green-500">
                        {{ session('status') }}
                    </div>
                @endif

                @error('email')
                    <span class="text-lg text-red-500">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit"
                    class="border border-blue-500 mb-2 bg-blue-500 px-4 py-1 text-white rounded w-full">Reset
                    Password</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
