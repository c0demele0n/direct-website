<?php
/**
 * Template part for displaying single posts.
 *
 * @package wdlr
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page__header">
	</header><!-- .entry-header -->

	<div class="page__content">
		<?php
			$title = '<h1>'.get_the_title().'</h1>';
			$content = apply_filters('the_content', get_the_content());
			echo do_shortcode('[section]'.$title.$content.'[/section]');
		?>

		<section class="page__section related-posts">
			<div class="page__section__inner">
				<h2>Über das Projekt</h2>
						  
				<?php
					$youtube_ID = get_field('youtube_id');
					$details = get_field('projektdetails');
				?>
	  		<div class="video-block">
			  	<div class="video-block__video">
	  				<iframe width="640" height="360" src="https://www.youtube-nocookie.com/embed/<?= $youtube_ID ?>?rel=0" frameborder="0" allowfullscreen></iframe>
					</div>
	  	
			  	<div class="video-block__description">
			  		<h3>Details</h3>
						<?= $details ?>
					</div>
	  		</div>						  
	  	</div>						  
		</section>

		<?php
			$title = '<h2>Weitere Projekte</h2>';
			$content = do_shortcode('[projekte latest="true"]');
			echo do_shortcode('[section]'.$title.$content.'[/section]');
		?>
	</div><!-- .entry-content -->

	<footer class="page__footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

