jQuery(document).ready(function ($) {
    $('#accordion').find('.accordion-toggle').click(function () {
        $(this).next().slideToggle('fast');
        $(this).children('i').toggleClass('fa-rotate-90');
        $(".accordion-content").not($(this).next()).slideUp('fast');
        //$('.accordion-sub').not($(this).next()).slideUp('fast');
    });

    $('.controls.play').click(function () {
        $(this).parents('.video-container').find('#video-player').get(0).play();
    });
});