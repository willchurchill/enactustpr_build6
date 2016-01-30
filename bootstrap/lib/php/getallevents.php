<?php

include_once("dbconn.php");

$getinfo=$pdo->prepare("SELECT eventid, eventname, eventdate, eventsummary, eventteams, eventmentors, deliveryhours, totalmentors, 
	totalteams, respondedmentors, totalpreptime, averagepreptime FROM events ORDER BY eventdate");
$getinfo->execute();

while($row=$getinfo->fetch(PDO::FETCH_BOTH)){
	
	$respondedmentors=intval($row['respondedmentors']); $totalmentors=intval($row['totalmentors']);
	$respondedpercentage=round((($respondedmentors/$totalmentors)*100),0)."%";
	
	echo "<tr id='tprmouseover' onclick='doNav(\"editevent.php?eid=".$row['eventid']."\");'>";
	echo "<td>".$row['eventname']."</td><td>".$row['eventdate']."</td><td>".$row['totalteams']."</td><td>".$totalmentors."</td>";
	echo "<td>".$row['deliveryhours']."</td><td>".$respondedmentors." (".$respondedpercentage.")</td><td>".$row['averagepreptime']."</td>";
	echo "</tr>";
	
}

?>