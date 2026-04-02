<button {{ $attributes->merge(['type' => 'submit', 'class' => 'p-4 text-center items-center px-4 py-2 bg-purple-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-600 focus:bg-gray-700 active:bg-gray-900 focus:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
