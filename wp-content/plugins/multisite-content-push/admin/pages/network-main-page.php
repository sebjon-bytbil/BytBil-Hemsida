<?php

require_once(MULTISTE_CP_INCLUDES_DIR . 'wizard.php');


class Multisite_Content_Push_Network_Main_Menu extends Multisite_Content_Push_Admin_Page
{

    private $wizard = null;

    public function __construct($menu_slug, $capability, $args)
    {
        parent::__construct($menu_slug, $capability, $args);

        add_action('admin_init', array(&$this, 'init_wizard'), 10);
        add_action('admin_init', array(&$this, 'validate_form'));


        add_action('admin_enqueue_scripts', array($this, 'add_javascript'));
        add_action('admin_enqueue_scripts', array($this, 'add_styles'));


        add_action('wp_ajax_mcp_retrieve_single_post_data', array(&$this, 'retrieve_single_post_data'));
        add_action('wp_ajax_mcp_retrieve_single_blog_data', array(&$this, 'retrieve_single_blog_data'));
        add_action('wp_ajax_mcp_retrieve_single_user_data', array(&$this, 'retrieve_single_user_data'));
        add_action('wp_ajax_mcp_retrieve_cpt_selectors_data', array(&$this, 'retrieve_cpt_selectors_data'));
        add_action('wp_ajax_mcp_retrieve_cpt_custom_selector_data', array(&$this, 'retrieve_cpt_custom_selector_data'));
        add_action('wp_ajax_mcp_remove_item_id_from_list', array(&$this, 'remove_item_id_from_list'));
    }

    public function wizard_start()
    {
        $wizard_steps = array('1', '2', '3', '4', '5', '6');
        $this->wizard = new MCP_Wizard(
            $wizard_steps,
            $this->get_permalink()
        );
    }

    public function init_wizard()
    {

        if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] != $this->get_menu_slug()))
            return;

        $this->wizard_start();

        $action = $this->wizard->get_value('mcp_action');

        if ($this->wizard->get_current_step() != '1' && empty($action)) {
            $this->wizard->go_to_step('1');
        }


        if (isset($_GET['mcp_action']) && 'mcp_submit_metabox' == $_GET['mcp_action'] && wp_verify_nonce($_GET['_wpnonce'], 'mcp_submit_meta_box')) {
            // The user has submitted the meta box in the post editor

            $content_blog_id = absint($_GET['content_blog']);
            if (!get_blog_details($content_blog_id))
                return false;

            $src_post_id = absint($_GET['post_id']);
            if (!$post = get_blog_post($content_blog_id, $src_post_id))
                return false;

            // Post type
            if ('post' == $post->post_type) {
                $action = 'add-post';
                $additional_options = mcp_get_post_additional_settings();
            } elseif ('page' == $post->post_type) {
                $action = 'add-page';
                $additional_options = mcp_get_page_additional_settings();
            } else {
                // Custom Post Type
                if ($post->post_type == 'attachment')
                    return false;

                $action = 'add-cpt';
                $cpt = $post->post_type;
                $additional_options = mcp_get_cpt_additional_settings();
            }

            // Additional settings
            $settings = array();
            foreach ($additional_options as $option_slug => $label) {
                if (isset($_GET[$option_slug]))
                    $settings[$option_slug] = true;
            }

            // Group, NBT Group or all?
            if (!in_array($_GET['dest_blog_type'], array('group', 'all', 'nbt_group')))
                return false;

            /// Resetting the wizard and redirecting
            $this->wizard->clean();
            $this->wizard_start();

            $dest_blog_type = $_GET['dest_blog_type'];
            $model = mcp_get_model();
            $nbt_model = mcp_get_nbt_model();
            if ($dest_blog_type == 'group' && !$model->is_group(absint($_GET['group']))) {
                return false;
            } elseif ($dest_blog_type == 'group') {
                // If is a group, we'll need the blogs IDs
                $group = absint($_GET['group']);
                $blogs = $model->get_blogs_from_group($group);

                if (empty($blogs))
                    return false;

                $ids = array();
                foreach ($blogs as $blog) {
                    $ids[] = $blog->blog_id;
                }

                $this->wizard->set_value('dest_blogs_ids', $ids);
            } elseif ($dest_blog_type == 'nbt_group' && !$nbt_model->is_template(absint($_GET['nbt_group']))) {
                return false;
            } elseif ($dest_blog_type == 'nbt_group') {
                // If is a NBT group, we'll need the blogs IDs
                $template = absint($_GET['nbt_group']);
                $blogs = $nbt_model->get_template_blogs($template);

                if (empty($blogs))
                    return false;

                $ids = array();
                foreach ($blogs as $blog) {
                    $ids[] = $blog->blog_id;
                }

                $this->wizard->set_value('dest_blogs_ids', $ids);

            }

            $dest_blogs = (isset($_GET['dest_blogs'])) ? $_GET['dest_blogs'] : "";
            $this->wizard->set_value('dest_blogs_ids', explode(",", $dest_blogs));

            $push_menu = (isset($_GET['push_menu'])) ? $_GET['push_menu'] : false;
            $this->wizard->set_value('push_menu', $push_menu);

            $this->wizard->set_value('mcp_action', $action);
            if ('cpt' == $action)
                $this->wizard->set_value('cpt', $cpt);

            $this->wizard->set_value('content_blog_id', $content_blog_id);
            $this->wizard->set_value('dest_blog_type', $dest_blog_type);
            $this->wizard->set_value('settings', $settings);
            $this->wizard->set_value('posts_ids', array($src_post_id));

            if ($redirect = wp_get_referer())
                $this->wizard->set_value('redirect_to', $redirect);

            $this->wizard->debug();

            $this->wizard->go_to_step('5');

        }

    }


    public function add_javascript()
    {
        if (get_current_screen()->id == $this->page_id . '-network') {

            if (2 == $this->wizard->get_current_step() || 3 == $this->wizard->get_current_step() || 4 == $this->wizard->get_current_step()) {
                wp_enqueue_script('mcp-wizard-js', MULTISTE_CP_ASSETS_URL . 'js/wizard.js', array('jquery'), '20131128');
                wp_enqueue_script('mcp-autocomplete', MULTISTE_CP_ASSETS_URL . 'js/autocomplete.js', array('jquery'));
                wp_enqueue_script('jquery-ui-autocomplete');
                wp_enqueue_style('mcp-jquery-ui-styles', MULTISTE_CP_ASSETS_URL . 'css/jquery-ui.css');

                $l10n = array(
                    'blog_not_found' => __('The blog ID does not exist. Try again.', MULTISTE_CP_LANG_DOMAIN),
                    'select_a_blog_id' => __('You need to select a blog ID', MULTISTE_CP_LANG_DOMAIN)
                );
                wp_localize_script('mcp-wizard-js', 'captions', $l10n);
            }
            if (5 == $this->wizard->get_current_step()) {
                wp_enqueue_script('jquery-ui-progressbar', MULTISTE_CP_ASSETS_URL . 'jquery-ui/jquery.ui.progressbar.js', array('jquery-ui-core', 'jquery-ui-widget'));
            }
        }
    }

    public function add_styles()
    {
        if (get_current_screen()->id == $this->page_id . '-network') {
            wp_enqueue_style('mcp-wizard-css', MULTISTE_CP_ASSETS_URL . 'css/wizard.css', '20131128');

            if (5 == $this->wizard->get_current_step()) {
                wp_enqueue_style('jquery-ui-batchcreate', MULTISTE_CP_ASSETS_URL . 'jquery-ui/jquery-ui-1.10.3.custom.min.css', array());
            }
        }

    }


    public function retrieve_single_post_data()
    {
        if (!is_array($_POST['post_ids'])) {
            die();
        }

        $this->wizard_start();
        $current_posts = $this->wizard->get_value('posts_ids', array());

        $blog_id = absint($_POST['blog_id']);
        $post_ids = $_POST['post_ids'];


        $returning = '';
        foreach ($post_ids as $post_id) {
            $post = get_blog_post($blog_id, absint($post_id));
            if (!empty($post)) {
                $returning .= $this->get_row_list('post', $post->ID, $post->post_title);
                $current_posts[] = $post->ID;
            }
        }

        $current_posts = $this->wizard->set_value('posts_ids', $current_posts);

        echo $returning;

        die();

    }

    public function retrieve_single_blog_data()
    {
        $blog_id = absint($_POST['blog_id']);

        $details = get_blog_details($blog_id);

        $returning = '';
        if (!empty($details)) {
            $returning .= $this->get_row_list('blog', $blog_id, $details->blogname);
        }

        echo $returning;

        die();

    }

    public function retrieve_single_user_data()
    {
        if (!is_array($_POST['user_ids'])) {
            die();
        }


        $this->wizard_start();

        $returning = '';
        $current_users = $this->wizard->get_value('posts_ids', array());
        if (!is_array($current_users))
            $current_users = array();

        foreach ($_POST['user_ids'] as $user_id) {
            $details = get_userdata($user_id);
            if (!empty($details)) {
                $returning .= $this->get_row_list('user', $details->data->ID, $details->data->user_login);
                $current_users[] = $details->data->ID;
            }
        }

        $this->wizard->set_value('posts_ids', $current_users);

        echo $returning;

        die();

    }

    public function retrieve_cpt_selectors_data()
    {
        $blog_id = absint($_POST['blog_id']);

        switch_to_blog($blog_id);
        $post_types = mcp_get_registered_cpts();
        if (empty($post_types)) {
            echo '<li>' . __('There are no custom posts registered for that blog', MULTISTE_CP_LANG_DOMAIN) . '</li>';
            die();
        }


        $returning = '';
        foreach ($post_types as $post_type) {
            $selected = false;
            $returning .= $this->get_row_cpt_selector_list($post_type->name, $post_type->label, $selected);
        }

        restore_current_blog();

        echo $returning;
        die();
    }

    public function retrieve_cpt_custom_selector_data()
    {
        $blog_id = absint($_POST['blog_id']);

        $returning = '';
        $returning .= $this->get_row_cpt_selector_list('custom', '', false, true);

        echo $returning;
        die();
    }

    public function remove_item_id_from_list()
    {
        if (empty($_POST['item_id'])) {
            die();
        }

        $item_id = absint($_POST['item_id']);

        $this->wizard_start();
        $current_items = $this->wizard->get_value('posts_ids', array());

        $key = array_search($item_id, $current_items);

        if ($key !== false) {
            unset($current_items[$key]);
        }

        $this->wizard->set_value('posts_ids', $current_items);

        die();
    }


    public function render_content()
    {
        $step = $this->wizard->get_current_step();
        $this->render_before_step();

        call_user_func(array(&$this, 'render_step_' . $step));
        $this->render_after_step();
    }

    public function render_before_step()
    {
        mcp_show_errors();
        ?>
        <div class="welcome-panel" id="mcp-panel">

        <div class="welcome-panel-content">
        <div class="mcp-wizard-breadcrumbs">
            <ul>
                <li class="first <?php $this->wizard->breadcrumb_class(1); ?>">
                    <a <?php echo $this->wizard->get_breadcrumb_href(1); ?>><span
                            class="badge">1</span> <?php _e('Select Action', MULTISTE_CP_LANG_DOMAIN); ?></a></li>
                <li class="<?php $this->wizard->breadcrumb_class(2); ?>">
                    <a <?php echo $this->wizard->get_breadcrumb_href(2); ?>><span
                            class="badge">2</span> <?php _e('Select Source', MULTISTE_CP_LANG_DOMAIN); ?></a></li>
                <li class="<?php $this->wizard->breadcrumb_class(3); ?>">
                    <a <?php echo $this->wizard->get_breadcrumb_href(3); ?>><span
                            class="badge">3</span> <?php _e('Select Items', MULTISTE_CP_LANG_DOMAIN); ?></a></li>
                <li class="<?php $this->wizard->breadcrumb_class(4); ?>">
                    <a <?php echo $this->wizard->get_breadcrumb_href(4); ?>><span
                            class="badge">4</span> <?php _e('Select Destinations', MULTISTE_CP_LANG_DOMAIN); ?></a></li>
                <li class="last <?php $this->wizard->breadcrumb_class(5); ?>">
                    <a <?php echo $this->wizard->get_breadcrumb_href(5); ?>><span
                            class="badge">5</span> <?php _e('Finish', MULTISTE_CP_LANG_DOMAIN); ?></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    <?php
    }

    public function render_after_step()
    {
        ?>
        </div>
        </div>
    <?php
    }


    private function render_step_1()
    {

        $current_action = $this->wizard->get_value('mcp_action');
        ?>
        <h3><?php _e('Select the type of content that you would like to push.', MULTISTE_CP_LANG_DOMAIN); ?></h3>
        <form action="" method="post" name="wizardform" id="wizardform">
            <?php wp_nonce_field('step_1'); ?>
            <ul class="wizardoptions">
                <li><label><input type="radio" name="mcp_action"
                                  value="add-page" <?php checked($current_action == 'add-page' || empty($current_action)); ?>> <?php _e('Pages', MULTISTE_CP_LANG_DOMAIN); ?>
                    </label></li>
                <li><label><input type="radio" name="mcp_action"
                                  value="add-post" <?php checked($current_action == 'add-post'); ?>> <?php _e('Posts', MULTISTE_CP_LANG_DOMAIN); ?>
                    </label></li>
                <li><label><input type="radio" name="mcp_action"
                                  value="add-cpt" <?php checked($current_action == 'add-cpt'); ?>> <?php _e('Custom Post Type (products, events...)', MULTISTE_CP_LANG_DOMAIN); ?>
                    </label></li>
                <li><label><input type="radio" name="mcp_action"
                                  value="add-user" <?php checked($current_action == 'add-user'); ?>> <?php _e('Users', MULTISTE_CP_LANG_DOMAIN); ?>
                    </label></li>
                <li><label><input type="radio" name="mcp_action"
                                  value="activate-plugin" <?php checked($current_action == 'activate-plugin'); ?>> <?php _e('Activate plugins', MULTISTE_CP_LANG_DOMAIN); ?>
                    </label></li>
            </ul>
            <p class="submit">
                <input type="submit" name="submit_step_1" class="button button-primary button-hero alignleft"
                       value="<?php _e('Next Step &raquo;', MULTISTE_CP_LANG_DOMAIN); ?>">
            </p>
        </form>
    <?php
    }

    private function render_step_2()
    {
        $current_action = $this->wizard->get_value('mcp_action');
        ?>
        <form action="" method="post">
            <?php wp_nonce_field('step_2'); ?>
            <?php
            switch ($current_action) {
                case 'add-page':
                case 'add-user':
                case 'add-post':
                case 'add-cpt': {
                    $this->render_blog_selector($current_action);
                    break;
                }

            }
            ?>
            <p class="submit">
                <input type="submit" name="submit_step_2" class="button button-primary button-hero alignleft"
                       value="<?php _e('Next Step &raquo;', MULTISTE_CP_LANG_DOMAIN); ?>">
            </p>
        </form>
    <?php
    }

    private function render_blog_selector($current_action)
    {
        $content_blog_id = $this->wizard->get_value('content_blog_id');
        $ajax_url = '';
        if (!empty($content_blog_id)) {
            $ajax_url = get_admin_url(absint($this->wizard->get_value('content_blog_id')), $path = 'admin-ajax.php');
        }
        ?>
        <?php if ('add-page' == $current_action): ?>
        <h3><?php _e('Enter the id or URL of the site containing the pages you wish to push', MULTISTE_CP_LANG_DOMAIN); ?></h3>
        <br/>
    <?php elseif ('add-post' == $current_action): ?>
        <h3><?php _e('Enter the id or URL of the site containing the post you wish to push', MULTISTE_CP_LANG_DOMAIN); ?></h3>
        <br/>
    <?php elseif ('add-cpt' == $current_action): ?>
        <h3><?php _e('Enter the id or URL of the site containing the custom post types you wish to push', MULTISTE_CP_LANG_DOMAIN); ?></h3>
        <br/>
    <?php elseif ('add-user' == $current_action): ?>
        <h3><?php _e('Enter the id or URL of the site containing the users you wish to push', MULTISTE_CP_LANG_DOMAIN); ?></h3>
        <br/>
    <?php endif; ?>
			<input name="blog_id" type="text" id="blog_id" size="6" value="<?php echo $content_blog_id; ?>" placeholder="<?php _e('Blog ID', MULTISTE_CP_LANG_DOMAIN); ?>"/>
			<input type="hidden" name="blog_ajax_url" id="blog_ajax_url" value="<?php echo esc_url($ajax_url); ?>">
            <div style="display:inline-block"class="ui-widget">
                <label for="search_for_blog"> <?php _e('Or search by site URL', MULTISTE_CP_LANG_DOMAIN); ?>
					<input type="text" id="autocomplete"  data-type="sites" class="medium-text">
					<span class="description"><?php _e('Enter either the subdomain or the sub-folder, ie. for mysite.mydomain.com or mydomain.com/mysite, type "mysite"', MULTISTE_CP_LANG_DOMAIN); ?></span>
                </label>
            </div>

            <?php if ('add-cpt' == $this->wizard->get_value('mcp_action')): ?>
	            <p class="submit">
	            	<div class="alignleft">
	            		<?php submit_button(__('Refresh post types', MULTISTE_CP_ADMIN_DIR), 'secondary', 'mcp-refresh-cpts', false, array('id' => 'mcp-refresh-post-types')); ?>
	            	</div>
	            	<div class="alignleft">
	            		<span class="spinner"></span>
	            	</div>
	            	<div style="clear:both"></div>
	            </p>
            	<div id="mcp-cpt-list-wrap">
            		<ul>

 					</ul>
 				</div>
 				<script>
 					jQuery(document).ready(function($) {
 						//$('#mcp-refresh-post-types').trigger('click');
 					});
 				</script>

        	<?php endif; ?>

    <?php
    }


    private function render_step_3()
    {
        $current_action = $this->wizard->get_value('mcp_action');
        $content_blog_id = $this->wizard->get_value('content_blog_id');
        ?>
        <form action="" method="post">
            <?php wp_nonce_field('step_3'); ?>
            <?php
            switch ($current_action) {
                case 'add-page': {
                    $this->render_post_selector($content_blog_id, 'page');
                    break;
                }
                case 'add-post': {
                    $this->render_post_selector($content_blog_id, 'post');
                    break;
                }
                case 'add-cpt': {
                    $this->render_post_selector($content_blog_id, 'cpt');
                    break;
                }
                case 'activate-plugin': {
                    $this->render_plugin_selector();
                    break;
                }
                case 'add-user': {
                    $this->render_user_selector($content_blog_id);
                    break;
                }

            }
            ?>
            <p class="submit">
                <input type="submit" name="submit_step_3" class="button button-primary button-hero alignleft"
                       value="<?php _e('Next Step &raquo;', MULTISTE_CP_LANG_DOMAIN); ?>">
            </p>
        </form>
    <?php
    }


    private function render_post_selector($blog_id, $type)
    {

        if ('cpt' == $type)
            $cpt = $this->wizard->get_value('cpt');
        else
            $cpt = $type;

        $current_selected_settings = $this->wizard->get_value('settings');
        if (!is_array($current_selected_settings))
            $current_selected_settings = array();

        $current_posts_ids = $this->wizard->get_value('posts_ids');
        $posts_list = '';
        if (!is_array($current_posts_ids)) {
            $current_posts_ids = array();
            ?>
            <script>
                var current_posts = [];
            </script>
        <?php
        } else {
            $posts_ids_list = array();
            foreach ($current_posts_ids as $post_id) {
                $post = get_blog_post($this->wizard->get_value('content_blog_id'), $post_id);
                if ($post->post_type == $cpt && !in_array($post->ID, $posts_ids_list)) {
                    $posts_list .= $this->get_row_list('post', $post->ID, $post->post_title);
                    $posts_ids_list[] = $post_id;
                }
            }
            ?>
            <script>
                var current_posts = [<?php echo implode( ',', $posts_ids_list ); ?>];
            </script>
        <?php
        }

        require_once(MULTISTE_CP_ADMIN_DIR . 'tables/network-posts-list.php');
        $args = array(
            'blog_id' => $this->wizard->get_value('content_blog_id'),
            'post_type' => $cpt,
            'selected' => is_array($current_posts_ids) ? $current_posts_ids : array()
        );
        $posts_table = new MCP_Posts_List_Table($args);
        $posts_table->prepare_items();


        ?>

        <h3><?php _e('Select the items that you would like to push.', MULTISTE_CP_LANG_DOMAIN); ?></h3>
        <p class="about-description">
            <?php _e('Check the items in the list that you would like to push and click on Add itmes to list. Selected items appear below this message.', MULTISTE_CP_LANG_DOMAIN); ?>
        </p>

        <ul id="posts-list">
            <?php echo $posts_list; ?>
        </ul>

        <div class="alignleft" style="width:35%;">
            <h3><?php _e('Additional Options', MULTISTE_CP_LANG_DOMAIN); ?></h3>
            <?php $options = mcp_get_additional_settings($type); ?>
            <ul>
                <?php foreach ($options as $option_slug => $label): ?>
                    <li><label><input type="checkbox"
                                      name="settings[<?php echo $option_slug; ?>]" <?php checked(array_key_exists($option_slug, $current_selected_settings)); ?>> <?php echo $label; ?>
                        </label></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="alignright" id="mcp-posts-list" style="width:60%;">
            <input type="hidden" id="src_blog_id" name="src_blog_id" value="<?php echo $blog_id; ?>">
            <?php $posts_table->search_box(__('Search', INCSUB_SBE_LANG_DOMAIN), 'search'); ?><br/><br/>
            <?php $posts_table->display(); ?>
        </div>
        <div class="clear"></div>
    <?php
    }

    private function render_plugin_selector()
    {
        $current_selected_plugins = $this->wizard->get_value('plugins');

        require_once(MULTISTE_CP_ADMIN_DIR . 'tables/network-plugins-list.php');
        $table = new MCP_Plugins_List_Table();
        $table->prepare_items($current_selected_plugins);

        if (!is_array($current_selected_plugins))
            $current_selected_plugins = array();

        ?>
        <h3><?php _e('Select the plugins you want to activate', MULTISTE_CP_LANG_DOMAIN); ?></h3>
        <p><?php _e('Network only or already network activated plugins are not displayed in the list', MULTISTE_CP_LANG_DOMAIN); ?>

        <?php $table->display();
    }

    private function render_user_selector($blog_id)
    {
        $current_selected_settings = $this->wizard->get_value('settings');
        if (!is_array($current_selected_settings))
            $current_selected_settings = array();

        $current_users_ids = $this->wizard->get_value('posts_ids', array());
        $users_list = '';
        if (empty($current_users_ids)) {
            $current_users_ids = array();
            ?>
            <script>
                var current_users = [];
            </script>
        <?php
        }
        else {
        $users_ids_list = array();
        foreach ($current_users_ids as $user_id) {
            $user = get_userdata($user_id);

            if (!empty($user)) {
                $users_list .= $this->get_row_list('user', $user->data->ID, $user->data->user_login);
                $users_ids_list[] = $user->data->ID;
            }

        }
        ?>
            <script>
                var current_users = [<?php echo implode( ',', $users_ids_list ); ?>];
            </script>
        <?php
        }

        $user_selection = $this->wizard->get_value('users_selection');
        if (empty($user_selection))
            $user_selection = 'ids';

        require_once(MULTISTE_CP_ADMIN_DIR . 'tables/network-users-list.php');
        $args = array(
            'blog_id' => $this->wizard->get_value('content_blog_id'),
            'selected' => is_array($current_users_ids) ? $current_users_ids : array(),
            'enabled' => ($user_selection == 'ids')
        );
        $users_table = new MCP_Users_List_Table($args);
        $users_table->prepare_items();


        ?>
        <ul id="users-list">
            <?php echo $users_list; ?>
        </ul>

        <h3><?php _e('Select users to push', MULTISTE_CP_LANG_DOMAIN); ?></h3><br/>
        <p class="about-description">
            <?php _e('If you are not pushing all users, then check the users in the list that you would like to push, select Add To List and click on Apply. Selected users appear below this message.', MULTISTE_CP_LANG_DOMAIN); ?>
        </p>

        <div class="alignleft" style="width:35%;">
            <h3><?php _e('Add Users', MULTISTE_CP_LANG_DOMAIN); ?></h3><br/>
            <label>
                <input type="radio" name="users_selection" <?php checked($user_selection == 'all'); ?>
                       value="all"/> <?php _e('All users', MULTISTE_CP_LANG_DOMAIN); ?>
            </label><br/><br/>

            <label>
                <input type="radio" name="users_selection" <?php checked($user_selection == 'ids'); ?>
                       value="ids"> <?php _e('Selected users', MULTISTE_CP_LANG_DOMAIN); ?>
            </label>
        </div>
        <div class="alignright" id="mcp-users-list" style="width:60%;">
            <input type="hidden" id="src_blog_id" name="src_blog_id" value="<?php echo $blog_id; ?>">
            <?php $users_table->search_box(__('Search', INCSUB_SBE_LANG_DOMAIN), 'search'); ?><br/><br/>
            <?php $users_table->display(); ?>
        </div>
        <div class="clear"></div>

    <?php
    }


    private function render_step_4()
    {
        ?>
        <form action="" method="post">
            <h3><?php _e('Select the destination sites', MULTISTE_CP_LANG_DOMAIN); ?></h3>
            <?php wp_nonce_field('step_4'); ?>

            <?php if ($this->wizard->get_value('mcp_action') !== 'activate-plugin'): ?>
                <p>
                    <label>
                        <input type="radio" name="dest_blog_type" id="dest_blog_type_all"
                               value="all" <?php checked($this->wizard->get_value('dest_blog_type'), 'all'); ?>>
                        <?php _e('All Sites', MULTISTE_CP_LANG_DOMAIN); ?>
                    </label>
                </p>
            <?php endif; ?>
            <p>
                <label>
                    <input type="radio" name="dest_blog_type" id="dest_blog_type_list"
                           value="list" <?php checked($this->wizard->get_value('dest_blog_type'), 'list'); ?>>
                    <?php _e('Single Site', MULTISTE_CP_LANG_DOMAIN); ?>
                </label>
            </p>

            <div id="blogs-list-wrap">
                <input name="blog_id" type="text" id="blog_id" size="6" style="float: left; margin-right: 10px;"
                       placeholder="<?php _e('Site ID', MULTISTE_CP_LANG_DOMAIN); ?>"/>

                <div style="display:inline-block" class="ui-widget">
                    <label for="search_for_blog"> <?php _e('Or search by site URL', MULTISTE_CP_LANG_DOMAIN); ?>
                        <input type="text" id="autocomplete" data-type="sites" class="medium-text">
                        <span class="spinner"></span> <input type="button" class="button-secondary" name="add-blog"
                                                             id="add-blog"
                                                             value="<?php _e('Add Site', MULTISTE_CP_LANG_DOMAIN); ?>"></input>
                    </label>
                </div>
                <div class="clear"></div>
                <div id="blogs-list">
                    <?php
                    $blogs_ids = $this->wizard->get_value('dest_blogs_ids');
                    if (!empty($blogs_ids) && is_array($blogs_ids)) {
                        foreach ($blogs_ids as $blog_id) {
                            $blog_details = get_blog_details($blog_id);
                            if (!empty($blog_details))
                                echo $this->get_row_list('blog', $blog_id, $blog_details->blogname);
                        }
                    }
                    ?>

                </div>
            </div>

            <p>
                <label>
                    <input type="radio" name="dest_blog_type" id="dest_blog_type_group"
                           value="group" <?php checked($this->wizard->get_value('dest_blog_type'), 'group'); ?>>
                    <?php _e('Site Group', MULTISTE_CP_LANG_DOMAIN); ?>
                </label>
            </p>
            <select name="group" id="dest_blog_type_group_selector">
                <?php mcp_get_groups_dropdown(); ?>
            </select>

            <?php $settings = mcp_get_settings(); ?>
            <?php if ($settings['blog_templates_integration']): ?>
                <p>
                    <label>
                        <input type="radio" name="dest_blog_type" id="dest_blog_type_nbt_group"
                               value="nbt_group" <?php checked($this->wizard->get_value('dest_blog_type'), 'nbt_group'); ?>>
                        <?php _e('Select by Blog Templates groups', MULTISTE_CP_LANG_DOMAIN); ?>
                    </label>
                </p>
                <select name="nbt_group" id="dest_blog_type_nbt_group_selector">
                    <?php mcp_get_nbt_groups_dropdown(); ?>
                </select>
            <?php endif; ?>

            <p class="submit">
                <input type="submit" name="submit_step_4" class="button button-primary button-hero alignleft"
                       value="<?php _e('Next Step &raquo;', MULTISTE_CP_LANG_DOMAIN); ?>">
            </p>
        </form>
    <?php

    }

    /**
     * Gets a row to show an item in a list of posts/users selected
     *
     * @param String $slug Slug of the item
     * @param Integer $id Item ID
     * @param String $title Label
     * @return HTML result
     */
    public function get_row_list($slug, $id, $title)
    {
        ob_start();
        ?>
        <li id="<?php echo $slug; ?>-<?php echo $id; ?>">
            <span class="remove-box"><a class="mcp-remove-<?php echo $slug; ?>" href=""
                                        data-<?php echo $slug; ?>-id="<?php echo $id; ?>">Remove</a></span>
            <span class="id-box"><?php echo $id; ?></span> <span class="title-box"><?php echo $title; ?></span>
            <input type="hidden" name="<?php echo $slug; ?>s_ids[]" value="<?php echo $id; ?>"></input>
        </li>
        <?php
        return ob_get_clean();
    }

    /**
     * Displays a radio button for Custom Post Type selection
     *
     * @param String $id Normally, the CPT slug
     * @param String $title Label for the radio
     * @param Boolean $selected if selected or not
     * @return HTML result
     */
    public function get_row_cpt_selector_list($id, $title, $selected = false, $custom = false)
    {
        ob_start();
        ?>
        <li id="cpt-<?php echo $id; ?>">
            <?php if (!$custom): ?>
                <label><input type="radio" name="mcp_cpt"
                              value="<?php echo $id; ?>" <?php checked($selected); ?>> <?php echo $title; ?></label>
            <?php else: ?>
                <label for="mcp_cpt_custom">
                    <input type="radio" id="mcp_cpt_custom" name="mcp_cpt" value="custom" <?php checked($selected); ?>>
                    <input type="text" name="mcp_cpt_slug" id="mcp_cpt_slug" value="">
                    <?php echo $title; ?><br/>
                    <span
                        class="description"><?php _e('Or insert the slug of your Custom Post Type here if you don\'t see it in the list', MULTISTE_CP_LANG_DOMAIN); ?></span>
                </label>
                <script>
                    jQuery(document).ready(function ($) {
                        $('#mcp_cpt_slug').click(function () {
                            $('#mcp_cpt_custom').attr('checked', true);
                        });
                    });
                </script>
            <?php endif; ?>
        </li>
        <?php
        return ob_get_clean();
    }

    /**
     * Sets all the push parameters and save it in the queue
     * Choose the class depending on what the user has been selected
     * through the wizard
     */
    public function render_step_5()
    {

        // Source blog ID and destination blogs IDs
        $src_blog_id = $this->wizard->get_value('content_blog_id');
        $dest_blogs_ids = $this->wizard->get_value('dest_blogs_ids');
        $push_menu = $this->wizard->get_value('push_menu');

        $dest_blog_type = $this->wizard->get_value('dest_blog_type'); // Could be 'all' when trying to push to all blogs in the network

        // Settings (Additional options)
        $settings = $this->wizard->get_value('settings');

        $settings['push_menu'] = $push_menu;


        if (empty($settings))
            $settings = array();

        // Action
        $action = $this->wizard->get_value('mcp_action');

        // Change to list if pages and all
        if ('add-page' == $action && $dest_blog_type == 'all') {
            $dest_blog_type = 'list';
            $this->wizard->set_value('dest_blog_type', 'list');
        }

        // Setting the class and items IDs/slugs
        if ('add-page' == $action) {
            $posts_ids = $this->wizard->get_value('posts_ids');
            $settings['class'] = 'Multisite_Content_Push_Page_Push';
            $settings['post_ids'] = $posts_ids;
        }
        if ('add-post' == $action) {
            $posts_ids = $this->wizard->get_value('posts_ids');
            $settings['class'] = 'Multisite_Content_Push_Post_Push';
            $settings['post_ids'] = $posts_ids;
        }
        if ('add-cpt' == $action) {
            $posts_ids = $this->wizard->get_value('posts_ids');
            $settings['class'] = 'Multisite_Content_Push_CPT_Push';
            $settings['post_ids'] = $posts_ids;
            $settings['post_type'] = $this->wizard->get_value('cpt');
        }
        if ('activate-plugin' == $action) {
            $plugins_ids = $this->wizard->get_value('plugins');
            $settings['class'] = 'Multisite_Content_Push_Plugins_Activator';
            $settings['plugins'] = $plugins_ids;
            $src_blog_id = 0;
        }
        if ('add-user' == $action) {
            $users_ids = $this->wizard->get_value('posts_ids');
            $settings['class'] = 'Multisite_Content_Push_User_Push';
            $settings['users'] = $users_ids;
        }

        if ('all' != $dest_blog_type) {
            // Copyinhg to a few blogs (group, NBT group or list)
            $model = mcp_get_model();
            foreach ($dest_blogs_ids as $dest_blog_id) {
                // Inserting a queue item for each blog
                if ($dest_blog_id != $src_blog_id && !is_main_site($dest_blog_id))
                    $model->insert_queue_item($src_blog_id, $dest_blog_id, $settings);
            }

            ?>
            <p>
                <?php _e('Your selected items have been pushed.', MULTISTE_CP_LANG_DOMAIN); ?>
            </p>
            <?php

            $this->show_redirect_notice();

            // Cleaning the wizard
            $this->wizard->clean();
        } else { // All

            $this->wizard->set_value('settings', $settings);

            // We need first to update the blogs counts in the network
            wp_update_network_counts();
            $blogs_count = get_blog_count();
            ?>
            <div class="processing_result">
            </div>
            <?php

            // Rendering the progressbar
            $this->render_progressbar_js($blogs_count);

            ?>
            <p>
                <?php _e('Enqueueing all blogs, please do not close or refresh this window', MULTISTE_CP_LANG_DOMAIN); ?>
            </p>
        <?php
        }

    }

    public function render_step_6()
    {

        ?>
        <p>
            <?php _e('Your selected items have been pushed.', MULTISTE_CP_LANG_DOMAIN); ?>
        </p>
        <?php
        $this->show_redirect_notice();

        $this->wizard->clean();

    }

    /**
     * Redirection notice displayed when the user tries to push content
     * from the post meta box
     */
    private function show_redirect_notice()
    {
        $redirect_url = false;
        if ($this->wizard->get_value('redirect_to'))
            $redirect_url = $this->wizard->get_value('redirect_to');

        if (!empty($redirect_url)) {
            ?>
            <p>
                <?php printf(__('Click <a href="%s">here</a> to return to your previous page.', MULTISTE_CP_LANG_DOMAIN), esc_url($redirect_url)); ?>
            </p>
        <?php
        }
    }

    /**
     * Needed Javascript to render the progressbar
     *
     * @param Integer $items_count No of blogs that are going to be queued
     */
    private function render_progressbar_js($items_count)
    {
        $settings = $this->wizard->get_value('settings');
        ?>
        <script type="text/javascript">
            jQuery(function ($) {

                var rt_count = 0;
                var interval = 20;
                var rt_total = <?php echo $items_count; ?>;
                var label = 0;

                $('.processing_result')
                    .html('<div id="progressbar" style="margin-top:20px"><div class="progress-label">' + label + '%</div></div>')

                $('#progressbar').progressbar({
                    "value": 0,
                    complete: function (event, ui) {
                        window.location = <?php echo '"' . $this->wizard->get_step_url( '6' ) . '"' ?>;
                    }
                });

                // Initialize processing
                process_item();

                function process_item() {
                    if (rt_count >= rt_total)
                        return false;

                    $.post(
                        ajaxurl,
                        {
                            "action": "mcp_insert_all_blogs_queue",
                            'offset': rt_count,
                            'interval': interval,
                            'content_blog_id': <?php echo $this->wizard->get_value( 'content_blog_id' ); ?>,
                            'settings': <?php echo json_encode( $settings ); ?>,
                            dataType: 'json'
                        },
                        function (response) {
                            rt_count = rt_count + interval;
                            console.log(rt_count);
                            label = Math.ceil((rt_count / rt_total) * 100);
                            if (label > 100)
                                label = 100;

                            $('#progressbar').progressbar('value', label);
                            $('.progress-label').text(label + '%');
                            process_item();
                        }
                    );
                }
            });
        </script>
    <?php
    }


    public function validate_form()
    {
        if (isset($_GET['page']) && $this->get_menu_slug() == $_GET['page']) {

            $step = $this->wizard->get_current_step();

            //STEP 1: Action selection
            if ('1' == $step && isset($_POST['submit_step_1'])) {

                if (!wp_verify_nonce($_POST['_wpnonce'], 'step_1'))
                    return false;

                if (!isset($_POST['mcp_action']))
                    mcp_add_error('wrong-action', __('Please select an option', MULTISTE_CP_LANG_DOMAIN));

                if (!mcp_is_error()) {
                    // Let's see if we've gone back to the first step and change the action.
                    // In that case we'll remove the posts IDs values
                    $current_action = $this->wizard->get_value('mcp_action');
                    if ($current_action != $_POST['mcp_action'])
                        $this->wizard->set_value('posts_ids', array());

                    // Save action selected
                    $this->wizard->set_value('mcp_action', $_POST['mcp_action']);

                    // If we are trying to activate plugins, step 2 is not for us
                    if ('activate-plugin' == $_POST['mcp_action'])
                        $this->wizard->go_to_step('3');
                    else
                        $this->wizard->go_to_step('2');

                    return;
                }
            }

            // Step 2: Source blog/CPTs
            if ('2' == $step && isset($_POST['submit_step_2'])) {

                if (!wp_verify_nonce($_POST['_wpnonce'], 'step_2'))
                    return false;

                if (!isset($_POST['blog_id']) || !$blog_details = get_blog_details(absint($_POST['blog_id'])))
                    mcp_add_error('blog-id', __('The Blog ID does not exist', MULTISTE_CP_LANG_DOMAIN));

                $action = $this->wizard->get_value('mcp_action');
                if ('add-cpt' == $action && empty($_POST['mcp_cpt'])) {
                    // We need a CPT slug if we are pushing a CPT!
                    mcp_add_error('blog-id', __('You must select a post type', MULTISTE_CP_LANG_DOMAIN));
                } elseif ('add-cpt' == $action && 'custom' == $_POST['mcp_cpt']) {
                    if (empty($_POST['mcp_cpt_slug']))
                        mcp_add_error('mcp-cpt', __('You must select a post type', MULTISTE_CP_LANG_DOMAIN));
                    else
                        $mcp_cpt_slug = $_POST['mcp_cpt_slug'];
                }

                if (!mcp_is_error()) {
                    // Setting the CPT slug
                    if ('add-cpt' == $action && !empty($mcp_cpt_slug))
                        $this->wizard->set_value('cpt', $mcp_cpt_slug);
                    elseif ('add-cpt' == $action)
                        $this->wizard->set_value('cpt', $_POST['mcp_cpt']);

                    // And the source Blog ID
                    $this->wizard->set_value('content_blog_id', $_POST['blog_id']);
                    $this->wizard->go_to_step('3');
                }
            }

            // STEP 3: Source items
            if ('3' == $step && isset($_POST['submit_step_3'])) {

                if (!wp_verify_nonce($_POST['_wpnonce'], 'step_3'))
                    return false;

                $action = $this->wizard->get_value('mcp_action');
                $post_actions = array('add-post', 'add-page', 'add-cpt');
                if (in_array($action, $post_actions) && empty($_POST['posts_ids']))
                    mcp_add_error('select-post', __('You must add at least one item to the list', MULTISTE_CP_LANG_DOMAIN));

                if ('activate-plugin' == $action && empty($_POST['plugins']))
                    mcp_add_error('select-plugin', __('You must select at least one plugin', MULTISTE_CP_LANG_DOMAIN));

                if ('add-user' == $action) {
                    if (empty($_POST['users_selection'])) {
                        mcp_add_error('select-user', __('You must select one option', MULTISTE_CP_LANG_DOMAIN));
                    } else {
                        $this->wizard->set_value('users_selection', $_POST['users_selection']);
                        if ('ids' == $_POST['users_selection'] && empty($_POST['users_ids']))
                            mcp_add_error('select-user', __('You add at least one user to the list', MULTISTE_CP_LANG_DOMAIN));
                    }

                }

                // Additional options
                if (isset($_POST['settings']) && is_array($_POST['settings'])) {
                    $settings = array();
                    foreach ($_POST['settings'] as $setting => $value) {
                        $settings[$setting] = true;
                    }
                    $this->wizard->set_value('settings', $settings);
                }


                if (!mcp_is_error()) {
                    // Setting the sources posts/users/plugins
                    if (in_array($action, $post_actions)) {
                        $posts_ids = array();
                        foreach ($_POST['posts_ids'] as $post_id) {
                            $posts_ids[] = absint($post_id);
                        }
                        $this->wizard->set_value('posts_ids', $posts_ids);
                    }

                    if ('activate-plugin' == $this->wizard->get_value('mcp_action')) {
                        $plugins = $_POST['plugins'];
                        $this->wizard->set_value('plugins', $plugins);
                    }

                    if ('add-user' == $this->wizard->get_value('mcp_action')) {
                        if ('all' == $_POST['users_selection'])
                            $users = 'all';
                        else
                            $users = $_POST['users_ids'];

                        $this->wizard->set_value('posts_ids', $users);
                    }


                    $this->wizard->go_to_step('4');
                }
            }

            // STEP 4: Destination blogs
            if ('4' == $step && isset($_POST['submit_step_4'])) {
                if (!wp_verify_nonce($_POST['_wpnonce'], 'step_4'))
                    return false;

                $type = '';
                if (!isset($_POST['dest_blog_type']) || !in_array($_POST['dest_blog_type'], array('all', 'list', 'group', 'nbt_group'))) {
                    mcp_add_error('blog-type', __('Please, select an option', MULTISTE_CP_LANG_DOMAIN));
                } else {
                    $type = $_POST['dest_blog_type'];
                }

                $this->wizard->set_value('dest_blog_type', $type);


                // saving just in case the error deletes all the data
                if (isset($_POST['blogs_ids']) && is_array($_POST['blogs_ids'])) {
                    $blogs_ids = array();
                    $src_blog_id = $this->wizard->get_value('content_blog_id');
                    foreach ($_POST['blogs_ids'] as $blog_id) {
                        if (!in_array($blog_id, $blogs_ids) && $src_blog_id != $blog_id)
                            $blogs_ids[] = $blog_id;
                    }
                    $this->wizard->set_value('dest_blogs_ids', $blogs_ids);
                }

                // List selected by the user
                if ('list' == $type) {
                    if (!isset($_POST['blogs_ids']) || !is_array($_POST['blogs_ids'])) {
                        mcp_add_error('blog-id', __('You have not selected any blog', MULTISTE_CP_LANG_DOMAIN));
                        return;
                    }
                    $this->wizard->set_value('dest_blogs_ids', $_POST['blogs_ids']);
                }

                // Group of blogs
                if ('group' == $type) {
                    if (empty($_POST['group'])) {
                        mcp_add_error('blog-group', __('You have not selected any group', MULTISTE_CP_LANG_DOMAIN));
                        return;
                    }

                    $group = absint($_POST['group']);

                    $model = mcp_get_model();
                    if (!$model->is_group($group))
                        mcp_add_error('wrong-group', __('You have selected a wrong group', MULTISTE_CP_LANG_DOMAIN));

                    $blogs = $model->get_blogs_from_group($group);

                    if (empty($blogs)) {
                        mcp_add_error('wrong-group', __('There are no blogs attached to that group.', MULTISTE_CP_LANG_DOMAIN));
                    } else {
                        // Saving the blogs IDs in the wizard
                        $ids = array();
                        foreach ($blogs as $blog) {
                            $ids[] = $blog->blog_id;
                        }
                        $this->wizard->set_value('dest_blogs_ids', $ids);
                    }

                }

                // New Blog Templates Groups
                if ('nbt_group' == $type) {

                    if (!function_exists('nbt_get_model')) {
                        mcp_add_error('nbt-error', __('There was an error while trying to get the template information', MULTISTE_CP_LANG_DOMAIN));
                        return;
                    }

                    if (empty($_POST['nbt_group'])) {
                        mcp_add_error('nbt-group', __('You have not selected any template', MULTISTE_CP_LANG_DOMAIN));
                        return;
                    }

                    $group = absint($_POST['nbt_group']);

                    $model = nbt_get_model();
                    $template = $model->get_template($group);
                    if (empty($template))
                        mcp_add_error('wrong-nbt-group', __('You have selected a wrong template', MULTISTE_CP_LANG_DOMAIN));

                    $nbt_model = mcp_get_nbt_model();
                    $blogs_relationships = $nbt_model->get_template_blogs($group);

                    if (empty($blogs_relationships)) {
                        mcp_add_error('wrong-nbt-group', __('There are no blogs attached to that template.', MULTISTE_CP_LANG_DOMAIN));
                    } else {
                        // Saving the blogs IDs in the wizard
                        $this->wizard->set_value('dest_blogs_ids', $blogs_relationships);
                    }

                }

                if (!mcp_is_error()) {
                    $this->wizard->go_to_step('5');
                }
            }

        }


    }

}
