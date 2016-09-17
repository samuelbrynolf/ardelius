<?php $current_cpt = get_post_type();
$current_postID = array(get_the_ID());

$related_posts_args = array(
    'post_type' => $current_cpt,
    'post__not_in' => $current_postID,
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order'   => 'ASC'
);

if( $current_cpt == 'post' || $current_cpt == 'reportage'){
    $meta_descr = true;
    $layout_cols = 2;
} else {
    $meta_descr = false;
    $layout_cols = 4;
}

if($current_cpt == 'post'){
    $aside_title = 'Mer ur bloggen';
    $layout_cols = 1;
} else {
    $aside_title = 'Fler '.$current_cpt;
}

$related_posts = new WP_Query($related_posts_args);

if ($related_posts->have_posts()) {
    echo '<aside class="o-section">';
        echo '<h2 class="l-gutter a-section-title a-title-M">'.$aside_title.'</h2>';
        echo '<div class="l-container js-layout-'.$layout_cols.'" data-columns>';
            while ($related_posts->have_posts()) {
                $related_posts->the_post();
                hentry_item($post->ID, $meta_descr, $layout_cols, false);
            }
            wp_reset_postdata();
        echo '</div>';
    echo '</aside>';
} ?>