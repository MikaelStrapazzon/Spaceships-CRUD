@props([
    'spaceships'
])

<x-app-layout titlePage="Lista de Naves">
    <x-box sizing="col min-wf-300 mb-3 mx-3">
        <x-slot:header class="d-flex justify-content-between align-items-center">
            <span>{{ __('Lista') }}</span>

            <a class="me-3" href="{{ route('spaceships.create') }}">
                <x-button-action type='add' title="{{ __('Adicionar nova nave') }}" />
            </a>
        </x-slot:header>

        <x-slot:body class="p-4">
            <x-table>

                <x-slot:thead>
                    <th scope="col">{{ __('ID') }}</th>
                    <th scope="col">{{ __('Imagem da Nave') }}</th>
                    <th scope="col">{{ __('Nome') }}</th>
                    <th scope="col">{{ __('Combustível') }}</th>
                    <th scope="col">{{ __('Potência do Motor') }}</th>
                    <th scope="col">{{ __('Quantidade de Armas') }}</th>
                    <th class="text-center" scope="col">{{ __('Ações') }}</th>
                </x-slot:thead>

                <x-slot:tbody>
                    @foreach($spaceships as $spaceship)
                        <tr>
                            <th scope="row">{{ $spaceship->id }}</th>

                            <td>
                                <img
                                    class="wf-60 ms-3"
                                    src="{{ asset('storage/images/' . $spaceship->arquivo) }}"
                                    alt="{{ __('Imagem da Nave') }}: {{ $spaceship->name }}"
                                    title="{{ __('Imagem da Nave') }}: {{ $spaceship->name }}"
                                    onerror="
                                        this.onerror=null;
                                        this.title='{{ __('Não existe ou não foi possível carregar a imagem') }}'
                                        this.src='{{ asset('assets/icons/ban.svg') }}';
                                    "
                                >
                            </td>

                            <td>
                                <a
                                    class="fw-bold"
                                    href="{{ route('spaceships.show', [$spaceship->id]) }}"
                                >
                                    {{ $spaceship->name }}
                                </a>
                            </td>

                            <td>{{ $spaceship->fuel }}</td>

                            <td>{{ $spaceship->motor_power }}</td>

                            <td>{{ $spaceship->quantity_weapon }}</td>

                            <td class="wf-125">
                                <div class="d-flex justify-content-center ">

                                    <a class="text-decoration-none me-1" href="{{ route('spaceships.edit', [$spaceship->id]) }}">
                                        <x-button-action type='edit' title="{{ __('Editar a nave') }}" />
                                    </a>

                                     <x-popover
                                        popover-title="{{ __('Confirmação de exclusão') }}"
                                        popover-content="
                                            <div class='d-flex flex-column'>
                                                <span class='mb-2'>
                                                    {{ __('Você tem certeza que deseja excluir a nave de
                                                        id ' . $spaceship->id . ' e
                                                        nome ' . $spaceship->name) . '?' }}
                                                </span>
                                                <a
                                                    id='{{ route('spaceships.destroy', [$spaceship->id]) }}'
                                                    class='buttonDeleteSpaceship btn btn-danger flex-fill'>
                                                    {{  __('Excluir Nave') }}
                                                </a>
                                            </div>"
                                    >
                                        <x-button-action type='delete' />
                                    </x-popover>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:tbody>

            </x-table>

            <div class="d-flex justify-content-end">
                {{ $spaceships->links() }}
            </div>

             <form id='formDeleteSpaceship' method="POST">
                @csrf
                @method('DELETE')
            </form>
        </x-slot:body>
    </x-box>
</x-app-layout>

<script type="module" src="{{ asset('assets/js/pages/spaceships/general.js') }}"></script>
