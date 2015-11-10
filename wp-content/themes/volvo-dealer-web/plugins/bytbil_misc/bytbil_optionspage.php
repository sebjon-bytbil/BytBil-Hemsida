<?php
if (isset($_POST['updated'])) {
    update_site_option('adminmail', $_POST['adminmail']);
    echo "E-post har uppdaterats!";
}
?>

<div class="wrap">
    <h2>BytBil Inställningar</h2>

    <form method="post" action="">
        <?php settings_fields('bytbil-options-group'); ?>
        <?php do_settings_sections('bytbil-options-group'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Kontaktformulär e-post</th>
                <td><input type="text" name="adminmail" value="<?php echo get_site_option('adminmail'); ?>"/>
                    Nuvarande: <?php echo get_site_option('adminmail'); ?></td>
            </tr>
        </table>
        <input type="hidden" name="updated" value="Y">

        <?php submit_button(); ?>
    </form>
</div>
<?php

?>
