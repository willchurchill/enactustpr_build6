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
    
	<!-- Custom styles for this template -->
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
					<button class="btn btn-lg btn-primary btn-block btn-on" type="submit">Mentors</button>
				</td>
				<td>
					<a href="teamlist.php">
					<button class="btn btn-lg btn-primary btn-block btn-off" type="submit">Teams</button>
					</a>
				</td>
				<td>
					<a href="pmlist.php">
					<button class="btn btn-lg btn-primary btn-block btn-off" type="submit">Programme Staff</button>
					</a>
				</td>
			</tr>
		</table>
			
          <h2 class="page-header">Mentor list</h2>
			<p>
				From here you can see all the currently active mentors in the network. An 'active' mentor is anyone who
				has applied to be a mentor for this academic year. To edit an individual mentor's details, simply click
				on their name below. You can edit the teams they have been officially assigned, and their access level 
				to the TPR website. You can also see each mentors' 'status' on the right hand side. Mentors who have 
				submitted a TPR in the last 14 days are green, those who have submitted a TPR in the last 14 to 30 days
				are orange, and those who have not submitted a TPR for over 30 days are marked red.
			</p>
			<p>
				Programme Managers are not listed in this view. To see the teams they have been allocated, or to change 
				their access level, please click on the 'Programme Staff' tab above.
			</p>
			<p>
				This view will also not show individuals who have been mentors in the past, but have chosen to not continue 
				this academic year. To see a list of those members, <a href="archivedmentorlist.php">click here</a>.
			</p>
			
	<div id="reports">
          <div class="table-responsive">
			  <table class='table table-striped' id="tprtable">
				  <thead>
					  <tr>
						  <th class='sort' data-sort='mentorname'>Mentor</th>
						  <th class='sort' data-sort='teams'>Teams</th>
						  <th class='sort' data-sort='level'>Level</th>
						  <th class='sort' data-sort='status'>Status</th>
					  </tr>
				  </thead>
				  <tbody class="list">
					  <?php echo $adminmentorlist; ?>
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
