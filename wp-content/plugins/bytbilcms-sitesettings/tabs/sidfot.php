footer {
background-color: <?php generateColor(get_field('sitesetting-footer-bgcolor', $sid), get_field('sitesetting-footer-opacity', $sid)); ?>;
color: <?php the_field('sitesetting-footer-textcolor', $sid); ?> !important;
}

footer h3 {
color: <?php the_field('sitesetting-footer-textcolor', $sid); ?> !important;
}

footer a {
color: <?php the_field('sitesetting-footer-linkcolor', $sid); ?> !important;
}

<?php if (get_field("sitesetting-footer-sticky", $sid)) : ?>
    .wrapper {
        min-height: 100vh;
        position:relative;
        padding-bottom: 50px;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        left: 0;
    }
<?php endif; ?>