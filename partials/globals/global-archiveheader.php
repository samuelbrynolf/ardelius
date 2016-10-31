<?php echo '<header class="l-gutter">';

    if(is_404()) { ?>
        <h1 class="a-section-title a-title-M">404</h1>
        <p>Sidan existerar inte. Tyvärr har sidan upphört, eller så är länken felaktig. <a href="<?php bloginfo('url'); ?>" title="Till startsidan">Gå till startsidan</a>.</p>

    <?php } elseif(is_home()){
        $blog_title = get_the_title(get_option('page_for_posts', true));

        if(!is_paged()) {
            echo '<h1 class="a-section-title a-title-M">'.$blog_title.'</h1>';
        } else {
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            echo '<h1 class="a-section-title a-title-M">'.$blog_title.' &mdash; sida ' . $paged . '</h1>';
        }

    } elseif(is_post_type_archive()){
        post_type_archive_title( '<h1 class="a-section-title a-title-M">', '</h1>' );
    } else {
        the_archive_title( '<h1 class="a-section-title a-title-M">', '</h1>' );
        the_archive_description('<h2>','</h2>');
    }

echo '</header>';