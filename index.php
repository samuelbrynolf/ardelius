<?php // Index is used as archive-, category-, tag- and home-template.

get_header();

	echo '<article class="o-section is-standalone">';
		get_template_part('partials/globals/global-archiveheader');

		if (have_posts()) {

			if(is_home() || is_post_type_archive('reportage')){
				$meta_descr = true;
				$col_count = 1;
			} elseif(is_post_type_archive('portratt')) {
				$meta_descr = false;
				$col_count = 2;
			} else {
				$meta_descr = false;
				$col_count = 3;
			}

			echo '<ul class="js-salvattore l-container js-layout-'.$col_count.'" data-columns>';
				while ( have_posts() ) {
					the_post();
					hentry_item($post->ID, $meta_descr);
				}
			echo '</ul>';
		}
		next_posts_link();
	echo '</article>';

get_footer();