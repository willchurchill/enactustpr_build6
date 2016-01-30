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
		<script src ="../lib/js/functions.js"></script>

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
<h2 class="sub-header">All previous MT Reports</h2>
			You can search through all of the reports the bar below. <br />
			<input class="search" placeholder="Search TPRs"><br />
	<div class="table-responsive">
			  <table class='table table-striped' id="tprtable">
				  <thead>
					  <tr>
						  <th id='tablereportdate' class='sort' data-sort='reportdate'>Date</th>
						  <th id='tablereportsummary' class='sort' data-sort='reportsummary'>Summary</th>
						  <th id='tablereporttags' class='sort' data-sort='reporttags'>Tags</th>
						  <th id='hours' class='sort' data-sort='hours'>Hours</th>
					  </tr>
				  </thead>
				  <tbody class="list">
					  <?php include_once("../lib/php/getallboardreports.php"); ?>
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
		<script src='../lib/listjs/dist/list.js'></script>
		<script>var options = { valueNames: [ 'reportdate', 'reportsummary', 'reporttags', 'hours' ] };</script>
		<script>var tprList = new List('reports', options);</script>
		<script src="../lib/js/piwik.js"></script>
  </body>
</html>
