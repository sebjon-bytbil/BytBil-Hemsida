<?php
$plugs = get_sub_field('content-plugs');

if (is_page('kontakt')) : ?>
    <section id="welcome" class="darkgray">
        <div class="container-fluid">
            <div class="col-xs-12 col-sm-5 col-md-6">
                <h2>Om <?php echo get_field('retailer-name', 'options'); ?></h2>
                <p><?php echo get_field('retailer-about', 'options'); ?></p>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-6">
                <?php
                foreach ($plugs as $plug){
                    show_plug($plug->ID);
                } ?>
            </div>
        </div>
    </section>
<?php else : 
    foreach ($plugs as $plug){
        show_plug($plug->ID);
    }
endif;

?>
