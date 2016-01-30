<?php

include_once("dbconn.php");

include_once("updatemonthlydata.php");
include_once("updateteamhours.php");
include_once("updateteamscores.php");

$subject="Daily Cron completed";
include_once("emailconfirm.php");

?>