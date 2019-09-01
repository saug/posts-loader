<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://saugatshakya.com.np
 * @since      1.0.0
 *
 * @package    Posts_Loader_For_Wp
 * @subpackage Posts_Loader_For_Wp/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Posts_Loader_For_Wp
 * @subpackage Posts_Loader_For_Wp/includes
 * @author     Saugat Shakya <saugat2010@gmail.com>
 */
class Posts_Loader_For_Wp_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'posts-loader-for-wp',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
