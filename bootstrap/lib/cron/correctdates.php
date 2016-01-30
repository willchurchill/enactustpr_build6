<?php

include_once("dbconn.php");

$getdata=$pdo->prepare("SELECT tprid, tprdate, meetingdate FROM tprtable WHERE meetingdate='0000-00-00'");
$getdata->execute();

while($row=$getdata->fetch(PDO::FETCH_BOTH)){
  $newdate=$row['tprdate']; $tprid=$row['tprid'];
  $pushdata->prepare("UPDATE tprtable SET meetingdate='$newdate' WHERE tprid='$tprid'");
  $pushdata->execute();
}

?>