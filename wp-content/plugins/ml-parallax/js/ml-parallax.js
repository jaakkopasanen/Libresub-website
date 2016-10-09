jQuery(".mlprx").each(function(){
	if (typeof jQuery(this).data("effect") == 'undefined') return;
	effect = jQuery(this).data('effect');
	if (effect.search("In")!='-1')
		jQuery(this).css('visibility', 'hidden');
});

function mlprx(){
	jQuery(".mlprx").each(function(){
		scrollDisplay(this,jQuery(this).data("effect"),jQuery(this).data("delay"));
	});
}

jQuery( document ).ready(function() {
	mlprx();
});

jQuery( window ).scroll(function() {
	mlprx();
});

function scrollDisplay(element,effect,timeout){
	scrollTop     = jQuery(window).scrollTop();
	elementOffset = jQuery(element).offset().top;
	distance      = (elementOffset - scrollTop);
	displaydistance=distance - jQuery(window).height()*0.8;
	if ((displaydistance<0))  setTimeout(function(){jQuery(element).addClass(effect).css('visibility', 'visible')},timeout);
}

//--------------------------------------------------------

window.MlParallaxBG = (function() {
	var images;
	
	function init() {
		images = [].slice.call(document.querySelectorAll('.ml-parallax-bg'));
		if(!images.length) { return }
		
		jQuery( window ).scroll(function() {doParallax()});
		jQuery(window).resize(function() {doParallax()});
		doParallax();
	}
	
	function getViewportHeight() {
		var a = document.documentElement.clientHeight, b = window.innerHeight;
		return a < b ? b : a;
	}
	
	function getViewportScroll() {
		if(typeof window.scrollY != 'undefined') {
			return window.scrollY;
		}
		if(typeof pageYOffset != 'undefined') {
			return pageYOffset;
		}
		var doc = document.documentElement;
		doc = doc.clientHeight ? doc : document.body;
		return doc.scrollTop;
	}
	
	function doParallax() {
	console.log("ation;");
		var el, elOffset, elHeight,
			offset = getViewportScroll(),
			vHeight = getViewportHeight();
		
		for(var i in images) {
			el = images[i];
			elOffset = el.offsetTop;
			elHeight = el.offsetHeight;
			
			if((elOffset > offset + vHeight) || (elOffset + elHeight < offset)) { continue; }
			
			el.style.backgroundPosition = '50% '+Math.round((elOffset - offset)*3/8)+'px';
		}
	}
	
	return {
		init: init
	}
})();

MlParallaxBG.init();