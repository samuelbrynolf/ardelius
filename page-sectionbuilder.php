<?php /* Template Name: Sida med sektioner */
get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		if(function_exists('makeitSrcset') && get_field('acf_hero_img')){
			makeitSrcset(get_field( 'acf_hero_img'));
			if(get_field('acf_hero_title')){
				echo '<p>'.the_field('acf_hero_title').'</p>';
			}
			if(get_field('acf_hero_subtitle')){
				echo '<p>'.the_field('acf_hero_subtitle').'</p>';
			}
			if(get_field('acf_hero_url')){
				echo '<p>'.the_field('acf_hero_url').'</p>';
			}
		}
	}
}

get_footer();
