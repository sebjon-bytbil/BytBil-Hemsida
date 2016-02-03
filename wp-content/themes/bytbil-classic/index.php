<?php

get_header();

?>

    <div id="content">
        <div class="container-fluid">
            <div class="col-xs-12 col-md-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <h1><?php the_title(); ?><?php if (get_post_type(get_the_ID() == 'nyheter')) { ?>
                            <span class="date pull-right"><?php echo get_the_date('Y-m-d'); ?></span>
                        <?php } ?></h1>
                    <?php the_content(); ?>

                <?php endwhile;
                else: ?>

                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="column-container">

                    <?php
                    if (have_rows('puffar', $frontpageID)):
                        while (have_rows('puffar', $frontpageID)): the_row(); ?>

                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <a class="plug" href="<?php

                                if (get_sub_field('plug_link-type') == 'internal') :
                                    the_sub_field('plug_pagelink-url');
                                elseif (get_sub_field('plug_link-type') == 'external') :
                                the_sub_field('plug_link-url');
                                ?>" target="_blank <?php
                                endif;

                                ?>">

                                    <?php
                                    if (get_sub_field('plug_img-type') == 'icon') : ?>
                                        <span class="plug-icon">
                                	<i class="fa <?php the_sub_field('plug_icon'); ?> fa-fw"></i>
                                </span>
                                        <span class="plug-icon-text">
									<?php the_sub_field('plug_text'); ?>
                                </span>
                                    <?php
                                    elseif (get_sub_field('plug_img-type') == 'img') : ?>
                                        <span class="plug-icon">
                                	<img src="<?php the_sub_field('plug_image'); ?>"/>
                                </span>
                                        <span class="plug-icon-text">
									<?php the_sub_field('plug_text'); ?>
                                </span>
                                    <?php
                                    else : ?>
                                        <span class="plug-text">
                                    <?php the_sub_field('plug_text'); ?>
                                </span>

                                    <?php endif; ?>

                                </a>

                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>

<?php get_footer(); ?>