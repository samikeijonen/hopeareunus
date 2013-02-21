<?php
/**
 * Loop Nav Template
 *
 * This template is used to show your your next/previous post links on singular pages and
 * the next/previous posts links on the home/posts page and archive pages.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */
?>

	<?php if ( is_attachment() ) : ?>

		<div class="loop-nav">
			<?php previous_post_link( '%link', '<span class="previous">' . __( '<span class="meta-nav">&larr;</span> Return to entry', 'hopeareunus' ) . '</span>' ); ?>
		</div><!-- .loop-nav -->

	<?php elseif ( is_singular( array( 'post', 'portfolio_item' ) ) ) : ?>

		<div class="loop-nav">
			<?php previous_post_link( '%link', '<span class="previous"><i class="' . apply_filters( 'hopeareunus_icon_previous', 'icon-chevron-left' ) . '"></i></span>' ); ?>
			<?php next_post_link( '%link', '<span class="next"><i class="' . apply_filters( 'hopeareunus_icon_next', 'icon-chevron-right' ) . '"></i></span>' ); ?>
		</div><!-- .loop-nav -->

	<?php elseif ( !is_singular() && current_theme_supports( 'loop-pagination' ) ) : loop_pagination( array( 'prev_text' => '<span class="meta-nav"><i class="' . apply_filters( 'hopeareunus_icon_previous', 'icon-chevron-left' ) . '"></i></span>', 'next_text' => '<span class="meta-nav"><i class="' . apply_filters( 'hopeareunus_icon_next', 'icon-chevron-right' ) . '"></i></span>' ) ); ?>

	<?php elseif ( !is_singular() && $nav = get_posts_nav_link( array( 'sep' => '', 'prelabel' => '<span class="previous"><span class="meta-nav"><i class="' . apply_filters( 'hopeareunus_icon_previous', 'icon-chevron-left' ) . '"></i></span></span>', 'nxtlabel' => '<span class="next"><span class="meta-nav"><i class="' . apply_filters( 'hopeareunus_icon_next', 'icon-chevron-right' ) . '"></i></span></span>' ) ) ) : ?>

		<div class="loop-nav">
			<?php echo $nav; ?>
		</div><!-- .loop-nav -->

	<?php endif; ?>