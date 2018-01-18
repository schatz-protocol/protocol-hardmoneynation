<?php

	######
	## Tell the WordPress WYSIWYG editor to stop trying to be helpful. It's not.
	## https://codex.wordpress.org/TinyMCE
	## http://redrokk.com/2010/08/16/removing-p-tags-in-wordpress/
	
	remove_filter('the_content', 'wpautop');
