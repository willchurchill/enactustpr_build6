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
					<a href="mentors_thismonth.php">
					<button class="btn btn-lg btn-primary btn-block btn-off" type="submit">This month</button>
					</a>
				</td>
				<td>
					<button class="btn btn-lg btn-primary btn-block btn-on" type="submit">Last month</button>
				</td>
				<td>
					<a href="mentors_thisyear.php">
					<button class="btn btn-lg btn-primary btn-block btn-off" type="submit">All year</button>
					</a>
				</td>
			</tr>
			</table>
			
			
          <h2 class="page-header">Last month's dashboard</h2>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $activementors_lastmonth; ?></h1>
              <h4>active mentors</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $totalhours_lastmonth; ?></h1>
              <h4>hours given</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $teams_lastmonth; ?></h1>
              <h4>teams seen</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $averagescore_lastmonth; ?></h1>
              <h4>average score</h4>
            </div>
          </div>
<h3 class="sub-header">Last month's most popular topics were:</h3>
			<?php echo $toptopics_lastmonth; ?>
		<h3 class="sub-header">Mentors (listed by hours given) &middot; <span class="glyphicon glyphicon-print" aria-hidden="true" onclick="window.open('print/mentors_lastmonth.php', '_blank');" style="cursor:pointer;"></span></h3>
          <div class="table-responsive">
			  <table class='table table-striped'>
				  <thead>
					  <tr>
						  <th>Name</th>
						  <th>Total Hours</th>
						  <th>Face-to-Face</th>
						  <th>Phone/Skype</th>
						  <th>Email</th>
						  <th>Other</th>
					  </tr>
				  </thead>
				  <tbody>
					  <?php $format="web"; include_once("tables/m_lastmonth_table.php"); ?>
				  </tbody>
			  </table>
          </div>
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
