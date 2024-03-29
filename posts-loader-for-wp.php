<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://saugatshakya.com.np
 * @since             1.0.0
 * @package           Posts_Loader_For_Wp
 *
 * @wordpress-plugin
 * Plugin Name:       Posts Loader
 * Plugin URI:        https://saugatshakya.com.np
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Saugat Shakya
 * Author URI:        https://saugatshakya.com.np
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       posts-loader-for-wp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'POSTS_LOADER_FOR_WP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-posts-loader-for-wp-activator.php
 */
function activate_posts_loader_for_wp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-posts-loader-for-wp-activator.php';
	Posts_Loader_For_Wp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-posts-loader-for-wp-deactivator.php
 */
function deactivate_posts_loader_for_wp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-posts-loader-for-wp-deactivator.php';
	Posts_Loader_For_Wp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_posts_loader_for_wp' );
register_deactivation_hook( __FILE__, 'deactivate_posts_loader_for_wp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-posts-loader-for-wp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_posts_loader_for_wp() {

	$plugin = new Posts_Loader_For_Wp();
	$plugin->run();

}
run_posts_loader_for_wp();
