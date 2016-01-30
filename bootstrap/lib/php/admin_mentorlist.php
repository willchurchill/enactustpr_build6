<?php

	$adminmentorlist=""; $adminteamlist="";

	$getdata=$pdo->prepare("SELECT mentorid, mentorname, level, teams, lasttprdate FROM mentors 
	WHERE level>'1' AND level <> '6'
	ORDER BY mentorname");
		$getdata->execute();
		
	while($row1=$getdata->fetch(PDO::FETCH_BOTH)){
		
		// convert level number into text
		$levelname="";
		if($row1['level']==1){$levelname.="inactive";}
		if($row1['level']==2){$levelname.="inactive";}
		if($row1['level']==3){$levelname.="Mentor";}
		if($row1['level']==4){$levelname.="Unknown";}
		if($row1['level']==5){$levelname.="Board member";}
		if($row1['level']==6){$levelname.="Programme Staff";}
		if($row1['level']==7){$levelname.="Board member (mentoring)";}
		if($row1['level']==8){$levelname.="Mentor";}
		
		// determine mentors status
		$lasttprdate=$row1['lasttprdate'];
		$lasttprdate = new DateTime($lasttprdate);
		$datenow=new DateTime();
		if($lasttprdate=="0000-00-00"){
			$datediff="Unknown";
		}else{
			$difference=date_diff($lasttprdate,$datenow);
			$differenceFormat = '%a';
			$datediff=$difference->format($differenceFormat);
			$datediff=intval($datediff);
		}
		
		if($datediff<14){
			$mentorstatus="Green";
		}elseif($datediff>14 && $datediff<30){
			$mentorstatus="Orange";
		}elseif($datediff>30){
			$mentorstatus="Red";
		}else{
			$mentorstatus="";
		}
		
		if($row1['teams']==""){$mentorstatus="";}
		
		
		$adminmentorlist .= "<tr id='tprmouseover'>";
			$adminmentorlist .= "<td class='mentorname'>".$row1['mentorname']."</td>";
			$adminmentorlist .= "<td class='teams'>".$row1['teams']."</td>";
			$adminmentorlist .= "<td class='level'>".$levelname."</td>";
			$adminmentorlist .= "<td class='status'>".$mentorstatus."</td>";
		$adminmentorlist .= "</tr>";
	}

// TEAMS

	$getdata=$pdo->prepare("SELECT teamname, programmemanager, lasttprdate, aka FROM teams ORDER BY teamname");
		$getdata->execute();

	while($row2=$getdata->fetch(PDO::FETCH_BOTH)){
		
		// FIND 30 DAY AVERAGE SCORE FOR EACH TEAM
		$teamname=$row2['teamname'];
		$getscore=$pdo->prepare("SELECT 
			AVG(averagescore) as avscore FROM tprtable 
			WHERE teamname='$teamname' AND averagescore<>'0' AND (tprdate >= Date_Add(now(), INTERVAL -30 DAY))");
			$getscore->execute(); $row00=$getscore->fetch(PDO::FETCH_BOTH); 
		$averagescore=$row00['avscore']; $averagescore=round($averagescore,2);
		
		// DETERMINE TEAM MENTORS
		$mentors="";
		
		// DETERMINE TEAM STATUS
		$lasttprdate=$row2['lasttprdate'];
		$lasttprdate = new DateTime($lasttprdate);
		$datenow=new DateTime();
		if($lasttprdate=="0000-00-00"){
			$datediff="Unknown";
		}else{
			$difference=date_diff($lasttprdate,$datenow);
			$differenceFormat = '%a';
			$datediff=$difference->format($differenceFormat);
			$datediff=intval($datediff);
		}
		
		if($datediff<14){
			$teamstatus="Green";
		}elseif($datediff>14 && $datediff<30){
			$mentorstatus="Orange";
		}elseif($datediff>30){
			$teamstatus="Red";
		}else{
			$teamstatus="";
		}
		
		$adminteamlist .= "<tr id='tprmouseover'>";
			$adminteamlist .= "<td class='teamname'>".$row2['teamname']."</td>";
			$adminteamlist .= "<td class='aka'>".$row2['aka']."</td>";
			$adminteamlist .= "<td class='programmemanager'>".$row2['programmemanager']."</td>";
			$adminteamlist .= "<td class='mentors'>".$mentors."</td>";
			$adminteamlist .= "<td class='averagescore'>".$averagescore."</td>";
			$adminteamlist .= "<td class='status'>".$teamstatus."</td>";
		$adminteamlist .= "</tr>";
	}

// Programme Staff
	$adminpmlist="";
	$totalteams=array();
	$totalaverage=array();

	$getdata=$pdo->prepare("SELECT mentorname FROM mentors WHERE level='6' ORDER BY mentorname");
		$getdata->execute();

	while($row=$getdata->fetch(PDO::FETCH_BOTH)){
		$programmemanager=$row['mentorname'];
		$average_array=array();
		
		//get PMs teams
		$getdata2=$pdo->prepare("SELECT teamname FROM teams WHERE programmemanager='$programmemanager' ORDER BY teamname");
			$getdata2->execute();
		$teams=array();
		while($row2=$getdata2->fetch(PDO::FETCH_BOTH)){
			$teamname=$row2['teamname'];
			array_push($teams,$teamname);
			//get team's 30day average score
			$getdata3=$pdo->prepare("SELECT sum(averagescore) as sumtotalscore, count(averagescore) as totalscore FROM tprtable WHERE teamname='$teamname' AND meetingdate >= Date_Add(now(), INTERVAL -30 DAY) AND averagescore>'0'");
				$getdata3->execute(); $row3=$getdata3->fetch(PDO::FETCH_BOTH);
			if($row3['totalscore']=="0"){array_push($average_array,null);}else{array_push($average_array,($row3['sumtotalscore']/$row3['totalscore']));}
		}
		$teamscount=count($teams);
		
		$showteams="";
		foreach($teams as $value){$showteams.=$value.", ";}
		$showteams=substr($showteams,0,-2);
		
		$arraysum=array_sum($average_array); $arraycount=count(array_filter($average_array));
		$averagescore=round(($arraysum/$arraycount),2);
		//$averagescore=$arraysum;
		
		$adminpmlist .= "<tr id='tprmouseover'>";
			$adminpmlist .= "<td class='mentorname'>".$programmemanager."</td>";
			$adminpmlist .= "<td class='teams'>".$showteams."</td>";
			$adminpmlist .= "<td class='teamscount'>".$teamscount."</td>";
			$adminpmlist .= "<td class='averagescore'>".$averagescore."</td>";
		$adminpmlist .= "</tr>";
		
		array_push($totalteams,$teamscount); array_push($totalaverage,$averagescore);
		
		$showtotalteams=array_sum($totalteams);
		$showtotalaverage=(array_sum($totalaverage)/count($totalaverage));
		$showtotalaverage=round($showtotalaverage,2);
	}

// archived mentors
	$archivedmentors="";

	$getinfo=$pdo->prepare("SELECT mentorname, university, gradyear, mentorsince, mentoruntil FROM mentors WHERE level='1' ORDER BY mentorname");
		$getinfo->execute();

	while($row=$getinfo->fetch(PDO::FETCH_BOTH)){
		$mentorname=$row['mentorname']; $university=$row['university']; $gradyear=$row['gradyear']; $mentorsince=$row['mentorsince']; $mentoruntil=$row['mentoruntil'];
		
		if($university==""){$university="Unknown";}
		if($gradyear=="0000"){$gradyear="Unknown";}
		if($mentorsince=="0000"){$mentorsince="Unknown";}
		if($mentoruntil=="0000"){$mentoruntil="Unknown";}
		
		$archivedmentors .= "<tr id='tprmouseover'>";
			$archivedmentors .= "<td class='mentorname'>".$mentorname."</td>";
			$archivedmentors .= "<td class='graduatedfrom'>".$university." in ".$gradyear."</td>";
			$archivedmentors .= "<td class='yearsactive'>".$mentorsince." until ".$mentoruntil."</td>";
		$archivedmentors .= "</tr>";
	}

?>