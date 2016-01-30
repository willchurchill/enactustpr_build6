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
			<div id="reports">
<h2 class="sub-header">View events</h2>
				<p>
					From here you can create events, such as Training Weekend, or Future Leaders Training. While creating an
				event you can select the mentors and the teams who have attended and specify the duration of the event.
				Mentors will then get an email asking them to confirm their attendance, add in any hours they
				spent preparing for the event, and add any notes.
				</p>
				<p>
					These hours, and any of the mentor notes, will be automatically added to the TPR database.
				</p>
			<input class="search" placeholder="Search TPRs"><br />
	<div class="table-responsive">
			  <table class='table table-striped' id="tprtable">
				  <thead>
					  <tr>
						  <th id='tablereportdate' class='sort' data-sort='date'>Event</th>
						  <th id='tablereportsummary' class='sort' data-sort='eventname'>Date</th>
						  <th id='tablereporttags' class='sort' data-sort='eventteams'># of teams</th>
						  <th id='tablereporttags' class='sort' data-sort='mentors'># of mentors</th>
						  <th id='hours' class='sort' data-sort='deliverytime'>Delivery hours</th>
						  <th id='hours' class='sort' data-sort='deliverytime'># of responses</th>
						  <th id='hours' class='sort' data-sort='deliverytime'>Avg prep time</th>
					  </tr>
				  </thead>
				  <tbody class="list">
					  <?php include_once("../lib/php/getallevents.php"); ?>
					  <tr>
						  <td colspan="5"></td>
						  <td colspan="2">
							  <a href="createevent.php">
							  <button class="btn btn-lg btn-primary btn-block btn-submit" type="submit">Create event</button>
							  </a>
						  </td>
					  </tr>
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
		<script src="../lib/js/functions.js"></script>
		<script src="../lib/js/checklogin_board.js"></script>
		<script src='../lib/listjs/dist/list.js'></script>
		<script>var options = { valueNames: [ 'reportdate', 'reportsummary', 'reporttags', 'member'] };</script>
		<script>var tprList = new List('reports', options);</script>
		<script src="../lib/js/piwik.js"></script>
  </body>
</html>
