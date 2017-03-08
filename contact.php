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
		<div class="row margin-bottom padding-bottom padding-top">
			<div class="col-md-12">
				<img class="img-responsive padding-bottom" src="assets/common/img/contact.png">
				<p class="lead text-center margin-top margin-bottom padding-top">Vi gjør vårt beste for å svare på din henvendelse så fort som mulig. Ring eller chat med oss, alle dager hele døgnet. Vi hjelper deg gjerne!
</p>
			</div>
		</div>

        <div class="row margin-top padding-top">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Telefon
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead"><b>04800</b></p>
						<p><small class="text-muted">Fra utlandet: (+47 915) 04800.</small></p>
						<a href="tel:04800" class="btn btn-bankers">» Klikk her for å ringe</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Facebook
                    </div>
                    <div class="panel-body text-center">
						<p class="lead">Vi kan svare deg på de fleste generelle spørsmål alle dager, hele døgnet!</p>
<a href="#" class="btn btn-bankers">» Kontakt oss på Facebook</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Hvor er vi?
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead">Lurer du på hvor du kan besøke oss? Her kan du søke etter kontorer og åpningstider.</p>

						<a href="#" class="btn btn-bankers">» Gå til oversikt over kontorer</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
			$footerFull = true;
			include_once("assets/common/inc/footer.php");
		?>
    </div><!-- /container -->
</div>

    <?php
		include_once("assets/common/inc/scripts.php");
	?>
</body>
</html>
