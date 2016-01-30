<?php

include_once("dbconn.php");

$nationals2015="2015-04-14";
$date_now=date("Y-m-d");

// select all the teams and put them into an array
// ordering by teamid means that the array key +1 will equal the teamid, meaning we only have to store one peice of info in the array

$getdata=$pdo->prepare("SELECT teamname FROM teams ORDER BY teamid");
$getdata->execute();

$teams=array();

while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  array_push($teams, $row['teamname']);
}

// get the reports from this enactus year pertaining to each team
foreach($teams as $key=>$value){
  //get month hours
  $getmonthhours=$pdo->prepare("SELECT sum(totalhours) as monthhours FROM tprtable WHERE teamname='$value' AND tprdate >= Date_Add(now(), INTERVAL -30 DAY)");
  $getmonthhours->execute();
  $row1=$getmonthhours->fetch(PDO::FETCH_BOTH);
  $monthhours=$row1['monthhours'];
  //get year hours
  $getyearhours=$pdo->prepare("SELECT sum(totalhours) as yearhours FROM tprtable WHERE teamname='$value' AND tprdate>'$nationals2015'");
  $getyearhours->execute();
  $row2=$getyearhours->fetch(PDO::FETCH_BOTH);
  $yearhours=$row2['yearhours'];
  //update the teams table with new hours, remember that the key+1 is the team id
  $teamid=($key+1);
  $pushdata=$pdo->prepare("UPDATE teams SET monthhours='$monthhours', yearhours='$yearhours' WHERE teamid='$teamid'");
  $pushdata->execute();
 }

?>