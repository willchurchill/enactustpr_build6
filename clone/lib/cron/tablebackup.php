<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$db_host="localhost"; // Host name 
$db_un="enactusukTPRBACK"; // Mysql username 
$db_pass="Sife4life$"; // Mysql password 

$pdo = new PDO("mysql:host=$db_host;charset=utf8",$db_un,$db_pass);

$date=date('Ymd');

// TPR TABLE
$newdb='enactusukalumni_tprbackup.tprtable_'.$date;
$olddb='enactusukalumni_tpr.tprtable';

$getdata=$pdo->prepare("CREATE TABLE $newdb LIKE $olddb;");
$getdata->execute();
$getdata=$pdo->prepare("INSERT $newdb SELECT * FROM $olddb;");
$getdata->execute();

// BOARD REPORTS TABLE
$newdb='enactusukalumni_tprbackup.boardreports_'.$date;
$olddb='enactusukalumni_tpr.boardreports';

$getdata=$pdo->prepare("CREATE TABLE $newdb LIKE $olddb;");
$getdata->execute();
$getdata=$pdo->prepare("INSERT $newdb SELECT * FROM $olddb;");
$getdata->execute();

// MENTORS TABLE
$newdb='enactusukalumni_tprbackup.mentors_'.$date;
$olddb='enactusukalumni_tpr.mentors';

$getdata=$pdo->prepare("CREATE TABLE $newdb LIKE $olddb;");
$getdata->execute();
$getdata=$pdo->prepare("INSERT $newdb SELECT * FROM $olddb;");
$getdata->execute();

// MONTHLY DATA TABLE
$newdb='enactusukalumni_tprbackup.monthlydata_'.$date;
$olddb='enactusukalumni_tpr.monthlydata';

$getdata=$pdo->prepare("CREATE TABLE $newdb LIKE $olddb;");
$getdata->execute();
$getdata=$pdo->prepare("INSERT $newdb SELECT * FROM $olddb;");
$getdata->execute();


// TEAMS TABLE
$newdb='enactusukalumni_tprbackup.teams_'.$date;
$olddb='enactusukalumni_tpr.teams';

$getdata=$pdo->prepare("CREATE TABLE $newdb LIKE $olddb;");
$getdata->execute();
$getdata=$pdo->prepare("INSERT $newdb SELECT * FROM $olddb;");
$getdata->execute();

?>