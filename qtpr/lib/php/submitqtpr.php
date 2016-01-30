<?php

include_once("dbconn.php");

$mentorid=$_COOKIE['TPRuserid'];

$getdata=$pdo->prepare("SELECT mentorname, mentoremail FROM mentors WHERE mentorid='$mentorid' LIMIT 1");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$mentorname=$row['mentorname'];
	$mentoremail=$row['mentoremail'];

$teamname=$_POST['teamname'];
$date=date("Y-m-d");
$ftfhours=$_POST['ftfhours'];
$phonehours=$_POST['phonehours'];
$emailhours=$_POST['emailhours'];
$otherhours=$_POST['otherhours'];
$totalhours=intval($ftfhours)+intval($phonehours)+intval($emailhours)+intval($otherhours);
$meetingscore=$_POST['tprmeetingscore'];
$meetingsummary=$_POST['meetingsummary'];

if($ftfhours==""){$ftfhours=="0";}
if($phonehours==""){$phonehours=="0";}
if($emailhours==""){$emailhours=="0";}
if($otherhours==""){$otherhours=="0";}
if($totalhours==""){$totalhours=="0";}
if($meetingsummary==""){$meetingsummary="[Quick TPR from WebApp]";}

$meetingsummary=addslashes($meetingsummary);

$pushdata = $pdo->prepare("INSERT INTO tprtable 
	(mentorname, mentoremail, mentorid, teamname, tprtype, status, meetingdate, tprdate, ftfhours, phonehours, emailhours, otherhours, totalhours, meetingscore, meetingsummary) 
	VALUES 
	('$mentorname', '$mentoremail', '$mentorid', '$teamname', 'QTPR', 'autofollowup', '$date', '$date', '$ftfhours', '$phonehours', '$emailhours', '$otherhours', '$totalhours', '$meetingscore', '$meetingsummary')");
	$pushdata->execute();

// update mentor and team tables with latest
$gettprid=$pdo->prepare("SELECT tprid, tprdate, teamname FROM tprtable ORDER BY tprid DESC LIMIT 1"); $gettprid->execute();
	$row0=$gettprid->fetch(PDO::FETCH_BOTH); $lasttprid=$row0['tprid'];
$pushmentordata = $pdo->prepare("UPDATE mentors SET lasttprid='$lasttprid', lasttprdate='$date', lasttprteam='$teamname' WHERE mentorid='$mentorid'");
	$pushmentordata->execute();
$pushteamdata = $pdo->prepare("UPDATE teams SET lasttprid='$lasttprid', lasttprdate='$date', lasttprmentor='$mentorname' WHERE teamname='$teamname'");
	$pushteamdata->execute();

$getPMemail=$pdo->prepare("SELECT programmemanager, pmemail FROM teams WHERE teamname='$teamname' LIMIT 1");
	$getPMemail->execute();
$row2=$getPMemail->fetch(PDO::FETCH_BOTH);
	$pmname=$row2['programmemanager'];
	$pmto=$row2['pmemail'];

$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "From: \"TPR Site (Enactus UK Alumni)\" <mentoring@enactusukalumni.org>\r\n";

$subject = 'QTPR update from '.$mentorname.' regarding '.$teamname.'';

$message = '<b>'.$mentorname.'</b> has just filled out a Quick TPR for <b>'.$teamname.'</b> and gave them a <b>Meeting Score of '.$meetingscore.'</b>'; 
	$message .= '<p><b>Meeting Summary:</b><br />';
	$message .= '<p>'.$meetingsummary.''; 
	$message .= '<p>--- <i>This is an automated message from the Enactus UK Alumni TPR System, please do not reply to this message</i> ---';

mail($pmto,$subject,$message,$headers);

?>

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

    <title>TPR submitted</title>
	
	<!-- CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
	<link href="../css/forms.css" rel="stylesheet">
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h2 class="sub-header">Complete</h2>
	<h4>TPR for <?php echo $teamname; ?> has been submitted, and <?php echo $pmname; ?> has been notified.</h4>
	<h4><a href="../index.php">Submit another</a></h4>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
  </body>
</html>