<div id="mobileMenu" class="side-menu-container">
    

    <div class="mobile-logo">
        <!--<img src="<?php bloginfo('template_url'); ?>/images/volvo-logo-new.png"/> -->
        <img class="header-logo"
             style="max-height:<?php the_field('logo_height', 'options'); ?>; max-width:<?php the_field('logo_width', 'options'); ?>;"
             src="<?php the_field('logo', 'options'); ?>"/>
    </div>
    
    <?php

    if($page_menu==true){
        ?>
    
        <div class="page-menu">
            <h4><?php the_title(); ?></h4>
            <?php echo wpb_list_child_pages(true); ?>
            <?php new_volvo_menu('bilmeny', true, '', false); ?>
        </div>
    
    <?php
    }
    ?>
    
    <?php
        $menus = array(
            'bottom-explore' => 'Utforska bil',
            'bottom-buy' => 'Köp bil',
            'bottom-services' => 'Tjänster'
        );
        custom_mobile_menu($menus, true);
    ?>
        <hr>
        <a class="btn button lytebox" style="width: 80%; margin-left: 10%; marign-right: 10%; padding: 15px; text-align: center; font-size: 1.1em; background: transparent;" href='<?php echo preg_replace('/http:\/\/.*?(?=\/)/', 'http://' . $_SERVER['HTTP_HOST'], home_url('/')); ?>bygg-din-volvo/'>Bygg din Volvo</a>
</div>
