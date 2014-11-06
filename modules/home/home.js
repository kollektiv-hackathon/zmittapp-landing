/**
 * Home
 *
 * @author Kollektiv
 */
(function(window, document, $, undefined) {
	'use strict';

	var PLUGIN_NAME = 'home';

	var Plugin = function($element, options) {
			this.settings = $.extend(true, {
				domSelectors: {
					item: '[data-' + PLUGIN_NAME + '="item"]'
				},
				stateClasses: {
				}
			}, options, $element.data(PLUGIN_NAME +'-options'));

			this.$element = $element;

			this.$items = null;
		};


	Plugin.prototype.init = function() {

		this.$items = this.$element.find(this.settings.domSelectors.item);

		var slides = $('.slide-wrapper .slide p');
		var pHeight = slides.height();

		slideCalc();

		$( window ).resize(function() {
			slideCalc();
		});

		$( window ).scroll(function() {
			slideCalc();
		});

		function slideCalc(){
			var height = ($(window).height()*0.7)-pHeight;
			slides.css('top', $(document).scrollTop()-height);
		}
	};

	window.Site.utils.registerPlugin(PLUGIN_NAME, Plugin, true);

})(window, document, jQuery);