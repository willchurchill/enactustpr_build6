<?php

include_once("dbconn.php");

$boardmember=$_COOKIE['TPRusername'];
$date=$_POST['date'];
$hours=$_POST['hours'];
$summary=$_POST['summary'];
$other=$_POST['other'];

//make sure data are safe for db entry
$summary=addslashes($summary);
$other=addslashes($other);

$insertdata=$pdo->prepare("INSERT INTO boardreports
	(boardmember, date, hours, summary, other)
	VALUES
	('$boardmember','$date','$hours','$summary','$other')");
$insertdata->execute();

?>

<html>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	Submitting report...
	<script>alert("MT report has been submitted.");window.location='../../board-dashboard/index.php';</script>
</html>