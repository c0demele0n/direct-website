// config requirejs
require.config({
	baseUrl : templateDir + '/js/lib/',
  paths : {
    modernizr : "modernizr.custom",
    mediaqueries : "css3-mediaqueries",
    selectivizr : "selectivizr.min",
    picturefill : "picturefill.min",
    easing : "jquery.easing"
	},
});
 
// load scripts
require([
	"modernizr",
	// "mediaqueries",
	// "selectivizr",
	"picturefill",
	"easing"
], function() {
	
	// preparing vars

	// define actions on scroll
	var doOnSroll = function()
	{
	}

	// define actions on resize
	var doOnResize = function()
	{
	}

	// main action
	jQuery(document).ready(function($) {

		// setup events
	  $(window).on('scroll', doOnSroll).trigger('scroll');
		$(window).on('resize', doOnResize).resize();
	});
});