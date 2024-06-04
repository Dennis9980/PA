<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/d2f94ceef2.js" crossorigin="anonymous"></script>
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans">
    @include('layouts.guest.partials.navbar-guest')
    <div class="mx-24 py-10">
        <div class="flex flex-row justify-center gap-5">
            <div class="carousel w-7/12 gap-4 drop-shadow-2xl">
                <div id="item1" class="carousel-item w-full">
                    <img src="/img/lp2.jpg" alt="Gambar 2" class="rounded-box">
                </div>
                <div id="item2" class="carousel-item w-full">
                    <img src="/img/lp2.jpg" alt="Gambar 2" class="rounded-box">
                </div>
                <div id="item3" class="carousel-item w-full">
                    <img src="/img/lp2.jpg" alt="Gambar 2" class="rounded-box">
                </div>
                <div id="item4" class="carousel-item w-full">
                    <img src="/img/lp2.jpg" alt="Gambar 2" class="rounded-box">
                </div>
            </div>

            <div class="p-6 bg-white border border-gray-200 rounded-2xl h-max text-black shadow-2xl w-4/12">
                <h1 class="text-2xl uppercase font-semibold">Fasilitas Kamar</h1>
                <div class="">
                    <ul class="max-w-md space-y-1 list-disc list-inside">
                        <li>Akses Jendela Keluar (Tipe A)</li>
                        <li><i class="fa-solid fa-shower"></i> Kamar Mandi Dalam</li>
                        <li>Meja Besar</li>
                        <li>Lemari Kayu</li>
                        <li>Kasur</li>
                        <li>Ranjang</li>
                        <li>Kable LAN untuk WiFi</li>
                    </ul>
                </div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                    option</label>
                <select id="countries"
                    class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Pilih Tipe</option>
                    <option value="Tipe A">Tipe A</option>
                    <option value="Tipe B">Tipe B</option>
                    <option value="Tipe A (AC)">Tipe A (AC)</option>
                    <option value="Tipe B (AC)">Tipe B (AC)</option>
                </select>
                <p class="p-2">Harga per tahun: <span id="hargaKamar"></span></p>
                <div class="flex justify-center">
                    <button id="bookingButton"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Booking
                        Now</button>
                </div>
            </div>

            <div id="bookingModal"
                class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 flex items-center justify-center"
                x-data="{ open: false }">
                <div class="relative p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3">
                        <div class="text-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="bookingModalLabel">
                                Konfirmasi Booking
                            </h3>
                            <div class="mt-2 px-7 py-3">
                                <p class="text-sm text-gray-500">
                                    Tipe Kamar: <span id="modalTipeKamar"></span>
                                </p>
                                <p class="text-sm text-gray-500">
                                    Harga: <span id="modalHarga"></span>
                                </p>
                                <p class="text-sm text-gray-500">
                                    Dp: 2.000.000
                                </p>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <!-- Isi Form Booking -->
                            <form action="/checkout" method="POST">
                                @csrf
                                <input type="hidden" id="modalTipeKamarInput" name="modalTipeKamarInput" value="">
                                <input type="hidden" id="modalHargaInput" name="modalHargaInput" value="">
                                <input type="hidden" id="modalDpInput" name="modalDpInput" value="2000000">

                                <label for="namaLengkap" class="block mb-2 text-sm font-medium">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nama Lengkap" required="">
                                
                                <label for="noTelp" class="block mb-2 text-sm font-medium">No. Telepon</label>
                                <input type="text" name="no_telpon" id="no_telpon" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="No Telepon" required="">
                                
                                <label for="emaill" class="block mb-2 text-sm font-medium">Email</label>
                                <input type="email" name="email" id="emaill" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="email@gmail.com" required="">
                                
                                <label for="startDate" class="block mb-2 text-sm font-medium">Tanggal Mulai</label>
                                <input type="date" name="tgl_masuk" id="tgl_masuk" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                                
                                <div class="flex flex-row items-center gap-2 mt-4">
                                    <button id="closeModal" type="button" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Batal</button>
                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Konfirmasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-black grid grid-cols-2 px-10">
            <div class="bg-white p-5 m-5 drop-shadow-xl rounded-xl">
                <h1 class="text-xl uppercase font-semibold">Spesifikasi Kamar (Tipe A)</h1>
                <div class="pl-4">
                    <ul class="max-w-md space-y-1 list-disc list-inside">
                        <li>Ukuran Kamar: 4 x 3</li>
                        <li>Include listrik</li>
                        <li>Kamar Mandi Dalam</li>
                        <li>AC (Beberapa Kamar)</li>
                    </ul>
                </div>
            </div>
            <div class="bg-white p-5 m-5 drop-shadow-xl rounded-xl">
                <h1 class="text-xl uppercase font-semibold">Spesifikasi Kamar (Tipe B)</h1>
                <div class="pl-4">
                    <ul class="max-w-md space-y-1 list-disc list-inside">
                        <li>Ukuran Kamar: 3 x 3</li>
                        <li>Include listrik</li>
                        <li>Kamar Mandi Dalam</li>
                        <li>AC (Beberapa Kamar)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="px-24 text-black">
            <div class="drop-shadow-2xl bg-white rounded-xl p-4">
                <h1 class="uppercase text-center text-2xl py-2 font-semibold">Peraturan Kamar</h1>
                <ul class="space-y-2 list-disc list-inside">
                    <li>Akses masuk ke rumah daun 24 jam menggunakan access card, namun tidak berlaku untuk teman.</li>
                    <li>Batas waktu teman berkunjung hingga pukul 23.00 dan tidak boleh menginap. Hanya orang tua dan
                        saudara kandung yang diperbolehkan menginap.</li>
                    <li>Setelah pukul 23.00, teman tidak diperbolehkan masuk ke dalam kosan, meskipun hanya sebentar.
                        Teman dapat menunggu di luar gerbang.</li>
                    <li>Bapak Hari adalah penjaga malam virtual rumah daun. Aktivitas keluar masuk kosan setelah pukul
                        23.00 akan termonitor.</li>
                    <li>Jika saudara kandung menginap, harap memberi tahu paling lambat 1 hari sebelumnya dengan
                        menyertakan bukti KTP/KK/telepon dari orang tua.</li>
                    <li>Tamu putri dilarang masuk kamar dengan alasan apapun dan hanya boleh diterima di ruang tamu.
                        Toilet untuk tamu putri tersedia di lantai 1 sebelah dapur.</li>
                    <li>Pastikan pintu gerbang tertutup rapat sebelum pergi, terutama pada malam hari. Jangan menarik
                        paksa gerbang saat terbuka lebar, biarkan menutup sendiri secara otomatis.</li>
                    <li>Parkir motor di dalam rumah daun hanya untuk penghuni kos yang memiliki label dan motornya tidak
                        bocor oli. Parkirlah motor dengan rapi sesuai garis kuning di lantai. Motor teman harap parkir di luar gerbang.</li>
                    <li>Semua penghuni kos diharapkan menjaga ketenangan dengan cara:
                        <ul>
                            <li>Mengingatkan teman/tamunya agar tidak gaduh.</li>
                            <li>Tidak membawa teman dalam jumlah besar.</li>
                            <li>Tidak berteriak keras saat bermain game atau menyetel musik dengan suara keras.</li>
                            <li>Tidak memainkan alat musik yang tidak bisa menggunakan headphone.</li>
                            <li>Mematikan suara mesin motor di dalam rumah daun setelah pukul 23.00.</li>
                        </ul>
                    </li>
                    <li>Dilarang membawa dan memelihara hewan peliharaan di dalam kosan.</li>
                    <li>Dilarang mencoret, memasang stiker/double tape/paku pada dinding kamar/lemari/meja, atau
                        mengubah warna cat kamar. Pelanggaran akan dikenakan biaya perbaikan hingga Rp500.000.</li>
                    <li>Dilarang keras membawa, menyimpan, dan mengonsumsi obat-obatan terlarang, minuman keras, serta berjudi di rumah daun.</li>
                    <li>Dilarang melakukan keributan, perkelahian, tindakan asusila, pencurian, atau perusakan barang milik penghuni lain atau inventaris rumah daun.</li>
                    <li>Demi keamanan, orang luar tidak diperbolehkan masuk ke dalam rumah daun. Penghuni kos diharapkan menjemput teman dan mengambil pesanan makanan di gerbang.</li>
                    <li>Dilarang membuang sampah sisa makanan ke dalam saluran pembuangan di kamar mandi. Cuci piring di dapur/pantry yang tersedia di setiap lantai.</li>
                    <li>Pembayaran sewa kamar hanya sah dan mendapatkan kamar jika transfer ke pemilik kos atas nama Bapak Hari. Konfirmasi ketersediaan kamar dan perpanjangan sewa juga hanya dilakukan dengan pemilik kos.</li>
                    <li>Kamar disewakan bagi penyewa yang dapat mengikuti aturan kos dan bersedia menggunakan jasa laundry di rumah daun.</li>
                </ul>
            </div>
        </div>
    </div>
</body>

<script>
    const hargaKamarData = {
        'Tipe A': 14000000,
        'Tipe B': 12000000,
        'Tipe A (AC)': 15000000,
        'Tipe B (AC)': 14000000
    };

    const selectElement = document.getElementById('countries');
    const hargaElement = document.getElementById('hargaKamar');
    const modalTipeKamar = document.getElementById('modalTipeKamar');
    const modalHarga = document.getElementById('modalHarga');
    const modalTipeKamarInput = document.getElementById('modalTipeKamarInput');
    const modalHargaInput = document.getElementById('modalHargaInput');
    const modalDpInput = document.getElementById('modalDpInput');
    const bookingModal = document.getElementById('bookingModal');
    const bookingButton = document.getElementById('bookingButton');
    const closeModal = document.getElementById('closeModal');

    selectElement.addEventListener('change', (event) => {
        const selectedTipe = event.target.value;
        const harga = hargaKamarData[selectedTipe] || 0;
        hargaElement.textContent = harga.toLocaleString('id-ID');
    });

    bookingButton.addEventListener('click', () => {
        const selectedTipe = selectElement.value;
        const harga = hargaKamarData[selectedTipe] || 0;

        modalTipeKamar.textContent = selectedTipe;
        modalHarga.textContent = harga.toLocaleString('id-ID');
        modalTipeKamarInput.value = selectedTipe;
        modalHargaInput.value = harga;
        modalDpInput.value = 2000000;

        bookingModal.classList.remove('hidden');
    });

    closeModal.addEventListener('click', () => {
        bookingModal.classList.add('hidden');
    });
</script>

</html>
