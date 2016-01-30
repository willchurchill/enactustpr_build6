<?php
include('dbconn.php');

$resetpin = rand(10000, 99999);

$mentorname = $_POST['mentorname'];
$mentoremail = $_POST['mentoremail'];

// check that the name and the email match each other
$checkdetails_name=$pdo->prepare("SELECT mentorid FROM mentors WHERE mentorname='$mentorname'");
$checkdetails_email=$pdo->prepare("SELECT mentorid FROM mentors WHERE mentoremail='$mentoremail'");
	$checkdetails_name->execute();
	$checkdetails_email->execute();

$row_name=$checkdetails_name->fetch(PDO::FETCH_BOTH);
	$name_check=$row_name['mentorid'];
$row_email=$checkdetails_email->fetch(PDO::FETCH_BOTH);
	$email_check=$row_email['mentorid'];

if(($name_check==$email_check && $name_check<>'') || $email_check<>''){
	
	$updatepin=$pdo->prepare("UPDATE mentors SET resetpin='$resetpin' WHERE mentoremail='$mentoremail'");
	$updatepin->execute();

	$emailsubject="TPR Password Reset";
	$emailmessage="Hi, <br /> Your password reset pin is <b>".$resetpin."</b>
	<br />You will need to enter this in the <a href='http://tpr.enactusukalumni.org/dashboard/resetpassword.htm'>Reset Password Form</a> to create a new password. 
	<br />If you have any issues, please contact mentoring@enactusukalumni.org
	<br />Many thanks,<br /> The Mentoring Team, Enactus UK Alumni Board";

	$emailheaders = "MIME-Version: 1.0\r\n";
	$emailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	mail($mentoremail, $emailsubject, $emailmessage, $emailheaders);
	
	$output_message="<p>We've just sent you an email with instructions on how to reset your password.</p><p>If you don't receive this email in the next 10 mins, check your spam folder. If you still haven't got it, drop us an email and let us know.";
	
}
else{	//if the email address isn't in the mentor database
	
	// search the database for the name used
	$checkname=$pdo->prepare("SELECT mentoremail FROM mentors WHERE mentorname='$mentorname'");
		$checkname->execute();
	
	$row_email=$checkname->fetch(PDO::FETCH_BOTH);
		$verified_email=$row_email['mentoremail'];
	
	if($verified_email<>''){
		$output_message="<p>We seem to have a different email address registered to you.</p><p>Have you tried logging on with ".$verified_email."?</p><p>Don't worry, once you're logged in, you can change this email address if you need to.</p>";
	}else{
		$output_message="<p>We're sorry, we can't seem to find your details. Don't panic though, we'll soon sort that out!</p><p>It could be you're trying different details. For example:<br />1. You may have signed up with your work email and trying to log in with your personal address.<br />2. Are you using a different (version of your) name? eg. John Smith / Jonathan Smith?</p><p>If you still can't log on, please get in touch with the mentoring team.";
	}
}

?>
<html>
<head>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
	<script>//window.location.replace('resetpassword.htm');</script></head>
<body>
	<div class="container">
	<p>&nbsp;</p>
	<h4>
		<?php echo $output_message; ?>
		<br /><br />
		<a href="../../forgotpassword.html">Go back</a>
	</h4>
	</div>
</body>
</html>
