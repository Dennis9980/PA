<script src="https://kit.fontawesome.com/d2f94ceef2.js" crossorigin="anonymous"></script>

<nav class="fixed top-0 z-30 w-full bg-side-bar-color border-b border-gray-200 dark:border-gray-700">
    <div class="px-3 py-4 lg:px-5 lg:pl-3">
        <div class="flex flex-row justify-between">
            <div class="lg:pl-72 py-1">
                @if (request()->routeIs('dataPenghuni'))
                    <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight ">
                        {{ __('Data Penghuni') }}
                    </h2>
                @elseif (request()->routeIs('dataKebersihan'))
                    <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
                        {{ __('Data Kebersihan') }}
                    </h2>
                @elseif (request()->routeIs('dataLaundry'))
                    <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
                        {{ __('Data Laundry') }}
                    </h2>
                @elseif (request()->routeIs('dataKeuangan'))
                    <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
                        {{ __('Data Keuangan') }}
                    </h2>
                @elseif (request()->routeIs('dataBooking'))
                    <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
                        {{ __('Kelola Booking') }}
                    </h2>
                @elseif (request()->routeIs('profile.edit'))
                    <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
                        {{ __('Profile') }}
                    </h2>
                @else
                    <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                @endif
            </div>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm text-white leading-4 font-medium rounded-md dark:text-white hover:text-menu-hover dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>

<aside id="sidebar"
    class="fixed top-0 left-0 w-64 z-40 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-side-bar-color text-white min-h-screen pt-3 pr-2 close">
    <div class="flex flex-col justify-between h-full">
        <div>
            <div class="shrink-0 flex justify-center items-center py-10 rounded-full ">
                @if (Auth::user()->role == 'pemilik' || Auth::user()->role == 'pengurus')
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current" />
                    </a>
                @else
                    <a href="{{ route('penghuniDash') }}">
                        <x-application-logo class="block h-9 w-auto fill-current" />
                    </a>
                @endif
            </div>
            <ul class="space-y-1 font-medium px-2">
                @if (Auth::user()->role == 'pemilik' || Auth::user()->role == 'pengurus')
                    <li>
                        <a href="{{ route('dataPenghuni') }}"
                            class="flex items-center p-2 rounded-md dark:text-white hover:bg-menu-hover hover:text-side-bar-color   hover:font-bold dark:hover:bg-menu-hover group {{ request()->routeIs('dataPenghuni') ? 'bg-menu-hover text-side-bar-color  dark:text-side-bar-color font-bold' : '' }}">
                            <span class="ms-3">Data Penghuni</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dataLaundry') }}"
                            class="flex items-center p-2 rounded-md dark:text-white hover:bg-menu-hover hover:text-side-bar-color   hover:font-bold dark:hover:bg-menu-hover group {{ request()->routeIs('dataLaundry') ? 'bg-menu-hover text-side-bar-color  font-bold dark:text-side-bar-color  ' : '' }}">
                            <span class="ms-3">Laundry</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dataKebersihan') }}"
                            class="flex items-center p-2 rounded-md dark:text-white hover:bg-menu-hover hover:text-side-bar-color   hover:font-bold dark:hover:bg-menu-hover group {{ request()->routeIs('dataKebersihan') ? 'bg-menu-hover text-side-bar-color font-bold dark:text-side-bar-color   ' : '' }}">
                            <span class="ms-3">Kebersihan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dataBooking') }}"
                            class="flex items-center p-2 rounded-md dark:text-white hover:bg-menu-hover hover:text-side-bar-color   hover:font-bold dark:hover:bg-menu-hover group {{ request()->routeIs('dataBooking') ? 'bg-menu-hover text-side-bar-color  font-bold dark:text-side-bar-color  ' : '' }}">
                            <span class="ms-3">Kelola Booking</span>
                        </a>
                    </li>
                @endif
                
            </ul>
        </div>
        <div class="p-2 flex justify-center">
            <a href="{{ route('logout') }}"
                class="flex items-center p-2 rounded-md dark:text-white hover:bg-menu-hover hover:text-side-bar-color hover:font-bold dark:hover:bg-menu-hover group"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket me-2"></i>
                <span class="ms-3">Logout</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</aside>
<button id="toggleSidebarButton"
    class="md:hidden absolute top-4 right-4 z-50 text-white p-2 rounded-md focus:outline-none">
    <i class="fa-solid fa-bars fa-xl"></i>
</button>


<script>
    const sidebar = document.getElementById("sidebar");
    const toggleSidebarButton = document.getElementById("toggleSidebarButton");

    toggleSidebarButton.addEventListener("click", () => {
        sidebar.classList.toggle("left-0"); // Mengaktifkan/menonaktifkan transisi sidebar
    });
</script>
