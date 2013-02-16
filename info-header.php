<?php
/**
 * Info Header Template
 *
 * Displays information at the top of the header image. Info can be loop meta or excerpt of a page.
 *
 * @package    Hopealusikka
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */
?>
				
	<?php
				
		if( is_singular( apply_filters( 'hopeareunus_show_excerpt_header_1' , array( 'page', 'portfolio_item' ) ) ) && is_main_query() && has_excerpt( get_queried_object_id() ) ) { ?>
			<div id="hopeareunus-header-title">
				<div class="wrap"> 
					<?php the_excerpt(); ?>
				</div><!-- .wrap -->
			</div><!-- #hopeareunus-header-title -->
		<?php } else {
					get_template_part( 'loop-meta' ); // Loads the loop-meta.php template.
				}
				
	?>