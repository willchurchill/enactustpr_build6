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

    <title>Flag a team</title>
		<!-- include core JS functions -->
		<script src="../lib/js/functions.js"></script>
		<script src='../lib/js/checklogin.js'></script>

    <!-- Bootstrap core CSS -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
    <link href="../lib/css/dashboard.css" rel="stylesheet">
    <link href="../lib/css/signin.css" rel="stylesheet">
	<link href="../lib/css/forms.css" rel="stylesheet">

    <!-- Include PHP scripts -->
	  <?php include_once("../lib/php/dbconn.php"); ?>
	  <?php include_once("../lib/php/keyfacts.php"); ?>
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
<h2 class="sub-header">Flag a team</h2>
	The flag a team feature enables you to alert your Programme Manager if you haven't heard from a team in a longer than usual
			amount of time. The length of time will vary from mentor to mentor and team to team, but as a guideline we 
			recommend flagging a team if they haven't been in contact with you for over two weeks.
<p>
	<form class="form-signin" action="../lib/php/flagteam.php" method="post">
        <label for="teamname" class="sr-only">Team name</label>
        <select id="teamname" name="teamname" class="form-control" placeholder="Team" required autofocus>
			<?php echo $showmentorteams; ?>
		</select>
        <label for="additionalinfo" class="sr-only">Additional info</label>
		<textarea id="additionalinfo" name="additionalinfo" class="form-control" placeholder="Other details (optional)"></textarea>
        <button class="btn btn-lg btn-primary btn-block btn-flag" type="submit">Flag team</button>
      </form>
			</p>
          
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
