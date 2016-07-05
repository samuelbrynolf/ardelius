<?php /* Template Name: Sida med sektioner */
get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part('partials/start/start-hero');
	}
}

// ---

if( function_exists('get_field') && have_rows('acf_sectionbuilder')){
	while (have_rows('acf_sectionbuilder')){
		the_row();

		if(get_sub_field('acf_section_post-type_slug')){
			$cpt_slug = get_sub_field('acf_section_post-type_slug');

			if(get_sub_field('acf_section_post-type_count') && is_numeric(get_sub_field('acf_section_post-type_count'))){
				$cpt_count = get_sub_field('acf_section_post-type_count');
			} else {
				$cpt_count = 12;
			}

			if(get_sub_field('acf_section_post-type_layout')){
				$col_count = get_sub_field('acf_section_post-type_layout');
			} else {
				$col_count = 4;
			}

			$sectional_loop_cpt = array(
				'post_type' => $cpt_slug,
				'posts_per_page' => $cpt_count,
				'post_status' => 'publish'
			);

			$sectional_loop_order = array(
				'orderby' => 'menu_order',
				'order'   => 'ASC',
			);

			if($cpt_slug == 'post'){
				$sectional_loop_args = $sectional_loop_cpt;
			} else {
				$sectional_loop_args = array_merge($sectional_loop_cpt, $sectional_loop_order);
			}

			$sectional_loop = new WP_Query($sectional_loop_args);

			if ($sectional_loop->have_posts()) {
				if(get_sub_field('acf_section_cpt-loop_title')){
					echo '<h2>'.get_sub_field('acf_section_cpt-loop_title').'</h2>';
				}

				while ($sectional_loop->have_posts()) {
					$sectional_loop->the_post();
					echo '<a href="'.get_the_permalink().'" title="Länk till '.get_the_title().'">';
						if(function_exists('makeitSrcset') && has_post_thumbnail()) {
							makeitSrcset(get_post_thumbnail_id($post->ID));
						}
						the_title('<h3 class="">', '</h3>');
						if(get_field('acf_cpt_meta')){
							echo '<p>'.get_field('acf_cpt_meta').'</p>';
						}
					echo '</a>';
				}
				wp_reset_postdata();
			}
		} // End if slug exists

		// ---

		if(get_sub_field('acf_section_twocol_title')){
			echo '<h2>'.get_sub_field('acf_section_twocol_title').'</h2>';
		}

		$post_object_1 = get_sub_field('acf_section_twocol_postobj_one');
		if($post_object_1){
			$post = $post_object_1;
			setup_postdata($post);
			echo '<a href="'.get_the_permalink().'" title="Länk till '.get_the_title().'">';
				if(function_exists('makeitSrcset') && has_post_thumbnail()) {
					makeitSrcset(get_post_thumbnail_id($post->ID));
				}
				the_title('<h3 class="">', '</h3>');
				if(get_field('acf_cpt_meta')){
					echo '<p>'.get_field('acf_cpt_meta').'</p>';
				}
			echo '</a>';
			wp_reset_postdata();
		}

		$post_object_2 = get_sub_field('acf_section_twocol_postobj_two');
		if($post_object_2){
			$post = $post_object_2;
			setup_postdata($post);
			echo '<a href="'.get_the_permalink().'" title="Länk till '.get_the_title().'">';
				if(function_exists('makeitSrcset') && has_post_thumbnail()) {
					makeitSrcset(get_post_thumbnail_id($post->ID));
				}
				the_title('<h3 class="">', '</h3>');
				if(get_field('acf_cpt_meta')){
					echo '<p>'.get_field('acf_cpt_meta').'</p>';
				}
			echo '</a>';
			wp_reset_postdata();
		}
	}
}

get_footer();