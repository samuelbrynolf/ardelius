<?php // Index is used as archive-, category-, tag- and home-template.

get_header();

	$blog_page = false;

	if(is_home()){
		$blog_page = true;
	}

	echo '<article class="o-section is-standalone'.($blog_page ? ' s-is-blogsection' : '').'">'; // TODO Get a workng solution for 404s
		get_template_part('partials/globals/global-archiveheader');

		if (have_posts()) {

			$lightbox = true;

			if($blog_page || is_post_type_archive('reportage')){
				$meta_descr = true;
				$lightbox = false;
				$col_count = 1;
			} elseif(is_post_type_archive('portratt')) {
				$meta_descr = false;
				$col_count = 2;
			} else {
				$meta_descr = false;
				$col_count = 3;
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