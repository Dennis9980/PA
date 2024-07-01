<section>
    <div id="edit-modal{{ $laundry->id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed flex inset-0 z-50 backdrop-blur-sm justify-center items-center w-full md:inset-0 h-full max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow px-4 pb-4  ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Edit Data Laundry
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  "
                        data-modal-hide="edit-modal{{ $laundry->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('updateLaundry', $laundry->id) }}" method="POST" class="p-2">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-1 sm:col-span-2">
                            <label for="namaPenghuni"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                            <input type="text" name="penghuni" id="namaPenghuni"
                                class="bg-gray-50  text-sm cursor-not-allowed rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                placeholder="Nama Penghuni" required="" value="{{ $laundry->user->name }}" readonly>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="berat"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Berat</label>
                            <input type="number" name="berat" id="berat"
                                class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                placeholder="Berat" required="" value="{{ $laundry->berat }}">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Total Harga</label>
                            <input type="text" name="harga" id="price"
                                class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                placeholder="Total Harga" required="" value="{{ number_format($laundry->total_harga, 0, ',', '.') }}" oninput="formatCurrency(this)">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="tanggalMasuk"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal
                                Masuk</label>
                            <input type="date" name="tanggal_mulai" id="tanggalMasuk"
                                class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                 required="" value="{{ $laundry->tanggal_masuk }}">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="tanggalSelesai"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal
                                Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggalSelesai"
                                class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                                 required="" value="{{ $laundry->tanggal_selesai }}">
                        </div>
                    </div>
                    <button type="submit"
                        class="mt-3 text-white inline-flex w-full justify-center bg-button-submit hover:bg-menu-hover focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm py-2.5 text-center dark:bg-gray-600 dark:hover:bg-button-submit dark:focus:ring-menu-hover">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function formatCurrency(input) {
        const value = input.value.replace(/[^0-9,-]/g, ''); // Remove non-numeric characters
        const formattedValue = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0, // Set minimum decimal places
            maximumFractionDigits: 2 // Set maximum decimal places
        }).format(value); // Format the value to Indonesian currency

        input.value = formattedValue;
    }
</script>