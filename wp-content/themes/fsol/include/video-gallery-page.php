<?	// grab video gallery
	$vgallery = get_field('video_album');
?>

<div id="videoGalleryContainer" class="clear">
	<?	// lay out videos
		if ($vgallery) {
			foreach($vgallery as $vg) { ?>
				
				<div class="videoGallerySlide">
					<div class="video">
						<iframe width="500" height="300" src="https://www.youtube.com/embed/<?=$vg['video_id'];?>" frameborder="0" allowfullscreen></iframe>
					</div>
					<div class="title"><?=$vg['video_title'];?></div>
					<div class="caption"><?=$vg['video_caption'];?></div>
				</div>
				
			<? }
		}
	?>
</div>
