<?php

include_once("dbconn.php");

$getdata = $pdo->prepare("SELECT * FROM mentors WHERE mentorname <> '' AND level <> '6' AND level <> '1' ORDER BY mentorname");
    $getdata->execute();

while($row = $getdata->fetch(PDO::FETCH_BOTH)){
    $mentorarray [] = $row;
}

echo json_encode($mentorarray);

?>