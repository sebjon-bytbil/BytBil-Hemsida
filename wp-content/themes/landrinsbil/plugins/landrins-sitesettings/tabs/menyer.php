/* Menus */
<?php if (get_field('sitesetting-edit-menus', $sid)) : ?>

    /* TOPPNIVÅ */
    .nav > li > a {
    font-family: "<?php the_field('sitesetting-menus-font-family', $sid); ?>", sans-serif;
    font-size: <?php the_field('sitesetting-menus-font-size', $sid); ?>px;
    background: <?php the_field('sitesetting-menus-link-bgcolor', $sid); ?>;
    color: <?php the_field('sitesetting-menus-link-color', $sid); ?>;

    <?php if (get_field('sitesetting-menus-link-effects', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-menus-link-effects', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-menus-link-effects', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    .nav > li > a:hover,
    .nav .open > a,
    .nav .open > a:hover,
    .nav .open > a:focus,
    .nav .current-menu-parent > a,
    .nav .current-menu-item > a,
    .nav .current-page-ancestor > a,
    .nav > li > a:focus {
    color: <?php the_field('sitesetting-menus-link-color-hover', $sid); ?>;
    background: <?php the_field('sitesetting-menus-link-bgcolor-hover', $sid); ?>;

    <?php if (get_field('sitesetting-menus-link-effects-hover', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-menus-link-effects-hover', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-menus-link-effects-hover', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    .nav,
    .navbar-header {
    background-color: <?php the_field('sitesetting-menus-background', $sid); ?>;
    <?php if (get_field('sitesetting-menu-settings', $sid)) : ?>
        <?php if (in_array('shadow', get_field('sitesetting-menu-settings', $sid))) : ?>
            -moz-box-shadow: <?php the_field('sitesetting-menu-shadow', $sid); ?>;
            -o-box-shadow: <?php the_field('sitesetting-menu-shadow', $sid); ?>;
            -webkit-box-shadow: <?php the_field('sitesetting-menu-shadow', $sid); ?>;
            box-shadow: <?php the_field('sitesetting-menu-shadow', $sid); ?>;
        <?php endif; ?>

        <?php if (in_array('border', get_field('sitesetting-menu-settings', $sid))) : ?>
            border: <?php the_field('sitesetting-menu-border', $sid); ?>;
        <?php endif; ?>

        <?php if (in_array('rounded', get_field('sitesetting-menu-settings', $sid))) : ?>
            border-radius: <?php the_field('sitesetting-menus-border-radius-val', $sid); ?>px;
        <?php endif; ?>

        <?php if (in_array('caps', get_field('sitesetting-menu-settings', $sid))) : ?>
            text-transform: uppercase;
        <?php endif; ?>
    <?php endif; ?>
    }

    /* UNDERMENYER */
    .dropdown-menu {
    background-color: <?php the_field('sitesetting-submenus-background', $sid); ?>;
    }

    .dropdown-menu li > a,
    .dropdown-menu li.current-menu-item > a,
    .dropdown-menu .dropdown-menu a,
    .dropdown-menu .current-page-ancestor > a {
    font-family: "<?php the_field('sitesetting-submenu-font-family', $sid); ?>", sans-serif;
    font-size: <?php the_field('sitesetting-submenu-font-size', $sid); ?>px;
    background-color: <?php the_field('sitesetting-submenu-link-bgcolor', $sid); ?>;
    color: <?php the_field('sitesetting-submenu-link-color', $sid); ?>;

    <?php if (get_field('sitesetting-submenu-link-effect', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-submenu-link-effect', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-submenu-link-effect', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    .dropdown-menu li {
    color: <?php the_field('sitesetting-submenu-link-color', $sid); ?>;
    }

    .nav ul > li.menu-item-has-children:before {
    color: inherit !important;
    }

    .dropdown-menu li > a:hover,
    .dropdown-menu li > a:focus,
    .dropdown-menu .dropdown-menu a:hover,
    .dropdown-menu .dropdown-menu a:focus,
    .dropdown-menu li.current-menu-item > a:hover {
    background-color: <?php the_field('sitesetting-submenu-link-bgcolor-hover', $sid); ?>;
    color: <?php the_field('sitesetting-submenu-link-color-hover', $sid); ?> !important;
    font-size: <?php the_field('sitesetting-submenu-font-size', $sid); ?>px;
    <?php if (get_field('sitesetting-submenu-link-effect-hover', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-submenu-link-effect-hover', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-submenu-link-effect-hover', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>

    <?php if (get_field('sitesetting-submenu-link-effect-hover', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-submenu-link-effect-hover', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-submenu-link-effect-hover', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    .nav ul > li.menu-item-has-children:hover:before {
    color: <?php the_field('sitesetting-submenu-link-color-hover', $sid); ?> !important;
    }


    /* Sidomeny */
    #sidebar ul.sidebar-menu-page > li {
    background: <?php the_field('sitesetting-menus-background', $sid); ?>;
    }

    #sidebar ul.sidebar-menu {
    <?php if (get_field('sitesetting-menus-border-radius-val', $sid)) : ?>
        border-radius: <?php the_field('sitesetting-menus-border-radius-val', $sid); ?>px;
        overflow: hidden;
    <?php endif; ?>
    }

    #sidebar ul > li > a,
    #sidebar ul > li > ul > li > a {
    font-family: "<?php the_field('sitesetting-menus-font-family', $sid); ?>", sans-serif;
    font-size: <?php the_field('sitesetting-menus-font-size', $sid); ?>px;
    background: <?php the_field('sitesetting-menus-link-bgcolor', $sid); ?>;
    color: <?php the_field('sitesetting-menus-link-color', $sid); ?>;

    <?php if (get_field('sitesetting-menus-link-effects', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-menus-link-effects', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-menus-link-effects', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    #sidebar ul > li > a:hover,
    #sidebar ul > li > ul > li > a:hover {
    color: <?php the_field('sitesetting-menus-link-color-hover', $sid); ?>;
    background: <?php the_field('sitesetting-menus-link-bgcolor-hover', $sid); ?>;

    <?php if (get_field('sitesetting-menus-link-effects-hover', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-menus-link-effects-hover', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-menus-link-effects-hover', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    #sidebar > ul > li.current-menu-ancestor > a,
    #sidebar > ul > li.current-menu-ancestor > a:hover {
    color: <?php the_field('sitesetting-menus-link-color', $sid); ?>;
    background: transparent;
    }

    #sidebar > ul > li > ul > li.current-menu-item a {
    background-color: <?php the_field('sitesetting-submenu-link-bgcolor', $sid); ?>;
    color: <?php the_field('sitesetting-submenu-link-color', $sid); ?>;
    }

    #sidebar > ul > li > ul > li.current-menu-item a:hover {
    background-color: <?php the_field('sitesetting-submenu-link-bgcolor', $sid); ?>;
    color: <?php the_field('sitesetting-submenu-link-color', $sid); ?>;
    }

    #sidebar > ul > li > ul > li > ul > li > a {
    font-family: "<?php the_field('sitesetting-submenu-font-family', $sid); ?>", sans-serif;
    font-size: <?php the_field('sitesetting-submenu-font-size', $sid); ?>px;
    background-color: <?php the_field('sitesetting-submenu-link-bgcolor', $sid); ?>;
    color: <?php the_field('sitesetting-submenu-link-color', $sid); ?>;

    <?php if (get_field('sitesetting-submenu-link-effect', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-submenu-link-effect', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-submenu-link-effect', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    #sidebar > ul > li > ul > li > ul > li.current-menu-item a:hover {
    background-color: <?php the_field('sitesetting-submenu-link-bgcolor-hover', $sid); ?>;
    color: <?php the_field('sitesetting-submenu-link-color-hover', $sid); ?>;
    font-size: <?php the_field('sitesetting-submenu-font-size', $sid); ?>px;
    <?php if (get_field('sitesetting-submenu-link-effect-hover', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-submenu-link-effect-hover', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-submenu-link-effect-hover', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    #sidebar > ul > li > ul > li.current-page-ancestor > a {
    font-family: "<?php the_field('sitesetting-submenu-font-family', $sid); ?>", sans-serif;
    background-color: <?php the_field('sitesetting-submenu-link-bgcolor', $sid); ?>;
    color: <?php the_field('sitesetting-submenu-link-color', $sid); ?>;

    <?php if (get_field('sitesetting-submenu-link-effect', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-submenu-link-effect', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-submenu-link-effect', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    #sidebar > ul > li > ul > li.current-page-ancestor > a:hover {
    background-color: <?php the_field('sitesetting-submenu-link-bgcolor-hover', $sid); ?>;
    color: <?php the_field('sitesetting-submenu-link-color-hover', $sid); ?>;
    <?php if (get_field('sitesetting-submenu-link-effect-hover', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-submenu-link-effect-hover', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-submenu-link-effect-hover', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    #sidebar > ul > li > ul > li.menu-item-has-children > ul {
    display: none;
    }

    #sidebar > ul > li > ul > li.current-page-ancestor > a,
    #sidebar > ul > li > ul > li > ul > li.current-menu-item a {
    background-color: <?php the_field('sitesetting-submenu-link-bgcolor', $sid); ?>;
    color: <?php the_field('sitesetting-submenu-link-color', $sid); ?>;

    <?php if (get_field('sitesetting-submenu-link-effect', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-submenu-link-effect', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-submenu-link-effect', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    #sidebar > ul > li > ul > li.menu-item-has-children.current-menu-item > ul,
    #sidebar > ul > li > ul > li.menu-item-has-children.current-menu-parent > ul {
    display: block;
    }

    /* OVERRIDES */

    /*
    SETUP VARS HERE
    */
    <?php
    $li_bg = get_field("sitesetting-sidebarmenus-background", $sid);

    $ul_bdr = get_field("sitesetting-sidebarmenus-border-radius-val", $sid);

    $a_ff = get_field("sitesetting-sidebarmenus-font-family", $sid);
    $a_fz = get_field("sitesetting-sidebarmenus-font-size", $sid);
    $a_bg = get_field("sitesetting-sidebarmenus-link-bgcolor", $sid);
    $a_color = get_field("sitesetting-sidebarmenus-link-color", $sid);

    $change_colors = get_field("sitesetting-sidebarmenus-change-colors", $sid);

    $settings = get_field("sitesetting-sidebarmenu-settings", $sid);

    $effects = get_field("sitesetting-sidebarmenus-link-effects", $sid);

    $a_color_hover = get_field("sitesetting-sidebarmenus-link-color-hover", $sid);
    $a_bg_hover = get_field('sitesetting-sidebarmenus-link-bgcolor-hover', $sid);

    $effects_hover = get_field('sitesetting-sidebarmenus-link-effects-hover', $sid);


    ?>
    <?php if (get_field('sitesetting-edit-sidebar-menus', $sid)) : ?>

        <?php if ($change_colors) : ?>
            #sidebar ul.sidebar-menu > li {
            background: <?php echo $li_bg; ?>;
            }
        <?php endif; ?>

        #sidebar ul.sidebar-menu {
        <?php if ($ul_bdr) : ?>
            border-radius: <?php echo $ul_bdr; ?>px;
            overflow: hidden;
        <?php endif; ?>
        }

        #sidebar ul > li > a,
        #sidebar ul > li > ul > li > a {
        font-family: "<?php echo $a_ff; ?>", serif;
        font-size: <?php echo $a_fz; ?>px;
        <?php if ($change_colors) : ?> background: <?php echo $a_bg; ?>; <?php endif; ?>
        <?php if ($change_colors) : ?>color: <?php echo $a_color; ?>; <?php endif; ?>

        <?php if ($effects) : ?>
            <?php if (in_array('underline', $effects)) : ?>
                text-decoration: underline;
            <?php endif; ?>
            <?php if (in_array('bold', $effects)) : ?>
                font-weight: bold;
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($settings) : ?>
            <?php if (in_array('caps', $settings)) : ?>
                text-transform: uppercase;
            <?php endif; ?>
        <?php endif; ?>
        }

        #sidebar ul > li > a:hover,
        #sidebar ul > li > ul > li > a:hover {
        <?php if ($change_colors) : ?>color: <?php echo $a_color_hover; ?>; <?php endif; ?>
        <?php if ($change_colors) : ?>background: <?php echo $a_bg_hover; ?>; <?php endif; ?>

        <?php if ($effects_hover) : ?>
            <?php if (in_array('underline', $effects_hover)) : ?>
                text-decoration: underline;
            <?php endif; ?>
            <?php if (in_array('bold', $effects_hover)) : ?>
                font-weight: bold;
            <?php endif; ?>
        <?php endif; ?>
        }

    <?php endif; ?>

<?php endif; ?>