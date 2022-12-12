@props([
    'titlePage',

])

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('spaceship.svg') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Spaceships') }} - {{ __($titlePage) }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div
        id="app"
        class="
            h-100 w-100
            min-vh-100
            d-flex align-items-stretch flex-column overflow-hidden"
        style="background-image: url('{{ asset('assets/background.jpg') }}')"
    >
        <x-header />

        <div class="d-flex flex-grow-1">
            <div class="h-100 w-100 min-wf-300 p-3">
                <h3 class="text-white">{{ __($titlePage) }}</h3>

                {{ $slot }}

                @if($toasts = Session::pull('toasts'))
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">

                        @foreach( $toasts as $toastInfo )
                            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">

                                @if($toastInfo['type'] == 'success')
                                    <div class="toast-header bg-success text-white">
                                        <x-icon name='checkCircle' class="me-2 wf-16" alt="Toast success message"></x-icon>
                                @elseif($toastInfo['type'] == 'error')
                                    <div class="toast-header bg-danger text-white">
                                        <x-icon name='xmarkCircle' class="me-2 wf-16" alt="Toast error message"></x-icon>
                                @elseif($toastInfo['type'] == 'warning')
                                    <div class="toast-header bg-warning text-white">
                                        <x-icon name='xmarkCircle' class="me-2 wf-16" alt="Toast warning message"></x-icon>
                                @else
                                    <div class="toast-header bg-primary text-white">
                                        <x-icon name='checkCircle' class="me-2 wf-16" alt="Toast message"></x-icon>
                                @endif
                                        <strong class="me-auto">{{ __($toastInfo['title']) }}</strong>

                                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>

                                <div class="toast-body">
                                    {{ __($toastInfo['message']) }}
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
