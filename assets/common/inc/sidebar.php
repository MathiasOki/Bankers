<div class="sidebar">
	<div class="sidebar-container">
		<ul class="nav nav-sidebar">
			<li>
				<a href="#">
					<i class="fa fa-home fa-fw" aria-hidden="true"></i> Hjem
					<i class="fa fa-angle-right pull-right"></i>
				</a>
			</li>
			<li>
				<a href="cardTransactions.php">
					<i class="fa fa-credit-card fa-fw" aria-hidden="true"></i> Kontobevegelser
					<i class="fa fa-angle-right pull-right"></i>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-exchange fa-fw" aria-hidden="true"></i> Flytte penger
					<i class="fa fa-angle-right pull-right"></i>
				</a>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i> Planlegge
					<i class="fa fa-angle-right pull-right"></i>
				</a>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-phone fa-fw" aria-hidden="true"></i> Kontakt
					<i class="fa fa-angle-right pull-right"></i>
				</a>
			</li>
		</ul>

		<div class="accounts">
			<div class="row accounts-title valign">
				<div class="col-xs-10">
					<h1>Dine kontoer</h1>
				</div>
				<div class="col-xs-2">
					<a href="#"><i class="fa fa-plus-circle pull-right"></i></a>
				</div>
			</div>
			<ul>
				<?php
					$result = $satan->getAccounts($logged['customerID']);
					foreach($result as $row) {
				?>
				<li>
					<a href="#">
						<div class="row valign">
							<div class="col-xs-5">
								<b><?=$row['accountType']?></b> <!--<i class="fa fa-credit-card card" aria-hidden="true"></i>--><br>
								<small class="text-muted"><?=$customClass->makeAccountNumber($row['accountNumber'])?></small>
							</div>
							<div class="col-xs-5 text-right">
								<span><?=$customClass->makeCurrency($row['kroner'], $row['oere'])?></span>
							</div>
							<div class="col-xs-2">
								<i class="fa fa-angle-right pull-right"></i>
							</div>
						</div>
					</a>
				</li>
				<?php
					}
				?>

				<!--<li>
					<a href="#">
						<div class="row valign">
							<div class="col-xs-5">
								<b>Sparekonto</b><br>
								<small class="text-muted">1234.23.12324</small>
							</div>
							<div class="col-xs-5 text-right">
								<span><?=$customClass->makeCurrency(1540323.65, NULL)?></span>
							</div>
							<div class="col-xs-2">
								<i class="fa fa-angle-right pull-right"></i>
							</div>
						</div>
					</a>
				</li>-->
			</ul>
		</div>
	</div>
</div>
