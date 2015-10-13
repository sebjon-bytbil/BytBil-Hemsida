<?php if ((isset($_GET['redirecttohash']) && $_GET['redirecttohash'] == "true") || isCrawler()): ?>
<?php include_once("googlelayouts/object.php"); ?>
 
<?php else: ?>
<?php
//print_r($_SERVER);
wp_enqueue_script('elasticaccess');
wp_enqueue_style( 'elasticaccesscss');

global $object_page_layout;
$object_page_layout = true;

?>
<!--<link href="--><?php //echo get_template_directory_uri(); ?><!--/css/elasticaccess-style.css" rel="stylesheet">-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/finance.css"/>
<link href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.custom.css" rel="stylesheet">

<!-- End the wrapper so object-page can be full width -->
</div>
</div>
</div>

<?php include_once 'share_form.php'; ?>

<main id="post-<?php the_ID(); ?>">
    <div class="ElasticAccess" data-app="elasticaccesspackage">
        <input type="hidden" id="formData" value="<?php echo AccessInterestMailApi::AngularVars() ?>">
        <div ng-include="'templates/SingleObject.html'">

        </div>
    </div>
</main>

<div class="container-fluid wrapper default-padding">
    <div class="row-wrapper wrapper">

<?php endif ?>