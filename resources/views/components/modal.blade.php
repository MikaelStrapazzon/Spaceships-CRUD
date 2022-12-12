{{--
    To open the modal it is necessary to create an HTML element with the attributes:
    data-bs-toggle="modal"
    data-bs-target="#<MODAL ID>"
--}}

@props([
    'id',
    'modal-title' => '',
    'body',
    'footer',
    'footer-button-close'
])

<div
    id="{{ $id }}"
    class="modal fade"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="{{ $id }}Label"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $id }}Label">{{ __($modalTitle) }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div {{ $body->attributes->class('modal-body') }}>
                {{ $body }}
            </div>

            <div {{ $footer->attributes->class('modal-footer') }}>
                @if(!empty($footerButtonClose))
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __($footerButtonClose) }}</button>
                @endif
                {{ $footer }}
            </div>
        </div>
    </div>
</div>
