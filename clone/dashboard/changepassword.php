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
	  <!-- load core JS functions -->
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
<h2 class="sub-header">Change password</h2>
<p>
	<form class="form-signin" action="../lib/php/changepassword.php" method="post">
        <label for="oldpass" class="sr-only">Old password</label>
		<input type="password" id="oldpass" name="oldpass" class="form-control" placeholder="Old password" required>
		<label for="newpass" class="sr-only">New password</label>
		<input type="password" id="oldpass" name="newpass" class="form-control" placeholder="New password" required>
		<label for="confirmpass" class="sr-only">Confirm new password</label>
		<input type="password" id="oldpass" name="confirmpass" class="form-control" placeholder="Confirm new password" required>
        <button class="btn btn-lg btn-primary btn-block btn-on" type="submit">Change password</button>
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
