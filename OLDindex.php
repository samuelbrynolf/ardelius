<?php // Index is used as archive-, category-, tag- and home-template.

get_header();

	echo '<header class="">';
		get_template_part('partials/globals/global-archiveheader');
	echo '</header>';

	if ( have_posts() ) {
		hentry_item($post->ID);
	} ?>

<?php get_footer();