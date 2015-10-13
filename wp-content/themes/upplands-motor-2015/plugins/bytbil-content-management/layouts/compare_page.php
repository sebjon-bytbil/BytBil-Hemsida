<?php
wp_enqueue_script('elasticaccess');
wp_enqueue_style( 'elasticaccesscss');

global $object_page_layout;
$object_page_layout = true;

?>

<section id="post-<?php the_ID(); ?>" class="compare-vehicles">

    <div class="ElasticAccess" data-app="elasticaccesspackage">
        <div ng-include="'templates/Compare.html'">

        </div>
    </div>

</section>
