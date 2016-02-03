<?php

get_header();

?>

    <div id="content">

        <div class="container-fluid">
            <div class="col-xs-12" style="text-align: center;">
                <?php /* If there are no posts to display, such as an empty archive page */ ?>
                <?php if (!have_posts()) : ?>
                    <h1>404 - Sidan hittades inte</h1>
                    <p><strong>Vi ber om ursäkt!</strong><br/> Sidan du försökte besöka kan inte hittas - den kan ha
                        tagits bort eller så kan adressen vara fel.</p><p>Besök gärna vår <a
                            href="<?php echo get_home_url(); ?>">Startsida</a> för att hitta det du söker eller våra
                        genvägar till de vanligste sidorna nedan.</p>
                    <?php /* Initiera huvudmenyn */
                    wp_nav_menu(array(
                            'menu' => 'Huvudmeny',
                            'depth' => 1,
                            'container' => false,
                            'menu_class' => 'menu-404')
                    );
                    ?>
                <?php endif; ?>

                <?php while (have_posts()) : the_post(); ?>

                    <div class="post">
                        <h1><?php the_title(); ?> <span
                                class="date pull-right"><?php echo get_the_date('Y-m-d'); ?></span></h1>
                        <?php if (is_archive() || is_search()) : // Only display excerpts for archives and search. ?>
                            <?php the_excerpt(); ?>
                        <?php else : ?>
                            <?php the_content('Read More'); ?>
                        <?php endif; ?>
                    </div><!-- post -->

                <?php endwhile; ?>
            </div>

        </div>

    </div>

<?php get_footer(); ?>