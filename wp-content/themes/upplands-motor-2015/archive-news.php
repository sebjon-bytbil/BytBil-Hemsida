<?php
get_header();
?>
<main>
    <?php
    $page_id = get_the_ID();
    if (have_posts()) { ?>
    <section class="section-block">
        <div class="container-fluid full">
            <div class="col-xs-12">
                <div id="slideshow-<?php echo $page_id; ?>" class="flexslider" data-slideshow="otherslider">
                    <ul class="slides">
                    <?php
                        while (have_posts()) {
                            the_post();
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slideshow-hd' );                        
                            $image_ratio = round($image[1]/$image[2], 2);
                            
                            if($image_ratio != 2.76 && $image[1] >= 960 && $image[2] >= 348){
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slideshow-default' );                        
                            }
                            elseif($image_ratio != 2.76 && $image[1] >= 320 && $image[2] >= 116){
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slideshow-sd' );                        
                            }
                            
                            ?>
                            <li class="">
                                <a href="<?php the_permalink(); ?>">
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
                                </a>
                            </li>
                            <?php
                        }
                    ?>    
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    ?>    
    <section id="sub_menu" class="scroll-menu page-menu">
        <div class="submenu-wrapper">
            <div class="submenu-title">
                <h1 class="page-title">
                    <?php
                    echo "Nyheter och press";
                    if (is_day()) {
                        echo ' ';
                        the_time('j F Y');
                    } elseif (is_month()) {
                        echo ' ';
                        the_time('F Y');                      
                    } elseif (is_year()) {
                        echo ' ';
                        the_time('Y');
                    }

                    ?>
                </h1>
            </div>
        </div>
    </section>
    <section class="section-block">
        <div class="container-fluid wrapper">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <?php $current_post_type = get_post_type(get_the_ID());
            $image_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slideshow-default' );
            ?>

            <div class="row post news-post post-type-<?php echo $current_post_type; ?>" id="post-<?php the_ID(); ?>">
                <div class="row-flex">
                    <div class="hidden-xs col-sm-3 flex-col col-img-bg news-thumb" style="background-image: url('<?php echo $image_thumb[0]; ?>');">
                    </div>
                    <div class="col-xs-12 col-sm-9 flex-col news-content">
                        <h2>
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                            <?php the_title(); ?>
                            </a>
                        </h2>
                       
                        <p class="news-date"><strong><?php the_time('j F Y') ?></strong></p>
                        <p class="news-excerpt"><?php echo get_custom_excerpt(get_the_excerpt(), 180); ?>...</p>
                        
                    </div>
                </div>
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
