@props([
    'type',
    'title' => '',
    'sizingH' => 'hf-30',
    'sizingW' => 'wf-30',
])

@php
    switch($type) {
        case 'delete':
            $image = 'ban';
            $color = 'danger';
            break;

        case 'edit':
            $image = 'pen';
            $color = 'warning';
            break;

        case 'add':
            $image = 'plus';
            $color = 'success';
            break;

        default:
            $image = 'questionCircle';
            $color = '';
            break;
    }
@endphp

<button
    title="{{ $title }}"
    class="
        btn py-0 px-2
        {{ $sizingH }} {{ $sizingW }}
        btn-{{ $color }}"
>
    <x-icon name='{{ $image }}' />
</button>
