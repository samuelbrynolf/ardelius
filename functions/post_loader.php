<?php if(!function_exists('postloader_eventhook_setup')){
	function postloader_eventhook_setup() {
		global $wp_query;
		$load_stop = $wp_query->max_num_pages;
		$queried_object = get_queried_object();
		$queried_is_hierarchical = $queried_object->hierarchical;
		$queried_name = $queried_object->name;
		$offset = get_option('posts_per_page');

		if($queried_is_hierarchical){
			$queried_is_hierarchical = '1';
		} else {
			$queried_is_hierarchical = '0';
		}

		if(empty($queried_name)){
			return 'class="a-btn"';
		} else {
			return 'id="js-postloader_trigger" class="a-btn" data-queried_hierarchical="'.$queried_is_hierarchical.'" data-queried_name="'.$queried_name.'" data-offset="'.$offset.'" data-loadingText="Laddar fler..." data-load_stop="'.$load_stop.'"';
		}
	}
	add_filter('next_posts_link_attributes', 'postloader_eventhook_setup');
}



// -----------------------------



if(!function_exists( 'postloader_loop' )){
	function postloader_loop($query_is_hierarchial, $query_name, $offset) {

		$posts_per_page = get_option('posts_per_page');

		if ( $query_is_hierarchial ) {
			$args_custom = array(
				'post_type' => $query_name,
				'orderby'   => 'menu_order',
				'order'     => 'ASC',
			);
		} else {
			$args_custom = array(
				'tag' => $query_name
			);
		}

		$args_general = array(
			'offset'         => $offset,
			'posts_per_page' => $posts_per_page,
			'post_status'    => 'publish'
		);

		$postloader_args = array_merge( $args_custom, $args_general );

		$postloader = new WP_Query( $postloader_args );

		if ($postloader->have_posts()) {
			while ( $postloader->have_posts() ) {
				$postloader->the_post();
				global $post;
				hentry_item( $post->ID, true, 2, false );
			}
		}
		wp_reset_postdata();
	}
}



// -----------------------------



if(!function_exists( 'postloader_setup' )){
	function postloader_setup() {
		$query_is_hierarchial = $_POST['query_is_hierarchial'];
		$query_name = $_POST['query_name'];
		$offset = $_POST['offset'];

		$content = postloader_loop($query_is_hierarchial, $query_name, $offset);
		die($content);
	}
	add_action('wp_ajax_nopriv_postloader_setup', 'postloader_setup');
	add_action('wp_ajax_postloader_setup', 'postloader_setup');
}