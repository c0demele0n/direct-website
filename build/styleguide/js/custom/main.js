/*------------------------------------*\
    $FOUNDATION
\*------------------------------------*/

// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();





/*------------------------------------*\
    $MAIN EXECUTION
\*------------------------------------*/

// Init Owl Carousels
function initSlider() {
	
	$('.owl-carousel').each(function() {
		 
		var wrapper = $(this);
		var items = wrapper.children();
		var maxItems = 5;
		
		if (items.length <= maxItems) {
			wrapper.show();				
			return false;
		}  

		wrapper.owlCarousel({
			items: maxItems,
			slideBy: maxItems,
			margin: 20, // scss: $block-grid-default-spacing
			loop: true,
			nav: true,
			navText: ['zurück', 'weiter'],
			mouseDrag: false,
			smartSpeed: 100,
		});

	});

}

// Execute on each resize
var doOnResize = function() {
	doOnScroll();
};

// Execute on each scroll
var doOnScroll = function() {
};

// Execute on document ready
$(document).ready(function() {

	initSlider();

	$(window).on('scroll', doOnScroll);
	$(window).on('resize', doOnResize).resize();

});