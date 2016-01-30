<?php

include_once("dbconn.php");

$mentorid=$_COOKIE['TPRuserid'];

$getinfo=$pdo->prepare("SELECT mentorname, mentoremail, otheremails, mentornumber, jobtitle, company, sponsor, university, gradyear, subject, timestudent, mentorsince, currentcity, generalskills, generaltraining, projectskills, projecttraining, competitionskills, competitiontraining, professionaltraining, beneficiarygroups, projectdescription FROM mentors WHERE mentorid='$mentorid' LIMIT 1");
	$getinfo->execute(); $row=$getinfo->fetch(PDO::FETCH_BOTH);

// contact details
$mentorname=$row['mentorname']; $mentoremail=$row['mentoremail']; $otheremails=$row['otheremails']; $mentornumber=$row['mentornumber']; $currentcity=$row['currentcity']; $mentorsince=$row['mentorsince'];
// job details
$jobtitle=$row['jobtitle']; $company=$row['company']; $sponsor=$row['sponsor'];
// university details
$university=$row['university']; $gradyear=$row['gradyear']; $subject=$row['subject'];
// skills
$generalskills=$row['generalskills']; $generaltraining=$row['generaltraining'];
$projectskills=$row['projectskills']; $projecttraining=$row['projecttraining'];
$competitionskills=$row['competitionskills']; $competitiontraining=$row['competitiontraining'];
$professionaltraining=$row['professionaltraining'];
$beneficiarygroups=$row['beneficiarygroups'];
$projectdescription=$row['projectdescription'];

$sponsorcheckY=""; $sponsorcheckN="";
if($sponsor=="Yes"){$sponsorcheckY="checked";}elseif($sponsor=="No"){$sponsorcheckN="checked";}
$enactussponsor="<td colspan='1'><span class='radiowrapper'><input type='radio' name='enactussponsor' value='Yes' id='enactussponsorYes' ".$sponsorcheckY."><label for='enactussponsorYes'>Yes</label></span></td>";
$enactussponsor.="<td colspan='1'><span class='radiowrapper'><input type='radio' name='enactussponsor' value='No' id='enactussponsorNo' ".$sponsorcheckN."><label for='enactussponsorNo'>No</label></span></td>";

//function for displaying the options

function showOptions($skill){
	
	global $generalskills; global $projectskills; global $competitionskills;
	
	$allskills=" ".$generalskills." ".$projectskills." ".$competitionskills; //add space to get around 0 being first position
	
	$checked1=""; $checked2=""; $checked3=""; $checked4=""; $checked5=""; $checked6="";
	//Team Leadership
	
	//first find the length of the function string
	$skilllength=strlen($skill);
	//then find the first instance of the function string, cycling through until its found
	$skillpos=strpos($allskills,$skill);
	//now find the number by taking the position and adding the length
	$substrstart=(intval($skillpos)+intval($skilllength)+2);
	$value=substr($allskills,$substrstart,1);
	
	if($value=="1"){$checked1="checked";}elseif($value=="2"){$checked2="checked";}elseif($value=="3"){$checked3="checked";}
	elseif($value=="4"){$checked4="checked";}elseif($value=="5"){$checked5="checked";}elseif($value=="6"){$checked6="checked";}
	
	$skillstrip = str_replace(' ','-',$skill); $skillstrip=str_replace('/','',$skillstrip); 
	$skillstrip=str_replace('&','',$skillstrip); preg_replace('/[^A-Za-z0-9\-]/', '', $skillstrip);
	
	echo "<td colspan='1' style='text-align:center;'><span class='radiowrapper'><input type='radio' name='".$skillstrip."' value='".$skill.": 1' id='option_".$skill."_1' $checked1><label for='option_".$skill."_1'>None</label></span></td>";
	echo "<td colspan='1' style='text-align:center;'><span class='radiowrapper'><input type='radio' name='".$skillstrip."' value='".$skill.": 2' id='option_".$skill."_2' $checked2><label for='option_".$skill."_2'>Basic</label></span></td>";
	echo "<td colspan='1' style='text-align:center;'><span class='radiowrapper'><input type='radio' name='".$skillstrip."' value='".$skill.": 3' id='option_".$skill."_3' $checked3><label for='option_".$skill."_3'>Good</label></span></td>";
	echo "<td colspan='1' style='text-align:center;'><span class='radiowrapper'><input type='radio' name='".$skillstrip."' value='".$skill.": 4' id='option_".$skill."_4' $checked4><label for='option_".$skill."_4'>In-depth</label></span></td>";
	echo "<td colspan='1' style='text-align:center; background-color:#f5f5f5;'><span class='radiowrapper'><input type='radio' name='".$skillstrip."' value='".$skill.": 5' id='option_".$skill."_5' $checked5><label for='option_".$skill."_5'>With support</label></span></td>";
	echo "<td colspan='1' style='text-align:center; background-color:#f5f5f5;'><span class='radiowrapper'><input type='radio' name='".$skillstrip."' value='".$skill.": 6' id='option_".$skill."_6' $checked6><label for='option_".$skill."_6'>Without support</label></span></td>";
}

?>