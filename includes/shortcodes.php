<?php
/**
 * Theme shortcodes. 
 *
 * Note! These are not supposed to use in post edit screen. Only in template files.
 *
 * @package Hopealusikka
 * @subpackage Includes
 * @since 0.1.0
 */

/* Add shortcode for post format link. */
add_shortcode( 'hopeareunus-post-format-link', 'hopeareunus_post_format_link_shortcode' );

/**
* Returns the output of the [hopeareunus-post-format-link] shortcode. This shortcode is for use when a theme uses the
* post formats feature.
*
* @since 0.1.0
* @param array $attr The shortcode arguments.
* @return string A link to the post format archive.
*/
function hopeareunus_post_format_link_shortcode( $attr ) {

	$attr = shortcode_atts( array( 'before' => '', 'after' => '' ), $attr );
	
	/* Get font icon. */
	if ( has_post_format( 'audio' ) )
		$hopeareunus_icon = apply_filters( 'hopeareunus_icon_audio', 'icon-play-circle' );
	elseif ( has_post_format( 'chat' ) ) 
		$hopeareunus_icon = apply_filters( 'hopeareunus_icon_chat', 'icon-comments' );
	elseif ( has_post_format( 'aside' ) )
		$hopeareunus_icon = apply_filters( 'hopeareunus_icon_aside', 'icon-eye-open' );
	elseif ( has_post_format( 'image' ) )
		$hopeareunus_icon = apply_filters( 'hopeareunus_icon_image', 'icon-camera' );
	elseif ( has_post_format( 'gallery' ) )
		$hopeareunus_icon = apply_filters( 'hopeareunus_icon_gallery', 'icon-picture' );
	elseif ( has_post_format( 'link' ) )
		$hopeareunus_icon = apply_filters( 'hopeareunus_icon_link', 'icon-link' );
	elseif ( has_post_format( 'quote' ) )
		$hopeareunus_icon = apply_filters( 'hopeareunus_icon_quote', 'icon-quote-right' );
	elseif ( has_post_format( 'status' ) )
		$hopeareunus_icon = apply_filters( 'hopeareunus_icon_status', 'icon-user' );
	elseif ( has_post_format( 'video' ) )
		$hopeareunus_icon = apply_filters( 'hopeareunus_icon_video', 'icon-film' );
		
	$hopeareunus_format = get_post_format();
	$hopeareunus_url = ( empty( $hopeareunus_format ) ? get_permalink() : get_post_format_link( $hopeareunus_format ) );

	return $attr['before'] . '<a href="' . esc_url( $hopeareunus_url ) . '" class="post-format-link"><i class="' . $hopeareunus_icon . '"></i></a>' . $attr['after'];

}

?>