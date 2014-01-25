jQuery(function($) {

	$('#intro .wrap').waypoint(function() {
		$(this).toggleClass( 'animated fadeInDown' );
	},
	{
		offset: '100%',
		// triggerOnce: true
	});

	$('#portfolio .wrap').waypoint(function() {
		$(this).toggleClass( 'animated fadeInUp' );
	},
	{
		offset: '90%',
		// triggerOnce: true
	});

	$('#about .wrap').waypoint(function() {
		$(this).toggleClass( 'animated slideInLeft' );
	},
	{
		offset: '90%',
		// triggerOnce: true
	});

	$('#contact .wrap').waypoint(function() {
		$(this).toggleClass( 'animated fadeIn' );
	},
	{
		offset: '90%',
		// triggerOnce: true
	});

});