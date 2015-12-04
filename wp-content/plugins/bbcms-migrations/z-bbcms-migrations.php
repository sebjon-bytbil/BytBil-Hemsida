<?php

/*
 * Plugin Name: BytBil Migration Handler
 * Author: John Eriksson : Provide IT / Leo Starcevic : Bytbil
 */

class MigrationHandler
{

    // Constants
    const SLUG = "bbcms-migrations";
    const UV_SLUG = "update-values";
    const CF_SLUG = "change-field";
    const NAME = "BytBil Migrations Handler";
    const SUB_MENU_1 = "Update Field Values";
    const SUB_MENU_2 = "Change Field Names";

    public function __construct()
    {
        $this->current_blog = get_current_blog_id();
        // Add hooks
        add_action("network_admin_menu", array($this, "setupAdminPage"));
        add_action("admin_post_update-values-submit", array($this, "handlePost"));
        add_action("admin_post_change-field-submit", array($this, "handlePost"));
        add_action("admin_enqueue_scripts", array($this, "enqueueScripts"));

        add_action("wp_ajax_fetch-cpts", array($this, "fetchCpts"));
    }

    public function enqueueScripts()
    {
        wp_enqueue_style(self::SLUG, plugin_dir_url(__FILE__) . "style.css");
    }

    public function fetchCpts()
    {
        switch_to_blog(intval($_GET["blog"]));
        $post_types = $this->getAvailablePostTypes();
        switch_to_blog($this->current_blog);

        die(json_encode($post_types));
    }

    public function setupAdminPage()
    {
        add_menu_page(self::NAME, self::NAME, "manage_network", self::SLUG, array($this, "renderStartPage"));
        add_submenu_page(self::SLUG, self::SUB_MENU_1, self::SUB_MENU_1, "manage_network", self::UV_SLUG, array($this, "renderSubPage"));
        add_submenu_page(self::SLUG, self::SUB_MENU_2, self::SUB_MENU_2, "manage_network", self::CF_SLUG, array($this, "renderSubPage"));

    }

    public function renderStartPage()
    {
        require "views/start-page.php";
    }

    public function renderSubPage()
    {
        global $wpdb;
        $sub_page = $_GET["page"];

        $themes = wp_get_themes();
        $selected_theme = $_GET["theme"];

        if (!empty($selected_theme)) {
            $sites = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_blogs", array()));
            $current_blog = get_current_blog_id();
            $template_sites = array_filter($sites, function ($site) use ($selected_theme, $current_blog) {
                switch_to_blog($site->blog_id);
                $template = get_option("template", "");
                switch_to_blog($current_blog);
                return $template == $selected_theme;
            });
        } else {
            $template_sites = array();
        }

        if (is_array($template_sites)) {
            $blog = end($template_sites);
            $this->cptBlog = $blog->blog_id;
        }

        if (empty($blog)) {
            $blog = new stdClass();
            $blog->blog_id = get_current_blog_id();
        }

        // Fetch Ops
        $handled = $_GET;
        unset($handled["theme"]);
        unset($handled["page"]);

        if ($sub_page == "update-values") {
            require "views/update-values-page.php";
        } else if ($sub_page == "change-field") {
            require "views/change-fields-page.php";
        }
    }

    public function getAvailablePostTypes()
    {
        global $wpdb;
        $query = sprintf("SELECT post_type FROM $wpdb->posts WHERE post_type NOT IN ('%s', '%s', '%s', '%s') GROUP BY post_type", "nav_menu_item", "revision", "wpcf7_contact_form", "acf");
        $post_types = $wpdb->get_results($query);

        $returns = array();
        foreach ($post_types as $post_type) {
            $returns[] = $post_type->post_type;
        }

        return $returns;
    }

    public function updateField($data)
    {
        $msg = array();
        /* check if noop */
        $noop = false;
        if ($data["noop"] == "1") {
            $noop = true;
            $msg[] = sprintf("NOOP: Inga ändringar kommer göras");
        }

        $post_type = $data["field-posttype"];
        $posts = get_posts(array(
            "post_type" => $post_type,
            "posts_per_page" => -1
        ));

        $msg[] = sprintf("Hittade %d poster att uppdatera", count($posts));

        foreach ($posts as $post) {
            $obj = get_post_meta($post->ID, $data["field-name"], true);

            if ($data["action"] == "change-field-submit") {
                $field_key = $data["new-field-name"];
                $value = $obj;

            } else if ($data["action"] == "update-values-submit") {
                $field_key = $data["field-name"];
                $value = $data["field-value"];
            }

            if (is_array($obj)) {
                if (!in_array($data["field-value"], $obj)) {
                    $msg[] = sprintf("Lägger till '%s' för '%s'", $data["field-value"], $data["field-name"]);
                    if (!$noop) {
                        update_field($field_key, $value, $post->ID);
                    }
                } else {
                    $msg[] = sprintf("Värdet '%s' finns redan aktiverat", $data["field-value"]);
                }
            } else if (!!$obj) {
                $msg[] = sprintf("Uppdaterar fält '%s'", $data["field-name"]);
                if (!$noop) {
                    update_field($field_key, $value, $post->ID);
                }
            } else {
                $msg[] = sprintf("Kan ej hitta fält %s", $data["field-name"]);
            }
        }

        return $msg;
    }

    public function handlePost()
    {
        $data = json_decode(json_encode($_POST), true);
        $sites = $data["sites"];
        $status = array();

        foreach ($sites as $site) {
            $sid = intval($site);
            switch_to_blog($sid);
            $messages = $this->updateField($data);
            $status[get_bloginfo("name")] = $messages;
            restore_current_blog();
        }

        $data = http_build_query($status);

        wp_redirect($_SERVER["HTTP_REFERER"] . "&" . $data);
        exit();
    }
}

new MigrationHandler();