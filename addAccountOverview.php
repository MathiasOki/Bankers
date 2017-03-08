<?php
    require_once("global/config.php");

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) || $satan->checkServer() != true) {
		header("Location: logout.php");
		exit;
	}

	$logged = $satan->getUser($_SESSION['user']);

	require_once("assets/common/inc/head.php");
	require_once("assets/common/inc/navbar.php");
?>
<div class="flex-container">

	<?php
		require_once("assets/common/inc/sidebar.php");
	?>

	<div class="right-side container-fluid content-padding">
		<div class="row">
			<div class="col-md-12">
					<div class="panel-body">
						<form>
							<row>
								<div class="col-md-6">
									<div class="col-md-12">
										<div class="panel-heading">
											<h2>Vanlig</h2>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												Brukskonto
											</div>
											<div class="panel-body">
												Brukskonto er en konto til daglige banktjenester.
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-primary">Åpne konto</button>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												Depositumskonto
											</div>
											<div class="panel-body">
												Brukskonto er en konto til daglige banktjenester.
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-primary">Åpne konto</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="col-md-12">
										<div class="panel-heading">
											<h2>Spare</h2>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												Sparekonto
											</div>
											<div class="panel-body">
												Brukskonto er en konto til daglige banktjenester.
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-primary">Åpne konto</button>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												Superspar
											</div>
											<div class="panel-body">
												Brukskonto er en konto til daglige banktjenester.
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-primary">Åpne konto</button>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												BSU
											</div>
											<div class="panel-body">
												Brukskonto er en konto til daglige banktjenester.
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-primary">Åpne konto</button>
											</div>
										</div>
									</div>
								</div>
							</row>
						</form>
					</div>
			</div>
		</div><!-- /row -->

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
