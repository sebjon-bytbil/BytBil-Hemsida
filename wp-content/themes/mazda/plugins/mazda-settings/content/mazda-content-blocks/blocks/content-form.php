<?php
$form = get_sub_field('form');
if ($form) :
    $shortcode = '[contact-form-7 id="' . $form->ID . '" title="' . $form->post_title . '"]'; ?>
    <h2><?php echo $form->post_title; ?></h2>
    <?php echo do_shortcode($shortcode);
endif;
?>

