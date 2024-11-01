<?php

//If this file is called directly, abort.
if (!defined('ABSPATH')) {
	die('You are looking at wrong place, dude!');
}

//To load author social profile in user profile
require_once plugin_dir_path(__FILE__) . 'admin/author_profile.php';

//To load author bio section in post
require_once plugin_dir_path(__FILE__) . 'front/show_author_profile.php';