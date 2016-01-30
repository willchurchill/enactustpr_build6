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
  <script src='../lib/js/checklogin.js'></script>

  <!-- Bootstrap core CSS -->
  <link href="../lib/css/bootstrap.css" rel="stylesheet">
  <link href="../lib/css/dashboard.css" rel="stylesheet">
  <link href="../lib/css/forms.css" rel="stylesheet">
  <link href="../lib/css/sticky-footer.css" rel="stylesheet">

  <!-- Include PHP scripts -->
</head>

<body>
  <?php include_once("topbar.php"); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once("nav.php"); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Team Progress Report Software. Version 5.0.0 (beta)</h2>
          <h3 class="sub-header">What's new</h3>
          <p>
            The first thing you'll notice about Version 5 is the complete visual redesign - the first one since v3 way back when. The new 
            site is built on the Bootstrap platform, meaning that not only is the site much cleaner and easier to use, it is also the 
            first time that the TPR site has been fully designed with mobile platforms in mind.
          </p>
          <h3 class="sub-header">Front Page</h3>
          <p>
            Here you'll see the last 5 reports from teams in that you mentor. If you want to see reports from further back, you can click on 
            <b>View previous</b> from the menu bar on the left hand side. Clicking on a specific report will open it up in full, allowing 
            you to see more of the report.
          </p>
          <p>
            You'll also notice the <b>At-a-glance</b>. This shows you a quick update of your stats, as well as the network as a whole. 
            These figures are rolling numbers taken from the last 30 days, and will update automatically.
          </p>
          <h3 class="sub-header">Navigation</h3>
          <p>
            Because of the nature of Bootstrap, the sidebar (the menu items on the left of the screen) don't appear when you view the site 
            on mobile. Therefore we've put the most useful links at the top - Home, Submit TPR, Flag Team, and Logout. When viewing the 
            site on mobile, these will be available by tapping the menu button at the top of the page.
          </p>
          <h3 class="sub-header">Reports: Submit new</h3>
          <p>
            Other than the cleaner layout, submitting a TPR is exactly the same as it has always been. Fill in the details, hit submit!
          </p>
          <h3 class="sub-header">Reports: View previous</h3>
          <p>
            This is the equivalent of the 'TPR Page' on the old site, minus the buttons (you can submit new TPRs as described above, 
            and Event TPRs are now handled differently). As before, clicking on a report will open it up in full. You can use the search 
            bar to look for specifics.
          </p>
          <h3 class="sub-header">Reports: Flag team</h3>
          <p>
            A new feature for v5 - this simply lets you raise an alert for one of your teams if you haven't heard from them in a while. 
            Submitting this alert will send an email to the relevant Programme Manager, and notify the Board.
          </p>
          <h3 class="sub-header">Explore: Mentor list</h3>
          <p>
            This is the same as the 'Mentors' page from the old website. This shows you a list of all the currently active mentors, and 
            allows you to search based on specific skills.
          </p>
          <h3 class="sub-header">Explore: Team list</h3>
          <p>
            A slight update from the 'Teams' page. This shows a list of all the teams in the network, which Programme Manager is responsible 
            for them, and who mentors them. Clicking on a team that you mentor will bring up their latest reports, and show their scores.
          </p>
          <h3 class="sub-header">Explore: Statistics</h3>
          <p>
            Similar to the previous 'Stats' page, though updated with the new Bootstrap and Chart.js platforms to be more user-friendly.
          </p>
          <h3 class="sub-header">Admin: Edit profile</h3>
          <p>
            All of the profile options have been amalgamated into one page. From here you can edit your contact details, update your job, 
            and edit your skills.
          </p>
          <h3 class="sub-header">Admin: Change password</h3>
          <p>
            Use this option to change your password.
          </p>
        
          <?php
            if($mentorlevel>4){
              echo "
                <h3 class='sub-header'>Admin: Switch to MT Dashboard</h3>
                <p>Board members and Programme Staff have access to a different set of menu options. Clicking on this will take you 
                to the Management Team Dashboard, where you can view the <a href='../board-dashboard/help.php'>other options</a>.
              ";
            }
          ?>
          
        </div>
      </div>
      <footer class="footer">
        <?php include_once('footer.htm'); ?>
      </footer>
      <!-- Bootstrap core JavaScript
    ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="../lib/js/bootstrap.min.js"></script>
      <script src="../lib/js/piwik.js"></script>
</body>

</html>