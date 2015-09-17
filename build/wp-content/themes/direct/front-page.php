<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php $content = apply_filters('the_content', $post->post_content); ?>
<section class="page-content">
	<?= $content ?>
</section>

<section class="news-wrapper">
	<h2>Aktuelle News</h2>

	<?php
	$args = array(
	  'post_type'       	=>  'news',
	  'orderby'         	=>  'date',
	  'order'           	=>  'DESC',
	  'posts_per_page'		=>  -1
	);
	$news = get_posts($args);
	
	if ($news) {
	?>
		<ul class="no-list">
		<?php
		foreach ($news as $post) {
			setup_postdata($post);

			$title = get_the_title();
			$date = get_the_date();
			$content = apply_filters('the_content', get_the_content());
		?>
			<li class="single-news">
				<p class="news-date"><small><?= $date ?></small></p>
				<p class="news-title"><strong><?= $title ?></strong></p>
				<div class="news-content"><?= $content ?></div>
			</li>
		<?php } wp_reset_postdata(); ?>
		</ul>
	<?php } ?>
</section>

<?php get_footer(); ?>