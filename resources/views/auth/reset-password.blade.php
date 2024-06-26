@extends('layouts.autentikasi')

@section('content')
    <div class="h-screen bg-side-bar-color flex flex-col justify-center items-center px-2">
        <div class="flex justify-center flex-col">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            <h1 class="text-center font-bold text-xl uppercase text-white underline">Makos</h1>
        </div>
        <div class="w-96 mt-4 px-6 py-4 rounded-lg bg-orange-100 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <x-text-input id="email" class="block mt-1 w-full" type="hidden" name="email" :value="old('email', $request->email)"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
