<?php

/**
 * SETTINGS TAB
 **/
$ipanel_magnium_tabs[] = array(
	'name' => 'Main Settings',
	'id' => 'main_settings'
);

$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "main_settings"
);


$ipanel_magnium_option[] = array(
	"name" => "Enable Parallax effects for pages backgrounds and parallax blocks",
	"id" => "enable_parallax",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "You can turn on/off parallax effects for scrolling here",
	"type" => "checkbox",
);

$ipanel_magnium_option[] = array(
	"name" => "Enable theme CSS3 animations",
	"id" => "enable_theme_animations",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Enable colors and background colors fade effects",
	"type" => "checkbox",
);

$ipanel_magnium_option[] = array(
	"name" => "Upload Favicon",
	"id" => "favicon_image",
	"field_options" => array(
		"std" => get_template_directory_uri().'/img/favicon.png'
	),
	"desc" => "Upload your site Favicon in PNG format (32x32px)",
	"type" => "qup",
);

$ipanel_magnium_option[] = array(
	"name" => "<span style='color:red;font-weight: bold;'>Enable Coming soon/Maintenance mode</span>",
	"id" => "enable_comingsoon",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "WARNING: If you enable this option only admin will see website frontend. All regular visitors will see your coming soon page, that you need to create in 'Pages > Add page' and select 'Coming soon' template for 'Page Template' option. Check Theme Documentation for more details.",
	"type" => "checkbox",
);

$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);
/**
 * Header TAB
 **/
$ipanel_magnium_tabs[] = array(
	'name' => 'Header',
	'id' => 'header_settings'
);

$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "header_settings"
);
$ipanel_magnium_option[] = array(
	"name" => "Header layout",   
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_magnium_option[] = array(
	"name" => "Header height in pixels",
	"id" => "header_height",
	"std" => "120",
	"desc" => "Default: 120",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Enable retina logo",
	"id" => "enable_retina_logo",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Enable this option if you uploaded retina logo. You must specify regular logo width in next option.",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Logo width (px)",
	"id" => "logo_width",
	"std" => "223",
	"desc" => "Default: 223. Upload retina logo (2x size) and input your regular logo width here. For example if your retina logo have 400px width put 200 value here. If you does not use retina logo input regular logo width here (your logo image width).",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Sticky/Fixed header",
	"id" => "enable_sticky_header",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Header will be fixed to top if enabled",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Enable right side offcanvas floating sidebar menu",
	"id" => "enable_offcanvas_sidebar",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Sidebar can be opened by toggle button near header mini cart. You can add widgets to this sidebar in 'Offcanvas Right sidebar' in Appearance > Widgets",
	"type" => "checkbox",
);

$ipanel_magnium_option[] = array(
	"name" => "MainMenu position",   
	"id" => "header_menu_layout",
	"options" => array(
		'menu_below_header' => array(
			"image" => IPANEL_URI . 'option-images/menu_in_header_1.png',
			"label" => 'MainMenu below Header'
		),
		'menu_in_header' => array(
			"image" => IPANEL_URI . 'option-images/menu_in_header_2.png',
			"label" => 'MainMenu in Header Center'
		),
	),
	"std" => "menu_in_header",
	"desc" => "",
	"type" => "image",
);
$ipanel_magnium_option[] = array(
	"name" => "MainMenu color scheme",
	"id" => "header_menu_color_scheme",
	"std" => "menu_light",
	"options" => array(
		"menu_light" => "Light menu",
		"menu_dark" => "Dark menu",
	),
	"desc" => "This option will change menu background if MainMenu located below header",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "MainMenu horizontal align",
	"id" => "header_menu_align",
	"std" => "menu_left",
	"options" => array(
		"menu_left" => "Left",
		"menu_center" => "Center",
	),
	"desc" => "This option will change menu align if MainMenu located below header",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Header Logo position",   
	"id" => "header_logo_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/header_logo_position_1.png',
			"label" => 'Left'
		),
		'center' => array(
			"image" => IPANEL_URI . 'option-images/header_logo_position_2.png',
			"label" => 'Center'
		),
	),
	"std" => "left",
	"desc" => "",
	"type" => "image",
);

$ipanel_magnium_option[] = array(
	"name" => "Search field position",   
	"id" => "search_position",
	"options" => array(
		'top' => array(
			"image" => IPANEL_URI . 'option-images/search_position_1.png',
			"label" => 'Top menu (expandable with button)'
		),
		'header' => array(
			"image" => IPANEL_URI . 'option-images/search_position_2.png',
			"label" => 'Header'
		),
		'none' => array(
			"image" => IPANEL_URI . 'option-images/search_position_3.png',
			"label" => 'Disable'
		),
	),
	"std" => "top",
	"desc" => "",
	"type" => "image",
);
$ipanel_magnium_option[] = array(
	"name" => "Search type",
	"id" => "search_type",
	"std" => "woo",
	"options" => array(
		"wp" => "WordPress Search",
		"woo" => "WooCommerce product search",
	),
	"desc" => "",
	"type" => "select",
);

$ipanel_magnium_option[] = array(
	"name" => "Show search by category selectbox in WooCommerce search field",
	"id" => "woocommerce_show_cat_search",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Search by category feature not available with search field in Top Menu",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Header info text",
	"id" => "header_info_2_editor",
	"std" => '<strong>Specials: Sign Up and Save 20%</strong>',
	"desc" => "Available only with 'Menu below header' menu layout type. Does not available with 'Centered logo' option. Displayed in header after search. ",
	"field_options" => array(
		'media_buttons' => false
	),
	"type" => "wp_editor",
);
$ipanel_magnium_option[] = array(
		"type" => "EndSection"
);
$ipanel_magnium_option[] = array(
	"name" => "Top menu settings",   
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_magnium_option[] = array(
	"name" => "Show WPML language switcher in top menu",
	"id" => "header_show_language_switcher",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "<a href='http://wpml.org/' target='_blank'>WPML Plugin</a> should be installed before enable this option",
	"type" => "checkbox",
);

$ipanel_magnium_option[] = array(
	"name" => "Show WPML currency switcher in top menu",
	"id" => "header_show_currency_switcher",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "<a href='https://wordpress.org/plugins/woocommerce-multilingual/' target='_blank'>WPML Multilingual</a> Plugin should be installed before enable this option",
	"type" => "checkbox",
);

$ipanel_magnium_option[] = array(
	"name" => "Top menu info text",
	"id" => "header_info_editor",
	"std" => 'Free shipping on all orders under $100',
	"desc" => "Displayed in top header after social icons",
	"field_options" => array(
		'media_buttons' => false
	),
	"type" => "wp_editor",
);
$ipanel_magnium_option[] = array(
		"type" => "EndSection"
);
$ipanel_magnium_option[] = array(
	
	"name" => "Social icons",   
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_magnium_option[] = array(
	"type" => "info",
	"name" => "Leave URL fields blank to hide this social icons",
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_magnium_option[] = array(
	"name" => "Facebook Page url",
	"id" => "facebook",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Vkontakte page url",
	"id" => "vk",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Twitter Page url",
	"id" => "twitter",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Google+ Page url",
	"id" => "google-plus",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "LinkedIn Page url",
	"id" => "linkedin",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Dribbble Page url",
	"id" => "dribbble",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Instagram Page url",
	"id" => "instagram",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Tumblr page url",
	"id" => "tumblr",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Pinterest page url",
	"id" => "pinterest",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Vimeo page url",
	"id" => "vimeo-square",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "YouTube page url",
	"id" => "youtube",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Skype url",
	"id" => "skype",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
		"type" => "EndSection"
);
$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);
/**
 * FOOTER TAB
 **/
$ipanel_magnium_tabs[] = array(
	'name' => 'Footer',
	'id' => 'footer_settings'
);

$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "footer_settings"
);
$ipanel_magnium_option[] = array(
	"name" => "Show 'Footer 4 column sidebar #1' only on homepage",
	"id" => "footer_sidebar_1_homepage_only",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	
	"name" => "Payment icons",   
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_magnium_option[] = array(
	
	"name" => "Show Footer Payment Icons",   
	"id" => "footer_payment_icons",
	"options" => array(
		"visa" => "Visa",
		"visaelectron" => "Visa Electron",
		"mc" => "MasterCard",
		"maestro" => "Maestro",
		"discover" => "Discover",
		"cirrus" => "Cirrus",
		"ae" => "AmericanExpress",
		"paypal" => "PayPal",
		"amazon" => "Amazon Payment",
		"applepay" => "Apple Pay",
		"bitcoin" => "Bitcoin",
		"webmoney" => "Webmoney",
		"qiwi" => "QIWI Wallet"
	),
	"std" => false,
	"desc" => "You can add different accepted payments icons to your footer.",
	"type" => "multicheckbox",
	"field_options" => array(
		
		"desc_in_tooltip" => false // If you wish the description be displayed in tooltip set this true.
		
	)
	
);
$ipanel_magnium_option[] = array(
	"type" => "info",
	"name" => "Need some specific payment method icon that does not listed here? <a href='http://magniumthemes.com/about/' target='_blank'>Let us know</a> and we will add it in next theme update.",
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_magnium_option[] = array(
		"type" => "EndSection"
);

$ipanel_magnium_option[] = array(
	"name" => "Footer copyright text",
	"id" => "footer_copyright_editor",
	"std" => "Powered by <a href='http://themeforest.net/user/dedalx/' target='_blank'>Magnium - Premium Wordpress Theme</a>",
	"desc" => "",
	"field_options" => array(
		'media_buttons' => false
	),
	"type" => "wp_editor",
);

$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);
/**
 * MEGAMENU TAB
 **/
$ipanel_magnium_tabs[] = array(
	'name' => 'MegaMenu',
	'id' => 'megamenu_settings'
);

$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "megamenu_settings"
);
$ipanel_magnium_option[] = array(
	"type" => "info",
	"name" => "You can manage your theme menus <a href='nav-menus.php'>here</a>.",
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_magnium_option[] = array(
	"name" => "Enable Mega Menu",
	"id" => "megamenu_enable",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Hide top categories menu on Homepage",
	"id" => "megamenu_hideon_homepage",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Use this if you use Left side mega main menu on homepage",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Number of megamenu sidebars",
	"id" => "megamenu_sidebars_count",
	"std" => "1",
	"desc" => "You can use megamenu sidebars to show widgets in your megamenus. Increase this option value to add more new sidebars.",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);
/**
 * SIDEBARS TAB
 **/
$ipanel_magnium_tabs[] = array(
	'name' => 'Sidebars',
	'id' => 'sidebar_settings'
);

$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "sidebar_settings"
);
$ipanel_magnium_option[] = array(
	"name" => "Pages sidebar position",   
	"id" => "page_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "disable",
	"desc" => "",
	"type" => "image",
);

$ipanel_magnium_option[] = array(
	"name" => "Blog page sidebar position",   
	"id" => "blog_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "disable",
	"desc" => "",
	"type" => "image",
);

$ipanel_magnium_option[] = array(
	"name" => "Blog Archive page sidebar position",   
	"id" => "archive_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "right",
	"desc" => "",
	"type" => "image",
);

$ipanel_magnium_option[] = array(
	"name" => "Blog Search page sidebar position",   
	"id" => "search_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "right",
	"desc" => "",
	"type" => "image",
);

$ipanel_magnium_option[] = array(
	"name" => "Blog post sidebar position",   
	"id" => "post_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "disable",
	"desc" => "",
	"type" => "image",
);

$ipanel_magnium_option[] = array(
	"name" => "Portfolio item page sidebar position",   
	"id" => "portfolio_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "disable",
	"desc" => "",
	"type" => "image",
);

$ipanel_magnium_option[] = array(
	"name" => "WooCommerce listing pages sidebar position",   
	"id" => "shop_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'offcanvas' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_4.png',
			"label" => 'Switcher with floating sidebar (Off-canvas display)'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "left",
	"desc" => "",
	"type" => "image",
);

$ipanel_magnium_option[] = array(
	"name" => "WooCommerce product page sidebar position",   
	"id" => "product_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "disable",
	"desc" => "",
	"type" => "image",
);

$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);
/**
 * BLOG TAB
 **/
$ipanel_magnium_tabs[] = array(
	'name' => 'Blog',
	'id' => 'blog_settings'
);
$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "blog_settings"
);
$ipanel_magnium_option[] = array(
	"name" => "Post excerpt length (words)",
	"id" => "post_excerpt_legth",
	"std" => "18",
	"desc" => "Used by WordPress for post shortening. Default: 18",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Show author info and avatar after single blog post",
	"id" => "blog_enable_author_info",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Show prev/next posts navigation links on single post page",
	"id" => "blog_post_navigation",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);

/**
 * PORTFOLIO TAB
 **/
$ipanel_magnium_tabs[] = array(
	'name' => 'Portfolio',
	'id' => 'portfolio_settings'
);
$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "portfolio_settings"
);
$ipanel_magnium_option[] = array(
	"name" => "Display portfolio item images slider prev/next navigation buttons",
	"id" => "portfolio_show_slider_navigation",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Display portfolio item images slider pagination buttons",
	"id" => "portfolio_show_slider_pagination",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Portfolio item images slider autoplay",
	"id" => "portfolio_slider_autoplay",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Show related works on portfolio items page",
	"id" => "portfolio_related_works",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "This will show works from the same categories",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Portfolio related items per row",
	"id" => "portfolio_element_width",
	"std" => "25",
	"options" => array(
		"3" => "3",
		"4" => "4",
		"5" => "5"
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Portfolio item page related works limit",
	"id" => "portfolio_related_limit",
	"std" => "8",
	"desc" => "Recommended values: 4, 8, 12, 16, etc",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Portfolio related items grid sort animation effect 1",
	"id" => "portfolio_posts_animation_1",
	"std" => "fade",
	"options" => array(
		"fade" => "Fade",
		"scale" => "Scale",
		"translateX" => "TranslateX",
		"translateY" => "TranslateY",
		"translateZ" => "TranslateZ",
		"rotateX" => "RotateX",
		"rotateY" => "RotateY",
		"rotateZ" => "RotateZ",
		"stagger" => "Stagger"
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Portfolio related items grid sort animation effect 2",
	"id" => "portfolio_posts_animation_2",
	"std" => "scale",
	"options" => array(
		"fade" => "Fade",
		"scale" => "Scale",
		"translateX" => "TranslateX",
		"translateY" => "TranslateY",
		"translateZ" => "TranslateZ",
		"rotateX" => "RotateX",
		"rotateY" => "RotateY",
		"rotateZ" => "RotateZ",
		"stagger" => "Stagger"
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Show prev/next portfolio items navigation on single portfolio item page",
	"id" => "portfolio_show_item_navigation",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);

$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);
/**
 * WOOCOMMERCE TAB
 **/
$ipanel_magnium_tabs[] = array(
	'name' => 'Woocommerce',
	'id' => 'shop_settings'
);
$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "shop_settings"
);
$ipanel_magnium_option[] = array(
	"name" => "Category page settings",   
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);

$ipanel_magnium_option[] = array(
	"name" => "Category page header layout",   
	"id" => "shop_category_layout",
	"options" => array(
		'0' => array(
			"image" => IPANEL_URI . 'option-images/shop_category_layout_1.png',
			"label" => 'Category title + Category image with description'
		),
		'1' => array(
			"image" => IPANEL_URI . 'option-images/shop_category_layout_2.png',
			"label" => 'Fullwidth Category image with description'
		)
	),
	"std" => "0",
	"desc" => "",
	"type" => "image",
);
$ipanel_magnium_option[] = array(
	"name" => "Use parallax effect for category image",
	"id" => "shop_category_layout_parallax",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "You need to upload large image for your categories images for better parallax results (1600x1000px or larger recommended)",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Products per page rows limit",
	"id" => "shop_woocommerce_products_per_page",
	"std" => "4",
	"desc" => "How many product rows will be displayed on shop/category page",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Products per row (columns count) in category pages",
	"id" => "shop_products_per_row",
	"std" => "4",
	"options" => array(
		"6" => "6",
		"5" => "5",
		"4" => "4",
		"3" => "3",
		"2" => "2"
	),
	"desc" => "How many product columns will be displayed on shop/category page",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Show second product image on mouse hover effect",
	"id" => "shop_secondimage_onhover",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Will show your second product image on product box hover on product listings",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Show product categories in product blocks",
	"id" => "shop_show_productbox_category",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Will show product categories list above product title in product box",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Show product stars rating in product blocks",
	"id" => "shop_show_productbox_rating",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Product categories dislay in product block limit",
	"id" => "shop_productbox_category_limit",
	"std" => "1",
	"desc" => "How many product categories will be displayed on product box. Default: 2",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
		"type" => "EndSection"
);
$ipanel_magnium_option[] = array(
	"name" => "Subcategory display settings",   
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_magnium_option[] = array(
	"name" => "Show products count in subcategories",
	"id" => "shop_subcategory_show_post_count",
	"std" => "0",
	"options" => array(
		"0" => "No",
		"1" => "Yes"
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Subcategory hover text",
	"id" => "shop_subcategory_cta_text",
	"std" => "Show products",
	"desc" => "This text will appear on mouse hover on subcategory",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Subcategories display type",
	"id" => "shop_subcategory_use_slider",
	"std" => "0",
	"options" => array(
		"0" => "Grid",
		"1" => "Slider"
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Show arrow navigation buttons for slider",
	"id" => "shop_subcategory_slider_navigation",
	"std" => "0",
	"options" => array(
		"0" => "No",
		"1" => "Yes"
	),
	"desc" => "Use this option if you selected 'Slider' display type for subcategories.",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Show pagination navigation buttons for slider",
	"id" => "shop_subcategory_slider_pagination",
	"std" => "0",
	"options" => array(
		"0" => "No",
		"1" => "Yes"
	),
	"desc" => "Use this option if you selected 'Slider' display type for subcategories.",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
		"type" => "EndSection"
);
$ipanel_magnium_option[] = array(
	"name" => "Product page display",   
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
/* ==== PRODUCT PAGE ========*/
$ipanel_magnium_option[] = array(
	"name" => "Product page header display",
	"id" => "shop_product_page_header_layout",
	"std" => "1",
	"options" => array(
		"1" => "WooCommerce shop page name + Breadcrumbs",
		"2" => "Product name title + Breadcrumbs",
		"3" => "Breadcrumbs only"
	),
	"desc" => "If you disabled breadcrumbs you will not see it. You can change your Shop page name in 'Pages > Your shop page' that you assigned as main Shop page in WooCommerce settings.",
	"type" => "select",
);

$ipanel_magnium_option[] = array(
	"name" => "Product page image layout",   
	"id" => "shop_product_thumbs_layout",
	"options" => array(
		'horizontal' => array(
			"image" => IPANEL_URI . 'option-images/shop_product_page_image_layout_1.png',
			"label" => 'Larger product photo, horizontal thumbs carousel'
		),
		'vertical' => array(
			"image" => IPANEL_URI . 'option-images/shop_product_page_image_layout_2.png',
			"label" => 'Normal product photo, vertical thumbs carousel'
		)
	),
	"std" => "horizontal",
	"desc" => "With horizontal thumbnails layout your main product image will be larger.",
	"type" => "image",
);

$ipanel_magnium_option[] = array(
	"name" => "Product page main product image size",   
	"id" => "shop_product_photo_size",
	"options" => array(
		'large' => array(
			"image" => IPANEL_URI . 'option-images/shop_product_photo_size_1.png',
			"label" => 'Large'
		),
		'regular' => array(
			"image" => IPANEL_URI . 'option-images/shop_product_photo_size_2.png',
			"label" => 'Regular'
		)
	),
	"std" => "large",
	"desc" => "",
	"type" => "image",
);

$ipanel_magnium_option[] = array(
	"name" => "Product page tabs layout",   
	"id" => "shop_product_page_tabs_layout",
	"options" => array(
		'1' => array(
			"image" => IPANEL_URI . 'option-images/shop_product_page_tabs_layout_1.png',
			"label" => 'Horizontal centered transparent tabs'
		),
		'2' => array(
			"image" => IPANEL_URI . 'option-images/shop_product_page_tabs_layout_2.png',
			"label" => 'Horizontal tabs'
		),
		'3' => array(
			"image" => IPANEL_URI . 'option-images/shop_product_page_tabs_layout_3.png',
			"label" => 'Horizontal tabs with fullwidth header'
		),
		'4' => array(
			"image" => IPANEL_URI . 'option-images/shop_product_page_tabs_layout_4.png',
			"label" => 'Vertical tabs'
		),
		'5' => array(
			"image" => IPANEL_URI . 'option-images/shop_product_page_tabs_layout_5.png',
			"label" => 'Vertical accordion inside product details'
		),
	),
	"std" => "1",
	"desc" => "If you selected Vertical accordion tabs display then product short description will be hided and reviews will be displayed below product data and tabs.",
	"type" => "image",
);
$ipanel_magnium_option[] = array(
	"name" => "Product reviews display",
	"id" => "shop_product_page_reviews_display",
	"std" => "1",
	"options" => array(
		"1" => "As tab",
		"2" => "Below tabs"
	),
	"desc" => "",
	"type" => "select",
);

$ipanel_magnium_option[] = array(
	"name" => "Product page right side promo block",   
	"id" => "shop_product_page_promo_block_display",
	"options" => array(
		'1' => array(
			"image" => IPANEL_URI . 'option-images/shop_product_page_promo_block_display_1.png',
			"label" => 'Enable promo block'
		),
		'0' => array(
			"image" => IPANEL_URI . 'option-images/shop_product_page_promo_block_display_2.png',
			"label" => 'Disable promo block'
		),
	),
	"std" => "0",
	"desc" => "You can show related, up-sells products and custom content in this block using options below",
	"type" => "image",
);
$ipanel_magnium_option[] = array(
	"name" => "Up-sells products display",
	"id" => "shop_product_page_upsells_display",
	"std" => "1",
	"options" => array(
		"1" => "Below product details",
		"2" => "Product page promo block",
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Related products display",
	"id" => "shop_product_page_related_display",
	"std" => "1",
	"options" => array(
		"1" => "Below product details",
		"2" => "Product page promo block",
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Related and Up-sells products display limit",
	"id" => "shop_products_related_limit",
	"std" => "4",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Promo block custom HTML content",
	"id" => "shop_product_page_promo_content",
	"std" => '[mgt_promo_block_wp parallax="0" animated="1" text_color="white" text_size="normal" button_style="solid" background_color="#4686cc" button_size="normal" button_text_size="normal" text_tranform="none"]<strong>Explore</strong>
<h2>Ready-To-Wear</h2>
<hr />
<a href="#"><em>Discover</em></a>[/mgt_promo_block_wp]',
	"desc" => "This content will be visible in right side product page promo block if you enabled it. You can use shortcodes here.",
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_magnium_option[] = array(
	"name" => "Product page product photos effect",
	"id" => "shop_product_photo_effect",
	"std" => "zoom",
	"options" => array(
		"zoom" => "Zoom on Hover",
		"lightbox" => "Lightbox on Click"
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Zoom type",
	"id" => "shop_product_zoom_type",
	"std" => "inside",
	"options" => array(
		"inside" => "Inside product photo (Inner)",
		"right" => "Outside product photo (Right)"
	),
	"desc" => "This option will work if you selected 'Zoom on Hover' effect for product page photos",
	"type" => "select",
);

$ipanel_magnium_option[] = array(
	"name" => "Product page thumbnails per row in horizontal gallery",
	"id" => "shop_product_thumbs_columns",
	"std" => "5",
	"options" => array(
		"6" => "6 (Small thumbs)",
		"5" => "5 (Normal thumbs)",
		"4" => "4 (Medium thumbs)",
		"3" => "3 (Large thumbs)"
	),
	"desc" => "If you changed this option don't forget to increase thumbnails image size in WooCommerce > Settings > Products and run Tools > Regenerate Thumbnails to avoid blurry images",
	"type" => "select",
);

$ipanel_magnium_option[] = array(
	"name" => "Show previous/next products navigation on product page",
	"id" => "shop_product_page_navigation",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Show social share buttons and counters on product pages",
	"id" => "shop_social_buttons_enable",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Enable product page custom tab display",
	"id" => "shop_product_custom_tab_enable",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Show additional tab on product page with your content specified below",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Product custom tab title",
	"id" => "shop_product_custom_tab_title",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "Product custom tab text",
	"id" => "shop_product_custom_tab_text",
	"std" => "",
	"desc" => "",
	"field_options" => array(
		'media_buttons' => false
	),
	"type" => "wp_editor",
);


/* ==== PRODUCT PAGE ========*/
$ipanel_magnium_option[] = array(
		"type" => "EndSection"
);
$ipanel_magnium_option[] = array(
	"name" => "Other settings",   
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_magnium_option[] = array(
	"name" => "Show breadcrumbs on WooCommerce pages",
	"id" => "shop_show_breadcrumbs",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);

$ipanel_magnium_option[] = array(
	"name" => "Disable dropdown cart on top",
	"id" => "shop_disable_cartbox",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "You will not see cart dropdown with total on site top menu",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Show Added to cart popup window",
	"id" => "shop_addedtocart_popup",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Enable Catalog mode (disable cart features)",
	"id" => "shop_catalog_mode_enable",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Enable if you want to disable cart/checkout features and use your site as product catalog",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Disable QuickView button in product boxes",
	"id" => "shop_hide_qv",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Disable WishList features",
	"id" => "shop_hide_wishlist",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
		"type" => "EndSection"
);
$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);

/**
 * FONTS TAB
 **/

$ipanel_magnium_tabs[] = array(
	'name' => 'Fonts',
	'id' => 'font_settings'
);

$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "font_settings"
);

$ipanel_magnium_option[] = array(
	"name" => "Headers font",
	"id" => "header_font",
	"desc" => "Font used in headers. Default: Raleway",
	"options" => array(
		"font-sizes" => array(
			" " => "Font Size",
			'11' => '11px',
			'12' => '12px',
			'13' => '13px',
			'14' => '14px',
			'15' => '15px',
			'16' => '16px',
			'17' => '17px',
			'18' => '18px',
			'19' => '19px',
			'20' => '20px',
			'21' => '21px',
			'22' => '22px',
			'23' => '23px',
			'24' => '24px',
			'25' => '25px',
			'26' => '26px',
			'27' => '27px',
			'28' => '28px',
			'29' => '29px',
			'30' => '30px',
			'31' => '31px',
			'32' => '32px',
			'33' => '33px',
			'34' => '34px',
			'35' => '35px',
			'36' => '36px',
			'37' => '37px',
			'38' => '38px',
			'39' => '39px',
			'40' => '40px',
			'41' => '41px',
			'42' => '42px',
			'43' => '43px',
			'44' => '44px',
			'45' => '45px',
			'46' => '46px',
			'47' => '47px',
			'48' => '48px',
			'49' => '49px',
			'50' => '50px'
		),
		"color" => false,
		"font-families" => iPanel::getGoogleFonts(),
		"font-styles" => false
	),
	"std" => array(
		"font-size" => '35',
		"font-family" => 'Raleway'
	),
	"type" => "typography"
);

$ipanel_magnium_option[] = array(
	"name" => "Body font",
	"id" => "body_font",
	"desc" => "Font used in text elements. Default: Raleway",
	"options" => array(
		"font-sizes" => array(
			" " => "Font Size",
			'11' => '11px',
			'12' => '12px',
			'13' => '13px',
			'14' => '14px',
			'15' => '15px',
			'16' => '16px',
			'17' => '17px',
			'18' => '18px',
			'19' => '19px',
			'20' => '20px',
			'21' => '21px',
			'22' => '22px',
			'23' => '23px',
			'24' => '24px',
			'25' => '25px',
			'26' => '26px',
			'27' => '27px'
		),
		"color" => false,
		"font-families" => iPanel::getGoogleFonts(),
		"font-styles" => false
	),
	"std" => array(
		"font-size" => '14',
		"font-family" => 'Raleway'
	),
	"type" => "typography"
);
$ipanel_magnium_option[] = array(
	"name" => "Enable cyrillic support for Header and Body Google Fonts",
	"id" => "font_cyrillic_enable",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Use this if you use Russian Language on your site. Please note that not all Google Fonts support cyrilic.",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Additional font",
	"id" => "additional_font",
	"desc" => "Font used some special decorated theme elements. Default: Herr Von Muellerhoff",
	"options" => array(
		"font-sizes" => array(
			" " => "Font Size",
			'11' => '11px',
			'12' => '12px',
			'13' => '13px',
			'14' => '14px',
			'15' => '15px',
			'16' => '16px',
			'17' => '17px',
			'18' => '18px',
			'19' => '19px',
			'20' => '20px',
			'21' => '21px',
			'22' => '22px',
			'23' => '23px',
			'24' => '24px',
			'25' => '25px',
			'26' => '26px',
			'27' => '27px',
			'28' => '28px',
			'29' => '29px',
			'30' => '30px',
			'31' => '31px',
			'32' => '32px',
			'33' => '33px',
			'34' => '34px',
			'35' => '35px',
			'36' => '36px',
			'37' => '37px',
			'38' => '38px',
			'39' => '39px',
			'40' => '40px',
			'41' => '41px',
			'42' => '42px',
			'43' => '43px',
			'44' => '44px',
			'45' => '45px',
			'46' => '46px',
			'47' => '47px',
			'48' => '48px',
			'49' => '49px',
			'50' => '50px'
		),
		"color" => false,
		"font-families" => iPanel::getGoogleFonts(),
		"font-styles" => false
	),
	"std" => array(
		"font-size" => '48',
		"font-family" => 'Herr+Von+Muellerhoff'
	),
	"type" => "typography"
);
$ipanel_magnium_option[] = array(
	"name" => "Enable Additional font",
	"id" => "additional_font_enable",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Uncheck if you don't want to use Additional font. This will speed up your site.",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Google Fonts API key",
	"id" => "font_api_key",
	"std" => "",
	"desc" => "Add your Google Fonts API key if you have problems with gettings Google Fonts list on this page. <br>Check this <a href='https://developers.google.com/fonts/docs/developer_api#Auth' target='_blank'>Google Documentation Guide</a> how to get your Google Fonts API key.",
	"type" => "text",
);
$ipanel_magnium_option[] = array(
	"name" => "<span style='color:red'>Disable ALL Google Fonts on site</span>",
	"id" => "font_google_disable",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Use this if you want extra site speed or want to have regular fonts. Arial font will be used with this option.",
	"type" => "checkbox",
);
$ipanel_magnium_option[] = array(
	"name" => "Regular font (apply if you disabled Google Fonts below)",
	"id" => "font_regular",
	"std" => "Arial",
	"options" => array(
		"Arial" => "Arial",
		"Tahoma" => "Tahoma",
		"Times New Roman" => "Times New Roman",
		"Verdana" => "Verdana",
		"Helvetica" => "Helvetica",
		"Georgia" => "Georgia",
		"Courier New" => "Courier New"
	),
	"desc" => "Use this option if you disabled ALL Google Fonts.",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);

/**
 * COLORS TAB
 **/

$ipanel_magnium_tabs[] = array(
	'name' => 'Colors & Skins',
	'id' => 'color_settings'
);

$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "color_settings",
);
$ipanel_magnium_option[] = array(
	"name" => "Predefined color skins",
	"id" => "color_skin_name",
	"std" => "none",
	"options" => array(
		"none" => "Use colors specified below",
		"default" => "Magnium (Default)",
		"black" => "Dark Black",
		"green" => "Green Grass",
		"blue" => "Cloudy blue",
		"red" => "Sakura",
		"blackandwhite" => "Greyscale",
		"orange" => "Orange Juice",
		"fencer" => "Fencer",
		"perfectum" => "Perfectum",
		"simplegreat" => "SimpleGreat"
	),
	"desc" => "Select one of predefined skins",
	"type" => "select",
);
$ipanel_magnium_option[] = array(
	"name" => "Body background color",
	"id" => "theme_body_color",
	"std" => "#ffffff",
	"desc" => "Used in many theme places, default: #ffffff",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Body text color",
	"id" => "theme_text_color",
	"std" => "#000000",
	"desc" => "Used in many theme places, default: #000000",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Theme links color",
	"id" => "theme_links_color",
	"std" => "#17477c",
	"desc" => "Default: #17477c",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Theme links hover color",
	"id" => "theme_links_hover_color",
	"std" => "#606060",
	"desc" => "Default: #606060",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Buttons color",
	"id" => "theme_main_color",
	"std" => "#4686cc",
	"desc" => "Used in some theme places, buttons color, tabs color, default: #4686cc",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Buttons alternative color",
	"id" => "theme_buttons_light_color",
	"std" => "#eeeeee",
	"desc" => "Used for alternative (light) buttons, default: #eeeeee",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Hover theme color (Buttons hover color)",
	"id" => "theme_hover_color",
	"std" => "#000000",
	"desc" => "Used in some theme places, buttons hover color, default: #000000",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Header menu background color",
	"id" => "theme_header_bg_color",
	"std" => "#4686CC",
	"desc" => "Default: #4686CC",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Header menu links/text color",
	"id" => "theme_header_link_color",
	"std" => "#ffffff",
	"desc" => "Default: #ffffff",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Header menu links hover color",
	"id" => "theme_header_link_hover_color",
	"std" => "#8ebef3",
	"desc" => "Default: #8ebef3",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Category menu background color",
	"id" => "theme_cat_menu_bg_color",
	"std" => "#EEEEEE",
	"desc" => "This background will be used for menu below header position. Default: #EEEEEE",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Category menu links color",
	"id" => "theme_cat_menu_link_color",
	"std" => "#000000",
	"desc" => "Default: #000000",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Category menu links hover color",
	"id" => "theme_cat_menu_link_hover_color",
	"std" => "#606060",
	"desc" => "Default: #606060",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Dark Category menu background color",
	"id" => "theme_cat_menu_dark_bg_color",
	"std" => "#262626",
	"desc" => "This background will be used for Dark menu below header position. Default: #262626",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Dark Category menu links color",
	"id" => "theme_cat_menu_dark_link_color",
	"std" => "#ffffff",
	"desc" => "Default: #ffffff",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Dark Category menu links hover color",
	"id" => "theme_cat_menu_dark_link_hover_color",
	"std" => "#c9c9c9",
	"desc" => "Default: #c9c9c9",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Category menu submenu background color",
	"id" => "theme_cat_submenu_1lvl_bg_color",
	"std" => "#ffffff",
	"desc" => "Default: #ffffff",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Category menu submenu link color",
	"id" => "theme_cat_submenu_1lvl_link_color",
	"std" => "#000000",
	"desc" => "Default: #000000",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Category menu submenu link hover color",
	"id" => "theme_cat_submenu_1lvl_link_hover_color",
	"std" => "#17477c",
	"desc" => "Default: #17477c",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Footer background color",
	"id" => "theme_footer_color",
	"std" => "#262626",
	"desc" => "Default: #262626",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Footer headers color",
	"id" => "theme_footer_header_color",
	"std" => "#c9c9c9",
	"desc" => "Default: #c9c9c9",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Footer links color",
	"id" => "theme_footer_link_color",
	"std" => "#ffffff",
	"desc" => "Default: #ffffff",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Footer text color",
	"id" => "theme_footer_text_color",
	"std" => "#A3A8A9",
	"desc" => "Default: #A3A8A9",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Pages title color",
	"id" => "theme_title_color",
	"std" => "#000000",
	"desc" => "Default: #000000",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Product page product name title color",
	"id" => "theme_product_title_color",
	"std" => "#17477c",
	"desc" => "Default: #17477c",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Widgets title color",
	"id" => "theme_widget_title_color",
	"std" => "#000000",
	"desc" => "Default: #000000",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Borders color",
	"id" => "theme_border_color",
	"std" => "#eeeeee",
	"desc" => "Default: #eeeeee",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Content background color",
	"id" => "theme_content_bg_color",
	"std" => "#ffffff",
	"desc" => "Used in many theme places for content areas, default: #ffffff",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Products Sale badge background color",
	"id" => "theme_salebadge_bg_color",
	"std" => "#4FBA9F",
	"desc" => "Default: #4FBA9F",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"name" => "Header search button color",
	"id" => "theme_header_search_button_color",
	"std" => "#1a5698",
	"desc" => "Default: #1a5698",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);

/**
 * CUSTOM CODE TAB
 **/

$ipanel_magnium_tabs[] = array(
	'name' => 'Custom code',
	'id' => 'custom_code'
);

$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "custom_code",
);

$ipanel_magnium_option[] = array(
	"name" => "Custom JavaScript code",
	"id" => "custom_js_code",
	"std" => '',
	"field_options" => array(
		"language" => "javascript",
		"line_numbers" => true,
		"autoCloseBrackets" => true,
		"autoCloseTags" => true
	),
	"desc" => "This code will run in header",
	"type" => "code",
);

$ipanel_magnium_option[] = array(
	"name" => "Custom CSS styles",
	"id" => "custom_css_code",
	"std" => '',
	"field_options" => array(
		"language" => "json",
		"line_numbers" => true,
		"autoCloseBrackets" => true,
		"autoCloseTags" => true
	),
	"desc" => "This CSS code will be included in header",
	"type" => "code",
);

$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);

/**
 * DOCUMENTATION TAB
 **/

$ipanel_magnium_tabs[] = array(
	'name' => 'Documentation',
	'id' => 'documentation'
);

$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "documentation"
);

function get_plugin_version_number($plugin_name) {
        // If get_plugins() isn't available, require it
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
        // Create the plugins folder and file variables
	$plugin_folder = get_plugins( '/' . $plugin_name );
	$plugin_file = $plugin_name.'.php';
	
	// If the plugin version number is set, return it 
	if ( isset( $plugin_folder[$plugin_file]['Version'] ) ) {
		return $plugin_folder[$plugin_file]['Version'];

	} else {
	// Otherwise return null
		return 'Plugin not installed';
	}
}

$ipanel_magnium_option[] = array(
	"type" => "htmlpage",
	"name" => '<div class="documentation-icon"><img src="'.IPANEL_URI . 'assets/img/documentation-icon.png" alt="Documentation"/></div><p>We recommend you to read <a href="http://cdn.magniumthemes.com/magnium-wp/Documentation/index.html" target="_blank">Theme Documentation</a> before you will start using our theme to building your website. It covers all steps for site configuration, demo content import, theme features usage and more.</p>
<p>If you have face any problems with our theme feel free to use our <a href="http://support.magniumthemes.com/" target="_blank">Support System</a> to contact us and get help for free.</p>
<a class="button button-primary" href="http://cdn.magniumthemes.com/magnium-wp/Documentation/index.html" target="_blank">Theme Documentation</a>
<a class="button button-primary" href="http://support.magniumthemes.com/" target="_blank">Support System</a><h3>Technical information (paste it to your support ticket):</h3><textarea style="width: 500px; height: 160px;font-size: 12px;">Theme Version: '.wp_get_theme()->get( 'Version' ).'
Theme Addons version: '.get_plugin_version_number('magnium-theme-addons').'
WordPress Version: '.get_bloginfo( 'version' ).'
WooCommerce Version: '.get_plugin_version_number('woocommerce').'
Visual Composer Version: '.get_plugin_version_number('js_composer').'
Admin Panel Access: '.get_admin_url().'
Admin Panel User login: [ADD_YOUR_LOGIN_HERE]
Admin Panel User password: [ADD_YOUR_PASSWORD_HERE]</textarea>'
);

$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);

/**
 * EXPORT TAB
 **/

$ipanel_magnium_tabs[] = array(
	'name' => 'Export',
	'id' => 'export_settings'
);

$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "export_settings"
);
	
$ipanel_magnium_option[] = array(
	"name" => "Export with Download Possibility",
	"type" => "export",
	"desc" => "Export theme admin panel settings to file."
);

$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);

/**
 * IMPORT TAB
 **/

$ipanel_magnium_tabs[] = array(
	'name' => 'Import',
	'id' => 'import_settings'
);

$ipanel_magnium_option[] = array(
	"type" => "StartTab",
	"id" => "import_settings"
);

$ipanel_magnium_option[] = array(
	"name" => "Import",
	"type" => "import",
	"desc" => "Select theme options import file or paste options string to import your settings from Export."
);

$ipanel_magnium_option[] = array(
	"type" => "EndTab"
);

/**
 * CONFIGURATION
 **/

$ipanel_configs = array(
	'ID'=> 'MAGNIUM_PANEL', 
	'menu'=> 
		array(
			'submenu' => false,
			'page_title' => __('Magnium Control Panel', 'magnium'),
			'menu_title' => __('Magnium Control Panel', 'magnium'),
			'capability' => 'manage_options',
			'menu_slug' => 'manage_theme_options',
			'icon_url' => IPANEL_URI . 'assets/img/panel-icon.png',
			'position' => 58
		),
	'rtl' => ( function_exists('is_rtl') && is_rtl() ),
	'tabs' => $ipanel_magnium_tabs,
	'fields' => $ipanel_magnium_option,
	'download_capability' => 'manage_options',
	'live_preview' => site_url()
);

$ipanel_theme_usage = new IPANEL( $ipanel_configs );
	