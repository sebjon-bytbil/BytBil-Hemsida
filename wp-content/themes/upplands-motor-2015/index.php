<?php
get_header();
?>
<main>
    <section class="section-block padded-block white">
        <div class="container-fluid wrapper">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <?php $current_post_type = get_post_type(get_the_ID()); ?>

            <div class="post post-type-<?php echo $current_post_type; ?>" id="post-<?php the_ID(); ?>">
                <h1><?php echo get_post_type_object($current_post_type)->labels->name; ?>: <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to
                    <?php the_title(); ?>"><?php the_title(); ?></a> <small><span class="pull-right button btn btn-red"><?php edit_post_link('Redigera'); ?></span></small></h1>

                <?php
                    if($current_post_type == 'slideshow'){
                        bytbil_show_slideshow(get_the_ID());
                    }
                ?>

                <div class="entry">
                    <?php the_content('Read the rest of this entry »'); ?>
                </div>
                <small>Skapat den: <?php the_time('F jS, Y') ?> av <?php the_author(); ?></small>

            </div>

            <?php endwhile; ?>

            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('« Previous Entries') ?></div>
                <div class="alignright"><?php previous_posts_link('Next Entries »') ?></div>
            </div>

            <?php else : ?>
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>
            <?php include (TEMPLATEPATH . "/searchform.php"); ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();
?>
