<?	// grab gallery and initial selection
$selected = isset($_GET['gallery'])?$_GET['gallery']:0;
$this_album = get_field('photo_gallery');

// find breakpoint in image list
$full_height = 0;
$half_height = 0;
$cols = array(array(),array());

// check normalized image sizes
foreach ($this_album as $slide) {
	$this_aspect = intval($slide['height'])/intval($slide['width']);
	$this_height = intval(100*$this_aspect);
	$full_height += $this_height;
}

// find break point
$half_targeted = 0;
foreach ($this_album as $slide) {
	$this_aspect = intval($slide['height'])/intval($slide['width']);
	$this_height = intval(100*$this_aspect);
	$half_height += $this_height;
	$cols[$half_targeted][] = $slide;

	if ($half_height > ($full_height * 45/100)) {
		$half_targeted = 1;
	}
} ?>

				
<div id="collage-gallery" class="clear">
	<div class="left">
		<? foreach($cols[0] as $img) { ?>
			<div><img src="<?=$img['sizes']['large'];?>" width="<?=$img['sizes']['large-width'];?>" height="<?=$img['sizes']['large-height'];?>" alt="<?=$img['alt'];?>"></div>
		<? } ?>
	</div>
	<div class="right">
		<? foreach($cols[1] as $img) { ?>
			<div><img src="<?=$img['sizes']['large'];?>" width="<?=$img['sizes']['large-width'];?>" height="<?=$img['sizes']['large-height'];?>" alt="<?=$img['alt'];?>"></div>
		<? } ?>
	</div>
	<div class="clear"></div>
</div>
