<?php

$post_object_1 = get_sub_field('acf_section_twocol_postobj_one');
$post_object_2 = get_sub_field('acf_section_twocol_postobj_two');

if(get_sub_field('acf_section_twocol_title') && ($post_object_1 || $post_object_2)){
	echo '<h2>'.get_sub_field('acf_section_twocol_title').'</h2>';
} else {
	return;
}

echo '<ul class="js-salvattore" data-columns>';
	if($post_object_1){
		$post = $post_object_1;
		setup_postdata($post);
		hentry_item($post->ID);
		wp_reset_postdata();
	}

	if($post_object_2){
		$post = $post_object_2;
		setup_postdata($post);
		hentry_item($post->ID);
		wp_reset_postdata();
	}
echo '</ul>';