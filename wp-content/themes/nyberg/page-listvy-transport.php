<?php
/*
    Template Name: Listvy Transportbilar
*/
get_header('undersida');
?>
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

                $ModelText = "ModelText=$post->ModelText";
                $Body = "BodyType=$post->Body";
                $Gearbox = "GearboxTypes=$post->Gearbox";
                $Fuel = "FuelTypes=$post->Fuel";
                $Location = "Dealers=$post->SelectCity";
                $exclVAT = "OnlyVat=$post->exclVAT";
                $SearchType = "SearchType=be7p4amg";
                $PriceFrom = "PriceFrom=$post->PriceFrom";
                $PriceTo = "PriceTo=$post->PriceTo";

                $YearFrom = "YearFrom=$post->YearFrom";
                $YearTo = "YearTo=$post->YearTo";

                $MilesFrom = "MilesFrom=$post->MilesFrom";
                $MilesTo = "MilesTo=$post->MilesTo";
                $UsedState = "UsedState=None"; // Used, New or None


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
                    $ModelText,
                    $SearchType,
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
                    $UsedState,
                );

                $response = getCars($filter);

                $active = $response->CurrentPage + 1;
                if ($response->PageSize) {
                    $total = ceil($response->TotalCount / $response->PageSize);
                }

                if ($total < $active) {
                    $Page = 'Page=' . ($total - 1);
                    $filter = array(
                        $ModelText,
                        $SearchType,
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
                        $UsedState,
                    );
                    $response = getCars($filter);
                }
                ?>
                <div class="nyberg-search-plug">
                    <?php $atts['searchtype'] = "be7p4amg"   // include(locate_template('includes/include-searchbox.php'));?>

                    <script>
                        window['searchtype'] = "&SearchType=be7p4amg";
                    </script>
                    <form action="<?php echo $atts['target'] ?>" name="search" method="get">
                        <div class="row-fluid">
                            <div class="span-nyberg col2 searchItemContainer branddiv">
                                <?php $BrandCheck = explode('=', $Brand); ?>

                                <select class="FormItem" name="Brand" id="Brand">
                                    <option value="">Märke</option>
                                </select>
                            </div>
                            <div class="span-nyberg col2 searchItemContainer modeltextdiv">
                                <?php if ($atts['searchtype'] === "be7p4amg") { ?>
                                    <?php $BodyCheck = explode('=', $ModelText); ?>
                                    <input value="<?php echo $BodyCheck[1] ?>" placeholder="Sök Modell" type="text"
                                           class="FormItem" name="ModelText" id="ModelText">
                                <?php } else {
                                    ?>
                                    <select class="FormItem" name="ModelName" id="ModelName">
                                        <option value="">Modell</option>
                                    </select>
                                <?php } ?>
                            </div>

                            <div class="span-nyberg col2 searchItemContainer bodydiv">
                                <?php $BodyCheck = explode('=', $Body); ?>
                                <select class="FormItem" name="Body" id="Body">
                                    <option value="">Kaross</option>
                                    <?php if ($atts['searchtype'] === "be7p4amg") { ?>
                                        <option
                                            value="evqidkyg" <?php if ($BodyCheck[1] == 'evqidkyg') echo ' selected' ?>>
                                            Transportbil - Skåp
                                        </option>
                                        <option
                                            value="6veidkyg" <?php if ($BodyCheck[1] == '6veidkyg') echo ' selected' ?>>
                                            Transportbil - Flak
                                        </option>
                                    <?php } else {
                                        ?>
                                        <option
                                            value="rvppdkyg" <?php if ($BodyCheck[1] == 'rvppdkyg') echo ' selected' ?>>
                                            Sedan
                                        </option>
                                        <option
                                            value="sv3pdkyg" <?php if ($BodyCheck[1] == 'sv3pdkyg') echo ' selected' ?>>
                                            Kombi
                                        </option>
                                        <option
                                            value="vvipdkyg" <?php if ($BodyCheck[1] == 'vvipdkyg') echo ' selected' ?>>
                                            Halvkombi
                                        </option>
                                        <option
                                            value="3v2pdkyg" <?php if ($BodyCheck[1] == '3v2pdkyg') echo ' selected' ?>>
                                            Sportkupé
                                        </option>
                                        <option
                                            value="ivfpdkyg" <?php if ($BodyCheck[1] == 'ivfpdkyg') echo ' selected' ?>>
                                            SUV
                                        </option>
                                        <option
                                            value="7v4pdkyg" <?php if ($BodyCheck[1] == '7v4pdkyg') echo ' selected' ?>>
                                            Cab
                                        </option>
                                        <option
                                            value="2v9pdkyg" <?php if ($BodyCheck[1] == '2v9pdkyg') echo ' selected' ?>>
                                            Minibuss
                                        </option>
                                        <option
                                            value="fvgpdkyg" <?php if ($BodyCheck[1] == 'fvgpdkyg') echo ' selected' ?>>
                                            Övrigt
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row-fluid">
                            <div class="span-nyberg  searchItemDoubleContainer pricediv">
                                <?php $priceFromCheck = explode('=', $PriceFrom); ?>
                                <select class="FormMin" name="PriceFrom" id="PriceFrom">
                                    <option value="">Pris från</option>
                                    <option value="10000" <?php if ($priceFromCheck[1] == '10000') echo ' selected' ?>>
                                        10.000
                                    </option>
                                    <option value="20000" <?php if ($priceFromCheck[1] == '20000') echo ' selected' ?>>
                                        20.000
                                    </option>
                                    <option value="30000" <?php if ($priceFromCheck[1] == '30000') echo ' selected' ?>>
                                        30.000
                                    </option>
                                    <option value="40000" <?php if ($priceFromCheck[1] == '40000') echo ' selected' ?>>
                                        40.000
                                    </option>
                                    <option value="50000" <?php if ($priceFromCheck[1] == '50000') echo ' selected' ?>>
                                        50.000
                                    </option>
                                    <option value="60000" <?php if ($priceFromCheck[1] == '60000') echo ' selected' ?>>
                                        60.000
                                    </option>
                                    <option value="70000" <?php if ($priceFromCheck[1] == '70000') echo ' selected' ?>>
                                        70.000
                                    </option>
                                    <option value="80000" <?php if ($priceFromCheck[1] == '80000') echo ' selected' ?>>
                                        80.000
                                    </option>
                                    <option value="90000" <?php if ($priceFromCheck[1] == '90000') echo ' selected' ?>>
                                        90.000
                                    </option>
                                    <option
                                        value="100000" <?php if ($priceFromCheck[1] == '100000') echo ' selected' ?>>
                                        100.000
                                    </option>
                                    <option
                                        value="120000" <?php if ($priceFromCheck[1] == '120000') echo ' selected' ?>>
                                        120.000
                                    </option>
                                    <option
                                        value="140000" <?php if ($priceFromCheck[1] == '140000') echo ' selected' ?>>
                                        140.000
                                    </option>
                                    <option
                                        value="160000" <?php if ($priceFromCheck[1] == '160000') echo ' selected' ?>>
                                        160.000
                                    </option>
                                    <option
                                        value="180000" <?php if ($priceFromCheck[1] == '180000') echo ' selected' ?>>
                                        180.000
                                    </option>
                                    <option
                                        value="200000" <?php if ($priceFromCheck[1] == '200000') echo ' selected' ?>>
                                        200.000
                                    </option>
                                    <option
                                        value="220000" <?php if ($priceFromCheck[1] == '220000') echo ' selected' ?>>
                                        220.000
                                    </option>
                                    <option
                                        value="240000" <?php if ($priceFromCheck[1] == '240000') echo ' selected' ?>>
                                        240.000
                                    </option>
                                    <option
                                        value="260000" <?php if ($priceFromCheck[1] == '260000') echo ' selected' ?>>
                                        260.000
                                    </option>
                                    <option
                                        value="280000" <?php if ($priceFromCheck[1] == '280000') echo ' selected' ?>>
                                        280.000
                                    </option>
                                    <option
                                        value="300000" <?php if ($priceFromCheck[1] == '300000') echo ' selected' ?>>
                                        300.000
                                    </option>
                                    <option
                                        value="320000" <?php if ($priceFromCheck[1] == '320000') echo ' selected' ?>>
                                        320.000
                                    </option>
                                    <option
                                        value="340000" <?php if ($priceFromCheck[1] == '340000') echo ' selected' ?>>
                                        340.000
                                    </option>
                                    <option
                                        value="360000" <?php if ($priceFromCheck[1] == '360000') echo ' selected' ?>>
                                        360.000
                                    </option>
                                    <option
                                        value="380000" <?php if ($priceFromCheck[1] == '380000') echo ' selected' ?>>
                                        380.000
                                    </option>
                                    <option
                                        value="400000" <?php if ($priceFromCheck[1] == '400000') echo ' selected' ?>>
                                        400.000
                                    </option>

                                </select>
                                <?php $priceToCheck = explode('=', $PriceTo); ?>
                                <select class="FormMax" name="PriceTo" id="PriceTo">
                                    <option value="">Pris till</option>
                                    <option value="10000" <?php if ($priceToCheck[1] == '10000') echo ' selected' ?>>
                                        10.000
                                    </option>
                                    <option value="20000" <?php if ($priceToCheck[1] == '20000') echo ' selected' ?>>
                                        20.000
                                    </option>
                                    <option value="30000" <?php if ($priceToCheck[1] == '30000') echo ' selected' ?>>
                                        30.000
                                    </option>
                                    <option value="40000" <?php if ($priceToCheck[1] == '40000') echo ' selected' ?>>
                                        40.000
                                    </option>
                                    <option value="50000" <?php if ($priceToCheck[1] == '50000') echo ' selected' ?>>
                                        50.000
                                    </option>
                                    <option value="60000" <?php if ($priceToCheck[1] == '60000') echo ' selected' ?>>
                                        60.000
                                    </option>
                                    <option value="70000" <?php if ($priceToCheck[1] == '70000') echo ' selected' ?>>
                                        70.000
                                    </option>
                                    <option value="80000" <?php if ($priceToCheck[1] == '80000') echo ' selected' ?>>
                                        80.000
                                    </option>
                                    <option value="90000" <?php if ($priceToCheck[1] == '90000') echo ' selected' ?>>
                                        90.000
                                    </option>
                                    <option value="100000" <?php if ($priceToCheck[1] == '100000') echo ' selected' ?>>
                                        100.000
                                    </option>
                                    <option value="120000" <?php if ($priceToCheck[1] == '120000') echo ' selected' ?>>
                                        120.000
                                    </option>
                                    <option value="140000" <?php if ($priceToCheck[1] == '140000') echo ' selected' ?>>
                                        140.000
                                    </option>
                                    <option value="160000" <?php if ($priceToCheck[1] == '160000') echo ' selected' ?>>
                                        160.000
                                    </option>
                                    <option value="180000" <?php if ($priceToCheck[1] == '180000') echo ' selected' ?>>
                                        180.000
                                    </option>
                                    <option value="200000" <?php if ($priceToCheck[1] == '200000') echo ' selected' ?>>
                                        200.000
                                    </option>
                                    <option value="220000" <?php if ($priceToCheck[1] == '220000') echo ' selected' ?>>
                                        220.000
                                    </option>
                                    <option value="240000" <?php if ($priceToCheck[1] == '240000') echo ' selected' ?>>
                                        240.000
                                    </option>
                                    <option value="260000" <?php if ($priceToCheck[1] == '260000') echo ' selected' ?>>
                                        260.000
                                    </option>
                                    <option value="280000" <?php if ($priceToCheck[1] == '280000') echo ' selected' ?>>
                                        280.000
                                    </option>
                                    <option value="300000" <?php if ($priceToCheck[1] == '300000') echo ' selected' ?>>
                                        300.000
                                    </option>
                                    <option value="320000" <?php if ($priceToCheck[1] == '320000') echo ' selected' ?>>
                                        320.000
                                    </option>
                                    <option value="340000" <?php if ($priceToCheck[1] == '340000') echo ' selected' ?>>
                                        340.000
                                    </option>
                                    <option value="360000" <?php if ($priceToCheck[1] == '360000') echo ' selected' ?>>
                                        360.000
                                    </option>
                                    <option value="380000" <?php if ($priceToCheck[1] == '380000') echo ' selected' ?>>
                                        380.000
                                    </option>
                                    <option value="400000" <?php if ($priceToCheck[1] == '400000') echo ' selected' ?>>
                                        400.000
                                    </option>

                                </select>

                            </div>

                            <div class="span-nyberg  searchItemDoubleContainer yeardiv">
                                <?php $yearFromCheck = explode('=', $YearFrom); ?>
                                <select class="FormMin" name="YearFrom" id="YearFrom">
                                    <option value="">År från</option>
                                    <option value="2014" <?php if ($yearFromCheck[1] == '2014') echo ' selected' ?>>
                                        2014
                                    </option>
                                    <option value="2013" <?php if ($yearFromCheck[1] == '2013') echo ' selected' ?>>
                                        2013
                                    </option>
                                    <option value="2012" <?php if ($yearFromCheck[1] == '2012') echo ' selected' ?>>
                                        2012
                                    </option>
                                    <option value="2011" <?php if ($yearFromCheck[1] == '2011') echo ' selected' ?>>
                                        2011
                                    </option>
                                    <option value="2010" <?php if ($yearFromCheck[1] == '2010') echo ' selected' ?>>
                                        2010
                                    </option>
                                    <option value="2009" <?php if ($yearFromCheck[1] == '2009') echo ' selected' ?>>
                                        2009
                                    </option>
                                    <option value="2008" <?php if ($yearFromCheck[1] == '2008') echo ' selected' ?>>
                                        2008
                                    </option>
                                    <option value="2007" <?php if ($yearFromCheck[1] == '2007') echo ' selected' ?>>
                                        2007
                                    </option>
                                    <option value="2006" <?php if ($yearFromCheck[1] == '2006') echo ' selected' ?>>
                                        2006
                                    </option>
                                    <option value="2005" <?php if ($yearFromCheck[1] == '2005') echo ' selected' ?>>
                                        2005
                                    </option>
                                    <option value="2004" <?php if ($yearFromCheck[1] == '2004') echo ' selected' ?>>
                                        2004
                                    </option>
                                    <option value="2003" <?php if ($yearFromCheck[1] == '2003') echo ' selected' ?>>
                                        2003
                                    </option>
                                    <option value="2002" <?php if ($yearFromCheck[1] == '2002') echo ' selected' ?>>
                                        2002
                                    </option>
                                    <option value="2001" <?php if ($yearFromCheck[1] == '2001') echo ' selected' ?>>
                                        2001
                                    </option>
                                    <option value="2000" <?php if ($yearFromCheck[1] == '2000') echo ' selected' ?>>
                                        2000
                                    </option>
                                    <option value="1999" <?php if ($yearFromCheck[1] == '1999') echo ' selected' ?>>
                                        1999
                                    </option>
                                    <option value="1998" <?php if ($yearFromCheck[1] == '1998') echo ' selected' ?>>
                                        1998
                                    </option>
                                    <option value="1997" <?php if ($yearFromCheck[1] == '1997') echo ' selected' ?>>
                                        1997
                                    </option>
                                    <option value="1996" <?php if ($yearFromCheck[1] == '1996') echo ' selected' ?>>
                                        1996
                                    </option>
                                    <option value="1995" <?php if ($yearFromCheck[1] == '1995') echo ' selected' ?>>
                                        1995
                                    </option>
                                    <option value="1994" <?php if ($yearFromCheck[1] == '1994') echo ' selected' ?>>
                                        1994
                                    </option>
                                    <option value="1993" <?php if ($yearFromCheck[1] == '1993') echo ' selected' ?>>
                                        1993
                                    </option>
                                    <option value="1992" <?php if ($yearFromCheck[1] == '1992') echo ' selected' ?>>
                                        1992
                                    </option>
                                    <option value="1991" <?php if ($yearFromCheck[1] == '1991') echo ' selected' ?>>
                                        1991
                                    </option>
                                    <option value="1990" <?php if ($yearFromCheck[1] == '1990') echo ' selected' ?>>
                                        1990
                                    </option>
                                    <option value="1989" <?php if ($yearFromCheck[1] == '1989') echo ' selected' ?>>
                                        1989
                                    </option>
                                    <option value="1988" <?php if ($yearFromCheck[1] == '1988') echo ' selected' ?>>
                                        1988
                                    </option>
                                    <option value="1987" <?php if ($yearFromCheck[1] == '1987') echo ' selected' ?>>
                                        1987
                                    </option>
                                    <option value="1986" <?php if ($yearFromCheck[1] == '1986') echo ' selected' ?>>
                                        1986
                                    </option>
                                    <option value="1985" <?php if ($yearFromCheck[1] == '1985') echo ' selected' ?>>
                                        1985
                                    </option>
                                    <option value="1984" <?php if ($yearFromCheck[1] == '1984') echo ' selected' ?>>
                                        1984
                                    </option>
                                    <option value="1983" <?php if ($yearFromCheck[1] == '1983') echo ' selected' ?>>
                                        1983
                                    </option>
                                    <option value="1982" <?php if ($yearFromCheck[1] == '1982') echo ' selected' ?>>
                                        1982
                                    </option>
                                    <option value="1981" <?php if ($yearFromCheck[1] == '1981') echo ' selected' ?>>
                                        1981
                                    </option>
                                    <option value="1980" <?php if ($yearFromCheck[1] == '1980') echo ' selected' ?>>
                                        1980
                                    </option>
                                </select>
                                <?php $yearToCheck = explode('=', $YearTo); ?>
                                <select class="FormMax" name="YearTo" id="YearTo">
                                    <option value="">År till</option>
                                    <option value="2014" <?php if ($yearToCheck[1] == '2014') echo ' selected' ?>>2014
                                    </option>
                                    <option value="2013" <?php if ($yearToCheck[1] == '2013') echo ' selected' ?>>2013
                                    </option>
                                    <option value="2012" <?php if ($yearToCheck[1] == '2012') echo ' selected' ?>>2012
                                    </option>
                                    <option value="2011" <?php if ($yearToCheck[1] == '2011') echo ' selected' ?>>2011
                                    </option>
                                    <option value="2010" <?php if ($yearToCheck[1] == '2010') echo ' selected' ?>>2010
                                    </option>
                                    <option value="2009" <?php if ($yearToCheck[1] == '2009') echo ' selected' ?>>2009
                                    </option>
                                    <option value="2008" <?php if ($yearToCheck[1] == '2008') echo ' selected' ?>>2008
                                    </option>
                                    <option value="2007" <?php if ($yearToCheck[1] == '2007') echo ' selected' ?>>2007
                                    </option>
                                    <option value="2006" <?php if ($yearToCheck[1] == '2006') echo ' selected' ?>>2006
                                    </option>
                                    <option value="2005" <?php if ($yearToCheck[1] == '2005') echo ' selected' ?>>2005
                                    </option>
                                    <option value="2004" <?php if ($yearToCheck[1] == '2004') echo ' selected' ?>>2004
                                    </option>
                                    <option value="2003" <?php if ($yearToCheck[1] == '2003') echo ' selected' ?>>2003
                                    </option>
                                    <option value="2002" <?php if ($yearToCheck[1] == '2002') echo ' selected' ?>>2002
                                    </option>
                                    <option value="2001" <?php if ($yearToCheck[1] == '2001') echo ' selected' ?>>2001
                                    </option>
                                    <option value="2000" <?php if ($yearToCheck[1] == '2000') echo ' selected' ?>>2000
                                    </option>
                                    <option value="1999" <?php if ($yearToCheck[1] == '1999') echo ' selected' ?>>1999
                                    </option>
                                    <option value="1998" <?php if ($yearToCheck[1] == '1998') echo ' selected' ?>>1998
                                    </option>
                                    <option value="1997" <?php if ($yearToCheck[1] == '1997') echo ' selected' ?>>1997
                                    </option>
                                    <option value="1996" <?php if ($yearToCheck[1] == '1996') echo ' selected' ?>>1996
                                    </option>
                                    <option value="1995" <?php if ($yearToCheck[1] == '1995') echo ' selected' ?>>1995
                                    </option>
                                    <option value="1994" <?php if ($yearToCheck[1] == '1994') echo ' selected' ?>>1994
                                    </option>
                                    <option value="1993" <?php if ($yearToCheck[1] == '1993') echo ' selected' ?>>1993
                                    </option>
                                    <option value="1992" <?php if ($yearToCheck[1] == '1992') echo ' selected' ?>>1992
                                    </option>
                                    <option value="1991" <?php if ($yearToCheck[1] == '1991') echo ' selected' ?>>1991
                                    </option>
                                    <option value="1990" <?php if ($yearToCheck[1] == '1990') echo ' selected' ?>>1990
                                    </option>
                                    <option value="1989" <?php if ($yearToCheck[1] == '1989') echo ' selected' ?>>1989
                                    </option>
                                    <option value="1988" <?php if ($yearToCheck[1] == '1988') echo ' selected' ?>>1988
                                    </option>
                                    <option value="1987" <?php if ($yearToCheck[1] == '1987') echo ' selected' ?>>1987
                                    </option>
                                    <option value="1986" <?php if ($yearToCheck[1] == '1986') echo ' selected' ?>>1986
                                    </option>
                                    <option value="1985" <?php if ($yearToCheck[1] == '1985') echo ' selected' ?>>1985
                                    </option>
                                    <option value="1984" <?php if ($yearToCheck[1] == '1984') echo ' selected' ?>>1984
                                    </option>
                                    <option value="1983" <?php if ($yearToCheck[1] == '1983') echo ' selected' ?>>1983
                                    </option>
                                    <option value="1982" <?php if ($yearToCheck[1] == '1982') echo ' selected' ?>>1982
                                    </option>
                                    <option value="1981" <?php if ($yearToCheck[1] == '1981') echo ' selected' ?>>1981
                                    </option>
                                    <option value="1980" <?php if ($yearToCheck[1] == '1980') echo ' selected' ?>>1980
                                    </option>
                                </select>
                            </div>

                            <div class="span-nyberg searchItemDoubleContainer milesdiv">
                                <?php $milesFromCheck = explode('=', $MilesFrom); ?>
                                <select class="FormMin" name="MilesFrom" id="MilesFrom">
                                    <option value="">Mil från</option>
                                    <option value="1000" <?php if ($milesFromCheck[1] == '1000') echo ' selected' ?>>1
                                        000
                                    </option>
                                    <option value="2000" <?php if ($milesFromCheck[1] == '2000') echo ' selected' ?>>2
                                        000
                                    </option>
                                    <option value="3000" <?php if ($milesFromCheck[1] == '3000') echo ' selected' ?>>3
                                        000
                                    </option>
                                    <option value="4000" <?php if ($milesFromCheck[1] == '4000') echo ' selected' ?>>4
                                        000
                                    </option>
                                    <option value="5000" <?php if ($milesFromCheck[1] == '5000') echo ' selected' ?>>5
                                        000
                                    </option>
                                    <option value="6000" <?php if ($milesFromCheck[1] == '6000') echo ' selected' ?>>6
                                        000
                                    </option>
                                    <option value="7000" <?php if ($milesFromCheck[1] == '7000') echo ' selected' ?>>7
                                        000
                                    </option>
                                    <option value="8000" <?php if ($milesFromCheck[1] == '8000') echo ' selected' ?>>8
                                        000
                                    </option>
                                    <option value="9000" <?php if ($milesFromCheck[1] == '9000') echo ' selected' ?>>9
                                        000
                                    </option>
                                    <option value="10000" <?php if ($milesFromCheck[1] == '10000') echo ' selected' ?>>
                                        10 000
                                    </option>
                                    <option value="11000" <?php if ($milesFromCheck[1] == '11000') echo ' selected' ?>>
                                        11 000
                                    </option>
                                    <option value="12000" <?php if ($milesFromCheck[1] == '12000') echo ' selected' ?>>
                                        12 000
                                    </option>
                                    <option value="13000" <?php if ($milesFromCheck[1] == '13000') echo ' selected' ?>>
                                        13 000
                                    </option>
                                    <option value="14000" <?php if ($milesFromCheck[1] == '14000') echo ' selected' ?>>
                                        14 000
                                    </option>
                                    <option value="15000" <?php if ($milesFromCheck[1] == '15000') echo ' selected' ?>>
                                        15 000
                                    </option>
                                    <option value="16000" <?php if ($milesFromCheck[1] == '16000') echo ' selected' ?>>
                                        16 000
                                    </option>
                                    <option value="17000" <?php if ($milesFromCheck[1] == '17000') echo ' selected' ?>>
                                        17 000
                                    </option>
                                    <option value="18000" <?php if ($milesFromCheck[1] == '18000') echo ' selected' ?>>
                                        18 000
                                    </option>
                                    <option value="19000" <?php if ($milesFromCheck[1] == '19000') echo ' selected' ?>>
                                        19 000
                                    </option>
                                    <option value="20000" <?php if ($milesFromCheck[1] == '20000') echo ' selected' ?>>
                                        20 000
                                    </option>
                                </select>
                                <?php $milesToCheck = explode('=', $MilesTo); ?>
                                <select class="FormMax" name="MilesTo" id="MilesTo">
                                    <option value="">Mil till</option>
                                    <option value="1000" <?php if ($milesToCheck[1] == '1000') echo ' selected' ?>>1
                                        000
                                    </option>
                                    <option value="2000" <?php if ($milesToCheck[1] == '2000') echo ' selected' ?>>2
                                        000
                                    </option>
                                    <option value="3000" <?php if ($milesToCheck[1] == '3000') echo ' selected' ?>>3
                                        000
                                    </option>
                                    <option value="4000" <?php if ($milesToCheck[1] == '4000') echo ' selected' ?>>4
                                        000
                                    </option>
                                    <option value="5000" <?php if ($milesToCheck[1] == '5000') echo ' selected' ?>>5
                                        000
                                    </option>
                                    <option value="6000" <?php if ($milesToCheck[1] == '6000') echo ' selected' ?>>6
                                        000
                                    </option>
                                    <option value="7000" <?php if ($milesToCheck[1] == '7000') echo ' selected' ?>>7
                                        000
                                    </option>
                                    <option value="8000" <?php if ($milesToCheck[1] == '8000') echo ' selected' ?>>8
                                        000
                                    </option>
                                    <option value="9000" <?php if ($milesToCheck[1] == '9000') echo ' selected' ?>>9
                                        000
                                    </option>
                                    <option value="10000" <?php if ($milesToCheck[1] == '10000') echo ' selected' ?>>10
                                        000
                                    </option>
                                    <option value="11000" <?php if ($milesToCheck[1] == '11000') echo ' selected' ?>>11
                                        000
                                    </option>
                                    <option value="12000" <?php if ($milesToCheck[1] == '12000') echo ' selected' ?>>12
                                        000
                                    </option>
                                    <option value="13000" <?php if ($milesToCheck[1] == '13000') echo ' selected' ?>>13
                                        000
                                    </option>
                                    <option value="14000" <?php if ($milesToCheck[1] == '14000') echo ' selected' ?>>14
                                        000
                                    </option>
                                    <option value="15000" <?php if ($milesToCheck[1] == '15000') echo ' selected' ?>>15
                                        000
                                    </option>
                                    <option value="16000" <?php if ($milesToCheck[1] == '16000') echo ' selected' ?>>16
                                        000
                                    </option>
                                    <option value="17000" <?php if ($milesToCheck[1] == '17000') echo ' selected' ?>>17
                                        000
                                    </option>
                                    <option value="18000" <?php if ($milesToCheck[1] == '18000') echo ' selected' ?>>18
                                        000
                                    </option>
                                    <option value="19000" <?php if ($milesToCheck[1] == '19000') echo ' selected' ?>>19
                                        000
                                    </option>
                                    <option value="20000" <?php if ($milesToCheck[1] == '20000') echo ' selected' ?>>20
                                        000
                                    </option>
                                </select>


                            </div>

                        </div>
                        <div class="row-fluid">
                            <div class="span-nyberg searchItemContainer fueldiv">
                                <?php $fuelCheck = explode('=', $Fuel); ?>
                                <select class="FormItem" name="Fuel" id="Fuel">
                                    <option value="">Drivmedel</option>
                                    <option value="tv5pdkyg" <?php if ($fuelCheck[1] == 'tv5pdkyg') echo ' selected' ?>>
                                        Bensin
                                    </option>
                                    <option value="evhpdkyg" <?php if ($fuelCheck[1] == 'evhpdkyg') echo ' selected' ?>>
                                        Bensin/etanol
                                    </option>
                                    <option value="cvg5dkyg" <?php if ($fuelCheck[1] == 'cvg5dkyg') echo ' selected' ?>>
                                        Bensin/gas
                                    </option>
                                    <option value="wvxpdkyg" <?php if ($fuelCheck[1] == 'wvxpdkyg') echo ' selected' ?>>
                                        Diesel
                                    </option>
                                    <option value="xvqpdkyg" <?php if ($fuelCheck[1] == 'xvqpdkyg') echo ' selected' ?>>
                                        El
                                    </option>
                                    <option value="5vepdkyg" <?php if ($fuelCheck[1] == '5vepdkyg') echo ' selected' ?>>
                                        Hybrid el/bensin
                                    </option>
                                    <option value="6vcpdkyg" <?php if ($fuelCheck[1] == '6vcpdkyg') echo ' selected' ?>>
                                        Naturgas
                                    </option>
                                </select>
                            </div>

                            <div class="span-nyberg col2 searchItemContainer gearboxdiv">
                                <?php $gearCheck = explode('=', $Gearbox); ?>
                                <select class="FormItem" name="Gearbox" id="Gearbox">
                                    <option value="">Växellåda</option>
                                    <option value="gvwpdkyg" <?php if ($gearCheck[1] == 'gvwpdkyg') echo ' selected' ?>>
                                        Automatisk
                                    </option>
                                    <option value="4v8pdkyg" <?php if ($gearCheck[1] == '4v8pdkyg') echo ' selected' ?>>
                                        Manuell
                                    </option>
                                    <option value="8vnpdkyg" <?php if ($gearCheck[1] == '8vnpdkyg') echo ' selected' ?>>
                                        Sekventiell
                                    </option>
                                </select>
                            </div>
                            <div class="span-nyberg col2 searchItemContainer sortdiv">
                                <?php $sortCheck = explode('=', $Sort); ?>
                                <select class="FormItem" name="Sort" id="Sort">
                                    <option value="">Sortering</option>
                                    <option value="pv7pdkyg" <?php if ($sortCheck[1] == 'pv7pdkyg') echo ' selected' ?>>
                                        Pris
                                    </option>
                                    <option value="ivfpdkyg" <?php if ($sortCheck[1] == 'ivfpdkyg') echo ' selected' ?>>
                                        Mil
                                    </option>
                                    <option value="3v2pdkyg" <?php if ($sortCheck[1] == '3v2pdkyg') echo ' selected' ?>>
                                        År
                                    </option>
                                </select>
                                <input type="hidden" name="lastSort" value="<?php echo $lastSort; ?>">
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span-nyberg col2 searchItemContainer vatdiv">
                                <?php $exclVATCheck = explode('=', $exclVAT); ?>
                                <label><input type="checkbox" name="exclVAT"
                                              value="on" <?php if ($exclVATCheck[1] == 'on') {
                                        echo "checked='checked'";
                                    } ?>> Avdragbar moms</label>
                            </div>

                            <div class="span-nyberg col2 searchItemContainer selectfacilitydiv">
                                <select class="FormItem" name="SelectCity" id="SelectFacility">
                                    <option value="">Ort</option>
                                </select>
                            </div>
                            <div class="span-nyberg col2 searchItemContainer searchbuttondiv">
                                <input type="submit" id="SearchButton" class="black-button" style="width: 100%"
                                       value="Sök bil">
                            </div>
                        </div>
                        <script type="text/javascript">

                            jQuery(document).ready(function ($) {


                                var usedState;
                                var searchType;
                                if (typeof window['usedstate'] === 'undefined') {
                                    usedState = '';
                                }
                                else {
                                    usedState = window['usedstate']
                                }
                                if (typeof window['searchtype'] === 'undefined') {
                                    searchType = '';
                                }
                                else {
                                    searchType = window['searchtype'];
                                }

                                if ($('#Brand').val() !== "") {
                                    getModels(searchType);
                                }

                                getOrter();


                                getDealerBrands('', searchType, usedState);


                                $('#Brand').change(function () {
                                    if ($('#Brand').val() !== "") {
                                        getModels(searchType);
                                    } else {

                                    }
                                });
                                $('#SelectFacility').change(function () {
                                    if ($('#SelectFacility') !== "") {
                                        var customerid = 'customerId=' + $("#SelectFacility option:selected").val();
                                        getModels(searchType);

                                        getDealerBrands(customerid, searchType, usedState);

                                    }
                                });
                                $('#SelectCity').change(function () {
                                    if ($('#SelectCity').val() !== "") {
                                        getModels(searchType);
                                    }
                                });


                            });
                            function getDealerBrands(customerid, searchType, usedState) {
                                var brand = '<?php echo $_GET['Brand']; ?>';
                                $.post(ajaxurl, {
                                    action: 'getDealerBrands',
                                    customerid: customerid,
                                    searchtype: searchType,
                                    usedstate: usedState
                                }, function (data) {
                                    data = JSON.parse(data);
                                    $('#Brand').html('');
                                    $('#Brand').append('<option value="">Märke</option>');
                                    $('#Brand').append('<option value="">---------</option>');
                                    if (searchType !== '&SearchType=be7p4amg') {
                                        $('#Brand').append('<option value="fv4idkyg">Volvo</option>');
                                    }
                                    $('#Brand').append('<option value="cvmpdkyg">Ford</option>');
                                    $('#Brand').append('<option value="mvy3dkyg">Renault</option>');
                                    $('#Brand').append('<option value="3vbtdkyg">Dacia</option>');
                                    $('#Brand').append('<option value="">---------</option>');
                                    for (var i = 0; i < data.Brands.length; i++) {
                                        if (data.Brands[i].Name === "Volvo" || data.Brands[i].Name === "Dacia" || data.Brands[i].Name === "Renault" || data.Brands[i].Name === "Ford") {
                                        }
                                        else {
                                            $('#Brand').append('<option value="' + data.Brands[i].Reference + '">' + data.Brands[i].Name + '</option>');
                                        }
                                    }
                                    if (typeof window['defaultonbrand'] === 'undefined') {
                                    }
                                    else {
                                        brand = window['defaultonbrand'];
                                    }
                                    console.log(brand);
                                    $('#Brand option').each(function () {
                                        if ($(this).val() === brand && brand != "") {
                                            $(this).attr('selected', 'selected');
                                        }
                                    });
                                    if (searchType !== 'be7p4amg') {
                                        getModels();
                                    }


                                });
                            }

                            function getModels(searchType) {
                                $.post(ajaxurl, {
                                    action: 'get_models',
                                    brand: $('#Brand').val(),
                                    selectcity: $('#SelectFacility').val(),
                                    searchtype: searchType
                                }, function (data) {
                                    data = JSON.parse(data);
                                    $('#ModelName').html('');
                                    $('#ModelName').append('<option value="">Modell (Alla)</option>');
                                    var ModelName = '<?php echo $_GET['ModelName']; ?>';
                                    for (var i = 0; i < data.length; i++) {
                                        if (data[i].Reference === ModelName) {
                                            $('#ModelName').append('<option value="' + data[i].Reference + '" selected>' + data[i].Name + '</option>');
                                        }
                                        else {
                                            $('#ModelName').append('<option value="' + data[i].Reference + '">' + data[i].Name + '</option>');
                                        }
                                    }
                                });
                            }
                            function getOrter() {
                                $.post(ajaxurl, {action: 'get_orter'}, function (data) {
                                    data = JSON.parse(data);

                                    $('#SelectFacility').html('');
                                    $('#SelectFacility').append('<option value="">Ort</option>');


                                    function capitaliseFirstLetter(string) {
                                        return string.charAt(0).toUpperCase() + string.slice(1);
                                    }

                                    for (var i = 0; i < data.Items.length; i++) {
                                        var item = data.Items[i];
                                        var currentOrt = '<?php echo $_GET["SelectCity"]; ?>';
                                        var selected = '';
                                        if (item.Id == currentOrt) {
                                            selected = ' selected';
                                        }
                                        $('#SelectFacility').append('<option value="' + item.Id + '"' + selected + '>' + capitaliseFirstLetter(item.City.toLowerCase()) + '</option>');
                                    }
                                });
                            }

                        </script>
                </div>
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

                                    <p><?php echo $item->Year; ?></p>

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
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
                <?php nyberg_puffar(); ?>
            </div>
        </div>
        <!-- #content -->
    </div>
    <!-- #primary -->
<?php get_footer(); ?>