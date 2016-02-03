<?php
/*
Plugin Name: Infinite SEO
Plugin URI: http://premium.wpmudev.org/project/wpmu-dev-seo/
Description: Every SEO option that a site requires, in one easy bundle.
Version: 1.6.2
Network: true
Text Domain: wds
Author: Ulrich Sossou (Incsub)
Author URI: http://ulrichsossou.com/
WDP ID: 167
*/

/* Copyright 2010-2011 Incsub (http://incsub.com/)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

/**
 * Autolinks module contains code from SEO Smart Links plugin
 * (http://wordpress.org/extend/plugins/seo-automatic-links/ and http://www.prelovac.com/products/seo-smart-links/)
 * by Vladimir Prelovac (http://www.prelovac.com/).
 */

//you can override this in wp-config.php to enable blog-by-blog settings in multisite
if (!defined('WDS_SITEWIDE'))
    define('WDS_SITEWIDE', true);

//you can override this in wp-config.php to enable more posts in the sitemap, but you may need alot of memory
if (!defined('WDS_SITEMAP_POST_LIMIT'))
    define('WDS_SITEMAP_POST_LIMIT', 1000);

//you can override this in wp-config.php to enable more BuddyPress groups in the sitemap, but you may need alot of memory
if (!defined('WDS_BP_GROUPS_LIMIT'))
    define('WDS_BP_GROUPS_LIMIT', 200);

//you can override this in wp-config.php to enable more BuddyPress profiles in the sitemap, but you may need alot of memory
if (!defined('WDS_BP_PROFILES_LIMIT'))
    define('WDS_BP_PROFILES_LIMIT', 200);

// You can override this value in wp-config.php to allow more or less time for caching SEOmoz results
if (!defined('WDS_EXPIRE_TRANSIENT_TIMEOUT'))
    define('WDS_EXPIRE_TRANSIENT_TIMEOUT', 3600);

// You can override this value in wp-config.php to allow for longeror shorter minimum autolink requirement
if (!defined('WDS_AUTOLINKS_DEFAULT_CHAR_LIMIT'))
    define('WDS_AUTOLINKS_DEFAULT_CHAR_LIMIT', 3);

// Debugging defines.
if (!defined('WDS_SITEMAP_SKIP_IMAGES')) define('WDS_SITEMAP_SKIP_IMAGES', false);
if (!defined('WDS_SITEMAP_SKIP_TAXONOMIES')) define('WDS_SITEMAP_SKIP_TAXONOMIES', false);
if (!defined('WDS_SITEMAP_SKIP_SE_NOTIFICATION')) define('WDS_SITEMAP_SKIP_SE_NOTIFICATION', false);
if (!defined('WDS_SITEMAP_SKIP_ADMIN_UPDATE')) define('WDS_SITEMAP_SKIP_ADMIN_UPDATE', false);

define('WDS_VERSION', '1.6.2');

/**
 * Setup plugin path and url.
 */
define('WDS_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('WDS_PLUGIN_DIR', plugin_dir_path(__FILE__) . 'wds-files/');
define('WDS_PLUGIN_URL', plugin_dir_url(__FILE__) . 'wds-files/');

function _wds_init()
{
    /**
     * Load textdomain.
     */
    if (defined('WPMU_PLUGIN_DIR') && file_exists(WPMU_PLUGIN_DIR . '/wpmu-dev-seo.php')) {
        load_muplugin_textdomain('wds', dirname(plugin_basename(__FILE__)) . '/wds-files/languages');
    } else {
        load_plugin_textdomain('wds', false, dirname(plugin_basename(__FILE__)) . '/wds-files/languages');
    }

    require_once(WDS_PLUGIN_DIR . 'wds-core/wds-core-wpabstraction.php');
    require_once(WDS_PLUGIN_DIR . 'wds-core/wds-core.php');
    global $wds_options;
    $wds_options = get_wds_options();

    if (is_admin()) {
        require_once(WDS_PLUGIN_DIR . 'wds-core/admin/wds-core-admin.php');
        require_once(WDS_PLUGIN_DIR . 'wds-core/admin/wds-core-config.php');

        require_once(WDS_PLUGIN_DIR . 'wds-autolinks/wds-autolinks-settings.php');
        require_once(WDS_PLUGIN_DIR . 'wds-seomoz/wds-seomoz-settings.php');
        require_once(WDS_PLUGIN_DIR . 'wds-sitemaps/wds-sitemaps.php');
        require_once(WDS_PLUGIN_DIR . 'wds-sitemaps/wds-sitemaps-settings.php');
        require_once(WDS_PLUGIN_DIR . 'wds-onpage/wds-onpage-settings.php');

        if (@$wds_options['sitemap-dashboard-widget']) {
            require_once(WDS_PLUGIN_DIR . 'wds-sitemaps/wds-sitemaps-dashboard-widget.php');
        }

        if (isset($wds_options['seomoz']) && $wds_options['seomoz'] == 'on') { // Changed '=' to '=='
            require_once(WDS_PLUGIN_DIR . 'wds-seomoz/wds-seomoz-results.php');
            require_once(WDS_PLUGIN_DIR . 'wds-seomoz/wds-seomoz-dashboard-widget.php');
        }

        if (isset($wds_options['onpage']) && $wds_options['onpage'] == 'on') { // Changed '=' to '=='
            require_once(WDS_PLUGIN_DIR . 'wds-core/admin/wds-core-metabox.php');
            require_once(WDS_PLUGIN_DIR . 'wds-core/admin/wds-core-taxonomy.php');
        }
    } else {

        if (isset($wds_options['autolinks']) && $wds_options['autolinks'] == 'on') { // Changed '=' to '=='
            require_once(WDS_PLUGIN_DIR . 'wds-autolinks/wds-autolinks.php');
        }
        if (isset($wds_options['sitemap']) && $wds_options['sitemap'] == 'on') { // Changed '=' to '=='. Also, changed plural to singular.
            require_once(WDS_PLUGIN_DIR . 'wds-sitemaps/wds-sitemaps.php');
            require_once(WDS_PLUGIN_DIR . 'wds-sitemaps/wds-sitemaps-settings.php'); // This is to propagate defaults without admin visiting the dashboard.
        }
        if (isset($wds_options['onpage']) && $wds_options['onpage'] == 'on') { // Changed '=' to '=='
            require_once(WDS_PLUGIN_DIR . 'wds-onpage/wds-onpage.php');
        }

    }
}

if (defined('WDS_CONDITIONAL_EXECUTION') && WDS_CONDITIONAL_EXECUTION) add_action('plugins_loaded', '_wds_init', 10);
else _wds_init();



/**
 * Show notification if WPMUDEV Update Notifications plugin is not installed
 **/
/*if ( ! function_exists( 'wdp_un_check' ) ) {
	add_action( 'admin_notices', 'wdp_un_check', 5 );
	add_action( 'network_admin_notices', 'wdp_un_check', 5 );

	function wdp_un_check() {
		if ( !class_exists( 'WPMUDEV_Update_Notifications' ) && current_user_can( 'edit_users' ) )
			echo '<div class="error fade"><p>' . __('Please install the latest version of <a href="http://premium.wpmudev.org/project/update-notifications/" title="Download Now &raquo;">our free Update Notifications plugin</a> which helps you stay up-to-date with the most stable, secure versions of WPMU DEV themes and plugins. <a href="http://premium.wpmudev.org/wpmu-dev/update-notifications-plugin-information/">More information &raquo;</a>', 'wds') . '</p></div>';
	}
}*/