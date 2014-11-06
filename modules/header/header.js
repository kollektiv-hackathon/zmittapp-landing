/**
 * Home
 *
 * @author Kollektiv
 */
(function(window, document, $, undefined) {
	'use strict';

	var PLUGIN_NAME = 'header';

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

		var iphone = $('.iphone');
		var title = $('header h1');

		slideCalc();

		$( window ).resize(function() {
			slideCalc();
		});

		$( window ).scroll(function() {
			slideCalc();
		});

		function slideCalc(){
			var scroll = $(document).scrollTop();
			var value = $(document).scrollTop()/2;

			if($(document).scrollTop() > 20 && $(document).scrollTop() <= 500){

				var opacityValue = 1-(scroll-20)/100;

				title.css('opacity', opacityValue);
			}else{
				title.css('opacity', '');
			}

			if($(document).scrollTop() > 500){
				iphone.css('top', scroll-280);
				iphone.children('.display').css('background-image', 'none');
			}else{
				iphone.css('top', value*-1);
				iphone.children('.display').css('background-image', '');
			}
		}
	};

	window.Site.utils.registerPlugin(PLUGIN_NAME, Plugin, true);

})(window, document, jQuery);
