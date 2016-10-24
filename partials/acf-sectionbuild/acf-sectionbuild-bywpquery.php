<?php $post_slug = get_sub_field('acf_section_post-type_slug');
$query_tag = get_sub_field('acf_section_tag');
$query_cat = get_sub_field('acf_section_cat');

if($post_slug){

	if(get_sub_field('acf_section_post-type_count') && is_numeric(get_sub_field('acf_section_post-type_count'))){
		$cpt_count = get_sub_field('acf_section_post-type_count');
	} else {
		$cpt_count = get_option('posts_per_page');
	}

	if(get_sub_field('acf_section_post-type_layout')){
		$col_count = get_sub_field('acf_section_post-type_layout');
	} else {
		$col_count = 4;
	}

	// TODO setup tax queries instead

	$sectional_loop_tag = array(
		'tag' => $query_tag
	);

	$sectional_loop_cat = array(
		'cat' => $query_cat
	);

	$sectional_loop_cpt = array(
		'post_type' => $post_slug
	);

	$sectional_loop_order = array(
		'posts_per_page' => $cpt_count,
		'orderby' => 'menu_order',
		'order'   => 'ASC',
		'post_status' => 'publish'
	);

	if($query_tag){
		$sectional_loop_args = array_merge($sectional_loop_tag, $sectional_loop_order);
		$sectional_loop_sectionlink = get_tag_link($query_tag);
	} elseif($query_cat){
		$sectional_loop_args = array_merge($sectional_loop_cat, $sectional_loop_order);
		$sectional_loop_sectionlink = get_category_link($query_cat);
	} else {
		$sectional_loop_args = array_merge($sectional_loop_cpt, $sectional_loop_order);
		$sectional_loop_sectionlink = get_post_type_archive_link($post_slug);
	}

	$sectional_loop = new WP_Query($sectional_loop_args);

	if( $post_slug == 'category'){
		$meta_descr = true;
		$lightbox = false;
	} else {
		$meta_descr = false;
		$lightbox = true;
	}

	if ($sectional_loop->have_posts()) {
		echo '<section class="o-section">';
			if(get_sub_field('acf_section_cpt-loop_title')){
				echo '<h2 class="l-gutter a-section-title a-title-M">'.get_sub_field('acf_section_cpt-loop_title').'</h2>';
			}

			echo '<div class="l-container js-layout-'.$col_count.'" data-columns>';
				while ($sectional_loop->have_posts()) {
					$sectional_loop->the_post();
					hentry_item($post->ID, $meta_descr, $col_count, $lightbox);
				}
				wp_reset_postdata();
			echo '</div>';

			section_archive_link($sectional_loop_sectionlink, get_sub_field('acf_section_cta-text'));
		echo '</section>';
	}
} // End if slug exists