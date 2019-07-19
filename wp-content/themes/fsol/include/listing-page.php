<?	// fsl calendar
	if (get_field('is_calendar_page')) { // add space between content and  calendar ?>

		<br><br>
		
		<?	// render calendar
		$this_calendar = get_field('calendar_base_category')->slug;
		fsl_calendar(array('cat'=>$this_calendar));
	}
?>

<? 	if (get_field('is_listing_search_page')) { ?>
	<?	// grab filter options
		$base_category = get_field('listing_base_category')->slug;
		$base_feature = get_field('listing_base_feature')->slug;
		$base_keyword = get_field('listing_base_keyword');
		$unused_features = get_field('listing_unused_features');
		if (count($unused_features) > 0) {
			$uf_array = array();
			foreach ($unused_features as $uf) {
				$uf_array[] = $uf->name;
			}
		} 
	?>
	<br><br>
	<? $fsl_args = fsl_apply_filters($base_category); ?>
	<?	// base feature filter
		if ($base_feature != "")  {
			fsl_feature_filters($base_feature);
		}
	?>
	<? if (get_field('listing_base_distance') > 0) {
		$fsl_args['fsl_filter_distancetype'] = get_field('listing_base_distance');
		$_SESSION['fsl_filter_distancetype'] = get_field('listing_base_distance');
	
	} ?>
	<? if ($base_keyword != "") {
		$fsl_args['s'] = $base_keyword;
		$_SESSION['s'] = $base_keyword;
	} ?>
	<?	// create filters
		if (count($unused_features) > 0) {
			fsl_build_filters(array('features_unused'=>$uf_array));
		} else {
			fsl_build_filters(); 
		} 
	?>
	<br><br>
	<? // listings
		$total = fsl_listings($fsl_args);
		$page = $fsl_args['fsl_page'];
		fsl_pager($total,$page); ?>
	
<? } ?>