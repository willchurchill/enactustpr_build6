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

    <title>Admin Dashboard</title>
		<!-- include core JS functions -->
		<script src="../lib/js/functions.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
    <link href="../lib/css/dashboard.css" rel="stylesheet">
    <link href="../lib/css/forms.css" rel="stylesheet">

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
			
			<table class="tabbedpage">
			<tr>
				<td>
					<a href="teams_thismonth.php">
					<button class="btn btn-lg btn-primary btn-block btn-off" type="submit">This month</button>
					</a>
				</td>
				<td>
					<a href="teams_lastmonth.php">
					<button class="btn btn-lg btn-primary btn-block btn-off" type="submit">Last month</button>
					</a>
				</td>
				<td>
					<button class="btn btn-lg btn-primary btn-block btn-on" type="submit">All year</button>
				</td>
			</tr>
			</table>
			
		<h2 class="page-header">Team support this year</h2>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $totaltprs_thisyear; ?></h1>
              <h4>reports</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $totalhighlights_thisyear; ?></h1>
              <h4>highlights</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $totalflags_thisyear; ?></h1>
              <h4>flags</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $totalsupportrequests_thisyear; ?></h1>
              <h4>support requests</h4>
            </div>
          </div>
<h3 class="sub-header">This year's most popular topics are:</h3>
			<?php echo $toptopics_thisyear; ?>
<!-- HIGHLIGHTS -->
		<h3 class="sub-header">Highlights</h3>
          <div class="table-responsive">
			  <table class='table table-striped'>
				  <thead>
					  <tr>
						  <th>Team</th>
						  <th>Mentor</th>
						  <th>Highlight</th>
						  <th>Date</th>
					  </tr>
				  </thead>
				  <tbody>
					  <?php $format="web"; include_once("tables/highlights_thisyear_table.php"); ?>
				  </tbody>
			  </table>
          </div>
<!-- END HIGHLIGHTS -->
<!-- FLAGS -->
		<h3 class="sub-header">Flags</h3>
          <div class="table-responsive">
			  <table class='table table-striped'>
				  <thead>
					  <tr>
						  <th>Team</th>
						  <th>Mentor</th>
						  <th>Warning flag</th>
						  <th>Date</th>
					  </tr>
				  </thead>
				  <tbody>
					  <?php $format="web"; include_once("tables/warningflags_thisyear_table.php"); ?>
				  </tbody>
			  </table>
          </div>
<!-- END FLAGS -->
<!-- SUPPORT REQUESTS -->
		<h3 class="sub-header">Support Requests</h3>
          <div class="table-responsive">
			  <table class='table table-striped'>
				  <thead>
					  <tr>
						  <th>Team</th>
						  <th>Mentor</th>
						  <th>Request</th>
						  <th>Date</th>
					  </tr>
				  </thead>
				  <tbody>
					  <?php $format="web"; include_once("tables/supportrequests_thisyear_table.php"); ?>
				  </tbody>
			  </table>
          </div>
<!-- END SUPPORT REQUESTS -->
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
    <script src="../lib/js/piwik.js"></script>
  </body>
</html>
