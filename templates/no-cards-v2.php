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
							<?php
								$result = $satan->getAccounts($logged['customerID']);
								foreach($result as $row) {
							?>
								<li class="<?=($account == $row['accountNumber']) ? 'active':'';?>"><a href="?account=<?=$row['accountNumber']?>"><?=$row['accountType']?></a></li>
							<?php
								}
							?>
						</ul>
					</div>
					<div class="panel-body padding-none">
						<div class="row">
							<div class="col-md-12 padding-all margin-bottom border-bottom">
								<ul class="nav nav-pills">
									<li class="active"><a href="#kortbeveglser" data-toggle="tab">Kortbeveglser</a></li>
									<li><a href="#betalingsbevegelser" data-toggle="tab">Betalingsbevegelser</a></li>
									<li><a href="#allebevegelser" data-toggle="tab">Alle bevegelser</a></li>
								</ul>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 padding-all margin-bottom">
								<div class="tab-content">
									<div class="tab-pane panel-form active" id="kortbeveglser">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Dato</th>
													<th>Tidspunkt</th>
													<th>Mottaker/Avsender</th>
													<th>Melding</th>
													<th>Beløp inn</th>
													<th>Beløp ut</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>02.03.17</td>
													<td>14:57</td>
													<td>Malin Glosli Haugan</td>
													<td>For pizza</td>
													<td>98,-</td>
													<td></td>
												</tr>
												<tr>
													<td>02.03.17</td>
													<td>11:12</td>
													<td>Eva Maria Dahlø</td>
													<td>For Pepsi Max</td>
													<td></td>
													<td>10,-</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="tab-pane panel-form" id="betalingsbevegelser">
										lorem 1
									</div>
									<div class="tab-pane panel-form" id="allebevegelser">
										lorem 2
									</div>
								</div>
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
</body>
</html>
