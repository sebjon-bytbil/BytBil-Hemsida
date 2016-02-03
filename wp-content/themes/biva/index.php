<?php get_header(); ?>
<?php
$dir = get_template_directory_uri();
?>

<?php bytbil_init_slideshows(); ?>

<?php $topImage = get_post_meta($post->ID, 'top-image', true); ?>
	<div id="backdrop" <?php if (!empty($topImage)) {
    echo 'style="background-image: url(' ?><?php the_field('top-image'); ?><?php echo ')"';
} ?>>
    </div>  
         
    <div id="content">
        <div class="wrapper">
        	<div class="container-fluid">
            	<div class="col-xs-12">
                	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				</div>
                <div class="hidden-xs col-sm-3 col-first" style="display: none;">
                   
                    <?php
$args = array(
    'theme_location' => 'primary',
    'start_in' => $ID_of_page,
    'container-class' => 'main-nav',
    'menu_class' => 'nav submenu',
);

wp_nav_menu($args);
?>
                    
                    
                </div>
                <div class="col-xs-12 col-sm-9" style="padding-left: 0;">
                    
                    <?php while (have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
<?php endwhile; ?>
                    
                </div>
            </div>        	
        </div>
    </div>

    <div id="bottom-plugs">
        <div class="wrapper">
            <div class="container-fluid offer">                    <!-- Vi erbjuder dig -->
                <!--<div class="col-xs-12 col-md-6 column-double">
                <?php echo do_shortcode('[slider name=Erbjudanden]'); ?>
            </div>

            <?php
                if (have_rows('puff', 49)):
                    while (have_rows('puff', 49)): the_row(); ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 column">
                        <a href="<?php the_sub_field('puff-link'); ?>"
                           class="offer-text <?php the_sub_field('puff-colour'); ?>">
                            <h4><?php the_sub_field('puff-header'); ?></h4>
                            <img src="<?php the_sub_field('puff-image'); ?>"/>

                            <p><?php the_sub_field('puff-message'); ?></p>
                            <button><?php the_sub_field('puff-linklabel'); ?>&nbsp;&nbsp;<i
                                    class="fa fa-angle-right"></i></button>
                        </a>
                    </div>
                <?php endwhile;
                else :
                endif;
                ?>-->

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 column-double right">
                        <?php bytbil_show_slideshow(5244); ?>
                    </div>

                    <?php bytbil_show_plug(5252, 6); ?>

                    <?php bytbil_show_plug(5250, 6); ?>
                </div>

            </div>
        </div>
    </div>

    <div id="brands" class="brands-lower" style="padding-top: 10px;">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="col-xs-12 brands">
                    <?php
                    $args = array(
                        'post_type' => 'brand',
                        'posts_per_page' => -1,
                        'caller_get_posts'=> 1,
                        'orderby' => 'title',
                        'order' => 'asc',
                    );

                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                            <a href="<?php the_field('brand_link'); ?>"
                               title="Besök <?php the_field('brand_name'); ?>s hemsida" target="_blank">
                                <img src="<?php the_field('brand_image'); ?>"
                                     alt="Besök <?php the_field('brand_name'); ?>s hemsida">
                            </a>
                            <?php
                        endwhile;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>