<div id="edit-modal{{ $kebersihan->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed flex inset-0 z-50 backdrop-blur-sm justify-center items-center w-full md:inset-0 h-full max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Edit Data Kebersihan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  "
                    data-modal-hide="edit-modal{{ $kebersihan->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('updateDana', $kebersihan->id) }}" method="POST" class="">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-2 p-4">
                    <div class="col-span-1 sm:col-span-2">
                        <label for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                        <input type="text" name="penghuni" id="nama"
                            class="bg-gray-50  text-sm rounded-lg cursor-not-allowed focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Nama Penghuni" required="" value="{{ $kebersihan->user->name }}" readonly>
                    </div>
                    <div class="col-span-2 ">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Total
                            Dana</label>
                        <input type="number" name="dana" id="price"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Total Dana" required="" value="{{ number_format($kebersihan->dana_kebersihan, 0, ',', '.') }}">
                    </div>
                    <div class="col-span-1">
                        <label for="tanggal"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal
                            Kebersihan</label>
                        <input type="date" name="tanggal_kebersihan" id="tanggal"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="$2999" required="" value="{{ $kebersihan->tanggal_kebersihan }}">
                    </div>
                    <div class="col-span-1">
                        <label for="default"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Status Kebersihan</label>
                        <select id="default" name="status_kebersihan"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color capitalize focus:border-side-bar-color block w-full p-2.5">
                            <option class="m-1 capitalize" selected>{{ $kebersihan->status_kebersihan }}</option>
                            @if ($kebersihan->status_kebersihan == 'sudah')
                                <option class="m-1 capitalize" value="belum">
                                    Belum
                                </option>
                            @else
                                <option class="m-1 capitalize" value="sudah">
                                    Sudah
                                </option>
                            @endif
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-2">
                        <label for="keterangan"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="10" rows="2"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5">{{ $kebersihan->keterangan }}</textarea>
                    </div>
                    <div class="col-span-2">
                        <button type="submit"
                            class="btn text-white bg-side-bar-color hover:bg-menu-hover hover:text-side-bar-color w-full">
                            Edit Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
