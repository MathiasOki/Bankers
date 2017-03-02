<?php
require_once("global/config.php");
if($_GET["type"] != 404 && $_GET["type"] != 401){
	header("Location: index.php");
	die();
}

$codes = array(
	404 => array('404', 'Page not found', 'The page you were looking for doesnt exist or another error occured.'),
	401 => array('401', 'Unauthorized', 'Access is denied due to invalid credentials.')
);
$code = $codes[$_GET["type"]][0];
$title = $codes[$_GET["type"]][1];
$message = $codes[$_GET["type"]][2];

require_once("assets/common/inc/head.php");
?>
<body id="error" class="bg-vipps">
	<div class="site-wrapper">
		<div class="site-wrapper-inner">
			<div class="cover-container">
				<div class="inner cover">
					<h1 class="cover-heading"><?php echo $code ?></h1>
					<h3><?php echo $title ?></h3>
					<p class="lead">
						<?php echo $message ?>
					</p>
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default"><a href="index.php" class="btn-error">Tilbake til forsiden</a></button>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /container -->


	<!-- Import JavaScript -->
	<script src="assets/lib/jquery-3.1.1/jquery-3.1.1.min.js"></script>
	<script src="assets/lib/bootstrap-3.3.7/js/bootstrap.js"></script>
	<script src="assets/lib/bootstrap-toggle/js/bootstrap-toggle.js"></script>
	<script src="assets/lib/chartjs-2.3.0/Chart.js"></script>

</body>
</html>
