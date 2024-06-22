<section>

    <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed flex inset-0 z-50 bg-opacity-50 bg-black justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow  ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Tambah Data Laundry
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  "
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
                    <form action="{{ route('tambahLaundry') }}" method="POST" class="p-4 md:p-5">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="default"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Nama
                                    Penghuni</label>
                                <select id="default" name="penghuni"
                                    class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5">
                                    <option class="m-1" selected>Pilih Penghuni</option>
                                    @foreach ($penghuni as $data)
                                        <option class="m-1 capitalize" value="{{ $data->name }}">
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Berat</label>
                                <input type="number" name="berat" id="price"
                                    class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                    placeholder="Total Berat" required="" value="10">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Harga</label>
                                <input type="number" name="harga" id="price"
                                    class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                    placeholder="Total harga" required="" value="200000">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal
                                    Masuk</label>
                                <input type="date" name="tanggal_mulai" id="price"
                                    class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                    placeholder="$2999" required="" value="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal
                                    Selesai</label>
                                <input type="date" name="tanggal_selesai" id="price"
                                    class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                    placeholder="$2999" required="" value="">
                            </div>
                        </div>
                        <button type="submit"
                            class="btn text-white bg-side-bar-color hover:bg-menu-hover font-normal hover:font-semibold hover:text-side-bar-color w-full">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
</section>