<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LovelyMyanmar
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta property="og:url" content="<?php if ( is_singular() ) : echo esc_url(get_permalink()); else : echo esc_url(bloginfo('url')); endif; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php if ( is_singular() ) : echo esc_html(the_title()); else : echo esc_html(bloginfo('name')); endif; ?>" />
	<meta property="og:description" content="<?php if ( is_singular() ) : echo esc_html(get_excerpt(429)); else : echo esc_html(bloginfo('description')); endif; ?>" />
	<meta property="og:image" content="<?php if ( is_singular() ) : echo get_the_post_thumbnail_url(); else : echo get_theme_mod( 'lovelymyanmar_fb_img' ); endif; ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0&appId=<?php echo get_theme_mod( 'lovelymyanmar_fb_appid' );?>&autoLogAppEvents=1" nonce="XkGYQwQf"></script>

	<?php wp_body_open(); ?>
	<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<?php the_custom_logo(); ?>
			<div class="lmm-sitenanme">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>

			<button id="lmmnav" role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" onclick="lmmnav()">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</button>
		</div>	
		<div class="navbar-menu">
			<div class="navbar-end">
			<?php
			$menuParameters = array(
				'menu' 				=> 'header-nav',
				'theme_location'	=> 'header-nav',
				'before'			=> '<span class="navbar-item menu-item">',
				'after'				=> '</span>',
				'container'			=> false,
				'echo'				=> false,
				'depth'				=> 0,
			);
			echo strip_tags(wp_nav_menu( $menuParameters ), '<span><a>' ); //<a><span><div>
			?>
			</div>
		</div>	
		</nav> 
