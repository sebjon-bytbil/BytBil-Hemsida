<!-- <link href="<?php echo get_template_directory_uri(); ?>/css/elasticaccess-style.css" rel="stylesheet">
<script src="<?php echo get_template_directory_uri(); ?>/js/ElasticAccess.js"></script> -->


<?php
wp_enqueue_script('elasticaccess');
wp_enqueue_style( 'elasticaccesscss');

$count_per_page = get_sub_field('accesspackage-count');
$predefined_search = get_sub_field('accesspackage-hash');
$predefined_search = htmlspecialchars_decode($predefined_search);
$loadMoreType = get_sub_field('accesspackage-load-type');
$loadPage = get_sub_field('accesspackage-page');

$loadUrl = get_the_permalink($loadPage->ID);

$loadUrlWithSearch = $loadUrl . $predefined_search;

$loadObjectPage = get_sub_field('accesspackage-object-page');
$loadObjectUrl = get_the_permalink($loadObjectPage->ID);

$searchType = get_sub_field('accesspackage-search-type');
$searchBackground = get_sub_field('accesspackage-search-bg');
$searchBackgroundUrl = $searchBackground['url'];

$list = get_sub_field('accesspackage-list');
$filter = get_sub_field('accesspackage-filter');

?>

<script>
    <?php
    $hash = get_sub_field('accesspackage-hash');
    if($hash){ ?>
        window.location.hash = "<?php echo htmlspecialchars_decode($hash);?>";
        $(window).trigger('hashchange');
    <?php } ?>
    
    // $(window).on('hashchange', function() {
    //     $("#SearchButton").attr("href", "<?php echo $loadUrl;?>" + window.location.hash);
    // });

</script>


<style>
    .ElasticAccess .includes, #ElasticAccess #FreeTextSearch{
        display: none;
    }
    <?php if($searchType != "none"){ ?>
        .ElasticAccess .searchlist{
            display: block;
        }
        .ElasticAccess #<?php echo $searchType;?> {
            display: block;
        }
    <?php }else{ ?>
        #main-slider{
            display:none;
        }
    <?php } ?>
    <?php
    if($filter) { ?>
        .ElasticAccess .filter{
            display: block;
        }
    <?php
    }
    if($list) { ?>
        .ElasticAccess .list{
            display: block;
        }
    <?php
    } ?>
</style>

<!-- avslutar wrapper så att sök kan vara full-width -->
</div>
</div>
</div>

<div class="ElasticAccess" data-app="elasticaccesspackage">

    <div ng-controller="SetupCtrl" ng-init="init('Search', 'Filter', 'List', '<?php echo $loadMoreType;?>', '<?php echo $loadObjectUrl;?>')">
        <div ng-if="showSearch()">
            <section id="main-slider" class="scroll white search-box">
                <div class="flexslider">
                    <ul class="slides">
                        <li style="display:block">
                            <img src="<?php echo $searchBackgroundUrl; ?>" draggable="false"/>
                            <div class="caption-container">
                                <div class="caption-wrapper">
                                    <div class="caption" data-animation="none">
                                        <div class="vertical-align-wrapper">
                                            <div class="vertical-align center">
                                                <div class="horizontal-align">
                                                    <div class="caption-contents" style="background:#fff">
                                                        <div class="includes searchlist" ng-include src="'templates/SearchList.html'"></div>
                                                        <div class="col-xs-12 center">
                                                            <div class="search-buttons">
                                                                <a class="button black">
                                                                    <i class="entypo cog"></i> Fler sökalternativ
                                                                </a>
                                                                <a href="<?php echo $loadUrlWithSearch;?>" id="SearchButton" class="button red">
                                                                    <i class="entypo search"></i><strong>Sök och hitta</strong>
                                                                </a>
                                                                <a href="#" id="cleanSearch" class="button white">
                                                                    <i class="entypo trash"></i> Rensa
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>

        </div>
<!--        --><?php //if($loadPage){ ?>
<!--            <a id="SearchButton" href="--><?php //echo $loadUrlWithSearch;?><!--" class="button red">Sök och hitta</a>-->
<!--        --><?php //} ?>
        <div ng-if="showFilter()">
            <section name="vehicles" id="vehicles" class="lt-gray scroll">
                <div class="filter-search container-fluid includes filter" ng-include src="'templates/Filter.html'"></div>
            </section>
        </div>

        <div ng-if="showList()">
            <div class="wrapper container-fluid includes list" ng-include src="'templates/List.html'"></div>
        </div>
    </div>

</div>
<div class="wrapper container-fluid">

