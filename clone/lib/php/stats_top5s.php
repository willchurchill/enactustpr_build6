<?php

$activementorsthismonth="";
$activementorsthismonth_events="";
$activeteamsthismonth="";
$awardingmentorsthismonth="";
$scoringteamsthismonth="";

//get most active mentors this month (incl. events)
$getdata=$pdo->prepare("SELECT SUM(totalhours) as mhtm, mentorname FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND mentorname<>'' GROUP BY mentorname ORDER BY mhtm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $activementorsthismonth_events.= "<tr><td>".$row['mentorname']." who has given ".$row['mhtm']." hours</td></tr>";
}
//get most active mentors this month (excl. events)
$getdata=$pdo->prepare("SELECT SUM(totalhours) as mhtm, mentorname FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND mentorname<>'' AND tprtype<>'ETPR' GROUP BY mentorname ORDER BY mhtm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $activementorsthismonth.= "<tr><td>".$row['mentorname']." who has given ".$row['mhtm']." hours</td></tr>";
}
//get most engaged teams this month
$getdata=$pdo->prepare("SELECT SUM(totalhours) as thtm, teamname FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND teamname<>'' GROUP BY teamname ORDER BY thtm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $activeteamsthismonth.= "<tr><td>".$row['teamname']." who received ".$row['thtm']." hours</td></tr>";
}
//get highest awarding mentors this month
$getdata=$pdo->prepare("SELECT AVG(averagescore) as astm, mentorname FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND mentorname<>'' AND averagescore<>'0' GROUP BY mentorname ORDER BY astm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $score=round($row['astm'],2);
  $awardingmentorsthismonth.= "<tr><td>".$row['mentorname']." who gave ".$score." (average)</td></tr>";
}
//get highest scoring teams this month
$getdata=$pdo->prepare("SELECT AVG(averagescore) as astm, teamname FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$thismonth' AND teamname<>'' AND averagescore<>'0' GROUP BY teamname ORDER BY astm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $score=round($row['astm'],2);
  $scoringteamsthismonth.= "<tr><td>".$row['teamname']." who scored ".$score." (average)</td></tr>";
}


//
//Last month
//
$activementorslastmonth="";
$activementorslastmonth_events="";
$activeteamslastmonth="";
$awardingmentorslastmonth="";
$scoringteamslastmonth="";

//get most active mentors this month (incl. events)
$getdata=$pdo->prepare("SELECT SUM(totalhours) as mhtm, mentorname FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND mentorname<>'' GROUP BY mentorname ORDER BY mhtm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $activementorslastmonth_events.= "<tr><td>".$row['mentorname']." who has given ".$row['mhtm']." hours</td></tr>";
}
//get most active mentors this month (excl. events)
$getdata=$pdo->prepare("SELECT SUM(totalhours) as mhtm, mentorname FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND mentorname<>'' AND tprtype<>'ETPR' GROUP BY mentorname ORDER BY mhtm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $activementorslastmonth.= "<tr><td>".$row['mentorname']." who has given ".$row['mhtm']." hours</td></tr>";
}
//get most engaged teams this month
$getdata=$pdo->prepare("SELECT SUM(totalhours) as thtm, teamname FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND teamname<>'' GROUP BY teamname ORDER BY thtm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $activeteamslastmonth.= "<tr><td>".$row['teamname']." who received ".$row['thtm']." hours</td></tr>";
}
//get highest awarding mentors this month
$getdata=$pdo->prepare("SELECT AVG(averagescore) as astm, mentorname FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND mentorname<>'' AND averagescore<>'0' GROUP BY mentorname ORDER BY astm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $score=round($row['astm'],2);
  $awardingmentorslastmonth.= "<tr><td>".$row['mentorname']." who gave ".$score." (average)</td></tr>";
}
//get highest scoring teams this month
$getdata=$pdo->prepare("SELECT AVG(averagescore) as astm, teamname FROM tprtable WHERE YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND teamname<>'' AND averagescore<>'0' GROUP BY teamname ORDER BY astm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $score=round($row['astm'],2);
  $scoringteamslastmonth.= "<tr><td>".$row['teamname']." who scored ".$score." (average)</td></tr>";
}


//
//This year
//
$activementorsthisyear="";
$activementorsthisyear_events="";
$activeteamsthisyear="";
$awardingmentorsthisyear="";
$scoringteamsthisyear="";

//get most active mentors this month (incl. events)
$getdata=$pdo->prepare("SELECT SUM(totalhours) as mhtm, mentorname FROM tprtable WHERE meetingdate>'$nationals2015' AND mentorname<>'' GROUP BY mentorname ORDER BY mhtm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $activementorsthisyear_events.= "<tr><td>".$row['mentorname']." who has given ".$row['mhtm']." hours</td></tr>";
}
//get most active mentors this month (excl. events)
$getdata=$pdo->prepare("SELECT SUM(totalhours) as mhtm, mentorname FROM tprtable WHERE meetingdate>'$nationals2015' AND mentorname<>'' AND tprtype<>'ETPR' GROUP BY mentorname ORDER BY mhtm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $activementorsthisyear.= "<tr><td>".$row['mentorname']." who has given ".$row['mhtm']." hours</td></tr>";
}
//get most engaged teams this month
$getdata=$pdo->prepare("SELECT SUM(totalhours) as thtm, teamname FROM tprtable WHERE meetingdate>'$nationals2015' AND teamname<>'' GROUP BY teamname ORDER BY thtm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $activeteamsthisyear.= "<tr><td>".$row['teamname']." who received ".$row['thtm']." hours</td></tr>";
}
//get highest awarding mentors this month
$getdata=$pdo->prepare("SELECT AVG(averagescore) as astm, mentorname FROM tprtable WHERE meetingdate>'$nationals2015' AND mentorname<>'' AND averagescore<>'0' GROUP BY mentorname ORDER BY astm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $score=round($row['astm'],2);
  $awardingmentorsthisyear.= "<tr><td>".$row['mentorname']." who gave ".$score." (average)</td></tr>";
}
//get highest scoring teams this month
$getdata=$pdo->prepare("SELECT AVG(averagescore) as astm, teamname FROM tprtable WHERE meetingdate>'$nationals2015' AND teamname<>'' AND averagescore<>'0' GROUP BY teamname ORDER BY astm DESC LIMIT 5");
  $getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $score=round($row['astm'],2);
  $scoringteamsthisyear.= "<tr><td>".$row['teamname']." who scored ".$score." (average)</td></tr>";
}

?>