<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
	   Remove this if you use the .htaccess -->
	<!--[if IE]>   
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	
	<title><?php echo $meta_title; ?></title>
	<meta name="description" content="<?php echo $meta_description; ?>">
	<meta name="author" content="Colin Seymour">
	<meta name="keywords" content="<?php echo $meta_tags; ?>">
	
	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="canonical" href="<?php URL::out(); ?>">
	<link rel="shortcut icon" href="<?php Site::out_url( 'theme' ); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php Site::out_url( 'theme' ); ?>/images/apple-touch-icon.png">

	<!-- More ideas for your <head> here: h5bp.com/docs/#head-Tips -->

	<?php $theme->header(); ?>
</head>

<body>

  <div id="container">
    <header>
		<a name="top" id="top"></a>
		<h1><a href="<?php Site::out_url( 'habari' ); ?>/"><?php Options::out( 'title' ); ?></a></h1>
		<p><?php Options::out( 'tagline' ); ?></p>
    </header>
	<div id="main" role="main">