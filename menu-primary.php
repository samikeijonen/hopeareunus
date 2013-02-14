<?php
/**
 * Primary Menu Template
 *
 * Displays the Primary Menu if it has active menu items.
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */

if ( has_nav_menu( 'primary' ) ) : ?>

	<?php do_atomic( 'before_menu_primary' ); // hopeareunus_before_menu_primary ?>

	<nav id="menu-primary" class="menu-container">
		
		<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'hopeareunus' ); ?>"><?php _e( 'Skip to content', 'hopeareunus' ); ?></a></div>
		
		<div class="wrap">

			<?php do_atomic( 'open_menu_primary' ); // hopeareunus_open_menu_primary ?>
			
			<h3 class="menu-toggle"><?php _e( 'Menu', 'hopeareunus' ); ?></h3>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu', 'menu_class' => 'nav-menu', 'menu_id' => 'menu-primary-items', 'fallback_cb' => '' ) ); ?>

			<?php do_atomic( 'close_menu_primary' ); // hopeareunus_close_menu_primary ?>

		</div>

	</nav><!-- #menu-primary .menu-container -->

	<?php do_atomic( 'after_menu_primary' ); // hopeareunus_after_menu_primary ?>

<?php endif; ?>