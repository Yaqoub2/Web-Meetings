<!-- Name: Yaqoub Waddad
 	 ID: 1945975
 	 Email: ymohamedwedad@stu.kau.edu.sa
 	-->
<!-- website link: 
		studygroups-5a6a5.firebaseapp.com
 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="../CSS/site.css" />
</head>

<body id="homebody">
	<!-- header of the home page -->
	<div class='topBar'>
		<div class='logo'>
			<a href="index.php"> <img src="../image/logo.jpg" alt="logo-img" width='200' height='120' />
			</a>
		</div>
		<div id="title">
			Study Groups
		</div>
		<div>
			sechedule your meetings easily
		</div>
	</div>

	<!-- nav bar for all pages -->
	<div class='nav'>
		<?php include '../includes/header.php'; ?>
	</div>

	<!-- body of the page after nav bar -->
	<div class='content'>
		<h1 id='homehead'>What is Study Groups?</h1>
		<p id='homep'>
			<b>Study Groups</b> <i>is a website that facilitate secheduling meetings.
				It shows all the <b>meetings in the week</b> as a table, the colored slots
				are the secheduled meetings if you click one it will takes you to another
				page for <b>meeting details</b>, and empty slots which will navigate to another page to <b>sechedule a new meeting</b>. <br />
				Additionally you can add <b>announcements</b> and see <b>the history of all meetings</b>.</i>
		</p>
	</div>
	<!-- footer for all pages -->
	<div class='footer'>
		<?php include '../includes/footer.php'; ?>
	</div>
</body>

</html>