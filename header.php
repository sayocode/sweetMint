<?php
/*
パーツ：ヘッダ
*/
?>
<!DOCTYPE html>
<html
<?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- タイトル（プラグイン出力する場合は削除） -->

	<!-- メタ情報（プラグイン出力する場合は削除） -->
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">


	<!-- スタイルシート -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php if ( is_front_page() && is_home() ) : ?>
<div id="page-container" class="top-page-container animated fadeIn container">
<?php else : ?>
<div id="page-container" class="contents-page-container container">
<?php endif; ?>
<div class="row">

	<!-- ページヘッダ -->
	<header id="site-header">
		<!-- ロゴ -->
		<?php if ( is_front_page() && is_home() ) : ?>
				<div class="site-img parallax-container">
						<div class="parallax">
							<img
								src="<?php echo get_template_directory_uri(); ?>/images/mint.jpg">
						</div>
						<h1 id="site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
							class="site-title">
							<?php bloginfo( 'name' ); ?>
						</a>
					</h1>
					<div class="sns-link right-align">
						<a href="https://darts-shop.sayoko-ct.com/"
							class="sns-instagram btn-floating waves-effect waves-light green accent-5" target="_blank">
							<i class="fas fa-shopping-cart"></i>
						</a>
						<a href="https://www.instagram.com/okoyas_sayoko/"
							class="sns-instagram btn-floating waves-effect waves-light green accent-5" target="_blank">
							<i class="fab fa-instagram"></i>
						</a>
						<a href="https://github.com/sayocode"
							class="sns-github btn-floating waves-effect waves-light green accent-5" target="_blank">
							<i class="fab fa-github"></i>
						</a>
						<a href="https://soundcloud.com/okoyas_sayoko"
							class="sns-soundcloud btn-floating waves-effect waves-light green accent-5" target="_blank">
							<i class="fab fa-soundcloud"></i>
						</a>
					</div>
				</div>
				<div class="brown darken-3" style="height:30px;">&ensp;</div>

		<?php else : ?>
		<?php endif; ?>
		<!-- /ロゴ -->

		<!-- グローバルナビ -->
			<div id="site-nav">
				<nav class="white">
					<div class="nav-wrapper">
						<a href="<?php echo home_url('/'); ?>" class="brand-logo" id="navBrandLogo">
							<?php echo bloginfo( 'name' ); ?>
						</a>
						<a href data-target="mobile-nav" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
						<?php if( has_nav_menu('navber') ) : ?>
						<ul class="menu right hide-on-med-and-down">
							<li class="top-nav">
							<?php 
								$defaults = array(
									'menu'		  => '',
									'menu_class'	  => 'center-align dropable-nav col s12 right',
									'menu_id'		=> 'frontNav',
									'container'	=> '',
									'container_class' => '',
									'container_id'  => '',
									'fallback_cb'	=> 'wp_page_menu',
									'before'		  => '',
									'after'		=> '',
									'link_before'	=> '',
									'link_after'	  => '',
									'echo'		  => true,
									'depth'		=> 2,
									'walker'		  => '',
									'theme_location'  => '',
									'items_wrap'	  => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								);
								wp_nav_menu($defaults); ?>
							<?php endif; ?>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		<!-- /グローバルナビ -->
	</header>
	<!-- /ページヘッダ -->
