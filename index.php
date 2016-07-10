<?php // Index is used as archive-, category-, tag- and home-template.

get_header();

	echo '<header class="">';
		get_template_part('partials/globals/global-archiveheader');
	echo '</header>';

	if ( have_posts() ) {
		echo '<ul class="js-salvattore l-container" data-columns>';
			while ( have_posts() ) {
				the_post();
				if(is_post_type('post')){
					hentry_item($post->ID);
				} elseif(is_post_type('singlar')) {
					hentry_item($post->ID);
				} else {
					hentry_item($post->ID);
				}
			}
		echo '</ul>';
	}
	next_posts_link();

get_footer();