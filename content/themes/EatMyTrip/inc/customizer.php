<?php
/**
 * brasserie  Theme Customizer
 *
 * @package brasserie
 * @link http://ottopress.com/tag/customizer/
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 */

/**
 * Adds Homepage Promotional Bar Options
 */
function brasserie_customizer_2( $wp_customize ) {

	$wp_customize->add_setting(
	    'featured_textbox_2', array(
	    'default' => __( 'Default Featured Text', 'brasserie' ),
		'transport' => 'postMessage',
	    'sanitize_callback' => 'brasserie_sanitize_text',
	    )
	);
	$wp_customize->add_setting(
	    'featured_btn_textbox_2', array(
	    'default' => __( 'Find Out More', 'brasserie' ),
		'transport' => 'postMessage',
	    'sanitize_callback' => 'brasserie_sanitize_text',
	    )
	);
   	$wp_customize->add_setting( 'featured_button_url_2', array(
        'sanitize_callback' => 'brasserie_sanitize_text',
    ) );

    $wp_customize->add_control(
	    'featured_textbox_2', array(
	    'label'    => __( 'Featured Text 2', 'brasserie' ),
	    'section' => 'featured_section_top',
	    'type' => 'text',
		'priority'	 => 100,
	    )
	);

	$wp_customize->add_control(
	    'featured_btn_textbox_2', array(
	    'label'    => __( 'Button Text 2', 'brasserie' ),
	    'section' => 'featured_section_top',
	    'type' => 'text',
	    'priority'	 => 100,
	    )
	);
	$wp_customize->add_control(
		'featured_button_url_2',
		array(
			'label'    => __( 'URL Link to Page 2', 'brasserie' ),
			'section' => 'featured_section_top',
			'type' => 'text',
			'priority'	 => 100,
		)
	);
}
add_action( 'customize_register', 'brasserie_customizer_2' );

/*
 *
 * Feature Text Boxes
 *
 */
function brasserie_feature_text_boxes_options_2( $wp_customize ){

	$list_feature_modules = array( // 1
		'one'		=> __( 'Feature Text Box 1', 'brasserie' ),
		'two'		=> __( 'Feature Text Box 2', 'brasserie' ),
		'three'		=> __( 'Feature Text Box 3', 'brasserie' ),
	);
	$wp_customize->add_section( 'brasserie_customizer_feature_text_boxes', array(
		'title'    => __( 'Homepage - Feature Text Boxes', 'brasserie' ),
		'description'    => __( 'You can populate up to 3 Feature Text boxes', 'brasserie' ),
		'panel'		=> 'brasserie_homepage_panel',
	));
	$i_priority = 1;

	foreach ($list_feature_modules as $key => $value) {

		/* Add sub title */
		$wp_customize->add_setting( 'brasserie_' . $key . '_sub_title', array(
            'sanitize_callback' => 'brasserie_sanitize_text',
        ));
		$wp_customize->add_control(
			new brasserie_sub_title( $wp_customize, 'brasserie_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'brasserie_customizer_feature_text_boxes',
					'settings'  => 'brasserie_' . $key . '_sub_title',
					'priority' 	=> $i_priority++
				)
			)
		);
		/* File Upload */
		$wp_customize->add_setting( 'header-'.$key.'-file-upload', array(
            'sanitize_callback' => 'brasserie_sanitize_upload',
        ) );
		$wp_customize->add_control(
		    new WP_Customize_Upload_Control($wp_customize, 'header-'.$key.'-file-upload', array(
		            'label' => __( 'File Upload', 'brasserie' ),
		            'section' => 'brasserie_customizer_feature_text_boxes',
		            'settings' => 'header-'.$key.'-file-upload',
		            'priority' => $i_priority++
		        )
		    )
		);

		/* URL */
		$wp_customize->add_setting( 'header_'.$key.'_url', array(
		        'default' => __( 'Header URL', 'brasserie' ),
				'sanitize_callback' => 'brasserie_sanitize_text',
			)
		);
		$wp_customize->add_control('header_'.$key.'_url', array(
				'label'    => __( 'Web URL', 'brasserie' ),
				'section' => 'brasserie_customizer_feature_text_boxes',
				'settings' => 'header_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);

		/* Featured Header Text */
		$wp_customize->add_setting('featured_textbox_header_'.$key, array(
		        'default' => __( 'Default featured text Header', 'brasserie' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'brasserie_sanitize_text',
		    )
		);
		$wp_customize->add_control('featured_textbox_header_'.$key, array(
				'label' => __( 'Header text', 'brasserie' ),
				'section' => 'brasserie_customizer_feature_text_boxes',
				'settings' => 'featured_textbox_header_'.$key,
				'type' => 'text',
				'priority' => $i_priority++
			)
		);

		/* Sub Text */
		$wp_customize->add_setting('featured_textbox_text_'.$key, array(
				'default' => __( 'Default featured text', 'brasserie' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'brasserie_sanitize_text',
			)
		);
		$wp_customize->add_control('featured_textbox_text_'.$key, array(
				'label' => __( 'Sub-text', 'brasserie' ),
				'section' => 'brasserie_customizer_feature_text_boxes',
				'settings' => 'featured_textbox_text_'.$key,
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
		/* Add footer bar */
		$wp_customize->add_setting( 'brasserie_' . $key . '_footer', array(
            'sanitize_callback' => 'brasserie_sanitize_text',
        ));
		$wp_customize->add_control(
			new brasserie_footer( $wp_customize, 'brasserie_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'brasserie_customizer_feature_text_boxes',
			'settings'  => 'brasserie_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach
}
//add_action( 'customize_register', 'brasserie_feature_text_boxes_options_2' );

