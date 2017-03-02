<?php
require_once("assets/common/inc/head.php");

$status = $_SERVER['REDIRECT_STATUS'];
$codes = array(
  404 => array('404', 'Page not found', 'The page you were looking for doesnt exist or another error occured.')
)
?>
<body id="error">
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
          <div class="cover-container">
            <div class="inner cover">
              <h1 class="cover-heading">404</h1>
              <h3>Page not found</h3>
              <p class="lead">
                The page you were looking for doesn't exist or another error occured.
              </p>
              <div class="btn-group" role="group">
                <button type="button" class="btn btn-default"><a href="index.php">Tilbake til forsiden</a></button>
              </div>
            </div>
          </div>
        </div>
    </div><!-- /container -->


    <!-- Import JavaScript -->
    <script src="assets/lib/jquery-3.1.1/jquery-3.1.1.min.js"></script>
    <script src="assets/lib/bootstrap-3.3.7/js/bootstrap.js"></script>
    <script src="assets/lib/bootstrap-toggle/js/bootstrap-toggle.js"></script>
    <script src="assets/lib/chartjs-2.3.0/Chart.js"></script>

</body>
</html>
