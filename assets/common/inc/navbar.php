<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
	<div class="container-fluid">
		<a href="index.php" class="navbar-brand">Bænkers</a>

		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="label label-danger">2 <i class="fa fa-angle-down"></i></span></a>
				<div class="dropdown-menu padding-none">
					<table class="table table-striped table-bordered table-hover margin-none">
						<tbody>
	                      <tr>
							<td><i class="fa fa-bell-o padding-top" aria-hidden="true"></i></td>
	                        <td>Du har fått 1000,- inn på brukskonto</td>
	                      </tr>
	                      <tr>
							<td><i class="fa fa-bell-o padding-top" aria-hidden="true"></i></td>
							<td>Du har betalt en avtalegiro siden sist du var i banken</td>
	                      </tr>
	                    </tbody>
					</table>
				</div>
			</li>
			<li>
				<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="hidden-xs"><?=$logged['firstName']?> <?=$logged['surName']?></span><i class="fa fa-user hidden-sm hidden-md hidden-lg" aria-hidden="true"></i> <i class="fa fa-angle-down"></i></a>
				<ul class="dropdown-menu">
					<li><a href="#">Kontoinnstillinger</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="logout.php">Logg ut</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>

<div class="support-btn">
	<?=$bot->reveal('img', 31)?>
	<div class="speech-bubble">
		<p>Hey! Nå har du hatt mye penger på en konto en stund og der kunne du tjent masse renter! Vil du at jeg skal hjelpe deg med å sette opp en sparekonto, og kanskje gi deg en innføring i enkle penger med sparing?</p>
		<p><a href="#" class="btn btn-sm btn-bankers">Ja, vis meg!</a> <a href="#" class="btn btn-sm btn-link">Nei, lukk boksen :(</a></p>
	</div>
</div>
