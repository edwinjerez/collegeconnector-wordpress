<?	// fetch timeline events
	$t_events = get_field('timeline');
	
	if(!empty($t_events)) { ?>
	
		<div id="timelineBox" class="horizontal">
		
			<div id="timelineRotator" data-cycle-slides="> .timeline-event" data-cycle-pager="#timelinePager" data-cycle-pager-template="" data-cycle-swipe="true" data-cycle-paused="true">
			
				<? foreach ($t_events as $te) { ?>
					
					<div class="timeline-event">
						<div class="left">
							<div class="image"><img src="<?=$te['timeline_image']['sizes']['large'];?>" alt="<?=$te['timeline_image']['alt'];?>"></div>
						</div>
						<div class="right">
							<div class="title"><?=$te['timeline_title'];?></div>
							<div class="content"><?=apply_filters('the_content',$te['timeline_description']);?></div>
						</div>
						<div class="clear"></div>
					</div>
					
				<? } ?>

			</div>
			<div class="clear"></div>
		</div>
		<div id="timelinePager">
			<? foreach ($t_events as $te) { ?>
				<a href="#" class=""><?=$te['timeline_title'];?></a>
			<? } ?>
			<div class="clear"></div>
		</div>
		
	<? }
?>