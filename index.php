<?php // Index is used as a global archive-template: posts, cpt-archives, custom tax archive and tags.

get_header();
	$col_count = 2;
	$current_taxterm_id = null;

	if(is_home()){
		$col_count = 1;
		$maxw_decr = 'decr-maxw is-blog-hentries ';
	} else {
		$maxw_decr = null;
	}

	if(is_tax() && function_exists('get_sub_field')){
		$current_taxterm_id = get_queried_object()->term_id;

		while(has_sub_field('tax-template_layoutcols', 'option')){
			if(get_sub_field('tax-template_term-id') === $current_taxterm_id){
				$col_count = get_sub_field('tax-template_col-count');
				break;
			}
		}
	}

	if(is_tag() && function_exists('get_sub_field')){
		$current_tagterm_id = get_queried_object()->term_id;

		while(has_sub_field('tag-template_layoutcols', 'option')){
			if(get_sub_field('tag-template_term-id') === $current_taxterm_id){
				$col_count = get_sub_field('tag-template_col-count');
				break;
			}
		}
	}

	echo '<article class="o-section is-standalone">'; // TODO Get a workng solution for 404s
		get_template_part('partials/globals/global-archiveheader');

		if (have_posts()) {

			echo '<div id="js-post_loader_target" class="js-salvattore '.$maxw_decr.'l-container js-layout-'.$col_count.'" data-columns>';
				while ( have_posts() ) {
					the_post();

					$meta_descr = true;
					$lightbox = false;

					if('bilder' == get_post_type()) {
						$meta_descr = false;
						$lightbox = true;
					}

					hentry_item($post->ID, $meta_descr, $col_count, $lightbox);
				}
			echo '</div>';
		}

		echo '<p class="l-gutter a-section-archivelink">';
			next_posts_link('Visa fler');
		echo '</p>';
	echo '</article>';

get_footer();