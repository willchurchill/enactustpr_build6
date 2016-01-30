<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include('dbconn.php');

$mentoremail=$_POST['mentoremail'];
$pinsubmit=$_POST['resetpin'];
$newpass=$_POST['newpassword'];
$confirmpass=$_POST['confirmpassword'];

$md5pass=md5($newpass);

$getpin=$pdo->prepare("SELECT resetpin FROM mentors WHERE mentoremail='$mentoremail' LIMIT 1");
	$getpin->execute();
$row=$getpin->fetch(PDO::FETCH_BOTH);
	$resetpin = $row['resetpin'];
?>
<html>
<head>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/signin.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
</head>
<?

if($resetpin=='00000' OR $resetpin=='0'){ 
	echo "<script>alert('This account has not requested a Password Reset.');</script>";
	echo "<script>window.location.replace('../../forgotpassword.html');</script>";
}
else{
	if($resetpin==$pinsubmit){
		
 		if($newpass==$confirmpass) {
			$updatepass=$pdo->prepare("UPDATE mentors SET mentorpassword='$md5pass', resetpin='00000' WHERE mentoremail='$mentoremail'");
				$updatepass->execute();
			echo "<script>alert('Password change successful. You can now login with your new password.');</script>";
			echo "<script>window.location.replace('../../dashboard/login.html');</script>";
		}
		elseif($newpass!==$confirmpass){
			echo "<script>alert('Passwords did not match.');</script>";
			echo "<script>window.location.replace('../../dashboard/resetpassword.html');</script>";
  		}
	}
	elseif($resetpin!==$pinsubmit) {
		echo "<script>alert('The pin you entered was invalid.');</script>";
		echo "<script>window.location.replace('../../dashboard/resetpassword.html');</script>";
	}
}

?>