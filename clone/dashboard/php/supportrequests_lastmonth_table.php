<?php

$getdata=$pdo->prepare("
		SELECT tprtable.teamname as teamname, tprtable.mentorname as mentorname, tprtable.supportrequired as supportrequired, tprtable.meetingdate as date 
		FROM tprtable 
		INNER JOIN mentors ON mentors.mentorid=tprtable.mentorid 
		WHERE YEAR(tprtable.meetingdate)='$thisyear' AND MONTH(tprtable.meetingdate)='$lastmonth' AND mentors.level<>'6'
			AND tprtable.supportrequired<>'' AND tprtable.supportrequired<>'None' AND tprtable.supportrequired<>' None'
		ORDER BY date DESC
		");
	$getdata->execute();

if($format=="web"){
	
	while($row=$getdata->fetch(PDO::FETCH_BOTH)){
		echo "<tr>";
			echo "<td>".$row['teamname']."</td>";
			echo "<td>".$row['mentorname']."</td>";
			echo "<td>".$row['supportrequired']."</td>";
			echo "<td>".$row['date']."</td>";
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