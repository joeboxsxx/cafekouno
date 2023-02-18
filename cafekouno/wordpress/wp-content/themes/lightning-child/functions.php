<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */  

add_action( 'wp_enqueue_scripts', 'lightning_child_style' );
				function lightning_child_style() {
					wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
					wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
				}

/**
 * Your code goes below.
 */

function meta_headcustomtags() {
$headcustomtag = <<<EOM

<!-- headに表示させたいコードをここに！（この行は消してね）-->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

EOM;
echo $headcustomtag;
}
add_action( 'wp_head', 'meta_headcustomtags', 99);