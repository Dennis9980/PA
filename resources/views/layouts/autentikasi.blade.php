<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/d2f94ceef2.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen grid grid-cols-1 place-items-center lg:grid-cols-2 lg:place-content-around lg:place-items-center p-6 bg-side-bar-color">
           <div class="hero">
               <div class="hero-content">
                   <div class="text-white">
                       <h1 class="text-5xl font-extrabold">Selamat Datang di MaKos!</h1>
                       <p class="py-6">Halaman Login ini hanya dapat digunakan oleh penghuni kos, belum jadi penghuni?</p>
                       <button class="btn btn-info bg-menu-hover">Booking Now</button>
                     </div>
               </div>
           </div>
            <div
                class="w-full sm:max-w-sm mt-6 px-6 py-4 rounded-lg bg-orange-100 shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex justify-center pb-4">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
            
                <form method="POST" action="{{ route('login') }}">
                    @csrf
            
                    <!-- Email Address -->  
                    <div>
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required
                            autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
            
                        <div class="relative">
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
                            <span id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                <i id="eye" class="fa-regular fa-eye"></i>
                                <i id="slash" class="hidden fa-regular fa-eye-slash"></i>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="checkbox border-orange-400 checked:border-indigo-800 [--chkbg:theme(colors.indigo.600)] [--chkfg:orange] checkbox-xs"
                                name="remember">
                            <span class="ms-2 text-sm text-black">{{ __('Remember me') }}</span>
                        </label>
                    </div>
            
                    <div class="flex flex-col items-center justify-center mt-4">
                        <x-primary-button class="w-full flex justify-center mb-1">
                            {{ __('Log in') }}
                        </x-primary-button>
            
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-black hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
            
                    </div>
                </form>
            </div>
        </div>
    
</body>

</html>
