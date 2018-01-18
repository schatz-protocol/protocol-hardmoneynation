<?php

//////
// WordPress' built-in Customize Logo UI
// https://developer.wordpress.org/themes/functionality/custom-logo/
add_theme_support( 'custom-logo' );

//////
// A snippet of code for allowing us to upload a title image for
//   this website.
//
// Change the $defaults['height'] value based on your needs.
//
// See Also:
//   https://developer.wordpress.org/themes/functionality/custom-logo/
//
// https://developer.wordpress.org/themes/functionality/custom-logo/
function protocol_includes_after_setup_theme() {
	// TODO: check if the commented-out items are necessary.
	// TODO: add a default site-title text block, if no logo chosen.

	// Flex-width is necessary, otherwise, WordPress
	//   will for you to crop.
    $defaults = array(
        'height'      => 50,
        //'width'       => 400,
        'flex-height' => false,
        'flex-width'  => true,
        //'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'protocol_includes_after_setup_theme' );
