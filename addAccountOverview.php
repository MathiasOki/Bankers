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
		<div class="row">
			<div class="col-md-12">
					<div class="panel-body">
						<form>
							<row>
								<div class="col-md-6">
									<div class="col-md-12">
										<div class="panel-heading">
											<h2>Vanlig</h2>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4>Brukskonto</h4>
											</div>
											<div class="panel-body">
                        <div class="col-md-4">
                            <img src="assets/common/img/maskot/11.svg">
                        </div>
												<div class="col-md-8">
                          <h4>Fordeler</h4>
                          <ul>
                            <li>Du kan ha bankkort til denne kontoen</li>
                            <li>Du kan enkelt overføre til andre kontoer fra denne</li>
                            <li>Du kan opprette spareavtaler som går herfra</li>
                          </ul>
                          <h4>Ulemper</h4>
                          <ul>
                            <li>Det er lav rente og ikke ideelt for sparing</li>
                          </ul>
                        </div>
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-primary">Åpne konto</button>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4>Depositumskonto</h4>
											</div>
											<div class="panel-body">
                        <div class="col-md-4">
                          <img src="assets/common/img/maskot/15.svg">
                        </div>
                        <div class="col-md-8">
                          <h4>Fordeler</h4>
                          <ul>
                            <li>Større sikkerhet for utleier og leietaker</li>
                            <li>Pengene er låst på konto, begge parter må signere for å ta ut penger</li>
                            <li>Leietaker får rentene</li>
                          </ul>
                          <h4>Ulemper</h4>
                          <ul>
                            <li>Pengene er ikke tilgjengelig</li>
                            <li>Kan ikke være større enn 6 måneders husleie</li>
                          </ul>
                        </div>
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-primary">Åpne konto</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="col-md-12">
										<div class="panel-heading">
											<h2>Spare</h2>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
                        <h4>Sparekonto</h4>
											</div>
											<div class="panel-body">
                        <div class="col-md-4">
                          <img src="assets/common/img/maskot/14.svg">
                        </div>
                        <div class="col-md-8">
                          <h4>Fordeler</h4>
                          <ul>
                            <li>Høy rente, optimal konto for sparing</li>
                            <li>Kan enkelt overføre mellom kontoer</li>
                            <li>Lett å sette opp spareplan til denne kontoen</li>
                          </ul>
                          <h4>Ulemper</h4>
                          <ul>
                            <li>Kun 12 gebyrfrie uttak i året</li>
                            <li>Ikke mulighet for kort</li>
                          </ul>
                        </div>
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-primary">Åpne konto</button>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4>Superspar</h4>
											</div>
											<div class="panel-body">
                        <div class="col-md-4">
                          <img src="assets/common/img/maskot/13.svg">
                        </div>
                        <div class="col-md-8">
                          <h4>Fordeler</h4>
                          <ul>
                            <li>Høy rente, optimal konto for sparing</li>
                            <li>Ingen bindingstid</li>
                            <li>Du kan selv velge beløp per måned</li>
                          </ul>
                          <h4>Ulemper</h4>
                          <ul>
                            <li>Kun 12 gebyrfrie uttak i året</li>
                            <li>Ikke mulighet for kort</li>
                          </ul>
                        </div>
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-primary">Åpne konto</button>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4>BSU</h4>
											</div>
											<div class="panel-body">
                        <div class="col-md-4">
                          <img src="assets/common/img/maskot/12.svg">
                        </div>
                        <div class="col-md-8">
                          <h4>Fordeler</h4>
                          <ul>
                            <li>Høyeste rente, optimal konto for sparing</li>
                            <li>Skattelette</li>
                            <li>Velger selv hvor mye du vil spare</li>
                          </ul>
                          <h4>Ulemper</h4>
                          <ul>
                            <li>Kun en per kunde</li>
                            <li>Ikke mulighet for uttak</li>
                          </ul>
                        </div>
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-primary">Åpne konto</button>
											</div>
										</div>
									</div>
								</div>
							</row>
						</form>
					</div>
			</div>
		</div><!-- /row -->

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
