<?php
/**
 * This file adds the Home Page to One-Pager.
 */

// Force full width content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove the default Genesis loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Add custom homepage content
add_action( 'genesis_loop', 'one_pager_homepage_content' );
function one_pager_homepage_content() { ?>

	<!-- Welcome section -->
	<section id="welcome" class="parallax">
		<article class="wrap">
			<?php
				genesis_widget_area( 'welcome-section', array(
				'before'	=> '<div class="welcome-section widget-area">',
				'after'		=> '</div>',
				) );
			?>
		</article>
	</section>

	<!-- Portfolio section -->
	<section id="portfolio" class="parallax">
		<article class="wrap">
			<h2>Our Portfolio</h2>
			<?php echo do_shortcode('[display-posts post_type="portfolio" image_size="portfolio" posts_per_page="6" wrapper="div"]'); ?>
		</article>
	</section>

	<!-- About section -->
	<section id="about" class="parallax">
		<article class="wrap">
			<?php
				genesis_widget_area( 'about-section', array(
				'before'	=> '<div class="about-section widget-area">',
				'after'		=> '</div>',
				) );
			?>
		</article>
	</section>

	<!-- Contact section -->
	<section id="contact" class="parallax">
		<article class="wrap">
			<?php
				genesis_widget_area( 'contact-section', array(
				'before'	=> '<div class="contact-section widget-area">',
				'after'		=> '</div>',
				) );
			?>
		</article>
	</section>

<?php }

add_action( 'genesis_before_header', 'add_gototop_target' );
function add_gototop_target() {

	echo '<div id="top"></div>';

}

genesis();
