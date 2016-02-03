<?php
$dir = get_template_directory_uri();
?>

<div id="brands" class="brands-lower" style="padding-top: 10px;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="col-xs-12 brands">
                <?php
                $args = array(
                    'post_type' => 'brand',
                    'posts_per_page' => -1,
                    'caller_get_posts'=> 1,
                    'orderby' => 'title',
                    'order' => 'asc',
                );

                $my_query = new WP_Query($args);

                $posts_count = $my_query->found_posts;

                if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post();

                        $brand_title = get_the_title();

                        if($brand_title != "Saab") {
                            ?>

                            <a href="<?php the_field('brand_link'); ?>" style="width: <?php echo 100 / ($posts_count-1); ?>%"
                               title="Bes&ouml;k <?php echo get_the_title(); ?>s hemsida" target="_blank">
                                <img src="<?php the_field('brand_image'); ?>"
                                     alt="Bes&ouml;k <?php echo get_the_title(); ?>s hemsida">
                            </a>
                            <?php

                        }
                    endwhile;
                }
                ?>
            </div>
        </div>
    </div>
</div>