<?php

/*
Template Name: Provkör
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
                        <span class="spanTitle">Provkörning</span>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        <?php if (have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <script>
        $ = jQuery;
        $('.wpcf7').on('submit.wpcf7', function(e, f) {
        });
        $(document).ready(function() {
            $('.flexslider').flexslider({
                maxItems: 1
            });

            function handleCheckboxes(li) {
                var input = li.find('input');
                var inputs = $('[name="models[]"]');
                var checked = $('[name="models[]"]:checked').length >= 3;
                if (checked === true) {
                    if (!input.is(':checked')) {
                        return false;
                    }
                }
                if (!li.hasClass('selected')) {
                    li.addClass('selected');
                    if (!input.is(':checked')) {
                        input.prop('checked', true);
                    }
                } else {
                    li.removeClass('selected');
                    if (input.is(':checked')) {
                        input.prop('checked', false);
                    }
                }
            }


            $('.testdrive-models li').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                handleCheckboxes($(this));
           });

            $('[name="models[]"]').each(function() {
                if ($(this).val() == queryString('model')) {
                    $(this).prop('checked', true);
                    $(this).parent().parent().parent().addClass('selected');
                }
            });

            $('form.wpcf7-form').on('submit', function(e) {
                if ($('[name="models[]"]:checked').length < 1) {
                    $('.wpcf7-response-output').html('Du måste välja minst en modell.').addClass('wpcf7-validation-errors').css({'display': 'block'});
                    return false;
                }
            });

        });
        </script>
        </div>
    </section>

</main>

<?php
get_footer();
?>
