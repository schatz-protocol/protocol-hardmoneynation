<?php
	/* Template Name: Thank You page */

	// This template page doesn't need much.
	add_action( 'wp_enqueue_scripts', 'protocol_money_enqueue_scripts' );
	function protocol_money_enqueue_scripts() {
		wp_enqueue_style( 'page-specific-css', get_template_directory_uri() . '/css/template/thank-you.css', array(), false, 'all' );
	}

	// ---- Page Creation ---- //
	
	get_header();
	while ( have_posts() ) {
		the_post();

?>
			<div class="pseudo-step">
				<h2 class="header-of-box">Thank You!</h2>
				<div class="thank-you-image"><img src="<?=get_template_directory_uri()?>/images/icons-content/thank-you.png" /></div>
				<div class="the_content"><?php the_content(); ?></div>
			</div>
<?php
	}
	
	get_footer();