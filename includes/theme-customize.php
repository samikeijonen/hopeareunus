<?php
/**
 * Add logo upload, portfolio layout and social links in theme customizer screen.
 *
 * @package Hopealusikka
 * @subpackage Includes
 * @since 0.1.0
 */

/* Add logo upload, portfolio layout and social links in theme customizer screen. */
add_action( 'customize_register', 'hopeareunus_customize_register_logo' );

/**
 * Add logo upload, portfolio layout and social links in theme customizer screen
 *
 * @since 0.1.0
 */
function hopeareunus_customize_register_logo( $wp_customize ) {

	/* Add the logo upload section. */
	$wp_customize->add_section(
		'logo-upload',
		array(
			'title'      => esc_html__( 'Logo Upload', 'hopeareunus' ),
			'priority'   => 60,
			'capability' => 'edit_theme_options'
		)
	);
	
	/* Add the 'logo' setting. */
	$wp_customize->add_setting(
		'logo_upload',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url',
			//'transport'         => 'postMessage'
		)
	);
	
	/* Add custom logo control. */
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'logo_image',
				array(
					'label'    => esc_html__( 'Upload custom logo. Recommended max width is 300px.', 'hopeareunus' ),
					'section'  => 'logo-upload',
					'settings' => 'logo_upload',
			) 
		) 
	);
	
	/* Add the portfolio layout setting. */
	$wp_customize->add_setting(
		'portfolio_layout',
		array(
			'default'           => '3',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_html_class',
			//'transport'         => 'postMessage'
		)
	);
	
	/*Add the layout control. */
		$wp_customize->add_control(
		'portfolio-layout-control',
		array(
			'label'    => esc_html__( 'Portfolio Layout', 'hopeareunus' ),
			'section'  => 'layout',
			'settings' => 'portfolio_layout',
			'type'     => 'radio',
			'choices'  => array(
				'3' => esc_html__( 'Three Columns', 'hopeareunus' ),
				'4' => esc_html__( 'Four Columns', 'hopeareunus' )
			)
		)
	);
		
	/* Add the social links section. */
	$wp_customize->add_section(
		'social-links',
		array(
			'title'      => esc_html__( 'Social Links', 'hopeareunus' ),
			'priority'   => 200,
			'capability' => 'edit_theme_options'
		)
	);
	
	/* Add the twitter link setting. */
	$wp_customize->add_setting(
		'twitter_link',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url',
			//'transport'         => 'postMessage'
		)
	);
	
	/* Add the twitter link control. */
	$wp_customize->add_control(
		'twitter-link',
		array(
			'label'    => esc_html__( 'Twitter URL', 'hopeareunus' ),
			'section'  => 'social-links',
			'settings' => 'twitter_link',
			'priority' => 10,
			'type'     => 'text'
		)
	);
	
	/* Add the facebook link setting. */
	$wp_customize->add_setting(
		'facebook_link',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url',
			//'transport'         => 'postMessage'
		)
	);
	
	/* Add the facebook link control. */
	$wp_customize->add_control(
		'facebook-link',
		array(
			'label'    => esc_html__( 'Facebook URL', 'hopeareunus' ),
			'section'  => 'social-links',
			'settings' => 'facebook_link',
			'priority' => 20,
			'type'     => 'text'
		)
	);
	
	/* Add the rss link setting. */
	$wp_customize->add_setting(
		'rss_link',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url',
			//'transport'         => 'postMessage'
		)
	);
	
	/* Add the rss link control. */
	$wp_customize->add_control(
		'rss-link',
		array(
			'label'    => esc_html__( 'RSS  URL', 'hopeareunus' ),
			'section'  => 'social-links',
			'settings' => 'rss_link',
			'priority' => 30,
			'type'     => 'text'
		)
	);
	
	/* Add the linkedin link setting. */
	$wp_customize->add_setting(
		'linkedin_link',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url',
			//'transport'         => 'postMessage'
		)
	);
	
	/* Add the linkedin link control. */
	$wp_customize->add_control(
		'linkedin-link',
		array(
			'label'    => esc_html__( 'Linkedin URL', 'hopeareunus' ),
			'section'  => 'social-links',
			'settings' => 'linkedin_link',
			'priority' => 40,
			'type'     => 'text'
		)
	);
	
	/* Add the google plus link setting. */
	$wp_customize->add_setting(
		'google_plus_link',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url',
			//'transport'         => 'postMessage'
		)
	);
	
	/* Add the google plus link control. */
	$wp_customize->add_control(
		'google-plus-link',
		array(
			'label'    => esc_html__( 'Google Plus URL', 'hopeareunus' ),
			'section'  => 'social-links',
			'settings' => 'google_plus_link',
			'priority' => 50,
			'type'     => 'text'
		)
	);
	
	/* Add the github link setting. */
	$wp_customize->add_setting(
		'github_link',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url',
			//'transport'         => 'postMessage'
		)
	);
	
	/* Add the github link control. */
	$wp_customize->add_control(
		'github-link',
		array(
			'label'    => esc_html__( 'Github URL', 'hopeareunus' ),
			'section'  => 'social-links',
			'settings' => 'github_link',
			'priority' => 60,
			'type'     => 'text'
		)
	);
	
	/* Add the pinterest link setting. */
	$wp_customize->add_setting(
		'pinterest_link',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url',
			//'transport'         => 'postMessage'
		)
	);
	
	/* Add the pinterest link control. */
	$wp_customize->add_control(
		'pinterest-link',
		array(
			'label'    => esc_html__( 'Pinterest URL', 'hopeareunus' ),
			'section'  => 'social-links',
			'settings' => 'pinterest_link',
			'priority' => 70,
			'type'     => 'text'
		)
	);
	
	/* Add icon size setting. */
	$wp_customize->add_setting(
		'icon_size',
		array(
			'default'           => 'icon-large',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_html_class',
			//'transport'         => 'postMessage'
		)
	);
	
	/* Add icon size control. */
	$wp_customize->add_control(
		'icon-size-control',
		array(
			'label'    => esc_html__( 'Choose icon size', 'hopeareunus' ),
			'section'  => 'social-links',
			'settings' => 'icon_size',
			'type'     => 'radio',
			'priority' => 80,
			'choices'  => array(
				'normal'     => esc_html__( 'Normal', 'hopeareunus' ),
				'icon-large' => esc_html__( 'Icon large', 'hopeareunus' ),
				'icon-2x'    => esc_html__( 'Icon 2x', 'hopeareunus' ),
				'icon-3x'    => esc_html__( 'Icon 3x', 'hopeareunus' ),
				'icon-4x'    => esc_html__( 'Icon 4x', 'hopeareunus' )
			)
		)
	);

}

/**
* Return social links
*
* @since 0.1.0
*/
function hopeareunus_social_links() {

	/* Return if there is social links. */
	
	if ( get_theme_mod( 'twitter_link' ) || get_theme_mod( 'facebook_link' ) || get_theme_mod( 'rss_link' ) || get_theme_mod( 'linkedin_link' ) || get_theme_mod( 'google_plus_link' ) || get_theme_mod( 'github_link' ) || get_theme_mod( 'pinterest_link' ) ) {

		$hopeareunus_output_links = '';
		
		$hopeareunus_output_links = '<div id="hopeareunus-social-links">';

		if ( get_theme_mod( 'twitter_link' ) )
			$hopeareunus_output_links .= '<span class="hopeareunus-social-links"><a class="hopeareunus-social-link" href="' . esc_url( get_theme_mod( 'twitter_link' ) ) . '"><i class="' . esc_attr( apply_filters( 'hopeareunus_link_twitter', 'icon-twitter' ) ) . ' ' . get_theme_mod( 'icon_size' ) . '"></i></a></span>';
		
		if ( get_theme_mod( 'facebook_link' ) )
			$hopeareunus_output_links .= '<span class="hopeareunus-social-links"><a class="hopeareunus-social-link" href="' . esc_url( get_theme_mod( 'facebook_link' ) ) . '"><i class="' . esc_attr( apply_filters( 'hopeareunus_link_facebook', 'icon-facebook' ) ) . ' ' . get_theme_mod( 'icon_size' ) . '"></i></a></span>';
			
		if ( get_theme_mod( 'rss_link' ) )
			$hopeareunus_output_links .= '<span class="hopeareunus-social-links"><a class="hopeareunus-social-link" href="' . esc_url( get_theme_mod( 'rss_link' ) ) . '"><i class="' . esc_attr( apply_filters( 'hopeareunus_link_rss', 'icon-rss' ) ) . ' ' . get_theme_mod( 'icon_size' ) . '"></i></a></span>';
		
		if ( get_theme_mod( 'linkedin_link' ) )
			$hopeareunus_output_links .= '<span class="hopeareunus-social-links"><a class="hopeareunus-social-link" href="' . esc_url( get_theme_mod( 'linkedin_link' ) ) . '"><i class="' . esc_attr( apply_filters( 'hopeareunus_link_linkedin', 'icon-linkedin' ) ) . ' ' . get_theme_mod( 'icon_size' ) . '"></i></a></span>';

		if ( get_theme_mod( 'google_plus_link' ) )
			$hopeareunus_output_links .= '<span class="hopeareunus-social-links"><a class="hopeareunus-social-link" href="' . esc_url( get_theme_mod( 'google_plus_link' ) ) . '"><i class="' . esc_attr( apply_filters( 'hopeareunus_link_google_plus', 'icon-google-plus' ) ) . ' ' . get_theme_mod( 'icon_size' ) . '"></i></a></span>';

		if ( get_theme_mod( 'github_link' ) )
			$hopeareunus_output_links .= '<span class="hopeareunus-social-links"><a class="hopeareunus-social-link" href="' . esc_url( get_theme_mod( 'github_link' ) ) . '"><i class="' . esc_attr( apply_filters( 'hopeareunus_link_github', 'icon-github' ) ) . ' ' . get_theme_mod( 'icon_size' ) . '"></i></a></span>';
	
		if ( get_theme_mod( 'pinterest_link' ) )
			$hopeareunus_output_links .= '<span class="hopeareunus-social-links"><a class="hopeareunus-social-link" href="' . esc_url( get_theme_mod( 'pinterest_link' ) ) . '"><i class="' . esc_attr( apply_filters( 'hopeareunus_link_pinterest', 'icon-pinterest' ) ) . ' ' . get_theme_mod( 'icon_size' ) . '"></i></a></span>';	
	
		$hopeareunus_output_links .= '</div>';
		
	return $hopeareunus_output_links;
	
	}
	
}

?>