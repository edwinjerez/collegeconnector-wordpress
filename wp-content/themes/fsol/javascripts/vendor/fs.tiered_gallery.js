/* 
 * gallery handler
 * 
 * gallery_array: holds the gallery object
 * gallery: the gallery rotator element
 * slide_format: how the slide is rendered - default: <div data-cycle-pager-template="<img src=\'{{src}}\'>">{{img}}</div>
 *
 *
 * How to use:
 * 1: Use ACF to create the gallery/album structure:
 *    Create gallery field named "photo_gallery" (simple gallery)
 *    Create repeater field "photo_gallery" with a text field "album_title" and a gallery field "album_images" (portfolio gallery)
 * 2: Add this script to the page and make sure it loads after jQuery and Cycle2
 * 3: Add script to look for and init the gallery and make it responsive when needed:
 
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
		fs_tiered_gallery.init("#gallery-rotator",json_gallery,init_gallery);

		jQuery(window).on("resize",function(){
			fs_tiered_gallery.center();
		});

		// tiered photo gallery album chooser
		jQuery('select[id="album"]').on("change",function(){
			var newAlbum = jQuery(this).val();
			fs_tiered_gallery.load(newAlbum);
		});
	}
	
 * 4: Add code to the page to spit out the gallery:
 
	<? 
		$selected = isset($_GET['gallery'])?$_GET['gallery']:0;
		$this_album = get_field('photo_gallery'); 
	?>
	<script>
		var json_gallery =<?=json_encode($this_album);?>;
		var init_gallery =<?=$selected;?>;
	</script>

 * 5: Add include to pull in the gallery structure
	<?php include('include/tiered-gallery-page.php');?>


 * 6: You may need to edit the include to remove elements:
 *    If they don't use the album dropdown selector, it can be removed without affecting styling
 */

var fs_tiered_gallery = {
	gallery_array: [],
	gallery: null,
	slide_format: '<div data-cycle-pager-template="<img src=\'{{src}}\'>">{{img}}</div>',
	
	load: function(z) {
		if (this.gallery_array.length-1 >= z) {
			this.clear();
			
			var tgt = this.gallery_array[z];
			//console.log(tgt['album_images']);
			
			for(var lp=0;lp<tgt['album_images'].length;lp++) {
				var ts = tgt['album_images'][lp];
				
				// alt tag
				var img_alt = ts['alt'];
				if (img_alt == "")  img_alt = ts['title'];
				if (img_alt == "")  img_alt = ts['filename'];
				
				// image format
				var newImage = '<img src="{{src}}" width="{{width}}" height="{{height}}" data-src="{{data-src}}" alt="{{alt}}" data-caption="{{caption}}">';
				
				if (lp == 0) {
					newImage = newImage.replace(/{{src}}/i,ts['url']);
					newImage = newImage.replace(/{{data-src}}/i,"");
				} else {
					newImage = newImage.replace(/{{src}}/i,"");
					newImage = newImage.replace(/{{data-src}}/i,ts['url']);
				}
				newImage = newImage.replace(/{{width}}/i,ts['width']);
				newImage = newImage.replace(/{{height}}/i,ts['height']);
				var this_caption = ts['caption'].replace(/"/g,"&quot;");
				newImage = newImage.replace(/{{caption}}/i,this_caption);
				newImage = newImage.replace(/{{alt}}/i,img_alt);
				
				// slide format
				var newSlide = this.slide_format;
				newSlide = newSlide.replace(/{{src}}/i,ts['url']);
				newSlide = newSlide.replace(/{{img}}/i,newImage);
				newSlide = newSlide.replace(/{{caption}}/i,this_caption);
				this.gallery.cycle('add',newSlide);
			}
			
			this.center();
			this.render();
			this.gallery.cycle('goto',1).cycle('prev');
		}
	},
	clear: function() {
		var ns = this.gallery.find("> div").length;
		for (var lp=0;lp<ns;lp++) {
			this.gallery.cycle("remove",0);
		}
	},
	
	
	render: function() {
		// load images on the fly
		this.gallery.find("img").each(function(){
			var this_href = jQuery(this).attr('data-src');
			jQuery(this).removeAttr('data-src');
			
			if (this_href !== "") {
				jQuery(this).attr('src',this_href);
			}
		});
	},
	center: function() {
		// centering gallery images
		// find screen size
		var tgt = this.gallery;
		var wd = tgt.innerWidth();
		var ht = tgt.innerHeight();
		
		tgt.find(" > div").each(function(){
			var this_img = jQuery(this).find("img");
			imgheight = this_img.attr("height");
			imgwidth = this_img.attr("width");
			aspect = imgheight/imgwidth;

			// resize based on screen size
			if (imgheight > imgwidth) {
				if (imgwidth > wd) {
					imgwidth = wd;
					imgheight = aspect*imgwidth;
				}
				if (imgheight > ht) {
					imgheight = ht;
					imgwidth = imgheight/aspect;
				}
			} else if (imgwidth >= imgheight) {
				if (imgheight > ht) {
					imgheight = ht;
					imgwidth = imgheight/aspect;
				}
				if (imgwidth > wd) {
					imgwidth = wd;
					imgheight = aspect*imgwidth;
				}
			}
			
			// center
			var ot = (ht/2)-(imgheight/2);
			var ol = (wd/2)-(imgwidth/2);
			
			// set position
			this_img.css({width:imgwidth+"px",height:imgheight+"px",marginTop:ot+"px",marginLeft:ol+"px"});
		});	
	},
	
	// initialize
	// target div, 
	init: function(tgt,arr,num) {
		this.gallery = jQuery(tgt);
		
		// check for any images
		if (arr && (typeof(arr) !== 'undefined') && (arr.length > 0)) {
		
			// check for single or multiple gallery
			if(typeof(arr[0].album_title) !== 'undefined' ){
				this.gallery_array = arr;
			} else {
				this.gallery_array = [{ 
					album_title: "",
					album_images: arr
				}];
			}
			
			// load and display
			this.load(num);
			this.render();
			this.center();
		} else {
			this.clear();
		}
	},
	format: function(fmt) {
		this.slide_format = fmt;
	}
};


