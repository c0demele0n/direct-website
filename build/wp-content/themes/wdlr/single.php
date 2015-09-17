<?php
/**
 * The template for displaying all single posts.
 *
 * @package wdlr
 */

get_header(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

		<?php endwhile; // End of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
