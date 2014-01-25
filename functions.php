<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.0.1' );

//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );





// Single-Page site

remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

add_image_size( 'portfolio', 340, 227, TRUE );

//* Customize the output of individual Portfolio entries
add_filter( 'display_posts_shortcode_output', 'sk_title_above_image', 10, 9 );
function sk_title_above_image( $output, $atts, $image, $title, $date, $excerpt, $inner_wrapper, $content, $class ) {

	$title = '<h3 itemprop="headline" class="entry-title">' . apply_filters( 'the_title', get_the_title() ) . '</h3>';

	if ( $atts['image_size'] )
		$image = '<div class="portfolio-image"><a rel="prettyPhoto[pp_gal]" href="' . genesis_get_image( array('format' => 'url') ) . '">' . genesis_get_image( array('format' => 'html', 'size' => 'portfolio') ) . '</a></div> ';
	else $image = '';

	$output = '<' . $inner_wrapper . ' class="' . implode( ' ', $class ) . '">' . $title . $image . $date . $excerpt . $content . '</' . $inner_wrapper . '>';
	return $output;

}

//* Enqueue Parallax on non handhelds
add_action( 'wp_enqueue_scripts', 'enqueue_parallax' );
function enqueue_parallax() {

	if ( is_handheld() )
		return;

	wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.min.css' );

	wp_enqueue_style( 'prettyphoto', get_bloginfo( 'stylesheet_directory' ) . '/css/prettyPhoto.css' );

	wp_enqueue_script( 'parallax',  get_stylesheet_directory_uri() . '/js/parallax.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'waypoints', get_stylesheet_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'waypoints-init', get_stylesheet_directory_uri() .'/js/waypoints-init.js' , array( 'jquery', 'waypoints' ), '1.0.0' );

	wp_enqueue_script( 'prettyphoto', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.prettyPhoto.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'prettyphoto-init', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.prettyPhoto.init.js', array( 'prettyphoto' ), '1.0.0' );

}

//* Enqueue Backstretch on handhelds
add_action( 'wp_enqueue_scripts', 'enqueue_backstretch' );
function enqueue_backstretch() {

	if ( ! is_handheld() )
		return;

	wp_enqueue_script( 'backstretch', get_stylesheet_directory_uri() . '/js/jquery.backstretch.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'backstretch-init', get_stylesheet_directory_uri() .'/js/backstretch-init.js' , array( 'jquery', 'backstretch' ), '1.0.0' );

}