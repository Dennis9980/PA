<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="pt-2 relative mx-auto text-gray-600 flex flex-row-reverse">
            <form action="{{ route('dataPenghuni') }}" method="GET">
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
                        class="block py-2.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for users" name="search" value="{{ request('search') }}">
                </div>
            </form>
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                data-modal-toggle="crud-modal">
                Tambah Penghuni
            </button>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            @foreach ($data as $penghuni)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $penghuni->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $penghuni->username }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $penghuni->phone ?? 'Tidak mencantumkan' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $penghuni->email }}
                                    </td>
                                    <td class="py-4 flex gap-1">
                                        <button class="m-1" data-modal-target="static-modal{{ $penghuni->id }}"
                                            data-modal-toggle="static-modal{{ $penghuni->id }}">
                                            <i class="fa-solid fa-circle-info fa-xl" style="color: #00c220;"></i>
                                        </button>
                                        <button>
                                            <i class="fa-solid fa-pen-to-square fa-lg" style="color: #ffa200;"></i>
                                        </button>
                                        <form action="{{ route('deletePenghuni', $penghuni->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="m-1" type="submit">
                                                <i class="fa-solid fa-trash fa-lg" style="color: #ff0000;"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @include('layouts.penghuni.partials.modal-edit')
                            @endforeach
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
