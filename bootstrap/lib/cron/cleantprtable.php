<?php

include_once("dbconn.php");

$getdata=$pdo->prepare("SELECT tprid FROM tprtable WHERE mentorname='' AND mentoremail='' AND mentorid='' AND teamname=''");
$getdata->execute();

while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $tprid=$row['tprid'];
  $pushdata=$pdo->prepare("DELETE FROM tprtable WHERE tprid='$tprid'");
  $pushdata->execute();
}

?>