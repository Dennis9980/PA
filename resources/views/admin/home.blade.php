<x-app-layout>
    <div class="py-8    ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
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
        </div>
    </div>
</x-app-layout>
