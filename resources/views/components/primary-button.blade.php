<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-side-bar-color border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-menu-hover hover:text-side-bar-color transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
