<?php
    require_once("global/config.php");

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
		exit;
	}

	$logged = $satan->getUser($_SESSION['user']);

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

	<div class="right-side container-fluid content-padding">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form>
							<row>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											Brukskonto
										</div>
										<div class="panel-body text-center">
											Brukskonto er en konto til daglige banktjenester.
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											Sparekonto
										</div>
										<div class="panel-body text-center">
											Sparekonto gjør det enklere å sette av penger til noe du ønsker deg.
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											Superspar
										</div>
										<div class="panel-body text-center">
											Superspar gir deg god rente på pengene når du har en spareavtale til kontoen.
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											Fastrenteinnskudd
										</div>
										<div class="panel-body text-center">
											Sparer du i fastrenteinnskudd, settes sparepengene på konto i en periode.
										</div>
									</div>
								</div>
							</row>
							<row>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											Barnas boligkonto
										</div>
										<div class="panel-body text-center">
											Med Barnas boligkonto kan du spare med ekstra god rente til barns bolig.
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											Superspar for barn
										</div>
										<div class="panel-body text-center">
											Superspar for barn passer når du skal spare et månedlig beløp til noen.
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											BSU
										</div>
										<div class="panel-body text-center">
											Du kan spare inntil 25 000 kroner i året, og 100 000 kroner til sammen.
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											BSU 2.0
										</div>
										<div class="panel-body text-center">
											Du kan spare inntil 25 000 kroner i året, og 100 000 kroner til sammen.
										</div>
									</div>
								</div>
							</row>
							<row>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											Depositumskonto
										</div>
										<div class="panel-body text-center">
											Depositumskonto er en sikkerhet for utleier og leietaker.
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											Barnas sparekonto
										</div>
										<div class="panel-body text-center">
											Barnas Sparekonto er for barn fra 0 til 18 år.
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading">
											Intro sparekonto
										</div>
										<div class="panel-body text-center">
											Med Intro sparekonto får man litt høyere rente slik at man kan spare mer.
										</div>
									</div>
								</div>
							</row>
						</form>
					</div>
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
