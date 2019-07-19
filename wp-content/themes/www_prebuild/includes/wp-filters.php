<pre style="<?=(isset($_GET['wpfilter']))?"display:none;":"";?>font-size:12px;">
	<?	// echo filters

		global $wp_filter;
		if(isset($_GET['wpfilter'])) {
			print_r("[".$_GET['wpfilter']."]\n");
			print_r($wp_filter[$_GET['wpfilter']]);
		} else {
			print("\$wp_filter information (click for details): \n");
			foreach($wp_filter as $fk=>$fv) {
				printf("<a href='?wpfilter=%s'>[%s]</a>\n",$fk,$fk);
			}
		}
	?>
</pre>
