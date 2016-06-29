<aside class="">
    <p>Article aside, why not for comments?</p>
    <?php if (is_singular('post') && (comments_open() || get_comments_number())) {
        echo '<div class="">';
            echo '<h3 class="">Kommentarer</h3>';
            comments_template();
        echo '</div>';
    } ?>

</aside>