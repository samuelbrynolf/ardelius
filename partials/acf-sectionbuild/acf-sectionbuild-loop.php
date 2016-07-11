<?php if( function_exists('get_sub_field') && have_rows('acf_sectionbuilder')){
	while (have_rows('acf_sectionbuilder')){
		the_row();
		get_template_part('partials/acf-sectionbuild/acf-sectionbuild-bywpquery');
		//get_template_part('partials/acf-sectionbuild/acf-sectionbuild-byobject');
	}
}