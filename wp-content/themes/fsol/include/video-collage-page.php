<?	// grab video gallery
	$vgallery = get_field('video_album');
?>

<div id="videoGalleryContainer" class="clear">
	<?	// lay out videos
		$curr_col = 0;
		$col_buf = array('','','');
		
		if($vgallery) {
			foreach($vgallery as $vg) { 
				$curr_col = ($curr_col<3)?($curr_col+1):1; // toggle column
				
				$buf = '
				<div class="videoGalleryColSlide">
					<div class="video">
						<iframe width="500" height="300" src="https://www.youtube.com/embed/'.$vg['video_id'].'" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				';
				
				$col_buf[$curr_col] .= $buf;
			}
			
			foreach($col_buf as $cb) { ?>
				<div class="videoGalleryCol">
					<?=$cb;?>
				</div>
			<? }
		}
	?>
</div>
