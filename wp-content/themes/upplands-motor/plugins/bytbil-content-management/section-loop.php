<?php
foreach($row_section as $section){

    $the_row = get_field('row',$section->ID);

    //$row_menu_title = $section['row-settings-menu-header'];

    foreach($the_row as $row => $item){
        $row_menu_title = get_sub_field('row-settings-menu-header');;
        $row_menu_slug = get_slug($row_menu_title);

        $row_width = $item['row-settings-width'];
        if($row_width == 'wrapper-75' || $row_width == 'wrapper-50' || $row_width == 'wrapper-25' || $row_width == 'wrapper'){
            $row_container = 'wrapper';
        }
        else {
            $row_container = 'full';
        }

        $row_padding = $item['row-settings-padding'];
        $row_float = $item['row-settings-float'];
        $row_background_extra_style = '';

        /* Backgrounds */
        $row_background_style = $item['row-settings-background'];
        $row_background_color = 'background: #f7f7f7';

        if($row_background_style == 'color'){
            $row_background_color = $item['row-settings-background-color'];
            $row_background = 'background: ' . $row_background_color;
        }
        elseif($row_background_style == 'image'){

            $row_background_image = $item['row-settings-background-image'];
            $row_background = $row_background_color . ' url('. $row_background_image['url'] .') no-repeat center center; background-size: cover;';
            $row_background_extra_style = 'background-size: cover;';

        }
        elseif($row_background_style == 'video'){
        }

        else{
            $row_background = 'background: #fff';
        }

        /* Text Color */
        $row_text_color = $item['row-settings-text-color'];

        /* Effects */
        $row_effect = $item['row-settings-background-effect'];

        // Clear variables
        $row_effect_fade_type =
            $row_effect_fade =
            $row_effect_overlay =
            $row_effect_border =
            $row_effect_shadow = false;

        if($row_effect){
            if(in_array('fade', $row_effect)){
                $row_effect_fade_type = $item['row-settings-background-effect-fade'];
                $row_effect_fade_color = $item['row-settings-background-effect-fade-color'];
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
                $row_effect_overlay_color = $item['row-settings-background-effect-overlay-color'];
                $row_effect_overlay_opacity = $item['row-settings-background-effect-overlay-opacity']*0.01;
                $row_effect_overlay = 'background: ' . hex2rgba($row_effect_overlay_color, $row_effect_overlay_opacity);
            }
            if(in_array('border', $row_effect)){
                $row_effect_border_color = $item['row-settings-background-effect-border-color'];
                $row_effect_border = 'border: 10px solid ' . hex2rgba($row_effect_border_color,0.75);
            }
            if(in_array('shadow', $row_effect)){
                $row_effect_shadow = $item['row-settings-background-effect-shadow'];
            }
        }

        if($use_sub_menu && $row_counter == 2 && $scroll_init != false){
            $page_id = get_the_ID();
            get_sub_menu($page_id);
            $use_sub_menu = false;
        }

?>
<section class="section-block <?php echo $row_text_color; ?> <?php if($use_sub_menu){ echo 'scroll'; } ?>" style="<?php echo $row_background . ' ' . $row_background_extra_style; ?>;" name="<?php echo $row_menu_slug; ?>">
    <?php if(!empty($row_effect_fade)){ ?>
    <div class="section-effect" style="<?php echo $row_effect_fade; ?>">
        <?php } ?>

        <?php if(!empty($row_effect_overlay) || !empty($row_effect_border) || !empty($row_effect_shadow)){ ?>
        <div class="section-effect <?php if(!empty($row_effect_shadow)){ echo 'shadow-' . $row_effect_shadow; } ?>" style="<?php echo $row_effect_overlay; ?>; <?php echo $row_effect_border?>;">
            <?php } ?>

            <div class="container-fluid <?php echo $row_container . ' ' . $row_padding; ?>">
                <?php
        if($item['row-settings-heading']){ ?>
                <div class="col-xs-12">
                    <h2>
                        <?php echo get_sub_field('row-settings-heading'); ?>
                    </h2>
                </div>
                <?php }
                ?>
                <div class="row-wrapper <?php echo $row_width . ' ' . $row_float; ?>">
                    <?php
        $row_contents = $item['row-content'];
        foreach($row_contents as $row_content => $content){

            $content_width = round($content['content-width']/8.333333333333333);

                    ?>

                    <div class="col-xs-12 col-sm-<?php echo $content_width; ?> <?php echo $content['acf_fc_layout'] ?>">
                        <?php

                        if( $content['acf_fc_layout'] && $content['acf_fc_layout'] != 'section' ) {
                            require_once("sections/".$content['acf_fc_layout'].".php");
                        }

                        ?>

                    </div>

                    <?php

        }
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
    }
}
?>
