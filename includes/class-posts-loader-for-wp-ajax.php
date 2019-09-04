<?php

class Ajax_Posts_Loader_For_Wp {
	public function __construct() {
		add_action( 'wp_ajax_load_more_posts', array( $this, 'load_more_posts' ) );
		add_action( 'wp_ajax_nopriv_load_more_posts', array( $this, 'load_more_posts' ) );
	}

	public function load_more_posts() {
		$query_args    = filter_input( INPUT_POST, 'query_args', FILTER_DEFAULT );
		$args          = json_decode( stripslashes( $query_args ), true );
		$max_page      = filter_input( INPUT_POST, 'max_page', FILTER_DEFAULT );
		$paged         = filter_input( INPUT_POST, 'current_page', FILTER_DEFAULT );
		$args['paged'] = $paged + 1;
		$args['post_status'] = 'publish';

		query_posts( $args );

		ob_start();
		if( have_posts() ) :
			// run the loop
			while( have_posts() ): the_post();
				// the_title();
				// look into your theme code how the posts are inserted, but you can use your own HTML of course
				// do you remember? - my example is adapted for Twenty Seventeen theme
				get_template_part( 'content', 'single' );
				// for the test purposes comment the line above and uncomment the below one
				// the_title();
			endwhile;
		endif;

		wp_send_json_success(array('response'=>ob_get_content()));
		die; // here we exit the script and even no wp_reset_query() required!
	}


}

new Ajax_Posts_Loader_For_Wp();
