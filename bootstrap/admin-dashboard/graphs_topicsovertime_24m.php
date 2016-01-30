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

    <!-- Bootstrap core CSS -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../lib/css/dashboard.css" rel="stylesheet">
	  <link href="../lib/css/dashboardcustom.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../lib/js/ie-emulation-modes-warning.js"></script>
	  <script src="../lib/js/Chart.js"></script>

    <!-- Include PHP scripts -->
	  <?php 
			include_once("../lib/php/dbconn.php");
			include_once("../lib/php/keyfacts.php");
			include_once("php/topic_dropdown.php"); 

			include("php/g_topicsovertime_24m.php");
	  ?>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Enactus UK TPR Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="#">Overview</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li>&nbsp;&nbsp;Mentors</li>
			  <li><a href="mentors_thismonth.php">This month</a></li>
			  <li><a href="mentors_lastmonth.php">Last month</a></li>
			  <li><a href="mentors_thisyear.php">This year</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li>&nbsp;&nbsp;Teams</li>
			  <li><a href="teams_thismonth.php">This month</a></li>
			  <li><a href="teams_lastmonth.php">Last month</a></li>
			  <li><a href="teams_thisyear.php">This year</a></li>
          </ul>
		  <ul class="nav nav-sidebar">
            <li>&nbsp;&nbsp;Graphs</li>
			  <li class="active"><a href="">Topics over time<span class="sr-only">(current)</span></a></li>
			  <li><a href="graphs_topicsyearonyear.php?topic=">Topics year on year</a></li>
			  <li><a href="graphs_hoursyearonyear.php?hoursselect=total">Hours year on year</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Graph generator</h1>
<form action="graphs_topicsovertime.php" method="GET" >
	      <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <h4>
				  <select class="topicselect" name="t1">
					  <option value="BLANK">Leave blank</option><option disabled>--</option>
				  	<?php echo $dropdownoutput; ?>
				  </select>
				</h4>
              <h4><span class="topic1color">&#9632;</span> Topic 1</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h4>
				  <select class="topicselect" name="t2">
					  <option value="BLANK">Leave blank</option><option disabled>--</option>
				  	<?php echo $dropdownoutput; ?>
				  </select>
				</h4>
              <h4><span class="topic2color">&#9632;</span> Topic 2</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h4>
				  <select class="topicselect" name="t3">
					  <option value="BLANK">Leave blank</option><option disabled>--</option>
				  	<?php echo $dropdownoutput; ?>
				  </select>
				</h4>
              <h4><span class="topic3color">&#9632;</span> Topic 3</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h4><button>Show graph</button></h4>
            </div>
          </div>
</form>
			<h2 class="sub-header">Topic popularity over time (this Enactus year):</h2>
			<h3>
				<?php echo "
					<span class='topic1color'>&#9632;</span> ".$topic1."&nbsp;&nbsp;&nbsp;
					<span class='topic2color'>&#9632;</span> ".$topic2."&nbsp;&nbsp;&nbsp; 
					<span class='topic3color'>&#9632;</span> ".$topic3; 
				?>
			</h3>
			
			<div class="graphcanvas">
				<canvas id="lineGraph"></canvas>
			</div>
			
	<script>
	var lineChartData = {
	    
		labels : ["May","June","July","August","September","October","November","December","January","February","March","April","May","June","July","August","September","October","November","December","January","February","March","April"],
		datasets : [
			{
            	label: "<?php echo $topic1; ?>",
            	fillColor: "rgba(0, 150, 214, 0.1)",
            	strokeColor: "rgba(0, 150, 214, 1)",
            	pointColor: "rgba(113, 208, 246, 1)",
            	pointStrokeColor: "#fff",
            	pointHighlightFill: "#fff",
            	pointHighlightStroke: "rgba(220,220,220,1)",
            	data: <?php echo $output1; ?>
        	},
			{
            	label: "<?php echo $topic2; ?>",
            	fillColor: "rgba(73, 169, 66, 0.1)",
            	strokeColor: "rgba(73, 169, 66, 1)",
            	pointColor: "rgba(186, 213, 50, 1)",
            	pointStrokeColor: "#fff",
            	pointHighlightFill: "#fff",
            	pointHighlightStroke: "rgba(220,220,220,1)",
            	data: <?php echo $output2; ?>
        	},
			{
            	label: "<?php echo $topic3; ?>",
            	fillColor: "rgba(196, 18, 48, 0.1)",
            	strokeColor: "rgba(196, 18, 48, 1)",
            	pointColor: "rgba(239, 70, 86, 1)",
            	pointStrokeColor: "#fff",
            	pointHighlightFill: "#fff",
            	pointHighlightStroke: "rgba(220,220,220,1)",
            	data: <?php echo $output3; ?>
        	},
		]
	}
			
	window.onload = function(){
		var ctx = document.getElementById("lineGraph").getContext("2d");
		window.myBar = new Chart(ctx).Line(lineChartData, { responsive : true });
	}
	
	</script>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../lib/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../lib/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
