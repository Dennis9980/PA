<section>
    <div id="delete-modal{{ $laundry->id }}" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed flex inset-0 backdrop-blur-sm z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow  ">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-orange-400 w-20 h-20 " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">
                        Apakah anda yakin akan
                        menghapus data ini?</h3>
                    <div class="flex flex-row justify-center">

                        <form action="{{ route('deleteLaundry', $laundry->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Iya, Yakin
                            </button>
                        </form>
                        <button data-modal-hide="delete-modal{{ $laundry->id }}" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Tidak,
                            Batalkan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
