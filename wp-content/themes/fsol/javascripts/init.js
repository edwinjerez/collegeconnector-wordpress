// for animated counters
var counters = [];
var counter_intvl = '';


// initialize Foundation
$(document).foundation();


$(document).ready(function(){
	// replacement
	// email address obfuscation
	$("a").each(function(){
		var regex = /\*AT\*/g;
		var addr = $(this).html();
		addr = addr.replace(regex,'@');
		$(this).html(addr);
		
		var href = $(this).attr('href');
		if ((href !== undefined) && (href !== "") && (href !== "#")) {
			href = href.replace(regex,'@');
			$(this).attr('href',href);
		}
	});	
	
	// mobile menu
	// add top item and back button to mobile dropdowns
	jQuery("#mobile-nav ul li").each(function(e){
		if (jQuery(this).find("ul").length > 0) {
			var this_link = jQuery(this).find("a").first();
			var text = this_link.html();
			var link = this_link.attr('href');
			if (link)  jQuery(this).find("ul").first().prepend('<li><a href="'+link+'">'+text+'</a></li>');
			jQuery(this).find("ul").first().prepend('<li><a class="mobile-back">Back</a></li>');
			this_link.removeAttr('href');
			jQuery(this).addClass('has-dropdown');
		}
	});
	// handle mobile dropdown menu
	jQuery("#mobile-nav-trigger").click(function(e){
		e.preventDefault();
		jQuery("#mobile-nav-box").slideToggle(75);
	});
	var dropped = null;
	jQuery(".mobile-back").click(function(e){
		if (dropped)  {
			var width = dropped.find("ul").find("li").first().width() + "px";
			dropped.find("ul").find("li").animate({left:width},100);
			dropped = null;
		}
	});
	jQuery("#mobile-nav .has-dropdown").click(function(e){
		dropped = jQuery(this);
		
		var submenu = false;
		if (dropped.parent().parent().hasClass('has-dropdown')) {
			submenu = true;
		}
		dropped.parent().children("li").find("> a").slideToggle(75);
		//jQuery(this).find("> a").slideToggle(0);
		dropped.children("ul").slideToggle(75);
		if (submenu) {
			dropped.parent().slideToggle(75);
			dropped.parent().parent().parent().children("li").children("a").slideToggle(75);
			dropped.parent().children("li").children("> a").slideToggle(75);
		}
		dropped.children("ul").find("li").animate({left:'0px'},100);
	});	
	jQuery("#mobile-nav ul a").click(function(e){
		if (jQuery(this).attr("href")) {
			if (jQuery(this).attr("href")!="") {
				jQuery("#mobile-nav-box").slideToggle(75);
			}
		}
	});
	
	
	// rotator slide overlay
	jQuery("#rotator .cycle-slideshow").on('cycle-after',function(e,opts,oel,iel,ff){
		var ns = opts.nextSlide;
		
		jQuery("#rotator-overlay .rotator-slide").css('display','none');
		jQuery("#rotator-overlay .rotator-slide").eq(ns).css('display','block');
	});
	
	
	// init count-up areas
	jQuery(".count-up").each(function(e){
		var cid = parseInt(jQuery(this).data('count-id'));
		var max = parseFloat(jQuery(this).data('count'));
		var by = parseFloat(jQuery(this).data('count-by'));
		var vloc = jQuery(this).offset().top;
		
		counters[counters.length] = {
			id: cid,
			now: 0,
			max: max,
			by: by,
			vloc: vloc,
			done: 0,
		};
		jQuery('.count-up[data-count-id="'+cid+'"]').html(0);
	});
	
	// trigger count-ups
	counter_intvl = setInterval(counter_animate,30);
	check_counter_scroll();
	jQuery(window).on('scroll',debounce(check_counter_scroll,250));	
	
	
});



jQuery(window).load(function(){
	// after images load
	
	// gallery fullscreen box setup
	if (jQuery("#fullscreen-box").length > 0) {
		
		//trigger
		jQuery("#fullscreen-switch").on("click",function(e){
			jQuery("#fullscreen-box").toggleFullScreen();
		});
		// re-center gallery on fullscreen change
		jQuery(document).bind("fullscreenchange",function(){
			fs_tiered_gallery.center();
		});
	}
	
	// tiered photo gallery init
	if(jQuery("#gallery-rotator").length > 0) {
		fs_tiered_gallery.init("#gallery-rotator",json_gallery,0);

		jQuery(window).on("resize",function(){
			fs_tiered_gallery.center();
		});
	}
	// tiered photo gallery album chooser
	jQuery('#album').on("change",function(){
		var newAlbum = jQuery(this).val();
		fs_tiered_gallery.load(newAlbum);
	});

	
	// basic gallery counter update
	if(jQuery(".cycle-slideshow.basic").length > 0) {
		if(typeof json_gallery == "object") {
			jQuery(this).on('cycle-after',function(e,opts,oel,iel,ff){
				jQuery('#basic-gallery-controls .counter').html("( "+(opts.nextSlide+1)+" / "+json_gallery.length+" )");
			});
		}
	}
	// simple gallery counter update - don't update the homepage rotator
	if(jQuery(".cycle-slideshow:not(.front)").length > 0) {
		if(typeof json_gallery == "object") {
			jQuery(this).on('cycle-after',function(e,opts,oel,iel,ff){
				jQuery('.gallery-controls .counter').html("( "+(opts.nextSlide+1)+" / "+json_gallery.length+" )");
			});
		}
	}
	

	// sidebar photo gallery init
	if(jQuery("#sidebar-gallery").length > 0) {
		fs_paged_gallery.init("#sidebar-gallery",json_gallery,"#paged-pager",sidegallery_perpage);
		
		jQuery(window).on("resize",function(){
			fs_paged_gallery.center();
		});
		
		jQuery(".top-bar .controls .prev").on("click",function(){
			fs_paged_gallery.prev_page();
		});
		jQuery(".top-bar .controls .next").on("click",function(){
			fs_paged_gallery.next_page();
		});
	}
	
	
	// timeline rotator
	if(jQuery("#timelineRotator").length > 0) {
		jQuery("#timelineRotator").cycle();
	}
	
	
	
	// portfolio page filter handler
	if((typeof portfolio_category != "undefined") && (portfolio_category !== "") && (portfolio_category !== "0")) {
		portfolio_filter(portfolio_category);
	}
	jQuery("#portfolio-chooser ul li a").on("click",function(e){
		e.preventDefault();
		var this_data = jQuery(this).attr('data-id');
		
		portfolio_filter(this_data);
	});	
});



// render portfolio filter changes
function portfolio_filter(id) {
	var this_pcat = ".pcat-"+id;
	
	// hide all
	jQuery('.portfolio-gallery-slide').css('display','none');
	
	// remove active state
	jQuery('#portfolio-chooser .active').removeClass('active');
	
	// set active state
	jQuery("#portfolio-chooser ul li a[data-id='"+id+"']").addClass('active');
	
	if (id == "-1") {
		// show all
		jQuery('.portfolio-gallery-slide').css('display','block');
	} else {
		// show all filtered
		jQuery(this_pcat).css('display','block');
	}
}



// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.
// From underscore.js
// Found at: https://davidwalsh.name/javascript-debounce-function
function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};



function format_phone(ph) {
	var buf = ph.replace(/[\.\,\(\)\-\+ ]/g,'');
	var acode = buf.substr(0,3);
	var ccode = buf.substr(3,3);
	var lfour = buf.substr(6,4);
	var nbuf = acode+"."+ccode+"."+lfour;
	
	return nbuf;
}

function format_email(em) {
	var buf = em.replace('*AT*','@');
	
	return buf;
}


function check_counter_scroll() {
	var pos = jQuery(window).scrollTop() + jQuery(window).innerHeight();

	for(var lp=0;lp<counters.length;lp++) {
		if (pos > counters[lp].vloc) {
			if (counters[lp].now < counters[lp].by) {
				// start animation?
				counters[lp].now = counters[lp].by;
			}
		}
	}
}
function counter_animate() {
	var num_counters_done = 0;
	for(var num=0;num<counters.length;num++) {
		if (counters[num].done == 1) {
			num_counters_done++;
		}
		if(counters[num].now > 0 && counters[num].done < 1) { // if this counter is active
			if(counters[num].now >= counters[num].max) {
				counters[num].now = counters[num].max;
				counters[num].done = 1;
			} else {
				counters[num].now += counters[num].by;
				
				if (counters[num].now >= counters[num].max) {
					counters[num].now = counters[num].max;
					counters[num].done = 1;
				}
			}
			jQuery('.count-up[data-count-id="'+num+'"]').html(counters[num].now.toLocaleString());
		}
	}
	if (num_counters_done == counters.length) {
		clearInterval(counter_intvl);
	}
}
