<?php
/* Template name: Anläggningssida */
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
                            <div class="col-xs-12 col-sm-8">
                                <div class="col-container white-bg border-bottom-blue outer-shadow">
                                    <h1><?php echo the_title(); ?></h1>
                                    <?php
                                    
                                    $facility = get_field('facility-choice');
                                    $facility_fields = get_fields($facility->ID);
                                    $location = $facility_fields['facility-map'];

                                    if( !empty($location) ) {
                                    ?>
                                    
                                        <div class="acf-map-<?php echo $facility->ID; ?>">
                                            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                        </div>

                                    <?php
                                    }
                
                                    render_map($facility->ID);
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4">
                                            <?php
                                                $facility_addresses = $facility_fields['facility-address'];
                                                foreach($facility_addresses as $address){
                                                    ?>
                                                    <p>
                                                        <strong><?php echo $address['department-name']; ?></strong><br>
                                                        <?php echo $address['department-address']; ?>
                                                    </p>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-8">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4">
                                                <strong>Telefon: </strong><br>
                                                    <a href="tel:<?php echo $facility_fields['facility-telephone']; ?>"> <?php echo $facility_fields['facility-telephone']; ?></a>           
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <strong>Fax: </strong><br>
                                                    <?php echo $facility_fields['facility-telefax']; ?><br>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <strong>E-post: </strong><br>
                                                    <a href="mailto:<?php echo $facility_fields['facility-email']; ?>" > <?php echo $facility_fields['facility-email']; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <?php if(the_content()){ ?>
                                            <hr>
                                            <?php echo the_content(); ?>
                                            <hr>
                                            <?php } ?>
                                        </div>
                                        <div class="col-xs-12">
                                            <h3>Kontakta oss</h3>
                                            <?php echo get_field('facility-contact-form'); ?>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="col-container white-bg border-bottom-blue outer-shadow sidebar-menu">
                                    <h2>Öppettider</h2>
                                    <?php
                                    $facility_departments = $facility_fields['facility-departments'];
                                    foreach ($facility_departments as $department){
                                        $open_hours = $department['department-openhours'];
                                        ?>                                        
                                            <h4><?php echo $department['department-name']; ?></h4>
                                            <p>
                                            <?php
                                            foreach($open_hours as $open_hour){
                                            ?>
                                                
                                                <strong><?php echo $open_hour['openhours-text']; ?></strong><br>
                                                <?php echo $open_hour['openhours-time']; ?><br>
                                                
                                            <?php
                                            }
                                            ?>
                                            </p>
                                        <?php
                                    }
                                    if($facility_fields['facility-extra-information']){
                                        echo $facility_fields['facility-extra-information'];
                                    }                                    
                                    ?>
                                </div>
                                
                            </div>
                            <?php
                            $sidebar = get_field('sidebar');
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