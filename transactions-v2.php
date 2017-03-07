<?php
    require_once("global/config.php");

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
		exit;
	}

	$logged = $satan->getUser($_SESSION['user']);

	require_once("assets/common/inc/head.php");
	require_once("assets/common/inc/navbar.php");
?>
<div class="support-btn">
	<a href="#"><span class="fa-stack fa-2x">
		<i class="fa fa-circle fa-stack-2x text-blue"></i>
		<i class="fa fa-question fa-stack-1x fa-inverse"></i>
	</span></a>
</div>

<div class="flex-container">

	<?php
		require_once("assets/common/inc/sidebar.php");
	?>

	<div class="right-side container-fluid full-white">
			<div class="row margin-invert">
				<div class="col-md-12">
					<div class="panel panel-default panel-white">
						<div class="panel-heading">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#">Alle bevegelser</a></li>
								<li><a href="#">Betalingsbevegelser</a></li>
								<li><a href="#">Kortbevegelser</a></li>
							</ul>
						</div>
						<div class="panel-body padding-none">
							<div class="row">
								<div class="col-md-12 padding-all border-bottom margin-bottom">
									<ul class="nav nav-pills">
										<?php
											$result = $satan->getAccounts($logged['customerID']);
											foreach($result as $row) {
										?>
										<li><a href="#brukskonto" data-toggle="tab"><?=$row['accountType']?></a></li>
										<?php
											}
										?>
									</ul>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									lorem
								</div>
							</div>
						</div>

				</div>
	        </div>
		</div>

        <?php
			include_once("assets/common/inc/footer.php");
		?>
    </div><!-- /container -->
</div>

    <?php
		include_once("assets/common/inc/scripts.php");
	?>
</body>
</html>
