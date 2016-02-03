<?php
if (function_exists('ninja_forms_display_form')) {
    ?>
    <div class="bb-form-wrapper">
    <h2 class="form-title"><?php echo $headline ?></h2>
    <?php echo $formcontent; ?>
    <div class="bb-form-content">
        <?php
        if ($form_id !== '0') {
            ninja_forms_display_form($form_id);
        }
        ?>
        </div>
    </div>
<?php
}
?>


<script>
jQuery(document).ready(function() {
    $('.ninja-forms-form select').selectpicker();
});
</script>
