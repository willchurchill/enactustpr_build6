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

    <title>View TPR</title>
		<!-- include core JS functions -->
		<script src="../lib/functions.js"></script>
		<script src='../lib/js/checklogin.js'></script>

    <!-- CSS -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
    <link href="../lib/css/dashboard.css" rel="stylesheet">
	<link href="../lib/css/forms.css" rel="stylesheet">

    <!-- Include PHP scripts -->
	  <?php include_once("../lib/php/dbconn.php"); ?>
	  <?php include_once("../lib/php/keyfacts.php"); ?>
	  <?php include_once("../lib/php/viewreport.php"); ?>
	  
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
<h2 class="sub-header">View specific TPR</h2>
	<table class="tprform">
		
		<tr>
			<td colspan="1" rowspan="5">
				<canvas id="myChart" width="400" height="400"></canvas>
			</td>
			<td colspan="1" rowspan="1"><b>Team:</b> <?php echo $teamname; ?></td>
		</tr>
		<tr>
			<td colspan="1" rowspan="1"><b>Mentor:</b> <?php echo $mentorname; ?></td>
		</tr>
		<tr>
			<td colspan="1" rowspan="1"><b>Date:</b> <?php echo $meetingdate; ?></td>
		</tr>
		<tr>
			<td colspan="1" rowspan="1"><b>Topics discussed:</b><br /><?php echo $discussedtopics; ?></td>
		</tr>
		<tr>
			<td colspan="2">
				<b>Meeting summary</b><br />
				<?php echo $meetingsummary; ?>
			</td>
		</tr>
		<tr>
			<td colspan="1">
				<b>Warning flag</b><br />
				<?php echo $warningflag; ?>
			</td>
			<td colspan="1">
				<b>Highlight</b><br />
				<?php echo $highlight; ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<b>Support / training requested</b><br />
				<?php echo $supportrequested; ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<b>Meeting description</b><br />
				<?php echo $meetingdescription; ?>
			</td>
		</tr>
		<tr>
			<td colspan="1">
				<b>Contact name</b><br />
				<?php echo $contactname; ?>
			</td>
			<td colspan="1">
				<b>Contact position</b><br />
				<?php echo $contactposition; ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<b>Other comments</b><br />
				<?php echo $othercomments; ?>
			</td>
		</tr>
	</table>      
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
            	data: <?php echo $teamscores; ?>
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
