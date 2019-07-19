<?	// FAQs
	$show_mark = true;	
	$faq_toggle = get_field('faqs_box_toggle');
	$faqs = get_field('faqs_box');

	if($faq_toggle) { ?>
	
		<section id="faqs-box">
			<h2 class="title"><?=get_field('faqs_box_title');?></h2>
			<div class="faqs">
			<?	// render FAQs
				$count = 0;
				foreach($faqs as $faq) { ?>
					
					<div class="faq">
						<div class="question clearfix">
							<?=($show_mark)?'<div class="mark"><p>Q:</p></div>':'';?><div class="content"><?=$faq['question'];?></div><div class="toggle"><i class="fa fa-caret-right"></i></div>
						</div>
						<div class="answer clearfix">
							<?=($show_mark)?'<div class="mark"><p>A:</p></div>':'';?><div class="content"><?=apply_filters('the_content',$faq['answer']);?></div>
						</div>
					</div>
					
			<? } ?>
			</div>
		</section>
	<? }
?>
