<header class="">
    <?php the_title( '<h1 class="">', '</h1>' );

    echo '<p class="">';
    the_date('', '', '');
    if (has_tag()) {
        the_tags(' &#183; ', ' &#183; ');
    }
    edit_post_link('Redigera inl&auml;gg', ' &mdash; ', '');
    echo '</p>'; ?>
</header>