<?php
echo '<ul class="">';
    while ( have_posts() ) {
        echo '<li class="">';
            the_post();
            get_template_part('partials/listitems/listitem');
        echo '</li>';
    }
echo '</ul>';

next_posts_link('Visa fler inlägg');