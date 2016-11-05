<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/,'js');<?php if (function_exists('get_field') && get_field('acf_typekit_id', 'option')){ ?>(function(d){var config = {kitId: '<?php echo get_field('acf_typekit_id', 'option'); ?>',scriptTimeout: 2000, async: true}, h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)})(document);<?php } ?></script>

    <?php wp_head(); ?>

    <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/vendors_no_concat/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lte IE 8]>
        <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/vendors_no_concat/respond.min.js"></script>
    <![endif]-->
</head>