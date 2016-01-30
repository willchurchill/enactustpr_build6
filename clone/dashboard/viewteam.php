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

    <title>View Team</title>
		<!-- include core JS functions -->
		<script src="../lib/js/functions.js"></script>
		<script src='../lib/js/checklogin.js'></script>

    <!-- CSS -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
    <link href="../lib/css/dashboard.css" rel="stylesheet">
	<link href="../lib/css/forms.css" rel="stylesheet">

    <!-- Include PHP scripts -->
	  <?php include_once("../lib/php/dbconn.php"); ?>
	  <?php include_once("../lib/php/keyfacts.php"); ?>
	  <?php include_once("../lib/php/viewteam.php"); ?>
	  
	<!-- include chart.js -->
	<script src="../lib/js/Chart.js"></script>
  </head>

  <body>
	<?php include_once("topbar.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once("nav.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h2 class="sub-header">View Team data</h2>
	<table class="tprform">
		<tr>
			<td colspan="1" rowspan="5">
				<canvas id="myChart" width="400" height="400"></canvas>
			</td>
			<td colspan="1" rowspan="1"><b>Team:</b> <?php echo $teamname; ?></td>
		</tr>
		<tr>
			<td colspan="1" rowspan="1"><b>Programme Manager:</b> <?php echo $programmemanager; ?></td>
		</tr>
		<tr>
			<td colspan="1" rowspan="1"><b>Mentors:</b> <?php echo $mentors; ?></td>
		</tr>
		<tr>
			<td colspan="1" rowspan="1"><b>Total hours this year:</b> <?php echo $yearhours; ?></td>
		</tr>
	</table>  
<h2 class="sub-header">View Reports</h2>
	<div class="table-responsive">
			  <table class='table table-striped' id="tprtable">
				  <thead>
					  <tr>
						  <th id='tablemeetingdate' class='sort' data-sort='meetingdate'>Date</th>
						  <th id='tablemeetingsummary' class='sort' data-sort='meetingsummary'>Summary</th>
						  <th>Score</th>
					  </tr>
				  </thead>
				  <tbody class="list">
					  <?php echo $tprlist; ?>
				  </tbody>
			  </table>
				</div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
		<script src="../lib/js/piwik.js"></script>
	<script>
		var data = {
    		labels: ["Average", "Meeting", "Target", "Project", "Engagement"],
    		datasets: [
        		{
            	label: "<?php echo $teamname; ?> score",
            	fillColor: "rgba(146, 39, 143, 0.2)",
            	strokeColor: "rgba(146, 39, 143, 1)",
            	pointColor: "rgba(146, 39, 143, 1)",
            	pointStrokeColor: "#fff",
            	pointHighlightFill: "#fff",
            	pointHighlightStroke: "rgba(220,220,220,1)",
            	data: <?php echo $scores; ?>
        		},
        		{
            	label: "Average network score",
            	fillColor: "rgba(255, 194, 34, 0.2)",
            	strokeColor: "rgba(255, 194, 34, 1)",
            	pointColor: "rgba(255, 194, 34, 1)",
            	pointStrokeColor: "#fff",
            	pointHighlightFill: "#fff",
            	pointHighlightStroke: "rgba(151,187,205,1)",
            	data: <?php echo $networkscores; ?>
        		}
    		]
		};
			
		var ctx = document.getElementById("myChart").getContext("2d");
		var options = { showScale: true, scaleOverride: true, scaleSteps: 5, scaleStepWidth: 1, scaleStartValue: 0 }
		var myRadarChart = new Chart(ctx).Radar(data, options);
	</script>	
  </body>
</html>
