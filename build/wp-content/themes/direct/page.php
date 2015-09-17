<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php
$title = $post->post_title;
$content = apply_filters('the_content', $post->post_content);
?>
<section class="page-content">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_title( '<h1>', '</h1>' ); ?>
		<?php the_content(); ?>

	<?php endwhile; // End of the loop. ?>
</section>

<?php get_footer(); ?>