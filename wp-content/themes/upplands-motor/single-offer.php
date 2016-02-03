<?php
get_header();
$id = get_the_ID();
?>

<main id="post-<?php echo $id; ?>">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
        $rows = get_field('row');
        if ($rows) {
            get_offer_slider($id);
            get_offer_submenu($id, true);
            get_single_offer_content($id);
            bytbil_content_loop(true, false);
        } else {
            get_offer_slider($id);
            get_single_offer_content($id);
        }
        ?>
        

    <?php endwhile; endif; ?>
    <?php init_slideshow($id); ?>

</main>

<?php
get_footer();
?>
