<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */  

add_action( 'wp_enqueue_scripts', 'main_style' );
				function main_style() {
					wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
					wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
				}

				function meta_headcustomtags() {
					$headcustomtag = <<<EOM
					
					<!-- headに表示させたいコードをここに！（この行は消してね）-->
						<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
					
					EOM;
					echo $headcustomtag;
					}
					add_action( 'wp_head', 'meta_headcustomtags', 99);

/**
 * Your code goes below.
 */

 function if_login( $atts, $content = null ) {
	if(is_user_logged_in()) {
	return '' . $content . '';
	} else {
	return '';
	}
	}
	add_shortcode('if-login', 'if_login');