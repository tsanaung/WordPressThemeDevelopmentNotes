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
