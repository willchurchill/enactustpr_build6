<?php
include_once("dbconn.php");

$teamname=$_GET['teamname'];
	$teamname=$teamname.",";

$getdata=$pdo->prepare("SELECT mentorname, mentorid FROM mentors WHERE CONCAT(teams, ',') LIKE '%$teamname%' ORDER BY mentorname");
	$getdata->execute();

while($row=$getdata->fetch(PDO::FETCH_ASSOC)){
	$mentors[]=$row;
}

echo json_encode($mentors);

?>