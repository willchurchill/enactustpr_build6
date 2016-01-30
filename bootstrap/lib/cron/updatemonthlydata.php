<?php

include_once("dbconn.php");

//get the date
$month=date('m'); $year=date('Y');

//get the total hours fos this month (including events)
$getdata=$pdo->prepare("SELECT SUM(totalhours) as totalhours FROM tprtable WHERE mentorname<>'' AND totalhours<>'0' AND YEAR(meetingdate)='$year' AND MONTH(meetingdate)='$month'");
$getdata->execute(); $row=$getdata->fetch(PDO::FETCH_BOTH);
$totalhours_events=$row['totalhours'];

//get the total hours fos this month (excluding events)
$getdata=$pdo->prepare("SELECT SUM(totalhours) as totalhours FROM tprtable WHERE mentorname<>'' AND totalhours<>'0' AND YEAR(meetingdate)='$year' AND MONTH(meetingdate)='$month' AND tprtype<>'ETPR'");
$getdata->execute(); $row=$getdata->fetch(PDO::FETCH_BOTH);
$totalhours=$row['totalhours'];

//get the number of mentors (including events)
$getdata=$pdo->prepare("SELECT COUNT(DISTINCT mentorname) as mentorname FROM tprtable WHERE mentorname<>'' AND totalhours<>'0' AND YEAR(meetingdate)='$year' AND MONTH(meetingdate)='$month'");
$getdata->execute(); $row=$getdata->fetch(PDO::FETCH_BOTH);
$mentorcount_events=$row['mentorname'];

//get the number of mentors (excluding events)
$getdata=$pdo->prepare("SELECT COUNT(DISTINCT mentorname) as mentorname FROM tprtable WHERE mentorname<>'' AND totalhours<>'0' AND YEAR(meetingdate)='$year' AND MONTH(meetingdate)='$month' AND tprtype<>'ETPR'");
$getdata->execute(); $row=$getdata->fetch(PDO::FETCH_BOTH);
$mentorcount=$row['mentorname'];

//get the number of teams (including events)
$getdata=$pdo->prepare("SELECT COUNT(DISTINCT teamname) as teamname FROM tprtable WHERE teamname<>'' AND totalhours<>'0' AND YEAR(meetingdate)='$year' AND MONTH(meetingdate)='$month'");
$getdata->execute(); $row=$getdata->fetch(PDO::FETCH_BOTH);
$teamcount_events=$row['teamname'];

//get the number of teams (excluding events)
$getdata=$pdo->prepare("SELECT COUNT(DISTINCT teamname) as teamname FROM tprtable WHERE teamname<>'' AND totalhours<>'0' AND YEAR(meetingdate)='$year' AND MONTH(meetingdate)='$month' AND tprtype<>'ETPR'");
$getdata->execute(); $row=$getdata->fetch(PDO::FETCH_BOTH);
$teamcount=$row['teamname'];

//get average hour figures
if($mentorcount_events==''||$mentorcount_events=='0'||$mentorcount_events==0){$averagementorhours_events='0';
}else{$averagementorhours_events=round(($totalhours_events/$mentorcount_events),0);}

if($mentorcount==''||$mentorcount=='0'||$mentorcount==0){$averagementorhours='0';
}else{$averagementorhours=round(($totalhours/$mentorcount),0);}

if($teamcount_events==''||$teamcount_events=='0'||$teamcount_events==0){$averageteamhours_events='0';
}else{$averageteamhours_events=round(($totalhours_events/$teamcount_events),0);}

if($teamcount==''||$teamcount=='0'||$teamcount==0){$averageteamhours='0';
}else{$averageteamhours=round(($totalhours/$teamcount),0);}

//get the total number of reports (including events)
$getdata=$pdo->prepare("SELECT COUNT(tprid) as tprs FROM tprtable WHERE teamname<>'' AND totalhours<>'0' AND YEAR(meetingdate)='$year' AND MONTH(meetingdate)='$month'");
$getdata->execute(); $row=$getdata->fetch(PDO::FETCH_BOTH);
$reportcount_events=$row['tprs'];

//get the total number of reports (excluding events)
$getdata=$pdo->prepare("SELECT COUNT(tprid) as tprs FROM tprtable WHERE teamname<>'' AND totalhours<>'0' AND YEAR(meetingdate)='$year' AND MONTH(meetingdate)='$month' AND tprtype<>'ETPR'");
$getdata->execute(); $row=$getdata->fetch(PDO::FETCH_BOTH);
$reportcount=$row['tprs'];

//get the average network score (including events)
$getdata=$pdo->prepare("SELECT AVG(averagescore) as averagescore FROM tprtable WHERE teamname<>'' AND totalhours<>'0' AND averagescore<>'0' AND YEAR(meetingdate)='$year' AND MONTH(meetingdate)='$month'");
$getdata->execute(); $row=$getdata->fetch(PDO::FETCH_BOTH);
$networkaveragescore_events=$row['averagescore'];

//get the average network score (excluding events)
$getdata=$pdo->prepare("SELECT AVG(averagescore) as averagescore FROM tprtable WHERE teamname<>'' AND totalhours<>'0' AND averagescore<>'0' AND YEAR(meetingdate)='$year' AND MONTH(meetingdate)='$month' AND tprtype<>'ETPR'");
$getdata->execute(); $row=$getdata->fetch(PDO::FETCH_BOTH);
$networkaveragescore=$row['averagescore'];

//check if month and year are already in the table
$getdata=$pdo->prepare("SELECT COUNT(year) as count FROM monthlydata WHERE year='$year' AND month='$month'");
$getdata->execute(); $row=$getdata->fetch(PDO::FETCH_BOTH);
$count=$row['count'];
if($count=='0'){
  //if the data does exist insert
  $pushdata=$pdo->prepare("INSERT INTO monthlydata 
  (year, month, totalhours_e, totalhours_ne, mentorcount_e, mentorcount_ne, teamcount_e, teamcount_ne, reportcount_e, reportcount_ne, avmentorhours_e, avmentorhours_ne, avteamhours_e, avteamhours_ne, avnetworkscore_e, avnetworkscore_ne)
  VALUES
  ('$year', '$month', '$totalhours_events', '$totalhours', '$mentorcount_events', '$mentorcount', '$teamcount_events', '$teamcount', '$reportcount_events', '$reportcount', '$averagementorhours_events', '$averagementorhours', '$averageteamhours_events', '$averageteamhours', '$networkaveragescore_events', '$networkaveragescore')");
}else{
  //otherwise update
  $pushdata=$pdo->prepare("UPDATE monthlydata
  SET totalhours_e='$totalhours_events', totalhours_ne='$totalhours', mentorcount_e='$mentorcount_events', mentorcount_ne='$mentorcount', teamcount_e='$teamcount_events', teamcount_ne='$teamcount', reportcount_e='$reportcount_events', 
  reportcount_ne='$reportcount', avmentorhours_e='$averagementorhours_events', avmentorhours_ne='$averagementorhours', avteamhours_e='$averageteamhours_events', avteamhours_ne='$averageteamhours', avnetworkscore_e='$networkaveragescore_events', avnetworkscore_ne='$networkaveragescore'
  WHERE (year='$year' AND month='$month')");
}
$pushdata->execute();

?>