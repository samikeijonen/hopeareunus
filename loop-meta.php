<?php
/**
 * Loop Meta Template
 *
 * Displays information at the top of the page about archive and search results when viewing those pages.  
 * This is not shown on the home page and singular views.
 *
 * @package    Hopealusikka
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */
?>

	<?php if ( is_home() && !is_front_page() ) : ?>
	
		<div id="hopeareunus-header-title">
			<div class="wrap"> 

				<div class="loop-meta">

					<h1 class="loop-title"><?php echo get_post_field( 'post_title', get_queried_object_id() ); ?></h1>
			
					<?php if( has_excerpt( get_queried_object_id() ) ) { ?>
						<div class="loop-description">
							<?php echo apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', get_queried_object_id() ) ); ?>
						</div><!-- .loop-description -->
					<?php } // End if ?>

				</div><!-- .loop-meta -->
				
			</div><!-- .wrap -->
		</div><!-- #hopeareunus-header-title -->

	<?php elseif ( is_category() ) : ?>
	
		<div id="hopeareunus-header-title">
			<div class="wrap"> 

				<div class="loop-meta">

					<h1 class="loop-title"><?php single_cat_title(); ?></h1>

					<div class="loop-description">
						<?php echo category_description(); ?>
					</div><!-- .loop-description -->

				</div><!-- .loop-meta -->
				
			</div><!-- .wrap -->
		</div><!-- #hopeareunus-header-title -->

	<?php elseif ( is_tag() ) : ?>
	
		<div id="hopeareunus-header-title">
			<div class="wrap"> 

				<div class="loop-meta">

					<h1 class="loop-title"><?php single_tag_title(); ?></h1>

					<div class="loop-description">
						<?php echo tag_description(); ?>
					</div><!-- .loop-description -->

				</div><!-- .loop-meta -->
				
			</div><!-- .wrap -->
		</div><!-- #hopeareunus-header-title -->

	<?php elseif ( is_tax() ) : ?>
	
		<div id="hopeareunus-header-title">
			<div class="wrap"> 

				<div class="loop-meta">

					<h1 class="loop-title"><?php single_term_title(); ?></h1>

					<div class="loop-description">
						<?php echo term_description( '', get_query_var( 'taxonomy' ) ); ?>
					</div><!-- .loop-description -->

				</div><!-- .loop-meta -->
				
			</div><!-- .wrap -->
		</div><!-- #hopeareunus-header-title -->

	<?php elseif ( is_author() ) : ?>
	
		<div id="hopeareunus-header-title">
			<div class="wrap"> 

				<?php $id = get_query_var( 'author' ); ?>

				<div id="hcard-<?php echo esc_attr( get_the_author_meta( 'user_nicename', $id ) ); ?>" class="loop-meta author-profile vcard">

					<div class="loop-description">
				
						<?php echo get_avatar( get_the_author_meta( 'user_email', $id ), '66', '', get_the_author_meta( 'display_name', $id ) ); ?>
				
						<h1 class="loop-title fn n"><?php the_author_meta( 'display_name', $id ); ?></h1>

						<?php echo wpautop( get_the_author_meta( 'description', $id ) ); ?>

					</div><!-- .loop-description -->

				</div><!-- .loop-meta -->
				
			</div><!-- .wrap -->
		</div><!-- #hopeareunus-header-title -->

	<?php elseif ( is_search() ) : ?>
	
		<div id="hopeareunus-header-title">
			<div class="wrap"> 

				<div class="loop-meta">

					<h1 class="loop-title"><?php echo esc_attr( get_search_query() ); ?></h1>

					<div class="loop-description">
						<p>
						<?php printf( __( 'You are browsing the search results for &quot;%1$s&quot;', 'hopeareunus' ), esc_attr( get_search_query() ) ); ?>
						</p>
					</div><!-- .loop-description -->

				</div><!-- .loop-meta -->
				
			</div><!-- .wrap -->
		</div><!-- #hopeareunus-header-title -->

	<?php elseif ( is_day() || is_month() || is_year() ) : ?>
	
		<?php
		if ( is_day() )
			$date = get_the_time( _x( 'F d, Y', 'daily archives date format', 'hopeareunus' ) );
		elseif ( is_month() )
			$date = single_month_title( ' ', false );
		elseif ( is_year() )
			$date = get_the_time( _x( 'Y', 'year archives date format', 'hopeareunus' ) );
		?>
	
		<div id="hopeareunus-header-title">
			<div class="wrap">

				<div class="loop-meta">
					<h1 class="loop-title"><?php _e( 'Archives by date', 'hopeareunus' ); ?></h1>

					<div class="loop-description">
						<?php echo wpautop( sprintf( __( 'You are browsing the site archives for %s.', 'hopeareunus' ), $date ) ); ?>
					</div><!-- .loop-description -->

				</div><!-- .loop-meta -->
				
			</div><!-- .wrap -->
		</div><!-- #hopeareunus-header-title -->

	<?php elseif ( is_post_type_archive() ) : ?>
	
		<div id="hopeareunus-header-title">
			<div class="wrap">

				<?php $post_type = get_post_type_object( get_query_var( 'post_type' ) ); ?>

				<div class="loop-meta">

					<h1 class="loop-title"><?php post_type_archive_title(); ?></h1>

					<div class="loop-description">
						<?php if ( !empty( $post_type->description ) ) echo "<p>{$post_type->description}</p>"; ?>
					</div><!-- .loop-description -->

				</div><!-- .loop-meta -->
				
			</div><!-- .wrap -->
		</div><!-- #hopeareunus-header-title -->

	<?php elseif ( is_archive() ) : ?>
	
		<div id="hopeareunus-header-title">
			<div class="wrap">

				<div class="loop-meta">

					<h1 class="loop-title"><?php _e( 'Archives', 'hopeareunus' ); ?></h1>

					<div class="loop-description">
						<p>
						<?php _e( 'You are browsing the site archives.', 'hopeareunus' ); ?>
						</p>
					</div><!-- .loop-description -->

				</div><!-- .loop-meta -->
				
			</div><!-- .wrap -->
		</div><!-- #hopeareunus-header-title -->

	<?php endif; ?>