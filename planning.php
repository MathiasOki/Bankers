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

	<div class="right-side container-fluid full-white">
		<div class="row margin-invert">
			<div class="col-md-12">
				<div class="panel panel-default panel-white">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#">Budsjett</a></li>
							<li><a href="savings.php">Spare</a></li>
							<li><a href="regularPayment.php">Fast betaling</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid padding-top">
			<div class="row margin-invert">
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Budsjett</h4>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<canvas id="myChart" width="200" height="100"></canvas>
								</div>
							</div>
						</div>
						<div class="panel-footer text-right">
									<button type="submit" class="btn btn-bankers">Endre budsjett</button>
						</div>
					</div>
		        </div>
				<div class="col-md-4">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Foreslått budsjett</h4>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<p>
										Å sette opp et budsjett for første gang kan være vanskelig. Vi har samlet inn informasjon om hvordan budsjettene til folk på din alder og med samme inntekt har satt opp sine budsjett. Velg foreslått budsjett fra menyen i lag budsjett for å se om disse budsjettene kan passe deg.
									</p>
								</div>
							</div>
						</div>
						<div class="panel-footer text-right">
							<button type="submit" class="btn btn-bankers">Endre budsjett</button>
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
            type: 'bar',
            data: {
                labels: ["Mat", "Mobil", "Sparing", "Boligsparing", "Klær"],
                datasets: [{
                    label: 'Mitt budsjett',
                    data: [2000, 1200, 1000, 1500, 800],
                    backgroundColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },
				{
                    label: 'Brukt denne mnd',
                    data: [3000, 1000, 1000, 1400, 700],
                    backgroundColor: [
                        'rgba(221, 0, 0, 1)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                        'rgba(221, 0, 0, 1))',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderWidth: 1
                },
			]
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
