<?php get_header();

	while ( have_posts() ) { the_post();
		$featured_format_is_landscape = get_field('acf-featured-img-ratio');
		//echo ($featured_format_is_landscape ? '' : 'is-not-landscape'); ?>

		<article id="post-<?php the_ID(); ?>" class="<?php echo ($featured_format_is_landscape ? '' : 'l-clearfix o-single_article is-not-landscape'); ?>">
			<header class="m-single__header">
				<?php the_title( '<h1 class="l-gutter a-title-XL a-single__header-title">', '</h1>' );
				if(function_exists('makeitSrcset') && has_post_thumbnail()) {
					makeitSrcset(get_post_thumbnail_id($post->ID), null, null, null, null, null, 'js-scroll_to_content');
				}

			    if ( is_user_logged_in() ) {
			        echo '<p class="l-gutter a-fineprint edit-post">';
			            edit_post_link( 'Redigera inl&auml;gg', ' &mdash; ', '' );
			        echo '</p>';
			    } ?>
			</header>

			<?php echo '<div id="js-textcontent" class="l-container m-single__text">';
				echo '<div class="l-span-C9 l-span-D8">';
					if($content = $post->post_content ) {
						the_content();
					} elseif(function_exists('get_field') && get_field('acf_text-summary')){
						echo get_field('acf_text-summary');
					}
				echo '</div>';
			echo '</div>';

			if(function_exists('get_sub_field') && have_rows('acf_img-gallery')){
				echo '<div class="l-container o-gallery js-layout-3" data-columns>';
				while (have_rows('acf_img-gallery')){
					the_row();
					if(get_sub_field('acf_img-gallery_img') && function_exists('makeitSrcset')){
						makeitSrcset(get_sub_field('acf_img-gallery_img'), null, null, null, null, null, 'm-gallery__item', null, 'true');
						//makeitSrcset(get_post_thumbnail_id($postID), $vw_mq1, $vw_mq2, $vw_mq3, $vw_mq4, $vw_mq5, null, null, ($lightbox ? 'lightbox-true' : ''));
						//echo '<h2>'.get_sub_field('acf_img-gallery_img-title').'</h2>';
						//echo '<p>'.get_sub_field('acf_img-gallery_img-meta').'</p>';
					}
				}
				echo '</div>';
			}

			get_template_part('partials/singular/singular-aside'); ?>
		</article>
	<?php }

get_footer();