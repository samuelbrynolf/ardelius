<?php

$post_object_1 = get_sub_field('acf_section_twocol_postobj_one');
$post_object_2 = get_sub_field('acf_section_twocol_postobj_two');

if(!$post_object_1 || !$post_object_2){
	return;
}

echo '<section class="o-section">';

	if(get_sub_field('acf_section_twocol_title')){
		echo '<h2 class="l-gutter a-section-title a-title-M">'.get_sub_field('acf_section_twocol_title').'</h2>';
	}

	echo '<div class="l-container js-layout-2" data-columns>';
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

	if(get_sub_field( 'acf_section_twocol_cta-text' )) {
		section_archive_link( get_sub_field( 'acf_section_twocol_cta-url' ), get_sub_field( 'acf_section_twocol_cta-text' ) );
	}

echo '</section>';