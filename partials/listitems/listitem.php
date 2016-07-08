<?php // Remember to style the containing link to "display: block;" -- if you go with this markup

echo '<a href="'.get_the_permalink().'" title="Länk till '.get_the_title().'">';
    if(function_exists('makeitSrcset') && has_post_thumbnail()) {
        makeitSrcset(get_post_thumbnail_id($post->ID));
    }
    the_title('<h3 class="">', '</h3>');
    if(get_field('acf_cpt_meta')){
        echo '<p>'.get_field('acf_cpt_meta').'</p>';
    }
echo '</a>';