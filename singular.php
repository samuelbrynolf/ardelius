<?php get_header();

	while ( have_posts() ) { the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php get_template_part('partials/singular/singular-header');

			echo '<div id="js-textcontent" class="l-container">';
				echo '<div class="l-span-C9 l-span-D8 m-single__text">';
					if($content = $post->post_content ) {
						the_content();
					} elseif(function_exists('get_field') && get_field('acf_text-summary')){
						echo get_field('acf_text-summary');
					}
				echo '</div>';
			echo '</div>';

			get_template_part('partials/singular/singular-gallery');
			get_template_part('partials/singular/singular-aside'); ?>
		</article>
	<?php }

get_footer();