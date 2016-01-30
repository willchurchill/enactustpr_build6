<?php

$getdata=$pdo->prepare("SELECT SUM(ftfhours) as ftfhours, SUM(phonehours) as phonehours, SUM(emailhours) as emailhours, SUM(otherhours) as otherhours FROM tprtable WHERE meetingdate>'$nationals2015'");
    $getdata->execute();

$row=$getdata->fetch(PDO::FETCH_ASSOC);
    $ftfhours=$row['ftfhours'];
    $phonehours=$row['phonehours'];
    $emailhours=$row['emailhours'];
    $otherhours=$row['otherhours'];

?>
<!doctype html>
<html>
	<head>
		<script src="js/Chart.js"></script>
	</head>
	<body>
		<!--
		<span id="canvas-holder" width="100%">
			<canvas id="chart" />
		</span>
		-->
		
		<script>
			var pieData = [
				{
					value: <?php echo $ftfhours; ?>,
					color:"#FFC222",
					highlight: "#C88A12",
					label: "Face-to-face"
				},
				{
					value: <?php echo $phonehours; ?>,
					color: "#92278F",
					highlight: "#C37DB5",
					label: "Phone/Skype"
				},
				{
					value: <?php echo $emailhours; ?>,
					color: "#49A942",
					highlight: "#BAD532",
					label: "Email"
				},
				{
					value: <?php echo $otherhours; ?>,
					color: "#0096D6",
					highlight: "#71D0F6",
					label: "Other"
				},
			];
/*
			window.onload = function(){
				var ctx1 = document.getElementById("chart").getContext("2d");
				window.myPie = new Chart(ctx1).Pie(pieData);
			};
*/
		</script>
	</body>
</html>
