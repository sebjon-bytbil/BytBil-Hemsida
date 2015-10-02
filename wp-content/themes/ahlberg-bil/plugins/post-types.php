<?php
add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts() {
	$labels = array(
		"name" => "Anläggningar",
		"singular_name" => "Anläggning",
		"menu_name" => "Anläggningar",
		"all_items" => "Alla anläggningar",
		"add_new" => "Lägg till anläggning",
		"add_new_item" => "Lägg till anläggning",
		"edit" => "Redigera",
		"edit_item" => "Redigera anläggning",
		"new_item" => "Ny anläggning",
		"view" => "Visa",
		"view_item" => "Visa anläggning",
		"search_items" => "Sök anläggning",
		"not_found" => "Inga anläggningar hittade",
		"not_found_in_trash" => "Inga anläggningar i papperskorgen",
		"parent" => "Anläggningens förälder",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "facility", "with_front" => true ),
		"query_var" => true,
						"supports" => array( "title", "editor", "revisions" ),			);
	register_post_type( "facility", $args );

	$labels = array(
		"name" => "Erbjudanden",
		"singular_name" => "Erbjudande",
		"menu_name" => "Erbjudanden",
		"all_items" => "Alla erbjudanden",
		"add_new" => "Lägg till erbjudande",
		"add_new_item" => "Lägg till erbjudande",
		"edit" => "Redigera",
		"edit_item" => "Redigera erbjudande",
		"new_item" => "Nytt erbjudande",
		"view" => "Visa",
		"view_item" => "Visa erbjudande",
		"search_items" => "Sök erbjudanden",
		"not_found" => "Inga erbjudanden hittade",
		"not_found_in_trash" => "Inga erbjudanden i papperskorgen",
		"parent" => "Erbjudandets förälder",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "offer", "with_front" => true ),
		"query_var" => true,
						"supports" => array( "title", "editor", "revisions", "thumbnail" ),			);
	register_post_type( "offer", $args );

	$labels = array(
		"name" => "Puffar",
		"singular_name" => "Puff",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "plug", "with_front" => true ),
		"query_var" => true,
									);
	register_post_type( "plug", $args );

	$labels = array(
		"name" => "Fordonsurval",
		"singular_name" => "Fordonsurval",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "assortment", "with_front" => true ),
		"query_var" => true,
									);
	register_post_type( "assortment", $args );

// End of cptui_register_my_cpts()
}


?>