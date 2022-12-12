<x-guest-layout>
    <x-card-center-interface>
        <x-slot name="logo">
            <a class="d-flex justify-content-center text-black" href="/">
                <x-logo class="wf-90" />
            </a>
        </x-slot>
        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <span class="d-block invalid-feedback fw-bold" role="alert">
                        {{$error}}
                    </span>
                @endforeach
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label
                        for="email"
                        class="fs-5"
                    >
                        {{ __('Email') }}
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required autofocus />
                </div>

                <div class="mb-2">
                    <label
                        for="password"
                        class="fs-5"
                    >
                        {{ __('Senha') }}
                    </label>

                    <div class="input-group">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            autocomplete="current-password"
                            required
                            />

                        <a href="#" onclick="handlePasswordVisibility()" class="input-group-text">
                            <x-icon-eye id="iconEye" class="wf-16 hf-16 d-none"/>
                            <x-icon-eyeSlash id="iconEyeSlash" class="wf-16 hf-16"/>
                        </a>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input
                        id="remember"
                        type="checkbox"
                        name="remember"
                        class="form-check-input"
                        {{ old('remember') ? 'checked' : '' }} />

                    <label
                        for="remember"
                        class="form-check-label"
                    >
                        {{ __('Manter conectado') }}
                    </label>
                </div>


                <div class="d-flex justify-content-end">
                    <a
                        class="btn btn-link"
                        href="{{ route('register') }}"
                    >
                        {{ __('Criar Conta') }}
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary fw-bold px-3 shadow"
                    >
                        {{ __('Login') }}
                    </button>
                </div>

            </form>
        </div>
    </x-card-center-interface>
</x-guest-layout>

<script src="{{ asset('assets/js/auth/login.js') }}"></script>
