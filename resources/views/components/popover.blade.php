@props([
    'popoverTitle' => '',
    'popoverContent' => '',
])

<span
    data-bs-sanitize="false"
    data-bs-html="true"
    data-bs-toggle="popover"
    data-bs-title="{{ $popoverTitle }} "
    data-bs-content='{{ $popoverContent }}'
>
    {{ $slot }}
</span>
