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

  <body onload="popAllMentors()">
	<?php include_once("topbar.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once("nav.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div id="mentorlistcontainer">
<h2 class="sub-header">Mentor list</h2>
	<p>
		Here you can view all the currently active mentors in the network, the teams they mentor, and their skills and training. The skills shown are 
	those that the mentor is able to deliver training on; the skills in <b>bold</b> are ones that mentor is comfortable enough to deliver training
	without support.
	</p>
	<P>
		You can use the search bar to query names, teams, or expertise. Though not shown in the table, searching will also look for project descritions 
	(of that mentor's previous projects), and any beneficiary groups that mentor has been involved with.
	</P>
	<input class="search" placeholder="Search Mentors">
	<div class="table-responsive">
			  <span id="mentortable">Loading, please wait...</span>
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
		<script src="../lib/js/custom.js"></script>
		<script src='../lib/listjs/dist/list.js'></script>
		<script>var options = { valueNames: [ 'mentorname', 'teams', 'skills', 'training', 'mentortype', 'otherdata' ] };</script>
		<script src="../lib/js/piwik.js"></script>
  </body>
</html>
