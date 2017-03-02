<?php
    require_once("global/config.php");

	// if session is not set this will redirect to login page
	/*if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
		exit;
	}*/

	//$logged = $satan->getUser($_SESSION['user']);

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
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Saldo på brukskonto
                    </div>
                    <div class="panel-body text-center">
                        <h1><?=$customClass->makeCurrency(18342.5, NULL)?></h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Saldo på brukskonto
                    </div>
                    <div class="panel-body text-center">
                        <h1><?=$customClass->makeCurrency(153498, NULL)?></h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Saldo på brukskonto
                    </div>
                    <div class="panel-body text-center">
                        <h1><?=$customClass->makeCurrency(1542, 12)?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
						<ul class="nav nav-pills">
						  <li role="presentation" class="active"><a href="#">Betale</a></li>
						  <li role="presentation"><a href="#">Overføre</a></li>
						</ul>
                    </div>
					<form>
						<div class="form-group">
						  <label for="tlf">Telefonnummer</label>
						  <input type="number" class="form-control" id="tlf" placeholder="Eks.: 543 45 321" required="">
						</div>

						<div class="form-group">
						  <label for="sum">Beløp</label>
						  <input type="number" class="form-control" id="sum" placeholder="Eks.: 100" required="">
						</div>

						<div class="form-group">
						  <label for="sum">Beløp</label>
						  <input type="number" class="form-control" id="sum" placeholder="Eks.: 100" required="">
						</div>

						<div class="form-group">
						  <label for="sum">Beløp</label>
						  <input type="number" class="form-control" id="sum" placeholder="Eks.: 100" required="">
						</div>
					</form>
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
                </div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tid" data-toggle="tab">tID</a></li>
							<li><a href="#tbank" data-toggle="tab">T-Bank</a></li>
							<li><a href="#oiu" data-toggle="tab">Oiu</a></li>
						</ul>
					</div>
					<form rel="form">
						<div class="tab-content">
							<div class="tab-pane panel-form active" id="tid">
								<div class="panel-body padding-none">
									<div class="row valign margin-none border-bottom">
										<div class="col-md-4 text-right border-right padding-all">
											Brukerpanel
										</div>
										<div class="col-md-8 padding-all">
											<div class="radio">
												<label>
													<input type="radio" name="transasksjonspanel" value="1" checked>
													Ja
												</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="transasksjonspanel" value="0">
													Nei
												</label>
											</div>
										</div>
									</div>

									<div class="row valign margin-none">
										<div class="col-md-4 text-right border-right padding-all">
											Tilgangsrettigheter
										</div>
										<div class="col-md-8 padding-all">
											<div class="radio">
												<label>
													<input type="radio" name="tilgangsrettigheter" value="1" checked>
													Ja
												</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="tilgangsrettigheter" value="0">
													Nei
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane panel-form" id="tbank">
								<div class="panel-body padding-none">
									T-Bank
								</div>
							</div>

							<div class="tab-pane panel-form" id="oiu">
								<div class="tab-pane" id="tbank">
									Oiu
								</div>
							</div>
						</div>

						<div class="panel-footer">
							<div class="row">
								<div class="col-md-10 col-md-offset-0">
									<button type="submit" class="btn btn-primary">Lagre rettigheter</button>
									<button type="reset" class="btn btn-link">Avbryt</button>
								</div>
							</div>
						</div>
					</form>
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

		$(document).ready(function () {
    /* ----------  equal height columns   -------- */
    $('.inner').matchHeight();
}); // end document ready

    </script>
</body>
</html>
