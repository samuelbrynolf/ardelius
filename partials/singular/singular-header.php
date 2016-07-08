<header>
    <?php the_title( '<h1>', '</h1>' );
    if(function_exists('makeitSrcset') && has_post_thumbnail()) {
        makeitSrcset(get_post_thumbnail_id($post->ID));
    }

    if(function_exists('get_field') && get_field('acf_reportage_detail')){
        echo get_field('acf_reportage_detail');
    }

    echo '<p class="">';
        edit_post_link('Redigera inl&auml;gg', ' &mdash; ', '');
    echo '</p>'; ?>
</header>