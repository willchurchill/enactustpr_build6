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

    <title>Submit Board Report</title>
		<!-- include core JS functions -->
		<script src="../lib/js/functions.js"></script>
	
	<!-- CSS -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
    <link href="../lib/css/dashboard.css" rel="stylesheet">
	<link href="../lib/css/forms.css" rel="stylesheet">

    <!-- Include PHP scripts -->
	  <?php include_once("../lib/php/dbconn.php"); ?>
	  <?php include_once("../lib/php/teamnames.php"); ?>
  </head>

  <body>
	<?php include_once("topbar.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once("nav.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h2 class="sub-header">Submit Board Report</h2>
<table class="tprform">
	<form action="../lib/php/submitboardreport.php" method="post">
		<tr>
			<td colspan="2"><h4>Report date</h4></td>
			<td colspan="2"><input class="centeredinput" type="date" id="date" name="date"></td>
		</tr>
		<tr>
			<td colspan="3"><h4>Hours</h4></td>
			<td colspan="1" class="hourslabel"><input class="tprhours" id="hours" name="hours"></td>
		</tr>
		<tr>
			<td colspan="4"><h4>Report summary</h4></td>
		</tr>
		<tr>
			<td colspan="4"><textarea id="summary" name="summary"></textarea></td>
		</tr>
		<tr>
			<td colspan="1"><h4>Tags</h4></td>
			<td colspan="3"><textarea id="other" name="other"></textarea></td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td colspan="1"><button class="btn btn-lg btn-primary btn-block btn-submit" type="submit">Submit</button></td>
		</tr>
	</form>
</table>          
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
