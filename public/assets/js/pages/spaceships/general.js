$('body').on('click', '.buttonDeleteSpaceship', function(event) {
    event.preventDefault();

    $('#formDeleteSpaceship').attr('action', event.currentTarget.id).submit();
});

