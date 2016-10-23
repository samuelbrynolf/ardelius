<?php // Index is used as archive-, category-, tag- and home-template.

get_header();

	echo '<article class="o-section is-standalone">'; // TODO Get a workng solution for 404s
		get_template_part('partials/globals/global-archiveheader');

		if (have_posts()) {

			$lightbox = true;

			if(is_post_type_archive('portratt')) {
				$meta_descr = false;
				$col_count = 2;
			} elseif(is_post_type_archive('singlar')) {
				$meta_descr = false;
				$col_count = 3;
			} else {
				$meta_descr = true;
				$lightbox = false;
				$col_count = 1;
			}

			echo '<div id="js-post_loader_target" class="js-salvattore l-container js-layout-'.$col_count.'" data-columns>';
				while ( have_posts() ) {
					the_post();
					hentry_item($post->ID, $meta_descr, $col_count, $lightbox);
				}
			echo '</div>';
		}

		echo '<p class="l-gutter a-section-archivelink">';
			next_posts_link('Visa fler');
		echo '</p>';
	echo '</article>';

get_footer();