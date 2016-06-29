<?php // Index is used as archive-, category-, tag- and home-template.

get_header();

	if (is_front_page() && is_home()) {

		echo '<section id="" class="">';
			get_template_part('partials/start/start-hero');
		echo '</section>';

	} else {
		echo '<header class="">';
			get_template_part('partials/globals/global-archiveheader');
		echo '</header>';
	}

	if ( have_posts() ) {
		get_template_part('partials/listitems/listitems-loop');
	} ?>

<?php get_footer();