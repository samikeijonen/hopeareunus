<?php
/*
 * Theme Settings
 * 
 * @package Hopeareunus
 * @subpackage Template
 * @since 0.1.0
 */

/* Theme setting page setup. */
add_action( 'admin_menu', 'hopeareunus_theme_admin_setup' );

/* Theme activate license. */
add_action( 'admin_init', 'hopeareunus_theme_activate_license' );

/* Theme deactivate license. */
add_action( 'admin_init', 'hopeareunus_theme_deactivate_license' );

function hopeareunus_theme_admin_setup() {
    
	global $theme_settings_page;
	
	/* Get the theme settings page name. */
	$theme_settings_page = 'appearance_page_theme-settings';

	/* Get the theme prefix. */
	$prefix = hybrid_get_prefix();

	/* Create a settings meta box only on the theme settings page. */
	add_action( 'load-appearance_page_theme-settings', 'hopeareunus_theme_settings_meta_boxes' );

	/* Add a filter to validate/sanitize your settings. */
	add_filter( "sanitize_option_{$prefix}_theme_settings", 'hopeareunus_theme_validate_settings' );

}

/* Adds custom meta boxes to the theme settings page. */
function hopeareunus_theme_settings_meta_boxes() {

	/* Add a custom meta box for customize. */
	add_meta_box(
		'hopeareunus-theme-meta-box-customomize',    // Name/ID
		__( 'Customize', 'hopeareunus' ),            // Label
		'hopeareunus_theme_meta_box_customize',      // Callback function
		'appearance_page_theme-settings',            // Page to load on, leave as is
		'normal',                                    // Which meta box holder?
		'high'                                       // High/low within the meta box holder
	);

	/* Add a custom meta box for header. */
	add_meta_box(
		'hopeareunus-theme-meta-box-header',         // Name/ID
		__( 'Header Upload', 'hopeareunus' ),        // Label
		'hopeareunus_theme_meta_box_header',         // Callback function
		'appearance_page_theme-settings',            // Page to load on, leave as is
		'normal',                                    // Which meta box holder?
		'high'                                       // High/low within the meta box holder
	);
	
	/* Add a custom meta box for background. */
	add_meta_box(
		'hopeareunus-theme-meta-box-background',     // Name/ID
		__( 'Background', 'hopeareunus' ),           // Label
		'hopeareunus_theme_meta_box_background',     // Callback function
		'appearance_page_theme-settings',            // Page to load on, leave as is
		'normal',                                    // Which meta box holder?
		'high'                                       // High/low within the meta box holder
	);

	/* Add additional add_meta_box() calls here. */
}

/* Function for displaying the customize meta box. */
function hopeareunus_theme_meta_box_customize() { ?>

	<table class="form-table">

		<!-- Customize -->
		<tr>
			<th>
				<label for="<?php echo hybrid_settings_field_id( 'hopeareunus_customize' ); ?>"><?php _e( 'Customize:', 'hopeareunus' ); ?></label>
			</th>
			<td>
				<p><?php printf( __( 'Want to set Global layout, logo, social links and other features? <a href="%s">Go to Appearance &gt;&gt; Customize</a>. ', 'hopeareunus' ), admin_url( 'customize.php' ) ); ?></p>
			</td>
		</tr>

		<!-- End custom form elements. -->
	</table><!-- .form-table --><?php
	
}

/* Function for displaying the header meta box. */
function hopeareunus_theme_meta_box_header() { ?>

	<table class="form-table">

		<!-- Logo -->
		<tr>
			<th>
				<label for="<?php echo hybrid_settings_field_id( 'hopeareunus_custom_header' ); ?>"><?php _e( 'Custom Header:', 'hopeareunus' ); ?></label>
			</th>
			<td>
				<p><?php printf( __( 'Want to replace or remove default Header? <a href="%s">Go to Appearance &gt;&gt; Header</a>. ', 'hopeareunus' ), admin_url( 'themes.php?page=custom-header' ) ); ?></p>
				<p><?php _e( 'Note! You can overwrite default header image in singular post/page by setting large enough featured image. Feature header size is 1920 x 379 pixels.', 'hopeareunus' ); ?></p>
			</td>
		</tr>

		<!-- End custom form elements. -->
	</table><!-- .form-table --><?php
	
}

/* Function for displaying the background meta box. */
function hopeareunus_theme_meta_box_background() { ?>

	<table class="form-table">

		<!-- Background -->
		<tr>
			<th>
				<label for="<?php echo hybrid_settings_field_id( 'hopeareunus_custom_background' ); ?>"><?php _e( 'Custom background:', 'hopeareunus' ); ?></label>
			</th>
			<td>
				<p><?php printf( __( 'Want to replace or remove default Background? <a href="%s">Go to Appearance &gt;&gt; Background</a>. ', 'hopeareunus' ), admin_url( 'themes.php?page=custom-background' ) ); ?></p>
			</td>
		</tr>

		<!-- End custom form elements. -->
	</table><!-- .form-table --><?php
	
}	

/* Validate theme settings. */
function hopeareunus_theme_validate_settings( $input ) {

	$input['hopeareunus_license_key'] = wp_filter_nohtml_kses( $input['hopeareunus_license_key'] );
	
	/* If new license has been entered, license status must reactivate. */
	$old = hybrid_get_setting( 'hopeareunus_license_key' );
	if( $old && $old != $input['hopeareunus_license_key'] ) {
		delete_option( 'hopeareunus_license_key_status' );
	}

    /* Return the array of theme settings. */
    return $input;
	
}

/* Activate theme license. */
function hopeareunus_theme_activate_license() {

	if( isset( $_POST['hopeareunus_theme_license_activate'] ) ) { 
	 	if( ! check_admin_referer( 'hopeareunus_license_nonce', 'hopeareunus_license_nonce' ) ) 	
			return; // get out if we didn't click the Activate button

		global $wp_version;

		$license = trim( hybrid_get_setting( 'hopeareunus_license_key' ) );
				
		$api_params = array( 
			'edd_action' => 'activate_license', 
			'license' => $license, 
			'item_name' => urlencode( HOPEAREUNUS_SL_THEME_NAME ) 
		);
		
		$response = wp_remote_get( add_query_arg( $api_params, HOPEAREUNUS_SL_STORE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

		if ( is_wp_error( $response ) )
			return false;

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		
		// $license_data->license will be either "active" or "inactive"

		update_option( 'hopeareunus_license_key_status', $license_data->license );

	}
}

/* Deactivate theme license. */
function hopeareunus_theme_deactivate_license() {

	if( isset( $_POST['hopeareunus_theme_license_deactivate'] ) ) { 
	 	if( ! check_admin_referer( 'hopeareunus_license_nonce', 'hopeareunus_license_nonce' ) ) 	
			return; // get out if we didn't click the Deactivate button

		global $wp_version;

		$license = trim( hybrid_get_setting( 'hopeareunus_license_key' ) );
				
		$api_params = array( 
			'edd_action' => 'deactivate_license', 
			'license' => $license, 
			'item_name' => urlencode( HOPEAREUNUS_SL_THEME_NAME ) 
		);
		
		$response = wp_remote_get( add_query_arg( $api_params, HOPEAREUNUS_SL_STORE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

		if ( is_wp_error( $response ) )
			return false;

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		
		/* $license_data->license will be either "deactivated" or "failed". */
		if( $license_data->license == 'deactivated' )
			delete_option( 'hopeareunus_license_key_status' );

	}
}

?>