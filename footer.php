<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>

		<footer>
			<h3>Footer</h3>
		</footer>
	</div> <!-- end of #container -->
	<!-- JavaScript at the bottom for fast page loading -->
	<?php $theme->footer(); 
	/* In order to see DB profiling information:
	1. Insert this line in your config file: define( 'DEBUG', TRUE );
	2.Uncomment the followng line
	*/
	//include 'db_profiling.php';
	/*
	if ($user->loggedin) {
		echo '<p>Peak: ' . number_format(memory_get_peak_usage()/1024, 0, '.', ',') . 'Kb | End: '. number_format(memory_get_usage()/1024, 0, '.', ',').'Kb</p>';
	}
	*/
	?>
	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
		 chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7 ]>
	<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
</body>
</html>
