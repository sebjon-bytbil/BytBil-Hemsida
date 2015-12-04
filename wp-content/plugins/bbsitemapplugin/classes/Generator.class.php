<?php
require_once('render.class.php');
	/**
	* 
	*/
	class BBSitemapGenerator
	{
		
		function __construct()
		{
			//add_action( 'bb_generate_sitemap', 'my_task_function' );
		}

		static function getUploadBaseDir(){
			$uploadsdir = wp_upload_dir();
			$baseDir = $uploadsdir['basedir'];
			return $baseDir;
		}

		static function getUploadBaseurl(){
			$uploadsdir = wp_upload_dir();
			$baseUrl = str_replace(get_site_url(1), get_site_url(), $uploadsdir['baseurl']);
			return $baseUrl;
		}

		static function getPosttypes(){
			$default_types = array('page');
			return apply_filters('bbsitemap_posttypes', $default_types);
		}

		static function getSitemapPath(){
			$basedir = self::getUploadBaseDir();
			$filename = "sitemap.xml";

			return $basedir . '/' . $filename;
		}

		static function getSitemapUrl(){
			$basedir = self::getUploadBaseurl();
			$filename = "sitemap.xml";
			return $basedir . '/' . $filename;
		}

		static function sitemapExists(){
			return file_exists(self::getSitemapPath());
		}

		static function sitemapTime(){
			if (!self::sitemapExists()) {
				return null;
			}

			return filemtime(self::getSitemapPath());
		}

		static function getSitemapContent(){
			if (self::sitemapExists()) {
				return file_get_contents(self::getSitemapPath());
			}
			return '';
		}

		static function getPosts($posttype){
			$args = array(
				'posts_per_page'   => -1,
				'offset'           => 0,
				'orderby'          => 'date',
				'order'            => 'DESC',
				'post_type'        => $posttype,
				'post_status'      => 'publish',
				'suppress_filters' => true
			);
			$posts_array = get_posts( $args );

			return $posts_array;
		}

		static function getUrl($single){
			return get_permalink($single);
		}

		static function processPosts(){
			//error_log('processPosts');
			$types = self::getPosttypes();
			$urls = array();

			foreach ($types as $key => $type) {
				//error_log("type: " . $type);
				$posts = self::getPosts($type);
				foreach ($posts as $key => $single) {
					$url = self::getUrl($single);
					if ($url) {
						$urls[] = $url;
					}
				}
			}
			//error_log(print_r($urls,true));
			return $urls;
		}


		static function writeXml($xml){
			$filePath = self::getSitemapPath();
			$file = fopen($filePath, "w");
			fwrite($file, $xml);
			fclose($file);
			touch($filePath);
		}

		static function generateExtraUrls(){
			return apply_filters( 'bbsitemap_extraUrls', array() );
		}

		static function generateXml(){
			error_log("GENERATE XML");
			$file = self::getSitemapPath();
			$postsUrls = self::processPosts();
			$extraUrls = self::generateExtraUrls();
			$urls = array_merge($postsUrls, $extraUrls);

			$xml = BBSitemapXmlRender::RenderView('xml', array('urls' => $urls));
			self::writeXml($xml);
			return $xml;

		}
	}
 ?>