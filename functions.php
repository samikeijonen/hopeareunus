<?php
/**
 * The functions.php file is used to initialize everything in the theme. It controls how the theme is loaded and 
 * sets up the supported features, default actions, and default filters. If making customizations, users 
 * should create a child theme and make changes to its functions.php file (not this one).
 *
 * @package     Hopeareunus
 * @subpackage  Functions
 * @version     0.1.0
 * @author      Sami Keijonen <sami.keijonen@foxnet.fi>
 * @copyright   Copyright (c) 2012, Sami Keijonen
 * @link        https://foxnet-themes.fi
 * @license     http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
/* Load Hybrid Core theme framework. */
require_once( trailingslashit( get_template_directory() ) . 'library/hybrid.php' );
new Hybrid();

/* Theme setup function using 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'hopeareunus_theme_setup' );

/**
 * Theme setup function. This function adds support for theme features and defines the default theme
 * actions and filters.
 *
 * @since 0.1.0
 */
function hopeareunus_theme_setup() {

	/* Get action/filter hook prefix. */
	$prefix = hybrid_get_prefix();
	
	/* Add theme settings. */
	if ( is_admin() )
	    require_once( trailingslashit ( get_template_directory() ) . 'admin/functions-admin.php' );
		
	/* Include theme customize: logo upload. */
	require_once( trailingslashit( get_template_directory() ) . 'includes/theme-customize.php' );

	/* Include theme shortcodes. */
	require_once( trailingslashit( get_template_directory() ) . 'includes/shortcodes.php' );

	/* Add theme support for core framework features. */
	add_theme_support( 'hybrid-core-menus', array( 'primary', 'subsidiary' ) );
	add_theme_support( 'hybrid-core-sidebars', array( 'header', 'primary', 'subsidiary' ) );
	add_theme_support( 'hybrid-core-widgets' );
	add_theme_support( 'hybrid-core-shortcodes' );
	add_theme_support( 'hybrid-core-theme-settings', array( 'about', 'footer' ) );
	add_theme_support( 'hybrid-core-scripts', array( 'comment-reply' ) );
	add_theme_support( 'hybrid-core-styles', array( 'parent', 'style' ) );
	add_theme_support( 'hybrid-core-template-hierarchy' );
	
	/* Add theme support for framework extensions. */
	add_theme_support( 'theme-layouts', array( '1c', '2c-l', '2c-r' ), array( 'default' => '2c-l' ) );
	add_theme_support( 'post-stylesheets' );
	add_theme_support( 'loop-pagination' );
	add_theme_support( 'get-the-image' );
	add_theme_support( 'breadcrumb-trail' );
	add_theme_support( 'cleaner-gallery' );
	add_theme_support( 'cleaner-caption' );
	add_theme_support( 'featured-header' );
	
	/* Add theme support for WordPress features. */
	
	/* Add content editor styles. */
	add_editor_style( 'css/editor-style.css' );
	
	/* Add support for auto-feed links. */
	add_theme_support( 'automatic-feed-links' );

	/* Add theme support for post formats. */
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'image', 'gallery', 'link', 'quote', 'status', 'video' ) );
	
	/* Add custom background feature. */
	add_theme_support( 
		'custom-background',
		array(
			'default-color' => 'ffffff' // Background default color
		)
	);
	
	/* Add support for flexible headers. @link http://make.wordpress.org/themes/2012/04/06/updating-custom-backgrounds-and-custom-headers-for-wordpress-3-4/ */
	$hopeareunus_header_args = array(
		'flex-height' => true,
		'height' => apply_filters( 'hopeareunus_header_height', 379 ),
		'flex-width' => true,
		'width' => apply_filters( 'hopeareunus_header_width', 1920 ),
		'default-image' => trailingslashit( get_template_directory_uri() ) . 'images/hopeareunus_header_default.jpg',
		'header-text' => false,
		'admin-head-callback' => 'hopeareunus_admin_header_style',
		'admin-preview-callback' => 'hopeareunus_admin_header_image',
	);
	
	add_theme_support( 'custom-header', $hopeareunus_header_args );
	
	/* Set up Licence key for this theme. URL: https://easydigitaldownloads.com/docs/activating-license-keys-in-wp-plugins-and-themes */
 
	// this is the URL our updater / license checker pings. This should be the URL of the site with EDD installed.
	define( 'HOPEAREUNUS_SL_STORE_URL', 'http://foxnet-themes.fi' ); // add your own unique prefix to prevent conflicts

	// the name of your product. This should match the download name in EDD exactly.
	define( 'HOPEAREUNUS_SL_THEME_NAME', 'Hopeareunus' ); // add your own unique prefix to prevent conflicts
	
	/* Define current version of hopeareunus. Get it from parent theme style.css. */
	$hopeareunus_theme = wp_get_theme( 'hopeareunus' );
	if ( $hopeareunus_theme->exists() ) {
		define( 'HOPEAREUNUS_VERSION', $hopeareunus_theme->Version ); // Get parent theme hopeareunus version
	}
	
	// load our custom theme updater
	if( !class_exists( 'EDD_SL_Theme_Updater' ) )
		require_once( trailingslashit( get_template_directory() ) . 'includes/EDD_SL_Theme_Updater.php' );
	
	/* Get license key from database. */
	$hopeareunus_get_license = get_option( $prefix . '_theme_settings' ); // This is array.
	$hopeareunus_license = isset( $hopeareunus_get_license['hopeareunus_license_key'] ) ? $hopeareunus_get_license['hopeareunus_license_key'] : '';

	$edd_updater = new EDD_SL_Theme_Updater( array( 
		'remote_api_url' 	=> HOPEAREUNUS_SL_STORE_URL, 	// our store URL that is running EDD
		'version' 			=> HOPEAREUNUS_VERSION, 		// the current theme version we are running
		'license' 			=> $hopeareunus_license, 		// the license key (used get_option above to retrieve from DB)
		'item_name' 		=> HOPEAREUNUS_SL_THEME_NAME,	// the name of this theme
		'author'			=> 'Sami Keijonen'	            // the author's name
		)
	);
	
	/* Set content width. */
	hybrid_set_content_width( 604 );
	add_filter( 'embed_defaults', 'hopeareunus_embed_defaults' );
	
	/* Add respond.js and  html5shiv.js for unsupported browsers. */
	add_action( 'wp_head', 'hopeareunus_respond_html5shiv' );
	
	/* Add custom image sizes. */
	add_action( 'init', 'hopeareunus_add_image_sizes' );
	
	/* Enqueue scripts. */
	add_action( 'wp_enqueue_scripts', 'hopeareunus_scripts_styles' );
	
	/* Disable primary sidebar widgets when layout is one column. */
	add_filter( 'sidebars_widgets', 'hopeareunus_disable_sidebars' );
	add_action( 'template_redirect', 'hopeareunus_one_column' );
	
	/* Add number of subsidiary and front page widgets to body_class. */
	add_filter( 'body_class', 'hopeareunus_subsidiary_classes' );
	add_filter( 'body_class', 'hopeareunus_front_page_classes' );
	
	/* Add infinity symbol to aside post format. */
	add_filter( 'the_content', 'hopeareunus_aside_infinity', 9 );
	
	/* Set customizer transport. */
	add_action( 'customize_register', 'hopeareunus_customize_register' );
	
	/* Add js to customize. */
	add_action( 'customize_preview_init', 'hopeareunus_customize_preview_js' );
	
	/* Add css to customize. */
	add_action( 'wp_enqueue_scripts', 'hopeareunus_customize_preview_css' );
	
	/* Use same taxonomy template. */
	add_filter( 'taxonomy_template', 'hopeareunus_taxonomy_template', 11 );
	
	/* Register additional sidebar to 'front page' page template. */
	add_action( 'widgets_init', 'hopeareunus_register_sidebars' );
	
	/* Use some early Hybrid Core 1.6 proposed HTML5 changes. */
	add_filter( "{$prefix}_sidebar_defaults", 'hopeareunus_sidebar_defaults' );
	
	/* Add new body class if there is attachments. */
	add_filter( 'body_class', 'hopeareunus_add_body_attachments' );

}

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

/**
 * Overwrites the default widths for embeds. This function overwrites what the $content_width variable handles
 * with context-based widths.
 *
 * @since  0.1.0
 * @param  array  $args
 * @return array
 */
function hopeareunus_embed_defaults( $args ) {

	if ( current_theme_supports( 'theme-layouts' ) && '1c' == get_theme_mod( 'theme_layout' ) )
		$args['width'] = 944;

	return $args;
}

/**
 * Function for help to unsupported browsers understand mediaqueries and html5.
 * @link: https://github.com/scottjehl/Respond
 * @link: http://code.google.com/p/html5shiv/
 * @since 0.1.0
 */
function hopeareunus_respond_html5shiv() {
	?>
	
	<!-- Enables media queries and html5 in some unsupported browsers. -->
	<!--[if (lt IE 9) & (!IEMobile)]>
	<script type="text/javascript" src="<?php echo trailingslashit( get_template_directory_uri() ); ?>js/respond/respond.min.js"></script>
	<script type="text/javascript" src="<?php echo trailingslashit( get_template_directory_uri() ); ?>js/html5shiv/html5shiv.js"></script>
	<![endif]-->
	
	<?php
}


/**
 *  Adds custom image sizes for thumbnail images.
 * 
 * @since 0.1.0
 */
function hopeareunus_add_image_sizes() {

	add_image_size( 'hopeareunus-thumbnail-portfolio-4', 220, 156, true );
	add_image_size( 'hopeareunus-thumbnail-portfolio-3', 386, 238, true );
	add_image_size( 'hopeareunus-portfolio', 764, 472, true );
	
}

/**
 * Enqueues scripts and styles.
 *
 * @since 0.1.0
 */
function hopeareunus_scripts_styles() {
	
		/* Adds JavaScript for handling the navigation menu hide-and-show behavior. */
		wp_enqueue_script( 'hopeareunus-navigation',  trailingslashit( get_template_directory_uri() ) . 'js/navigation/navigation.js', array(), '20130209', true );
	
		/* Enqueue FitVids. */
		wp_enqueue_script( 'hopeareunus-fitvids', trailingslashit( get_template_directory_uri() ) . 'js/fitvids/jquery.fitvids.min.js', array( 'jquery' ), '20130219', true );
		
		/* Enqueue Hopeareunus settings. */
		wp_enqueue_script( 'hopeareunus-settings', trailingslashit( get_template_directory_uri() ) . 'js/settings/hopeareunus-settings.js', array( 'jquery', 'hopeareunus-fitvids' ), '20130219', true );
	
		/* Add google font. */
		wp_enqueue_style( 'hopeareunus-fonts', 'http://fonts.googleapis.com/css?family=PT+Sans:400,700', false, '20130212', 'all' );
		
		/* Add Font Awesome fonts. */
		wp_enqueue_style( 'hopeareunus-font-awesome', trailingslashit( get_template_directory_uri() ) . 'css/fontawesome/font-awesome.min.css', false, '20130212', 'all' );
		
		/* Add flexslider js and css to singular portfolio page. */
		if ( is_singular( 'portfolio_item' ) ) {
			
			wp_enqueue_script( 'hopeareunus-flexslider',  trailingslashit( get_template_directory_uri() ) . 'js/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '20130215', true );
			wp_enqueue_script( 'hopeareunus-flexslider-settings', trailingslashit( get_template_directory_uri() ) . 'js/flexslider/settings.flexslider.js', array( 'hopeareunus-flexslider' ), '20130215', true );
			wp_enqueue_style( 'hopeareunus-flexslider-styles', trailingslashit( get_template_directory_uri() ) . 'css/flexslider/flexslider.min.css', false, '20130215', 'all' );
	
		}
	
}

/**
 * Disables sidebars if viewing a one-column page.
 *
 * @since 0.1.0
 * @param array $sidebars_widgets A multidimensional array of sidebars and widgets.
 * @return array $sidebars_widgets
 */
function hopeareunus_disable_sidebars( $sidebars_widgets ) {
	global $wp_query, $wp_customize;

	if ( current_theme_supports( 'theme-layouts' ) && !is_admin() ) {
		if ( ! isset( $wp_customize ) ) {
			if ( '1c' == get_theme_mod( 'theme_layout' ) ) {
				$sidebars_widgets['primary'] = false;
			}
		}
	}

	return $sidebars_widgets;
}

/**
 * Function for deciding which pages should have a one-column layout.
 *
 * @since 0.1.0
 */
function hopeareunus_one_column() {

	if ( !is_active_sidebar( 'primary' ) )
		add_filter( 'theme_mod_theme_layout', 'hopeareunus_theme_layout_one_column' );
		
	elseif ( is_post_type_archive( 'portfolio_item' ) )
		add_filter( 'theme_mod_theme_layout', 'hopeareunus_theme_layout_one_column' );
		
	elseif ( is_tax( 'portfolio' ) )
		add_filter( 'theme_mod_theme_layout', 'hopeareunus_theme_layout_one_column' );
	
	elseif ( is_attachment() && wp_attachment_is_image() && 'default' == get_post_layout( get_queried_object_id() ) )
		add_filter( 'theme_mod_theme_layout', 'hopeareunus_theme_layout_one_column' );

	elseif ( is_page_template( 'page-templates/front-page.php' ) )
		add_filter( 'theme_mod_theme_layout', 'hopeareunus_theme_layout_one_column' );
		
	elseif ( hopeareunus_check_attachments() )
		add_filter( 'theme_mod_theme_layout', 'hopeareunus_theme_layout_one_column' );
}


/**
 * Filters 'get_theme_layout' by returning 'layout-1c'.
 *
 * @since 0.1.0
 * @param string $layout The layout of the current page.
 * @return string
 */
function hopeareunus_theme_layout_one_column( $layout ) {
	return '1c';
}

/**
 * Counts widgets number in subsidiary sidebar and ads css class (.sidebar-subsidiary-$number) to body_class.
 * Used to increase / decrease widget size according to number of widgets.
 * Example: if there's one widget in subsidiary sidebar - widget width is 100%, if two widgets, 50% each...
 * @author Sinisa Nikolic
 * @copyright Copyright (c) 2012
 * @link http://themehybrid.com/themes/sukelius-magazine
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since 0.1.0
 */
function hopeareunus_subsidiary_classes( $classes ) {
    
	if ( is_active_sidebar( 'subsidiary' ) ) {
		
		$the_sidebars = wp_get_sidebars_widgets();
		$num = count( $the_sidebars['subsidiary'] );
		$classes[] = 'sidebar-subsidiary-' . $num;
		
    }
    
    return $classes;
	
}

/**
 * Counts widgets number in front-page sidebar and ads css class (.sidebar-front-page-$number) to body_class.
 * @author Sinisa Nikolic
 * @copyright Copyright (c) 2012
 * @link http://themehybrid.com/themes/sukelius-magazine
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since 0.1.0
 */
function hopeareunus_front_page_classes( $classes ) {
	
	if ( is_active_sidebar( 'front-page' ) && is_page_template( 'page-templates/front-page.php' ) ) {
		
		$the_sidebars = wp_get_sidebars_widgets();
		$num = count( $the_sidebars['front-page'] );
		$classes[] = 'sidebar-front-page-' . $num;
		
    }
    
    return $classes;
	
}

/**
 * Add infinity symbol to aside post format.
 * @author Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2012
 * @link http://justintadlock.com/archives/2012/09/06/post-formats-aside
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since 0.1.0
 */
function hopeareunus_aside_infinity( $content ) {
	
	if ( has_post_format( 'aside' ) && !is_singular() )
		$content .= ' <a href="' . get_permalink() . '">&#8734;</a>';

	return $content;
	
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @since 0.1.0
 * @note: credit goes to TwentyTwelwe theme.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function hopeareunus_customize_register( $wp_customize ) {
	
	if ( ! get_theme_mod( 'logo_upload' ) )
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
}

/**
 * This make Theme Customizer live preview reload changes asynchronously.
 * Used with blogname and blogdescription.
 * @note: credit goes to TwentyTwelwe theme.
 * @since 0.1.0
 */
function hopeareunus_customize_preview_js() {

	wp_enqueue_script( 'hopeareunus-customizer', trailingslashit( get_template_directory_uri() ) . 'js/customize/hopeareunus-customizer.js', array( 'customize-preview' ), '20130209', true );
	
}

/**
 * This make Theme Customizer live preview work with 1 column layout.
 * Used with Primary and Secondary sidebars.
 * 
 * @since 0.1.0
 */
function hopeareunus_customize_preview_css() {
	global $wp_customize;

	if ( is_object( $wp_customize ) )
		wp_enqueue_style( 'hopeareunus-customizer-stylesheet', trailingslashit( get_template_directory_uri() ) . 'css/customize/hopeareunus-customizer.css', false, '20130209', 'all' );
}

/**
 * Use template 'archive-portfolio_item.php' in taxonomy 'portfolio' so that we don't need to duplicate same template content.
 * 
 * @since 0.1.0
 */
function hopeareunus_taxonomy_template( $template  ) {

	if ( is_tax( 'portfolio' ) )
		$template = locate_template( array( 'archive-portfolio_item.php' ) );

	return $template;
	
}

/**
 * Register additional sidebar to 'front page' page template.
 * 
 * @since 0.1.0
 */
function hopeareunus_register_sidebars() {

	/* Register the 'front-page' sidebar. */
	register_sidebar(
		array(
			'id' => 'front-page',
			'name' => __( 'Front Page', 'hopeareunus' ),
			'description' => __( 'Front Page widget area.', 'hopeareunus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-wrap widget-inside">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

}

/**
 * Use HTML5 markup in sidebars.
 *
 * @todo Remember to take of when Hybric Core 1.6 is released.
 * 
 * @since 0.1.0
 */
function hopeareunus_sidebar_defaults( $defaults ) {

	$defaults = array(
		'before_widget' => '<section id="%1$s" class="widget %2$s widget-%2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	);

	return $defaults;
	
}

/**
* Returns a link to the porfolio item URL if it has been set.
*
* @since  0.1.0
*/
function hopeareunus_get_portfolio_item_link() {

	$hopeareunus_portfolio_url = get_post_meta( get_the_ID(), 'portfolio_item_url', true );

	if ( !empty( $hopeareunus_portfolio_url ) )
		return '<span class="hopeareunus-project-url"><a class="hopeareunus-portfolio-item-link" href="' . esc_url( $hopeareunus_portfolio_url ) . '" title="' . the_title( '','', false ) . '">' . __( 'Visit site', 'hopeareunus' ) . ' <i class="' . esc_attr( apply_filters( 'hopeareunus_link', 'icon-hand-right' ) ) . '"></i></a></span>';
	
}

/**
* Get attachment images in flexslider and show it in singular portfolio_item page.
*
* @since  0.1.0
*/
function hopeareunus_display_slides() {

	if ( is_singular( 'portfolio_item' ) ) {

			$defaults = array(
			'order'          => 'ASC',
			'post_type'      => 'attachment',
			'post_parent'    => get_the_ID(),
			'post_mime_type' => 'image',
			'post_status'    => null,
			'numberposts'    => -1,
		);

		$attachments = get_posts( apply_filters( 'hopeareunus_slides_args', $defaults ) );
				
		$output = '';

		if ( $attachments ) {

			$output .= '<div class="flexslider">';
				$output .= '<ul class="slides">';
			
					foreach ( $attachments as $attachment ) {
					$output .= '<li>';
						$output .= wp_get_attachment_image( $attachment->ID, 'hopeareunus-portfolio', false, false );
					$output .= '</li>';
				}

				$output .= '</ul>';
			$output .= '</div><!-- .flexslider -->';

		}
		
	return $output;
	
	}

}

/**
* Add new body class if there is attachments in singular portfolio item.
*
* @since  0.1.0
*/
function hopeareunus_add_body_attachments( $classes ) {

	if ( hopeareunus_check_attachments() )
		$classes[] = 'hopeareunus-portfolio-1';

	return $classes;
	
}

/**
* Check if there is attachment in portfolio item.
*
* @since  0.1.0
*/
function hopeareunus_check_attachments() {

	if ( is_singular( 'portfolio_item' ) ) {

		$args = array(
			'post_type'      => 'attachment',
			'post_parent'    => get_the_ID(),
			'post_mime_type' => 'image',
			'post_status'    => null
		);

		$attachments = get_posts( $args );

		if ( $attachments )
			return true;
		else
			return false;

	}
	
}

?>