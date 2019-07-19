<?	// grab gallery and initial selection
$selected = isset($_GET['gallery'])?$_GET['gallery']:0;
$this_album = get_field('photo_gallery'); ?>

<script>var json_gallery =<?=json_encode($this_album);?>;</script>
<script>var init_gallery =<?=$selected;?>;</script>

<div id="fullscreen-box">
	<div id="fs-photo-gallery">
		<div class="gallery-chooser">
			<select id="album">
			<?	// lay out albums in dropdown
				$lp = 0;
				foreach($this_album as $ta) { ?>
					<option value="<?=$lp;?>"<?=selected($selected,$lp);?>><?=$ta['album_title'];?></option>
				<? $lp++; }
			?>
			</select> <a href="#" id="fullscreen-switch"><span></span></a>
		</div>
		
		<div id="gallery-rotator" class="cycle-slideshow" data-cycle-slides="> div" data-cycle-prev=".gallery-controls .prev a" data-cycle-next=".gallery-controls .next a" data-cycle-swipe="true" data-cycle-pager=".gallery-pager" data-cycle-paused="true">
			<div></div>
			<div></div>
		</div>
		
		<div class="gallery-controls">
			<div class="prev"><a href="">&#xf0d9;</a></div>
			<div class="next"><a href="">&#xf0da;</a></div>
		</div>
		
		<div class="gallery-pager">
		
		</div>
	</div>
</div>
