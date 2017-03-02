<div class="sidebar">
	<div class="sidebar-container">
		<ul class="nav nav-sidebar">
			<li>
				<a href="#">
					<i class="fa fa-money fa-fw" aria-hidden="true"></i> Oversikt
					<i class="fa fa-angle-right pull-right"></i>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-sort-amount-desc fa-fw" aria-hidden="true"></i> Konto
					<i class="fa fa-angle-right pull-right"></i>
				</a>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-exchange fa-fw" aria-hidden="true"></i> Betaling
					<i class="fa fa-angle-right pull-right"></i>
				</a>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-life-ring fa-fw" aria-hidden="true"></i> Sparing
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
				<li>
					<a href="#">
						<div class="row valign">
							<div class="col-xs-5">
								<b>Brukskonto</b> <i class="fa fa-credit-card card" aria-hidden="true"></i><br>
								<small class="text-muted">1234.23.12324</small>
							</div>
							<div class="col-xs-5 text-right">
								<span><?=$customClass->makeCurrency(183.65, NULL)?></span>
							</div>
							<div class="col-xs-2">
								<i class="fa fa-angle-right pull-right"></i>
							</div>
						</div>
					</a>
				</li>

				<li>
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
				</li>
			</ul>
		</div>
	</div>
</div>
