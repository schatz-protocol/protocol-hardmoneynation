<?php

// Create a single FAQ item, behaving like WP-Florida's FAQ page.
function protocol_florida_faq_item( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'question' => '',
		),
		$atts
	);
	
	return '
<span class="acc-trigger"><a href="#">'.$atts['question'].'</a></span>
<div class="acc-container" style="display: none">
	<div class="content">
		'.do_shortcode($content).'
	</div>
</div>
';
	}

add_shortcode( 'florida_faq_item', 'protocol_florida_faq_item' );