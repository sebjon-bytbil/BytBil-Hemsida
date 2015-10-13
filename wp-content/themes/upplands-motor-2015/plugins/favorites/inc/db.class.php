<?php
class BBFavoritesDataBase
{
    static function createTables(){
        global $wpdb;
        $dbCreated = get_option( 'bbfavoritesSaved', false );
        if (!$dbCreated) {
            $table_name = $wpdb->prefix . "bbfavorites";
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $table_name (
              id mediumint(9) NOT NULL AUTO_INCREMENT,
              email text NOT NULL,
              favorites text NOT NULL,
              UNIQUE KEY id (id)
            ) $charset_collate;";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sql);

            update_option( 'bbfavoritesSaved', true, true );
        }

        $favoritesDBCreate = get_option('favoritesDBSaved', false);
        if (!$favoritesDBCreate) {
            $favorites_table = $wpdb->prefix . 'myfavorites';
            $charset_collate = $wpdb->get_charset_collate();

            $favorites_sql = "CREATE TABLE $favorites_table (
              id mediumint(9) NOT NULL AUTO_INCREMENT,
              email text NOT NULL,
              hashed_email text NOT NULL,
              UNIQUE KEY id (id)
            ) $charset_collate;";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($favorites_sql);

            update_option('favoritesDBSaved', true, true);
        }

    }

    static function getList($email)
    {
        global $wpdb;
        $table = $wpdb->prefix . "bbfavorites";
        $row = $wpdb->get_row("SELECT * FROM $table WHERE email = '$email'", ARRAY_A);

        return $row;
    }

    static function saveList($email, $list)
    {
        global $wpdb;
        $table = $wpdb->prefix . 'bbfavorites';
        $currentList = self::getList($email);
        if ($currentList) {
            $list = json_encode($list);
            $wpdb->update($table, array('favorites' => $list), array('email' => "$email"), array('%s'), array('%s'));
        } else {
            $wpdb->insert($table, array('email' => $email, 'favorites' => $list), array('%s', '%s'));
        }

        return $list;
    }

    static function removeList($email)
    {
        global $wpdb;
        $success = false;
        $table = $wpdb->prefix . 'bbfavorites';
        $table_name = $wpdb->prefix . 'myfavorites';

        if ($wpdb->delete($table, array('email' => $email), array('%s'))) {
            $success = true;
        }

        if ($wpdb->delete($table_name, array('email' => $email), array('%s'))) {
            $success = true;
        }

        return $success;
    }

    static function syncOrSaveList($email, $localList)
    {
        global $wpdb;
        $table = $wpdb->prefix . 'bbfavorites';

        $savedList = self::getList($email);

        if (empty($savedList)) {
            // New user
            $list = json_encode($localList);
            $wpdb->insert($table, array('email' => $email, 'favorites' => $list), array('%s', '%s'));
            $list = json_decode($list);
            $new_list['list'] = $list;
            $new_list['existing'] = false;
        } else {
            // Existing user
            $list = self::mergeLists($localList, $savedList);
            $list = json_encode($list);
            $wpdb->update($table, array('favorites' => $list), array('email' => "$email"), array('%s'), array('%s'));
            $list = json_decode($list);
            $new_list['list'] = $list;
            $new_list['existing'] = true;
        }

        return $new_list;
    }

    static function mergeLists($localList, $savedList)
    {
        if (empty($savedList)) {
            return $localList;
        }

        $savedList = json_decode($savedList['favorites']);
        if (empty($localList)) {
            return $savedList;
        }

        $tmparr = $savedList;
        foreach ($savedList as $key => $value) {
            $exists = false;
            foreach ($localList as $index => $local) {
                if ($local->id === $value->id) {
                    $exists = true;
                }
            }

            if (!$exists) {
                array_push($tmparr, $value);
            }
        }

        return $tmparr;
    }

    static function removeMalformed($list)
    {
        if (!is_array($list)) {
            return $list;
        }

        foreach ($list as $i => $post) {
            if (!is_object($post)) {
                unset($list[$i]);
            }
        }
        $list = array_values($list);

        return $list;
    }

    static function createHash($mail)
    {
        $hash = wp_hash_password($mail);
        return $hash;
    }

    static function getHash($email)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'myfavorites';
        $row = $wpdb->get_row("SELECT hashed_email FROM $table_name WHERE email = '$email'");

        if (is_null($row)) {
            return $row;
        }

        return $row->hashed_email;
    }

    static function hashExists($email)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'myfavorites';
        $row = $wpdb->get_row("SELECT * FROM $table_name WHERE email = '$email'");

        if (is_null($row)) {
            return false;
        }
        return true;
    }

    static function insertHash($mail, $hash)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'myfavorites';
        $wpdb->insert($table_name, array('email' => $mail, 'hashed_email' => $hash), array('%s', '%s'));
    }

    static function getFavoritesEmail($hash)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'myfavorites';
        $row = $wpdb->get_row("SELECT email FROM $table_name WHERE hashed_email = '$hash'");

        return $row->email;
    }
}
?>