<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-left">
			<li>
				<a href="#">
					<span class="sr-only">Navigering</span>
					<span class="fa fa-bars"></span>
				</a>
			</li>
		</ul>

		<a href="index.php" class="navbar-brand">Bænkers</a>

		<ul class="nav navbar-nav navbar-right">
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
	<a href="#"><span class="fa-stack fa-4x">
		<i class="fa fa-circle fa-stack-2x text-blue"></i>
		<i class="fa fa-comments-o fa-stack-1x fa-inverse"></i>
	</span></a>
</div>
