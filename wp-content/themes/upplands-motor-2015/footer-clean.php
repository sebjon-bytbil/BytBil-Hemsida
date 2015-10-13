<!-- On Load -->
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>

<?php
wp_footer();
?>

<script type="text/javascript">
    $('.ElasticAccess').each(function(){

        bootstrapAngular($(this));
    });
</script>
<?php echo get_settings_code('js'); ?>

</body>

</html>
