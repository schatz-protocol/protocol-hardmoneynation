<?php
/**
 * The template for displaying the header.
 * @version 2016.08.18
 */
 
 	$banner_section = '';
	// If we're using the default page template...
	if (get_page_template_slug() === 'template-parts/template-learn-more.php') {
	
		$banner_header_text = get_post_meta(get_the_ID(), 'banner_header_text', 'single');
		
		if (!$banner_header_text) {
			// Some default text.
			$banner_header_text = theme_company_name() . ' Loans';
		}
		
		$banner_section = '
		<div class="section banner">
			<div class="container">
				<h2>'.$banner_header_text.'</h2>
			</div>
		</div>';
	}
	
	//////
	// Figure out whether a "Site Icon"/"Favicon" was assigned.
	//   If not, then add an obnoxious red question mark.
	$site_icon_html = wp_site_icon();
	if ( ! $site_icon_html ) {
		$site_icon_missing_url = get_stylesheet_directory_uri() . '/images/missing/favicon.png';
		$site_icon_html = sprintf('<link rel="icon" href="%s" sizes="32x32" />', $site_icon_missing_url);
	}
	
	//////
	// Figure out whether a custom logo has been provided.
	//   If not, then show an obnoxious red alert message.
	// We can't use get_custom_logo() because we have
	//   custom "home_url".
	//
	$site_logo_html = get_theme_mod( 'custom_logo' );
	
	if ( ! $site_logo_html ) {
		$site_logo_missing_url = get_stylesheet_directory_uri() . '/images/missing/logo.png';
		$site_logo_html = sprintf('<link rel="icon" href="%s" sizes="32x32" />', $site_logo_missing_url);
	}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<base href="<?=site_url()?>/" />
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?=theme_company_name()?> | <?=theme_page_title()?></title>
		<?php wp_head(); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= wp_site_icon() ?>
		<!--<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/missing/favicon.png" />-->
	</head>
	<body>
		<div class="section top-rail">
			<div class="container clearfix">
				<div class="logo">
					<?= protocol_includes_get_custom_logo(); ?>
				</div>
				<div class="contact">
					<a class="phone" href="tel:<?=theme_phone_number()?>"><?=theme_phone_number()?></a>
					<span class="or"> or </span>
					<span class="button-container"><a class="button protocol_money_background_alt_color" href="<?=protocol_includes_subdomain_home_url('/learn-more/')?>">LEARN MORE</a></span>
				</div>
			</div>
		</div>
		<?=$banner_section?>
		<div class="section main">