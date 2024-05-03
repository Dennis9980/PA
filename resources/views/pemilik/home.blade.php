<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">


                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Kamar</h5>
                @foreach ($data as $kamar)
                    <p class="font-normal text-gray-700 dark:text-gray-400">Sisa kamar: {{ $kamar->jmlh_kamar }}</p>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
