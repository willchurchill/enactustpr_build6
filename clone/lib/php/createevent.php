<?php

include_once("dbconn.php");

$displaymentors=""; $displayteams="";

$eventname=$_POST['eventname'];
$eventdate=$_POST['eventdate'];
$eventsummary=$_POST['eventsummary'];
$deliveryhours=$_POST['deliveryhours'];
$attendingmentors=$_POST['mentors'];
	foreach($attendingmentors as $value){
		$getdata=$pdo->prepare("SELECT mentorname FROM mentors WHERE mentorid='$value' LIMIT 1");
			$getdata->execute();
		$row=$getdata->fetch(PDO::FETCH_BOTH);
			$mentorname=$row['mentorname'];
		$displaymentors .= $mentorname.", ";
	}
	$displaymentors=substr($displaymentors, 0, -2);
$attendingteams=$_POST['teams'];
	foreach($attendingteams as $value){
		$getdata=$pdo->prepare("SELECT teamname FROM teams WHERE teamid='$value' LIMIT 1");
			$getdata->execute();
		$row=$getdata->fetch(PDO::FETCH_BOTH);
			$teamname=$row['teamname'];
		$displayteams .= $teamname.", ";
	}	
	$displayteams=substr($displayteams, 0, -2);
$totalmentors=count($attendingmentors); $totalteams=count($attendingteams);

// CREATE EVENT TPR
$inserteventtpr=$pdo->prepare("INSERT INTO events
	(eventname, eventdate, eventsummary, eventteams, eventmentors, deliveryhours, totalmentors, totalteams)
	VALUES 
	('$eventname','$eventdate','$eventsummary','$displayteams','$displaymentors','$deliveryhours','$totalmentors','$totalteams')
	");
	$inserteventtpr->execute();

$geteventid=$pdo->prepare("SELECT eventid FROM events ORDER BY eventid DESC LIMIT 1");
	$geteventid->execute();
$row0=$geteventid->fetch(PDO::FETCH_BOTH);
	$eventid=$row0['eventid'];

// CREATE THE EMAIL
$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "From: \"TPR Site (Enactus UK Alumni)\" <mentoring@enactusukalumni.org>\r\n";

$subject = 'Please confirm your attendance at '.$eventname.'';

$message = '<p>Hi,</p><p>We have created an <i>Event TPR</i> in your name for '.$eventname.'.<br />'; 
	$message .= 'A report has been created for every mentor present at the event, and each person has  had '.$deliveryhours.' ';
	$message .= 'added in their name. <br />'; 
	$message .= 'Please could you follow <a href="http://tpr.enactusukalumni.org/bootstrap/dashboard/updateeventtpr.php?etprid='.$eventid.'">this link</a> to include the hours you spent preparing for this event.';
	$message .= '</p><p>Or, if the link isn\'t working, copy and paste <b>http://tpr.enactusukalumni.org/bootstrap/dashboard/updateeventtpr.php?etprid='.$eventid.'</b> into the URL bar of your browser.';
	$message .= '</p><p>Thanks, <br /> The Alumni Mentoring Team</p>';
	$message .= '<p>--- <i>This is an automated message from the Enactus UK Alumni TPR System, please do not reply to this message</i> ---';

// CREATE TPR FOR EACH MENTOR AND THEN EMAIL THOSE MENTORS

foreach($attendingmentors as $value){
	$getmentoremails=$pdo->prepare("SELECT mentorname, mentoremail FROM mentors WHERE mentorid='$value' LIMIT 1");
		$getmentoremails->execute();
	$row=$getmentoremails->fetch(PDO::FETCH_BOTH);
		$mentorname=$row['mentorname'];
		$to=$row['mentoremail'];

	$insertdata=$pdo->prepare("INSERT INTO tprtable 
		(mentorname, mentoremail, mentorid, eventname, eventid, eventteams, tprtype, status, tprdate, meetingdate, ftfhours, totalhours, meetingsummary)
		VALUES 
		('$mentorname', '$to', '$value', '$eventname', '$eventid', '$displayteams', 'ETPR', 'autofollowup', '$eventdate', '$eventdate', '$deliveryhours', '$deliveryhours', '$eventsummary')
	");
	$insertdata->execute();
	
	// EMAIL MENTOR
	//mail($to,$subject,$message,$headers);
	
	echo "Emailed ".$mentorname." at ".$to."<br />";

}

?>

<html>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script>alert("Event TPR created. The relevant mentors have been emailed.");window.location='../../board-dashboard/createevent.php';</script>
</html>