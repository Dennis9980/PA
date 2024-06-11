<x-app-layout>
    <div class="grid gap-5 lg:grid-cols-3 lg:gap-10">
        <div class="bg-white text-black text-center rounded-xl py-2">
            <h1>Kamar</h1>
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
        <button id="laundryButton" class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Data Laundry
        </button>
        <button id="kebersihanButton" class="bg-gray-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">
            Data Kebersihan
        </button>
    </div>

    <div class="grid lg:grid-cols-2 lg:gap-4">
        
        <div id="laundryContent" class="bg-white rounded-lg p-4 mt-5 text-black">
            <h1 class="text-lg font-semibold mb-4">Data Laundry</h1>
            @foreach ($dataLaundry as $laundry)
                <div class="border rounded-md p-3 mb-3">
                    <p class="text-gray-700">Berat: {{ $laundry->berat }}</p>
                    <p class="text-gray-700">Tanggal Masuk: {{ $laundry->tanggal_masuk }}</p>
                    <p class="text-gray-700">Tanggal Selesai: {{ $laundry->tanggal_selesai }}</p>
                    <p class="text-gray-700">Total Harga: {{ $laundry->total_harga }}</p>
                </div>
            @endforeach
        </div>
    
        <div id="kebersihanContent" class=" bg-white rounded-lg p-4 mt-5 text-black">
            <h1 class="text-lg font-semibold mb-4">Dana Kebersihan</h1>
            @foreach ($dataKebersihan as $item)
                <p class="text-gray-700">Bulan: {{ $item->bulan }}, Total Dana: {{ $item->total_dana }}</p>
            @endforeach
    
            @if ($jadwalKebersihan)
                <h3 class="font-bold mt-4">Jadwal Kebersihan Terdekat:</h3>
                <p class="text-gray-700">Tanggal: {{ $jadwalKebersihan->tanggal_kebersihan }}</p>
                <p class="text-gray-700">Keterangan: {{ $jadwalKebersihan->keterangan }}</p>
            @else
                <p class="text-gray-700 mt-4">Tidak ada jadwal kebersihan mendatang.</p>
            @endif
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const laundryButton = document.getElementById('laundryButton');
        const kebersihanButton = document.getElementById('kebersihanButton');
        const laundryContent = document.getElementById('laundryContent');
        const kebersihanContent = document.getElementById('kebersihanContent');

        laundryButton.addEventListener('click', () => {
            laundryContent.classList.remove('hidden');
            kebersihanContent.classList.add('hidden');
        });

        kebersihanButton.addEventListener('click', () => {
            laundryContent.classList.add('hidden');
            kebersihanContent.classList.remove('hidden');
        });
    });
</script>
