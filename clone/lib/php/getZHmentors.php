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

$zhmentors_thismonth="";

while($row=$getdata->fetch(PDO::FETCH_BOTH)){
	$zhmentors_thismonth .= $row['mentorname']."<br />";
}

$monthbefore=intval($lastmonth-1);

// get mentors who haven't submitted in 3 months
$getdata=$pdo->prepare("
	SELECT mentorid, mentorname, mentoremail, mentornumber FROM mentors 
	WHERE level<>'6' AND level<>'1' AND teams<>'' AND mentorname NOT IN 
		(SELECT mentorname FROM tprtable WHERE tprtype<>'ETPR' AND (YEAR(meetingdate)='$thisyear' AND (MONTH(meetingdate)='$thismonth' OR MONTH(meetingdate)='$lastmonth' OR MONTH(meetingdate)='$monthbefore') AND totalhours>'0'))
	ORDER BY mentorname
	");
$getdata->execute();

$zhmentors_3month="";

while($row=$getdata->fetch(PDO::FETCH_BOTH)){
	
	$mentorid=$row['mentorid']; $mentorname=$row['mentorname']; $mentoremail=$row['mentoremail']; $mentornumber=$row['mentornumber'];
	//$getdata2=$pdo->prepare("SELECT mentornumber FROM mentors WHERE mentorname='$mentorname' LIMIT 1"); $getdata2->execute();
	//$row2=$getdata2->fetch(PDO::FETCH_BOTH); $mentornumber=$row2['mentornumber'];
	
	if($mentornumber!==""){
		$mentornumber = substr_replace($mentornumber, ' ', 5, 0); $mentornumber = substr_replace($mentornumber, ' ', 9, 0);
		$mentornumber="( ".$mentornumber." )";
	}
	
	$zhmentors_3month .= "<span id='zhname".$mentorid."'><a href='mailto:".$mentoremail."' target='_blank'>".$mentorname."</a></span>";
	$zhmentors_3month .= " <span class='zhnumber".$mentorid."'>".$mentornumber."</span><br />";
}


?>