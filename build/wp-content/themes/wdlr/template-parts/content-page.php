<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package wdlr
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page__header">
	<?php
		$img = get_attachment('full-hd');
		if ($img) echo '<img class="header-image" src="'.$img->src.'" alt="'.get_the_title().'">';
	?>
	</header><!-- .entry-header -->

	<div class="page__content">
		<?php
			$content = apply_filters('the_content', get_the_content());
			echo do_shortcode('[section]'.$content.'[/section]');
		?>

		<?php
			$sections = get_post_meta( get_the_ID(), '_wdlr_sections', true );
			if ($sections) {
				foreach ($sections as $s) {
					$content = apply_filters('the_content', $s['content']);
					echo do_shortcode('[section]'.$content.'[/section]');
				}
			}
		?>
	</div><!-- .entry-content -->

	<footer class="page__footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

