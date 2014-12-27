<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php wp_title() ?></title>

    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/style.css?v20121124">

    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
	<div class="header-wrapper wrapper">
		<nav id="header" class="clearfix">
			<?php if(is_front_page()) { ?>
				<h1 id="sitename">
					<a href="<?php echo home_url() ?>"></a>
				</h1>
			<?php } else { ?>
				<h2 id="sitename">
					<a href="<?php echo home_url() ?>"></a>	
				</h2>
			<?php } ?>

			<ul id="nav">
				<?php wp_nav_menu( array(
						'theme_location' => 'global',
						'items_wrap' => '%3$s',
						'container' => false,
						'menu_id' => 'nav'
					) );
				?>

				<li class="special">
					<a href="/about-us/" class="about">关于我们</a>
					<a href="/musicwall/" class="links">链接</a>
					<a href="/selected/" class="selected" style="color: #c42020">本站精华</a>
				</li>
			</ul>
		</nav>
	</div>

	<div id="main" role="main" class="clearfix">
