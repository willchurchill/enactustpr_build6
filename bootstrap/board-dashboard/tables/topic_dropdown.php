<?php

$getdata=$pdo->prepare("SELECT discussiontopic FROM discussiontopics ORDER BY discussiontopic");
	$getdata->execute();

$dropdownoutput="";

while($row=$getdata->fetch(PDO::FETCH_BOTH)){
	$dropdownoutput .= "<option value='".$row['discussiontopic']."'>".$row['discussiontopic']."</option>";
}

?>