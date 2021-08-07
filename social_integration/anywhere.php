/**
 * I use Bulma CSS framework (https://bulma.io) in this code
 **/

  <div class="fb-like p-3" data-href="<?php echo esc_url( get_permalink()); //the link to like using FB ?>" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="false"></div>
	<footer class="card-footer has-background-white mb-3">
		<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo get_excerpt(339); echo '#LovelyMyanmar lovelymyanmar.com '; echo esc_url( get_permalink() );// You can use get_the_excerpt() instead of get_excerpt() function. ?>" class="card-footer-item has-text-dark has-text-weight-light"> <i class="fab fa-facebook"> &nbsp; Share</i> </a>
		<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>src=sdkpreparse" class="fb-xfbml-parse-ignore card-footer-item has-text-dark has-text-weight-light"> <i class="fab fa-twitter"> &nbsp; Tweet</i> </a>
		<a target="_blank" href="https://t.me/share/url?url=<?php echo get_excerpt(339); echo ' '; echo esc_url( get_permalink() ); ?> /" class="card-footer-item has-text-dark has-text-weight-light"> <i class="fab fa-telegram"> &nbsp; Send</i> </a>
	</footer>
