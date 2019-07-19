<div class="portfolio-box clearfix">
	<div id="portfolio-chooser" class="clearfix">
		<ul>
			<li><a class="active" data-id="-1" href="#">All</a></li>
			<?	// fetch project categories
				$all_project_cats = get_terms(array('taxonomy'=>'project_category'));
				foreach($all_project_cats as $apc) { ?>
					<li><a href="#" data-id="<?=$apc->term_id;?>"><?=$apc->name;?></a></li>
				<? }
			?>
		</ul>
	</div>
	<div id="portfolio-gallery" class="clearfix">
		<?	// fetch projects
			$projects_args = array('post_type'=>'project','posts_per_page'=>-1,'post_status'=>'publish');
			$projects = new WP_Query($projects_args);
			
			foreach($projects->posts as $project) { 
				$project_categories = "";
				$project_cats = get_the_terms($project->ID,'project_category');
				$image_id = get_post_thumbnail_id($project->ID);
				$image = wp_get_attachment_image_src($image_id,'full');
				
				foreach($project_cats as $pc) {
					$project_categories .= ' pcat-'.$pc->term_id;
				} ?>
				
				<div class="portfolio-gallery-slide<?=$project_categories;?>"><a href="<?=get_the_permalink($project->ID);?>">
					<div class="backdrop" style="background-image:url(<?=$image[0];?>);">&nbsp;</div>
					<div class="overlay">
						<h4><?=$project->post_title;?></h4>
						<p><?=$project->post_content;?></p>
					</div>
				</a></div>
				
			<? }
		?>
	</div>
</div>