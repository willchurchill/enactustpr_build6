<?php

include_once("../../lib/php/dbconn.php"); include_once("../../lib/php/keyfacts.php");

$topic1 = "Criterion";

$getdata=$pdo->prepare("
	SELECT MONTH(tprdate) as month, COUNT(tprid) as count FROM tprtable 
	WHERE discussedtopics LIKE '%$topic1%'
	AND tprdate > '$nationals2014'
	GROUP BY YEAR(tprdate), MONTH(tprdate)
	");
$getdata->execute();

while($row=$getdata->fetch(PDO::FETCH_ASSOC)){
	echo $row['count'];
}