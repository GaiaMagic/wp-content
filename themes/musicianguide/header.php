<!DOCTYPE html>
<!--[if lt IE 7]>  <html class='ie ie6 lte9 lte8 lte7'> <![endif]-->
<!--[if IE 7]>     <html class='ie ie7 lte9 lte8 lte7'> <![endif]-->
<!--[if IE 8]>     <html class='ie ie8 lte9 lte8'> <![endif]-->
<!--[if IE 9]>     <html class='ie ie9 lte9'> <![endif]-->
<!--[if gt IE 9]>  <html> <![endif]-->
<!--[if !IE]><!-->
<html>
    <!--<![endif]-->
    <head id='musicianguide.cn'  profile='http://gmpg.org/xfn/11'>
        <meta charset='utf-8' />
        <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
        <title><?php wp_title(''); ?></title>

        <link rel='shortcut icon' href='<?php echo get_option("home"); ?>/images/favicon.ico' />
        <link href='<?php echo get_option("home"); ?>/stylesheets/style.css' rel='stylesheet' />

        <script src='<?php echo get_option("home"); ?>/javascripts/modernizr.min.js'></script>

        <link rel='pingback' href='<?php bloginfo("pingback_url"); ?>' />
        <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
        <?php wp_head(); ?>
    </head>

    <body>
        <div id='container'>
            <header id='header' role='banner'>
                <h1 id='logo'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></h1>

                <nav id='nav' role='navigation'>
                    
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'link_before' => '<span>', 'link_after' => '</span>', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="end"><a href="/about-us/"><span>关于我们</span></a><a href="/musicwall/"><span>链接</span></a><a href="/submission/"><span class="red">投稿</span></a></li></ul>' ) ); ?>
                </nav>
            </header>

            <div id='main' role='main'>
