/**
* Create section, settings and control
*/
function your_theme_new_customizer_settings($wp_customize) {
	// Add Section
	$wp_customize->add_section('lovelymyanmar_fb_og', array(
		'title' => 'Social Integration',
		'description' => '',
		'priority' => 10,
		));

	// add a setting for the og:image
	$wp_customize->add_setting('lovelymyanmar_fb_img');
	// Add an image control to upload og:image
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lovelymyanmar_fb_img',
	array(
	'label' => 'Fallback OG Image',
	'section' => 'lovelymyanmar_fb_og',
	'settings' => 'lovelymyanmar_fb_img',
	'description' => 'When featured image is not available, the fallback will display as OG image. The aspect ratio of OG image should be 16:09',
	) ) );

	// add a setting for the fb_appid
	$wp_customize->add_setting('lovelymyanmar_fb_appid', array(
		'default' => 'null',
	));
	// Add a text control for fb_appid
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lovelymyanmar_fb_appid',
	array(
	'label' => 'FB AppID',
	'section' => 'lovelymyanmar_fb_og',
	'settings' => 'lovelymyanmar_fb_appid',
	'description' => 'Insert your FB App ID, it should be NUMBERS only. If your website is integrated with IA platform, it\'s better to use the same app_id which is used for IA.',
	) ) );

	// add a setting for the fb_pageurl
	$wp_customize->add_setting('lovelymyanmar_fb_pageurl');
	// Add a text control for fb_pageurl
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lovelymyanmar_fb_pageurl',
	array(
	'label' => 'FB Page Link',
	'section' => 'lovelymyanmar_fb_og',
	'settings' => 'lovelymyanmar_fb_pageurl',
	'description' => 'It\'s not related with IA and it will be display as og tag for SEO',
	) ) );
}
add_action('customize_register', 'your_theme_new_customizer_settings');
