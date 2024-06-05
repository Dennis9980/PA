<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <script src="https://kit.fontawesome.com/d2f94ceef2.js" crossorigin="anonymous"></script>
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans">
<div id="snap-container">
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
            <div class="max-w-screen-xl mx-auto px-10">
                <div class="text-black grid grid-cols-2 gap-10">
                    <div class="bg-white p-5 drop-shadow-xl rounded-xl">
                        <h1 class="text-2xl font-bold mb-4">Detail Pesanan</h1>
                        <ul class="max-w-md space-y-1 list-disc list-inside">
                            <li>Nama: {{ $booking->nama }}</li>
                            <li>No. Telepon: {{ $booking->phone }}</li>
                            <li>Email: {{ $booking->email }}</li>
                            <li>Tanggal Masuk: {{ $booking->durasi_tinggal }}</li>
                            <li>Tipe Kos: {{ $booking->tipe_kos }}</li>
                            <li>Total Harga: {{ $booking->total_harga }}</li>
                            <li>Dp: {{ $booking->Dp }}</li>
                        </ul>
                        <button id="pay-button" class="bg-blue-500 text-white font-bold py-3 px-6 mt-4 rounded hover:bg-blue-700">Bayar</button>
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
                    <li>Batas waktu teman berkunjung hingga pukul 23.00 dan tidak boleh menginap. Hanya orang tua dan saudara kandung yang diperbolehkan menginap.</li>
                    <li>Setelah pukul 23.00, teman tidak diperbolehkan masuk ke dalam kosan, meskipun hanya sebentar. Teman dapat menunggu di luar gerbang.</li>
                    <li>Bapak Hari adalah penjaga malam virtual rumah daun. Aktivitas keluar masuk kosan setelah pukul 23.00 akan termonitor.</li>
                    <li>Jika saudara kandung menginap, harap memberi tahu paling lambat 1 hari sebelumnya dengan menyertakan bukti KTP/KK/telepon dari orang tua.</li>
                    <li>Tamu putri dilarang masuk kamar dengan alasan apapun dan hanya boleh diterima di ruang tamu. Toilet untuk tamu putri tersedia di lantai 1 sebelah dapur.</li>
                    <li>Pastikan pintu gerbang tertutup rapat sebelum pergi, terutama pada malam hari. Jangan menarik paksa gerbang saat terbuka lebar, biarkan menutup sendiri secara otomatis.</li>
                    <li>Parkir motor di dalam rumah daun hanya untuk penghuni kos yang memiliki label dan motornya tidak bocor oli. Parkirlah motor dengan rapi sesuai garis kuning di lantai. Motor teman harap parkir di luar gerbang.</li>
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
                    <li>Dilarang mencoret, memasang stiker/double tape/paku pada dinding kamar/lemari/meja, atau mengubah warna cat kamar. Pelanggaran akan dikenakan biaya perbaikan hingga Rp500.000.</li>
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
    </div>
</body>

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    document.addEventListener('DOMContentLoaded', function() {
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    alert("payment success!"); console.log(result);
                },
                onPending: function(result){
                    /* You may add your own implementation here */
                    alert("waiting for your payment!"); console.log(result);
                },
                onError: function(result){
                    /* You may add your own implementation here */
                    alert("payment failed!"); console.log(result);
                },
                onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    });
</script>
</html>
