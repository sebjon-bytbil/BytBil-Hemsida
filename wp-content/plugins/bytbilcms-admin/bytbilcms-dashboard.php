<?php
/*
Plugin Name: BytBil CMS 2.0 : Dashboard
Description: Nya dashboards och förändringar för BytBil CMS 2.0
Author: Sebastian Jonsson : BytBil.com
Version: 1.0
Author URI: http://www.bytbil.com
*/
// Ta bort original widgets
function disable_default_dashboard_widgets()
{

    remove_meta_box('dashboard_right_now', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
    remove_meta_box('dashboard_primary', 'dashboard', 'core');
    remove_meta_box('dashboard_secondary', 'dashboard', 'core');
    remove_meta_box('dashboard_activity', 'dashboard', 'core');
    remove_action('welcome_panel', 'wp_welcome_panel');
}

add_action('admin_menu', 'disable_default_dashboard_widgets');

function bytbil_welcome_panel()
{
    $currentuser = wp_get_current_user(); ?>

    <div id="bytbil-welcome-panel" class="custom-welcome-panel-content">
        <h3>Hej <?php echo $currentuser->user_firstname; ?> och Välkommen till BytBil CMS.</h3>

        <p class="about-description">Här kan du enkelt redigera din hemsida <?php echo get_bloginfo('name'); ?>. Använd
            länkarna nedan eller menyn till vänster för att administrera er hemsida.</p>
        <h4>Kom igång</h4>
        <a href="<?php echo admin_url('post.php?post=' . get_option('page_on_front') . '&action=edit'); ?>"
           class="button"><i class="fa fa-list-alt"></i><br/>Redigera Startsida</a>
        <a href="<?php echo admin_url('post-new.php?post_type=page'); ?>" class="button"><i
                class="fa fa-file-o"></i><br/>Skapa sida</a>
        <a href="<?php echo admin_url('post-new.php?post_type=slideshow'); ?>" class="button"><i
                class="fa fa-image"></i><br/>Skapa bildspel</a>
        <a href="<?php echo admin_url('post-new.php?post_type=offer'); ?>" class="button"><i class="fa fa-tag"></i><br/>Skapa
            erbjudande</a>
        <a href="<?php echo admin_url('post-new.php?post_type=news'); ?>" class="button"><i
                class="fa fa-newspaper-o"></i><br/>Skriv nyhet</a>
        <a href="<?php echo admin_url('upload.php'); ?>" class="button"><i class="fa fa-camera"></i><br/>Ladda upp bild</a>
        <a href="<?php echo admin_url('nav-menus.php'); ?>" class="button"><i class="fa fa-bars"></i><br/>Redigera
            menyer</a>
        <a href="<?php echo admin_url('edit.php?post_type=plug'); ?>" class="button"><i
                class="fa fa-delicious"></i><br/>Skapa puff</a>
        <a href="<?php echo admin_url('edit.php?post_type=facility'); ?>" class="button"><i
                class="fa fa-building"></i><br/>Redigera Anläggning</a>
        <a href="<?php echo admin_url('edit.php?post_type=employee'); ?>" class="button"><i class="fa fa-male"></i><br/>Redigera
            Personal</a>
    </div>

<?php
}

add_action('welcome_panel', 'bytbil_welcome_panel');

?>