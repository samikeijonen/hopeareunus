<?php 
/**
 * Gallery Content Template
 *
 * Template used for 'gallery' post format.
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
			<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[hopeareunus-post-format-link] [post-format-link] <i class="icon-time"></i> [entry-published] [hopeareunus-comments-link] [entry-edit-link before=" | "]', 'hopeareunus' ) . '</div>' ); ?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hopeareunus' ), 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="Tagged "]', 'hopeareunus' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->
		
	<?php } else { ?>
	
		<div class="hopeareunus-gallery">
			<?php echo do_shortcode( '[gallery numberposts="3" orderby="rand" size="hopeareunus-thumbnail-portfolio-4"]' ); ?>
		</div><!-- .hopeareunus-gallery -->

		<header class="entry-header">	
			<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hopeareunus' ), 'after' => '</p>' ) ); ?>
		
			<?php $hopeareunus_image_count = post_format_tools_get_image_attachment_count(); ?>
			<p class="image-count"><?php printf( _n( 'This gallery contains %s image.', 'This gallery contains %s images.', $hopeareunus_image_count, 'hopeareunus' ), $hopeareunus_image_count ); ?></p>
		
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[hopeareunus-post-format-link] [post-format-link] published on [entry-published] [entry-permalink before="| "] [entry-comments-link before="| "] [entry-edit-link before="| "]', 'hopeareunus' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->
		
	<?php } ?>

	<?php do_atomic( 'close_entry' ); // hopeareunus_close_entry ?>

</article><!-- .hentry -->
					
<?php do_atomic( 'after_entry' ); // hopeareunus_after_entry ?>