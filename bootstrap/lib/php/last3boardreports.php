<?php

$getdata=$pdo->prepare("
		
	SELECT boardmember, date, hours, summary, other
	FROM boardreports 
	WHERE boardmember<>''
	ORDER BY date DESC
	LIMIT 5

	");

$getdata->execute();

	while($row=$getdata->fetch(PDO::FETCH_BOTH)){
		echo "<tr>";
			echo "<td class='meetingdate'>".$row['date']."</td>";
			echo "<td><b>".$row['boardmember']."</b> ".$row['summary']."</td>";
			echo "<td>".$row['other']."</td>";
			echo "<td>".$row['hours']."</td>";
		echo "</tr>";
	}

?>