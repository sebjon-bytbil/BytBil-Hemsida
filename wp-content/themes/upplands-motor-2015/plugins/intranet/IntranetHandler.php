<?php
/*
Plugin Name: Upplandsmotor Intranet
Description:
Author: Leo Starcevic : BytBil.com
Version: 0.2
Author URI: http://www.bytbil.com
*/
class IntranetHandler{
    function __construct(){

        //Adds submenus
        add_action('admin_menu', array($this, 'add_sub_menus'));

        add_action('wp_login', array($this, 'user_login'), 10, 2);
        //Creates user from registration form on the company-page
        add_action('admin_post_company_user_create', array($this, 'create_user'));
        //Adds a company field on the user-new registration form
        add_action('user_new_form', array($this, 'add_field_to_user_new'));
        //
        add_action('user_register', array($this, 'save_company_on_user_registration'), 10, 1);
        //Adds company user roles
        add_action('init', array($this, "create_company_user_roles"));
        //Adds company-column in users-list
        add_filter('manage_users_columns', array($this, 'add_users_columns'));
        add_action('manage_users_custom_column', array($this, 'add_users_custom_column'), 10, 3);
        //Scripts
        add_action('admin_enqueue_scripts', array($this, 'intranet_scripts'), 0);


    }
    function add_sub_menus(){
        $services_submenu = add_submenu_page('edit.php?post_type=company_page', "Tjänster", "Tjänster", 'edit_posts', '/edit.php?post_type=services', '');
        $add_services_submenu = add_submenu_page('edit.php?post_type=company_page', "Lägg till tjänst", "Lägg till tjänst", 'edit_posts', '/post-new.php?post_type=services', '');
    }

    function user_login($user_login, $user) {
        $redirect_to = $_POST['redirect_to'];
        $user = get_user_by("login", $user_login);
        $user_meta = get_user_meta($user->data->ID);
        $company = $user_meta['company'][0];
        if($company != null){

        }
    }
    //Save company as usermeta on registration
    function save_company_on_user_registration( $user_id ) {
        //Check if company is set and role is some kind of company user.
        if (isset($_POST['company']) &&
            !empty($_POST['company']) &&
            $_POST['role'] == "foretagsadmin" ||
            $_POST['role'] == "foretagsanvandare"){
            $updated = update_user_meta($user_id, 'company', $_POST['company']);
        }
    }

    //Register company-user via the company page registration form
    function create_user(){
        $userdata = array(
            'user_login' => $_POST["user_login"],
            'user_email' => $_POST["user_login"],
            'role' => 'foretagsanvandare',
            'user_pass' => $_POST["password"]
        );
        $user_id = wp_insert_user($userdata);
        wp_redirect($this->get_company_page_slug());
    }

    function add_field_to_user_new(){ ?>
        <table id="company-table" class="form-table company" style="display:none;">
            <tbody>
            <tr class="form-field form-required">
                <th class="row">
                    <label for="adduser-company">Företag</label>
                </th>
                <td>
                    <select name="company" id="adduser-companylist">
                        <?php
                        foreach($this->get_companies() as $company){ ?>
                            <option value="<?php echo $company;?>"><?php echo $company;?></option>
                        <?php }
                        ?>
                    </select>
                </td>
            </tr>

            </tbody>
        </table>
    <?php }

    function get_companies(){
        $posts = get_posts(
            array(
                "post_type" => "company_page",
                "post_per_page" => -1
            )
        );
        $companies = array_map(function($company){
            return $company->post_title;
        }, $posts);

        return $companies;
    }

    function get_company_page_slug(){
        $query = get_posts( array( 'post_type' => 'page', 'meta_key' => '_wp_page_template', 'meta_value' => 'company.php' ) );
        $post_name = $query[0]->post_name;
        return $post_name;
    }

    function create_company_user_roles()
    {
        $company_caps = array(
            "read",
        );
        add_role("foretagsanvandare", "Företagsanvändare");

        $foretagsanvandare = get_role("foretagsanvandare");
        foreach ($company_caps as $cap) {
            $foretagsanvandare->add_cap($cap);
        }

        $company_admin_caps = array(
            "add_users",
        );
        add_role("foretagsadmin", "Företagsadmin");
        $foretagsadmin = get_role("foretagsadmin");
        foreach ($company_admin_caps as $cap){
            $foretagsadmin->add_cap($cap);
        }
    }

    //Returns current users role
    function get_current_user_role(){
        $current_user_id = get_current_user_id();
        $current_user = get_user_by("id", $current_user_id);
        $current_user_role = $current_user->roles[0];
        return $current_user_role;
    }

    //Returns current users company-post
    function get_user_company_post(){
        $current_user_id = get_current_user_id();
        if($current_user_id == 0) {
            //return;
        }

        $current_user_meta = get_user_meta($current_user_id, null, true);
        $company = $current_user_meta["company"][0];
        $posts = get_posts(
            array(
                "post_type" => "company_page",
                "post_title" => $company,
            )
        );

        $company_post = array_filter($posts, function($post) use ($company){
            return $post->post_title == $company;
        });
        if(count($company_post) == 0){
            return;
        }
        //Hide wp-admin-bar
        add_filter('show_admin_bar', '__return_false');

        $company_post = array_values($company_post);

        return $company_post[0];
    }


    function add_users_columns($columns) {
        $new_column = array("company" => "Företag");
        $res = array_slice($columns, 0, 2) + $new_column + array_slice($columns, 3, count($columns) - 1, true);
        return $res;
    }


    function add_users_custom_column($columns, $column_name, $id) {
        switch ($column_name) {
            case "company" :
                $company = get_user_meta($id, "company", true);
                if ($company) {
                    return $company;
                } else {
                    return "-";
                }
        }
    }

    function intranet_scripts()
    {
        wp_enqueue_script('intranet', '/wp-content/themes/upplands-motor-2015/plugins/intranet/js/intranet.js', array(), '1.0.0', true);
    }

}

new IntranetHandler();





