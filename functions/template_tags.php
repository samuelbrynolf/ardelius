<?php if(!function_exists('hentry_item')){
	function hentry_item(
		$postID = null,
		$meta_descr = false,
		$layout_cols = 4,
		$lightbox = null){

		if(is_null($postID) || !is_numeric($layout_cols)){
			return;
		}

		if(is_null($lightbox) || !$lightbox){
			$lightbox = false;
		}

		if($layout_cols == 4){
			$vw_mq1 = 100;
			$vw_mq2 = 100;
			$vw_mq3 = 100;
			$vw_mq4 = 100;
			$vw_mq5 = 100;
		} elseif($layout_cols == 3){
			$vw_mq1 = 100;
			$vw_mq2 = 100;
			$vw_mq3 = 100;
			$vw_mq4 = 100;
			$vw_mq5 = 100;
		} elseif($layout_cols == 2) {
			$vw_mq1 = 100;
			$vw_mq2 = 100;
			$vw_mq3 = 100;
			$vw_mq4 = 100;
			$vw_mq5 = 100;
		} elseif($layout_cols == 1){
			$vw_mq1 = 100;
			$vw_mq2 = 100;
			$vw_mq3 = 100;
			$vw_mq4 = 100;
			$vw_mq5 = 100;
		}

		echo '<div class="m-hentryitem'.($meta_descr ? ' s-has_meta_descr' : ' s-has_no_meta_descr').'">';
			echo ($lightbox ? '' : '<a href="'.get_the_permalink().'" title="Länk till '.get_the_title().'">');
				if(function_exists('makeitSrcset') && has_post_thumbnail()) {
					makeitSrcset(get_post_thumbnail_id($postID), $vw_mq1, $vw_mq2, $vw_mq3, $vw_mq4, $vw_mq5, null, null, ($lightbox ? 'lightbox-true' : ''));
				}
				the_title('<h3 class="a-hentryitem-title">', '</h3>');
				if($meta_descr == true){
					echo '<div class="a-hentryitem-meta">';
						if(function_exists('get_field') && get_field('acf_text-summary')){
							echo get_field('acf_text-summary');
						} else {
							the_content('&#8594;');
						}
					echo '</div>';
				}
			echo ($lightbox ? '' : '</a>');
		echo '</div>';
	}
}



// Function archivelink sends visitor from a section to an archive. Appears within  the ACH controlled sectionbuilder (starts with acf-sectionbuild-loop.php, ) ------------------------------------------



if(!function_exists('section_archive_link')){
	function section_archive_link($section_archive_url = null, $section_cta_text = 'Visa alla'){

		if(is_null($section_archive_url) || empty($section_archive_url)){
			return;
		}

		echo '<p class="l-gutter a-fineprint a-section-archivelink"><a href="'.$section_archive_url.'">'.$section_cta_text.' &rarr;</a></p>';
	}
}