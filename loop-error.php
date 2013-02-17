<?php
/**
 * Loop Error Template
 *
 * Displays an error message when no posts are found.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */
?>
	<div id="post-0" class="<?php hybrid_entry_class(); ?>">

		<div class="entry-content">

			<p><?php _e( 'Apologies, but no entries were found.', 'hopeareunus' ); ?></p>

		</div><!-- .entry-content -->

	</div><!-- .hentry .error -->