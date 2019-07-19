/* 
 * gallery handler
 * 
 * gallery_array: holds the gallery object
 * gallery: the gallery rotator element
 * pager: the pager element
 * slides_per_page: how many slides will be added to each pager page
 * slide_format: how the slide is rendered - default: <div>\n{{img}}\n</div>\n
 * pager_page_format: how a pager page is rendered - default: <div class="gallery-pager-page" id="gpp-{{id}}">\n{{src}}\n</div>\n
 * pager_slide_format: how a pager slide is rendered - default: <div class="gallery-pager-slide" id="gpi-{{id}}">\n<img src="{{img}}">\n</div>\n
 *
 * How to use:
 * 1: Use ACF to create the gallery/album structure:
 *    Create gallery field named "photo_gallery" (simple gallery)
 *    Create repeater field "photo_gallery" with a text field "album_title" and a gallery field "album_images" (portfolio gallery)
 * 2: Add this script to the page and make sure it loads after jQuery and Cycle2
 * 3: Add script to look for and init the gallery:
 *    if (jQuery("galleryElement").length > 0) {
 *        fs_paged_gallery.init("galleryElement",json_gallery,"pagerElement",slides_per_page);
 *    }
 * 4: Add code to the page to spit out the gallery:
 *    <? $this_album = get_field('photo_gallery'); ?>
 *    <script>var json_gallery =<?=json_encode($this_album);?>;</script>
 */

var fs_paged_gallery = {
	gallery_array: [],
	gallery: null,
	pager: null,
	slides_per_page: 4,
	slide_format: '<div>\n{{img}}\n</div>\n',  // need to ramp this up for a paged pager
	pager_page_format: '<div class="gallery-pager-page" id="gpp-{{id}}">\n{{src}}\n</div>\n',
	pager_slide_format: '<div class="gallery-pager-slide" id="gpi-{{id}}">\n<img src="{{img}}">\n</div>\n',
	current_page: null,
	num_pages: null,
	
	load: function(z) {
		if (this.gallery_array.length-1 >= z) {
			this.clear();
			
			var tgt = this.gallery_array[z];
			//console.log(tgt['album_images']);
			var pager_buf = "";
			var item_count = 0;
			var page_buf = "";
			var page_count = 0;
			
			for(var lp=0;lp<tgt['album_images'].length;lp++) {
				var ts = tgt['album_images'][lp];
				
				// alt tag
				var img_alt = ts['alt'];
				if (img_alt == "")  img_alt = ts['title'];
				if (img_alt == "")  img_alt = ts['filename'];
				
				// image format
				var newImage = '<img src="{{src}}" width="{{width}}" height="{{height}}" data-src="{{data-src}}" alt="{{alt}}" data-caption="{{caption}}">';
				
				if (lp == 0) {
					newImage = newImage.replace(/{{src}}/i,ts['sizes']['large']);
					newImage = newImage.replace(/{{data-src}}/i,"");
				} else {
					newImage = newImage.replace(/{{src}}/i,"");
					newImage = newImage.replace(/{{data-src}}/i,ts['sizes']['large']);
				}
				newImage = newImage.replace(/{{width}}/i,ts['sizes']['large-width']);
				newImage = newImage.replace(/{{height}}/i,ts['sizes']['large-height']);
				var this_caption = ts['caption'].replace(/"/g,"&quot;");
				newImage = newImage.replace(/{{caption}}/i,this_caption);
				newImage = newImage.replace(/{{alt}}/i,img_alt);
				
				// slide format
				var newSlide = this.slide_format;
				newSlide = newSlide.replace(/{{src}}/i,ts['sizes']['thumbnail']);
				newSlide = newSlide.replace(/{{img}}/i,newImage);
				newSlide = newSlide.replace(/{{caption}}/i,this_caption);
				this.gallery.cycle('add',newSlide);
				
				// add item to pager pages
				var newPagerItem = this.pager_slide_format;
				newPagerItem = newPagerItem.replace(/{{img}}/i,ts['sizes']['thumbnail']);
				newPagerItem = newPagerItem.replace(/{{id}}/i,lp);
				page_buf += newPagerItem;
				item_count++;
				//console.log(item_count+" "+this.slides_per_page);
				
				if ((item_count >= this.slides_per_page) || (lp == (tgt['album_images'].length-1))) {
					// add page to pager
					console.log(page_buf);
					
					var newPage = this.pager_page_format;
					newPage = newPage.replace(/{{src}}/i,page_buf);
					newPage = newPage.replace(/{{id}}/i,page_count);
					pager_buf += newPage;
					
					// get ready for next page
					item_count = 0;
					page_buf = "";
					page_count++;
					
					// finish?
					if (lp == (tgt['album_images'].length-1)) {
						this.pager.html(pager_buf);
						this.num_pages = page_count;
					}
				}
			}
			
			this.center();
			this.render();
			this.gallery.cycle('goto',1).cycle('prev');
		}
	},
	prev_page: function() {
		if (this.num_pages == 1) {
			return;
		} else {
			this.current_page--;
			if (this.current_page < 0) {
				this.current_page = this.num_pages - 1;
			}
			this.load_page();
		}
	},
	next_page: function() {
		if (this.num_pages == 1) {
			return;
		} else {
			this.current_page++;
			if (this.current_page >= this.num_pages) {
				this.current_page = 0;
			}
			this.load_page();
		}
	},
	goto_page: function(z) {
		if (z > this.num_pages - 1) {
			return;
		} else {
			this.current_page = z;
			
			if (this.current_page < 0) {
				this.current_page = this.num_pages - 1;
			}
			if (this.current_page >= this.num_pages) {
				this.current_page = 0;
			}
			this.load_page();
		}
	},
	load_page: function() {
		jQuery('.cycle-page-active').removeClass('cycle-page-active');
		var ppid = "#gpp-"+this.current_page;
		jQuery(ppid).addClass('cycle-page-active');
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
			} else if (imgwidth > imgheight) {
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
	// target div, gallery array, pager div, slides per page
	init: function(tgt,arr,pgr,spp) {
		this.gallery = jQuery(tgt);
		this.pager = jQuery(pgr);
		this.slides_per_page = spp;
		
		var that = this;
		
		// check for any images
		if (arr && (typeof(arr) !== 'undefined') && (arr.length > 0)) {
		
			// use single gallery
			this.gallery_array = [{ 
				album_title: "",
				album_images: arr
			}];
			
			// load and display
			this.load(0);
			this.render();
			this.center();
		} else {
			this.clear();
		}
		
		// manually update pager
		this.gallery.on("cycle-before",function(e,opt,os,is,ff){
			// remove pager active class
			jQuery('.cycle-pager-active').removeClass('cycle-pager-active');
		}).on("cycle-after",function(e,opt,os,is,ff){
			// add pager active class
			var paid = "#gpi-"+opt.nextSlide;
			jQuery(paid).addClass('cycle-pager-active');
			// switch pager page if needed
			var page_id = Math.floor(opt.nextSlide / that.slides_per_page);
			if (page_id != that.current_page) {
				jQuery('.cycle-page-active').removeClass('cycle-page-active');
				var ppid = "#gpp-"+page_id;
				jQuery(ppid).addClass('cycle-page-active');
				that.current_page = page_id;
			}
		});
		
		// add handling for clicking slides
		this.pager.on("click",".gallery-pager-slide",function(e){
			var ida = jQuery(this).attr('id').split('-');
			var paid = ida[1];
			that.gallery.cycle('goto',paid);
		});
		
		
	},
};


