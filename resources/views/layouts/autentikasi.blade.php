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
                {{ $slot }}
            </div>
        </div>
    
</body>

</html>
