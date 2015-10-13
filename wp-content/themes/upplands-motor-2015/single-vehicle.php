<?php
get_header();
$id = get_the_ID();
?>

<main id="post-<?php echo $id; ?>">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section class="section-block dark scroll" style="background: #f7f7f7 url() no-repeat center center; background-size: cover; background-size: cover;" name="">

        <div class="section-effect shadow-inner-big" style="">

            <div class="container-fluid full default-padding" style="">
                <div class="row-wrapper full ">

                    <div class="col-xs-12 col-sm-12 vehicle">

                        <div class="vehicle-header">
                            <div class="flexslider" id="slideshow-<?php echo $id; ?>" data-slideshow="otherslider">
                                <ul class="slides">
                                    <?php
                                        get_vehicle_header($id);
                                    ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; endif; ?>

</main>

<?php
get_footer();
?>
