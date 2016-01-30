<html>
	<head>
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/signin.css">
		<script src="../js/functions.js"></script>
	</head>
	
<?php
include_once("dbconn.php");

$myemail=$_POST['mentoremail'];
$mypassword=$_POST['mentorpassword']; 
	$encrypted_mypassword=md5($mypassword);

$getdata = $pdo->prepare("SELECT * FROM mentors WHERE mentoremail = '$myemail' AND mentorpassword = '$encrypted_mypassword'");
    $getdata->execute();

$row = $getdata->fetch(PDO::FETCH_BOTH);
	$useridnum = $row['mentorid'];
	$userlevelnum = $row['level'];
	$username = $row['mentorname'];

if($useridnum <> ""){
	echo "
		<script>
			createCookie('TPRuserid','".$useridnum."',7);
			createCookie('TPRuserlevel','".$userlevelnum."',7);
			createCookie('TPRusername','".$username."',7);
			
			window.location.replace('../../index.php');
		</script>
	";
}
else {
	echo "
		<script>
			window.location.replace('../../login_fail.html');
		</script>
	";
}

?>

		<!--<meta http-equiv="refresh" content="0; url=login_fail.htm" />-->
</html>