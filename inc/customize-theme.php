<?php

// https://developer.wordpress.org/themes/customize-api/customizer-objects/
function protocol_loans_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'protocol_settings', array(
		'title' => __( 'Protocol Settings' ),
		'description' => __( 'These are easily-customizable settings of each site.' ),
		'panel' => '', // Not typically needed.
		'priority' => 60, // arbitrary number
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
	) );
	
	
	
	//////
	// Phone Number
	//
	
	$wp_customize->add_setting( 'phone_number', array(
		'default' => '425-867-5309',
	) );
	
	$wp_customize->add_control( 'phone_number', array(
		'label' => __( 'Phone Number' ),
		'type' => 'text',
		'section' => 'protocol_settings',
	) );
	
	
	
	//////
	// Your Name
	//
	
	$wp_customize->add_setting( 'your_name', array(
		'default' => 'Your Name',
	) );
	
	$wp_customize->add_control( 'your_name', array(
		'label' => __( 'Your Name' ),
		'type' => 'text',
		'section' => 'protocol_settings',
	) );
	
	
	
	//////
	// Your NMLS ID
	//
	
	$wp_customize->add_setting( 'nmls_id', array(
		'default' => '123456',
	) );
	
	$wp_customize->add_control( 'nmls_id', array(
		'label' => __( 'Your NMLS#' ),
		'type' => 'text',
		'section' => 'protocol_settings',
		'description' => 'This theme assumes you have an NMLS ID. If you don\'t have one, then the site will appear incomplete.',
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
		'section' => 'protocol_settings',
	) );
	
	
	
	//////
	// Site Color
	//
	
	$wp_customize->add_setting( 'site_color', array(
	  'default' => '#ff0000', // something obnoxious
	) );
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'site_color',
			array(
				'label' => __( 'Site Accent Color' ),
				'section' => 'protocol_settings',
			)
		)
	);
	
	
	
	//////
	// Main Page Redirect
	//
	
	// Setting must be defined before control.
	$wp_customize->add_setting( 'main_page_redirect', array(
		'default' => '',
	) );
	
	// Control cannot be defined until setting.
	$wp_customize->add_control( 'main_page_redirect', array(
		'label' => __( 'Main Page Redirect' ),
		'description' => __( 'If someone tries to visit the root of this website, where should they be redirected to?' ),
		'type' => 'text',
		'section' => 'protocol_settings',
	) );
	
/*
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 
			'link_color', 
			array(
				'label'      => __( 'Header Color', 'mytheme' ),
				'section'    => 'your_section_id',
				'settings'   => 'your_setting_id',
			)
		) 
	);

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
		'section' => 'protocol_settings',
	) );
	
	
	
	// Setting must be defined before control.
	$wp_customize->add_setting( 'address', array(
		// the address of the Seattle Space Needle
		'default' => '400 Broad Street, Seattle WA 98109',
	) );
	
	// Control cannot be defined until setting.
	$wp_customize->add_control( 'address', array(
		'label' => __( 'Address' ),
		'type' => 'text',
		'section' => 'protocol_settings',
	) );
	
	
	
	
	
	
	
	
	// Setting must be defined before control.
	$wp_customize->add_setting( 'your_picture', array(
	) );
	
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'your_picture', array(
		'label' => __( 'Your Photo' ),
		'section' => 'protocol_settings',
	) ) );
	*/
/*
	// https://developer.wordpress.org/themes/customize-api/customizer-objects/
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'your_picture', array(
		'label' => __( 'Your Picture' ),
		'section' => 'protocol_settings',
		'mime_type' => 'image',
	) ) );
*/	
}
add_action( 'customize_register', 'protocol_loans_customize_register' );
