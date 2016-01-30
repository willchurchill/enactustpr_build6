<?php

$teamid=$_GET['teamid'];

$getdata=$pdo->prepare("SELECT teamname, programmemanager, mentors, monthhours, yearhours FROM teams WHERE teamid='$teamid'");
	$getdata->execute();

$row=$getdata->fetch(PDO::FETCH_BOTH);
	$teamname=$row['teamname'];
	$programmemanager=$row['programmemanager'];
	$mentors=$row['mentors'];
	$monthhours=$row['monthhours'];
	$yearhours=$row['yearhours'];

	// GET AVERAGE SCORE
	$getdata2=$pdo->prepare("SELECT sum(averagescore) as sumavscore, count(averagescore) as countavscore FROM tprtable WHERE teamname='$teamname' AND meetingdate>'$nationals2015' AND averagescore>'0'");
		$getdata2->execute();
	$row2=$getdata2->fetch(PDO::FETCH_BOTH);
		$averagescore=($row2['sumavscore']/$row2['countavscore']);
		$averagescore=round($averagescore,2);
	// GET MEETING SCORE
	$getdata2=$pdo->prepare("SELECT sum(meetingscore) as summeetingscore, count(meetingscore) as countmeetingscore FROM tprtable WHERE teamname='$teamname' AND meetingdate>'$nationals2015' AND meetingscore>'0'");
		$getdata2->execute();
	$row2=$getdata2->fetch(PDO::FETCH_BOTH);
		$meetingscore=($row2['summeetingscore']/$row2['countmeetingscore']);
		$meetingscore=round($meetingscore,2);
	// GET TARGET SCORE
	$getdata2=$pdo->prepare("SELECT sum(targetscore) as sumtargetscore, count(targetscore) as counttargetscore FROM tprtable WHERE teamname='$teamname' AND meetingdate>'$nationals2015' AND targetscore>'0'");
		$getdata2->execute();
	$row2=$getdata2->fetch(PDO::FETCH_BOTH);
		$targetscore=($row2['sumtargetscore']/$row2['counttargetscore']);
		$targetscore=round($targetscore,2);
	// GET PROJECT SCORE
	$getdata2=$pdo->prepare("SELECT sum(projectscore) as sumprojectscore, count(projectscore) as countprojectscore FROM tprtable WHERE teamname='$teamname' AND meetingdate>'$nationals2015' AND projectscore>'0'");
		$getdata2->execute();
	$row2=$getdata2->fetch(PDO::FETCH_BOTH);
		$projectscore=($row2['sumprojectscore']/$row2['countprojectscore']);
		$projectscore=round($projectscore,2);
	// GET ENGAGEMENT SCORE
	$getdata2=$pdo->prepare("SELECT sum(engagementscore) as sumengagementscore, count(engagementscore) as countengagementscore FROM tprtable WHERE teamname='$teamname' AND meetingdate>'$nationals2015' AND engagementscore>'0'");
		$getdata2->execute();
	$row2=$getdata2->fetch(PDO::FETCH_BOTH);
		$engagementscore=($row2['sumengagementscore']/$row2['countengagementscore']);
		$engagementscore=round($engagementscore,2);

	$scores = "[".$averagescore.", ".$meetingscore.", ".$targetscore.", ".$projectscore.", ".$engagementscore."]";

// GET NETWORK SCORES - AVERAGE OVER 30 DAYS PREVIOUS TO TPR DATE

	// GET AVERAGE SCORE
	$getdata2=$pdo->prepare("SELECT sum(averagescore) as sumavscore, count(averagescore) as countavscore FROM tprtable WHERE meetingdate>'$nationals2015' AND averagescore>'0'");
		$getdata2->execute();
	$row2=$getdata2->fetch(PDO::FETCH_BOTH);
		$n_averagescore=($row2['sumavscore']/$row2['countavscore']);
		$n_averagescore=round($n_averagescore,2);
	// GET MEETING SCORE
	$getdata2=$pdo->prepare("SELECT sum(meetingscore) as summeetingscore, count(meetingscore) as countmeetingscore FROM tprtable WHERE meetingdate>'$nationals2015' AND meetingscore>'0'");
		$getdata2->execute();
	$row2=$getdata2->fetch(PDO::FETCH_BOTH);
		$n_meetingscore=($row2['summeetingscore']/$row2['countmeetingscore']);
		$n_meetingscore=round($n_meetingscore,2);
	// GET TARGET SCORE
	$getdata2=$pdo->prepare("SELECT sum(targetscore) as sumtargetscore, count(targetscore) as counttargetscore FROM tprtable WHERE meetingdate>'$nationals2015' AND targetscore>'0'");
		$getdata2->execute();
	$row2=$getdata2->fetch(PDO::FETCH_BOTH);
		$n_targetscore=($row2['sumtargetscore']/$row2['counttargetscore']);
		$n_targetscore=round($n_targetscore,2);
	// GET PROJECT SCORE
	$getdata2=$pdo->prepare("SELECT sum(projectscore) as sumprojectscore, count(projectscore) as countprojectscore FROM tprtable WHERE meetingdate>'$nationals2015' AND projectscore>'0'");
		$getdata2->execute();
	$row2=$getdata2->fetch(PDO::FETCH_BOTH);
		$n_projectscore=($row2['sumprojectscore']/$row2['countprojectscore']);
		$n_projectscore=round($n_projectscore,2);
	// GET ENGAGEMENT SCORE
	$getdata2=$pdo->prepare("SELECT sum(engagementscore) as sumengagementscore, count(engagementscore) as countengagementscore FROM tprtable WHERE meetingdate>'$nationals2015' AND engagementscore>'0'");
		$getdata2->execute();
	$row2=$getdata2->fetch(PDO::FETCH_BOTH);
		$n_engagementscore=($row2['sumengagementscore']/$row2['countengagementscore']);
		$n_engagementscore=round($n_engagementscore,2);

	$networkscores = "[".$n_averagescore.", ".$n_meetingscore.", ".$n_targetscore.", ".$n_projectscore.", ".$n_engagementscore."]";

//GET TPRS
$tprlist="";

$getdata=$pdo->prepare("SELECT tprid, tprdate, mentorname, meetingsummary, averagescore
		FROM tprtable WHERE teamname='$teamname' ORDER BY tprdate DESC");
	$getdata->execute();
while($row=$getdata->fetch(PDO::FETCH_BOTH)){
	$averagescore=$row['averagescore'];
		$averagescore=round($averagescore,2);
	if($averagescore=='0'){$averagescore="N/A";}
	
	$tprlist .= "<tr id='tprmouseover' onclick='doNav(\"viewreport.php?tprid=".$row['tprid']."\");'>";
		$tprlist .= "<td class='meetingdate'>".$row['tprdate']."</td>";
		$tprlist .= "<td><b>".$row['mentorname']."</b> ".$row['meetingsummary']."</td>";
		$tprlist .= "<td class='scorenumber'>".$averagescore."</td>";
	$tprlist .= "</tr>";
	}

?>