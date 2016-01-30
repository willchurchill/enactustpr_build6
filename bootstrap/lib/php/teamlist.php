<?php

$mentorsteams="";
$otherteams="";

$mentorid=$_COOKIE["TPRuserid"];
$getmentorteams = $pdo->prepare("SELECT teams FROM mentors WHERE mentorid='$mentorid'");
    $getmentorteams->execute();
$mentorteams = $getmentorteams->fetch(PDO::FETCH_BOTH);
	$mentorteamnames=$mentorteams['teams'];
	$mentorteamnames=explode(', ', $mentorteamnames);

foreach ($mentorteamnames as $mtn){
	$getteamdata=$pdo->prepare("SELECT teamid, teamname, programmemanager, mentors, monthscore, yearhours FROM teams WHERE teamname='$mtn' ORDER BY teamname");
    $getteamdata->execute();
  $row1=$getteamdata->fetch(PDO::FETCH_BOTH);
  $mentorsteams.="<tr id='tprmouseover' onclick='doNav(\"viewteam.php?teamid=".$row1['teamid']."\");'><td>".$row1['teamname']."</td><td>".$row1['programmemanager']."</td><td>".$row1['mentors']."</td><td>".$row1['yearhours']."</td><td>".$row1['monthscore']."</td></tr>";
}

$getdata=$pdo->prepare("SELECT teamid, teamname, programmemanager, mentors FROM teams ORDER BY teamname");
  $getdata->execute();

while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $otherteams.="<tr id='tprmouseover'><td class='teamname'>".$row['teamname']."</td><td class='programmemanager'>".$row['programmemanager']."</td><td class='mentors'>".$row['mentors']."</td></tr>";
}

?>