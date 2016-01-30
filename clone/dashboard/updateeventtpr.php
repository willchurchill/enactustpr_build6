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

    <title>Update Event Report</title>
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
	  <?php include_once("../lib/php/teamnames.php"); ?>
	  
	  <!-- Get the Event TPR and the Existing Individual Mentor details -->
		<?php
			$eventtprid=$_GET['etprid'];

			$getetpr=$pdo->prepare("SELECT eventname, respondedmentors, totalpreptime, averagepreptime FROM events WHERE eventid='$eventtprid' LIMIT 1");
				$getetpr->execute();
			$getitpr=$pdo->prepare("SELECT eventname, eventteams, tprdate, ftfhours, meetingsummary FROM tprtable WHERE eventid='$eventtprid' LIMIT 1");
				$getitpr->execute();

			// Get the variables in order
			$row1=$getetpr->fetch(PDO::FETCH_BOTH);
				$eventname=$row1['eventname'];
				$respondedmentors=$row1['respondedmentors'];
				$totalpreptime=$row1['totalpreptime'];
				$averagepreptime=$row1['averagepreptime'];
			$row2=$getitpr->fetch(PDO::FETCH_BOTH);
				$eventteams=$row2['eventteams'];
				$eventdate=$row2['tprdate'];
				$ftfhours=$row2['ftfhours'];
				$meetingsummary=$row2['meetingsummary'];
			
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
<h2 class="sub-header">Update Event Report</h2>
	<p>
		An Event TPR is a Report created by the Alumni Management Team or the Programme Staff. They have common elements
		across multiple mentors, but there are some elements that require individual input.
	</p>
	<p>
		Please fill out the fields below to update your report for this event.
	</p>
<table class="tprform">
	<form action="../lib/php/updateeventtpr.php" method="POST">
		<!-- hidden inputs -->
		<input type="hidden" id="eventid" name="eventid" value="<?php echo $eventtprid; ?>">
		<input type="hidden" id="deliveryhours" name="ftfhours" value="<?php echo $ftfhours; ?>">
		<tr>
			<td colspan="1"><h4>Event</h4></td>
			<td colspan="3"><?php echo $eventname; ?></td>
		</tr>
		<tr>
			<td colspan="1"><h4>Event date</h4></td>
			<td colspan="3"><?php echo $eventdate; ?></td>
		</tr>
		<tr>
			<td colspan="1"><h4>Delivery hours</h4></td>
			<td colspan="3"><?php echo $ftfhours; ?></td>
		</tr>
		<tr>
			<td colspan="1"><h4>Preparation hours</h4></td>
			<td colspan="1"><input id="otherhours" name="otherhours"></td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="1"><h4>Event score</h4></td>
			<td colspan="3">
				<span class='radiowrapperscore1'><input type='radio' name='tprmeetingscore' id='tprmeetingscore1' value='1' "+tprmeetingscore1+"><label for='tprmeetingscore1'>1</label></span>
				<span class='radiowrapperscore2'><input type='radio' name='tprmeetingscore' id='tprmeetingscore2' value='2' "+tprmeetingscore2+"><label for='tprmeetingscore2'>2</label></span>
				<span class='radiowrapperscore3'><input type='radio' name='tprmeetingscore' id='tprmeetingscore3' value='3' "+tprmeetingscore3+"><label for='tprmeetingscore3'>3</label></span>
				<span class='radiowrapperscore4'><input type='radio' name='tprmeetingscore' id='tprmeetingscore4' value='4' "+tprmeetingscore4+"><label for='tprmeetingscore4'>4</label></span>
				<span class='radiowrapperscore5'><input type='radio' name='tprmeetingscore' id='tprmeetingscore5' value='5' "+tprmeetingscore5+"><label for='tprmeetingscore5'>5</label></span>
			</td>
		</tr>
		<!--
		<tr>
			<td colspan="2"><h4>Event warning flag</h4></td>
			<td colspan="2"><h4>Event highlight</h4></td>
		</tr>
		<tr>
			<td colspan="2"><textarea class="tprwarning"></textarea></td>
			<td colspan="2"><textarea class="tprhighlight"></textarea></td>
		</tr>
		-->
		<!--
		<tr>
			<td colspan="4"><h4>Event notes</h4></td>
		</tr>
		<tr>
			<td colspan="4"><textarea class="tprdescription" id="eventnotes" name="eventnotes"></textarea></td>
		</tr>
		-->
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
