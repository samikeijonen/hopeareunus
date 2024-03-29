<?php 
/**
 * Content Template
 *
 * Template used to show post content when a more specific template cannot be found.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */
 
do_atomic( 'before_entry' ); // hopeareunus_before_entry ?>

<article <?php hybrid_post_attributes(); ?>>

	<?php do_atomic( 'open_entry' ); // hopeareunus_open_entry ?>
	
	<header class="entry-header">
		<?php if ( is_singular() && is_main_query() ) {
			echo apply_atomic_shortcode( 'entry_title', '[entry-title]' );
		}
		else {
			echo apply_atomic_shortcode( 'entry_title', '[entry-title tag="h2"]' ); 
		} 
		?>
		<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . sprintf( __( '<span class="published-date">[entry-published]</span> [entry-author] %s [entry-edit-link]', 'kultalusikka' ), hybrid_entry_comments_link_shortcode( array( 'before' => '<span class="hopeareunus-comments-link">', 'after' => '</span>' ) ) ) . '</div>' ); ?>
	</header><!-- .entry-header -->
		
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hopeareunus' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hopeareunus' ), 'after' => '</p>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="Tagged "]', 'hopeareunus' ) . '</div>' ); ?>
	</footer><!-- .entry-footer -->

	<?php do_atomic( 'close_entry' ); // hopeareunus_close_entry ?>

</article><!-- .hentry -->
					
<?php do_atomic( 'after_entry' ); // hopeareunus_after_entry ?>