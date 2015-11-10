jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();

$(document).ready(function () {
    $('.field_type-post_object select option:selected').each(function () {
        var id = '#' + $(this).val();
        console.log($(this).parent().parent());
        $(this).parent().parent().find(id).fadeIn();

    });
    $('.field_type-post_object select').change(function () {
        $(this).parent().parent().find('img').hide();
        var id = '#' + $(this).find('option:selected').val();
        console.log($(this).parent().parent());
        $(this).parent().parent().find(id).fadeIn();

    })

    // $('#wp-admin-bar-root-default #wp-admin-bar-menu-toggle').remove();
    // $('#wp-admin-bar-root-default #wp-admin-bar-wp-logo').remove();
    // $('#wp-admin-bar-root-default').prepend('<li id="wp-admin-bar-wdcab_root"><a class="ab-item" href="/wp-admin/" target="_self"><img src="http://cms.bytbil.com/wp-includes/images/bytbil_logo.png"> <span>Webbhantering</span></a></li>');
});