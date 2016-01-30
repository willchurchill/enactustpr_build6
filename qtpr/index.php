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

    <title>Submit TPR</title>
	
	<!-- CSS -->
    <link href="lib/css/bootstrap.css" rel="stylesheet">
	<link href="lib/css/forms.css" rel="stylesheet">

    <!-- Include PHP scripts -->
	  <?php include_once("lib/php/dbconn.php"); ?>
	  <?php include_once("lib/php/teamnames.php"); ?>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h2 class="sub-header">Quick TPR</h2>
<table class="tprform">
	<form action="lib/php/submitqtpr.php" method="post">
		<tr>
			<td colspan="2"><h4>Team</h4></td>
			<td colspan="3"><select id="teamname" name="teamname"><option disabled>-- Your teams --</option><?php echo $showmentorteams; ?><option disabled>-- All teams --</option><?php echo $showallteams; ?></select></td>
		</tr>
		<tr>
			<td colspan="1"><h4>Hours</h4></td>
		</tr>
		<tr>
			<td colspan="1" class="hourslabel"><input type="tel" class="tprhours" id="ftfhours" name="ftfhours"><br />Face</td>
			<td colspan="1" class="hourslabel"><input type="tel" class="tprhours" id="ftfhours" name="phonehours"><br />Phone</td>
			<td colspan="1" class="hourslabel"><input type="tel" class="tprhours" id="ftfhours" name="emailhours"><br />Email</td>
			<td colspan="1" class="hourslabel"><input type="tel" class="tprhours" id="ftfhours" name="otherhours"><br />Other</td>
		</tr>
		<tr>
			<td colspan="5"><h4>Meeting score</h4></td>
		</tr>
		<tr>
			<td colspan="5">
				<span class='radiowrapperscore1'><input type='radio' name='tprmeetingscore' id='tprmeetingscore1' value='1' "+tprmeetingscore1+"><label for='tprmeetingscore1'>1</label></span>
				<span class='radiowrapperscore2'><input type='radio' name='tprmeetingscore' id='tprmeetingscore2' value='2' "+tprmeetingscore2+"><label for='tprmeetingscore2'>2</label></span>
				<span class='radiowrapperscore3'><input type='radio' name='tprmeetingscore' id='tprmeetingscore3' value='3' "+tprmeetingscore3+"><label for='tprmeetingscore3'>3</label></span>
				<span class='radiowrapperscore4'><input type='radio' name='tprmeetingscore' id='tprmeetingscore4' value='4' "+tprmeetingscore4+"><label for='tprmeetingscore4'>4</label></span>
				<span class='radiowrapperscore5'><input type='radio' name='tprmeetingscore' id='tprmeetingscore5' value='5' "+tprmeetingscore5+"><label for='tprmeetingscore5'>5</label></span>
			</td>
		</tr>
		<tr>
			<td colspan="5"><h4>Meeting summary</h4></td>
		</tr>
		<tr>
			<td colspan="5"><textarea class="meetingsummary" id="meetingsummary" name="meetingsummary"></textarea></td>
		</tr>
		<tr>
			<td colspan="5"><button class="btn btn-lg btn-primary btn-block btn-submit" type="submit">Submit</button></td>
		</tr>
	</form>
</table>          
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="lib/js/functions.js"></script>
    <script src="lib/js/checklogin.js"></script>
  </body>
</html>
