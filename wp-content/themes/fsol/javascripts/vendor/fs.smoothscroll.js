// Smooth-scrolling anchor links!
// add one of these data attributes to a link:
// smoothscroll-to			- scrolls to the location of {href}
// smoothscroll-y="{#}"		- scrolls to {#}
//
// Examples of use:
// <a href="#main" smoothscroll-to>Scroll to Main Container</a>
// <a href="#" smoothscroll-to="#main">Scroll to Main Container</a>
// <a href="0" smoothscroll-y>Scroll to Top</a>
// <a href="#" smoothscroll-y="0">Scroll to Top</a>
//
// Script options:
// smoothscroll.offset = 0   - sets up an offset for all scrolling, in the case that the site has a fixed header or some similar construct
// smoothscroll.duration = 300   - scroll duration


var smoothscroll = {
	offset: 0,
	duration: 300,
}
jQuery(document).ready(function(){
	jQuery("[smoothscroll-to]").on("click",function(e){
		e.preventDefault();
		var val = jQuery(this).attr('href');
		if(val === "#") {
			val = jQuery(this).attr('smoothscroll-to');
		}
		var loc = jQuery(val).offset().top;
		if(isNaN(loc)) {
			loc = 0;
		}
		var pos = loc + smoothscroll.offset;
		jQuery("html,body").stop().animate({scrollTop: pos},smoothscroll.duration);
	});
	jQuery("[smoothscroll-y]").on("click",function(e){
		e.preventDefault();
		var val = jQuery(this).attr('href');
		if (val !== "#") {
			var loc = parseInt(jQuery(this).attr('href'));
		} else {
			var loc = parseInt(jQuery(this).attr('smoothscroll-y'));
		}
		if(isNaN(loc)) {
			loc = 0;
		}
		var pos = loc + smoothscroll.offset;
		jQuery("html,body").stop().animate({scrollTop: pos},smoothscroll.duration);
	});
});
