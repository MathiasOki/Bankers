<?php
	require_once("global/config.php");
	require_once("assets/common/inc/head.php");
?>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 text-center" id="error">
				<?=$bot->reveal('img', 9)?>

				<br><br>

				<h1>Siden ble ikke funnet!</h1>
				<p class="lead">Feilmelding 404.</p>

				<br><br>

				<p><a href="./index.php" class="btn btn-lg btn-bankers">Gå tilbake til forsiden &raquo;</a><p>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
<?php
	include_once("assets/common/inc/scripts.php");
?>
</body>
</html>
