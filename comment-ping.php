<?php
/**
 * Pingback Comment Template
 *
 * The pingback comment template displays an individual pingback comment.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */

	global $post, $comment;
?>

	<li id="comment-<?php comment_ID(); ?>" class="<?php hybrid_comment_class(); ?>">

		<?php do_atomic( 'before_comment' ); // hopeareunus_before_comment ?>

		<div class="comment-wrap">

			<?php do_atomic( 'open_comment' ); // hopeareunus_open_comment ?>

			<?php echo apply_atomic_shortcode( 'comment_meta', '<div class="comment-meta">[comment-author] [comment-published] [comment-permalink before="| "] [comment-edit-link before="| "] [comment-reply-link before="| "]</div>' ); ?>

			<?php do_atomic( 'close_comment' ); // hopeareunus_close_comment ?>

		</div><!-- .comment-wrap -->

		<?php do_atomic( 'after_comment' ); // hopeareunus_after_comment ?>

	<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>