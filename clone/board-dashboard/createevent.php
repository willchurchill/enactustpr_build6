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
<h2 class="sub-header">Create new event</h2>
<table class="tprform">
	<form action="../lib/php/createevent.php" method="post">
		<tr>
			<td colspan="2"><h4>Event name</h4></td>
			<td colspan="2"><input class="centeredinput" id="eventname" name="eventname"></td>
		</tr>
		<tr>
			<td colspan="2"><h4>Event date</h4></td>
			<td colspan="2"><input class="centeredinput" type="date" id="eventdate" name="eventdate"></td>
		</tr>
		<tr>
			<td colspan="4"><h4>Event summary</h4></td>
		</tr>
		<tr>
			<td colspan="4"><textarea id="eventsummary" name="eventsummary"></textarea></td>
		</tr>
		<tr>
			<td colspan="3"><h4>Delivery hours</h4></td>
			<td colspan="1" class="hourslabel"><input class="tprhours" id="deliveryhours" name="deliveryhours"></td>
		</tr>
		<tr>
			<td colspan="4"><h4>Attending mentors</h4></td>
		</tr>
		<tr>
			<td colspan="4">
				<span class="fourcolcontainer">
					<?php echo $showmentorlist; ?>
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="4"><h4>Attending teams</h4></td>
		</tr>
		<tr>
			<td colspan="4">
				<span class="fourcolcontainer">
					<?php echo $showteamlist; ?>
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td colspan="1"><button class="btn btn-lg btn-primary btn-block btn-submit" type="submit">Create event</button></td>
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
