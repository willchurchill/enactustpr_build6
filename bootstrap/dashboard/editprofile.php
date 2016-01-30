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

    <title>TPR: Edit Profile</title>
	  <!-- load core JS functions -->
	  <script src="../lib/js/functions.js"></script>
		<script src='../lib/js/checklogin.js'></script>

    <!-- CSS -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
    <link href="../lib/css/dashboard.css" rel="stylesheet">
    <link href="../lib/css/forms.css" rel="stylesheet">

    <!-- Include PHP scripts -->
	  <?php include_once("../lib/php/dbconn.php"); ?>
	  <?php include_once("../lib/php/keyfacts.php"); ?>
	  <?php include_once("../lib/php/editprofile.php"); ?>
  </head>

  <body>
	<?php include_once("topbar.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once("nav.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h2 class="sub-header">Edit profile</h2>
<table class="tprform">
	<form action="../lib/php/updateprofile.php" method="POST">
		<tr><td colspan="7"><h3>Contact Details</h3></td></tr>
		<tr>
			<td colspan="1" width="20%">Name</td>
			<td colspan="6"><input name='mentorname' value="<?php echo $mentorname; ?>"></td>
		</tr>
		<tr>
			<td colspan="1">Email (primary)</td>
			<td colspan="6"><input name='mentoremail' value="<?php echo $mentoremail; ?>"></td>
		</tr>
		<tr>
			<td colspan="1">Email (others)</td>
			<td colspan="6"><textarea name='otheremails'><?php echo $otheremails; ?></textarea></td>
		</tr>
		<tr>
			<td colspan="2">Mobile</td>
			<td colspan="5"><input name='mentornumber' value="<?php echo $mentornumber; ?>"></td>
		</tr>
		<tr>
			<td colspan="2">Current city</td>
			<td colspan="5"><input name='currentcity' value="<?php echo $currentcity; ?>"></td>
		</tr>
		<tr>
			<td colspan="4">Mentor since</td>
			<td colspan="3"><input name='mentorsince' value="<?php echo $mentorsince; ?>"></td>
		</tr>
		<tr>
			<td colspan="7"><h3>Job Details</h3></td>
		</tr>
		<tr>
			<td colspan="1">Job title</td>
			<td colspan="6"><input name='jobtitle' value="<?php echo $jobtitle; ?>"></td>
		</tr>
		<tr>
			<td colspan="1">Company name</td>
			<td colspan="6"><input name='company' value="<?php echo $company; ?>"></td>
		</tr>
		<tr>
			<td colspan="4">Enactus sponsor</td>
			<td><?php echo $enactussponsor; ?></td>
		</tr>
		<tr>
			<td><h3>University details</h3></td>
		</tr>
		<tr>
			<td colspan="1">University</td>
			<td colspan="6"><input name='university' value="<?php echo $university; ?>"></td>
		</tr>
		<tr>
			<td colspan="4">Graduated in</td>
			<td colspan="3"><input name='gradyear' value="<?php echo $gradyear; ?>"></td>
		</tr>
		<tr>
			<td colspan="1">Subject studied</td>
			<td colspan="6"><input name='subject' value="<?php echo $subject; ?>"></td>
		</tr>
		<tr>
			<td colspan="7"><h3>Skills</h3></td>
		</tr>
		<tr>
			<td colspan="7"><h4>General Enactus Knowledge and Training</h4></td>
		</tr>
		<tr>
			<td colspan="6"></td>
			<td colspan="2" style="font-weight:bold; text-align:center; background-color:#f5f5f5;"><h4>Can deliver training</h4></td>
		</tr>
		<tr>
			<td colspan="1">Team Leadership</td>
			<td style="white-space: nowrap"><?php showOptions("Team Leadership"); ?></td>
		</tr>
		<tr>
			<td>Recruitment</td>
			<td style="white-space: nowrap"><?php showOptions("Recruitment"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Team building / HR</td>
			<td style="white-space: nowrap"><?php showOptions("Team Building / HR"); ?></td>
		</tr>
		<tr>
			<td colspan="1">PR / Media</td>
			<td style="white-space: nowrap"><?php showOptions("PR / Media"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Branding</td>
			<td style="white-space: nowrap"><?php showOptions("Branding"); ?></td>
		</tr>
		<tr>
			<td colspan="1">CRE</td>
			<td style="white-space: nowrap"><?php showOptions("CRE"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Legal</td>
			<td style="white-space: nowrap"><?php showOptions("Legal"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Finance</td>
			<td style="white-space: nowrap"><?php showOptions("Finance"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Strategy</td>
			<td style="white-space: nowrap"><?php showOptions("Strategy"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Ideas Generation</td>
			<td style="white-space: nowrap"><?php showOptions("Ideas Generation"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Grants / Sponsorship</td>
			<td style="white-space: nowrap"><?php showOptions("Grants / Sponsorship"); ?></td>
		</tr>
		<tr>
			<td colspan="7"><h4>Project Skills, Knowledge, and Training</h4></td>
		</tr>
		<tr>
			<td colspan="6"></td>
			<td colspan="2" style="font-weight:bold; text-align:center; background-color:#f5f5f5;"><h4>Can deliver training</h4></td>
		</tr>
		<tr>
			<td colspan="1">Finding Project Partners</td>
			<td style="white-space: nowrap"><?php showOptions("Finding Project Partners"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Designing Projects</td>
			<td style="white-space: nowrap"><?php showOptions("Designing Projects"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Implementing</td>
			<td style="white-space: nowrap"><?php showOptions("Implementing"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Expanding</td>
			<td style="white-space: nowrap"><?php showOptions("Expanding"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Community</td>
			<td style="white-space: nowrap"><?php showOptions("Community"); ?></td>
		</tr>
		<tr>
			<td colspan="1">International</td>
			<td style="white-space: nowrap"><?php showOptions("International"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Commercial</td>
			<td style="white-space: nowrap"><?php showOptions("Commercial"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Impact Measurement</td>
			<td style="white-space: nowrap"><?php showOptions("Impact Measurement"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Engineering</td>
			<td style="white-space: nowrap"><?php showOptions("Engineering"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Environmental</td>
			<td style="white-space:nowrap;"><?php showOptions("Environmental"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Working with beneficiaries</td>
			<td style="white-space: nowrap"><?php showOptions("Working with Beneficiaries"); ?></td>
		</tr>
		<tr>
			<td colspan="7"><h4>Competition Skill, Knowledge, and Training</h4></td>
		</tr>
		<tr>
			<td colspan="6"></td>
			<td colspan="2" style="font-weight:bold; text-align:center; background-color:#f5f5f5;"><h4>Can deliver training</h4></td>
		</tr>
		<tr>
			<td colspan="1">Presentation Skills</td>
			<td style="white-space: nowrap"><?php showOptions("Presenting Skills"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Script writing</td>
			<td style="white-space: nowrap"><?php showOptions("Script Writing"); ?></td>
		</tr>
		<tr>
			<td colspan="1">AV / Slides</td>
			<td style="white-space: nowrap"><?php showOptions("AV / Slides"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Videos</td>
			<td style="white-space: nowrap"><?php showOptions("Videos"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Criteria</td>
			<td style="white-space: nowrap"><?php showOptions("Criteria"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Annual Report</td>
			<td style="white-space: nowrap"><?php showOptions("Annual Report"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Q & A</td>
			<td style="white-space: nowrap"><?php showOptions("Q&A"); ?></td>
		</tr>
		<tr>
			<td colspan="1">Competition Strategy</td>
			<td style="white-space: nowrap"><?php showOptions("Competition Strategy"); ?></td>
		</tr>
		<tr>
			<td colspan="7"><h4>Other Skills and Experience</h4></td>
		</tr>
		<tr>
			<td colspan="3">Any professional training that you would like to bring to Enactus teams?</td>
			<td colspan="5"><textarea name='professionaltraining'><?php echo $professionaltraining; ?></textarea></td>
		</tr>
		<tr>
			<td colspan="3">Please provide details on the specific beneficiary groups you have experience working with</td>
			<td colspan="5"><textarea name='beneficiarygroups'><?php echo $beneficiarygroups; ?></textarea></td>
		</tr>
		<tr>
			<td colspan="3">Please provide a brief description of the project(s) you worked on</td>
			<td colspan="5"><textarea name='projectdescription'><?php echo $projectdescription; ?></textarea></td>
		</tr>
		<tr>
			<td colspan="7"><b><i>Your mentor number is <?php echo $mentorid; ?></i></b></td>
		</tr>
		<tr>
			<td colspan="6"></td>
			<td colspan="2"><button class="btn btn-lg btn-primary btn-block btn-submit" type="submit">Save changes</button></td>
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
