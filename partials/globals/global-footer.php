<footer id="colophon" class="o-global-footer" role="contentinfo">
    <div class="l-container o-bio">
        <div class="l-span-B3">
            <?php if(function_exists('makeitSrcset') && function_exists('get_field') && get_field('acf_avatar', 'option')) {
                makeitSrcset(get_field('acf_avatar', 'option'), 100, 100, 100, 100, 100, 'a-avatar');
            } ?>
        </div>
        <div class="l-pre-B1 l-span-B8 m-bio">
            <?php if(function_exists('get_field') && get_field('acf_biografi_title', 'option')) {
                echo '<h3 class="a-bio-title">';
                    the_field('acf_biografi_title', 'option');
                echo '</h3>';
            }

            if(function_exists('get_field') && get_field('acf_biografi', 'option')) {
                echo '<div class="m-bio-text">';
                    the_field('acf_biografi', 'option');
                echo '</div>';
            } ?>
        </div>
    </div>
</footer><!-- #colophon -->