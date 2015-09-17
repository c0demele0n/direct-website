					</div>
    		</main>

			<footer>
				<div class="inner-content">
					<div class="row">
		        <a class="logo" href="<?= home_url(); ?>">Direct</a>

						<div class="social-links">
			        <a class="fa fa-facebook" href="http://www.facebook.com" target="_blank"></a>
			        <a class="fa fa-youtube" href="http://www.youtube.com" target="_blank"></a>
						</div>
					</div>

	        <nav>
	          <?php
	          $args = array('theme_location'=>'meta', 'container'=>false);
	          wp_nav_menu($args);
	          ?>
	        </nav>
				</div>
			</footer>
		</div>

	<?php wp_footer(); ?>
	</body>
</html>