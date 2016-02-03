<?php
/**
 * Template Name: Coming soon / Maintenance
 *
 * @package Magnium
 */

$protocol = "HTTP/1.0";
if ("HTTP/1.1" == $_SERVER["SERVER_PROTOCOL"]) {
    $protocol = "HTTP/1.1";
}

header("$protocol 503 Service Unavailable", true, 503);
header("Retry-After: 3600");

get_header('empty');

?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="coming-soon-page">
	<?php get_template_part( 'content', 'page' ); ?>
</div>
<?php endwhile; // end of the loop. ?>

<?php get_footer('empty'); ?>
