<?php

class Multisite_Content_Push_CPT_Push extends Multisite_Content_Push_Page_Push
{

    private $post_type;
    private $push_terms;

    public function __construct($orig_blog_id, $args)
    {
        parent::__construct($orig_blog_id, $args);

        $settings = wp_parse_args($args, $this->get_defaults_args());

        if (empty($settings['post_type']))
            return false;

        extract($settings);

        $this->post_type = $post_type;
        $this->push_terms = $push_terms;
        $this->post_ids = is_array($post_ids) ? $post_ids : array($post_ids);
        $this->push_images = $push_images;
        $this->push_parents = $push_parents;
        $this->update_date = $update_date;
        $this->push_comments = $push_comments;
    }

    protected function get_defaults_args()
    {
        $defaults = parent::get_defaults_args();
        $defaults['post_type'] = false;
        $defaults['push_terms'] = false;
        return $defaults;
    }

    public function push($post_id)
    {
        $results = parent::push($post_id);

        $new_post_id = $results['new_post_id'];
        $new_parent_post_id = $results['new_parent_post_id'];

        // Copy terms?
        if ($this->push_terms) {

            if (absint($new_parent_post_id)) {
                // Copy parents terms
                $parent_post_id = $this->get_orig_post_parent($post_id);
                if ($parent_post_id)
                    $this->push_terms($parent_post_id, $new_parent_post_id);
            }

            // Copy child terms
            $this->push_terms($post_id, $new_post_id);

        }

        return $results;
    }

}