<?php if(function_exists('makeitSrcset') && function_exists('get_field') && get_field('acf_hero_img')){
		makeitSrcset(get_field( 'acf_hero_img'));
	if(get_field('acf_hero_title')){
		echo '<p>'.get_field('acf_hero_title').'</p>';
	}
	if(get_field('acf_hero_subtitle')){
		echo '<p>'.get_field('acf_hero_subtitle').'</p>';
	}
	if(get_field('acf_hero_url')){
		echo '<p>'.get_field('acf_hero_url').'</p>';
	}
}