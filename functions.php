<?php
add_filter( 'genesis_register_sidebar_defaults', 'one_pager_register_sidebar_defaults' );
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'One Pager Theme' );
define( 'CHILD_THEME_URL', 'http://sridharkatakam.com' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

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





//* One-Pager specific code below

//* Remove tagline from header
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

//* Add custom image size for Portfolio featured images
add_image_size( 'portfolio', 340, 227, TRUE );

//* Customize the output of individual Portfolio entries
add_filter( 'display_posts_shortcode_output', 'one_pager_display_posts_shortcode_output', 10, 9 );
function one_pager_display_posts_shortcode_output( $output, $atts, $image, $title, $date, $excerpt, $inner_wrapper, $content, $class ) {

	$title = '<h3 itemprop="headline" class="entry-title">' . apply_filters( 'the_title', get_the_title() ) . '</h3>';

	if ( $atts['image_size'] )
		$image = '<div class="portfolio-image"><a rel="prettyPhoto[pp_gal]" href="' . genesis_get_image( array('format' => 'url') ) . '">' . genesis_get_image( array('format' => 'html', 'size' => 'portfolio') ) . '</a></div> ';
	else $image = '';

	$output = '<' . $inner_wrapper . ' class="' . implode( ' ', $class ) . '">' . $title . $image . $date . $excerpt . $content . '</' . $inner_wrapper . '>';
	return $output;

}

//* Enqueue Parallax on non handhelds i.e., desktops, laptops etc. and not on tablets and mobiles
add_action( 'wp_enqueue_scripts', 'enqueue_parallax' );
function enqueue_parallax() {

	if ( is_handheld() )
		return;

	// load Animate.CSS stylesheet for CSS3 animations.
	// Source: http://daneden.github.io/animate.css/
	wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.min.css' );

	// load prettyPhoto's CSS for lightbox.
	// Source: http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/
	wp_enqueue_style( 'prettyphoto', get_bloginfo( 'stylesheet_directory' ) . '/css/prettyPhoto.css' );

	// load Javascript for Parallax.
	// Source: http://demo.studiopress.com/parallax/wp-content/themes/parallax-pro/js/parallax.js
	wp_enqueue_script( 'parallax',  get_stylesheet_directory_uri() . '/js/parallax.js', array( 'jquery' ), '', true );

	// load Waypoints
	// Source: http://imakewebthings.com/jquery-waypoints/
	wp_enqueue_script( 'waypoints', get_stylesheet_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'waypoints-init', get_stylesheet_directory_uri() .'/js/waypoints-init.js' , array( 'jquery', 'waypoints' ), '1.0.0' );

	// load prettyPhoto's JS for lightbox.
	wp_enqueue_script( 'prettyphoto', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.prettyPhoto.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'prettyphoto-init', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.prettyPhoto.init.js', array( 'prettyphoto' ), '1.0.0' );

}

//* Enqueue Backstretch on handhelds (tablets and mobiles) so that background images are stretched vertically to fill the sections' content
add_action( 'wp_enqueue_scripts', 'enqueue_backstretch' );
function enqueue_backstretch() {

	if ( ! is_handheld() )
		return;

	// load Backstretch
	// Source: http://srobbin.com/jquery-plugins/backstretch/
	wp_enqueue_script( 'backstretch', get_stylesheet_directory_uri() . '/js/jquery.backstretch.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'backstretch-init', get_stylesheet_directory_uri() .'/js/backstretch-init.js' , array( 'jquery', 'backstretch' ), '1.0.0' );

}

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'welcome-section',
	'name'        => __( 'Welcome Section', 'one-pager' ),
	'description' => __( 'This is the welcome section.', 'one-pager' ),
) );

genesis_register_sidebar( array(
	'id'          => 'about-section',
	'name'        => __( 'About Section', 'one-pager' ),
	'description' => __( 'This is the about section.', 'one-pager' ),
) );

genesis_register_sidebar( array(
	'id'          => 'contact-section',
	'name'        => __( 'Contact Section', 'one-pager' ),
	'description' => __( 'This is the contact section.', 'one-pager' ),
) );

//* Change widget titles from h4 to h2
function one_pager_register_sidebar_defaults( $defaults ) {
	$defaults['before_title'] = '<h2 class="widget-title widgettitle">';
	$defaults['after_title'] = '</h2>';
	return $defaults;
}