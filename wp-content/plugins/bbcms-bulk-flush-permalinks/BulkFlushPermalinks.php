<?php

/*
 * Plugin Name: BytBil Flush Permalinks
 * */

class BulkFlushPermalinks
{
    const SLUG = "bulk-flush-permalinks";
    const NAME = "Bulk Flush Permalinks";

    public function __construct()
    {
        // Hooks
        add_action("network_admin_menu", array($this, "setupMenu"));
        add_action("admin_post_bbcms-flush-permalinks", array($this, "addToQueue"));
    }

    public function addToQueue()
    {
        $blogs = wp_get_sites();
        $queued = array();

        foreach ($blogs as $blog) {
            switch_to_blog($blog["blog_id"]);
            update_option("run_perma_flush", true);
            $queued[] = $blog["domain"];
            restore_current_blog();
        }

        $new_url = add_query_arg(array(
            "flushed" => "1",
            "queued" => $queued,
        ), $_SERVER["HTTP_REFERER"]);
        wp_redirect($new_url);
    }

    public function setupMenu()
    {
        add_menu_page(self::NAME, self::NAME, "manage_network", self::SLUG, array($this, "renderAdminPage"));
    }

    public function renderAdminPage()
    {
        include(dirname(__FILE__) . "/admin.php");
    }
}

new BulkFlushPermalinks();
