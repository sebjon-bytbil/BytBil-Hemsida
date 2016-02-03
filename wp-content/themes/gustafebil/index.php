<?php
get_header();
$init_map = false;

?>

<section id="breadrumb">
    <div class="wrapper">
        <div class="breadcrumbs col-xs-12">
            <?php the_breadcrumb(); ?>
        </div>
    </div>
</section>

<main>
    <div class="wrapper">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- Om Sidebar är i bockat printa ut main mindre -->
            <?php if (get_field('setting-use-sidebar') == true) { ?>
                <div class="col-xs-12 col-sm-8 col-lg-9 page-sidebar" id="main">
                <div class="row">
            <?php } ?>

            <?php if (get_field('setting-hide-page-header') == false) { ?>
                <div class="col-xs-12">
                    <h1><?php the_title(); ?></h1>
                </div>
            <?php } ?>

            <?php bytbil_block_loop(); ?>
            </div>
            <!-- Om Side är i bockat printa ut Sidebar -->
            <?php if (get_field('setting-use-sidebar') == true) { ?>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-3" id="sidebar">
                    <div class="block-wrapper">
                        <?php if (get_field('sidebar-contents')) : while (have_rows('sidebar-contents')) : the_row();
                            $type = get_sub_field('sidebar-content-type');
                            $block_title = get_sub_field('sidebar-content-title');

                            if (get_sub_field('sidebar-hide-title') != true && $block_title != '') {
                                echo '<h2>' . $block_title . '</h2>';
                            }

                            if ($type == 'wysiwyg') {
                                echo get_sub_field('sidebar-content-wysiwyg');
                            } elseif ($type == 'menu') {
                                $menu_type = get_sub_field('sidebar-menu-type');

                                if ($menu_type == 'page') {
                                    ?>
                                    <ul class="sidebar-menu">
                                        <?php bytbil_show_sidebar_menu($post); ?>
                                    </ul>
                                <?php
                                } elseif ($menu_type == 'main') {
                                    wp_nav_menu(array(
                                            'menu' => 'Huvudmeny',
                                            'depth' => 3,
                                            'container' => false,
                                            'menu_class' => 'sidebar-menu')
                                    );
                                }
                            } elseif ($type == 'contactform') {
                                echo get_sub_field('sidebar-content-form');
                            } elseif ($type == 'plugs') {
                                $plugs = get_sub_field('sidebar-content-plugs');
                                foreach ($plugs as $plug) {
                                    bytbil_show_plugs_sidebar($plug->ID);
                                }
                            }
                            ?>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            <?php } ?>

        <?php endwhile; endif; ?>
    </div>
</main>

<?php
get_footer();
?>
