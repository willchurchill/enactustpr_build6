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
		<script src='../lib/js/checklogin.js'></script>

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
					
					<!-- Determine if mentor has any outstanding TPRs that need to be filled -->
					<?php
						$getdata=$pdo->prepare("SELECT eventname, eventid FROM tprtable WHERE mentorid='$mentorid' AND tprtype='ETPR' AND status<>'closed' ORDER BY tprdate");
						$getdata->execute();
					
						$rowcount=$getdata->rowCount();
					
						if($rowcount<>'0'){
							echo "<div class='alertsbox'>";
							echo "<h2 class='sub-header'>Alerts</h2>";
							echo "<table class='alerttable'>";
							while($row=$getdata->fetch(PDO::FETCH_BOTH)){
								echo "<tr>";
								echo "<td class='alertnotification'>You have an outstanding Event TPR for <b>".$row['eventname']."</b></td>";
								echo "<td class='alertbutton'><a href='updateeventtpr.php?etprid=".$row['eventid']."'><button class='btn btn-lg btn-primary btn-flag'>Fill in TPR</button></a></td>";
								echo "</tr>";
							}
							echo "</table>";
							echo "</div>";
						}
					?>
					
<h2 class="sub-header">Latest reports for your teams</h2>
	<div class="table-responsive">
			  <table class='table table-striped'>
				  <thead>
					  <tr>
						  <th>Date</th>
						  <th>Team</th>
						  <th>Summary</th>
						  <th>Score</th>
					  </tr>
				  </thead>
				  <tbody>
					  <?php include_once("../lib/php/last3reports.php"); ?>
				  </tbody>
			  </table>
	</div>
<h2 class="sub-header">At-a-glance</h2>
<h3 class="sub-header">You / Network (last 30 days)</h3>
<div class="row placeholders">
	<div class="col-xs-6 col-sm-3 placeholder">
		<h1><?php echo $totalhours_30day_user; ?> / <?php echo $totalhours_30day; ?></h1>
		<h4>total hours</h4>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder">
		<h1><?php echo $totaltprs_30day_user; ?> / <?php echo $totaltprs_30day; ?></h1>
		<h4>reports submitted</h4>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder">
		<h1><?php echo $teams_30day_user; ?> / <?php echo $teams_30day; ?></h1>
		<h4>teams seen</h4>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder">
		<h1><?php echo $averagescore_30day_user; ?> / <?php echo $averagescore_30day; ?></h1>
		<h4>average score</h4>
	</div>
</div>
          
      </div>
    </div>
<footer class="footer">
	<?php include_once('footer.htm'); ?>
</footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
		<script src="../lib/js/piwik.js"></script>
  </body>
</html>
