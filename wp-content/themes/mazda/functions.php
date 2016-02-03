<?php

/* Plugin Includes */
include 'plugins/ContentManagement/content-management.php';
include 'plugins/wp_bootstrap_navwalker.php';
include 'plugins/breadcrumb.php';
include 'plugins/acf-options-page/acf-options-page.php';
include 'plugins/acf-flexible-content/acf-flexible-content.php';
include 'plugins/acf-image-crop-add-on/acf-image-crop.php';
include 'plugins/mazda-settings/mazda-settings.php';
include 'plugins/bytbil-fordonsurval/bytbil-fordonsurval.php';
include 'plugins/bytbil-erbjudanden/bytbil-erbjudanden.php';
include 'plugins/bytbil-innehall/bytbil-innehall.php';
include 'plugins/bytbil-personal/bytbil-personal.php';
include 'plugins/bytbil-nybilsmodeller/bytbil-nybilsmodeller.php';
include 'plugins/bytbil-embed/bytbil-embed.php';
include 'plugins/mazda-menus.php';
include 'plugins/mazda-slideshow.php';
include 'plugins/mazda-testdrive/mazda-testdrive.php';
//include 'plugins/mazda-cron/mazda-cron.php';

/* Registrera Menyer */
function mazda_register_theme_menu()
{
    register_nav_menu(
        'primary', 'Huvudmeny'
    );
}
add_action('init', 'mazda_register_theme_menu');

function mazda_simple_html_dom()
{
    if (false === (get_mazda_transient('html'))) {
        set_mazda_html();
    }

    set_mazda_css();
}
add_action('wp_head', 'mazda_simple_html_dom');

function mazda_remove_templates()
{
    global $pagenow; ?>

    <script>
        (function($) {
            $(document).ready(function() {
            <?php if (in_array($pagenow, array('post-new.php', 'post.php')) && get_post_type() == 'page' && !is_master()) : ?>
                $('#acf_acf_base-url').addClass('acf-hidden');
                $('#acf_acf_body-class').addClass('acf-hidden');
                $('#acf_acf_mazda-moduler').css('display', 'none');
                $('#page_template option[value="page-brochures.php"]').remove();
                $('#page_template option[value="page-mazda-modules.php"]').remove();
                $('#page_template option[value="page-testdrive.php"]').remove();

                if ($('#acf-field-field_553a3941a5af4_0_field_553f3ef817b18').length > 0) {
                    var originalInput = $('#acf-field-field_553a3941a5af4_0_field_553f3ef817b18');
                    var ghost = originalInput.clone().addClass('acf-ghost-input').removeAttr('id').removeAttr('name');
                    var wrap = '<p class="label"><label>Ändra pris/rubrik</label>';
                    $('#acf-content').prepend(wrap + ghost[0].outerHTML + '</p>');

                    $('.acf-ghost-input').keyup(function(e) {
                        var value = $(this).val();
                        originalInput.val(value);
                    });
                }
            <?php endif; ?>
                $('#postdivrich').remove();
            });
        })(jQuery);
    </script>
    <?php
}
add_action('admin_footer', 'mazda_remove_templates', 10);

function template_fix()
{
    global $wpdb;
    foreach ($wpdb->get_results('select id from wp_8_posts where post_type="page";') as $key => $value) {
        update_post_meta($value->id, '_wp_page_template', 'page-mazda-modules.php');
        error_log($value->id);
    }
}
//add_action('init', 'template_fix');

?>
