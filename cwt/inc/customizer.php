<?php
/**
 * LovelyMyanmar Theme Customizer
 *
 * @package LovelyMyanmar
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lovelymyanmar_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	//$wp_customize->add_setting('fb-app-id-c');

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'lovelymyanmar_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'lovelymyanmar_customize_partial_blogdescription',
			)
		);
		/*
		$wp_customize->add_control(
			'text_setting', 
			array(
				'label'   => 'C: Insert your fb app ID',
				'section' => 'fb_app_id_c',
				'type'    => 'text',
				'description' => '<strong>Burmese:</strong>fb app ID ရဖို့ facebook developer account ရှိဖို့လိုပါတယ်၊ မလုပ်တတ်ဘူးဆိုရင် အောက်က linkမှာ ရှင်းပြပေးထားပါတယ်။ <br> https://zoos.icu <br/><strong>English:</strong> If you need help, you can see the tutorial at above link',
			)
		);*/
	}
}
add_action( 'customize_register', 'lovelymyanmar_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function lovelymyanmar_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function lovelymyanmar_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lovelymyanmar_customize_preview_js() {
	wp_enqueue_script( 'lovelymyanmar-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'lovelymyanmar_customize_preview_js' );

/**
 * Create Section, Settings Controls for OG Tags
 **/
function lmm_new_customizer_settings($wp_customize) {
	// Add Section
	$wp_customize->add_section('lovelymyanmar_fb_og', array(
		'title' => 'Social Integration',
		'description' => '',
		'priority' => 10,
		));

	// add a setting for the OG image
	$wp_customize->add_setting('lovelymyanmar_fb_img');
	// Add an image control for the OG image
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lovelymyanmar_fb_img',
	array(
	'label' => 'Fallback OG Image',
	'section' => 'lovelymyanmar_fb_og',
	'settings' => 'lovelymyanmar_fb_img',
	'description' => 'When featured image is not available, the fallback will display as OG image. The aspect ratio of OG image should be 16:09',
	) ) );

	// add a setting for the FB AppID
	$wp_customize->add_setting('lovelymyanmar_fb_appid', array(
		'default' => 'null',
	));
	// Add a text control for the FB AppID
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lovelymyanmar_fb_appid',
	array(
	'label' => 'FB AppID',
	'section' => 'lovelymyanmar_fb_og',
	'settings' => 'lovelymyanmar_fb_appid',
	'description' => 'Insert your FB App ID, it should be NUMBERS only. If your website is integrated with IA platform, it\'s better to use the same app_id which is used for IA.',
	) ) );

	// add a setting for the FB PageLink
	$wp_customize->add_setting('lovelymyanmar_fb_pageurl');
	// Add a text control for FB PageLink
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lovelymyanmar_fb_pageurl',
	array(
	'label' => 'FB Page Link',
	'section' => 'lovelymyanmar_fb_og',
	'settings' => 'lovelymyanmar_fb_pageurl',
	'description' => 'It\'s not related with IA and it will be display as og tag for SEO',
	) ) );
}
add_action('customize_register', 'lmm_new_customizer_settings');
