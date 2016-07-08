<?php if(function_exists('get_sub_field') && have_rows('acf_reportage_images')){
    while (have_rows('acf_reportage_images')){
        the_row();
        if(get_sub_field('acf_reportage_img') && function_exists('makeitSrcset')){
            makeitSrcset(get_sub_field('acf_reportage_img'), null, null, null, null, null, null, null, 'true');
            echo '<h2>'.get_sub_field('acf_reportage_img-title').'</h2>';
            echo '<p>'.get_sub_field('acf_reportage_img-meta').'</p>';
        }
    }
}