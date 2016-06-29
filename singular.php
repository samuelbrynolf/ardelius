<?php get_header();

	while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php get_template_part('partials/singular/singular-header');

			if (has_post_thumbnail()){
				the_post_thumbnail();
			}

			get_template_part('partials/singular/singular-content');
			get_template_part('partials/singular/singular-aside'); ?>
		</article>
	<?php endwhile; ?>

<?php get_footer();