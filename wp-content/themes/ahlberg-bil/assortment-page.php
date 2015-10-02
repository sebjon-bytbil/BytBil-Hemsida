<?php
/* Template name: Fordonsurval */
get_header();
?>

<main>
    <div class="container-fluid wrapper no-padding">
    <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
                ?>
                <div class="main-content">
                    <section class="grey-bg">
                        <div class="main-content">
                            <?php
                                $sidebar = get_field('sidebar');
                                if($sidebar){
                                    $content_class = 'col-sm-8';
                                }
                                else {
                                    $content_class = 'col-sm-12';
                                }
                                ?>
                                <div class="col-xs-12 <?php echo $content_class; ?>">
                                    <div class="col-container white-bg border-bottom-blue outer-shadow">

                                        <h1><?php echo the_title(); ?></h1>
                                        <?php echo the_content(); ?>
                                        <?php
                                            $assortment = get_field('assortment-choice');
                                            bytbil_show_assortment($assortment->ID);
                                        ?>
                                    </div>
                                </div>
                                <?php
                                if($sidebar){ ?>
                                    <div class="col-xs-12 col-sm-4 pull-right">
                                    <?php
                                        if($sidebar){
                                            foreach($sidebar as $row){
                                                ?>                                                
                                                    
                                                    <?php
                                                    $sidebar_content = $row['sidebar-content'];
                                                    if($sidebar_content == 'menu'){
                                                        ?>
                                                        <div class="col-container white-bg outer-shadow sidebar-menu <?php echo $row['sidebar-border-color']; ?>">
                                                            <?php
                                                            wp_nav_menu( array(
                                                                'theme_location' => 'primary',
                                                                'sub_menu' => true,
                                                                'menu_class' => 'side-menu'
                                                            ) );
                                                            ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    elseif($sidebar_content == 'plugs'){
                                                        $row_content_plugs = $row['sidebar-plugs'];
                                                        foreach($row_content_plugs as $plug){
                                                            show_plug($plug->ID, true);
                                                        }
                                                    }
                                                    elseif($sidebar_content == 'custom'){
                                                        ?>
                                                        <div class="col-container <?php echo $row['sidebar-border-color'] . ' ' . $row['sidebar-background-color']; ?> outer-shadow sidebar-menu ">
                                                            <?php echo $row['sidebar-custom']; ?>
                                                            
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                            <?php
                                            }
                                        }
                                    ?>
                                    </div>
                                <?php
                                }
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