<?php get_header();

	while ( have_posts() ) { the_post();
		$featured_format_is_landscape = get_field('acf-featured-img-ratio');
		$layoutSpans_featuredImg = null;
		$layoutSpans_textContent = null;
		//echo ($featured_format_is_landscape ? '' : 'is-not-landscape');

		if($featured_format_is_landscape){
			$layoutSpans_featuredImg = 'l-span-A12 l-span-C8 m-single__featured-img';
			$layoutSpans_textContent = 'l-span-A12 l-span-C4';
		} else {
			$layoutSpans_featuredImg = 'l-span-A12 l-span-C5 m-single__featured-img';
			$layoutSpans_textContent = 'l-span-A12 l-span-C7';
		} ?>

		<article id="post-<?php the_ID(); ?>" class="o-single_article">
			<div class="l-single-fullbleed">
				<div class="l-container o-single_main-content<?php echo ($featured_format_is_landscape ? '' : ' is-not-landscape'); ?>">

					<?php if(function_exists('makeitSrcset') && has_post_thumbnail()) {
						makeitSrcset(get_post_thumbnail_id($post->ID), null, null, null, null, null, $layoutSpans_featuredImg);
					}

					echo '<div id="js-textcontent" class="'.$layoutSpans_textContent.' m-single__text">';
						echo '<div class="m-single__text-inset">';

							if('post' == get_post_type()){
								the_date('', '<p class="a-fineprint a-single__postdate"><strong>','</strong></p>');
							}

							the_title( '<h1 class="a-single__header-title a-title-L">', '</h1>' );



//							if ( is_user_logged_in() ) {
//								echo '<p class="a-fineprint edit-post">';
//								edit_post_link( 'Redigera inl&auml;gg', ' &mdash; ', '' );
//								echo '</p>';
//							}

							if($content = $post->post_content ) {
								the_content();
							} elseif(function_exists('get_field') && get_field('acf_text-summary')){
								echo get_field('acf_text-summary');
							}

							if(!$featured_format_is_landscape && has_post_thumbnail()) {
								get_template_part('partials/singular/singular-gallery');
							}

						echo '</div>'; // END TEXT-INSET
					echo '</div>'; // END SINGLE TEXT
				echo '</div>';
			echo '</div>'; // END SINGLE FULLBLEED

			if($featured_format_is_landscape || !has_post_thumbnail()) {
				get_template_part('partials/singular/singular-gallery');
			}

		echo '</article>';

		get_template_part('partials/singular/singular-aside'); ?>

	<?php }

get_footer();