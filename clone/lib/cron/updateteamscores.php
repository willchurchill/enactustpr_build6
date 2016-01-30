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
  //get month score
  $getmonthscore=$pdo->prepare("SELECT count(tprid) as monthcount, sum(averagescore) as monthavscore FROM tprtable WHERE teamname='$value' AND averagescore<>'0' AND tprdate >= Date_Add(now(), INTERVAL -30 DAY)");
  $getmonthscore->execute();
  $row1=$getmonthscore->fetch(PDO::FETCH_BOTH);
  //get year score
  $getyearscore=$pdo->prepare("SELECT count(tprid) as yearcount, sum(averagescore) as yearavscore FROM tprtable WHERE teamname='$value' AND averagescore<>'0' AND tprdate>'$nationals2015'");
  $getyearscore->execute();
  $row2=$getyearscore->fetch(PDO::FETCH_BOTH);
  //get 'overall averages', making sure there are no DBZs
  if($row1['monthcount']==0||$row1['monthavscore']==0){$monthscore='0';}else{$monthscore=($row1['monthavscore']/$row1['monthcount']);}
  if($row2['yearcount']==0||$row2['yearavscore']==0){$yearscore='0';}else{$yearscore=($row2['yearavscore']/$row2['yearcount']);}
  //update the teams table with new score, remember that the key+1 is the team id
  $teamid=($key+1);
  $pushdata=$pdo->prepare("UPDATE teams SET monthscore='$monthscore', yearscore='$yearscore' WHERE teamid='$teamid'");
  $pushdata->execute();
 }

?>