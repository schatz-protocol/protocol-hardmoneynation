<?php
	/* Template Name: Redirect to Another Site */
	
	$redirect = get_theme_mod('redirection', 'https://goprotocol.com');
	
	if ( ! is_preview() && ! is_customize_preview() && ! is_user_logged_in() ) {
		// This "template" simply redirects the user to another page or site.
		// Absolutely lightest way to do so.
		wp_redirect($redirect);
		exit;
	}

	// This template has no unique styles or JavaScript.

	// ---- Page Creation ---- //
	
	get_header();
	while ( have_posts() ) {
		the_post();
?>
			<div class="the_content">
				<h3>Visitors are redirected to <?=$redirect?></h3>
				<?php the_content(); ?>
				<?php wp_list_pages(); ?>
			</div>
<?php
	}
	get_footer();