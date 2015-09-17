<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wdlr
 */

?>

		</div>
	</main><!--End role=main-->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<section class="site-footer__content">
			
			<div class="row">
	      <a href="<?php echo esc_url(home_url('/')); ?>">
	      	<img src="<?php bloginfo('template_url'); ?>/images/logo_inverse.png" class="logo logo--left logo--small" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" />
	      </a>

      	<?php
	        $args = array('theme_location'=>'social', 'container_class'=>'social-share right', 'menu_class'=>'social-share-list');
	        wp_nav_menu($args);
        ?>
	     </div>

			<div class="row">
	      <nav>
	        <?php
	        $args = array('theme_location'=>'secondary', 'container'=>false, 'menu_class'=>'site-footer__nav right');
	        wp_nav_menu($args);
	        ?>
	      </nav>
		
				<p class="copyright">&copy; <?php bloginfo('name'); ?>. All rights reserved.</p>
			</div>

		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
