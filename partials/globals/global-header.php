<header id="js-global-header" class="l-gutter m-global-header" role="banner">

    <?php $startpage = null;

    if(is_front_page() && is_home()){
        $startpage = true;
    }

    echo ($startpage ? '<h1 class="a-global-header__title">' : '<h3 class="a-global-header__title">');
        echo '<a href="'.esc_url( home_url( '/' ) ).'" rel="home">'.get_bloginfo('name').' &middot; <span>'.get_bloginfo('description').'</span></a>';
    echo ($startpage ? '</h1>' : '</h3>');

    //wp_nav_menu(array('container' => 'nav', 'container_class' => 'm-global__nav', 'items_wrap' => '<ul>%3$s</ul>'));
    //get_search_form(); ?>
</header>