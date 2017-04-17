$(document).on('ready', function () {

    $('#to1').click(function () {
        $('#cat0').addClass('hidden');
        $('#cat1').removeClass('hidden');
    });

    $('#to2').click(function () {
        $('#cat1').addClass('hidden');
        $('#cat2').removeClass('hidden');
    });

    $('#to3').click(function () {
        $('#cat2').addClass('hidden');
        $('#cat3').removeClass('hidden');
    });



    $('#back0').click(function () {
        $('#cat1').addClass('hidden');
        $('#cat0').removeClass('hidden');
    });
    $('#back1').click(function () {
        $('#cat2').addClass('hidden');
        $('#cat1').removeClass('hidden');
    });
    $('#back2').click(function () {
        $('#cat3').addClass('hidden');
        $('#cat2').removeClass('hidden');
    });
});
