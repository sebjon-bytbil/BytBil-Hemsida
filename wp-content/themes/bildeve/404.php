<?php
get_header();
$dir = get_template_directory_uri();
?>

    <main>

        <div class="side-padding">
            <div class="wrapper wrapper-narrow">

                    <div style="text-align: center; padding-top: 30px; padding-bottom: 30px;">
                        <h1 style="font-size: 4em;">404!</h1>

                        Sidan du letar efter kunde inte hittas.<br>
                        <a href="<?php echo home_url(); ?>">Gå till startsidan</a>
                    </div>

            </div>
        </div>

    </main>

<?php get_footer(); ?>