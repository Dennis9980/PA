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
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">
    @include('layouts.guest.partials.navbar-guest')
    <!-- Konten dengan background gambar -->
    <section>
        <div class="relative">
            <x-bg-landing-page />
            <div class="absolute top-20 left-5 right-0 z-9 p-8 text-white">
                <h1 class="text-4xl font-semibold mb-4">
                    Tinggal Nyaman, <br>
                    Hidup Bahagia, <br>
                    Temukan Kosan Impianmu Di Sini!
                </h1>
                <button class="btn btn-error text-lg">Booking</button>
                <img src="/img/plants.png" alt="Logo" class="h-32 w-40 mt-10">
            </div>
        </div>
    </section>
    <section id="tentang-kami" class="text-center md:px-24 lg:px-32">
        <h2 class="text-4xl font-semibold mt-8">Tentang kami</h2>
        <div class="px-4 pt-5">
            <div class="block p-10 bg-white border border-gray-200 rounded-box drop-shadow-2xl">
                <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et eros fermentum,
                    pharetra odio a, suscipit ipsum. Duis eget ipsum eu nulla facilisis cursus. Duis ultrices, mi id
                    scelerisque malesuada, libero enim tincidunt lorem, nec faucibus enim velit vitae nulla.Lorem ipsum
                    dolor sit amet, consectetur adipiscing elit. Nullam et eros fermentum, pharetra odio a, suscipit
                    ipsum.
                    Duis eget ipsum eu nulla facilisis cursus. Duis ultrices, mi id scelerisque malesuada, libero enim
                    tincidunt lorem, nec faucibus enim velit vitae nulla.Lorem ipsum dolor sit amet, consectetur
                    adipiscing
                    elit. Nullam et eros fermentum, pharetra odio a, suscipit ipsum. Duis eget ipsum eu nulla facilisis
                    cursus. Duis ultrices, mi id scelerisque malesuada, libero enim tincidunt lorem, nec faucibus enim
                    velit
                    vitae nulla.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et eros fermentum,
                    pharetra
                    odio a, suscipit ipsum. Duis eget ipsum eu nulla facilisis cursus. Duis ultrices, mi id scelerisque
                    malesuada, libero enim tincidunt lorem, nec faucibus enim velit vitae nulla.Lorem ipsum dolor sit
                    amet,
                    consectetur adipiscing elit. Nullam et eros fermentum, pharetra odio a, suscipit ipsum. Duis eget
                    ipsum
                    eu nulla facilisis cursus. Duis ultrices, mi id scelerisque malesuada, libero enim tincidunt lorem,
                    nec
                    faucibus enim velit vitae nulla.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et
                    eros
                    fermentum, pharetra odio a, suscipit ipsum. Duis eget ipsum eu nulla facilisis cursus. Duis
                    ultrices, mi
                    id scelerisque malesuada, libero enim tincidunt lorem, nec faucibus enim velit vitae nulla.Lorem
                    ipsum
                    dolor sit amet, consectetur adipiscing elit. Nullam et eros fermentum, pharetra odio a, suscipit
                    ipsum.
                    Duis eget ipsum eu nulla facilisis cursus. Duis ultrices, mi id scelerisque malesuada, libero enim
                    tincidunt lorem, nec faucibus enim velit vitae nulla.</p>
            </div>
            <h2 class="text-4xl font-semibold mt-8">Tipe Kamar</h2>
            <div class="carousel carousel-center p-4 mt-5 space-x-4 bg-white rounded-box drop-shadow-2xl h-56 lg:h-96">
                <!-- Kotak Pertama -->
                <div class="carousel-item">
                    <!-- Gambar Pertama -->
                        <img src="/img/lp1.jpg" alt="Gambar 1" class="static rounded-box">
                        <h2 class="absolute bg-orange-500 rounded-tl-lg py-2 px-4 rounded-br-lg text-white">Tipe A</h2>
                        <p class="absolute bg-orange-500 rounded-t-lg p-2 text-white">Rp. 1.000.000</p>
                </div>
                <!-- Kotak Kedua -->
                <div class="carousel-item">
                    <!-- Gambar Kedua -->
                    <img src="/img/lp2.jpg" alt="Gambar 2" class="relative rounded-box">
                    <h2 class="absolute bg-orange-500 rounded-tl-lg py-2 px-4 rounded-br-lg text-white">Tipe B</h2>
                </div>
                <!-- Kotak Ketiga -->
                <div class="carousel-item">
                    <!-- Gambar Ketiga -->
                    <img src="/img/lp3.jpg" alt="Gambar 3" class="relative rounded-box">
                    <h2 class="absolute bg-orange-500 rounded-tl-lg py-2 px-4 rounded-br-lg text-white">Tipe C</h2>
                </div>
                
            </div>
        </div>
    </section>
    <section class="px-4 grid grid-cols-1 md:px-24 lg:px-32 xl:grid-cols-2 xl:mx-32 xl:place-content-center">
        <!-- Konten Lokasi -->
        <div class="text-center xl:ml-12">
            <div>
                <h2 class="text-4xl pt-9 font-semibold mb-2">Lokasi Kami</h2>
                <p class="text-lg mb-2">Temukan kami di peta di bawah ini:</p>
            </div>
            <!-- Langsung sisipkan tag iframe di dalam section -->
            <div class="container drop-shadow-2xl mx-auto aspect-video">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.257517679392!2d107.62793871071514!3d-6.978911468311398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9f50a88e8fb%3A0xe43f74872d0e741f!2skos%20rumah%20daun!5e0!3m2!1sid!2sid!4v1715219145718!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-full">
                </iframe>
            </div>
        </div>
        <!-- Konten Hubungi Kami -->
        <div class="py-10">
            <div class="max-w-md mx-auto p-6 bg-white rounded-box drop-shadow-2xl">
                <h1 class="text-2xl font-semibold mb-4 text-center">Contact Us</h1>
                <form>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium">Name*</label>
                        <input type="text" id="name" name="name" value="Jane Doe"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium">Email*</label>
                        <input type="email" id="email" name="email" value="janedoe@gmail.com"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-medium">Your message</label>
                        <textarea id="message" name="message" rows="4"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-500"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-full">Submit</button>
                </form>
            </div>
        </div>
    </section>
</body>
<script>
    document.querySelectorAll('.dropdown-content a[href^="#"]').forEach(link => {
    link.addEventListener('click', function (event) {
        event.preventDefault();

        // Close the dropdown menu
        link.closest('.dropdown').classList.remove('active'); 

        const targetId = this.getAttribute('href');
        const targetSection = document.querySelector(targetId);

        if (targetSection) {
            const offset = 50; // Adjust for header or other elements as needed
            targetSection.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'nearest', top: targetSection.offsetTop - offset });
        }
    });
});

</script>

</html>
