<footer id="colophon" class="o-global-footer" role="contentinfo">
    <div class="l-container o-bio">
        <div class="l-pre-A3 l-pre-B1 l-pre-C0 l-span-A6 l-span-B3 l-span-C2">
            <?php if(function_exists('makeitSrcset') && function_exists('get_field') && get_field('acf_avatar', 'option')) {
                makeitSrcset(get_field('acf_avatar', 'option'), 100, 100, 100, 100, 100, 'a-avatar');
            } ?>
        </div>
        <div class="l-span-A12 l-pre-B0 l-pre-C0 l-span-B7 l-span-C8 l-span-D7 m-bio">
            <?php if(function_exists('get_field') && get_field('acf_biografi_title', 'option')) {
                echo '<h3 class="a-bio-title">';
                    the_field('acf_biografi_title', 'option');
                echo '</h3>';
            }

            if(function_exists('get_field') && get_field('acf_biografi', 'option')) {
                echo '<div class="m-bio-text">';
                    the_field('acf_biografi', 'option');

                echo '</div>';

                echo '<p class="a-fineprint a-global-footer_credentials">&copy; All Rights Reserved '.date("Y").'</p>';

            } ?>
        </div>
    </div>
</footer><!-- #colophon -->