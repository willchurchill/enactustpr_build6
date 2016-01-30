<?php
// check mentor login and retrieve teams
$mentorid=$_COOKIE["TPRuserid"];
$getmentorteams = $pdo->prepare("SELECT teams FROM mentors WHERE mentorid='$mentorid'");
    $getmentorteams->execute();
$mentorteams = $getmentorteams->fetch(PDO::FETCH_BOTH);
	$mentorteamnames=$mentorteams['teams'];
	$mentorteamnames=explode(', ', $mentorteamnames);

// all teams
$showallteams="";
$getallteams = $pdo->prepare("SELECT teamname FROM teams ORDER BY teamname");
	$getallteams->execute();
while($row = $getallteams->fetch(PDO::FETCH_BOTH)){
    $showallteams .= "<option value='".$row['teamname']."'>".$row['teamname']."</option>";
}

// mentors teams
$showmentorteams="";
foreach ($mentorteamnames as $mtn){
	$showmentorteams .= "<option value='".$mtn."'>".$mtn."</option>";
}

?>