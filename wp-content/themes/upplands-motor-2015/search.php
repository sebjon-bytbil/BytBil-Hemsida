<?php
get_header();
$search_string = (isset($_GET['s'])) ? $_GET['s'] : false;

?>

<main>
    <section class="section-block dark scroll" style="background:#f7f7f7;">
        <div class="container-fluid wrapper default-padding">
            <div class="col-xs-12">

                <div id="umsearch" class="umsearch">
                    <div class="umsearch-wrapper">
                        <h2 class="large">Sök på Upplands Motor</h2>
                        <p>Använd vår snabbsök för att smidigt och enkelt hitta det du letar efter.</p>
                        <form id="umsearch-form" action="/" method="get">
                            <input id="umsearch-input" class="umsearch-input"<?php if ($search_string) echo ' value="' . $search_string . '"'; ?> name="s" type="search" placeholder="Vad letar du efter?"/>
                            <button class="umsearch-submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </form>
                        <div style="clear:both;"></div>
                        <div class="result">
                            <div class="searching-overlay">
                                <img src="/wp-content/themes/upplands-motor/images/loading.gif">
                            </div>
                            <div class="row">
                                <div id="umpages" class="col-xs-12">
                                    <h3>Sidor</h3>
                                    <ul class="result-list pages">
                                    <?php
                                    if ($search_string) :
                                        $search_results = um_search($search_string, -1);
                                        if ($search_results['totalpages'] == 0) { ?>
                                            <p>Hittade inga sidor</p>
                                        <?php } else {
                                            echo $search_results['pages'];
                                        }
                                    endif;
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

