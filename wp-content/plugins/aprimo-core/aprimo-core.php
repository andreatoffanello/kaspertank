<?php
/**
 * Plugin Name: Aprimo Core
 * Plugin URI: https://themeforest.net/user/CreativeGigs/portfolio
 * Description: This plugin adds the core features to the Aprimo WordPRess theme. You must have to install this plugin to work with this theme.
 * Version: 1.4
 * Author: CreativeGigs
 * Author URI: http://CreativeGigs.net
 * Text domain: aprimo-core
 */

if ( !defined('ABSPATH') )
    die('-1');


/**
 * Defining plugin constants
 */
define('FASTER_CORE_FILE', plugin_dir_path(__FILE__));
define('FASTER_CORE_DIR', plugins_url());



/**
 * Register the plugin text domain
 *
 * @return void
 */
add_action( 'plugins_loaded', function() {
    load_plugin_textdomain( 'aprimo-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
} );


// Require the Shortcode main funcion File
require plugin_dir_path(__FILE__) . '/shortcodes/shortcodes.php';
require plugin_dir_path(__FILE__) . '/inc/vc_config.php';


// Custom Functions
require plugin_dir_path(__FILE__) . '/inc/extra.php';