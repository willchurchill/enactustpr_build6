<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Dashboard</title>
		<!-- include core JS functions -->
		<script src="../lib/js/functions.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
    <link href="../lib/css/dashboard.css" rel="stylesheet">
    <link href="../lib/css/dashboardcustom.css" rel="stylesheet">
    <link href="../lib/css/forms.css" rel="stylesheet">

    <!-- Include PHP scripts -->
	  <?php include_once("../lib/php/dbconn.php"); ?>
	  <?php include_once("../lib/php/keyfacts.php"); ?>
	  <?php include_once("../lib/php/admin_mentorlist.php"); ?>
	  
  </head>

  <body>

    <?php include_once("topbar.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once("nav.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			
		<table class="tabbedpage">
			<tr>
				<td>
					<a href="mentorlist.php">
					<button class="btn btn-lg btn-primary btn-block btn-off" type="submit">Mentors</button>
					</a>
				</td>
				<td>
					<a href="teamlist.php">
					<button class="btn btn-lg btn-primary btn-block btn-off" type="submit">Teams</button>
					</a>
				</td>
				<td>
					<button class="btn btn-lg btn-primary btn-block btn-on" type="submit">Programme Staff</button>
				</td>
			</tr>
		</table>
			
          <h2 class="page-header">Programme Staff list</h2>
			<p>
				From here you can manage the Programme Staff team allocations. To edit a PMs teams, simply click on their name. 
				On the right hand side, you can also see the rolling average score for each of the PMs regions.
			</p>
			<p>
				You can add a new Programme Staff member from here. Please note that if the PM has previously been a mentor, 
				you should change their access level from the Mentor tab above, rather than create a new account for them.
			</p>
			
	<div id="reports">
          <div class="table-responsive">
			  <table class='table table-striped' id="tprtable">
				  <thead>
					  <tr>
						  <th class='sort' data-sort='mentorname'>Programme Manager</th>
						  <th class='sort' data-sort='teams'>Teams</th>
						  <th class='sort' data-sort='totalteams'>Count</th>
						  <th class='sort' data-sort='status'>Score</th>
					  </tr>
				  </thead>
				  <tbody class="list">
					  <?php echo $adminpmlist; ?>
					  <tr style="font-weight:bold;">
						  <td></td>
						  <td style="text-align:right;">Total / Average</td>
						  <td><?php echo $showtotalteams; ?></td>
						  <td><?php echo $showtotalaverage; ?></td>
					  </tr>
				  </tbody>
			  </table>
		  </div>
	</div>
</div>
		  
      </div>
    </div>

	  <!-- change color of status field to suit -->
	  <script>
		  var elems = document.getElementsByTagName("td");
		  for (var i=0, m=elems.length; i<m; i++) {
			  if(elems[i].innerHTML=="Red"){
				  elems[i].style.color="#C41230";
				  elems[i].style.backgroundColor="#C41230";
			  }else if(elems[i].innerHTML=="Orange"){
				  elems[i].style.color="#F8971D";
				  elems[i].style.backgroundColor="#F8971D";
			  }else if(elems[i].innerHTML=="Green"){
				  elems[i].style.color="#49A942";
				  elems[i].style.backgroundColor="#49A942";
			  }
		  }
	  </script>
	  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
    <script src='../lib/listjs/dist/list.js'></script>
		<script>var options = { valueNames: [ 'mentorname', 'teams', 'level', 'status' ] };</script>
		<script>var tprList = new List('reports', options);</script>
		<script src="../lib/js/piwik.js"></script>
  </body>
</html>
