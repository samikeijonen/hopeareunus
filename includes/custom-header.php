<?php
/**
 * Set up the WordPress core custom header arguments and settings.
 *
 * @uses add_theme_support() to register support for 3.4 and up.
 * @uses twentythirteen_header_style() to style front-end.
 * @uses twentythirteen_admin_header_style() to style wp-admin form.
 * @uses twentythirteen_admin_header_image() to add custom markup to wp-admin form.
 * @uses register_default_headers() to set up the bundled header images.
 *
 * @since Hopeareunus 0.1.0
 */
function hopeareunus_custom_header_setup() {
	$hopeareunus_header_args = array(
		'flex-height' => true,
		'height' => apply_filters( 'hopeareunus_header_height', 379 ),
		'flex-width' => true,
		'width' => apply_filters( 'hopeareunus_header_width', 1920 ),
		'default-image' => '%s/images/hopeareunus_header_default.jpg',
		'header-text' => false,
		'admin-head-callback' => 'hopeareunus_admin_header_style',
		'admin-preview-callback' => 'hopeareunus_admin_header_image',
	);
	
	add_theme_support( 'custom-header', $hopeareunus_header_args );
	
	/*
	 * Default custom headers packaged with the theme.
	 * %s is a placeholder for the theme template directory URI.
	 */
	register_default_headers( array(
		'computer' => array(
			'url'           => '%s/images/hopeareunus_header_default.jpg',
			'thumbnail_url' => '%s/images/hopeareunus_header_default_thumbnail.jpg',
			'description'   => _x( 'Computer', 'header image description', 'hopeareunus' )
		)
	) );
}
add_action( 'after_setup_theme', 'hopeareunus_custom_header_setup', 15 );

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @since  0.1.0
 */
function hopeareunus_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
		max-width: 60%;
	}
	#headimg img {
		max-width: 90%;
		height: auto;
	}
	</style>
<?php
}

/**
 * Outputs markup to be displayed on the Appearance > Header admin panel.
 * This callback overrides the default markup displayed there.
 *
 * @since  0.1.0
 */
function hopeareunus_admin_header_image() {
	?>
	<div id="headimg">
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }