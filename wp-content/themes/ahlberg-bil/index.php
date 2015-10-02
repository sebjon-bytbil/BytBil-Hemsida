<?php
get_header();
?>

<main>
    <div class="container-fluid wrapper no-padding">
    <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
                //
                // Post Content here
                ?>
                <div class="main-content">
                    <section>
                        <div class="col-xs-12 col-sm-9">
                            <h1><?php the_title(); ?></h1>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <h1><?php the_title(); ?></h1>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </section>
                </div>
                <?php
                //
            } // end while
        } // end if
    ?>
    </div>    
</main>

<?php
get_footer();
?>