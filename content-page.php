<?php 
/**
 * Page Content Template
 *
 * Template used to show the content of posts with the 'page' post type.
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
			echo apply_atomic_shortcode( 'entry_title', the_title( '<h1 class="entry-title">', '</h1>', false ) );
		}
		else {
			echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); 
		} 
		?>
	</header><!-- .entry-header -->
		
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hopeareunus' ), 'after' => '</p>' ) ); ?>
	</div><!-- .entry-content -->

	<?php if ( is_user_logged_in() ) { ?>
		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>
		</footer><!-- .entry-footer -->
	<?php } // End if. ?> 

	<?php do_atomic( 'close_entry' ); // hopeareunus_close_entry ?>

</article><!-- .hentry -->
					
<?php do_atomic( 'after_entry' ); // hopeareunus_after_entry ?>