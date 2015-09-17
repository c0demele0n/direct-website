<?php /* Template Name: Mitglieder */?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php $content = apply_filters('the_content', $post->post_content); ?>
<section class="page-content">
	<?= $content ?>
</section>

<section class="members-wrapper">
	<h2>Aktive Mitglieder</h2>

	<?php
	$args = array(
	  'post_type'       	=>  'mitglied',
	  'posts_per_page'		=>  -1
	);
	$members = get_posts($args);
	
	if ($members) {
	?>
		<ul class="no-list">
		<?php
		foreach ($members as $post) {
			setup_postdata($post);

			$img = getAttachment('member-thumb');
			$src = $img->src;
			$alt = $img->alt;
			$thumb = $img->thumb;

			$title = get_the_title();
			$content = apply_filters('the_content', get_the_content());

			$duty = get_field('aufgabenbereich');
			$entry = get_field('eintritt');

			$email = get_field('e-mail');
			$phone = get_field('telefon');
		?>
			<li class="single-member">
				<a href="<?= $src ?>">
					<!-- <img src="<?= $thumb ?>" alt="<?= $alt ?>"> -->
					<img src="http://placehold.it/150x200">
				</a>

				<p class="member-details">
					<strong class="member-title"><?= $title ?></strong>
					<span class="member-duty"><?= $duty ?></span>
					<span class="member-entry">Mitglied seit: <?= $entry ?></span>
				</p>

				<?= $content ?>

				<p class="member-contact-data">
					<?php if($email) { ?>
					<span class="member-email">E-Mail: <a href="mailto:<?= $email ?>"><?= $email ?></a></span>
					<?php } ?>
					<?php if($phone) { ?>
					<span class="member-phone">Tel.: <?= $phone ?></span>
					<?php } ?>
				</p>
			</li>
		<?php } wp_reset_postdata(); ?>
		</ul>
	<?php } ?>
</section>

<?php get_footer(); ?>