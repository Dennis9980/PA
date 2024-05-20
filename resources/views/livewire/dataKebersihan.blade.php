<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="pt-2 relative mx-auto text-gray-600 flex flex-row-reverse">
            <form action="{{ route('dataKebersihan') }}" method="GET">
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
                        placeholder="Search for users" name="keyword">
                </div>
            </form>
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                data-modal-toggle="crud-modal">
                Tambah Dana
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
                            @foreach ($data as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->user->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->dana_kebersihan }}
                                    </td>
                                    <td class="px-6 py-6">
                                        {{ $item->keterangan }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->tanggal_kebersihan ?? 'Tidak mencantumkan' }}
                                    </td>
                                    <td class="px-4 py-4 flex gap-3">
                                        <button>
                                            <i class="fa-solid fa-pen-to-square fa-lg" style="color: #ffa200;"
                                                data-modal-toggle="edit-modal{{ $item->id }}"></i>
                                        </button>
                                        <form action="{{ route('deleteDana', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="m-1" type="submit">
                                                <i class="fa-solid fa-trash fa-lg" style="color: #ff0000;"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                {{-- Modal Edit --}}
                                @include('layouts.kebersihan.partials.modal-edit')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    {{-- modal tambah --}}
    @include('layouts.kebersihan.partials.modal-add')
</div>

