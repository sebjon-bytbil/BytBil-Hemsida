<?php
if (get_field('row',$id)) {
    $rows = get_field('row',$id);
    $counter = 1;
    foreach($rows as $row => $row_item){
        if($counter == $row_counter){
            $row_contents = $row_item['row-content'];
            ?>
            <div class="col-xs-12">
                <div class="content-tab-panel">
                    <ul id="content-tabs-<?php echo $id . '-' . $row_counter; ?>" class="nav nav-tabs responsive" data-tabs="tabs">

                        <?php
                        $content_counter = 1;

                        foreach($row_contents as $row_content => $content_item){

                            //if($content_item['acf_fc_layout'] == 'offers'){
                            if($content_item['content-tab']){
                                $content_tab = $content_item['content-tab'];
                                $content_class = '';

                                if($content_tab=='true'){

                                    if($content_counter == 1){
                                        $content_class = 'active';
                                    }

                                    $content_tab_text = $content_item['content-tab-text'];
                                    $content_tab_slug = get_slug($content_tab_text) . '-' . $id;
                                    ?>

                                    <li class="<?php echo $content_class; ?>">
                                        <a href="#<?php echo $content_tab_slug; ?>" data-toggle="tab"><?php echo $content_tab_text; ?></a>
                                    </li>

                                    <?php
                                    $content_counter++;
                                }
                            //}
                            }
                        }
                        ?>

                    </ul>
                </div>
            </div>
            <?php
        }
    $counter++;
    }
}
?>