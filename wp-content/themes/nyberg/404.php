<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <header class="page-header">
                <h1 class="page-title">Sidan kunde inte hittas</h1>

                <h2>Vill du göra en sökning?
                    <?php get_search_form(); ?></h2>

            </header>

        </div>
        <!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>