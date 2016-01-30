<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	  <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>MT Dashboard</title>
		<!-- include core JS functions -->
		<script src="../lib/js/functions.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
    <link href="../lib/css/dashboard.css" rel="stylesheet">
	<link href="../lib/css/forms.css" rel="stylesheet">
	<link href="../lib/css/sticky-footer.css" rel="stylesheet">

    <!-- Include PHP scripts -->
	  <?php include_once("../lib/php/dbconn.php"); ?>
	  <?php include_once("../lib/php/keyfacts.php"); ?>
  </head>

  <body>
	<?php include_once("topbar.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once("nav.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h2 class="page-header">30 day rolling dashboard</h2>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $activementors_30day; ?></h1>
              <h4>active mentors</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $totalhours_30day; ?></h1>
              <h4>hours given</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $teams_30day; ?></h1>
              <h4>teams seen</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $averagescore_30day; ?></h1>
              <h4>average score</h4>
            </div>
          </div>

          <h3 class="sub-header">Popular Topics</h3>
          <div class="table-responsive">
			  <table class='table table-striped'>
				  <thead>
					  <tr>
						  <th width="25%">Last month</th>
						  <th width="25%">This month</th>
						  <th width="25%">This month last year</th>
						  <th width="25%">Next month (estimate)</th>
					  </tr>
				  </thead>
				  <tbody>
					  <tr>
						<td><?php echo $toptopics_lastmonth; ?></td>
						<td><?php echo $toptopics_thismonth; ?></td>
						<td><?php echo $toptopics_thismonthlastyear; ?></td>
						<td><?php echo $toptopics_nextmonth; ?></td>
					  </tr>
				  </tbody>
			  </table>
<h2 class="sub-header">Latest Management Team Reports</h2>
	<div class="table-responsive">
			  <table class='table table-striped'>
				  <thead>
					  <tr>
						  <th>Date</th>
						  <th>Summary</th>
						  <th>Tags</th>
						  <th>Hours</th>
					  </tr>
				  </thead>
				  <tbody>
					  <?php include_once("../lib/php/last3boardreports.php"); ?>
				  </tbody>
			  </table>
	</div>          
      </div>
    </div>
<footer class="footer">
	<div class="container">
		<p class="text-muted">
			Website content property of <a href="http://enactusukalumni.org">Enactus UK Alumni</a>. 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			TPR <a href="help.php">v5.0 (beta)</a>, coded by <a href="http://willchurchill.co.uk">Will Churchill</a>.
		</p>
	</div>
</footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="../lib/js/bootstrap.min.js"></script>
		<script src="../lib/js/piwik.js"></script>
  </body>
</html>
