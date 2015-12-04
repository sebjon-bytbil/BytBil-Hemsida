
<?php

class FTPClient
{
    public $groupId;
    public $custom_css;
    public $custom_js;
    public $layout_less;

    public function __construct($groupId, $custom_css, $custom_js, $layout_less, $editAccesspackage)
    {
        //FTP-ACCESS
        define('FTP_SERVER', 'access.bytbil.com');
        define('FTP_USERNAME', 'leo.starcevic');
        define('FTP_PASSWORD', 'weXe4ama');

        $this->groupId = $groupId;
        $this->custom_css = $custom_css;
        $this->custom_js = $custom_js;
        $this->layout_less = $layout_less;

        $base_path = '/access.bytbil.com/CustomerSites/';
        $path = '/Access/Content/css/';
        $js_path = '/Access/Content/js/';

        $ftp_conn = $this->connectToFtp(FTP_SERVER, FTP_USERNAME, FTP_PASSWORD);

        if($editAccesspackage == "facebook"){
            $this->addFacebookEntry($ftp_conn, $base_path, $groupId, $custom_css, $custom_js);

        } else if ($editAccesspackage == "accesspaket") {
            //cms.css
            $this->createDirectories($ftp_conn, $base_path, $groupId . $path);
            $this->putCustomFile($ftp_conn, "css", $groupId, $custom_css);
            //layout.less
            $this->putCustomFile($ftp_conn, "less", $groupId, $layout_less);
            //cms.js
            $this->createDirectories($ftp_conn, $base_path, $groupId . $js_path);
            $this->putCustomFile($ftp_conn, "js", $groupId, $custom_js);

        } else {
            $this->deleteCustomFile($ftp_conn, $base_path . $groupId . $path);
            $this->deleteCustomFile($ftp_conn, $base_path . $groupId . $js_path);
        }
    }

    public function __deconstruct()
    {
        $this->closeFTP();
    }

    public function connectToFtp($ftp_server, $ftp_username, $ftp_password)
    {
        $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
        $login = ftp_login($ftp_conn, $ftp_username, $ftp_password);
        return $ftp_conn;
    }

    public function addFacebookEntry($ftp_conn, $base_path, $alias, $fb_id, $title){
        ftp_pasv($ftp_conn, true);
        $file_path = $base_path . "G-109/Access/Content/dealers.js";
        $local_file_path = WP_CONTENT_DIR . "/uploads/dealers.js";

        $get_dealers = ftp_get($ftp_conn, $local_file_path, $file_path, FTP_ASCII);

        $open_dealers = fopen($local_file_path, "r");
        $dealers = fread($open_dealers, filesize($local_file_path));

        //Backup
        file_put_contents(WP_CONTENT_DIR . "/uploads/" . $alias . ".js", $dealers);
        ftp_put($ftp_conn, $base_path . "G-109/Access/Content/backups/" . $alias . ".bak", WP_CONTENT_DIR . "/uploads/" . $alias . ".js", FTP_ASCII);

        $dealers = json_decode($dealers);
        $updated = false;
        foreach($dealers as $dealer){
            if($dealer->alias == $alias || $dealer->fbid == $fb_id){
                $dealer->handlare = $title;
                $dealer->alias = $alias;
                $dealer->fbid = $fb_id;
                $updated = true;
            }
        }
        if(!$updated && $alias && $fb_id){
            //New facebook entry
            $newDealer = new \stdClass();
            $newDealer->handlare = $title;
            $newDealer->alias = $alias;
            $newDealer->fbid = $fb_id;

            array_push($dealers, $newDealer);
        }

        $dealers = json_encode($dealers);

        $dealers = str_replace(
            array("[", ",", "]", "}", "{", "}\n,"),
            array("[\n", ",\n", "\n]", "\n}\n", "{\n", "},"), $dealers
        );

        fclose($dealers);
        file_put_contents($local_file_path, $dealers);

        ftp_put($ftp_conn, $file_path, $local_file_path, FTP_ASCII);

        unlink($local_file_path);
    }

    public function createDirectories($ftp_conn, $base_dir, $path)
    {
        @ftp_chdir($ftp_conn, $base_dir);
        $parts = explode('/', $path);
        foreach ($parts as $part) {
            if (!@ftp_chdir($ftp_conn, $part)) {
                ftp_mkdir($ftp_conn, $part);
                ftp_chdir($ftp_conn, $part);
            }
        }
    }

    public function putCustomFile($ftp_conn, $file_type, $groupId, $custom_code)
    {
        $local_base_path = WP_CONTENT_DIR . "/uploads/" . $groupId;

        //
        if($file_type == "css" || $file_type == "js"){
            $local_filename = $local_base_path . "-cms." . $file_type;
            $file_name = "cms." . $file_type;
        }else if($file_type == "less"){
            $local_filename = $local_base_path . "-layout.css";
            $file_name = "layout.css";
            $custom_code = $this->compileLessToCss($custom_code);
        }

        file_put_contents($local_filename, $custom_code);

        //Passive connection has to be true, otherwise ftp_put won't work.
        ftp_pasv($ftp_conn, true);
        ftp_put($ftp_conn, $file_name, $local_filename, FTP_ASCII);
        unlink($local_filename);
    }

    public function deleteCustomFile($ftp_conn, $path)
    {
        ftp_chdir($ftp_conn, $path);
        ftp_delete($ftp_conn, 'cms.css');
    }

    public function compileLessToCss($less_code){
        //Less compiler for PHP
        require "lib/lessphp/lessc.inc.php";
        $less = new lessc;
        $css = $less->compile($less_code);
        $css = "/* This file was automatically compiled from layout.less by Bytbil CMS */\n\n" . $css;
        return $css;
    }

    public function closeFTP()
    {
        ftp_close($this->ftp_conn);
    }
}

?>