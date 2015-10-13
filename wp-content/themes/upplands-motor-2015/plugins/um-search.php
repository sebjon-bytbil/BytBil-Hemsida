<?php
/**
 * Upplands Motor search
 * =====================
 */

//add_filter('posts_join', 'um_search_join');
/**
 * Adds taxonomies join
 */
function um_search_join($join)
{
    global $wpdb;

    if (is_search()) {
        $join .= "
            INNER JOIN
            {$wpdb->term_relationships} ON {$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id
            INNER JOIN
            {$wpdb->term_taxonomy} ON {$wpdb->term_taxonomy}.term_taxonomy_id = {$wpdb->term_relationships}.term_taxonomy_id
            INNER JOIN
            {$wpdb->terms} ON {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id
        ";
    }
    return $join;
}

//add_filter('posts_where', 'um_search_where');
/**
 * Adds taxonomy where statement for search_meta
 */
function um_search_where($where)
{
    global $wpdb;

    if (is_search()) {
        // add the search term to the query
        $where .= " OR
        (
            {$wpdb->term_taxonomy}.taxonomy LIKE 'search_meta'
            AND
            {$wpdb->terms}.name LIKE ('%" . $wpdb->escape(get_query_var('s')) . "%')
        ) ";
    }
    return $where;
}

//add_filter('posts_groupby', 'um_search_groupby');
/**
 * Adds group by to avoid duplicates
 */
function um_search_groupby($groupby)
{
    global $wpdb;

    if (is_search()) {
        $groupby = "{$wpdb->posts}.ID";
    }
    return $groupby;
}

add_action('wp_ajax_um_search', 'um_search_ajax');
add_action('wp_ajax_nopriv_um_search', 'um_search_ajax');
/**
 * AJAX
 */
function um_search_ajax()
{
    $a = (int)$_GET['amount'];
    $s = (string)$_GET['search_string'];
    $c = ((int)$_GET['search_cars'] === 1) ? true : false;
    um_search($s, $a, true, $c);
}

/**
 * Searches the website and optionally searches the elastic access
 *
 * @param string $search_string
 * @param int $amount - the amount of posts to return, -1 for unlimited
 * @param boolean $json - return value as json or not
 * @param boolean $search_cars - whether or not to search for cars
 */
function um_search($search_string, $amount = 5, $json = false, $search_cars = false)
{
    if ($json) {
        $SE = new SearchEverything();
        $SE->search_hooks();
    }

    $search_string = sanitize_text_field($search_string);

    $results = array(
        'pages' => 0,
        'cars' => 0,
        'totalpages' => 0,
        'totalcars' => 0
    );

    $params = array(
        'post_type' => array('page', 'offer', 'news'),
        's' => $search_string,
        'showposts' => -1
    );

    $pages = array();
    $post_query = new WP_Query($params);
    $parr = '';

    if ($post_query->have_posts()) {
        $i = 0;

        $show_more = false;

        while ($post_query->have_posts()) {
            $post_query->the_post();
            $pages[$i]['taxonomy_match'] = 0;

            $terms = get_the_terms(get_the_ID(), 'search_meta');
            if ($terms) {
                foreach ($terms as $term) {
                    if (strtolower($term->name) == strtolower($search_string)) {
                        $pages[$i]['taxonomy_match'] = 1;
                    }
                }
            }

            $pages[$i]['title'] = get_the_title();
            $pages[$i]['permalink'] = esc_url(get_permalink());

            $excerpt = get_the_breadcrumb();

            if ($excerpt != 'undefined')
                $pages[$i]['excerpt'] = $excerpt;
            else
                $pages[$i]['excerpt'] = '';

            $i++;
        }

        if (sizeof($pages) > 0) {
            // This is where the taxonomy magic happens
            $taxonomy_match = array();
            foreach ($pages as $key => $value) {
                $taxonomy_match[$key] = $value['taxonomy_match'];
            }
            array_multisort($taxonomy_match, SORT_DESC, $pages);

            $i = 0;
            foreach ($pages as $page) {
                // Don't process more than necessary
                if ($i === $amount) {
                    $show_more = true;
                    break;
                }

                // Markup
                $parr .= '<li><a class="result-item page" href="' . $page['permalink'] . '">';
                $parr .= '<h4 clas="no-wrap">' . $page['title'] . '</h4>';
                $parr .= '<p>' . $page['excerpt'] . '</p></a></li>';
                ++$i;
            }
        }

        $parr .= '<div style="clear:both;"></div>';

        if ($show_more) {
            $parr .= '<div class="show-more"><a href="/?s=' . $search_string . '">Visa fler...</a></div>';
        }
    }

    $results['totalpages'] = sizeof($pages);
    if (sizeof($pages) > 0) {
        $results['pages'] = $parr;
    } else {
        $results['pages'] = '<p>Hittade inga sidor</p>';
    }

    $post_query->reset_postdata();

    if ($search_cars) {
        $curl = um_curl_ea($search_string);

        if ($curl['err']) {
            // This is not handled if it occurs
            echo 'cURL Error #:' . $err;
        } else {
            $car_data = json_decode($curl['response']);
            $car_markup = um_create_car_markup($car_data, $amount, $search_string);
            $results['cars'] = $car_markup;
        }
    }

    if ($json) {
        echo json_encode($results);
        die();
    } else {
        return $results;
    }
}

/**
 * Retrieves data from Elastic Access
 *
 * @param string $s - search string
 *
 * return $r - data from cURL
 */
function um_curl_ea($s)
{

    $searchWords = explode(" ", $s);
    //set words to set additional params
    $usedWords = apply_filters("search_match_word_to_status_old", array());
    $newWords = apply_filters("search_match_word_to_status_new", array());

    $matching_word = null;
    $used = null;

    foreach ($searchWords as $key => $word) {
        if(in_array(strtolower($word), $usedWords)){
            $matching_word = $word;
            $used = 0;
        }

        if(in_array(strtolower($word), $newWords)){
            $matching_word = $word;
            $used = 1;
        }
    }

    if ($used !== null) {
        $usedString = '&status=' . $used;
        $s = str_replace($matching_word, '', $s);
        $s = ltrim($s);
    } else {
        $usedString = '';
    }

    $url = "http://elasticaccess.herokuapp.com/api/cars?pageSize=6".$usedString."&s=" . urlencode($s);

    $ch = curl_init();
    curl_setopt_array($ch, array(
        // Elastic access, pageSize is 6 because if it's more than 5 we want a show more button
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "x-authentication: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkZWFsZXIiOiJ1cHBsYW5kc21vdG9yIn0.mq-UIAa7nlZJ3Sct5XLn1N6FONKjHhCI2ePJZoakoZc"
        ),
    ));

    $r = array();
    $r['response'] = curl_exec($ch);
    $r['err'] = curl_error($ch);

    curl_close($ch);

    return $r;
}

/**
 * Creates markup from data
 *
 * @param object $data - car data from curl
 * @param int $amount - amount of cars
 * @param string $s - search string
 *
 * return $markup - HTML
 */
function um_create_car_markup($data, $amount, $s)
{
    $ps = 'price-sek';
    $cars = 0;
    $markup = '';

    foreach ($data->cars as $car) {
        if ($cars == $amount) break;

        // Format miles and price
        if ($car->miles == null)
            $car->miles = '0';
        else
            $car->miles = number_format(intval($car->miles), 0, ',', ' ');
        $car->$ps = number_format(intval($car->$ps), 0, ',', ' ');

        $markup .= '<li><a class="result-item car" href="/objekt/#?id=' . $car->id . '">';
        $markup .= '<div class="car-info">';
        $markup .= '<h4 class="no-wrap">' . $car->brand . ' ' . $car->model . ' ' . $car->modeldescription . '</h4>';
        $markup .= '<p><span class="car-year">' . $car->yearmodel . '</span> / <span class="car-miles">' . $car->miles . ' mil</span> / <span class="car-color">' . $car->color . '</span> / <span class="car-body">' . $car->bodytype . '</span></p>';
        $markup .= '<span class="car-price">' . $car->$ps . ' kr</span>';
        $markup .= '</div>';
        $markup .= '<div class="car-image"><img src="' . $car->images->image[0] . '" class="img-responsive"></div>';
        $markup .= '</a></li>';

        $cars++;
    }
    $markup .= '<div style="clear:both;"></div>';

    if ($cars == 0)
        $markup .= '<p>Hittade inga bilar</p>';
    else
        $markup .= '<div class="show-more"><a href="/bilar/bilar-i-lager/#?s=' . $s . '">Visa fler...</a></div>';

    return $markup;
}
?>
