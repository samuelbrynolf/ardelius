<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <script type="text/javascript">
        document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/,'js');
        WebFontConfig = {
            google: { families: [ 'PT+Serif+Caption::latin', 'PT+Serif:400,400italic,700:latin' ] }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <?php wp_head(); ?>

    <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/vendors_no_concat/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lte IE 8]>
        <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/vendors_no_concat/respond.min.js"></script>
    <![endif]-->
</head>