<?php

class acf_field_bbcms_department extends acf_field
{

    // vars
    var $settings, // will hold info such as dir / path
        $defaults; // will hold default field options


    /*
    *  __construct
    *
    *  Set name / label needed for actions / filters
    *
    *  @since	3.6
    *  @date	23/01/13
    */

    function __construct()
    {
        // vars
        $this->name = 'bbcms_department';
        $this->label = __('BytBil Avdelningar ACF');
        $this->category = __("Basic", 'acf'); // Basic, Content, Choice, etc
        $this->defaults = array(
            // add default here to merge into your field.
            // This makes life easy when creating the field options as you don't need to use any if( isset('') ) logic. eg:
            //'preview_size' => 'thumbnail'
        );


        // do not delete!
        parent::__construct();


        // settings
        $this->settings = array(
            'path' => apply_filters('acf/helpers/get_path', __FILE__),
            'dir' => apply_filters('acf/helpers/get_dir', __FILE__),
            'version' => '1.0.0'
        );

        add_action("wp_ajax_acf-departments-find", array($this, "findFacilityDepartmentsAjax"));
    }

    function findFacilityDepartments($id)
    {
        $deps = get_field("facility-departments", $id);
        return $deps;
    }

    function findFacilityDepartmentsAjax()
    {
        $id = intval($_POST["value"]);
        $deps = $this->findFacilityDepartments($id);
        die(json_encode($deps));
    }


    /*
    *  create_options()
    *
    *  Create extra options for your field. This is rendered when editing a field.
    *  The value of $field['name'] can be used (like below) to save extra data to the $field
    *
    *  @type	action
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	$field	- an array holding all the field's data
    */

    function create_options($field)
    {
        // defaults?
        /*
        $field = array_merge($this->defaults, $field);
        */

        // key is needed in the field names to correctly save the data
        $key = $field['name'];


        // Create Field Options HTML
        ?>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td>
                <h1>Det finns inga alternativ för detta fältet</h1>
            </td>
        </tr>
    <?php

    }


    /*
    *  create_field()
    *
    *  Create the HTML interface for your field
    *
    *  @param	$field - an array holding all the field's data
    *
    *  @type	action
    *  @since	3.6
    *  @date	23/01/13
    */

    function create_field($field)
    {
        global $post_id;
        // defaults?
        /*
        $field = array_merge($this->defaults, $field);
        */

        // perhaps use $field['preview_size'] to alter the markup?
        $facilities = get_posts(array(
            "post_type" => "facility",
            "posts_per_page" => -1,
            "post_status" => "publish"
        ));

        $curVal = $field["value"];
        $deps = false;
        if (!empty($curVal["fid"]) && $curVal["did"] !== "") {
            $selected = $curVal["fid"];
            $did = $curVal["did"];

            $deps = $this->findFacilityDepartments(intval($selected));
        } else {
            $selected = false;
            $did = "";
        }


        // create Field HTML
        ?>
        <div>
            <select name="<?php echo $field["name"]; ?>[fid]" class="acf-field-facilities-select">
                <option value="none">Välj anläggning</option>
                <?php foreach ($facilities as $facility) : ?>
                    <option
                        value="<?php echo $facility->ID ?>" <?php if ($facility->ID == intval($selected)) : ?> selected <?php endif; ?>><?php echo $facility->post_title ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <i class="fa fa-spinner fa-spin" style="display: none;"></i>
            <select name="<?php echo $field["name"]; ?>[did]" class="acf-field-department-select">
                <option value="none">Välj avdelning</option>
                <?php if ($deps) : ?>
                    <?php foreach ($deps as $k => $dep) : ?>
                        <option
                            value="<?php echo $k ?>" <?php if ($k == $did) : ?> selected <?php endif; ?>><?php echo $dep["facility-department"] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
    <?php
    }


    /*
    *  input_admin_enqueue_scripts()
    *
    *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
    *  Use this action to add CSS + JavaScript to assist your create_field() action.
    *
    *  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
    *  @type	action
    *  @since	3.6
    *  @date	23/01/13
    */

    function input_admin_enqueue_scripts()
    {
        // Note: This function can be removed if not used


        // register ACF scripts
        wp_register_script('acf-input-bbcms_department', $this->settings['dir'] . 'js/input.js', array('acf-input'), $this->settings['version']);
        wp_register_style('acf-input-bbcms_department', $this->settings['dir'] . 'css/input.css', array('acf-input'), $this->settings['version']);


        // scripts
        wp_enqueue_script(array(
            'acf-input-bbcms_department',
        ));

        // styles
        wp_enqueue_style(array(
            'acf-input-bbcms_department',
        ));


    }


    /*
    *  input_admin_head()
    *
    *  This action is called in the admin_head action on the edit screen where your field is created.
    *  Use this action to add CSS and JavaScript to assist your create_field() action.
    *
    *  @info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_head
    *  @type	action
    *  @since	3.6
    *  @date	23/01/13
    */

    function input_admin_head()
    {
        // Note: This function can be removed if not used
    }


    /*
    *  field_group_admin_enqueue_scripts()
    *
    *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
    *  Use this action to add CSS + JavaScript to assist your create_field_options() action.
    *
    *  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
    *  @type	action
    *  @since	3.6
    *  @date	23/01/13
    */

    function field_group_admin_enqueue_scripts()
    {
        // Note: This function can be removed if not used
        wp_enqueue_script("bbcms-department-field", plugin_dir_url(__FILE__) . "/js/handler.js", array("jquery"), "", true);
    }


    /*
    *  field_group_admin_head()
    *
    *  This action is called in the admin_head action on the edit screen where your field is edited.
    *  Use this action to add CSS and JavaScript to assist your create_field_options() action.
    *
    *  @info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_head
    *  @type	action
    *  @since	3.6
    *  @date	23/01/13
    */

    function field_group_admin_head()
    {
        // Note: This function can be removed if not used
    }


    /*
    *  load_value()
    *
        *  This filter is applied to the $value after it is loaded from the db
    *
    *  @type	filter
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	$value - the value found in the database
    *  @param	$post_id - the $post_id from which the value was loaded
    *  @param	$field - the field array holding all the field options
    *
    *  @return	$value - the value to be saved in the database
    */

    function load_value($value, $post_id, $field)
    {
        // Note: This function can be removed if not used
        return $value;
    }


    /*
    *  update_value()
    *
    *  This filter is applied to the $value before it is updated in the db
    *
    *  @type	filter
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	$value - the value which will be saved in the database
    *  @param	$post_id - the $post_id of which the value will be saved
    *  @param	$field - the field array holding all the field options
    *
    *  @return	$value - the modified value
    */

    function update_value($value, $post_id, $field)
    {
        // Note: This function can be removed if not used
        return $value;
    }


    /*
    *  format_value()
    *
    *  This filter is applied to the $value after it is loaded from the db and before it is passed to the create_field action
    *
    *  @type	filter
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	$value	- the value which was loaded from the database
    *  @param	$post_id - the $post_id from which the value was loaded
    *  @param	$field	- the field array holding all the field options
    *
    *  @return	$value	- the modified value
    */

    function format_value($value, $post_id, $field)
    {
        // defaults?
        /*
        $field = array_merge($this->defaults, $field);
        */

        // perhaps use $field['preview_size'] to alter the $value?


        // Note: This function can be removed if not used
        return $value;
    }


    /*
    *  format_value_for_api()
    *
    *  This filter is applied to the $value after it is loaded from the db and before it is passed back to the API functions such as the_field
    *
    *  @type	filter
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	$value	- the value which was loaded from the database
    *  @param	$post_id - the $post_id from which the value was loaded
    *  @param	$field	- the field array holding all the field options
    *
    *  @return	$value	- the modified value
    */

    function format_value_for_api($value, $post_id, $field)
    {
        if (empty($value["fid"]) || $value["did"] === "") {
            return false;
        }
        $did = $value["did"];
        $fid = $value["fid"];

        $departments = get_field("facility-departments", intval($fid));
        if (!$departments) {
            return false;
        }

        $department = $departments[intval($did)];

        return $department;
    }

    function load_field($field)
    {
        // Note: This function can be removed if not used
        return $field;
    }


    /*
    *  update_field()
    *
    *  This filter is applied to the $field before it is saved to the database
    *
    *  @type	filter
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	$field - the field array holding all the field options
    *  @param	$post_id - the field group ID (post_type = acf)
    *
    *  @return	$field - the modified field
    */

    function update_field($field, $post_id)
    {
        // Note: This function can be removed if not used
        return $field;
    }


}


// create field
new acf_field_bbcms_department();

?>
