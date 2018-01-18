<?php

function theme_company_name() {
	return get_theme_mod('company_name', 'Your Company\'s Name Here');
}

function theme_company_name_shortcode() {
	return theme_company_name();
}
add_shortcode( 'theme_company_name', 'theme_company_name_shortcode' );

function theme_address() {
	return get_theme_mod('address', '400 Broad Street, Seattle WA 98109');
}

function theme_address_shortcode() {
	return theme_address();
}
add_shortcode( 'theme_address', 'theme_address_shortcode' );

function theme_phone_number() {
	return get_theme_mod('phone_number', '425-555-5555');
}

function theme_phone_number_shortcode() {
	return theme_phone_number();
}
add_shortcode( 'theme_phone_number', 'theme_phone_number_shortcode' );

/*


function theme_your_name() {
	return get_theme_mod('your_name', 'Your Name Here');
}

function theme_your_name_shortcode() {
	return theme_your_name();
}
add_shortcode( 'theme_your_name', 'theme_your_name_shortcode' );



function theme_nmls_id() {
	return get_theme_mod('nmls_id', '123456');
}

function theme_your_nmls_shortcode() {
	return theme_nmls_id();
}
add_shortcode( 'theme_nmls_id', 'theme_nmls_id_shortcode' );











function theme_your_picture() {
	return get_theme_mod('your_picture', 'asdf?');
}

function theme_your_picture_shortcode() {
	return theme_your_picture();
}
add_shortcode( 'theme_your_picture', 'theme_your_picture_shortcode' );





function pseudoFlorida_blockquote( $atts, $content ) {
	$atts = shortcode_atts(
		array(
			'author' => 'anonymous',
			'stars' => 0,
		),
		$atts
	);
	
	$star_chart_html = '<span class="stars">%s</span>';
	$star_text = '';
	if ($atts['stars'] >= 1) {
		$empty = 5;
		for ($i=0; $i<$atts['stars']; $i++) {
			$star_text .= '&#9733;';
			$empty--;
		}
		for ($i=0; $i<$empty; $i++) {
			$star_text .= '&#9734;';
		}
		$star_chart_html = sprintf($star_chart_html, $star_text);
	} else {
		// Give me a use-case where someone WANTS to post a zero-star
		//   review, and I'll give you a use-case that isn't worth
		//   your time pursuing.
		$star_chart_html = '';
	}
	
	return sprintf('<blockquote class="pseudoFlorida"><p>
						%s %s<br>
						<small>%s</small>
					</p></blockquote>
	', $content, $star_chart_html, $atts['author']);
}
add_shortcode( 'theme_blockquote', 'pseudoFlorida_blockquote' );


function theme_stars_shortcode( $atts, $content ) {

	$atts = shortcode_atts(
		array(
			'value' => 4,
			'height' => 20,
		),
		$atts
	);
	
	return sprintf('<img src="%s/images/rating/stars-%d-%d.png" style="height: %dpx" alt="%d/5 Stars"/>',
		get_template_directory_uri(), $atts['value'], $atts['height'], $atts['height'], $atts['value']
	);
}
add_shortcode( 'theme_stars', 'theme_stars_shortcode' );





function theme_mini_badge_shortcode( $atts, $content ) {

	$atts = shortcode_atts(
		array(
			'icon' => 'undefined',
			'extra_class' => '',
		),
		$atts
	);
	
	return sprintf(
		'<div class="mini-badge-wrapper"><div class="mini-badge" style="background-image: url(%s/images/badges-mini/%s.png)"><div>%s</div></div></div>',
		get_template_directory_uri(), $atts['icon'], $content
	);
	
}
add_shortcode( 'theme_mini_badge', 'theme_mini_badge_shortcode' );

// Even though it looks fancy, all it does is naively delete the "space character"
//   between each shortcode, so there will be no space characters between inline-block
//   elements.
function theme_mini_badge_holder_shortcode( $atts, $content ) {

	$content = trim($content);
	$content = preg_replace('/\]\s+\[/', '][', $content);
	$content = '<div class="mini-badge-holder">' . do_shortcode($content) . '</div>';
	return $content;
	
}
add_shortcode( 'theme_mini_badge_holder', 'theme_mini_badge_holder_shortcode' );
*/