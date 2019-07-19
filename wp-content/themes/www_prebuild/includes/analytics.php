<?php // Google Analytics

	if (get_option('fsol_client_googleanalytics') && get_option('fsol_client_googleanalytics') != "") { ?>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?=get_option('fsol_client_googleanalytics');?>"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', '<?=get_option('fsol_client_googleanalytics');?>');
		</script>	
		
	<? } 
?>
