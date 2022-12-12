@props([
    'sizing' => 'wf-16',
    'message' => ''
])

<a
    href="#"
    data-bs-toggle="tooltip"
    data-bs-html="true"
    data-bs-title="<p class='text-start'>{{ $message }}</p>"
>
    <x-icon-questionCircle class="{{ $sizing }}"></x-icon-questionCircle>
</a>
