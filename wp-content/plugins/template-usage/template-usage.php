<?php
/*
Plugin Name: Template usage
Plugin URI: http://www.albert.nu/stuff/wordpress/plugins/template-usage/
Description: Display the usage of templates for the site administrator. Helps cleaning up old templates.
Version: 1.0
Author: Albert Bertilsson
Author URI: http://www.albert.nu/
*/

/*  Copyright 2012 Albert Bertilsson (email : abbe_something@hotmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!class_exists("ABTemplateUsage")) {

    class ABTemplateUsage
    {

        function create_menu()
        {
            add_options_page('Template Usage', 'Template Usage', 'manage_options', 'ab-template-usage', array($this, 'main_page'));
        }

        function main_page()
        {
            global $post;
            ?>
            <div class="wrap">
                <div id="icon-edit-pages" class="icon32"></div>
                <h2>Template Usage</h2>
                <br>
                <?php
                $templates = get_page_templates();
                if (isset($templates)) {

                ?>
                <h3><?php _e('All templates') ?></h3>
                <table class="widefat">
                    <tbody>
                    <thead>
                    <tr>
                        <th><?php _e('Template name') ?></th>
                        <th><?php _e('Template file') ?></th>
                        <th><?php _e('Pages') ?></th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th><?php _e('Template name') ?></th>
                        <th><?php _e('Template file') ?></th>
                        <th><?php _e('Pages') ?></th>
                    </tr>
                    </tfoot>
                    <?php

                    foreach (array_keys($templates) as $template) {
                        $file = $templates[$template];

                        $args = array(
                            'showposts' => -1,
                            'post_type' => 'page',
                            'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash'),
                            'meta_key' => '_wp_page_template',
                            'meta_value' => $file
                        );

                        $count = 0;

                        $the_query = new WP_Query($args);

                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            $count++;
                        }

                        wp_reset_postdata();

                        echo '<tr><td>';
                        echo "<a href=\"#$file\">$template</a>";
                        echo '</td><td>';
                        echo $file;
                        echo '</td><td>';
                        echo $count;
                        echo '</td></tr>';
                    }

                    echo '</tbody></table>';



                    ?>
                    <br>

                    <h3><?php _e('All pages') ?></h3>
                    <table class="widefat">
                        <tbody>
                        <thead>
                        <tr>
                            <th><?php _e('Template name') ?></th>
                            <th><?php _e('Template file') ?></th>
                            <th><?php _e('Page') ?></th>
                            <th><?php _e('Status') ?></th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th><?php _e('Template name') ?></th>
                            <th><?php _e('Template file') ?></th>
                            <th><?php _e('Page') ?></th>
                            <th><?php _e('Status') ?></th>
                        </tr>
                        </tfoot>
                        <?php

                        $lastfile = '';
                        foreach (array_keys($templates) as $template) {
                            $file = $templates[$template];

                            $args = array(
                                'showposts' => -1,
                                'post_type' => 'page',
                                'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash'),
                                'meta_key' => '_wp_page_template',
                                'meta_value' => $file
                            );

                            $the_query = new WP_Query($args);

                            while ($the_query->have_posts()) {
                                $the_query->the_post();

                                echo '<tr><td>';
                                if ($lastfile != $file) echo "<a name=\"$file\">";
                                echo $template;
                                echo '</td><td>';
                                echo $file;
                                $status = $post->post_status;
                                echo '</td><td>';
                                if ($status != 'trash') {
                                    edit_post_link(get_the_title());
                                    echo '<small><a href="' . get_permalink() . '" target="_blank"> (view)</a></small>';
                                } else
                                    the_title();

                                $color = '';
                                if ($status == 'trash') $color = 'red';
                                if ($status == 'pending') $color = 'orange';
                                if ($status == 'draft') $color = 'blue';
                                if ($color != '')
                                    echo "</td><td style=\"color: $color;\">";
                                else
                                    echo '</td><td>';
                                echo $status;
                                echo '</td></tr>';
                            }

                            wp_reset_postdata();

                            $lastfile = $file;
                        }

                        echo '</tbody></table>';
                        }
                        ?>

                        <br>

                        <div class="info">
                            Template Usage version 1.0 Developed by Albert Bertilsson in 2012
                        </div>

            </div>
        <?php
        }

    }

}


$ab_template_usage = new ABTemplateUsage();

if (isset($ab_template_usage)) {
    // create the menu
    add_action('admin_menu', array($ab_template_usage, 'create_menu'));
}

?>
