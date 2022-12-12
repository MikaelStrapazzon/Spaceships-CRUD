@props([
    'spaceship'
])

<x-app-layout titlePage="Visualizar Nave">
    <x-box sizing="col min-wf-300 mb-3 mx-3">

        <x-slot:header class="d-flex justify-content-between">
            <span>{{ __('Nave ' . $spaceship['id']) }}</span>

            <div class="d-flex">
                <a class="text-decoration-none me-1" href="{{ route('spaceships.edit', [$spaceship['id']]) }}">
                    <x-button-action type='edit' title="{{ __('Editar nave') }}" />
                </a>

                <form id="formDeleteSpaceship" action="{{ route('spaceships.destroy', [$spaceship['id']]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>

                <x-popover
                    popover-title="{{ __('Confirmação de exclusão') }}"
                    popover-content="
                        <div class='d-flex flex-column'>
                            <span class='mb-2'>
                                {{ __('Você tem certeza que deseja excluir a nave de
                                    id ' . $spaceship['id'] . ' e
                                    nome ' . $spaceship['name']) . '?' }}
                            </span>
                            <a
                                id='buttonDeleteSpaceship'
                                class='btn btn-danger flex-fill'>
                                {{  __('Excluir Nave') }}
                            </a>
                        </div>"
                >
                    <x-button-action type='delete' />
                </x-popover>
            </div>
        </x-slot:header>

        <x-slot:body class="py-4 px-5">

            <div class="row mb-3">
                <span class="col-md-3 col-form-label fw-bold text-md-end">{{ __('Id') }}</span>

                <div class="col-md-6">
                    <span class="form-control-plaintext">
                        {{ $spaceship['id'] }}
                    </span>
                </div>
            </div>

            <div class="row mb-3">
                <span class="col-md-3 col-form-label fw-bold text-md-end">{{ __('Nome') }}</span>

                <div class="col-md-6">
                    <span class="form-control-plaintext">
                        {{ $spaceship['name'] }}
                    </span>
                </div>
            </div>

            <div class="row mb-3">
                <span class="col-md-3 col-form-label fw-bold text-md-end">{{ __('Combustível') }}</span>

                <div class="col-md-6">
                    <span class="form-control-plaintext">
                        {{ $spaceship['fuel'] }}
                    </span>
                </div>
            </div>

            <div class="row mb-3">
                <span class="col-md-3 col-form-label fw-bold text-md-end">{{ __('Potência do Motor') }}</span>

                <div class="col-md-6">
                    <span class="form-control-plaintext">
                        {{ $spaceship['motor_power'] }}
                    </span>
                </div>
            </div>

            <div class="row mb-3">
                <span class="col-md-3 col-form-label fw-bold text-md-end">{{ __('Quantidade de Armas') }}</span>

                <div class="col-md-6">
                    <span class="form-control-plaintext">
                        {{ $spaceship['quantity_weapon'] }}
                    </span>
                </div>
            </div>

            <div class="row mb-3">
                <span class="col-md-3 col-form-label fw-bold text-md-end">{{ __('Imagem da Nave') }}</span>

                <div class="col-md-6">
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
        </x-slot:body>

    </x-box>
</x-app-layout>

<script type="module" src="{{ asset('assets/js/pages/spaceships/visualize.js') }}"></script>

