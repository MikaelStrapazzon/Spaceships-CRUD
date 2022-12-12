<x-app-layout titlePage="Criar Nave">
    <x-box sizing="col min-wf-300 mb-3 mx-3">

        <x-slot:header>
            <span>{{ __('Nova Nave') }}</span>
        </x-slot:header>

        <x-slot:body class="py-4 px-5 text-md-end">
            <form action="{{ route('spaceships.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="name_new_spaceship" class="col-md-3 col-form-label fw-bold">{{ __('Nome') }}</label>
                    <div class="col-md-6">
                        <input
                            id="name_new_spaceship"
                            name="name"
                            class="form-control"
                            type="text"
                            required
                            minlength="5"
                            maxlength="64"
                            value="{{ old('name') }}"
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="fuel_new_spaceship" class="col-md-3 col-form-label fw-bold">{{ __('Combustível') }}</label>
                    <div class="col-md-6">
                        <input
                            id="fuel_new_spaceship"
                            name="fuel"
                            class="form-control"
                            type="text"
                            required
                            minlength="5"
                            maxlength="64"
                            value="{{ old('fuel') }}"
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="motor_power_new_spaceship" class="col-md-3 col-form-label fw-bold">{{ __('Potência do Motor') }}</label>
                    <div class="col-md-6">
                        <input
                            id="motor_power_new_spaceship"
                            name="motor_power"
                            class="form-control"
                            type="text"
                            required
                            minlength="5"
                            maxlength="64"
                            value="{{ old('motor_power') }}"
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="quantity_weapon_new_spaceship" class="col-md-3 col-form-label fw-bold">{{ __('Quantidade de Armas') }}</label>
                    <div class="col-md-6">
                        <input
                            id="quantity_weapon_new_spaceship"
                            name="quantity_weapon"
                            class="form-control"
                            type="number"
                            required
                            minlength="0"
                            maxlength="100"
                            value="{{ old('quantity_weapon') }}"
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="arquivo_new_spaceship" class="col-form-label fw-bold">{{ __('Imagem da Nave') }}</label>
                        <x-tooltip message="{!! __('
                            Requisitos da imagem: <br>
                            Extensão: .png <br>
                            Tamanho: 512 kB (max)') !!}
                        ">
                        </x-tooltip>
                    </div>

                    <div class="col-md-6 d-flex">
                        <input
                            id="arquivo_new_spaceship"
                            class="form-control"
                            name="arquivo"
                            type="file"
                            accept="image/png"
                            required
                        />
                    </div>
                </div>

                <div class="row mb-3 mt-4">
                    <div class="offset-md-3 text-start">
                        <input class="btn btn-primary px-4 fw-bold" type="submit" value="{{ __('Criar Nave') }}">
                    </div>
                </div>
            </form>
        </x-slot:body>

    </x-box>
</x-app-layout>