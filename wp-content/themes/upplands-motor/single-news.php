<?php
get_header();
$id = get_the_ID();
?>

<main id="post-<?php echo $id; ?>">

    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>
            <section class="section-block">
                <div class="container-fluid full">
                    <div class="col-xs-12">
                        <div id="slideshow-<?php echo get_the_ID(); ?>" class="flexslider">
                            <ul class="slides">
                            <?php
                                /*
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'slideshow-hd' );                        
                                $image_ratio = round($image[1]/$image[2], 2);

                                if($image_ratio != 2.76 && $image[1] >= 960 && $image[2] >= 348){
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'slideshow-default' );                        
                                }
                                elseif($image_ratio != 2.76 && $image[1] >= 320 && $image[2] >= 116){
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'slideshow-sd' );                        
                                }
                                */
                                ?>
                                <li class="">
                                    <img class="slideshow-image" src="<?php echo $image[0]; ?>"/>
                                    <div class="caption-wrapper">
                                        <div class="caption" data-animation="fade">
                                            <div class="vertical-align-wrapper">
                                                <div class="vertical-align center">
                                                    <div class="horizontal-align">
                                                        <div class="caption-contents">
                                                            <h2><?php the_title(); ?></h2>
                                                            <hr>
                                                            <p><?php echo get_custom_excerpt(get_the_excerpt(), 120); ?>...</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php
                        init_slideshow(get_the_ID(), 'fade', 8000, 600, true);
                        ?>
                    </div>
                </div>
            </section>
            <section id="sub_menu" class="scroll-menu">
                <div class="submenu-wrapper">
                    <div class="submenu-title">
                        <h1 class="page-title">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                </div>
            </section>
            <section class="section-block white">
                <div class="container-fluid wrapper">
                    <div class="row-wrapper">
                        <div class="col-xs-12">
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        }
    }
    ?>

</main>

<?php
get_footer();
?>
