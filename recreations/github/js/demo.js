$(document).ready(function () {
    $('a.tabnav-tab').on('click', function () {
        $('a.tabnav-tab').removeClass('active');
        $(this).addClass('active');
    });

    $('.tabs .tab').on('click', function () {
        $('.tabs .tab').removeClass('active');
        $(this).addClass('active');
    });
});