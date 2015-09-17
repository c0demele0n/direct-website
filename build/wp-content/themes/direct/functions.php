<?php
	/**
	 *  globals
	 */
	global $defaultBreakpoints;
	$defaultBreakpoints = array(
		'1280'	=>	'full-hd',
		'1024'	=>	'higher',
		'768'		=>	'high',
		'640'		=>	'mid',
		'480'		=>	'low',
		'320'		=>	'lower'
	);

	/**
	 *  register menus
	 */
	register_nav_menus(array(
		'main' => 'Main Navigation',
		'meta' => 'Meta Navigation'
	));

	/**
	 *  define additional thumbnail sizes
	 */
	add_image_size('full-hd', 1280);
	add_image_size('higher', 1024);
	add_image_size('high', 768);
	add_image_size('mid', 640);
	add_image_size('low', 480);
	add_image_size('lower', 320);
	add_image_size('member-thumb', 150, 200, true);

	/**
	 *  hide admin bar
	 */
	add_filter('show_admin_bar', '__return_false');
	
	/**
	 *  enable theme functions
	 */
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails'); 

	/**
	 *	remove menu items from backend
	 */ 
	function removeMenuItems() {
	  remove_menu_page('edit.php');
	  remove_menu_page('edit-comments.php');
	}
	add_action('admin_menu', 'removeMenuItems');

	/**
	 * enqueue scripts and styles.
	 */
	function enqueueScriptsAndStyles() {
    wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_script('requirejs', get_template_directory_uri().'/js/require.js', array('jquery'), false, true);

		$templateDir = get_template_directory_uri();
		wp_localize_script('requirejs', 'templateDir', $templateDir);
	}
	add_action('wp_enqueue_scripts', 'enqueueScriptsAndStyles');

	// modify requirejs-tag
	function scriptLoaderTag($tag, $handle, $src) {
    if ('requirejs' == $handle) {
    	$path = get_template_directory_uri().'/js';
    	$tag = "<script data-main='{$path}/main' src='{$src}'></script>\n";
    }
    return $tag;
	}
	add_filter('script_loader_tag', 'scriptLoaderTag', 10, 3);

  /**
	 *  returns an appropriate image src path
	 */
  function src($filename, $folder='img') {
    echo get_template_directory_uri().'/res/'.$folder.'/'.$filename;
  }

	/**
	 *  returns picture tag containing given picture sizes
	 */
	function picture($img, $alt='', $breakpoints=false, $classes='') {
	  if (!$breakpoints) {
	  	global $defaultBreakpoints;
	  	$breakpoints = $defaultBreakpoints;
	  }
	  
	  $legacy = preg_match('/(?i)msie [2-8]/' , $_SERVER['HTTP_USER_AGENT']);
	  $preview = $legacy ? $img['url'] : $img['sizes']['lowest'];

	  echo '<picture>';
	  echo '<!--[if IE 9]><video style="display: none;"><![endif]-->';

	  foreach ($breakpoints as $bp => $size) {
	      $src = ($size == 'full') ? $img['url'] : $img['sizes'][$size];
	      $media = 'media="(min-width:'.round($bp/16).'em)"';
	      echo '<source srcset="'.$src.'" '.$media.'>';
	  }

	  echo '<!--[if IE 9]></video><![endif]-->';
	  echo '<img class="'.$classes.'" src="'.$preview.'" alt="'.$alt.'" />';
	  echo '</picture>';
	}

  /**
	 *  returns the content of the given post
	 */
  function getPostContent($path) {
	  $post = get_page_by_path($path);
	  $content = apply_filters('the_content', $post->post_content);
	  return $content;
	}

	/**
	 *  returns the attachment of the current post as an array object
	 */
	function getAttachment($sizes=array(), $id=false) {
		$attachmentID = !$id ? get_post_thumbnail_id() : get_post_thumbnail_id($id);
		$attachment = get_post($attachmentID);

		if (is_array($sizes)) {
			$thumbsKey = 'thumbs';
			foreach ($sizes as $s) {
				$thumbs[$s] = wp_get_attachment_image_src($attachmentID, $s)[0];
			}
		} else {
			$thumbsKey = 'thumb';
			$thumbs = wp_get_attachment_image_src($attachmentID, $sizes)[0];
		}

		return (object) array(
			'id'				=> $attachmentID,
			'title'			=> $attachment->post_title,
			'src'				=> $attachment->guid,
			'alt'				=> $attachment->post_title,
			$thumbsKey	=> $thumbs
		);
	}
?>