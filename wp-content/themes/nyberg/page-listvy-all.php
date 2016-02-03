<?php
/*
    Template Name: Listvy Alla Bilar
*/

get_header('undersida');
/**/
?>
<script type="text/javascript">
    window['searchtype'] = '&SearchType=rvppdkyg';
</script>
<div id="primary" class="content-area">
    <div id="content" class="nyberg-site-content" role="main">

        <div class="midcontent searchblock">

            <div class="nyberg-middle-bar">
                <div class="nyberg-breadcrumbs">
                    <?php if (function_exists('bcn_display')) {
                        bcn_display();
                    } ?>
                </div>
                <?php echo do_shortcode('[nyberg_social_plugs]'); ?>
            </div>
            <?php
            if (isset($_GET)) {
                $post = json_decode(json_encode($_GET), FALSE);
            }
            //WORKING


            $Body = "BodyType=$post->Body";
            $Gearbox = "GearboxTypes=$post->Gearbox";
            $Fuel = "FuelTypes=$post->Fuel";
            $Location = "Dealers=$post->SelectCity";
            $exclVAT = "OnlyVat=$post->exclVAT";

            $PriceFrom = "PriceFrom=$post->PriceFrom";
            $PriceTo = "PriceTo=$post->PriceTo";

            $YearFrom = "YearFrom=$post->YearFrom";
            $YearTo = "YearTo=$post->YearTo";

            $MilesFrom = "MilesFrom=$post->MilesFrom";
            $MilesTo = "MilesTo=$post->MilesTo";
            //$UsedState = "UsedState=Used"; // Used, New or None


            $ModelName = "Models=$post->ModelName";
            $Sort = "Sort=$post->Sort";
            $Page = "Page=$post->Page";

            $SortAsc = $post->SortAsc;
            $lastSort = $post->lastSort;
            $lastPage = $post->lastPage;

            $checkSort = explode('=', $Sort);

            if ($checkSort[1] == $lastSort && $SortAsc == 'SortAsc=true') {
                $SortAsc = "SortAsc=false";
            } else if ($checkSort[1] == $lastSort && $SortAsc == 'SortAsc=false') {
                $SortAsc = "SortAsc=true";
            } else {
                $SortAsc = 'SortAsc=true';
            }

            if ($post->Sort == null) {
                $Sort = "Sort=$lastSort";
            } else {
                $lastSort = $post->Sort;
            }

            if ($post->Page == null) {
                $Page = "Page=$lastPage";
            } else {
                $lastPage = $post->Page;
            }

            $Brand = "Brand=$post->Brand";


            // NOT IN FORM

            //checkboxes
            //Boolean where true is defined as "on" and false is defined as NULL.
            //Only use these parameters if you intend to pass true
            $OnlyNew = "OnlyNew=";
            $OnlyImages = "OnlyImages=";
            $OnlyVideo = "OnlyVideo=";
            $OnlyVat = "OnlyVat=";
            $OnlyEnvironment = "OnlyEnvironment=";


            $filter = array(
                $Brand,
                $Body,
                $Gearbox,
                $Fuel,
                $Location,
                $PriceFrom, $PriceTo,
                $YearFrom, $YearTo,
                $MilesFrom, $MilesTo,
                $Page,
                $ModelName,
                $Sort,
                $SortAsc,
                $exclVAT,
            );

            $response = getCars($filter);

            $active = $response->CurrentPage + 1;

            if ($response->PageSize) {
                $total = ceil($response->TotalCount / $response->PageSize);
            }

            if ($total < $active) {
                $Page = 'Page=' . ($total - 1);
                $filter = array(
                    $Brand,
                    $Body,
                    $Gearbox,
                    $Fuel,
                    $Location,
                    $PriceFrom, $PriceTo,
                    $YearFrom, $YearTo,
                    $MilesFrom, $MilesTo,
                    $Page,
                    $ModelName,
                    $Sort,
                    $SortAsc,
                    $exclVAT,
                );
                $response = getCars($filter);
            }
            ?>
            <div class="nyberg-search-plug">
                <?php include(locate_template('includes/include-searchbox.php')); ?>
            </div>
            <?php echo do_shortcode('[nyberg_byggbil slug="bygg-din-nya-bil-sjalv"]'); ?>
        </div>
        <div class="nyberg-carlist-container">
            <div class="midcontent paginationn">
                <?php if ($response->TotalCount < 1) {
                    $totalcars = 0;
                } else {
                    $totalcars = $response->TotalCount;
                }
                ?>
                <span>Sökningen gav <?php echo $totalcars; ?> träffar.</span>

                <div class="clear"></div>
                <?php if ($totalcars > 20) {
                    include(locate_template('includes/include-pagination.php'));
                } ?>
                <div class="sorting">
                    <ul>
                        <li><span>Sortera efter:</span></li>
                        <li>
                            <button name="Sort" value="rvppdkyg" <?php if ($lastSort == 'rvppdkyg') {
                                echo 'class="active"';
                            } ?>>Modell <?php if ($SortAsc == 'SortAsc=true' && $lastSort == 'rvppdkyg') {
                                    echo "&#x25B2";
                                } else if ($lastSort == "rvppdkyg" && $SortAsc = 'SortAsc=false') {
                                    echo "&#x25BC";
                                } ?></button>
                        </li>
                        <li>
                            <button name="Sort" value="3v2pdkyg" <?php if ($lastSort == '3v2pdkyg') {
                                echo 'class="active"';
                            } ?>>Årtal <?php if ($SortAsc == 'SortAsc=true' && $lastSort == '3v2pdkyg') {
                                    echo "&#x25B2";
                                } else if ($lastSort == "3v2pdkyg" && $SortAsc = 'SortAsc=false') {
                                    echo "&#x25BC";
                                } ?></button>
                        </li>
                        <li>
                            <button name="Sort" value="ivfpdkyg" <?php if ($lastSort == 'ivfpdkyg') {
                                echo 'class="active"';
                            } ?>>Miltal <?php if ($SortAsc == 'SortAsc=true' && $lastSort == 'ivfpdkyg') {
                                    echo "&#x25B2";
                                } else if ($lastSort == "ivfpdkyg" && $SortAsc = 'SortAsc=false') {
                                    echo "&#x25BC";
                                } ?></button>
                        </li>
                        <li>
                            <button name="Sort" value="7v4pdkyg" <?php if ($lastSort == '7v4pdkyg') {
                                echo 'class="active"';
                            } ?>>Färg <?php if ($SortAsc == 'SortAsc=true' && $lastSort == '7v4pdkyg') {
                                    echo "&#x25B2";
                                } else if ($lastSort == "7v4pdkyg" && $SortAsc = 'SortAsc=false') {
                                    echo "&#x25BC";
                                } ?></button>
                        </li>
                        <li>
                            <button name="Sort" value="pv7pdkyg" <?php if ($lastSort == 'pv7pdkyg') {
                                echo 'class="active"';
                            } ?>>Pris <?php if ($SortAsc == 'SortAsc=true' && $lastSort == 'pv7pdkyg') {
                                    echo "&#x25B2";
                                } else if ($lastSort == "pv7pdkyg" && $SortAsc = 'SortAsc=false') {
                                    echo "&#x25BC";
                                } ?></button>
                        </li>
                    </ul>
                    <input type="hidden" name="lastSort" value="<?php echo $lastSort; ?>">
                    <input type="hidden" name="SortAsc" value="<?php echo $SortAsc; ?>">
                </div>
            </div>
            </form>
            <div class="clear"></div>
            <div class="midcontent" id="allabilar">
                <div class="nyberg-car-row">
                    <?php
                    $i = 0;
                    if ($response->Items) :
                    foreach ($response->Items as $item) :

                    $current_price = $item->CurrentPrice;
                    $price = $item->Price;
                    $imgurl = $item->ImageUrl;
                    $imgurl = str_replace('thumb', 'full', $imgurl);
                    if ($imgurl == "http://www.bytbil.com/ViewImage.aspx?MediaId=-1&type=full") {
                        $imgurl = get_bloginfo('template_url') . "/images/nybergs_bildsaknas.jpg";
                    }
                    ?>
                    <div class="nyberg-car-container">
                        <a href="<?php echo site_url(); ?>/fordon/?f=<?php echo $item->Id; ?>&model=<?php echo $item->ModelName; ?>">
                            <div class="nyberg-car-image"
                                 style="background-image: url('<?php echo $imgurl; ?>');"></div>
                            <div class="nyberg-car-text">
                                <h4 class="nyberg-car-title"><?php echo $item->FullName; ?></h4>

                                <p><?php echo $item->Year;?></p>

                                <p><?php echo $item->SweMiles; ?> Mil, <?php echo $item->Color; ?></p>

                                <p><?php echo $item->FuelType; ?>. <?php echo $item->GearboxType; ?>.</p>

                                <p><?php echo $item->Location; ?></p>
                                <?php if ($current_price > 0) { ?>
                                    <p><strong>
                                            <span
                                                class="linetrough forcefont"><?php echo number_format($price, 0, ',', '.'); ?>
                                                kr</span>
                                    <span class="redprice forcefont">
                                        <?php echo number_format($current_price, 0, ',', '.') . ' kr '; ?>
                                    </span>
                                        </strong>
                                    </p>
                                <?php
                                } else {
                                    ?>
                                        <p><strong><?php echo number_format($price, 0, ',', '.'); ?> kr</p></strong>
                            <?php } ?>
                                <div class="nyberg-car-corner"></div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $i++;
                    if ($i == 4){
                    $i = 0; ?>
                </div>
                <div class="nyberg-car-row">
                    <?php }
                    endforeach;
                    endif;
                    ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="midcontent">
            <div class="midcontent">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
                <?php nyberg_puffar(); ?>
            </div>
        </div>
    </div>
    <!-- #content -->
</div>
<!-- #primary -->
<?php get_footer(); ?>
