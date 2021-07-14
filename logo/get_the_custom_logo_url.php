/**
* header.php or anywhere you want to put it in
* Credit: https://www.usablewp.com/learn-wordpress/home-page/how-to-add-the-custom-logo-to-our-wordpress-website/
**/

<?php if( has_custom_logo() ):  ?>
	<?php
  //Get the custom logo URL
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$custom_logo_data = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$custom_logo_url = $custom_logo_data[0];
	?>
	<a href="<?php echo esc_url( home_url( '/', 'https' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
		<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="the-logo" /> 
	</a>
<?php else: ?>
	<?php bloginfo( 'name' ); ?>
<?php endif; ?>
