<x-app-layout titlePage="Editar Nave">
    <x-box sizing="col min-wf-300 mb-3 mx-3">

        <x-slot:header>
            <span>{{ __('Nave ' . $spaceship['id']) }}</span>
        </x-slot:header>

        <x-slot:body class="py-4 px-5 text-md-end">
            <form action="{{ route('spaceships.update', [$spaceship['id']]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="spaceship_id" class="col-md-3 col-form-label fw-bold">{{ __('Id') }}</label>
                    <div class="col-md-6">
                        <input
                            id="spaceship_id"
                            class="form-control-plaintext"
                            value="{{ $spaceship['id'] }}"
                            readonly
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name_spaceship" class="col-md-3 col-form-label fw-bold">{{ __('Nome') }}</label>
                    <div class="col-md-6">
                        <input
                            id="name_spaceship"
                            name="name"
                            class="form-control"
                            type="text"
                            required
                            minlength="5"
                            maxlength="64"
                            @if(!empty(old('name')))
                                value="{{ old('name') }}"
                            @elseif(!empty($spaceship['name']))
                                value="{{ $spaceship['name'] }}"
                            @endif
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="fuel_spaceship" class="col-md-3 col-form-label fw-bold">{{ __('Combustível') }}</label>
                    <div class="col-md-6">
                        <input
                            id="fuel_spaceship"
                            name="fuel"
                            class="form-control"
                            type="text"
                            required
                            minlength="5"
                            maxlength="64"
                            @if(!empty(old('fuel')))
                                value="{{ old('fuel') }}"
                            @elseif(!empty($spaceship['fuel']))
                                value="{{ $spaceship['fuel'] }}"
                            @endif
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="motor_power_spaceship" class="col-md-3 col-form-label fw-bold">{{ __('Potência do Motor') }}</label>
                    <div class="col-md-6">
                        <input
                            id="motor_power_spaceship"
                            name="motor_power"
                            class="form-control"
                            type="text"
                            required
                            minlength="5"
                            maxlength="64"
                            @if(!empty(old('motor_power')))
                                value="{{ old('motor_power') }}"
                            @elseif(!empty($spaceship['motor_power']))
                                value="{{ $spaceship['motor_power'] }}"
                            @endif
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="quantity_weapon_spaceship" class="col-md-3 col-form-label fw-bold">{{ __('Quantidade de Armas') }}</label>
                    <div class="col-md-6">
                        <input
                            id="quantity_weapon_spaceship"
                            name="quantity_weapon"
                            class="form-control"
                            type="number"
                            required
                            minlength="0"
                            maxlength="100"
                            @if(!empty(old('quantity_weapon')))
                                value="{{ old('quantity_weapon') }}"
                            @elseif(!empty($spaceship['quantity_weapon']))
                                value="{{ $spaceship['quantity_weapon'] }}"
                            @endif
                        >
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="arquivo_spaceship" class="col-form-label fw-bold">{{ __('Imagem da Nave') }}</label>
                        <x-tooltip message="{!! __('
                            Requisitos da imagem: <br>
                            Extensão: .png <br>
                            Tamanho: 512 kB (max)') !!}
                        "></x-tooltip>
                    </div>

                    <div class="col-md-6 text-start d-flex flex-column">
                        <input
                            id="arquivo_spaceship"
                            class="form-control mb-3"
                            name="arquivo"
                            type="file"
                            accept="image/png"
                        />

                        <span class="fw-bold fs-6">{{ __('Imagem atual da nave') }}</span>

                        <img
                            class="w-75 max-wf-260 border border-2"
                            src="{{ asset('storage/images/' . $spaceship['arquivo']) }}"
                            alt="{{ __('Imagem da Nave') }}: {{ $spaceship['name'] }}"
                            title="{{ __('Imagem da Nave') }}: {{ $spaceship['name'] }}"
                            onerror="
                                this.onerror=null;
                                this.title='{{ __('Não existe ou não foi possível carregar a imagem') }}'
                                this.src='{{ asset('assets/icons/ban.svg') }}';
                            "
                        >
                    </div>
                </div>

                <div class="row mb-3 mt-4">
                    <div class="offset-md-3 text-start">
                        <input class="btn btn-primary px-4 fw-bold" type="submit" value="{{ __('Editar Nave') }}">
                    </div>
                </div>
            </form>
        </x-slot:body>

    </x-box>
</x-app-layout>
