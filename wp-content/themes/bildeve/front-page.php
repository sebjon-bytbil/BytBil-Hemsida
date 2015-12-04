<?php
get_header();
$dir = get_template_directory_uri();
?>

<main>
    
    <!--<div class="container">-->

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; endif; ?>
        
    <!--</div>-->
    
    <!--<div class="container-fluid marked">
        <div class="wrapper breadcrumbs">

            <div class="row">

                <div class="col-xs-12 col-sm-4 hidden-xs">
                    <div class="sharing">
                        Dela sidan:
                        <a href="https://www.facebook.com/bildeve?fref=ts" target="_blank"><img src="<?php echo $dir; ?>/images/icon-facebook.png" /></a>
                        <a href="https://www.twitter.com/bildeve" target="_blank"><img src="<?php echo $dir; ?>/images/icon-twitter.png" /></a>
                        <a href="#"><img src="<?php echo $dir; ?>/images/icon-envelope.png" /></a>
                    </div>
                </div>

            </div>

        </div>
    </div>-->
    
</main>

<?php get_footer(); ?>
