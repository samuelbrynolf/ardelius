<?php get_header();

	while ( have_posts() ) { the_post();
		$featured_format_is_landscape = get_field('acf-featured-img-ratio');
		//echo ($featured_format_is_landscape ? '' : 'is-not-landscape'); ?>

		<article id="post-<?php the_ID(); ?>" class="o-single_article">
			<section class="l-clearfix o-single_main-content<?php echo ($featured_format_is_landscape ? '' : ' is-not-landscape'); ?>">

				<?php if(function_exists('makeitSrcset') && has_post_thumbnail()) {
					makeitSrcset(get_post_thumbnail_id($post->ID), null, null, null, null, null, 'm-single__featured-img');
				}

				echo '<div id="js-textcontent" class="m-single__text">';
					the_title( '<h1 class="a-single__header-title">', '</h1>' );

					if($content = $post->post_content ) {
						the_content();
					} elseif(function_exists('get_field') && get_field('acf_text-summary')){
						echo get_field('acf_text-summary');
					}

					if(function_exists('get_sub_field') && have_rows('acf_img-gallery')) {
						echo '<p><a id="js-scroll_to_gallery" href="#">Se alla bilder</a></p>';
					}

					if ( is_user_logged_in() ) {
						echo '<p class="a-fineprint edit-post">';
							edit_post_link( 'Redigera inl&auml;gg', ' &mdash; ', '' );
						echo '</p>';
					}
				echo '</div>';
			echo '</section>';

			if(function_exists('get_sub_field') && have_rows('acf_img-gallery')){
				echo '<div id="js-gallery" class="l-container o-gallery js-layout-3" data-columns>';
					while (have_rows('acf_img-gallery')){
						the_row();
						if(get_sub_field('acf_img-gallery_img') && function_exists('makeitSrcset')){
							makeitSrcset(get_sub_field('acf_img-gallery_img'), null, null, null, null, null, 'm-gallery__item', null, 'true');
						}
					}
				echo '</div>';
			}

		echo '</article>';

			get_template_part('partials/singular/singular-aside'); ?>

	<?php }

get_footer();