<?	// fetch timeline events
	$t_events = get_field('timeline');
	
	if(!empty($t_events)) { ?>
	
		<div id="timelineBox" class="vertical">
		
			<? // set up two columns
			$thiscol = 0;
			$thisrow = 0;
			$col = array();
			$col[0] = array();
			
			// build columns
			foreach ($t_events as $te) { 
				if (!isset($col[$thisrow])) {
					$col[$thisrow] = array();
				}
				
				$buf = '
				<div class="timeline-event">
					<div class="image"><img src="'.$te['timeline_image']['sizes']['large'].'" alt="'.$te['timeline_image']['alt'].'"></div>
					<div class="title">'.$te['timeline_title'].'</div>
					<div class="content">'.apply_filters('the_content',$te['timeline_description']).'</div>
				</div>
				';
				
				$col[$thisrow][$thiscol] = $buf;

				if ($thiscol == 1)  {
					$thisrow++;
				}
				$thiscol = 1 - $thiscol;
			}
			
			
			
			// render ?>
			<table>
				<tr class="timeline-header">
					<td colspan="2">
						<?=get_field('timeline_header');?>
					</td>
				</tr>
				
				<? foreach ($col as $tc) { ?>

					<tr class="clear">
						<td class="connector">
							<?=$tc[0];?>
						</td>
						<td class="<?=(isset($tc[1]))?"connector":"";?>">
							<? if (isset($tc[1])) { ?>
								<?=$tc[1];?>
							<? } else { ?>
								<div class="timeline-event">&nbsp;</div>
							<? } ?>
						</td>
					</tr>
					
				<? } ?>
				
				<tr class="timeline-footer">
					<td colspan="2">
						<?=get_field('timeline_footer');?>
					</td>
				</tr>
			
			</table>
		
		</div>
		
	<? }
?>