<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spring_MM
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			echo '<br/><br/><div class="nu my306">';

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
			<?php
			//entry meta
			echo '<div class="fb-post-like">';
			springmm_posted_on();
			echo '&nbsp;';
			springmm_posted_by();
			//facebook like&share
			echo '<div class="fb-like" data-href="';
			echo esc_url(get_permalink());
			echo '" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div></div>';
			//Social Shares
			$springmm_current_url = esc_url(get_permalink());
			echo '<div class="share-inloop-cont">';
			echo '<div class="share-inloop"><a href="https://twitter.com/intent/tweet?text='.$springmm_current_url.' #LovelyMyanmar.com LovelyMyanmar.com"><i class="bi bi-twitter"> &nbsp; Tweet</i></a></div>';
			echo '<div class="share-inloop"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$springmm_current_url.'src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="bi bi-facebook">&nbsp;Share</i></a></div>';
			echo '<div class="share-inloop"><a href="https://t.me/share/url?url='.$springmm_current_url.' LovelyMyanmar.com"><i class="bi bi-telegram"> &nbsp; Send</i></a></div>';
			echo '</div>';
			//facebook comments
			echo '<div class="fb-post-like"><div class="fb-comments" data-href="';
			echo esc_url( get_permalink() );
			echo '" data-width="100%" data-numposts="6"></div>';
			echo '</div></div>';
			//Related posts byTags
			$orig_post = $post; global $post; $tags = wp_get_post_tags($post->ID);
			if ($tags) {
				$tag_ids = array(); foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id; $args=array( 'tag__in' => $tag_ids, 'post__not_in' => array($post->ID), 'posts_per_page'=>6, 'ignore_sticky_posts'=>1 );
				$lovelymyanmar_relatag_query = new wp_query( $args );
				if( $lovelymyanmar_relatag_query->have_posts() ) {
					echo '<div id="relatedposts"> <h2>Related posts;</h2>'; 
					while( $lovelymyanmar_relatag_query->have_posts() ) {
						$lovelymyanmar_relatag_query->the_post();
						?>
						<div class="nu my036"> <div class="loop-cont"> <div class="loop-cont-header-brand"> <a href="<?php echo $springmm_catlink; ?>"><img src="<?php if (isset($springmm_cat_imgurl)){ echo $springmm_cat_imgurl; } ?>" class="cat-inloop"/></a> <div><span class="cat-clamp1"><a href="<?php echo $springmm_catlink; ?>">&nbsp;<?php echo $springmm_catname; ?></a> <?php echo get_the_tag_list( $before = 'with&nbsp;', $sep = '&nbsp;'); ?></span><br/><span class="date-inloop">&nbsp;&nbsp;<?php the_time('M j, Y'); ?>&nbsp;&ctdot;&nbsp;<i class="bi bi-patch-check-fill"></i></span></div> </div> <div class="loop-cont-header-menu"> <i class="bi bi-three-dots"></i> </div> </div> <div class="loop-excerpt"> <span class="excerpt"><?php echo get_excerpt(600); ?></span> </div> <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"> <?php springmm_post_thumbnail(); ?> <div class="loop-cont neu"> <div class="pt-inloop-cont"> <span class="pt-inloop"><?php echo the_title(); ?></span> </div> <div class="like-inloop"> <i class="bi bi-check2-all cpb"></i></a> </div> </div> <div class="loop-engage"> <i class="bi bi-heart-fill emj date-inloop love"></i> <i class="bi bi-hand-thumbs-up-fill emj date-inloop thumb">&nbsp;</i> <span class="engage-inloop">&nbsp;<?php echo customSetPostViews(get_the_ID()); $post_views_count = get_post_meta( get_the_ID(), 'post_views_count', true ); if ( ! empty( $post_views_count ) ) { echo $post_views_count; } ?> views and <?php echo $springmm_catpostcount; ?> other posts in <?php echo $springmm_catname ?> category.</span> </div> <div class="share-inloop-cont"> <div class="share-inloop"><a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo get_excerpt(240); echo '#LovelyMyanmar lovelymyanmar.com '; echo esc_url( get_permalink() ); ?>" class="card-footer-item has-text-dark has-text-weight-light"> <i class="bi bi-facebook"> &nbsp; Share</i> </a></div> <div class="share-inloop"><a target="_blank" href="https://t.me/share/url?url=<?php echo get_excerpt(339); echo ' '; echo esc_url( get_permalink() ); ?> /" class="card-footer-item has-text-dark has-text-weight-light"> <i class="bi bi-telegram"> &nbsp; Send</i> </a></div> <div class="share-inloop"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>src=sdkpreparse" class="fb-xfbml-parse-ignore card-footer-item has-text-dark has-text-weight-light"> <i class="bi bi-twitter"> &nbsp; Tweet</i> </a></div> </div></div>
			
			<?php
					} $post = $orig_post; wp_reset_query();
				}
			}
			?>

		<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
