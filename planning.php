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
							<li><a href="#">Spare</a></li>
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
							<h3>Oppdelt budsjett</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<canvas id="myPieChart" width="100" height="100"></canvas>
								</div>
							</div>
						</div>
						<div class="panel-footer text-right">
									<button type="submit" class="btn btn-primary">Endre budsjett</button>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Foreslått budsjett</h3>
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
							<button type="submit" class="btn btn-primary">Endre budsjett</button>
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
        var cty = document.getElementById("myPieChart");
		var myPieChart = new Chart(cty,{
		    type: 'pie',
			data: {
                labels: [],
                datasets: [{
                    data: [3500, 2000, 1200, 1000, 1500, 800],
                    backgroundColor: [
						'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ]
                }]
            },
		});
        var myChart = new Chart(ctx, {
            type: 'bar',
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
