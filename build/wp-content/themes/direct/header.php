<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />

    <?php wp_head(); ?>
  </head>

  <body>
    <div id="container">
    	<header>
        <div class="inner-content">
          <a href="<?= home_url(); ?>" class="logo">Direct</a>
        
          <nav>
            <?php
            $args = array('theme_location'=>'main', 'container'=>false);
            wp_nav_menu($args);
            ?>
          </nav>
        </div>
      </header>

      <main>
        <div class="inner-content">