<?php

add_action( 'wp_enqueue_scripts', 'twenty_child_enqueue_styles' );
function twenty_child_enqueue_styles() {
    $parenthandle = 'twentytwenty'; // This is 'twentytwenty' for the Twenty Twenty theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('1.0.4') // this only works if you have Version in the style header
    );
}

require 'assets/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/marbaque/twentytwentyuned',
	__FILE__, //Full path to the main plugin file or functions.php.
	'twentytwentyuned'
);
$myUpdateChecker->setBranch('main');
