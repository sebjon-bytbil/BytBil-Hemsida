<?php
get_header();
?>

<main>
    <div class="container-fluid wrapper">
    <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
                //
                // Post Content here
                the_title();
                //
            } // end while
        } // end if
    ?>
    </div>    
</main>

<?php
get_footer();
?>