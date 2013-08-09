<?php 
/**
 * Video Content Template
 *
 * Template used for 'video' post format.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */
 
do_atomic( 'before_entry' ); // hopeareunus_before_entry ?>

<article <?php hybrid_post_attributes(); ?>>

	<?php do_atomic( 'open_entry' ); // hopeareunus_open_entry ?>
	
	<?php if ( is_singular() && is_main_query() ) { ?>

		<header class="entry-header">
			<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
			<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . sprintf( __( '<span class="hopeareunus-post-format-link">[post-format-link]</span> <span class="published-date">[entry-published]</span> %s [entry-edit-link]', 'hopeareunus' ), hybrid_entry_comments_link_shortcode( array( 'before' => '<span class="hopeareunus-comments-link">', 'after' => '</span>' ) ) ) . '</div>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hopeareunus' ), 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="Tagged "]', 'hopeareunus' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->

	<?php } else { ?>
	
		<div class="hopeareunus-video">
			<?php echo hybrid_media_grabber( array( 'type' => 'video' ) ); ?>
		</div>

		<header class="entry-header">
			<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
		</header><!-- .entry-header -->

			<?php if ( has_excerpt() ) { ?>

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

			<?php } ?>

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '<span class="hopeareunus-post-format-link">[post-format-link]</span> published on [entry-published] [entry-permalink before="| "] [entry-comments-link before="| "] [entry-edit-link before="| "]', 'hopeareunus' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->

	<?php } ?>

	<?php do_atomic( 'close_entry' ); // hopeareunus_close_entry ?>

</article><!-- .hentry -->
					
<?php do_atomic( 'after_entry' ); // hopeareunus_after_entry ?>