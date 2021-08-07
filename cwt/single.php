<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				<?php while ( have_posts() ) : the_post(); ?> 
				<figure class="image is-16by9">
					<?php lovelymyanmar_post_thumbnail(); ?>
				</figure>
				<?php the_title( '<p class="entry-title is-size-5 has-text-weight-medium has-text-dark p-2">', '</p>' ); ?>
				<span class="tags has-addons"> <?php echo lovelymyanmar_cat(); echo '<span class="tag is-info">'; echo lovelymyanmar_catcount(); echo '&nbsp; posts</span>'; ?> <span class="tag"> <?php the_time('M j, Y'); ?> </span> </span> 
				
				<div class="entry-content">
					<?php the_content(); ?>
					<p class="is-size-6 px-2 pb-2 has-text-info hashtags"><?php echo get_the_tag_list( $before = '&num;', $sep = '&nbsp;&num;', $after = '&nbsp;', $post_id = 0 ); ?></p>
				</div> 
				<div class="fb-like p-3" data-href="<?php echo esc_url( get_permalink() ); ?>" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="false"></div>
				<footer class="card-footer has-background-white mb-3">
					<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo get_excerpt(339); echo '#LovelyMyanmar lovelymyanmar.com '; echo esc_url( get_permalink() ); ?>" class="card-footer-item has-text-dark has-text-weight-light"> <i class="fab fa-facebook"> &nbsp; Share</i> </a>
					<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>src=sdkpreparse" class="fb-xfbml-parse-ignore card-footer-item has-text-dark has-text-weight-light"> <i class="fab fa-twitter"> &nbsp; Tweet</i> </a>
					<a target="_blank" href="https://t.me/share/url?url=<?php echo get_excerpt(339); echo ' '; echo esc_url( get_permalink() ); ?> /" class="card-footer-item has-text-dark has-text-weight-light"> <i class="fab fa-telegram"> &nbsp; Send</i> </a>
				</footer>
				<div class="p-3 content has-text-centered"><div class="fb-comments" data-href="<?php echo esc_url( get_permalink() ); ?>" data-width="" data-numposts="6"></div></div>
				<?php 
					the_post_navigation(
						array(
							'prev_text' => '<p class="notification card-header has-text-dark is-align-items-center"> <button class="card-header-icon">&LeftAngleBracket;&LeftAngleBracket;</button>' . esc_html__( 'Previous: &nbsp;', 'lovelymyanmar' ) . '%title</p>',
							'next_text' => '<p class="notification card-header has-text-dark is-align-items-center">' . esc_html__( 'Next: &nbsp;', 'lovelymyanmar' ) . '%title <button class="card-header-icon">&RightAngleBracket;&RightAngleBracket;</button></p>',
						)
					);
				?>
			</div>
			<div class="column"> </div>
			<div class="column is-3">
				<aside class="rsb widget-area">
					<!--Related posts by tags -->
					<?php $orig_post = $post; global $post; $tags = wp_get_post_tags($post->ID);
					if ($tags) {
						$tag_ids = array(); foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id; $args=array( 'tag__in' => $tag_ids, 'post__not_in' => array($post->ID), 'posts_per_page'=>6, 'ignore_sticky_posts'=>1 );
						$lovelymyanmar_relatag_query = new wp_query( $args );
						if( $lovelymyanmar_relatag_query->have_posts() ) { 
							echo '<div id="relatedposts">'; 
							while( $lovelymyanmar_relatag_query->have_posts() ) { $lovelymyanmar_relatag_query->the_post(); ?>
							<div class="has-background-light mb-3 pb-3 card"> <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"> <article id="post-<?php the_ID(); ?>" class="has-background-light"> <div> <figure class="image is-16by9"> <?php lovelymyanmar_post_thumbnail(); ?> </figure> </div> <div class="px-2"><?php the_title(); ?> </div> </article> </a> <span class="tag"><?php the_time('M j, Y') ?> </span> <?php lovelymyanmar_cat();?> </div>
					<?php } echo '</div>'; } } $post = $orig_post; wp_reset_query(); endwhile; get_sidebar(); ?>
				</aside>
			</div>
		</div>
	</main>
<?php
//get_sidebar();
get_footer();
