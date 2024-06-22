<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed flex inset-0 z-50 justify-center backdrop-blur-sm items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow  ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Tambah Data Penghuni
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
            <form class="p-4 md:p-5" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Tulis Nama Lengkap" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                        <input type="text" name="username" id="username"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Tulis Username" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                        <input type="text" name="email" id="email"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Tulis Email" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50  text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Password" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="passwordConf"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Password
                            Confirmation</label>
                        <input type="paddword" name="password_confirmation" id="passwordConf"
                            class="bg-gray-50 text-sm rounded-lg focus:ring-side-bar-color focus:border-side-bar-color block w-full p-2.5"
                            placeholder="Password Confirm" required="">
                    </div>
                    <input type="text" class="hidden" value="penghuni" name="role">
                    <div class="col-span-2">
                        <button type="submit"
                            class="btn text-white bg-side-bar-color hover:bg-menu-hover font-base hover:text-side-bar-color w-full">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
