<div id="mobileMenu" class="side-menu-container">
   
   
    <div class="mobile-logo">
        <!--<img src="<?php bloginfo('template_url'); ?>/images/volvo-logo-new.png"/> -->
        <img class="header-logo"
             style="height:<?php the_field('logo_height', 'options'); ?>; width:<?php the_field('logo_width', 'options'); ?>;"
             src="<?php the_field('logo', 'options'); ?>"/>
    </div>

    <?php
        $menus = array(
            'bottom-explore' => 'Utforska bil',
            'bottom-buy' => 'Köp bil',
            'bottom-services' => 'Tjänster'
        );
        custom_mobile_menu($menus, true);
    ?>
</div>
