<?php
    require_once("global/config.php");

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
		exit;
	}

	$logged = $satan->getUser($_SESSION['user']);

	$account = trim($_GET['account']);
	$account = strip_tags($account);
	$account = htmlspecialchars($account);

	require_once("assets/common/inc/head.php");
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

	<div class="right-side container-fluid full-white">
		<div class="row margin-invert">
			<div class="col-md-12">
				<div class="panel panel-default panel-white">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li><a href="#">Budsjett</a></li>
							<li><a href="#">Spare</a></li>
							<li><a href="#">Fast betaling</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row margin-invert">
			<div class="col-md-8">
				<div class="panel panel-default panel-white">
					<div class="panel-body padding-none">
						<div class="row">
							<div class="col-md-12">
								<h3>Budsjett</h3>
								<canvas id="myChart" width="100" height="100"></canvas>
							</div>
						</div>
					</div>
				</div>
	        </div>
			<div class="col-md-4">
				<div class="panel panel-default panel-white">
					<div class="panel-body padding-none">
						<div class="row">
							<div class="col-md-12">
								<canvas id="myPieChart" width="100" height="100"></canvas>
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

	<script>
        var ctx = document.getElementById("myChart");
		var myPieChart = new Chart(ctx,{
		    type: 'pie',
			data: {
                labels: [],
                datasets: [{
                    data: [12, 19, 3, 5, 2, 3],
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
