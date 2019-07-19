<? // breadcrumb
	global $wp_query;
	
	// Athletics template switch for header elements
	$is_events_template = false;
	$is_single_event_template = false;
	
	// check for event page
	if($wp_query->tribe_is_event == 1) {
		$is_events_template = true;
		
		if(!tribe_is_events_home()) {
			$is_single_event_template = true;
			$event_id = $wp_query->post->ID;
			$event_title = $wp_query->post->post_title;
		}
	}
	
	
	
	// add current item
	$breadcrumb_a = array();
	if($is_events_template) {
		if($is_single_event_template) {
			$breadcrumb_a[] = array($event_id,$event_title,'#');
		}
	} else {
		$breadcrumb_a[] = array($post->ID,$post->post_title,'#'); //get_the_permalink($post->ID)
	}
	
	// check for parents and add
	$parent_id = $post->post_parent;
	
	while($parent_id !== 0) {
		$pp = new WP_Query(array('post_type'=>'page','p'=>$parent_id));

		$ppp = $pp->post;
		$parent_id = $ppp->post_parent;
		$parent_link = get_the_permalink($ppp->ID);
		$parent_title = $ppp->post_title;
		$breadcrumb_a[] = array($parent_id,$parent_title,$parent_link);
	}
	
	// add Events link for base Event template
	if($is_events_template) {
		$breadcrumb_a[] = array(0,'Events','/events/');
	}
	
	
	
	// prepare for rendering
	$breadcrumb_a = array_reverse($breadcrumb_a);
	
	$breadcrumb_buf = "<a href='/'>Home</a>";
	foreach($breadcrumb_a as $ba) {
		$breadcrumb_buf .= ' > <a href="'.$ba[2].'">'.$ba[1].'</a>';
	}
?>
<section id="interior-breadcrumb-container" class="container">
	<div id="interior-breadcrumb-box" class="row">
		<p><?=$breadcrumb_buf;?></p>
	</div>
</section>
