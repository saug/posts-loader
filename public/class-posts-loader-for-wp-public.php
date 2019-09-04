<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://saugatshakya.com.np
 * @since      1.0.0
 *
 * @package    Posts_Loader_For_Wp
 * @subpackage Posts_Loader_For_Wp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Posts_Loader_For_Wp
 * @subpackage Posts_Loader_For_Wp/public
 * @author     Saugat Shakya <saugat2010@gmail.com>
 */
class Posts_Loader_For_Wp_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Posts_Loader_For_Wp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Posts_Loader_For_Wp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/posts-loader-for-wp-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Posts_Loader_For_Wp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Posts_Loader_For_Wp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/posts-loader-for-wp-public.js', array( 'jquery' ), $this->version, false );
		 $args = array();

		 if( is_archive() || ( is_home() && !is_front_page() ) || is_tax()){
			 global $wp_query;
			 $args['ajax_url'] = admin_url( 'admin-ajax.php' );
			 $args['query_args'] = json_encode( $wp_query->query_vars );
			 $args['current_page'] = get_query_var('paged') ? get_query_var('paged') : 1;
			 $args['max_page'] = $wp_query->max_num_pages;
		 }

		 wp_localize_script( $this->plugin_name, 'localizedArgs', $args );

		 wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/posts-loader-for-wp-public.js', array( 'jquery' ), $this->version, true );

	}

}
