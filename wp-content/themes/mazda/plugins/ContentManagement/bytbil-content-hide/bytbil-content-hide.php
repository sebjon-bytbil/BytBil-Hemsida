<?php

/*
 * Plugin Name: BytBil Child Cleanup
 * Author: John Eriksson : Provide IT
 * Author URI: http://www.provideit.se
 * */


class ContentHide
{
    protected $path;
    protected $url;

    public function __construct()
    {
        $this->path = dirname(__FILE__) . "/";
        $this->url = preg_replace("/.*(\/wp-content.*)/", "$1", dirname(__FILE__) . "/");
        if (!is_multisite()) {
            return false;
        } else {
            add_action("init", array($this, "init"));
        }
    }

    public function init()
    {
        // Check if master
        if (get_master_site_id() != get_current_blog_id()) {
            add_action("admin_enqueue_scripts", array($this, "enqueueScripts"));
            add_action("admin_enqueue_scripts", array($this, "loadChildPlugins"));
            add_filter("manage_mb_slideshow_posts_columns", array($this, "addPushedColumn"));
            add_action("manage_mb_slideshow_posts_custom_column", array($this, "populatePushedColumn"), 10, 2);
            add_filter("post_row_actions", array($this, "removeTrashButton"), 10, 2);
            add_action("wp_ajax_getMasterStatus", array($this, "getMasterStatus"));
            add_filter("admin_body_class", array($this, "addPushedClasses"), 10, 1);
        } else {
            add_filter("admin_body_class", array($this, "addClasses"), 10, 1);
            add_action("admin_enqueue_scripts", array($this, "loadMasterPlugins"));
        }

        add_action("admin_enqueue_scripts", array($this, "loadDefaultPlugins"));

    }

    public function addPushedClasses($classes)
    {
        $classes .= "is_child_site";
        $pid = $_GET["post"];
        if (empty($pid)) {
            return $classes;
        }

        $isPushed = get_post_meta($pid, "mcc_copied", true);
        $isEditable = get_field("af_can_edit", $pid);
        $isHideable = get_field("af_can_hide", $pid);

        if (!$isPushed) {
            return $classes;
        }

        if ($isHideable) {
            $classes .= " hideable_post";
        }

        if ($isEditable) {
            $classes .= " editable_post";
        }

        return $classes . " pushed_post";
    }

    public function getMasterStatus()
    {
        $id = $_GET["pid"];

        $af_can_hide = get_field("af_can_hide", $id);
        $hide = get_field("hide", $id);
        $pushed = get_post_meta($id, "mcc_copied", true);

        die(json_encode(array(
            "pushed" => $pushed,
            "hide" => $hide,
            "af_can_hide" => $af_can_hide
        )));
    }

    public function addPushedColumn($cols)
    {
        $newcol = array("pushed" => "Källa");
        unset($cols["comments"]);

        $res = array_slice($cols, 0, 2) + $newcol + array_slice($cols, 3, count($cols) - 1, true);

        return $res;
    }

    public function populatePushedColumn($cols, $pid)
    {
        switch ($cols) {
            case "pushed" :
                $pushed = get_post_meta($pid, "mcc_copied", true);
                if ($pushed) {
                    echo "Pushad";
                } else {
                    echo "Lokalt skapad";
                }
        }
    }

    public function removeTrashButton($act, $post)
    {
        $pushed = get_post_meta($post->ID, "mcc_copied", true);
        if ($pushed) {
            unset($act["trash"]);
        }
        return $act;
    }

    public function addClasses($classes)
    {
        $classes .= "bbcms_master_site";
        return $classes;
    }

    public function addChildData()
    {
        $post_id = $_GET["post"];
        if (empty($post_id)) {
            return array();
        }
        $post_id = intval($post_id);

        $isPushed = get_post_meta($post_id, "mcc_copied", true);
        if (!$isPushed) {
            return array();
        }

        if (!file_exists(dirname(__FILE__) . "/plugins/hideables.json")) {
            return array();
        }

        $conf = json_decode(file_get_contents(dirname(__FILE__) . "/plugins/hideables.json"), true);

        $default_settings = $conf["default"];

        $hidden_on_master = get_master_field("hide", $post_id);

        if ($hidden_on_master) {
            $default_settings["disable"][] = "#acf-hide input";
        }

        $curPage = get_current_screen();
        $af_can_edit = get_field("af_can_edit", $post_id);
        if (!empty($conf[$curPage->post_type]) && $curPage->base == "post") {
            if ($af_can_edit) {
                return array_merge_recursive($default_settings, $conf[$curPage->post_type]["editable"]);
            }
            return array_merge_recursive($default_settings, $conf[$curPage->post_type]);
        }

        return array();
    }

    public function enqueueScripts()
    {
        wp_register_script("mb-child-js", $this->url . "js/child.js", array("jquery"), filemtime($this->path . "js/child.js"), true);
        wp_localize_script("mb-child-js", "hideables", $this->addChildData());
        wp_enqueue_script("mb-child-js");
    }

    public function loadChildPlugins()
    {
        $post_id = $_GET["post"];
        if (empty($post_id)) {
            return false;
        }
        $post_id = intval($post_id);

        $isPushed = get_post_meta($post_id, "mcc_copied", true);
        if (!$isPushed) {
            return false;
        }

        $js_args = array(
            "path" => dirname(__FILE__) . "/plugins/child/js/",
            "ext" => ".js",
            "url" => $this->url . "plugins/child/js/"
        );

        $css_args = array(
            "path" => dirname(__FILE__) . "/plugins/child/css/",
            "ext" => ".css",
            "url" => $this->url . "plugins/child/css/"
        );
        // Load js to run on child
        $this->loadFiles($js_args);
        // Load css to run on child
        $this->loadFiles($css_args);
    }

    public function loadMasterPlugins()
    {
        $args = array(
            "path" => dirname(__FILE__) . "/plugins/master/css/",
            "ext" => ".css",
            "url" => $this->url . "plugins/master/css/"
        );

        $this->loadFiles($args);
    }

    public function loadDefaultPlugins()
    {
        $css_args = array(
            "path" => dirname(__FILE__) . "/plugins/always/css/",
            "ext" => ".css",
            "url" => $this->url . "plugins/always/css/"
        );
        $this->loadFiles($css_args);

        $js_args = array(
            "path" => dirname(__FILE__) . "/plugins/always/js/",
            "ext" => ".js",
            "url" => $this->url . "plugins/always/js/"
        );
        $this->loadFiles($js_args);
    }

    protected function loadFiles($args = array())
    {
        if (empty($args)) {
            return false;
        }

        foreach (glob($args["path"] . "*" . $args["ext"]) as $file) {
            $filename = basename($file, $args["ext"]);
            $basename = basename($file);

            if ($args["ext"] == ".js") {
                wp_enqueue_script($filename, $args["url"] . $basename, array(), filemtime($file));
            } else if ($args["ext"] == ".css") {
                wp_enqueue_style($filename, $args["url"] . $basename, array(), filemtime($file));
            }
        }
    }
}

new ContentHide();

