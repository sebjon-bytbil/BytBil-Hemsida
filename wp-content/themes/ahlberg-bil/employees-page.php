<?php
/* Template name: Personalsida */
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
                            $facility = get_field('employee-facilities');
                            $show_header = get_field('employee-list-show-header');
                            $employee_choice = get_field('employee-choice');
                            
                
                            if($sidebar || $facility){
                                $col_class = 'col-sm-8';
                            }
                            else {
                                $col_class = 'col-sm-12';
                            }
                
                            ?>
                            <div class="col-xs-12 <?php echo $col_class; ?>">
                                <div class="col-container white-bg border-bottom-blue outer-shadow">
                                    <h1><?php echo the_title(); ?></h1>
                                    <?php the_content(); ?>
                                    <?php
                                    if($employee_choice == 'employee-list'){
                                        $employee_list = get_field('employee-list_2');
                                        foreach($employee_list as $list){
                                            $employee_fields = get_fields($list->ID);
                                            $employees = $employee_fields['employee-list-employees'];
                                            if($employee_fields['employee-list-header'] && $show_header == true){
                                                echo '<h3>' . $employee_fields['employee-list-header'] . '</h3>';
                                            }
                                            ?>
                                            <div class="row">
                                            <?php
                                            foreach($employees as $employee){
                                                if($sidebar || $facility){
                                                    show_employee($employee->ID, true);
                                                }
                                                else {
                                                    show_employee($employee->ID, false);
                                                }
                                            }
                                            ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    elseif($employee_choice == 'employees'){
                                        $employees = get_field('employee-employees');
                                        ?>
                                        <div class="row">
                                        <?php
                                        foreach($employees as $employee){
                                            if($sidebar || $facility){
                                                show_employee($employee->ID, true);
                                            }
                                            else {
                                                show_employee($employee->ID, false);
                                            }
                                        }
                                        ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <?php
                            if($sidebar || $facility) {
                            ?>
                                <div class="col-xs-12 col-sm-4 pull-right">
                                    <div class="row">
                                    <?php
                                    if($facility){ ?>
                                    <div class="col-xs-12">
                                        <div class="col-container white-bg outer-shadow sidebar-menu border-bottom-blue">
                                            <?php

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
                                                <div class="col-xs-12 col-sm-12">
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
                                                <div class="col-xs-12 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
                                                        <strong>Telefon: </strong><br>
                                                            <a href="tel:<?php echo $facility_fields['facility-telephone']; ?>"> <?php echo $facility_fields['facility-telephone']; ?></a>           
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12">
                                                            <strong>Fax: </strong><br>
                                                            <?php echo $facility_fields['facility-telefax']; ?><br>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12">
                                                            <strong>E-post: </strong><br>
                                                            <a href="mailto:<?php echo $facility_fields['facility-email']; ?>" > <?php echo $facility_fields['facility-email']; ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>    
                                    <?php
                                    if($sidebar){ ?>
                                        <div class="col-xs-12">
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
                                    <?php } ?>
                                    
                                        
                                    </div>                                    
                                </div>
                            <?php } ?>
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