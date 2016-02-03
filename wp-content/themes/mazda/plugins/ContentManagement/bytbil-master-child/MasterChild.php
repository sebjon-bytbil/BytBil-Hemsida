<?php

/*
 * Plugin Name: BytBil Mastersite
 * Author: John Eriksson : Provide IT
 * Author URI: http://www.provideit.se
 * Description: Plugin som tillåter master/child funktionalitet
 * */

class MasterChild
{
    protected $master;
    protected $current;
    protected $url;
    protected $dir;

    public function __construct()
    {
        $this->dir = dirname(__FILE__) . "/";
        $this->url = preg_replace("/.*(\/wp-content.*)/", "$1", dirname(__FILE__) . "/");
        $this->master = intval(get_site_option("master-site"));
        $this->current = get_current_blog_id();

        if (!is_multisite()) {
            return;
        }

        if (get_site_option("master-site") === false) {
            update_site_option("master-site", 0);
        }

        // Add Hooks
        add_action("network_admin_menu", array($this, "createAdminPage"));
        add_action("admin_enqueue_scripts", array($this, "enqueueScripts"));
        add_action("wp_ajax_updateNetworkMaster", array($this, "updateMasterSite"));
    }

    public function createAdminPage()
    {
        global $mastermenu_added;
        if (!$mastermenu_added) {
            add_submenu_page("settings.php", "Mastersite", "Mastersite", "manage_network", "bbcms-mastersite", array($this, "includeAdminPage"));
            $mastermenu_added = true;
        }
    }

    public function includeAdminPage()
    {
        $sites = wp_get_sites();
        require_once $this->dir . "admin-page.php";
    }

    public function enqueueScripts()
    {
        wp_enqueue_script("bbcms-mastersite-js", $this->url . "master.js", array("jquery"), "", true);
    }

    public function updateMasterSite()
    {
        $post = json_decode(json_encode($_POST), false);

        if (intval($post->blog_id)) {
            if (update_site_option("master-site", intval($post->blog_id))) {
                header("HTTP/1.0 200 OK", true, 200);
            } else {
                header("HTTP/1.0 304 Not Modified", true, 304);
            }
        } else {
            header("HTTP/1.0 400 Bad Request", true, 400);
        }
        die();
    }

    /**
     * @return int
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param int $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
    }

    /**
     * @return stringd_submenu_page("setting
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param string $dir
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    /**
     * @return int
     */
    public function getMaster()
    {
        return $this->master;
    }

    /**
     * @param int $master
     */
    public function setMaster($master)
    {
        $this->master = $master;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}

$MasterChild = new MasterChild();

require $MasterChild->getDir() . "functions.php";
require $MasterChild->getDir() . "acf.php";
