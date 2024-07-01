<div class="navbar bg-side-bar-color lg:px-24 xl:px-24">
    <div class="navbar-start">
        <a href="{{ route('homePage') }}">
            <x-logo-with-name />
        </a>
    </div>
    <div class="navbar-end">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul
                class="menu menu-sm uppercase dropdown-content mt-4 z-10 right-0 p-2 shadow bg-base-100 rounded-box w-52">
                <a href="#tentang-kami"
                    class="flex items-center p-2 rounded-md hover:bg-menu-hover hover:text-side-bar-color group">
                    <li>tentang kami</li>
                </a>
                <a href="{{ route('bookingGuest') }}" id="linkToTentangKami"
                    class="flex items-center p-2 rounded-md hover:bg-menu-hover hover:text-side-bar-color group">
                    <li>pemesanan</li>
                </a>
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('dashboard') }}"
                                class="flex items-center p-2 rounded-md hover:bg-menu-hover hover:text-side-bar-color group">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('penghuniDash') }}"
                                class="flex items-center p-2 rounded-md hover:bg-menu-hover hover:text-side-bar-color group">
                                Dashboard
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="flex items-center p-2 rounded-md hover:bg-menu-hover hover:text-side-bar-color group">
                            <li>login</li>
                        </a>
                    @endauth
                @endif
            </ul>
        </div>
        {{-- <a class="btn btn-ghost text-xl">daisyUI</a> --}}
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 font-bold uppercase">
            <a href="#tentang-kami" id="linkToTentangKami"
                class="flex items-center mr-4 p-2 rounded-md hover:bg-menu-hover hover:text-side-bar-color group">
                <li>tentang kami</li>
            </a>
            <a href="{{ route('bookingGuest') }}"
                class="flex items-center p-2 rounded-md hover:bg-menu-hover hover:text-side-bar-color group">
                <li>pemesanan</li>
            </a>
            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center ml-4 p-2 rounded-md hover:bg-menu-hover hover:text-side-bar-color group">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('penghuniDash') }}"
                            class="flex items-center ml-4 p-2 rounded-md hover:bg-menu-hover hover:text-side-bar-color group">
                            Dashboard
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="flex items-center ml-4 p-2 rounded-md hover:bg-menu-hover hover:text-side-bar-color group">
                        <li>login</li>
                    </a>
                @endauth
            @endif
        </ul>
    </div>
</div>
