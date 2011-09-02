<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
	<!--[if IE]>   
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->

	<title><?php echo $theme->page_title; ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="canonical" href="<?php URL::out(); ?>">
	<link rel="shortcut icon" href="<?php Site::out_url( 'theme' ); ?>/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php Site::out_url( 'theme' ); ?>/img/apple-touch-icon.png">

	<!-- More ideas for your <head> here: h5bp.com/docs/#head-Tips -->

	<!-- Load the stylesheet and your header Javascript -->
	<?php $theme->header(); ?>
</head>

<body>

	<div id="container">
		<header>
			<h1><a href="<?php Site::out_url( 'habari' ); ?>/"><?php Options::out( 'title' ); ?></a></h1>
			<p><?php Options::out( 'tagline' ); ?></p>
			<nav>
				<h3>Menu</h3>
				<ul>
					<li id="home"><?php if( $request->display_home || $request->display_entry ) { echo 'Home'; } else { ?><a href="<?php Site::out_url( 'habari' ); ?>">Home</a><?php } ?></li>
					<?php foreach ( $pages as $page ) : ?>
					<li><?php echo ( isset($post) && $page->id == $post->id ) ? $page->title : '<a href="' . $page->permalink . '" title="' . $page->title . '">' . $page->title . '</a>'; ?></li>
					<?php endforeach; ?>
					<li id="login"><a href="<?php URL::out( 'admin' ); ?>"><?php echo ( $user->loggedin ) ? 'Admin' : 'Login'; ?></a></li>
				</ul>
			</nav>
		</header>
		<div id="main" role="main">