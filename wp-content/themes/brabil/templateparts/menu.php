<?php
$logotype = get_field('settings-logotype','options');
$brands = get_field('settings-brands','options');
?>

<header>
        <div class="navbar navbar-fixed-top visible-xs">

            <a class="navbar-brand " href="/">
                <img class="logotype" src="<?php echo $logotype['url']; ?>" alt="<?php bloginfo( 'name'); ?> | <?php bloginfo( 'description'); ?>" title="<?php bloginfo( 'name'); ?> | - <?php bloginfo( 'description'); ?>">
            </a>

            <button type="button" class="navbar-toggle btn-blue offcanvas-toggle pull-right " data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas" style="float:left;">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <nav class="navbar navbar-default navbar-offcanvas navbar-offcanvas-touch navbar-offcanvas-fade navbar-fixed-top" role="navigation" id="js-bootstrap-offcanvas">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <img class="logotype" src="<?php echo $logotype['url']; ?>" alt="<?php bloginfo( 'name'); ?> | <?php bloginfo( 'description'); ?>" title="<?php bloginfo( 'name'); ?> | - <?php bloginfo( 'description'); ?>">
                    </a>
                    <button type="button" class="navbar-toggle btn btn-blue offcanvas-toggle pull-right  offcanvas-toggle-close" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas" style="float:left;">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="ion ion-ios-close-empty"></i>
                    </button>
                </div>
                <div>
                <?php
                    wp_nav_menu( array(
                        'menu'              => 'header-menu',
                        'theme_location'    => 'header-menu',
                        'depth'             => 3,
                        'container'         => 'div',
                        'container_class'   => '',
                        'container_id'      => '',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                ?>
                    
                </div>

                <div class="navbar-brand-logos">
                    
                    <?php
                        foreach($brands as $brand){
                            ?>
                            <a href="<?php echo $brand['brands-link']; ?>" class="brand" target="<?php echo $brand['brands-target']; ?>">
                                <img src="<?php echo $brand['brands-logotyp']['url']; ?>" alt="<?php echo $brand['brands-logotyp']['alt']; ?>" title="<?php echo $brand['brands-logotyp']['title']; ?>" class="brand-logo">
                            </a>
                            <?php
                        }

                    ?>

                </div>
            </div>
        </nav>
    </header>