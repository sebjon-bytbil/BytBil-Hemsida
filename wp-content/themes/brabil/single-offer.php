<?php get_header(); ?>

    <main>

        <section>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <!-- post -->               
            <div class="container-full">
                <?php
                $id = get_the_ID();
                $offer_image = get_field('offer-image', $id);
                if ($offer_image) {
                    $image_url = $offer_image['url'];
                    $image_full_url = $offer_image['url'];
                    $image_medium_url = $offer_image['sizes']['offer'];
                }

                $overlay_background_color = 'background: transparent;';
                $overlay_background = get_field('offer-overlay-color', $id);
                $overlay_opacity = get_field('offer-overlay-opacity', $id);

                if ($overlay_opacity != 100) {
                    $opacity = $overlay_opacity * 0.01;
                    $overlay_background_color = 'background: ' . brabil_hex2rgba($overlay_background, $opacity) . ';';
                } else {
                    $overlay_background_color = $overlay_background;
                }

                // Caption
                $caption_background_color = 'background: transparent;';
                $caption_content = get_field('offer-caption-content', $id);
                $caption_background = get_field('offer-caption-color', $id);
                $caption_opacity = get_field('offer-caption-opacity', $id);
                $caption_animation = get_field('offer-caption-animation', $id);
                $caption_border = get_field('offer-caption-border', $id);
                $caption_position = get_field('offer-caption-position', $id);

                // Caption color
                if ($caption_opacity != 100) {
                    $opacity = $caption_opacity * 0.01;
                    $caption_background_color = 'background: ' . brabil_hex2rgba($caption_background, $opacity) . ';';
                } else {
                    $caption_background_color = $caption_background;
                }

                if ($caption_background === '') {
                    $caption_background_color = 'background: transparent;';
                }

                // Caption border
                if ($caption_border === 'true') {
                    $caption_border_color = 'border: 10px solid ' . brabil_hex2rgba($caption_background, 0.75) . ';';
                } else {
                    $caption_border_color = 'border: none;';
                }

                // Caption style
                if ($caption_background_color !== '' || $caption_border_color !== '') {
                    $caption_style = $caption_background_color . $caption_border_color;
                }
                ?>

                <div class="flexslider">
                    <ul class="slides">
                        <li style="display:block !important;">
                            <img src="<?php echo $image_url; ?>"
                                 srcset="<?php echo $image_full_url; ?> 1000w, <?php echo $image_medium_url; ?> 500w"
                                 alt=""
                                 title="" />
                            <div class="caption-wrapper">
                                <div class="caption" data-animation="<?php echo $caption_animation; ?>">
                                    <div class="vertical-align-wrapper" style="<?php echo $overlay_background_color; ?>">
                                        <div class="vertical-align <?php echo $caption_position; ?>">
                                            <div class="horizontal-align">
                                                <div class="caption-contents" style="<?php echo $caption_style; ?>"><?php echo $caption_content; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid wrapper align-center">
                <?php the_content(); ?>
            </div>
                <?php endwhile; ?>
                <!-- post navigation -->
                <?php else: ?>
                <!-- no posts found -->
                <?php endif; ?>
        </section>
    </main>

<?php get_footer(); ?>