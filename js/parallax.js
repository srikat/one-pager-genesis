jQuery(function( $ ){

	// Enable parallax on homepage sections
	$(window).scroll(function(){


		scrolltop = $(window).scrollTop()
		scrollwindow = scrolltop + $(window).height();

		// Intro section
		$("#intro").css("backgroundPosition", "0px " + -(scrolltop/6) + "px");

		// portfolio section
		if( scrollwindow > $("#portfolio").offset().top ) {

			backgroundscroll = scrollwindow - $("#portfolio").offset().top;
			$("#portfolio").css("backgroundPosition", "0px " + -(backgroundscroll/6) + "px");

		}

		// About section
		if( scrollwindow > $("#about").offset().top ) {

			backgroundscroll = scrollwindow - $("#about").offset().top;
			$("#about").css("backgroundPosition", "0px " + -(backgroundscroll/6) + "px");

		}

		// Contact section
		if( scrollwindow > $("#contact").offset().top ) {

				backgroundscroll = scrollwindow - $("#contact").offset().top;
				$("#contact").css("backgroundPosition", "0px " + -(backgroundscroll/6) + "px");

			}


	});

});