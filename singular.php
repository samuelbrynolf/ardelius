<?php get_header();

	while ( have_posts() ) { the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php get_template_part('partials/singular/singular-header');
			get_template_part('partials/singular/singular-content');
			get_template_part('partials/singular/singular-aside'); ?>
		</article>
	<?php }

get_footer();