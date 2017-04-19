<?php
    require_once("global/config.php");

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) || $satan->checkServer() != true) {
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
		<div class="container-fluid padding-top">
			<div class="row margin-invert">
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Konto opplysninger</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td>Kontonummer: </td>
                        <td>1234.56.78910</td>
                      </tr>
                      <tr>
                        <td>Kontonavn: </td>
                        <td>Lommepenger</td>
                      </tr>
                      <tr>
                        <td>Har bankkort: </td>
                        <td>Ja</td>
                      </tr>
                      <tr>
                        <td>Kontoeier: </td>
                        <td>Hannan Gulbrandsen</td>
                      </tr>
                    </tbody>
                  </table>
								</div>
							</div>
						</div>
						<div class="panel-footer text-right">
									<button type="submit" class="btn btn-bankers">Se mer</button>
						</div>
					</div>
          <div class="panel panel-default">
  					<div class="panel-heading">
  						<h4>Student visa</h4>
  					</div>
  					<div class="panel-body">
  						<div class="row valign">
  							<div class="col-md-6">
  								<img src="./assets/common/img/dnb-bankkort.jpg" alt="picture of a baccard" class="img-responsive"/>
  							</div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
  								<button type="button" class="btn btn-bankers margin-bottom">Erstatt kort</button>
    								<button type="button" class="btn btn-bankers">Se pinkode</button>
  							</div>
  						</div>
  					</div>
            <div class="panel-footer text-right">
              <a href="cardOverview.php" class="btn btn-bankers">Se alle kort</a>
            </div>
  				</div>
				</div>

        <div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Siste transaksjoner</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr>
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
                          <td><span data-toggle="tooltip" data-placement="top" title="<?=date('d. F Y \k\l. H:i:s', $row['timestamp'])?>"><?=$customClass->convertTime($row['timestamp'])?></span></td>
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
                              echo ('<td></td>');
                              echo ('<td>'.$customClass->makeCurrency($row['kroner'], $row['oere']).'</td>');
                            } else {
                              echo ('<td>'.$customClass->makeCurrency($row['kroner'], $row['oere']).'</td>');
                              echo ('<td></td>');
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
						<div class="panel-footer text-right">
									<button type="submit" class="btn btn-bankers">Se flere</button>
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
