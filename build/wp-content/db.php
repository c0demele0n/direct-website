<?php

add_filter('pre_option_home', 'test_localhosts');
add_filter('pre_option_siteurl', 'test_localhosts');

function test_localhosts() {
	$folder = 'direct';

	if (strcasecmp($_SERVER['REQUEST_URI'], '/'.$folder) == 0 || strcasecmp(substr($_SERVER['REQUEST_URI'], 0, strlen($folder)+2), '/'.$folder.'/') == 0) {
	  return 'http://localhost/'.$folder.'/build';
	} else return false;
}