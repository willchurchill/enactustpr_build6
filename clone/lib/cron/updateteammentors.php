<?php

include_once("dbconn.php");

// select all the teams and put them into an array
// ordering by teamid means that the array key +1 will equal the teamid, meaning we only have to store one peice of info in the array

$getdata=$pdo->prepare("SELECT teamname FROM teams ORDER BY teamid");
$getdata->execute();

$teams=array();

while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  array_push($teams, $row['teamname']);
}

// take each of the team names and list the mentors with that team in their profile
foreach($teams as $key=>$value){
  $mentors="";
  $getdata=$pdo->prepare("SELECT mentorname FROM mentors WHERE teams LIKE '%$value%' AND level>'1' ORDER BY mentorname");
  $getdata->execute();
  while($row=$getdata->fetch(PDO::FETCH_BOTH)){
    //create a new string with the mentors
    $mentors.=$row['mentorname'].", ";
  }
  $mentors=substr($mentors, 0, -2);
  //update the teams table with the new string, remember that the key+1 is the team id
  $teamid=($key+1);
  $pushdata=$pdo->prepare("UPDATE teams SET mentors='$mentors' WHERE teamid='$teamid'");
  $pushdata->execute();
}

?>