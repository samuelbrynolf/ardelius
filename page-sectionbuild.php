<?php /* Template Name: Sida med sektioner */

get_header();

echo '<article>';
	get_template_part('partials/globals/global-hero');
	get_template_part('partials/acf-sectionbuild/acf-sectionbuild-loop');
echo '</article>';

get_footer();