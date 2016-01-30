<?php

$tprid=$_GET['tprid'];

$getdata=$pdo->prepare("SELECT * FROM tprtable WHERE tprid='$tprid'");
	$getdata->execute();

$row=$getdata->fetch(PDO::FETCH_BOTH);
	$teamname=$row['teamname'];
	$mentorname=$row['mentorname'];
	$meetingdate=$row['meetingdate'];
	$discussedtopics=$row['discussedtopics'];
	$meetingsummary=$row['meetingsummary'];
	$warningflag=$row['warningflag'];
	$highlight=$row['highlight'];
	$supportrequested=$row['supportrequired'];
	$meetingdescription=$row['meetingdescription'];
		$meetingdescription=nl2br($meetingdescription);
	$contactname=$row['contactname'];
	$contactposition=$row['contactposition'];
	$othercomments=$row['othercomments'];

	$averagescore=$row['averagescore'];
	$meetingscore=$row['meetingscore'];
	$targetscore=$row['targetscore'];
	$projectscore=$row['projectscore'];
	$engagementscore=$row['engagementscore'];

	$teamscores = "[".$averagescore.", ".$meetingscore.", ".$targetscore.", ".$projectscore.", ".$engagementscore."]";

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

?>