<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>MaKos</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body class="bg-gray-100">
<header class="py-2 flex justify-between items-center bg-white">
    <!-- Logo -->
    <div class="ml-4">
        <!-- Menggunakan kelas object-[position] untuk mengatur tampilan gambar -->
        <img src="/img/logo.jpg" alt="Logo" class="h-20 w-40 object-contain">
    </div>
    
    <!-- Menu -->
    <nav class="mr-4">
        <ul class="flex space-x-4">
            <li class="menu-item px-3 py-1 rounded">
                <a href="#tentang-kami" class="menu-link hover:bg-green-400 focus:bg-green-400">Tentang kami</a>
            </li>
            <li class="menu-item px-3 py-1 rounded">
                <a href="#" class="menu-link hover:bg-green-400 focus:bg-green-400">Pemesanan</a>
            </li>
            <li class="menu-item px-3 py-1 rounded">
                <a href="#" class="menu-link hover:bg-green-400 focus:bg-green-400">Login</a>
            </li>
        </ul>
    </nav>
</header>


<!-- Konten dengan background gambar -->
<section class="bg-cover bg-left bg-center bg-fixed bg-no-repeat text-white py-20" style="background-image: url('/img/bg.jpg'); background-size: cover;">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-semibold mb-4">
                Tinggal Nyaman, <br>
                Hidup Bahagia, <br>
                Temukan Kosan Impianmu Di Sini!
            </h1>
            <!-- Tombol Booking -->
            <button class="bg-red-600 text-white py-2 px-4 rounded-lg text-xl">Booking</button>
            <br>
            <img src="/img/plants.png" alt="Logo" class="h-32 w-40 mt-10 object-contain">
            <br>
            <br>
            <br>
        </div>
        
    </div>
</section>
<section id="tentang-kami" class="bg-gray-100 py-20">
    <h2 class="text-4xl font-semibold mb-8 ml-20">Tentang kami</h2>
    <div class="container mx-auto bg-white rounded-lg shadow-lg p-8">
        <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et eros fermentum, pharetra odio a, suscipit ipsum. Duis eget ipsum eu nulla facilisis cursus. Duis ultrices, mi id scelerisque malesuada, libero enim tincidunt lorem, nec faucibus enim velit vitae nulla.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et eros fermentum, pharetra odio a, suscipit ipsum. Duis eget ipsum eu nulla facilisis cursus. Duis ultrices, mi id scelerisque malesuada, libero enim tincidunt lorem, nec faucibus enim velit vitae nulla.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et eros fermentum, pharetra odio a, suscipit ipsum. Duis eget ipsum eu nulla facilisis cursus. Duis ultrices, mi id scelerisque malesuada, libero enim tincidunt lorem, nec faucibus enim velit vitae nulla.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et eros fermentum, pharetra odio a, suscipit ipsum. Duis eget ipsum eu nulla facilisis cursus. Duis ultrices, mi id scelerisque malesuada, libero enim tincidunt lorem, nec faucibus enim velit vitae nulla.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et eros fermentum, pharetra odio a, suscipit ipsum. Duis eget ipsum eu nulla facilisis cursus. Duis ultrices, mi id scelerisque malesuada, libero enim tincidunt lorem, nec faucibus enim velit vitae nulla.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et eros fermentum, pharetra odio a, suscipit ipsum. Duis eget ipsum eu nulla facilisis cursus. Duis ultrices, mi id scelerisque malesuada, libero enim tincidunt lorem, nec faucibus enim velit vitae nulla.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et eros fermentum, pharetra odio a, suscipit ipsum. Duis eget ipsum eu nulla facilisis cursus. Duis ultrices, mi id scelerisque malesuada, libero enim tincidunt lorem, nec faucibus enim velit vitae nulla.</p>
    </div>
    <br>
    <br>
    <br>
    <!-- 3 Kotak dengan Gambar -->
    <div class="container mx-auto flex justify-between">
        <!-- Kotak Pertama -->
        <div class="w-1/3 mx-4">
            <!-- Gambar Pertama -->
            <img src="/img/lp1.jpg" alt="Gambar 1" class="mx-auto">
        </div>
        <!-- Kotak Kedua -->
        <div class="w-1/3 mx-4">
            <!-- Gambar Kedua -->
            <img src="/img/lp2.jpg" alt="Gambar 2" class="mx-auto">
        </div>
        <!-- Kotak Ketiga -->
        <div class="w-1/3 mx-4">
            <!-- Gambar Ketiga -->
            <img src="/img/lp3.jpg" alt="Gambar 3" class="mx-auto">
        </div>
    </div>
</section>
<section class="bg-gray-100 py-20 flex flex-col md:flex-row items-center justify-center">
    <!-- Konten Lokasi -->
    <div class="md:w-1/2 mb-8 md:mb-0 mr-10 ml-10">
        <div class="container mx-auto mb-8 md:mb-0">
            <h2 class="text-4xl font-semibold mb-8">Lokasi Kami</h2>
            <p class="text-lg mb-4">Temukan kami di peta di bawah ini:</p>
        </div>
        <!-- Langsung sisipkan tag iframe di dalam section -->
        <div class="container mx-auto">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.257517679392!2d107.62793871071514!3d-6.978911468311398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9f50a88e8fb%3A0xe43f74872d0e741f!2skos%20rumah%20daun!5e0!3m2!1sid!2sid!4v1715219145718!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!-- Konten Hubungi Kami -->
    <div class="md:w-1/2">
    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Send us an email</h1>
        <form>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Name*</label>
                <input type="text" id="name" name="name" value="Jane Doe" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email*</label>
                <input type="email" id="email" name="email" value="janedoe@gmail.com" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-medium">Your message</label>
                <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-500"></textarea>
            </div>
            <button type="submit" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-full">Submit</button>
        </form>
    </div>
    </div>
</section>
</body>
</html>
