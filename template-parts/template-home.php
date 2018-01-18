<?php
	/* Template Name: Home page */

	// This template has some unique styles and JavaScript.
	add_action( 'wp_enqueue_scripts', 'protocol_money_enqueue_scripts' );
	function protocol_money_enqueue_scripts() {
	
		wp_enqueue_style( 'page-specific-css', get_template_directory_uri() . '/css/template/home.css', $deps, $ver, 'all' );

		wp_enqueue_style( 'carousel', get_template_directory_uri() . '/carousel/style.css', array(), false, 'all' );
		
		// We alert the developer only when we attempt to build the form.
		$form_id = get_post_meta(get_the_ID(), 'form_id', 'single');
		if ($form_id) {
			wp_enqueue_script( 'multistep-form-core',     get_template_directory_uri() . '/forms/js/core.js' );
			wp_enqueue_script( 'multistep-form-specific', get_template_directory_uri() . '/forms/js/form-'.$form_id.'.js' );
		}
	}

	// ---- Page Creation ---- //
	
	get_header();
	while ( have_posts() ) {
		the_post();
?>
			<div class="the_content"><?php the_content(); ?></div>
<?php
	}

	// If this particular page doesn't have "form_id" set yet, then complain (again).
	$form_id = get_post_meta(get_the_ID(), 'form_id', 'single');
	if ($form_id) {
		print do_shortcode('[protocol_carousel_open]');
		require_once(get_stylesheet_directory() . '/forms/php/pseudo-form-core.php');
		require_once(get_stylesheet_directory() . '/forms/php/pseudo-form-'.$form_id.'.php');
		print do_shortcode('[protocol_carousel_close]');
	} else {
		print '<p style="color: #ffaa00; font-size: 400%">Must specifiy a form for this page to display.</p>';
	}
	
	get_footer();