<?php

	include("../lib/php/dbconn.php");
	include("../lib/php/keyfacts.php");

	$getdata=$pdo->prepare("
		
		SELECT tprtable.tprdate as date, tprtable.mentorname as mentorname, tprtable.teamname as teamname, tprtable.meetingsummary as summary, tprtable.averagescore as score, mentors.level as mentorlevel
		FROM tprtable 
		RIGHT OUTER JOIN mentors ON mentors.mentorid=tprtable.mentorid
		WHERE (tprdate >= Date_Add(now(), INTERVAL -30 DAY) AND mentors.level<>'6' AND tprtable.totalhours<>'0')
		ORDER BY date DESC

		");
	$getdata->execute();

	while($row=$getdata->fetch(PDO::FETCH_BOTH)){
		echo "<tr>";
			echo "<td>".$row['date']."</td>";
			echo "<td>".$row['mentorname']."</td>";
			echo "<td>".$row['teamname']."</td>";
			echo "<td>".$row['summary']."</td>";
			echo "<td>".$row['score']."</td>";
		echo "</tr>";
	}

?>