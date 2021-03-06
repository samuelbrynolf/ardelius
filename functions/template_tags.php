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
			$vw_mq1 = 88;
			$vw_mq2 = 43;
			$vw_mq3 = 29;
			$vw_mq4 = 22;
			$vw_mq5 = 21;
		} elseif($layout_cols == 3){
			$vw_mq1 = 88;
			$vw_mq2 = 43;
			$vw_mq3 = 29;
			$vw_mq4 = 30;
			$vw_mq5 = 35;
		} elseif($layout_cols == 2) {
			$vw_mq1 = 88;
			$vw_mq2 = 43;
			$vw_mq3 = 45;
			$vw_mq4 = 46;
			$vw_mq5 = 44;
		} elseif($layout_cols == 1){
			$vw_mq1 = 88;
			$vw_mq2 = 88;
			$vw_mq3 = 93;
			$vw_mq4 = 94;
			$vw_mq5 = 91;
		}

		echo '<div class="m-hentryitem'.($meta_descr ? ' s-has_meta_descr' : ' s-has_no_meta_descr').'">';
			echo ($lightbox ? '' : '<a href="'.get_the_permalink().'" title="Länk till '.get_the_title().'">');
				if(function_exists('makeitSrcset') && has_post_thumbnail()) {
					makeitSrcset(get_post_thumbnail_id($postID), $vw_mq1, $vw_mq2, $vw_mq3, $vw_mq4, $vw_mq5, null, null, ($lightbox ? 'lightbox-true' : ''));
				}

				the_title('<h3 class="a-hentryitem-title">', '</h3>');

				if($meta_descr == true){
					echo '<p class="a-hentryitem-meta a-fineprint">';
						if('post' == get_post_type($postID)){
							the_date('', '<strong class="a-hentryitem-postdate">', ' / </strong>');
						}

						if(function_exists('get_field') && get_field('acf_text-summary')){
							echo strip_tags(get_field('acf_text-summary'));
						} else {
							echo strip_tags(get_the_content());
						}
					echo '</p>';
				}
			echo ($lightbox ? '' : '</a>');
		echo '</div>';
	}
}



// Function archivelink sends visitor from a section to an archive. Appears within  the ACH controlled sectionbuilder (starts with acf-sectionbuild-loop.php, ) ------------------------------------------



if(!function_exists('section_archive_link')){
	function section_archive_link($section_archive_url = null, $section_cta_text){

		if(is_null($section_archive_url) || empty($section_archive_url)){
			return;
		}

		echo '<p class="l-gutter a-section-archivelink"><a class="a-btn" href="'.$section_archive_url.'">'.$section_cta_text.'</a></p>';
	}
}