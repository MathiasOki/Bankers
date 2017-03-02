<?php
require_once("global/config.php");

if( !isset($_SESSION['user']) ) {
	header("Location: login.php");
	exit;
}

$logged['id'] = $_SESSION['user'];

require_once("assets/common/inc/head.php");
require_once("assets/common/inc/header.php");
require_once("assets/common/inc/navbar.php");
?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Kontooversikt</h1>
			<div class="panel panel-default">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Konto</th>
							<th>Kontonummer</th>
							<th>Saldo</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$result = $satan->getAccounts($logged['id']);
							foreach($result as $row) {
						?>
						<tr>
<<<<<<< HEAD
							<td>Brukskonto</td>
							<td>1092.06.82408</td>
							<td>10 000,-</td>
							<td class="text-right text-xs-left">
								<div class="btn-group">
									<button type="button" class="btn btn-primary">Betale</button>
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Betale</a></li>
										<li><a href="#">Overføre</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Trenger vi denne?</a></li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td>Regninger</td>
							<td>1662.02.83672</td>
							<td>1000,-</td>
							<td class="text-right text-xs-left">
								<div class="btn-group">
									<button type="button" class="btn btn-primary">Betale</button>
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Betale</a></li>
										<li><a href="#">Overføre</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Trenger vi denne?</a></li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td>Sparekonto</td>
							<td>1422.05.92538</td>
							<td>100 000,-</td>
=======
							<td><?=$row['accountType']?></td>
							<td><?=$row['accountNumber']?></td>
							<td><?=$customClass->makeCurrency($row['kroner'], $row['oere'])?></td>
>>>>>>> 273d1acdb5d57c860aef952802f9199d339f036a
							<td class="text-right text-xs-left">
								<div class="btn-group">
									<button type="button" class="btn btn-primary">Betale</button>
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Betale</a></li>
										<li><a href="#">Overføre</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Trenger vi denne?</a></li>
									</ul>
								</div>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div><!-- /panel -->
		</div><!-- /col -->
	</div><!-- /row -->

	<?php
	include_once("assets/common/inc/footer.php");
	?>
</div><!-- /container -->

<?php
include_once("assets/common/inc/scripts.php");
?>

<script>
$('table').cardtable();
</script>

</body>
</html>
