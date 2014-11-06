<?php

// Scripts, styles and images
define('THEME_ASSETS_PATH', '/assets');
define('THEME_ASSETS_URI', get_template_directory_uri() . THEME_ASSETS_PATH);
define('THEME_ASSETS_VERSION', '0.5');

// Templates
Timber::$dirname = '';

// Translation management
define('THEME_TRANSLATIONS_PATH', TEMPLATEPATH .'/languages');
define('THEME_TEXTDOMAIN', 'custom');

// Load files
foreach (glob(TEMPLATEPATH .'/functions/*.php') as $filename) {
	require_once($filename);
}
