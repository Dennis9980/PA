@extends('layouts.autentikasi')

@section('content')
<div class="h-screen bg-side-bar-color flex flex-col justify-center items-center px-2">
    <div class="flex justify-center flex-col">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            <h1 class="text-center font-bold text-xl uppercase text-white underline">Makos</h1>
    </div>
    <div class="sm:max-w-sm mt-4 px-6 py-4 rounded-lg bg-orange-100 shadow-md overflow-hidden sm:rounded-lg">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
    
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection
