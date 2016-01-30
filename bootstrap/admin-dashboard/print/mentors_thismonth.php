<html>
	<head>
		<link rel="stylesheet" type="text/css" href="print.css">
		<!-- Include PHP scripts -->
		<?php include_once("../../lib/php/dbconn.php"); ?>
		<?php include_once("../../lib/php/keyfacts.php"); ?>
	</head>
	<body>
		<?php $format="print"; include_once("../php/m_thismonth_table.php"); ?>
	</body>
</html>