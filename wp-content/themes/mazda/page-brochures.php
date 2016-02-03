<?php

/*
Template Name: Broschyrer
*/

get_header();

?>

<main>

<!--    <section id="breadrumb">
        <div class="wrapper">
            <div class="breadcrumbs col-xs-12">
            </div>
        </div>
    </section>-->

    <section id="content">
        <div class="wrapper">
            <section id="main-slideshow" class="flexslider">
                <ul class="slides">
                    <li>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/takeri_hero_1800x315px.jpg" />
                        </a>
                    </li>
                </ul>
            </section>
            <div class="secondaryCarNav">
                <div class="firstRow">
                    <div class="wrap">
                        <span class="spanTitle">Broschyrer</span>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="row">
                <div class="row_content">
                    <iframe width="100%" height="800px" src="http://www.mazda.se/Templates/Pages/DynamicForm.aspx?formId=91096&amp;id=91080&amp;epslanguage=en" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </section>
    <script>
    $ = jQuery;
    $(document).ready(function() {
        $('.flexslider').flexslider({
            maxItems: 1
        });
    });
    </script>
</main>

<?php
get_footer();
?>
