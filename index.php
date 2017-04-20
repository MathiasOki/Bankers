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

	$error = false;

	function countDigits($str)
	{
	    return preg_match_all( "/[0-9]/", $str);
	}

	if( isset($_POST['payment']) ) {

		// prevent injections/ clear user invalid inputs
		$from = trim($_POST['accountFrom']);
		$from = strip_tags($from);
		$from = htmlspecialchars($from);

		$to = trim($_POST['accountTo']);
		$to = strip_tags($to);
		$to = htmlspecialchars($to);

		$msg = trim($_POST['message']);
		$msg = rawurlencode($msg);

		$kroner = trim($_POST['kroner']);
		$kroner = strip_tags($kroner);
		$kroner = htmlspecialchars($kroner);

		$ore = trim($_POST['ore']);
		$ore = strip_tags($ore);
		$ore = htmlspecialchars($ore);

		if(empty($_POST['recurring'])){
			$recurring = 0;
		} else {
			$recurring = $_POST['recurring'];
		}

		if(empty($from)){
			$error = true;
			$errorMessage = "Du må skrive inn fra-konto.";
		}

		if(empty($to)){
			$error = true;
			$errorMessage = "Du må skrive inn til-konto.";
		}

		if(empty($msg)){
			$msg = "%20";
		}

		if(countDigits($to) < 11){
			$error = true;
			$errorMessage = "Kononummeret eksisterer ikke.";
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
			$interval = 0;
			$endDate = 0;

			$data = $satan->payment($msg, $from, $to, $kroner, $ore, $recurring, $interval, $endDate);

			if ($data == true) {
				$successMessage = "Pengene er overført.";
			} else {
				$error = true;
				$errorMessage = "En feil skjedde. Prøv igjen.";
			}
		}
	}

	if( isset($_POST['transfer']) ) {

		// prevent injections/ clear user invalid inputs
		$from = trim($_POST['accountFrom']);
		$from = strip_tags($from);
		$from = htmlspecialchars($from);

		$to = trim($_POST['accountTo']);
		$to = strip_tags($to);
		$to = htmlspecialchars($to);

		$msg = trim($_POST['message']);
		$msg = rawurlencode($msg);

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

		if(empty($msg)){
			$msg = "%20";
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
			$data = $satan->internalTransfer($msg, $from, $to, $kroner, $ore);

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
<div class="flex-container">

	<?php
		require_once("assets/common/inc/sidebar.php");
	?>

	<div class="right-side container-fluid content-padding">
        <div class="row">

			<?php
			$result = $satan->getAccounts($logged['customerID']);
			for ($i=0; $i < 3 && $i < count($result); $i++) {
				$row = $result[$i];
				$accountName = $row['name'] != null ? $row['name'] : $row['accountType'];
			?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-semiblack">
						<small class="text-muted pull-right">(<?=$customClass->makeAccountNumber($row['accountNumber'])?>)</small>
                        Disponibel saldo
                    </div>
                    <div class="panel-body text-center">
						<h4 class="text-bankers"><?=$accountName?></h4>
                        <h2><?=$customClass->makeCurrency($row['kroner'], $row['oere'])?></h2>
                    </div>
					<div class="panel-footer text-center collapse-with-caret" data-toggle="collapse" data-target="#collapse-<?=$row['accountNumber']?>" aria-expanded="false" aria-controls="collapse-<?=$row['accountNumber']?>">
						<p>Siste bevegelser<br><i class="fa collapse-caret margin-top btn btn-bankers"></i></p>
						<div class="collapse" id="collapse-<?=$row['accountNumber']?>">
							<table class="table table-striped">
								<thead>
									<th>Tidspunkt</th>
									<th>Type</th>
									<th>Beløp</th>
								</thead>
								<tbody>
									<?php
									$account = $row['accountNumber'];
									$resultTransactions = $satan->getAllTransactions($account);

									for ($x=0; $x < 11 && $x < count($resultTransactions); $x++) {
										$row = $resultTransactions[$x];
									/*foreach ($resultTransactions as $row) {*/
										?>
										<tr>
											<td><span data-toggle="tooltip" data-placement="top" title="<?=date('d. F Y \k\l. H:i:s', $row['timestamp'])?>"><?=$customClass->convertTime($row['timestamp'])?></span></td>
											<?php
											if($row['transactionType'] == "payment"){
												echo ('<td>Betaling via nettbank</td>');
											}
											if($row['transactionType'] == "card"){
												echo ('<td>Betaling med kort</td>');
											}
											if($row['transactionType'] == "transfer"){
												echo ('<td>Overføring mellom kontoer</td>');
											}
											?>
											<?php
											if($row['recievingAccount'] != $account){
												echo ('<td class="text-danger">- '.$customClass->makeCurrency($row['kroner'], $row['oere']).'</td>');
											} else {
												echo ('<td class="text-success">+ '.$customClass->makeCurrency($row['kroner'], $row['oere']).'</td>');
											}
											?>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
			<?php
				}
			?>
        </div>

        <div class="row">
            <div class="col-md-8">

				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-exchange fa-fw float-left text-semiblack margin-right" aria-hidden="true"></i>
						<h5 class="text-semiblack margin-none">Flytte penger</h5>
					</div>
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#betale" data-toggle="tab">Til andre</a></li>
							<li><a href="#overfore" data-toggle="tab">Egne kontoer</a></li>
							<li><a href="#vipps" data-toggle="tab">VIPPS</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane panel-form active" id="betale">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<form class="form-horizontal form-custom" method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
											<div class="row">
												<div class="col-sm-6 border-right">
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

												<div class="col-sm-6">
													<div class="form-group">
														<label for="accountTo">Til konto</label>
														<input type="number" class="form-control" name="accountTo" required="">
													</div>
												</div>
											</div>

											<hr>

											<div class="form-group">
												<label for="message">Melding</label>
												<textarea class="form-control" rows="5" name="message"></textarea>
											</div>

											<hr>

											<div class="row valign">
												<div class="col-sm-6 border-right">
													<div class="form-group">
														<label for="">Overføringsdato</label>
														<p>(Her kommer en datepicker)</p>
													</div>

													<div class="form-group">
														<label for="">Er dette en fast overføring?</label><br>
														<input type="checkbox" data-toggle="toggle" data-on="Ja" data-off="Nei" name="recurring" value="1">
													</div>
												</div>

												<div class="col-sm-6">
													<div class="form-group">
														<label for="kroner">Beløp (kroner og øre)</label>
														<div class="row">
															<div class="col-xs-8">
																<input class="form-control" type="number" name="kroner" required="">
															</div>
															<div class="col-xs-4">
																<input class="form-control" type="number" name="ore" value="00" required="">
															</div>
														</div>
													</div>
												</div>
											</div>

											<hr class="margin-none margin-bottom margin-top">

											<div class="row padding-bottom">
												<div class="col-md-12">
													<button type="submit" name="payment" class="btn btn-bankers btn-block">Betal</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane panel-form" id="overfore">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<form class="form-horizontal form-custom" method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
											<div class="row">
												<div class="col-sm-6 border-right">
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

												<div class="col-sm-6">
													<div class="form-group">
														<label for="accountTo">Til konto</label>
														<select class="form-control" name="accountTo" required="">
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
											</div>

											<hr>

											<div class="form-group">
												<label for="message">Melding</label>
												<textarea class="form-control" rows="5" name="message"></textarea>
											</div>

											<hr>

											<div class="row">
												<div class="col-sm-6 border-right">
													<div class="form-group">
														<label for="">Dato</label>
														<p>(Her kommer en datepicker)</p>
													</div>
												</div>

												<div class="col-sm-6">
													<div class="form-group">
														<label for="kroner">Beløp (kroner og øre)</label>
														<div class="row">
															<div class="col-xs-8">
																<input class="form-control" type="number" name="kroner" required="">
															</div>
															<div class="col-xs-4">
																<input class="form-control" type="number" name="ore" value="00" required="">
															</div>
														</div>
													</div>
												</div>
											</div>

											<hr class="margin-none margin-bottom margin-top">

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

						<div class="tab-pane panel-form" id="vipps">
							<div class="panel-body">
								Vipps kommer snart!
							</div>
						</div>
					</div>
				</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Budsjett</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<canvas id="myChart" width="200" height="100"></canvas>
								</div>
							</div>
						</div>
						<div class="panel-footer text-right">
									<a href="planning.php" class="btn btn-bankers">Endre budsjett</a>
						</div>
					</div>
                </div>

            <div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Sparemål
					</div>
					<div class="panel-body">
						<?php
						$result = $satan->getSavingsTargets($logged['customerID']);
						foreach($result as $row) {

							if($row['savedKroner'] == 0){
								$savedKroner = 0.0001;
							} else {
								$savedKroner = $row['savedKroner'];
							}

							if($customClass->progressBarPercentage($savedKroner,$row['goalKroner']) <= 100 && $customClass->progressBarPercentage($savedKroner,$row['goalKroner']) > 75){
								$color = 'success';
							}
							elseif($customClass->progressBarPercentage($savedKroner,$row['goalKroner']) <= 75 && $customClass->progressBarPercentage($savedKroner,$row['goalKroner']) > 10){
								$color = 'warning';
							}
							elseif($customClass->progressBarPercentage($savedKroner,$row['goalKroner']) <= 10) {
								$color = 'danger';
							}
							?>
							<h5><?=$row['name']?></h5>
							<div class="progress">
								<div class="progress-bar progress-bar-<?=$color?>" role="progressbar" aria-valuenow="<?=$customClass->progressBarPercentage($savedKroner,$row['goalKroner'])?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$customClass->progressBarPercentage($savedKroner,$row['goalKroner'])?>%;">
									<?=$customClass->progressBarPercentage($savedKroner,$row['goalKroner'])?>%
								</div>
							</div>

							<?php } ?>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-10 col-md-offset-0">
								<a href="savings.php#tab_sparemal" class="btn btn-bankers">Gå til sparemål</a>
							</div>
						</div>
					</div>
				</div>


				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Dagens tips</h3>
					</div>
					<div class="panel-body text-center">
						<h4>BSU - Bolig sparing for unge</h4>
						<h1><span class="glyphicon glyphicon-home" aria-hidden="true"></h1>
						<p>
							Bolig sparing for unge er en høyrentekonto hvor du kan sette inn 25000kr i året. I tillegg til høy rente så får du også skattelette på inntil 6000kr i året. Du kan spare inntil 300000kr tilsammen på kontoen.
						</p>
					</div>
					<div class="panel-footer text-right">
								<a href="planning.php" class="btn btn-bankers">Endre budsjett</a>
					</div>
				</div>
            </div>
        </div>


        <?php
			$footerFull = true;
			include_once("assets/common/inc/footer.php");
		?>
    </div><!-- /container -->
</div>

    <?php
		include_once("assets/common/inc/scripts.php");
	?>

	<script>
		var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: ["Husleie", "Mat", "Mobil/internett", "Sparing", "Boligsparing", "Annet"],
                datasets: [{
                    label: 'Mitt budsjett',
                    data: [3500, 2000, 1200, 1000, 1500, 800],
                    backgroundColor: [
						'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

    </script>
</body>
</html>
