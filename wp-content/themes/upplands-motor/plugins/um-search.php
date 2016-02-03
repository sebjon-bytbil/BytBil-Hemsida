<?php

/**
 * Upplands Motor search
 * =====================
 */

add_filter('posts_join', 'um_search_join');
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

add_filter('posts_where', 'um_search_where');
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
            {$wpdb->terms}.name LIKE ('%".$wpdb->escape( get_query_var('s') )."%')
        ) ";
    }
    return $where;
}

add_filter('posts_groupby', 'um_search_groupby');
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
    $s = $_GET['search_string'];
    um_search($s, 5, true, true);
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
        's' => $search_string,
        'showposts' => -1
    );

    $pages = array();
    $post_query = new WP_Query($params);

    if ($post_query->have_posts()) {
        $i = 0;

        while ($post_query->have_posts()) { $post_query->the_post();
            $search_title = get_the_title();
            // Highlights the search string
            $search_title = preg_replace("/$search_string/i", "<span class='search-hit'><strong>$0</strong></span>", $search_title);
            $pages[$i]['title'] = $search_title;
            $pages[$i]['link'] = esc_url(get_permalink());

            if ($i == $amount) {
                break;
            }
            if (get_field('row')) {
                while (have_rows('row')) { the_row();

                    if (have_rows('row-content')) {
                        while (have_rows('row-content')) { the_row();
                            $content = get_sub_field('content-wysiwyg');

                            if ($content != '') {
                                $excerpt = utf8_decode(strip_tags($content));
                                $excerpt = substr($excerpt, stripos($excerpt, $search_string), 130);
                                $excerpt = utf8_encode($excerpt);
                                // Highlights the search string
                                $search_result = '... ' . preg_replace("/$search_string/i", "<span class='search-hit'><strong>$0</strong></span>", $excerpt) . '...';
                                $pages[$i]['result'] = $search_result;
                            }
                        }
                    }

                }
            }
            $i++;
        }
    }

    if (sizeof($pages) > 0) {
        $results['pages'] = $pages;
        $results['totalpages'] = $post_query->found_posts;
    }

    $post_query->reset_postdata();

    if ($search_cars) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            // Elastic access, pageSize is 6 because if it's more than 5 we want a show more button
            CURLOPT_URL => "http://elasticaccess.herokuapp.com/api/cars?pageSize=6&s=" . $search_string,
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
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            // This is not handled if it occurs
            echo 'cURL Error #:' . $err;
        } else {
            $car_data = json_decode($response);
            $ps = 'price-sek';
            $c = 0;

            // Formats miles and price
            foreach ($car_data->cars as $car) {
                if ($car->miles == null)
                    $car->miles = '0';
                else
                    $car->miles = number_format(intval($car->miles), 0, ',', ' ');
                $car->ps = number_format(intval($car->$ps), 0, ',', ' ');
                $c++;
            }

            $results['totalcars'] = $c;
            $results['cars'] = $car_data;
        }
    }

    if ($json) {
        echo json_encode($results); die();
    } else {
        return $results;
    }
}
?>

