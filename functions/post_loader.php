<?php if(!function_exists('postloader_eventhook_setup')){

	function postloader_eventhook_setup() {

		global $wp_query;
		$load_stop = $wp_query->max_num_pages;
		$offset = get_option('posts_per_page');
		$query_var_type = null;
		$query_var_tax = 0;
		$query_var_name = null;

		if(is_tax()){
			$query_var_type = 'taxonomy';
			$query_var_tax = get_query_var('taxonomy');
			$query_var_name = get_query_var('term');
		} elseif(is_post_type_archive()){
			$query_var_type = 'post_type';
			$query_var_name = get_query_var('post_type');
		} elseif(is_tag()){
			$query_var_type = 'tag';
			$query_var_name = get_query_var('tag');
		} else {
			$query_var_type = 'post';
		}

		if(is_null($query_var_type)){
			return 'class="a-btn"';
		} else {
			return 'id="js-postloader_trigger" class="a-btn" data-query-var-type="'.$query_var_type.'" data-query-var-tax="'.$query_var_tax.'" data-query-var-name="'.$query_var_name.'" data-offset="'.$offset.'" data-loadingText="Laddar fler..." data-load_stop="'.$load_stop.'"';
		}
	}
	add_filter('next_posts_link_attributes', 'postloader_eventhook_setup');
}



// -----------------------------



if(!function_exists( 'postloader_loop' )){
	function postloader_loop($query_var_type, $query_var_tax, $query_var_name, $layout_cols, $offset) {

		$posts_per_page = get_option('posts_per_page');

		// MAN KAN DELA POST TYPE ARGS ju, inte två loopar för post och post_type

		if ( 'taxonomy' == $query_var_type ){

			$args_custom = array(
				'tax_query' => array(
					array(
						'taxonomy' => $query_var_tax,
						'field'    => 'slug',
						'terms'    => $query_var_name
					),
				),

				'posts_per_page' => $posts_per_page,
				'orderby'   => 'menu_order',
				'order'     => 'ASC',
			);

		} elseif ( 'tag' == $query_var_type ){

			$args_custom = array(
				'post_type' => array( 'post', 'text-bild', 'bilder'),
				'tag' => $query_var_name,
				'posts_per_page' => $posts_per_page,
			);

		} elseif ( 'post_type' == $query_var_type ){

			$args_custom = array(
				'post_type' => $query_var_name,
				'posts_per_page' => $posts_per_page,
				'orderby'   => 'menu_order',
				'order'     => 'ASC'
			);

		} elseif( 'post' == $query_var_type ){

			$args_custom = array(
				'post_type' => $query_var_name,
				'posts_per_page' => $posts_per_page
			);

		} else {
			return;
		}

		$args_general = array(
			'offset'         => $offset,
			'post_status'    => 'publish'
		);

		$postloader_args = array_merge( $args_custom, $args_general );

		$postloader = new WP_Query( $postloader_args );

		if ($postloader->have_posts()) {
			while ( $postloader->have_posts() ) {
				$postloader->the_post();
				global $post;

				$meta_descr = true;
				$lightbox = false;

				if('bilder' == get_post_type()) {
					$meta_descr = false;
					$lightbox = true;
				}

				hentry_item( $post->ID, $meta_descr, $layout_cols, $lightbox); // TODO PASS COL PARAM VIA data- that is triggered from parent
			}
		}
		wp_reset_postdata();
	}
}



// -----------------------------



if(!function_exists( 'postloader_setup' )){
	function postloader_setup() {
		$query_var_type = $_POST['query_var_type'];
		$query_var_tax = $_POST['query_var_tax'];
		$query_var_name = $_POST['query_var_name'];
		$layout_cols = $_POST['layout_cols'];
		$offset = $_POST['offset'];

		$content = postloader_loop($query_var_type, $query_var_tax, $query_var_name, $layout_cols, $offset);
		die($content);
	}
	add_action('wp_ajax_nopriv_postloader_setup', 'postloader_setup');
	add_action('wp_ajax_postloader_setup', 'postloader_setup');
}