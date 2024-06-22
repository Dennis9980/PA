<x-app-layout>
    @if ($errors->any())
        <div class="toast">
            @foreach ($errors->all() as $error)
                <div class="flex flex-row justify-start bg-white w-max rounded-md">
                    <div class="bg-red-500 rounded-s-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#FFFFFF">
                            <path
                                d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                        </svg>
                    </div>
                    <div class="flex justify-start items-center px-4">
                        {{ $error }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="pt-2 relative mx-auto text-gray-600 flex flex-row-reverse">
            <form action="{{ route('dataPenghuni') }}" method="GET">
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
                        placeholder="Search for users" name="search" value="{{ request('search') }}">
                </div>
            </form>
            <button type="button"
                class="text-white bg-side-bar-color hover:bg-menu-hover hover:text-side-bar-color font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                data-modal-toggle="crud-modal">
                Tambah Penghuni
            </button>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-white uppercase bg-side-bar-color">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kamar/Username
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    no telepon
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    opsi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count())

                                @foreach ($data as $penghuni)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $penghuni->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $penghuni->username }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $penghuni->penghuni->phone ?? 'Tidak mencantumkan' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $penghuni->email }}
                                        </td>
                                        <td class="py-4 flex gap-1">
                                            <button class="m-1" data-modal-target="detail-modal{{ $penghuni->id }}"
                                                data-modal-toggle="detail-modal{{ $penghuni->id }}">
                                                <i class="fa-solid fa-circle-info fa-xl" style="color: #00c220;"></i>
                                            </button>
                                            <button class="m-1" data-modal-target="static-modal{{ $penghuni->id }}"
                                                data-modal-toggle="static-modal{{ $penghuni->id }}">
                                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #ffa200;"></i>
                                            </button>

                                            <button class="m-1" data-modal-target="delete-modal{{ $penghuni->id }}"
                                                data-modal-toggle="delete-modal{{ $penghuni->id }}">
                                                <i class="fa-solid fa-trash fa-lg" style="color: #ff0000;"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('layouts.penghuni.partials.modal-detail')
                                    @include('layouts.penghuni.partials.modal-edit')
                                    @include('layouts.penghuni.partials.modal-delete')
                                @endforeach
                            @else
                                <td colspan="6" class="text-center py-4 font-bold text-lg">Belum Ada Penghuni</td>
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

    {{-- Modal tambah --}}
    @include('layouts.penghuni.partials.modal-add')

</x-app-layout>
