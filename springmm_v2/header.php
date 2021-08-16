<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spring_MM
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:url" content="http://localhost/wordpress" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<meta property="og:url" content="<?php if ( is_singular() ) : echo esc_url(get_permalink()); else : echo esc_url(bloginfo('url')); endif; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php if ( is_singular() ) : echo esc_html(the_title()); else : echo esc_html(bloginfo('name')); endif; ?>" />
	<meta property="og:description" content="<?php if ( is_singular() ) : echo esc_html(get_excerpt(600)); else : echo esc_html(bloginfo('description')); endif; ?>" />
	<meta property="og:image" content="<?php if ( is_singular() ) : echo get_the_post_thumbnail_url(); else : echo get_theme_mod( 'lovelymyanmar_fb_img' ); endif; ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0&appId=<?php echo get_theme_mod( 'lovelymyanmar_fb_appid' ); ?>&autoLogAppEvents=1" nonce="2elkIMr3"></script>
<nav class="navbar fixed-top">
	<a href="<?php esc_url(bloginfo('url')); ?>">
		<div class="brand">
			<img src="<?php if( has_custom_logo() ): $custom_logo_id = get_theme_mod( 'custom_logo' ); $custom_logo_data = wp_get_attachment_image_src( $custom_logo_id , 'full' ); $custom_logo_url = $custom_logo_data[0]; echo esc_url($custom_logo_url); else: echo esc_url('https://i2.wp.com/zoos.icu/wp-content/uploads/2021/07/cropped-zlpt01.png?fit=192%2C192&ssl=1'); endif; ?>" class="logo"/> 
			<span class="title"><?php bloginfo('name'); ?></span>
		</div>
	</a>
	<div class="nav-content">
		<a href="<?php esc_url(bloginfo('url')); ?>"><span class="nav-content-cell"> <i class="bi bi-house-door nav-icon <?php if ( is_front_page() && is_home() ) { echo 'active-nav'; } elseif ( is_front_page()){ echo 'active-nav'; } elseif ( is_home()){ } else { } ?>"></i> </span></a>
		<a href="<?php echo esc_url(bloginfo('url')).'/library'; ?>"><span class="nav-content-cell"> <i class="bi bi-journal-bookmark nav-icon <?php if ( is_front_page() && is_home() ) {} elseif ( is_archive()){ echo 'active-nav'; } elseif ( is_home()){} else {} ?>" id="library"></i> </span></a>
		<a href="<?php esc_url(bloginfo('url')); ?>"><span class="nav-content-cell"> <i class="bi bi-file-richtext nav-icon <?php if ( is_front_page() && is_home() ) { } elseif ( is_single()){ echo 'active-nav'; } elseif ( is_home()){ echo 'active-nav'; } else { } ?>"></i> </span></a>
	</div>
	<div class="nav-end">
		<a href="<?php echo get_theme_mod( 'lovelymyanmar_fb_pageurl' ); ?>"><span class="nav-end-cell"><i class="bi bi-flag nav-icon fb"></i></span></a>
		<a href="<?php echo get_theme_mod( 'lovelymyanmar_yt_channelurl' ); ?>"><span class="nav-end-cell"><i class="bi bi-file-play nav-icon yt"></i></span></a>
		<a href="<?php echo get_theme_mod( 'lovelymyanmar_telegram_url' ); ?>"><span class="nav-end-cell"><i class="bi bi-telegram nav-icon tlgrm"></i></span></a>
		<a href="<?php echo get_theme_mod( 'lovelymyanmar_twitter_url' ); ?>"><span class="nav-end-cell hom"><i class="bi bi-twitter nav-icon tweet"></i></span></a>
		<a href="<?php echo esc_url(bloginfo('url')).'/library'; ?>"><span class="nav-end-cell-search"><i class="bi bi-search nav-icon"></i></span></a>
		<span class="nav-end-cell-menu hod"><i type="button" class="bi bi-list nav-icon" id="openMbmenu"></i></span>
	</div>
</nav>
<br class="divider"/>

<scection class="main">
	<div class="lsb slide-top mbmenu">
		<div class="lsb-content">
			<div> 
				<i type="button" class="bi bi-x-circle-fill nav-icon closeMbmenu hod" id="closeMbmenu"></i>
			</div>
			<?php dynamic_sidebar( 'sidebar-2' ); wp_hct();?> 
			<li><a href="<?php echo esc_url(bloginfo('url')).'/privacy-policy'; ?>">Privacy Pilicy</a></li>
		</div>
	</div>
