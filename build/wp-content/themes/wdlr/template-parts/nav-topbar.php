<?php
/**
 * Template part for displaying topbar nav.
 *
 * @package wdlr
 */
?>

<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
      <h1>
      	<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
      		<img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="logo" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" />
      	</a>
      </h1>
    </li>

    <li class="toggle-topbar menu-icon">
    	<a href="#">
    		<span>Menu</span>
    	</a>
    </li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
		<?php
      $args = array('theme_location'=>'primary', 'container'=>false, 'menu_class' => 'primary-nav nav-list right');
			wp_nav_menu($args);
		?>
  </section>
</nav>
