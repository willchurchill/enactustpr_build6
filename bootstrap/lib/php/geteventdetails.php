<?php

include_once("dbconn.php");

$eventid=$_GET['eid'];

$getinfo=$pdo->prepare("SELECT eventname, eventdate, eventsummary, deliveryhours, eventteams, eventmentors, deliveryhours 
	FROM events WHERE eventid='$eventid' LIMIT 1");
$getinfo->execute();

$row=$getinfo->fetch(PDO::FETCH_BOTH);
	$eventname=$row['eventname']; $eventdate=$row['eventdate']; $eventsummary=$row['eventsummary'];
	$deliveryhours=$row['deliveryhours']; $eventteams=$row['eventteams']; $eventmentors=$row['eventmentors'];

?>