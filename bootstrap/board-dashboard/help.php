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

  <title>MT Admin Dashboard</title>
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
          <h3 class="sub-header">Management Team Dashboard</h3>
          <p>
            Naturally, members of MT will have access to additional options. Clicking on <b>Switch to MT Dashboard</b> either from the 
            top bar, or at the bottom of the sidebar, will get you here. Clicking on <b>Switch to Regular Dashboard</b> will take you back. 
            Only members who are a level 5 and above can see these options, and you cannot manually navigate to these pages without the 
            right level.
          </p>
          <h3 class="sub-header">Front Page</h3>
          <p>
            Here you'll see statistics from the last 30 days, including the most popular topics. The <b>Next month (estimate)</b> under the 
            popular topics section uses the data from last year to create its estimate.
          </p>
          <p>
            You'll also see the last 5 MT Reports on this page, including their tags, and the hours put in.
          </p>
          <h3 class="sub-header">MT Reports: Submit MT Report</h3>
          <p>
            This is the same as a 'Board Report' in the old website.
          </p>
          <h3 class="sub-header">MT Reports: View Previous</h3>
          <p>
            This will show you all of this year's MT reports, with the most recent at the top. You can also search for a specific tag.
          </p>
          <h3 class="sub-header">Mentors and Teams: Mentor stats</h3>
          <p>
            This page shows you the headline stats for mentors - the number of mentors who have submitted a report, the total hours given, 
            the number of distinct teams seen, and the average network score. You can also see the top 3 most popular topics (top 5 if 
            looking at the year view), and a list of all the currently active mentors with the most active at the top.
          </p>
          <p>
            You can chose to see this view for the current month, the last month, or for this Enactus year.
          </p>
          <p>
            Clicking on the printer icon next to <b>Mentors (listed by hours given)</b> will open a new tab with a print / screenshot 
            friendly page listing all of the mentors and their hours.
          </p>
          <p>
            If you are a member of the mentoring team, scrolling down to the bottom of the page in the <b>This month</b> view will give 
            you a 'send email reminders' button. Clicking this will send a canned response email to all of the mentors who - at that point 
            in time - have not submitted any hours.
          </p>
          <h3 class="sub-header">Mentors and Teams: Team stats</h3>
          <p>
            As with the Mentor stats, this page shows the headline stats for teams; distinct number of reports, the number of highlights, 
            the number of flags, and the number of support requests, as well as the most popular topics. Scrolling down the page will show 
            the highlights, flags, and support requests in detail.
          </p>
          <p>
            As with the Mentor stats, you can choose to see this view for the current month, last month, or for the whole of the Enactus year.
          </p>
          <h3 class="sub-header">Mentors and Teams: Flags</h3>
          <p>
            Here you can see the flags - both system and mentor generated - for the network.
          </p>
          <p>
            <b>Mentors view</b><br />This will show you mentors who haven't submitted TPRs in specific time periods: most notably in the 
            current month, and in the last 3 months. Underneath the mentors for this month you will see the same button to send an email 
            reminder. This performs the same function as the button on the Mentor stats page.
          </p>
          <p>
            <b>Teams view</b><br />At the top of this page you will see flags generated by mentors for specific teams (from the <b>Reports: 
            Flag team</b> page on the regular dashboard. Underneath this, the system will automatically list teams for which no report has 
            been submitted in the last 30 days.
          </p>
          <h3 class="sub-header">Admin: Mentors, Teams, and Programme Staff</h3>
          <p>
            <b>Mentors view</b><br />This shows all of the mentors (alphabetically by first name), their teams, what level they are, and 
            their status. A green status indicates they have submitted a report in the last 14 days, and orange status indicates a report 
            has been submitted in the last 30 days, and a red status indicates they have not submitted a report in the last 30 days.
          </p>
          <p>
            <b>Teams view</b><br />This shows all of the teams (listed alphabetically), their aliases, their Programme Manager, their 
            mentors, their average score (calculated over the last 30 days), and their contact status. The contact status works the same 
            for teams as for mentors - green indicates a report has been filed for that team in the last 14 days, etc etc.
          </p>
          <p>
            <b>Programme Staff view</b><br />This shows all of the programme managers (alphabetically by first name), their teams, the 
            number of teams they have, and the average score of their teams (taken over the current Enactus year).
          </p>
          <h3 class="sub-header">Admin: Create / edit Events</h3>
          <p>
            This page shows events that have been created, and headline statistics for each event: number of teams, number of mentors, 
            the delivery hours for each mentor, the number of mentors who have responded to this Event TPR, and the average preparation 
            time for each mentor.
          </p>
          <p>
            Event TPRs should be created after the event - eg. Future Leaders Training - has been run. MT can set the number of hours the 
            event has run for, the teams who were present, and the mentors who attended. Once created, a report will be created for each 
            of the relevant mentors, and they will be emailed asking to fill in a score, and hours they spent preparing, and any notes they 
            have on the sessions. Event TPRs are stored in the same database table as regular TPRs, but they have a different designation. 
            This means that - where it is required - the hours recorded for an Event TPR do not count towards some of the statistics on the 
            site.
          </p>
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