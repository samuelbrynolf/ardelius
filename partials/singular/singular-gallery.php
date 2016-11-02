<?php if(function_exists('get_sub_field') && have_rows('acf_img-gallery')){
	echo '<aside id="js-gallery" class="js-layout-single_gallery l-container o-gallery" data-columns>';
		while (have_rows('acf_img-gallery')){
			the_row();
			if(get_sub_field('acf_img-gallery_img') && function_exists('makeitSrcset')){
				makeitSrcset(get_sub_field('acf_img-gallery_img'), null, null, null, null, null, 'm-gallery__item', null, 'true');
			}
		}
	echo '</aside>';
}