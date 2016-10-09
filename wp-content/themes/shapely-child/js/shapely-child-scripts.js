/**
 * Created by jaakko on 1.10.2016.
 */

;(function($){

	jQuery(document).ready(function($) {
		//"use strict";

		// Smooth scroll to inner links
		console.log('shapely-child-scripts');

		jQuery('.inner-link').off('click').click(function () {
			var href, targetTop;
			href = jQuery(this).attr('href');
			href = href.slice(1, href.length);

			if (href === 'top') {
				targetTop = 0;
			} else {
				targetTop = document.getElementById(href).offsetTop;
			}

			jQuery('html, body').animate({
				scrollTop: targetTop
			}, 1000);

			return false;
		});
	});
})(jQuery);