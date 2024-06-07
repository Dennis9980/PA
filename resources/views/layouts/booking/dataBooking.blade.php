<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="pt-2 relative mx-auto text-gray-600 flex flex-row-reverse">
            <form action="{{ route('dataLaundry') }}" method="GET">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block py-2.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        placeholder="Search for users" name="keyword">
                </div>
            </form>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-side-bar-color dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No Telepon
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Mulai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    total harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    tipe kos
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Uang muka
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Opsi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count())
                                @foreach ($data as $booking)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $booking->nama }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $booking->phone }}
                                        </td>
                                        <td class="px-6 py-6">
                                            {{ $booking->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $booking->tanggal_mulai }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $booking->total_harga }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($booking->status == 'Paid')
                                                Terbayar
                                            @else
                                                Belum bayar
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $booking->tipe_kos }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $booking->Dp }}
                                        </td>
                                        <td class="px-4 py-4 flex justify-center">
                                            <button class="m-1" type="submit"
                                                data-modal-toggle="delete-modal{{ $booking->id }}">
                                                <i class="fa-solid fa-trash fa-lg" style="color: #ff0000;"></i>
                                            </button>
                                        </td>

                                    </tr>
                                    {{-- Modal Delete --}}
                                    @include('layouts.booking.partials.modal-delete-data')
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center py-4 font-bold text-lg">Data Kosong</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="p-4">
                {{ $data->links() }}
            </div>
        </div>
    </div>
    {{-- modal tambah laundry --}}
    {{-- @include('layouts.laundry.partials.modal-add-data') --}}

</x-app-layout>
