<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Theme Updater
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'http://foxland.fi/',     // Site where EDD is hosted
		'item_name'      => 'Hopeareunus',            // Name of theme
		'theme_slug'     => 'hopeareunus',            // Theme slug
		'version'        => HOPEAREUNUS_VERSION,      // The current version of this theme
		'author'         => 'Easy Digital Downloads', // The author of this theme
		'download_id'    => '',                       // Optional, used for generating a license renewal link
		'renew_url'      => ''                        // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'hopeareunus' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'hopeareunus' ),
		'license-key'               => __( 'License Key', 'hopeareunus' ),
		'license-action'            => __( 'License Action', 'hopeareunus' ),
		'deactivate-license'        => __( 'Deactivate License', 'hopeareunus' ),
		'activate-license'          => __( 'Activate License', 'hopeareunus' ),
		'status-unknown'            => __( 'License status is unknown.', 'hopeareunus' ),
		'renew'                     => __( 'Renew?', 'hopeareunus' ),
		'unlimited'                 => __( 'unlimited', 'hopeareunus' ),
		'license-key-is-active'     => __( 'License key is active.', 'hopeareunus' ),
		'expires%s'                 => __( 'Expires %s.', 'hopeareunus' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'hopeareunus' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'hopeareunus' ),
		'license-key-expired'       => __( 'License key has expired.', 'hopeareunus' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'hopeareunus' ),
		'license-is-inactive'       => __( 'License is inactive.', 'hopeareunus' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'hopeareunus' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'hopeareunus' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'hopeareunus' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'hopeareunus' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'hopeareunus' )
	)

);