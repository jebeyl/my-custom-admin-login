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


