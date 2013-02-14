<?php
/**
 * Header Sidebar Template
 *
 * Displays widgets for the Header dynamic sidebar if any have been added to the sidebar through the 
 * widgets screen in the admin by the user. Otherwise, nothing is displayed.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */

if ( is_active_sidebar( 'header' ) ) : ?>

	<?php do_atomic( 'before_sidebar_header' ); // hopeareunus_before_sidebar_header ?>

	<aside id="sidebar-header" class="sidebar">

		<?php do_atomic( 'open_sidebar_header' ); // hopeareunus_open_sidebar_header ?>

		<?php dynamic_sidebar( 'header' ); ?>

		<?php do_atomic( 'close_sidebar_header' ); // hopeareunus_close_sidebar_header ?>

	</aside><!-- #sidebar-header .sidebar -->

	<?php do_atomic( 'after_sidebar_header' ); // hopeareunus_after_sidebar_header ?>

<?php endif; ?>