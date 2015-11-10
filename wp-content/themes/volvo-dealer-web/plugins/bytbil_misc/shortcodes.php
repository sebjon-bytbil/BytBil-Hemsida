<?php
/**
 * Youtube shortcode [youtube] link [/youtube]
 * @param $content , youtube link or id
 *
 * @return Renders an iframe with the youtube video. It's responsive
 */
function bytbil_youtube_shortcode($atts, $content = null)
{
    $content = end(explode('v=', $content));
    $content = explode('&', $content);
    $link = '<div style="position: relative; padding-bottom: 56.25%; padding-top: 30px; height: 0; overflow: hidden;"><iframe style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;" src="//www.youtube.com/embed/' . $content[0] . '" frameborder="0" allowfullscreen></iframe></div>';

    return $link;
}

add_shortcode('youtube', 'bytbil_youtube_shortcode');

/**
 * Searchform [bytbil_search]
 *
 * @return Renders a searchform
 */
function wpbsearchform($form)
{

    $form = '<div class="searchformschortcode"><form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="' . esc_attr__('Search') . '" />
    </div>
    </form><div class="clear"></div></div>';

    return $form;
}

add_shortcode('bytbil_search', 'wpbsearchform');

/**
 * Openhours shortcode [bytbil_openhours]
 *
 * @return Renders the openhours
 */
function bytbil_openhours_shortcode()
{
    ob_start();
    ?>
    <div class="openhours-container"> <?php
    if (get_field('opentimes', 'options')) {
        while (has_sub_fields('opentimes', 'options')) { ?>
            <div style="width:100%">
                <h4><?php the_sub_field('fritext', 'options'); ?></h4>
                <?php while (has_sub_fields('times', 'options')) : ?>
                    <span><?php the_sub_field('day', 'options'); ?>: <?php the_sub_field('time', 'options'); ?></span>
                    <br>
                <?php endwhile; ?>
            </div>
        <?php } ?>
        </div>
        <?php
        return ob_get_clean();
    }
}

add_shortcode('bytbil_openhours', 'bytbil_openhours_shortcode');

/**
 * News shortcode [bytbil_news limit="" sort=""]
 * @param limit , how many that is to be fetched
 * @param sort , sorting: ASC or DESC
 *
 * @return Renders the news
 */
function news_shortcode($atts)
{
    ob_start();
    extract(shortcode_atts(array(
        'limit' => '',
        'sort' => '',
    ), $atts));

    $args = array('post_type' => 'nyheter', 'posts_per_page' => $limit, 'order' => $sort);
    $news = new WP_Query($args); ?>

    <div class="nyheter-container">
        <?php while ($news->have_posts()) : $news->the_post(); ?>
            <div>
                <div class="date"><?php echo get_the_date(); ?></div>
                <?php
                the_title();
                //$content = get_the_content();
                //preg_match('/^([^.!?\s]*[\.!?\s]+){0,15}/', strip_tags($content), $abstract);
                //echo $abstract[0] . '...';
                ?>
                <span><a href="<?php the_permalink(); ?>">Läs mer »</a></span>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div>
    <?php return ob_get_clean(); ?>
<?php
}

add_shortcode('bytbil_news', 'news_shortcode');

/**
 * Blogg shortcode [bytbil_blogg]
 * @param limit , how many that is to be fetched
 * @param sort , sorting: ASC or DESC
 *
 * @return Renders the blogg
 */
function blogg_shortcode($atts)
{
    extract(shortcode_atts(array(
        'limit' => '',
        'sort' => '',
    ), $atts));

    $args = array('post_type' => 'blogg', 'posts_per_page' => $limit, 'order' => $sort);
    $news = new WP_Query($args); ?>

    <div class="row-fluid">
        <div class="span8">
            <div class="blogginlagg">
                <?php
                while ($news->have_posts()) : $news->the_post(); ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <span><?php the_date() ?></span>
                    <p><?php the_excerpt(); ?></p>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="span4">
            <?php $args = array(
                'taxonomy' => 'kategori_blogg',
                'class' => 'categories'
            ); ?>
            <?php wp_list_categories($args); ?>
        </div>
    </div>
<?php
}

add_shortcode('bytbil_blogg', 'blogg_shortcode');


function nyheter_shortcode($atts)
{
    extract(shortcode_atts(array(
        'limit' => '',
        'sort' => '',
    ), $atts));

    $args = array('post_type' => 'nyheter', 'posts_per_page' => $limit, 'order' => $sort);
    $news = new WP_Query($args); ?>
    <div class="row-fluid">
        <div class="span8">
            <div class="blogginlagg">
                <?php
                while ($news->have_posts()) : $news->the_post(); ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <span><?php the_date() ?></span>
                    <p><?php the_excerpt(); ?></p>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="span4">
            <?php $args = array(
                'taxonomy' => 'kategori_nyheter',
                'class' => 'categories'
            ); ?>
            <?php wp_list_categories($args); ?>
        </div>
    </div>


<?php
}

add_shortcode('bytbil_nyheter', 'nyheter_shortcode');


/**
 * Nyberg car brand plugs [nyberg_brand_plugs]  NYBERG SPECIFIC
 *
 * @return Renders links with images
 */
function nybergs_brand_plugs()
{
    ob_start();
    $plugs = get_field('brand_plugs', 'options');
    ?>
    <div id="nyberg-bilknappar-div" class="nyberg-bilknappar-div">
        <?php
        foreach ($plugs as $plug) {
            $image = $plug['marke'];
            $bwimage = $plug['marke-bw'];
            $filename = basename($bwimage);
            $open_link_in = $plug['open_link_in'];
            $internlank = $plug['internlank'];
            $externlank = $plug['externlank'];
            $class = str_replace('-small-bw.png', '', $filename);
            ?>

            <a class="mitten-marke <?php echo $class ?>" href="<?php if ($internlank) {
                echo $internlank;
            } else {
                echo $externlank;
            } ?>" target="<?php echo $open_link_in ?>"></a>
        <?php
        }
        ?>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('nyberg_brand_plugs', 'nybergs_brand_plugs');

/**
 * Nyberg car brand plugs footer [nyberg_brand_plugs_footer]  NYBERG SPECIFIC
 *
 * @return Renders links with images
 */
function nybergs_brand_plugs_footer()
{
    ob_start();
    $plugs = get_field('brand_plugs_footer', 'options');
    ?>
    <div id="nyberg-bilknappar-footer-div" class="nyberg-bilknappar-footer-div">
        <?php
        foreach ($plugs as $plug) {
            $image = $plug['marke'];
            $open_link_in = $plug['open_link_in'];
            $internlank = $plug['internlank'];
            $externlank = $plug['externlank'];
            ?>
            <a href="<?php if ($internlank) {
                echo $internlank;
            } else {
                echo $externlank;
            } ?>" target="<?php echo $open_link_in ?>"><img src="<?php echo $image; ?>"/></a>
        <?php
        }
        ?>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('nyberg_brand_plugs_footer', 'nybergs_brand_plugs_footer');


/**
 * Social plugs for nyberg [social_plugs]  NYBERG SPECIFIC
 *
 * @return Renders links with images
 */
function nybergs_social_plugs()
{
    ob_start();
    $social_links = get_field('social_links', 'options');
    ?>
    <div id="nyberg-sociala-medier" class="nyberg-sociala-medier">
        <?php if (count($social_links) > 0) {
            ?><span>Följ oss:</span><?php
        }
        foreach ($social_links as $link) {
            $image = $link['type'];

            ?>
            <a target="_blank" href="<?php echo $link['url']; ?>"><img src="<?php echo $image; ?>"/></a>
        <?php
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('nyberg_social_plugs', 'nybergs_social_plugs');


function bytbil_social_plugs()
{
    ob_start();
    $social_links = get_field('social_links', 'options');
    ?>
    <div id="bytbil-sociala-medier" class="bytbil-sociala-medier">
        <?php if (count($social_links) > 0) {
            ?><span>Följ oss:</span><?php
        }
        foreach ($social_links as $link) {
            $image = $link['type'];

            ?>
            <a target="_blank" href="<?php echo $link['url']; ?>"><img src="<?php echo $image; ?>"/></a>
        <?php
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('bytbil_social_plugs', 'bytbil_social_plugs');

/**
 * Nybergs middle plugs [nyberg_middle_plugs] NYBERG SPECIFIC
 *
 * @return Renders the middle plugs on nyberg
 */
function nyberg_middle_plugs()
{ ?>
    <div class="row" style="text-align: center;">
        <a class="search-box-plug" href="#">
            <div class="plug">
                <img class="plug-image"
                     src="http://nybergs.webbplatser.cms.bytbil.com/wp-content/themes/nyberg/images/icon-bilar.png">

                <div class="plug-white">Sök bil</div>
                <div class="plug-marker"></div>
            </div>
        </a>
    </div>
    <div class="nyberg-middle-plugs-row">

        <?php
        ob_start();
        $custom_fields = get_field('middle_plug_icons', 'options');
        foreach ($custom_fields as $field) {
            $page = $field['page'];
            $icon_image = $field['icon_image'];
            $open_link_in = $field['open_link_in'];
            $title_text = $field['title_text'];
            $title_text = $field['title_text'];
            $internlank = $field["Internlänk"];
            $externlank = $field["Externlank"];
            ?>
            <a href="<?php if ($internlank) {
                echo $internlank;
            } else {
                echo $externlank;
            } ?>" target="<?php echo $open_link_in; ?>">
                <div class="plug">
                    <img class="plug-image" src="<?php echo $icon_image; ?>">

                    <div class="plug-white"><?php echo $title_text; ?></div>
                    <div class="plug-marker"></div>
                </div>
            </a>
        <?php } ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('nyberg_middle_plugs', 'nyberg_middle_plugs');


/**
 * Inserts a list of cars [bytbil_billista]
 * @param brand , what brand to filter
 * @param body , what type of body
 * @param fuel , what type of fuel
 * @param pricefrom , minimum price to show
 * @param priceto , maximum price to show
 * @param yearfrom , minimum year to show
 * @param yearto , maximum year to show
 * @param milesfrom , minimum miles to show
 * @param milesto , maximum miles to show
 * @param sort , sort by this (price, model etc)
 * @param sortasc , true or false
 * @param exclvat , show prices without VAT
 * @param limit , limit how many to show
 *
 * @return Renders a list of cars
 */
function test_testtest($atts)
{
    ob_start();
    extract(shortcode_atts(array(
        'brand' => '',
        'body' => '',
        'gearbox' => '',
        'fuel' => '',
        'pricefrom' => '',
        'priceto' => '',
        'yearfrom' => '',
        'yearto' => '',
        'milesfrom' => '',
        'milesto' => '',
        'sort' => '',
        'sortasc' => 'true',
        'exclvat' => '',
        'limit' => '',
    ), $atts));

    switch ($sort) {
        case 'model':
            $sort = 'rvppdkyg';
            break;
        case 'year':
            $sort = '3v2pdkyg';
            break;
        case 'miles':
            $sort = 'ivfpdkyg';
            break;
        case 'color':
            $sort = '7v4pdkyg';
            break;
        case 'price':
            $sort = 'pv7pdkyg';
            break;
    }

    switch ($fuel) {
        case 'bensin' :
            $fuel = 'tv5pdkyg';
            break;
        case 'bensinetanol' :
            $fuel = 'evhpdkyg';
            break;
        case 'bensingas' :
            $fuel = 'cvg5dkyg';
            break;
        case 'diesel' :
            $fuel = 'wvxpdkyg';
            break;
        case 'el' :
            $fuel = 'xvqpdkyg';
            break;
        case 'hybrid' :
            $fuel = '5vepdkyg';
            break;
        case 'naturgas' :
            $fuel = '6vcpdkyg';
            break;
    }

    switch ($gearbox) {
        case 'automatisk' :
            $gearbox = 'gvwpdkyg';
            break;
        case 'manuell' :
            $gearbox = '4v8pdkyg';
            break;
        case 'sekventiell' :
            $gearbox = '8vnpdkyg';
            break;
    }

    switch ($body) {
        case 'sedan' :
            $body = 'rvppdkyg';
            break;
        case 'kombi' :
            $body = 'sv3pdkyg';
            break;
        case 'halvkombi' :
            $body = 'vvipdkyg';
            break;
        case 'sportkupe' :
            $body = '3v2pdkyg';
            break;
        case 'suv' :
            $body = 'ivfpdkyg';
            break;
        case 'cab' :
            $body = '7v4pdkyg';
            break;
        case 'minibuss' :
            $body = '2v9pdkyg';
            break;
        case 'övrigt' :
            $body = 'fvgpdkyg';
            break;
    }

    switch ($brand) {
        case 'abarth':
            $brand = 'mv3ydkyg';
            break;
        case 'ac':
            $brand = 'gv8idkyg';
            break;
        case 'acura':
            $brand = 'rvq6dkyg';
            break;
        case 'aixam':
            $brand = 'jvxwdkyg';
            break;
        case 'alfa':
            $brand = 'rvppdkyg';
            break;
        case 'aston':
            $brand = 'pv7pdkyg';
            break;
        case 'audi':
            $brand = '3v2pdkyg';
            break;
        case 'austin':
            $brand = 'ivfpdkyg';
            break;
        case 'austin':
            $brand = '6vbudkyg';
            break;
        case 'beach':
            $brand = '9vzqdkyg';
            break;
        case 'bentley':
            $brand = '7v4pdkyg';
            break;
        case 'bmw':
            $brand = '2v9pdkyg';
            break;
        case 'buick':
            $brand = 'fvgpdkyg';
            break;
        case 'cadillac':
            $brand = '4v8pdkyg';
            break;
        case 'caterham':
            $brand = 'ev3cdkyg';
            break;
        case 'chatenet':
            $brand = '4vkmdkyg';
            break;
        case 'chevrolet':
            $brand = '9vtpdkyg';
            break;
        case 'chrysler':
            $brand = 'gvwpdkyg';
            break;
        case 'citroën':
            $brand = '8vnpdkyg';
            break;
        case 'dacia':
            $brand = '3vbtdkyg';
            break;
        case 'daewoo':
            $brand = 'tv5pdkyg';
            break;
        case 'daihatsu':
            $brand = 'nv6pdkyg';
            break;
        case 'daimler':
            $brand = '5vepdkyg';
            break;
        case 'desoto':
            $brand = 'svu8dkyg';
            break;
        case 'dodge':
            $brand = 'xvqpdkyg';
            break;
        case 'ecar':
            $brand = '2v6udkyg';
            break;
        case 'edsel':
            $brand = 'svc6dkyg';
            break;
        case 'excalibur':
            $brand = '6vcpdkyg';
            break;
        case 'ferrari':
            $brand = 'evhpdkyg';
            break;
        case 'fiat':
            $brand = 'qvkpdkyg';
            break;
        case 'fisker':
            $brand = '6vdydkyg';
            break;
        case 'ford':
            $brand = 'cvmpdkyg';
            break;
        case 'galloper':
            $brand = 'hvjpdkyg';
            break;
        case 'gmc':
            $brand = 'kvypdkyg';
            break;
        case 'honda':
            $brand = 'mvupdkyg';
            break;
        case 'hudson':
            $brand = '2vs8dkyg';
            break;
        case 'hummer':
            $brand = '4vp8dkyg';
            break;
        case 'hyundai':
            $brand = 'jvzpdkyg';
            break;
        case 'infiniti':
            $brand = 'cvn8dkyg';
            break;
        case 'isuzu':
            $brand = 'yvbpdkyg';
            break;
        case 'iveco':
            $brand = 'uvdpdkyg';
            break;
        case 'jaguar':
            $brand = 'zvapdkyg';
            break;
        case 'jdm':
            $brand = 'bvrpdkyg';
            break;
        case 'jeep':
            $brand = 'dvspdkyg';
            break;
        case 'kia':
            $brand = 'svp3dkyg';
            break;
        case 'koenigsegg':
            $brand = 'bvk8dkyg';
            break;
        case 'lada':
            $brand = 'vv33dkyg';
            break;
        case 'lamborghini':
            $brand = 'pvi3dkyg';
            break;
        case 'lancia':
            $brand = '3v73dkyg';
            break;
        case 'land':
            $brand = 'iv23dkyg';
            break;
        case 'lexus':
            $brand = '7vf3dkyg';
            break;
        case 'lincoln':
            $brand = '2v43dkyg';
            break;
        case 'lotus':
            $brand = 'fv93dkyg';
            break;
        case 'maserati':
            $brand = '4vg3dkyg';
            break;
        case 'mazda':
            $brand = '9v83dkyg';
            break;
        case 'mclaren':
            $brand = 'fv22dkyg';
            break;
        case 'mercedes':
            $brand = 'gvt3dkyg';
            break;
        case 'mercury':
            $brand = 'jvn5dkyg';
            break;
        case 'mg':
            $brand = '8vw3dkyg';
            break;
        case 'microcar':
            $brand = 'jv6tdkyg';
            break;
        case 'mini':
            $brand = 'tvn3dkyg';
            break;
        case 'mitsubishi':
            $brand = 'wv53dkyg';
            break;
        case 'morgan':
            $brand = 'nvx3dkyg';
            break;
        case 'nissan':
            $brand = 'xve3dkyg';
            break;
        case 'oldsmobile':
            $brand = '6vq3dkyg';
            break;
        case 'opel':
            $brand = 'evc3dkyg';
            break;
        case 'packard':
            $brand = 'hvntdkyg';
            break;
        case 'peugeot':
            $brand = 'qvh3dkyg';
            break;
        case 'plymouth':
            $brand = 'cvk3dkyg';
            break;
        case 'pontiac':
            $brand = 'hvm3dkyg';
            break;
        case 'porsche':
            $brand = 'kvj3dkyg';
            break;
        case 'renault':
            $brand = 'mvy3dkyg';
            break;
        case 'reynard':
            $brand = 'bv2zdkyg';
            break;
        case 'rolls':
            $brand = 'jvu3dkyg';
            break;
        case 'rover':
            $brand = 'hvc2dkyg';
            break;
        case 'saab':
            $brand = 'uvb3dkyg';
            break;
        case 'seat':
            $brand = 'bva3dkyg';
            break;
        case 'simca':
            $brand = 'jvgqdkyg';
            break;
        case 'singer':
            $brand = 'evdudkyg';
            break;
        case 'skoda':
            $brand = 'dvr3dkyg';
            break;
        case 'smart':
            $brand = 'avs3dkyg';
            break;
        case 'ssangyong':
            $brand = 'svvidkyg';
            break;
        case 'studebaker':
            $brand = 'rvy8dkyg';
            break;
        case 'subaru':
            $brand = 'vvpidkyg';
            break;
        case 'suzuki':
            $brand = 'pv3idkyg';
            break;
        case 'tazzari':
            $brand = '5vzydkyg';
            break;
        case 'toyota':
            $brand = 'iv7idkyg';
            break;
        case 'triumph':
            $brand = '7v2idkyg';
            break;
        case 'tvr':
            $brand = 'gv4fdkyg';
            break;
        case 'ultima':
            $brand = '9vcudkyg';
            break;
        case 'vauxhall':
            $brand = 'vvecdkyg';
            break;
        case 'westfield':
            $brand = 'zv7zdkyg';
            break;
        case 'wiesmann':
            $brand = 'uvtqdkyg';
            break;
        case 'volkswagen':
            $brand = '2vfidkyg';
            break;
        case 'volvo':
            $brand = 'fv4idkyg';
            break;
        case 'vpg':
            $brand = 'bvfudkyg';
            break;
    }
    $filter = array(
        "Brand=" . $brand,
        "Body=" . $body,
        "Gearbox=" . $gearbox,
        "Fuel=" . $fuel,
        "PriceFrom=" . $pricefrom, "PriceTo=" . $priceto,
        "YearFrom=" . $yearfrom, "YearTo=" . $yearto,
        "MilesFrom=" . $milesfrom, "MilesTo=" . $milesto,
        "Sort=" . $sort,
        "SortAsc=" . $sortasc,
        "OnlyVat=" . $exclvat,
        "PageSize=" . $limit,
    );
    $response = getCars($filter);
    ?>

    <div class="nyberg-car-row">
    <?php
    $i = 0;
    foreach ($response->Items as $item) :
        $imgurl = $item->ImageUrl;
        $imgurl = str_replace('thumb', 'full', $imgurl);

        ?>
        <div class="nyberg-car-container">
            <a href="<?php echo site_url(); ?>/fordon/?f=<?php echo $item->Id; ?>&model=<?php echo $item->ModelName; ?>">
                <div class="nyberg-car-image" style="background-image: url('<?php echo $imgurl; ?>');"></div>
                <div class="nyberg-car-text">
                    <h4 class="nyberg-car-title"><?php echo $item->FullName; ?></h4>

                    <p><?php echo $item->Year; ?></p>

                    <p><?php echo $item->KM; ?>, <?php echo $item->Color; ?></p>

                    <p>Fuel. Gearbox</p>

                    <p><?php echo $item->Location; ?></p>
                    <span><strong><?php echo number_format($item->Price, 0, ',', '.'); ?> kr</strong></span>

                    <div class="nyberg-car-corner"></div>
                </div>
            </a>
        </div>
        <?php
        $i++;
        if ($i == 4) {
            $i = 0; ?>
            </div><div class="nyberg-car-row">
        <?php }
    endforeach;
    ?>
    </div>
    <div class="clear"></div>

    <?php
    return ob_get_clean();
}

add_shortcode('bytbil_billista', 'test_testtest');


/**
 * Inserts the volvia plug [bytbil_volvia_plug]
 * @param $atts [], associative array that can contain 'reg'=>'string'
 *
 * @return The volvia plug
 */
function bytbil_volvia_plug($atts)
{

    extract(shortcode_atts(array(
        'reg' => 'aaa111',
    ), $atts));
    if ($atts['brand'] == "renault") {
        $starturl = "http://www.renaultforsakring.se/start/partner_offert.volvia";
        $koncept = "R";
        $imgurl = get_template_directory_uri() . "/images/renault_logotype.gif";
    }
    if ($atts['brand'] == "volvo") {
        $starturl = "http://www.volvia.se/start/partner_offert.volvia";
        $koncept = "V";
        $imgurl = get_template_directory_uri() . "/images/volvia_logotype.gif";
    }

    ob_start();
    ?>
    <script type="text/javascript">

        function showVolviaQuote() {
            // Om det är en Volvo

            var starturl = '<?php echo $starturl; ?>'


            //Bilens registreringsnummer
            var regnr = '<?php echo $reg; ?>';


            //Kundnummer=Personnummer som matats in
            var kundnr = document.getElementById('PInput').value;

            //Körsträcka 1=default
            var kkl = "1";
            var koncept = '<?php echo $koncept; ?>';


            //Koncept V=Volvobil(Volvia) R=Renault eller Dacia (Renautlförsäkring)
            //var koncept = "V";

            // Url till en bild på bilen
            var bildurl = "http://data.bytbil.com/images/nybergs/" + regnr + "-1001.jpg";

            //Nybergs bils distriktsnr (0121 är t ex Liljas Bil)
            var afid = "0305";

            if (kundnr.length != 10) {
                alert('Var god ange 10-siffrigt personnummer "yyMMddnnnn".');
            } else {

                // Öppna i eget fönster
                window.open(starturl + "?p_kundnr=" + escape(kundnr) +
                "&p_kkl=" + escape(kkl) +
                "&p_regnr=" + escape(regnr) +
                "&p_koncept=" + escape(koncept) +
                "&p_url=" + escape(bildurl) +
                "&p_af_id=" + escape(afid), "Premie", "_blank", resizable = 1, width = 850, height = 800);
            }
        }


    </script>

    <div id="insurance-plug" class="insurance-plug" style=""><img src="<?php echo $imgurl; ?>"
                                                                  style="margin: 0 auto;display: block;">

        <p style="color: #ffffff; font-size: 11px; margin: 0px 0 6px 0;">
            Här kan du välja en riktigt bra
            försäkring. Bara ange
            personnummer:
        </p><input id="PInput" type="text" style="font-size: 12px; margin: 5px; width: 90px;" class="TextBox"
                   onkeyup="if (event.keyCode == 13) showVolviaQuote();"><input type="button" value="Visa"
                                                                                onclick="showVolviaQuote();"></div>

    <?php
    return ob_get_clean();
}

add_shortcode('bytbil_volvia_plug', 'bytbil_volvia_plug');


/**
 * The accesspaket searchbox [bytbil_searchbox]
 *
 * @return Renders a searchbox
 */
function bytbil_searchbox($atts)
{
    ob_start();
    include(locate_template('includes/include-searchbox.php'));
    ?>
        </form>
        <?php
    return ob_get_clean();
}

add_shortcode('bytbil_searchbox', 'bytbil_searchbox');

function bytbil_searchbox_withoutformend($atts)
{
    ob_start();
    include(locate_template('includes/include-searchbox.php'));
    return ob_get_clean();
}

add_shortcode('bytbil_searchbox_withoutformend', 'bytbil_searchbox_withoutformend');


/**
 * Sharebuttons [bytbil_share]
 *
 * @return Renders sharing for facebook and twitter
 */
function bytbil_dela_function()
{
    $this_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    ?>
    Dela:
    <a target="_blank" href="http://twitter.com/home?status=Se den här bilen: <?php echo $this_url; ?>"><img
            src="<?php bloginfo('template_url'); ?>/images/logo-twitter-bnw.png"/></a>
    <a target="_blank"
       href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo $this_url; ?>&p[images][0]=&p[title]=Nybergs bil&p[summary]=Se den här bilen: "><img
            src="<?php bloginfo('template_url'); ?>/images/logo-facebook-bnw.png"/></a>
<?php
}

add_shortcode('bytbil_share', 'bytbil_dela_function');


//Create shortcode wizard
function register_button($buttons)
{
    array_push($buttons, "", "bytbilslider");
    array_push($buttons, "", "personalorter");
    array_push($buttons, "", "bytbilpersonal");
    return $buttons;
}

function add_plugin($plugin_array)
{
    $plugin_array['bytbilslider'] = 'bytbilslider.js';
    $plugin_array['personalorter'] = 'personalorter.js';
    $plugin_array['bytbilpersonal'] = 'bytbilpersonal.js';
    return $plugin_array;
}

function my_recent_posts_button()
{

    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }

    if (get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'add_plugin');
        add_filter('mce_buttons', 'register_button');
    }

}

add_action('init', 'my_recent_posts_button');

// init process for registering our button
add_action('init', 'wpse72394_shortcode_button_init');
function wpse72394_shortcode_button_init()
{

    //Abort early if the user will never see TinyMCE
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
        return;

    //Add a callback to regiser our tinymce plugin
    add_filter("mce_external_plugins", "wpse72394_register_tinymce_plugin");

    // Add a callback to add our button to the TinyMCE toolbar
    add_filter('mce_buttons', 'wpse72394_add_tinymce_button');
}


//This callback registers our plug-in
function wpse72394_register_tinymce_plugin($plugin_array)
{
    $plugin_array['wpse72394_button'] = 'personallista.js';
    return $plugin_array;
}

//This callback adds our button to the toolbar
function wpse72394_add_tinymce_button($buttons)
{
    //Add the button ID to the $button array
    $buttons[] = "wpse72394_button";
    return $buttons;
}

?>