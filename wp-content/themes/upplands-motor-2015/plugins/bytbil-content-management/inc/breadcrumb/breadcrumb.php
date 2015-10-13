<?php
function get_the_breadcrumb()
{
    $delimiter = '<i class="fa fa-angle-right"></i>'; // delimiter between crumbs

    global $post;
    $string = '';
    $breadcrumb = '';

    $post_type = get_post_type();
    $breadcrumbs = array();

    if ($post_type == 'offer' || $post_type == 'news') {
        $post_type_object = get_post_type_object($post_type);
        $string .= $post_type_object->labels->name . ' ' . $delimiter . ' <strong>' . get_the_title() . '</strong>';
    } else {
        $parent_id = $post->post_parent;
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] .= get_the_title($page->ID);
            $parent_id = $page->post_parent;
        }

        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < sizeof($breadcrumbs); $i++) {
            $string .= $breadcrumbs[$i];
            if ($i != sizeof($breadcrumbs) - 1) $string .= ' ' . $delimiter . ' ';
        }
        $string .= ' ' . $delimiter . ' <strong>' . get_the_title() . '</strong>';
    }

    return $string;
}

?>