<div id="static-modal{{ $penghuni->id }}" tabindex="-1" aria-hidden="true"
    class="hidden backdrop-blur-sm overflow-y-auto overflow-x-hidden fixed flex inset-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow  ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">
                <h3 class="text-xl font-semibold">
                    Detail Penghuni
                </h3>
                @if ($penghuni->penghuni)
                    @switch($penghuni->penghuni->kamarKos->tipe)
                        @case('tipe_a')
                            @if ($penghuni->penghuni->terbayar >= 14000000)
                                <p class="text-green-500 p-2">(Lunas)</p>
                            @else
                                <p class="text-red-500 p-2">(Belum Lunas)</p>
                            @endif
                        @break

                        @case('tipe_b')
                            @if ($penghuni->penghuni->terbayar >= 12000000)
                                <p class="text-green-500 p-2">(Lunas)</p>
                            @else
                                <p class="text-red-500 p-2">(Belum Lunas)</p>
                            @endif
                        @break

                        @case('tipe_aac')
                            @if ($penghuni->penghuni->terbayar >= 15000000)
                                <p class="text-green-500 p-2">(Lunas)</p>
                            @else
                                <p class="text-red-500 p-2">(Belum Lunas)</p>
                            @endif
                        @break

                        @case('tipe_bac')
                            @if ($penghuni->penghuni->terbayar >= 14000000)
                                <p class="text-green-500 p-2">(Lunas)</p>
                            @else
                                <p class="text-red-500 p-2">(Belum Lunas)</p>
                            @endif
                        @break

                        @default
                            <p class="px-2">(Belum di set)</p>
                    @endswitch
                @else
                    <p class="px-2">(Belum di set)</p>
                @endif

                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  "
                    data-modal-hide="static-modal{{ $penghuni->id }}" id="closeButtonDetail">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('editPenghuni', $penghuni->id) }}" method="POST">
                @csrf
                <div class="grid gap-4 grid-cols-2 px-6 pt-6">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium">Nama</label>
                        <input type="text" id="name"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Tulis Nama Lengkap" name="name" value="{{ $penghuni->name }}">
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="kos" class="block mb-2 text-sm font-medium">Pilih
                            Kamar</label>
                        <select id="kos" name="id_kamar_kos"
                            class="bg-gray-50 text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5">

                            <option value="{{ $penghuni->penghuni->kamarKos->id ?? 'Belum di set' }}" selected>
                                {{-- @if (isset($pengghuni->penghuni->kamarKos)) --}}
                                Kamar {{ $penghuni->penghuni->kamarKos->nomor_kamar ?? 'Pilih' }}
                                @switch($penghuni->penghuni->kamarKos->tipe ?? 'belum di set')
                                    @case('tipe_a')
                                        Tipe A
                                    @break

                                    @case('tipe_b')
                                        Tipe B
                                    @break

                                    @case('tipe_aac')
                                        Tipe A (AC)
                                    @break

                                    @case('tipe_bac')
                                        Tipe B (AC)
                                    @break
                                @endswitch
                                {{-- @else
                                    Pilih Kamar --}}
                                {{-- @endif --}}
                            </option>
                            @foreach ($dataKos as $data)
                                <option class="m-4 capitalize text-md" value="{{ $data->id }}">
                                    Kamar {{ $data->nomor_kamar }}
                                    @switch($data->tipe)
                                        @case('tipe_a')
                                            Tipe A
                                        @break

                                        @case('tipe_b')
                                            Tipe B
                                        @break

                                        @case('tipe_aac')
                                            Tipe A (AC)
                                        @break

                                        @case('tipe_bac')
                                            Tipe B (AC)
                                        @break
                                    @endswitch
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium">Username</label>
                        <input type="text" id="name"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Tulis Kamar Berapa" name="username" value="{{ $penghuni->username }}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium">No
                            Telepon
                        </label>
                        <input type="text" id="name"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Tulis No Telepon" name="phone"
                            value="{{ $penghuni->penghuni->phone ?? 'belum di atur' }}">
                    </div>
                    <div class="col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium">Email</label>
                        <input type="text" id="name"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Tulis Email" name="email" value="{{ $penghuni->email }}">
                    </div>
                    <div class="col-span-1">
                        <label for="terbayar" class="block mb-2 text-sm font-medium">Terbayar</label>
                        <input type="number" id="terbayar"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Uang Kos Terbayar" name="terbayar" value="{{ $penghuni->penghuni->terbayar ?? 'Belum di set' }}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium">Tanggal
                            Mulai</label>
                        <input type="date" id="name"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Tulis Email"
                            value="{{ $penghuni->penghuni->tanggal_mulai ?? 'Belum di atur' }}" name="tanggal_mulai">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium">Tanggal
                            Selesai</label>
                        <input type="date" id="name" name="tanggal_selesai"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Tulis Email"
                            value="{{ $penghuni->penghuni->tanggal_selesai ?? 'Belum di atur' }}">
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium">Address</label>
                        <textarea name="address" id="name" cols="10" rows="3"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5">{{ $penghuni->penghuni->address ?? 'belum di atur' }}</textarea>
                    </div>
                </div>
                <div class="flex w-full  justify-center items-center p-5">
                    <button type="submit"
                        class="btn text-white bg-side-bar-color hover:bg-menu-hover hover:text-side-bar-color w-full">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
