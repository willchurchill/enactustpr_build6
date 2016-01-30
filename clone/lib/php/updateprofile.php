<?php

include_once("dbconn.php");

$mentorid=$_COOKIE['TPRuserid'];

// contact info
$mentorname=$_POST['mentorname']; $mentoremail=$_POST['mentoremail']; $otheremails=$_POST['otheremails']; 
$mobile=$_POST['mentornumber']; $currentcity=$_POST['currentcity']; $mentorsince=$_POST['mentorsince'];
// job details
$jobtitle=$_POST['jobtitle']; $company=$_POST['company']; $sponsor=$_POST['enactussponsor'];
// uni details
$university=$_POST['university']; $gradyear=$_POST['gradyear']; $subject=$_POST['subject'];
// skills
//  general
$teamleadership=$_POST['Team-Leadership']; $recruitment=$_POST['Recruitment']; $teambuilding=$_POST['Team-Building--HR'];
$prmedia=$_POST['PR--Media']; $branding=$_POST['Branding']; $cre=$_POST['CRE']; $legal=$_POST['Legal'];
$finance=$_POST['Finance']; $strategy=$_POST['Strategy']; $ideasgeneration=$_POST['Ideas-Generation']; 
$grants=$_POST['Grants--Sponsorship'];
//  projects
$findingprojectpartners=$_POST['Finding-Project-Partners']; $designingprojects=$_POST['Designing-Projects'];
$implementing=$_POST['Implementing']; $expanding=$_POST['Expanding']; $community=$_POST['Community'];
$international=$_POST['International']; $commercial=$_POST['Commercial']; $impactmeasurement=$_POST['Impact-Measurement'];
$engineering=$_POST['Engineering']; $environment=$_POST['Environmental']; $beneficiaries=$_POST['Working-with-Beneficiaries'];
//  competition
$presentingskills=$_POST['Presenting-Skills']; $scriptwriting=$_POST['Script-Writing']; $avslides=$_POST['AV--Slides'];
$videos=$_POST['Videos']; $criteria=$_POST['Criteria']; $annualreport=$_POST['Annual-Report']; $qanda=$_POST['QA'];
$compstrategy=$_POST['Competition-Strategy'];
//  other
$professionaltraining=$_POST['professionaltraining'];
$beneficiarygroups=$_POST['beneficiarygroups'];
$projectdescription=$_POST['projectdescription'];

$generalskills=$teamleadership.", ".$recruitment.", ".$teambuilding.", ".$prmedia.", ".$branding.", ".$cre.", ".$legal;
	$generalskills.=", ".$finance.", ".$strategy.", ".$ideasgeneration.", ".$grants;

$projectskills=$findingprojectpartners.", ".$designingprojects.", ".$implementing.", ".$expanding.", ".$community;
	$projectskills.=", ".$international.", ".$commercial.", ".$impactmeasurement.", ".$engineering;
	$projectskills.=", ".$environment.", ".$beneficiaries;

$competitionskills=$presentingskills.", ".$scriptwriting.", ".$avslides.", ".$videos.", ".$criteria.", ".$annualreport;
	$competitionskills.=", ".$qanda.", ".$compstrategy;

$insertdata=$pdo->prepare("UPDATE mentors SET mentorname='$mentorname', mentoremail='$mentoremail', otheremails='$otheremails', 
	mentornumber='$mobile', currentcity='$currentcity', mentorsince='$mentorsince', jobtitle='$jobtitle', company='$company', 
	sponsor='$sponsor', university='$university', gradyear='$gradyear', subject='$subject', generalskills='$generalskills', 
	projectskills='$projectskills', competitionskills='$competitionskills', professionaltraining='$professionaltraining',
	beneficiarygroups='$beneficiarygroups', projectdescription='$projectdescription' WHERE mentorid='$mentorid'");
$insertdata->execute();

?>

<html>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script>alert("Your profile has been updated.");window.location='../../dashboard/editprofile.php';</script>
</html>