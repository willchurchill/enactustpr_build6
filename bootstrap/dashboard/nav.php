<ul class="nav nav-sidebar">
	<li>&nbsp;&nbsp;Reports</li>
	<li><a href="submitnewtpr.php">Submit new</a></li>
	<li><a href="viewtprs.php">View previous</a></li>
	<li><a href="flagteam.php">Flag team</a></li>
</ul>
<ul class="nav nav-sidebar">
	<li>&nbsp;&nbsp;Explore</li>
	<li><a href="mentorlist.php">Mentor list</a></li>
	<li><a href="teamlist.php">Team list</a></li>
	<!--<li><a href="statistics.php">Statistics</a></li>-->
</ul>
<ul class="nav nav-sidebar">
	<li>&nbsp;&nbsp;Admin</li>
	<li><a href="editprofile.php">Edit profile</a></li>
	<li><a href="changepassword.php">Change password</a></li>
</ul>

<?php
if($mentorlevel>4){
	echo "
		<ul class='nav nav-sidebar'>
			<li>&nbsp;&nbsp;MT Admin</li>
			<li><a href='../board-dashboard'>Switch to MT Dashboard</a></li>
		</ul>
	";
}
/*
if($mentorlevel>"4"){
	echo "
		<ul class='nav nav-sidebar'>
			<li>&nbsp;&nbsp;Board Admin</li>
			<li><a href=''>Edit mentors</a></li>
			<li><a href=''>Edit teams</a></li>
			<li><a href=''>Manage allocations</a></li>
		</ul>
	";
}
*/
?>

