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
							<li><a href="planning.php">Budsjett</a></li>
							<li class="active"><a href="savings.php">Spare</a></li>
							<li><a href="regularPayment.php">Fast betaling</a></li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12 padding-all">
							<ul class="nav nav-pills">
								<li class="active"><a href="#oversikt" data-toggle="tab">Oversikt</a></li>
								<li><a href="#sparemal" data-toggle="tab">Sparemål</a></li>
								<li><a href="#sparekontoer" data-toggle="tab">Sparekontoer</a></li>
								<li><a href="#spareifond" data-toggle="tab">Spare i fond</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid padding-top">
				<div class="row">
						<div class="tab-content">
							<div class="tab-pane panel-form active" id="oversikt">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											Dine sparekontoer
										</div><!--end panel heading-->
										<div class="panel-body">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Konto</th>
														<th>Disponibelt</th>
													</tr>
												</thead><!--end table head-->
												<tbody>
														<tr>
															<td>Spare</td>
															<td>15000,-</td>
														</tr>
														<tr>
															<td>BSU</td>
															<td>25000,-</td>
														</tr>
														<tr>
															<td>Spare til meg selv</td>
															<td>5000,-</td>
														</tr>
												</tbody><!--end table body-->
											</table><!--end table-->
										</div><!--end panel body-->
										<div class="panel-footer">
											<div class="row">
												<div class="col-md-10 col-md-offset-0">
													<button type="submit" class="btn btn-bankers">Opprett ny sparekonto</button>
												</div>
											</div>
										</div><!--end panel footer-->
									</div><!--end panel-->
								</div>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											Sparemål
										</div><!--end panel heading-->
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
										</div><!--end panel body-->
										<div class="panel-footer">
											<div class="row">
												<div class="col-md-10 col-md-offset-0">
													<button type="submit" class="btn btn-bankers">Opprett nytt sparemål</button>
												</div>
											</div><!--end row-->
										</div><!--end panel footer-->
									</div><!--end panel-->
								</div>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											Sparing i fond
										</div><!--end panel heading-->
										<div class="panel-body">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Fond</th>
														<th>Verdi</th>
													</tr>
												</thead><!--end table head-->
												<tbody>
														<tr>
															<td>DNB Aktiv 10</td>
															<td>123</td>
														</tr>
														<tr>
															<td>DNB Aktiv 30</td>
															<td>125</td>
														</tr>
														<tr>
															<td>DNB Aktiv 50</td>
															<td>131</td>
														</tr>
														<tr>
															<td>DNB Aktiv 60</td>
															<td>135</td>
														</tr>
												</tbody><!--end table body-->
											</table><!--end table-->
										</div><!--end panel body-->
										<div class="panel-footer">
											<div class="row">
												<div class="col-md-10 col-md-offset-0">
													<button type="submit" class="btn btn-bankers">Se mer om fond</button>
												</div>
											</div><!--end row-->
										</div><!--end panel footer-->
									</div><!--end panel-->
								</div>
							</div><!--end tab pane-->
							<div class="tab-pane panel-form" id="sparemal">
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											Ny Macbook Pro
										</div><!--end panel heading-->
										<div class="panel-body">
											<table class="table table-striped">
												<tbody>
													<tr>
														<th>Spart</th>
														<td>10 000,-</td>
													</tr>
													<tr>
														<th>Gjenstår</th>
														<td>19 000,-</td>
													</tr>
													<tr>
														<th>Spart i snitt per mnd</th>
														<td>1050,-</td>
													</tr>
													<tr>
														<th>Dager spart</th>
														<td>280</td>
													</tr>
													<tr>
														<th>Dager igjen</th>
														<td>300</td>
													</tr>
													<tr>
														<th>Antall innskudd</th>
														<td>4</td>
													</tr>
												</tbody>
											</table>
											<div class="row">
												<div class="col-md-12">
													<div class="progress">
														  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 55%;">
														    55%
														  </div>
													</div>
												</div>
											</div><!--end row-->
										</div><!--end panel body-->
										<div class="panel-footer">
											<div class="row">
												<div class="col-md-10 col-md-offset-0">
													<button type="submit" class="btn btn-bankers">Sett inn</button>
												</div>
											</div><!--end row-->
										</div><!--end panel footer-->
									</div><!--end panel-->
								</div>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											Nytt mål
										</div><!--end panel heading-->
										<div class="panel-body">
											<a href="addAccountOverview.php">
												<i class="fa fa-plus fa-6"></i>
											</a>
										</div><!--end panel body-->
									</div><!--end panel-->
								</div>
							</div><!--end tab pane-->
						</div><!--end tab content-->
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
