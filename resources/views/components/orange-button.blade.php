<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 pt-2 pb-1.5 bg-neon-orange dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-light-orange dark:hover:bg-white']) }}>
    {{ $slot }}
</button>
