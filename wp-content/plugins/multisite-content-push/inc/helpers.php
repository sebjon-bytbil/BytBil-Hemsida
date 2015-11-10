<?php

function mcp_get_model()
{
    return Multisite_Content_Push_Model::get_instance();
}

function mcp_get_push_model()
{
    return Multisite_Content_Push_Push_Model::get_instance();
}

function mcp_get_settings_handler()
{
    return Multisite_Content_Push_Settings_Handler::get_instance();
}

function mcp_get_settings()
{
    $settings_handler = mcp_get_settings_handler();
    return $settings_handler->get_settings();
}

function mcp_get_settings_slug()
{
    $settings_handler = mcp_get_settings_handler();
    return $settings_handler->get_settings_slug();
}

function mcp_get_default_settings()
{
    $settings_handler = mcp_get_settings_handler();
    return $settings_handler->get_default_settings();
}

function mcp_update_settings($new_settings)
{
    $settings_handler = mcp_get_settings_handler();
    return $settings_handler->update_settings($new_settings);
}

function mcp_add_error($id, $message)
{
    Multisite_Content_Push_Errors_Handler::add_error($id, $message);
}

function mcp_is_error()
{
    return Multisite_Content_Push_Errors_Handler::is_error();
}

function mcp_show_errors()
{
    Multisite_Content_Push_Errors_Handler::show_errors_notice();
}

function mcp_get_queue_for_blog($blog_id = 0)
{
    $model = mcp_get_model();

    if (!$blog_id)
        $blog_id = get_current_blog_id();

    //var_dump('blog_id:');
    //var_dump($blog_id);

    $results = $model->get_queued_elements_for_blog($blog_id);

    //var_dump($results);

    for ($i = 0; $i < count($results); $i++) {
        $results[$i]->settings = maybe_unserialize($results[$i]->settings);
    }

    return $results;
}

function mcp_get_groups_dropdown($selected = '')
{
    $model = mcp_get_model();
    $groups = $model->get_blogs_groups();
    ?>
    <option value=""><?php _e('Select a group', MULTISTE_CP_LANG_DOMAIN); ?></option>
    <?php foreach ($groups as $group): ?>
    <option value="<?php echo $group['ID']; ?>"><?php echo $group['group_name']; ?></option>
<?php endforeach; ?>
<?php
}

function mcp_get_additional_settings($type)
{
    return call_user_func('mcp_get_' . $type . '_additional_settings');
}

function mcp_get_post_additional_settings()
{
    $settings_handler = mcp_get_settings_handler();
    return $settings_handler->get_additional_settings('post');
}

function mcp_get_page_additional_settings()
{
    $settings_handler = mcp_get_settings_handler();
    return $settings_handler->get_additional_settings('page');
}

function mcp_get_cpt_additional_settings()
{
    $settings_handler = mcp_get_settings_handler();
    return $settings_handler->get_additional_settings('cpt');
}

function mcp_get_nbt_model()
{
    return Multisite_Content_Push_NBT_Model::get_instance();
}

function mcp_get_nbt_groups_dropdown($selected = '')
{
    if (!function_exists('nbt_get_model'))
        $groups = array();
    else {
        $model = nbt_get_model();
        $groups = $model->get_templates();
    }

    ?>
    <option value=""><?php _e('Select a group', MULTISTE_CP_LANG_DOMAIN); ?></option>
    <?php foreach ($groups as $group): ?>
    <option value="<?php echo $group['ID']; ?>"><?php echo $group['name']; ?></option>
<?php endforeach; ?>
<?php
}

function mcp_get_registered_cpts()
{
    // Get all post types
    $args = array(
        'publicly_queryable' => true
    );
    $post_types = get_post_types($args, 'object');
    unset($post_types['attachment']);
    unset($post_types['post']);

    return $post_types;
}