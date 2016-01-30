<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$db_host="localhost"; // Host name 
$db_un="enactusukTPRBACK"; // Mysql username 
$db_pass="Sife4life$"; // Mysql password 
$db_name="enactusukalumni_tprbackup"; // Database name 

$pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8",$db_un,$db_pass);

// connect to database

include_once("keyfacts.php");

$prevmonth=$lastmonth-1;

$tprtables="tprtable_".$thisyear.$lastmonth."2";

echo $tprtables;

$pushdata=$pdo->prepare("
  SELECT CONCAT( 'DROP TABLE ', GROUP_CONCAT(TABLE_NAME) , ';' ) AS statement 
  FROM information_schema.TABLES
  WHERE table_schema = 'database_name' AND TABLE_NAME LIKE '$tprtables%'
  ");
$pushdata->execute();

?>