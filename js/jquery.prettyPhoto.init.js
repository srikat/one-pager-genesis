jQuery(document).ready(function($) {

	$("a[rel^='prettyPhoto']").prettyPhoto({
		slideshow: 3000, /* interval time in ms */
		autoplay_slideshow: false,
		theme: 'facebook',
		social_tools: false,
		overlay_gallery: false
	});

});