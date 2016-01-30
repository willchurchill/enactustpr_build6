<?php

// The follow crons should be set to run on the 28th of each month

include_once("cleantprtable.php");
include_once("correctdates.php");

include_once("emailzerohourmentors.php");

$subject="End of Month Cron completed";
include_once("emailconfirm.php");
?>
