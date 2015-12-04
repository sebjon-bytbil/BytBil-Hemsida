<?php
// Setup vars
$border_rad = get_field("sitesettings-forms-border-radius", $sid);
$border_rad_global = get_field("sitesettings-forms-border-radius-global", $sid);
$border_rad_global_val = get_field("sitesetting-border-radius-val", $sid);
$input_height = get_field("sitesettings-forms-inputs-height", $sid);
$textarea_height = get_field("sitesettings-forms-textarea-height", $sid);
$input_border = get_field("sitesettings-forms-inputs-border", $sid);
$input_fz = get_field("sitesettings-forms-inputs-fz", $sid);
$placeholder_color = get_field("sitesettings-forms-placeholder-color", $sid);
$input_text_color = get_field("sitesettings-forms-input-text-color", $sid) ? get_field("sitesettings-forms-input-text-color", $sid) : "inherit";

$button_height = get_field("sitesettings-forms-buttons-height", $sid);
$button_bgc = get_field("sitesettings-forms-buttons-bgc", $sid);
$button_color = get_field("sitesettings-forms-buttons-color", $sid);
$button_border = get_field("sitesettings-forms-buttons-border", $sid);
$button_padding = get_field("sitesettings-forms-buttons-padding", $sid);

$radchk_size = get_field("sitesettings-forms-radchk-size", $sid);
$radchk_display = get_field("sitesettings-forms-radchk-display", $sid);
$radchk_optname_placement = get_field("sitesettings-forms-radchk-optname-placement", $sid) ? get_field("sitesettings-forms-radchk-optname-placement", $sid) : "before";
$label_width = get_field("sitesettings-forms-label-width", $sid);

$label_placement = get_field("sitesettings-forms-label-placement", $sid);
if (!$label_placement) {
    $label_placement = "before";
}
?>

/* Inputs */
.wpcf7 input[type="text"],
.wpcf7 input[type="email"],
.wpcf7 input[type="number"],
.wpcf7 input[type="date"] {
height: <?php echo $input_height; ?>px;
line-height: <?php echo $input_height; ?>px;
color: <?php echo $input_text_color; ?>;
<?php if (!!$input_border) : ?>border: <?php echo rtrim($input_border, "\s;"); ?>;<?php endif; ?>
font-size: <?php echo $input_fz; ?>px;
<?php if ($border_rad_global) : ?>
    border-radius: <?php echo $border_rad_global_val ?>px;
<?php elseif ($border_rad) : ?>
    border-radius: <?php echo $border_rad; ?>px;
<?php endif; ?>
}

.wpcf7 textarea {
height: <?php echo $textarea_height; ?>px;
font-size: <?php echo $input_fz; ?>px;
color: <?php echo $input_text_color; ?>;
<?php if (!!$input_border) : ?>border: <?php echo rtrim($input_border, "\s;"); ?>;<?php endif; ?>
<?php if ($border_rad_global) : ?>
    border-radius: <?php echo $border_rad_global_val ?>px;
<?php elseif ($border_rad) : ?>
    border-radius: <?php echo $border_rad; ?>px;
<?php endif; ?>
}

<?php if ($placeholder_color) : ?>
    ::-webkit-input-placeholder {
    color: <?php echo $placeholder_color; ?>;
    }

    :-moz-placeholder { /* Firefox 18- */
    color: <?php echo $placeholder_color; ?>;
    }

    ::-moz-placeholder {  /* Firefox 19+ */
    color: <?php echo $placeholder_color; ?>;
    }

    :-ms-input-placeholder {
    color: <?php echo $placeholder_color; ?>;
    }
<?php endif; ?>

/* Buttons */
.wpcf7 input[type="submit"],
.wpcf7 button {
height: <?php echo $button_height; ?>px;
line-height: <?php echo $button_height; ?>px;
background-color: <?php echo $button_bgc; ?>;
color: <?php echo $button_color; ?>;
<?php if (!!$button_border) : ?>border: <?php echo rtrim($button_border, "\s;"); ?>;<?php endif; ?>
<?php if (!!$button_padding) : ?>padding: <?php echo rtrim($button_padding, "\s;"); ?>;<?php endif; ?>
outline: none;
<?php if ($border_rad_global) : ?>
    border-radius: <?php echo $border_rad_global_val ?>px;
<?php elseif ($border_rad) : ?>
    border-radius: <?php echo $border_rad; ?>px;
<?php endif; ?>
}

/* Radio/Checkboxes */
.wpcf7 input[type="radio"],
.wpcf7 input[type="checkbox"] {
height: <?php echo $radchk_size; ?>px;
width: <?php echo $radchk_size; ?>px;
margin-left: -4px;
}

.wpcf7 .wpcf7-list-item {
display: <?php echo $radchk_display; ?>;
margin-left: 0;
<?php if ($radchk_optname_placement == "before") : ?>
    margin-right: 15px;
<?php endif; ?>
}

.wpcf7 .wpcf7-list-item .wpcf7-list-item-label {
<?php if ($radchk_optname_placement == "above") : ?>
    float: left;
    width: 100%;
<?php elseif ($radchk_optname_placement == "before") : ?>
    float: left;
    margin-right: 8px;
    line-height: 20px;
<?php endif; ?>
}

<?php if ($label_placement == "before") : ?>
    <?php $label_width = $label_width ? $label_width : 30; ?>
    <?php $field_width = 100 - $label_width; ?>
    .wpcf7-form p {
    vertical-align: top;
    width: 100%;
    }

    .wpcf7-form p:after {
    content: "";
    display: table;
    clear: both;
    }

    .wpcf7-form p br {
    display: none;
    }

    .wpcf7-form .wpcf7-form-control-wrap {
    float: right;
    width: <?php echo $field_width; ?>%;
    }
<?php endif; ?>
