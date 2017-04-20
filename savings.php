<?php
require_once("global/config.php");

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) || $satan->checkServer() != true) {
	header("Location: logout.php");
	exit;
}

$logged = $satan->getUser($_SESSION['user']);

require_once("assets/common/inc/head.php");
//require_once("assets/common/inc/header.php");
require_once("assets/common/inc/navbar.php");
?>
<div class="flex-container">

	<?php
	require_once("assets/common/inc/sidebar.php");
	?>
	<div class="right-side container-fluid full-white">
		<div class="row margin-invert">
			<div class="col-md-12">
				<div class="panel panel-default panel-white">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li><a href="planning.php">Budsjett</a></li>
							<li class="active"><a href="savings.php">Spare</a></li>
							<li><a href="regularPayment.php">Fast betaling</a></li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12 padding-all">
							<ul class="nav nav-pills">
								<li class="active"><a href="#oversikt" data-toggle="tab">Oversikt</a></li>
								<li><a href="#sparemal" data-toggle="tab">Sparemål</a></li>
								<li><a href="#sparekontoer" data-toggle="tab">Sparekontoer</a></li>
								<li><a href="#spareifond" data-toggle="tab">Spare i fond</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid padding-top">
			<div class="row">
				<div class="tab-content">
					<div class="tab-pane panel-form active" id="oversikt">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									Dine sparekontoer
								</div><!--end panel heading-->
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Konto</th>
												<th>Disponibelt</th>
											</tr>
										</thead><!--end table head-->
										<tbody>
											<tr>
												<td>Spare</td>
												<td>15000,-</td>
											</tr>
											<tr>
												<td>BSU</td>
												<td>25000,-</td>
											</tr>
											<tr>
												<td>Spare til meg selv</td>
												<td>5000,-</td>
											</tr>
										</tbody><!--end table body-->
									</table><!--end table-->
								</div><!--end panel body-->
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-10 col-md-offset-0">
											<button type="submit" class="btn btn-bankers">Opprett ny sparekonto</button>
										</div>
									</div>
								</div><!--end panel footer-->
							</div><!--end panel-->
						</div>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									Sparemål
								</div><!--end panel heading-->
								<div class="panel-body">
									<?php
									function progress($part, $whole){
										return round($part/$whole*100);
									}

									$result = $satan->getSavingsTargets($logged['customerID']);
									foreach($result as $row) {

										if($row['savedKroner'] == 0){
											$savedKroner = 1;
										}
										?>

										<h5><?=$row['name']?></h5>
										<div class="progress">
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?=progress($savedKroner,$row['goalKroner'])?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=progress($savedKroner,$row['goalKroner'])?>%;">
												<?=progress($savedKroner,$row['goalKroner'])?>%
											</div>
										</div>

										<?php } ?>
									</div><!--end panel body-->
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Opprett nytt sparemål</button>
											</div>
										</div><!--end row-->
									</div><!--end panel footer-->
								</div><!--end panel-->
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										Sparing i fond
									</div><!--end panel heading-->
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Fond</th>
													<th>Verdi</th>
												</tr>
											</thead><!--end table head-->
											<tbody>
												<tr>
													<td>DNB Aktiv 10</td>
													<td>123</td>
												</tr>
												<tr>
													<td>DNB Aktiv 30</td>
													<td>125</td>
												</tr>
												<tr>
													<td>DNB Aktiv 50</td>
													<td>131</td>
												</tr>
												<tr>
													<td>DNB Aktiv 60</td>
													<td>135</td>
												</tr>
											</tbody><!--end table body-->
										</table><!--end table-->
									</div><!--end panel body-->
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Se mer om fond</button>
											</div>
										</div><!--end row-->
									</div><!--end panel footer-->
								</div><!--end panel-->
							</div>
						</div><!--end tab pane-->
						<div class="tab-pane panel-form" id="sparemal">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										Ny Macbook Pro
									</div><!--end panel heading-->
									<div class="panel-body">
										<table class="table table-striped">
											<tbody>
												<tr>
													<th>Spart</th>
													<td>10 000,-</td>
												</tr>
												<tr>
													<th>Gjenstår</th>
													<td>19 000,-</td>
												</tr>
												<tr>
													<th>Spart i snitt per mnd</th>
													<td>1050,-</td>
												</tr>
												<tr>
													<th>Dager spart</th>
													<td>280</td>
												</tr>
												<tr>
													<th>Dager igjen</th>
													<td>300</td>
												</tr>
												<tr>
													<th>Antall innskudd</th>
													<td>4</td>
												</tr>
											</tbody>
										</table>
										<div class="row">
											<div class="col-md-12">
												<div class="progress">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 55%;">
														55%
													</div>
												</div>
											</div>
										</div><!--end row-->
									</div><!--end panel body-->
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Sett inn</button>
											</div>
										</div><!--end row-->
									</div><!--end panel footer-->
								</div><!--end panel-->
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										Nytt mål
									</div><!--end panel heading-->
									<div class="panel-body text-center">
										<div class="row">
											<div class="form-group col-md-6">
												<label for="tlf">Navn</label>
												<input type="number" class="form-control" id="tlf" placeholder="Skriv eller søk..." required="">
											</div>

											<div class="form-group col-md-6">
												<label for="sum">Beløp</label>
												<input type="number" class="form-control" id="sum" placeholder="Skriv eller søk...." required="">
											</div>
										</div>
									</div><!--end panel body-->
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Start nytt mål</button>
											</div>
										</div><!--end row-->
									</div><!--end panel body-->
								</div><!--end panel-->
							</div>
						</div><!--end tab pane-->
						<div class="tab-pane panel-form" id="sparekontoer">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Dine sparekontoer
									</div><!--end panel heading-->
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Konto</th>
													<th>Type</th>
													<th>Disponibelt</th>
												</tr>
											</thead><!--end table head-->
											<tbody>
												<tr>
													<td>Spare</td>
													<td>Kapital</td>
													<td>15000,-</td>
												</tr>
												<tr>
													<td>BSU</td>
													<td>BSU</td>
													<td>25000,-</td>
												</tr>
												<tr>
													<td>Spare til meg selv</td>
													<td>Sparekonto</td>
													<td>5000,-</td>
												</tr>
											</tbody><!--end table body-->
										</table><!--end table-->
									</div><!--end panel body-->
								</div><!--end panel-->
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										Sparekonto
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
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Opprett sparekonto</button>
											</div>
										</div><!--end row-->
									</div><!--end panel footer-->
								</div><!--end panel-->
								<div class="panel panel-default">
									<div class="panel-heading">
										Superspar
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
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Opprett sparekonto</button>
											</div>
										</div><!--end row-->
									</div><!--end panel footer-->
								</div><!--end panel-->
							</div><!--end col-->
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										BSU
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
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Opprett sparekonto</button>
											</div>
										</div><!--end row-->
									</div><!--end panel footer-->
								</div><!--end panel-->
								<div class="panel panel-default">
									<div class="panel-heading">
										BSU 2.0
									</div>
									<div class="panel-body">
										<div class="col-md-4">
											<img src="assets/common/img/maskot/12.svg">
										</div>
										<div class="col-md-8">
											<h4>Fordeler</h4>
											<ul>
												<li>Høyeste rente, optimal konto for sparing</li>
												<li>Kan ha denne ved siden av BSU</li>
												<li>Velger selv hvor mye du vil spare</li>
											</ul>
											<h4>Ulemper</h4>
											<ul>
												<li>Kun en per kunde</li>
												<li>Ikke mulighet for uttak</li>
												<li>
													Ikke skattelette
												</li>
											</ul>
										</div>
									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-10 col-md-offset-0">
												<button type="submit" class="btn btn-bankers">Opprett sparekonto</button>
											</div>
										</div><!--end row-->
									</div><!--end panel footer-->
								</div><!--end panel-->
							</div><!--end col-->
						</div><!--end tab pane-->
						<div class="tab-pane panel-form" id="spareifond">
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading">
										Dine fond
									</div><!--end panel heading-->
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Fond</th>
													<th>Tjent</th>
													<th>Verdi</th>
												</tr>
											</thead><!--end table head-->
											<tbody>
												<tr>
													<td>DNB Aktiv 30</td>
													<td>23</td>
													<td>123</td>
												</tr>
												<tr>
													<td>DNB Aktiv 30</td>
													<td>23</td>
													<td>123</td>
												</tr>
												<tr>
													<td>DNB Aktiv 30</td>
													<td>23</td>
													<td>123</td>
												</tr>
												<tr>
													<td>DNB Aktiv 30</td>
													<td>23</td>
													<td>123</td>
												</tr>
											</tbody><!--end table body-->
										</table><!--end table-->
									</div><!--end panel body-->
								</div><!--end panel-->
							</div><!--end col-->
							<div class="col-md-4">
								<div class="panel panel-default">
									<div class="panel-heading">
										Fakta om fond
									</div>
									<div class="panel-body">
										<p>
											De fond som er opprettet for å tilgodese humanitære eller ideelle formål, utbetaler gjerne kun midler fra avkastningen av fondet til utvalgte kandidater. Det vil si den avkastningen styret for et fond har klart å tjene ved å plassere fondets kapital i aksjer, obligasjoner og andre verdipapirer eller kapitalplasseringsalternativer.
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Kjøp fond
									</div>
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Fond</th>
													<th>Min engang</th>
													<th>Min måned</th>
													<th>Rente nå</th>
													<th>Rente nå</th>
													<th>Risiko</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>DNB Aktiv 10</td>
													<td>100</td>
													<td>100</td>
													<td>%</td>
													<td>%</td>
													<td>
														<div class="progress">
															<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
														</div>
													</td>
												</tr>
												<tr>
													<td>DNB Aktiv 30</td>
													<td>100</td>
													<td>100</td>
													<td>%</td>
													<td>%</td>
													<td>
														<div class="progress">
															<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 15%;"></div>
														</div>
													</td>
												</tr>
											</tbody>
										</table><!--end table-->
										<div class="col-md-8">
											<h3>Om fondet</h3>
											<p>DNB Aktiv 30 er en alt-i-ett portefølje for investorer som ønsker å investere både i rente- og aksjefond, men som ikke selv ønsker å følge med som aktiv investor. 30 prosent vil normalt være plassert i aksjemarkedet, resten plasseres i rentemarkedet, noe som skal gi en stabil utvikling. Forvalterne har imidlertid stor frihet til å gjøre aktive skifter i denne fordelingen.</p>
											<h3>Best case scenario</h3>
											<p>Hvis du kjøper fond for 100 kr nå kan du få dette utbyttet hvis økningen holder seg der den er i dag.</p>
											<table class="table table-striped">
												<thead>
													<th>
														År
													</th>
													<th>
														Verdi
													</th>
												</thead>
												<tbody>
													<tr>
														<td>
															1
														</td>
														<td>
															105
														</td>
													</tr>
													<tr>
														<td>
															3
														</td>
														<td>
															115,76
														</td>
													</tr>
													<tr>
														<td>
															5
														</td>
														<td>
															127,63
														</td>
													</tr>
													<tr>
														<td>
															10
														</td>
														<td>
															162,88
														</td>
													</tr>
													<tr>
														<td>
															15
														</td>
														<td>
															207,89
														</td>
													</tr>
												</tbody>
											</table>
										</div><!--end col-->
										<div class="col-md-4">
											<canvas id="myLineChart" width="100" height="100"></canvas>
										</div><!--end col-->
									</div><!--end panel body-->
								</div><!--end panel-->
							</div><!--end col-->
						</div><!--end tab pane-->
					</div><!--end tab content-->
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
	<script>
	var ctx = document.getElementById("myLineChart");
	var myLineChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["2011", "2012", "2013", "2014", "2015", "2016", "2017"],
			datasets: [{
				label: "Verdiutvikling",
				fill: false,
				lineTension: 0.1,
				backgroundColor: "rgba(75,192,192,0.4)",
				borderColor: "rgba(75,192,192,1)",
				borderCapStyle: 'butt',
				borderDash: [],
				borderDashOffset: 0.0,
				borderJoinStyle: 'miter',
				pointBorderColor: "rgba(75,192,192,1)",
				pointBackgroundColor: "#fff",
				pointBorderWidth: 1,
				pointHoverRadius: 5,
				pointHoverBackgroundColor: "rgba(75,192,192,1)",
				pointHoverBorderColor: "rgba(220,220,220,1)",
				pointHoverBorderWidth: 2,
				pointRadius: 1,
				pointHitRadius: 10,
				data: [100, 100, 110, 90, 100, 120, 130],
				spanGaps: false,
			}
		]
	}
});
</script>

</body>
</html>
