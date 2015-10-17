<?php

// determine the topmost parent of a term
function get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    // climb up the hierarchy until we reach a term with parent = '0'
    while ($parent->parent != '0'){
        $term_id = $parent->parent;

        $parent  = get_term_by( 'id', $term_id, $taxonomy);
    }
    return $parent;
}

function set_wpcf7_array($form)
{
    $markup_start = substr($form, 0, 100);
    $pattern = '/id=\"(wpcf7.+?)\"/';
    preg_match($pattern, $markup_start, $matches);
    ?>
    <script>
        if (typeof wpcf7forms === 'undefined') {
            var wpcf7forms = [];
        }
        wpcf7forms['<?php echo $matches[1]; ?>'] = [];
    </script>
    <?php

    return $matches[1];
}

add_filter('wpcf7_form_elements', 'do_shortcode');

function um_id_input($atts)
{
    return '<input type="hidden" name="the_post_id" value="' . get_the_ID() . '">';
}
add_shortcode('print_id', 'um_id_input');

add_action('wpcf7_init', 'wpcf7_add_custom_select_shortcodes');
function wpcf7_add_custom_select_shortcodes()
{
    wpcf7_add_shortcode(array('select_facility_footer', 'select_facility_footer*'),
        'wpcf7_select_facility_footer_shortcode_handler', true);
    wpcf7_add_shortcode(array('select_facility', 'select_facility*'),
        'wpcf7_select_facility_shortcode_handler', true);
    wpcf7_add_shortcode(array('select_department_footer', 'select_department_footer*'),
        'wpcf7_select_department_footer_shortcode_handler', true);
    wpcf7_add_shortcode(array('select_department', 'select_department*'),
        'wpcf7_select_department_shortcode_handler', true);
    wpcf7_add_shortcode(array('select_brand_footer', 'select_brand_footer*'),
        'wpcf7_select_brand_footer_shortcode_handler', true);
    wpcf7_add_shortcode(array('select_brand', 'select_brand*'),
        'wpcf7_select_brand_shortcode_handler', true);
    wpcf7_add_shortcode(array('select_model', 'select_model*'),
        'wpcf7_select_model_shortcode_handler', true);
}

function wpcf7_select_facility_footer_shortcode_handler($tag)
{
    $tag = new WPCF7_Shortcode($tag);

    if (empty($tag->name))
        return '';

    $validation_error = wpcf7_get_validation_error($tag->name);

    $atts = array();

    $atts['name'] = $tag->name;
    $atts['class'] = 'facility selectpicker um-form-facility';
    if ($tag->is_required())
        $atts['aria-required'] = 'true';

    $atts['aria-invalid'] = $validation_error ? 'true' : 'false';

    $html = '<option data-brand="" value="0" selected="selected" data-constant="true">Välj anläggning</option>';
    $emails = $option_fields['settings-emails'];
    $brands = get_terms('brand', array('parent' => 0));

    $email_settings = array();

    if (!empty($emails)) {
        foreach ($emails as $email) {
            foreach ($email['facility'] as $facility) {
                $facility = str_replace('Upplands Motor ', '', $facility->post_title);
                if (!array_key_exists($facility, $email_settings))
                    $email_settings[$facility] = array();

                $email_settings[$facility]['departments'][] = $email['settings-emails-department']->name;

                if (!empty($email['brand'])) {
                    foreach ($email['brand'] as $brand) {
                        $match = false;
                        foreach ($brands as $term_brand) {
                            if ($term_brand->name == $brand->name)
                                $match = true;
                        }

                        if ($match)
                            $email_settings[$facility]['brands'][] = $brand->name;
                    }
                }

                $email_settings[$facility]['departments'] = array_unique($email_settings[$facility]['departments']);
                $email_settings[$facility]['brands'] = array_unique($email_settings[$facility]['brands']);
            }
        }

        foreach ($email_settings as $facility => $value) {
            $data_brand = '';
            $data_department = '';

            if (!empty($value['departments'])) {
                foreach ($value['departments'] as $department) {
                    $data_department .= $department . ' ';
                }
            }

            if (!empty($value['brands'])) {
                foreach ($value['brands'] as $brand) {
                    $data_brand .= $brand . ',';
                }
            }

            $html .= '<option data-brand="' . $data_brand . '" data-department="' . $data_department . '" value="' . $facility . '" data-constant="false">' . $facility . '</option>';
        }
    }

    $atts = wpcf7_format_atts($atts);

    $html = sprintf(
        '<span class="wpcf7-form-control-wrap %1$s"><select %2$s>%3$s</select>%4$s</span>',
        sanitize_html_class($tag->name), $atts, $html, $validation_error);

    return $html;
}

function wpcf7_select_facility_shortcode_handler($tag)
{
    $tag = new WPCF7_Shortcode($tag);

    if (empty($tag->name))
        return '';

    $validation_error = wpcf7_get_validation_error($tag->name);

    $atts = array();

    $atts['name'] = $tag->name;
    $atts['class'] = 'facility selectpicker um-form-facility';
    if ($tag->is_required())
        $atts['aria-required'] = 'true';

    $atts['aria-invalid'] = $validation_error ? 'true' : 'false';

    $args = array(
        'post_type' => 'facility',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );

    $html = '<option data-brand="" value="0" selected="selected" data-constant="true">Välj anläggning</option>';
    $facilities = get_posts($args);
    $emails = $option_fields['settings-emails'];

    if (!empty($facilities)) {
        foreach ($facilities as $facility) {
            $id = $facility->ID;
            $cities = wp_get_post_terms($id, 'cities');
            $brands = wp_get_post_terms($id, 'brand', array('parent' => 0));
            $data_brand = '';

            for ($i = 0; $i < sizeof($brands); $i++) {
                if ($i !== 0) $data_brand .= ' ';
                $data_brand .= $brands[$i]->name;
            }

            $data_departments = array();
            $city = $cities[0]->name;
            if ($city == 'Arlanda') $city = 'Arlandastad';

            foreach ($emails as $email) {
                foreach ($email['facility'] as $fac) {
                    $facility = str_replace('Upplands Motor ', '', $fac->post_title);
                    if ($facility == $city)
                        array_push($data_departments, $email['settings-emails-department']->name);
                }
            }

            $departments = '';
            foreach ($data_departments as $dep) {
                $departments .= $dep . ' ';
            }

            $html .= '<option data-brand="' . $data_brand . '" data-department="' . $departments . '" value="' . $city . '" data-constant="false">' . $city . '</option>';
        }
    }

    $atts = wpcf7_format_atts($atts);

    $html = sprintf(
        '<span class="wpcf7-form-control-wrap %1$s"><select %2$s>%3$s</select>%4$s</span>',
        sanitize_html_class($tag->name), $atts, $html, $validation_error);

    return $html;
}

add_action('wp_ajax_get_footer_options', 'get_footer_options');
add_action('wp_ajax_nopriv_get_footer_options', 'get_footer_options');
function get_footer_options()
{
    $emails = $option_fields['settings-emails'];
    $select = sanitize_text_field($_GET['select']);
    $department = sanitize_text_field($_GET['department']);
    $facility = sanitize_text_field($_GET['facility']);
    $brand = sanitize_text_field($_GET['brand']);
    $term_brands = get_terms('brand', array('parent' => 0));

    $return_array = array();

    if (!empty($emails)) {
        $departments = array();
        $facilities = array();
        $brands = array();

        // No department, no facility
        if ($department === '0' && $facility === '0') {
            foreach ($emails as $email) {
                foreach ($email['facility'] as $facility) {
                    $facility_name = str_replace('Upplands Motor ', '', $facility->post_title);
                    array_push($facilities, $facility_name);
                }

                array_push($departments, $email['settings-emails-department']->name);

                if (!empty($email['brand'])) {
                    foreach ($email['brand'] as $brand) {
                        array_push($brands, $brand->name);
                    }
                }
            }
        // Department but no facility
        } elseif ($department !== '0' && $facility === '0') {
            foreach ($emails as $email) {
                $department_match = false;

                if ($department === $email['settings-emails-department']->name)
                    $department_match = true;

                array_push($departments, $email['settings-emails-department']->name);

                foreach ($email['facility'] as $email_facility) {
                    $facility_name = str_replace('Upplands Motor ', '', $email_facility->post_title);
                    if ($department_match)
                        array_push($facilities, $facility_name);
                }

                if ($department_match) {
                    if (!empty($email['brand'])) {
                        foreach ($email['brand'] as $brand) {
                            $not_model = false;
                            foreach ($term_brands as $term_brand) {
                                if ($brand->name === $term_brand->name)
                                    $not_model = true;
                            }

                            if ($not_model)
                                array_push($brands, $brand->name);
                        }
                    }
                }
            }
        // Facility but no department
        } elseif ($facility !== '0' && $department === '0') {
            foreach ($emails as $email) {
                $facility_match = false;

                foreach ($email['facility'] as $email_facility) {
                    $facility_name = str_replace('Upplands Motor ', '', $email_facility->post_title);
                    if ($facility === $facility_name)
                        $facility_match = true;

                    array_push($facilities, $facility_name);
                }

                if ($facility_match) {
                    array_push($departments, $email['settings-emails-department']->name);
                    if (!empty($email['brand'])) {
                        foreach ($email['brand'] as $brand) {
                            $not_model = false;
                            foreach ($term_brands as $term_brand) {
                                if ($brand->name === $term_brand->name)
                                    $not_model = true;
                            }

                            if ($not_model)
                                array_push($brands, $brand->name);
                        }
                    }
                }
            }
        // Both department and facility
        } else {
            switch ($select) {
                case 'department':
                    foreach ($emails as $email) {
                        $department_match = false;
                        $facility_match = false;

                        if ($department === $email['settings-emails-department']->name)
                            $department_match = true;

                        array_push($departments, $email['settings-emails-department']->name);

                        foreach ($email['facility'] as $email_facility) {
                            $facility_name = str_replace('Upplands Motor ', '', $email_facility->post_title);
                            if ($facility === $facility_name)
                                $facility_match = true;

                            if ($department_match)
                                array_push($facilities, $facility_name);
                        }

                        if ($department_match && $facility_match) {
                            if (!empty($email['brand'])) {
                                foreach ($email['brand'] as $brand) {
                                    $not_model = false;
                                    foreach ($term_brands as $term_brand) {
                                        if ($brand->name === $term_brand->name)
                                            $not_model = true;
                                    }

                                    if ($not_model)
                                        array_push($brands, $brand->name);
                                }
                            }
                        }
                    }
                    break;
                case 'facility':
                    foreach ($emails as $email) {
                        $department_match = false;
                        $facility_match = false;

                        if ($department === $email['settings-emails-department']->name)
                            $department_match = true;

                        foreach ($email['facility'] as $email_facility) {
                            $facility_name = str_replace('Upplands Motor ', '', $email_facility->post_title);
                            if ($facility === $facility_name)
                                $facility_match = true;

                            array_push($facilities, $facility_name);
                        }

                        if ($facility_match)
                            array_push($departments, $email['settings-emails-department']->name);

                        if ($facility_match && $department_match) {
                            if (!empty($email['brand'])) {
                                foreach ($email['brand'] as $brand) {
                                    $not_model = false;
                                    foreach ($term_brands as $term_brand) {
                                        if ($brand->name === $term_brand->name)
                                            $not_model = true;
                                    }

                                    if ($not_model)
                                        array_push($brands, $brand->name);
                                }
                            }
                        }
                    }
                    break;
            }
        }

        $departments = array_values(array_unique($departments));
        $facilities = array_values(array_unique($facilities));
        $brands = array_values(array_unique($brands));

        $return_array['departments'] = $departments;
        $return_array['facilities'] = $facilities;
        $return_array['brands'] = $brands;
    }

    echo json_encode($return_array);
    die();
}

function wpcf7_select_department_footer_shortcode_handler($tag)
{
    $tag = new WPCF7_Shortcode($tag);

    if (empty($tag->name))
        return '';

    $validation_error = wpcf7_get_validation_error($tag->name);

    $atts = array();

    $atts['name'] = $tag->name;
    $atts['class'] = 'department selectpicker um-form-department';
    if ($tag->is_required())
        $atts['aria-required'] = 'true';

    $html = '<option data-brand="" value="0" selected="selected" data-constant="true">Välj avdelning</option>';
    $emails = $option_fields['settings-emails'];
    $brands = get_terms('brand', array('parent' => 0));

    $email_settings = array();

    if (!empty($emails)) {
        foreach ($emails as $email) {
            $department = $email['settings-emails-department']->name;
            if (!array_key_exists($department, $email_settings))
                $email_settings[$department] = array();

            foreach ($email['facility'] as $facility) {
                $facility = str_replace('Upplands Motor ', '', $facility->post_title);
                $email_settings[$department]['facilities'][] = $facility;
            }

            if (!empty($email['brand'])) {
                foreach ($email['brand'] as $brand) {
                    $match = false;
                    foreach ($brands as $term_brand) {
                        if ($term_brand->name == $brand->name)
                            $match = true;
                    }

                    if ($match)
                        $email_settings[$department]['brands'][] = $brand->name;
                }
            }

            $email_settings[$department]['facilities'] = array_unique($email_settings[$department]['facilities']);
            if (!empty($email_settings[$department]['brands']))
                $email_settings[$department]['brands'] = array_unique($email_settings[$department]['brands']);
        }

        ksort($email_settings);

        foreach ($email_settings as $department => $value) {
            $data_facilities = '';
            $data_brands = '';

            if (!empty($value['facilities'])) {
                foreach ($value['facilities'] as $facility) {
                    $data_facilities .= $facility . ' ';
                }
            }

            if (!empty($value['brands'])) {
                foreach ($value['brands'] as $brand) {
                    $data_brands .= $brand . ' ';
                }
            }

            $html .= '<option data-facilities="' . $data_facilities . '" data-brand="' . $data_brands . '" value="' . $department . '" data-constant="false">' . $department . '</option>';
        }
    }

    $atts = wpcf7_format_atts($atts);

    $html = sprintf(
        '<span class="wpcf7-form-control-wrap %1$s"><select %2$s>%3$s</select>%4$s</span>',
        sanitize_html_class($tag->name), $atts, $html, $validation_error);

    return $html;
}

function wpcf7_select_department_shortcode_handler($tag)
{
    $tag = new WPCF7_Shortcode($tag);

    if (empty($tag->name))
        return '';

    $validation_error = wpcf7_get_validation_error($tag->name);

    $atts = array();

    $atts['name'] = $tag->name;
    $atts['class'] = 'department selectpicker um-form-department';
    if ($tag->is_required())
        $atts['aria-required'] = 'true';

    $html = '<option data-brand="" value="0" selected="selected" data-constant="true">Välj avdelning</option>';
    $terms = get_terms('departments', array(
        'hide_empty' => '0',
    ));

    $emails = $option_fields['settings-emails'];

    foreach ($terms as $term) {
        $data_facilities = array();
        foreach ($emails as $email) {
            $department = $email['settings-emails-department']->name;
            if ($department == $term->name) {
                foreach ($email['facility'] as $fac) {
                    $facility = str_replace('Upplands Motor ', '', $fac->post_title);
                    array_push($data_facilities, $facility);
                }
            }
        }

        $facilities = '';
        foreach ($data_facilities as $fac) {
            $facilities .= $fac . ' ';
        }

        $html .= '<option data-facilities="' . $facilities . '" value="' . $term->name . '" data-constant="false">' . $term->name . '</option>';
    }

    $atts = wpcf7_format_atts($atts);

    $html = sprintf(
        '<span class="wpcf7-form-control-wrap %1$s"><select %2$s>%3$s</select>%4$s</span>',
        sanitize_html_class($tag->name), $atts, $html, $validation_error);

    return $html;
}

function wpcf7_select_brand_footer_shortcode_handler($tag)
{
    $tag = new WPCF7_Shortcode($tag);

    if (empty($tag->name))
        return '';

    $validation_error = wpcf7_get_validation_error($tag->name);

    $atts = array();

    $atts['name'] = $tag->name;
    $atts['class'] = 'brand selectpicker um-form-brand';
    if ($tag->is_required())
        $atts['aria-required'] = 'true';

    $html = '<option value="0" selected="selected" data-constant="true">Välj ett märke</option>';
    $emails = $option_fields['settings-emails'];
    $brands = get_terms('brand', array('parent' => 0));

    $email_settings = array();

    if (!empty($emails)) {
        foreach ($emails as $email) {
            if (!empty($email['brand'])) {
                foreach ($email['brand'] as $brand) {
                    $match = false;
                    foreach ($brands as $term_brand) {
                        if ($term_brand->name == $brand->name)
                            $match = true;
                    }

                    if ($match)
                        array_push($email_settings, $brand->name);
                }
            }
        }

        $email_settings = array_unique($email_settings);
        asort($email_settings);

        foreach ($email_settings as $data_brand) {
            $html .= '<option value="' . $data_brand . '" data-constant="false">' . $data_brand . '</option>';
        }
    }

    $atts = wpcf7_format_atts($atts);

    $html = sprintf(
        '<span class="wpcf7-form-control-wrap %1$s"><select %2$s>%3$s</select>%4$s</span>',
        sanitize_html_class($tag->name), $atts, $html, $validation_error);

    return $html;
}

function wpcf7_select_brand_shortcode_handler($tag)
{
    $tag = new WPCF7_Shortcode($tag);

    if (empty($tag->name))
        return '';

    $validation_error = wpcf7_get_validation_error($tag->name);

    $atts = array();

    $atts['name'] = $tag->name;
    $atts['class'] = 'brand selectpicker um-form-brand';
    if ($tag->is_required())
        $atts['aria-required'] = 'true';

    $options = '<option value="0" selected="selected" data-constant="true">Välj ett märke</option>';
    $brands = get_terms('brand', array('parent' => 0));

    foreach ($brands as $brand) {
        $options .= '<option value="' . $brand->name . '" data-constant="false">' . $brand->name . '</option>';
    }

    $atts = wpcf7_format_atts($atts);

    $html = sprintf(
        '<span class="wpcf7-form-control-wrap %1$s"><select %2$s>%3$s</select>%4$s</span>',
        sanitize_html_class($tag->name), $atts, $options, $validation_error);

    return $html;
}

function wpcf7_select_model_shortcode_handler($tag)
{
    $tag = new WPCF7_Shortcode($tag);

    if (empty($tag->name))
        return '';

    $validation_error = wpcf7_get_validation_error($tag->name);

    $atts = array();

    $atts['name'] = $tag->name;
    $atts['class'] = 'model selectpicker um-form-model';
    $atts['data-none-selected-text'] = 'Välj en modell';
    if ($tag->is_required())
        $atts['aria-required'] = 'true';

    $options = '<option value="0" data-brand="" selected="selected" data-constant="true">Välj en modell</option>';
    $args = array(
        'post_type' => 'modelgroup',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );
    $models = get_posts($args);

    if (!empty($models)) {
        foreach ($models as $key => $model) {
            $modelID = $model->ID;
            $title = get_the_title($model);
            $terms = wp_get_post_terms($modelID, 'brand', array('parent' => 0));

            if (!empty($terms)) {
                $brand = $terms[0]->name;
                $title = str_replace($brand . ' ', '', $title);
                $options .= '<option data-brand="' . $brand . '" value="' . $title . '" data-constant="false">' . $title . '</option>';
            }
        }
    }

    $atts = wpcf7_format_atts($atts);

    $html = sprintf(
        '<span class="wpcf7-form-control-wrap %1$s"><select %2$s>%3$s</select>%4$s</span>',
        sanitize_html_class($tag->name), $atts, $options, $validation_error);

    return $html;
}

add_filter('wpcf7_validate_select_facility_footer', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_facility_footer*', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_facility', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_facility*', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_department_footer', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_department_footer*', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_department', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_department*', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_brand_footer', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_brand_footer*', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_brand', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_brand*', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_model', 'wpcf7_select_custom_validation_filter', 10, 2);
add_filter('wpcf7_validate_select_model*', 'wpcf7_select_custom_validation_filter', 10, 2);
function wpcf7_select_custom_validation_filter($result, $tag)
{
    $tag = new WPCF7_Shortcode($tag);

    $name = $tag->name;
    $skip_validation = false;

    if (isset($_POST[$name]) && is_array($_POST[$name])) {
        foreach ($_POST[$name] as $key => $value) {
            if ('' === $value)
                unset($_POST[$name][$key]);
        }
    }

    if (isset($_POST['department'])) {
        $department = $_POST['department'];

        if ($tag->name == 'brand' || $tag->name == 'model') {
            $terms = get_terms('departments', array(
                'hide_empty' => '0',
            ));

            foreach ($terms as $term) {
                $t_id = $term->term_id;
                $term_meta = get_option("taxonomy_$t_id");
                if ($term_meta) {
                    if ($term_meta['custom_term_meta'] == '1') {
                        if ($term->name == $department) {
                            $skip_validation = true;
                        }
                    }
                }
            }
        }

        if ($tag->name == 'facility') {
            if ($department == 'VD')
                $skip_validation = true;
        }
    }

    if ($tag->name == 'model') {
        if ($_POST['brand'] == 'Begagnat') {
            $skip_validation = true;
        }
    }

    if ($tag->is_required()) {
        if (!$skip_validation) {
            if ($_POST[$name] == '0') {
                $result['valid'] = false;
                $result['reason'][$name] = wpcf7_get_message('invalid_required');
            }
        }
    }

    return $result;
}

add_action('wpcf7_before_send_mail', 'um_before_send_mail');
function um_before_send_mail($cf7)
{
    // Don't process if this field is not present
    $run_before_mail = sanitize_text_field($_POST['run_before_mail']);
    if($run_before_mail != "true"){
        return $cf7;
    }

    $department_terms = get_terms('departments', array(
        'hide_empty' => '0',
    ));
    $skip_brand_model = false;

    $emails = $option_fields['settings-emails'];

    // Don't process if there is no email addresses
    if (!$emails) {
        return $cf7;
    }

    // Post fields
    if (isset($_POST['the_post_id'])) {
        $post_id = sanitize_text_field($_POST['the_post_id']);
    } else {
        $post_id = null;
    }

    if (isset($_POST['facility'])) {
        $facility = sanitize_text_field($_POST['facility']);
    } else {
        $facility = null;
    }

    if (isset($_POST['department'])) {
        $department = sanitize_text_field($_POST['department']);
    } else {
        $department = null;
    }

    if (isset($_POST['brand'])) {
        $brand = sanitize_text_field($_POST['brand']);
    } else {
        $brand = null;
    }

    if (isset($_POST['model'])) {
        $model = sanitize_text_field($_POST['model']);
    } else {
        $model;
    }

    $email_addresses = array();

    foreach ($department_terms as $dep_term) {
        $t_id = $dep_term->term_id;
        $term_meta = get_option("taxonomy_$t_id");
        if ($term_meta) {
            if ($term_meta['custom_term_meta'] == '1') {
                if ($dep_term->name == $department) {
                    $skip_brand_model = true;
                }
            }
        }
    }

    foreach ($emails as $email) {
        $facility_match = false;
        $department_match = false;
        $brand_match = false;
        $model_match = false;

        // Maybe unnecessary check, facility should never be empty.
        if ($facility !== null) {
            foreach ($email['facility'] as $email_facility) {
                if (substr_count($email_facility->post_title, $facility) > 0) {
                    $facility_match = true;
                }
            }
        }

        // Special rule for VD
        if ($department === 'VD')
            $facility_match = true;

        // There are forms without departments,
        // in that case check the other fields.
        if ($department !== null) {
            if ($department == $email['settings-emails-department']->name) {
                $department_match = true;
            }
        } else {
            $department_match = null;
        }

        // There are certain departments that doesn't have brands and models,
        // in that case skip them.
        if (!$skip_brand_model) {
            if (!empty($email['brand'])) {
                foreach ($email['brand'] as $email_brand) {
                    if ($email_brand->parent !== 0) {
                        // Model
                        $email_model_parent = get_term_top_most_parent($email_brand->term_id, 'brand');
                        $email_model = str_replace($email_model_parent->name . ' ', '', $email_brand->name);
                        if ($model == $email_model) {
                            $model_match = true;
                        }
                    } else {
                        // Brand
                        if ($brand == $email_brand->name) {
                            $brand_match = true;
                        }
                    }
                }
            }
        } else {
            $brand_match = null;
            $model_match = null;
        }

        if ($facility_match === true
            && ($department_match === true || $department_match === null)
            && (($brand_match === true || $brand_match === null) || ($model_match === true || $model_match === null)))
        {
            $email_addresses[] = $email['email'];
        }
    }

    $recipients = '';

    if (sizeof($email_addresses) > 0) {
        for ($i = 0; $i < sizeof($email_addresses); $i++) {
            if ($i != 0) {
                $recipients .= ', ' . $email_addresses[$i];
            } else {
                $recipients .= $email_addresses[$i];
            }
        }
    }

    if ($recipients != '') {
        $mail = $cf7->prop('mail');
        $mail['recipient'] = $recipients;
        $cf7->set_properties(array('mail' => $mail));
    } else {
        $standard_address = '';
        if (have_rows('row', $post_id)) {
            while (have_rows('row', $post_id)) { the_row();
                if (have_rows('row-content')) {
                    while (have_rows('row-content')) { the_row();
                        $standard_address = get_sub_field('content-form-standard-address', $post_id);
                    }
                }
            }
            if ($standard_address !== false || $standard_address = '') {
                $mail = $cf7->prop('mail');
                $mail['recipient'] = $standard_address;
                $cf7->set_properties(array('mail' => $mail));
            }
        }
    }

    return $cf7;
}
?>

