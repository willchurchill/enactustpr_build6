<?php

$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "From: \"TPR Site (Enactus UK Alumni)\" <mentoring@enactusukalumni.org>\r\n";

$message = 'Cron has been run.';

$to="willchurchill89@gmail.com";

mail($to,$subject,$message,$headers);

?>