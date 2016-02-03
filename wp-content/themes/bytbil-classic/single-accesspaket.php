<head>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/demo-ap.css'; ?>" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="<?php echo get_template_directory_uri() . '/js/demo-ap.js'; ?>"></script>

</head>

<?php
$slugs = array();
$fields = get_field("repeater-views", $post->ID);
if(count($fields) > 1) {
    foreach ($fields as $row => $field) {
        if ($field["view-slug"] == $post->post_title) {
            $repeater = $field;
        }
    }
}else{
    $repeater = $fields[0];
}

$alias = get_field('sitesetting-account-bbalias', $post->ID);
$view = $repeater["view"];
$criteria = $repeater["criteria"];
$useFixedWidth = get_field("sitesetting-accesspackage-fixed-container", $post->ID);
$fixedWidth = get_field("sitesetting-accesspackage-fixed-container-width", $post->ID);


bytbil_init_assortment($alias, $criteria, $view, "", $id);
?>
<body style="margin:0">

    <div id="setup">

        <div id="setup-toggler">
            <span style="display: inline-block; padding: 5px">
                <i class="fa fa-th" style="font-size: 14px; vertical-align: middle;"></i>&nbsp; <strong style="vertical-align: baseline;">Accesspaket Demo</strong>
            </span>
            <?php if(count($fields) > 1) { ?>
            <span style="display: inline-block; margin-left: 5px; padding-left: 10px; border-left: 1px dotted #999;">
                Visa &nbsp; <select style="padding-left: 3px; min-width: 150px; height: 26px;" id="slug-switch">
                    <?php
                    foreach ($fields as $row => $field) {
                        if ($field["view-slug"] == $post->post_title) {
                            echo "<option value=" . strtolower($field["view-slug"]) . " selected>" . $field["view-slug"] . "</option>";
                        } else {
                            echo "<option value=" . strtolower($field["view-slug"]) . ">" . $field["view-slug"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </span>
            <span style="display: inline-block; margin-left: 5px; padding-left: 10px; border-left: 1px dotted #999;">
                Skärmtyp:&nbsp;
                <select id="platform" style="width: 180px; font-family: 'FontAwesome', 'Open Sans', Arial;">
                    <option value="100%">&nbsp; &#xf108; &nbsp; Desktop/Laptop</option>
                    <option value="800px">&nbsp; &#xf10a; &nbsp; Tablet (Stående)</option>
                    <option value="568px">&nbsp; &#xf10b; &nbsp; Smartphone (Liggande)</option>
                    <option value="320px">&nbsp; &#xf10b; &nbsp; Smartphone (Stående)</option>
                </select>
            </span>

            <?php } ?>
            <?php if ( is_user_logged_in() ) { ?>
                <button class="button-primary" style="float: right; width: 100px; text-align: left;"><i class="fa fa-angle-down"></i> Visa panel</button>
            <?php } ?>

            <div class="clear"></div>
        </div>
        <div id="setup-inner">
            <div class="panel">

                <div class="column">
                    <input type="text" value="<?php echo $alias; ?>" id="alias" class="has-tooltip" placeholder="Alias" title="Default: basicclassic" spellcheck="false" />
                </div>
                <div class="column">
                    <input type="text" value="<?php echo $criteria; ?>" id="criterias" class="has-tooltip" placeholder="Kriteriesträng" title="Default: Nya och begagnade personbilar (Ordnas enligt senast inkomna)" spellcheck="false" />
                </div>
                <div class="column">
                    <input type="text" value="<?php echo $view; ?>" id="view" class="has-tooltip" placeholder="Listvy" title="Default: Lista" spellcheck="false" />
                </div>
                <div class="column" style="width: auto;">
                    <button class="button-primary" id="generateCode"><i class="fa fa-repeat"></i> Ladda Accesspaket</button>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="column" style="width: auto;">
                    <div style="padding: 4px 0;">
                        <input type="checkbox" id="show-codes" /> Visa inbäddningskod
                    </div>
                </div>
                <div class="clear"></div>

                <div id="embedcodes">
                    <button id="hidecodes"><i class="fa fa-angle-up"></i> Dölj kod</button>

                    <span>Inbäddningskoder</span>

                    <div id="embedcodes-inner">
                        Klistra in i <strong>&lt;HEAD&gt;</strong><br>
                        <textarea id="embedcode-head" spellcheck="false" onclick="this.select();"></textarea><br><br>

                        Klistra in i <strong>&lt;BODY&gt;</strong><br>
                        <input type="text" id="embedcode-body" spellcheck="false" onclick="this.select();" />
                    </div>
                </div>
            </div>

            <div class="options advanced-field">
                <div class="option-col" id="option-bgcolor">
                    Bakgrundsfärg:&nbsp; <input type="text" value="" style="width: 74px;" class="has-tooltip" title="Tar hexadecimaler och ord" />&nbsp;&nbsp; <input type="button" value="OK" />
                </div>

                <div class="option-col" id="option-width" style="margin-right: 0;">
                    Anpassad bredd:&nbsp; <input type="text" value="" style="width: 50px;" class="has-tooltip" title="Tar px och %" />&nbsp;&nbsp; <input type="button" value="OK" />
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div id="accessFrameContainer">
        <?php
        $deactivate = get_field("sitesetting-account-deactivate", $post->ID);
        if($deactivate){ ?>
            <center><h1>Accesspaketet är avaktiverat</h1></center>
        <?php }
        ?>


        <div id="loading"><div><i class='fa fa-spinner fa-spin'></i><br>Laddar Accesspaket...</div></div>
        <iframe <?php if ($useFixedWidth) : ?> style="max-width: <?php echo $fixedWidth ?>px !important; min-width: <?php echo $fixedWidth ?>px !important;" <?php endif; ?> class="access-iframe-" id="accessFrame"></iframe>
    </div>
</body>
