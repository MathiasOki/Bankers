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
		            <div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane panel-form" id="oversikt">
								<div class="panel panel-default">
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Dine sparekontoer</th>
													<th>Disponibelt</th>
												</tr>
											</thead>
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
											</tbody>
										</table>
									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Opprett ny</button>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Dine sparekontoer</th>
													<th>Disponibelt</th>
												</tr>
											</thead>
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
											</tbody>
										</table>
									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Opprett ny</button>
											</div>
										</div>
									</div>
								</div>
							</div><!--end tab pane-->
							<div class="tab-pane panel-form" id="sparemal">
								<div class="panel panel-default">
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Dine sparekontoer</th>
													<th>Disponibelt</th>
												</tr>
											</thead>
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
											</tbody>
										</table>
									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Opprett ny</button>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Dine sparekontoer</th>
													<th>Disponibelt</th>
												</tr>
											</thead>
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
											</tbody>
										</table>
									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Opprett ny</button>
											</div>
										</div>
									</div>
								</div>
							</div><!--end tab pane-->
						</div><!--end tab content-->
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
</body>
</html>
