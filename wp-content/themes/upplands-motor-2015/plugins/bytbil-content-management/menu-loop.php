<?php
    $menu_progress_color = get_field('page-settings-menu-bar', $id);
    $this_post = get_post($id);
    
    if (get_field('row',$id)) {
        $rows = get_field('row',$id);
        $counter = 1;
        $row_count = count($rows);

        $prevPage = get_field("page-settings-back-page", $id);
        $prevPageLink = get_permalink($prevPage->ID);
        $prevPageTitle = $prevPage->post_title;

    ?>
    <section id="sub_menu" class="scroll-menu page-menu">

        <div class="submenu-wrapper">
            <div class="submenu-title">
                              
                <h1>
                    <?php if($prevPage) { ?>
                        <a class="back-link light" href="<?php echo $prevPageLink; ?>" >
                            <i class="icon icon-chevron-thin-left"></i><span class="back-link-title"><?php echo $prevPageTitle; ?></span>
                        </a>
                    <?php } ?>
                    
                    <?php echo get_the_title($id); ?>
                </h1>
                <div class="submenu-mobile visible-xs">

                    <div class="btn-group">
                        <a class="btn button white dropdown-toggle" data-toggle="dropdown" href="#">
                            Meny
                            <i class="icon icon-chevron-thin-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <?php recursiveMobileMenu($rows); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="hidden-xs">
                <?php recursiveMenu($rows, $counter, $row_count) ?>
            </div>
        </div>
    </section>

    <style>
        .scroll-menu .item span {
            background-color: <?php echo $menu_progress_color; ?>;
        }
    </style>

    <?php
    }

    

?>
