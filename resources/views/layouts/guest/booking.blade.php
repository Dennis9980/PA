<x-guest-layout>
    <div class="grid lg:grid-cols-3 place-content-center lg:px-20 py-2">
        <div class="col-span-2">
            <div class="flex items-center justify-center lg:px-4">
                <div class="carousel w-11/12 lg:w-full gap-4 ">
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
            </div>
            <div class="px-4">
                <div class="lg:hidden p-6 bg-white rounded-2xl h-max text-black shadow-lg mt-4">
                    <h1 class="text-2xl uppercase font-semibold">Fasilitas Kamar</h1>
                    <div class="">
                        <ul class="max-w-md space-y-1 list-disc list-inside">
                            <li>Akses Jendela Keluar (Tipe A)</li>
                            <li>Kamar Mandi Dalam</li>
                            <li>Meja Besar</li>
                            <li>Lemari Kayu</li>
                            <li>Kasur</li>
                            <li>Ranjang</li>
                            <li>Kable LAN untuk WiFi</li>
                        </ul>
                    </div>

                    <label for="pilihTipeMobile" class="block mb-2 text-sm font-medium pt-5">Pilih tipe</label>
                    <select id="pilihTipeMobile"
                        class="countries w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-side-bar-color focus:border-side-bar-color">
                        <option value="Pilih Tipe">Pilih Tipe</option>
                        @foreach ($tipeKamarKosong as $tipe)
                            @switch($tipe)
                                @case('tipe_a')
                                    <option value="Tipe A">Tipe A</option>
                                @break

                                @case('tipe_b')
                                    <option value="Tipe B">Tipe B</option>
                                @break

                                @case('tipe_aac')
                                    <option value="Tipe A (AC)">Tipe A (AC)</option>
                                @break

                                @case('tipe_bac')
                                    <option value="Tipe B (AC)">Tipe B (AC)</option>
                                @break
                            @endswitch
                        @endforeach
                    </select>
                    <p class="p-2">Harga per tahun: <span id="hargaKamar" class="hargaKamar"></span></p>
                    <div class="flex justify-center">
                        <button id="bookingButton"
                            class="bookingButton bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 disabled:bg-gray-500 disabled:cursor-not-allowed"
                            disabled>Booking
                            Now</button>
                    </div>
                    <div id="bookingForm" class="bookingForm hidden p-6 text-black lg:w-full">
                        <h1 class="text-xl text-center uppercase font-semibold">Isi Data Booking</h1>
                        <p class="text-center">Dp: 2.000.000</p>
                        <p class="text-center">Tipe Kamar: <span id="inputTipeKamar" class="inputTipeKamar"></span></p>

                        <form action="{{ route('chechoutBooking') }}" method="POST" class="space-y-2 text-black">
                            @csrf
                            <input type="hidden" id="selectedTipeInput" name="modalTipeKamarInput" value="">
                            <input type="hidden" id="selectedHargaInput" name="modalHargaInput" value="">
                            <input type="hidden" id="dpInput" name="modalDpInput" value="2000000">
                            <input type="hidden" name="jenis_transaksi" value="booking">

                            <label for="namaLengkap" class="block mb-2 text-sm font-medium">Nama Lengkap</label>
                            <input type="text" name="nama_pembayar" id="nama_lengkap"
                                class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                placeholder="Nama Lengkap" required="">

                            <label for="noTelp" class="block mb-2 text-sm font-medium">No. Telepon</label>
                            <input type="text" name="no_telpon" id="no_telpon"
                                class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                placeholder="No Telepon" required="">

                            <label for="emaill" class="block mb-2 text-sm font-medium">Email</label>
                            <input type="email" name="email" id="emaill"
                                class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                placeholder="email@gmail.com" required="">

                            <label for="startDate" class="block mb-2 text-sm font-medium">Tanggal Mulai</label>
                            <input type="date" name="tgl_masuk" id="tgl_masuk"
                                class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                required="">
                            <div class="flex flex-row gap-3 pt-4">
                                <button id="cancelButton" type="button"
                                    class="cancelButton text-white bg-gray-500 hover:bg-gray-700 font-medium rounded-lg text-sm w-full py-2.5 me-2 mb-2">Batal</button>
                                <button type="submit"
                                    class="text-white bg-side-bar-color hover:bg-menu-hover hover:text-side-bar-color font-medium rounded-lg text-sm w-full py-2.5 me-2 mb-2">Konfirmasi
                                    Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-black grid lg:grid-cols-2 pt-4 lg:pt-0">
                    <div class="bg-white p-4 lg:m-5 drop-shadow-xl rounded-lg mb-4">
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
                    <div class="bg-white p-4 lg:m-5 drop-shadow-xl rounded-lg">
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
            </div>

            <div class="lg:px-5 text-black pt-4 lg:pt-0 md:pt-0">
                <div class="px-7 lg:drop-shadow-2xl lg:bg-white lg:rounded-xl lg:p-4">
                    <h1 class="uppercase text-center text-2xl py-2 font-semibold">Peraturan Kamar</h1>
                    <ul class="space-y-2 list-disc list-inside">
                        <li>Akses masuk ke rumah daun 24 jam menggunakan access card, namun tidak berlaku untuk
                            teman.</li>
                        <li>Batas waktu teman berkunjung hingga pukul 23.00 dan tidak boleh menginap. Hanya orang
                            tua dan
                            saudara kandung yang diperbolehkan menginap.</li>
                        <li>Setelah pukul 23.00, teman tidak diperbolehkan masuk ke dalam kosan, meskipun hanya
                            sebentar.
                            Teman dapat menunggu di luar gerbang.</li>
                        <li>Bapak Hari adalah penjaga malam virtual rumah daun. Aktivitas keluar masuk kosan setelah
                            pukul
                            23.00 akan termonitor.</li>
                        <li>Jika saudara kandung menginap, harap memberi tahu paling lambat 1 hari sebelumnya dengan
                            menyertakan bukti KTP/KK/telepon dari orang tua.</li>
                        <li>Tamu putri dilarang masuk kamar dengan alasan apapun dan hanya boleh diterima di ruang
                            tamu.
                            Toilet untuk tamu putri tersedia di lantai 1 sebelah dapur.</li>
                        <li>Pastikan pintu gerbang tertutup rapat sebelum pergi, terutama pada malam hari. Jangan
                            menarik
                            paksa gerbang saat terbuka lebar, biarkan menutup sendiri secara otomatis.</li>
                        <li>Parkir motor di dalam rumah daun hanya untuk penghuni kos yang memiliki label dan
                            motornya tidak
                            bocor oli. Parkirlah motor dengan rapi sesuai garis kuning di lantai. Motor teman harap
                            parkir
                            di luar gerbang.</li>
                        <li>Semua penghuni kos diharapkan menjaga ketenangan dengan cara:
                            <ul>
                                <li>Mengingatkan teman/tamunya agar tidak gaduh.</li>
                                <li>Tidak membawa teman dalam jumlah besar.</li>
                                <li>Tidak berteriak keras saat bermain game atau menyetel musik dengan suara keras.
                                </li>
                                <li>Tidak memainkan alat musik yang tidak bisa menggunakan headphone.</li>
                                <li>Mematikan suara mesin motor di dalam rumah daun setelah pukul 23.00.</li>
                            </ul>
                        </li>
                        <li>Dilarang membawa dan memelihara hewan peliharaan di dalam kosan.</li>
                        <li>Dilarang mencoret, memasang stiker/double tape/paku pada dinding kamar/lemari/meja, atau
                            mengubah warna cat kamar. Pelanggaran akan dikenakan biaya perbaikan hingga Rp500.000.
                        </li>
                        <li>Dilarang keras membawa, menyimpan, dan mengonsumsi obat-obatan terlarang, minuman keras,
                            serta
                            berjudi di rumah daun.</li>
                        <li>Dilarang melakukan keributan, perkelahian, tindakan asusila, pencurian, atau perusakan
                            barang
                            milik penghuni lain atau inventaris rumah daun.</li>
                        <li>Demi keamanan, orang luar tidak diperbolehkan masuk ke dalam rumah daun. Penghuni kos
                            diharapkan
                            menjemput teman dan mengambil pesanan makanan di gerbang.</li>
                        <li>Dilarang membuang sampah sisa makanan ke dalam saluran pembuangan di kamar mandi. Cuci
                            piring di
                            dapur/pantry yang tersedia di setiap lantai.</li>
                        <li>Pembayaran sewa kamar hanya sah dan mendapatkan kamar jika transfer ke pemilik kos atas
                            nama
                            Bapak Hari. Konfirmasi ketersediaan kamar dan perpanjangan sewa juga hanya dilakukan
                            dengan
                            pemilik kos.</li>
                        <li>Kamar disewakan bagi penyewa yang dapat mengikuti aturan kos dan bersedia menggunakan
                            jasa
                            laundry di rumah daun.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="hidden lg:block">
            <div class="p-6 bg-white rounded-2xl h-max text-black shadow-lg ">
                <h1 class="text-2xl uppercase font-semibold">Fasilitas Kamar</h1>
                <div class="">
                    <ul class="max-w-md space-y-1 list-disc list-inside">
                        <li>Akses Jendela Keluar (Tipe A)</li>
                        <li>Kamar Mandi Dalam</li>
                        <li>Meja Besar</li>
                        <li>Lemari Kayu</li>
                        <li>Kasur</li>
                        <li>Ranjang</li>
                        <li>Kable LAN untuk WiFi</li>
                    </ul>
                </div>

                <label for="countries" class="block mb-2 text-xl text-center font-bold pt-5">Booking Sekarang</label>
                <select id="countries"
                    class="countries w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-side-bar-color focus:border-side-bar-color">
                    <option value="Pilih Tipe">Pilih Tipe</option>
                    @foreach ($tipeKamarKosong as $tipe)
                        @switch($tipe)
                            @case('tipe_a')
                                <option value="Tipe A">Tipe A</option>
                            @break

                            @case('tipe_b')
                                <option value="Tipe B">Tipe B</option>
                            @break

                            @case('tipe_aac')
                                <option value="Tipe A (AC)">Tipe A (AC)</option>
                            @break

                            @case('tipe_bac')
                                <option value="Tipe B (AC)">Tipe B (AC)</option>
                            @break
                        @endswitch
                    @endforeach
                </select>
                <p class="p-2">Harga per tahun: <span id="hargaKamar" class="hargaKamar"></span></p>
                <div class="flex justify-center">

                </div>
                <div id="bookingForm" class=" bookingForm hidden p-6 text-black lg:w-full">
                    <h1 class="text-xl text-center uppercase font-semibold">Isi Data Booking</h1>
                    <p class="text-center">Dp: 2.000.000</p>
                    <p class="text-center">Tipe Kamar: <span id="inputTipeKamar" class="inputTipeKamar"></span></p>

                    <form action="{{ route('chechoutBooking') }}" method="POST" class="space-y-2 text-black">
                        @csrf
                        <input type="hidden" id="tipeKamarInput" name="modalTipeKamarInput" value="">
                        <input type="hidden" id="hargaInput" name="modalHargaInput" value="">
                        <input type="hidden" id="dpInput" name="modalDpInput" value="2000000">
                        <input type="hidden" name="jenis_transaksi" value="booking">
                        <label for="namaLengkap" class="block mb-2 text-sm font-medium">Nama Lengkap</label>
                        <input type="text" name="nama_pembayar" id="nama_lengkap"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Nama Lengkap" required="">

                        <label for="noTelp" class="block mb-2 text-sm font-medium">No. Telepon</label>
                        <input type="text" name="no_telpon" id="no_telpon"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="No Telepon" required="">

                        <label for="emaill" class="block mb-2 text-sm font-medium">Email</label>
                        <input type="email" name="email" id="emaill"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="email@gmail.com" required="">

                        <label for="startDate" class="block mb-2 text-sm font-medium">Tanggal Mulai</label>
                        <input type="date" name="tgl_masuk" id="tgl_masuk"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            required="">
                        <div class="flex flex-row gap-3 pt-4">
                            <button id="cancelButton" type="button"
                                class=" cancelButton px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Konfirmasi
                                Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @if (isset($transaksi) && isset($snapToken))
        <div id="bookingModal"
            class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm text-black">
            <div class="bg-white p-8 rounded-md">
                <h2 class="text-2xl font-semibold mb-4 text-center ">Konfirmasi Booking</h2>

                <table>
                    <tr>
                        <td>Nama</td>
                        <td class="px-2">:</td>
                        <td>{{ $transaksi->nama_pembayar }}</td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td class="px-2">:</td>
                        <td>{{ $transaksi->no_telpon }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td class="px-2">:</td>
                        <td>{{ $transaksi->email }}</td>
                    </tr>
                    <tr>
                        <td>Tipe Kamar</td>
                        <td class="px-2">:</td>
                        <td>{{ $transaksi->tipe_kos }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td class="px-2">:</td>
                        <td>{{ $transaksi->tgl_masuk }}</td>
                    </tr>
                    <tr>
                        <td>Uang Muka</td>
                        <td class="px-2">:</td>
                        <td>{{ number_format($transaksi->dp, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Total Harga</td>
                        <td class="px-2">:</td>
                        <td>{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    </tr>
                </table>

                <div class="flex flex-row justify-center gap-4 mt-4">
                    <button id="pay-button" type="submit"
                        class="px-4 py-2 bg-green-500 text-white rounded">Bayar</button>
                    <form action="{{ route('deleteBooking', $transaksi->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded ">Batal
                            Booking</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</x-guest-layout>


<script>
    const hargaKamarData = {
        'Tipe A': 14000000,
        'Tipe B': 12000000,
        'Tipe A (AC)': 15000000,
        'Tipe B (AC)': 14000000
    };

    const hargaElement = document.querySelector('.hargaKamar');
    const tipeKamar = document.querySelector('.inputTipeKamar');
    const selectedTipeInput = document.getElementById('selectedTipeInput');
    const selectedHargaInput = document.getElementById('selectedHargaInput');
    const tipeKamarInput = document.getElementById('tipeKamarInput');
    const hargaInput = document.getElementById('hargaInput');
    const bookingForm = document.querySelector('.bookingForm');
    const bookingButton = document.querySelector('.bookingButton');
    const cancelButton = document.querySelector('.cancelButton');
    const bookingModal = document.getElementById('bookingModal');
    const closeModal = document.getElementById('closeModal');
    const selectElements = document.querySelectorAll('.countries'); // Pilih semua elemen dengan class "countries"

    selectElements.forEach(selectElement => {
        selectElement.addEventListener('change', (event) => {
            const selectedTipe = event.target.value;
            const harga = hargaKamarData[selectedTipe] || 0;

            // Cari elemen hargaKamar dan inputTipeKamar yang terkait dengan selectElement ini
            const hargaElement = selectElement.parentElement.querySelector('.hargaKamar');
            const tipeKamar = selectElement.parentElement.querySelector('.inputTipeKamar');

            hargaElement.textContent = harga.toLocaleString('id-ID');
            tipeKamar.textContent = selectedTipe;
            selectedTipeInput.value = selectedTipe;
            selectedHargaInput.value = harga;
            tipeKamarInput.value = selectedTipe;
            hargaInput.value = harga;

            // Sembunyikan semua formulir booking terlebih dahulu
            document.querySelectorAll('.bookingForm').forEach(form => {
                form.classList.add('hidden');
            });

            // Tampilkan formulir booking yang sesuai dengan selectElement ini
            if (selectedTipe !== 'Pilih Tipe') {
                if (window.innerWidth < 1024) {
                    // Jika di mobile, tampilkan formulir mobile
                    selectElement.parentElement.querySelector('.bookingButton').classList.add('hidden');
                    selectElement.parentElement.querySelector('.bookingForm').classList.remove(
                        'hidden');
                } else {
                    // Jika di desktop, tampilkan formulir desktop
                    selectElement.parentElement.querySelector('.bookingForm').classList.remove(
                        'hidden');
                }
            } else {
                // Jika "Pilih Tipe" dipilih, tampilkan tombol booking
                selectElement.parentElement.querySelector('.bookingButton').classList.remove('hidden');
            }
        });
    });

    bookingButton.addEventListener('click', () => {
        bookingButton.classList.add('hidden');
        bookingForm.classList.remove('hidden');
    });

    cancelButton.addEventListener('click', () => {
        bookingForm.classList.add('hidden');
        bookingButton.classList.remove('hidden');
        selectElement.value = 'Pilih Tipe';
        hargaElement.textContent = '0';
    });

    closeModal.addEventListener('click', () => {
        bookingModal.classList.add('hidden');
    });
</script>
<script>
    // For example trigger on button clicked, or any time you need
    document.addEventListener('DOMContentLoaded', function() {
        var payButton = document.getElementById('pay-button');
        @if (isset($snapToken))
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        var transactionId = result.order_id;
                        window.location.href = `/invoice/${transactionId}`;
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("waiting for your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });
        @endif
    });
</script>
