<?php

include_once("dbconn.php");

$mentorid=$_COOKIE['TPRuserid'];

$oldpass=$_POST['oldpass']; $newpass=$_POST['newpass']; $confirmpass=$_POST['confirmpass'];

$output="";

// check all the fields were filled (incase HTML5 fails)
if($oldpass=="" || $newpass=="" || $confirmpass==""){
	$output.="You must enter all fields.";
}else{
	// make sure new pass and confirm pass are the same
	if($newpass!==$confirmpass){
		//echo "<script>alert('Your passwords didn't match.);window.location='../../dashboard/changepassword.php';</script>";
		$output.="Your passwords didn't match.";
	}else{
		$oldpass=md5($oldpass); $newpass=md5($newpass);
		//check old password
		$getpass=$pdo->prepare("SELECT mentorpassword FROM mentors WHERE mentorid='$mentorid' LIMIT 1");
			$getpass->execute(); $row=$getpass->fetch(PDO::FETCH_BOTH); $databasepass=$row['mentorpassword'];
		if($oldpass!==$databasepass){
			$output.="Your old password was entered incorrectly.";
		}elseif($oldpass==$databasepass){
			// change the password
			$updatepass=$pdo->prepare("UPDATE mentors SET mentorpassword='$newpass' WHERE mentorid='$mentorid'");
				$updatepass->execute();
			$output.="Your password was changed successfully. This will take effect the next time you login.";
		}
	}
}

?>
<html>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script>alert("<?php echo $output; ?>");window.location='../../dashboard/changepassword.php';</script>
</html>