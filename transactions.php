<?php
    require_once("global/config.php");

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) || $satan->checkServer() == false) {
		header("Location: logout.php");
		exit;
	}

	$logged = $satan->getUser($_SESSION['user']);

	if(empty($_GET['account'])) {
		$result = $satan->getAccounts($logged['customerID']);
		$account = $result[0]['accountNumber'];
	} else {
		$account = trim($_GET['account']);
		$account = strip_tags($account);
		$account = htmlspecialchars($account);
	}

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
							<?php
								$result = $satan->getAccounts($logged['customerID']);
								foreach($result as $row) {
							?>
								<li class="text-center <?=($account == $row['accountNumber']) ? 'active':'';?>"><a href="?account=<?=$row['accountNumber']?>"><?=$row['accountType']?> <br><small class="text-muted" style="font-size:10px;">(<?=$customClass->makeAccountNumber($row['accountNumber'])?>)</small></a></li>
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
													<!--<th>Kontonummer</th>-->
													<th>Kjøpested</th>
													<th>Beløp</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$result = $satan->getCardTransactions($account);
													foreach ($result as $row) {
												?>
													<tr>
														<td><?=date('m.d.y', $row['timestamp'])?></td>
														<td><?=date('H:i:s', $row['timestamp'])?></td>
														<!--<td><?=$row['recievingAccount']?></td> -->
														<td><?=$row['message_kid']?></td>
														<?php
															if($row['recievingAccount'] != $account){
																echo ('<td>'.$customClass->makeCurrency($row['kroner'], $row['oere']).'</td>');
															}
														?>
													</tr>
												<?php
													}
												?>
											</tbody>
										</table>
									</div>
									<div class="tab-pane panel-form" id="betalingsbevegelser">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Dato</th>
													<th>Tidspunkt</th>
													<!--<th>Kontonummer</th>-->
													<th>Melding</th>
													<th>Beløp inn</th>
													<th>Beløp ut</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$result = $satan->getPaymentTransactions($account);
													foreach ($result as $row) {
												?>
													<tr>
														<td><?=date('m.d.y', $row['timestamp'])?></td>
														<td><?=date('H:i:s', $row['timestamp'])?></td>
														<!--<td><?=$row['recievingAccount']?></td> -->
														<td><?=$row['message_kid']?></td>
														<?php
															if($row['recievingAccount'] != $account){
																echo ('<td>'.$customClass->makeCurrency($row['kroner'], $row['oere']).'</td>');
																echo ('<td></td>');
															} else {
																echo ('<td></td>');
																echo ('<td>'.$customClass->makeCurrency($row['kroner'], $row['oere']).'</td>');
															}
														?>
													</tr>
												<?php
													}
												?>
											</tbody>
										</table>
									</div>
									<div class="tab-pane panel-form" id="allebevegelser">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Dato</th>
													<th>Tidspunkt</th>
													<!--<th>Kontonummer</th>-->
													<th>Type transaksjon</th>
													<th>Melding/Kjøpested</th>
													<th>Beløp inn</th>
													<th>Beløp ut</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$result = $satan->getAllTransactions($account);
													foreach ($result as $row) {
												?>
													<tr>
														<td><?=date('m.d.y', $row['timestamp'])?></td>
														<td><?=date('H:i:s', $row['timestamp'])?></td>
														<?php
															if($row['transactionType'] == "payment"){
																echo ('<td>Betaling via nettbank</td>');
															}
															if($row['transactionType'] == "card"){
																echo ('<td>Betaling med kort</td>');
															}
															if($row['transactionType'] == "transfer"){
																echo ('<td>Overføring mellom kontoer</td>');
															}
														?>
														<td><?=$row['message_kid']?></td>
														<?php
															if($row['recievingAccount'] != $account){
																echo ('<td>'.$customClass->makeCurrency($row['kroner'], $row['oere']).'</td>');
																echo ('<td></td>');
															} else {
																echo ('<td></td>');
																echo ('<td>'.$customClass->makeCurrency($row['kroner'], $row['oere']).'</td>');
															}
														?>
													</tr>
												<?php
													}
												?>
											</tbody>
										</table>
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
