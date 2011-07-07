<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>

		<footer>

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
</body>
</html>
