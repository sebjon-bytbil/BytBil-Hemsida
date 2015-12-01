<?php

$row_menu_title = $row['row-settings-menu-header'];
$row_menu_slug = get_slug($row_menu_title);

$row_width = $row['row-settings-width'];

if($row_width == 'wrapper-75' || $row_width == 'wrapper-50' || $row_width == 'wrapper-25' || $row_width == 'wrapper'){
$row_container = 'wrapper';
}
else {
$row_container = 'full';
}

$row_padding = $row['row-settings-padding'];
$row_float = $row['row-settings-float'];
$row_background_extra_style = '';

/* Backgrounds */
$row_background_style = $row['row-settings-background'];
$row_background_color = 'background: #f7f7f7';

if($row_background_style == 'color'){
$row_background_color = $row['row-settings-background-color'];
$row_background = 'background: ' . $row_background_color;
}
elseif($row_background_style == 'image'){

$row_background_image = $row['row-settings-background-image'];
$row_background = $row_background_color . ' url('. $row_background_image['url'] .') no-repeat center center; background-size: cover;';
$row_background_extra_style = 'background-size: cover;';

}
elseif($row_background_style == 'video'){
}

else{
$row_background = 'background: #fff';
}


/* Text Color */
$row_text_color = $row['row-settings-text-color'];

/* Effects */
$row_effect = $row['row-settings-background-effect'];

// Clear variables
$row_effect_fade_type =
$row_effect_fade =
$row_effect_overlay =
$row_effect_border =
$row_effect_shadow = false;

if($row_effect){
if(in_array('fade', $row_effect)){
$row_effect_fade_type = $row['row-settings-background-effect-fade'];
$row_effect_fade_color = $row['row-settings-background-effect-fade-color'];
$row_effect_fade_start = hex2rgba($row_effect_fade_color,'0');
$row_effect_fade_end = hex2rgba($row_effect_fade_color,100);
$row_effect_fade = 'background: linear-gradient(to ' . $row_effect_fade_type . ', ' . $row_effect_fade_start . ' 20%, ' . $row_effect_fade_end . ' 40%)';


if($row_effect_fade_type=='left'){
$row_background_extra_style = 'background-position-x: right; background-size: cover;';
}
elseif($row_effect_fade_type=='right'){
$row_background_extra_style = 'background-position-x: left; background-size: cover;';
}
}
if(in_array('overlay', $row_effect)){
$row_effect_overlay_color = $row['row-settings-background-effect-overlay-color'];
$row_effect_overlay_opacity = $row['row-settings-background-effect-overlay-opacity']*0.01;
$row_effect_overlay = 'background: ' . hex2rgba($row_effect_overlay_color, $row_effect_overlay_opacity);
}
if(in_array('border', $row_effect)){
$row_effect_border_color = $row['row-settings-background-effect-border-color'];
$row_effect_border = 'border: 10px solid ' . hex2rgba($row_effect_border_color,0.75);
}
if(in_array('shadow', $row_effect)){
$row_effect_shadow = $row['row-settings-background-effect-shadow'];
}
}

$use_tabs = $row['row-settings-tabs'];

$page_id = get_the_ID();

if($use_sub_menu==1 && $row_counter == 2 && $scroll_init != false){
    get_sub_menu($orig_ID);
}
?>

<section class="section-block <?php echo $row_text_color; ?> <?php if(true){ echo 'scroll'; } ?>" style="<?php echo $row_background . ' ' . $row_background_extra_style; ?>;" name="<?php echo $row_menu_slug; ?>">
    <?php if(!empty($row_effect_fade)){ ?>
    <div class="section-effect" style="<?php echo $row_effect_fade; ?>">
        <?php } ?>

        <?php if(!empty($row_effect_overlay) || !empty($row_effect_border) || !empty($row_effect_shadow)){ ?>
        <div class="section-effect <?php if(!empty($row_effect_shadow)){ echo 'shadow-' . $row_effect_shadow; } ?>" style="<?php echo $row_effect_overlay; ?>; <?php echo $row_effect_border?>;">
            <?php } ?>

            <div class="container-fluid <?php echo $row_container . ' ' . $row_padding; ?>">
                <?php
                if($row['row-settings-heading'] || $row['row-settings-paragraph'])
                { ?>
                <div class="col-xs-12">
                    <?php if($row['row-settings-heading']) { ?>
                        <h2><?php echo $row['row-settings-heading']; ?></h2>
                    <?php } ?>
                    <?php if($row['row-settings-paragraph']) { ?>
                        <p><?php echo $row['row-settings-paragraph']; ?></p>
                    <?php } ?>
                </div>
                <?php }
                ?>
                <div class="row-wrapper <?php echo $row_width . ' ' . $row_float; ?>">
                    <?php

                    $row_content = $row['row-content'];
                    $content_count = count($row_content);
                    $tab_switch = true;
                    $the_content_counter = 1;

                    foreach ($row_content as $content){
                        
                        $content_tabs = $content['content-tab'];
                            
                            if($content_tabs == 'true'){
                                $content_tab_class = '';

                                if($use_tabs == 'true' && $tab_switch==true){
                                    get_content_tabs($page_id, $row_counter);
                                ?>
                                    <div id="content-tabs-content-<?php echo $page_id . '-' . $row_counter; ?>" class="tab-content responsive">
                                <?php
                                }
                                
                                $content_tab_text = $content['content-tab-text'];
                                $content_tab_slug = get_slug($content_tab_text) . '-' . $page_id . '-' . $row_counter;
                                
                                if($the_content_counter==1){
                                    $content_tab_class = 'active';
                                }                                
                                
                                ?>
                                <div class="tab-pane <?php echo $content_tab_class; ?>" id="<?php echo $content_tab_slug; ?>">
                                    <div id="<?php echo $page_id . '-' . $content_count; ?>" class="col-xs-12 <?php echo $content['acf_fc_layout']; ?>">
                                        <?php

                                            if( $content['acf_fc_layout'] ) {
                                                require("layouts/".$content['acf_fc_layout'].".php");
                                            }

                                        ?>
                                    </div>
                                </div>
                                <?php
                                
                                $tab_switch = false;
                                $the_content_counter++;
                            }
                            
                            else {
                                $content_width = round($content['content-width']/8.333333333333333);
                                ?>

                                <div id="<?php echo $page_id . '-' . $content_count; ?>" class="col-xs-12 col-sm-<?php echo $content_width; ?> <?php echo $content['acf_fc_layout']; ?>">

                                    <?php

                                    if( $content['acf_fc_layout'] ) {
                                        require "layouts/".$content['acf_fc_layout'].".php";
                                    }

                                    ?>

                                </div>
                            <?php
                            }
                    }


                    /*if (have_rows('row-content')) {

                        while (have_rows('row-content')) {
                            the_row();

                            $content_tabs = get_sub_field('content-tab');
                            
                            if($content_tabs == 'true'){
                                $content_tab_class = '';

                                if($use_tabs == 'true' && $tab_switch==true){
                                    get_content_tabs($page_id, $row_counter);
                                ?>
                                    <div id="content-tabs-content-<?php echo $page_id . '-' . $row_counter; ?>" class="tab-content responsive">
                                <?php
                                }
                                
                                $content_tab_text = get_sub_field('content-tab-text');
                                $content_tab_slug = get_slug($content_tab_text) . '-' . $page_id . '-' . $row_counter;
                                
                                if($the_content_counter==1){
                                    $content_tab_class = 'active';
                                }                                
                                
                                ?>
                                <div class="tab-pane <?php echo $content_tab_class; ?>" id="<?php echo $content_tab_slug; ?>">
                                    <div id="<?php echo $page_id . '-' . $content_count; ?>" class="col-xs-12 <?php echo $content['acf_fc_layout']; ?>">
                                        <?php

                                            if( $content['acf_fc_layout'] ) {
                                                require("layouts/".$content['acf_fc_layout'].".php");
                                            }

                                        ?>
                                    </div>
                                </div>
                                <?php
                                
                                $tab_switch = false;
                                $the_content_counter++;
                            }
                            
                            else {
                                $content_width = round(get_sub_field('content-width')/8.333333333333333);
                                ?>

                                <div id="<?php echo $page_id . '-' . $content_count; ?>" class="col-xs-12 col-sm-<?php echo $content_width; ?> <?php echo $content['acf_fc_layout']; ?>">

                                    <?php

                                    if( $content['acf_fc_layout'] ) {
                                        require "layouts/".$content['acf_fc_layout'].".php";
                                    }

                                    ?>

                                </div>
                            <?php
                            }
                            
                            $content_count++;

                        }
                        if($use_tabs == 'true'){
                            echo '</div>';
                        }

                    }*/
                    ?>
                </div>
            </div>

            <?php if(!empty($row_effect_overlay) || !empty($row_effect_border) || !empty($row_effect_shadow)){ ?>
        </div>
        <?php } ?>

        <?php if(!empty($row_effect_fade)){ ?>
    </div>
    <?php } ?>
</section>

<?php

$row_counter++;

?>