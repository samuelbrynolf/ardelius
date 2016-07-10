<aside>
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

    $related_posts = new WP_Query($related_posts_args);

    if ($related_posts->have_posts()) {
        echo '<ul class="js-salvattore" data-columns>';
            while ($related_posts->have_posts()) {
                $related_posts->the_post();
                hentry_item($post->ID);
            }
            wp_reset_postdata();
        echo '</ul>';
    } ?>
</aside>