<?php

include_once("dbconn.php");
include_once("keyfacts.php");

$getdata=$pdo->prepare("
	SELECT mentorname, mentoremail FROM mentors 
	WHERE level<>'6' AND level<>'1' AND teams<>'' AND mentorname NOT IN 
		(SELECT mentorname FROM tprtable WHERE (YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND totalhours>'0'))
	ORDER BY mentorname
	");
$getdata->execute();

$emaillist="willchurchill89@gmail.com, ";

while($row=$getdata->fetch(PDO::FETCH_BOTH)){
	$emaillist .= "'".$row['mentoremail']."', ";
}

$emaillist=substr($emaillist, 0, -2);

//echo $emaillist;

$emaillist_test = "'willchurchill89@gmail.com', 'will@willchurchill.co.uk'";

// SEND EMAIL
iconv_set_encoding("internal_encoding", "UTF-8");

$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "From: \"TPR Site (Enactus UK Alumni)\" <mentoring@enactusukalumni.org>\r\n";
	$headers .= "BCC: ".$emaillist;
	//$headers .= "BCC: ".$emaillist_test;

$subject = 'A message from the Alumni Mentoring Team';

$to="mentoring@enactusukalumni.org";
//$to=$emaillist_test;

$message = 'Hi,';
	$message .= '<p>We\'ve noticed that you haven\'t yet filled out a Team Progress Report for this month.';
	$message .= '<p>If you\'ve seen a team this month, please make sure you head over to the <a href=\'http://tpr.enactusukalumni.org\'>TPR website</a> and fill one in. If you think that you have filled out a report please make sure that you\'ve assigned hours to the reports you\'ve submitted.';
	$message .= '<p>If you have any questions about this, or you think you\'ve been sent this email by mistake, <a href=\'mailto:mentoring@enactusukalumni.org\'>send us an email</a>!';
	$message .= '<p>-- The Alumni Mentoring team';
	$message .= '<p>';
	$message .= '<p>--- <i>This is an automated message from the Enactus UK Alumni TPR System, please do not reply to this message. If you have a question regarding the contents of this message, please forward this email to <a href=\'mailto:mentoring@enactusukalumni.org\'>mentoring@enactusukalumni.org</a>, along with your query.</i> ---';

//mail($to,$subject,$message,$headers);

//echo "Emailed";

?>

<html>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script>alert("All relevant mentors have been emailed.");window.location='../../board-dashboard/mentorflags.php';</script>
</html>