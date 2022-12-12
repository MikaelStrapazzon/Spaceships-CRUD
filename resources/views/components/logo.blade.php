<img
    {{ $attributes }}
    src="{{ asset('spaceship.svg') }}"
    alt="Logo"
    onerror="
        this.onerror=null;
        this.title='{{ __('Não foi possível carregar a imagem') }}'
        this.src='{{ asset('assets/icons/ban.svg') }}';
    "
/>
