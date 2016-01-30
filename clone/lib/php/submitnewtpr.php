<?php

include_once("dbconn.php");

$mentorid=$_COOKIE['TPRuserid'];
$tprdate=date("Y-m-d");

// get mentor name and email
$getmentordata=$pdo->prepare("SELECT mentorname, mentoremail FROM mentors WHERE mentorid='$mentorid' LIMIT 1"); $getmentordata->execute();
$row0=$getmentordata->fetch(PDO::FETCH_BOTH); $mentorname=$row0['mentorname']; $mentoremail=$row0['mentoremail'];

$teamname=$_POST['teamname'];
$meetingdate=$_POST['meetingdate'];
$ftfhours=$_POST['ftfhours']; $phonehours=$_POST['phonehours']; $emailhours=$_POST['emailhours']; $otherhours=$_POST['otherhours'];
	$totalhours=intval($ftfhours)+intval($phonehours)+intval($emailhours)+intval($otherhours);
$discussedtopics=$_POST['discussiontopics'];
	if($discussedtopics==""){$discussedtopics="Unknown";}else{$discussedtopics = implode(", ", $_POST['discussiontopics']);}	
$meetingscore=$_POST['tprmeetingscore']; $targetscore=$_POST['tprtargetscore']; $projectscore=$_POST['tprprojectscore']; $engagementscore=$_POST['tprengagementscore']; 
	// determine how many were filled out
	$scorescount=0;
	if($meetingscore>0){$scorescount=$scorescount+1;}if($targetscore>0){$scorescount=$scorescount+1;}
	if($projectscore>0){$scorescount=$scorescount+1;}if($engagementscore>0){$scorescount=$scorescount+1;}
	$totalscore=intval($meetingscore)+intval($targetscore)+intval($projectscore)+intval($engagementscore);
	$averagescore=$totalscore/$scorescount;
$meetingsummary=$_POST['meetingsummary'];
$warningflag=$_POST['warningflag']; $highlight=$_POST['highlight'];
$meetingdescription=$_POST['meetingdescription'];
$contactname=$_POST['contactname']; $contactposition=$_POST['contactposition'];
$supportrequired=$_POST['supportrequest'];
$othercomments=$_POST['othercomments'];
$othermentors=$_POST['othermentors'];

// Make sure there are no empty fields
if($meetingdate==""){$meetingdate=$tprdate;}
if($meetingsummary==""){$meetingsummary="None";}
if($warningflag==""){$warningflag="None";}
if($highlight==""){$highlight="None";}
if($meetingdescription==""){$meetingdescription="None";}
if($contactname==""){$contactname="Unknown";}
if($contactposition==""){$contactposition="Unknown";}
if($supportrequired==""){$supportrequired="None";}
if($othercomments==""){$othercomments="None";}
if($othermentors==""){$othermentors="";}

// Make sure the text fields are safe for database entry
$meetingsummary=addslashes($meetingsummary);
$warningflag=addslashes($warningflag);
$highlight=addslashes($highlight);
$meetingdescription=addslashes($meetingdescription);
$contactname=addslashes($contactname);
$contactposition=addslashes($contactposition);
$supportrequired=addslashes($supportrequired);
$othercomments=addslashes($othercomments);

// insert data into tpr table
$inserttpr = $pdo->prepare("INSERT INTO tprtable (mentorname, mentoremail, mentorid, teamname, tprtype, status, tprdate, meetingdate, ftfhours, phonehours, emailhours, otherhours, totalhours, discussedtopics, meetingscore, meetingsummary, warningflag, highlight, contactname, contactposition, meetingdescription, targetscore, projectscore, engagementscore, averagescore, supportrequired, othercomments) VALUES ('$mentorname','$mentoremail','$mentorid','$teamname','TPR','closed','$tprdate','$meetingdate','$ftfhours','$phonehours','$emailhours','$otherhours','$totalhours','$discussedtopics','$meetingscore','$meetingsummary','$warningflag','$highlight','$contactname','$contactposition','$meetingdescription','$targetscore','$projectscore','$engagementscore','$averagescore','$supportrequired','$othercomments')");
$inserttpr->execute();


?>

<html>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script>alert("TPR submitted.");window.location='../../dashboard/index.php';</script>
</html>