<?php

include_once("dbconn.php");
//get mentor name
$mentorname=$_COOKIE['TPRusername'];
$teamname=$_POST['teamname'];
$additionalinfo=$_POST['additionalinfo'];
$date=date("Y-m-d");

if($additionalinfo==""){
	$infooutput="They gave no further information";
	$flagnotes="None";
}else{
	$infooutput="They gave the following additional information:<br />".$additionalinfo;
	$flagnotes=$additionalinfo;
}

// add flag to team table
$pushdata=$pdo->prepare("UPDATE team SET flagged='YES', flaggedby='$mentorname', flaggedon='$date', flagnotes='$flagnotes'
	WHERE teamname='$teamname'");
$pushdata->execute();

// get PM email and send note
$getPMemail=$pdo->prepare("SELECT pmemail FROM teams WHERE teamname='$teamname' LIMIT 1");
	$getPMemail->execute();

$row=$getPMemail->fetch(PDO::FETCH_ASSOC);
	$pmto=$row['pmemail'];

//$pmto="willchurchill.89@gmail.com";

$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "From: \"TPR Site (Enactus UK Alumni)\" <mentoring@enactusukalumni.org>\r\n";

$subject = 'TEAM FLAG: '.$teamname.'';

$message = '<b>'.$mentorname.'</b> has just flagged <b>'.$teamname.'</b>'; 
	$message .= '<p>'.$infooutput;

mail($pmto,$subject,$message,$headers);


?>

<html>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	Flagging team...
	<script>alert("Team has been flagged, the appropriate PM has been emailed.");window.location='../../dashboard/index.php';</script>
</html>