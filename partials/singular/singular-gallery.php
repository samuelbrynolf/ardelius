<?php if(function_exists('get_sub_field') && have_rows('acf_img-gallery')){
    echo '<div class="l-container o-gallery js-layout-3" data-columns>';
        while (have_rows('acf_img-gallery')){
            the_row();
            if(get_sub_field('acf_img-gallery_img') && function_exists('makeitSrcset')){
                makeitSrcset(get_sub_field('acf_img-gallery_img'), null, null, null, null, null, 'm-gallery__item', null, 'true');
                //makeitSrcset(get_post_thumbnail_id($postID), $vw_mq1, $vw_mq2, $vw_mq3, $vw_mq4, $vw_mq5, null, null, ($lightbox ? 'lightbox-true' : ''));
                //echo '<h2>'.get_sub_field('acf_img-gallery_img-title').'</h2>';
                //echo '<p>'.get_sub_field('acf_img-gallery_img-meta').'</p>';
            }
        }
    echo '</div>';
}