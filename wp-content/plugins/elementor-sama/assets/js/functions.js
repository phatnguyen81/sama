(function ($) {
	$('.steps').owlCarousel({
		loop: true,
		margin: 10,
		nav: false,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 2
			},

		}
	})
	$('.steps-product').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
		responsive:{
			0:{
				items:1
			},
			
			
		}
	})
	$('.listteam').owlCarousel({
		loop: true,
		margin: 30,
		nav: false,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 3
			},

		}
	})
	$('.public').owlCarousel({
		loop: true,
		center: true,
		margin: 30,
		nav: false,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 3
			},

		}
	})
})(jQuery);
