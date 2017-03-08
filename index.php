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
<div class="flex-container">

	<?php
		require_once("assets/common/inc/sidebar.php");
	?>

	<div class="right-side container-fluid content-padding">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Saldo på brukskonto
                    </div>
                    <div class="panel-body text-center">
                        <h2><?=$customClass->makeCurrency(18342.5, NULL)?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Saldo på brukskonto
                    </div>
                    <div class="panel-body text-center">
                        <h2><?=$customClass->makeCurrency(153498, NULL)?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Saldo på brukskonto
                    </div>
                    <div class="panel-body text-center">
                        <h2><?=$customClass->makeCurrency(1542, 12)?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#" data-toggle="tab">Betale</a></li>
							<li><a href="#" data-toggle="tab">Overføre</a></li>
							<li><a href="#" data-toggle="tab">VIPPS</a></li>
						</ul>
                    </div>

					<div class="panel-body">
						<form>
							<row>
								<div class="form-group col-md-6">
								  <label for="tlf">Fra konto</label>
								  <input type="number" class="form-control" id="tlf" placeholder="Skriv eller søk..." required="">
								</div>

								<div class="form-group col-md-6">
								  <label for="sum">Til konto</label>
								  <input type="number" class="form-control" id="sum" placeholder="Skriv eller søk...." required="">
								</div>
							</row>


							<row>
								<div class="form-group col-md-8">
								  <label for="sum">KID/melding</label>
								  <input type="number" class="form-control" id="sum" placeholder="skriv her..." required="">
								</div>

								<div class="form-group col-md-4">
								  <label for="sum">Beløp</label>
								  <input type="number" class="form-control" placeholder="00.00" required="">
								</div>
							</row>

							<row>
								<div class="form-group col-md-8">
								  <label for="sum">Motakers navn</label>
								  <input type="number" class="form-control" placeholder="Navn navnesen..." required="">
								</div>

								<div class="form-group col-md-4">
								  <label for="sum">dato</label>
								  <input type="number" class="form-control" placeholder="dd/mm/yyyy..." required="">
								</div>
							</row>
						</div>
						<div class="panel-footer">
							<div class="row">
								<div class="col-md-10 col-md-offset-0">
									<button type="submit" class="btn btn-primary">Betal</button>
								</div>
							</div>
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
                        Vipps
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                              <label for="tlf">Telefonnummer</label>
                              <input type="number" class="form-control" id="tlf" placeholder="Eks.: 543 45 321" required="">
                            </div>

                            <div class="form-group">
                              <label for="sum">Beløp</label>
                              <input type="number" class="form-control" id="sum" placeholder="Eks.: 100" required="">
                            </div>
                        </form>
                    </div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-10 col-md-offset-0">
								<button type="submit" class="btn btn-primary">Betal</button>
							</div>
						</div>
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
