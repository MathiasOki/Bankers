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

$error = false;

if( isset($_POST['transfer']) ) {

	// prevent injections/ clear user invalid inputs
	$from = trim($_POST['accountFrom']);
	$from = strip_tags($from);
	$from = htmlspecialchars($from);

	$to = trim($_POST['accountTo']);
	$to = strip_tags($to);
	$to = htmlspecialchars($to);

	$kroner = trim($_POST['kroner']);
	$kroner = strip_tags($kroner);
	$kroner = htmlspecialchars($kroner);

	$ore = trim($_POST['ore']);
	$ore = strip_tags($ore);
	$ore = htmlspecialchars($ore);

	if(empty($from)){
		$error = true;
		$errorMessage = "Du må skrive inn fra-konto.";
	}

	if(empty($to)){
		$error = true;
		$errorMessage = "Du må skrive inn til-konto.";
	}

	if(empty($kroner)){

		$kroner = 0;

		//$error = true;
		//$errorMessage = "Du må skrive inn kroner.";
	}

	if(empty($ore)){
		$error = true;
		$errorMessage = "Du må skrive inn øre.";
	}

	if(!$error){

		$data = $satan->internalTransfer($from, $to, $kroner, $ore);

		if ($data == true) {
			$successMessage = "Pengene er overført.";
		}
		if ($data == false) {
			$error = true;
			$errorMessage = "En feil skjedde. Prøv igjen.";
		}
	}
}
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
			<div class="col-md-6">
				<div class="panel panel-default panel-white">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li><a href="payment.php">Betale</a></li>
							<li class="active"><a href="transfer.php">Overføre</a></li>
							<li><a href="vipps.php">Vipps</a></li>
						</ul>
					</div>
					<div class="panel-body padding-none">
						<div class="row">
							<div class="col-md-12 padding-all">
								<?php
									if (isset($errorMessage)) {
								?>
								<div class="alert alert-danger margin-top">
									<?=$errorMessage?>
								</div>
								<?php
								   }
								?>

								<?php
									if (isset($successMessage)) {
								?>
								<div class="alert alert-success margin-top">
									<?=$successMessage?>
								</div>
								<?php
								   }
								?>

								<h3 class="border">Overføre mellom kontoer</h3>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<form class="form-horizontal form-custom" method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
									<div class="row">
										<div class="col-sm-6 border-right padding-none padding-right">
											<div class="form-group">
												<label for="accountFrom">Fra konto</label>
												<select class="form-control" name="accountFrom" required="">
													<option selected disabled>Velg konto</option>
													<?php
														$result = $satan->getAccounts($logged['customerID']);
														foreach($result as $row) {
													?>
													<option value="<?=$row['accountNumber']?>"><?=$row['accountType']?> (<?=$customClass->makeAccountNumber($row['accountNumber'])?>)</option>
													<?php
														}
													?>
												</select>
											</div>
										</div>

										<div class="col-sm-6 padding-none padding-left">
											<div class="form-group">
												<label for="accountTo">Til konto</label>
												<select class="form-control" name="accountTo" required="">
													<option selected disabled>Velg konto</option>
													<?php
														$result = $satan->getAccounts($logged['customerID']);
														foreach($result as $row) {
													?>
													<option value="<?=$row['accountNumber']?>"><?=$row['accountType']?> (<?=$customClass->makeAccountNumber($row['accountNumber'])?>)</option>
													<?php
														}
													?>
												</select>
											</div>
										</div>
									</div>

									<hr>

									<div class="form-group">
										<label for="message">Melding</label>
										<textarea class="form-control" rows="5"></textarea>
									</div>

									<hr>

									<div class="row">
										<div class="col-sm-6 border-right padding-none padding-right">
											<div class="form-group">
												<label for="">Dato</label>
												<p>(Her kommer en datepicker)</p>
											</div>
										</div>

										<div class="col-sm-6 padding-none padding-left">
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

									<hr class="margin-none margin-bottom">

									<div class="row padding-bottom">
										<div class="col-md-12 padding-none">
											<button type="submit" name="transfer" class="btn btn-bankers btn-block">Overfør</button>
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
