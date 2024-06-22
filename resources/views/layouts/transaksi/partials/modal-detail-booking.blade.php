<div id="detail-modal-booking{{ $data->id }}" tabindex="-1" aria-hidden="true"
    class="hidden backdrop-blur-sm overflow-y-auto overflow-x-hidden fixed flex inset-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full">
    <div class="relative w-max max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white px-2 pb-4 rounded-lg shadow   ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">

                <h3 class="text-xl font-semibold text-gray-900 ">
                    Detail Data Booking
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  "
                    data-modal-hide="detail-modal-booking{{ $data->id }}" id="closeButtonDetail">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flow-root px-4">
                <dl role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Nama</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ $data->nama_pembayar }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">{{ $data->email }}
                        </dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">No. Telepon</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ $data->no_telpon }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Tipe Kos</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ $data->tipe_kos }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Tanggal Masuk</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ $data->tgl_masuk }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Uang Muka</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">Rp. {{ number_format($data->total_harga, 0, ',', '.') }}
                        </dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Total Harga</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            Rp. {{ number_format($data->total_harga, 0, ',', '.') }}
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Tanggal Bayar</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ $data->tanggal_pembayaran }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Status Pembayaran</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2  capitalize">
                            {{ $data->status }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
