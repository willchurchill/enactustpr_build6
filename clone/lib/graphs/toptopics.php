<?php

$getdata1=$pdo->prepare("SELECT topic as topic1, frequency as frequency1, year as year1 FROM topicCount WHERE year='$thisyear' AND month='$lastmonth' ORDER BY frequency1 DESC LIMIT 5");
	$getdata1->execute();

$topicnames="";
$topicnumbers="";

while($row=$getdata1->fetch(PDO::FETCH_BOTH)){
	$topicnames=$topicnames.",\"".$row['topic1']."\"";
	$topicnumbers=$topicnumbers.",".$row['frequency1'];
}

$topicnames = substr($topicnames, 1);
$topicnumbers = substr($topicnumbers, 1);
$topicnumbers = "[".$topicnumbers."]"

?>
<!doctype html>
<html>
	<head>
		<script src="js/Chart.js"></script>
	</head>
	<body>
		<!--
		<span id="canvas-holder" width="100%">
			<canvas id="toptopicChart" />
		</span>
		-->
		
		<script>
	var toptopicData = {
	    
		labels : [<?php echo $topicnames; ?>],
		datasets : [
			{
				fillColor : "#F8971D",
				strokeColor : "#FFD200",
				highlightFill: "#F8971D",
				highlightStroke: "#FFD200",
				data : <?php echo $topicnumbers; ?>
			},
		]
	}
	/*		
	window.onload = function(){
		var ctx2 = document.getElementById("toptopicChart").getContext("2d");
		var myBarChart = new Chart(ctx2).Bar(toptopicData);
	}
	*/
	

	</script>
	</body>
</html>
