$(document).ready(function () {
    $('.dropdown > a').on('click', function (e) {
        e.preventDefault();

        if (!$(this).parent('.dropdown').hasClass('open')) {
            $('.dropdown').removeClass('open');
            $(this).parent('.dropdown').addClass('open');
        } else {
            $('.dropdown').removeClass('open');
        }
    });

    $('html').on('click', function (e) {
        if ($(e.target).closest('.dropdown').length === 0) {
            $('.dropdown').removeClass('open');
        }
    });

    $(document).on('keyup', function (e) {
        if (e.keyCode === 27) {
            $('.dropdown').removeClass('open');
        }
    });
});
