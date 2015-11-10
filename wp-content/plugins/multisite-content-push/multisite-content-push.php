<?php
/*
Plugin Name: Multisite Content Push
Plugin URI:
Description: Copy any content from any site in your network to any other site or group of sites in the same network.
Author: Ignacio (Incsub)
Version: 1.0.4
Author URI: http://premium.wpmudev.org/
Text Domain: mcp
Domain Path: lang
Network:true
WDP ID: 855335
Tags: multisiste plugin, multisite
*/

/*
Copyright 2007-2013 Incsub (http://incsub.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License (Version 2 - GPLv2) as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a push of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/**
 * The main class of the plugin
 */
class Multisite_Content_Push
{

    // The version slug for the DB
    public static $version_option_slug = 'multisite_content_push_plugin_version';

    // Admin pages. THey could be accesed from other points
    // So they're statics
    static $network_main_menu_page;
    static $network_blog_groups_menu_page;
    static $network_settings_menu_page;

    public $nbt_integrator;

    public function __construct()
    {

        $this->set_globals();

        if (!is_multisite()) {
            add_action('all_admin_notices', array(&$this, 'display_not_multisite_notice'));
            return false;
        }

        $this->includes();

        add_action('init', array(&$this, 'maybe_upgrade'));

        add_action('init', array(&$this, 'init_plugin'));

        add_action('wp_loaded', array(&$this, 'maybe_push_content'));

        add_action('plugins_loaded', array(&$this, 'load_text_domain'));

        add_action('admin_enqueue_scripts', array(&$this, 'enqueue_scripts'));
        add_action('admin_enqueue_scripts', array(&$this, 'enqueue_styles'));

        add_action('delete_blog', array(&$this, 'delete_blog'));

        $this->nbt_integrator = new MCP_NBT_Integrator();

        // We don't use the activation hook here
        // As sometimes is not very helpful and
        // we would need to check stuff to install not only when
        // we activate the plugin
        register_deactivation_hook(__FILE__, array(&$this, 'deactivate'));

    }


    public function display_not_multisite_notice()
    {
        ?>
        <div class="error">
            <p><?php _e('Multisite Content Push is a plugin just for multisites, please deactivate it.', MULTISTE_CP_LANG_DOMAIN); ?></p>
        </div>
    <?php
    }

    public function enqueue_scripts()
    {
    }


    public function enqueue_styles()
    {
        wp_enqueue_style('mcp-icons', MULTISTE_CP_ASSETS_URL . 'css/icons.css');
    }


    /**
     * Set the plugin constants
     */
    private function set_globals()
    {

        // Basics
        define('MULTISTE_CP_VERSION', '1.0.4');
        define('MULTISTE_CP_PLUGIN_URL', plugin_dir_url(__FILE__));
        define('MULTISTE_CP_PLUGIN_DIR', plugin_dir_path(__FILE__));
        define('MULTISTE_CP_PLUGIN_FILE_DIR', plugin_dir_path(__FILE__) . 'multisite-content-push.php');

        // Language domain
        define('MULTISTE_CP_LANG_DOMAIN', 'mcp');

        // URLs
        define('MULTISTE_CP_ASSETS_URL', MULTISTE_CP_PLUGIN_URL . 'assets/');

        // Dirs
        define('MULTISTE_CP_ADMIN_DIR', MULTISTE_CP_PLUGIN_DIR . 'admin/');
        define('MULTISTE_CP_FRONT_DIR', MULTISTE_CP_PLUGIN_DIR . 'front/');
        define('MULTISTE_CP_MODEL_DIR', MULTISTE_CP_PLUGIN_DIR . 'model/');
        define('MULTISTE_CP_INCLUDES_DIR', MULTISTE_CP_PLUGIN_DIR . 'inc/');

    }

    /**
     * Include files needed
     */
    private function includes()
    {
        // Model
        require_once(MULTISTE_CP_MODEL_DIR . 'model.php');
        require_once(MULTISTE_CP_MODEL_DIR . 'push-model.php');
        require_once(MULTISTE_CP_MODEL_DIR . 'nbt-model.php');

        // Libraries
        require_once(MULTISTE_CP_INCLUDES_DIR . 'admin-page.php');
        require_once(MULTISTE_CP_INCLUDES_DIR . 'errors-handler.php');
        require_once(MULTISTE_CP_INCLUDES_DIR . 'helpers.php');
        require_once(MULTISTE_CP_INCLUDES_DIR . 'upgrade.php');


        //Integrations
        require_once(MULTISTE_CP_INCLUDES_DIR . 'integration/nbt-integration.php');

        // Settings Handler
        require_once(MULTISTE_CP_INCLUDES_DIR . 'settings-handler.php');

        // Admin Pages
        require_once(MULTISTE_CP_ADMIN_DIR . 'pages/network-main-page.php');
        require_once(MULTISTE_CP_ADMIN_DIR . 'pages/network-blogs-groups.php');
        require_once(MULTISTE_CP_ADMIN_DIR . 'pages/network-settings-page.php');

        // Menu push
        require_once(MULTISTE_CP_INCLUDES_DIR . 'menu-push.php');

        if (is_admin()) {
            require_once(MULTISTE_CP_ADMIN_DIR . 'post-meta-box.php');
            require_once(MULTISTE_CP_INCLUDES_DIR . 'ajax.php');
        }

        global $wpmudev_notices;
        $wpmudev_notices[] = array('id' => 855335, 'name' => 'Multisite Content Push', 'screens' => array('toplevel_page_mcp_network_page-network', 'content-push_page_mcp_sites_groups_page-network', 'content-push_page_mcp_settings_page-network'));
        include_once(MULTISTE_CP_INCLUDES_DIR . 'dash-notice/wpmudev-dash-notification.php');
    }

    public function include_push_classes()
    {
        require_once(MULTISTE_CP_INCLUDES_DIR . 'content-push/content-push.php');
        require_once(MULTISTE_CP_INCLUDES_DIR . 'content-push/content-push-page.php');
        require_once(MULTISTE_CP_INCLUDES_DIR . 'content-push/content-push-post.php');
        require_once(MULTISTE_CP_INCLUDES_DIR . 'content-push/content-push-plugin.php');
        require_once(MULTISTE_CP_INCLUDES_DIR . 'content-push/content-push-user.php');
        require_once(MULTISTE_CP_INCLUDES_DIR . 'content-push/content-push-cpt.php');

        $this->include_integration_files();
    }

    public function include_integration_files()
    {
        if (class_exists('Woocommerce')) {
            require_once(MULTISTE_CP_INCLUDES_DIR . 'integration/woocommerce.php');
        }
    }

    /**
     * Upgrade the plugin when a new version is uploaded
     */
    public function maybe_upgrade()
    {
    }


    /**
     * Actions executed when the plugin is deactivated
     */
    public function deactivate()
    {
        $model = mcp_get_model();
        $model->deactivate_model();
        // HEY! Do not delete anything from DB here
        // You better use the uninstall functionality
    }

    /**
     * Load the plugin text domain and MO files
     *
     * These can be uploaded to the main WP Languages folder
     * or the plugin one
     */
    public function load_text_domain()
    {
        $locale = apply_filters('plugin_locale', get_locale(), MULTISTE_CP_LANG_DOMAIN);

        load_textdomain(MULTISTE_CP_LANG_DOMAIN, WP_LANG_DIR . '/' . MULTISTE_CP_LANG_DOMAIN . '/' . MULTISTE_CP_LANG_DOMAIN . '-' . $locale . '.mo');
        load_plugin_textdomain(MULTISTE_CP_LANG_DOMAIN, false, dirname(plugin_basename(__FILE__)) . '/lang/');
    }

    /**
     * Initialize the plugin
     */
    public function init_plugin()
    {

        // A network menu
        $args = array(
            'menu_title' => __('Content Push', MULTISTE_CP_LANG_DOMAIN),
            'page_title' => __('Multisite Content Push', MULTISTE_CP_LANG_DOMAIN),
            'network_menu' => true,
            'screen_icon_slug' => 'mcp'
        );
        self::$network_main_menu_page = new Multisite_Content_Push_Network_Main_Menu('mcp_network_page', 'manage_network', $args);

        $args = array(
            'menu_title' => __('Site Groups', MULTISTE_CP_LANG_DOMAIN),
            'page_title' => __('Site Groups', MULTISTE_CP_LANG_DOMAIN),
            'network_menu' => true,
            'parent' => 'mcp_network_page',
            'screen_icon_slug' => 'mcp',
            'tabs' => array(
                'groups' => __('Groups', MULTISTE_CP_LANG_DOMAIN),
                'sites' => __('Sites', MULTISTE_CP_LANG_DOMAIN)
            )
        );

        $settings = mcp_get_settings();
        if ($settings['blog_templates_integration'])
            $args['tabs']['nbt'] = __('New Blog Templates', MULTISTE_CP_LANG_DOMAIN);

        self::$network_blog_groups_menu_page = new Multisite_Content_Push_Network_Blogs_Groups_Menu('mcp_sites_groups_page', 'manage_network', $args);

        $args = array(
            'menu_title' => __('Settings', MULTISTE_CP_LANG_DOMAIN),
            'page_title' => __('Settings', MULTISTE_CP_LANG_DOMAIN),
            'network_menu' => true,
            'parent' => 'mcp_network_page',
            'screen_icon_slug' => 'mcp'
        );
        self::$network_settings_menu_page = new Multisite_Content_Push_Network_Settings_Menu('mcp_settings_page', 'manage_network', $args);

        if (is_admin())
            new MCP_Post_Meta_Box();

    }

    public function maybe_push_content()
    {

        if (!is_network_admin() && !get_transient('mcp_pushing')) {
            set_transient('mcp_pushing', true, 10);
            $queue = mcp_get_queue_for_blog();

            //error_log("\n ".date(DATE_RFC822)." QUE length: ".count($queue), 3, "/var/www/bytbil/push_que.log");

            //var_dump($queue);

            foreach ($queue as $item) {
                global $wpdb;

                $model = mcp_get_model();
                $model->delete_queue_item($item->ID);

                $wpdb->query("BEGIN;");
                $this->include_push_classes();

                $settings = $item->settings;
                $class = $settings['class'];

                //error_log("\n ".date(DATE_RFC822)."blog_id: ".get_current_blog_id().", settings: ".var_export($settings,true), 3, "/var/www/bytbil/push_settings.log");

                $push = new $class($item->src_blog_id, $settings);
                $push->execute();

                $wpdb->query("COMMIT");


            }
            delete_transient('mcp_pushing');
        }

    }

    /**
     * Delete the queue for a blog when it is deleted
     *
     * @param Integer $blog_id Deleted Blog ID
     */
    public function delete_blog($blog_id)
    {
        $model = mcp_get_model();
        $model->delete_queue_for_blog($blog_id);
    }

}

global $multisite_content_push_plugin;
$multisite_content_push_plugin = new Multisite_Content_Push();