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
	 <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' /> 
	<!--[if IE]>
	  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<?php wp_head(); ?>

	<style>

		 .sidebar h4 {
		  font-size: 16px;
		  margin: 5px 0;
		  padding-left: 5px;
		  text-align: left;
		}
		.sidebar li {
		  text-align: left;
		  margin-left: 3% !important;
		  font-size: 13px;
		}
		.sidebar div {
		  border-bottom: 1px solid #eee;
		  padding: 10px 0 20px;
		}
		#fscf_submit2{
			border:1px solid #fff;
		}
	</style>

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-68461067-1', 'auto');
  ga('send', 'pageview');
 
</script>
</head>
<body <?php body_class(); ?>>

	<div class="mobile-header">

		<div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo of_get_option('site_logo') ?>">
			</a>
		</div>

		<div class="menu-btn">
			<?php echo do_shortcode('[responsive-menu]'); ?>
		</div>

	</div>

	<header id="site-head">

		<section class="top-bar">
			<div class="content-contain">
				<ul class="flag-links">
					<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/english.jpg"></a></li>
					<!-- <li><a href="#"><img src="<?php // echo get_template_directory_uri(); ?>/assets/images/chinese.jpg"></a></li> -->
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
				