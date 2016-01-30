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
$showteamlist="";
$getallteams = $pdo->prepare("SELECT teamid, teamname FROM teams ORDER BY teamname");
	$getallteams->execute();
while($row = $getallteams->fetch(PDO::FETCH_BOTH)){
    $showallteams .= "<option value='".$row['teamname']."'>".$row['teamname']."</option>";
	$showteamlist .= "<span class='radiowrapper'><input type='checkbox' id='team".$row['teamid']."' name='teams[]' value='".$row['teamid']."'><label for='team".$row['teamid']."'>".$row['teamname']."</label></span><br />";
}

// mentors teams
$showmentorteams="";
foreach ($mentorteamnames as $mtn){
	$showmentorteams .= "<option value='".$mtn."'>".$mtn."</option>";
}

// GET ALL TEAMS IN A LIST
$showmentorlist="";
$getmentornames=$pdo->prepare("SELECT mentorid, mentorname FROM mentors ORDER BY mentorname");
	$getmentornames->execute();
while($row=$getmentornames->fetch(PDO::FETCH_BOTH)){
	$showmentorlist .= "<span class='radiowrapper'><input type='checkbox' id='mentor".$row['mentorid']."' name='mentors[]' value='".$row['mentorid']."'><label for='mentor".$row['mentorid']."'>".$row['mentorname']."</label></span><br />";
}

// get list of all other mentors for each mentor's teams
$showallothermentors="";
foreach ($mentorteamnames as $mtns){
	$getnames=$pdo->prepare("SELECT mentorname FROM mentors WHERE teams LIKE '%$mtns%' AND mentorid<>'$mentorid' ORDER BY mentorname"); $getnames->execute();
	$OMarray=array(); 
	while($rowxyz=$getnames->fetch(PDO::FETCH_BOTH)){array_push($OMarray,$rowxyz['mentorname']);}
	$showallothermentors .= "<span class='hiddenothermentors' id='othermentorsfor".$mtns."' style='display:none; text-align:right;'>";
		foreach ($OMarray as $value){
			$showallothermentors .= "<span class='radiowrapper'><input type='checkbox' id='othermentor".$value."' name='othermentors[]' value='".$value."'><label for='othermentor".$value."'>".$value."</label></span>";
		}
	$showallothermentors .= "</span>";
}

?>