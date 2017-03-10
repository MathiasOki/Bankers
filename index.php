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
				<div class="alert-message alert-message-success">
					<div class="row">
						<div class="col-xs-2 text-center">
							<img src="assets/common/img/maskot/15.svg">
						</div>

						<div class="col-md-10">
							<h4>Tjen penger uten å løfte en finger!</h4>
							<p>Hey! Nå har du hatt mye penger på en konto en stund og der kunne du tjent masse renter! Vil du at jeg skal hjelpe deg med å sette opp en sparekonto, og kanskje gi deg en innføring i enkle penger med sparing?</p>

							<p><a href="#" class="btn btn-bankers">Ja, vis meg!</a> <a href="" class="btn btn-link">Nei, det vil jeg ikke :(</a></p>
						</div>
					</div>
	            </div>
	        </div>
		</div>

        <div class="row">

			<?php
			$result = $satan->getAccounts($logged['customerID']);
			for ($i=0; $i < 3 && $i < count($result); $i++) {
				$row = $result[$i];
			?>
            <div class="col-md-4">
                <div class="panel panel-default" data-toggle="collapse" data-target="#<?=$row['accountNumber']?>" aria-expanded="false" aria-controls="collapse">
                    <div class="panel-heading">
						<small class="text-muted pull-right">(<?=$customClass->makeAccountNumber($row['accountNumber'])?>)</small>
                        Disponibel saldo på <?=$row['accountType']?>
                    </div>
                    <div class="panel-body text-center">
                        <h2><?=$customClass->makeCurrency($row['kroner'], $row['oere'])?></h2>
						<div class="collapse" id="<?=$row['accountNumber']?>">
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
										foreach ($resultTransactions as $row) {
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
												echo ('<td class="text-success">+ '.$customClass->makeCurrency($row['kroner'], $row['oere']).'</td>');
											} else {
												echo ('<td class="text-danger">- '.$customClass->makeCurrency($row['kroner'], $row['oere']).'</td>');
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
					<div class="panel-footer text-center">
						<p><span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></p>
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
						<ul class="nav nav-tabs">
							<li class="active"><a href="#betale" data-toggle="tab">Betale</a></li>
							<li><a href="#overfore" data-toggle="tab">Overføre</a></li>
							<li><a href="#vipps" data-toggle="tab">VIPPS</a></li>
						</ul>
					</div>
					<form rel="form">
						<div class="tab-content">
							<div class="tab-pane panel-form active" id="betale">
								<div class="panel-body">
										<div class="row">
											<div class="form-group col-md-6">
											  <label for="tlf">Fra konto</label>
											  <input type="number" class="form-control" id="tlf" placeholder="Skriv eller søk..." required="">
											</div>

											<div class="form-group col-md-6">
											  <label for="sum">Til konto</label>
											  <input type="number" class="form-control" id="sum" placeholder="Skriv eller søk...." required="">
											</div>
										</div>


										<div class="row">
											<div class="form-group col-md-8">
											  <label for="sum">KID/melding</label>
											  <input type="number" class="form-control" id="sum" placeholder="skriv her..." required="">
											</div>

											<div class="form-group col-md-4">
											  <label for="sum">Beløp</label>
											  <input type="number" class="form-control" placeholder="00.00" required="">
											</div>
										</div>

										<div class="row">
											<div class="form-group col-md-6">
											  <label for="sum">Motakers navn</label>
											  <input type="number" class="form-control" placeholder="Navn navnesen..." required="">
											</div>

											<div class="form-group col-md-4">
											  <label for="sum">dato</label>
											  <input type="number" class="form-control" placeholder="dd/mm/yyyy..." required="">
											</div>
										<div class="form-group col-md-2">
											<p><b>Fast?</b></p>
											<div class="dropdown">
												  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
													Nei
													<span class="caret"></span>
												  </button>
												  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
														<li><a href="#">Daglig</a></li>
														<li><a href="#">Ukentlig</a></li>
														<li><a href="#">Annenhver uke</a></li>
														<li role="separator" class="divider"></li>
														<li><a href="#">Månedlig</a></li>
														<li><a href="#">Kvartal</a></li>
														<li><a href="#">Årlig</a></li>
												  </ul>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane panel-form" id="overfore">
								<div class="panel-body">
										<div class="row">
											<div class="form-group col-md-5">
											  <label for="tlf">Fra konto</label>
											  <input type="number" class="form-control" id="tlf" placeholder="Skriv eller søk..." required="">
											</div>

											<div class="form-group col-md-5">
											  <label for="sum">Til konto</label>
											  <input type="number" class="form-control" id="sum" placeholder="Skriv eller søk...." required="">
											</div>
											<div class="form-group col-md-2">
												<p><b>Fast?</b></p>
												<div class="dropdown">
													  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
														Nei
														<span class="caret"></span>
													  </button>
													  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
															<li><a href="#">Daglig</a></li>
															<li><a href="#">Ukentlig</a></li>
															<li><a href="#">Annenhver uke</a></li>
															<li role="separator" class="divider"></li>
															<li><a href="#">Månedlig</a></li>
															<li><a href="#">Kvartal</a></li>
															<li><a href="#">Årlig</a></li>
													  </ul>
												</div>
											</div>
										</div>


										<div class="row">
											<div class="form-group col-md-6">
											  <label for="sum">Melding</label>
											  <input type="number" class="form-control" id="sum" placeholder="skriv her..." required="">
											</div>

											<div class="form-group col-md-3">
											  <label for="sum">Beløp</label>
											  <input type="number" class="form-control" placeholder="00.00" required="">
											</div>
											<div class="form-group col-md-3">
											  <label for="sum">dato</label>
											  <input type="number" class="form-control" placeholder="dd/mm/yyyy..." required="">
											</div>
										</div>
								</div>
							</div>

							<div class="tab-pane panel-form" id="vipps">
								<div class="panel-body">
										<div class="row">
											<div class="form-group col-md-4">
											  <label for="tlf">Til</label>
											  <input type="number" class="form-control" id="tlf" placeholder="Tlfnummer eller søk etter person" required="">
											</div>
											<div class="form-group col-md-4">
											  <label for="sum">Melding</label>
											  <input type="number" class="form-control" id="sum" placeholder="skriv melding her..." required="">
											</div>
											<div class="form-group col-md-4">
											  <label for="sum">Beløp</label>
											  <input type="number" class="form-control" placeholder="00.00" required="">
											</div>
									</div>
								</div>
							</div>
						</div>

						<div class="panel-footer text-right">
									<button type="submit" class="btn btn-primary">Betale</button>
						</div>
					</form>
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
									<button type="submit" class="btn btn-primary">Endre budsjett</button>
						</div>
					</div>
                </div>





            <div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Sparemål
					</div>
					<div class="panel-body">
						<h5>Ny macbook</h5>
						<div class="progress">
							  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
							    60%
							  </div>
						</div>

						<h5>Ny bil</h5>
						<div class="progress">
							  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 15%;">
							    15%
							  </div>
						</div>

						<h5>Ny tattovering</h5>
						<div class="progress">
							  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
							    90%
							  </div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-10 col-md-offset-0">
								<button type="submit" class="btn btn-primary">Gå til sparemål</button>
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
								<button type="submit" class="btn btn-primary">Endre budsjett</button>
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
