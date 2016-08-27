<?php

$post_object_1 = get_sub_field('acf_section_twocol_postobj_one');
$post_object_2 = get_sub_field('acf_section_twocol_postobj_two');

if(get_sub_field('acf_section_twocol_title') && ($post_object_1 || $post_object_2)){
	echo '<section class="o-section">';
	echo '<h2 class="a-section-title a-title-M">'.get_sub_field('acf_section_twocol_title').'</h2>';
} else {
	return;
}

echo '<div class="js-salvattore l-container js-layout-2" data-columns>';
	if($post_object_1){
		$post = $post_object_1;
		setup_postdata($post);
		hentry_item($post->ID, true, '2');
		wp_reset_postdata();
	}

	if($post_object_2){
		$post = $post_object_2;
		setup_postdata($post);
		hentry_item($post->ID, true, '2');
		wp_reset_postdata();
	}
echo '</div>';

if(get_sub_field('acf_section_twocol_sectionlink-url')){
	echo '<p class="l-gutter a-fineprint a-section-archivelink"><a href="'.esc_url(get_sub_field('acf_section_twocol_sectionlink-url')).'">'.(get_sub_field('acf_section_twocol_sectionlink-text') ? get_sub_field('acf_section_twocol_sectionlink-text') : 'Visa alla').'</a></p>';
}

echo '</section>';