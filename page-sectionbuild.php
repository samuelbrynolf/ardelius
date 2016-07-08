<?php /* Template Name: Sida med sektioner */
get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part('partials/globals/start-hero');
	}
}

get_template_part('partials/acf-sectionbuild/acf-sectionbuild-loop');

get_footer();