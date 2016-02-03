<?php /**
 * Plugin Name: BytBil content trash
 * Plugin URI:
 * Description: Hooks on to post trash and trashes all pushed childsite posts
 * Version: 2.0
 * Author: Leo Starcevic : Bytbil
 * Author URI: http://www.bytbil.com
 * License:
 */

$isMaster = (get_master_site_id() == get_current_blog_id());
if (!$isMaster) {
    add_filter("wp_trash_post", "maybe_prevent_trash");
    add_filter("before_delete_post", "maybe_prevent_trash");
} else {
    add_filter('wp_trash_post', 'apply_action_on_posts');
    add_filter('before_delete_post', 'apply_action_on_posts');
    add_filter('untrash_post', 'apply_action_on_posts');
}

function maybe_prevent_trash($post_id)
{
    $pushed = !!intval(get_post_meta($post_id, "mcc_copied", true));
    if ($pushed && !is_super_admin()) {
        wp_die("Du får inte göra detta.");
    } else {
        return $post_id;
    }
}

function get_child_sites()
{
    $sites = wp_get_sites();
    return $sites;
}

function apply_action_on_posts($post_id)
{

    if (!is_master()) {
        return $post_id;
    }

    $action = $_GET["action"];

    if ($action == "-1") {
        if (!empty($_GET["delete_all"])) {
            $action = "delete";
        }
    }

    $sites = get_child_sites();
    $post = get_post($post_id);

    $wp_action_post = "wp_" . $action . "_post";

    foreach ($sites as $site) {
        $switched = switch_to_blog($site['blog_id']);

        $posts = get_posts(array(
            "post_type" => $post->post_type,
            "posts_per_page" => -1,
            "post_status" => array(
                'publish',
                'pending',
                'draft',
                'auto-draft',
                'future',
                'private',
                'inherit',
                'trash'
            ),
            "meta_query" => array(
                array(
                    "key" => "mcc_orig_id",
                    "compare" => "==",
                    "value" => $post->ID
                )
            )
        ));
        foreach ($posts as $p) {
            $wp_action_post($p->ID);
        }
        $restored = restore_current_blog();
    }
    return $post_id;
}

?>