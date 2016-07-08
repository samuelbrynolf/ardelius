<?php // Hentry Items, passed arguments are makeitSrcset configuration

function hentry_item($postID){
	echo '<a href="'.get_the_permalink().'" title="Länk till '.get_the_title().'">';
		if(function_exists('makeitSrcset') && has_post_thumbnail()) {
			makeitSrcset(get_post_thumbnail_id($postID));
		}
		the_title('<h3 class="">', '</h3>');
		if(function_exists('get_field') && get_field('acf_cpt_meta')){
			echo '<p>'.get_field('acf_cpt_meta').'</p>';
		}
	echo '</a>';
}