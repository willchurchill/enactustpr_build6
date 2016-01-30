<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Enactus UK TPR Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="submitnewtpr.php">Submit TPR</a></li>
            <li><a href="flagteam.php">Flag Team</a></li>
			  <?php
				$mentorlevel=$_COOKIE['TPRuserlevel'];
				if($mentorlevel>4){
					echo "<li><a href='../board-dashboard/'>MT Dashboard</a></li>";
				}
			  ?>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>