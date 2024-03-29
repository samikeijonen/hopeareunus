<?php
/**
 * Attachment Template
 *
 * This is the default image attachment template.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // hopeareunus_before_content ?>

	<div id="content" role="main">

		<?php do_atomic( 'open_content' ); // hopeareunus_open_content ?>

		<div class="hfeed">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // hopeareunus_before_entry ?>
					
					<article <?php hybrid_post_attributes(); ?>>

						<?php do_atomic( 'open_entry' ); // hopeareunus_open_entry ?>

						<header class="entry-header">	
							<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
						</header><!-- .entry-header -->
						
						<div class="entry-content">
						
							<?php echo wp_get_attachment_image( get_the_ID(), 'full', false, array( 'class' => 'aligncenter' ) ); ?>
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hopeareunus' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hopeareunus' ), 'after' => '</p>' ) ); ?>
							
						</div><!-- .entry-content -->
						
						<footer class="entry-footer">
							<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( 'Published on [entry-published] [entry-edit-link before="| "]', 'hopeareunus' ) . '</div>' ); ?>
						</footer><!-- .entry-footer -->
						
						<?php do_atomic( 'close_entry' ); // hopeareunus_close_entry ?>

					</article><!-- .hentry -->
					
					<?php do_atomic( 'after_entry' ); // hopeareunus_after_entry ?>
					
					<div class="attachment-meta">
					
						<?php $gallery = do_shortcode( sprintf( '[gallery id="%1$s" exclude="%2$s" columns="8"]', $post->post_parent, get_the_ID() ) ); ?>
						
						<?php if ( !empty( $gallery ) ) { ?>
							<div class="image-gallery">
								<h3><?php _e( 'Gallery', 'hopeareunus' ); ?></h3>
								<?php echo $gallery; ?>
							</div>
						<?php } ?>
						
					</div><!-- .attachment-meta -->

					<?php do_atomic( 'after_singular' ); // hopeareunus_after_singular ?>

					<?php comments_template( '/comments.php', true ); // Loads the comments.php template. ?>

				<?php endwhile; ?>

			<?php endif; ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // hopeareunus_close_content ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // hopeareunus_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>