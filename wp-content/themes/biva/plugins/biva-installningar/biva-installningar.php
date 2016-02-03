<?php
/*
Plugin Name: Biva Inställningar
Description: Inställingar för hemsidan.
Author: Tobias Franzén: BytBil Nordic AB
Version: 1.0.0
Author URI: http://www.bytbil.com
*/

// create custom plugin settings menu
//add_action('admin_menu', 'my_cool_plugin_create_menu');

//function my_cool_plugin_create_menu() {

    //create new top-level menu
    //add_menu_page('Siteinställningar', 'Siteinställningar', 'administrator', __FILE__, 'my_cool_plugin_settings_page' );

    //call register settings function
    //add_action( 'admin_init', 'register_biva_settings' );
//}

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_tumnagel',
        'title' => 'Tumnagel',
        'fields' => array (
            array (
                'key' => 'field_55d346a3985bf',
                'label' => 'Tumnagel',
                'name' => 'news-thumbnail',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'news',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

function register_biva_settings() {
    //register our settings
    register_setting( 'biva-settings-group', 'new_option_name' );
    register_setting( 'biva-settings-group', 'some_other_option' );
    register_setting( 'biva-settings-group', 'option_etc' );
}

function my_cool_plugin_settings_page() {
    ?>
    <div class="wrap">
        <h2>Siteinställningar</h2>

        <form method="post" action="options.php">
            <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
            <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">New Option Name</th>
                    <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Some Other Option</th>
                    <td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Options, Etc.</th>
                    <td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
                </tr>
            </table>

            <?php submit_button(); ?>

        </form>
    </div>
<?php } ?>