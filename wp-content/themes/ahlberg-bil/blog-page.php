<?php
/* Template name: Bloggsida */
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
                                $posts_per_page = get_field('blog-pagesize');
                                $year = get_field('blog-from-year');
                
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
                                        <?php the_content(); ?>
                                        <!-- -->
                                        <?php 
                                        global $paged;
                                        $curpage = $paged ? $paged : 1;
                                        $args = array(
                                            'post_type' => 'blog',
                                            'orderby' => 'post_date',
                                            'posts_per_page' => $posts_per_page,
                                            'paged' => $paged,
                                            'year'  => $year,
                                        );
                                        $query = new WP_Query($args);
                                        if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                                        ?>
                                        <div id="post-<?php the_ID(); ?>" class="blog-post">
                                            <span class="blog-date"><?php the_date('Y-m-d'); ?></span>
                                            <h3><?php the_title(); ?></h3>
                                            <?php
                                            the_content();
                                            ?>
                                        </div>
                                        <hr>
                                        <?php
                                        endwhile;
                                            echo '
                                            <div id="wp_pagination">
                                                <a class="first page button" href="'.get_pagenum_link(1).'">&laquo;</a>
                                                <a class="previous page button" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">&lsaquo;</a>';
                                                for($i=1;$i<=$query->max_num_pages;$i++)
                                                    echo '<a class="'.($i == $curpage ? 'active ' : '').'page button" href="'.get_pagenum_link($i).'">'.$i.'</a>';
                                                echo '
                                                <a class="next page button" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'">&rsaquo;</a>
                                                <a class="last page button" href="'.get_pagenum_link($query->max_num_pages).'">&raquo;</a>
                                            </div>
                                            ';
                                            wp_reset_postdata();
                                        endif;
                                        ?>
                                        
                                        
                                        <!-- -->
                                        
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