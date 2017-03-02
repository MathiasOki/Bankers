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

	<div class="right-side container-fluid content">
        <div class="row margin-invert">
			<div class="col-md-8">
				<div class="panel panel-default panel-white">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#kortbeveglser" data-toggle="tab">Kortbeveglser</a></li>
							<li><a href="#betalingsbevegelser" data-toggle="tab">Betalingsbevegelser</a></li>
							<li><a href="#allebevegelser" data-toggle="tab">Alle bevegelser</a></li>
						</ul>
					</div>
					<form rel="form">
						<div class="tab-content">
							<div class="tab-pane panel-form active" id="kortbeveglser">
								<div class="panel-body padding-none">
									<div class="row border-bottom">
										<div class="col-md-12">
											<div class="panel panel-default">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>Dato</th>
															<th>Tidspunkt</th>
															<th>Kjøpested</th>
															<th>Beløp</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>02.03.17</td>
															<td>14:57</td>
															<td>Fjerdingen kantine</td>
															<td>67,-</td>
														</tr>
														<tr>
															<td>01.03.17</td>
															<td>13:45</td>
															<td>Fjerdingen kantine</td>
															<td>105,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>21:15</td>
															<td>Skjenkestua</td>
															<td>104,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>20:45</td>
															<td>Skjenkestua</td>
															<td>55,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>20:00</td>
															<td>Skjenkestua</td>
															<td>110,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>19:35</td>
															<td>Skjenkestua</td>
															<td>55,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>19:15</td>
															<td>Skjenkestua</td>
															<td>55,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>18:37</td>
															<td>Skjenkestua</td>
															<td>55,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>12:37</td>
															<td>Fjerdingen kantine</td>
															<td>25,-</td>
														</tr>
														<tr>
															<td>30.02.17</td>
															<td>15:43</td>
															<td>KIWI Byporten</td>
															<td>125,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>12:37</td>
															<td>Fjerdingen kantine</td>
															<td>25,-</td>
														</tr>
														<tr>
															<td>30.02.17</td>
															<td>15:43</td>
															<td>KIWI Byporten</td>
															<td>125,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>12:37</td>
															<td>Fjerdingen kantine</td>
															<td>25,-</td>
														</tr>
														<tr>
															<td>30.02.17</td>
															<td>15:43</td>
															<td>KIWI Byporten</td>
															<td>125,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>12:37</td>
															<td>Fjerdingen kantine</td>
															<td>25,-</td>
														</tr>
														<tr>
															<td>30.02.17</td>
															<td>15:43</td>
															<td>KIWI Byporten</td>
															<td>125,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>12:37</td>
															<td>Fjerdingen kantine</td>
															<td>25,-</td>
														</tr>
														<tr>
															<td>30.02.17</td>
															<td>15:43</td>
															<td>KIWI Byporten</td>
															<td>125,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>12:37</td>
															<td>Fjerdingen kantine</td>
															<td>25,-</td>
														</tr>
														<tr>
															<td>30.02.17</td>
															<td>15:43</td>
															<td>KIWI Byporten</td>
															<td>125,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>12:37</td>
															<td>Fjerdingen kantine</td>
															<td>25,-</td>
														</tr>
														<tr>
															<td>30.02.17</td>
															<td>15:43</td>
															<td>KIWI Byporten</td>
															<td>125,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>12:37</td>
															<td>Fjerdingen kantine</td>
															<td>25,-</td>
														</tr>
														<tr>
															<td>30.02.17</td>
															<td>15:43</td>
															<td>KIWI Byporten</td>
															<td>125,-</td>
														</tr>
														<tr>
															<td>31.02.17</td>
															<td>12:37</td>
															<td>Fjerdingen kantine</td>
															<td>25,-</td>
														</tr>

													</tbody>
												</table>
											</div>
										</div>
									</div>

									<!--<div class="row valign margin-none">
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
									</div>-->

								</div>
							</div>

							<div class="tab-pane panel-form" id="betalingsbevegelser">
								<div class="panel-body padding-none">
									<div class="row border-bottom">
										<div class="col-md-12">
											<div class="panel panel-default">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>Dato</th>
															<th>Tidspunkt</th>
															<th>Kjøpested</th>
															<th>Beløp inn</th>
															<th>Beløp ut</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>02.03.17</td>
															<td>14:57</td>
															<td>Fjerdingen kantine</td>
															<td>67,-</td>
															<td></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane panel-form" id="allebevegelser">
								<div class="tab-pane" id="betalingsbevegelser">
									Alle bevegelser
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
