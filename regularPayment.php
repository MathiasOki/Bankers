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
	<div class="right-side container-fluid content-padding">
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
