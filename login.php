<?php
	require_once("global/config.php");

	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: index.php");
		exit;
	}

	$error = false;
	$user = "";

	if( isset($_POST['btn-login']) ) {

		// prevent injections/ clear user invalid inputs
		$user = trim($_POST['user']);
		$user = strip_tags($user);
		$user = htmlspecialchars($user);

		$pass = trim($_POST['password']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent injections / clear user invalid inputs

		if(empty($user)){
			$error = true;
			$errorMessage = "Du må skrive inn personnummer.";
		}

		if(empty($pass)){
			$error = true;
			$errorMessage = "Du må skrive inn passord.";
		}

		// if there's no error, continue to login
		if (!$error) {

			$userCheck = $satan->getUsers();

			function validateIdentification($data, $array) {
				foreach ($array as $key => $val) {
					if ($val['birthdayNumber'] === $data) {
						return $val['customerID'];
					}
				}
				return null;
			}

			$result = validateIdentification($user, $userCheck);

			$userPass = $satan->getPassword($user);
			$password = hash('md5', $pass);

			if(!empty($result)){
				if($userPass[0] == $password){
					$_SESSION['user'] = $result;
					header("Location: index.php");
				}
				else {
					$errorMessage = "Personnummeret og/eller passordet er tastet inn feil eller finnes ikke.";
				}
			}
			else {
				$errorMessage = "Personnummeret og/eller passordet er tastet inn feil eller finnes ikke.";
			}
		}
	}

	require_once("assets/common/inc/head.php");
?>
	<div class="container" style="height:100vh;">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h2 class="text-center">Logg inn i nettbanken</h2>
				<form method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">

					<?php
						if (isset($errorMessage)) {
					?>
					<div class="form-group">
						<div class="alert alert-danger">
							<?=$errorMessage?>
						</div>
					</div>
					<?php
					   }
					?>

					<div class="form-group">
						<label for="user">Personnummer</label>
						<input type="text" class="form-control" id="user" name="user" placeholder="Skriv inn personnummer, 11 tall." value="<?=$user?>20010170242">
					</div>
					<div class="form-group">
						<label for="password">Passord</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Skriv inn passord." value="HejhoPp155">
					</div>
					<div class="form-group">
						<button class="btn btn-default btn-block" type="submit" name="btn-login">Logg inn</button>
					</div>
				</form><!-- /form -->
			</div>
		</div><!-- /row -->
	</div><!-- /container -->

<?php
	include_once("assets/common/inc/footer.php");
?>

<!-- Import JavaScript -->
<?php
	include_once("assets/common/inc/scripts.php");
?>

</body>
</html>

<?php ob_end_flush(); ?>
