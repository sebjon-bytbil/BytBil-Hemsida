<?php $dir = get_template_directory_uri(); ?>

    <div class="row">

        <div class="col-xs-12 col-sm-8">
            <?php the_breadcrumbs(); ?>
        </div>

        <div class="col-xs-12 col-sm-4 hidden-xs">
            <div class="sharing">
                Dela sidan:
                <a href="https://www.facebook.com/bildeve?fref=ts" target="_blank"><img src="<?php echo $dir; ?>/images/icon-facebook.png" /></a>
                <a href="https://www.twitter.com/bildeve" target="_blank"><img src="<?php echo $dir; ?>/images/icon-twitter.png" /></a>
                <a href="#"><img src="<?php echo $dir; ?>/images/icon-envelope.png" /></a>
            </div>
        </div>

    </div>
