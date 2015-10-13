<!-- <link href="<?php echo get_template_directory_uri(); ?>/css/elasticaccess-style.css" rel="stylesheet">
<script src="<?php echo get_template_directory_uri(); ?>/js/ElasticAccess.js"></script> -->


<?php
wp_enqueue_script('elasticaccess');
wp_enqueue_script('elasticaccess-front');
wp_enqueue_style( 'elasticaccesscss');

$count_per_page = get_sub_field('accesspackage-count');
$predefined_search = get_sub_field('accesspackage-hash');
$predefined_search = htmlspecialchars_decode($predefined_search);

$predefined_search = explode("#", $predefined_search);
$predefined_search = $predefined_search[1];

$search_title = get_sub_field('accesspackage-search-title');
$search_text = get_sub_field('accesspackage-search-text');

$loadMoreType = get_sub_field('accesspackage-load-type');
$loadPage = get_sub_field('accesspackage-page');

$loadUrl = get_the_permalink($loadPage->ID);

$loadUrlWithSearch = $loadUrl . "#" . $predefined_search;

$loadObjectPage = get_sub_field('accesspackage-object-page');
$loadObjectUrl = get_the_permalink($loadObjectPage->ID);

$searchType = get_sub_field('accesspackage-search-type');
$searchBackground = get_sub_field('accesspackage-search-bg');
$searchBackgroundUrl = $searchBackground['url'];

$list = get_sub_field('accesspackage-list');
$filter = get_sub_field('accesspackage-filter');

$lock = get_sub_field('accesspackage-lock');
if($lock){
    $lock = 'true';
}else{
    $lock = 'false';
}
$hash = get_sub_field('accesspackage-hash');

$prevPage = get_field("page-settings-back-page");
$prevPageLink = get_permalink($prevPage->ID);
$prevPageTitle = $prevPage->post_title;

$count++;

include_once 'share_form.php';

?>

<style>
    .ElasticAccess-<?php echo $count;?> .includes, .ElasticAccess-<?php echo $count;?> #FreeTextSearch, #Search #secondary-view{
        display: none;
    }
    <?php if($searchType != "Search"){ ?>
        #ExpandButton{
            display:none;
        }
    <?php } ?>

    <?php if($searchType != "none"){ ?>
        .ElasticAccess-<?php echo $count;?> .searchlist{
            display: block;
        }
        .ElasticAccess-<?php echo $count;?> #<?php echo $searchType;?> {
            display: block;
        }
    <?php }else{ ?>
        .main-slider-<?php echo $count; ?>{
            display:none;
        }
    <?php } ?>
    <?php
    if($filter) { ?>
        .ElasticAccess-<?php echo $count;?> .filter{
            display: block;
        }
    <?php
    }
    if($list) { ?>
        .ElasticAccess-<?php echo $count;?> .list{
            display: block;
        }
    <?php
    } ?>
</style>

<?php if($searchType != "none"){ ?>
    <!-- stänger wrapper så att sök kan vara full-width -->
    </div>
    </div>
    </div>
<?php } ?>

<div class="ElasticAccess ElasticAccess-<?php echo $count;?>" data-app="elasticaccesspackage">
    <div ng-controller="SetupCtrl" ng-init="init('Search', 'Filter', 'List', '<?php echo $loadMoreType;?>', '<?php echo $loadObjectUrl;?>', '<?php echo $hash;?>'); lock('<?php echo $lock; ?>'); title('<?php echo $search_title; ?>'); text('<?php echo $search_text; ?>'); back('<?php echo $prevPageTitle; ?>', '<?php echo $prevPageLink; ?>');">
        <div ng-if="showSearch()">
            <section id="main-slider" class="accessscroll white search-box main-slider-<?php echo $count; ?>">
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
                                                                <?php if($searchType == "FreeTextSearch"){?>
                                                                    <a id="SwitchButton" class="button black">
                                                                        <i class="entypo cog"></i>Visa sökalternativ
                                                                    </a>
                                                                    <a id="ExpandButton" class="button black">
                                                                        <i class="entypo cog"></i>Fler sökalternativ
                                                                    </a>
                                                                <?php }else if($searchType == "Search"){ ?>
                                                                    <a id="ExpandButton" class="button black">
                                                                        <i class="entypo cog"></i>Fler sökalternativ
                                                                    </a>
                                                                <?php }?>

                                                                <a href="<?php echo $loadUrlWithSearch;?>" id="SearchButton" class="search-btn button red">
                                                                    <i class="entypo search"></i><strong>Sök och hitta</strong>
                                                                </a>
                                                                <a href="#" id="cleanSearch" class="clean-btn button white">
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
            <section name="vehicles" id="vehicles" class="lt-gray accessscroll">
                <div class="filter-search container-fluid includes filter" ng-include src="'templates/Filter.html'"></div>
            </section>
        </div>

        <div ng-if="showList()">
            <div class="wrapper includes list" ng-include src="'templates/List.html'"></div>
            <?php if($loadPage && $loadMoreType == "none"){ ?>
                <div style="text-align:center;">
                    <a href="<?php echo $loadUrlWithSearch;?>" id="SearchButton" class="search-btn button red">
                        <i class="entypo search"></i><strong>Se fler bilar i lager</strong>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

</div>

<?php if($searchType != "none"){ ?>
    </div>
    <div class="wrapper container-fluid">
<?php } ?>

