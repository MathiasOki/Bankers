<header>
    <div class="container">
        <div class="row valign">
            <div class="col-md-2 col-sm-3 col-xs-4">
                <a href="<?=$conf['pathToRoot']?>"><img src="assets/common/img/logo.png" class="img-responsive brand"></a>
            </div>

			<?php if(isset($_SESSION['user'])){?>
            <div class="col-md-3 col-sm-4 col-sm-offset-5 col-md-offset-7 hidden-xs">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Saldo på brukskonto</h3>
                    </div>
                    <div class="panel-body text-center">
                        <h1><?=$customClass->makeCurrency(18342, NULL)?></h1>
                    </div>
                </div>
            </div>
			<?php } ?>
        </div>
    </div>
</header>
