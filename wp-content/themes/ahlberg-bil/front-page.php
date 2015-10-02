<?php
get_header();
?>

<main>
    <div class="container-fluid wrapper no-padding">
    <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
                ?>
                <div class="slideshow">
                    <?php
                        $slideshow_slides = get_field('slideshow-slides', 'options');
                        if($slideshow_slides){
                        ?>
                            <div class="flexslider">
                                <ul class="slides">
                                    
                                    <?php
                                    foreach($slideshow_slides as $slide){
                                        $link_type = $slide['slideshow-slide-linktype'];
                                        
                                        if($link_type == 'internal'){
                                            $href = $slide['slideshow-slide-pagelink'];
                                        }
                                        elseif($link_type == 'external'){
                                            $href = $slide['slideshow-slide-url'];
                                        }
                                        elseif($link_type == 'file'){
                                            $href = $slide['slideshow-slide-file'];
                                        }
                                        else {
                                            $href = '#';
                                        }
                                    ?>
                                        <li>
                                            <a href="<?php echo $href; ?>">
                                            <img class="image-<?php echo $slide['slideshow-slide-image']['id']; ?>" src="<?php echo $slide['slideshow-slide-image']['url']; ?>" alt="<?php echo $slide['slideshow-slide-image']['alt']; ?>" title="<?php echo $slide['slideshow-slide-image']['title']; ?>">
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                    
                                </ul>
                            </div>
                            
                        <?php }
                    ?>
                </div>
                <div class="main-content">
                    <?php
                        $rows = get_field('frontpage-row','options');
                        foreach($rows as $row){
                            $row_content = $row['row-content'];
                        ?>
                        <section class="<?php echo $row['row-content-background'];?> <?php echo $row['row-content']; ?>">
                            <?php
                            if($row_content=='custom'){
                            ?>
                                <div class="col-xs-12">
                                    <?php echo $row['row-content-custom']; ?>
                                </div>
                            <?php
                            }
                            elseif($row_content=='plugs'){
                                $row_content_plugs = $row['row-content-plugs'];
                                foreach($row_content_plugs as $plug){
                                    show_plug($plug->ID);
                                }
                            }
                            ?>
                        </section>
                        <?php
                        }
                    ?>                    
                </div>
                <div class="assortment">
                    <section class="blue-bg darken align-center caps">
                        <div class="col-xs-12">
                            <h2><?php echo get_field('assortment-header','options'); ?></h2>
                        <?php
                            $assortment = get_field('assortment-choice','options');
                            bytbil_show_assortment($assortment->ID);
                        ?>
                            
                        </div>
                    </section>
                </div>
                <?php              
            }
        }
    ?>
    </div>    
</main>

<?php
get_footer();
?>