<?php
    require_once("global/config.php");

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
		exit;
	}

	$logged = $satan->getUser($_SESSION['user']);

	require_once("assets/common/inc/head.php");
	//require_once("assets/common/inc/header.php");
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

	<div class="right-side container-fluid content">
        <div class="row margin-invert">
			<div class="col-md-8">
				<div class="panel panel-default panel-white">
					<div class="panel-heading">
						<h3>Mine kort</h3>
					</div>
					<div class="panel-body padding-none">
						<div class="row border-bottom">
							<div class="col-md-12">
								<h4>Brukskonto</h4>
								
							</div>
						</div>
						<div class="row valign padding-all border-bottom">
							<div class="col-md-4 text-right border-right">
								Brukerpanel
							</div>
							<div class="col-md-8">
								<div class="radio">
									<label>
										<input type="radio" name="transasksjonspanel" value="1" checked>
										Ja
									</label>
								</div>

								<div class="radio">
									<label>
										<input type="radio" name="transasksjonspanel" value="0">
										Nei
									</label>
								</div>
							</div>
						</div>

						<div class="row valign margin-none">
							<div class="col-md-4 text-right border-right">
								Tilgangsrettigheter
							</div>
							<div class="col-md-8 padding-all">
								<div class="radio">
									<label>
										<input type="radio" name="tilgangsrettigheter" value="1" checked>
										Ja
									</label>
								</div>

								<div class="radio">
									<label>
										<input type="radio" name="tilgangsrettigheter" value="0">
										Nei
									</label>
								</div>
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
