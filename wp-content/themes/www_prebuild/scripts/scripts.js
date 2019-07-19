jQuery(document).ready(function(){
	// search box trigger
	var search_open = false;
	jQuery(".search-trigger > a").on("click",function(e){
		e.preventDefault();
		if (search_open == false) {
			jQuery("#search-box").css("display","block");
			jQuery("#s").focus();
			search_open = true;
		} else {
			if(jQuery("#s").val() != "") {
				jQuery("#searchform").submit();
			} else {
				jQuery("#search-box").css("display","none");
				search_open = false;
			}
		}
	});
	
	
	// Font Awesome - add file type icon before link for PDF and DOC files
	$("a[href]").each(function(){
		var text = $(this).html();
		var href = $(this).attr('href');
		
		if(href.substr(href.length-4) == ".pdf") {
			text = '<i class="fa fa-file-pdf-o"></i> ' + text;
			$(this).html(text);
			$(this).attr('target','_blank');		
		}
		if((href.substr(href.length-4) == '.doc') || (href.substr(href.length-5) == '.docx')) {
			text = '<i class="fa fa-file-word-o"></i> ' + text;
			$(this).html(text);
			$(this).attr('target','_blank');
		}
	});

	
	
	
	
});



jQuery(window).load(function(){
	// after images load
	

});
