<?php

$getdata0=$pdo->prepare("SELECT SUM(totalhours) as hours0, MONTH(meetingdate) as month0 FROM tprtable WHERE meetingdate>'$nationals2013' AND meetingdate<'$nationals2014' GROUP BY month0");
$getdata1=$pdo->prepare("SELECT SUM(totalhours) as hours1, MONTH(meetingdate) as month1 FROM tprtable WHERE meetingdate>'$nationals2014' AND meetingdate<'$nationals2015' GROUP BY month1");
$getdata2=$pdo->prepare("SELECT SUM(totalhours) as hours2, MONTH(meetingdate) as month2 FROM tprtable WHERE meetingdate>'$nationals2015' GROUP BY month2");
    $getdata0->execute();
	$getdata1->execute();
    $getdata2->execute();

while($row=$getdata0->fetch(PDO::FETCH_ASSOC)){ $showdata0[]=$row; }
while($row=$getdata1->fetch(PDO::FETCH_ASSOC)){ $showdata1[]=$row; }
while($row=$getdata2->fetch(PDO::FETCH_ASSOC)){ $showdata2[]=$row; }

//echo json_encode($showdata1);

$output0=array();$output1=array();$output2=array();

//echo $count1;
$rcount0=0;$rcount1=0;$rcount2=0;

foreach($showdata0 as $key=>$value){
    $intvalue=intval($value['month0']);
    $inthours=intval($value['hours0']);
    $intkey=intval($key);
    
    //for($x=0;$x<$count1;$x++){
        if($intvalue <> ($intkey+1+$rcount0)){
            array_push($output0,"0");
            array_push($output0,$inthours);
            $rcount0=$rcount0+1;
        }
        else{
            array_push($output0,$inthours);
        }
   // }
}
$under0=12-count($output0);
for($x=0;$x<$under0;$x++){
    array_push($output0,"0");
}
foreach($showdata1 as $key=>$value){
    $intvalue=intval($value['month1']);
    $inthours=intval($value['hours1']);
    $intkey=intval($key);
    
    //for($x=0;$x<$count1;$x++){
        if($intvalue <> ($intkey+1+$rcount1)){
            array_push($output1,"0");
            array_push($output1,$inthours);
            $rcount1=$rcount1+1;
        }
        else{
            array_push($output1,$inthours);
        }
   // }
}
$under1=12-count($output1);
for($x=0;$x<$under1;$x++){
    array_push($output1,"0");
}
foreach($showdata2 as $key=>$value){
    $intvalue=intval($value['month2']);
    $inthours=intval($value['hours2']);
    $intkey=intval($key);
    
    //for($x=0;$x<$count1;$x++){
        if($intvalue <> ($intkey+1+$rcount2)){
            array_push($output2,"0");
            array_push($output2,$inthours);
            $rcount2=$rcount2+1;
        }
        else{
            array_push($output2,$inthours);
        }
   // }
}
$under2=12-count($output2);
for($x=0;$x<$under2;$x++){
    array_push($output2,"0");
}

$output0=json_encode($output0);
$output1=json_encode($output1);
$output2=json_encode($output2);

?>
<!doctype html>
<html>
	<head>
		<title>Bar Chart</title>
		<script src="js/Chart.js"></script>
	</head>
	<body>
		<div>
			<!--<canvas id="barChart"></canvas>-->
		</div>


	<script>
	var lineChartData = {
	    
		labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
		datasets : [
			{
				fillColor : "#F8971D",
				strokeColor : "#FFD200",
				highlightFill: "#F8971D",
				highlightStroke: "#FFD200",
				label: "2013",
				data : <?php echo $output0; ?>
			},
			{
				fillColor : "#F8971D",
				strokeColor : "#FFD200",
				highlightFill: "#F8971D",
				highlightStroke: "#FFD200",
				label: "2014",
				data : <?php echo $output1; ?>
			},
			{
				fillColor : "#FFC222",
				strokeColor : "#C88A12",
				highlightFill : "#FFC222",
				highlightStroke : "#C88A12",
				label: "2015",
				data : <?php echo $output2; ?>
			}
			
		]

	}
			/*
	window.onload = function(){
		var ctx = document.getElementById("barChart").getContext("2d");
		window.myBar = new Chart(ctx).Line(barChartData, {
			responsive : true
		});
	}
	*/

	</script>
	</body>
</html>
