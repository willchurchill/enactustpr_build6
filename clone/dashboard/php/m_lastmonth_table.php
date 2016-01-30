<?php

$gettprswithhours=$pdo->prepare("
		SELECT mentors.mentorname as mentorname, SUM(tprtable.totalhours) as totalhours, SUM(tprtable.ftfhours) as ftfhours, SUM(tprtable.phonehours) as phonehours, SUM(tprtable.emailhours) as emailhours, SUM(tprtable.otherhours) as otherhours
		FROM mentors 
		LEFT OUTER JOIN tprtable ON mentors.mentorid=tprtable.mentorid AND mentors.mentorname=tprtable.mentorname
		WHERE (YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND mentors.level<>'6' AND totalhours<>'0')
		GROUP BY mentors.mentorname
		ORDER BY totalhours DESC
		");
	$gettprswithhours->execute();

$gettprswithouthours=$pdo->prepare("
		SELECT mentors.mentorname as mentorname, SUM(tprtable.totalhours) as totalhours
		FROM mentors 
		LEFT OUTER JOIN tprtable ON mentors.mentorid=tprtable.mentorid AND mentors.mentorname=tprtable.mentorname
		WHERE (YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND mentors.level<>'6' AND totalhours='0')
		GROUP BY mentors.mentorname
		ORDER BY totalhours DESC
		");
	$gettprswithouthours->execute();

$getmentorswithouttprs=$pdo->prepare("
	SELECT mentorname FROM mentors 
	WHERE level<>'6' AND level<>'1' AND mentorname NOT IN 
		(SELECT mentorname FROM tprtable WHERE (YEAR(meetingdate)='$thisyear' AND MONTH(meetingdate)='$lastmonth' AND totalhours>'0'))
	ORDER BY mentorname
	");
	$getmentorswithouttprs->execute();

$rowcount=0;

if($format=="web"){
	
	while($row=$gettprswithhours->fetch(PDO::FETCH_BOTH)){
		echo "<tr>";
			echo "<td>".$row['mentorname']."</td>";
			echo "<td>".$row['totalhours']."</td>";
			echo "<td>".$row['ftfhours']."</td>";
			echo "<td>".$row['phonehours']."</td>";
			echo "<td>".$row['emailhours']."</td>";
			echo "<td>".$row['otherhours']."</td>";
		echo "</tr>";
	}
/*
	while($row=$gettprswithouthours->fetch(PDO::FETCH_BOTH)){
		echo "<tr>";
			echo "<td>".$row['mentorname']."</td>";
			echo "<td>0</td>";
			echo "<td>0</td>";
			echo "<td>0</td>";
			echo "<td>0</td>";
			echo "<td>0</td>";
		echo "</tr>";
	}
*/
	
	while($row=$getmentorswithouttprs->fetch(PDO::FETCH_BOTH)){
		echo "<tr>";
			echo "<td>".$row['mentorname']."</td>";
			echo "<td>0</td>";
			echo "<td>--</td>";
			echo "<td>--</td>";
			echo "<td>--</td>";
			echo "<td>--</td>";
		echo "</tr>";
	}
	
}elseif($format=="print"){
	
	echo "<table class='masthead'><tr>";
	echo "<td class='logo'><img src='../../lib/images/logo.png' /></td><td class='title'>Mentors' hours</td>";
	echo "</tr></table>";
	
	echo "<table class='bigtable'><tr><td class='tablepadding'></td>";
	
	$c = 0; // Our counter
	$n = 20; // Each Nth iteration would be a new table row
	
	echo "<td><table class='hourstable'><thead><th>Mentor</th><th>Total hours</th><th>F2F hours</th></thead><tbody>";

	while ($row=$gettprswithhours->fetch(PDO::FETCH_BOTH)){
		echo "<tr>";
			echo "<td nowrap>".$row['mentorname']."</td>";
			echo "<td>".$row['totalhours']."</td>";
			echo "<td>".$row['ftfhours']."</td>";
		echo "</tr>";
		$c++;
		if($c % $n == 0 && $c != 0){ // If $c is divisible by $n...
			// New table row
			echo "</tbody></table></td>";
			echo "<td><table class='hourstable'><thead><th>Mentor</th><th>Total hours</th><th>F2F hours</th></thead><tbody></td>";
			$c = 0;
		}
	}
	
	echo "</td></table>";
	
	$c = 0;
	$n = 18;
	
	echo "<td><table class='hourstable'><thead><th>0 hours</th></thead><tbody>";

	while ($row=$getmentorswithouttprs->fetch(PDO::FETCH_BOTH)){
		echo "<tr>";
			echo "<td nowrap>".$row['mentorname']."</td>";
		echo "</tr>";
		$c++;
		if($c % $n == 0 && $c != 0){ // If $c is divisible by $n...
			// New table row
			echo "</tbody></table></td>";
			echo "<td><table class='hourstable'><thead><th>0 hours</th></thead><tbody></td>";
			$c = 0;
		}
	}
	
	echo "</tr></table>";
}
?>