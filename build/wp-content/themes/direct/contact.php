<?php /* Template Name: Kontakt */ ?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php $content = apply_filters('the_content', $post->post_content); ?>
<section class="page-content">
	<?= $content ?>
</section>

<section class="form-wrapper">
	<h2>Kontaktformular</h2>
	<?= do_shortcode('[ninja_forms id=1]'); ?>
</section>

<?php get_footer(); ?>