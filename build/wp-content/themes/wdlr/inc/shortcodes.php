<?php

/**
 *	insert members
 */
function display_members($atts, $content = null) {
	$args = array(
	  'post_type'       	=>  'mitglied',
	  'posts_per_page'		=>  -1
	);
	$members = get_posts($args);
	
	global $post;
	foreach ($members as $post) {
		setup_postdata($post);

		$img = get_attachment('portrait');
		$img_src = $img->src ? $img->src : "http://placeimg.com/300/300/arch";

		$title = get_the_title();
		$content = apply_filters('the_content', get_the_content());

		$block_content = '<li><div class="overlay-block">';

		$block_content .= '<img src="'.$img_src.'" alt="Square" />';

		$block_content .= '<div class="overlay-block__content">';
		$block_content .= '<div class="overlay-block__description centered">';
		$block_content .= '<h5>'.$title.'</h5>';
		$block_content .= '<p>'.$content.'</p>';
		$block_content .= '</div>';
		$block_content .= '</div>';

		$block_content .= '</div></li>';

		$blocks[] = '<li>'.do_shortcode('[grid_block]'.$block_content.'[/grid_block]').'</li>';
  }
	wp_reset_postdata();

	return do_shortcode('[grid id="mitglieder"]'.implode('', $blocks).'[/grid]');
}
add_shortcode('mitglieder', 'display_members');

/**
 *	insert latest projects
 */
function display_projects($atts, $content = null) {
	$a = shortcode_atts(array(
	  'latest' => false,
	), $atts);

	$count = $a['latest'] ? 5 : -1;
	$sizes = $a['latest'] ? array(1,3,5) : array(1,2,3);

	$args = array(
	  'post_type'       	=>  'projekt',
	  'orderby'         	=>  'date',
	  'order'           	=>  'DESC',
	  'posts_per_page'		=>  $count
	);
	$projects = get_posts($args);
	
	$output = '<ul class="block-grid small-block-grid-'.$sizes[0].' medium-block-grid-'.$sizes[1].' large-block-grid-'.$sizes[2].'">';

	global $post;
	$project_id = $post->ID;

	foreach ($projects as $post) {
		setup_postdata($post);

		$id = get_the_ID();
		if ($id == $project_id) continue;

		$title = get_the_title();
		$link = get_permalink($id);

		$youtube_id = get_field('youtube_id');
		$img_src = 'http://i1.ytimg.com/vi/'.$youtube_id.'/mqdefault.jpg';

		$output .= '<li><a href="'.$link.'">';
		$output .= '<img src="'.$img_src.'" alt="'.$title.'" />';
		$output .= '<h4>'.$title.'</h4>';
		$output .= '</a></li>';
	}
	wp_reset_postdata();

	$output .= '</ul>';

	return $output;
}
add_shortcode('projekte', 'display_projects');

/**
 *	insert latest news
 */
function display_news($atts, $content = null) {
	$args = array(
	  'post_type'       	=>  'news',
	  'orderby'         	=>  'date',
	  'order'           	=>  'DESC',
	  'posts_per_page'		=>  3
	);
	$news = get_posts($args);
	
	$output = '<ul class="listing">';

	global $post;
	foreach ($news as $post) {
		setup_postdata($post);

		$title = get_the_title();
		$date = get_the_date();
		$content = apply_filters('the_content', get_the_content());

		$output .= '<li><section class="info-block">';
		
		$output .= '<p class="dateline">';
		$output .= '<time>'.$date.'</time>';
		$output .= '</p>';

		$output .= '<p class="line--highlighted">'.$title.'</p>';
		$output .= '<p>'.$content.'</p>';

		$output .= '</section></li>';
	}
	wp_reset_postdata();
	
	$output .= '</ul>';

	return $output;
}
add_shortcode('news', 'display_news');

/**
 *	creates a grid with specified attributes and content
 */
function create_grid($atts, $content = null) {
	$a = shortcode_atts(array(
	  'id'			=> false,
	  'columns'	=> 4
	), $atts);

	$id = $a['id'] ? 'id="'.$a['id'].'"' : '';

	$output = '<article class="block-grid__wrapper">';
	$output .= '<ul '.$id.' class="block-grid small-block-grid-1 medium-block-grid-'.ceil($a['columns']).' large-block-grid-'.$a['columns'].'">';
	$output .= do_shortcode($content);
	$output .= '</ul>';
	$output .= '</article>';

  return $output;
}
add_shortcode('grid', 'create_grid');

/**
 *	creates a grid block with specified attributes and content
 */
function create_grid_block($atts, $content = null) {
	$a = shortcode_atts(array(), $atts);

	$output = '<section class="block"><div class="inner-content">';
	$output .= do_shortcode($content);
	$output .= '</div></section>';

  return $output;
}
add_shortcode('grid_block', 'create_grid_block');

/**
 *	creates a content section with specified attributes and content
 */
function create_section($atts, $content = null) {
	$a = shortcode_atts(array(
	  'id'	=> false
	), $atts);

	$id = $a['id'] ? 'id="'.$a['id'].'"' : '';
	
	$output = '<section '.$id.' class="page__section">';
	$output .= '<div class="page__section__inner">'.do_shortcode($content).'</div>';
	$output .= '</section>';

  return $output;
}
add_shortcode('section', 'create_section');

?>