<?php
/**
 * Archive Portfolio Template
 *
 * This is the portfolio archive template and it is used to show off your portfolio.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // hopeareunus_before_content ?>
	
	<?php
	
	/* Set up default column count (3 and 4). Actually this is not in at the moment. */
	$hopeareunus_archive_portfolio_columns_4 = apply_atomic( 'hopeareunus_archive_portfolio_columns_4', 4 );
	$hopeareunus_archive_portfolio_columns_3 = apply_atomic( 'hopeareunus_archive_portfolio_columns_3', 3 );
	$archive_iterator = 0;
	
	?>

	<div id="content" role="main">

		<?php do_atomic( 'open_content' ); // hopeareunus_open_content ?>

		<div class="hfeed">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
				
				<?php do_atomic( 'before_entry' ); // hopeareunus_before_entry ?>
				
				<?php
				
				/* Decide extra class for 3 and 4 columns layout. */
				if ( $hopeareunus_archive_portfolio_columns_3 > 0 && $archive_iterator > 0 && $archive_iterator % $hopeareunus_archive_portfolio_columns_3 == 0 )
					$hopeareunus_archive_clear_3 = ' hopeareunus-archive-clear-3';
				else
					$hopeareunus_archive_clear_3 = '';
				
				if ( $hopeareunus_archive_portfolio_columns_4 > 0 && $archive_iterator > 0 && $archive_iterator % $hopeareunus_archive_portfolio_columns_4 == 0 )
					$hopeareunus_archive_clear_4 = ' hopeareunus-archive-clear-4';
				else
					$hopeareunus_archive_clear_4 = '';
				
				?>
				
				<div class="hopeareunus-portfolio<?php if ( !empty( $hopeareunus_archive_clear_3 ) ) echo $hopeareunus_archive_clear_3; if ( !empty( $hopeareunus_archive_clear_4 ) ) echo $hopeareunus_archive_clear_4; echo ' hopeareunus-portfolio-layout-', ( get_theme_mod( 'portfolio_layout' ) ? esc_attr( get_theme_mod( 'portfolio_layout' ) ) : '3' ); ?>">

					<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

					<?php do_atomic( 'open_entry' ); // hopeareunus_open_entry ?>
	
						<?php if ( current_theme_supports( 'get-the-image' ) )
							get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'hopeareunus-thumbnail-portfolio-3', 'image_class' => 'featured', 'width' => 386, 'height' => 238, 'default_image' => trailingslashit( get_template_directory_uri() ) . 'images/archive_default.png' ) );
						?>
					
						<div class="hopeareunus-portfolio-image-info">	
				
							<?php echo apply_atomic_shortcode( 'entry_title', the_title( '<h2 class="post-title entry-title">', '</h2>', false ) ); ?>
							<p><?php echo hybrid_entry_terms_shortcode( array( 'taxonomy' => 'portfolio' ) ); ?></p>
						
						</div>

					<?php do_atomic( 'close_entry' ); // hopeareunus_close_entry ?>

					</article><!-- .hentry -->
					
				</div><!-- .hopeareunus-portfolio -->
					
				<?php do_atomic( 'after_entry' ); // hopeareunus_after_entry ?>
				
				<?php $archive_iterator++; // Add +1 after every loop. ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

			<?php endif; ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // hopeareunus_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // hopeareunus_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>