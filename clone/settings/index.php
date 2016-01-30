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
            <li class="active"><a href="#">Overview<span class="sr-only">(current)</span></a></li>
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
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">30 day rolling dashboard</h1>

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

          <h2 class="sub-header">Team Reports <!--&middot; <span class="glyphicon glyphicon-print" aria-hidden="true" onclick=""></span>--></h2>
          <div class="table-responsive">
			  <table class='table table-striped'>
				  <thead>
					  <tr>
						  <th>Date</th>
						  <th>Mentor</th>
						  <th>Team</th>
						  <th>Summary</th>
						  <th>Score</th>
					  </tr>
				  </thead>
				  <tbody>
					  <?php include_once("php/o_reports_table.php"); ?>
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
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../lib/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../lib/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
