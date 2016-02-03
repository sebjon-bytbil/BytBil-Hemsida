<?php


function get_master_site_id()
{
    $mc = new MasterChild();
    return $mc->getMaster();
}

function switch_to_master()
{
    return switch_to_blog(get_master_site_id());
}

function restore_blog()
{
    return restore_current_blog();
}

function is_switched()
{
    return ms_is_switched();
}

function is_master()
{
    return get_master_site_id() == get_current_blog_id();
}

function maybe_in_array($arr1, $arr2)
{
    if (!is_array($arr1)) {
        $arr1 = array($arr1);
    }

    if (!is_array($arr2)) {
        $arr2 = array($arr2);
    }

    $result = array_intersect($arr1, $arr2);
    return !empty($result);
}

function maybe_get_local_id($pid)
{
    if ($pid == 0) {
        return false;
    }
    global $wp_post_types;
    $available_posttypes = array();

    foreach ($wp_post_types as $posttype) {
        if ($posttype->name != "revision" && $posttype->name != "nav_menu_item" && $posttype->name != "acf") {
            $available_posttypes[] = $posttype->name;
        }
    }

    $existing = get_posts(array(
        "post_type" => $available_posttypes,
        "posts_per_page" => -1,
        "meta_query" => array(
            array(
                "key" => "mcc_orig_id",
                "compare" => "==",
                "value" => $pid
            )
        )
    ));

    if (count($existing) == 1) {
        return $existing[0]->ID;
    } else {
        return 0;
    }
}

function get_master_field($key, $pid = false)
{
    global $post;
    if (!$pid) {
        $pid = $post->ID;
    }

    if (is_numeric($pid)) {
        $id = intval(get_post_meta($pid, "mcc_orig_id", true));
    } else {
        $id = $pid;
    }

    if (!$id) {
        return get_field($key, $pid);
    }

    $switch = switch_to_master();
    $field = get_field($key, $id);
    $restore = restore_blog();

    return $field;
}

function the_master_field($key, $pid = false)
{
    echo get_master_field($key, $pid);
}

function have_master_rows($key, $pid = false)
{
    global $post;
    if (!$pid) {
        $pid = $post->ID;
    }

    if (is_numeric($pid)) {
        $id = intval(get_post_meta($pid, "mcc_orig_id", true));
    } else {
        $id = $pid;
    }

    if (!$id) {
        return have_rows($key, $pid);
    }

    switch_to_master();
    $rows = have_rows($key, $pid);
    restore_blog();

    return $rows;
}

function get_local_url($master_url)
{
    if(is_master()){
        return $master_url;
    }

    $mid = url_to_postid($master_url);

    restore_blog();
    $exists = function_exists("maybe_get_local_id");
    $lpid = maybe_get_local_id($mid);
    $link = get_permalink($lpid);
    //$link = get_permalink($mid);
    if (!$link) {
        $link = false;
    }

    switch_to_master();
    return $link;
}

function preg_get_local_url($url)
{
    $path = preg_replace("/.*\/\/.*?(?=[\/])/", "", $url);

    return home_url() . $path;
}

function get_hidden_status($pid, $field_name)
{
    $acfarr = $GLOBALS["acf_field"];
    array_shift($acfarr);
    $str = "";

    restore_blog();
    $lpid = maybe_get_local_id($pid);


    foreach ($acfarr as $rep) {
        $str .= $rep["name"] . "_" . $rep["i"] . "_";
    }

    $str .= $field_name;

    $hidden = get_post_meta($lpid, $str, true);
    switch_to_master();
    return $hidden == 1;

}
