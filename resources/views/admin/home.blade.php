<x-app-layout>
    <div class="py-8">
        <div class="flex justify-end w-full px-11 pb-2">
            <div id="clock" class="font-bold text-white text-3xl text-center bg-side-bar-color rounded-lg w-max h-max px-3 py-1"></div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3">
            <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Kamar Tersedia</h5>
                <div class="flex flex-row">
                    <div class="flex-1 mr-4">
                        @foreach ($data->slice(0, 10) as $kamar)
                            <p class="font-normal text-gray-700">Kamar: {{ $kamar->nomor_kamar }}</p>
                        @endforeach
                    </div>

                    <div class="flex-1">
                        @foreach ($data->slice(10) as $kamar)
                            <p class="font-normal text-gray-700">Kamar: {{ $kamar->nomor_kamar }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="block max-w-sm h-max p-6 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Data Laundry</h5>
                <div class="flex flex-row">
                    <div class="flex-1 mr-4">
                        <p class="font-bold text-6xl text-gray-700 text-side-bar-color">{{ $dataLaundry }}</p>
                    </div>
                </div>
            </div>
            <div class="block max-w-sm h-max p-6 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Data Kebersihan</h5>
                <div class="flex flex-row">
                    <div class="flex-1 mr-4">
                        <p class="font-bold text-6xl text-gray-700 text-side-bar-color">{{ $dataKebersihan }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function updateClock() {
        const clockElement = document.getElementById('clock');
        const now = new Date();

        const timeString = now.toLocaleTimeString();

        clockElement.textContent = `${timeString}`;
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>
