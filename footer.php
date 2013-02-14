<?php
/**
 * Footer Template
 *
 * The footer template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the bottom of the file. It is used mostly as a closing
 * wrapper, which is opened with the header.php file. It also executes key functions needed
 * by the theme, child themes, and plugins. 
 *
 * @package    Hopeareunus
 * @subpackage Template
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @since      0.1.0
 */
?>
				<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>

				<?php do_atomic( 'close_main' ); // hopeareunus_close_main ?>

			</div><!-- .wrap -->

		</div><!-- #main -->

		<?php do_atomic( 'after_main' ); // hopeareunus_after_main ?>

		<?php get_sidebar( 'subsidiary' ); // Loads the sidebar-subsidiary.php template. ?>

		<?php do_atomic( 'before_footer' ); // hopeareunus_before_footer ?>

		<footer id="footer" role="contentinfo">

			<?php do_atomic( 'open_footer' ); // hopeareunus_open_footer ?>

			<div class="wrap<?php if ( has_nav_menu( 'subsidiary' ) ) echo ' hopeareunus-have-subsidiary-menu'; ?>">

				<div class="footer-content">
					<?php hybrid_footer_content(); ?>
				</div>
				
				<?php get_template_part( 'menu', 'subsidiary' ); // Loads the menu-subsidiary.php template. ?>

				<?php do_atomic( 'footer' ); // hopeareunus_footer ?>

			</div><!-- .wrap -->

			<?php do_atomic( 'close_footer' ); // hopeareunus_close_footer ?>

		</footer><!-- #footer -->

		<?php do_atomic( 'after_footer' ); // hopeareunus_after_footer ?>

	</div><!-- #container -->

	<?php do_atomic( 'close_body' ); // hopeareunus_close_body ?>

	<?php wp_footer(); // wp_footer ?>

</body>
</html>