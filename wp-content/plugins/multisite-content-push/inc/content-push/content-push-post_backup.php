<?php

class Multisite_Content_Push_Post_Push extends Multisite_Content_Push_Page_Push
{

    private $push_terms;

    public function __construct($orig_blog_id, $args)
    {
        parent::__construct($orig_blog_id, $args);

        $settings = wp_parse_args($args, $this->get_defaults_args());

        extract($settings);

        $this->push_terms = $push_terms;
    }

    protected function get_defaults_args()
    {
        $defaults = parent::get_defaults_args();
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