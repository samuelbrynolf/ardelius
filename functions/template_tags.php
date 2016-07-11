<?php // Hentry Items, passed arguments are makeitSrcset configuration

if(!function_exists('hentry_item')){
	function hentry_item(
		$postID = null,
		$layout_cols = 4,
		$lightbox = false){

		if(is_null($postID) || !is_numeric($layout_cols)){
			return;
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

		echo '<li>';
			echo ($lightbox ? '' : '<a href="'.get_the_permalink().'" title="Länk till '.get_the_title().'">');
				if(function_exists('makeitSrcset') && has_post_thumbnail()) {
					makeitSrcset(get_post_thumbnail_id($postID, $vw_mq1, $vw_mq2, $vw_mq3, $vw_mq4, $vw_mq5, null, null, ($lightbox ? 'enable' : null)));
				}
				the_title('<h3 class="">', '</h3>');
				if(function_exists('get_field') && get_field('acf_cpt_meta')){
					echo '<div class="a-fineprint">';
						echo get_field('acf_cpt_meta');
					echo '</div>';
				}
			echo ($lightbox ? '' : '</a>');
		echo '</li>';
	}
}