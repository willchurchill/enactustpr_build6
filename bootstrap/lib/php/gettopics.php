<?php
include_once("dbconn.php");

$topicchecklist="";

$getdata = $pdo->prepare("SELECT topicid, discussiontopic FROM discussiontopics ORDER BY discussiontopic");
    $getdata->execute();

while($row = $getdata->fetch(PDO::FETCH_BOTH)){
    $topicarray [] = $row;
	$topicchecklist .= "<span class='radiowrapper'><input type='checkbox' id='topic".$row['topicid']."' name='discussiontopics[]' value='".$row['discussiontopic']."'><label for='topic".$row['topicid']."'>".$row['discussiontopic']."</label></span><br />";
}

?>