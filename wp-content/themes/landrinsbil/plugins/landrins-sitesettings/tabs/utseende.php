/* Background Settings */
<?php if (get_field('sitesettings-edit-background', $sid) == 'color') : ?>
    body {
    background-color: <?php echo get_field('sitesetting-background-color', $sid); ?>
    }
<?php endif; ?>
<?php if (get_field('sitesettings-edit-background', $sid) == 'image') :
    $background_image = get_field('sitesetting-background-image', $sid); ?>

    body {
    background: url(<?php echo $background_image['url']; ?>);
    background-size: cover;
    }
<?php endif; ?>
<?php if (get_field('sitesettings-edit-background', $sid) == 'gradient') : ?>
    body {
    background: <?php the_field('sitesetting-background-gradient-start', $sid); ?>; /* Old browsers */
    background: -moz-lineaan fr-gradient(top,  <?php the_field('sitesetting-background-gradient-start', $sid); ?> <?php the_field('sitesetting-background-gradient-length', $sid); ?>, <?php the_field('sitesetting-background-gradient-end', $sid); ?> 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(<?php the_field('sitesetting-background-gradient-length', $sid); ?>,<?php the_field('sitesetting-background-gradient-start', $sid); ?>), color-stop(100%,<?php the_field('sitesetting-background-gradient-end', $sid); ?>)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  <?php the_field('sitesetting-background-gradient-start', $sid); ?> <?php the_field('sitesetting-background-gradient-length', $sid); ?>,<?php the_field('sitesetting-background-gradient-end', $sid); ?> 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  <?php the_field('sitesetting-background-gradient-start', $sid); ?> <?php the_field('sitesetting-background-gradient-length', $sid); ?>,<?php the_field('sitesetting-background-gradient-end', $sid); ?> 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  <?php the_field('sitesetting-background-gradient-start', $sid); ?> <?php the_field('sitesetting-background-gradient-length', $sid); ?>,<?php the_field('sitesetting-background-gradient-end', $sid); ?> 100%); /* IE10+ */
    background: linear-gradient(to bottom,  <?php the_field('sitesetting-background-gradient-start', $sid); ?> <?php the_field('sitesetting-background-gradient-length', $sid); ?>,<?php the_field('sitesetting-background-gradient-end', $sid); ?> 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php the_field('sitesetting-background-gradient-start', $sid); ?>', endColorstr='<?php the_field('sitesetting-background-gradient-end', $sid); ?>',GradientType=0 ); /* IE6-8 */

    }
<?php endif; ?>

/* Type settings */
<?php if (get_field('sitesetting-edit-type', $sid)) : ?>
    body, p {
    font-family: "<?php the_field('sitesetting-font-family-paragraph', $sid); ?>", sans-serif;
    font-size: <?php the_field('sitesetting-font-size-paragraph', $sid); ?>px;
    color: <?php the_field('sitesetting-font-color-paragraph', $sid); ?>;
    }
    h1 {
    font-size: <?php the_field('sitesetting-font-size-header', $sid); ?>px;
    }

    h1,h2,h3,h4,h5 {
    color: <?php the_field('sitesetting-font-color-header', $sid); ?>;
    font-family: "<?php the_field('sitesetting-font-family-header', $sid); ?>", sans-serif;
    }

<?php endif; ?>

/* Link settings */
<?php if (get_field('sitesetting-edit-links', $sid)) : ?>
    a,
    a:link,
    a:visited {
    color: <?php the_field('sitesetting-link-color', $sid); ?>;
    <?php if (get_field('sitesetting-link-effect', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-link-effect', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-link-effect', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    footer a,
    footer a:link,
    footer a:visited {
    color: <?php the_field('sitesetting-link-color', $sid); ?>;
    <?php if (get_field('sitesetting-link-effect', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-link-effect', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-link-effect', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    a:hover {
    color: <?php the_field('sitesetting-link-color-hover', $sid); ?>;
    <?php if (get_field('sitesetting-link-effect-hover', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-link-effect-hover', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-link-effect-hover', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }

    footer a:hover {
    color: <?php the_field('sitesetting-link-color-hover', $sid); ?>;
    <?php if (get_field('sitesetting-link-effect-hover', $sid)) : ?>
        <?php if (in_array('underline', get_field('sitesetting-link-effect-hover', $sid))) : ?>
            text-decoration: underline;
        <?php endif; ?>
        <?php if (in_array('bold', get_field('sitesetting-link-effect-hover', $sid))) : ?>
            font-weight: bold;
        <?php endif; ?>
    <?php endif; ?>
    }
<?php endif; ?>

/* Content area */

<?php if (get_field('sitesetting-wrapper-edit', $sid)) : ?>
    .wrapper {
    <?php if (in_array('background', get_field('sitesetting-wrapper-edit', $sid))) : ?>
        background-color: <?php the_field('sitesetting-wrapper-bgcolor', $sid); ?>;
    <?php endif; ?>
    <?php if (in_array('shadow', get_field('sitesetting-wrapper-edit', $sid))) : ?>
        -moz-box-shadow: <?php the_field('sitesetting-wrapper-shadow', $sid); ?>;
        -o-box-shadow: <?php the_field('sitesetting-wrapper-shadow', $sid); ?>;
        -webkit-box-shadow: <?php the_field('sitesetting-wrapper-shadow', $sid); ?>;
        box-shadow: <?php the_field('sitesetting-wrapper-shadow', $sid); ?>;
    <?php endif; ?>
    <?php if (in_array('border', get_field('sitesetting-wrapper-edit', $sid))) : ?>
        border-left: <?php the_field('sitesetting-wrapper-border', $sid); ?>;
        border-right: <?php the_field('sitesetting-wrapper-border', $sid); ?>;
    <?php endif; ?>
    }
<?php endif; ?>

/* Rounded Corners */
<?php if (get_field('sitesetting-border-radius', $sid)) : ?>
    ul.nav,
    .slider-container,
    .flexslider .slides img,
    .flexslider,
    a.plug, span.plug,
    a.offer-link,
    .btn,
    button,
    article.offer, article.offer img,
    .acf-map,
    #sidebar ul.sidebar-menu-page > li {
    border-radius: <?php the_field('sitesetting-border-radius-val', $sid); ?>px;
    }
    ul.nav > li:first-child > a {
    border-top-left-radius: <?php the_field('sitesetting-border-radius-val', $sid); ?>px;
    border-bottom-left-radius: <?php the_field('sitesetting-border-radius-val', $sid); ?>px;
    }
    ul.nav > li > ul {
    border-bottom-left-radius: <?php the_field('sitesetting-border-radius-val', $sid); ?>px;
    border-bottom-right-radius: <?php the_field('sitesetting-border-radius-val', $sid); ?>px;
    }

    ul.nav > li > ul > li > ul {
    border-top-right-radius: <?php the_field('sitesetting-border-radius-val', $sid); ?>px;
    border-bottom-right-radius: <?php the_field('sitesetting-border-radius-val', $sid); ?>px;
    }


<?php endif; ?>

