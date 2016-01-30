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

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../lib/js/ie-emulation-modes-warning.js"></script>

    <!-- Include PHP scripts -->
	  <?php include_once("../lib/php/dbconn.php"); ?>
	  <?php include_once("../lib/php/keyfacts.php"); ?>
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
            <li><a href="index.php">Overview</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li>&nbsp;&nbsp;Mentors</li>
			  <li><a href="mentors_thismonth.php">This month</a></li>
			  <li><a href="mentors_lastmonth.php">Last month</a></li>
			  <li><a href="mentors_thisyear.php">This year</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li>&nbsp;&nbsp;Teams</li>
			  <li class="active"><a href="">This month<span class="sr-only">(current)</span></a></li>
			  <li><a href="teams_lastmonth.php">Last month</a></li>
			  <li><a href="teams_thisyear.php">This year</a></li>
          </ul>
		  <ul class="nav nav-sidebar">
            <li>&nbsp;&nbsp;Graphs</li>
			  <li><a href="graphs_topicsovertime.php?t1=&t2=&t3=">Topics over time</a></li>
			  <li><a href="graphs_topicsyearonyear.php?topic=">Topics year on year</a></li>
			  <li><a href="graphs_hoursyearonyear.php?hoursselect=total">Hours year on year</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Team support this month</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $totaltprs_thismonth; ?></h1>
              <h4>reports</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $totalhighlights_thismonth; ?></h1>
              <h4>highlights</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $totalflags_thismonth; ?></h1>
              <h4>flags</h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h1><?php echo $totalsupportrequests_thismonth; ?></h1>
              <h4>support requests</h4>
            </div>
          </div>
<h2 class="sub-header">This month's most popular topics are:</h2>
			<h3><?php echo $toptopics_thismonth; ?></h3>
<!-- HIGHLIGHTS -->
          <h2 class="sub-header">Highlights <!--&middot; <span class="glyphicon glyphicon-print" aria-hidden="true" onclick="javascript:location.href='print/mentors_thismonth.php'" style="cursor:pointer;"></span>--></h2>
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
					  <?php $format="web"; include_once("php/highlights_thismonth_table.php"); ?>
				  </tbody>
			  </table>
          </div>
<!-- END HIGHLIGHTS -->
<!-- FLAGS -->
          <h2 class="sub-header">Flags <!--&middot; <span class="glyphicon glyphicon-print" aria-hidden="true" onclick="javascript:location.href='print/mentors_thismonth.php'" style="cursor:pointer;"></span>--></h2>
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
					  <?php $format="web"; include_once("php/warningflags_thismonth_table.php"); ?>
				  </tbody>
			  </table>
          </div>
<!-- END FLAGS -->
<!-- SUPPORT REQUESTS -->
          <h2 class="sub-header">Support Requests <!--&middot; <span class="glyphicon glyphicon-print" aria-hidden="true" onclick="javascript:location.href='print/mentors_thismonth.php'" style="cursor:pointer;"></span>--></h2>
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
					  <?php $format="web"; include_once("php/supportrequests_thismonth_table.php"); ?>
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
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../lib/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../lib/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
