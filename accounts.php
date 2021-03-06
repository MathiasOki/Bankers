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
<div class="flex-container">

	<?php
		require_once("assets/common/inc/sidebar.php");
	?>

	<div class="right-side container-fluid content">
        <div class="row margin-invert">
			<div class="col-md-6">
				<div class="panel panel-default panel-white">
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
									<div class="row border-bottom">
										<div class="col-md-12">
											<h3>Velkommen</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
									<div class="row valign padding-all border-bottom">
										<div class="col-md-4 text-right border-right">
											Brukerpanel
										</div>
										<div class="col-md-8">
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
										<div class="col-md-4 text-right border-right">
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
</body>
</html>
