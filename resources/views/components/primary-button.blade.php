<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-success']) }}>
    {{ $slot }}
</button>
