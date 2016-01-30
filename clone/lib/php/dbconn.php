<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$db_host="localhost"; // Host name 
$db_un="enactusukTPRuser"; // Mysql username 
$db_pass="enactusukalumni"; // Mysql password 
$db_name="enactusukalumni_tpr_clone"; // Database name 

$pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8",$db_un,$db_pass);

// connect to database

?>