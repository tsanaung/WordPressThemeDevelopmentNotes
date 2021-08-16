<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Spring_MM
 */

get_header();
?>

<main id="primary" class="site-main">
		<br class="divider"/><br class="divider"/>
		<?php
		if ( have_posts() ) :
			echo '<h2 class="nu">';
			printf( esc_html__( 'Search Results for: %s', 'springmm' ), '<strong>' . get_search_query() . '</strong>' );
			echo '</h2>';
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
