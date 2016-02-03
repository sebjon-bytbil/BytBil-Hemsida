<?php


// Skriv ut Återförsäljarens Logotyp
function get_af_logotype($container = false)
{
    $af_logotype = get_field('af-logotype', 'options');
    $af_logotype_bg = get_field('af-logotype-background', 'options');
    $af_reseller = get_field('af-reseller', 'options');
    $af_service = get_field('af-service', 'options');

    if ($af_logotype_bg == 'profile') {
        $af_logotype_bg = get_field('af-profile-color', 'options');
    }
    $af_website = get_field('af-website', 'options');
    $af_about = get_field('af-about', 'options');

    // Med Container
    if ($container == true) {
        ?>
        <div class="af-logotype-container" style="background-color: <?php echo $af_logotype_bg; ?>">
            <a target="_blank" href="<?php echo $af_website; ?>" title="<?php get_af_name() ?>">
                <img src="<?php echo $af_logotype['url'] ?>" class="af-logotype"
                     alt="<?php echo $af_logotype['alt']; ?>" title="<?php echo $af_logotype['title']; ?>">
            </a>
        </div>
    <?php
    } // Utan Container
    else {
        ?>
        <a target="_blank" href="<?php echo $af_website; ?>" title="<?php get_af_name(); ?>">
            <img src="<?php echo $af_logotype['url'] ?>" class="af-logotype" alt="<?php echo $af_logotype['alt']; ?>"
                 title="<?php echo $af_logotype['title']; ?>">
        </a>
    <?php
    }
}


// Skriv ut Återförsäljarens namn
function get_af_name()
{
    $af_name = get_field('af-name', 'options');
    echo $af_name;
}

// Skriv ut Återförsäljarens Om-Oss info.
function get_af_about()
{
    $af_about = get_field('af-about', 'options');
    echo $af_about;
}


// Hämta Kontaktformulär

function get_af_form($id)
{
    echo do_shortcode('[contact-form-7 id="' . $id . '" title="' . get_the_title($id) . '"]');
}

?>
