<header id="js-global-header" class="l-gutter m-global-header">

    <?php wp_nav_menu(array('container' => 'nav', 'container_id' => 'js-global-nav','container_class' => 'm-global-nav', 'items_wrap' => '<ul>%3$s</ul>'));

    $startpage = null;

    if(is_front_page()){
        $startpage = true;
    }

    echo ($startpage ? '<h1 class="a-global-header__title">' : '<h3 class="a-global-header__title">');
        echo '<a href="'.esc_url( home_url( '/' ) ).'" rel="home">'.get_bloginfo('name').' <span>&middot;</span> '.get_bloginfo('description').'</a>';
    echo ($startpage ? '</h1>' : '</h3>'); ?>

    <button id="js-global-nav-toggler" class="l-pull-right a-global-nav-toggler c-hamburger c-hamburger--htx">
        <span>Meny</span>
    </button>
</header>