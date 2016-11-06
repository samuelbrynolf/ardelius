<?php $hentry_type      = get_sub_field('acf_section_content-picker');
$query_typ_taxterm      = get_sub_field('acf_section_textbild-taxterm');
$query_bildtyp_taxterm  = get_sub_field('acf_section_bild-taxterm');
$query_tag              = get_sub_field('acf_section_tag');
$section_title          = get_sub_field('acf_section_title');
$sectional_loop_sectionlink = null;
$section_link_text      = get_sub_field('acf_section_cta-text');

if($hentry_type){

	if(get_sub_field('acf_section_hentry-count') && is_numeric(get_sub_field('acf_section_hentry-count'))){
		$hentry_count = get_sub_field('acf_section_hentry-count');
	} else {
		$hentry_count = get_option('posts_per_page');
	}

	if(get_sub_field('acf_section_layout')){
		$col_count = get_sub_field('acf_section_layout');
	} else {
		$col_count = 4;
	}

	$sectional_loop_news = array(
		'post_type' => 'post'
	);

	$sectional_loop_typ_tax = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'typ',
				'field'    => 'id',
				'terms'    => $query_typ_taxterm
			),
		),
	);

// TODO remove?
//	$sectional_loop_typ_tax = array(
//		'tax_query' => array(
//			array(
//				'taxonomy' => 'typ',
//				'field'    => 'id',
//				'terms'    => $query_typ_taxterm
//			),
//		),
//	);

	$sectional_loop_bildtyp_tax = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'bildtyp',
				'field'    => 'id',
				'terms'    => $query_bildtyp_taxterm
			),
		),
	);

	$sectional_loop_tag = array(
		'post_type' => array( 'post', 'text-bild', 'bilder'),
		'tag_id' => $query_tag
	);

	$sectional_loop_order = array(
		'posts_per_page' => $hentry_count,
		'orderby' => 'menu_order',
		'order'   => 'ASC',
		'post_status' => 'publish'
	);

	$sectional_loop_args = null;

	if($hentry_type == '1') {
		$sectional_loop_args = array_merge($sectional_loop_news, $sectional_loop_order);
		$sectional_loop_sectionlink = get_page_link(get_option('page_for_posts', true));
	}

	if($hentry_type == '2' && $query_typ_taxterm){
		$sectional_loop_args = array_merge($sectional_loop_typ_tax, $sectional_loop_order);
		$sectional_loop_sectionlink = get_term_link($query_typ_taxterm);
	}

	if($hentry_type == '3' && $query_bildtyp_taxterm){
		$sectional_loop_args = array_merge($sectional_loop_bildtyp_tax, $sectional_loop_order);
		$sectional_loop_sectionlink = get_term_link($query_bildtyp_taxterm);
	}

	if($hentry_type == '4' && $query_tag){
		$sectional_loop_args = array_merge($sectional_loop_tag, $sectional_loop_order);
		$sectional_loop_sectionlink = get_tag_link($query_tag);
	}

	$sectional_loop = new WP_Query($sectional_loop_args);

	if ($sectional_loop->have_posts()) {
		echo '<section class="o-section'.($section_title ? '' : ' has_no_sectiontitle').'">';
			if($section_title){
				echo '<h2 class="l-gutter a-section-title a-title-M">'.$section_title.'</h2>';
			}

			echo '<div class="l-container js-layout-'.$col_count.'" data-columns>';
				while ($sectional_loop->have_posts()) {
					$sectional_loop->the_post();

					if( 'bilder' == get_post_type()){
						$meta_descr = false;
						$lightbox = true;
					} else {
						$meta_descr = true;
						$lightbox = false;
					}

					hentry_item($post->ID, $meta_descr, $col_count, $lightbox);
				}
				wp_reset_postdata();
			echo '</div>';

			if($section_link_text){
				section_archive_link($sectional_loop_sectionlink, $section_link_text);
			}
		echo '</section>';
	}
} // End if slug exists