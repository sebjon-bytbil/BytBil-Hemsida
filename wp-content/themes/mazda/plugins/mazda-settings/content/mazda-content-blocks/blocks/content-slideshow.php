<?php

$slideshow = get_sub_field('slideshow');

if ($slideshow) : ?>

    <section id="slideshow" class="flexslider">
        <ul class="slides">
        <?php bytbil_show_slideshow($slideshow); ?>
        </ul>
    </section>

<?php endif; ?>

