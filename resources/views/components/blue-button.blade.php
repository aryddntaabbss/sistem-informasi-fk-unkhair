<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-3 py-2 border rounded-md font-semibold text-xs text-white uppercase tracking-widest
    transition ease-in-out duration-150'])
    }}>
    {{ $slot }}
</button>