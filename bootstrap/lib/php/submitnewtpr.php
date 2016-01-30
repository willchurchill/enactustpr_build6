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
//$gettprid=$pdo->prepare("SELECT tprid FROM tprtable ORDER BY tprid DESC LIMIT 1"); $gettprid->execute();
//$row3=$gettprid->fetch(PDO::FETCH_BOTH); $tprid=$row3['tprid'];

/*

// update mentor table
$updatementor=$pdo->prepare("UPDATE mentors SET lasttprid='$tprid', lasttprteam='$teamname', lasttprdate='$tprdate' WHERE mentorid='$mentorid'");
	$updatementor->execute();

// update team table
$updateteam=$pdo->prepare("UPDATE teams SET lasttprid='$tprid', lasttprmentor='$mentorname', lasttprdate='$tprdate' WHERE teamname='$teamname'");
	$updateteam->execute();

// check if there were other mentors. if so get their details, create reports in their name, and email them
if($othermentors==""){}
else{
	foreach($othermentors as $othermentorid){
		//make sure the other mentors haven't already submitted a report
		$checkOtherTPRs=$pdo->prepare("SELECT tprid FROM tprtable WHERE mentorid='$othermentorid' AND meetingdate='$meetingdate' AND teamname='$teamname'");
			$checkOtherTPRs->execute();
		if ($checkOtherTPRs->rowCount()>0){
			//do nothing
		}else{
			//get other mentors name and email
			$getothermentordata=$pdo->prepare("SELECT mentorname, mentoremail FROM mentors WHERE mentorid='$othermentorid' LIMIT 1"); $getothermentordata->execute(); 
				$row=$getothermentordata->fetch(PDO::FETCH_BOTH); $othermentorname=$row['mentorname']; $othermentoremail=$row['mentoremail'];
			//create a report in their name
			$pushothermentordata=$pdo->prepare("INSERT INTO tprtable 
				(mentorname, mentoremail, mentorid, teamname, tprtype, tprdate, meetingdate, ftfhours, phonehours, emailhours, otherhours, totalhours, 
				discussedtopics, meetingscore, averagescore, meetingsummary, meetingdescription) VALUES 
				('$othermentorname', '$othermentoremail', '$othermentorid', '$teamname', 'OTPR', '$tprdate', '$meetingdate', 
				'$ftfhours', '$phonehours', '$emailhours', '$otherhours', '$totalhours', '$discussedtopics', '$meetingscore', '$meetingscore', 
				'[From $mentorname\'s report] $tprsummary', '[From $mentorname\'s report] $tprdescription')"); $pushothermentordata->execute();
			//update mentor table
			$updatementor=$pdo->prepare("UPDATE mentors SET lasttprid='$tprid', lasttprteam='$teamname', lasttprdate='$tprdate' 
			WHERE mentorid='$othermentorid'"); $updatementor->execute();
			
			//send email
			iconv_set_encoding("internal_encoding", "UTF-8");
			$OMheaders = "MIME-Version: 1.0\r\n";
				$OMheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$OMheaders .= "From: \"TPR Site (Enactus UK Alumni)\" <mentoring@enactusukalumni.org>\r\n";
			$OMsubject = 'TPR update from '.$mentorname.' regarding '.$teamname.'';
			$OMto = $othermentoremail;
			//$OMto="willchurchill89@gmail.com";
			$mtopics=utf8_decode($topics); $mtprsummary=utf8_decode($tprsummary); $mtprdescription=utf8_decode($tprdescription);
			$OMmessage = '<b>'.$mentorname.'</b> has just filled out a TPR for <b>'.$teamname.'</b> and mentioned that you were at the same meeting.';
				$OMmessage .= '<p>As a result, a TPR has been created in your name with the details below. You can log in to the TPR site to amend this (for example to either to update your hours, or give your account of the team). Alternatively you can choose to ignore this, and your hours will still be counted.';
				$OMmessage .= '<p><b><i>'.$mentorname.' gave the following report:</i></b><br />';
				$OMmessage .= '<p><b>Meeting date:</b> '.$meetingdate.' -- <b>Length of meeting: </b>.'.$totalhours.' hour(s) -- <b>Meeting score: </b>.'.$meetingscore.'<br />';
				$OMmessage .= '<p><b>Topics discussed:</b> '.$mtopics.'<br />';
				$OMmessage .= '<p><b>Meeting summary: </b>'.$mtprsummary.'<br />'; 
				$OMmessage .= '<p><b>Meeting Description: </b><br />';
				$OMmessage .= '<p>'.$mtprdescription.'';
				$OMmessage .= '<p>--- <i>This is an automated message from the Enactus UK Alumni TPR System, please do not reply to this message</i> ---';
			mail($OMto,$OMsubject,$OMmessage,$OMheaders);
			
			//create new variable with all mentor names ready for PM email
			$othermentorspresent .= " ".$othermentorname.", ";
		}
	}
}

// get PM details
$getpmdata=$pdo->prepare("SELECT programmemanager, pmemail FROM teams WHERE teamname='$teamname' LIMIT 1"); $getpmdata->execute();
	$row1=$getpmdata->fetch(PDO::FETCH_BOTH); $programmemanager=$row1['programmemanager']; $pmemail=$row1['pmemail'];
// send PM email
$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "From: \"TPR Site (Enactus UK Alumni)\" <mentoring@enactusukalumni.org>\r\n";
$subject = 'TPR update from '.$mentorname.' regarding '.$teamname.'';
$message = '<b>'.$mentorname.'</b> has just filled out a TPR for <b>'.$teamname.'</b> and gave them a <b>Meeting Score of '.$meetingscore.'</b>'; 
	$message .= '<p><b>Meeting Summary:</b><br />';
	$message .= '<p>'.$meetingsummary.''; 
	$message .= '<p><b>They requested the following support / training: </b>';
	$message .= '<p>'.$supportrequired.'';
//if($othermentorspresent!="") { $message .= '<p><b>Other mentors present: </b>'.$othermentorspresent.''; }
	$message .= '<p>--- <i>This is an automated message from the Enactus UK Alumni TPR System, please do not reply to this message</i> ---';

mail($pmemail,$subject,$message,$headers);

*/

?>

<html>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script>alert("TPR submitted.");window.location='../../dashboard/index.php';</script>
</html>