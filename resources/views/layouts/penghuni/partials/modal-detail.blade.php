<div id="detail-modal{{ $penghuni->id }}" tabindex="-1" aria-hidden="true"
    class="hidden backdrop-blur-sm overflow-y-auto overflow-x-hidden fixed flex inset-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full">
    <div class="relative w-max max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white px-2 pb-4 rounded-lg shadow   ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">

                <h3 class="text-xl font-semibold text-gray-900 ">
                    Detail Penghuni
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  "
                    data-modal-hide="detail-modal{{ $penghuni->id }}" id="closeButtonDetail">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flow-root px-2">
                <dl role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Nama Penghuni</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ $penghuni->name }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Terbayar</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ number_format($penghuni->penghuni->terbayar, 0, ',', '.') ?? 'Belum di tambahkan' }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Kamar</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            @switch($penghuni->penghuni->kamarKos->tipe ?? 'Belum di set')
                                @case('tipe_a')
                                    (Tipe A)
                                @break

                                @case('tipe_b')
                                    (Tipe B)
                                @break

                                @case('tipe_aac')
                                    (Tipe A (AC))
                                @break

                                @case('tipe_bac')
                                    (Tipe B (AC))
                                @break
                            @endswitch
                            {{ $penghuni->penghuni->kamarKos->nomor_kamar ?? 'Belum di atur' }}
                        </dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Username</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ $penghuni->username }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ $penghuni->email }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">No Telepon</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ $penghuni->penghuni->phone ?? 'Belum di atur' }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4 flex items-center">
                        <dt class="text-sm font-medium text-gray-500">Dana Kebersihan</dt>
                        
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2  flex flex-row items-center justify-between">
                            {{ number_format($penghuni->penghuni->dana_kebersihan, 0, ',', '.') ?? 'Belum di atur' }}
                            <form action="{{ route('resetDanaKebersihan', $penghuni->id) }}" method="POST">
                                @csrf
                                <button class="text-white bg-side-bar-color hover:bg-menu-hover hover:text-side-bar-color font-medium rounded-lg text-sm px-5 py-2.5 me-2 ">Reset Dana</button>
                            </form>
                        </dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Saldo Laundry</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ number_format($penghuni->penghuni->saldo_laundry, 0, ',', '.') ?? 'Belum di atur' }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            {{ $penghuni->penghuni->address ?? 'Belum di atur' }}</dd>
                    </div>
                    <div class="py-2 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Durasi Tinggal</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                            ({{ $penghuni->penghuni->tanggal_mulai ?? 'Belum di atur' }}) -
                            ({{ $penghuni->penghuni->tanggal_selesai ?? 'Belum di atur' }})
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
