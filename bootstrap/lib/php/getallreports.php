<?php

$mentorid=$_COOKIE['TPRuserid'];
$mentorlevel=$_COOKIE['TPRuserlevel'];

$getmentorteams=$pdo->prepare("SELECT teams FROM mentors WHERE mentorid='$mentorid'");
	$getmentorteams->execute();

$row0=$getmentorteams->fetch(PDO::FETCH_BOTH);
	$teams=$row0['teams'];

if($mentorlevel<"5"){
	$getdata=$pdo->prepare("
		
		SELECT tprid, tprdate, mentorname, teamname, totalhours, meetingsummary, averagescore, discussedtopics, meetingdescription
		FROM tprtable 
		WHERE mentorname<>''
			AND (teamname LIKE '%$teams%' OR '$teams' LIKE CONCAT('%', teamname, '%'))
			AND (tprdate>'$nationals2015' OR meetingdate>'$nationals2015') AND tprtype<>'ETPR'
		ORDER BY tprdate DESC

		");
}else{
	$getdata=$pdo->prepare("
		
		SELECT tprid, tprdate, mentorname, teamname, totalhours, meetingsummary, averagescore, discussedtopics, meetingdescription
		FROM tprtable 
		WHERE mentorname<>'' AND (tprdate>'$nationals2015' OR meetingdate>'$nationals2015') AND tprtype<>'ETPR'
		ORDER BY tprdate DESC

		");
}
	
	$getdata->execute();

	while($row=$getdata->fetch(PDO::FETCH_BOTH)){
		$averagescore=$row['averagescore'];
			//$averagescore=round($averagescore,2);
		
		echo "<tr id='tprmouseover' onclick='doNav(\"viewreport.php?tprid=".$row['tprid']."\");'>";
			echo "<td class='meetingdate'>".$row['tprdate']."</td>";
			echo "<td class='teamname'>".$row['teamname']."</td>";
			echo "<td class='meetingsummary'><b>".$row['mentorname']."</b> ".$row['meetingsummary']."</td>";
			echo "<td>".$row['totalhours']."</td>";
			echo "<td>".$averagescore."</td>";
			echo "<td class='discussedtopics' style='display:none;'>".$row['discussedtopics']."</td>";
			echo "<td class='meetingdescription' style='display:none;'>".$row['meetingdescription']."</td>";
		echo "</tr>";
	}

?>