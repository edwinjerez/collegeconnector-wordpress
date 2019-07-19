<?	// grab gallery and initial selection
$selected = isset($_GET['gallery'])?$_GET['gallery']:0;
$this_album = get_field('photo_gallery'); ?>

<script>var json_gallery =<?=json_encode($this_album);?>;</script>
<script>var init_gallery =<?=$selected;?>;</script>

<div id="fullscreen-box">
	<div id="fs-photo-gallery">
		<div class="gallery-chooser"></div>
		<div id="gallery-rotator" class="cycle-slideshow basic" data-cycle-slides="> div" data-cycle-prev=".basic-gallery-controls .prev a" data-cycle-next=".basic-gallery-controls .next a" data-cycle-swipe="true" data-cycle-paused="true">
			<div></div>
			<div></div>
		</div>

		<div class="basic-gallery-controls clear">
			<div class="prev"><a href="">&#xf0d9;</a></div>
			<div class="counter">&nbsp;</div>
			<div class="next"><a href="">&#xf0da;</a></div>
		</div>
	</div>
</div>
