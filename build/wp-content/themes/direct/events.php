<?php /* Template Name: Termine */ ?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<section class="page-content">
$title = $post->post_title;
<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_title();
		the_post(); 
	}
}
?>
</section>

<?php get_footer(); ?>