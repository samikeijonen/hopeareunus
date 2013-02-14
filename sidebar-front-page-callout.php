<?php
/**
 * Front Page Callout Sidebar Template
 *
 * Displays widgets for the Front Page Callout dynamic sidebar if any have been added to the sidebar through the 
 * widgets screen in the admin by the user. Otherwise, nothing is displayed.
 *
 * @package    Hopealusikka
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */

if ( is_active_sidebar( 'front-page-callout' ) ) : ?>

	<?php do_atomic( 'before_sidebar_front_page_callout' ); // hopeareunus_before_sidebar_front_page_callout ?>

	<div id="sidebar-front-page-callout" class="sidebar">

		<?php do_atomic( 'open_sidebar_front_page_callout' ); // hopeareunus_open_sidebar_front_page_callout ?>
		
			<?php dynamic_sidebar( 'front-page-callout' ); ?>

		<?php do_atomic( 'close_sidebar_front_page_callout' ); // hopeareunus_close_sidebar_front_page_callout ?>

	</div><!-- #sidebar-front-page-callout .sidebar -->

	<?php do_atomic( 'after_sidebar_front_page_callout' ); // hopeareunus_after_sidebar_front_page_callout ?>

<?php endif; ?>