$(document).on('ready', function () {

    $('.btn').click(function () {
        $(`#${$(this).data('container')}`).fadeToggle();
    });


    $('.btn-success').click(function () {
        console.log($(`[data-matricola=${$(this).data('matricola')}`))
    });

});