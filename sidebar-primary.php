<?php
/**
 * Primary Sidebar Template
 *
 * Displays widgets for the Primary dynamic sidebar if any have been added to the sidebar through the 
 * widgets screen in the admin by the user. Otherwise, nothing is displayed.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */

if ( is_active_sidebar( 'primary' ) ) : ?>

	<?php do_atomic( 'before_sidebar_primary' ); // hopeareunus_before_sidebar_primary ?>

	<aside id="sidebar-primary" class="sidebar" role="complementary">

		<?php do_atomic( 'open_sidebar_primary' ); // hopeareunus_open_sidebar_primary ?>

		<?php dynamic_sidebar( 'primary' ); ?>

		<?php do_atomic( 'close_sidebar_primary' ); // hopeareunus_close_sidebar_primary ?>

	</aside><!-- #sidebar-primary .sidebar -->

	<?php do_atomic( 'after_sidebar_primary' ); // hopeareunus_after_sidebar_primary ?>

<?php endif; ?>