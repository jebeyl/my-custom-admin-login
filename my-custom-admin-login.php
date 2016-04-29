<?php
/**
 * Plugin Name: My Custom Admin Login
 * Description: Create custom admin login page
 * Version: 1.0.0
 * Author: Spiros Kosmas
 * License: GPL2
 */
 
function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . plugin_dir_url( __FILE__ ) . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');


function my_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
	return 'Medusa Marketing - Διαφημιστική Ιωάννινα';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );




function custom_wp_redirect_admin_locations() {
    global $wp_rewrite;
    if ( ! ( is_404() && $wp_rewrite->using_permalinks() ) )
        return;

    $admins = array(
        home_url( 'wp-admin', 'relative' ),
        home_url( 'dashboard', 'relative' ),
        home_url( 'admin', 'relative' ),
        site_url( 'dashboard', 'relative' ),
        site_url( 'admin', 'relative' ),
    );
    if ( in_array( untrailingslashit( $_SERVER['REQUEST_URI'] ), $admins ) ) {
        wp_redirect( admin_url() );
        exit;
    }

    $logins = array(
        home_url( 'wp-login.php', 'relative' )
    );
    if ( in_array( untrailingslashit( $_SERVER['REQUEST_URI'] ), $logins ) ) {
        wp_redirect( site_url( 'wp-login.php', 'login' ) );
        exit;
    }
}

function remove_default_login_redirect() {
    remove_action('template_redirect', 'wp_redirect_admin_locations', 1000);
    add_action( 'template_redirect', 'custom_wp_redirect_admin_locations', 1000 );
}

add_action('init','remove_default_login_redirect');