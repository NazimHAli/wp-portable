<?php
/**
 * Theme Name Theme Customizer
 *
 * @package Theme_Name
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function theme_slug_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Hide header_image logic
	$wp_customize->get_section( 'header_image' )->active_callback = 'is_home_page';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => get_bloginfo( 'name' ),
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => get_bloginfo( 'description' ),
			)
		);
	}
}
add_action( 'customize_register', 'theme_slug_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function theme_slug_customize_preview_js() {
	$randomNum = rand( 1, 99999999999 );
	wp_enqueue_script( 'theme-slug-customizer', get_template_directory_uri() . '/js/dev-customizer.js', array( 'customize-preview' ), filemtime(), true );
}
add_action( 'customize_preview_init', 'theme_slug_customize_preview_js' );

/**
 * Footer
 */

function footer_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'footer_section',
		array(
			'title'       => 'Footer',
			'description' => 'Edit footer text.',
		)
	);

	$wp_customize->add_setting(
		'footer_title',
		array(
			'type'      => 'theme_mod',
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_control(
		'footer_title_control',
		array(
			'label'       => 'Footer Title',
			'description' => 'Edit footer title text.',
			'section'     => 'footer_section',
			'settings'    => 'footer_title',
			'type'        => 'text',
		)
	);

	$wp_customize->get_setting( 'footer_title' )->transport = 'postMessage';
}
add_action( 'customize_register', 'footer_customize_register' );

/**
 * Header
 */

function header_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'header_section',
		array(
			'title'       => 'Header',
			'description' => 'Edit header styling.',
			'priority'    => 1,
		)
	);

	$wp_customize->add_setting(
		'header_background_color',
		array(
			'type'      => 'theme_mod',
			'transport' => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_background_color_control',
			array(
				'label'    => __( 'Header Background Color', 'mytheme' ),
				'section'  => 'header_section',
				'settings' => 'header_background_color',
			)
		)
	);

	$wp_customize->get_setting( 'header_background_color' )->transport = 'postMessage';
}
add_action( 'customize_register', 'header_customize_register' );
