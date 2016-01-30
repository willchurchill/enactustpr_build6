<?php

// Teams flagged by mentors
$teamflag_mentors="";

$getinfo=$pdo->prepare("SELECT teamname, lasttprdate, lasttprmentor, lasttprid, flaggedon, flaggedby, flagnotes
	FROM teams WHERE flagged='YES'");
$getinfo->execute();
$rowcount=$getinfo->rowCount();
if($rowcount==0){$teamflag_mentors="<tr><td colspan='5'>There are currently no flags.<td></tr>";}else{

while($row1=$getinfo->fetch(PDO::FETCH_BOTH)){
	$teamname=$row1['teamname'];
	$tprid=$row1['lasttprid'];
	$getinfo2=$pdo->prepare("SELECT averagescore FROM tprtable WHERE tprid='$tprid' LIMIT 1"); $getinfo2->execute();
	$row2=$getinfo2->fetch(PDO::FETCH_BOTH);
	$getdata3=$pdo->prepare("SELECT mentorname FROM mentors WHERE CONCAT(teams, ',') LIKE '%$teamname%' ORDER BY mentorname");
	$getdata3->execute();
	$mentors=array();
	while($row3=$getdata3->fetch(PDO::FETCH_ASSOC)){
		array_push($mentors,$row3['mentorname']);
	}
	$mentors=implode(', ',$mentors);
	$teamflag_mentors .= "
		<tr>
			<td>".$teamname."</td>
			<td>".$row1['flaggedon']." by ".$row1['flaggedby']."</td>
			<td>Submitted ".$row1['lasttprdate']." by ".$row1['lasttprmentor'].". Score: ".$row2['averagescore']."</td>
			<td>".$mentors."</td>
			<td>".$row1['flagnotes']."</td>
		</tr>
	";
}}

// Teams flag automatically
$teamflag_auto="";

$getinfo=$pdo->prepare("SELECT teamname, lasttprdate, lasttprmentor, lasttprid	FROM teams WHERE lasttprdate < Date_Add(now(), INTERVAL -30 DAY)");
$getinfo->execute();
$rowcount=$getinfo->rowCount();
if($rowcount==0){$teamflag_auto="<tr><td colspan='5'>There are currently no flags.<td></tr>";}else{

while($row1=$getinfo->fetch(PDO::FETCH_BOTH)){
	$teamname=$row1['teamname'];
	$tprid=$row1['lasttprid'];
	$getinfo2=$pdo->prepare("SELECT averagescore FROM tprtable WHERE tprid='$tprid' LIMIT 1"); $getinfo2->execute();
	$row2=$getinfo2->fetch(PDO::FETCH_BOTH);
	$getdata3=$pdo->prepare("SELECT mentorname FROM mentors WHERE CONCAT(teams, ',') LIKE '%$teamname%' ORDER BY mentorname");
	$getdata3->execute();
	$mentors=array();
	while($row3=$getdata3->fetch(PDO::FETCH_BOTH)){
		array_push($mentors,$row3['mentorname']);
	}
	$mentors=implode(', ',$mentors);
	$teamflag_auto .= "
		<tr>
			<td>".$teamname."</td>
			<td>Submitted ".$row1['lasttprdate']." by ".$row1['lasttprmentor'].". Score: ".$row2['averagescore']."</td>
			<td>".$mentors."</td>
		</tr>
	";
}}

// Mentors flagged automatically - 1 month
$mentorflag_1month="";

$getinfo=$pdo->prepare("SELECT mentorname, teams, lasttprdate, lasttprteam, lasttprid FROM mentors WHERE lasttprdate < Date_Add(now(), INTERVAL -30 DAY)");
$getinfo->execute();
$rowcount=$getinfo->rowCount();
if($rowcount==0){$mentorflag_1month="<tr><td colspan='2'>No mentors in this catagory.<td></tr>";}else{

while($row1=$getinfo->fetch(PDO::FETCH_BOTH)){
	$tprid=$row1['lasttprid'];
	$getinfo2=$pdo->prepare("SELECT averagescore FROM tprtable WHERE tprid='$tprid' LIMIT 1"); $getinfo2->execute();
	$row2=$getinfo2->fetch(PDO::FETCH_BOTH);
	$mentorflag_1month .= "
		<tr>
			<td>".$row1['mentorname']."</td>
			<td>Submitted ".$row1['lasttprdate']." for ".$row1['lasttprteam'].". Score: ".$row2['averagescore']."</td>
		</tr>
	";
}}

// Mentors flagged automatically - 1 month
$mentorflag_14days="";

$getinfo=$pdo->prepare("SELECT mentorname, teams, lasttprdate, lasttprteam, lasttprid FROM mentors WHERE lasttprdate < Date_Add(now(), INTERVAL -14 DAY) AND lasttprdate > Date_Add(now(), INTERVAL -30 DAY)");
$getinfo->execute();
$rowcount=$getinfo->rowCount();
if($rowcount==0){$mentorflag_14days="<tr><td colspan='2'>No mentors in this catagory.<td></tr>";}else{

while($row1=$getinfo->fetch(PDO::FETCH_BOTH)){
	$tprid=$row1['lasttprid'];
	$getinfo2=$pdo->prepare("SELECT averagescore FROM tprtable WHERE tprid='$tprid' LIMIT 1"); $getinfo2->execute();
	$row2=$getinfo2->fetch(PDO::FETCH_BOTH);
	$mentorflag_14days .= "
		<tr>
			<td>".$row1['mentorname']."</td>
			<td>Submitted ".$row1['lasttprdate']." for ".$row1['lasttprteam'].". Score: ".$row2['averagescore']."</td>
		</tr>
	";
}}

?>