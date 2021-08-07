<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LovelyMyanmar
 */
?>

<?php
$lmm_cat = get_the_category(); 
$lmm_catimg_url = $lmm_cat[0]->category_description; 
$lmm_catname = $lmm_cat[0]->name; 
$lmm_catlink = get_category_link( $lmm_cat[0]->cat_ID );
?>
<div class="card is-outlined">
<div class="post-topnav">
	<div class="card-header has-background-white">
		<div class="media-left pl-2 pt-2 pb-2">
		<a href="<?php echo $lmm_catlink; ?>">
			<figure class="image is-48x48 catpro"><img class="is-square is-rounded is-outlined" src="<?php echo $lmm_catimg_url; ?>"/></figure>
		</div>
		<div class="media-content pt-2">
			<p><span class="title is-6"><?php echo $lmm_catname; ?></span></p></a>
			<span class="is-size-7"><?php the_time('M j, Y'); ?> </span> <span class="is-size-7 has-text-info"> &sext; </span> <span class="is-size-7 has-text-dark"> <?php echo lovelymyanmar_catcount(); ?> posts published</span>
		</div>
		<!--span class="card-header-title">Card Header</span-->
		<button class="card-header-icon has-text-weight-bold" aria-label="more options">&ctdot;</button>
	</div>
</div>
<p class="has-text-dark is-size-6 px-2"> <?php echo get_excerpt(339); ?></p>
<p class="is-size-6 px-2 pb-2 has-text-info hashtags"><?php echo get_the_tag_list( $before = '&num;', $sep = '&nbsp;&num;', $after = '&nbsp;', $post_id = 0 ); ?> <a href="<?php echo esc_url( get_permalink() ); ?>" class="is-size-6 has-text-dark">&nbsp;Seemore...</a></p>
<div class="has-background-white">
	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<article id="post-<?php the_ID(); ?>" class="has-background-white">
			<div>
				<figure class="image is-16by9">
					<?php lovelymyanmar_post_thumbnail(); ?>
				</figure>
			</div>
			<div class="has-background-light">
				<?php 
				echo '<p class="entry-title has-text-dark p-2">';
				echo the_title();
				echo '&nbsp;&sext;&nbsp;';
				echo get_the_author_meta('display_name', $author_id);
				echo '</p>';
				?>
			</div> 
		</article>
	</a>
</div> 
  
	<footer class="card-footer has-background-white mb-3">
		<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo get_excerpt(339); echo '#LovelyMyanmar lovelymyanmar.com '; echo esc_url( get_permalink() ); ?>" class="card-footer-item has-text-dark has-text-weight-light"> <i class="fab fa-facebook"> &nbsp; Share</i> </a>
		<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>src=sdkpreparse" class="fb-xfbml-parse-ignore card-footer-item has-text-dark has-text-weight-light"> <i class="fab fa-twitter"> &nbsp; Tweet</i> </a>
		<a target="_blank" href="https://t.me/share/url?url=<?php echo get_excerpt(339); echo ' '; echo esc_url( get_permalink() ); ?> /" class="card-footer-item has-text-dark has-text-weight-light"> <i class="fab fa-telegram"> &nbsp; Send</i> </a>
	</footer>
</div>
