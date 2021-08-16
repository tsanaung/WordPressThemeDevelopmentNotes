<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spring_MM
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<div class="rsb">
		<?php
		dynamic_sidebar( 'sidebar-1' );
		echo '<h2 class="hod">Popular Posts;</h2>';
		$popular_posts_args = array(
		'posts_per_page' => 6,
		'meta_key' => 'springmm_post_viewed',
		'orderby' => 'meta_value_num',
		'order'=> 'DESC'
		);
		
		$popular_posts_loop = new WP_Query( $popular_posts_args );
		
		while( $popular_posts_loop->have_posts() ):
		$popular_posts_loop->the_post(); 
		//cat data
		$springmm_cat = get_the_category(); 
		$springmm_cat_id = $springmm_cat[0]->cat_ID;
		$springmm_catname = $springmm_cat[0]->name; 
		$springmm_catlink = get_category_link( $springmm_cat_id ); 
		$springmm_cat_data = get_option("category_$springmm_cat_id");
		$springmm_cat_imgurl = $springmm_cat_data['img'];
		$springmm_catpostcount = $springmm_cat[0]->count;
		// Loop goes here ?>
		<div class="loopin-sb"><div class="nu">
			<div class="loop-cont-header-brand">
				<a href="<?php echo $springmm_catlink; ?>"><img src="<?php if (isset($springmm_cat_imgurl)){ echo $springmm_cat_imgurl; } ?>" class="cat-inloop"/></a>
				<div><span class="cat-clamp1"><a href="<?php echo $springmm_catlink; ?>">&nbsp;<strong><?php echo $springmm_catname; ?></strong></a> <?php echo get_the_tag_list( $before = 'with&nbsp;', $sep = '&nbsp;'); ?></span><br/><span class="date-inloop">&nbsp;&nbsp;<?php the_time('M j, Y'); ?>&nbsp;&ctdot;&nbsp;<i class="bi bi-patch-check-fill"></i></span></div>
			</div>
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<?php springmm_post_thumbnail(); ?>
				<div class="loop-cont neu">
					<span class="pt-inloop ptinsb"><?php echo the_title(); ?></span>
				</div>
				<div class="loop-engage">
					<i class="bi bi-heart-fill emj date-inloop love"></i>
					<i class="bi bi-hand-thumbs-up-fill emj date-inloop thumb">&nbsp;</i>
					<span class="engage-inloop">&nbsp;<?php echo customSetPostViews(get_the_ID()); $post_views_count = get_post_meta( get_the_ID(), 'post_views_count', true ); if ( ! empty( $post_views_count ) ) { echo $post_views_count; } ?> views and <?php echo $springmm_catpostcount; ?> other posts in <?php echo $springmm_catname ?> category.</span>
				</div>
				<div class="share-inloop-cont">
					<div class="share-inloop"><a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo get_excerpt(240); echo '#LovelyMyanmar lovelymyanmar.com '; echo esc_url( get_permalink() ); ?>"> <i class="bi bi-twitter"> &nbsp; Tweet</i> </a></div>
					<div class="share-inloop"><a target="_blank" href="https://t.me/share/url?url=<?php echo get_excerpt(339); echo ' '; echo esc_url( get_permalink() ); ?> /"> <i class="bi bi-telegram"> &nbsp; Send</i> </a></div>
					<div class="share-inloop"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>src=sdkpreparse" class="fb-xfbml-parse-ignore card-footer-item has-text-dark has-text-weight-light"> <i class="bi bi-facebook"> &nbsp; Share</i> </a></div>
				</div>
			</a>
		</div></div>
		
		<?php
		endwhile;
		wp_reset_query();
		?>
		
	</div><br/><br/>
</aside><!-- #secondary --><br/><br/>
