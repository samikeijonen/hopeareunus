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

<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php do_atomic( 'open_entry' ); // hopeareunus_open_entry ?>
	
	<header class="entry-header">
		<?php if ( is_singular() && is_main_query() ) {
			echo apply_atomic_shortcode( 'entry_title', '[entry-title]' );
		}
		else {
			echo apply_atomic_shortcode( 'entry_title', '[entry-title tag="h2"]' ); 
		} 
		?>
		<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[entry-published] by [entry-author] [entry-comments-link before=" | "] [entry-edit-link before=" | "]', 'kultalusikka' ) . '</div>' ); ?>
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