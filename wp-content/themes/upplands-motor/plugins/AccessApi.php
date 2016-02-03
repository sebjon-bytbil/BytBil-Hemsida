<?php 

	/**
	* Class to wrap calls from or to accesspackage
	*/
	class AccessInterestMailApi
	{
		public static $nonce;
		static $hookPrefix = 'access_interest_mail_';
		static $ajaxUrl;
		static $action;
		function __construct()
		{

			self::$nonce = wp_create_nonce('interest_mail');
			self::$ajaxUrl = admin_url( 'admin-ajax.php' );
			self::$action = 'process_interest_mail';
			//Init actions
			add_action( 'wp_ajax_process_interest_mail', array($this, 'ProcessAjaxMail') );
			add_action( 'wp_ajax_nopriv_process_interest_mail', array($this, 'ProcessAjaxMail') );

			//init filters
		}

		public static function SendInterestMail($args = array()){
			$defaults = array(
				'to' 			=> '',
				'subject' 		=> '',
				'message'		=> '',
				'headers'		=> array(),
				'attachments'	=> '',
			);
			
			$args = wp_parse_args( $args, $defaults );

			//add option to override recipient
			$args['to'] = explode(", ", $args['to']);
			$args['to'] = apply_filters( self::$hookPrefix . 'override_recipient', $args['to'] );
			// try to send mail
			$sent = wp_mail( $args['to'], $args['subject'], $args['message'], $args['headers'], $args['attachments'] );

			return $sent;
		}

		public function ProcessAjaxMail()
		{
			$returnObject = new stdClass();
			
			//check if post
			if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
				wp_die();
			}

			//check nonce for xss attacks
			if (!wp_verify_nonce( $_REQUEST['data']['wp_nonce'], 'interest_mail' )) {
				//wp_die();
			}

			$data = $_GET;

			$mailArgs = array(
				'to' =>	'johan@hypernode.se, ahlback.johan@gmail.com',
				'subject' => $this->BuildSubject($data),
				'message' => $this->BuildMessage($data)
			);

			$isSent = self::SendInterestMail($mailArgs);


			if ($isSent) {
				$this->SaveMail($data);
				$returnObject->HeadLine = apply_filters( self::$hookPrefix . 'success_headline', 'Ditt mail har blivit skickat' );
				$returnObject->Message = apply_filters( self::$hookPrefix . 'success_message', 'Ditt mail har blivit skickat' );
				$returnObject->Error = false;
				$returnObject->Errors = array();
			}else{
				$returnObject->HeadLine = apply_filters( self::$hookPrefix . 'failed_headline', 'Ditt mail har inte skickats' );
				$returnObject->Message = apply_filters( self::$hookPrefix . 'failed_message', 'Något gick fel.' );
				$returnObject->Error = true;
				$returnObject->Errors = array();
			}

			$json = json_encode($returnObject);
			echo $json;
			wp_die();	
		}

		public static function AngularVars(){
			// Generate nonce for every user
			self::$nonce = wp_create_nonce('interest_mail');

			$r = new stdClass();
			$r->wp_nonce = self::$nonce;
			$r->ajaxUrl = self::$ajaxUrl;
			$r->action = self::$action;

			$json = json_encode($r);

			return urlencode($json);
		}

		public function BuildMessage($data){
			$lineBreak = "\n\r";

			$message = "";
			if (isset($data['name']))
				$message .= "Namn: " . $data['name'] . "." . $lineBreak;

			if (isset($data['email']))
				$message .= "Email: " . $data['email'] . "." . $lineBreak;

			if (isset($data['phone']))
				$message .= "Telefon: " . $data['phone'] . "." . $lineBreak;

			if (isset($data['message']))
				$message .= "Meddelande: " . $data['message'] . "." . $lineBreak;

			$hasTradeIn = isset($data['hasTradeIn']);
			if ($hasTradeIn){
				$message .= "Har bil att byta in: Ja." . $lineBreak;

				if (isset($data['tradeInModel']))
					$message .= "Modell: " . $data['tradeInModel'] . "." . $lineBreak;

				if (isset($data['tradeInYear']))
					$message .= "Årsmodell: " . $data['tradeInYear'] . "." . $lineBreak;

				if (isset($data['tradeInMileage']))
					$message .= "Mätarställning: " . $data['tradeInMileage'] . "." . $lineBreak;

				if (isset($data['tradeInReg']))
					$message .= "Reg. nr.: " . $data['tradeInReg'] . "." . $lineBreak;
			}else{
				$message .= "Har bil att byta in: Nej." . $lineBreak;
			}

			

			if (isset($data['carId']))
				$message .= "Objekt: " . $data['carId'] . "." . $lineBreak;

			if (isset($data['carInfo']))
				$message .= "Typ: " . $data['carInfo'] . "." . $lineBreak;

			if (isset($data['regNr']))
				$message .= "Reg. nr.: " . $data['regNr'] . "." . $lineBreak;

			return apply_filters( self::$hookPrefix . 'mail_message', $message, $data);
		}

		public function BuildSubject($data){
			$message = "Intresseanmälan på objekt: " . $data['carId'];
			
			return apply_filters( self::$hookPrefix . 'mail_subject', $message, $data);
		}


		public function SaveMail($data){
			// Create post object
			$my_post = array(
				'post_type' => 'AccessPackageMail',
			  'post_title'    => $this->BuildSubject($data),
			  'post_content'  => $this->BuildMessage($data),
			  'post_status'   => 'publish',
			  'post_author'   => 1,
			  'post_category' => array(8,39)
			);

			// Insert the post into the database
			wp_insert_post( $my_post );
		}
	}

	$AccessInterestMailApi = new AccessInterestMailApi();

	// Register Custom Post Type
function InterestMailType() {

	$labels = array(
		'name'                => _x( 'Mail', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'InterestMail', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Intresseanmälan', 'text_domain' ),
		'name_admin_bar'      => __( 'Intresseanmälan', 'text_domain' ),
		'parent_item_colon'   => __( '', 'text_domain' ),
		'all_items'           => __( 'Alla intressen', 'text_domain' ),
		'add_new_item'        => __( 'Lägg till nytt intresse', 'text_domain' ),
		'add_new'             => __( 'Lägg till ny', 'text_domain' ),
		'new_item'            => __( 'Ny intresseanmälan', 'text_domain' ),
		'edit_item'           => __( 'Redigera intresseanmälan', 'text_domain' ),
		'update_item'         => __( 'Updatera intresseanmälan', 'text_domain' ),
		'view_item'           => __( 'Visa intresseanmälan', 'text_domain' ),
		'search_items'        => __( 'Sök intresseanmälan', 'text_domain' ),
		'not_found'           => __( 'inga intresseanmälningar hittades', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$capabilities = array(
		'edit_post'           => 'edit_post',
		'read_post'           => 'edit_post',
		'delete_post'         => 'delete_post',
		'edit_posts'          => 'edit_posts',
		'edit_others_posts'   => 'edit_others_posts',
		'publish_posts'       => 'publish_posts',
		'read_private_posts'  => 'read_private_posts',
		'create_posts' 		=> false
	);
	$args = array(
		'label'               => __( 'AccessPackageMail', 'text_domain' ),
		'description'         => __( 'Lagrar intresseanmälan', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'rewrite'             => false,
		'capability_type' => 'post',
		'capabilities'        => $capabilities,
		'map_meta_cap' => true,
	);
	register_post_type( 'AccessPackageMail', $args );

}

// Hook into the 'init' action
add_action( 'init', 'InterestMailType', 0 );

 ?>