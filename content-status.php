<?php 
/**
 * Status Content Template
 *
 * Template used for 'status' post format.
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
			<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hopeareunus' ), 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '<span class="hopeareunus-post-format-link">[post-format-link]</span> updated on [entry-published] [entry-edit-link before="| "]<br />[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="Tagged "]', 'hopeareunus' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->

	<?php } else { ?>

		<header class="entry-header">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_avatar( get_the_author_meta( 'email' ) ); ?></a>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hopeareunus' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hopeareunus' ), 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '<span class="hopeareunus-post-format-link">[post-format-link]</span> published on [entry-published] [entry-permalink before="| "] [entry-comments-link before="| "] [entry-edit-link before="| "]', 'hopeareunus' ) . '</div>' ); ?>
		</footer>

	<?php } ?>

	<?php do_atomic( 'close_entry' ); // hopeareunus_close_entry ?>

</article><!-- .hentry -->
					
<?php do_atomic( 'after_entry' ); // hopeareunus_after_entry ?>