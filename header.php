<?php
/**
 * Theme header
 *
 * @package WordPress
 * @version 1.0
 */
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title><?php wp_title('|', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header id="site-head">

		<section class="top-bar">
			<div class="content-contain">
				<ul class="flag-links">
					<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/english.jpg"></a></li>
					<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/chinese.jpg"></a></li>
					<!-- <li><a href="#"><img src="http://placehold.it/20x10"></a></li> -->
					<!-- <li><a href="#"><img src="http://placehold.it/20x10"></a></li>		 -->			
				</ul>
				<?php
				wp_nav_menu( array(
					'menu'              => 'top-links',
					'theme_location'    => 'top-links',
					'depth'             => 0,
					'container'         => 'nav',
					'container_class'   => 'top-links',
					'menu_id'           => '',
					'menu_class'        => 'links',
					'fallback_cb'       => 'wp_page_menu',
					'walker'            => ''
					));
					?>  
				</div>
			</section>

			<section class="header">
				<div class="content-contain">
					<div class="branding">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo of_get_option('site_logo') ?>">
						</a>
					</div>
					<?php
					wp_nav_menu( array(
						'menu'              => 'primary-nav',
						'theme_location'    => 'primary-nav',
						'depth'             => 0,
						'container'         => 'nav',
						'container_class'   => 'primary-nav',
						'menu_id'           => '',
						'menu_class'        => 'nav-items',
						'fallback_cb'       => 'wp_page_menu',
						'walker'            => ''
						));
						?> 
					</div>
				</section>

			</header>
			
			<main id="main-content">
				