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
			<div class="col-md-12">
				<div class="panel panel-default panel-white">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li><a href="planning.php">Budsjett</a></li>
							<li><a href="savings.php">Spare</a></li>
							<li class="active"><a href="regularPayment.php">Fast betaling</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid padding-top">
	        <div class="row">
	            <div class="col-md-8">
					<div class="panel panel-default">
	                    <div class="panel-heading">
							<h3>Sett opp ny fast betaling</h3>
	                    </div>

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

								<div class="row valign">
									<div class="form-group col-md-6">
									  <label for="sum">Motakers navn</label>
									  <input type="number" class="form-control" placeholder="Navn navnesen..." required="">
									</div>

									<div class="form-group col-md-3">
									  <label for="sum">Dato</label>
									  <input type="number" class="form-control" placeholder="dd/mm/yyyy..." required="">
									</div>

									<div class="form-group col-md-3">
										<p><b>Hvor ofte</b></p>
										<div class="dropdown">
											  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											    Månedlig
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
							<div class="panel-footer">
								<div class="row">
									<div class="col-md-10 col-md-offset-0">
										<button type="submit" class="btn btn-bankers">Betal</button>
									</div>
								</div>
							</div>
						</div>
	            </div>
	            <div class="col-md-4">
	                <div class="panel panel-default">
						<div class="panel-heading">
	                        Faste betalinger
	                    </div>
	                    <div class="panel-body">
	                        <p>
								Faste betalinger gjør at du kan sette overføringer og betalinger så de går automatisk. Disse kan du foreksempel sette opp på dagen i måneden du får lønn. Da slipper du å manuelt flytte pengene mellom kontoer.
							</p>
	                    </div>
	                </div>
	            </div>
	        </div>

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Mine faste betalinger</h3>
						</div>
						<div class="panel-body">
							<table class="table table-striped">
							  	<thead>
									<tr>
										<th>Fra</th>
										<th>Til</th>
										<th>Intervall</th>
										<th>Beløp</th>
										<th>Funksjoner</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Lønnskonto</td>
										<td>Pengebingen</td>
										<td>Månedlig</td>
										<td>4000.00</td>
										<td><span class="glyphicon glyphicon-pencil"></span><span class="glyphicon glyphicon-remove"></span><span class="glyphicon glyphicon-menu-down"></span></td>
									</tr>
									<tr>
										<td>Pengebingen <br /> 1234.56.78910</td>
										<td>Sana Gulbrandsen <br />1098.76.54321</td>
										<td>Månedlig <br />Dag: <br />Siste dag i måneden</td>
										<td>500.00</td>
										<td><span class="glyphicon glyphicon-pencil"></span><span class="glyphicon glyphicon-remove"></span><span class="glyphicon glyphicon-menu-up"></span></td>
									</tr>
									<tr>
										<td>Lønnskonto</td>
										<td>Pengebingen</td>
										<td>Månedlig</td>
										<td>500.00</td>
										<td><span class="glyphicon glyphicon-pencil"></span><span class="glyphicon glyphicon-remove"></span><span class="glyphicon glyphicon-menu-down"></span></td>
									</tr>
								</tbody>
							</table>
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

    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
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
