<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed flex inset-0 z-50 backdrop-blur-sm justify-center items-center w-full md:inset-0 h-full max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Tambah Dana Kebersihan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('tambahDana') }}" method="POST" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="default"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Penghuni</label>
                        <select id="default" name="penghuni"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5">
                            <option class="m-1" selected>Pilih Penghuni</option>
                            @foreach ($penghuni as $data)
                                <option class="m-1 capitalize" value="{{ $data->name }}">{{ $data->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Total Dana</label>
                        <input type="number" name="dana"  id="price"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Total Dana" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal
                            Kebersihan</label>
                        <input type="date" name="tanggal_kebersihan"  id="price"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="$2999" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-2">
                        <label for="keterangan"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="10" rows="2" 
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"></textarea>
                    </div>
                </div>
                <button type="submit"
                    class="btn text-white bg-side-bar-color hover:bg-menu-hover hover:text-side-bar-color w-full">
                    Tambah Dana
                </button>
            </form>
        </div>
    </div>
</div>
