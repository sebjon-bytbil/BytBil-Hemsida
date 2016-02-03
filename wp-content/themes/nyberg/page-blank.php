<?php
/*
    Template Name: Undersida helt blank (för bla VDW)
*/
get_header('blank');
?>
    <div id="primary" class="content-area">
        <div id="content" class="nyberg-site-content" role="main">
            <div class="midcontent">
                <div class="nyberg-subpage-maincontent">
                    <div class="nyberg-subpage-content nyberg-subpage-content-full">
                        <style>
                            html, body {
                                width: 718px !important;
                                overflow: hidden !important;
                            }

                            body {
                                height: 1570px;
                            }

                            .midcontent {
                                width: 718px !important;
                                margin: 0;
                                float: left;
                            }

                            .contactcard {
                                width: 164px !important;
                                margin-bottom: 10px;
                            }

                            .contactcardinfo {
                                font-size: 12px !important;
                            }

                            .black-button.orter-button {
                                width: 215px !important;
                            }

                            .orter-link:last-of-type .orter-button {
                                margin-right: 0 !important;
                            }
                        </style>
                        <?php if (get_field('dolj_rubriker') != true) : ?>
                            <h1><?php if (get_field('alternativ_rubrik')) {
                                    the_field('alternativ_rubrik');
                                } else {
                                    the_title();
                                } ?></h1>
                        <?php endif; ?>
                        <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                the_content();
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- #content -->
    </div>
    <!-- #primary -->
<?php wp_footer(); ?>