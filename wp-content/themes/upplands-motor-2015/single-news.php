<?php
get_header();
$id = get_the_ID();

$prevPage = get_field("news-settings-back-page", $id);
$prevPageLink = get_permalink($prevPage->ID);
$prevPageTitle = $prevPage->post_title;
?>

<?php include_once 'plugins/bytbil-content-management/layouts/share_form.php'; ?>

<main id="post-<?php echo $id; ?>">

    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>
            <section class="section-block">
                <div class="container-fluid full">
                    <div class="col-xs-12">
                        <div id="slideshow-<?php echo get_the_ID(); ?>" class="flexslider" data-slideshow="otherslider">
                            <ul class="slides">
                            <?php

                                $image_hd = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'slideshow-hd');
                                $image_default = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'slideshow-default');
                                $image_sd = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'slideshow-sd');

                                ?>
                                <li class="">
                                    <img class="slideshow-image" src="<?php echo $image_sd[0] ?>" srcset="<?php echo $image_sd[0]; ?> 500w, <?php echo $image_default[0]; ?> 1000w, <?php echo $image_hd[0]; ?> 2000w" />
                                    <div class="caption-wrapper">
                                        <div class="caption" data-animation="fade">
                                            <div class="vertical-align-wrapper">
                                                <div class="vertical-align center">
                                                    <div class="horizontal-align">
<!--                                                        <div class="caption-contents">-->
<!--                                                            <h2>--><?php //the_title(); ?><!--</h2>-->
<!--                                                            <hr>-->
<!--                                                            <p>--><?php //echo get_custom_excerpt(get_the_excerpt(), 120); ?><!--...</p>-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section id="sub_menu" class="scroll-menu">
                <div class="submenu-wrapper">
                    <div class="submenu-title">
                        <h1 class="page-title">
                            <?php if($prevPage) { ?>
                                <a class="back-link light" href="<?php echo $prevPageLink; ?>" >
                                    <i class="icon icon-chevron-thin-left"></i><span class="back-link-title"><?php echo $prevPageTitle; ?></span>
                                </a>
                            <?php } ?>
                            <?php the_title(); ?>
                        </h1>
                        <div class="right-title-buttons">
                            <div class="bb-share" onclick="getShareOptions('#shareLinks_1');">
                                <div class="bb-share-links" id="shareLinks_1"></div>
                                <div class="round-button">
                                    <i class="icon icon-share-alternative"></i>
                                </div>
                                <p class="button-text">Dela</p>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
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
