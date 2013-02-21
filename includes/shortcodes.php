<?php
/**
 * Theme shortcodes. 
 *
 * Note! These are not supposed to be used in post edit screen. Only in template files.
 *
 * @package Hopealusikka
 * @subpackage Includes
 * @since 0.1.0
 */

/* Add shortcode for post format link. */
add_shortcode( 'hopeareunus-post-format-link', 'hopeareunus_post_format_link_shortcode' );

/* Add shortcode for comments link. */
add_shortcode( 'hopeareunus-comments-link', 'hopeareunus_entry_comments_link_shortcode' );

/**
* Returns the output of the [hopeareunus-post-format-link] shortcode. This shortcode is for use when a theme uses the
* post formats feature.
*
* @since 0.1.0
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

	return $attr['before'] . '<a href="' . esc_url( $hopeareunus_url ) . '" class="post-format-icon-link"><span class="hopeareunus-post-format-icon"><i class="' . $hopeareunus_icon . '"></i></span></a>' . $attr['after'];

}

/**
 * Displays a post's number of comments with icon wrapped in a link to the comments area.
 *
 * @since 0.1.0
 *
 * @author Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2008 - 2012, Justin Tadlock
 * @link http://themehybrid.com/hybrid-core
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
function hopeareunus_entry_comments_link_shortcode( $attr ) {

	$comments_link = '';
	$number = doubleval( get_comments_number() );
	$attr = shortcode_atts( array( 'zero' => __( 'Leave a response', 'hybrid-core' ), 'one' => __( '%1$s Response', 'hybrid-core' ), 'more' => __( '%1$s Responses', 'hybrid-core' ), 'css_class' => 'comments-link', 'none' => '', 'before' => '', 'after' => '' ), $attr );

	if ( 0 == $number && !comments_open() && !pings_open() ) {
		if ( $attr['none'] )
			$comments_link = '<span class="' . esc_attr( $attr['css_class'] ) . '">' . sprintf( $attr['none'], number_format_i18n( $number ) ) . '</span>';
	}
	elseif ( 0 == $number )
		$comments_link = '<i class="' . apply_filters( 'hopeareunus_icon_comments', 'icon-comment-alt' ) . '"></i> <a class="' . esc_attr( $attr['css_class'] ) . '" href="' . get_permalink() . '#respond" title="' . sprintf( esc_attr__( 'Comment on %1$s', 'hybrid-core' ), the_title_attribute( 'echo=0' ) ) . '">' . sprintf( $attr['zero'], number_format_i18n( $number ) ) . '</a>';
	elseif ( 1 == $number )
		$comments_link = '<i class="' . apply_filters( 'hopeareunus_icon_comments', 'icon-comment-alt' ) . '"></i> <a class="' . esc_attr( $attr['css_class'] ) . '" href="' . get_comments_link() . '" title="' . sprintf( esc_attr__( 'Comment on %1$s', 'hybrid-core' ), the_title_attribute( 'echo=0' ) ) . '">' . sprintf( $attr['one'], number_format_i18n( $number ) ) . '</a>';
	elseif ( 1 < $number )
		$comments_link = '<i class="' . apply_filters( 'hopeareunus_icon_comments', 'icon-comment-alt' ) . '"></i> <a class="' . esc_attr( $attr['css_class'] ) . '" href="' . get_comments_link() . '" title="' . sprintf( esc_attr__( 'Comment on %1$s', 'hybrid-core' ), the_title_attribute( 'echo=0' ) ) . '">' . sprintf( $attr['more'], number_format_i18n( $number ) ) . '</a>';

	if ( $comments_link )
		$comments_link = $attr['before'] . $comments_link . $attr['after'];

	return $comments_link;
}

?>