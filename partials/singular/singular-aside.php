<?php $current_cpt = get_post_type();
$current_postID = array(get_the_ID());

$related_posts_args = array(
    'post_type' => $current_cpt,
    'post__not_in' => $current_postID,
    'posts_per_page' => -1,
    'post_status' => 'publish'
);

$related_posts_loop_order = array(
    'orderby' => 'menu_order',
    'order'   => 'ASC',
);

if( $current_cpt == 'post' || $current_cpt == 'reportage'){
    $meta_descr = true;
    $lightbox = false;
    $layout_cols = 2;
} else {
    $meta_descr = false;
    $lightbox = true;
    $layout_cols = 3;
}

if($current_cpt == 'post'){
    $aside_title = 'Mer ur bloggen';
    $layout_cols = 1;
    $related_posts = $related_posts_args;
} else {
    $aside_title = 'Fler '.$current_cpt;
    $related_posts = array_merge($related_posts_args, $related_posts_loop_order);
}

$related_posts = new WP_Query($related_posts);

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