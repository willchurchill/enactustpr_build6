<?php

$mentorid=$_COOKIE['TPRuserid'];
$mentorlevel=$_COOKIE['TPRuserlevel'];

$getmentorteams=$pdo->prepare("SELECT teams FROM mentors WHERE mentorid='$mentorid'");
	$getmentorteams->execute();

$row0=$getmentorteams->fetch(PDO::FETCH_BOTH);
	$teams=$row0['teams'];

if($mentorlevel<"5"){
	$getdata=$pdo->prepare("
		
		SELECT tprid, tprdate, mentorname, teamname, meetingsummary, averagescore
		FROM tprtable 
		WHERE mentorname<>'' AND (teamname LIKE '%$teams%' OR '$teams' LIKE CONCAT('%', teamname, '%'))
		ORDER BY tprdate DESC
		LIMIT 5

		");
}else{
	$getdata=$pdo->prepare("
		
		SELECT tprid, tprdate, mentorname, teamname, meetingsummary, averagescore
		FROM tprtable 
		WHERE mentorname<>''
		ORDER BY tprdate DESC
		LIMIT 5

		");
}
	
	
	$getdata->execute();

	while($row=$getdata->fetch(PDO::FETCH_BOTH)){
		$averagescore=$row['averagescore'];
			$averagescore=round($averagescore,2);
		if($averagescore=='0'){$averagescore="N/A";}
		
		echo "<tr id='tprmouseover' onclick='doNav(\"viewreport.php?tprid=".$row['tprid']."\");'>";
			echo "<td class='meetingdate'>".$row['tprdate']."</td>";
			echo "<td>".$row['teamname']."</td>";
			echo "<td><b>".$row['mentorname']."</b> ".$row['meetingsummary']."</td>";
			echo "<td class='scorenumber'>".$averagescore."</td>";
		echo "</tr>";
	}

?>