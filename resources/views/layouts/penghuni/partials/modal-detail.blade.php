<div id="detail-modal{{ $penghuni->id }}" tabindex="-1" aria-hidden="true"
    class="hidden backdrop-blur-sm overflow-y-auto overflow-x-hidden fixed flex inset-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full">
    <div class="relative w-max max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white px-2 pb-4 rounded-lg shadow  dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">

                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Detail Penghuni
                </h3>
                @if ($penghuni->penghuni)
                    @if ($penghuni->penghuni->status_pembayaran === 'sudah')
                        <p class="text-green-500 p-2">(Lunas)</p>
                    @else
                        <p class="text-red-500 p-2">(Belum Lunas)</p>
                    @endif
                @else
                    <p class="px-2">(Belum di set)</p>
                @endif
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
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
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-1 sm:py-2">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Nama Penghuni
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $penghuni->name }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-1 sm:py-2">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Kamar
                                    {{-- @if (isset($pengghuni->penghuni->kamarKos)) --}}
                                    @switch($penghuni->penghuni->kamarKos->tipe ?? 'Belum di set')
                                        
                                        @case('tipe_a')
                                            ( Tipe A )
                                        @break

                                        @case('tipe_b')
                                           ( Tipe B )
                                        @break

                                        @case('tipe_aac')
                                            ( Tipe A (AC) )
                                        @break

                                        @case('tipe_bac')
                                            ( Tipe B (AC) )
                                        @break

                                        
                                    @endswitch
                                    {{-- @endif --}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $penghuni->penghuni->kamarKos->nomor_kamar ?? 'Belum di atur' }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-1 sm:py-2">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Username
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $penghuni->username }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-1 sm:py-2">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Email
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $penghuni->email }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-1 sm:py-2">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    No Telepon
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $penghuni->penghuni->phone ?? 'Belum di atur' }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-1 sm:py-2">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Address
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $penghuni->penghuni->address ?? 'Belum di atur' }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-1 sm:py-2">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Durasi Tinggal
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    ( {{ $penghuni->penghuni->tanggal_mulai ?? 'Belum di atur' }} ) - (
                                    {{ $penghuni->penghuni->tanggal_selesai ?? 'Belum di atur' }} )
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
