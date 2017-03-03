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
						<h3>Mine kort</h3>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Student visa</h4>
					</div>
					<div class="panel-body">
						<div class="row border-bottom">
							<div class="col-md-4">
								<h1>super fancy CSS kort</h1>
							</div>
							<div class="col-md-8">
								<p>Korthaver : Haugan, Malin Glosli</p>
								<p>	Kortnummer : **** **** ***1 2345</p>
								<p>	Kontonavn : Student Brukskonto</p>
								<p>	Kontonummer	: 1234.56.78910</p>
								<p>	Status : Aktivt</p>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Student visa</h4>
					</div>
					<div class="panel-body">
						<div class="row border-bottom">
							<div class="col-md-4">
								<h1>super fancy CSS kort</h1>
							</div>
							<div class="col-md-8">
								<h4>Student Mastercard</h4>
								<p>Korthaver : Haugan, Malin Glosli</p>
								<p>	Kortnummer : **** **** ***1 2345</p>
								<p>	Kontonummer	: 1234.56.78910</p>
								<p>	Status : Aktivt</p>
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
