<?php

/* NATIONALS DATES */
$nationals2013="2013-04-16";
$nationals2014="2014-04-15";
$nationals2015="2015-04-14";

$date_now=date("Y-m-d");

/* CURRENT MONTH, LAST MONTH, CURRENT YEAR, LAST YEAR */
$month=date('m');
$year=date('Y');
if($month=="01"){
	$thismonth=$month;
	$lastmonth="12";
	$nextmonth=$thismonth+1;
	$thisyear=$year-1;
	$lastyear=$year-2;
}elseif($month=="12"){
	$thismonth=$month;
	$lastmonth=$month-1;
	$nextmonth="01";
	$thisyear=$year;
	$lastyear=$year-1;
}
else{
	$thismonth=$month;
	$lastmonth=$month-1;
	$nextmonth=$month+1;
	$thisyear=$year;
	$lastyear=$year-1;
}

// THIS MONTH: $month; THIS YEAR: $thisyear; LAST MONTH: $lastmonth; LAST YEAR: $lastyear;

/*********************/
/*  REPORT NUMBERS   */
/*********************/

// NUMBER OF REPORTS LAST 30 DAYS
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE tprtable.meetingdate >= Date_Add(now(), INTERVAL -30 DAY) AND mentors.level<>'6'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totaltprs_30day=$row['tprnumber'];

// NUMBER OF REPORTS THIS MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE YEAR(tprtable.meetingdate)='$thisyear' AND MONTH(tprtable.meetingdate)='$thismonth' AND mentors.level<>'6'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totaltprs_thismonth=$row['tprnumber'];

// NUMBER OF REPORTS LAST MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE YEAR(tprtable.meetingdate)='$thisyear' AND MONTH(tprtable.meetingdate)='$lastmonth' AND mentors.level<>'6'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totaltprs_lastmonth=$row['tprnumber'];

// NUMBER OF REPORTS THIS YEAR
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE tprdate>'$nationals2015' AND mentors.level<>'6'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totaltprs_thisyear=$row['tprnumber'];

//
// NUMBER OF HIGHLIGHTS
//

// NUMBER OF HIGHLIGHTS THIS MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE YEAR(tprtable.meetingdate)='$thisyear' AND MONTH(tprtable.meetingdate)='$thismonth' AND mentors.level<>'6'
			AND tprtable.highlight<>'' AND tprtable.highlight<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhighlights_thismonth=$row['tprnumber'];

// NUMBER OF HIGHLIGHTS LAST MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE YEAR(tprtable.meetingdate)='$thisyear' AND MONTH(tprtable.meetingdate)='$lastmonth' AND mentors.level<>'6'
			AND tprtable.highlight<>'' AND tprtable.highlight<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhighlights_lastmonth=$row['tprnumber'];

// NUMBER OF HIGHLIGHTS THIS YEAR
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE tprdate>'$nationals2015' AND mentors.level<>'6'
			AND tprtable.highlight<>'' AND tprtable.highlight<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhighlights_thisyear=$row['tprnumber'];

//
// NUMBER OF FLAGS
//

// NUMBER OF FLAGS THIS MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE YEAR(tprtable.meetingdate)='$thisyear' AND MONTH(tprtable.meetingdate)='$thismonth' AND mentors.level<>'6'
			AND tprtable.warningflag<>'' AND tprtable.warningflag<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalflags_thismonth=$row['tprnumber'];

// NUMBER OF FLAGS LAST MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE YEAR(tprtable.meetingdate)='$thisyear' AND MONTH(tprtable.meetingdate)='$lastmonth' AND mentors.level<>'6'
			AND tprtable.warningflag<>'' AND tprtable.warningflag<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalflags_lastmonth=$row['tprnumber'];

// NUMBER OF FLAGS THIS YEAR
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE tprdate>'$nationals2015' AND mentors.level<>'6'
			AND tprtable.warningflag<>'' AND tprtable.warningflag<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalflags_thisyear=$row['tprnumber'];


//
// NUMBER OF SUPPORT REQUESTS
//

// NUMBER OF SUPPORT REQUESTS THIS MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE YEAR(tprtable.meetingdate)='$thisyear' AND MONTH(tprtable.meetingdate)='$thismonth' AND mentors.level<>'6'
			AND tprtable.supportrequired<>'' AND tprtable.supportrequired<>'None' AND tprtable.supportrequired<>' None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalsupportrequests_thismonth=$row['tprnumber'];

// NUMBER OF SUPPORT REQUESTS LAST MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE YEAR(tprtable.meetingdate)='$thisyear' AND MONTH(tprtable.meetingdate)='$lastmonth' AND mentors.level<>'6'
			AND tprtable.supportrequired<>'' AND tprtable.supportrequired<>'None' AND tprtable.supportrequired<>' None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalsupportrequests_lastmonth=$row['tprnumber'];

// NUMBER OF SUPPORT REQUESTS THIS YEAR
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE tprdate>'$nationals2015' AND mentors.level<>'6'
			AND tprtable.supportrequired<>'' AND tprtable.supportrequired<>'None' AND tprtable.supportrequired<>' None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalsupportrequests_thisyear=$row['tprnumber'];


/*********************/
/*  MENTOR NUMBERS   */
/*********************/

// NUMBER OF ACTIVE MENTORS LAST 30 DAYS
$getdata=$pdo->prepare("
		SELECT count( DISTINCT(tprtable.mentorid) ) as uniquementors4, mentors.level 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid
		WHERE tprtable.meetingdate >= Date_Add(now(), INTERVAL -30 DAY) AND mentors.level<>'6'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$activementors_30day=$row['uniquementors4'];

// NUMBER OF ACTIVE MENTORS THIS MONTH
$getdata=$pdo->prepare("
		SELECT count( DISTINCT(tprtable.mentorid) ) as uniquementors2, mentors.level 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid
		WHERE YEAR(tprtable.meetingdate)='$thisyear' AND MONTH(tprtable.meetingdate)='$thismonth' AND mentors.level<>'6'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$activementors_month=$row['uniquementors2'];

// NUMBER OF ACTIVE MENTORS LAST MONTH
$getdata=$pdo->prepare("
		SELECT count( DISTINCT(tprtable.mentorid) ) as uniquementors3, mentors.level 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid
		WHERE YEAR(tprtable.meetingdate)='$thisyear' AND MONTH(tprtable.meetingdate)='$lastmonth' AND mentors.level<>'6'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$activementors_lastmonth=$row['uniquementors3'];

// NUMBER OF ACTIVE MENTORS THIS YEAR
$getdata=$pdo->prepare("
		SELECT count( DISTINCT(tprtable.mentorid) ) as uniquementors, mentors.level 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid
		WHERE tprdate>'$nationals2015' AND mentors.level<>'6'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$activementors_thisyear=$row['uniquementors'];


/*********************/
/*      TOPICS       */
/*********************/

//
// TOP 3 IN LAST 30 DAYS
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$thirtydays_topicsarray = array();
$toptopics_30days="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND YEAR(tprdate)='$thisyear' AND MONTH(tprdate)='$thismonth'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$thirtydays_topicsarray[$topic] = $frequency;
}

arsort($thirtydays_topicsarray);
$thirtydays_topicsarray=array_slice($thirtydays_topicsarray,0,3, true);

foreach($thirtydays_topicsarray as $key=>$value){
	$toptopics_30days .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_30days .= "</ul>";

//
// THIS MONTHS TOP 3
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$thismonth_topicsarray = array();
$toptopics_thismonth="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND YEAR(tprdate)='$thisyear' AND MONTH(tprdate)='$thismonth'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$thismonth_topicsarray[$topic] = $frequency;
}

arsort($thismonth_topicsarray);
$thismonth_topicsarray=array_slice($thismonth_topicsarray,0,3, true);

foreach($thismonth_topicsarray as $key=>$value){
	$toptopics_thismonth .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_thismonth .= "</ul>";

//
// LAST MONTHS TOP 3
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$lastmonth_topicsarray = array();
$toptopics_lastmonth="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND YEAR(tprdate)='$thisyear' AND MONTH(tprdate)='$lastmonth'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$lastmonth_topicsarray[$topic] = $frequency;
}

arsort($lastmonth_topicsarray);
$lastmonth_topicsarray=array_slice($lastmonth_topicsarray,0,3, true);

foreach($lastmonth_topicsarray as $key=>$value){
	$toptopics_lastmonth .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_lastmonth .= "</ul>";

//
// THIS YEARS TOP 5
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$thisyear_topicsarray = array();
$toptopics_thisyear="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND tprdate>'$nationals2015'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$thisyear_topicsarray[$topic] = $frequency;
}

arsort($thisyear_topicsarray);
$thisyear_topicsarray=array_slice($thisyear_topicsarray,0,5, true);

foreach($thisyear_topicsarray as $key=>$value){
	$toptopics_thisyear .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_thisyear .= "</ul>";

//
// THIS TIME LAST YEAR
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$thismonthlastyear_topicsarray = array();
$toptopics_thismonthlastyear="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND YEAR(tprdate)='$lastyear' AND MONTH(tprdate)='$thismonth'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$thismonthlastyear_topicsarray[$topic] = $frequency;
}

arsort($thismonthlastyear_topicsarray);
$thismonthlastyear_topicsarray=array_slice($thismonthlastyear_topicsarray,0,3, true);

foreach($thismonthlastyear_topicsarray as $key=>$value){
	$toptopics_thismonthlastyear .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_thismonthlastyear .= "</ul>";

//
// NEXT MONTH
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$nextmonth_topicsarray = array();
$toptopics_nextmonth="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND YEAR(tprdate)='$lastyear' AND MONTH(tprdate)='$nextmonth'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$nextmonth_topicsarray[$topic] = $frequency;
}

arsort($nextmonth_topicsarray);
$nextmonth_topicsarray=array_slice($nextmonth_topicsarray,0,3, true);

foreach($nextmonth_topicsarray as $key=>$value){
	$toptopics_nextmonth .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_nextmonth .= "</ul>";


/*********************/
/*      HOURS        */
/*********************/

// TOTAL HOURS IN THE LAST 30 DAYS
$getdata=$pdo->prepare("SELECT SUM(totalhours) as totalhoursmonth FROM tprtable WHERE tprtable.meetingdate >= Date_Add(now(), INTERVAL -30 DAY)");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhours_30day=$row['totalhoursmonth'];

// TOTAL HOURS THIS MONTH
$getdata=$pdo->prepare("SELECT SUM(totalhours) as totalhoursmonth FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhours_thismonth=$row['totalhoursmonth'];

// TOTAL HOURS LAST MONTH
$getdata=$pdo->prepare("SELECT SUM(totalhours) as totalhoursmonth FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhours_lastmonth=$row['totalhoursmonth'];

// TOTAL HOURS THIS YEAR
$getdata=$pdo->prepare("SELECT SUM(totalhours) as totalhoursmonth FROM tprtable WHERE meetingdate>'$nationals2015'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhours_thisyear=$row['totalhoursmonth'];

// MONTHLY AVERAGE OVER THE CURRENT YEAR
$getmonthlyaverage=$pdo->prepare("SELECT sum(totalhours) as totalhours, count(totalhours) as totalrows FROM tprtable WHERE tprdate>'$nationals2015' AND totalhours>'0'");
	$getmonthlyaverage->execute();

$row1=$getmonthlyaverage->fetch(PDO::FETCH_BOTH);
	$totalhours_year=$row1['totalhours']; // GLOBAL
	$totalentries_year=$row1['totalrows'];
	$averagehours_year=($totalhours_year/$totalentries_year);

// FACE TO FACE HOURS: TOTAL AND AS PERCENTAGE OF TOTAL
$getftfhours=$pdo->prepare("SELECT sum(ftfhours) as ftftotal FROM tprtable WHERE tprdate>'$nationals2015' AND totalhours>'0'");
	$getftfhours->execute();

$row2=$getftfhours->fetch(PDO::FETCH_BOTH);
	$ftfhours_year=$row2['ftftotal'];
	$ftfhours_year_percentage=(($ftfhours_year/$totalhours_year)*100);

/*********************/
/*      TEAMS        */
/*********************/

// NUMBER OF TEAMS SEEN IN LAST 30 DAYS
$getdata=$pdo->prepare("SELECT COUNT( DISTINCT(teamname) ) as distinctteams FROM tprtable WHERE tprtable.meetingdate >= Date_Add(now(), INTERVAL -30 DAY)");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$teams_30day=$row['distinctteams'];

// NUMBER OF TEAMS SEEN THIS MONTH
$getdata=$pdo->prepare("SELECT COUNT( DISTINCT(teamname) ) as distinctteams FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$teams_thismonth=$row['distinctteams'];

// NUMBER OF TEAMS SEEN LAST MONTH
$getdata=$pdo->prepare("SELECT COUNT( DISTINCT(teamname) ) as distinctteams FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$teams_lastmonth=$row['distinctteams'];

// NUMBER OF TEAMS SEEN THIS YEAR
$getdata=$pdo->prepare("SELECT COUNT( DISTINCT(teamname) ) as distinctteams FROM tprtable WHERE meetingdate>'$nationals2015'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$teams_thisyear=$row['distinctteams'];


/*********************/
/*      SCORES       */
/*********************/

// AVERAGE TOTAL SCORE IN LAST 30 DAYS
$getdata=$pdo->prepare("SELECT sum(averagescore) as sumtotalscore, count(averagescore) as totalscore FROM tprtable WHERE tprtable.meetingdate >= Date_Add(now(), INTERVAL -30 DAY) AND averagescore>'0'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	if($row['totalscore']=="0"){
		$averagescore_30day="0";
	}else{
		$averagescore_30day=($row['sumtotalscore']/$row['totalscore']);
		$averagescore_30day=round($averagescore_30day,2);
	}

// AVERAGE TOTAL SCORE THIS MONTH
$getdata=$pdo->prepare("SELECT sum(averagescore) as sumtotalscore, count(averagescore) as totalscore FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND averagescore>'0'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	if($row['totalscore']=="0"){
		$averagescore_thismonth="0";
	}else{
		$averagescore_thismonth=($row['sumtotalscore']/$row['totalscore']);
		$averagescore_thismonth=round($averagescore_thismonth,2);
	}

// AVERAGE TOTAL SCORE LAST MONTH
$getdata=$pdo->prepare("SELECT sum(averagescore) as sumtotalscore, count(averagescore) as totalscore FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND averagescore>'0'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	if($row['totalscore']=="0"){
		$averagescore_lastmonth="0";
	}else{
		$averagescore_lastmonth=($row['sumtotalscore']/$row['totalscore']);
		$averagescore_lastmonth=round($averagescore_lastmonth,2);
	}

// AVERAGE TOTAL SCORE THIS YEAR
$getdata=$pdo->prepare("SELECT sum(averagescore) as sumtotalscore, count(averagescore) as totalscore FROM tprtable WHERE meetingdate>'$nationals2015' AND averagescore>'0'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	if($row['totalscore']=="0"){
		$averagescore_thisyear="0";
	}else{
		$averagescore_thisyear=($row['sumtotalscore']/$row['totalscore']);
		$averagescore_thisyear=round($averagescore_thisyear,2);
	}

include_once("userfacts.php");

?>