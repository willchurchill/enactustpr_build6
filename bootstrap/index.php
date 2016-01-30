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

    <title>Enactus UK Alumni TPR</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="lib/css/jumbotron.css" rel="stylesheet">
	<link href="lib/css/cover.css" rel="stylesheet">
	  <link href="lib/css/custom.css" rel="stylesheet">

	<!-- PHP scripts -->
	<?php
		include_once("lib/php/dbconn.php");
		include_once("lib/php/keyfacts.php");
		include_once("lib/graphs/totalhours.php");
		include_once("lib/graphs/piechart.php");
		include_once("lib/graphs/toptopics.php");
	?>

  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead">
            <div class="inner">
              <h3 class="masthead-brand"><img src="lib/images/logo.png" /> </h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">TPR Home</a></li>
					<li><a href="admin-dashboard/">TPR Dashboard</a></li>
					<li><a href="http://enactusukalumni.org">Main Homepage</a></li>
					<!--<li><a href="#">Mentors</a></li>
					<li><a href="#">Teams</a></li>
					<li><a href="#">Stats</a></li>
					<li><a href="#">Admin</a></li>-->
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Welcome to the Enactus UK Mentor tracking system.</h1>
            <p class="lead cover-lead">The Enactus UK Alumni Network is one of the most established Enactus networks in the world. 
			  To ensure that our Enactus teams are getting the most out of this fantastic resource, and to make sure that the 
			  link between our mentors and our Programme Staff is seamless, we have developed this online resource to track, 
			  assess, and alert our users of any changes in the network.</p>
            <p class="lead cover-lead">
              <a class="btn btn-lg btn-default" onclick="showhiddenfront()">Learn more</a>
            </p>
			  <p class="lead cover-lead">
				  Or, if you are an existing mentor, simply <a href="#">Login</a>.
			  </p>
          </div>

			<div class="mastfoot">
            <div class="inner">
              <p>&copy; Enactus UK Alumni 2015 &middot; TPR Site coding and design by <a href="http://willchurchill.co.uk">Will Churchill</a>.</p>
            </div>
          </div>
        </div>

      </div>

    </div>
<div class="hiddenpage" id="hiddenfrontpage">
	
    		<a id="totalsupport"></a>
		<hr class="featurette-divider">

		
		<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <h1><?php echo $totalhours_year; ?></h1>
          <p class="stattext">The number of hours our mentors have given this Enactus year.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <h1><?php echo $activementors_thisyear; ?></h1>
          <p class="stattext">The number of active mentors we currently have in the network.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <h1><?php echo $averagescore_thisyear; ?></h1>
          <p class="stattext">The average score (out of 5) given across the network.</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	</div>
      <!-- featurettes -->
			
<div class="container">
     <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette vertical-align">
        <div class="col-xs-6 col-md-6">
			<div>
          <h2 class="featurette-heading">Total Support</h2>
          <p class="lead featurette-lead">
			  The Reporting Tool tracks the amount of hours each of our mentors gives to their teams. Tracking this
			  number month by month allows us to understand when the 'peak' times in the network are.
			</p>
			<p class="lead featurette-lead">
				Historically these peaks have always occurred close to Competition. But the introduction of the
				'Summer Action Awards', coupled with a greater general understanding of how mentors can best be
				allocated and used, means that these peaks have mellowed out and been replaced by a greater use
				of the mentoring support system throughout the year.
			</p>
			<p class="lead featurette-lead">
				As well as seeing the statistics for the wider network, individual mentors are able to log in and 
				see how their individual numbers track against the network average, as well as how much support
				their teams are getting compared to others.
			</p>
			<p class="lead featurette-lead">
				As of this moment, our mentors are each giving an average of <span class="pagestat"><?php echo $averagehours_year; ?> hours</span> per month.
			</p>
			</div>
        </div>
        <div class="col-xs-6 col-md-6">
			<canvas id="totalhoursBarChart" class="linegraphcontainer" />
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette vertical-align">
        <div class="col-md-7 col-md-push-5">
			<div>
          <h2 class="featurette-heading">Breakdown of support</h2>
			<p class="lead featurette-lead">
			  As well as understanding the total number of hours mentors give, it is also important for us to 
				know how these hours are being delivered. Whereever possible, the Alumni Management Team try to 
				allocate teams mentors who live and/or work close to them.
			</p>
			<p class="lead featurette-lead">
				The best mentoring is done face to face, and as the mentor network grows, we are able to see a 
				trend towards more face to face hours being submitted.
			</p>
			<p class="lead featurette-lead">
				Equally however, we know that our mentors are there for our teams even when they can't physically 
				be present. It is therefore important for us to know all the ways in which our mentors are being 
				engaged, so that we can offer the support and best-practice needed.
			</p>
			<p class="lead featurette-lead">
				As of this moment, our mentors have given <span class="pagestat"> <?php echo $ftfhours_year; ?> hours of face to face support</span>, 
				which represents <span class="pagestat"><?php echo $ftfhours_year_percentage; ?>%</span> of the total alumni support given.
			</p>   
			</div>
		  </div>
        <div class="col-md-5 col-md-pull-7">
          <canvas id="piechart" />
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette vertical-align">
        <div class="col-md-7">
			<div>
          <h2 class="featurette-heading">At-a-glance analysis</h2>
			<p class="lead featurette-lead">
				Of course, hours given are not the only important measure. We place far more emphasis on the 
				qualititative data our mentors report back. To make sure that this is handled in the most efficient 
				way, we use a number of tools to parse this data.
			</p>
			<p class="lead featurette-lead">
				Every report can be read by both the team's Programme Manager, and any other relevant mentors in the 
				network. This ensures that any information that the team's support network might need to know is 
				available quickly.
			</p>
			<p class="lead featurette-lead">
				Beyond that though, there are other methods our software uses to ensure that an accurate picture of 
				the network is built. Each report is catagorised and rated by the submitting mentor, allowing other 
				users to easily search for and use the content. In addition to this, the system automatically performs 
				a regular textual analysis of all reports to build up a representation of both the strong and weak 
				parts of the network.
			</p>
			<p class="lead featurette-lead">
				This data can then be used by Enactus UK, and by the Alumni Management Team, to identify areas where 
				stronger support is needed.
			</p>     
			</div>
		  </div>
        <div class="col-md-5">
			<canvas id="toptopicChart" />
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->
		  <!-- end featurettes -->
      </div>
      <hr>
<div class="container footer-container">
      <footer>
        <p>&copy; Enactus UK Alumni 2015 &middot; TPR Site coding and design by <a href="http://willchurchill.co.uk">Will Churchill</a></p>
      </footer>
    </div> <!-- /container -->
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="lib/js/bootstrap.min.js"></script>
		<script src="lib/js/custom.js"></script>
		<script src="lib/js/Chart.js"></script>
		<script src='lib/js/jquery-scrollto.js'></script>
		<script>window.onscroll=pageScroll;</script>
		<script src="lib/js/piwik.js"></script>
  </body>
</html>
