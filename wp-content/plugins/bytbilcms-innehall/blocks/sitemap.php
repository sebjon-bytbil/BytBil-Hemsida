<?php
$sitemap_type = get_sub_field('sitemap');
if ($sitemap_type == 'all') {
    $menus = get_terms('nav_menu', array('hide_empty' => true));

    foreach ($menus as $menu) {
        if (!get_sub_field('sitemap-hide-titles')) {
            echo '<h4>' . $menu->name . '</h4>';
        }
        wp_nav_menu(array(
                'menu' => $menu,
                'menu_class' => 'sitemap')
        );
    }
} elseif ($sitemap_type == 'main') {
    wp_nav_menu(array(
            'menu' => 'Huvudmeny',
            'menu_class' => 'content-menu')
    );
}
?>