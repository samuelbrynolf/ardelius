<?php if(!function_exists('makeitSrcset') || !function_exists('get_field') || !get_field('acf_hero_img')){
	return;
}

if(get_field('acf_hero_url')){
	echo '<a class="m-hero" href="'.get_field('acf_hero_url').'">';
}

	if(function_exists('makeitSrcset') && function_exists('get_field') && get_field('acf_hero_img')){
			makeitSrcset(get_field( 'acf_hero_img'));
		if(get_field('acf_hero_title')){
			echo '<p class="a-overlay-title">'.get_field('acf_hero_title').'</p>';
		}
	}

if(get_field('acf_hero_url')){
	echo '</a>';
}