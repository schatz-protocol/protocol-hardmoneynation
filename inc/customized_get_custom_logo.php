<?php

require_once('custom-home_url.php');
require_once('customize-logo.php');

// https://developer.wordpress.org/reference/functions/get_custom_logo/
// PULLED THIS STRAIGHT FROM WORDPRESS CORE.
function protocol_includes_get_custom_logo( $blog_id = 0 ) {
    $html = '';
    $switched_blog = false;
 
    if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() ) {
        switch_to_blog( $blog_id );
        $switched_blog = true;
    }
 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
 
    // We have a logo. Logo is go.
    if ( $custom_logo_id ) {
        $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url( protocol_includes_subdomain_home_url('/') ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
                'itemprop' => 'logo',
            ) )
        );
    }
 
    // If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
    elseif ( is_customize_preview() ) {
        $html = sprintf( '<a href="%1$s" class="custom-logo-link" style="display:none;"><img class="custom-logo"/></a>',
            esc_url( protocol_includes_subdomain_home_url('/') )
        );
    }
 
    if ( $switched_blog ) {
        restore_current_blog();
    }
 
    /**
     * Filters the custom logo output.
     *
     * @since 4.5.0
     * @since 4.6.0 Added the `$blog_id` parameter.
     *
     * @param string $html    Custom logo HTML output.
     * @param int    $blog_id ID of the blog to get the custom logo for.
     */
    return apply_filters( 'get_custom_logo', $html, $blog_id );
}
