<?php
    require_once('inc/db.class.php');

    /**
    *
    */
    class BytBilFavorites
    {
        private $pluginUrl = '';

        function __construct()
        {
            $this->pluginUrl = get_stylesheet_directory_uri() . "/plugins/favorites/";
            //actions
            //create tables
            add_action( 'admin_init', array($this, 'createTables'), 10);

            //ajax functions
            add_action( 'wp_ajax_bbfavorites_save', array($this, 'saveList') );
            add_action( 'wp_ajax_nopriv_bbfavorites_save', array($this, 'saveList') );

            add_action( 'wp_ajax_bbfavorites_sync', array($this, 'syncList') );
            add_action( 'wp_ajax_nopriv_bbfavorites_sync', array($this, 'syncList') );

            add_action('wp_ajax_bbfavorites_getlist', array($this, 'getList'));
            add_action('wp_ajax_nopriv_bbfavorites_getlist', array($this, 'getList'));

            add_action('wp_ajax_bbfavorites_removelist', array($this, 'removeList'));
            add_action('wp_ajax_nopriv_bbfavorites_removelist', array($this, 'removeList'));

            add_action('wp_ajax_bbfavorites_saveandcreate', array($this, 'saveAndCreatePage'));
            add_action('wp_ajax_nopriv_bbfavorites_saveandcreate', array($this, 'saveAndCreatePage'));

            add_action('wp_ajax_bbfavorites_gethashbase', array($this, 'getHashBase'));
            add_action('wp_ajax_nopriv_bbfavorites_gethashbase', array($this, 'getHashBase'));

            add_action('wp_ajax_bbfavorites_emailshare', array($this, 'shareToEmail'));
            add_action('wp_ajax_nopriv_bbfavorites_emailshare', array($this, 'shareToEmail'));
        }

        function createTables(){
            BBFavoritesDataBase::createTables();
        }

        function getList()
        {
            $email = sanitize_email($_POST['email']);
            $list = BBFavoritesDataBase::getList($email);
            $hash = BBFavoritesDataBase::getHash($email);

            if ($list === null || $list['favorites'] === '') {
                $list = array();
            } else {
                $list = json_decode($list['favorites']);
            }

            $return_array = array();
            $return_array['base_url'] = get_site_url();
            $return_array['hash'] = $hash;
            $return_array['items'] = $list;

            echo json_encode($return_array); die();
        }

        function saveList()
        {
            $data = json_decode(stripcslashes($_POST['list']));
            $data = BBFavoritesDataBase::removeMalformed($data);
            $mail = $_POST['mail'];
            $list = BBFavoritesDataBase::saveList($mail, $data);

            echo json_encode(array('currentList' => $list));
            die();
        }

        function removeList()
        {
            $email = sanitize_email($_POST['email']);
            $return_array = array();

            if (BBFavoritesDataBase::removeList($email)) {
                $return_array['status'] = 'OK';
            } else {
                $return_array['status'] = 'failed';
            }

            echo json_encode($return_array); die();
        }

        function syncList()
        {
            $mail = $_POST['mail'];
            $list = BBFavoritesDataBase::getList($mail);

            echo $list == null ? json_encode(array()) : $list['favorites'];
            die();
        }

        // Returns email hash and base url for AJAX request
        function getHashBase()
        {
            $email = sanitize_email($_POST['email']);
            $hash = BBFavoritesDataBase::getHash($email);

            $return_array = array();
            $return_array['base_url'] = get_site_url();
            $return_array['hash'] = $hash;

            echo json_encode($return_array); die();
        }

        // Ska alltid returna email hashen, oavsett
        function saveAndCreatePage()
        {
            // Hämta POST värden.
            $locallist = json_decode(stripcslashes($_POST['list']));
            $locallist = BBFavoritesDatabase::removeMalformed($locallist);
            $email = sanitize_email($_POST['email']);

            // Kontrollera om den redan är inlagd och om den är det, hämta hashen.
            // Beroende på vad så ska den antingen lägga in en ny eller inte.
            if (BBFavoritesDataBase::hashExists($email)) {
                $hash = BBFavoritesDataBase::getHash($email);
            } else {
                $hash = BBFavoritesDataBase::createHash($email);
                BBFavoritesDataBase::insertHash($email, $hash);
            }

            // Synka eller spara listan.
            $list = BBFavoritesDataBase::syncOrSaveList($email, $locallist);

            $return_array = array();
            $return_array['base_url'] = get_site_url();
            $return_array['hash'] = $hash;
            $return_array['items'] = $list;

            echo json_encode($return_array); die();
        }

        function getEmailFromHash($hash)
        {
            $mail = BBFavoritesDataBase::getFavoritesEmail($hash);

            return $mail;
        }

        function createFavoritesPage()
        {
            $fb = (bool) $_POST['fb'];
            $mail = sanitize_email($_POST['mail']);
            if (BBFavoritesDatabase::favoritesPageExists($mail)) {
                // Page exists
                echo json_encode('Some kind of message!'); die();
            }

            $hash = BBFavoritesDatabase::createHash($mail);
            BBFavoritesDatabase::insertFavoritesHash($mail, $hash);

            if ($fb) {
                $data = array();
                $data['hash'] = $hash;
                $data['base_url'] = get_site_url();
                echo json_encode($data); die();
            } else {
                echo json_encode('Something else'); die();
            }
        }

        function getFavoritesList($hash)
        {
            // Get the mail from the hash
            $email = BBFavoritesDatabase::getFavoritesEmail($hash);
            $list = BBFavoritesDatabase::getList($email);
            if (is_null($list)) {
                return false;
            }
            $list = self::formatList($list);

            return $list;
        }

        function shareToEmail()
        {
            $email = sanitize_email($_POST['email']);
            $share_email = sanitize_email($_POST['shareEmail']);
            $base_url = get_site_url();
            $hash = BBFavoritesDataBase::getHash($email);
            $share_url = $base_url . '/mina-favoriter/?h=' . urlencode($hash);

            $headers = 'From: Upplands Motor <noreply@upplandsmotor.se>' . "\r\n";
            $mail_body = "Hej, \r\n " . $email . " har delat sina favoriter med dig! \r\n\r\nHär hittar du dem: " . $share_url;

            wp_mail($share_email, $email . ' har delat sina favoriter med dig', $mail_body, $headers);

            echo json_encode(''); die();
        }

        function formatList($list)
        {
            $list = json_decode($list['favorites']);
            $cars = array();
            $offers = array();
            $subs = array();
            $formatted_list = array();

            foreach ($list as $item) {
                switch ($item->type) {
                    case 'car':
                        array_push($cars, $item);
                        break;
                    case 'offer':
                        array_push($offers, $item);
                        break;
                    case 'search':
                        array_push($subs, $item);
                        break;
                }
            }

            $formatted_list['cars']['amount'] = count($cars);
            $formatted_list['cars']['items'] = $cars;
            $formatted_list['offers']['amount'] = count($offers);
            $formatted_list['offers']['items'] = $offers;
            $formatted_list['subs']['amount'] = count($subs);
            $formatted_list['subs']['items'] = $subs;

            return $formatted_list;
        }
    }
    $BytBilFavorites = new BytBilFavorites();
?>
