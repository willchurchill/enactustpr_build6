<?php

/* CURRENT MONTH, LAST MONTH, CURRENT YEAR, LAST YEAR */
$month=date('m');
$year=date('Y');
if($month=="01"){
	$thismonth=$month;
	$lastmonth="12";
	$nextmonth=$thismonth+1;
	$thisyear=$year-1;
	$lastyear=$year-2;
}elseif($month=="12"){
	$thismonth=$month;
	$lastmonth=$month-1;
	$nextmonth="01";
	$thisyear=$year;
	$lastyear=$year-1;
}
else{
	$thismonth=$month;
	$lastmonth=$month-1;
	$nextmonth=$month+1;
	$thisyear=$year;
	$lastyear=$year-1;
}

?>