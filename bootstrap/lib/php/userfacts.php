<?php

$mentorid=$_COOKIE['TPRuserid'];
if($mentorid==""){$mentorid="0";}

/*********************/
/*  REPORT NUMBERS   */
/*********************/

// NUMBER OF REPORTS LAST 30 DAYS
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE meetingdate >= Date_Add(now(), INTERVAL -30 DAY) AND mentorid='$mentorid'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totaltprs_30day_user=$row['tprnumber'];

// NUMBER OF REPORTS THIS MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND mentorid='$mentorid'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totaltprs_thismonth_user=$row['tprnumber'];

// NUMBER OF REPORTS LAST MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprtable.tprid) as tprnumber 
		FROM tprtable 
		WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND mentorid='$mentorid'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totaltprs_lastmonth_user=$row['tprnumber'];

// NUMBER OF REPORTS THIS YEAR
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE tprdate>'$nationals2015' AND mentorid='$mentorid'
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totaltprs_thisyear_user=$row['tprnumber'];

//
// NUMBER OF HIGHLIGHTS
//

// NUMBER OF HIGHLIGHTS THIS MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND mentorid='$mentorid'
			AND highlight<>'' AND highlight<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhighlights_thismonth_user=$row['tprnumber'];

// NUMBER OF HIGHLIGHTS LAST MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND mentorid='$mentorid'
			AND highlight<>'' AND highlight<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhighlights_lastmonth_user=$row['tprnumber'];

// NUMBER OF HIGHLIGHTS THIS YEAR
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE tprdate>'$nationals2015' AND mentorid='$mentorid'
			AND highlight<>'' AND highlight<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhighlights_thisyear_user=$row['tprnumber'];

//
// NUMBER OF FLAGS
//

// NUMBER OF FLAGS THIS MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND mentorid='$mentorid'
			AND warningflag<>'' AND warningflag<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalflags_thismonth_user=$row['tprnumber'];

// NUMBER OF FLAGS LAST MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND mentorid='$mentorid'
			AND warningflag<>'' AND warningflag<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalflags_lastmonth_user=$row['tprnumber'];

// NUMBER OF FLAGS THIS YEAR
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE tprdate>'$nationals2015' AND mentorid='$mentorid'
			AND warningflag<>'' AND warningflag<>'None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalflags_thisyear_user=$row['tprnumber'];


//
// NUMBER OF SUPPORT REQUESTS
//

// NUMBER OF SUPPORT REQUESTS THIS MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND mentorid='$mentorid'
			AND supportrequired<>'' AND supportrequired<>'None' AND supportrequired<>' None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalsupportrequests_thismonth_user=$row['tprnumber'];

// NUMBER OF SUPPORT REQUESTS LAST MONTH
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND mentorid='$mentorid'
			AND supportrequired<>'' AND supportrequired<>'None' AND supportrequired<>' None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalsupportrequests_lastmonth_user=$row['tprnumber'];

// NUMBER OF SUPPORT REQUESTS THIS YEAR
$getdata=$pdo->prepare("
		SELECT COUNT(tprid) as tprnumber 
		FROM tprtable 
		WHERE tprdate>'$nationals2015' AND mentorid='$mentorid'
			AND supportrequired<>'' AND supportrequired<>'None' AND supportrequired<>' None';
		");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalsupportrequests_thisyear_user=$row['tprnumber'];


/*********************/
/*      TOPICS       */
/*********************/

//
// TOP 3 IN LAST 30 DAYS
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$thirtydays_topicsarray = array();
$toptopics_30days_user="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND YEAR(tprdate)='$thisyear' AND MONTH(tprdate)='$thismonth' AND mentors.mentorid='$mentorid'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$thirtydays_topicsarray[$topic] = $frequency;
}

arsort($thirtydays_topicsarray);
$thirtydays_topicsarray=array_slice($thirtydays_topicsarray,0,3, true);

foreach($thirtydays_topicsarray as $key=>$value){
	$toptopics_30days_user .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_30days_user .= "</ul>";

//
// THIS MONTHS TOP 3
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$thismonth_topicsarray = array();
$toptopics_thismonth_user="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND YEAR(tprdate)='$thisyear' AND MONTH(tprdate)='$thismonth' AND mentors.mentorid='$mentorid'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$thismonth_topicsarray[$topic] = $frequency;
}

arsort($thismonth_topicsarray);
$thismonth_topicsarray=array_slice($thismonth_topicsarray,0,3, true);

foreach($thismonth_topicsarray as $key=>$value){
	$toptopics_thismonth_user .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_thismonth_user .= "</ul>";

//
// LAST MONTHS TOP 3
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$lastmonth_topicsarray = array();
$toptopics_lastmonth_user="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND YEAR(tprdate)='$thisyear' AND MONTH(tprdate)='$lastmonth' AND mentors.mentorid='$mentorid'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$lastmonth_topicsarray[$topic] = $frequency;
}

arsort($lastmonth_topicsarray);
$lastmonth_topicsarray=array_slice($lastmonth_topicsarray,0,3, true);

foreach($lastmonth_topicsarray as $key=>$value){
	$toptopics_lastmonth_user .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_lastmonth_user .= "</ul>";

//
// THIS YEARS TOP 5
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$thisyear_topicsarray = array();
$toptopics_thisyear_user="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND tprdate>'$nationals2015' AND mentors.mentorid='$mentorid'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$thisyear_topicsarray[$topic] = $frequency;
}

arsort($thisyear_topicsarray);
$thisyear_topicsarray=array_slice($thisyear_topicsarray,0,5, true);

foreach($thisyear_topicsarray as $key=>$value){
	$toptopics_thisyear_user .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_thisyear_user .= "</ul>";

//
// THIS TIME LAST YEAR
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$thismonthlastyear_topicsarray = array();
$toptopics_thismonthlastyear_user="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND YEAR(tprdate)='$lastyear' AND MONTH(tprdate)='$thismonth' AND mentors.mentorid='$mentorid'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$thismonthlastyear_topicsarray[$topic] = $frequency;
}

arsort($thismonthlastyear_topicsarray);
$thismonthlastyear_topicsarray=array_slice($thismonthlastyear_topicsarray,0,3, true);

foreach($thismonthlastyear_topicsarray as $key=>$value){
	$toptopics_thismonthlastyear_user .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_thismonthlastyear_user .= "</ul>";

//
// NEXT MONTH
//
$gettopics=$pdo->prepare("SELECT discussiontopic FROM discussiontopics");
	$gettopics->execute();

$nextmonth_topicsarray = array();
$toptopics_nextmonth_user="<ul>";

while($row=$gettopics->fetch(PDO::FETCH_BOTH)){
	$topic=$row['discussiontopic'];
		
	$getdata=$pdo->prepare("SELECT COUNT(tprid) as frequency FROM tprtable 
		WHERE discussedtopics LIKE '%$topic%' AND YEAR(tprdate)='$lastyear' AND MONTH(tprdate)='$nextmonth' AND mentors.mentorid='$mentorid'");
	$getdata->execute();
	
	$row2=$getdata->fetch(PDO::FETCH_BOTH);
		$frequency=$row2['frequency'];
		$nextmonth_topicsarray[$topic] = $frequency;
}

arsort($nextmonth_topicsarray);
$nextmonth_topicsarray=array_slice($nextmonth_topicsarray,0,3, true);

foreach($nextmonth_topicsarray as $key=>$value){
	$toptopics_nextmonth_user .= "<li>".$key." <i>(".$value." mentions)</i></li>";
}

$toptopics_nextmonth_user .= "</ul>";


/*********************/
/*      HOURS        */
/*********************/

// TOTAL HOURS IN THE LAST 30 DAYS
$getdata=$pdo->prepare("SELECT SUM(totalhours) as totalhoursmonth FROM tprtable WHERE meetingdate >= Date_Add(now(), INTERVAL -30 DAY) AND mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhours_30day_user=$row['totalhoursmonth'];
	if($totalhours_30day_user==""){$totalhours_30day_user="0";}

// TOTAL HOURS THIS MONTH
$getdata=$pdo->prepare("SELECT SUM(totalhours) as totalhoursmonth FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhours_thismonth_user=$row['totalhoursmonth'];

// TOTAL HOURS LAST MONTH
$getdata=$pdo->prepare("SELECT SUM(totalhours) as totalhoursmonth FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhours_lastmonth_user=$row['totalhoursmonth'];

// TOTAL HOURS THIS YEAR
$getdata=$pdo->prepare("SELECT SUM(totalhours) as totalhoursmonth FROM tprtable WHERE meetingdate>'$nationals2015' AND mentors.mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$totalhours_thisyear_user=$row['totalhoursmonth'];

// MONTHLY AVERAGE OVER THE CURRENT YEAR
$getmonthlyaverage=$pdo->prepare("SELECT sum(totalhours) as totalhours, count(totalhours) as totalrows FROM tprtable WHERE tprdate>'$nationals2015' AND totalhours>'0'");
	$getmonthlyaverage->execute();

$row1=$getmonthlyaverage->fetch(PDO::FETCH_BOTH);
	$totalhours_year_user=$row1['totalhours']; // GLOBAL
	$totalentries_year_user=$row1['totalrows'];
	$averagehours_year_user=($totalhours_year_user/$totalentries_year_user);

// FACE TO FACE HOURS: TOTAL AND AS PERCENTAGE OF TOTAL
$getftfhours=$pdo->prepare("SELECT sum(ftfhours) as ftftotal FROM tprtable WHERE tprdate>'$nationals2015' AND totalhours>'0' AND mentorid='$mentorid'");
	$getftfhours->execute();

$row2=$getftfhours->fetch(PDO::FETCH_BOTH);
	$ftfhours_year_user=$row2['ftftotal'];
	$ftfhours_year_percentage_user=(($ftfhours_year_user/$totalhours_year_user)*100);

/*********************/
/*      TEAMS        */
/*********************/

// NUMBER OF TEAMS SEEN IN LAST 30 DAYS
$getdata=$pdo->prepare("SELECT COUNT( DISTINCT(teamname) ) as distinctteams FROM tprtable WHERE meetingdate >= Date_Add(now(), INTERVAL -30 DAY) AND mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$teams_30day_user=$row['distinctteams'];
	if($teams_30day_user==""){$teams_30day_user="0";}

// NUMBER OF TEAMS SEEN THIS MONTH
$getdata=$pdo->prepare("SELECT COUNT( DISTINCT(teamname) ) as distinctteams FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$teams_thismonth_user=$row['distinctteams'];

// NUMBER OF TEAMS SEEN LAST MONTH
$getdata=$pdo->prepare("SELECT COUNT( DISTINCT(teamname) ) as distinctteams FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$teams_lastmonth_user=$row['distinctteams'];

// NUMBER OF TEAMS SEEN THIS YEAR
$getdata=$pdo->prepare("SELECT COUNT( DISTINCT(teamname) ) as distinctteams FROM tprtable WHERE meetingdate>'$nationals2015' AND mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	$teams_thisyear_user=$row['distinctteams'];


/*********************/
/*      SCORES       */
/*********************/

// AVERAGE TOTAL SCORE IN LAST 30 DAYS
$getdata=$pdo->prepare("SELECT sum(averagescore) as sumtotalscore, count(averagescore) as totalscore FROM tprtable WHERE tprtable.meetingdate >= Date_Add(now(), INTERVAL -30 DAY) AND averagescore>'0' AND mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	if($row['totalscore']==""||$row['totalscore']=="0"){$averagescore_30day_user="0";}else{
		$averagescore_30day_user=($row['sumtotalscore']/$row['totalscore']);
		$averagescore_30day_user=round($averagescore_30day_user,2);
	}

// AVERAGE TOTAL SCORE THIS MONTH
$getdata=$pdo->prepare("SELECT sum(averagescore) as sumtotalscore, count(averagescore) as totalscore FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND averagescore>'0' AND mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	if($row['totalscore']==""||$row['totalscore']=="0"){$averagescore_thismonth_user="0";}else{
		$averagescore_thismonth_user=($row['sumtotalscore']/$row['totalscore']);
		$averagescore_thismonth_user=round($averagescore_thismonth_user,2);
	}

// AVERAGE TOTAL SCORE LAST MONTH
$getdata=$pdo->prepare("SELECT sum(averagescore) as sumtotalscore, count(averagescore) as totalscore FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND averagescore>'0' AND mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	if($row['totalscore']==""||$row['totalscore']=="0"){$averagescore_lastmonth_user="0";}else{
		$averagescore_lastmonth_user=($row['sumtotalscore']/$row['totalscore']);
		$averagescore_lastmonth_user=round($averagescore_lastmonth_user,2);
	}

// AVERAGE TOTAL SCORE THIS YEAR
$getdata=$pdo->prepare("SELECT sum(averagescore) as sumtotalscore, count(averagescore) as totalscore FROM tprtable WHERE meetingdate>'$nationals2015' AND averagescore>'0' AND mentorid='$mentorid'");
	$getdata->execute();
$row=$getdata->fetch(PDO::FETCH_BOTH);
	if($row['totalscore']==""||$row['totalscore']=="0"){$averagescore_thisyear_user="0";}else{
		$averagescore_thisyear_user=($row['sumtotalscore']/$row['totalscore']);
		$averagescore_thisyear_user=round($averagescore_thisyear_user,2);
	}

?>