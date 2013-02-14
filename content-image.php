<?php 
/**
 * Image Content Template
 *
 * Template used for 'image' post format.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */
 
do_atomic( 'before_entry' ); // hopeareunus_before_entry ?>

<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php do_atomic( 'open_entry' ); // hopeareunus_open_entry ?>
	
	<?php if ( is_singular() && is_main_query() ) { ?>

		<header class="entry-header">	
			<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
			<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[hopeareunus-post-format-link] published on [entry-published] [entry-comments-link before=" | "] [entry-edit-link before=" | "]', 'hopeareunus' ) . '</div>' ); ?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hopeareunus' ), 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="Tagged "]', 'hopeareunus' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->
		
	<?php } else { ?>
	
		<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'image_class' => 'aligncenter', 'size' => 'full', 'meta_key' => false, 'image_scan' => true, 'before' => '<div class="hopeareunus-image">', 'after' => '</div>' ) ); ?>

		<header class="entry-header">	
			<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
		</header><!-- .entry-header -->
		
		<?php if ( post_format_tools_post_has_content() || has_excerpt() ) { ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php } // end if ?>

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[hopeareunus-post-format-link] published on [entry-published] [entry-permalink before="| "] [entry-comments-link before="| "] [entry-edit-link before="| "]', 'hopeareunus' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->
		
	<?php } ?>

	<?php do_atomic( 'close_entry' ); // hopeareunus_close_entry ?>

</article><!-- .hentry -->
					
<?php do_atomic( 'after_entry' ); // hopeareunus_after_entry ?>