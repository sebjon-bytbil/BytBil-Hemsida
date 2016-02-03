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
		"name" => "Personal",
		"singular_name" => "Personal",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"has_archive" => false,
		"show_in_menu" => "edit.php?post_type=facility",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "employee", "with_front" => true ),
		"query_var" => true,
									);
	register_post_type( "employee", $args );

	$labels = array(
		"name" => "Personallista",
		"singular_name" => "Personallista",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"has_archive" => false,
		"show_in_menu" => "edit.php?post_type=facility",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "employee-list", "with_front" => true ),
		"query_var" => true,
									);
	register_post_type( "employee-list", $args );
    
    	$labels = array(
		"name" => "Blogg",
		"singular_name" => "Blogg",
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
		"rewrite" => array( "slug" => "blog", "with_front" => true ),
		"query_var" => true,
									);
	register_post_type( "blog", $args );

// End of cptui_register_my_cpts()
}
?>