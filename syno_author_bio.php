<?php
/**
 * Plugin Name:		  Syno Author Bio
 * Plugin URI:        https://wordpress.org
 * Description:		  This is a simple plugin to show author bio to WordPress post.
 * Version:           0.1
 * Requires at least: 5
 * Requires PHP:      7
 * Author:            Ashraf Uddin
 * Author URI:        https://www.fiverr.com/wpashrafpeal
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:		  syno-author-bio
 * Domain Path:       /languages
 */

//If this file is called directly, abort.
if (!defined('ABSPATH')){
	die('You are looking at wrong place, dude!');
}


/**
 * To allow internacionalization for the errors strings the text domain is
 * loaded in a 5.2 way, no Fatal Errors, only a message to the user.
 * @return null;
 */
function syno_author_bio_bootstraping(){
	load_plugin_textdomain( 'syno-author-bio', false, plugin_dir_path(__FILE__) . '/languages' );
}
add_action( 'plugins_loaded', 'syno_author_bio_bootstraping' );

/**
 * Version compare to PHP 7.0,
 *
 * For now 3.8 or bigger is needed for the admin interface, later on the
 * intention is to bring this number lower
 */

if ( version_compare( PHP_VERSION, '7.0', '<' ) ) {
	if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if ( ! is_plugin_active( plugin_basename( __FILE__ ) ) ) {
			wp_print_styles( 'open-sans' );
			echo "<style>body{margin: 0 2px;font-family: 'Open Sans',sans-serif;font-size: 13px;line-height: 1.5em;}</style>";
			echo wp_kses_post( __( '<b>Syno Author Bio</b> requires PHP 7.0 or higher, and the plugin has now disabled itself.', 'syno-author-bio' ) ) .
				'<br />' .
				esc_attr__( 'To allow better control over dates, advanced security improvements and performance gain.', 'syno-author-bio' ) .
				'<br />' .
				esc_attr__( 'Contact your Hosting or your system administrator and ask for this Upgrade to version 7.0 of PHP.', 'syno-author-bio' );
			exit();
		}

		deactivate_plugins( __FILE__ );
	}
} else {
	require_once plugin_dir_path( __FILE__ ) . 'inc/load.php';
}

/**
 * To enque css files
 * @return null;
 */

function syno_author_bio_load_css(){
	wp_enqueue_style('syno-author-bio-font-awesome', plugins_url( 'assets/css/fontawesome.min.css', __FILE__ ));
	wp_enqueue_style('syno-author-bio-style-css', plugins_url( 'assets/css/style.css', __FILE__ ));
}
add_action( 'wp_enqueue_scripts', 'syno_author_bio_load_css' );