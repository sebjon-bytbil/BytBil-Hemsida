<?php /* Template Name: Accesspaket */
get_header('undersida'); ?>

<?php
if (isset($_GET['f']) && !empty($_GET['f'])) {
    $url = "http://webapi.bytbil.com/object/details/" . $_GET['f'];
    $urlfinance = "http://webapi.bytbil.com/finance/get/" . $_GET['f'];

}

// Simple file cache
$key = "f_" . $_GET['f'];
$key = sha1($key);
$cache_file = getcwd() . "/cache/" . $key . ".cache";

$finance = file_get_contents($urlfinance);
$responsefinance = json_decode($finance);

$response = file_get_contents($url);
$response = json_decode($response);

$model = (isset($_GET['model'])) ? $_GET['model'] : "";
$name = $response->BrandName . " " . $model . " " . $response->Year;

$identification = $response->Identification;
$body_type = $response->BodyType;
$gearbox_type = $response->GearboxType;

$dealer_name = $response->Customer->Name;
$dealer_phone = $response->Customer->Phone;
$dealer_email = $response->Customer->EMail;
$dealer_address = $response->Customer->Address;
$dealer_zip = $response->Customer->Zip;
$dealer_city = $response->Customer->City;

$contact = $response->Contact;
$fuel_type = $response->FuelType;
$images = $response->Images;
$km = $response->Km;
$brand_name = $response->BrandName;
$color = $response->Color;
$current_price = $response->CurrentPrice;
$year = $response->Year;
$price = $response->Price;
$price_excludingvat = $response->PriceExcludingVat;
$current_price_excludingvat = $response->CurrentPriceExcludingVat;
$is_bmw_selected = $response->IsBmwSelected;

$registration_date = $response->RegistrationDate;
?>
<link href='http://fonts.googleapis.com/css?family=Londrina+Solid' rel='stylesheet' type='text/css'>
<script type="text/javascript">
    var loadScroll = function () {
        //$('body').animate({scrollTop: (($('.page-title').offset().top)+($('.page-title').height()))}, 1000);
    }

    var sliderSlide = function () {
        setTimeout(function () {
            $('#carslider .slides').fadeIn(200);
        }, 700);
    }
</script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/finance.css"/>

<div id="primary" class="content-area">
    <div id="content" class="nyberg-site-content" role="main">

        <div class="midcontent">

            <div class="nyberg-middle-bar">

                <div class="nyberg-breadcrumbs">
                    <?php if (function_exists('bcn_display')) {
                        bcn_display();
                    } ?>
                </div>

                <?php echo do_shortcode('[nyberg_social_plugs]'); ?>
                <div class="float"></div>
            </div>
        </div>
        <div class="midcontent">
            <div class="nyberg-search-plug" style="margin-bottom: 20px;">
                <?php // include(locate_template('includes/include-searchbox.php')); ?>
            </div>

            <?php // echo do_shortcode( '[nyberg_byggbil]'); ?>
        </div>
        <div class="nyberg-access-gray">
            <div class="midcontent carinfo">
                <div class="col-xs-12">
                    <div style="height: 68px; line-height: 68px;" class="buttons-accesspaket">
                        <input type="button" class="black-button" value="Tillbaka" style="vertical-align: middle;"
                               onclick="window.history.back();"></input>

                        <div class="verticalalignholder hideonmoble"
                             style="float: right; height: 100%; line-height: 68px;">
                            <input type="button" class="black-button" value="Skriv ut" style="vertical-align: middle;"
                                   onclick="window.print();"></input>
                        </div>
                    </div>
                </div>
                <div class="nyberg-access-content">
                    <div id="flex-slider" class="">
                        <div class="slider-text-container">
                            <div class="largetext"><h1><?php echo $brand_name . ' ' . $model . ' ' . $year; ?></h1>
                            </div>
                            <div class="smalltext">
                                <?php if ($current_price > 1) {
                                    ?>
                                    <span
                                        class="linetrough"><?php echo number_format($price, 0, ',', '.') . 'kr'; ?></span>
                                    <span class="redprice">
                                        <?php echo number_format($current_price, 0, ',', '.') . ' kr '; ?>
                                    </span>
                                    <?php
                                    echo $dealer_city;
                                } else {
                                    echo number_format($response->Price, 0, ',', '.') . ' kr ' . $dealer_city;
                                }
                                ?>
                            </div>
                        </div>
                        <ul class="slides">
                            <?php
                            if (empty($response->Images) != 1) {
                                foreach ($response->Images as $image) :
                                    ?>
                                    <li data-thumb="<?php echo $image->URL; ?>"><img src="<?php echo $image->URL; ?>"
                                                                                     alt="<?php echo $brand_name . ' ' . $model . ' ' . $year; ?>">
                                    </li>
                                <?php endforeach;
                            } else { ?>
                                <li><img src="<?php bloginfo('template_url'); ?>/images/nybergs_bildsaknas.jpg"></li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                    <?php if (count($images) > 1) : ?>
                        <div class="sliderthumbs">
                            <ul class="slides">
                                <?php
                                foreach ($response->Images as $image) :
                                    ?>
                                    <li><img src="<?php echo $image->URL; ?>"></li>
                                <?php endforeach;
                                ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <script type="text/javascript">
                        $(document).ready(function () {

                            $('.get-img-src').click(function () {
                                var activeImg = $('.flex-active-slide img').attr('src').replace('full', 'largest');
                                window.prompt('Sökväg till bilden', activeImg);
                            });

                            <?php if($responsefinance -> FinanceCompany == null){?>
                            $("#finans").hide();
                            <?php } ?>

                            $('.sliderthumbs').flexslider({
                                animation: "slide",
                                controlNav: false,
                                directionNav: true,
                                animationLoop: false,
                                slideshow: false,
                                itemWidth: 100,
                                itemMargin: 10,
                                prevText: '<',
                                nextText: '>',
                                asNavFor: '#flex-slider'
                            });

                            $('#flex-slider').flexslider({
                                animation: 'fade',
                                animationLoop: false,
                                prevText: '<',
                                nextText: '>',
                                slideshow: false,
                                directionNav: true,
                                //controlNav: 'thumbnails',
                                controlNav: false,
                                startAt: 0,
                                //start: addMarker,
                                //after: updateMarker,
                                sync: '.sliderthumbs',
                            });
                            var windowwidth = $(window).width();
                            loadScroll();
                            sliderSlide();

                            function addMarker() {
                                $('.flex-control-thumbs li').each(function () {
                                    $(this).append(jQuery('<div/>', {"class": 'marker'}));
                                });
                                $('.flex-control-thumbs li .marker').removeClass('active');
                                $('.flex-control-thumbs li .marker').eq($('#flex-slider').data('flexslider').currentSlide).addClass('active');
                                $('.nyberg-acces-content .largetext').css('bottom', $('.nyberg-access-content .slides').posit)
                            }

                            function updateMarker() {
                                $('.flex-control-thumbs li .marker').removeClass('active');
                                $('.flex-control-thumbs li .marker').eq($('#flex-slider').data('flexslider').currentSlide).addClass('active');
                            }

                            $(window).resize(function () {
                                $('#carslider .slides').css('display', 'block');
                            });
                        });
                    </script>

                    <div class="content-header">
                        <div class="header">Utrustning</div>

                        <div class="share">
                            <?php echo do_shortcode('[bytbil_share]'); ?>
                            <a href="#" class="get-img-src" title="Sökväg till bilden"><img
                                    src="<?php echo bloginfo('template_url'); ?>/images/logo-instagram-bnw.png"/></a>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="content-columns">
                        <div class="column left-column">
                            <ul>
                                <?php
                                $infos = explode(',', $response->Info);
                                $each_column_length = ceil(count($infos) / 2);
                                $i = 0;
                                for ($i = 0; $i < ($each_column_length); $i++) {
                                    echo '<li>' . $infos[$i] . '</li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="column right-column">
                            <ul>
                                <?php
                                for ($i = $each_column_length; $i < count($infos); $i++) {
                                    echo '<li>' . $infos[$i] . '</li>';
                                }
                                ?>
                            </ul>
                        </div>


                    </div>
                    <div id="finans">
                        <div class="finans-header">
                            Finansiering
                        </div>
                        <div>
                            <script type="text/javascript">
                                $(function () {
                                    function parsePrice(s) {
                                        return parseInt(s.replace(/\./g, ''));
                                    }

                                    function parseRate(s) {
                                        return parseFloat(s.replace(',', '.'));
                                    }

                                    function formatNumber(n, digits) {
                                        return ('00' + n.toString()).slice(-digits);
                                    }

                                    function formatPrice(price) {
                                        return (price > 999 ? Math.floor(price / 1000) + '.' + formatNumber(price % 1000, 3) : price) + ' kr';
                                    }

                                    function formatRate(rate) {
                                        return rate.toFixed(2).replace('.', ',') + ' %';
                                    }

                                    var price = parsePrice($('#FinancePrice').text());
                                    var rate = parseRate($('#FinanceRate').text());
                                    var start = parsePrice($('#FinanceStart').text());
                                    var fee = parsePrice($('#FinanceFee').text());
                                    var cashMin =  <?php echo $responsefinance -> MinDownPaymentPercent;?>;
                                    var timeMin = <?php echo $responsefinance -> MinMonths;?>;
                                    var timeMax = <?php echo $responsefinance -> MaxMonths;?>;
                                    var cash = Math.max(cashMin, 10),
                                        time = Math.min(timeMax, Math.max(timeMin, timeMax)),
                                        rest = <?php echo $responsefinance -> DefaultMonthsResidualValue;?>;


                                    function getRate(time, monthly, value, rest) {
                                        var term1 = 0,
                                            term2 = 0,
                                            t = 1,
                                            iter = 150,
                                            x = 0.1,
                                            x2;
                                        while (t > 1e-7 && iter-- > 0) {
                                            if (x == 0) {
                                                x2 = x - (value + monthly * time + rest) / (value * time + monthly * (time * (time - 1)) / 2);
                                            } else {
                                                term1 = Math.pow(x + 1, time - 1);
                                                term2 = term1 * (x + 1);
                                                x2 = x * (1 - (x * value * term2 + monthly * (term2 - 1) + x * rest) / (x * x * time * value * term1 - monthly * (term2 - 1) + x * monthly * (x + 1) * time * term1));
                                            }
                                            t = Math.abs(x2 - x);
                                            x = x2;
                                        }
                                        return x;
                                    }

                                    function setInfo() {
                                        var restPrice = price * rest / 100;
                                        var cashPrice = price * cash / 100;
                                        var actualPrice = price - restPrice - cashPrice;
                                        var r = rate / 1200;
                                        var monthly = Math.round((r + (r / (Math.pow(1 + r, time) - 1))) * actualPrice + restPrice * r);
                                        var effectiveRate = (Math.pow((1 + getRate(time, monthly + fee, cashPrice - price - start, restPrice)), 12) - 1) * 100;
                                        $('#FinanceMonthly, #monthly-price').text(formatPrice(monthly));
                                        $('#FinanceEffectiveRate').text(formatRate(effectiveRate));
                                    }

                                    $(".PlusFinance, .MinusFinance").click(function (e) {
                                        var modifier = 0;
                                        var val = 5;
                                        var s = $(this).parent().find("input[type=slider]");
                                        var prc = parseInt(s.slider("prc"));

                                        if ($(this).hasClass('PlusFinance')) {
                                            modifier = 1;
                                        } else if ($(this).hasClass('MinusFinance')) {
                                            modifier = -1;
                                        }

                                        var newValue = prc + (val * modifier);
                                        newValue = Math.min(Math.max(newValue, 0), 100);
                                        newValue = Math.min(newValue, 100);
                                        s.slider("prc", newValue);
                                    });

                                    function formatPrice(price) {
                                        return (price > 999 ? Math.floor(price / 1000) + '.' + formatNumber(price % 1000, 3) : price) + ' kr';
                                    }

                                    //$(document).ready(function() {


                                    $("#SliderCash").slider({
                                        from: cashMin,
                                        to: 50,
                                        round: 1,
                                        format: {
                                            format: '0.#',
                                            locale: 'se'
                                        },
                                        dimension: '%',
                                        limits: false,
                                        smooth: false,
                                        onstatechange: function (value) {
                                            cash = value;
                                            calculatedValue = price * value / 100;
                                            $("#FinanceCash").text(calculatedValue);
                                            $("#FinanceCash").formatNumber({
                                                format: "#,### kr",
                                                locale: "se"
                                            });
                                            onStateChangeSlider($("#SliderCash"));
                                        }
                                    });

                                    $("#SliderTime").slider({
                                        from: timeMin,
                                        to: timeMax,
                                        step: 1,
                                        round: 1,
                                        format: {
                                            format: '0',
                                            locale: 'se'
                                        },
                                        dimension: ' mån',
                                        limits: false,
                                        onstatechange: function (value) {
                                            time = value;
                                            $("#FinanceTime").text(value + " mån");
                                            onStateChangeSlider($("#SliderTime"));
                                        }
                                    });

                                    $("#SliderRest").slider({
                                        from: 0,
                                        to: 50,
                                        step: 1,
                                        round: 1,
                                        format: {
                                            format: '0',
                                            locale: 'se'
                                        },
                                        dimension: '%',
                                        limits: false,
                                        onstatechange: function (value) {
                                            rest = value;
                                            $("#FinanceRest").text(value + "%");
                                            onStateChangeSlider($("#SliderRest"));
                                        }
                                    });
                                    //});

                                    function onStateChangeSlider(sel) {
                                        var pointerPosition = sel.parent().find(".jslider-pointer").css("left");
                                        sel.parent().find(".fill").width(pointerPosition);
                                        setInfo();
                                    }


                                    $('#FinanceContainer').click(function () {
                                        $('.FinancePanel').slideToggle('fast', function () {
                                            setHeight();
                                            onStateChangeSlider($("#SliderCash"));
                                            onStateChangeSlider($("#SliderTime"));
                                            onStateChangeSlider($("#SliderRest"));
                                            $('#FinanceButton').toggleClass('Up');
                                        });
                                    });

                                    $('.financeInfo').click(function (e) {
                                        e.stopPropagation();
                                    });

                                    $('#sliderRest').change(function () {
                                        rest = $(this).val();
                                        $('#FinanceRest').text($(this).val() + ' %');
                                        setInfo();
                                    });

                                    //$('.jslider-pointer').text("< >");


                                });
                            </script>
                            <link href='http://fonts.googleapis.com/css?family=Londrina+Solid' rel='stylesheet'
                                  type='text/css'>
                            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/finance.css">
                            <div class="row-fluid">
                                <div class="span6 flush no-print">
                                    <div class="item sliderLabel">
                                        <label>Kontantinsats</label>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="layout-slider">
                                        <div class="MinusFinance Minus">&lt;</div>
                                        <input id="SliderCash" type="slider" name="price" value="20"
                                               style="display: none;">
                                        </span>
                                        <div class="PlusFinance Plus">&gt;</div>
                                    </div>

                                    <div class="clear sliderDivider"></div>
                                    <div class="item sliderLabel">
                                        <label>Avbetalningstid</label>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="layout-slider">
                                        <div class="MinusFinance Minus">&lt;</div>
                                        <input id="SliderTime" type="slider" name="time" value="84"
                                               style="display: none;">
                                        </span>
                                        <div class="PlusFinance Plus">&gt;</div>
                                    </div>


                                    <div class="clear sliderDivider"></div>
                                    <div class="item sliderLabel">
                                        <label>Restvärde</label>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="layout-slider">
                                        <div class="MinusFinance Minus">&lt;</div>
                                        <input id="SliderRest" type="slider" name="rest" value="0"
                                               style="display: none;">
                                        </span>
                                        <div class="PlusFinance Plus">&gt;</div>
                                    </div>
                                    <div class="clear sliderDivider"></div>
    <span id="FinancePrice" style="visibility:hidden">
        <?php if ($respons->CurrentPrice = !-1) {
            echo $respons->CurrentPrice;
        } else {
            echo $response->Price;
        } ?>
    </span>
                                </div>
                                <div class="finance-right">
                                    <div class="item keyvalue">
                                        <span class="key">Kontantinsats</span>
                                        <span class="value" id="FinanceCash"></span>
                                    </div>
                                    <div class="item keyvalue">
                                        <span class="key">Avbetalningstid</span>
                                        <span class="value"
                                              id="FinanceTime"><?php echo $responsefinance->DefaultMonths ?> mån</span>
                                    </div>
                                    <div class="item keyvalue">
                                        <span class="key">Restvärde</span>
                                        <span class="value" id="FinanceRest">0%</span>
                                    </div>
                                    <div class="item keyvalue">
                                        <span class="key">Ränta</span>
                                        <span class="value" id="FinanceRate"><?php echo $responsefinance->Rate; ?>
                                            %</span>
                                    </div>
                                    <div class="item keyvalue">
                                        <span class="key">Effektiv ränta</span>
                                        <span class="value" id="FinanceEffectiveRate">6,50 %</span>
                                    </div>
                                    <div class="item keyvalue">
                                        <span class="key">Uppläggningsavgift</span>
                                        <span class="value" id="FinanceStart">0 kr</span>
                                    </div>
                                    <div class="item keyvalue">
                                        <span class="key">Aviavgift</span>
                                        <span class="value" id="FinanceFee">0 kr</span>
                                    </div>
                                    <div class="item monthly customerButton keyvalue">
                                        <span class="key">Månadskostnad</span>
                                        <span class="value" id="FinanceMonthly"
                                              style="float: right"><?php echo $responsefinance->MonthlyFee ?></span>

                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="spacer-custom" style="height: 24px; width: 100%;"></div>
                            </div>

                        </div>


                    </div>

                </div>

                <div class="nyberg-access-tarm">
                    <div class="header">Information</div>
                    <ul class="carspecs">
                        <li>
                            <span class="carkey">Reg.nr:</span>
            <span class="carvalue">
                <?php echo $response->Identification; ?></span>

                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="carkey">År:</span>
                <span class="carvalue">
                    <?php echo $response->Year; ?></span>

                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="carkey">Mil:</span>
                    <span class="carvalue">
                        <?php echo $response->Km / 10; ?> mil</span>

                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="carkey">Fordonstyp:</span>
                        <span class="carvalue">
                            <?php echo $response->BodyType; ?></span>

                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="carkey">Färg:</span>
                        <span class="carvalue">
                            <?php echo $response->Color; ?></span>

                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="carkey">Drivmedel:</span>
                            <span class="carvalue">
                                <?php echo $response->FuelType; ?></span>

                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="carkey">Växellåda:</span>
                                <span class="carvalue">
                                    <?php echo $response->GearboxType; ?></span>

                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="carkey">Ort:</span>
                                    <span class="carvalue">
                                        <?php echo $dealer_city ?></span>

                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="carkey">Pris:</span>
                                        <span class="carvalue" style="font-weight: bold;">
                                            <?php if ($current_price > 1) {
                                                ?>
                                                <span
                                                    class="linetrough"><?php echo number_format($price, 0, ',', '.') . ' :-'; ?></span>
                                                <span class="redprice">
                                                        <?php echo number_format($current_price, 0, ',', '.') . ' :-'; ?>
                                                    </span>
                                            <?php
                                            } else {
                                                echo number_format($response->Price, 0, ',', '.') . ' :-';
                                            }
                                            ?>
                                            </span>

                            <div class="clear"></div>
                        </li>
                    </ul>
                    <hr class="access-separator"/>
                    <div class="header" style="margin-top: 14px; margin-bottom: 5px;">Kontakta oss</div>
                    <!--<?php echo $dealer_name; ?>-->
                    Nybergs Bil
                    <ul class="carspecs" style="width: 100%;">
                        <li>
                            <span class="carkey">Telefon:</span>
                                            <span class="carvalue">
                                                <?php echo $dealer_phone; ?></span>

                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="carkey">Mail:</span>
                                                <span class="carvalue">

                                                    <?php $mail = explode(',', $dealer_email); ?>
                                                    <?php $mail_first = $mail[0]; ?>

                                                    <a href="mailto:<?php echo $dealer_email; ?>"><?php echo $mail_first; ?></a></span>

                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="carkey">Adress:</span>
                                                    <span class="carvalue">
                                                        <?php echo $dealer_address; ?></span>

                            <div class="clear"></div>
                        </li>
                        <li>
                            <span class="carkey">Postnr:</span>
                                                        <span class="carvalue">
                                                            <?php echo $dealer_zip . ' ' . $dealer_city; ?></span>

                            <div class="clear"></div>
                        </li>
                    </ul>
                    <div class="contacts-form">
                        <?php /*echo do_shortcode('[nyberg_contact_form]'); */
                        ?>
                        <script>
                            $(function () {
                                $('.field-wrap.hidden-wrap .ninja-forms-field ').val(location.href);
                            });
                        </script>
                        <?php
                        //echo do_shortcode(get_field('kontaktformular'));
                        if ($dealer_city == 'JÖNKÖPING') {
                            if (function_exists('ninja_forms_display_form')) {
                                ninja_forms_display_form(4);
                            }
                        } else if ($dealer_city == 'NÄSSJÖ') {
                            if (function_exists('ninja_forms_display_form')) {
                                ninja_forms_display_form(2);
                            }
                        }

                        ?>
                    </div>

                    <?php
                    $lanktyp = get_sub_field('lanktypen');


                    if (get_field('black-buttons')) {
                        ?>
                        <div class="buttons">
                            <?php while (has_sub_field('black-buttons')) {
                                if ($lanktyp == "ext") {
                                    $link = get_sub_field('externlank');
                                } else {
                                    $link = get_sub_field('internlank');
                                }


                                ?>
                                <a href="<?php echo $link; ?>" target="<?php the_sub_field('open_link_in'); ?>">
                                    <div class="black-button"><?php the_sub_field('knapptext'); ?></div>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="volvia-plug">

                        <?php

                        if ($response->BrandName == 'Volvo') {
                            echo do_shortcode('[bytbil_volvia_plug reg="' . $identification . '" brand="volvo"]');
                        } else if ($response->BrandName == 'Renault' || $response->BrandName == 'Dacia') {
                            echo do_shortcode('[bytbil_volvia_plug reg="' . $identification . '" brand="renault"]');
                        }

                        ?>
                    </div>


                </div>
                <div class="col-xs-12">
                    <div style="height: 68px; line-height: 68px;" class="buttons-accesspaket">
                        <input type="button" class="black-button" value="Tillbaka" style="vertical-align: middle;"
                               onclick="window.history.back();"></input>

                        <div class="verticalalignholder hideonmoble"
                             style="float: right; height: 100%; line-height: 68px;">
                            <input type="button" class="black-button" value="Skriv ut" style="vertical-align: middle;"
                                   onclick="window.print();"></input>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>

            </div>

            <div class="midcontent nyberg-pages-plugs" style="background: 0; border: 0;">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
                <?php nyberg_puffar(); ?>
            </div>
        </div>
        <!-- #content -->
    </div>
    <!-- #primary -->
<?php
get_footer(); ?>