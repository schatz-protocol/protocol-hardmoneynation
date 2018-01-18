<?php

require_once('inc/appearance-customizations.php');
require_once('inc/customize-shortcodes.php');
require_once('inc/no-wpautop.php');
require_once('florida/shortcodes.php');


add_action( 'wp_enqueue_scripts', 'protocol_money_scripts' );
function protocol_money_scripts() {

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	// The theme needs to explicitly enqueue jQuery.
	// Otherwise, bad stuff happens.
	wp_enqueue_script('jquery');

	// Normalize. (As per WordPress's twentysixteen theme.)
	wp_enqueue_style( 'normalize',   get_template_directory_uri() . '/css/normalize.css' );
	
	// These contain CSS tricks from other sources.
	wp_enqueue_style( 'third-party', get_template_directory_uri() . '/css/third-party.css' );

	// The Florida-WP-style accordion.
	wp_enqueue_script('florida-accordion', get_template_directory_uri() . '/florida/script.js', 'jquery');
	wp_enqueue_style( 'florida-accordion', get_template_directory_uri() . '/florida/style.css' );

	// Breakpoints.
	$deps = array();
	$ver = false;
	wp_enqueue_style( 'rwd-360px'   , get_template_directory_uri() . '/css/rwd/360px.css'   , $deps, $ver, 'all' );
	wp_enqueue_style( 'rwd-768px'   , get_template_directory_uri() . '/css/rwd/768px.css'   , $deps, $ver, 'all and (min-width: 769px)' );
	wp_enqueue_style( 'rwd-1280px'  , get_template_directory_uri() . '/css/rwd/1280px.css'  , $deps, $ver, 'all and (min-width: 1281px)' );
}

// We specify a high prirotiy Google Fonts, because this file is large.
//   We want to start loading it as soon as possible.
add_action( 'wp_enqueue_scripts', 'protocol_money_add_google_fonts', $high_prirotiy = 1 );
function protocol_money_add_google_fonts() {
	$src = 'https://fonts.googleapis.com/css?family=Roboto:100,300,400|Roboto%20Condensed:300,400';
	wp_enqueue_style( 'protocol-money-google-fonts', $src ); 
}


function _protocol_money_get_image_src($name, $default) {

	// Default URL if no image chosen.
	$url = get_template_directory_uri() . '/images/missing/' . $default;

	$id = get_theme_mod($name, '');
	if ($id) {
		$data = wp_get_attachment_image_src($id, $size='full');
		$url = $data[0];
	}
	
	return $url;
}

//////
// This is where CSS is generated, based on settings from Appearance -> Customize.
// https://codex.wordpress.org/Theme_Customization_API
function protocol_money_customize_css() {

	$site_color     = get_theme_mod('site_color',     '#ff0000');
	$site_alt_color = get_theme_mod('site_alt_color', '#ffaa00');
	$site_icon_url  = get_site_icon_url( 32 );
	$cityscape_mobile_url  = _protocol_money_get_image_src('cityscape_mobile',  'cityscape-360px.png');
	$cityscape_tablet_url  = _protocol_money_get_image_src('cityscape_tablet',  'cityscape-768px.png');
	$cityscape_desktop_url = _protocol_money_get_image_src('cityscape_desktop', 'cityscape-1280px.png');
	
?>
	<!-- Generated via functions.php -->
	<!-- Editable via Appearance -> Customize -->
	<style type="text/css">
		/* !important because if any part of the theme requests
		 *   Protocol Money's theme color, we give it to them.
		 *   No matter what. */
		.protocol_money_text_color       { color:            <?=$site_color?> !important; }
		.protocol_money_border_color     { border-color:     <?=$site_color?> !important; }
		.protocol_money_background_color { background-color: <?=$site_color?> !important; }
		
		.protocol_money_text_alt_color       { color:            <?=$site_alt_color?> !important; }
		.protocol_money_border_alt_color     { border-color:     <?=$site_alt_color?> !important; }
		.protocol_money_background_alt_color { background-color: <?=$site_alt_color?> !important; }
		
		
		.section.main { background-image: url(<?=$cityscape_mobile_url?>); }
		@media screen and (min-width: 769px) {
			.section.main { background-image: url(<?=$cityscape_tablet_url?>); }
		}
		@media screen and (min-width: 1280px) {
			.section.main { background-image: url(<?=$cityscape_desktop_url?>); }
		}
		
		div.awesome_hr:before { background-image: url("<?=$site_icon_url?>"); }
	</style>
<?php
} // protocol_money_customize_css
add_action( 'wp_head', 'protocol_money_customize_css');



function protocol_money_register_menu() {
  register_nav_menu('footer-links',__( 'Footer Links' ));
}
add_action( 'init', 'protocol_money_register_menu' );





function theme_page_title() {

	// We can't use the page titles directly, because they all have parenthesis.
	//   e.g. "Home (Bridge)". We need to remove the text in parenthesis
	//   before printing the page's title.
	$private_title = the_title('','',false);
	$public_title = preg_replace('/\s*\(.*\)\s*/', '', $private_title);
	
	return $public_title;
}
