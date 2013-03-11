<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>
	<meta name="viewport" content="width=750">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri() . '?' . filemtime( TEMPLATEPATH . '/style.css' ); ?>" media="screen">
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico">
	<!-- WP/ --><?php wp_head(); ?><!-- /WP -->
</head>
<body <?php body_class( "page-{$post->post_name}" ); ?>>
	<div id="wrap">
		<header id="head">
			<?php my_logo(); ?>
			
			<?php 
			wp_nav_menu( array(
				'container' => 'nav',
				'container_id' => 'nav',
				'menu_id' => 'menu',
				'fallback_cb' => false,
				'depth' => 2,
			) ); 
			?>

			<ul id="social-menu">
				<li class="social-item"><a href="<?php bloginfo( 'rss2_url' ); ?>"><img src="<?php t_url(); ?>/img/icon-rss.png" alt="RSS" width="16" height="16"></a></li>
				<li class="social-item"><a href="http://twitter.com/19designeditora" target="_blank"><img src="<?php t_url(); ?>/img/icon-tw.png" alt="Twitter" width="16" height="16"></a></li>
				<li class="social-item"><a href="https://www.facebook.com/pages/19-Design-e-Editora-Ltda/101561313252594?fref=ts" target="_blank"><img src="<?php t_url(); ?>/img/icon-fb.png" alt="Facebook" width="16" height="16"></a></li>
			</ul>
		</header>
		<hr>
		<section id="body" class="cf">
			<div id="content" class="cf">
