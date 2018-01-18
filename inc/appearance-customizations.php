<?php

######
## This file controls all of the customizations which can be done for the site.
##

require_once('customized_get_custom_logo.php');

// https://developer.wordpress.org/themes/customize-api/customizer-objects/
function protocol_money_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'protocol_settings_general', array(
		'title' => __( 'Protocol Settings &ndash; General' ),
		'description' => __( 'These are easily-customizable properties of each site.' ),
		'panel' => '', // Not typically needed.
		'priority' => 60, // arbitrary number
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
	) );



	//////
	// Theme Color
	//
	
	// Setting must be defined before control.
	// https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	$wp_customize->add_setting( 'site_color', array(
	  'default' => '#ff0000', // something obnoxious
	  'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	// Control cannot be defined until setting.
	$wp_customize->add_control( 'site_color', array(
		'label' => __( 'Site Color' ),
		'type' => 'text',
		'section' => 'protocol_settings_general',
		'description' => '<b>Usage:</b><br /> class="protocol_money_text_color", class="protocol_money_border_color", class="protocol_money_background_color"',
	) );

	// Setting must be defined before control.
	$wp_customize->add_setting( 'site_alt_color', array(
	  'default' => '#ffaa00', // something obnoxious
	  'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	// Control cannot be defined until setting.
	$wp_customize->add_control( 'site_alt_color', array(
		'label' => __( 'Site Alt Color' ),
		'type' => 'text',
		'section' => 'protocol_settings_general',
		'description' => '<b>Usage:</b><br /> class="protocol_money_text_alt_color", class="protocol_money_border_alt_color", class="protocol_money_background_alt_color"',
	) );




	//////
	// Company Name
	//
	
	// Setting must be defined before control.
	$wp_customize->add_setting( 'company_name', array(
		'default' => 'Your Company\'s Name Here',
	) );
	
	// Control cannot be defined until setting.
	$wp_customize->add_control( 'company_name', array(
		'label' => __( 'Company\'s Name' ),
		'type' => 'text',
		'section' => 'protocol_settings_general',
		'description' => '<b>Usage:</b> [theme_company_name]',
	) );



	//////
	// Address
	//
	
	// Setting must be defined before control.
	$wp_customize->add_setting( 'address', array(
		// the address of the Seattle Space Needle
		'default' => '400 Broad Street, Seattle WA 98109',
	) );
	
	// Control cannot be defined until setting.
	$wp_customize->add_control( 'address', array(
		'label' => __( 'Address' ),
		'type' => 'text',
		'section' => 'protocol_settings_general',
		'description' => '<b>Usage:</b> [theme_address]',
	) );



	//////
	// Phone Number
	//
	
	// Setting must be defined before control.
	$wp_customize->add_setting( 'phone_number', array(
		'default' => '425-555-5555',
	) );
	
	// Control cannot be defined until setting.
	$wp_customize->add_control( 'phone_number', array(
		'label' => __( 'Phone Number' ),
		'type' => 'text',
		'section' => 'protocol_settings_general',
		'description' => '<b>Usage:</b> [theme_phone_number]',
	) );
	
	

	//////
	// Redirection
	//
	
	// Setting must be defined before control.
	$wp_customize->add_setting( 'redirection', array(
		'default' => 'https://goprotocol.com',
	) );
	
	// Control cannot be defined until setting.
	$wp_customize->add_control( 'redirection', array(
		'label' => __( 'Redirection' ),
		'type' => 'text',
		'section' => 'protocol_settings_general',
		'description' => '<b>Usage:</b> used by pages with the "Redirection" template',
	) );
	
	

	$wp_customize->add_section( 'protocol_settings_cityscape', array(
		'title' => __( 'Protocol Settings &ndash; Cityscape' ),
		'description' => __( 'These are easily-customizable properties of each site.' ),
		'panel' => '', // Not typically needed.
		'priority' => 61, // arbitrary number
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
	) );



	// Setting must be defined before control.
	$wp_customize->add_setting( 'cityscape_desktop', array(
	) );
	
	// https://developer.wordpress.org/themes/customize-api/customizer-objects/
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'cityscape_desktop', array(
		'label' => __( 'Background for Desktops (1920x400)' ),
		'section' => 'protocol_settings_cityscape',
		'mime_type' => 'image',
		'description' => 'The background image for browser widths greater than 1280px.',
	) ) );
	
	// Setting must be defined before control.
	$wp_customize->add_setting( 'cityscape_tablet', array(
	) );
	
	// https://developer.wordpress.org/themes/customize-api/customizer-objects/
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'cityscape_tablet', array(
		'label' => __( 'Background for Tablets (1280x400)' ),
		'section' => 'protocol_settings_cityscape',
		'mime_type' => 'image',
		'description' => 'The background image for browser widths between 769px and 1280px.',
	) ) );
	
	// Setting must be defined before control.
	$wp_customize->add_setting( 'cityscape_mobile', array(
	) );
	
	// https://developer.wordpress.org/themes/customize-api/customizer-objects/
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'cityscape_mobile', array(
		'label' => __( 'Background for Mobile (768x240)' ),
		'section' => 'protocol_settings_cityscape',
		'mime_type' => 'image',
		'description' => 'The background image for browser widths 768px and less.',
	) ) );	
	
	// Setting must be defined before control.
	$wp_customize->add_setting( 'cityscape_mobile', array(
	) );
	
	// https://developer.wordpress.org/themes/customize-api/customizer-objects/
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'cityscape_mobile', array(
		'label' => __( 'Background for Mobile (768x240)' ),
		'section' => 'protocol_settings_cityscape',
		'mime_type' => 'image',
		'description' => 'The background image for browser widths 768px and less.',
	) ) );	
	
}
add_action( 'customize_register', 'protocol_money_customize_register' );