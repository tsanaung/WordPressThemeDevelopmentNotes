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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  
	<?php wp_body_open(); ?>
  
	<header class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<?php the_custom_logo(); ?>
			<div class="lmm-sitenanme">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>
			<button role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" onclick="lmmnav()">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</button>
		</div>	
		<div id="lmmnav" class="navbar-menu">
			<div class="navbar-start">
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
		</header>

	<div id="sticat" class="has-background-light">
		<?php
		$menuParameters = array(
			'menu' => 'smart-nav',
			'theme_location'  => 'smart-nav',
			'link_before'     => '<span>',
			'link_after'      => ' &#187; </span>', 
			'container'       => false,
			'echo'            => false,
			'depth'           => 0,
		);
		echo strip_tags(wp_nav_menu( $menuParameters ), '<span><a>' );
		?>
	</div>
