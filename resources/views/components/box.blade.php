@props([
    'header',
    'body',
    'sizing' => '',
])

<div
    class="
        card
        rounded-1 border-4 border-400
        border-top border-start-0 border-bottom-0 border-end-0
        shadow
        {{ $sizing }}"
    >

    <div {{ $header->attributes->class('card-header bg-white rounded-0 fs-5 ps-2 border-200') }}>
        {{ $header }}
    </div>

    <div {{ $body->attributes->class('card-body rounded-0') }}>
        {{ $body }}
    </div>
</div>
