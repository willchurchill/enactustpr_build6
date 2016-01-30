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
	
	  <!-- include functions.js -->
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
	  <?php include_once("../lib/php/gettopics.php"); ?>
  </head>

  <body onload="showothermentors();">
	<?php include_once("topbar.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once("nav.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h2 class="sub-header">Submit Team Progress Report</h2>
<table class="tprform">
	<form action="../lib/php/submitnewtpr.php" method="post">
		<tr>
			<td colspan="2"><h4>Team</h4></td>
			<td colspan="2"><select class="centeredinput" id="teamname" name="teamname" onchange="showothermentors()"><option disabled>-- Your teams --</option><?php echo $showmentorteams; ?><option disabled>-- All teams --</option><?php echo $showallteams; ?></select></td>
		</tr>
		<tr>
			<td colspan="2"><h4>Meeting date</h4></td>
			<td colspan="2"><input class="centeredinput" type="date" id="meetingdate" name="meetingdate"></td>
		</tr>
		<tr>
			<td colspan="3"><h4>Hours</h4></td>
			<td colspan="1" class="tprsubtotal">[total hours]</td>
		</tr>
		<tr>
			<td colspan="1" class="hourslabel"><input class="tprhours" id="ftfhours" name="ftfhours"><br />Face to face</td>
			<td colspan="1" class="hourslabel"><input class="tprhours" id="phonehours" name="phonehours"><br />Phone/Skype</td>
			<td colspan="1" class="hourslabel"><input class="tprhours" id="emailhours" name="emailhours"><br />Email</td>
			<td colspan="1" class="hourslabel"><input class="tprhours" id="otherhours" name="otherhours"><br />Other</td>
		</tr>
		<tr>
			<td colspan="3"><h4>Scores</h4></td>
			<td colspan="1" class="tprsubtotal">[average score]</td>
		</tr>
		<tr>
			<td colspan="1">Meeting</td>
			<td colspan="3">
				<span class='radiowrapperscore1'><input type='radio' name='tprmeetingscore' id='tprmeetingscore1' value='1' "+tprmeetingscore1+"><label for='tprmeetingscore1'>1</label></span>
				<span class='radiowrapperscore2'><input type='radio' name='tprmeetingscore' id='tprmeetingscore2' value='2' "+tprmeetingscore2+"><label for='tprmeetingscore2'>2</label></span>
				<span class='radiowrapperscore3'><input type='radio' name='tprmeetingscore' id='tprmeetingscore3' value='3' "+tprmeetingscore3+"><label for='tprmeetingscore3'>3</label></span>
				<span class='radiowrapperscore4'><input type='radio' name='tprmeetingscore' id='tprmeetingscore4' value='4' "+tprmeetingscore4+"><label for='tprmeetingscore4'>4</label></span>
				<span class='radiowrapperscore5'><input type='radio' name='tprmeetingscore' id='tprmeetingscore5' value='5' "+tprmeetingscore5+"><label for='tprmeetingscore5'>5</label></span>
			</td>
		</tr>
		<tr>
			<td colspan="1">Target</td>
			<td colspan="3">
				<span class='radiowrapperscore1'><input type='radio' name='tprtargetscore' id='tprtargetscore1' value='1' "+tprtargetscore1+"><label for='tprtargetscore1'>1</label></span>
				<span class='radiowrapperscore2'><input type='radio' name='tprtargetscore' id='tprtargetscore2' value='2' "+tprtargetscore2+"><label for='tprtargetscore2'>2</label></span>
				<span class='radiowrapperscore3'><input type='radio' name='tprtargetscore' id='tprtargetscore3' value='3' "+tprtargetscore3+"><label for='tprtargetscore3'>3</label></span>
				<span class='radiowrapperscore4'><input type='radio' name='tprtargetscore' id='tprtargetscore4' value='4' "+tprtargetscore4+"><label for='tprtargetscore4'>4</label></span>
				<span class='radiowrapperscore5'><input type='radio' name='tprtargetscore' id='tprtargetscore5' value='5' "+tprtargetscore5+"><label for='tprtargetscore5'>5</label></span>
				<span class='radiowrapperscore0'><input type='radio' name='tprtargetscore' id='tprtargetscore0' value='0'><label for='tprtargetscore0'>N/A</label></span>
			</td>
		</tr>
		<tr>
			<td colspan="1">Project</td>
			<td colspan="3">
				<span class='radiowrapperscore1'><input type='radio' name='tprprojectscore' id='tprprojectscore1' value='1' "+tprprojectscore1+"><label for='tprprojectscore1'>1</label></span>
				<span class='radiowrapperscore2'><input type='radio' name='tprprojectscore' id='tprprojectscore2' value='2' "+tprprojectscore2+"><label for='tprprojectscore2'>2</label></span>
				<span class='radiowrapperscore3'><input type='radio' name='tprprojectscore' id='tprprojectscore3' value='3' "+tprprojectscore3+"><label for='tprprojectscore3'>3</label></span>
				<span class='radiowrapperscore4'><input type='radio' name='tprprojectscore' id='tprprojectscore4' value='4' "+tprprojectscore4+"><label for='tprprojectscore4'>4</label></span>
				<span class='radiowrapperscore5'><input type='radio' name='tprprojectscore' id='tprprojectscore5' value='5' "+tprprojectscore5+"><label for='tprprojectscore5'>5</label></span>
				<span class='radiowrapperscore0'><input type='radio' name='tprprojectscore' id='tprprojectscore0' value='0'><label for='tprprojectscore0'>N/A</label></span>
			</td>
		</tr>
		<tr>
			<td colspan="1">Engagement</td>
			<td colspan="3">
				<span class='radiowrapperscore1'><input type='radio' name='tprengagementscore' id='tprengagementscore1' value='1' "+tprengagementscore1+"><label for='tprengagementscore1'>1</label></span>
				<span class='radiowrapperscore2'><input type='radio' name='tprengagementscore' id='tprengagementscore2' value='2' "+tprengagementscore2+"><label for='tprengagementscore2'>2</label></span>
				<span class='radiowrapperscore3'><input type='radio' name='tprengagementscore' id='tprengagementscore3' value='3' "+tprengagementscore3+"><label for='tprengagementscore3'>3</label></span>
				<span class='radiowrapperscore4'><input type='radio' name='tprengagementscore' id='tprengagementscore4' value='4' "+tprengagementscore4+"><label for='tprengagementscore4'>4</label></span>
				<span class='radiowrapperscore5'><input type='radio' name='tprengagementscore' id='tprengagementscore5' value='5' "+tprengagementscore5+"><label for='tprengagementscore5'>5</label></span>
				<span class='radiowrapperscore0'><input type='radio' name='tprengagementscore' id='tprengagementscore0' value='0'><label for='tprengagementscore0'>N/A</label></span>
			</td>
		</tr>
		<tr>
			<td colspan="1"><h4>Meeting summary</h4></td>
			<td colspan="3"><textarea id="meetingsummary" name="meetingsummary"></textarea></td>
		</tr>
		<tr>
			<td colspan="4"><h4>Discussion topics</h4></td>
		</tr>
		<tr>
			<td colspan="4"><span class="fourcolcontainer"><?php echo $topicchecklist; ?></span></td>
		</tr>
		<tr>
			<td colspan="2"><h4>Warning flag</h4></td>
			<td colspan="2"><h4>Highlight</h4></td>
		</tr>
		<tr>
			<td colspan="2"><textarea class="tprwarning" id="warningflag" name="warningflag"></textarea></td>
			<td colspan="2"><textarea class="tprhighlight" id="highlight" name="highlight"></textarea></td>
		</tr>
		<tr>
			<td colspan="4"><h4>Meeting description</h4></td>
		</tr>
		<tr>
			<td colspan="4"><textarea class="tprdescription" id="meetingdescription" name="meetingdescription"></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><h4>Contact name</h4></td>
			<td colspan="2"><h4>Contact postition</h4></td>
		</tr>
		<tr>
			<td colspan="2"><input id="contactname" name="contactname"></td>
			<td colspan="2"><input id="contactposition" name="contactposition"></td>
		</tr>
		<tr>
			<td colspan="1"><h4>Support / training<br />requested</h4></td>
			<td colspan="3"><textarea id="supportrequest" name="supportrequest"></textarea></td>
		</tr>
		<tr>
			<td colspan="1"><h4>Other comments</h4></td>
			<td colspan="3"><textarea id="othercomments" name="othercomments"></textarea></td>
		</tr>
		<tr>
			<td colspan="1"><h4>Other mentors present</h4></td>
			<td colspan="3"><?php echo $showallothermentors; ?></td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td colspan="1"><button class="btn btn-lg btn-primary btn-block btn-submit" type="submit">Submit</button></td>
		</tr>
	</form>
</table>          
      </div>
    </div>
		
		<script>
			function showothermentors(){
				var x = document.getElementsByClassName("hiddenothermentors"); var i;
				for (i = 0; i < x.length; i++) { x[i].style.display = "none"; }

				var teamname = document.getElementById("teamname").value;
				document.getElementById("othermentorsfor"+teamname).style.display="block";
			}
		</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
		<script src="../lib/js/piwik.js"></script>
  </body>
</html>
