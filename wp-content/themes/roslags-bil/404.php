<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="content" class="wrapper">
    <div class="container-fluid">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">

                <header class="page-header">
                    <h1 class="page-title"><?php _e('Sidan kunde inte hittas', 'roslags-bil'); ?></h1>
                </header>

                <div class="page-content">
                    <p><?php _e('Det verkar som inget kunde hittas för denna plats. Vill du kanske försöka med en sökning?', 'roslags-bil'); ?></p>

                    <?php get_search_form(); ?>
                </div>
                <!-- .page-content -->

            </div>
            <!-- #content -->
        </div>
        <!-- #primary -->
    </div>
</div>


<?php
get_footer();

?>
