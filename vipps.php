<?php
	require_once("global/config.php");

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) || $satan->checkServer() != true) {
		header("Location: logout.php");
		exit;
	}

	$logged = $satan->getUser($_SESSION['user']);

	require_once("assets/common/inc/head.php");
	//require_once("assets/common/inc/header.php");
	require_once("assets/common/inc/navbar.php");
?>
<div class="flex-container">

	<?php
		require_once("assets/common/inc/sidebar.php");
	?>

	<div class="right-side container-fluid full-white">
		<div class="row margin-invert">
			<div class="col-md-6">
				<div class="panel panel-default panel-white">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li><a href="payment.php">Til andre</a></li>
							<li><a href="transfer.php">Egne kontoer</a></li>
							<li class="active"><a href="vipps.php">Vipps</a></li>
						</ul>
					</div>
					<div class="panel-body padding-none">
						<div class="row">
							<div class="col-md-12 padding-all">
								<h3 class="border">Vipps</h3>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<form class="form-horizontal form-custom" method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
									<div class="row">
										<div class="col-sm-4 border-right padding-none padding-right">
											<div class="form-group">
												<label for="accountFrom">Fra konto</label>
												<select class="form-control" name="accountFrom" required="">
													<option selected disabled>Velg konto</option>
													<?php
														$result = $satan->getAccounts($logged['customerID']);
														foreach($result as $row) {
															$accountName = $row['name'] != null ? $row['name'] : $row['accountType'];
													?>
													<option value="<?=$row['accountNumber']?>"><?=$accountName?> (<?=$customClass->makeAccountNumber($row['accountNumber'])?>)</option>
													<?php
														}
													?>
												</select>
											</div>
										</div>

										<div class="col-sm-4 border-right padding-none padding-left padding-right">
											<div class="form-group">
												<label for="accountTo">Til (telefonnummer)</label>
												<input type="number" class="form-control" name="accountTo" required="">
											</div>
										</div>

										<div class="col-sm-4 padding-none padding-left">
											<div class="form-group">
												<label for="kroner">Beløp (kroner og øre)</label>
												<div class="row">
													<div class="col-xs-8 padding-none">
														<input class="form-control" type="number" name="kroner" required="">
													</div>
													<div class="col-xs-4 padding-none padding-left">
														<input class="form-control" type="number" name="ore" value="00" required="">
													</div>
												</div>
											</div>
										</div>
									</div>

									<hr>

									<div class="form-group">
										<label for="message">Melding</label>
										<textarea class="form-control" rows="2" name="message"></textarea>
									</div>
									<hr class="margin-none margin-bottom">

									<div class="row padding-bottom">
										<div class="col-md-12 padding-none">
											<button type="submit" name="vipps" class="btn btn-bankers btn-block">Vipps!</button>
										</div>
									</div>
								</form>
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
