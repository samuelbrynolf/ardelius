<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <script>
        document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/,'js');
    </script>

    <?php wp_head(); ?>

    <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/vendors_no_concat/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lte IE 8]>
        <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/vendors_no_concat/respond.min.js"></script>
    <![endif]-->
</head>