<?php

######
## Quick way to get non-standard "home_url()".
##

function protocol_includes_subdomain_home_url($extra = '/') {

	$result = home_url();
	
	$url_path = str_replace(home_url(), '', get_permalink());
	
	
	/* Return either the first subdirectory of this WordPress page.
	 * If on the index, then this probably returns nothing. */
	if ($parent_path = protocol_includes_parent_subdomain()) {
		$result .= '/' . $parent_path;
	}
	
	return $result . $extra;
}


function protocol_includes_parent_subdomain() {

	$url_path = str_replace(home_url(), '', get_permalink());
	
	/* Return either the first subdirectory of this WordPress page.
	 * If on the index, then this probably returns nothing. */
	if (preg_match('#^/([^/]+)/#', $url_path, $matches)) {
		if ($matches[1]) {
			return $matches[1];
		}
	}
	return '';
}
