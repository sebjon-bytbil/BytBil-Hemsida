<?php

function bbcms_breadcrumbs($post, $params = array())
{
    $aid = $post->post_parent;

    $sitename = "";
    if (isset($params["show_sitename"]) && $params["show_sitename"]) {
        $sitename = "<a href='/'>" . get_bloginfo("name") . "</a> >";
    }

    if (!$aid) {
        return "<strong>Här är du:</strong> $sitename $post->post_title";
    } else {
        $output = "";
        while ($aid !== 0) {
            $parent = get_post($aid);
            $output = "<a href='" . get_permalink($parent->ID) . "'>" . $parent->post_title . "</a> > " . $output;

            $aid = $parent->post_parent;
        }

        return "<strong>Här är du:</strong> $sitename $output $post->post_title";
    }
}

