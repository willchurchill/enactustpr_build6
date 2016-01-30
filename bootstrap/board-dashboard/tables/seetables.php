<?php

	include("../../lib/php/dbconn.php");

	$data=$pdo->prepare("SHOW TABLES FROM enactusukalumni");
		$data->execute();

	while($row=$data->fetch(PDO::FETCH_BOTH)){
		echo "table: ".$row[0]."<br />";
	}
?>
