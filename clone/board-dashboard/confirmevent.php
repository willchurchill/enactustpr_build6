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

    <title>Create new event</title>
	
	<!-- CSS -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
    <link href="../lib/css/dashboard.css" rel="stylesheet">
	<link href="../lib/css/forms.css" rel="stylesheet">

    <!-- Include PHP scripts -->
	  <?php include_once("../lib/php/dbconn.php"); ?>
	  <?php include_once("../lib/php/teamnames.php"); ?>
	  
	  <!-- Take forms and put into hidden form ready for confirmation -->
	  <?php 
		$displaymentors=""; $displayteams="";

		$eventname=$_POST['eventname'];
		$eventdate=$_POST['eventdate'];
		$deliveryhours=$_POST['deliveryhours'];
		$attendingmentors=$_POST['mentors'];
			foreach($attendingmentors as $value){
				$displaymentors .= $value.", ";
			}
		$attendingteams=$_POST['teams'];
			foreach($attendingteams as $value){
				$displayteams .= $value.", ";
			}
	  ?>
  </head>

  <body>
	<?php include_once("topbar.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once("nav.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h2 class="sub-header">Create new event</h2>
<table class="tprform">
	<form action="confirmevent.php" method="post">
		<tr>
			<td colspan="2"><h4>Event name</h4></td>
			<td colspan="2"><?php echo $eventname; ?></td>
		</tr>
		<tr>
			<td colspan="2"><h4>Event date</h4></td>
			<td colspan="2"><?php echo $eventdate; ?></td>
		</tr>
		<tr>
			<td colspan="3"><h4>Delivery hours</h4></td>
			<td colspan="1" class="hourslabel"><?php echo $deliveryhours; ?></td>
		</tr>
		<tr>
			<td colspan="4"><h4>Attending mentors</h4></td>
		</tr>
		<tr>
			<td colspan="4"><?php echo $displaymentors; ?></td>
		</tr>
		<tr>
			<td colspan="4"><h4>Attending teams</h4></td>
		</tr>
		<tr>
			<td colspan="4"><?php echo $displayteams; ?></td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td colspan="1"><button class="btn btn-lg btn-primary btn-block btn-submit" type="submit">Confirm event</button></td>
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
		<script src="../lib/js/functions.js"></script>
		<script src="../lib/js/piwik.js"></script>
  </body>
</html>
