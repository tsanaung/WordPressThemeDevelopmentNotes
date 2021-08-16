<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spring_MM
 */

get_header();
?>
	<main id="primary" class="site-main">
		<br class="divider"/><br class="divider"/>
		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) : single_post_title();
			endif;
			while ( have_posts() ) : 
				the_post(); get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			springmm_numeric_pagination();
		else : get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</main>
		
<?php
get_sidebar();
get_footer();
