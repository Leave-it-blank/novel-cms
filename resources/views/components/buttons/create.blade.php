
<button {{ $attributes->merge(['type' => 'submit', 'class' => ' py-2   rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:border-gray-none focus:ring-0  transition ease-in-out ']) }}>
    {{ $slot }}
</button>
