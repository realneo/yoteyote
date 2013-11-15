// NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
// IT'S ALL JUST JUNK FOR OUR DOCS!
// ++++++++++++++++++++++++++++++++++++++++++

!function ($) {

	$(function(){

	var $window = $(window)

	// Disable certain links in docs
	$('section [href^=#]').click(function (e) {
		e.preventDefault()
	})

}(window.jQuery)