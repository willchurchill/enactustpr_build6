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

  <title>Statistics</title>
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
  <?php include_once("../lib/php/teamnames.php"); ?>

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
                <a href="statistics.php">
                  <button class="btn btn-lg btn-primary btn-block btn-off" type="submit">Top 5s</button>
                </a>
              </td>
              <td>
                <button class="btn btn-lg btn-primary btn-block btn-on" type="submit">Hours over time</button>
              </td>
              <td>
                <a href="stats_scoresovertime.php">
                  <button class="btn btn-lg btn-primary btn-block btn-off" type="submit">Scores over time</button>
                </a>
              </td>
            </tr>
          </table>
          
<?php include_once("../lib/php/stats_top5s.php"); ?>
          
<h2 class="page-header">Choose graph</h2>
<p>
  <table>
    <tr>
      <td>
        Show total hours year on year<br /><input type="checkbox" checked="checked">include events
      </td>
      <td><button class="btn btn-lg btn-primary btn-block btn-on">Show graph</button></td>
    </tr>
    <tr><td colspan=2>-- or --</td></tr>
    <tr>
      <td>
        Compare <select><?php echo $showmentorteams; ?></select> with <select><option>Whole Network</option><?php echo $showmentorteams; ?></select><br />over time
      </td>
      <td><button class="btn btn-lg btn-primary btn-block btn-on">Show graph</button></td>
    </tr>
  </table>
</p>
         
<h2 class="page-header">Top 5s (last month)</h2>
<table class="topfives">
<tr>
  <td>
    <div class="table-responsive">
      <table class='table table-striped' id="tprtable">
        <thead><tr><th>Most active mentors (incl. Events)</th></tr></thead>
        <tbody class="list">
          <?php echo $activementorslastmonth_events; ?>
        </tbody>
      </table>
    </div>
  </td>
  <td>
    <div class="table-responsive">
      <table class='table table-striped' id="tprtable">
        <thead><tr><th>Most active mentors (excl. Events)</th></tr></thead>
        <tbody class="list">
          <?php echo $activementorslastmonth; ?>
        </tbody>
      </table>
    </div>
  </td>
  <td>
    <div class="table-responsive">
      <table class='table table-striped' id="tprtable">
        <thead><tr><th>Most engaged teams</th></tr></thead>
        <tbody class="list">
          <?php echo $activeteamslastmonth; ?>
        </tbody>
      </table>
    </div>
  </td>
</tr>  
</table>          
          
<table class="topfives">
<tr>
  <td>
    <div class="table-responsive">
      <table class='table table-striped' id="tprtable">
        <thead><tr><th>Highest awarding mentors</th></tr></thead>
        <tbody class="list">
          <?php echo $awardingmentorslastmonth; ?>
        </tbody>
      </table>
    </div>
  </td>
  <td>
    <div class="table-responsive">
      <table class='table table-striped' id="tprtable">
        <thead><tr><th>Highest scoring teams</th></tr></thead>
        <tbody class="list">
          <?php echo $scoringteamslastmonth; ?>
        </tbody>
      </table>
    </div>
  </td>
</tr>  
</table>
          
<h2 class="page-header">Top 5s (this year)</h2>
<table class="topfives">
<tr>
  <td>
    <div class="table-responsive">
      <table class='table table-striped' id="tprtable">
        <thead><tr><th>Most active mentors (incl. Events)</th></tr></thead>
        <tbody class="list">
          <?php echo $activementorsthisyear_events; ?>
        </tbody>
      </table>
    </div>
  </td>
  <td>
    <div class="table-responsive">
      <table class='table table-striped' id="tprtable">
        <thead><tr><th>Most active mentors (excl. Events)</th></tr></thead>
        <tbody class="list">
          <?php echo $activementorsthisyear; ?>
        </tbody>
      </table>
    </div>
  </td>
  <td>
    <div class="table-responsive">
      <table class='table table-striped' id="tprtable">
        <thead><tr><th>Most engaged teams</th></tr></thead>
        <tbody class="list">
          <?php echo $activeteamsthisyear; ?>
        </tbody>
      </table>
    </div>
  </td>
</tr>  
</table>          
          
<table class="topfives">
<tr>
  <td>
    <div class="table-responsive">
      <table class='table table-striped' id="tprtable">
        <thead><tr><th>Highest awarding mentors</th></tr></thead>
        <tbody class="list">
          <?php echo $awardingmentorsthisyear; ?>
        </tbody>
      </table>
    </div>
  </td>
  <td>
    <div class="table-responsive">
      <table class='table table-striped' id="tprtable">
        <thead><tr><th>Highest scoring teams</th></tr></thead>
        <tbody class="list">
          <?php echo $scoringteamsthisyear; ?>
        </tbody>
      </table>
    </div>
  </td>
</tr>  
</table>
  
      </div>
    </div>

    <!-- change color of status field to suit -->
    <script>
      var elems = document.getElementsByTagName("td");
      for (var i = 0, m = elems.length; i < m; i++) {
        if (elems[i].innerHTML == "Red") {
          elems[i].style.color = "#C41230";
          elems[i].style.backgroundColor = "#C41230";
        } else if (elems[i].innerHTML == "Orange") {
          elems[i].style.color = "#F8971D";
          elems[i].style.backgroundColor = "#F8971D";
        } else if (elems[i].innerHTML == "Green") {
          elems[i].style.color = "#49A942";
          elems[i].style.backgroundColor = "#49A942";
        }
      }
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
    <script src='../lib/listjs/dist/list.js'></script>
    <script>
      var options = {
        valueNames: ['mentorname', 'teams', 'level', 'status']
      };
    </script>
    <script>
      var tprList = new List('reports', options);
    </script>
    <script src="../lib/js/piwik.js"></script>
</body>

</html>