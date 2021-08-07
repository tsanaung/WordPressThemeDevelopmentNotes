<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
//get_sidebar();
get_footer(); 
