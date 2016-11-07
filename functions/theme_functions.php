<?php // ADD CUSTOM BODY CLASSES -------------------------------------------------------------------

if ( !function_exists('body_classes')) {
    function body_classes($classes){
        if (is_singular() && has_post_thumbnail()){
            $classes[] = 'has-thumb';
        } else {
            $classes[] = 'no-thumb';
        }
        return $classes;
    }

    add_filter('body_class', 'body_classes');
}



// MANIPULATE LOOPS -------------------------------------------------------------------

function cpt_query($query){
    if($query->is_main_query() && (is_tax() ||is_post_type_archive()) && !is_admin()){
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC');
    }
    return $query;
}
add_action('pre_get_posts','cpt_query');



// BUILD HEAD-TITLES -------------------------------------------------------------------
// Note: This will be the fallback for using a seo plugin to rebuild your titles. For example use Yoast SEO: https://wordpress.org/plugins/wordpress-seo/

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
    /**
     * Filters wp_title to print a neat <title> tag based on what is being viewed.
     *
     * @param string $title Default title text for current view.
     * @param string $sep Optional separator.
     * @return string The filtered title.
     */

    if ( !function_exists( 'bento_wp_title' )) {
        function bento_wp_title($title, $sep)
        {
            if (is_feed()) {
                return $title;
            }

            global $page, $paged;

            // Add the blog name
            $title .= get_bloginfo('name', 'display');

            // Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && (is_home() || is_front_page())) {
                $title .= " $sep $site_description";
            }

            // Add a page number if necessary:
            if (($paged >= 2 || $page >= 2) && !is_404()) {
                $title .= " $sep " . sprintf(__('Page %s', 'bento'), max($paged, $page));
            }

            return $title;
        }

        add_filter('wp_title', 'bento_wp_title', 10, 2);
    }
endif;



// RENAME INLÄGG OR POSTS TO X -------------------------------------------------------------------

function wd_admin_menu_rename() {
    global $menu; // Global to get menu array
    $menu[5][0] = 'Nyheter'; // Change name of posts to portfolio
}
add_action( 'admin_menu', 'wd_admin_menu_rename' );



// RENAME INLÄGG OR POSTS TO X -------------------------------------------------------------------

function remove_meta_boxes() {
    remove_meta_box( 'categorydiv', 'post', 'side');
}
add_action( 'admin_menu', 'remove_meta_boxes' );



// REMOVE COMMENTS LINK IN ADMIN -------------------------------------------------------------------

function wd_admin_menu_remove() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'wd_admin_menu_remove' );



// FILTER ARCHIVE TITLES/LABELS -------------------------------------------------------------------

add_filter('get_the_archive_title', function ($title) {
    $title = single_cat_title('', false);
    return $title;
});



// FILTER ARCHIVE DESCRIPTIONS (REMOVE <P>) -------------------------------------------------------------------

if ( !function_exists( 'strip_archive_descriptions_p' )) {
    function strip_archive_descriptions_p($description)
    {
        $remove = array('<p>', '</p>');
        $description = str_replace($remove, "", $description);
        return $description;
    }

    add_filter('get_the_archive_description', 'strip_archive_descriptions_p');
}




// REMOVE EDITOR FOR PAGES -------------------------------------------------------------------

if ( !function_exists('remove_page_metaboxes')) {
    function remove_page_metaboxes() {
        remove_post_type_support( 'page', 'editor' );
        remove_post_type_support( 'page', 'thumbnail' );
    }

    add_action( 'init', 'remove_page_metaboxes' );
}

// MOVE YOAST SEO-MODULE TO POSTS BOTTOM -------------------------------------------------------------------
// Using Yoast Seo plugin? You should: https://wordpress.org/plugins/wordpress-seo/
// Dated 2016-06-02


if ( !function_exists( 'yoasttobottom' )) {
    function yoasttobottom()
    {
        return 'low';
    }

    add_filter('wpseo_metabox_prio', 'yoasttobottom');
}