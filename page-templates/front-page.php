<?php
/**
 * Template Name: Front Page
 *
 * This is the Front Page template. It is used to show your latest posts and portfolios. It has own sidebar 'front-page'.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // hopeareunus_before_content ?>
	
	<?php get_sidebar( 'front-page' ); // Loads the sidebar-front-page.php template. ?>

	<div id="content" role="main">

		<?php do_atomic( 'open_content' ); // hopeareunus_open_content ?>

		<div class="hfeed">
		
			<?php
			/* Set custom query to show latest posts. */
			$hopeareunus_posts_args = apply_filters( 'hopeareunus_front_page_post_arguments', array(
				'post_type' => 'post',
				'posts_per_page' => get_theme_mod( 'portfolio_layout' ),
				'ignore_sticky_posts' => 1
			) );
			
			$hopeareunus_posts = new WP_Query( $hopeareunus_posts_args );
			?>

			<?php $hopeareunus_latest_posts = esc_attr( apply_filters( 'hopeareunus_front_page_latest_posts', __( 'Latest News', 'hopeareunus' ) ) ); ?>
			
			<h3 id="hopeareunus-latest-posts"><?php printf( __( '%1$s', 'hopeareunus' ), $hopeareunus_latest_posts ); ?></h3>
			
			<div class="hopeareunus-latest-wrap">
			
			<?php if ( $hopeareunus_posts->have_posts() ) : ?>

				<?php while ( $hopeareunus_posts->have_posts() ) : $hopeareunus_posts->the_post(); ?>
				
					<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?><?php if ( get_theme_mod( 'portfolio_layout' ) ) echo ' hopeareunus-front-page-latest hopeareunus-latest-layout-' . get_theme_mod( 'portfolio_layout' ); ?>">

					<?php do_atomic( 'open_entry' ); // hopeareunus_open_entry ?>
	
						<header class="entry-header">
							<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'hopeareunus-thumbnail-portfolio-3', 'image_class' => 'hopeareunus-thumbnail-front-page', 'width' => 386, 'height' => 238, 'default_image' => trailingslashit( get_template_directory_uri() ) . 'images/archive_default.png' ) ); ?>
						</header><!-- .entry-header -->
		
						<div class="entry-summary">
							<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title tag="h2"]' ); ?>
						</div><!-- .entry-summary -->

						<?php do_atomic( 'close_entry' ); // hopeareunus_close_entry ?>

					</article><!-- .hentry -->
					
					<?php do_atomic( 'after_entry' ); // hopeareunus_after_entry ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

			<?php endif; wp_reset_query(); // reset query. ?>
							
			</div><!-- .hopeareunus-front-page-latest-posts -->
			
			<?php
			
			/* Show only if Custom Content Portfolio Plugin is installed. */
			if( function_exists( 'ccp_register_post_types' ) ) :
			
			/* Set custom query to show portfolio items. */
			$hopeareunus_portfolio_args = apply_filters( 'hopeareunus_front_page_portfolio_arguments', array(
				'post_type' => 'portfolio_item',
				'posts_per_page' => get_theme_mod( 'portfolio_layout' )
			) );
			
			$hopeareunus_portfolios = new WP_Query( $hopeareunus_portfolio_args );
			?>

			<?php $hopeareunus_latest_portfolio = esc_attr( apply_filters( 'hopeareunus_front_page_latest_portfolio', __( 'Latest Portfolios', 'hopeareunus' ) ) ); ?>
			
			<h3 id="hopeareunus-latest-portfolio"><?php printf( __( '%1$s', 'hopeareunus' ), $hopeareunus_latest_portfolio ); ?></h3>
			
			<div class="hopeareunus-latest-wrap">
			
			<?php if ( $hopeareunus_portfolios->have_posts() ) : ?>

				<?php while ( $hopeareunus_portfolios->have_posts() ) : $hopeareunus_portfolios->the_post(); ?>
				
					<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?><?php if ( get_theme_mod( 'portfolio_layout' ) ) echo ' hopeareunus-front-page-latest hopeareunus-latest-layout-' . get_theme_mod( 'portfolio_layout' ); ?>">

					<?php do_atomic( 'open_entry' ); // hopeareunus_open_entry ?>
	
						<header class="entry-header">
							<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'hopeareunus-thumbnail-portfolio-3', 'image_class' => 'hopeareunus-thumbnail-front-page', 'width' => 386, 'height' => 238, 'default_image' => trailingslashit( get_template_directory_uri() ) . 'images/archive_default.png' ) ); ?>
						</header><!-- .entry-header -->
		
						<div class="entry-summary">
							<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title tag="h2"]' ); ?>
						</div><!-- .entry-summary -->

						<?php do_atomic( 'close_entry' ); // hopeareunus_close_entry ?>

					</article><!-- .hentry -->
					
					<?php do_atomic( 'after_entry' ); // hopeareunus_after_entry ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

			<?php endif; wp_reset_query(); // reset query. ?>
							
			</div><!-- .hopeareunus-front-page-latest-posts -->
			
			<?php endif; // End portfolio. ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // hopeareunus_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // hopeareunus_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>