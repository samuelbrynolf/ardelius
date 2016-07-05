<?php get_header();

	while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php //get_template_part('partials/singular/singular-header');

			if (has_post_thumbnail()){
				//the_post_thumbnail();
			}

			// get_template_part('partials/singular/singular-content');
			// get_template_part('partials/singular/singular-aside'); ?>
		</article>
	<?php endwhile;

	if(function_exists('get_sub_field') && have_rows('acf_reportage_images')){
		while (have_rows('acf_reportage_images')){
			the_row();
			if(get_sub_field('acf_reportage_img') && function_exists('makeitSrcset')){
				makeitSrcset(get_sub_field('acf_reportage_img'), null, null, null, null, null, null, null, 'true');
				echo '<p>'.get_sub_field('acf_reportage_img-title').'</p>';
				echo '<p>'.get_sub_field('acf_reportage_img-meta').'</p>';
			}
		}
	}

	$current_cpt = get_post_type();
	$current_postID = array(get_the_ID());

	$related_posts_args = array(
		'post_type' => $current_cpt,
		'post__not_in' => $current_postID,
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'orderby' => 'menu_order',
		'order'   => 'ASC'
	);

	$related_posts = new WP_Query($related_posts_args);

	if ($related_posts->have_posts()) {

	while ($related_posts->have_posts()) {
		$related_posts->the_post();
		echo '<a href="'.get_the_permalink().'" title="Länk till '.get_the_title().'">';
			if(function_exists('makeitSrcset') && has_post_thumbnail()) {
				makeitSrcset(get_post_thumbnail_id($post->ID));
			}
			the_title('<h3 class="">', '</h3>');
			if(get_field('acf_cpt_meta')){
				echo '<p>'.get_field('acf_cpt_meta').'</p>';
			}
		echo '</a>';
		}
		wp_reset_postdata();
	}



get_footer();