<?php /** Template Name: Grundsida :  Boka provkörning */
get_header();
?>

<div id="primary" class="content-area">
    <div id="content" class="site-content provkorning" role="main">
        <div class="wrapper">
            <?php /* The loop */ ?>
            <?php //while ( have_posts() ) : the_post();

            if (get_field('bakgrundsbild')) {
                ?>

                <script type="text/javascript">

                    $('#background-container').empty();
                    var imageUrl = '<?php echo get_field("bakgrundsbild"); ?>';
                    $('#background-container').css('background-image', 'url(' + imageUrl + ')');
                </script>

            <?php
            }

            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="left-column black-page">

                    <header class="entry-header">
                        <h1 class="entry-title"><?php echo empty($post->post_parent) ? get_the_title($post->ID) : get_the_title($post->post_parent); ?></h1>
                    </header>
                    <!-- .entry-header -->

                    <?php include 'mobile-menu.php'; ?>

                    <div class="side-menu-container side-menu-old">
                        <ul class="side-menu-large">
                            <?php new_volvo_menu('bottom-buy'); ?>
                        </ul>
                        <!--<ul class="side-menu-small">
								<?php //new_volvo_menu('bilmeny'); ?>
							</ul>-->
                    </div>

                </div>

                <div class="right-column block-page" style="text-align: left;">
                    <div class="single-block">
                        <div class="inner-wrap">
                            <form name="provkor_form" id="provkor_form">
                                <?php
                                $masterPost = bytbil_get_master_post(get_the_ID());
                                ?>
                                <h1 class="title"><?php echo $masterPost->post_title; ?></h1>
                                <?php
                                echo apply_filters('the_content', $masterPost->post_content);


                                $cars = bytbil_get_field('bilar', true);

                                $locations = get_field("new_car_email_rows", "options");
                                if (count($locations) > 1) {
                                    $select = true;
                                } else {
                                    $select = false;
                                }

                                ?>
                                <div class="provkor_cars">
                                    <?php
                                    $masterPost = bytbil_get_master_post($post->ID);
                                    foreach ($cars as $car) {
                                        switch_to_master();
                                        $masterCars = get_field("bilar", $masterPost->ID);
                                        restore_current_blog();

                                        foreach ($masterCars as $masterCar) {
                                            if ($masterCar["car_name"] == $car["car_name"]) {
                                                $car_image = $masterCar["car_image"];
                                            }
                                        }

                                        if (!$car_image) {
                                            $car_image = $car["car_image"];
                                        }

                                        ?>
                                        <div class="provkor_block car">
                                            <img class="provkor_image" src="<?php echo $car_image; ?>"/>
                                            <label for="<?php echo $car['car_name']; ?>"
                                                   class="label_car">Provkör</label>
                                            <input class="provkor_checkbox" type="checkbox" name="checkedCar[]"
                                                   value="<?php echo $car['car_name']; ?>"/>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="provkor_block">
                                    <label for="fornamn" class="label_bold full">Förnamn</label>
                                    <input type="text" name="fornamn" tabindex="10"/>
                                    <label for="telefon" class="label_bold full">Telefon</label>
                                    <input type="text" name="telefon" tabindex="13"/>
                                </div>
                                <div class="provkor_block">
                                    <label for="efternamn" class="label_bold full">Efternamn</label>
                                    <input type="text" name="efternamn" tabindex="12"/>
                                    <label for="email" class="label_bold full">E-postadress</label>
                                    <input type="text" name="email" tabindex="14"/>
                                </div>
                                <div class="provkor_block">
                                    <input type="checkbox" name="contact_me"/>
                                    <label for="contact_me" class="">Ja tack, jag vill få de senaste nyheterna från
                                        Volvo via e-post</label>
                                </div>
                                <div class="provkor_rad">
                                    <div class="bold">Kontakta mig helst:</div>
                                    <input type="checkbox" name="contactWhen[]" value="Förmiddag"/>
                                    <label for="contactWhen[]">Förmiddag</label>
                                    <input type="checkbox" name="contactWhen[]" value="Eftermiddag"/>
                                    <label for="contactWhen[]">Eftermiddag</label>
                                    <input type="checkbox" name="contactWhen[]" value="Kväll"/>
                                    <label for="contactWhen[]">Kväll</label>
                                </div>
                                <div class="provkor_rad">
                                    <?php if ($select) : ?>
                                        <div class="provkor_block">
                                            <div class="bold">Välj ort</div>
                                            <select name="targetMail">
                                                <?php while (have_rows("new_car_email_rows", "options")) : the_row(); ?>
                                                    <option
                                                        value="<?php the_sub_field("car_email") ?>"><?php the_sub_field("car_location"); ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    <?php else : ?>
                                        <?php
                                        $email = get_field("new_car_email_rows", "options");
                                        $email = $email[0]["car_email"];
                                        ?>
                                        <input name="targetMail" type="hidden" value="<?php echo $email; ?>"/>
                                    <?php endif; ?>
                                    <div class="provkor_block">
                                        <div class="bold">Registreringsnummer</div>
                                        <input type="text" name="regnr"/>
                                    </div>
                                    <div class="provkor_block">
                                        <div class="bold">&nbsp;</div>
                                        <input type="submit" value="Skicka"/>
                                    </div>
                                </div>
                            </form>
                            <script type="text/javascript">
                                ($(function () {
                                    $("#provkor_form").submit(function () {
                                        if ($('input[name=fornamn]').val().trim() !== '' && $('input[name=efternamn]').val().trim() !== '' && $('input[name=email]').val().trim() !== '' && $('input[name=telefon]').val().trim() !== '') {
                                            $('html, body').css("cursor", "wait");
                                            $.post(
                                                "/wp-admin/admin-ajax.php",
                                                {
                                                    'action': 'provkor',
                                                    'data': $("#provkor_form").serialize()
                                                },
                                                function (response) {
                                                    $('html, body').css("cursor", "auto");
                                                    response = JSON.parse(response);
                                                    if (response.success === true) {
                                                        alert('Tack för din förfrågan! Vi återkommer så fort vi kan gällande din provkörning.');
                                                        $("#provkor_form").find('input[type=text]').each(function () {
                                                            $(this).val('');
                                                        });
                                                        $("#provkor_form").find('input[type=checkbox]').each(function () {
                                                            $(this).attr('checked', false);
                                                        });
                                                    } else {
                                                        alert('Okänt fel: ' + JSON.stringify(response.errors));
                                                    }
                                                }
                                            );
                                        } else {
                                            alert('Vänligen fyll i alla fält');
                                        }

                                        return false;
                                    });
                                }));
                            </script>
                        </div>
                    </div>
                </div>
                <!-- .entry-content -->

            </article>
            <!-- #post -->

        </div>

    </div>
    <!-- #content -->
</div><!-- #primary -->



<?php get_footer(); ?>
