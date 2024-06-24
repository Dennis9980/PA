<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="pt-2 relative mx-auto text-gray-600 flex flex-row-reverse">
            <form action="{{ route('dataKebersihan') }}" method="GET">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block py-2.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-side-bar-color focus:border-side-bar-color "
                        placeholder="Search for users" name="keyword">
                </div>
            </form>
            <button type="button"
                class="text-white bg-side-bar-color hover:bg-menu-hover hover:text-side-bar-color font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                data-modal-toggle="crud-modal">
                Tambah Jadwal
            </button>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-white uppercase bg-side-bar-color ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    dana kebersihan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    keterangan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    tanggal kebersihan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Opsi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count())
                                @foreach ($data as $kebersihan)
                                    <tr class="bg-white border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $kebersihan->user->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $kebersihan->dana_kebersihan }}
                                        </td>
                                        <td class="px-6 py-6">
                                            {{ $kebersihan->keterangan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $kebersihan->tanggal_kebersihan ?? 'Tidak mencantumkan' }}
                                        </td>
                                        <td class="px-4 py-4 flex gap-3">
                                            <button>
                                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #ffa200;"
                                                    data-modal-toggle="edit-modal{{ $kebersihan->id }}"></i>
                                            </button>
                                            <button class="m-1" type="submit"
                                                data-modal-toggle="delete-modal{{ $kebersihan->id }}">
                                                <i class="fa-solid fa-trash fa-lg" style="color: #ff0000;"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    {{-- Modal Edit --}}
                                    @include('layouts.kebersihan.partials.modal-edit')
                                    {{-- Modal Delete --}}
                                    @include('layouts.kebersihan.partials.modal-delete')
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
        </div>
    </div>


    {{-- modal tambah --}}
    @include('layouts.kebersihan.partials.modal-add')
</x-app-layout>
