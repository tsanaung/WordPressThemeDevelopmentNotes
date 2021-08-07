<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LovelyMyanmar
 */

get_header();
?>
	<main id="primary" class="site-main">
		<div class="columns is-gapless">
			<div class="column is-3 card">
				<div class="lsb">
					<div>
					<?php
					$menuParameters = array(
						'menu' 				=> 'smart-nav',
						'theme_location'	=> 'smart-nav',
						'before'			=> '<span class="">',
						'after'				=> '</span>',
						'container'			=> false,
						'echo'				=> false,
						'depth'				=> 0,
					);
					echo strip_tags(wp_nav_menu( $menuParameters ), '<a><span>' ); 
					?>
					</div>
				</div>
			</div>
			<div class="column"></div>
			<div class="column is-two-fifths">
			<div class="p-3 hero is-info"><div class="hero-body"><?php if ( have_posts() ) : the_archive_title( '<p class="title">', '</p>' ); else : echo 'ဘာလာရှာပါသလဲ? ဘာမှမရှိလို့စိတ်မကောင်းပါ...'; endif; ?> </div></div>
				<?php 
				if ( have_posts() ) :
					if ( is_home() && ! is_front_page() ) : single_post_title();
					endif;
					while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					lovelymyanmar_numeric_pagination();
				else : get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>
			<div class="column">
				<?php //get_sidebar(); ?>
			</div>
			<div class="column is-3">
				<aside class="rsb widget-area">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div>
	</main>

<?php
get_footer();
