<?php 
/**
 * Content Portfolio Item Template
 *
 * Template used to show post content when viewing portfolio item.
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
				
				/* Check if there is attachments. */
				if ( hopeareunus_check_attachments() )
					echo '<figure class="hopeareunus-portfolio-gallery">' . hopeareunus_display_slides() . '</figure>';
						
				echo apply_atomic_shortcode( 'entry_title', '[entry-title]' );
			}
			else {
				echo apply_atomic_shortcode( 'entry_title', '[entry-title tag="h2"]' ); 
			} 
			?>
			<?php echo apply_atomic_shortcode( 
				'entry_byline', 
				'<div class="entry-byline">' . 
					hybrid_entry_terms_shortcode( array( 'taxonomy' => 'portfolio', 'before' => __( 'Work:', 'hopeareunus' ) . ' ' ) ) . 
				'</div>'
				); ?>
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hopeareunus' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hopeareunus' ), 'after' => '</p>' ) ); ?>
			<?php echo hopeareunus_get_portfolio_item_link(); // echo portfolio link ?>
		</div><!-- .entry-content -->

		<?php do_atomic( 'close_entry' ); // hopeareunus_close_entry ?>

</article><!-- .hentry -->
					
<?php do_atomic( 'after_entry' ); // hopeareunus_after_entry ?>