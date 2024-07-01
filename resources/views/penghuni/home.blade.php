<x-app-layout>
    <div class="grid gap-5 lg:grid-cols-3 lg:gap-10">
        <div class="bg-white text-black text-center rounded-xl py-2">
            <div class="flex flex-row justify-center items-center">
                <h1>
                    Kamar
                </h1>
                <div>
                </div>
                @switch($data->kamarKos->tipe)
                    @case('tipe_a')
                        @if ($data->terbayar >= 14000000)
                            <p class="text-green-500 p-2">(Lunas)</p>
                        @else
                            <p class="text-red-500 p-2">(Belum Lunas)</p>
                        @endif
                    @break

                    @case('tipe_b')
                        @if ($data->terbayar >= 12000000)
                            <p class="text-green-500 p-2">(Lunas)</p>
                        @else
                            <p class="text-red-500 p-2">(Belum Lunas)</p>
                        @endif
                    @break

                    @case('tipe_aac')
                        @if ($data->terbayar >= 15000000)
                            <p class="text-green-500 p-2">(Lunas)</p>
                        @else
                            <p class="text-red-500 p-2">(Belum Lunas)</p>
                        @endif
                    @break

                    @case('tipe_bac')
                        @if ($data->terbayar >= 14000000)
                            <p class="text-green-500 p-2">(Lunas)</p>
                        @else
                            <p class="text-red-500 p-2">(Belum Lunas)</p>
                        @endif
                    @break

                    @default
                        <p class="px-2">(Belum di set)</p>
                @endswitch
            </div>
            <p>
                {{ $data->kamarKos->nomor_kamar }}
            </p>
        </div>
        <div class="bg-white text-black text-center rounded-xl py-2">
            <h1>Tanggal Masuk</h1>
            <p>
                {{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('d F Y') }}
            </p>

        </div>
        <div class="bg-white text-black text-center rounded-xl py-2">
            <h1>Tanggal Selesai</h1>
            <p>
                {{ \Carbon\Carbon::parse($data->tanggal_selesai)->format('d F Y') }}
            </p>
        </div>
    </div>
    <div class="flex justify-center mt-5">


        <!-- Modal toggle -->

        <button type="button"
            class="text-white bg-side-bar-color hover:bg-menu-hover hover:text-side-bar-color font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            data-modal-toggle="pembayaran-modal">
            Tambah Pembayaran
        </button>

        <!-- Main modal -->
        <div id="pembayaran-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed flex inset-0 backdrop-blur-sm z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow  ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Tambah Pembayaran
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  "
                            data-modal-hide="pembayaran-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('transaksiPembayaran') }}" method="POST">
                        @csrf
                        <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                        <input type="hidden" name="no_telpon" value="{{ auth()->user()->penghuni->phone }}">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                <input type="text" name="nama_pembayar" id="name"
                                    class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                    placeholder="Nama lengkap" value="{{ auth()->user()->name }}" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="kamar"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Kamar</label>
                                <input type="text" name="kamar" id="kamar"
                                    class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                    placeholder="No Kamar"
                                    value="Kamar {{ auth()->user()->penghuni->kamarKos->nomor_kamar }}" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Total
                                    Bayar</label>
                                <input type="text" name="jumlah_bayar" id="price"
                                    class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                    placeholder="Total Bayar" required="" oninput="formatCurrency(this)">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Jenis
                                    Transaksi</label>
                                <select id="category" name="jenis_transaksi"
                                    class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5">
                                    <option selected="">Pilih Jenis</option>
                                    <option value="laundry">Laundry</option>
                                    <option value="kebersihan">Kebersihan</option>
                                    <option value="pelunasan_kamar">Pelunasan Kamar</option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Tujuan
                                    Bayar</label>
                                <textarea id="description" rows="4" name="tujuan_bayar"
                                    class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                    placeholder="Tulis tujuan pembayaran"></textarea>
                            </div>
                        </div>
                        <button type="submit"
                            class="btn text-white bg-side-bar-color hover:bg-menu-hover font-normal hover:font-semibold hover:text-side-bar-color w-full">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="grid lg:grid-cols-2 lg:gap-4">
        <div id="laundryContent" class="bg-white rounded-lg p-4 mt-5 text-black">
            <div class="flex justify-between">
                <h1 class="text-lg font-semibold mb-4">Data Laundry</h1>
                <h2 class="font-semibold">Saldo:
                    {{ number_format(Auth::user()->penghuni->saldo_laundry, 0, ',', '.') }}</h2>
            </div>
            @if ($dataLaundry->count())
                @foreach ($dataLaundry as $laundry)
                    <div class="border rounded-md p-3 mb-3">
                        <p class="text-gray-700">Berat: {{ $laundry->berat }}</p>
                        <p class="text-gray-700">Tanggal Masuk: {{ $laundry->tanggal_masuk }}</p>
                        <p class="text-gray-700">Tanggal Selesai: {{ $laundry->tanggal_selesai }}</p>
                        <p class="text-gray-700">Total Harga: {{ number_format($laundry->total_harga, 0, ',', '.') }}</p>
                    </div>
                @endforeach
            @else
                <p>Tidak ada laundry</p>
            @endif
        </div>

        <div id="kebersihanContent" class=" bg-white rounded-lg p-4 mt-5 h-max text-black">
            <div class="flex justify-between">
                <h1 class="text-lg font-semibold mb-4">Dana Kebersihan</h1>
                <h2 class="font-semibold flex flex-row">Dana:
                    @if (Auth::user()->penghuni->dana_kebersihan == 30000)
                        <p class="text-green-400 ml-2">Lunas</p>
                    @else
                        <p class="text-red-500 ml-2">Belum Lunas</p>
                    @endif
                </h2>
            </div>

            @if ($jadwalKebersihan)
                <h3 class="font-bold">Jadwal Kebersihan Terdekat:</h3>
                <p class="text-gray-700">Tanggal: {{ $jadwalKebersihan->tanggal_kebersihan }}</p>
                <p class="text-gray-700">Keterangan: {{ $jadwalKebersihan->keterangan }}</p>
            @else
                <p class="text-gray-700 mt-4">Tidak ada jadwal kebersihan mendatang.</p>
            @endif
        </div>
    </div>

    {{-- @dd($transaksi, $snapToken) --}}
    @if (isset($transaksi) && isset($snapToken))
        <div id="transaksiModal"
            class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm text-black">
            <div class="bg-white p-8 rounded-md">
                <h2 class="text-2xl font-semibold mb-4 text-center ">Konfirmasi Pembayaran</h2>

                <table>
                    <tr>
                        <td>Nama</td>
                        <td class="px-2">:</td>
                        <td>{{ $transaksi->nama_pembayar }}</td>
                    </tr>
                    <tr>
                        <td>Kamar</td>
                        <td class="px-2">:</td>
                        <td>{{ $transaksi->no_kamar }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Transaksi</td>
                        <td class="px-2">:</td>
                        <td>{{ $transaksi->jenis_transaksi }}</td>
                    </tr>
                    <tr>
                        <td>Total Pembayarn</td>
                        <td class="px-2">:</td>
                        <td>{{ number_format($transaksi->jumlah_bayar, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Bayar</td>
                        <td class="px-2">:</td>
                        <td>{{ $transaksi->tanggal_pembayaran }}</td>
                    </tr>
                    <tr>
                        <td>Tujuan Pembayaran</td>
                        <td class="px-2">:</td>
                        <td>{{ $transaksi->tujuan_bayar }}</td>
                    </tr>
                </table>

                <div class="flex flex-row justify-center gap-4 mt-4">
                    <button type="button" id="buttonTransaksi"
                        class="px-4 py-2 bg-blue-500 text-white rounded">Bayar</button>
                    <form action="{{ route('deleteBooking', $transaksi->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded ">Batal Pembayaran</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-jn6AAGw3nOCJNPzl"></script>

<script>
    // For example trigger on button clicked, or any time you need
    document.addEventListener('DOMContentLoaded', function() {
        var payButton = document.getElementById('buttonTransaksi');
        @if (isset($snapToken))
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        var transactionId = result.order_id;
                        window.location.href = `pembayaran/invoice/${transactionId}`;
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
<script>
    function formatCurrency(input) {
        const value = input.value.replace(/[^0-9,-]/g, ''); // Remove non-numeric characters
        const formattedValue = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0, // Set minimum decimal places
            maximumFractionDigits: 2 // Set maximum decimal places
        }).format(value); // Format the value to Indonesian currency

        input.value = formattedValue;
    }
</script>
