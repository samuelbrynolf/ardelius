<header class="m-single__header">
    <?php the_title( '<h1 class="l-gutter a-title-XL a-single__header-title">', '</h1>' );
    if(function_exists('makeitSrcset') && has_post_thumbnail()) {
        makeitSrcset(get_post_thumbnail_id($post->ID), null, null, null, null, null, 'js-scroll_to_content');
    }

//    if ( is_user_logged_in() ) {
//        echo '<p class="l-gutter a-fineprint edit-post">';
//            edit_post_link( 'Redigera inl&auml;gg', ' &mdash; ', '' );
//        echo '</p>';
//    } ?>
</header>