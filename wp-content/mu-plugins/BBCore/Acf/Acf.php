<?php 
	/**
	 * BBCore Acf Plugin
	 *
	 * Contains functionality for ACF integrations
	 */
	class BBCoreAcf
	{
		public $relationshipsCache = array();
		function __construct()
		{
			$this->FilePath = dirname(__FILE__);
			add_action( 'save_post', array($this, 'ClearCache'), 10, 3 );
			add_action( 'delete_post', array($this, 'ClearCache'), 10, 3 );
			add_action( 'wp_trash_post', array($this, 'ClearCache'), 10, 3 );
			add_action( 'post_updated', array($this, 'ClearCache'), 10, 3 );
			add_action( 'clean_page_cache', array($this, 'ClearCache'), 10, 3 );
			add_action( 'init', array($this, 'getFieldsToCache'), 10, 0 );
		}

		function GetRepeater($field_name, $id = null){
			global $post;
			$id = false;
			$cache = array();
			if($id == null){
				
				$id = $post->ID;
			}

			// if(current_user_can('edit_post')){
			// 	$rows = get_field($field_name, $id);
			// 	return $rows;
			// }

			$cacheKey = 'repeaterCahce' . $id;

			$rows = wp_cache_get( $cacheKey, 'acf_get_repeater_' . get_current_blog_id());
			if (!$rows) {
				$rows = get_field($field_name, $id);
				$cache[$field_name] = $rows;
				wp_cache_set( $cacheKey, $cache, 'acf_get_repeater_' . get_current_blog_id(), 0 );
			}else{
				if (isset($rows[$field_name])) {
					return $rows[$field_name];
				}else{
					$rows[$field_name] = get_field($field_name, $id);
					wp_cache_set( $cacheKey, $rows, 'acf_get_repeater_' . get_current_blog_id(), 0 );
				}

			}
			

			return $rows[$field_name];
		}


		function get_field($name, $id = null){

			global $post;
			$id = false;
			$cache = array();
			if($id == null){
				
				$id = $post->ID;
			}

			// if(current_user_can('edit_post')){
			// 	$rows = get_field($field_name, $id);
			// 	return $rows;
			// }

			$cacheKey = 'fieldCache' . $id;

			$rows = wp_cache_get( $cacheKey, 'acf_get_field_' . get_current_blog_id());
			if (!$rows) {
				$rows = get_field($field_name, $id);
				$cache[$field_name] = $rows;
				wp_cache_set( $cacheKey, $cache, 'acf_get_field_' . get_current_blog_id(), 0 );
			}else{
				if (isset($rows[$field_name])) {
					return $rows[$field_name];
				}else{
					$rows[$field_name] = get_field($field_name, $id);
					wp_cache_set( $cacheKey, $rows, 'acf_get_field_' . get_current_blog_id(), 0 );
				}

			}
			

			return $rows[$field_name];

			return $field;
		}

		function ClearCache($post_id, $post = null, $update = null){
			
			if($post === null)
				$post = get_post($post_id, OBJECT);
				
			//error_log('invalidate cache');
			//clear relationships on save and delete
			//get array with fields to cache
			$types = apply_filters( 'acf_cache_relationsships_types', array() );
			//error_log(print_r($types,true));
			foreach ($types as $key => $type) {
				//Checks:
				//if 'all' in_array $type do clear cache
				//OR $post->post_type in_array $type do clear cache
				//else continue
				if(in_array('all', $type) || in_array($post->post_type, $type)){
					
					$cacheKey ='acf_relationship_'.$key.get_current_blog_id();
					//error_log('clear cache for '. $cacheKey);
					//error_log($cacheKey);
					wp_cache_delete($cacheKey, 'acf_relationship');
				}
				
			}

			//delete repeater cache
			$cacheKey = 'repeaterCahce' . $post_id;
			wp_cache_delete( $cacheKey, 'acf_get_repeater_' . get_current_blog_id());

			//delete field cache
			$cacheKey = 'fieldCache' . $post_id;
			wp_cache_delete( $cacheKey, 'acf_get_field_' . get_current_blog_id());
		}


		function getFieldsToCache(){
			$types = false; //wp_cache_get( 'relations_' . get_current_blog_id() , 'acf_all_relations_cache');
			if (!$types) {
				$extraTypes = apply_filters( 'acf/get_field_groups', array() );
				//error_log(print_r($GLOBALS['acf_register_field_group'], true));
				$this->processFields($GLOBALS['acf_register_field_group']);

				wp_cache_set( 'relations_' . get_current_blog_id(), $this->relationshipsCache, 'acf_all_relations_cache', 3600 );
			}else{
				$this->relationshipsCache = $types;
			}
			
			add_filter( 'acf_cache_relationsships_types', array($this, 'add_relationship_cache'), 10, 1 );
			//error_log(print_r($this->relationshipsCache, true));
		}

		function add_relationship_cache($types){
			return $this->relationshipsCache;
		}

		function processFields($types){
			//error_log('startFields');
			foreach ($types as $key => $type) {
				
				if (isset($type['fields'])) {
					//error_log('fields');
					//error_log(print_r($type['fields'], true));
					$this->processFields($type['fields']);
				}

				if (isset($type['sub_fields'])) {
					//error_log('sub_fields');
					//error_log(print_r($type['sub_fields'], true));
					$this->processFields($type['sub_fields']);
				}

				if (isset($type['layouts'])) {
					//error_log('layouts');
					//error_log(print_r($type['layouts'], true));
					$this->processFields($type['layouts']);
				}

				if (isset($type['type']) && $type['type'] === 'relationship') {
					//error_log('type');
					//error_log(print_r($type['key'], true));
					
					$this->relationshipsCache[$type['key']] = isset($type['post_type']) ? $type['post_type'] : array('all');
				}

			}
		}

	}




	
 ?>