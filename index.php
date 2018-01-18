<?php
	/**
	 * The template for displaying pages.
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages and that
	 * other "pages" on your WordPress site will use a different template.
	 */
	get_header();
	while ( have_posts() ) {
		the_post();
?>
<!-- Post-header, pre-content -->
<?php the_content(); ?>
<!-- Post-content, pre-footer -->
<?php
	}
	get_footer();
?>