<?php

include_once("dbconn.php");

$mentorid=$_COOKIE['TPRuserid'];

$eventtprid=$_POST['eventid'];

$ftfhours=intval($_POST['ftfhours']);
$otherhours=intval($_POST['otherhours']);
$eventscore=intval($_POST['tprmeetingscore']);
$eventnotes=$_POST['eventnotes'];

// Pull down the existing Event TPR entries to be updated
$getdata=$pdo->prepare("SELECT respondedmentors, totalpreptime, averagepreptime FROM events WHERE eventid='$eventtprid' LIMIT 1");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$respondedmentors=$row['respondedmentors'];
	$totalpreptime=$row['totalpreptime'];
	$averagepreptime=$row['averagepreptime'];

// Create the updated inputs for the Events table
$updatedrespondedmentors=$respondedmentors+1;
$updatedtotalpreptime=$totalpreptime+$otherhours;
$updatedaveragepreptime=($updatedtotalpreptime/$updatedrespondedmentors);

// Create the updated inputs for the TPR table
$totalhours=$ftfhours+$otherhours;
$averagescore=$eventscore;

// Update the Events table
$updateevents=$pdo->prepare("UPDATE events SET 
	respondedmentors='$updatedrespondedmentors', totalpreptime='$updatedtotalpreptime', averagepreptime='$updatedaveragepreptime'
	WHERE eventid='$eventtprid'");
$updateevents->execute();

// Update the TPR table
$updatetpr=$pdo->prepare("UPDATE tprtable SET
	status='closed', otherhours='$otherhours', totalhours='$totalhours', meetingscore='$eventscore', averagescore='$averagescore', meetingdescription='$eventnotes'
	WHERE (eventid='$eventtprid' AND eventid<>'0' AND mentorid='$mentorid')");
$updatetpr->execute();

// update mentor table with latest
$gettprid=$pdo->prepare("SELECT tprid, tprdate FROM tprtable ORDER BY tprid DESC LIMIT 1"); $gettprid->execute();
	$row0=$gettprid->fetch(PDO::FETCH_BOTH); $lasttprid=$row0['tprid']; $lasttprdate=$row0['tprdate'];
$pushmentordata = $pdo->prepare("UPDATE mentors SET lasttprid='$lasttprid', lasttprdate='$lasttprdate', lasttprteam='EVENT' WHERE mentorid='$mentorid'");
	$pushmentordata->execute();

?>

<html>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script>alert("Event TPR updated.");window.location='../../dashboard/index.php';</script>
</html>