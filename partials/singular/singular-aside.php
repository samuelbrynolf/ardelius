<?php $current_cpt = get_post_type();
$current_postID = array(get_the_ID());

// Set hentry-features

if( $current_cpt == 'text-bild' || $current_cpt == 'post'){
    $meta_descr = true;
    $lightbox = false;
    $layout_cols = 2;
} else {
    $meta_descr = false;
    $lightbox = true;
    $layout_cols = 3;
}

// Set hentry-features for post & title (all)

if($current_cpt == 'text-bild'){
	$terms = wp_get_post_terms( get_the_ID(), 'typ', array("fields" => "names"));

} elseif($current_cpt == 'bilder'){
	$terms = wp_get_post_terms( get_the_ID(), 'bildtyp', array("fields" => "names"));
}

if($current_cpt == 'post'){
	$aside_title = 'Mer nyheter';
} elseif($current_cpt == 'text-bild' || $current_cpt == 'bilder'){
	if($terms){
		$aside_title = 'Fler '.$terms[0];
	} else {
		return;
	}
} else {
	$aside_title = 'Fler '.$current_cpt;
}

// Set loop-query

if( $current_cpt == 'post'){
    $related_posts_args = array(
        'post_type' => $current_cpt
    );
} else {
	if(!$terms){
		return;
	}
    $tax_terms_arr_imgtext = get_the_terms( get_the_ID(), 'typ' );
    $tax_terms_arr_imgplain = get_the_terms( get_the_ID(), 'bildtyp' );

    if ( !empty($tax_terms_arr_imgtext) ){
        $tax_terms_imgtext = array_shift($tax_terms_arr_imgtext);
        $related_posts_args = array(
            'tax_query' => array(
                array(
                    'taxonomy' => 'typ',
                    'field'    => 'id',
                    'terms'    => $tax_terms_imgtext->term_id
                ),
            ),
        );
    }

    if ( !empty($tax_terms_arr_imgplain) ){
        $tax_terms_imgplain = array_shift($tax_terms_arr_imgplain);
        $related_posts_args = array(
            'tax_query' => array(
                array(
                    'taxonomy' => 'bildtyp',
                    'field'    => 'id',
                    'terms'    => $tax_terms_imgplain ->term_id
                ),
            ),
        );
    }
}

$related_posts_loop_order = array(
    'post__not_in' => $current_postID,
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order'   => 'ASC',
);

$related_posts = new WP_Query(array_merge($related_posts_args, $related_posts_loop_order));

if ($related_posts->have_posts()) {
    echo '<aside class="o-section">';
        echo '<h2 class="l-gutter a-section-title a-title-M">'.$aside_title.'</h2>';
        echo '<div class="l-container js-layout-'.$layout_cols.'" data-columns>';
            while ($related_posts->have_posts()) {
                $related_posts->the_post();
                hentry_item($post->ID, $meta_descr, $layout_cols, $lightbox);
            }
            wp_reset_postdata();
        echo '</div>';
    echo '</aside>';
}