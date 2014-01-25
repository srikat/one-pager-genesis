<?php
/**
 * This file adds the Home Page to your active theme.
 */

// Force full width content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Add metro-pro-home body class
// add_filter( 'body_class', 'metro_body_class' );
function metro_body_class( $classes ) {
		$classes[] = 'metro-pro-home';
		return $classes;
}

function sk_portfolio_entries() {

	echo do_shortcode('[display-posts post_type="portfolio" image_size="portfolio" posts_per_page="6" wrapper="div"]');

}

// Remove the default Genesis loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Add custom homepage content
add_action( 'genesis_loop', 'custom_homepage_content' );

function custom_homepage_content() { ?>

	<section id="intro" class="parallax">
		<article class="wrap">
			<h2>Welcome</h2>
			<p>This is the single page demo site to accompany my upcoming "How to set up a Single-Page website with Parallax and animation effects in Genesis" tutorial. Even though the <em>front-page.php</em> template file is <a href="http://sridharkatakam.com/go/genesis/">Genesis</a> specific, the overall idea is the same and can be applied in any WordPress theme.</p>
		</article>
	</section>

	<section id="portfolio" class="parallax">
		<article class="wrap">
			<h2>Our Portfolio</h2>
			<?php echo do_shortcode('[display-posts post_type="portfolio" image_size="portfolio" posts_per_page="6" wrapper="div"]'); ?>
		</article>
	</section>

	<section id="about" class="parallax">
		<article class="wrap">
			<h2>About Section</h2>
			Plugins used:<br/>
			<ol>
				<li>Page scroll to id: for smooth scrolling when nav menu links are clicked</li>
				<li>Portfolio Post Type: for Portfolio CPT</li>
				<li>Display Posts Shortcode: to pull Portfolio CPT entries and showing in the above section</li>
				<li>Dynamic To Top: to display a 'go to top' button that appears at bottom right</li>
				<li>mobble: To load Animate.CSS, prettyPhoto, Parallax and Waypoints only on non mobiles and tables</li>
				<li><a href="http://sridharkatakam.com/go/gravity-forms/">Gravity Forms</a>: For the contact form</li>
			</ol>
		</article>
	</section>

	<section id="contact" class="parallax">
		<article class="wrap">
			<h2>Contact Us</h2>
			<?php gravity_form(1, false, false, false, '', false); ?>
		</article>
	</section>

<?php }

add_action( 'genesis_before_header', 'sk_add_gototop_link' );
function sk_add_gototop_link() {
	echo '<div id="top"></div>';
}

genesis();
