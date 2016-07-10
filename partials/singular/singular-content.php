<?php if(function_exists('get_sub_field') && have_rows('acf_related_images')){
    echo '<ul class="js-salvattore" data-columns>';
        while (have_rows('acf_related_images')){
            the_row();
            if(get_sub_field('acf_related_img') && function_exists('makeitSrcset')){
                echo '<li class="l-span">';
                    makeitSrcset(get_sub_field('acf_related_img'), null, null, null, null, null, null, null, 'true');
                    echo '<h2>'.get_sub_field('acf_related_img-title').'</h2>';
                    echo '<p>'.get_sub_field('acf_related_img-meta').'</p>';
                echo '</li>';
            }
        }
    echo '</ul>';
}