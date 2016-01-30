<?php

$getdata=$pdo->prepare("
		
	SELECT boardmember, date, hours, summary, other
	FROM boardreports 
	WHERE boardmember<>''
	ORDER BY date DESC
	LIMIT 50

");
	
	$getdata->execute();

	while($row=$getdata->fetch(PDO::FETCH_BOTH)){		
		echo "<tr>";
			echo "<td class='reportdate meetingdate'>".$row['date']."</td>";
			echo "<td class='reportsummary'><b>".$row['boardmember']."</b> ".$row['summary']."</td>";
			echo "<td class='reporttags'>".$row['other']."</td>";
			echo "<td class='hours'>".$row['hours']."</td>";
		echo "</tr>";
	}

?>